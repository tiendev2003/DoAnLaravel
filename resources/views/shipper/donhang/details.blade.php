@extends('layouts.main')
@section('title','Chi tiết đơn hàng')
@section('content')
<div id="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="card shadow mb-4">
                <div class="col-md-12">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-1">
                                <a href="{{route('admin.donhang.index')}}"><i class="fa fa-chevron-circle-left"
                                        aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 text-center">
                                <h5 class="font-weight-bold mb-4">
                                    <strong>Thông tin khách</strong>
                                </h5>
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label text-md-right">Họ Tên Người Nhận</label>
                                    <div class="col-md-4">
                                        <input class="form-control form-control-user" readonly autofocus="autofocus"
                                            value="{{$data->name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label text-md-right">Địa chỉ người nhận</label>
                                    <div class="col-md-4">
                                        <input class="form-control form-control-user" readonly autofocus="autofocus"
                                            value="{{$data->address}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label text-md-right">Số điện thoại nhận hàng</label>
                                    <div class="col-md-4">
                                        <input class="form-control form-control-user" readonly autofocus="autofocus"
                                            value="{{$data->sdt}}">
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
                                            value="{{$data->trangthai}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label text-md-right">Ngày đặt hàng</label>
                                    <div class="col-md-4">
                                        <input class="form-control form-control-user" readonly autofocus="autofocus"
                                            value="{{$data->ngaydat}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label text-md-right">Ngày gửi hàng</label>
                                    <div class="col-md-4">
                                        <input class="form-control form-control-user" readonly autofocus="autofocus"
                                            value="{{$data->ngaygiao}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label text-md-right">Ngày nhận hàng</label>
                                    <div class="col-md-4">
                                        <input class="form-control form-control-user" readonly autofocus="autofocus"
                                            value="{{$data->ngaynhan}}">
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
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                            <div class="py-3 px-5 text-right">
                                <div class="mb-2">
                                    <p id="tongTien"> tổng tiền</p>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="col-md-12">
                            <h5 class="font-weight-bold mb-4">
                                <strong>Thông tin khác</strong>
                            </h5>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right ">Shipper</label>
                                        <div class="col-md-8">
                                            <input class="form-control form-control-user" readonly autofocus="autofocus"
                                                value="{{$data->}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right"> Người Nhận</label>
                                        <div class="col-md-8">
                                            <input class="form-control form-control-user" readonly autofocus="autofocus"
                                                value="{{$data->}}">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class=" row">
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label text-md-right ">Ghi chú</label>
                                    <div class="col-md-10">
                                        <input class="form-control form-control-user" readonly autofocus="autofocus"
                                            value="{{$data->}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection()