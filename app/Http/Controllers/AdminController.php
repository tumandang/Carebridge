<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Program;
use App\Models\Application;
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

    public function Dashboard(){
        $applications = Application::with('volunteer', 'program')->latest()->get();
        $topPrograms = Program::withCount('volunteers') ->orderByDesc('volunteers_count')->take(5)->get();
        $branchcount = Admin::count();
        $totalprogram = Program::count();
        $status = Program::where('status', 'International')->count();
        return view('Admin.dashboard',compact('applications','topPrograms','branchcount','totalprogram','status'));

    }
}
