<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    @can('dashboard')
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">Dashboard</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="dashboard" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="/dashboard">Dashboard</a> </li>
                        </ul>
                    </li>
                @endcan
                    <!-- menu title -->
                    @can('governorate')
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">Governorate</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="elements" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('governorate.index')}}">Governorate</a></li>

                        </ul>
                    </li>
                @endcan
                    <!-- menu item calendar-->
                    @can('city')
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">City</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('city.index')}}">City</a> </li>
                        </ul>
                    </li>
                    @endcan

                    @can('categories')
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart">
                            <div class="pull-left"><i class="ti-pie-chart"></i><span
                                    class="right-nav-text">Categories</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="chart" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('category.index')}}">Categories</a> </li>
                        </ul>
                    </li>
                @endcan

                    <!-- menu font icon-->
                    @can('post')
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#font-icon">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">Posts</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="font-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('post.index')}}">Posts</a> </li>
                        </ul>
                    </li>
                @endcan
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Blood Bank App</li>

                    <!-- menu item Form-->
                    @can('client')
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Form">
                            <div class="pull-left"><i class="ti-files"></i><span class="right-nav-text">Clients</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Form" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('client.index')}}">Clients</a> </li>
                        </ul>
                    </li>
                @endcan
                    <!-- menu item table -->
                    @can('contact')
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Form1">
                            <div class="pull-left"><i class="ti-files"></i><span class="right-nav-text">Contacts</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Form1" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('contact.index')}}">Contacts</a> </li>
                        </ul>
                    </li>
                    @endcan

                    @can('setting')
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Form2">
                            <div class="pull-left"><i class="ti-files"></i><span class="right-nav-text">Setting</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Form2" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('setting.index')}}">Setting</a> </li>
                        </ul>
                    </li>
                    @endcan

                    @can('donation')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Form6">
                                <div class="pull-left"><i class="ti-files"></i><span class="right-nav-text">Donation Requests</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Form6" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="{{route('donation.index')}}">Donation Requests</a> </li>
                            </ul>
                        </li>
                    @endcan
                    @can('user')
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Form3">
                            <div class="pull-left"><i class="ti-files"></i><span class="right-nav-text">Users</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Form3" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('users.index')}}">users</a> </li>
                        </ul>
                    </li>
                    @endcan
                    @can('role')
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Form4">
                            <div class="pull-left"><i class="ti-files"></i><span class="right-nav-text">Roles</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Form4" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('roles.index')}}">Roles</a> </li>
                        </ul>
                    </li>
                    @endcan

                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
