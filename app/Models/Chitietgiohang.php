<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chitietgiohang extends Model
{
    use HasFactory;
    public function giohang()
    {
        return $this->belongsTo(Giohang::class);
    }
    public function sanpham()
    {
        return $this->belongsTo(Sanpham::class);
    }
}
