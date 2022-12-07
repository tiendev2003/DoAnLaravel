<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserVaitro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminTaiKhoanController extends Controller
{
    //
    public function index()
    {
        $vt = DB::table('vaitros')->get();
        $tk = DB::table('user_vaitros')->join('users', 'user_vaitros.user_id', '=', 'users.id')->join('vaitros', 'user_vaitros.vaitro_id', '=', 'vaitros.id')->select('users.id', 'users.name', 'users.address', 'users.sdt', 'users.email', 'vaitros.id as vt_id')
            ->paginate(5);
        $data=DB::table('user_vaitros')->join('users','user_vaitros.user_id', '=', 'users.id')->paginate();
     

        return view('admin.taikhoan.index', ['listVaiTro' => $vt, 'taikhoan' => $data]);
    }
    public function create()
    {
        return view('admin.taikhoan.create');
    }
    public function phanquyen(Request $req)
    {
        $data=DB::table('user_vaitros')->join('users','user_vaitros.user_id', '=', 'users.id')->get();

        $tk = DB::table('user_vaitros')->join('users', 'user_vaitros.user_id', '=', 'users.id')
        ->where('vaitros.id', $req->message)->join('vaitros', 'user_vaitros.vaitro_id', '=', 'vaitros.id')
        ->select('users.id', 'users.name', 'users.address', 'users.sdt', 'users.email', 'vaitros.id as vt')->get();
        return $tk;
    }
    public function thaydoi(Request $req,$id,$value){
     UserVaitro::where('user_id',$id)->update(['vaitro_id'=>$value]);
    }
    public function store(Request $req)
    {
        $req->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:5|confirmed',

            ],
            [
                'name.required' => 'Tên không được để trống !',
                'email.required' => 'Email không được để trống !',
                'email.email' => 'Email không đúng định dạng !',
                'email.unique' => 'Email đã có người sử dụng !',
                'password.required' => 'Mật khẩu không được để trống !',
                'password.min' => 'Mật khẩu phải lớn hơn :min kí tự !',

            ]
        );


        $image = $req['img'];
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $req['img']->move('taikhoan', $imagename);
        return redirect('admin/tai-khoan');
    }
    public function detroy(Request $req, $id)
    {
        User::find($id)->delete();
        return back();
    }
}
