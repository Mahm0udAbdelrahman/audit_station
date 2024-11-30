<?php

namespace Modules\Course\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\Course\Http\Requests\SectionRequest;
use Modules\Course\Models\Course;
use Modules\Course\Models\Section;
use Modules\Course\Transformers\SectionResource;

class SectionController extends Controller
{
   use HttpResponse;

   public function show($id){
            $section = Section::query()->findOrFail($id);
            return $this->resourceResponse(SectionResource::make($section));
      }
   public function create(SectionRequest $request){
         $course = Course::query()->findOrFail($request->course_id);
         $section=$course->sections()->create($request->validated());
         return $this->createdResponse(SectionResource::make($section));
   }
   public function update(SectionRequest $request){
         $section = Section::query()->findOrFail($request->id);
         $section->update($request->validated());
         return $this->okResponse(SectionResource::make($section));
   }

      public function destroy($id){
            $section = Section::query()->findOrFail($id);
            $section->delete();
      }
}
