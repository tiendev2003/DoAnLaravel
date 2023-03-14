<?php

namespace App\Http\Controllers;

use App\Models\Binhluan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BinhluanController extends Controller
{
    //
    public function index()
    {
     $data=Binhluan::all();
     return $data;
    }
    public function post(Request $req, $user, $sanpham)
    {
     if($sanpham="false"){
        toastr()->error('Bạn cần đăng nhập để bình luận');
        return redirect('login') ;
     }
        $req->validate([
            'noidung' => ['min:1', 'required']
        ]);

        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $data = new Binhluan();
        $data->noidung = $req->noidung;  
        $data->day_now = $dt->toDateString();
        $data->user_id = $user;
        $data->sanpham_id = $sanpham;
        $data->save();
        return redirect()->back();

    }
}
