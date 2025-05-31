<?php

use App\Models\User;
use App\Models\Admin;
use App\Models\Program;
use App\Models\Mesasage;
use App\Models\Volunteers;

use App\Models\Application;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\AdminController;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\VolunteersController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Auth\VerificationController;

//landingpage


Auth::routes(['verify' => true]);

// Login Admin
Route::get('beliaharmoni/loginadmin',[AuthController::class,'loginadmin'])->name('login.admin');
Route::post('beliaharmoni/loginadmin',[AuthController::class,'logmasukadmin'])->name('logmasuk.admin');

// Dashboard admin
Route::get('beliaharmoni/dashboard',[AdminController::class,'Dashboard'])->name('dashboard.show');

// Volunteer Register
Route::get('/register', [AuthController::class,'createvolunteer'])->name('create.volunteer');
Route::post('/register', [AuthController::class,'storevolunteer'])->name('store.volunteer');

// Login volunteer
Route::get('/login', [AuthController::class,'loginvolunteer'])->name('login.volunteer');
Route::post('/login', [AuthController::class,'logmasukvolunteer'])->name('logmasuk.volunteer');

Route::get('/homepage', [VolunteersController::class,'dashboard'])->middleware(['auth', 'verified'])->name('homepage.show');


//verify
Route::get('/email/verify', [VerificationController::class, 'notice'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware(['signed'])->name('verification.verify');
Route::post('/email/resend', [VerificationController::class, 'resend'])->middleware(['throttle:6,1'])->name('verification.resend');


//reset
Route::get('/forgot-password', function () {
    return view('auth.email');
})->name('password.request');
Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
    $status = Password::sendResetLink($request->only('email'));
    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->name('password.email');
Route::get('password/reset/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);
 
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
            $user->save(); 
            event(new PasswordReset($user));
        }
    );
 
    return $status === Password::PasswordReset
        ? redirect()->route('login.volunteer')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->name('password.update');


//logoutadmin
Route::post('logoutadmin', [AuthController::class, 'logoutadmin'])->name('logoutadmin');
// //homepage
// Route::get('/homepage', function () {
//     return view('home');

// })->name('homepage.show');

// profile page
Route::get('/profile', function () {
    return view('profile');
    
});
//listing program for volunteer
Route::get('/postprograms',[ProgramController::class,'search'])->name('listingprogram');
Route::get('/filterprograms',[ProgramController::class,'filter'])->name('listingprogram');
// display details untuk selected program
Route::get('/program/{program:program_id}',function (Program $program){
    $vol = Volunteers::where('user_id', Auth::id())->first();
     return view('/prorgam', [
         'details' => $program,
         'vol' => $vol,
         
    ]);
    
    
});
Route::post('/program/{program:program_id}/apply', [ApplicationController::class, 'store'])->name('program.apply');
Route::post('/cgpa-upload', [VolunteersController::class, 'uploadCgpa'])->name('cgpa.upload');

Route::get('/resetpassword', function () {
    return view('resetpassword');
    
});
// Route::get('/applicationstatus', function () {
//     return view(
//         'track',
//         [
//             'application' => Program::all()
//         ]

//     );
    
// });

// Route::get('/inbox', function () {
//     return view('general',['messages'=>[
//         [
//             'message' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam odio impedit odit ipsam iste sequi hic harum earum? Voluptates quos inventore dolores officia possimus. Ipsum aspernatur ut quisquam magnam cumque.',
//             'sender' => 'Belia Harmoni Gambang',
//             'time' => '12hr'
//         ],
//         [
//             'message' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Asperiores soluta rerum quisquam dignissimos esse ab ea, laboriosam repudiandae, ex assumenda quos, excepturi possimus impedit? Iste quisquam exercitationem asperiores optio suscipit.',
//             'sender' => 'Belia Harmoni Gambang',
//             'time' => '12hr'
//         ],
//         [
//             'message' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam odio impedit odit ipsam iste sequi hic harum earum? Voluptates quos inventore dolores officia possimus. Ipsum aspernatur ut quisquam magnam cumque.',
//             'sender' => 'ABDUL SUMBUL',
//             'time' => '12hr'
//         ],
//         [
//             'message' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Asperiores soluta rerum quisquam dignissimos esse ab ea, laboriosam repudiandae, ex assumenda quos, excepturi possimus impedit? Iste quisquam exercitationem asperiores optio suscipit.',
//             'sender' => 'ISMAIL AHMAD KANABAWI',
//             'time' => '12hr'
//         ],
//         [
//             'message' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam odio impedit odit ipsam iste sequi hic harum earum? Voluptates quos inventore dolores officia possimus. Ipsum aspernatur ut quisquam magnam cumque.',
//             'sender' => 'ABDUL SUMBUL',
//             'time' => '12hr'
//         ],
//         [
//             'message' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Asperiores soluta rerum quisquam dignissimos esse ab ea, laboriosam repudiandae, ex assumenda quos, excepturi possimus impedit? Iste quisquam exercitationem asperiores optio suscipit.',
//             'sender' => 'ISMAIL AHMAD KANABAWI',
//             'time' => '12hr'
//         ],
//         [
//             'message' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam odio impedit odit ipsam iste sequi hic harum earum? Voluptates quos inventore dolores officia possimus. Ipsum aspernatur ut quisquam magnam cumque.',
//             'sender' => 'ABDUL SUMBUL',
//             'time' => '12hr'
//         ],
//         [
//             'message' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Asperiores soluta rerum quisquam dignissimos esse ab ea, laboriosam repudiandae, ex assumenda quos, excepturi possimus impedit? Iste quisquam exercitationem asperiores optio suscipit.',
//             'sender' => 'ISMAIL AHMAD KANABAWI',
//             'time' => '12hr'
//         ]
//     ]]);
    
// });

Route::get('/beliaharmoni/notifications', [AdminController::class, 'showNotifications'])->name('inbox');
Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');

Route:: get('/trackstatus', [VolunteersController::class,'trackstatus'] )->name('track');
Route::get('/trackstatus/{id}', [VolunteersController::class, 'viewstatus'])->name('track.view');

// Route::get('/inbox',[MesasageController::class,'index'])->name('inbox.index');
// Route::get('/inbox/{id}',[MesasageController::class,'show'])->name('inbox.show');

// Route::resource('programs', ProgramController::class);
Route ::get('/programs',[ProgramController::class,'index'])->name('program.index');
Route ::get('/programs/create',[ProgramController::class,'create'])->name('program.create');
Route ::post('/programs',[ProgramController::class,'store'])->name('program.store');
Route ::delete('/programs/delete/{program_id}',[ProgramController::class,'delete'])->name('program.delete');
Route ::get('/programs/edit/{program_id}',[ProgramController::class,'edit'])->name('program.edit');
Route ::put('/programs/update/{program_id}',[ProgramController::class,'update'])->name('program.update');


// UNTUK VOLUNTER PROFILE
Route ::get('/profile',[VolunteersController::class,'index']) -> name('profile.index');
Route ::put('/profile/update',[VolunteersController::class,'update'])->name('profile.update');



// Route::get('/editprogram', function () {
//     return view('admin/editprogram');
    
// });
// Route::get('/listingprogram', function () {
//     return view('programs/listingprogram',
//     ['programs'=>Program::all()]
// );
    
// });
// Route::get('/listingapplicant/{program}',function (Program $program){
//     return view('Admin/applicant', [
//         'applicant' => $program,
//         'applicants'=> $applicants
//     ]);
// });

Route::get('/listingapplicant/{program}',[ApplicationController::class,'index']);
Route::post('/applications/{id}/accept', [ApplicationController::class, 'accept'])->name('application.accept');
Route::post('/applications/{id}/reject', [ApplicationController::class, 'reject'])->name('application.reject');
// Route::get('/editprogram/{program}',function (Program $program){
//     // dd([
//     //     'id_from_url' => $id,
//     //     'all_program_ids' => array_column($programs, 'id'),
//     // ]);
//     //$program = Program::select($id);
//     return view('programs/editprogram', [
//         'editprogram' => $program
//     ]);
// });



