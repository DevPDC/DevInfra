@extends('layouts.app')




{{-- *********************************************************************** --}}



{{-- Title Section --}}
{{-- --------------- --}}
@section('title','Schedules')
{{-- --------------- --}}
{{-- --------------- --}}




{{-- *********************************************************************** --}}




{{-- Additional Styles Section --}}
{{-- --------------- --}}
@section('addStyles')
    {{ Html::style('public/custom/jquery/jquery-ui.theme.min.css') }}
    {{ Html::style('public/coreui/css/fullcalendar/css/fullcalendar.min.css') }}
@endsection
{{-- --------------- --}}
{{-- End Addtl Style Section --}}




{{-- *********************************************************************** --}}




{{-- Content Section --}}
{{-- --------------- --}}
@section('content')
<div class="card">
    <div class="card-header">
        <i class="icon-calendar"></i> 
        {{-- <a class="badge badge-danger" href="https://coreui.io/pro/">CoreUI Pro Component</a> --}}
        <div class="card-header-actions">
            <a class="card-header-action" href="https://fullcalendar.io" target="_blank">
                <small class="text-muted">docs</small>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div id="calendar-list" class="fc fc-unthemed fc-ltr"></div>
            </div>
            <div class="col-md-8 col-sm-12">
                <div id="calendar" class="fc fc-unthemed fc-ltr"></div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- --------------- --}}
{{-- End Content Section --}}




{{-- *********************************************************************** --}}




{{-- Additional Scripts Section --}}
{{-- --------------- --}}
@section('addScripts')
{{ Html::script('public/coreui/js/moment/js/moment.min.js') }}
{{ Html::script('public/coreui/js/fullcalendar/js/fullcalendar.min.js') }}
{{ Html::script('public/coreui/js/fullcalendar/js/gcal.js') }}
{{ Html::script('public/coreui/js/calendar.js') }}
    <script>
        $(document).ready(function(){
            // For Calendar
            $('#calendar').fullCalendar({
                header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
                },
                defaultDate: new Date(),
                editable: true,
                themeButtonIcons: {
                    prev: 'circle-triangle-w',
                    next: 'circle-triangle-e',
                    prevYear: 'seek-prev',
                    nextYear: 'seek-next'
                },
                // allow "more" link when too many events
                events: '{{ route('allScheduledRequests') }}'
            });
            // End For Calendar

            // For Calendar List View

            $('#calendar-list').fullCalendar({
                defaultView: 'listMonth',
                defaultDate: new Date(),
                // allow "more" link when too many events
                events: '{{ route('allScheduledRequests') }}'
            });
            // End Calendar List View
        })



    </script>
@endsection
{{-- --------------- --}}
{{-- End Addtl Script Section --}}