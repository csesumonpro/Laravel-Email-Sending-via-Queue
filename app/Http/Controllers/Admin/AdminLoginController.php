<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminMailVerify;

use Illuminate\Support\Carbon;
use App\Notifications\EmailVerifyNotification;

class AdminLoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:admin', ['except' => ['logout']]);
    }
    public function show_registration_form()
    {
      return view('admin.auth.register');
    }
    public function show_login_form()
    {
      return view('admin.auth.login');
    }
    public function register(Request $request){
       $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
       ]);
        $user = Admin::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'token'=>Str::uuid(),
      ]);
    // Used for sending verification email notification
       $user->notify(new EmailVerifyNotification($user));   
    //  Used for sending verification mail via mail  
      // Mail::to($request->email)->queue(new AdminMailVerify($user));
        return back()->with('success','Registration Complete Please Verify Your Email...'); 
    }
    public function login(Request $request)
    {
    $user = Admin::where('email',$request->email)->first();
      if($user){
        if($user->email_verified_at != null){
          if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('admin.dashboard'));
          } 
        }else{
          return back()->with('warning','Your are verified user...!'); 
        }
    
      }else{
        return back()->with('warning','Your are not registered user...!'); 
      }
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);
     
      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }
    
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
    public function verify_admin($token=null)
    {
      $user = Admin::where('token',$token)->first();
      if($user){
        $user->token = '';
        $user->email_verified_at = Carbon::now();
        $user->save();
        return redirect()->route('admin.login')->with('success','Your Account Successfully Verified Please Login...'); 
      }else{
        return back()->with('warning','Your Verification Token Not Match...!'); 
      }
      
    }
}
