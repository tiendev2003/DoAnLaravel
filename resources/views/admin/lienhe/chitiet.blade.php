@extends('layouts.main')
@section('title', 'Quản lý Liên hệ')
@section('content')
    <div class="wraapp">
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-11">
                            <h6 class="m-0 font-weight-bold text-primary">Chi tiết liên hệ</h6>
                        </div>
                        <div class="col-md-1">
                            <div class="col-md-1">
                                <a href="/admin/lien-he" class="float-right"><i class="fa fa-chevron-circle-left"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.lienhe.traloi') }}">
                        <input type="hidden" name="idnguoidung" value="{{ Auth::id() }}">
                        <input type="hidden" name="idlienhe" value="{{ $lienhe->id }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col-md-2"></div>
                                    <label class="col-md-3 col-form-label ">Email Liên hệ</label>
                                    <div class="col-md-5">
                                        <input class="form-control form-control-user" readonly name="emaillienhe"
                                            type="email" autofocus="autofocus" placeholder=""
                                            value="{{ $lienhe->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col-md-2"></div>
                                    <label class="col-md-3 col-form-label text-md-right">Ngày liên hệ</label>
                                    <div class="col-md-5">
                                        <input class="form-control form-control-user" readonly type="date"
                                            autofocus="autofocus" placeholder="" value="{{ $lienhe->ngaylienhe }}">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-11">
                                <div class="form-group">
                                    <label for="noidungtraloi">Nội dung liên hệ</label>
                                    <textarea readonly class="form-control" id="noidunglienhe" name="noidunglienhe" rows="6">{{ $lienhe->noidunglienhe }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-11">
                                <div class="form-group">
                                    <label for="noidungtraloi">Nội dung trả lời</label>
                                    <textarea class="form-control" id="noidungtraloi" name="noidungtraloi" rows="6"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1">

                            </div>
                            <div class="col">
                                <input class="btn btn-primary" type="submit" value="Gửi">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection()
