@extends('layouts.main')
@section('title','Quản lý danh mục')
@section('content')
<div id="wrapper">
    <div class="container-fluid">
        <h6 class="title-header">Tạo Danh mục</h6>
        <form name="my-form" action="{{route('admin.danhmuc.store')}}" method="post"> @csrf
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right" for="name">Tên Danh mục</label>
                <div class="col-md-4">
                    <input type="text" id="name" required autofocus="autofocus" class="form-control" name="name">
                </div>
            </div>

            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Tạo
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