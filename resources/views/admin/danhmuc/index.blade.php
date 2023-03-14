@extends('layouts.main')
@section('title', 'Quản lý danh mục')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary">Tạo danh mục</h5>
                        </div>
                        <div class="mt-4">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form name="my-form" action="{{ route('admin.danhmuc.store') }}" method="post"> 
                            @csrf
                                <div>
                                    <input type="hidden" class="form-control" name="id" id="id" readonly>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label text-md-right" for="name">Tên Danh
                                        mục</label>
                                    <div class="col-md-9">
                                        <input type="text" id="name" autofocus="autofocus" class="form-control"
                                            name="name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 offset-md-7 mb-2">
                                        <button type="submit" class="btn btn-primary">
                                            Tạo
                                        </button> &nbsp;&nbsp; &nbsp;&nbsp;
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-7 ">

                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary">Danh sách danh mục</h5>
                        </div>

                        <div class="table-responsive border">
                            <table id="table" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="column-stt">STT</th>
                                        <th>Tên Danh Mục</th>
                                        <th class="column-stt">Sửa</th>
                                        <th class="column-stt">Xoá</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $dt)
                                        <tr>
                                            <th scope="row">{{ $loop->index}}</th>
                                            <td> {{ $dt->name }}</td>
                                            <td><a href="{{ route('admin.danhmuc.edit', ['id' => $dt->id]) }}"
                                                    class="btn btn-outline-warning">
                                                    <i class="fa fa-edit"></i></a>
                                            </td>
                                            <td><a href="{{ route('admin.danhmuc.destroy', ['id' => $dt->id]) }}"
                                                    class="btn btn-outline-danger">
                                                    <i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
