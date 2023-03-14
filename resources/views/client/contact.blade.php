@extends('layouts.client')
@section('title', 'Liên hệ')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2> Liên hệ với chúng tôi</h2>
            </div>
            <div class="card-body">
                
                <form style="text-transform: capitalize;" method="post" id="form" action="{{ route('shoplaptop.lienhe.store') }}">
                    @csrf
                    <div class="form-group" >
                        <span id="emailWarning" style="color: red"></span>
                        <label for="">Địa chỉ email</label>
                        <input type="email" class="form-control" name="email" id="email" >
                    </div>
                    <div class="form-group">
                        <span id="contentWarning" style="color: red"></span>
                        <label for="my-textarea">Nội dung liên hệ</label>
                        <textarea id="my-textarea" name="content" style="resize: none" class="form-control" name="" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" id="sub">Gửi liên hệ</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {{--  <script src="/client/js/client/contactAjax.js"></script>  --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

@endsection
