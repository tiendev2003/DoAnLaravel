<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    //
    public function index()
    {
        return view('admin.banner.index');
    }
    public function luuAnh(Request $req)
    {

        $data = new Banner();
        $item = $req->img1;
        $da = $item->getClientOriginalName();
        $image = time() . '.' . $da;
        $req->img1->move('tien', $image);
        $data->HinhAnh= $image ;
        $data->save();

        return redirect()->route('admin.banner.index');
    }
}
