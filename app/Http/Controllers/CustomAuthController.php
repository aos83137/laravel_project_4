<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Str;
use Mail;
use App\Mail\verifyEmail;
use Session;

class CustomAuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('custom.register');
    }

    public function register(Request $request)
    {
        $this->validate($request,[
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'unique:users', 'max:255'],
            'password' => ['required', 'confirmed', 'max:255'],
        ]);

        Session::flash('status', '등록을 위해 이메일을 확인하시오.');
        $user = User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>bcrypt($request->input('password')),
            'verifyToken'=>Str::random(40),
        ]);

        $thisUser = User::findOrFail($user->id);
        $this->sendEmail($thisUser);

        return redirect(route('custom.login'));
        // $this->validation($request);
        // $request['password'] = bcrypt($request->password);
        // User::create($request->all());
        
    }

    public function verifyEmailFirst()
    {
        return view('emails/verifyEmailFirst');
    }

    public function sendEmail($thisUser)
    {
        Mail::to($thisUser['email'])->send(new verifyEmail($thisUser));
    }

    public function sendEmailDone($email, $verifyToken)
    {
        $user = User::where(['email'=>$email, 'verifyToken' => $verifyToken])->first();
        if($user){    
            return user::where(['email'=>$email, 'verifyToken' => $verifyToken])->update(['status'=>'1','verifyToken'=>NULL]);   
        }
        else{
            return 'user not found';
        }
    }

    public function showLoginForm()
    {
        return view('custom.login');
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'max:255'],
        ]);

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {    
            return redirect('/');
        }
        
        return back()->withErrors("이메일 혹은 비밀번호가 맞지 않습니다.");
    }


    // public function validation($request)
    // {
    //     return $validatedData = $request->validate([
    //             'name' => ['required', 'max:255'],
    //             'email' => ['required', 'email', 'unique:users', 'max:255'],
    //             'password' => ['required', 'confirmed', 'max:255'],
    //         ]);
    // }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    public function __construct()
    {
        $this->middleware('guest',['except' => 'logout']);
    }
}
