<div class="sidebar">
  <nav class="sidebar-nav">
    <ul class="nav">
      <li class="nav-title">NAVIGATIONS</li>
      <li class="nav-item">
        <a class="nav-link" href="{{ asset('dashboard') }}">
          <i class="nav-icon icon-speedometer"></i> Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ asset('dashboard') }}">
          <i class="nav-icon icon-map"></i> Geographic Map
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ asset('calendar') }}" class="nav-link">
          <i class="nav-icon icon-calendar"></i> Calendar
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('posts.index') }}" class="nav-link">
          <i class="nav-icon icon-calendar"></i> Service Requests
        </a>
      </li>
      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#">
          <i class="nav-icon icon-speedometer"></i> Service Categories
        </a>
        <ul class="nav-dropdown-items">
            <li class="nav-item">
              <a href="{{ route('category.index') }}" class="nav-link">
                <i class="nav-icon fa fa-plus-square"></i> Add Category
              </a>
            </li>
            @foreach($categories as $category)
              <li class="nav-item">
                <a href="{{ route('category.show',$category->id) }}" class="nav-link">
                  <i class="nav-icon fa fa-wrench"></i> {{ $category->category_name }}
                </a>
              </li>
            @endforeach
        </ul>
      </li>
      <li class="nav-item">
        <a href="{{ route('infrastructure.index') }}" class="nav-link">
          <i class="nav-icon fa fa-building"></i> Facilities
        </a>
      </li>
      <li class="nav-title">FORMS</li>
      <li class="nav-item">
        <a href="#service-request" data-toggle="modal" class="nav-link">
          <i class="nav-icon icon-pencil"></i> Request Forms
        </a>
      </li>
    </ul>
  </nav>
  <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>