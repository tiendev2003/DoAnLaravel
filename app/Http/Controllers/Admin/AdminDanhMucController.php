<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Danhmuc;
use Illuminate\Http\Request;

class AdminDanhMucController extends Controller
{
    
    public function index()
    {
        
        $dm = Danhmuc::all();
        return view('admin.danhmuc.index', ['data' => $dm]);
 
    }
   // lưu trữ
    public function store(Request $request)
    {
        $request->validate([
            "name" => 'required|min:3',
         
        ]);
        $dt = new Danhmuc();// tạo mới là new
        // tạo mới bảnh User 
        // $use= new User();
        $dt->name = $request->name;
        $dt->save();
        return back();
    }
    public function edit(Request $req, Danhmuc $dm, $id)
    {
        $data = Danhmuc::find($id);
        // tìm dòng mà id = $id
        return view('admin.danhmuc.edit', ['data' => $data]);
    }
    public function update(Request $req, Danhmuc $dm, $id)
    {   // tìm dòng mà id = $id
        $data = Danhmuc::find($id);
        $data->name = $req->name;
        $data->save();
        return back();
    }
    public function destroy(Danhmuc $dm, $id)
    {
        $data = Danhmuc::find($id);
        $data->delete();
        return back();
    }
}
