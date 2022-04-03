<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loaisp extends Model
{
    use HasFactory;

    protected $fillable = [
        'loaisanpham_id',
        
        ];
       

    public function hanghoa()
    {
        return $this->hasMany(hanghoa::class,'loaisp_id','id');
    }


}
