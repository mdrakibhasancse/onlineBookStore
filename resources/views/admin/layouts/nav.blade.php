  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
            <a href="{{ url('/admin/dashboard') }}" class="nav-link {{ request()->is('*/admin/dashboard*') ? 'active' : ' '}}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('categories.index')}}" class="nav-link {{ request()->is('*/categories*') ? 'active' : ' '}}">
            <i class="nav-icon fas fa-book"></i>
            <p>Category</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('publishers.index')}}" class="nav-link {{ request()->is('*/publishers*') ? 'active' : ' '}}">
            <i class="nav-icon fas fa-book"></i>
            <p>Publisher</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('/admin/customers')}}" class="nav-link {{ request()->is('*/customers*') ? 'active' : ' '}}">
            <i class="nav-icon fas fa-user"></i>
            <p>Customer</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('authors.index')}}" class="nav-link {{ request()->is('*/authors*') ? 'active' : ' '}}">
            <i class="nav-icon fas fa-user"></i>
            <p>Author</p>
            </a>
        </li>




        <li class="nav-item">
            <a href="{{ route('books.index')}}" class="nav-link {{ request()->is('*/books*') ? 'active' : ' '}}">
            <i class="nav-icon fas fa-book"></i>
            <p>Book</p>
            </a>
        </li>


        <li class="nav-item">
            <a href="{{ route('subscribes.index')}}" class="nav-link {{ request()->is('*/subscribes*') ? 'active' : ' '}}">
            <i class="nav-icon fas fa-book"></i>
            <p>Subscribes</p>
            </a>
        </li>


        <li class="nav-item">
            <a href="{{ url('admin/review/manage')}}" class="nav-link {{ request()->is('*/review/manage*') ? 'active' : ' '}}">
            <i class="nav-icon fas fa-book"></i>
            <p>Manage Review</p>
            </a>
        </li>



        <li class="nav-item menu-open">
            <a href="#" class="nav-link {{ request()->is('*admin/orders*') ? 'menu-open' : ' '}}">
                <i class="nav-icon fas fa-book"></i>
              <p>
                 Manage order
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/orders/approved')}}" class="nav-link {{ request()->is('*/approved*') ? 'active' : ' '}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approve Order</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/orders/pending')}}" class="nav-link {{ request()->is('*/pending*') ? 'active' : ' '}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending Order</p>
                </a>
              </li>
            </ul>
          </li>

        <li class="nav-item">
            <a href="{{ url('admin/setting')}}" class="nav-link {{ request()->is('*/setting*') ? 'active' : ' '}}">
            <i class="nav-icon fas fa-cog"></i>
            <p>Setting</p>
            </a>
        </li>


        <li class="nav-header">Your Account</li>
      <li class="nav-item">
        <a href="{{ url('/admin/profile')}}" class="nav-link {{ request()->is('*/profile*') ? 'active' : ' '}}">
            <i class="nav-icon fas fa-user"></i>
          <p>
            Profile
          </p>
        </a>
      </li>



    </ul>



  </nav>
  <!-- /.sidebar-menu -->
