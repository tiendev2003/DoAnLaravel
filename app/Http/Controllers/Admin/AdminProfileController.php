<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
{
    //
    public function index()
    {
        // auth 
        $dt = Auth::user();
        // cái này là FRAMWORD mã code viết sẵn em chỉ sử dụng nó lại thôi
        // User()
        return view('admin.profile.index', ['user' => $dt]);
        /// trả về 1 màn hình
        // tìm những biến có tên là user nó sẽ có giá trị là $dt
    }
    public function create()
    {
    }
    public function destroy(User $user, $id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect('admin/profile');
    }
    public function store()
    {
    }
    public function update(Request $req, User $user, $id)
    {
        $data = User::find($id);
        $data->name = $req->name;
        $data->sdt = $req->sdt;
        $data->address = $req->address;
        $data->email = $req->email;
        $data->save();
        return back();
    }
    public function updateImg(Request $req, User $user, $id)
    {
      
        $data = User::find($id);
        $im = public_path("/profile/".$data->profile_photo_path);
        @unlink($im);
        $image = $req->img;
        $imagename = time() . '.' . $image->getClientOriginalExtension();// 1.png
        $req->img->move('profile', $imagename);
        // cú pháp . địa chỉ và tên file
        $data->profile_photo_path = $imagename;
        $data->save();
        return back();
    }
   
}
