<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chitietdonhang;
use App\Models\Donhang;
use App\Models\Sanpham;
use App\Models\User;
use App\Models\Vaitro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminDonHangController extends Controller
{
    //
    protected $appends = ['getParentsTree', 'chitiet','sol'];
    public static function getParentsTree($danhmuc)
    {
        $parent = User::find($danhmuc);
        $title = $parent->name;
        return $title;
    }
    public static function chitiet($id)
    {
        $p = Donhang::find($id);
        return $p->sanpham;
    }
    public  static function sol($id){
       $d= Chitietdonhang::where('donhang_id',$id)->get();
       $soluong=0;
       foreach($d as $dt){
            $soluong+=$dt->soluong*$dt->dongia;
       }
        return $soluong; 

    }
    public function index(Request $req)
    {
        // DB là database  table là bảng. 
        // tức là lấy database này có bảng là uservaitros join là kết nối á
        // kêst nói bẳng users qua id của nó
        $ship = DB::table('user_vaitros')->join('users', 'user_vaitros.id', '=', 'users.id')->select('name')->where('users.id', '=', Auth::user()->id)
            ->get();
        // paginate là phân trang
        // phân 5 sản phẩm trên 1 trang
        $donhang = Donhang::paginate(5);
   

        return view('admin.donhang.index', ['allShipper' => $ship, 'donhang' => $donhang]);
    }
    public function details(Donhang $dh, $id)
    {
        $vaitro = Vaitro::find(2);
        $shipp = $vaitro->user()->get();
       
        $data = Donhang::find($id);
        $dulieu = Chitietdonhang::where('donhang_id', $id)->get();
        return view('admin.donhang.chitiet', ['data' => $data, 'shipper' => $shipp, 'dulieu' => $dulieu]);
    }
    public function phancong(Donhang $dh, $id)
    {
        $sp = DB::table('users')->join('user_vaitros', 'user_vaitros.user_id', '=', 'users.id')->where('user_vaitros.vaitro_id', '=', '2')->get();
        $data = Donhang::find($id);
        return view('admin.donhang.phancong', ['shipper' => $sp, 'data' => $data]);
    }
    public function xacnhan(Request $req, Donhang $dt, $id)
    {
      $d=Chitietdonhang::where('donhang_id',$id)->get();
   
       foreach($d as $dt){
        $sp=Sanpham::find($dt->sanpham_id);
        Sanpham::find($dt->sanpham_id)->update(['donvikho'=>$sp->donvikho-$dt->soluong]);

       }
        $data = Donhang::find($id);
        $data->ngaynhan = $req->ngaynhan;
        $data->trangthai = "Đang chờ giao";
        $data->ngaygiao = $req->ngaygiao;
        $data->shipper_id = $req->shipper;
        $data->save();
        return redirect('admin/don-hang');
    }
    public function destroy(Donhang $dh, $id)
    {
        $data = Donhang::find($id);
        $data->delete();
        return back();
    }
    public function duyetdon(Request $req)
    {
        $r =  Donhang::where('trangthai', $req->trangthai)->whereBetween('ngaydat', [$req->fromDate, $req->toDate])->first();
        dd($r);
    }
    public function search(Request $req)
    {


        $output = "";
        $search = $req->input('search');
        $donhang = Donhang::where('id', '=', "$search")->get();
        foreach ($donhang as $dh) {
            $output .=
                ' <tr>
            <td>' . $dh->id . '</td>
            <td></td>
            <td>' . $dh->trangthai . '</td>
            <td></td>
            <td>' . $dh->ngaydat . '</td>
            <td>' . $dh->ngaygiao . '</td>
            <td>' . $dh->ngaynhan . '</td>
            <td>' . ' <a href="/admin/danh-muc/details' . $dh->id . '"
                    class="btn btn-outline-warning">' . '
                    <i class="fa fa-edit"></i>' . ' </a>' . ' &nbsp; ' . '
            </td>
            <td>
@if($dh->trangthai=="Đang chờ giao" ||$dh->trangthai=="Đang giao" )
                <a href="/admin/danh-muc/phancong' . $dh->id . '"
                    class="btn btn-outline-warning">
                    Phân công</a>&nbsp;
                <a href="/admin/danh-muc/detroys' . $dh->id . '"
                    class="btn btn-outline-warning">
                    Huỷ đơn</a>&nbsp;

@elseif($dh->trangthai=="Đang duyệt")
                <a href="/admin/danh-muc/details' . $dh->id . '"
                    class="btn btn-outline-warning">
                    Cập nhật</a>&nbsp;
@endif
            </td>
        </tr> ';
        }

        return view('admin.donhang.index', ['donhang' => $dh]);
    }
}
