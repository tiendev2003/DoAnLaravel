<?php

namespace App\Http\Controllers;

use App\Models\Chitietdonhang;
use App\Models\Chitietgiohang;
use App\Models\Danhmuc;
use App\Models\Donhang;
use App\Models\Giohang;
use App\Models\Sanpham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;
use Mockery\Matcher\Any;

class ResponseController extends Controller
{
    public function ggredirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function ggcallback()
    {
        $user = Socialite::driver('google')->user();
        dd($user);
    }

    public function allDanhmuc()
    {
        $dm = Danhmuc::all();
        return $dm;
    }
    public function spLastest()
    {
        $sp = Sanpham::all();
        return $sp;
    }
    public function baohanh()
    {
        return view('client.guarantee');
    }
    public function vanchuyen()
    {
        return view('client.shipping');
    }

    public function thanhtoan()
    {
        if (Auth::id()) {

            $user = Auth::id();
            $item = Giohang::where('user_id', $user)->first();

            $cmgh = Chitietgiohang::where('giohang_id', $item->id)->get();
            $sp = Sanpham::all();

            $user = Auth::user();
            return view('client.checkout', ['cart' => $cmgh, 'checkEmpty' => $sp, 'user' => $user]);
        }
    }

    public function thankyou(Request $req)
    {

        if (Auth::id()) {
            $dt = Carbon::now('Asia/Ho_Chi_Minh');
            $donhang = new Donhang();
            $donhang->address = $req->address;
            $donhang->sdt = $req->sdt;
            $donhang->name = $req->name;
            $donhang->ngaydat = $dt->toDateString();
            $donhang->trangthai = "Chờ duyệt";
            $donhang->ghichu = $req->ghichu;
            $donhang->nguoidat_id = Auth::id();
            $donhang->save();
        }
        $dhang = Donhang::where('nguoidat_id', Auth::id())->orderBy('id', 'desc')->limit(1)->first();
        $giohang = Giohang::where('user_id', Auth::id())->first();
        $chitietgiohang = Chitietgiohang::where(['giohang_id' => $giohang->id])->get();
        foreach ($chitietgiohang as $ct) {
            $chitiet = new Chitietdonhang();
            $temp = Sanpham::find($ct)->first();
            $chitiet->dongia = $temp->dongia;
            $chitiet->soluong = $ct->soluong;
            $chitiet->donhang_id = $dhang->id;
            $chitiet->sanpham_id = $ct->sanpham_id;
            $chitiet->save();
        }

        $dhang = Donhang::where('nguoidat_id', Auth::id())->orderBy('id', 'desc')->limit(1)->get();
        // dd($dhang);
        $item = Giohang::where('user_id', Auth::id())->first();
        $cmgh = Chitietgiohang::where('giohang_id', $item->id)->get();
        
        $giohang->sanpham()->detach();
        $giohang = Giohang::where('user_id', Auth::id())->delete();

        return view('client.thankYou', ['donhangs' => $dhang, 'cart' => $cmgh]);
    }
    public function search(Request $req)
    {
        $data = Sanpham::where('name', 'LIKE', '%' . $req->sanpham . '%')->orWhere('dongia', 'LIKE', '%' . $req->sanpham . '%')->paginate(10);
        return view('client.search', ['data' => $data]);
    }
    public function finddanhmuc(Request $req, $item)
    {
        $data = Danhmuc::where('name', $item)->first();
        $d = $data->sanpham;
        return view('client.danhmuc', ['sanpham' => $d, 'data' => $data]);
    }
    public function donhang()
    {
        return view('client.donhang');
    }
}
