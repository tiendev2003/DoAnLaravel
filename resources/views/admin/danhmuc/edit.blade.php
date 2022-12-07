@extends('layouts.main')
@section('title','Quản lý danh mục')
@section('content')
<div id="wrapper">
    <div class="container-fluid">
        <h6 class="title-header">Sửa danh mục</h6>

        <form class="user" action="{{route('admin.danhmuc.update',['id'=>$data->id])}}" method="post">
            @csrf
            
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right" for="id">ID</label>
                <div class="col-md-4">
                    <input type="text" name="id" class="form-control" disabled="disabled" value={{$data->id}}>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right" for="name">Tên danh mục</label>
                <div class="col-md-4">
                    <input type="text" name="name" value='{{$data->name}}' class="form-control" required
                        autofocus="autofocus">
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