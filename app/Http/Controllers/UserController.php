<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\category;
use App\post;
use App\comment;
use App\User;
use App\roles;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getList()
    {
        
        $user = User::where('isConfirm', '=', '1')->get();
        return view('admin/user/list', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postAdd(Request $req)
    {
        $this->validate($req,
        ['role' => 'required',
        'name' => 'required|min:3',
        'password' => 'required|min:6',
        'email' => 'required|unique:users,email',
        'phone' => 'required',
        'address' => 'required',
        ],
        [
        'role.required' => "Your category cannot empty",
        'name.required' => "Your name cannot empty",
        'name.required' => "Your username length must be at least 3 characters",
        'email.required' => "Your email cannot empty",
        'phone.required' => "Your description cannot empty",
        'password.required' => "Your password cannot empty",
        'address.required' => "Your address cannot empty",
        'password.min' => "Your password length must be at least 6 characters",
        'email.unique' => "Your email must be unique",
        
        ]);
        $user = new User;
        $user->idRole= $req->role;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->password = bcrypt($req->password);
        $user->isConfirm = 1;
        $user->save();
        return redirect('admin/user/add')->with('notify', 'Add user sucessfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getAdd()
    {
        $role = roles::all();
        return view('admin/user/add', ['role'=> $role]);
    }

    public function getEdit($id)
    {
        $user = User::find($id);
        $role = roles::all();
        return view('admin/user/edit', ['user' => $user, 'role' => $role]);
    }
    public function postEditUser(Request $req, $id)
    {
        $user = User::find($id);
        $this->validate($req,
        [
        'name' => 'required|min:3',
        'password' => 'required|min:6',
        'email' => 'required',
        'phone' => 'required',
        'address' => 'required',
        ],
        [
        'name.required' => "Your name cannot empty",
        'name.required' => "Your username length must be at least 3 characters",
        'email.required' => "Your email cannot empty",
        'phone.required' => "Your description cannot empty",
        'password.required' => "Your password cannot empty",
        'address.required' => "Your address cannot empty",
        'password.min' => "Your password length must be at least 6 characters",
        
        ]);
        if($req->password )
        $user->name = $req->name;
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->password = bcrypt($req->password);
        $user->save();
        return redirect('admin/user/edit/'.$id)->with('notify', 'Edit user sucessfully!');
    }
    public function postEdit(Request $req,$id)
    {
        $user = User::find($id);
        $this->validate($req,
        ['role' => 'required',
        'name' => 'required|min:3',
        'password' => 'required|min:6',
        'email' => 'required',
        'phone' => 'required',
        'address' => 'required',
        ],
        [
        'role.required' => "Your category cannot empty",
        'name.required' => "Your name cannot empty",
        'name.required' => "Your username length must be at least 3 characters",
        'email.required' => "Your email cannot empty",
        'phone.required' => "Your description cannot empty",
        'password.required' => "Your password cannot empty",
        'address.required' => "Your address cannot empty",
        'password.min' => "Your password length must be at least 6 characters",
        
        ]);
        $user->idRole= $req->role;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->password = bcrypt($req->password);
        $user->save();
        return redirect('admin/user/edit/'.$id)->with('notify', 'Edit user sucessfully!');
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDelete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user/list')->with('notify', 'Delete user sucessfully!');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function getAdminLogin()
    {
        return view('admin.login');
    }
    public function getAdminLogout()
    {
        Auth::logout();
        return redirect('admin/login');
    }
    public function postAdminLogin(Request $req)
    {
        $this->validate($req,
        ['email' => 'required',
        'password' => 'required|min:6'],
        ['email.required' => "Email cannot empty",
        'password.required' => "Password cannot empty",
        'password.length' => "Password lengt must be at least 6 characters"]);
        if(Auth::attempt(['email' => $req->email, 'password' => $req->password]))
        {
            return redirect('admin/statistic');
        }
        else return redirect('admin/login')->with('notify','Wrong email or password. Please try again!  ');
    }
}
