    
    {{ Html::script('public/js/site.js') }}
    <script src="{{ asset('public/coreui/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/coreui/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/coreui/js/popper/popper.min.js') }}"></script>
    <script src="{{ asset('public/coreui/js/pace.min.js') }}"></script>
    <script src="{{ asset('public/coreui/js/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('public/coreui/js/coreui.min.js') }}"></script>
    <script src="{{ asset('public/coreui/js/fontawesome.min.js') }}"></script>
    <script src="{{ asset('public/js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('public/plugins/HoldOn/HoldOn.min.js') }}"></script>
    {{ Html::script('public/coreui/js/ladda/js/spin.min.js') }}
    {{ Html::script('public/coreui/js/ladda/js/ladda.min.js') }}
    {{ Html::script('public/coreui/js/loading-button.js') }}
    {{ Html::script('public/js/parsley.min.js') }}
    {{ Html::script('public/custom/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}
    {{ Html::script('public/coreui/js/select2/js/select2.full.min.js') }}

    
    <script>
        $('#ui-view').ajaxStart();
        $(document).ajaxComplete(function() {
            Pace.restart()
        });

        function getCategorySelect() {
            var wrapper = $('#summary #category_id');

            wrapper.select2({
                ajax: {
                    type: 'GET',
                    dataType: 'json',
                    url: "{{ route('api/getCategorySelect') }}",
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.category_name,
                                    id: item.id
                                }
                            })
                        };
                    }
                },
                style: {
                    color: 'black'
                }
            });
        };

        $('#category_id').on('mouseover',function() {
            alert();
        });

        function getStatusSelect() {
            var wrapper = $('#summary #status_id');

            wrapper.select2({
                ajax: {
                    type: 'GET',
                    dataType: 'JSON',
                    url: "{{ route('api/getStatusSelect') }}",
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.status_name,
                                    id: item.id
                                }
                            })
                        };
                    }
                },
                style: {
                    color: 'black'
                }
            });
        }
        
        function dateRangeSummary() {
            var dateFormat = "mm/dd/yy",
                from = $( "#summary #from_date" ),
                to = $( "#summary #to_date" );
                
                from.datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    autoclose: true
                });
                    

                to.datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    autoclose: true
                });

                from.on( "change", function() {
                    to.datepicker( "option", "minDate", getDate( this ) );
                }),

                to.on( "change", function() {
                    from.datepicker( "option", "maxDate", getDate( this ) );
                });
        }
        
        function dateRangeEvaluation() {
            var dateFormat = "mm/dd/yy",
                from = $( "#evaluation #from_date" )
                    .datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    autoclose: true,
                    numberOfMonths: 6
                    })
                    .on( "change", function() {
                    to.datepicker( "option", "minDate", getDate( this ) );
                    }),
                to = $( "#evaluation #to_date" ).datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    autoclose: true,
                    numberOfMonths: 6
                })
                .on( "change", function() {
                    from.datepicker( "option", "maxDate", getDate( this ) );
                });
        }
    </script>
    
    <script src="{{ asset('public/coreui/js/toastr.js') }}"></script>
    <script src="{{ asset('public/coreui/js/toastr2.js') }}"></script>
    
    @if(Session::has('success'))
        <script>
            toastr.success("{{ Session::get('success') }}");
        </script>
    @endif
    
    
    @if(Session::has('info'))
        <script>
            toastr.info("{{ Session::get('info') }}");
        </script>
    @endif
    
    
    @if(Session::has('warning'))
        <script>
            toastr.warning("{{ Session::get('warning') }}");
        </script>
    @endif
    
    
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            <script>
                toastr.error("{{ $error }}");
            </script>
        @endforeach
    @endif
    <script>
        $(document).ready(function(){
            getStatusSelect();
            getCategorySelect();
            dateRangeEvaluation();
            dateRangeSummary();
            // Date picker Initialization

            $('#datepicker').datepicker({
                format: 'yyyy-mm-dd',
                setDate: new Date(),
                autoclose: true
            })
            // End Initialization
        });
    </script>
    <script>

        $('#button-search').click(function(){
            // seach input value
            $('.dataTable-search').DataTable().destroy();
            var searchVal = $('#search-ticket').val(),
                openModal = $('#searchByTicket'),
                ticketNumberWrapper = $('#ticket-number'),
                options = {
                    theme:"sk-fading-circle",
                    message:'Searching for Request Details...'
                };

            HoldOn.open(options);

            // get ticket details
            $.ajax({
                dataType: 'json',
                url: "{{ route('api/searchTicketDetails') }}",
                data: {
                    'searchVal': searchVal,
                    'X-CSRF-TOKEN':'{{ csrf_token() }}'
                },
                success: function(e){
                    if(e != null)
                    {
                        HoldOn.close();
                        openModal.modal('show');
                        ticketNumberWrapper.text(e.ticket_full);

                        // get Service Logs
                        $('.dataTable-search').DataTable({
                            serverSide: true,
                            ajax: {
                                url: '{{ route("api/postlogs") }}',
                                data: {
                                    id: e.id,
                                    'X-CSRF-TOKEN':'{{ csrf_token() }}'
                                }
                            },
                            columns: [
                                {data: 2, name: 'created_at'},
                                {data: 1, name: 'status'},
                            ],
                            order: [[ 0, 'desc' ]]
                        });

                        $.ajax({
                            url: "{{ route('api/getLatestLog') }}",
                            data: {
                                ticketid: searchVal
                            },
                            method: 'post',
                            dataType: 'json',
                            success: function(res){
                                console.log(res.logstatus_id);
                                if(res.logstatus_id == 2 || res.logstatus_id == 1)
                                {
                                    $('#pending-status').addClass('is-active');
                                    $('#pending-status').removeClass('is-complete');

                                    $('#received-status').removeClass('is-active is-complete');

                                    $('#uu-status').removeClass('is-active is-complete');

                                    $('#inspected-status').removeClass('is-active is-complete');

                                    $('#ongoing-status').removeClass('is-active is-complete');

                                    $('#completed-status').removeClass('is-active is-complete');

                                    $('#evaluated-status').removeClass('is-active is-complete');
                                } else if(res.logstatus_id == 3) {
                                    $('#pending-status').removeClass('is-active');
                                    $('#pending-status').addClass('is-complete');

                                    $('#received-status').removeClass('is-completed');
                                    $('#received-status').addClass('is-active');

                                    $('#uu-status').removeClass('is-active is-complete');

                                    $('#inspected-status').removeClass('is-active is-complete');

                                    $('#ongoing-status').removeClass('is-active is-complete');

                                    $('#completed-status').removeClass('is-active is-complete');

                                    $('#evaluated-status').removeClass('is-active is-complete');
                                } else if(res.logstatus_id == 4) {
                                    $('#pending-status').removeClass('is-active');
                                    $('#pending-status').addClass('is-complete');

                                    $('#received-status').removeClass('is-active');
                                    $('#received-status').addClass('is-complete');

                                    $('#uu-status').removeClass('is-completed');
                                    $('#uu-status').addClass('is-active');

                                    $('#inspected-status').removeClass('is-active is-complete');

                                    $('#ongoing-status').removeClass('is-active is-complete');

                                    $('#completed-status').removeClass('is-active is-complete');

                                    $('#evaluated-status').removeClass('is-active is-complete');

                                } else if(res.logstatus_id == 5) {
                                    $('#pending-status').removeClass('is-active');
                                    $('#pending-status').addClass('is-complete');

                                    $('#received-status').removeClass('is-active');
                                    $('#received-status').addClass('is-complete');

                                    $('#uu-status').removeClass('is-active');
                                    $('#uu-status').addClass('is-complete');
                                    
                                    $('#inspected-status').removeClass('is-complete');
                                    $('#inspected-status').addClass('is-active');

                                    $('#ongoing-status').removeClass('is-active is-complete');

                                    $('#completed-status').removeClass('is-active is-complete');

                                    $('#evaluated-status').removeClass('is-active is-complete');
                                } else if(res.logstatus_id == 7 || res == 9) {
                                    $('#pending-status').removeClass('is-active');
                                    $('#pending-status').addClass('is-complete');

                                    $('#received-status').removeClass('is-active');
                                    $('#received-status').addClass('is-complete');

                                    $('#uu-status').removeClass('is-active');
                                    $('#uu-status').addClass('is-complete');

                                    $('#inspected-status').removeClass('is-active');
                                    $('#inspected-status').addClass('is-complete');

                                    $('#ongoing-status').removeClass('is-completed');
                                    $('#ongoing-status').addClass('is-active');

                                    $('#completed-status').removeClass('is-active is-complete');

                                    $('#evaluated-status').removeClass('is-active is-complete');

                                } else if(res.logstatus_id == 10) {
                                    $('#pending-status').removeClass('is-active');
                                    $('#pending-status').addClass('is-complete');

                                    $('#received-status').removeClass('is-active');
                                    $('#received-status').addClass('is-complete');

                                    $('#uu-status').removeClass('is-active');
                                    $('#uu-status').addClass('is-complete');

                                    $('#received-status').removeClass('is-active');
                                    $('#inspected-status').addClass('is-complete');

                                    $('#ongoing-status').removeClass('is-active');
                                    $('#ongoing-status').addClass('is-complete');

                                    $('#completed-status').removeClass('is-completed');
                                    $('#completed-status').addClass('is-active');
                                    
                                    $('#evaluated-status').removeClass('is-active is-complete');
                                } else if(res.logstatus_id == 11) {
                                    $('#pending-status').removeClass('is-active');
                                    $('#pending-status').addClass('is-complete');

                                    $('#received-status').removeClass('is-active');
                                    $('#received-status').addClass('is-complete');

                                    $('#uu-status').removeClass('is-active');
                                    $('#uu-status').addClass('is-complete');

                                    $('#received-status').removeClass('is-active');
                                    $('#inspected-status').addClass('is-complete');

                                    $('#ongoing-status').removeClass('is-active');
                                    $('#ongoing-status').addClass('is-complete');

                                    $('#completed-status').removeClass('is-active');
                                    $('#completed-status').addClass('is-complete');
                                    
                                    $('#evaluated-status').removeClass('is-complete');
                                    $('#evaluated-status').addClass('is-active');
                                } else {
                                    $('#pending-status').removeClass('is-active is-complete');

                                    $('#received-status').removeClass('is-active is-complete');

                                    $('#uu-status').removeClass('is-active is-complete');

                                    $('#inspected-status').removeClass('is-active is-complete');

                                    $('#ongoing-status').removeClass('is-active is-complete');

                                    $('#completed-status').removeClass('is-active is-complete');

                                    $('#evaluated-status').removeClass('is-active is-complete');
                                }
                            }
                        });
                    }
                    else
                    {
                        alert('No Result/s Found!');
                    }
                },
                error:function(x)
                {
                    HoldOn.close();
                    Swal.fire(
                        'Alert',
                        'No result/s found!',
                        'warning'
                    );
                    console.log(x.responseText);
                }
            });
            
            // $('.dataTable-search').DataTable().ajax.reload();
        });

        // Input Lock
        $('textarea').blur(function () {
            $('#hire textarea').each(function () {
                $this = $(this);
                if ( this.value != '' ) {
                $this.addClass('focused');
                $('textarea + label + span').css({'opacity': 1});
                }
                else {
                $this.removeClass('focused');
                $('textarea + label + span').css({'opacity': 0});
                }
            });
        });

        $('#hire .field:first-child input').blur(function () {
            $('#hire .field:first-child input').each(function () {
                $this = $(this);
                if ( this.value != '' ) {
                $this.addClass('focused');
                $('.field:first-child input + label + span').css({'opacity': 1});
                }
                else {
                $this.removeClass('focused');
                $('.field:first-child input + label + span').css({'opacity': 0});
                }
            });
        });

        $('#hire .field:nth-child(2) input').blur(function () {
            $('#hire .field:nth-child(2) input').each(function () {
                $this = $(this);
                if ( this.value != '' ) {
                $this.addClass('focused');
                $('.field:nth-child(2) input + label + span').css({'opacity': 1});
                }
                else {
                $this.removeClass('focused');
                $('.field:nth-child(2) input + label + span').css({'opacity': 0});
                }
            });
        });

        $('#service-request').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                 
            });
        });
    </script>
          
          
