@extends('layouts.main')
@section('title', 'Quản lý tài khoản')
@section('content')
    <div id="wrapper">
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-11">
                            <div class="card-header">
                                <h5 class=" font-weight-bold text-primary">Danh sách tài khoản</h5>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="col-md-1">
                                <a href="{{ route('admin.taikhoan.create') }}" title="Thêm mới">
                                    <img width="25px" src="/ad/images/add.png">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group form-inline">
                        <label for="vaitro"><strong>Lọc tài khoản : </strong> </label>
                        <select id="vaitro" class="form-control">
                            <option value="3">Admin</option>
                            <option value="2">Shipper</option>
                            <option value="1">Client</option>
                        </select>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Họ tên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th>
                                    <th>Vai trò</th>
                                    <th class="column-stt">Sửa</th>
                                    <th class="column-stt">Xoá</th>
                                </tr>
                            </thead>
                            <tbody class="show" id="show">
                                @foreach ($taikhoan as $i => $tk)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $tk->name }}</td>
                                        <td>{{ $tk->email }}</td>
                                        <td>{{ $tk->sdt }}</td>
                                        <td>{{ $tk->address }}</td>
                                        <td>
                                            <select id="vaitro" class="form-control"
                                                onChange="change(this.options[this.selectedIndex].value,{{ $tk->user_id }})">
                                                <option value="3"
                                                    @if ($tk->vaitro_id == 3) selected="selected" @endif>
                                                    Admin
                                                </option>
                                                <option value="2"
                                                    @if ($tk->vaitro_id == 2) selected="selected" @endif>
                                                    Shipper
                                                </option>
                                                <option value="1"
                                                    @if ($tk->vaitro_id == 1) selected="selected" @endif>
                                                    Client
                                                </option>

                                            </select>

                                        </td>

                                        <td>
                                            {{--  <a href="{{ route('admin.taikhoan.edit', ['id' => $tk->id]) }}"
                                                class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>  --}}
                                            <a href="#" id="d" type="button" class="btn btn-primary"><i
                                                    class="fa fa-save" aria-hidden="true"></i></a>
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-danger"> <i class="fas fa-trash  "></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">

                            {{ $taikhoan->withQueryString()->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <div class="modal fade" id="phanquyen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xác nhận đăng xuất</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">Chọn "logout" để đăng xuất.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function change(value, id) {

            jQuery.ajax({
                type: "GET",
                url: "/admin/tai-khoan/suadoi/" +
                    id +
                    "/" +
                    value +
                    "/",
                success: function(result) {
                    console.log(result);
                },
                error: function(e) {
                    alert("Error: ", e);
                    console.log("Error", e);
                },
            });
        }
    </script>
@endsection
