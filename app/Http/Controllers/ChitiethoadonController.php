<?php

namespace App\Http\Controllers;

use App\Models\chitiethoadon;
use App\Models\hoadon;
use App\Models\hanghoa;
use Illuminate\Http\Request;

class ChitiethoadonController extends Controller
{
    public function getDanhSach($id){
        $chitiethoadon = chitiethoadon::all();
        $hoadon = hoadon::all();
        $hanghoa = hanghoa::all();
        return view('hoadonchitiet.danhsach', compact('chitiethoadon','hoadon','hanghoa'));
    }

    public function getXem(){
        $id = $_GET['id'];
        $chitiethoadon = chitiethoadon::all();
        $hoadon = hoadon::all();
        $hanghoa = hanghoa::all();
        return view('hoadonchitiet.danhsach', compact('chitiethoadon','hoadon','hanghoa','id'));
    }






    public function getXoa($id)
    {
        $orm = hanghoa::find($id);
        $orm->delete();
        return redirect()->route('hanghoa');
    }
}
