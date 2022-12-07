@extends('layouts.client')
@section('title', 'Thanh toán')
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $(".mytable .dongia .check").each(function() {
            var value = accounting.formatMoney($(this).text()) + ' VND';
            $(this).html(value);
        });

        $(".mytable .total").each(function() {
            var value = accounting.formatMoney($(this).text()) + ' VND ';
            $(this).html(value);

        });
    });

</script>
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                QUÝ KHÁCH ĐÃ ĐẶT HÀNG THÀNH CÔNG
            </div>
            <div class="card-body">
                @foreach ($donhangs as $donhang)
                    <div class="row border">
                        <div class="col-md-6 ">
                            <div class="row">
                                <div class="col-md-5 ">
                                    <div class="form-group form-inline row">
                                        <label for="">&nbsp;&nbsp; &nbsp;ID/Mã đơn hàng: &nbsp;</label>
                                        <input type="text" class="form-control" name="" readonly
                                            id="" size="10" aria-describedby="helpId" value="{{ $donhang->id }}">

                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group form-inline">
                                        <label for="">Họ tên người nhận hàng: &nbsp;</label>
                                        <input type="text" class="form-control" readonly name=""
                                            id="" aria-describedby="helpId" value="{{ $donhang->name }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-inline">
                                        <label for="">Số điện thoại: &nbsp;</label>
                                        <input type="text" class="form-control" readonly name=""
                                            id="" aria-describedby="helpId" value="{{ $donhang->sdt}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-inline">
                                        <label for="">Địa chỉ: &nbsp;</label>
                                        <input type="text" class="form-control" readonly name=""
                                            id="" aria-describedby="helpId" value="{{ $donhang->address }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <br>
                <h4> Vào lúc chúng tôi đã nhận được đơn đặt hàng với những sản phẩm như sau:</h4>
                <br>
                <div class="row">
                    <table class="table table-bordered  font-weight-bold text-center table-image table-responsive">
                        <thead>
                            <tr>
                                <td>Ảnh</td>
                                <td>Tên sản phẩm</td>
                                <td>Đơn giá</td>
                                <td>Tổng</td>
                        </thead>
                        <tbody>
                            @foreach ($cart as $sanpham)
                                <tr>
                                    <td class="w-25"> <img class="img-fluid"
                                            src="/sanpham/{{ $sanpham->sanpham->anh }}" alt="">
                                    </td>
                                    <td class="justify-content-center align-items-center"> {{ $sanpham->sanpham->name }}
                                    </td>
                                    <td>
                                        <div class="check " style="display: inline-block; ">
                                            {{ $sanpham->sanpham->dongia }}</div>
                                        <div style="display: inline-block; "> x {{ $sanpham->soluong }}</div>
                                    </td>
                                    <td>
                                        <div class="total">{{ $sanpham->sanpham->dongia * $sanpham->soluong }}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="float-end">
                    <h4 class="card-text">Tổng giá trị đơn hàng: <b id="ordertotal"> </b></h4>
                    <p class="card-text">Shoplaptop xin chân thành cảm ơn quý khách hàng đã tin tưởng sử dụng dịch vụ,
                        sản phẩm của chúng tôi</p>
                    <a href="/" class="card-link"> <i class="fa fa-shopping-cart"></i>
                        Nhấn vào đây để tiếp tục mua sắm</a>
                </div>
            </div>
        </div>
    </div>
    <script>
    	var element = document.getElementsByClassName("total");
	var res = 0;
	for (i = 0; i < element.length; i++) {
		res = res + parseInt(element[i].textContent);
	}
	var element2 = document.getElementById("ordertotal");
	
	resConvert = accounting.formatMoney(res);
	element2.innerHTML = resConvert+ " VND";
    </script>
@endsection
