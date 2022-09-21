  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('admin.dashboard')}}" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline" action="{{route('admin.visitors.visitorSearch')}}" method="get">
            @csrf  
            @method('get')

            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" name="query" type="search" placeholder="Search Visitor Here" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="submit" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

    
      <!-- Dropdown - User Logout -->
      <li class="nav-item dropdown no-arrow">
        
        
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         {{-- <img src="{{  Auth::user()->avatar ?? asset('vendors/dist/img/unnamed.png')}}" class="img-fluid rounded-circle" style="width: 30px;"> --}}
         {{-- <span>{{ Auth::user()->name }}</span> --}}
         <img src="{{ asset('vendors/dist/img/avatar5.png') }}" class="img-fluid rounded-circle" style="width: 30px;">
         <span>Dalimark Tenio</span>
        </a>

        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="userDropdown">
        {{-- <a class="dropdown-item" href="{{route('home')}}">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            User Dashboard
        </a> --}}
       
          <a class="dropdown-item" href="">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Profile
          </a>
        <div class="dropdown-divider"></div>
       
          <a class="dropdown-item" href="">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
          </a>
        
        {{-- <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                       <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
         {{ __('Logout') }}
     </a>

     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
         @csrf
     </form> --}}
    </div>

      </li>

    
    

     

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    
    </ul>
  </nav>
  <!-- /.navbar -->