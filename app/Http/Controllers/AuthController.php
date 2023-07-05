<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\SubjectsPerDay;
use App\Mail\MailNotify;
use Mail;

class AuthController extends Controller
{
    public function login_view() {
        return view('auth.login');
    }

    public function register_view() {
        return view('auth.register');
    }

    public function logout() {
        Session::flush();
        Auth::logout();
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

        if ($request->email == 'admin@gmail.com' && $request->lpassword == 'admin@password') {
            $request->session()->put('admin', "admin");
            return redirect('admin')->with('success', 'Welcome to Study Tuddy Admin Panel!!!');
        }
        
        if(Auth::attempt(['email' => $request->email, 'password' => $request->lpassword])) {
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

        $id = rand(1111111111, 9999999999);

        $user = new User();
        $user->id = $id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->rpassword);
        $user->save();
        
        // User::create([
        //     'id' => rand(1111111111, 9999999999),
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => \Hash::make($request->rpassword),
        // ]);

        $subjectPerDay = new SubjectsPerDay();
        $subjectPerDay->id = $id;
        $subjectPerDay->save();

        return redirect('login')->with('success', 'Registration Completed Successfully! Please Login now');
    }

    public function sendCode(Request $request) {
        $rules = [
            'email' => 'required|email',
        ];

        $this->validate($request, $rules);

        $code = rand(111111, 999999);

        $users = DB::table('users')->where('email', $request->email)->get();

        if (count($users) == 0) {
            return back()->with('error','This email is not registered in our system.');
        }

        $user = User::find($users[0]->id);
        $user->remember_token = $code;
        $user->save();

        $data = [
            "subject"=>"Reset Password",
            "body"=>"Hello friend Here is your verification code! Please use to reset password " . $code
            ];
          // MailNotify class that is extend from Mailable class.
          try
          {
            Mail::to($request->email)->send(new MailNotify($data));
            return redirect('entercode/'.$request->email)->with('success','Code is successfully sent to your email address.');
          }
          catch(Exception $e)
          {
            return back()->with('error','Some Error Occurred. Please Try Again!');
          }
    }

    function checkCode(Request $request) {
        $users = DB::table('users')->where('email', $request->rowId)->get();

        if ($request->code == $users[0]->remember_token) {
            return redirect('updatepassword/'.$request->rowId)->with('success', 'You can update password now.');
        }

        return back()->with('error','Incorrect Code. Please Try Again!');
    }

    function update(Request $request) {
        $rules = [
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

        DB::table('users')->where('email', $_POST['rowId'])->update(['password' => Hash::make($request->rpassword)]);
        return redirect('login')->with('success', 'Password is updated.');
    }
}
