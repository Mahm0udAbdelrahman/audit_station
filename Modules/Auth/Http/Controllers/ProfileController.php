<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\Auth\Http\Requests\Profile\UpdateRequest;
use Modules\Auth\Services\ProfileService;
use Modules\Auth\Transformers\ProfileResource;

class ProfileController extends Controller
{

    use HttpResponse;
    public $profile;

    public function __construct(ProfileService $profile)
    {
        $this->profile = $profile;
    }
    public function showProfile()
    {
        $data = $this->profile->showProfile();
        return $this->okResponse(message: 'Data was displayed successfully', data: new ProfileResource($data));
     }
    public function profile(UpdateRequest $request)
    {
        $data = $this->profile->profile($request->validated());
        return $this->okResponse(message: 'The data has been modified successfully', data: new ProfileResource($data));
     }
}
