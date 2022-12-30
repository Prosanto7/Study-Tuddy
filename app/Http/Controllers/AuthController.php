<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login_view() {
        return view('auth.login');
    }

    public function register_view() {
        return view('auth.register');
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
        return $request->all();
    }

    public function register(Request $request) {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'rpassword' => 'required|min:8',
            'repassword' => 'required|min:8',
        ];

        $customMessage = [
            'rpassword.required' => 'The password field is required.',
            'rpassword.min' => 'The password must be at least 8 characters.',
            'repassword.required' => 'The password field is required.',
            'repassword.min' => 'The password must be at least 8 characters.',
        ];

        $this->validate($request, $rules, $customMessage);
        return $request->all();
    }
}
