 @extends('layouts.client')
 @section('title', 'Thông tin sản phẩm')
 @section('link')
     <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
 @endsection
 @section('content')
     <section>
         <div class="container">
             <div class="card">
                 <div class="card-body">
                     <div class="row">
                         <div class="col-md-6 text-center mb-2">
                             <div class="thumbnail">
                                 <img style="width:400px" src="/sanpham/{{ $sp->anh }}"
                                     class="img-fluid rounded mx-auto d-block" />
                             </div>
                             <form action="{{ route('shoplaptop.addcart', ['id' => $sp->id]) }}" method="GET">
                                 <h4 class="price" id="blabla">Giá bán: <span id="priceConvert"
                                         style="  color: #1d77e5;"></span></h4>
                                 <input type="hidden" name="price" id="dongia"value="{{ $sp->dongia }}">
                                 <table class="table table-light">
                                     <tbody>
                                         <tr>
                                             <td>
                                                 <div class="quantity">
                                                     <input type="number" min="1" max="9" name="quantity"
                                                         step="1" value="1">
                                                 </div>
                                             </td>
                                             <td>
                                                 <div class="quantity">
                                                     <button type="submit" name="" id=""
                                                         class="btn btn-primary btn-lg btn-block">Thêm giỏ hàng</button>
                                             </td>
                                         </tr>
                                     </tbody>
                                 </table>
                             </form>
                         </div>
                         <div class="col-md-6 mt-2 ">
                             <p style="display:none" id="spid">{{ $sp->id }}</p>
                             <h2 class="product-title">{{ $sp->name }}</h2>
                             <h4 class="price">Mô tả sản phẩm</h4>
                             <p class="product-description">CPU: {{ $sp->cpu }}</p>
                             <p class="product-description">RAM: {{ $sp->ram }}</p>
                             <p class="product-description">Thiết kế: {{ $sp->thietke }}</p>
                             <p class="product-description">Hệ điều hành: {{ $sp->hedieuhanh }}</p>
                             <p class="product-description">Màn hình: {{ $sp->manhinh }}</p>
                             <p class="product-description">Dung lượng pin: {{ $sp->dungluongpin }}</p>
                             <p class="product-description">Hãng sản xuất: {{ $sp->nhanhieu->name }}</p>
                             <p class="product-description"><span class="important">THÔNG TIN CHUNG:</span>
                             </p>
                             <p class="product-description"><span class="important">BẢO HÀNH:</span>
                                 {{ $sp->thongtinbaohanh }}</p>

                         </div>
                     </div>
                     <section class="content-item" id="comments">
                         <div class="container">
                             <div class="row">
                                 <div class="col-sm-12">
                                     <form method="post"
                                         action="{{ route('shoplaptop.binhluan.post', ['user' =>Auth::check() ? Auth::id() : 'false', 'sanpham' => $sp->id]) }}">
                                         @csrf
                                         <div class="row mt-1">
                                             <div class="media form-group col-md-1 mb-3 "
                                                 style="padding:0; margin: 0 15px ; border-top:0;">
                                                 <a class="pull-left" href="#"><img class="media-object"
                                                         src="/profile/{{ Auth::check()? Auth::user()->profile_photo_path: "" }}"
                                                         alt=""></a>
                                             </div>
                                             <div class="form-group col-md-9 float-right">
                                                 <textarea class="form-control" name="noidung" id="message" placeholder="Your message" required=""></textarea>
                                             </div>
                                             <div class="form-group col-md-1 float-right">
                                                 <input class="form-control btn btn-primary" type="submit"
                                                     name=""style="margin-top: 0rem;" value="Gửi">

                                             </div>
                                         </div>
                                     </form>
                                     @if ($data->count() != 0)
                                         <h3>{{ $data->count() }} Comments</h3>
                                         @foreach ($data as $d)
                                             <div class="media">
                                                 <a class="pull-left" href="#"><img class="media-object"
                                                         src="/profile/{{ $d->user->profile_photo_path }}"
                                                         alt=""></a>
                                                 <div class="media-body">
                                                     <h4 class="media-heading">{{ $d->user->name }}</h4>
                                                     <p>{{ $d->noidung }}</p>
                                                     <ul class="list-unstyled list-inline media-detail pull-left">
                                                         <li><i class="fa fa-calendar"></i>{{ $d->day_now }}</li>
                                                         <li><i class="fa fa-thumbs-up"></i>{{ $d->like }}</li>
                                                     </ul>
                                                     <ul class="list-unstyled list-inline media-detail pull-right">
                                                         <li class=""><a href="">Like</a></li>
                                                     </ul>
                                                 </div>
                                             </div>
                                         @endforeach
                                     @else
                                     @endif


                                 </div>
                             </div>
                         </div>
                     </section>

                 </div>
             </div>
         </div>
     </section>
 @endsection
 @section('script')
     <script type="text/javascript">
         jQuery(document).ready(function() {
             var sp = document.getElementById("dongia").value
             var priceConvert = accounting.formatMoney(sp) + ' VND';
             document.getElementById(
                 "priceConvert").innerHTML = priceConvert;

         });
     </script>
 @endsection
