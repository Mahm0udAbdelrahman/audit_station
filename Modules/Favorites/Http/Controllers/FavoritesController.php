<?php

namespace Modules\Favorites\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Courses\Models\Course;
use Modules\Favorites\Http\Requests\FavoriteRequest;
use Modules\Favorites\Models\Favorite;
use Modules\Favorites\Transformers\FavoriteResource;
use Modules\Videos\Models\Video;

class FavoritesController extends Controller
{

    public function showall()
    {
        $favorite = Favorite::paginate(5);

        return [
            'data' => FavoriteResource::collection($favorite),
            'meta' => [
                "current_page" => $favorite->currentPage(),
                "last_page" => $favorite->lastPage(),
                "per_page" => $favorite->perPage(),
                "total" => $favorite->total()
            ],
        ];
    }


    public function store(FavoriteRequest $request)
    {
        // تحقق من تسجيل دخول المستخدم
        $user = Auth::user();
        if (!$user) {
            return response()->json(['message' => 'يرجى تسجيل الدخول أولاً.'], 401);
        }

        // إضافة الفيديو للمفضلة
        $videoId = $request->input('video_id');
        $user->favorites()->attach($videoId);

        return response()->json(['message' => 'تم إضافة الفيديو للمفضلة بنجاح.']);
    }





    public function show($id)
    {
        $favorite = Favorite::with(['video', 'course'])->findOrFail($id);
        return new FavoriteResource($favorite);
    }




    public function update(FavoriteRequest $request, $id)
    {
        $favorite = Favorite::findOrFail($id);
        $validatedData = $request->validated();

        $favorite->update($validatedData);
        return response()->json($favorite);
    }


    public function destroy($id)
{
   $favorite = Favorite::findOrFail($id);

   $favorite->delete();

   return response()->json(['Message'=>'تم مسح الفديو']);
}










}
