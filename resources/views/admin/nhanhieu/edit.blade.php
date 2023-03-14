@extends('layouts.main')
@section('title','')
@section('content')
<div id="wrapper">
    <div class="container-fluid">
        <h6 class="title-header">Sửa loại hãng sản xuất</h6>
        <form class="user" action="{{route('admin.nhanhieu.update',['id'=>$dt->id])}}" method="post">
             @csrf
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">ID</label>
                <div class="col-md-4">
                    <input type="text" value="{{$dt->id}}" class="form-control" disabled="disabled">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right" for="name">Tên hãng sản xuất</label>
                <div class="col-md-4">
                    <input type="text" id="name" value=" {{$dt->name}}" class="form-control" mrequired
                        autofocus="autofocus" name="name">
                </div>
            </div>
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary ">
                    Cập nhật
                </button>
            </div>
        </form>
    </div>
    <!-- /.container-fluid -->

</div>
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
@endsection