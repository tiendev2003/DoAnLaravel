@extends('layouts.main')
@section('title','Quản lý Liên hệ')
@section('content')
<div id="wrapper">
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary">Danh sách liên hệ</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 row">
                            <div id="dataTable_filter" class=" col-sm-12">
                                <form id="searchForm" name="searchObject">
                                    <div class="row">
                                        <div class="form-group form-inline">
                                            <div class="form-group col-md-2">
                                                <select class="form-control trangThai" name="trangthai">
                                                    <option value="Đang chờ trả lời">Đang chờ trả lời</option>
                                                    <option value="Đã trả lời">Đã trả lời</option>
                                                    <option value="">Tất cả</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-md-4 col-form-label text-md-right">Từ ngày</label>
                                                <div class="col-md-8">
                                                    <input class="form-control form-control-user" name="fromDate"
                                                        type="date">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-md-4 col-form-label text-md-right">Đến ngày</label>
                                                <div class="col-md-8">
                                                    <input class="form-control form-control-user" name="toDate"
                                                        type="date">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 ">
                                                    <button type="submit" class="btn btn-primary"
                                                        id="btnDuyetDonHang">Duyệt
                                                        Đơn</button>
                                                </div>
                                            </div>
                                            <div class="form-group" style="float: right">
                                                <input class="form-control" type="number" id="search"
                                                    placeholder="Nhập mã để tìm nhanh" value="0"> <span
                                                    aria-hidden="true" style="left: -30px; top: 4px"
                                                    class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"
                                                        id="TimKiem"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered table-responsive-md" cellspacing="0" id="table">
                        <thead>
                            <tr>
                                <th>Mã</th>
                                <th>Email</th>
                                <th>Ngày gửi</th>
                                <th>Trạng thái</th>
                                <th>Ngày trả lời</th>
                                <th class="column-stt"></th>
                                <th class="column-stt"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($lienhe as $lh)
                            <tr>
                                <td>{{$lh->id}}</td>
                                <td>{{$lh->email}}</td>
                                <td>{{$lh->ngaylienhe}}</td>
                                <td>{{$lh->trangthai}}</td>
                                <td>{{$lh->ngaytraloi}}</td>
                                <td>
                                    <a href="{{route('admin.lienhe.detail',['id'=>$lh->id])}}"
                                        class="btn btn-primary">
                                        <i class="fa-regular fa-paper-plane"></i></a>
                                </td>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>

                    </table>

                </div>
            </div>


        </div>


    </div>

</div>
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

@endsection()
@section('script')
<script src="{{ asset('client/js/test.js') }}"></script>
@endsection()