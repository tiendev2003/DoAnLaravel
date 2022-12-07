<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Nhanhieu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminNhanHieuController extends Controller
{
    //
    protected $appends = ['getParentsTree'];
    public static function getParentsTree($hangsx)
    {
        $dm = Nhanhieu::all();
        if ($hangsx == 0) {
            return $dm->name;
        }
        $parent = DB::table('nhanhieus')->find($hangsx);

        $title = $parent->name;
        return $title;
    }

    public function index()
    {

        $nh= Nhanhieu::all();
        return view('admin.nhanhieu.index', ['data' => $nh]);
    }
    public function create()
    {
        return view('admin.nhanhieu.create');
    }
    public function store(Request $request)
    {
        $dt = $request->name;
        $data = new Nhanhieu();
        $data->name = $dt;

        return back();
    }
    public function edit(Request $req, Nhanhieu $dm, $id)
    {
        $data = Nhanhieu::find($id);
        return view('admin.nhanhieu.edit', ['dt' => $data]);
    }
    public function update(Request $req, Nhanhieu $dm, $id)
    {
        $data = Nhanhieu::find($id);
        $data->name = $req->name;
        $data->save();
        return redirect('admin/nhan-hieu');
    }
    public function destroy($id)
    {
        $data = Nhanhieu::find($id);
        $data->delete();
        return back();
    }
}
