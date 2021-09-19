@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="/admin/dashboard">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
                        <h3><b>Ecommerce</b> Admin</h3>
                    </div>
                </a>
            </div>
        </div>
        @php
            $brands = Auth::guard('admin')->user()->brands == 1;
            $category = Auth::guard('admin')->user()->category == 1;
            $product = Auth::guard('admin')->user()->product == 1;
            $sliders = Auth::guard('admin')->user()->sliders == 1;
            $coupons = Auth::guard('admin')->user()->coupons == 1;
            $orders = Auth::guard('admin')->user()->orders == 1;
            $setting = Auth::guard('admin')->user()->setting == 1;
            $reports = Auth::guard('admin')->user()->reports == 1;
            $users = Auth::guard('admin')->user()->users == 1;
            $user_role = Auth::guard('admin')->user()->user_role == 1;
        @endphp
        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{ $route == 'dashboard' ? 'active' : '' }}">
                <a href="{{ url('/admin/dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            @if ($brands == true)
                <li class="treeview {{ $prefix == '/brands' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="message-circle"></i>
                        <span>Brands</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'list.brands' ? 'active' : '' }}"><a
                                href="{{ route('list.brands') }}"><i class="ti-more"></i>List Brand</a></li>
                    </ul>
                </li>
            @else
            @endif
            @if ($category == true)
                <li class="treeview {{ $prefix == '/category' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="mail"></i> <span>Category</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'list.category' ? 'active' : '' }}"><a
                                href="{{ route('list.category') }}"><i class="ti-more"></i>List Category</a>
                        </li>
                    </ul>
                </li>
            @else
            @endif
            @if ($product == true)
                <li class="treeview {{ $prefix == '/product' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>Products</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'product.add' ? 'active' : '' }}"><a
                                href="{{ route('product.add') }}"><i class="ti-more"></i>Add Product</a></li>
                        <li class="{{ $route == 'list.product' ? 'active' : '' }}"><a
                                href="{{ route('list.product') }}"><i class="ti-more"></i>List Product</a>
                        </li>
                    </ul>
                </li>
            @else
            @endif
            @if ($sliders == true)
                <li class="treeview {{ $prefix == '/sliders' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="sliders"></i>
                        <span>Sliders</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'list.sliders' ? 'active' : '' }}"><a
                                href="{{ route('list.sliders') }}"><i class="ti-more"></i>List Slider</a></li>
                    </ul>
                </li>
            @else
            @endif
            @if ($coupons == true)
                <li class="treeview {{ $prefix == '/coupons' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="shopping-bag"></i>
                        <span>Coupons</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'list.coupons' ? 'active' : '' }}"><a
                                href="{{ route('list.coupons') }}"><i class="ti-more"></i>List Coupon</a></li>
                    </ul>
                </li>
            @else
            @endif
            <li class="header nav-small-cap">User Interface</li>
            @if ($orders == true)
                <li class="treeview {{ $prefix == '/orders' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>Orders</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'orders.pending' ? 'active' : '' }}"><a
                                href="{{ route('orders.pending') }}"><i class="ti-more"></i>Pending Orders</a>
                        </li>
                        <li class="{{ $route == 'orders.confirmed' ? 'active' : '' }}"><a
                                href="{{ route('orders.confirmed') }}"><i class="ti-more"></i>Confirmed
                                Orders</a>
                        </li>
                        <li class="{{ $route == 'orders.processing' ? 'active' : '' }}"><a
                                href="{{ route('orders.processing') }}"><i class="ti-more"></i>Processing
                                Orders</a></li>
                        <li class="{{ $route == 'orders.picked' ? 'active' : '' }}"><a
                                href="{{ route('orders.picked') }}"><i class="ti-more"></i>Picked Orders</a>
                        </li>
                        <li class="{{ $route == 'orders.shipped' ? 'active' : '' }}"><a
                                href="{{ route('orders.shipped') }}"><i class="ti-more"></i>Shipped Orders</a>
                        </li>
                        <li class="{{ $route == 'orders.delivered' ? 'active' : '' }}"><a
                                href="{{ route('orders.delivered') }}"><i class="ti-more"></i>Delivered
                                Orders</a>
                        </li>
                        <li class="{{ $route == 'orders.return' ? 'active' : '' }}"><a
                                href="{{ route('orders.return') }}"><i class="ti-more"></i>Return Orders</a>
                        </li>
                        <li class="{{ $route == 'orders.return.success' ? 'active' : '' }}"><a
                                href="{{ route('orders.return.success') }}"><i class="ti-more"></i>Return
                                Orders
                                Success</a></li>
                        <li class="{{ $route == 'orders.cancel' ? 'active' : '' }}"><a
                                href="{{ route('orders.cancel') }}"><i class="ti-more"></i>Cancel Orders</a>
                        </li>
                    </ul>
                </li>
            @else
            @endif
            @if ($reports == true)
                <li class="treeview {{ $prefix == '/reports' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="credit-card"></i>
                        <span>Reports</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'all.reports' ? 'active' : '' }}"><a
                                href="{{ route('all.reports') }}"><i class="ti-more"></i>All Reports</a></li>
                    </ul>
                </li>
            @else
            @endif
            @if ($users == true)
                <li class="treeview {{ $prefix == '/users' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="user"></i>
                        <span>Users</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'all.users' ? 'active' : '' }}"><a
                                href="{{ route('all.users') }}"><i class="ti-more"></i>All Users</a></li>
                    </ul>
                </li>
            @else
            @endif
            @if ($user_role == true)
                <li class="treeview {{ $prefix == '/adminrole' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="user"></i>
                        <span>All Admin</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'admin.role' ? 'active' : '' }}"><a
                                href="{{ route('admin.role') }}"><i class="ti-more"></i>All</a></li>
                    </ul>
                </li>
            @else
            @endif
            @if ($setting == true)
                <li class="treeview {{ $prefix == '/setting' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="settings"></i>
                        <span>Manage Setting</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'manage.setting' ? 'active' : '' }}"><a
                                href="{{ route('manage.setting') }}"><i class="ti-more"></i>Site Setting</a>
                        </li>
                        <li class="{{ $route == 'seo.setting' ? 'active' : '' }}"><a
                                href="{{ route('seo.setting') }}"><i class="ti-more"></i>SEO Setting</a></li>
                    </ul>
                </li>
            @else
            @endif
        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
            data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title=""
            data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
            data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>
