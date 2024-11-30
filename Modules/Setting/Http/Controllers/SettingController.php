<?php

namespace Modules\Setting\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\Setting\Http\Requests\SettingRequest;
use Modules\Setting\Models\Setting;
use Modules\Setting\Transformers\SettingResource;

class SettingController extends Controller
{
   use HttpResponse;

   public function show ()
   {
    $footer = Setting::query()->first();
    return $this->resourceResponse(SettingResource::make($footer));

   }


   public function update (SettingRequest $request)
   {
         $footer = Setting::query()->first();
         $footer->update($request->validated());
         return $this->okResponse(SettingResource::make($footer));
   }
}
