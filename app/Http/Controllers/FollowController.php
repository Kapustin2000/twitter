<?php

namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function store(User $user)
    {
        return Auth::user()->follow($user);
    }
}
