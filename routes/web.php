<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminDanhMucController;
use App\Http\Controllers\Admin\AdminDonHangController;
use App\Http\Controllers\Admin\AdminLienHeController;
use App\Http\Controllers\Admin\AdminNhanHieuController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminSanPhamController;
use App\Http\Controllers\Admin\AdminTaiKhoanController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\BinhluanController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\LienHeController;
use App\Http\Controllers\GioHangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\Shipper\ShipperController;
use App\Http\Controllers\Shipper\ShipperDonHangController;
use App\Models\Donhang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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
Route::get('/d/{id}',[AdminDonHangController::class,'sol']);


Route::get('/redirect', [HomeController::class, 'redirect']);
Route::get('/search', [ResponseController::class, 'search'])->name('search');
Route::get('/danhmuc/{item}', [ResponseController::class, 'finddanhmuc'])->name('finddanhmuc');

Route::get('/google/redirect',[AdminController::class,'ggredirect']);
Route::get('/google/callback',[AdminController::class,'ggcallback']);

Route::get('login/facebook', [AdminController::class, 'fbredirect'])->name('login.fb');
Route::get('login/facebook/callback', [AdminController::class, 'fbcallback']);

Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
// xác thực là admin mới vào được trang admin gọi là middleware
// admin/taobang
// admin/xoabang
// name là định danh 
// link là admin/
// link là admin/danh-muc
/// admin/danh-muc/
/// admin/danh-muc/create
/// admin/danh-muc/all
/// admin/danh-muc/edit/12

/// admin/danh-muc/edit/23
// thuộc controllẻ là Admin Danh muc COntroller ở phần App
// Route::get( 'Tên địa chỉ',     " hàm để thực thi địa chỉ")
Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::prefix('/danh-muc')->name('danhmuc.')->controller(AdminDanhMucController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });
    Route::prefix('/banner')->name('banner.')->controller(BannerController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'luuAnh')->name('luu');
    });
    Route::prefix('/don-hang')->name('donhang.')->controller(AdminDonHangController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/duyetdon', 'duyetdon')->name('duyetdon');
        Route::get('/details/{id}', 'details')->name('details');
        Route::get('/search', 'search')->name('search');
        Route::post('/store', 'store')->name('store');
        Route::get('/phancong/{id}', 'phancong')->name('phancong');
        Route::get('/xacnhan/{id}', 'xacnhan')->name('xacnhan');
        Route::get('/show/{id}', 'show')->name('show');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });
    Route::prefix('/tai-khoan')->name('taikhoan.')->controller(AdminTaiKhoanController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/all', 'all')->name('all');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::get('/phanquyen', 'phanquyen')->name('phanquyen');
        Route::get('/suadoi/{id}/{value}', 'thaydoi')->name('suadoi');
        Route::get('/show/{id}', 'show')->name('show');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });
    Route::prefix('/san-pham')->name('sanpham.')->controller(AdminSanPhamController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/show/{id}', 'show')->name('show');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });
    Route::prefix('/lien-he')->name('lienhe.')->controller(AdminLienHeController::class)->group(function () {
        Route::get('/traloi', 'traloi')->name('traloi');
        
        Route::get('/', 'index')->name('index');
        Route::get('/detail/{id}', 'detail')->name('detail');

        Route::get('/detroy/{$id}', 'detroy')->name('detroy');
    });
    Route::prefix('/nhan-hieu')->name('nhanhieu.')->controller(AdminNhanHieuController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/show/{id}', 'show')->name('show');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });
    Route::prefix('/profile')->name('profile.')->controller(AdminProfileController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::post('/updateImg/{id}', 'updateImg')->name('updateImg');
        Route::get('/show/{id}', 'show')->name('show');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });
});


Route::middleware('shipper')->prefix('shipper')->name('shipper.')->group(function () {
    Route::prefix('/profile')->name('profile.')->controller(ShipperController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/update/{id}', 'update')->name('update');
        Route::post('/updateImg/{id}', 'updateImg')->name('updateImg');
    });
    Route::prefix('/don-hang')->name('donhang.')->controller(ShipperDonHangController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/details', 'details')->name('details');
        Route::get('/search', 'search')->name('search');
        Route::post('/store', 'store')->name('store');
        Route::get('/phancong/{id}', 'phancong')->name('phancong');
        Route::post('/xacnhan/{id}', 'xacnhan')->name('xacnhan');
    });
});
Route::prefix('shoplaptop')->name('shoplaptop.')->group(function () {
    Route::get('/bao-hanh', [ResponseController::class, 'baohanh'])->name('baohanh');
    Route::get('/van-chuyen', [ResponseController::class, 'vanchuyen'])->name('vanchuyen');
    Route::prefix('lien-he')->controller(LienHeController::class)->name('lienhe.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
    });
    Route::get('/allDanhmuc', [ResponseController::class, 'allDanhmuc'])->name('adllDanhmuc');
    Route::get('/lastest', [ResponseController::class, 'spLastest'])->name('spLastest');
    Route::get('/gio-hang', [GioHangController::class, 'index'])->name('index');
    Route::get('/addcart/{id}', [GioHangController::class, 'add_cart'])->name('addcart');
    Route::get('/chi-tiet-sp/{id}', [SanPhamController::class, 'details'])->name('chitiet');
    Route::get('/thanh-toan', [ResponseController::class, 'thanhtoan'])->name('thanhtoan');
    Route::get('/thankyou', [ResponseController::class, 'thankyou'])->name('thankyou');
    Route::get('/changeQuantity/{id}/{value}/{iduser}', [GioHangController::class, 'changeQuantity'])->name('changeQuantity');
    Route::get('/detroy/{id}/{iduser}', [GioHangController::class, 'detroy'])->name('detroy');
    Route::get('/donhang',[DonHangController::class,'index'])->name('donhang');
    Route::get('/chi-tiet-don-hang/{id}',[DonHangController::class,'details'])->name('details');

    Route::prefix('/profile')->name('profile.')->controller(ProfileController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::post('/update/{id}', 'update')->name('update');
        Route::post('/updateImg/{id}', 'updateImg')->name('updateImg');

    });
    Route::prefix('/binhluan')->name('binhluan.')->controller(BinhluanController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/post/{user}&{sanpham}', 'post')->name('post');
    });
});
Route::get('/td', [LienHeController::class, 'a'])->name('td');
Route::get('/td1', [LienHeController::class, 'b']);
