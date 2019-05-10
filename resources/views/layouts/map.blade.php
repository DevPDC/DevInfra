<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="PPDIS - Facilities Maintenance & Service Management System">
    <meta name="author" content="Philip Cumay-ao">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <meta name="csrf-token" content="{{ csrf_token() }}" aria-hidden="true"/>
    <title>PPDIS | @yield('title')</title>

    {{-- Stylesheets --}}
    {{-- ------------ --}}
    @include('partials._stylesheets')
    {{ Html::style('public/mapping/get-mapping.css') }}
    {{ Html::style('public/css/all-mapping.css') }}
    {{-- ------------ --}}
    {{-- ------------ --}}

    
    {{-- Yielded Stylesheets --}}
    {{-- ------------ --}}
    @yield('addStyles')
    {{-- ------------ --}}
    {{-- ------------ --}}

  
<body class="app header-fixed aside-menu-fixed">
    <div class="pace  pace-inactive pace-inactive">
        <div class="pace-progress" style="transform: translate3d(100%, 0px, 0px);" data-progress-text="100%" data-progress="99">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>
    @include('partials._header-map')
    <div class="app-body">



        {{-- Main Content --}}
        {{-- ------------ --}}
        <main class="main">
        {{-- ------------ --}}
        {{-- ------------ --}}



            <div class="container-fluid">
                <div id="ui-view">
                    <div>
                        <div class="animated fadeIn">
                            {{-- Content --}}
                            {{-- ------------ --}}
                            @yield('content')
                            {{-- ------------ --}}
                            {{-- ------------ --}}
                        </div>
                    </div>
                </div>
            </div>
        
        {{-- ------------ --}}
        {{-- ------------ --}}    
        </main>
        {{-- ------------ --}}
        {{-- End Main Content --}}

        
        {{-- Right Side navigation --}}
        {{-- ------------ --}}
        @include('partials._aside')
        {{-- End Right Side Navigation --}}
        {{-- ------------ --}}
    
    </div>

    {{-- Footer Content --}}
    {{-- ------------ --}}
    @include('partials._footer')
    {{-- End Footer Content --}}
    {{-- ------------ --}}

    
    {{-- javascripts --}}
    {{-- ------------ --}}
    @include('partials._scripts')
    {{ Html::script('public/js/all-mapping.js') }}
    {{-- End Javascript partial --}}
    {{-- ------------ --}}
    
    {{-- Yielded JavaScripts --}}
    {{-- ------------ --}}
    
    @yield('addScripts')
    {{-- ------------ --}}
    {{-- ------------ --}}

    @include('partials._create-request')
</body>
</html>