<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\LienHeMail;
use App\Models\Lienhe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AdminLienHeController extends Controller
{
    //
    public function index()
    {
        $lh = DB::table('lienhes')->paginate(5);
        return view('admin.lienhe.index', ['lienhe' => $lh]);
    }
    public function detail(Request $req, $id)
    {
        $data = Lienhe::find($id);

        return view('admin.lienhe.chitiet', ['lienhe' => $data]);
    }
    public function traloi(Request $req)
    {
        $data = [
            'emaillienhe' => $req->emaillienhe,
            'noidunglienhe' => $req->noidunglienhe,
            'noidungtraloi' => $req->noidungtraloi,
        ];
        Mail::to($req->emaillienhe)->send(new \App\Mail\LienHeMail($data));
        Lienhe::find($req->idlienhe)->delete();
        return redirect('admin/lien-he');
    }
    public function detroy($id)
    {
        Lienhe::find($id)->delete();
        return redirect('admin/lien-he');
    }
}
