@extends('layouts.main')
@section('title', 'Quản lý sản phẩm')
@section('content')
    <div id="wrapper">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h2 class="title-header">Chi tiết Sản Phẩm</h2>
                </div>
                <div class="card-body">
                    <div class="col-md-12 ">
                        <form id="lapTopForm" class="lapTopForm" method="POST" enctype="multipart/form-data"
                            action="{{ route('admin.sanpham.update', ['id' => $data->id]) }}"> @csrf
                            <div class="row">
                                <div class="col-7">
                                    <div class="form-group ">
                                        <label for="inputPassword4">Tên sản phẩm</label> <input type="text"
                                            class="form-control" name="name" value="{{ $data->name }}">
                                    </div>
                                    <div class="form-group ">
                                        <label for="inputPassword4">Đơn giá</label> <input type="number"
                                            class="form-control" name="dongia" min="0" value="{{ $data->dongia }}"
                                            id="test">
                                    </div>
                                    <div class="row">
                                        <div class="form-group  col-md-6">
                                            <label for="hangsx">Hãng Sản Xuất</label>
                                            <select name="hangsx_id" class="form-control" id="hangsx">
                                                @foreach ($hangsx as $sx)
                                                    <option value="{{ $sx->id }}"
                                                        @if ($sx->id == $data->hangsx_id) selected="selected" @endif>
                                                        {{ $sx->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group  col-md-6">
                                            <label for="danhmuc">Danh mục</label>
                                            <select name="danhmuc_id" class="form-control" id="danhmuc">
                                                @foreach ($danhmuc as $dm)
                                                    <option value="{{ $dm->id }}"
                                                        @if ($dm->id == $data->danhmuc_id) selected="selected" @endif>
                                                        {{ $dm->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="inputPassword4">Hệ điều hành</label> <input type="text"
                                            class="form-control" name="hedieuhanh" value="{{ $data->hedieuhanh }}">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Ram</label> <input type="text" class="form-control"
                                                name="ram" required="required" value="{{ $data->ram }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Màn hình</label> <input type="text"
                                                class="form-control" name="manhinh" required="required"
                                                value="{{ $data->manhinh }}">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="inputEmail4">CPU</label> <input type="text" class="form-control"
                                            name="cpu" value="{{ $data->cpu }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword4">Thiết kế</label> <input type="text"
                                            class="form-control" name="thietke" required="required"
                                            value="{{ $data->thietke }}">
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
                                    </script> <img id="image" src="/sanpham/{{ $data->anh }}"
                                        width="70%" class="img-fluid " alt="">
                                    <div class="row mt-2">
                                        <div class="form-group col-md-12">
                                            <label for="spImg">Hình ảnh</label>
                                            <input type="hidden" name="noselect" id="noselect" value="{{ $data->anh }}">
                                            <input type="file" class="form-control" id="spImg" name="img" value="{{ $data->anh }}"
                                                aria-describedby="spImg" onchange="chooseFile(this)">
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Dung lượng Pin</label> <input type="text"
                                                class="form-control" name="dungluongpin" required="required"
                                                value="{{ $data->dungluongpin }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Số lượng</label> <input type="number"
                                                class="form-control" name="donvikho" min="0" required="required"
                                                id="test2" value="{{ $data->donvikho }}">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="inputEmail4">Thông tin bảo hành</label>
                                        <input type="text" class="form-control" name="thongtinbaohanh"
                                            required="required" value="{{ $data->thongtinbaohanh }}">
                                    </div>

                                </div>
                                <div class="row ">
                                    <div class="form-group col-md-12">
                                        <label for="inputPassword4">Mô tả chung</label>
                                        <textarea class="form-control" name="thongtinchung" placeholder="" rows="3">{{ $data->thongtinchung }}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class=" offset-ml-4 mt-3">
                                        <button type="submit" class="btn btn-primary">
                                            Save
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
