<?php

namespace App\Http\Controllers;

use App\Models\Binhluan;
use App\Models\Sanpham;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    //
    public function details(Request $req, $id)
    {
        $data = Sanpham::find($id);
       $binhluan=Binhluan::where('sanpham_id',$id)->get();
        return view('client.include.detailspContent', ['sp' => $data,'data'=>$binhluan]);
    }
}
