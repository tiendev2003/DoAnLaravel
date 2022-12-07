<?php

namespace App\Http\Controllers;

use App\Models\Sanpham;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    //
    public function details(Request $req, $id)
    {
        $data = Sanpham::find($id);
        return view('client.include.detailspContent', ['sp' => $data]);
    }
}
