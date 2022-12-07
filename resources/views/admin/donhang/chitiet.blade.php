@extends('layouts.main')
@section('title', 'Chi tiết đơn hàng')
@section('script_header')
    <script>
        $(document).ready(function() {
            jQuery(".table .dongia").each(function() {
                var value = new Intl.NumberFormat('VND').format($(this).text());

                $(this).html(value);
            });
            jQuery(".table  .total").each(function() {
                var value = new Intl.NumberFormat('VND').format($(this).text());
                $(this).html(value);
            });

        });
    </script>
@endsection

@section('content')
    <div id="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="card shadow mb-4">
                    <div class="col-md-12">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-1">
                                    <a href="{{ route('admin.donhang.index') }}"><i class="fa fa-chevron-circle-left"
                                            aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                            <form action="{{ route('admin.donhang.xacnhan', ['id' => $data->id]) }}" method="get">
                                <div class="row">
                                    <div class="col-6 text-center">
                                        <h5 class="font-weight-bold mb-4">
                                            <strong>Thông tin khách</strong>
                                        </h5>
                                        <div class="form-group row">
                                            <label class="col-md-5 col-form-label text-md-right">Họ Tên Người Nhận</label>
                                            <div class="col-md-4">
                                                <input class="form-control form-control-user" readonly autofocus="autofocus"
                                                    value="{{ App\Http\Controllers\Admin\AdminDonHangController::getParentsTree($data->nguoidat_id) }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5 col-form-label text-md-right">Địa chỉ người nhận</label>
                                            <div class="col-md-4">
                                                <input class="form-control form-control-user" readonly autofocus="autofocus"
                                                    value="{{ $data->address }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5 col-form-label text-md-right">Số điện thoại nhận
                                                hàng</label>
                                            <div class="col-md-4">
                                                <input class="form-control form-control-user" readonly autofocus="autofocus"
                                                    value="{{ $data->sdt }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 text-center">
                                        <h5 class="font-weight-bold mb-4">
                                            <strong>Thông tin đơn hàng</strong>
                                        </h5>
                                        <div class="form-group row">
                                            <label class="col-md-5 col-form-label text-md-right">Trạng thái đơn hàng</label>
                                            <div class="col-md-4">
                                                <input class="form-control form-control-user" readonly autofocus="autofocus"
                                                    value="{{ $data->trangthai }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5 col-form-label text-md-right">Ngày đặt hàng</label>
                                            <div class="col-md-4">
                                                <input class="form-control form-control-user" readonly autofocus="autofocus"
                                                    value="{{ $data->ngaydat }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5 col-form-label text-md-right">Ngày gửi hàng</label>
                                            <div class="col-md-4">
                                                <input class="form-control form-control-user" type="date"
                                                    min="<?= date('Y-m-d') ?>" autofocus="autofocus" name="ngaygiao"
                                                    value="{{ $data->ngaygiao }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5 col-form-label text-md-right">Ngày nhận hàng</label>
                                            <div class="col-md-4">
                                                <input class="form-control form-control-user" type="date"
                                                    min="<?= date('Y-m-d') ?>" autofocus="autofocus" name="ngaynhan"
                                                    value="{{ $data->ngaynhan }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="table-responsive border">
                                        <table id="table" class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="column-stt">STT</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Đơn giá</th>
                                                    <th>Số lượng đặt</th>
                                                    <th>Tổng</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                {{--  @foreach (App\Http\Controllers\Admin\AdminDonHangController::chitiet($data->id) as $dt)  --}}
                                                @foreach ($dulieu as $dt)
                                                    <tr>
                                                        <th class="column-stt">{{ $loop->index + 1 }}</th>
                                                        <th>{{ $dt->sanpham->name }}</th>
                                                        <th class="dongia">{{ $dt->dongia }}</th>
                                                        <th>{{ $dt->soluong }}</th>
                                                        <th class="dongia t">{{ $dt->dongia * $dt->soluong }}</th>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row d-flex flex-row-reverse bg-dark text-white p-3">
                                    <div class="py-0 pr-5 text-right">
                                        <div class="mb-1">
                                            <p id="tongTien"> </p>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="row border">
                                    <div class="col-md-12">
                                        <h5 class="font-weight-bold mb-4 mt-2">
                                            <strong>Thông tin khác</strong>
                                        </h5>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-4 col-form-label ">Shipper</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="shipper">
                                                            @foreach ($shipper as $sp)
                                                                <option value="{{ $sp->id }}">{{ $sp->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-4 col-form-label "> Người Nhận</label>
                                                    <div class="col-md-8">
                                                        <input class="form-control form-control-user" readonly
                                                            autofocus="autofocus"
                                                            value="{{ App\Http\Controllers\Admin\AdminDonHangController::getParentsTree($data->nguoidat_id) }}">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class=" row">
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label  ">Ghi chú</label>
                                                <div class="col-md-10">
                                                    <input class="form-control form-control-user" autofocus="autofocus"
                                                        value="{{ $data->ghichu }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row ">
                                                <div class="col-md-3 ">
                                                    <button type="submit" class="btn btn-primary">
                                                        Xác nhận
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection()
@section('script')
    <script>
        var element = document.getElementsByClassName("t");

        var res = 0;
        for (i = 0; i < element.length; i++) {
            var tien = element.item(i).innerHTML;
            res = res + parseFloat(tien.replaceAll(".", ""));
        }
        var element2 = document.getElementById("tongTien");

        var value = new Intl.NumberFormat('VND').format(res);
        element2.innerHTML = value;
    </script>
@endsection
