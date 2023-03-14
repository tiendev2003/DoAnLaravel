@extends('layouts.main')
@section('title')
    Quản lý banner
@endsection
@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row gx-4 ">
                <div class=" col-xl-4 ">
                    <div class="card shadow mb-4">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.banner.luu') }}">
                            @csrf
                            <div class="card-header py-3">
                                <h3>Hình ảnh</h3>
                            </div>
                            <div class="card-body text-center">
                                <img src="" width="50%" alt="Ảnh Admin" class="img-account-profile  mb-2"
                                    id="img1">
                                <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                                <div class="file col-sx-2">
                                 <input type="file" onchange="PreviewImage()"
                                        aria-describedby="accountImg" name="img1" id="new1">
                                        </div>
                                <script type="text/javascript">
                                    function PreviewImage() {
                                        var oFReader = new FileReader();
                                        oFReader.readAsDataURL(document.getElementById("new1").files[0]);

                                        oFReader.onload = function(oFREvent) {
                                            document.getElementById("img1").src = oFREvent.target.result;
                                        };
                                    };
                                </script>
                                <div class="row">
                                    <div class="fomr-group ml-2">
                                        <button type="submit" class="btn btn-primary">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class=" col-xl-4 ">
                    <div class="card shadow mb-4">
                        <form method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header py-3">
                                <h3>Hình ảnh</h3>
                            </div>
                            <div class="card-body text-center">
                               <img src="" width="50%" alt="Ảnh Admin" class="img-account-profile  mb-2"
                                    id="img2">
                                <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                                <div class="file col-sx-2"> <input type="file" onchange="PreviewImage1()"
                                        aria-describedby="accountImg" name="img2" id="new2"></div>
                                <script type="text/javascript">
                                    function PreviewImage1() {
                                        var oFReader = new FileReader();
                                        oFReader.readAsDataURL(document.getElementById("new2").files[0]);

                                        oFReader.onload = function(oFREvent) {
                                            document.getElementById("img2").src = oFREvent.target.result;
                                        };
                                    };
                                </script>
                                <div class="row">
                                    <div class="fomr-group ml-2">
                                        <button type="submit" class="btn btn-primary">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
                <div class=" col-xl-4 ">
                    <div class="card shadow mb-4">
                        <form method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header py-3">
                                <h3>Hình ảnh</h3>
                            </div>
                            <div class="card-body text-center">
                              <img src="" width="50%" alt="Ảnh Admin" class="img-account-profile  mb-2"
                                    id="img3">
                                <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                                <div class="file col-sx-2"> <input type="file" onchange="PreviewImage2()"
                                        aria-describedby="accountImg" name="img3" id="new3"></div>
                                <script type="text/javascript">
                                    function PreviewImage2() {
                                        var oFReader = new FileReader();
                                        oFReader.readAsDataURL(document.getElementById("new3").files[0]);

                                        oFReader.onload = function(oFREvent) {
                                            document.getElementById("img3").src = oFREvent.target.result;
                                        };
                                    };
                                </script> 
                                <div class="row">
                                    <div class="fomr-group ml-2">
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
@endsection
