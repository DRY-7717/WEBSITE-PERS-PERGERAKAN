<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\Return_;

class AuthController extends Controller
{
    //
    public function signin()
    {
        return view('auth.signin', [
            'title' => 'Pers pergerakan | Sign in',
            'categories' => Category::all(),
        ]);
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard/post');
        }

        return redirect('/auth/signin')->with('message', '<div class="alert alert-danger" role="alert">
        Username or password is wrong!
      </div>');
    }
    public function registrasi()
    {
        return view('auth.register', [
            'title' => 'Pers pergerakan | Registrasi',
            'categories' => Category::all(),
        ]);
    }

    public function registered(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|unique:users',
            'email' => 'required|email:dns|unique:users',
            'komisariat' => 'required',
            'alamat' => 'required',
            'ttl' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['role'] = 2;

        User::create($validatedData);

        return redirect('/auth/signin')->with('message', '<div class="alert alert-success" role="alert">
        Congratulations, your account has been created!
      </div>');;
    }
    public function showforgotpassword()
    {
        return view('auth.forgotpassword', [
            'title' => 'Pers pergerakan | Forgot password',
            'categories' => Category::all(),
        ]);
    }
    public function sendlinkforgotpassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $token =  Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        $action_link = route('auth.showresetpassword', [
            'token' => $token,
            'email' => $request->email
        ]);
        $body = "We are received a request to the reset the password for <b>Pers Pergerakan website</b> account associated with " . $request->email . ". You can reset your password by clicking the link below : ";

        Mail::send('auth.email-forgot', [
            'action_link' => $action_link,
            'body' => $body,
        ], function ($message) use ($request) {
            $message->from('wicaksanabimaarya@gmail.com', 'Pers Pergerakan');
            $message->to($request->email)->subject('Reset password');
        });
        return redirect('/auth/forgotpassword')->with('message', '<div class="alert alert-success" role="alert">
        Please check email, I have send email to ' . $request->email . '
      </div>');
    }

    public function showresetpassword(Request $request, $token = null)
    {

        return view('auth.showresetpassword', [
            'title' => 'Pers pergerakan | Reset password',
            'email' => $request->email,
            'token' => $token,
            'categories' => Category::all(),
        ]);
    }
    public function resetpassword(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8',
            'cpassword' => 'required|same:password',
        ]);

        $check_token = DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();



        if (!$check_token) {
            return redirect('/auth/signin')->with('message', '<div class="alert alert-danger" role="alert">
            Invalid token
          </div>');
        } else {
            User::where('email', $request->email)
                ->update([
                    'password' => Hash::make($request->password),
                ]);

            DB::table('password_resets')->where([
                'email' => $request->email,
            ])->delete();

            return redirect('/auth/signin')->with('message', '<div class="alert alert-success" role="alert">
            Congratulations!, your password has been changed. Now you can login with the new password!
          </div>');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
