<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthentificationController extends Controller
{
    public function showFormLogin()
    {
        return view('Authentification.login');
    }

    public function postLogin(Request $request)
    {
        $rules = [
            'email' => 'required|string',
            'password' => 'required|string',
        ];

        $this->validate($request, $rules);

        $user = User::where('email', $request->input('email'))->first();
    
        if ($user && Hash::check($request->input('password'), $user->password)) {
            Auth::login($user);

            if (Auth::user()->isAdmin()) {
                return redirect()->route('home')->with('success', 'You have successfully logged in');
            } else {
                return redirect()->route('homeUser')->with('success', 'You have successfully logged in');
            }
                        
        } else {
            return redirect()->back()->withErrors(['email' => 'Incorrect email or password'])->withInput();
        }
    }

    public function showformRegister()
    {
        return view('Authentification.register');
    }

    public function postRegister(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'confirmation_password' => 'required|same:password',
        ];

        $messages = [
            'confirmation_password.same' => 'The confirmation password must be the same as the password.',
        ];

        $this->validate($request, $rules, $messages);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'You have registered.');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        
        return redirect('/');
    }
}
