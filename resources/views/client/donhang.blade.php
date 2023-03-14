@extends('layouts.client')
@section('title')
    Đơn Hàng
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
            @if ($data == null)
                <div class="col">
                    <h3 class="mt-3 text-center"> bạn không có đơn hàng nào cả</h3>
                </div>
            @else
                <div class="card-body">
                    <div class="table-responsive text-center align-content-center">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col-1">Mã Đơn Hàng</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Thành tiền</th>
                                    <th scope="col">Chi tiết</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                    <tr data-href="{{ route('shoplaptop.details', ['id' => $d->id]) }}">
                                        <td scope="row">{{ $d->id }}</td>
                                        <td>{{ $d->trangthai }}</td>
                                        <td class="covertPriceProduct">{{ App\Http\Controllers\Admin\AdminDonHangController::sol($d->id) }}</td>
                                        <td> <a href="{{ route('shoplaptop.details', ['id' => $d->id]) }}"> <i
                                                    class="fa fa-edit" aria-hidden="true"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            @endif
        </div>
    </div>
    <script>
        jQuery(document).ready(function($) {
            $('*[data-href]').on('click', function() {
                window.location = $(this).data("href");
            });
        });
    </script>
@endsection
