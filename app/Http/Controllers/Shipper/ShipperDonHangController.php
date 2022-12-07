<?php

namespace App\Http\Controllers\Shipper;

use App\Http\Controllers\Controller;
use App\Models\Donhang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShipperDonHangController extends Controller
{
    public function index()
    {
        $dt = Auth::user();
       $dh=Donhang::where('shipper_id',$dt->id)->paginate(6);
       
        return view('shipper.donhang.index', ['donhang' => $dh]);
    }
    public function create()
    {
    }
    public function destroy(User $user, $id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect('shipper/profile');
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

        $image = $req->img;
        $imagename = '1' . '.' . $image->getClientOriginalExtension();
        $req->img->move('profile', $imagename);
        $data->profile_photo_path = $imagename;
        $data->save();
        return back();
    }
    public function edit(User $user, $id)
    {
        $data = User::find($id);
        return redirect();
    }
}
