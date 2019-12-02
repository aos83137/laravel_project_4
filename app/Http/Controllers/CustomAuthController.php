<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class CustomAuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('custom.register');
    }

    public function register(Request $request)
    {
        $this->validation($request);
        $request['password'] = bcrypt($request->password);
        $request['confirm_code'] = $request->confirm_code;
        User::create($request->all());
        $confirmCode = str_random(60);

        \Mail::send('emails.auth.confirm', compact('user'), function($message) use($user)
        {
            $message->to($user->email);
            $message->subject(
                sprintf('[%s] 회원 가입을 확인해 주세요.', config('app.name'))
            );
        });

        flash('가입하신 메일 계정으로 가입 확인 메일을 보내드렸습니다. 가입 확인하시고 로그인해 주세요.');

        return redirect('/');
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


    public function validation($request)
    {
        return $validatedData = $request->validate([
                'name' => ['required', 'max:255'],
                'email' => ['required', 'email', 'unique:users', 'max:255'],
                'password' => ['required', 'confirmed', 'max:255'],
            ]);
    }

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
