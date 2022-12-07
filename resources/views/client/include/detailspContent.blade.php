 @extends('layouts.client')
 @section('title', 'Thông tin sản phẩm')
 @section('content')
     {{--  <div class="container">
         <div class="card">
             <div class="container-fliud">
                 <div class="wrapper row">
                     <div class="preview col-md-6">
                         <div class="preview-pic tab-content">
                             <div class="tab-pane active" id="pic-1"><img src="/sanpham/{{ $sp->anh }}" />
                             </div>
                         </div>
                     </div>
                     <div class="details col-md-6">
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
                         <input type="hidden" name="" id="dongia" value="{{ $sp->dongia }}">
                         <h4 class="price" id="blabla">Giá bán: <span id="priceConvert"></span></h4>
                         <div class="action">
                             <button class="add-to-cart btn btn-warning" type="button">
                                 <span class="glyphicon glyphicon-shopping-cart pull-center"></span> Giỏ hàng</button>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>  --}}
     <section>
         <div class="container">
             <div class="card">
                 <div class="card-body">
                     <div class="row">
                         <div class="col-md-6 text-center">
                             <div class="thumbnail">
                                 <img style="width:400px" src="/sanpham/{{ $sp->anh }}"
                                     class="img-fluid rounded mx-auto d-block" />
                             </div>
                             <form action="{{ route('shoplaptop.addcart', ['id' => $sp->id]) }}" method="GET">
                                 <h4 class="price" id="blabla">Giá bán: <span id="priceConvert" style="  color: #1d77e5;"></span></h4>
                                 <input type="hidden" name="quantity" id="" value="1">
                                 <input type="hidden" name="price" id="dongia"value="{{ $sp->dongia }}">
                                 <button class="add-to-cart btn btn-warning" type="submit">
                                     <span class="fas fa-cart-plus me-2"></span> Giỏ hàng</button>
                             </form>
                         </div>
                         <div class="col-md-6 ">
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
