<?php

namespace App\Http\Controllers\Shipper;

use App\Http\Controllers\Controller;
use App\Models\Donhang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShipperController extends Controller
{
    public function index()
    {
        $dt = Auth::user();
        return view('shipper.profile', ['user' => $dt]);
    }
    public function donhang()
    {
        $ship = DB::table('user_vaitros')->join('users', 'user_vaitros.id', '=', 'users.id')->select('name')->where('users.id', '=', Auth::user()->id)
            ->get();

        $donhang = DB::table('donhangs')->paginate(5);


        return view('shipper.donhang.index', ['allShipper' => $ship, 'donhang' => $donhang]);
    }
    public function find(Donhang $dh, $id)
    {
        $ans = DonHang::find($id);
        return view('shipper.donhang', [$ans]);
    }
    public function updateDonhang(Request $req)
    {

        return redirect('shipper/don-hang');
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

        $image = $req->img;
        $imagename = '1' . '.' . $image->getClientOriginalExtension();
        $req->img->move('profile', $imagename);
        $data->profile_photo_path = $imagename;
        $data->save();
        return back();
    }
}
