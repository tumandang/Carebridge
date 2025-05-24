<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Volunteers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;


class AuthController extends Controller
{

    //register
    public function createvolunteer(){
        return view ('register');
    }

    public function storevolunteer(Request $request){

        $request->validate([
            'email'=> 'required|email|unique:users',
            'name'=> 'required|string|unique:users',
            'password'=> 'required|min:7|confirmed',
        ]);

        $volunteer = new User();
        
       
        $volunteer->email = $request->email;
        $volunteer->name = $request->name;
        $volunteer->password = Hash::make($request->password);
        $volunteer->is_volunteer = true;
        $volunteer->save();
        
        FacadesAuth::login($volunteer);

        $vol = new Volunteers();
        $vol->user_id = $volunteer->id;
        $vol->save();
        return redirect()->route('homepage.show');

    }

    //login volunteer
    public function loginvolunteer(){
        return view ('login');
    }

    public function logmasukvolunteer(Request $request){
        $request->validate([
            'email'=> 'email|required',
            'password'=> 'required',
        ]);
        $data =$request->only('email','password');//panggil request spesific data
        
        if (FacadesAuth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->route('homepage.show');
        } else {
            return redirect()->back()->with('gagal', 'Email atau Password anda salah') ;
        }
        
       
        
        
    }


    //login admin
    public function loginadmin(){
        return view('Admin.loginadmin');
    }

    public function logmasukadmin(Request $request){
        $request->validate([
            'email'=> 'email|required',
            'password'=> 'required',
        ]);
        $data = $request->only('email','password');//panggil request spesific data
        
        if (FacadesAuth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard.show');
        } else {
            return redirect()->back()->with('gagal', 'Email atau Password anda salah') ;
        }
        
       
        
        
    }

    public function reset(Request $request){
        $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
    }

     public function showResetForm(Request $request, $token = null)
    {
        return view('auth.reset')->with(['token' => $token, 'email' => $request->email]);
    }


}
