@if(Session::has('success'))
    <script>
        toastr.info('Success',"{{ Session::get('success') }}")
    </script>
@endif

@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <script>
            toastr.info("{{ $error }}");
        </script>
    @endforeach
@endif