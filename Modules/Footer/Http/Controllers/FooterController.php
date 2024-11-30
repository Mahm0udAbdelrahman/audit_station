<?php

namespace Modules\Footer\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Footer\Http\Requests\FooterRequest;
use Modules\Footer\Models\Footer;
use Modules\Footer\Transformers\FooterResource;
use App\Traits\HttpResponse;

class FooterController extends Controller
{
    use HttpResponse;
   public function show ()
   {
         $footer = Footer::query()->first();
         return $this->resourceResponse(FooterResource::make($footer));
   }
   public function update (FooterRequest $request)
   {
         $footer = Footer::query()->first();
         $footer->update($request->validated());
         return $this->okResponse(FooterResource::make($footer));
   }

}
