<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showForm(){
        return view('login');
    }
    public function login(Request $request){
        $email=$request->input('email');
        $password= $request->input( 'password');

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        $credentials=[
            'email' => $email,
            'password'=>$password
        ];

        if(Auth::attempt($credentials)){
            $request->session() ->regenerate();
            return to_route('homepage');
        }else{
            return back()->withErrors([
                'email' => 'email ou mot de pass incorrect'
            ])->onlyInput('email');        };
    }
    public function logout (){
    //suprimer la session
        Session::flush() ;
        Auth::logout();
        return redirect()->route('login');
    }
}
