<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexLogin()
    {
        return view('auth.login');
    }

    public function indexRegister()
    {
        return view('auth.register');
    }


    public function authenticateRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'confirmPassword' => 'required|same:password',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role = "user";
        $user->save();

        return redirect()->route('loginPage');
    }

    public function authenticateLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            Cookie::queue('LoginCookie', $request->input('email'), 5); // 5 minute save cookie
            return redirect('/home');
        } else {
            return redirect()->back()->withErrors(['creds' => 'Invalid Accounts']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('loginPage');
    }

    public function indexHome()
    {
        return view('home.index');
    }
}
