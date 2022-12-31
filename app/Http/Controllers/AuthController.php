<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login_view() {
        return view('auth.login');
    }

    public function register_view() {
        return view('auth.register');
    }

    public function logout() {
        \Session::flush();
        \Auth::logout();
        return redirect('login')->with('success', 'Logged out Successfully!');
    }

    public function login(Request $request) {
        $rules = [
            'email' => 'required|email',
            'lpassword' => 'required|min:8',
        ];

        $customMessage = [
            'lpassword.required' => 'The password field is required.',
            'lpassword.min' => 'The password must be at least 8 characters.',
        ];

        $this->validate($request, $rules, $customMessage);
        
        if(\Auth::attempt(['email' => $request->email, 'password' => $request->lpassword])) {
            $request->session()->put('email', $request->email);
            return redirect('home')->with('success', 'Welcome to Study Tuddy!!!');
        }

        return back()->with('error','Login Information is not valid. Please Try Again!');
    }

    public function register(Request $request) {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'rpassword' => 'required|min:8',
            'repassword' => 'required|min:8|same:rpassword',
        ];

        $customMessage = [
            'rpassword.required' => 'The password field is required.',
            'rpassword.min' => 'The password must be at least 8 characters.',
            'repassword.same' => 'The password confirmation does not match.',
            'repassword.required' => 'The password field is required.',
            'repassword.min' => 'The password must be at least 8 characters.',
        ];

        $this->validate($request, $rules, $customMessage);
        
        User::create([
            'id' => rand(1111111111, 9999999999),
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make($request->rpassword),
        ]);

        return redirect('login')->with('success', 'Registration Completed Successfully! Please Login now');
    }
}
