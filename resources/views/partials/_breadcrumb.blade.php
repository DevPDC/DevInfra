<ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item">
        <a href="#">User</a>
    </li>
    <li class="breadcrumb-item active">@yield('breadcrumb-title')</li>

    <li class="breadcrumb-menu d-md-down-none">
        <div class="btn-group" role="group" aria-label="Button group">
            <a class="btn" href="#">
                <i class="icon-speech"></i>
            </a>
            <a class="btn" href="{{ asset('dashboard') }}">
                <i class="icon-graph"></i> &nbsp;Dashboard</a>
            <a class="btn" href="#">
                <i class="icon-settings"></i> &nbsp;Settings</a>
        </div>
    </li>
</ol>