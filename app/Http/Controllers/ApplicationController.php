<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Program;
use App\Models\Volunteers;
use App\Models\Application;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewApplicationNotification;
use App\Notifications\VolunteerNoti;

class ApplicationController extends Controller
{
    public function index(Program $program)
    {

        $applications = $program->applications()->with('volunteer.user')->get();
        return view('Admin.applicant', [
            'applicant' => $program,
            'applicants' => $applications
        ]);
    }

    

    public function store(Program $program)
    {
        $userId = Auth::id();
        $vol = Volunteers::where('user_id', $userId)->first();

        //check profile volunteer dah isi ke blom
        if (empty($vol->Fullname) || empty($vol->Notel) || empty($vol->Age) || empty($vol->Gender)) {
            return redirect()->route('profile.index')->with('error', 'Please complete your profile before applying.');
        }

        if ($program->status == 'International' && empty($vol->cgpa_file)) {
           
            

            return back()->with('show_cgpa_modal', true);

            
        }

        //check volunteer dah apply ke blom
        $applied = Application::where('program_id', $program->program_id)->where('volunteer_id', $vol->id)->exists();

        if ($applied) {
            return back()->with('error', 'You already applied this program, Please check your inbox.');
        }

        Application::create([
            'status' => 'pending',
            'remark' => '',
            'read'   => 0,
            'program_id' => $program->program_id,
            'volunteer_id' => $vol->id
        ]);
        $admin = User::where('is_volunteer', false)->first();
        $admin->notify(new NewApplicationNotification($vol->Fullname, $program->title));


        return redirect()->back()->with('success', 'Your application has been submitted.');
    }

    public function accept($id)
    {
        $applicant = Application::findOrFail($id);
        $applicant->status = 'Accepted';
        $applicant->remark = 'none';
        $applicant->save();

        $volunteer = $applicant->volunteer;
        $user = $volunteer->user;
        $user->notify(new VolunteerNoti($volunteer->Fullname,$applicant->program->title,$applicant->status,$applicant->program->linkgroup));


        return back()->with('success', 'Application accepted.');
    }

    public function reject(Request $request, $id)
    {
        $request->validate([
            'remark' => 'required|string|max:255',
        ]);

        $applicant = Application::findOrFail($id);
        $applicant->status = 'Rejected';
        $applicant->remark = $request->input('remark');
        $applicant->save();
        $volunteer = $applicant->volunteer;
        $user = $volunteer->user;
        $user->notify(new VolunteerNoti($volunteer->Fullname,$applicant->program->title,$applicant->program->status,$applicant->program->linkgroup));

        return back()->with('success', 'Application accepted.');
    }
}
