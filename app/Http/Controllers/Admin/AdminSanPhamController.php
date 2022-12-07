<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Danhmuc;
use App\Models\Nhanhieu;
use App\Models\Sanpham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminSanPhamController extends Controller
{
    //
    const PER_PAGE = 10;

    //
    public function index()
    {
        $dm = Danhmuc::all();
        $sp = Sanpham::paginate(self::PER_PAGE);
        $hangsx = Nhanhieu::all();

        return view('admin.sanpham.index', ['danhmuc' => $dm, 'hangsx' => $hangsx, 'sanpham' => $sp]);
    }
    public function edit($id)
    {
        $data = Sanpham::find($id);
        $dm = Danhmuc::all();
        $hsx = DB::table('nhanhieus')->get();
        return view('admin.sanpham.edit', ['data' => $data, 'danhmuc' => $dm, 'hangsx' => $hsx]);
    }
    public function create()
    {
        $dm = Danhmuc::all();
        $hangsx
            = DB::table('nhanhieus')->get();
        return view('admin.sanpham.create', ['danhmuc' => $dm, 'hangsx' => $hangsx]);
    }
    public function store(Request $req)
    {
        
        $data = new Sanpham();
        $data->danhmuc_id = $req->danhmuc_id;
        $data->hangsx_id = $req->hangsx_id;
        $data->name = $req->name;
        $data->dongia = $req->dongia;
        $data->donvikho = $req->donvikho;
        $data->donviban = 0;
        $data->thongtinbaohanh = $req->thongtinbaohanh;
        $data->thongtinchung = $req->thongtinchung;
        $data->manhinh = $req->manhinh;
        $data->cpu = $req->cpu;
        $data->ram = $req->ram;
        $data->hedieuhanh = $req->hedieuhanh;
        $data->thietke = $req->thietke;
        $data->dungluongpin = $req->dungluongpin;
        $image = $req->img;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $req->img->move('sanpham', $imagename);
        $data->anh = $imagename;
        $data->save();
        return redirect('admin/san-pham');
    }
    public function update(Request $req, Sanpham $sp, $id)
    {
        $data = Sanpham::find($id);
        $data->danhmuc_id = $req->danhmuc_id;
        $data->nhanhieu_id = $req->hangsx_id;
        $data->name = $req->name;
        $data->dongia = $req->dongia;
        $data->donvikho = $req->donvikho;
        $data->donviban = 0;
        $data->thongtinbaohanh = $req->thongtinbaohanh;
        $data->thongtinchung = $req->thongtinchung;
        $data->manhinh = $req->manhinh;
        $data->cpu = $req->cpu;
        $data->ram = $req->ram;
        $data->hedieuhanh = $req->hedieuhanh;
        $data->thietke = $req->thietke;
        $data->dungluongpin = $req->dungluongpin;
        $image = $req->img;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $req->img->move('sanpham', $imagename);
        $data->anh = $imagename;
        $data->save();
   
        return redirect('admin/san-pham');
    }
    public function destroy(Sanpham $sp, $id)
    {
        $data = Sanpham::find($id);
        if ($data->img && Storage::disk('public')->exists($data->img)) {
            Storage::delete($data->img);
        }
        // $image_path = public_path().'/'.$data->anh;
        // unlink($image_path);
        $data->delete();
        return redirect('admin/san-pham');
    }
}
