    <script src="{{ asset('coreui/js/jquery.min.js') }}"></script>
    <script src="{{ asset('coreui/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('coreui/js/popper/popper.min.js') }}"></script>
    <script src="{{ asset('coreui/js/pace.min.js') }}"></script>
    <script src="{{ asset('coreui/js/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('coreui/js/coreui.min.js') }}"></script>
    <script src="{{ asset('coreui/js/fontawesome.min.js') }}"></script>
    {{ Html::script('coreui/js/ladda/js/spin.min.js') }}
    {{ Html::script('coreui/js/ladda/js/ladda.min.js') }}
    {{ Html::script('coreui/js/loading-button.js') }}
    <script>
        $('#ui-view').ajaxStart();
        $(document).ajaxComplete(function() {
            Pace.restart()
        });
    </script>
    
    <script src="{{ asset('coreui/js/toastr.js') }}"></script>
    <script src="{{ asset('coreui/js/toastr2.js') }}"></script>
