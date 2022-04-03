<?php

namespace App\Http\Controllers;

use App\Models\hoadon;
use App\Models\nguoidung;
use Illuminate\Http\Request;

class HoadonController extends Controller
{
    public function getDanhSach(){
        $hoadon = hoadon::all();
        $nguoidung = nguoidung::all();
        return view('hoadon.danhsach', compact('nguoidung','hoadon'));
    }
    public function getNo(){
        $hoadon = hoadon::all();
        $nguoidung = nguoidung::all();
        return view('hoadon.no', compact('nguoidung','hoadon'));
    }
    public function getThem()
    {
        $nguoidung = nguoidung::all();
        
        return view('hoadon.them', compact('nguoidung'));
    }

    public function postThem(Request $request)
    {
        
        
        $orm = new hoadon();
        $orm->nguoilap = $request->nguoilap;
        $orm->ngaylap = $request->ngaylap;
        $orm->sdt = $request->sdt;
        $orm->tinh = $request->tinh;
        $orm->huyen = $request->huyen;
        $orm->thitran = $request->thitran;
        $orm->save();
        

    }

    


}
