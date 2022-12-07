@extends('layouts.main')
@section('title', 'Quản lý sản phẩm')
@section('content')
    <div id="wrapper">
        <div class="container-fluid">
            <div class="card shadow md-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-8">
                            <h2 class="title-header">Danh sách Sản Phẩm</h2>
                        </div>
                        <div class=" col-md-3">
                            <form
                                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-2 small"
                                        placeholder="Tìm kiếm ..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-1">
                            <div class="col-md-1">
                                <a href="{{ route('admin.sanpham.create') }}" title="Thêm mới">
                                    <img width="25px" src="/ad/images/add.png">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover able-bordered sanPhamTable  border" id="dataTable" width="100%"
                            style="text-align: center;">
                            <thead>
                                <tr>
                                    <th>Hình ảnh</th>
                                    <th>Tên SP</th>
                                    <th>Danh Mục</th>
                                    <th>Hãng sản xuất</th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                    <th>Sửa</th>
                                    <th>Xoá</th>
                                </tr>
                            </thead>
                            @foreach ($sanpham as $sp)
                                <tbody>
                                    <td class="col-md-3">
                                        @if ($sp->anh)
                                            <img width="100px" src="/sanpham/{{ $sp->anh }}" class="">
                                        @endif
                                    </td>
                                    <td>{{ $sp->name }}</td>
                                    <td>
                                        {{ $sp->danhmuc->name }}
                                    </td>
                                    <td>
                                        {{ $sp->nhanhieu->name }}
                                    </td>
                                    <td>{{ $sp->dongia }}</td>
                                    <td>{{ $sp->donvikho }}</td>
                                    <td>
                                        <a href="{{ route('admin.sanpham.edit', ['id' => $sp->id]) }}"
                                            class="btn btn-outline-warning">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.sanpham.destroy', ['id' => $sp->id]) }}"
                                            class="btn btn-outline-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>

                                </tbody>
                            @endforeach
                        </table>
                        <div class="d-flex justify-content-end">
                            {{ $sanpham->withQueryString()->links() }}
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
