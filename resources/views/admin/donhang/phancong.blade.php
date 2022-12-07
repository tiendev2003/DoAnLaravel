@extends('layouts.main')
@section('title', 'Phân công shipper')
@section('content')
    <div id="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h5 class="title text-center" id="">Phân công
                            đơn hàng</h5>

                    </div>
                    <div class="card-body">
                        @foreach ($data as $data)
                            <form action="{{ route('admin.donhang.xacnhan', ['id' => $data->id]) }}">
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Tên Shipper</label>
                                    <div class="col-md-4">
                                        <select class="form-control" name="shipper">
                                            @foreach ($shipper as $sp)
                                                <option value="{{ $sp->id }}">{{ $sp->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Xác nhận
                                    </button>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
