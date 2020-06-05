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
    
    protected $user;
    protected $service;

    public function __construct(User $user, ImageUploadInterface $service)
    {
        $this->service = $service;
        $this->user = $user;
    }

    public function update(ProfileRequest $request)
    {
        $attributes = $request->all();

        $attributes['avatar'] =  $this->service->handleImageUpload($request->file('avatar')) ?: $this->user->avatar;
        $attributes['banner'] =  $this->service->handleImageUpload($request->file('banner')) ?: $this->user->banner;

        $attributes['password'] = Hash::make($request->input('password'));
        
        return $this->user->update($attributes);

    }

}