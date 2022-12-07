<?php

namespace App\Http\Controllers;

use App\Models\Sanpham;
use App\Models\UserVaitro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function redirect()
    {
        $id = Auth::id();
        $sp = Sanpham::paginate(12);
        if (!Auth::check()) {
            return view('client.home', ['sanpham' => $sp]);
        }
        $item = Auth::user()->id;

        $usertype = UserVaitro::where('user_id', $item)->first();
        if (empty($usertype)) {
            DB::table('user_vaitros')->insert([
                'user_id' => $item,
                'vaitro_id' => 1
            ]); 
        }
        $usertype = UserVaitro::where('user_id', $item)->first();
        if ($usertype->vaitro_id == 1) {
            return view('client.home', ['sanpham' => $sp]);
        } else if ($usertype->vaitro_id == 2) {
            $dt = Auth::user();
            return redirect('shipper/profile');
        } else {
            return redirect('admin');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function index()
    {
        $sp = DB::table('sanphams')->paginate(12);
     
        return view('client.home', ['sanpham' => $sp]);
    }
}
