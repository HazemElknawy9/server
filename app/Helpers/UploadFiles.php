<?php

namespace App\Helpers;

use Exception;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class UploadFiles
{
    

    public function uploadImage($image,$path){
        try {

            $imagee = Image::make($image)
                ->encode('jpg', 50);
            Storage::disk('local')->put('public/'.$path.'/' . $image->hashName(), (string)$imagee, 'public');
            return $image->hashName();
        } catch(Exception $e) {
            return null;
        }   
    }
   

}
