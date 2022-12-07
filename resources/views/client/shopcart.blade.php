@extends('layouts.client')
@section('title')
    tien
@endsection
@section('script')
    <script src="/js/client/cartAjax.js"></script>
@endsection
@section('script_head')
    <link rel="stylesheet" href="/Frontend/css/cartTable.css">
    <script type="text/javascript">
        $(document).ready(function() {

            $(".table-convert-price .covertPriceProduct").each(function() {
                var value = accounting.formatMoney($(this).text()) + ' VND';
                $(this).html(value);
            });
            $(".table-convert-price .total").each(function() {
                var value = accounting.formatMoney($(this).text());
                $(this).html(value);
            });

        });
    </script>
@endsection
@section('content')
    <br>
    <br>
    <div class="container">
        <div class="row">
            <h2> QUẢN LÝ GIỎ HÀNG</h2> <br>
            <div class="col-10">
                <table class="table-cart-checkout mytable table-convert-price">
                    <tr>
                        <td>STT</td>
                        <td>Ảnh</td>
                        <td>Tên sản phẩm</td>
                        <td>Đơn giá</td>
                        <td>Số lượng</td>
                        <td>Tổng</td>
                        <td>Xóa</td>
                    </tr>
                    @foreach ($cart as $sp)
                        <tr class="cart_line" id="item${sp.id}">
                            <div>
                                <td>{{ $loop->index + 1 }}</td>
                                <td><img src="/sanpham/{{ $sp->sanpham->id }}" style="width: 150px" class="cart-img"></td>
                                <td style="text-align: center; mergin-top: -52px;">
                                    <p class="cart_ten"><a href="/sp?id={{ $sp->sanpham->id }}">{{ $sp->sanpham->name }}</a>
                                    </p>
                                    <p class="cart_masanpham">Mã sản phẩm : <span>{{ $sp->sanpham->id }}</span></p>
                                    <p class="">Bảo hành : {{ $sp->sanpham->thongtinbaohanh }}</p>
                                </td>
                                <td class="covertPriceProduct">{{ $sp->sanpham->dongia }}</td>
                                <td>
                                    @php
                                        $a = $sp->sanpham->id;
                                        $c = $sp->sanpham->donGia;
                                    @endphp

                                    <input class="input_num_cart" type="number" value="${quanity[sp->sanpham->id]}"
                                        min="1" onChange="changeQuanity( $a,this.value,$c)">
                                </td>
                                <td><b><span class="total" id="item${sp->sanpham.id}_total"
                                            name="total_price">${sp->sanpham->donGia*quanity[$sp->sanpham->id]}</span>
                                        VND</b></td>
                                <td class="cart-img">
                                    @php
                                        $d = $sp->sanpham->id;
                                    @endphp
                                    <a class="btn btn-danger" onClick="deleteFromCart($d)"><span
                                            class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </div>

                        </tr>
                    @endforeach
                    <tr>
                        @if (!empty($checkEmpty))
                            <td colspan="3">
                                <a class="btn btn-primary" href="/"><span
                                        class="glyphicon glyphicon-hand-left"></span> Mua
                                    thêm sản phẩm khác</a>
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                <a class="btn btn-warning " href="/checkout"><span class="glyphicon glyphicon-check"></span>
                                    Thanh toán</a>
                            </td>
                        @endif

                        @if (empty($checkEmpty))
                            <td colspan="3">
                                <a class="btn btn-primary" href="/">Mua thêm sản phẩm khác</a>
                            </td>
                        @endif
                        <td colspan="4">
                            <p class="cart_tongdonhang">Tổng giá trị đơn hàng : <span id="ordertotal"></span> VND</p>
                        </td>
                    </tr>

                </table>

            </div>

            <div class="col-xs-1">

            </div>

        </div>
    </div>
@endsection
