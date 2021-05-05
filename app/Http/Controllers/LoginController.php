<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\category;
use App\post;
use App\comment;
use App\province;
use DB;
use App\User;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function getlogin()
    {
        session(['link' => URL::previous()]);
        return view('pages/login');
        
    }
    
    public function getlogout()
    {
        Auth::logout();
        return redirect('index');
    }

    public function postlogin(Request $req)
    {
        $email = $req->email;
        $password = $req->password;
        $this->validate($req,
        ['email' => 'required',
        'password' => 'required|min:6'],
        ['email.required' => "Email cannot empty",
        'password.required' => "Password cannot empty",
        'password.length' => "Password lengt must be at least 6 characters"]);
        if(Auth::attempt(['email' => $req->email, 'password' => $req->password]))
        {
            if(session('link') == "http://localhost/easeaccomod/public/register" || session('link') == "http://localhost/easeaccomod/public/login" )
            return redirect('index');
            else return redirect(session('link'));
        }
        else return redirect('login')->with('notify','Wrong email or password. Please try again!  ');
    }
    public function getregister()
    {
        return view('pages/register');
    }
    public function postregister(Request $req)
    {
        $this->validate($req,
        ['role' => 'required',
        'password' => 'required|min:6',
        'email' => 'required|unique:users,email',
        ],
        [
        'role.required' => "Bạn hãy chọn loại người dùng",
        'email.required' => "Your email cannot empty",
        'password.required' => "Your password cannot empty",
        'password.min' => "Your password length must be at least 6 characters",
        'email.unique' => "Your email must be unique",
        
        ]);
        $user = new User;
        $user->name = $req->name;
        $user->idRole= $req->role;
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->password = bcrypt($req->password);
        if($user->idRole == 1)
        {
            $user->isConfirm = 0;
        }
        else  $user->isConfirm = 1;
        $user->save();
        return redirect('register')->with('notify', 'Register succesfully!');
    }
}
