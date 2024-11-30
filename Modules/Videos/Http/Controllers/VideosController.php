<?php

namespace Modules\Videos\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Videos\Http\Requests\VideoRequest;
use Modules\Videos\Models\Video;
use Modules\Videos\Transformers\VideoResource;
use App\Traits\HttpResponse;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class VideosController extends Controller
{

    use HttpResponse;

    public function showall(Request $request)
    {

        $filter = $request->query('filter');
        $video = Video::query()
            ->searchable(['title'])
            ->when($filter, fn($builder) => $builder->where('status', $filter));
        $video = $video->paginate(5);
        return $this->paginatedResponse($video, VideoResource::class);
    }


public function store(VideoRequest $request)
{
    $validatedData = $request->validated();

    $video = Video::create($validatedData);

    if ($request->hasFile('video')) {
        try {
            $video->addMediaFromRequest('video')->toMediaCollection('videos');
        } catch (\Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig $e) {
            return response()->json(['message' => 'حجم الملف أكبر من المسموح به.'], 400);
        }
    }

    return response()->json($video);
}




    public function show($videoId)
    {
        $video = Video::with(['course', 'photo','comments'])->find($videoId);

        if (!$video) {
            return response()->json(['message' => 'Video not found'], 404);
        }

        return new VideoResource($video);
    }



    public function update(VideoRequest $request, $id)
    {
        $video = Video::findOrFail($id);
        $validatedData = $request->validated();

        $video->update($validatedData);

        if ($request->hasFile('video')) {
            $video->clearMediaCollection('videos');

            $video->addMediaFromRequest('video')->toMediaCollection('videos');
        }

        return response()->json($video);
    }



    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        $video->delete();
        return response()->json(['message' => 'Video deleted successfully']);
    }




public function uploadVideo(Request $request, $courseId)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'video' => 'required|file|mimes:mp4,mov,avi,wmv|max:20480',
    ]);

    $video = new Video();
    $video->course_id = $courseId;
    $video->title = $request->input('title');
    $video->save();

    $video->addMedia($request->file('video'))->toMediaCollection('video');

    return response()->json([
        'message' => 'Video uploaded successfully',
        'video' => $video,
    ], 201);
}


public function downloadVideo($id)
{
    $video = Video::findOrFail($id);
    $media = $video->getFirstMedia('videos');

    if (!$media) {
        return response()->json(['message' => 'Video not found'], 404);
    }

    return response()->download($media->getPath(), $media->file_name);
}

}
