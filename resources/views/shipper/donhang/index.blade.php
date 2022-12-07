@extends('layouts.shipper')
@section('title', 'Quản lý Đơn hàng')
@section('content')
    <div id="wrapper">
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary">Danh sách đơn hàng</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 ">
                                <div id="dataTable_filter" class=" col-sm-12">
                                    <form id="searchForm" name="searchObject">
                                       
                                            <div class="form-group form-inline">
                                                <div class="form-group col-md-2">
                                                <div>
                                                    <select class="form-control" id="trangThai" name="trangthai">
                                                        <option value="Đang giao">Được phân công</option>
                                                        <option value="Chờ duyệt">Chờ duyệt</option>
                                                        <option value="Hoàn thành">Hoàn thành</option>
                                                    </select></div>
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
                                                <div class="form-group col-md-1 ">
                                                <div class="col-md-5 ">
                                                        <button type="submit" class="btn btn-primary"
                                                            id="btnDuyetDonHang">Duyệt
                                                            Đơn</button>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input class="form-control" type="number" id="search"
                                                        placeholder="Nhập mã để tìm nhanh" value="0"> <span
                                                        class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"
                                                            id="TimKiem"></i></span>
                                                </div>
                                            </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered table-responsive-md" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Mã</th>
                                    <th>Người nhận</th>
                                    <th>Trạng thái</th>
                                    <th>Giá trị</th>
                                    <th>Ngày đặt</th>
                                    <th>Ngày giao</th>
                                    <th>Ngày nhận</th>
                                    <th>Chi tiết</th>
                                </tr>
                            </thead>
                            <tbody class="alldata">
                                @foreach ($donhang as $dh)
                                    <tr>
                                         <th class="col-xs-2">{{ $loop->index + 1 }}</th>
                                    <td>{{ App\Http\Controllers\Admin\AdminDonHangController::getParentsTree($dh->nguoidat_id) }}
                                    </td>
                                    <td>{{ $dh->trangthai }}</td>
                                    <td></td>
                                    <td>{{ $dh->ngaydat }}</td>
                                    <td>{{ $dh->ngaygiao }}</td>
                                    <td>{{ $dh->ngaynhan }}</td>
                                    <td>
                                        2
                                    </tr>
                                @endforeach
                            </tbody>
                            <tbody id="Content" class="searchdata">

                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">

                            {{ $donhang->withQueryString()->links() }}
                        </div>
                    </div>
                </div>


            </div>


        </div>

    </div>
@endsection()
@section('script')
    <script src="{{ asset('/client/js/test.js') }}"></script>
@endsection()
