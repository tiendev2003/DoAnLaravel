<?php

namespace App\Http\Controllers;

use App\Models\Lienhe;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LienHeController extends Controller
{
    //
    public function index()
    {
        return view('client.contact');
    }
    public function store(Request $req)
    {
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $lienhe = new Lienhe();
        $lienhe->email = $req->email;
        $lienhe->trangthai = "Đang chờ trả lời";
        $lienhe->ngaylienhe = $dt->toDateString();
        $lienhe->noidunglienhe = $req->content;
        $lienhe->save();
        return back()->with('success', 'Gửi thành công');
    }
    public function a(Request $request){
        $s=   $request->all();
        return   $s['tien'];
       
    }
    public function b(){
        return view('welcome');
    }
   
}
