<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index(){
       return view('login');
    }

    public function login(Request $request ){

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'isAdmin' => 1])){

            return  redirect()->route('admin.index');
        }
        else {
            return  redirect()->back()->with('errors','Login ou Senha estão incorretos!');
        }

     }

     public function logout(){
         Auth::logout();
         return  redirect()->route('login');
     }
}