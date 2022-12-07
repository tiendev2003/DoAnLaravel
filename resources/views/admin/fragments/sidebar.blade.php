<ul class=" navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Laptop Shop </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Quản lý
    </div>

    <!-- Nav Item - Pages Collapse Menu -->

 <li class="nav-item ">
        <a class="nav-link" href="{{route('admin.banner.index')}}">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </i>&nbsp;</span>Quản lý Bannner</a>
        </a>
    </li>

    <li class="nav-item ">
        <a class="nav-link" href="{{route('admin.donhang.index')}}">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </i>&nbsp;</span>Quản lý Đơn hàng</a>
        </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fa fa-folder-open" aria-hidden="true"></i>
            &nbsp;</span>Quản lý Sản phẩm</a>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="   {{route('admin.sanpham.create')}}">Thêm</a>
                <a class="collapse-item" href="   {{route('admin.sanpham.index')}}">Danh sách</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.danhmuc.index')}}">
            <i class="fa fa-th-list" aria-hidden="true"></i>&nbsp;
            </span>Quản lý Danh Mục</a>
        </a>
    </li>



    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.nhanhieu.index')}}">
            <i class="fa fa-tasks" aria-hidden="true"></i>
            &nbsp;</span>Quản lý Nhãn hiệu</a>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitiesw"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fa fa-list" aria-hidden="true"></i>
            &nbsp;</span>Quản lý Tài khoản</a>
        </a>
        <div id="collapseUtilitiesw" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="  {{route('admin.taikhoan.create')}}">Thêm </a>
                <a class="collapse-item" href="{{route('admin.taikhoan.index')}}">Danh sách</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.lienhe.index')}}">
            <i class="fa fa-envelope" aria-hidden="true"></i>
            &nbsp;</span>Quản lý Liên Hệ</a>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="   {{route('admin.profile.index')}}">
            <i class="fa fa-user" aria-hidden="true"></i>
            &nbsp;</span>Thông tin cá nhân</a>
        </a>
    </li>
    <!-- Divider -->

    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>