<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    protected $fillable = [
        'id',
        'cpu',
        'dongia',
        'donviban',
        'donvikho',
        'dungluongpin',
        'hedieuhanh',
        'manhinh',
        'ram',
        'thietke',
        'anh',
        'name',
        'thongtinchung',
    ];
    use HasFactory;
    public function danhmuc()
    {
        return $this->belongsTo(Danhmuc::class);
    }
    public function nhanhieu()
    {
        return $this->belongsTo(Nhanhieu::class);
    }
    public function donhang()
    {
        return $this->belongsToMany(Donhang::class, 'chitietdonhangs');
    }
    public function giohang()
    {
        return $this->belongsToMany(Giohang::class, 'chitietgiohangs');
    }
    public function chitietdonhang()
    {
        return $this->hasMany(Chitietdonhang::class);
    }
    public function chitietgiohang()
    {
        return $this->hasMany(Chitietgiohang::class);
    }
}
