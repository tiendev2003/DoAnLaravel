@extends('layouts.client')
@section('title')
    Laptop Shop
@endsection
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-lg-12" class="pull-center" style="font-weight:700; font-size:14px">
                <div class="thumbnail">
                    <img src="/client/img/shipping1.jpg" alt="" class="img-fluid rounded mx-auto d-block" />
                    <img src="/client/img/shipping2.jpg" alt="" class="img-fluid rounded mx-auto d-block" />
                    <img src="/client/img/shipping3 .jpg" alt="" class="img-fluid rounded mx-auto d-block" />
                </div>

                <br><br>

                <h5 class="tieude">1. LƯU Ý:</h5><br>
                <p>- Sau khi bạn đặt hàng, trong vòng 12 giờ làm việc chúng tôi sẽ liên lạc lại để xác nhận và kiểm tra
                    thông tin.</p>
                <p>- Những rủi ro phát sinh trong quá trình vận chuyển (va đập, ẩm ướt, tai nạn..) có thể ảnh hưởng đến
                    hàng hóa, vì thế xin Quý Khách vui lòng kiểm tra hàng hóa thật kỹ trước khi ký nhận. Máy tính Hà Nội sẽ
                    không chịu trách nhiệm với những sai lệch hình thức của hàng hoá sau khi Quý khách đã ký nhận hàng.</p>
                <br>
                <h5 class="tieude">2. BẢNG GIÁ DỊCH VỤ VẨN CHUYỂN HÀNG HÓA</h5>
                <br>
                <table class="table table-hover table-bordered">
                    <thead class="text-center text-justify align-top">
                        <tr>
                            <th>Theo giá trị đơn hàng</th>
                            <th>Số Km được Miễn Phí</th>
                            <th>Thời gian đáp ứng</th>
                            <th>Thu phí</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="text-align: center;">
                            <td>200.000đ - 500.000đ </td>
                            <td>15Km</td>
                            <td>Giao hàng trong vòng 3h</td>
                            <td>
                                Giao hàng bán kính 15km và thu phí 20.000đ /1 lần giao. Km16 tính 6000đ/km và tối đa 45 km
                            </td>
                        </tr>
                        <tr style="text-align: center;">
                            <td>500.000đ - 1.000.000đ </td>
                            <td>20 Km</td>
                            <td> Giao hàng trong vòng 3h</td>
                            <td>Từ km thứ 21 thu phí 6.000/km, giao hàng tối đa 45 km</td>
                        </tr>

                        <tr style="text-align: center;">
                            <td>1.000.000đ - 3.000.000đ </td>
                            <td>25km</td>
                            <td>Giao hàng trong vòng 3h </td>
                            <td>Từ km thứ 26 thu phí 6.000/km, giao hàng tối đa 45 km</td>
                        </tr>
                        <tr style="text-align: center;">
                            <td>Trên 3.000.000đ </td>
                            <td>35km</td>
                            <td>Giao hàng trong vòng 4h
                                Giao hàng trong 24h (36km-45km) </td>
                            <td>Từ km thứ 36 thu phí 6.000/km, giao hàng tối đa 45 km</td>
                        </tr>
                        <tr style="text-align: center;">
                            <td> 10 bộ máy tính</td>
                            <td>50km</td>
                            <td> Theo thỏa thuận với khách hàng</td>
                            <td>Từ km thứ 51 thu phí 10.000/km, giao hàng tối đa 150 km</td>
                        </tr>

                        <tr style="text-align: center;">
                            <td>11-20 bộ máy tính </td>
                            <td>100km</td>
                            <td>Theo thỏa thuận với khách hàng </td>
                            <td>Theo thỏa thuận với khách hàng</td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <p>
                    - Đối với khách hàng vượt quá khoảng cách quy định từ 46km trở lên, áp dụng phương thức gửi xe khách
                    (khách hàng chọn xe để gửi) hoặc chuyển phát nhanh, khách hàng thanh toán phí vận chuyển cho bên giao
                    hàng.</p>
              
                <p>
                    - Đối với đơn hàng từ 500.000 đ đến 3000.000 đ mà cồng kềnh cần phải giao bằng ô tô thì miễn phí km như
                    khoảng cách giao hàng xe máy và tính phí vượt quá km đối với ô tô là 10.000/km
                </p>
            </div>

        </div>
    </div>
@endsection
