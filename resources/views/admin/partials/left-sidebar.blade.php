<div class="left-side-menu">

    <!-- LOGO -->
    <div class="logo-box">
        <a href="index.html" class="logo logo-dark text-center">
                        <span class="logo-sm">
                            <img src="assets/admin/images/logo-sm-dark.png" alt="" height="24">
                            <!-- <span class="logo-lg-text-light">Minton</span> -->
                        </span>
            <span class="logo-lg">
                            <img src="assets/admin/images/logo-dark.png" alt="" height="20">
                <!-- <span class="logo-lg-text-light">M</span> -->
                        </span>
        </a>

        <a href="index.html" class="logo logo-light text-center">
                        <span class="logo-sm">
                            <img src="assets/admin/images/logo-sm.png" alt="" height="24">
                        </span>
            <span class="logo-lg">
                            <img src="assets/admin/images/logo-light.png" alt="" height="20">
                        </span>
        </a>
    </div>

    <div class="h-100" data-simplebar>

        <!-- User box -->
        @if(\Illuminate\Support\Facades\Auth::check())
        <div class="user-box text-center">
            <img src="{{auth()->user()->image}}" alt="user-img" title="Mat Helme"
                 class="rounded-circle img-thumbnail">
            <div class="dropdown">
                <a href="#" class="text-reset dropdown-toggle h4 mt-2 mb-1 d-block fw-medium"
                   data-bs-toggle="dropdown">{{auth()->user()->name}}</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user me-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out me-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>
            @foreach(auth()->user()->roles as $role)
            <p class="text-reset h6">{{$role->name}}</p>
            @endforeach
        </div>
        @endif

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="#sidebarDashboards" data-bs-toggle="collapse" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-dashboard-line"></i>
                        <span class="badge bg-success rounded-pill float-end">3</span>
                        <span> Dashboards </span>
                    </a>
                    <div class="collapse" id="sidebarDashboards">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('admin.index')}}">Sales</a>
                            </li>
                            <li>
                                <a href="dashboard-crm.html">CRM</a>
                            </li>
                            <li>
                                <a href="dashboard-analytics.html">Analytics</a>
                            </li>
                        </ul>
                    </div>
                </li>


                @can('View Products')
                <li>
                    <a href="#sidebarEcommerce" data-bs-toggle="collapse" aria-expanded="false" aria-controls="sidebarEcommerce">
                        <i class="ri-shopping-cart-2-line"></i>
                        <span class="menu-arrow"></span>
                        <span> Ecommerce </span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('products.index')}}">Products List</a>
                            </li>
                            <li>
                                <a href="{{route('products.create')}}">Create Product</a>
                            </li>
                            <li>
                                <a href="{{route('categories.index')}}">Categories List</a>
                            </li>
                            <li>
                                <a href="{{route('orders.index')}}">Orders</a>
                            </li>
                            <li>
                                <a href="ecommerce-cart.html">Shopping Cart</a>
                            </li>
                            <li>
                                <a href="ecommerce-checkout.html">Checkout</a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endcan

                @can('View Users')
                <li>
                    <a href="#sidebarUsers" data-bs-toggle="collapse" aria-expanded="false" aria-controls="sidebarUsers">
                        <i class="ri-user-line"></i>
                        <span class="menu-arrow"></span>
                        <span> Users </span>
                    </a>
                    <div class="collapse" id="sidebarUsers">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('users.index')}}">Users List</a>
                            </li>
                            <li>
                                <a href="{{route('users.create')}}">Create User</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#sidebarRolesPermissions" data-bs-toggle="collapse" aria-expanded="false" aria-controls="sidebarRolesPermissions">
                        <i class="ri-admin-line"></i>
                        <span class="menu-arrow"></span>
                        <span> Roles & Permissions </span>
                    </a>
                    <div class="collapse" id="sidebarRolesPermissions">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('roles.index')}}">Roles List</a>
                            </li>
                            <li>
                                <a href="{{route('permissions.index')}}">Permission List</a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endcan

                <li>
                    <a href="#sidebarEmail" data-bs-toggle="collapse" aria-expanded="false" aria-controls="sidebarEmail">
                        <i class="ri-mail-line"></i>
                        <span> Email </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEmail">
                        <ul class="nav-second-level">
                            <li>
                                <a href="email-inbox.html">Inbox</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-title mt-2">Components</li>

                <li>
                    <a href="#sidebarCharts" data-bs-toggle="collapse" aria-expanded="false" aria-controls="sidebarCharts">
                        <i class="ri-bar-chart-line"></i>
                        <span> Charts </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCharts">
                        <ul class="nav-second-level">
                            <li>
                                <a href="charts-flot.html">Flot</a>
                            </li>
                            <li>
                                <a href="charts-apex.html">Apex</a>
                            </li>
                            <li>
                                <a href="charts-morris.html">Morris</a>
                            </li>
                            <li>
                                <a href="charts-chartjs.html">Chartjs</a>
                            </li>
                            <li>
                                <a href="charts-c3.html">C3</a>
                            </li>
                            <li>
                                <a href="charts-peity.html">Peity</a>
                            </li>
                            <li>
                                <a href="charts-chartist.html">Chartist</a>
                            </li>
                            <li>
                                <a href="charts-sparklines.html">Sparklines</a>
                            </li>
                            <li>
                                <a href="charts-knob.html">Jquery Knob</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
