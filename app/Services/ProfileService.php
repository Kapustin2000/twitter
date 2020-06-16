<?php
namespace App\Services;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use App\Services\Interfaces\ImageUploadInterface;
use App\Services\Interfaces\ProfileInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

Class ProfileService implements ProfileInterface {
    
    protected $service;

    public function __construct(ImageUploadInterface $service)
    {
        $this->service = $service; 
    }

    public function update(User $user, ProfileRequest $request)
    {
        $attributes = $request->all();

        $attributes['avatar'] =  $this->service->handleImageUpload($request->file('avatar')) ?: $user->avatar;
        $attributes['banner'] =  $this->service->handleImageUpload($request->file('banner')) ?: $user->banner;

        $attributes['password'] = Hash::make($request->input('password'));
        
        return $user->update($attributes);

    }

}