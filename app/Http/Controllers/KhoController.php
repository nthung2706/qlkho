<?php

namespace App\Http\Controllers;

use App\Models\kho;
use App\Models\hanghoa;
use App\Models\hoadon;
use App\Models\chitiethoadon;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class KhoController extends Controller
{
    public function getDanhSach(){
        $kho = kho::all();
        $hanghoa = hanghoa::all();
        return view('kho.danhsach', compact('kho','hanghoa'));
    }
    public function getThem()
    {
        $hanghoa = hanghoa::all();
        return view('kho.them', compact('hanghoa'));
    }

    public function postThem(Request $request)
    {
        
        
        $orm = new hanghoa();
        $orm->loaisp_id = $request->loaisp_id;
        $orm->nguoncungcap_id = $request->nguoncungcap_id;
        $orm->donvi_id = $request->donvi_id;
        $orm->tenhh = $request->tenhh;
        $orm->gianhap = $request->gianhap;
        $orm->giaban = $request->giaban;
        $orm->chitiet = $request->chitiet;
        

        $orm->save();
        return redirect()->route('hanghoa');

    }
    public function getGioHang_Them($id)
    {
        $kho = kho::where('id', $id)->first();
        $hanghoa = hanghoa::all();
        Cart::add([
            'id' => $kho->id,
            'name' => $hanghoa->tenhh,
            'price' => $hanghoa->giaban,
            'qty' => 1,
            'weight' => 0,
            'options' => [
            'image' => $hanghoa->hinhanh
            ]
        ]);

        return redirect()->route('frontend');
    }

    public function postXuatkho(Request $request)
    {
        
        $dh = new hoadon();
        $orm->nguoilap = $request->nguoilap;
        $orm->ngaylap = $request->ngaylap;
        $orm->sdt = $request->sdt;
        $orm->tinh = $request->tinh;
        $orm->huyen = $request->huyen;
        $orm->thitran = $request->thitran;
        $orm->trangthai = 1;
        $dh->save();
        foreach (Cart::content() as $value) {
            $ct = new chitiethoadon();
            $ct->dathang_id = $dh->id;
            $ct->sanpham_id = $value->id;
            $ct->soluong = $value->qty;
            $ct->giaban = $value->price;
            $ct->save();
        }
        $sp = kho::find($ct->sanpham_id);
        if($ct->soluong > 0){
            $sp->soluong -= $ct->soluong;
            $sp->save();
        }
        Mail::to(Auth::user()->email)->send(new DatHangEmail($dh));
        return redirect()->route('home');
    }


    public function getSua($id){
        $hanghoa = hanghoa::find($id);
        $mucluong = mucluong::all();
        $bangcap = bangcap::all(); 
        $chuyenmon = chuyenmon::all(); 
        $ngoaingu = ngoaingu::all(); 
        $dantoc = dantoc::all(); 
        $tongiao = tongiao::all(); 
        return view('nhanvien.sua', compact('nhanvien','mucluong', 'bangcap','chuyenmon','ngoaingu','dantoc','tongiao'));
    }
    public function postSua( Request $request,$id)
    {
        
        $orm = nhanvien::find($id);
        $orm->mucluong_id = $request->mucluong_id;
        $orm->bangcap_id = $request->bangcap_id;
        $orm->chuyenmon_id = $request->chuyenmon_id;
        $orm->ngoaingu_id = $request->ngoaingu_id;
        $orm->dantoc_id = $request->dantoc_id;
        $orm->tongiao_id = $request->tongiao_id;
        $orm->hovaten = $request->hovaten;
        $orm->gioitinh = $request->gioitinh;
        $orm->ngaysinh = $request->ngaysinh;
        $orm->cmnd = $request->cmnd;
        $orm->sdt = $request->sdt;
        $orm->diachi = $request->diachi;
        $orm->quequan = $request->quequan;
        $orm->trangthai = $request->trangthai;
        $orm->ngaynghilam = $request->ngaynghilam;
        $orm->hesoluong = $request->hesoluong;
        $orm->tenbh = $request->tenbh;
        $orm->mabh = $request->mabh;
        $orm->mucdong = $request->mucdong;
        $orm->ngaycap = $request->ngaycap;
        $orm->ngayhethan = $request->ngayhethan;
        if ($request->hasFile('photo_path')) {
            $file = $request->file('photo_path');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('storage/images/', $filename);
            $orm->hinhanh = $filename;
        }
        $orm->save();
        return redirect()->route('nhanvien');

    }


    public function getXoa($id)
    {
        $orm = hanghoa::find($id);
        $orm->delete();
        return redirect()->route('hanghoa');
    }

    // public function getGioHang_Them($TenSanPham_slug)
    // {
    //     $sanpham = sanpham::where('TenSanPham_slug', $TenSanPham_slug)->first();
    //     Cart::add([
    //         'id' => $sanpham->id,
    //         'name' => $sanpham->TenSanPham,
    //         'price' => $sanpham->GiaBan,
    //         'qty' => 1,
    //         'weight' => 0,
    //         'options' => [
    //             'image' => $sanpham->HinhAnh,
    //             'discount' => $sanpham->GiamGia
    //         ]
    //     ]);
    //     return redirect()->route('home.giohang');
    // }
}
