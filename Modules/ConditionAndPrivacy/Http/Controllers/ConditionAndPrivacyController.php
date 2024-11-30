<?php

namespace Modules\ConditionAndPrivacy\Http\Controllers;

use App\Helpers\ApiResource;
use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\ConditionAndPrivacy\Http\Requests\StoreRequest;
use Modules\ConditionAndPrivacy\Http\Requests\UpdateRequest;
use Modules\ConditionAndPrivacy\Services\ConditionAndPrivacyService;
use Modules\ConditionAndPrivacy\Transformers\ConditionAndPrivacyResource;

class ConditionAndPrivacyController extends Controller
{
    use HttpResponse;
    public $ConditionAndPrivacy;
    public function __construct(ConditionAndPrivacyService $ConditionAndPrivacy)
    {
        $this->ConditionAndPrivacy = $ConditionAndPrivacy;
    }




    public function show()
    {
        $data = $this->ConditionAndPrivacy->show();
        return $this->okResponse(new ConditionAndPrivacyResource($data));
    }

    public function update( UpdateRequest $request)
    {

        $validation = $request->validated();

        $data =  $this->ConditionAndPrivacy->update( $validation);

        return $this->okResponse(new ConditionAndPrivacyResource($data));
    }


}
