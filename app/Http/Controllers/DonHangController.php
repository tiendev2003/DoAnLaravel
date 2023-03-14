<?php

namespace App\Http\Controllers;

use App\Models\Chitietdonhang;
use App\Models\Chitietgiohang;
use App\Models\Donhang;
use App\Models\Giohang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonHangController extends Controller
{
    //
    public function index()
    {
        if (Auth::check())
            $dh_id = Donhang::where('nguoidat_id', Auth::id())->get();
     
            return view('client.donhang', ['data' => $dh_id]);
    }
    public function delete()
    {
    }
    public function details(Request $req,$id)
    {  if (Auth::check()){


        $item = Donhang::where('nguoidat_id', Auth::id())->where('id',$id)->first();
        // dd($item);
        $cmgh = Chitietdonhang::where('donhang_id', $item->id)->get();
        $p = Donhang::find($id);
        return view('client.chitietdonhang', ['cart' => $cmgh, 'id_user' => Auth::id()]);
    }
    }
}
