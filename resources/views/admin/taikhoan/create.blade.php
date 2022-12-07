@extends('layouts.main')
@section('title', 'Quản lý Tài khoản')
@section('content')

    <div class="wrapper">
        <div class="container-fluid">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h3>Tạo tài khoản</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.taikhoan.store') }}"
                        class="form-group form-horizontal form-material" enctype="multipart/form-data">
                        @csrf
                        <div class="row gx-4 ">
                            <div class=" col-xl-8 ">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Tên tài khoản</label>
                                        <input type="text" class="form-control" name="name" :value="old('name')">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="sdt">Số điện thoại</label>
                                        <input type="number" class="form-control" name="sdt" id="sdt">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" :value="old('email')">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="address">Địa Chỉ</label>
                                        <input type="text" class="form-control" name="address" :value="old('address')">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" name="password"
                                            :value="old('password')">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input type="password" class="form-control" name="password_confirmation"
                                            :value="old('password_confirmation')">
                                    </div>
                                </div>

                            </div>
                            <div class=" col-xl-4 rounded-9">
                                <script>
                                    function chooseFile(fileinput) {
                                        if (fileinput.files && fileinput.files[0]) {
                                            var reader = new FileReader();


                                            reader.onload = function(e) {
                                                $('#img').attr('src', e.target.result);

                                            }
                                            reader.readAsDataURL(fileinput.files[0])
                                        }
                                    }
                                </script>
                                <div class="card-body text-center">
                                    <img src="" width="50%" alt="Ảnh "
                                        class="img-account-profile rounded-circle mb-2" id="img">
                                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB
                                    </div>
                                    <div class="file col-sx-2"> <input type="file" onchange="chooseFile(this)"
                                            aria-describedby="accountImg" name="img"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">

                            <div class="fomr-group">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


@endsection
