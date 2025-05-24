<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function markAsRead($id)
{
    $notification = DatabaseNotification::findOrFail($id);
    if ($notification->notifiable_id == auth()->id()) {
        $notification->markAsRead();
    }

    return redirect()->back();
}
}
