<?php

namespace App\Http\Controllers;

use App\Models\hanghoa;
use App\Models\loaisp;
use App\Models\nguoncungcap;
use App\Models\donvi;
use App\Models\hoadon;
use App\Models\chitiethoadon;
use App\Imports\hanghoaImport;
use App\Exports\hanghoaExport;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Gloudemans\Shoppingcart\Facades\Cart;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;


class HanghoaController extends Controller
{
    public function postNhap(Request $request)
    {
    Excel::import(new hanghoaImport, $request->file('file_excel'));

    return redirect()->route('hanghoa')->with('message','Thêm thành công');
    }

    // Xuất ra Excel
    public function getXuat()
    {
    return Excel::download(new hanghoaExport, 'danh-sach-san-pham.xlsx');
    }


    public function getDanhSach(){
        $hanghoa = hanghoa::all();
        $loaisp = loaisp::all();
        $nguoncungcap = nguoncungcap::all();
        return view('hanghoa.danhsach', compact('hanghoa','loaisp','nguoncungcap'));
    }
    public function getThem()
    {
        $loaisp = loaisp::all();
        $nguoncungcap = nguoncungcap::all(); 

        $message="Registered successfully";
        return view('hanghoa.them', compact('loaisp', 'nguoncungcap','message'));
    }

    public function postThem(Request $request)
    {
        
        
        $orm = new hanghoa();
        $orm->loaisp_id = $request->loaisp_id;
        $orm->nguoncungcap_id = $request->nguoncungcap_id;
        $orm->tenhh = $request->tenhh;
        $orm->gianhap = $request->gianhap;
        $orm->giaban = $request->giaban;
        $orm->chitiet = $request->chitiet;
        if ($request->hasFile('hinhanh')) {
            $file = $request->file('hinhanh');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('storage/images/', $filename);
            $orm->hinhanh = $filename;
        }

        $orm->save();
        return redirect()->route('hanghoa')->with('message','Thêm thành công');
    }
    public function getDonHang_Them($id)
    {
        $hanghoa = hanghoa::where('id', $id)->first();
        Cart::add([
            'id' => $hanghoa->id,
            'name' => $hanghoa->tenhh,
            'price' => $hanghoa->giaban,
            'qty' => 1,
            'weight' => 0,
            'options' => [
                'image' => $hanghoa->hinhanh,

            ]
        ]);
        return redirect()->route('hanghoa')->with('message','Thêm vào hóa đơn thành công');
    }

    

    public function postDat_Hang(Request $request)
    {

        $dh = new hoadon();
        $dh->nguoilap = Auth::user()->name;
        $dh->tinhtrang_id = 1;
        $dh->ngaylap = $request->ngaylap;
        $dh->sdt = $request->sdt;
        $dh->tinh = $request->tinh;
        $dh->nguoinhan = $request->nguoinhan;
        $dh->trangthai = 1;
        $dh->huyen = $request->huyen;
        $dh->thitran = $request->thitran;
        $dh->save();
        foreach (Cart::content() as $value) {
            $ct = new chitiethoadon();
            $ct->hoadon_id = $dh->id;
            $ct->hanghoa_id = $value->id;
            $ct->soluong = $value->qty;
            $ct->giaban = $value->price;
            $ct->save();
        }
        $sp = hanghoa::find($ct->hanghoa_id);
        if($ct->soluong > 0){
            $sp->soluong -= $ct->soluong;
            $sp->save();
        }
        Cart::destroy();
        return redirect()->route('hanghoa')->with('message','xuất đơn hàng thành công');
    }



    public function getGioHang_Giam($row_id)
    {
        $hanghoa = hanghoa::all();
        $loaisp = loaisp::all();
        $nguoncungcap = nguoncungcap::all();
        $row = Cart::get($row_id);
        if ($row->qty > 1) {
            Cart::update($row_id, $row->qty - 1);
        }
        return view('hanghoa.danhsach', compact('hanghoa','loaisp','nguoncungcap'));
    }
    public function getGioHang_Tang($row_id)
    {
        $hanghoa = hanghoa::all();
        $loaisp = loaisp::all();
        $nguoncungcap = nguoncungcap::all();
        $row = Cart::get($row_id);
        if ($row->qty < 10) {
            Cart::update($row_id, $row->qty + 1);
        }
        return view('hanghoa.danhsach', compact('hanghoa','loaisp','nguoncungcap'));
    }


    public function getXoa($id)
    {
        $orm = hanghoa::find($id);
        $orm->delete();
        return redirect()->route('hanghoa');
    }

}
