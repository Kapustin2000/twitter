<?php

namespace App\Services\Interfaces; 


use App\Http\Requests\ProfileRequest;
use App\Models\User;

interface ProfileInterface{
    public function update(User $user, ProfileRequest $request);
}