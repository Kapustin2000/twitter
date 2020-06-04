<?php
namespace App\Services;

use Illuminate\Support\Facades\Request;

Class AvatarService implements ImageUploadInterface{

    public function handleImageUpload(Request $request)
    {
         dd($request);
    }


    protected function canHandleImage()
    {
        // TODO: Implement handleImageUpload() method.
    }
}