<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donhang;
use App\Models\Lienhe;
use App\Models\ListCongViec;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class AdminController extends Controller
{
    //
    public function index()
    {
        $list = new ListCongViec();
        $list->hangmoi = Donhang::where('trangthai', 'Đang chờ giao')->count();
        $list->choduyet = DonHang::where('trangthai', 'Chờ duyệt')->count();
        $list->lienhemoi = Lienhe::where('trangthai', 'Đang chờ trả lời')->count();
        return view('admin.home', compact('list'));
    }
    public function home()
    {
        return view('admin.home');
    }
    public function ggredirect(){
        return Socialite::driver('google')->redirect();
    }
    public function ggcallback(){
      
        try {
            $gg=Socialite::driver('google')->user();
            $user=User::where('google_id',$gg->getId())->first();
            if(!$user){
                $new=User::create([
                    'name'=>$gg->getName(),
                    'email'=>$gg->getEmail(),
                    'google_id'=>$gg->getId(),
                ]);
                Auth::login($new);
                return redirect('/redirect');
            }else{
                Auth::login($user);
                return redirect('/redirect');

            }
            
        } catch (\Throwable $th) 
            {
                dd('Somethong a wrong'.$th->getMessage());

        }
    }
    public function fbredirect(){
        return Socialite::driver('facebook')->stateless();

    }
    public function fbcallback(){
        $fb = Socialite::driver('facebook')->user();
        dd($fb);
        

            $user=User::where('facebook_id',$fb->getId())->first();
            $user1=User::select('id')->where('email',$fb->getEmail())->first();
          
            if(!$user && $user1){
                $new=User::where('id',$user1->id)->update([
                    'facebook_id'=>$fb->getId(),
                ]);
                Auth::login($new);
                return redirect('/redirect');
            }else{
                Auth::login($user);
                return redirect('/');

            }
            
       
    }
}