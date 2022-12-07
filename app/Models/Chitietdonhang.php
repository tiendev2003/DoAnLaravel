<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chitietdonhang extends Model
{
    use HasFactory;
    public function sanpham()
    {
        return $this->belongsTo(Sanpham::class);
    }
    public function donhang()
    {
        return $this->belongsTo(Donhang::class);
    }
}
