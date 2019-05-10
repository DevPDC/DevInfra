<div class="sidebar">
  <nav class="sidebar-nav">
    <ul class="nav">
      <li class="nav-title">NAVIGATION</li>
      {{-- <li class="nav-item">
        <a class="nav-link" href="{{ asset('home_dashboard') }}">
          <i class="nav-icon icon-speedometer"></i> Dashboard
        </a>
      </li> --}}
      <li class="nav-item">
        <a class="nav-link" href="{{ asset('map_dashboard') }}">
          <i class="nav-icon icon-map"></i> Geographic Map
        </a>
      </li>
      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#">
          <i class="nav-icon icon-speedometer"></i> Service Requests
        </a>
        <ul class="nav-dropdown-items">
            <li class="nav-item">
              <a href="{{ route('posts.index') }}" class="nav-link">
                <i class="nav-icon fa fa-plus-square"></i> View Requests
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('category.index') }}" class="nav-link">
                <i class="nav-icon fa fa-plus-square"></i> Service Categories
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ asset('calendar') }}" class="nav-link">
                <i class="nav-icon icon-calendar"></i> Schedules
              </a>
            </li>
        </ul>
      </li>
      <li class="nav-item nav-dropdown">
        <a href="#" class="nav-link nav-dropdown-toggle">
          <i class="nav-icon fa fa-building"></i> Facilities
        </a>
        <ul class="nav-dropdown-items">
            <li class="nav-item">
              <a href="{{ route('infrastructure.index') }}" class="nav-link">
                <i class="nav-icon fa fa-plus-square"></i> View Facilities
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('maintenance.index') }}" class="nav-link">
                <i class="nav-icon icon-calendar"></i> Maintenance
              </a>
            </li>
        </ul>
      </li>
      <li class="nav-title">SUPPORT</li>
      <li class="nav-item">
        <a href="{{ route('technician.index') }}" class="nav-link">
          <i class="nav-icon fa fa-wrench"></i> Technicians
        </a>
      </li>
      
      <li class="nav-item nav-dropdown">
        <a href="#" class="nav-link nav-dropdown-toggle">
          <i class="nav-icon fa fa-building"></i> Supply Manager
        </a>
        <ul class="nav-dropdown-items">
            <li class="nav-item">
              <a href="{{ route('supply.index') }}" class="nav-link">
                <i class="nav-icon fa fa-plus-square"></i> Supplies
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('brand.index') }}" class="nav-link">
                <i class="nav-icon icon-calendar"></i> Brands
              </a>
            </li>
        </ul>
      </li>

      @if(Auth::check() && Auth::user()->role_id = 1 || Auth::user()->role_id = 1000)
        <li class="nav-item">
          <a href="{{ route('account.index') }}" class="nav-link">
            <i class="nav-icon fa fa-users"></i> Account Manager
          </a>
        </li>
      @endif
      <li class="nav-title">FORMS</li>
      <li class="nav-item">
        <a href="#service-request" data-toggle="modal" class="nav-link">
          <i class="nav-icon icon-pencil"></i> Request Forms
        </a>
      </li>
      <li class="nav-title">CLIENT NAVIGATION</li>
      <li class="nav-item">
        <a href="{{ route('unfiltered.index') }}" class="nav-link">
          <i class="nav-icon fa fa-filter text-danger"></i> Unfiltered Requests
        </a>
      </li>
    </ul>
  </nav>
  <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>