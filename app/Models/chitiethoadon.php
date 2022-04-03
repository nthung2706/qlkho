<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitiethoadon extends Model
{
    use HasFactory;

    public function hanghoa()
    {
        return $this->belongsTo(hanghoa::class, 'hanghoa_id', 'id');
    }
    public function hoadon()
    {
        return $this->belongsTo(hoadon::class, 'hoadon_id', 'id');
    }
}
