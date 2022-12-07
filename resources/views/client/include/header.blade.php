 <div class="header_1">
     <a href="/" class="logo"> <img src="/logo3.png"> </a>

     <nav class="navbar_1">
         <ul class="navbar_2">
             <li id="trangchu" class="navbar-li"><a class="navbar-li-a" href="/">trang chủ</a></li>

             <li class="navbar-li"><a class="navbar-li-a" href="#">cửa hàng +</a>
                 <ul id="danhmuc">

                 </ul>
             </li>
             <li class="navbar-li"><a class="navbar-li-a" href="/shoplaptop/bao-hanh">Bảo hành tận nơi</a></li>
             <li class="navbar-li"><a class="navbar-li-a" href="/shoplaptop/van-chuyen">miễn phí vận chuyện</a></li>
             <li class="navbar-li"><a class="navbar-li-a" href="/shoplaptop/lien-he">Liên hệ </a>

             </li>
         </ul>
     </nav>

     <div class="icons ">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="search-btn" class="fas fa-search"></div>
         <div class="fas fa-user" id="user-btn"></div>
         <a href="/shoplaptop/gio-hang" class="fas fa-shopping-cart"></a>
     </div>

     <form action="{{ route('search') }}" class="search-form">
         <input type="search" name="sanpham" placeholder="search here..." id="search-box">
         <button class="fa fa-search" type="submit"></button>
     </form>
     <div class="user-name">
         @if (Route::has('login'))
             @auth
                
                 <ul class="u-links">
                     <div class="divider"></div>
                     <li>
                         <div class="u-content">
                             <div class="u"> {{ Auth::user()->name }}</div>
                         </div>
                     </li>
                     <li>
                         <a href="/login"> <i class="fa fa-cog"></i> cài đặt </a>
                     </li>
                     <li>
                         <a href="/logout"> <i class="fa fa-sign-out-alt" aria-hidden="true"></i>Đăng xuất</a>
                     </li>
                 </ul>
             @else
                 <ul class="u-links">
                     <div class="divider"></div>
                     <li>
                         <a href="/login"> <i class="fa fa-cog"></i> Đăng Nhập </a>
                     </li>
                     <li>
                         <a href="/register"> <i class="fa fa-cog"></i> Đăng ký </a>
                     </li>

                 </ul>
             @endauth
         @endif
     </div>
 </div>
