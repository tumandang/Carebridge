<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
public function showNotifications()
    {
        $notifications = Auth::user()->notifications;
        $unread = Auth::user()->unreadNotifications->count();
         return view('Admin.inbox',compact('notifications','unread'));
    }
}
