<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoaispController;
use App\Http\Controllers\NguoncungcapController;
use App\Http\Controllers\HanghoaController;
use App\Http\Controllers\HoadonController;
use App\Http\Controllers\ChitiethoadonController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GoogleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::prefix('google')->name('google.')->group( function(){
//     Route::get('login', [HomeController::class, 'loginWithGoogle'])->name('login');
//     Route::any('callback', [HomeController::class, 'callbackFromGoogle'])->name('callback');
// });


Route::middleware('auth','user')->prefix('user')->group(function () {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::get('/hanghoa', [HanghoaController::class, 'getDanhSach'])->name('hanghoa');
    Route::get('/hanghoa/them', [HanghoaController::class, 'getThem'])->name('hanghoa.them');
    Route::post('/hanghoa/them', [HanghoaController::class, 'postThem'])->name('hanghoa.them');
    Route::get('/hanghoa/sua/{id}', [HanghoaController::class, 'getSua'])->name('hanghoa.sua');
    Route::post('/hanghoa/sua/{id}', [HanghoaController::class, 'postSua'])->name('hanghoa.sua');
    Route::get('/hanghoa/xoa/{id}', [HanghoaController::class, 'getXoa'])->name('hanghoa.xoa');

    Route::get('/loaisp', [LoaispController::class, 'getDanhSach'])->name('loaisp');
    Route::get('/loaisp/them', [LoaispController::class, 'getThem'])->name('loaisp.them');
    Route::post('/loaisp/them', [LoaispController::class, 'postThem'])->name('loaisp.them');
    Route::get('/loaisp/sua/{id}', [LoaispController::class, 'getSua'])->name('loaisp.sua');
    Route::post('/loaisp/sua/{id}', [LoaispController::class, 'postSua'])->name('loaisp.sua');
    Route::get('/loaisp/xoa/{id}', [LoaispController::class, 'getXoa'])->name('loaisp.xoa');

    Route::get('/nguoncungcap', [NguoncungcapController::class, 'getDanhSach'])->name('nguoncungcap');
    Route::get('/nguoncungcap/them', [NguoncungcapController::class, 'getThem'])->name('nguoncungcap.them');
    Route::post('/nguoncungcap/them', [NguoncungcapController::class, 'postThem'])->name('nguoncungcap.them');
    Route::get('/nguoncungcap/sua/{id}', [NguoncungcapController::class, 'getSua'])->name('nguoncungcap.sua');
    Route::post('/nguoncungcap/sua/{id}', [NguoncungcapController::class, 'postSua'])->name('nguoncungcap.sua');
    Route::get('/nguoncungcap/xoa/{id}', [NguoncungcapController::class, 'getXoa'])->name('nguoncungcap.xoa');
    
    Route::get('/kho', [KhoController::class, 'getDanhSach'])->name('kho');
    Route::get('/kho/them', [KhoController::class, 'getThem'])->name('kho.them');
    Route::post('/kho/them', [KhoController::class, 'postThem'])->name('kho.them');
    Route::get('/kho/sua/{id}', [KhoController::class, 'getSua'])->name('kho.sua');
    Route::post('/kho/sua/{id}', [KhoController::class, 'postSua'])->name('kho.sua');
    Route::get('/kho/xoa/{id}', [KhoController::class, 'getXoa'])->name('kho.xoa');
    

});


Route::middleware('auth','admin')->prefix('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/hoadon', [HoadonController::class, 'getDanhSach'])->name('hoadon');
    Route::get('/hoadonno', [HoadonController::class, 'getNo'])->name('hoadonno');
    Route::get('/hoadon/sua/{id}', [HoadonController::class, 'getSua'])->name('hoadon.sua');
    Route::post('/hoadon/sua/{id}', [HoadonController::class, 'postSua'])->name('hoadon.sua');
    Route::get('/hoadon/xoa/{id}', [HoadonController::class, 'getXoa'])->name('hoadon.xoa');


    Route::get('/hanghoa', [HanghoaController::class, 'getDanhSach'])->name('hanghoa');
    Route::get('/hanghoa/them', [HanghoaController::class, 'getThem'])->name('hanghoa.them');
    Route::post('/hanghoa/them', [HanghoaController::class, 'postThem'])->name('hanghoa.them');
    Route::get('/hanghoa/sua/{id}', [HanghoaController::class, 'getSua'])->name('hanghoa.sua');
    Route::post('/hanghoa/sua/{id}', [HanghoaController::class, 'postSua'])->name('hanghoa.sua');
    Route::get('/hanghoa/xoa/{id}', [HanghoaController::class, 'getXoa'])->name('hanghoa.xoa');
    Route::post('hoadon/{id}', [HanghoaController::class, 'getDonHang_Them'])->name('hoadon.them');
    Route::post('/hanghoa',[HanghoaController::class, 'postDat_Hang'])->name('hoadon.dathang');
    Route::get('/gio-hang/giam/{row_id}', [HanghoaController::class, 'getGioHang_Giam'])->name('home.giohang.giam');
    Route::get('/gio-hang/tang/{row_id}', [HanghoaController::class, 'getGioHang_Tang'])->name('home.giohang.tang');

    Route::post('/hanghoa/nhap', [HanghoaController::class, 'postNhap'])->name('hanghoa.nhap');
    Route::get('/hanghoa/xuat', [HanghoaController::class, 'getXuat'])->name('hanghoa.xuat');


    Route::get('/loaisp', [LoaispController::class, 'getDanhSach'])->name('loaisp');
    Route::get('/loaisp/them', [LoaispController::class, 'getThem'])->name('loaisp.them');
    Route::post('/loaisp/them', [LoaispController::class, 'postThem'])->name('loaisp.them');
    Route::get('/loaisp/sua/{id}', [LoaispController::class, 'getSua'])->name('loaisp.sua');
    Route::post('/loaisp/sua/{id}', [LoaispController::class, 'postSua'])->name('loaisp.sua');
    Route::get('/loaisp/xoa/{id}', [LoaispController::class, 'getXoa'])->name('loaisp.xoa');

    Route::get('/nguoncungcap', [NguoncungcapController::class, 'getDanhSach'])->name('nguoncungcap');
    Route::get('/nguoncungcap/them', [NguoncungcapController::class, 'getThem'])->name('nguoncungcap.them');
    Route::post('/nguoncungcap/them', [NguoncungcapController::class, 'postThem'])->name('nguoncungcap.them');
    Route::get('/nguoncungcap/sua/{id}', [NguoncungcapController::class, 'getSua'])->name('nguoncungcap.sua');
    Route::post('/nguoncungcap/sua/{id}', [NguoncungcapController::class, 'postSua'])->name('nguoncungcap.sua');
    Route::get('/nguoncungcap/xoa/{id}', [NguoncungcapController::class, 'getXoa'])->name('nguoncungcap.xoa');
    
    Route::get('/chitiethoadon', [ChitiethoadonController::class, 'getDanhSach'])->name('chitiethoadon');
    Route::get('/chitiethoadon/them', [ChitiethoadonController::class, 'getThem'])->name('chitiethoadon.them');
    Route::get('/chitiethoadon/xem/', [ChitiethoadonController::class, 'getXem'])->name('chitiethoadon.xem');


    Route::get('/doanhthu', [HomeController::class, 'getDanhSach'])->name('doanhthu');
});



