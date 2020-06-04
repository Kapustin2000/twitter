<?php
namespace App\Services;

use App\Http\Requests\ProfileRequest;
use App\Services\Interfaces\ImageUploadInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

Class ProfileImageService implements ImageUploadInterface{


    protected $image;

    public function handleImageUpload($image)
    {
        $this->image =$image;

        if($this->canHandleImage()){
             return $this->save();
        }

        return '';
    }


    protected function canHandleImage()
    {
        return $this->image !== null;
    }


    protected function save(){
        $filePath = '/'.Auth::id();

        return Storage::disk('images')->put($filePath, $this->image);
    }
}