@extends('layouts.client')
@section('title')
    Đơn Hàng
@endsection
@section('content')
    <div class="container" style="font-family: Roboto">
        <div class="card">
            <div class="card-header">
                Đơn hàng của tôi
            </div>
            <div class="card-body">
               <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col-1">STT</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Đơn giá</th>
                            <th scope="col">Số lượng</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ( $data->sanpham as $d )
                          <tr class="">
                            <td scope="row">{{ $loop->index+1 }}</td>
                            <td>{{ $d->name }}</td>
                            <td>{{ $d->dongia }}</td>
                            <td>{{ $d->dongia }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
               </div>
               
            </div>

        </div>
    </div>
@endsection
