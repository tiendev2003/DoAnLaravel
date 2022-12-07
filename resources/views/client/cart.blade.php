@extends('layouts.client')
@section('title', 'Quản lý giỏ hàng')

@section('script_head')
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script type="text/javascript">
        function deleteFromCart(id, iduser) {
            jQuery.ajax({
                type: "GET",
                url: "http://localhost:8000/shoplaptop/detroy/" + id + "/" + iduser,
                success: function(result) {
                    var element = document.getElementById("item" + id);
                    element.parentNode.removeChild(element);
                    calculateOrder();
                },
                error: function(e) {
                    alert("Error: ", e);
                    console.log("Error", e);
                }
            });
        }
    </script>
@endsection
@section('content')
    <section>
        <br>
        <h2> QUẢN LÝ GIỎ HÀNG</h2> <br>
        <table class="table table-bordered font-weight-bold table-responsive-xl">
            <thead>
                <tr>
                    <td>STT</td>
                    <td>Ảnh</td>
                    <td>Tên sản phẩm</td>
                    <td>Đơn giá</td>
                    <td>Số lượng</td>
                    <td>Tổng</td>
                    <td>Xóa</td>
                </tr>
            </thead>
            <tbody>
                @if (!$cart->isEmpty())
                    @foreach ($cart as $sp)
                        <tr id="item{{ $sp->sanpham->id }}" class="item{{ $sp->id }}">
                            <td>{{ $loop->index + 1 }}</td>
                            <td><img class="pro-img" src="/sanpham/{{ $sp->sanpham->anh }}"> </td>

                            <td>
                                <p class="cart_ten"><a
                                        href="/shoplaptop/chi-tiet-sp/{{ $sp->sanpham->id }}">{{ $sp->sanpham->name }}</a>
                                </p>
                                <p class="cart_masanpham">Mã sản phẩm : <span>{{ $sp->sanpham->id }}</span></p>
                                <p class="">Bảo hành : {{ $sp->sanpham->thongtinbaohanh }}</p>
                            </td>
                            <td class="covertPriceProduct">{{ $sp->sanpham->dongia }}</td>

                            <td>
                                <input type="number" value={{ $sp->soluong }} min="1" class="form-control"
                                    style="width: 5rem;"
                                    onChange="changeQuanity( {{ $sp->sanpham->id }},this.value, {{ $sp->sanpham->dongia }},{{ $id_user }})">
                            </td>
                            <td>

                                <input type="hidden" name="tota" class="tota"
                                    value="{{ $sp->sanpham->dongia * $sp->soluong }}">
                                <span class="total" id="item{{ $sp->sanpham->id }}_total"
                                    name="total_price">{{ $sp->sanpham->dongia * $sp->soluong }}
                                </span>
                                VND

                            </td>
                            <td class="cart-img">
                                <a class="btn btn-outline-danger"
                                    onClick="deleteFromCart({{ $sp->sanpham->id }},{{ $id_user }})">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif

                <tr>
                    @if (count($cart) == 0)
                        <td colspan="3">
                            <a class="btn btn-primary" href="/"><i class="fa fa-arrow-left"></i> Mua thêm sản phẩm
                                khác</a>
                        </td>
                    @else
                        <td colspan="3">
                            <a class="btn btn-primary " href="/"><i class="fa fa-arrow-left"></i> Mua thêm sản phẩm
                            </a>
                            <div class=" float-right">

                                &nbsp;
                                <a href="" class="btn btn-danger"> Thanh toán</a>
                                &nbsp;
                                <a href="{{ route('shoplaptop.donhang') }}" class="btn btn-danger"> Đơn hàng</a>
                                &nbsp;
                                <a class="btn btn-warning " href="{{ route('shoplaptop.thanhtoan') }}"><i
                                        class="fa-solid fa-check-to-slot"></i>
                                    Đặt Hàng</a>
                            </div>
                        </td>
                    @endif
                    <td colspan="4" class="text-center">
                        <p class="cart_tongdonhang mt-2">Tổng giá trị đơn hàng : <span id="ordertotal"></span> VND</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>

@endsection
@section('script')
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
    <script src="/client/js/client/cartAjax.js"></script>
@endsection
