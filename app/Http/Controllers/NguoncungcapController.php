<?php

namespace App\Http\Controllers;

use App\Models\nguoncungcap;
use Illuminate\Http\Request;
use Illuminate\Http\response;


class NguoncungcapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function getDanhSach()
    {
        $nguoncungcap = nguoncungcap::all();
        return view('nguoncungcap.danhsach', compact('nguoncungcap'));
    }

    public function getThem()
    {
        return view('nguoncungcap.them');
    }

    public function postThem(Request $request)
    {
      
        $orm = new nguoncungcap();
        $orm->tennguon = $request->tennguon;      
        $alert='Cập Nhật Thành Công';
        $orm->save();
        return redirect()->route('nguoncungcap')->with('message','Thêm thành công');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getSua($id)
    {
        $nguoncungcap = nguoncungcap::find($id);
        return view('nguoncungcap.sua', compact('nguoncungcap'));
    }


}
