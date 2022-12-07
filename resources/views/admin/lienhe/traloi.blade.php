@extends('layouts.main')
@section('title','Quản lý Liên hệ')
@section('content')
<div id="wrapper">
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-11">
                        <h6 class="m-0 font-weight-bold text-primary">Chi tiết liên hệ</h6>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <form action="">
                    <div class="form-group row">
                        <div class="col-md-1"></div>
                        <label class="col-md-2 col-form-label text-md-right" for="email">Email liên hệ:</label>
                        <div class="col-md-8">
                            <input class="form-control form-control-user" name="email" id="email" required
                                autofocus="autofocus" placeholder="" value="trna co">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-1"></div>
                        <label class="col-md-2 col-form-label text-md-right" for="noidunglienhe">Nội dung liên
                            hệ:</label>
                        <div class="col-md-8">
                            <textarea class="form-control" id="noidunglienhe" name="noidunglienhe" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-1"></div>
                        <label class="col-md-2 col-form-label text-md-right" for="noidungtraloi">Nội dung trả
                            lời</label>
                        <div class="col-md-8">
                            <textarea class="form-control" id="noidungtraloi" name="noidungtraloi" rows="3"></textarea>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection()