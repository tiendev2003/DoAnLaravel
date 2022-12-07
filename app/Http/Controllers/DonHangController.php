<?php

namespace App\Http\Controllers;

use App\Models\Chitietdonhang;
use App\Models\Donhang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonHangController extends Controller
{
    //
    public function index(){
        if(Auth::check())
        $dh_id= Donhang::where('nguoidat_id',Auth::id())->first();       
return view('client.donhang',['data'=>$dh_id]);
    }
    public function delete(){

    }
    public function details(){

    }
}
