<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nguoncungcap extends Model
{
    use HasFactory;
    protected $fillable = [
        'nguoncungcap_id',
        
        ];

    public function hanghoa()
    {
        return $this->hasMany(hanghoa::class, 'nguoncungcap_id', 'id');
    }
    
}
