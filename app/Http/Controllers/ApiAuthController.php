<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ApiAuthController extends Controller
{
    public function register(Request $request){

        $validate = Validator::make($request->all(),[
            'name'=>['required','string','max:255'],
            'email'=>['required','email','unique:users,email','max:255'],
            'password'=>['required','string','confirmed','min:6','max:30'],
        ]);
        if($validate->fails()){
            return response()->json([
                'errors'=> $validate->errors(),
            ],404);
        }
        $access_token = Str::random(64);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password'=>bcrypt($request->password),
            'access_token'=> $access_token,
        ]);

        return response()->json([
            'access_token'=>$access_token,
        ],201);
    }

    public function login(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'email'=>['required','email','max:255'],
            'password'=>['required','string','min:6','max:30'],
        ]);
        if($validate->fails()){
            return response()->json([
                'errors'=> $validate->errors(),
            ],409);
        }

        $user = User::where('email' , '=' , $request->email)->first();
        if ($user) {
            $pass = Hash::check($request->password , $user->password);
            if ($pass) {
                $access_token = Str::random(64);
                $user->update(['access_token'=>$access_token]);
                return response()->json(['access_token'=>$access_token]);
            } else {
                return response()->json(['msg'=>'password not correct']);
            }
        } else {
            return response()->json(['msg'=>'email not correct']);
        }
    }

    public function logout(Request $request){
        $access_token = $request->header('access_token');
        $user = User::where('access_token','=',$access_token)->first();
        if ($user) {
            $user->update([
                'access_token'=>null,
            ]);
            return response()->json([
            'msg'=> 'logged out successfully',
        ],200);
        }

    }
}
