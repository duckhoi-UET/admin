<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\report;
use Illuminate\Support\Facades\Auth;
use App\post;
class ReportController extends Controller
{

    public function postReport($id, Request $req)
    {
        $cmt = new report();
        $cmt->idPost = $id;
        $cmt->idUser = Auth::user()->id;
        $cmt->report_type = $req->movie;
        $cmt->report_detail = $req->descrition;
        $cmt->save();
        return redirect('detail/'.$id)->with('notify', 'Báo cáo tin đăng thành công. Quản trị viên sẽ xem xét báo cáo của bạn!');
    }
}
