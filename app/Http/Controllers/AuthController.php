<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('dashboard\auth\register');
    }
    public function register(Request $request)
    {
        $request -> validate([
            'name'=>['required','string','max:255'],
            'email'=>['required','email','unique:users,email','max:255'],
            'password'=>['required','string','confirmed','min:6','max:30'],
            'role' => "required|exists:users,role",
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password'=>bcrypt($request->password),
        ]);

        Auth::login($user);
        $email = $request->email;
        $user = User::where('email','like',"%$email%")->select('id','name','role')->get();
        session()->put('userName',$user[0]->name);
        session()->put('role',$user[0]->role);
        return redirect('/');
    }

    public function loginForm()
    {
        return view('dashboard\auth\login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=>"required|string|max:255",
            'password'=>"required|string|max:30|min:6",
        ]);

        $isLogin = Auth::attempt(['email'=>$request->email ,'password'=>$request->password]);
        if (! $isLogin) {
            session()->flash('error-msg','Credential Not Correct');
            return back();
        }else{
            $email = $request->email;
            $user = User::where('email','like',"%$email%")->select('id','name','role')->get();
            session()->put('userName',$user[0]->name);
            session()->put('role',$user[0]->role);
            return redirect('/');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');

    }
}
