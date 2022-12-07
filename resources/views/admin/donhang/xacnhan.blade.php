@extends('layouts.main')
@section('title','Xác nhận hoàn thành đơn')
@section('content')
<div id="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="card shadow mb-4">
                <div class="col-md-12">
                    <div class="card-header">
                        <h5 class="modal-title" id="exampleModalLabel">Xác nhận hoàn thành đơn</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" id="idDonHangXacNhan" value="">
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <table class="table chiTietTable" style="text-align: center;">
                                    <thead>
                                        <tr>
                                            <th class="border-0 text-uppercase small font-weight-bold">STT</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Tên
                                                sản phẩm</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Đơn
                                                giá</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Số
                                                lượng đặt</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Số
                                                lượng nhận</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <h4 id="tongTienXacNhan" style="float: right; font-weight: bold;padding-right: 50px">abc
                                </h4>
                            </div>

                            <div>
                                <h5 id="ghiChu" style="font-weight: bold; padding-top: 10px">Ghi
                                    chú</h5>
                                <textarea rows="3" cols="75" id="ghiChuAdmin"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection()