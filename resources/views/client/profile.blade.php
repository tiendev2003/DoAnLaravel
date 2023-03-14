 @extends('layouts.client')
 @section('title', 'Thông tin cá nhân')
 @section('content')
   <div class="wrapper ">
        <div class="container-fluid ">
            <div class="row gx-4 ">
                <div class=" col-xl-4 mt-4 rounded-9">
                    <div class="card shadow ">
                        <form action="{{ route('shoplaptop.profile.updateImg', ['id' => $user->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-header py-3">
                                <h3>Hình ảnh</h3>
                            </div>
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
                                <img src="/profile/{{ $user->profile_photo_path }}" width="50%" alt="Ảnh Admin"
                                    class="img-account-profile rounded-circle mb-2" id="img">
                                <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                                <div class="file col-sx-2"> <input type="file" onchange="chooseFile(this)"
                                        aria-describedby="accountImg" name="img" id="accountImg"></div>
                                <div class="file ">
                                    <button type="submit" class=" btn btn-primary"> Cập Nhật</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class=" col-xl-4 mt-4 ">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h3>Chi tiết tài khoản</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('shoplaptop.profile.update', ['id' => $user->id]) }}"
                                class="form-group form-horizontal form-material" method="POST"> @csrf

                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Tên tài khoản</label>
                                    <input type="text" class="form-control" value="{{ $user->name }}" name="name">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Số điện thoại</label>
                                    <input type="number" class="form-control" value="{{ $user->sdt }}" name="sdt"
                                        id="test">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Email</label>
                                    <input type="email" class="form-control" value="{{ $user->email }}" name="email">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Địa Chỉ</label>
                                    <input type="text" class="form-control" value="{{ $user->address }}" name="address">
                                </div>

                                <div class="row">
                                    <div class="fomr-group ml-2">
                                        <button type="submit" class="btn btn-primary">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class=" col-xl-4 mt-4">
                    <div class="card shadow mb-4">
                            
                      @livewire('profile.update-password-form')
                       @livewireScripts
                    </div>
                </div>
            </div>
        </div>
    </div>
 @endsection