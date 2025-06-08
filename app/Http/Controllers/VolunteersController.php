<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Models\Volunteers;
use App\Models\Application;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VolunteersController extends Controller
{
    public function index()
    {

        $userId = Auth::id();
        $vol = Volunteers::where('user_id', $userId)->first();
        // dd($volunteer);
        return view('profile', ['vol' => $vol]);
    }


    public function create()
    {

        return view('profile.create');
    }

    public function update(Request $request)
    {

        
        // return $request->file('poster')->store('poster-images');
        $request->validate([
            'fullname' => 'required|string|max:255',
           
            'telephone' => [
                'required',
                'regex:/^(\+?6?01)[02-46-9]-*[0-9]{7}$|^(\+?6?01)[1]-*[0-9]{8}$/'
            ],
            // 'skills' => 'required'|'array'
        ]);
        //  dd($request->all());
        $userId = Auth::id();
        $vol = Volunteers::where('user_id', $userId)->first();
        if ($request->hasFile('profile')) {
            $profile = $request->file('profile')->store('profile-images', 'public');
            if ($vol->Profile) {
                Storage::delete($vol->Profile);
            }
            $vol->Profile = $profile;
        }
        $vol->Fullname = $request->fullname;
        $vol->Age = $this->age($request->age);
        $vol->Notel = $request->telephone;
        $vol->Gender = $request->gender;
        $vol->Skill = $request->has('skills') ? implode(',', $request->input('skills')) : null;
        $vol->save();
        return redirect()->route('profile.index', ['id' => $vol->id])->with('success', 'Profile Berjaya Dikemaskini');
    }

    public function age($date)
    {
        $year = date("Y", strtotime($date));
        $currentyear = date("Y");
        $umur = $currentyear - $year;
        return $umur;
    }

    public function uploadCgpa(Request $request)
    {
        $request->validate([
            'cgpa_file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $userId = Auth::id();
        $vol = Volunteers::where('user_id', $userId)->first();

        $path = $request->file('cgpa_file')->store('cgpa_files', 'public');
        $vol->cgpa_file = $path;
        $vol->save();
        //  return redirect()->route('program.apply', ['program' => $request->program_id])->with('cgpa_uploaded', true);
        
         return back()->with('success', 'CGPA file uploaded. You can now apply for the international program.');


    }

    public function trackstatus()
    {
        $userId = Auth::id();
        $vol = Volunteers::where('user_id', $userId)->first();
        $application = Application::with('program')
            ->where('volunteer_id', $vol->id)
            ->get();
        $selectedApplication = $application->first();
        return view('track', compact('application', 'selectedApplication'));
    }

    public function viewStatus($id)
    {
        $userId = Auth::id();
        $vol = Volunteers::where('user_id', $userId)->first();
        $application = Application::with('program')->where('volunteer_id', $vol->id)->get();
        $selectedApplication = $application->where('id', $id)->first();

        return view('track', [
            'application' => $application,
            'selectedApplication' => $selectedApplication
        ]);
    }

    public function dashboard(){

        if (!auth()->check()) {
        
        $branchcount = Admin::count();
        $totalprogram = Program::count();
        $status = Program::where('status', 'International')->count();

        return view('landingpage', compact('branchcount', 'totalprogram', 'status'));
    }
        $branchcount = Admin::count();
        $totalprogram = Program::count();
        $status = Program::where('status', 'International')->count();

        return view('home',compact('branchcount','totalprogram','status'));

    }
}
