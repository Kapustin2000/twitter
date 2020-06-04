<?php

namespace App\Services\Interfaces;
use Illuminate\Support\Facades\Request;


interface ImageUploadInterface{
    public function handleImageUpload(Request $request);
}