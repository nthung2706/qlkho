<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hanghoa extends Model
{
    use HasFactory;    
    
    
 protected $fillable = [
    'loaisp_id',
    'nguoncungcap_id',
    'tenhh',
    'gianhap',
    'soluong',
    'khoiluong',
    'ngaynhap',
    'giaban',
    'chitiet',
    'hinhanh',
    ];
   

    public function loaisp()
    {
        return $this->belongsTo(loaisp::class, 'loaisp_id', 'id');
    }

    public function nguoncungcap()
    {
        return $this->belongsTo(nguoncungcap::class, 'nguoncungcap_id', 'id');
    }

    

    public function donvi()
    {
        return $this->belongsTo(donvi::class, 'donvi_id', 'id');
    }

    public function kho()
    {
        return $this->hasMany(kho::class,'hanghoa_id','id');
    }

    public function chitiethoadon()
    {
        return $this->hasMany(chitiethoadon::class, 'hanghoa_id', 'id');
    }
}
