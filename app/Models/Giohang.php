<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Giohang extends Model
{
    use HasFactory;  public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function sanpham()
    {
        return $this->belongsToMany(Sanpham::class, 'chitietgiohangs');
    }
    public function chitietgiohang()
    {
        return $this->hasMany(Chitietgiohang::class);
    }
}
