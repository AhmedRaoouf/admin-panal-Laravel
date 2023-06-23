<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(2);
        return view('dashboard.users.index',[
            'users' =>$users,
        ]);
    }
    // GET Request
    public function create()
    {
        return view('dashboard.users.index');
    }
    //POST Request
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required','string','max:255'],
            'email'=>['required','email','unique:users,email','max:255'],
            'password'=>['required','string','min:6','max:30'],
            'role' => "required|exists:users,role",
            // 'img' => "image|mimes:jpg,jpeg,png|nullable|max:5000",
        ]);
        // $imgPath = Storage::putFile('users',$request->img);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            // 'img' => $imgPath,
            'role' => $request->role,
        ]);

        return redirect( url('users') );
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.users.index',[
            'user' =>$user,
            'id' =>$id,
        ]);
    }

    public function update(Request $request , $id)
    {
        $request->validate([
            'name'=>['required','string','max:255'],
            'email'=>['required','email','max:255'],
            'password'=>['string','min:6','max:30','nullable'],
            'role' => "required|exists:users,role",
        ]);

        $user = User::findOrFail($id);
        // $imgPath = $pro->img;
        // if ($request ->hasFile('img') && $imgPath) {
        //     Storage::delete($imgPath);
            // $imgPath = Storage::putFile('users',$request->img);
        // }
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) :$user->password,
            'role' => $request->role,
            // 'img' => $imgPath,
        ]);
        return redirect( url('users') );

    }

    public function delete($id)
    {
        $pro = User::findOrFail($id);
        // Storage::delete($pro->img);
        $pro->delete();
        return redirect( url('users') );
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $result = User::where('name','like',"%$keyword%")->get();
        return view('dashboard.users.index',[
            "result"=>$result,
            "keyword"=>$keyword,
            'c'=>$c = 1,
        ]);
    }

    public function latest()
    {
        $latest = User::orderBy('id','DESC')->take(5)->get();
        return view('dashboard.users.index',[
            'latest'=>$latest,
            'c'=>$c=1,

        ]);
    }

}
