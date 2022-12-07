@extends('layouts.main')
@section('title', 'Quản lý sản phẩm')
@section('content')
    <div id="wrapper">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header py-3 ">
                    <div class="row">
                        <div class="col-md-11">
                            <h3 class="m-0 font-weight-bold text-primary">Tạo sản phẩm</h3>
                        </div>
                        <div class="col-md-1">
                            <div class="col-md-1">
                                <a href="{{ route('admin.sanpham.index') }}" class="float-right"><i
                                        class="fa fa-chevron-circle-left"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="col-md-12 ">
                    <form id="lapTopForm" class="lapTopForm" action="{{ route('admin.sanpham.store') }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-7">
                                <div class="form-group ">
                                    <label for="inputPassword4">Tên sản phẩm</label> <input type="text"
                                        class="form-control" name="name">
                                </div>
                                <div class="form-group ">
                                    <label for="inputPassword4">Đơn giá</label> <input type="number" class="form-control"
                                        name="dongia" min="0" value="0" id="test">
                                </div>
                                <div class="row">
                                    <div class="form-group  col-md-6">
                                        <label for="hangsx">Hãng Sản Xuất</label> <select name="hangsx_id"
                                            class="form-control" id="hangsx">
                                            @foreach ($hangsx as $sx)
                                                <option value="{{ $sx->id }}">{{ $sx->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group  col-md-6">
                                        <label for="danhmuc">Danh mục</label>
                                        <select name="danhmuc_id" class="form-control" id="danhmuc">
                                            @foreach ($danhmuc as $dm)
                                                <option value="{{ $dm->id }}">{{ $dm->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="inputPassword4">Hệ điều hành</label> <input type="text"
                                        class="form-control" name="hedieuhanh">
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Ram</label> <input type="text" class="form-control"
                                            name="ram" required="required">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Màn hình</label> <input type="text"
                                            class="form-control" name="manhinh" required="required">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="inputEmail4">CPU</label> <input type="text" class="form-control"
                                        name="cpu">
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword4">Thiết kế</label> <input type="text" class="form-control"
                                        name="thietke" required="required">
                                </div>
                            </div>
                            <div class="col-5">
                                <script>
                                    function chooseFile(fileinput) {
                                        if (fileinput.files && fileinput.files[0]) {
                                            var reader = new FileReader();


                                            reader.onload = function(e) {
                                                $('#image').attr('src', e.target.result);

                                            }
                                            reader.readAsDataURL(fileinput.files[0])
                                        }
                                    }
                                </script> <img id="image" src="/client/images/camera.png" width="70%"
                                    class="img-fluid " alt="">
                                <div class="row mt-2">
                                    <div class="form-group col-md-12">
                                        <label for="spImg">Hình ảnh</label>
                                        <input type="file" class="form-control" id="spImg" name="img"
                                            aria-describedby="spImg" onchange="chooseFile(this)">
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="form-group col-md-6">
                                        <label for="dungluong">Dung lượng Pin</label> <input type="text"
                                            class="form-control" id="dungluong" name="dungluongpin" required="required">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="soluong">Số lượng</label> <input type="number" class="form-control"
                                            name="donvikho" min="0" required="required" value="0"
                                            id="soluong">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="baohanh">Thông tin bảo hành</label> <input type="text"
                                        class="form-control" id="baohanh" name="thongtinbaohanh" required="required">
                                </div>

                            </div>
                            <div class="row ">
                                <div class="form-group col-md-12">
                                    <label for="motachung">Mô tả chung</label>
                                    <textarea class="form-control" name="thongtinchung" id="motachung" placeholder="" rows="3"
                                        required="required"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" offset-ml-4 mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        Tạo
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection()
