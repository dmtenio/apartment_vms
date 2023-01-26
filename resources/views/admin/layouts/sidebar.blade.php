  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{ asset('vendors/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AVMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('vendors/dist/img/avatar5.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>

        </div>
      </div>

  
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item dropdown">
                <a href="{{route('admin.dashboard')}}" class="nav-link nav-home {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li> 

              <li class="nav-header">Master List</li>
              <li class="nav-item dropdown">
                <a href="{{route('admin.visitors.create')}}" class="nav-link nav-add {{ (request()->is('visitors/create')) ? 'active' : '' }}">
                  <i class="nav-icon fas fa-user-plus"></i>
                  <p>
                    New Visitor
                  </p>
                </a>
              </li>

              <li class="nav-item dropdown">
                <a href="{{route('admin.visitors.checkoutList')}}" class="nav-link nav-checkoutList  {{ (request()->is('admin/visitors/checkout')) ? 'active' : '' }}">
                  <i class="nav-icon fas fa-sign-in-alt"></i>
                  <p>
                    Checkout Visitor
                  </p>
                </a>
              </li>

              <li class="nav-item dropdown">
                <a href="{{route('admin.visitors.index')}}" class="nav-link nav-visitors  {{ (request()->is('visitors')) ? 'active' : '' }}">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Visitors List
                  </p>
                </a>
              </li>


              <li class="nav-header">Maintenance</li>
       
              <li class="nav-item dropdown">
                <a href="{{route('admin.apartments.index')}}" class="nav-link nav-apartment  {{ (request()->is('apartments')) ? 'active' : '' }}">
                  <i class="nav-icon fas fa-building"></i>
                  <p>
                    Apartments
                  </p>
                </a>
              </li>
             
              <li class="nav-item dropdown">
                <a href="{{route('admin.apartments.index')}}" class="nav-link nav-college">
                  <i class="nav-icon far fa-file-alt"></i>
                  <p>
                    Reports
                  </p>
                </a>
              </li>
                  

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>