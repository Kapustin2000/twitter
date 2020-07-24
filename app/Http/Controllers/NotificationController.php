<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index(){
        return view('notifications.index', ['notifications' => user()->unreadNotifications->sortBy('created_at')]);
    }
}
