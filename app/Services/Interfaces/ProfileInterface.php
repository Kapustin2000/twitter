<?php

namespace App\Services\Interfaces; 


use App\Http\Requests\ProfileRequest;

interface ProfileInterface{
    public function update(ProfileRequest $request);
}