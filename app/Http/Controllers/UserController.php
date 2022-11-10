<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function home(){
        return view('home');
    }

    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function auth_login(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('home');
        }
        else{
            return redirect()->route('auth.login')->with('message','Invalid username or password!');
        }
    }

    public function auth_register(Request $request){
        if ($request -> isMethod('POST')){
            $user = DB::table('users') -> where('email', $request->email)->first();

            if(!$user){
                $newUser = new User();
                $newUser->email = $request->email;
                $newUser->name = $request->name;
                $newUser->password = $request->password;
                $newUser->save();
                return redirect()->route('auth.login')->with('successf','Register succesful!');
            }
            else{
                return redirect()->route('auth.register')->with('message','Account exist!');
            }

        }
    }
}
?>
