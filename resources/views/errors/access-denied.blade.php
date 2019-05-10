<html lang="en">

<head>
  <base href="./">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
  <meta name="author" content="Łukasz Holeczek">
  <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
  <title>Access Denied</title>

<link href="{{ asset('public/coreui/css/get.css') }}" rel="stylesheet">
  
<body class="app flex-row align-items-center  pace-done">
  <div class="pace  pace-inactive">
    <div class="pace-progress" style="transform: translate3d(100%, 0px, 0px);" data-progress-text="100%" data-progress="99">
      <div class="pace-progress-inner"></div>
    </div>
    <div class="pace-activity"></div>
  </div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="clearfix">
          <h1 class="float-left display-3 mr-4"><span class="cui-lock-locked"></span></h1>
          <h4 class="pt-3">Access Denied</h4>
          <p class="text-muted">You are not authorized to access this page.</p>
        </div>
        <div class="input-prepend input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">
              <i class="fa fa-search"></i>
            </span>
          </div>
          <input class="form-control" id="prependedInput" size="16" placeholder="What are you looking for?" type="text">
          <span class="input-group-append">
            <button class="btn btn-info" type="button">Search</button>
          </span>
        </div>
      </div>
    </div>
  </div>

@include('partials._scripts')
  <script>
    $('#ui-view').ajaxLoad();
    $(document).ajaxComplete(function () {
      Pace.restart()
    });
  </script>

</body>

</html>