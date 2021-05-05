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

class PendingPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getList()
    {
        $user = post::where('isConfirm', '=', '0')->get();
        $refuse = post::where('isConfirm', '=', '2')->get();
        return view('admin/pendingpost/list', ['post' => $user, 'refuse' => $refuse]);
    }

    public function getAccept($id)
    {
        $post = post::find($id);
        $post->isConfirm = 1;
        $post->save();

        $not = new notify;
        $not->user_id = $post->idOwner;
        $not->state = 2;
        $not->save();
        return $this->getList();
    }
    public function getRefuse($id)
    {
        $post = post::find($id);
        $post->isConfirm = 2;
        $post->save();
        return $this->getList();
    }
    public function getRecover($id)
    {
        $post = post::find($id);
        $post->isConfirm = 0;
        $post->save();
        return $this->getList();
    }
    public function getDelete($id)
    {
        $post = post::find($id);
        $post->delete();
        return $this->getList();
    }
}