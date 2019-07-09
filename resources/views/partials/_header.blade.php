<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
        <img class="navbar-brand-full" src="{{ asset('public/storage/logo/philrice.jfif') }}" width="100" height="30"
            alt="PhilRice Logo">
        <img class="navbar-brand-minimized" src="https://coreui.io/demo/dark/img/brand/sygnet.svg" width="30"
            height="30" alt="CoreUI Logo">
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    {{-- <ul class="nav navbar-nav d-md-down-none">
    <li class="nav-item px-3">
      <a class="nav-link" href="#">Dashboard</a>
    </li>
    <li class="nav-item px-3">
      <a class="nav-link" href="#">Users</a>
    </li>
    <li class="nav-item px-3">
      <a class="nav-link" href="#">Settings</a>
    </li>
  </ul> --}}
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item btn btn-dark" style="border-radius: 20px; margin-right:10px; padding-left: 25px; padding-right: 25px; letter-spacing: 1px"> 
            <a class="nav-link text-white" href="#reportGenerateModal" data-toggle="modal" role="button" aria-haspopup="true"
                aria-expanded="false"> <i class="fa fa-file-pdf-o"></i> Generate Report</a>
        </li>
        <li class="nav-item">
            <div class="input-group search-wrapper">
                <input type="text" class="form-control" id="search-ticket" placeholder="Enter Ticket No....">
                <div class="input-group-append">
                    <button class="btn btn-dark" type="button" id="button-search"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="false">
                <img class="img-avatar" src="img/avatars/6.jpg"
                    alt="{{ App\Profile::select('emp_fullname')->where('emp_idno', Auth::user()->user_idno)->first()->emp_fullname }}">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                {{-- <div class="dropdown-header text-center">
          <strong>Account</strong>
        </div>
        <a class="dropdown-item" href="#">
          <i class="fa fa-bell-o"></i> Updates
          <span class="badge badge-info">42</span>
        </a>
        <a class="dropdown-item" href="#">
          <i class="fa fa-envelope-o"></i> Messages
          <span class="badge badge-success">42</span>
        </a>
        <a class="dropdown-item" href="#">
          <i class="fa fa-tasks"></i> Tasks
          <span class="badge badge-danger">42</span>
        </a>
        <a class="dropdown-item" href="#">
          <i class="fa fa-comments"></i> Comments
          <span class="badge badge-warning">42</span>
        </a>
        <div class="dropdown-header text-center">
          <strong>Settings</strong>
        </div>
        <a class="dropdown-item" href="#">
          <i class="fa fa-user"></i> Profile</a>
        <a class="dropdown-item" href="#">
          <i class="fa fa-wrench"></i> Settings</a>
        <a class="dropdown-item" href="#">
          <i class="fa fa-usd"></i> Payments
          <span class="badge badge-dark">42</span>
        </a>
        <a class="dropdown-item" href="#">
          <i class="fa fa-file"></i> Projects
          <span class="badge badge-primary">42</span>
        </a>
        <div class="divider"></div>
        <a class="dropdown-item" href="#">
          <i class="fa fa-shield"></i> Lock Account</a> --}}
                @if(Auth::check())
                @include('partials._logout')
                @endif
                <a class="dropdown-item" href="#"
                    onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                    <i class="fa fa-lock"></i> Logout</a>
            </div>
        </li>
    </ul>
    <button class="navbar-toggler aside-menu-toggler d-md-down-none" type="button" data-toggle="aside-menu-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <button class="navbar-toggler aside-menu-toggler d-lg-none" type="button" data-toggle="aside-menu-show">
        <span class="navbar-toggler-icon"></span>
    </button>
</header>