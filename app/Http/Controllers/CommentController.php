<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\comment;
use Illuminate\Support\Facades\Auth;
use App\post;
class CommentController extends Controller
{

    public function getDelete($id, $post_id)
    {
        $cm = comment::find($id);
        $cm->delete();
        return redirect('admin/post/edit/'.$post_id)->with('notify', 'Delete comment sucessfully!');
    }
    public function postComment( Request $req)
    {
        $cmt = new comment();
        $cmt->post_id = $req->post_id;
        $cmt->user_id = Auth::user()->id;
        $cmt->content = $req->content;
        $cmt->isConfirm = 1;
        $cmt->save();
        return redirect('detail/'.$req->post_id);
    }
}
