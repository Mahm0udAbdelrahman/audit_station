<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait Imageable
{

    public function setImageAttribute($value, $oldImage = null)
    {
        if (isset($value)) {
            // Delete the old image if it exists
            if ($oldImage && $oldImage != NULL) {
                Storage::disk('public')->delete('uploads/images/' . $oldImage);
            }

            // Save the new image
            $imageName = time() . '.' . $value->getClientOriginalExtension();
            $destinationPath = storage_path('app/public/uploads/images');
            $value->move($destinationPath, $imageName);


            return  $imageName;
        }
    }

    public function setVideoAttribute($value, $oldVideo = null)
    {
        // تحقق مما إذا كان المفتاح 'video' موجودًا
        if (isset($value)) {
            // Delete the old video if it exists
            if ($oldVideo && $oldVideo != NULL) {
                Storage::disk('public')->delete('uploads/videos/' . $oldVideo);
            }

            // Save the new video
            $videoName = time() . '.' . $value->getClientOriginalExtension();
            $destinationPath = storage_path('app/public/uploads/videos');
            $value->move($destinationPath, $videoName);
            return $videoName;
        }
    }








}
