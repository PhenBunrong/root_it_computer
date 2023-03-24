      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <!-- <img src="{{ auth()->user()->getAvatar()}}" class="img-circle" alt="User Image"> -->
              <img src="{{asset('uploads/avatars')}}/{{ auth()->user()->avatar}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{ auth()->user()->getUserName()}}</p>
              <a href="#">
                @if(auth()->user()->isUserOnline())
                      <i class="fa fa-circle text-success"></i>Online
                @else
                      <i class="fa fa-circle text-warning"></i>Offline
                @endif
              </a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less 
          
          -->
          <ul class="sidebar-menu" data-aos="fade-down" data-aos-duration="1500">
            <li class="header">MAIN NAVIGATION</li>

            <li class="nav-link {{ activeSegment('dashboard')}}"> 
              <a href="{{route('dashboad')}}" >
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            <li class="treeview nav-link {{ activeSegment('webpage')}}">
              <a  href="{{route('webpage.index')}}">
                <i class="fa fa-compass"></i>
                  <span>Web Page Management</span>
              </a>
            </li>
        <!--     <li class="treeview nav-link {{ activeSegment('subCategory')}}">
              <a  href="{{route('subCategory.index')}}">
                <i class="fa fa-shopping-bag"></i>
                  <span>Sub Category Management</span>
              </a>
            </li> -->
            <li class="treeview nav-link {{ activeSegment('banner')}}">
              <a href="#">
              <i class="fa fa-archive"></i>
                <span>Slideshow Management</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="nav-link @yield('banner.create')"><a href="{{route('banner.create')}}" ><i class="fa fa-plus"></i> Add Slideshow</a></li>
                <li class="nav-link @yield('banner.index')"><a href="{{route('banner.index')}}"><i class="fa fa-plus"></i> List Slideshow</a></li>
              </ul>
            </li>
            <li class="treeview nav-link {{ activeSegment('category')}} {{ activeSegment('subCategory')}}">
              <a href="#" class="@yield('category.active')">
                <i class="fa fa-wallet"></i>
                <span>Category Management</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="nav-link @yield('category.index')"><a href="{{route('category.index')}}"><i class="fa fa-plus"></i>Category</a></li>
                <li class="nav-link @yield('subCategory.index')"><a href="{{route('subCategory.index')}}"><i class="fa fa-plus"></i>Sub Category</a></li>
              </ul>
            </li>
            <li class="treeview nav-link {{ activeSegment('brand')}}">
              <a href="#" class="@yield('brand.active')">
                <i class="fa fa-store"></i>
                <span>Brand Management</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="nav-link @yield('brand.create')"><a href="{{route('brand.create')}}"><i class="fa fa-plus"></i> Add Brand</a></li>
                <li class="nav-link @yield('brand.index')"><a href="{{route('brand.index')}}"><i class="fa fa-plus"></i> List Brand</a></li>
              </ul>
            </li>
            <li class="treeview nav-link {{ activeSegment('product')}}">
              <a href="#">
              <i class="fa fa-shopping-bag"></i>
                <span>Products Management</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="nav-link @yield('product.create')"><a href="{{route('product.create')}}" ><i class="fa fa-plus"></i> Add Product</a></li>
                <li class="nav-link @yield('product.index')"><a href="{{route('product.index')}}"><i class="fa fa-plus"></i> List Product</a></li>
              </ul>
            </li>
            <li class="treeview nav-link {{ activeSegment('events')}}">
              <a href="#">
              <i class="fa fa-calendar-alt"></i>
                <span>Events Management</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="nav-link @yield('events.create')"><a href="{{route('events.create')}}" ><i class="fa fa-plus"></i> Add Events</a></li>
                <li class="nav-link @yield('events.index')"><a href="{{route('events.index')}}"><i class="fa fa-plus"></i> List Events</a></li>
              </ul>
            </li>
            <li class="treeview nav-link {{ activeSegment('service')}}">
              <a href="#">
              <i class="fa fa-server"></i>
                <span>Service Management</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="nav-link @yield('service.create')"><a href="{{route('service.create')}}"><i class="fa fa-plus"></i> Add Service</a></li>
                <li class="nav-link @yield('service.index')"><a href="{{route('service.index')}}"><i class="fa fa-plus"></i> Data Service</a></li>
              </ul>
            </li>

            <li class="treeview nav-link {{ activeSegment('solution')}}">
              <a href="#">
              <i class="fa fa-poll"></i>
                <span>Solutions Management</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="nav-link @yield('solutiontype.index')"><a href="{{route('solution.create')}}"><i class="fa fa-plus"></i> Add Solution</a></li>
                <li class="nav-link @yield('solution.index')"><a href="{{route('solution.index')}}"><i class="fa fa-plus"></i> Data Solution</a></li>
              </ul>
            </li>
            @if (Auth::user()->role_as == 'admin')
            <li class="header">MANAGEMENT</li>
            <!-- <li class="treeview nav-link {{ activeSegment('customer')}}">
              <a href="{{route('customer.index')}}">
                <i class="fa fa-chart-pie"></i>
                <span>Customers Management</span>
              </a>
            </li> -->
            
            <li class="treeview nav-link {{ activeSegment('order')}}">
              <a href="{{route('order.index')}}">
                <i class="fa fa-chart-pie"></i>
                <span>Order Management</span>
              </a>
            </li>
            <li class="treeview nav-link {{ activeSegment('coupon')}}">
              <a href="{{route('coupon.index')}}">
                <i class="fa fa-chart-pie"></i>
                <span>Coupon Management</span>
              </a>
            </li>
            <li class="treeview nav-link {{ activeSegment('report')}}">
              <a href="#" class="@yield('report.active')">
                <i class="fa fa-chart-pie"></i>
                <span>Reports Management</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="nav-link @yield('report.index')"><a href="{{route('report.index')}}"><i class="fa fa-plus"></i> Sale Reports List</a></li>
                <!-- <li class="nav-link @yield('search.index')"><a href="{{route('search.reports')}}"><i class="fa fa-plus"></i> Search Reports</a></li> -->
              </ul>
            </li>
            <li class="treeview nav-link {{ activeSegment('promotion')}}">
              <a href="#">
                <i class="fa fa-chart-pie"></i>
                <span>Promotion Management</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="nav-link @yield('promotion.create')"><a href="{{route('promotion.create')}}"><i class="fa fa-plus"></i> Add Promotion</a></li>
                <li class="nav-link @yield('promotion.index')"><a href="{{route('promotion.index')}}"><i class="fa fa-plus"></i> List Promotion</a></li>
              </ul>
            </li>
            <!-- <li class="treeview nav-link {{ activeSegment('cms')}}">
              <a href="#">
                <i class="fa fa-chart-pie"></i>
                <span>CMS Page Management</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="nav-link @yield('cms.create')"><a href="{{route('cms.create')}}"><i class="fa fa-plus"></i> Add CMS Page</a></li>
                <li class="nav-link @yield('cms.index')"><a href="{{route('cms.index')}}"><i class="fa fa-plus"></i> List CMS Page</a></li>
              </ul>
            </li> -->
            
              <li class="header">REGISTER</li>
      
              <li class="nav-link {{ activeSegment('register-user')}}"> 
                <a href="{{url('admin\register-user')}}" >
                <i class="fa fa-users"></i>	&nbsp; <span>User Registrations</span>
                </a>
              </li>
              <li class="nav-link {{ activeSegment('activity')}}"> 
                <a href="{{url('admin\activity')}}" >
                <i class="fa fa-cog"></i>	&nbsp; <span>Activity Log</span>
                </a>
              </li>
              <li class="header">SETTING</li>

              <li class="nav-link {{ activeSegment('settings')}}"> 
                <a href="{{route('settings.index')}}" >
                <i class="fa fa-cogs"></i>	&nbsp; <span>Settings</span>
                </a>
              </li>
            @endif
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>