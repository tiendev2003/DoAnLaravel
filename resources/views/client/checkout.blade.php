@extends('layouts.client')
@section('title', 'Thanh toán')

@section('script')
<script src="/client/js/client/checkoutAjax.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".table .donGia .check").each(function() {
            var value = accounting.formatMoney($(this).text()) + ' VND';
            $(this).html(value);
        });

        $(".table .total").each(function() {
            var value = accounting.formatMoney($(this).text()) + ' VND ';
            $(this).html(value);
        });
    });

</script>

@endsection
@section('content')

<section>
    <form method="GET" action="{{ route('shoplaptop.thankyou') }}" enctype="multipart/form-data">
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card-body ">
                    <h4 class="card-header border ">Thông tin khách hàng</h4>
                    <div class="col-md-12 mt-2"> 
                    <label for="name" class="form-label">Họ tên Quý Khánh</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" >
                    </div>
                    <div class="col-md-12 mt-2"> 
                    <label for="email" class="form-label">Địa chỉ email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" >
                    </div>
                    <div class="col-md-12 mt-2"> 
                    <label for="sdt" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" id="sdt" name="sdt" value=" {{ $user->sdt }}" >
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for="my-textarea">Địa chỉ</label>
                        <textarea id="my-textarea" class="form-control" name="address" rows="3" >{{ $user->address }}</textarea>
                    </div>
                    <div>    
                      <div class="col-md-12 mt-2">
                        <label for="my-textarea1">Ghi Chú</label>
                        <textarea id="my-textarea1" class="form-control" name="ghichu" rows="3" ></textarea>
                    </div>
                    <input type="hidden" id="tongGiaTri" name="tongGiaTri">
                    </div>
                  
                
                </div>
            </div>
            <div class="col-md-9">
                <div class="card-body">
                    <h4 class="card-header border ">Giỏ hàng</h4>
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Tên Sản Phẩm</th>
                                <th scope="col">Đơn Giá</th>
                                <th scope="col">Tổng</th>

                            </tr>
                        </thead>
                        @foreach ($cart as $sp)
                        <tbody>
                            <tr>
                                <td>
                                    <img src="/sanpham/{{ $sp->sanpham->anh }}" alt="not found img" class="pro-img">
                                </td>
                                <td class="namePro"> {{ $sp->sanpham->name }}</td>
                                <td class="donGia">
                                    <div class="check " style="display: inline-block; ">
                                        {{ $sp->sanpham->dongia }}</div>
                                    <div style="display: inline-block; "> x {{ $sp->soluong }}
                                    </div>
                                </td>
                                <td>
                                    <div class="total {{ $sp->id }}">{{ $sp->sanpham->dongia * $sp->soluong }}
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
                <div class="row">

                    <div class="col-md-6"></div>
                    <div class="col-md-6 ">

                        <p>Tổng giá trị đơn hàng: <b id="ordertotal"> </b></p>
                        <a href="{{ route('shoplaptop.index') }}" class="btn btn-primary float-left mt-2">Quay lại giỏ
                            hàng</a>

                        <button class="btn btn-danger pull-center float-right mt-2" type="submit" id="submit">Gửi
                            đơn
                            hàng</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection
