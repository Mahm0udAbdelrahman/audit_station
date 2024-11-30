<?php

namespace Modules\AboutUs\Http\Controllers;

use App\Helpers\ApiResource;
use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\AboutUs\Http\Requests\PostRequest;
use Modules\AboutUs\Models\AboutUs;
use Modules\AboutUs\Transformers\AboutResource;

class AboutUsController extends Controller
{
    use HttpResponse;

   public function show()
   {

       $data = AboutUs::first();
        return $this->okResponse(new AboutResource($data));
     }

   public function update(PostRequest $request)
   {
        $request->validated();
        $data = $request->except(['image']);


        $about = AboutUs::first();
        if(!$request->has('title')) {
            $data['title'] = $about->title;
        }
        if(!$request->has('description')) {
            $data['description'] = $about->description;
        }
        $about->update($data);
        if ($request->hasFile('image'))
        {

            $oldimage = $about->getFirstMedia('about_us_image');
            if ($oldimage) {
                $oldimage->delete();
            }

            $uploadedimage = $about->addMediaFromRequest('image')->toMediaCollection('about_us_image');


        }
        return $this->okResponse(new AboutResource($about));

   }


}
