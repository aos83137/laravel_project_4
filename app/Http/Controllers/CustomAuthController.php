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
        User::create($request->all());
        return redirect('/')->with('Status', 'You are registed');
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
        // flash('이메일 또는 비밀번호가 맞지 않습니다');

        // return back()->withInput();
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
