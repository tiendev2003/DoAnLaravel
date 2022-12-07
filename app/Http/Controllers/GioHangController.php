<?php

namespace App\Http\Controllers;

use App\Models\Chitietgiohang;
use App\Models\Giohang;
use App\Models\Sanpham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;


class GioHangController extends Controller
{
    //
    public function index()
    {
        if (Auth::id()) {
            $user = Auth::id();
            $item = Giohang::where('user_id', $user)->first();
            if ($item == null) {
                $newgh = new Giohang();
                $newgh->tongtien = 0;
                $newgh->user_id = $user;
                $newgh->save();
            }
            $item = Giohang::where('user_id', $user)->first();
            $cmgh = Chitietgiohang::where('giohang_id', $item->id)->get();
            $sp = Sanpham::all();
            $checkEmpty=0;
            if($cmgh){
                $checkEmpty= 1;
            }else{
                $checkEmpty= 2;
            }
            // dd(!empty($cmgh));
            return view('client.cart', ['cart' => $cmgh, 'checkEmpty' => $checkEmpty, 'id_user' => $user]);
        } else {
            return redirect('login');
        }
    }
    public function add_cart(Request $req, $idSp)
    {
        if (Auth::id()) {
            $user = Auth::id();

            $item = Giohang::where('user_id', $user)->first();

            if ($item == null) {
                $newgh = new Giohang();
                $newgh->tongtien = $req->price;
                $newgh->user_id = $user;
                $newgh->save();
            }
            $giohang = Giohang::where('user_id', $user)->first();



            $cmgh = DB::table('chitietgiohangs')->where(['sanpham_id' => $idSp, 'giohang_id' => $giohang->id])->first();
            if ($cmgh) {
                $cmgh = DB::table('chitietgiohangs')->where(['sanpham_id' => $idSp, 'giohang_id' => $giohang->id])->update(['soluong' => $cmgh->soluong + 1]);
                $data = Chitietgiohang::where(['giohang_id' => $giohang->id])->get();
                $tongt = 0;
                foreach ($data as $dt) {
                    $tongt += $dt->soluong * $dt->sanpham->dongia;
                }
                $newgh = Giohang::where(['user_id' => $user])->first();
                $newgh->tongtien = $tongt;
                $newgh->save();
            } else {
                $giohang->sanpham()->attach($idSp, ['soluong' => $req->quantity]);
            }
            return back();
        } else {
            return redirect('login');
        }
    }
    public function changeQuantity(Request $req, $id, $value, $iduser)
    {
        $gh = Giohang::where(['user_id' => $iduser])->first();
        $data = Chitietgiohang::where('sanpham_id', $id)->where('giohang_id', $gh->id)->update(['soluong' => $value]);
        $ans = 0;
        $data = Chitietgiohang::where('giohang_id', $gh->id)->get();
        foreach ($data as $dt) {
            $ans += $dt->soluong * $dt->sanpham->dongia;
        }
        $gh->tongtien = $ans;
        $gh->save();
    }
    public function detroy(Request $request, $id, $iduser)
    {
        $gh = Giohang::where('user_id', $iduser)->first();

        $data = Chitietgiohang::where('sanpham_id', $id)->where('giohang_id', $gh->id)->delete();
      
    }
}
