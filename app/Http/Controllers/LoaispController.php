<?php

namespace App\Http\Controllers;

use App\Models\loaisp;
use Illuminate\Http\Request;

class LoaispController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDanhSach()
    {
        $loaisp = loaisp::all();
        return view('loaisp.danhsach', compact('loaisp'));
    }

    public function getThem()
    {
        return view('loaisp.them');
    }

    public function postThem(Request $request)
    {
        

        $orm = new loaisp();
        $orm->tenloai = $request->tenloai;
        $orm->save();
        return redirect()->route('loaisp');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getSua($id)
    {
        $loaisp = loaisp::find($id);
        return view('loaisp.sua', compact('loaisp'));
    }

    public function postSua(Request $request, $id)
    {
       

        $orm = loaisp::find($id);
        $orm->tenloai = $request->tenloai;
        $orm->save();
        return redirect()->route('loaisp');
    }

    public function getXoa($id)
    {
        $orm = loaisp::find($id);
        $orm->delete();
        return redirect()->route('loaisp');
    }
}
