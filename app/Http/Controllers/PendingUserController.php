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
use App\notify;

class PendingUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getList()
    {
        $user = User::where('isConfirm', '=', '0')->get();
        $refuse = User::where('isConfirm', '=', '2')->get();
        return view('admin/pendinguser/list', ['user' => $user, 'refuse' => $refuse]);
    }

    public function getAccept($id)
    {
        $user = User::find($id);
        $user->isConfirm = 1;
        $user->save();
        $not = new notify;
        $not->user_id = $user->id;
        $not->state = 1;
        $not->save();
        return $this->getList();
    }
    public function getRefuse($id)
    {
        $user = User::find($id);
        $user->isConfirm = 2;
        $user->save();
        return $this->getList();
    }
    public function getRecover($id)
    {
        $user = User::find($id);
        $user->isConfirm = 0;
        $user->save();
        return $this->getList();
    }
    public function getDelete($id)
    {
        $user = User::find($id);
        $user->delete();
        return $this->getList();
    }
}