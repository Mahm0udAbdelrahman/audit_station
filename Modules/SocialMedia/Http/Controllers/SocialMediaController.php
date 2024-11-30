<?php

namespace Modules\SocialMedia\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\SocialMedia\Http\Requests\StoreRequest;
use Modules\SocialMedia\Services\SocialMediaService;
use Modules\SocialMedia\Transformers\SocialMediaResource;

class SocialMediaController extends Controller
{
    use HttpResponse;
    public $SocialMedia;
    public function __construct(SocialMediaService $SocialMedia)
    {
        $this->SocialMedia = $SocialMedia;
    }

    public function index()
    {
        $data = $this->SocialMedia->index();
        return $this->paginatedResponse($data, SocialMediaResource::class);
    }

    public function store(StoreRequest $request)
    {
        $validation = $request->validated();
        $data = $this->SocialMedia->store($validation);

        return $this->okResponse(new SocialMediaResource($data));
    }

    public function show($id)
    {
        $data = $this->SocialMedia->show($id);
        return $this->okResponse(new SocialMediaResource($data));
    }

    public function update($id, StoreRequest $request)
    {
        $validation = $request->validated();

        $data =  $this->SocialMedia->update($id, $validation);

        return $this->okResponse(new SocialMediaResource($data));
    }

    public function destroy($id)
    {
        $this->SocialMedia->destroy($id);

        return response()->json(['message' => 'SocialMedia deleted successfully']);
    }
}
