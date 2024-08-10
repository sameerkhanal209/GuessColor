<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\ReCaptcha;
use App\Mail\SignupEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function Login(){
        return view('Page.Auth.Login');
    }

    public function Signup(){
        return view('Page.Auth.Signup');
    }

    public function SignupPost(Request $request){
        $incoming = $request->validate([
            'username' => 'required|unique:users,username|min:4|max:20',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|confirmed|min:8',
            'g-recaptcha-response' => ['required', new ReCaptcha],
        ]);

        //Strip any html tags
        $incoming['username'] = strip_tags($incoming['username']);
        $incoming['email'] = strip_tags($incoming['email']);
        $incoming['password'] = strip_tags($incoming['password']);

        //Hash the password
        $incoming['password'] = bcrypt($incoming['password']);

        //Create a random string for activation_code
        // $incoming['activation_code'] = uniqid();

        $incoming['activation_code'] = "activated";

        //Create the account
        $user = User::create($incoming);
        auth()->login($user);

        //Send email to the user
        Mail::to($incoming['email'])->send(new SignupEmail([
            'username' => $incoming['username'],
            'link' => env('APP_URL') . '/activate?email=' . $incoming['email'] .'&code=' . $incoming['activation_code']
        ]));

        return redirect('/activate')->with('success', 'Your account has been created, please check your email address.');
    }

    public function LoginPost(Request $request){

        $incoming = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth()->attempt(['email' => $incoming['email'], 'password' => $incoming['password'] ])){
            $request->session()->regenerate();
            return redirect('/profile/'. auth()->user()->username);
        } else {
            return redirect('/login')->with('error', 'Email or password is incorrect!');
        }
        
    }

    public function LogoutAccount(){
        
        Session::flush();
        auth()->logout();

        return redirect('/login')->with('success', 'You have sucessfully logged out!');
    }

    public function ActivatePage(Request $request){

        if(auth()->check() && auth()->user()->activation_code == 'activated'){
            return redirect('/profile/'.auth()->user()->username);
        }

        if(isset($request['email']) && isset($request['code'])){

            $email = $request['email'];
            $code = $request['code'];

            $query = User::where([['email','=',$email],['activation_code','=',$code]]);
            $response = $query->get();

            if($response->count() > 0){

                $query->update(['activation_code'=>'activated']);

                if(auth()->check()){
                    return redirect('/profile/'.auth()->user()->username)->with('success', 'Your account has been activated.');
                } else {
                    return redirect('/login')->with('success', 'Your account has been activated. Please Login.');
                }
            }

            return redirect('/login')->with('error', 'An error occured, please try again.');

        } else if(auth()->check()) {

            $resend = isset($request['resend']) ? false : true;

            return view('Page.Auth.Activate', [
                "resend" => $resend,
            ]);

        } else {
            return redirect('/login')->with('error', "Please login to view this page.");
        }
    }

    public function ResendEmail(Request $request){

        if(auth()->check() && auth()->user()->activation_code == 'activated'){
            return redirect('/profile/'.auth()->user()->username);
        }
        
        $incoming = $request->validate([
            'g-recaptcha-response' => ['required', new ReCaptcha]
        ]);

        //Send email to the user
        Mail::to(auth()->user()->email)->send(new SignupEmail([
            'username' => auth()->user()->username,
            'link' => env('APP_URL') . '/activate?email=' . auth()->user()->email .'&code=' . auth()->user()->activation_code
        ]));

        return redirect('/activate?resend=true')->with('success', 'Activation email Resent.');
    }
}

