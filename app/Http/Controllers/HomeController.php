<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\chitiethoadon;
use App\Models\hoadon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\nguoidung;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Exception;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    
    public function getDanhSach()
    {   
        $thanhtoan = hoadon::where('trangthai','=','1')->count();
        $no = hoadon::where('trangthai','=','0')->count();
        $chitiethoadon = chitiethoadon::all();
        $hoadon = hoadon::all();
        return view('doanhthu.danhsach', compact('chitiethoadon','hoadon','thanhtoan','no'));
    }

    public function loginWithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackFromGoogle()
    {
        try {
            $user = Socialite::driver('google')->user();

            // Check Users Email If Already There
            $is_user = nguoidung::where('email', $user->getEmail())->first();
            if(!$is_user){

                $saveUser = nguoidung::updateOrCreate([
                    'google_id' => $user->getId(),
                ],[
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => Hash::make($user->getName().'@'.$user->getId())
                ]);
            }else{
                $saveUser = nguoidung::where('email',  $user->getEmail())->update([
                    'google_id' => $user->getId(),
                ]);
                $saveUser = nguoidung::where('email', $user->getEmail())->first();
            }


            Auth::loginUsingId($saveUser->id);

            return redirect()->route('home');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
