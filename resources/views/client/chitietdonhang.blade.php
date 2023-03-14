@extends('layouts.client')
@section('title')
    Chi tiết đơn hàng
@endsection
@section('content')
  <script>
        $(document).ready(function() {
            jQuery(".table .covertPriceProduct").each(function() {
                var value = new Intl.NumberFormat('VND').format($(this).text());

                $(this).html(value);
            });
            jQuery(".table  .total").each(function() {
                var value = new Intl.NumberFormat('VND').format($(this).text());
                $(this).html(value);
            });

        });
    </script>
    <div class="container" style="font-family: Roboto">
        <div class="card">
            <div class="card-header">
                <h3>Đơn hàng của tôi</h3>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered font-weight-bold   ">
                    <thead>
                        <tr>
                            <td>STT</td>
                            <td>Ảnh</td>
                            <td>Tên sản phẩm</td>
                            <td>Đơn giá</td>
                            <td>Số lượng</td>
                            <td>Tổng</td>
                        
                        </tr>
                    </thead>
                    <tbody>
                      
                            @foreach ($cart as $sp)
                                <tr id="item{{ $sp->sanpham->id }}" class="item{{ $sp->id }}">
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td><img class="pro-img" src="/sanpham/{{ $sp->sanpham->anh }}"> </td>

                                    <td>
                                        <p class="cart_ten"><a
                                               style="text-decoration: none" href="/shoplaptop/chi-tiet-sp/{{ $sp->sanpham->id }}">{{ $sp->sanpham->name }}</a>
                                        </p>
                                        <p class="cart_masanpham">Mã sản phẩm : <span>{{ $sp->sanpham->id }}</span></p>
                                        <p class="">Bảo hành : {{ $sp->sanpham->thongtinbaohanh }}</p>
                                    </td>
                                    <td class="covertPriceProduct">{{ $sp->sanpham->dongia }}</td>

                                    <td>
                                      <input class=" text-center" type="text" name="" readonly value="{{ $sp->soluong }}" size="3px">
                                    </td>
                                    <td>

                                        <input type="hidden" name="tota" class="tota"
                                            value="{{ $sp->sanpham->dongia * $sp->soluong }}">
                                        <span class="total" id="item{{ $sp->sanpham->id }}_total"
                                            name="total_price">{{ $sp->sanpham->dongia * $sp->soluong }}
                                        </span>
                                        VND

                                    </td>
                                    
                                </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
