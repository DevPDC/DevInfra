@extends('layouts.app')




{{-- *********************************************************************** --}}



{{-- Title Section --}}
{{-- --------------- --}}
@section('title','')
{{-- --------------- --}}
{{-- --------------- --}}




{{-- *********************************************************************** --}}




{{-- Additional Styles Section --}}
{{-- --------------- --}}
@section('addStyles')
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
        <i class="icon-calendar"></i> FullCalendar
        <a class="badge badge-danger" href="https://coreui.io/pro/">CoreUI Pro Component</a>
        <div class="card-header-actions">
            <a class="card-header-action" href="https://fullcalendar.io" target="_blank">
                <small class="text-muted">docs</small>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div id="calendar" class="fc fc-unthemed fc-ltr">
            <div class="fc-toolbar fc-header-toolbar">
                <div class="fc-left">
                    <div class="fc-button-group"><button type="button" class="fc-prev-button fc-button fc-state-default fc-corner-left"
                            aria-label="prev"><span class="fc-icon fc-icon-left-single-arrow"></span></button><button
                            type="button" class="fc-next-button fc-button fc-state-default fc-corner-right" aria-label="next"><span
                                class="fc-icon fc-icon-right-single-arrow"></span></button></div><button type="button"
                        class="fc-today-button fc-button fc-state-default fc-corner-left fc-corner-right">today</button>
                </div>
                <div class="fc-right">
                    <div class="fc-button-group"><button type="button" class="fc-month-button fc-button fc-state-default fc-corner-left fc-state-active">month</button><button
                            type="button" class="fc-basicWeek-button fc-button fc-state-default">week</button><button
                            type="button" class="fc-basicDay-button fc-button fc-state-default fc-corner-right">day</button></div>
                </div>
                <div class="fc-center">
                    <h2>January 2016</h2>
                </div>
                <div class="fc-clear"></div>
            </div>
            <div class="fc-view-container" style="">
                <div class="fc-view fc-month-view fc-basic-view" style="">
                    <table class="">
                        <thead class="fc-head">
                            <tr>
                                <td class="fc-head-container fc-widget-header">
                                    <div class="fc-row fc-widget-header">
                                        <table class="">
                                            <thead>
                                                <tr>
                                                    <th class="fc-day-header fc-widget-header fc-sun"><span>Sun</span></th>
                                                    <th class="fc-day-header fc-widget-header fc-mon"><span>Mon</span></th>
                                                    <th class="fc-day-header fc-widget-header fc-tue"><span>Tue</span></th>
                                                    <th class="fc-day-header fc-widget-header fc-wed"><span>Wed</span></th>
                                                    <th class="fc-day-header fc-widget-header fc-thu"><span>Thu</span></th>
                                                    <th class="fc-day-header fc-widget-header fc-fri"><span>Fri</span></th>
                                                    <th class="fc-day-header fc-widget-header fc-sat"><span>Sat</span></th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </thead>
                        <tbody class="fc-body">
                            <tr>
                                <td class="fc-widget-content">
                                    <div class="fc-scroller fc-day-grid-container" style="overflow: hidden; height: 1175px;">
                                        <div class="fc-day-grid fc-unselectable">
                                            <div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 195px;">
                                                <div class="fc-bg">
                                                    <table class="">
                                                        <tbody>
                                                            <tr>
                                                                <td class="fc-day fc-widget-content fc-sun fc-other-month fc-past"
                                                                    data-date="2015-12-27"></td>
                                                                <td class="fc-day fc-widget-content fc-mon fc-other-month fc-past"
                                                                    data-date="2015-12-28"></td>
                                                                <td class="fc-day fc-widget-content fc-tue fc-other-month fc-past"
                                                                    data-date="2015-12-29"></td>
                                                                <td class="fc-day fc-widget-content fc-wed fc-other-month fc-past"
                                                                    data-date="2015-12-30"></td>
                                                                <td class="fc-day fc-widget-content fc-thu fc-other-month fc-past"
                                                                    data-date="2015-12-31"></td>
                                                                <td class="fc-day fc-widget-content fc-fri fc-past"
                                                                    data-date="2016-01-01"></td>
                                                                <td class="fc-day fc-widget-content fc-sat fc-past"
                                                                    data-date="2016-01-02"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="fc-content-skeleton">
                                                    <table>
                                                        <thead>
                                                            <tr>
                                                                <td class="fc-day-top fc-sun fc-other-month fc-past"
                                                                    data-date="2015-12-27"><span class="fc-day-number">27</span></td>
                                                                <td class="fc-day-top fc-mon fc-other-month fc-past"
                                                                    data-date="2015-12-28"><span class="fc-day-number">28</span></td>
                                                                <td class="fc-day-top fc-tue fc-other-month fc-past"
                                                                    data-date="2015-12-29"><span class="fc-day-number">29</span></td>
                                                                <td class="fc-day-top fc-wed fc-other-month fc-past"
                                                                    data-date="2015-12-30"><span class="fc-day-number">30</span></td>
                                                                <td class="fc-day-top fc-thu fc-other-month fc-past"
                                                                    data-date="2015-12-31"><span class="fc-day-number">31</span></td>
                                                                <td class="fc-day-top fc-fri fc-past" data-date="2016-01-01"><span
                                                                        class="fc-day-number">1</span></td>
                                                                <td class="fc-day-top fc-sat fc-past" data-date="2016-01-02"><span
                                                                        class="fc-day-number">2</span></td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable fc-resizable">
                                                                        <div class="fc-content"> <span class="fc-title">All
                                                                                Day Event</span></div>
                                                                        <div class="fc-resizer fc-end-resizer"></div>
                                                                    </a></td>
                                                                <td></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 195px;">
                                                <div class="fc-bg">
                                                    <table class="">
                                                        <tbody>
                                                            <tr>
                                                                <td class="fc-day fc-widget-content fc-sun fc-past"
                                                                    data-date="2016-01-03"></td>
                                                                <td class="fc-day fc-widget-content fc-mon fc-past"
                                                                    data-date="2016-01-04"></td>
                                                                <td class="fc-day fc-widget-content fc-tue fc-past"
                                                                    data-date="2016-01-05"></td>
                                                                <td class="fc-day fc-widget-content fc-wed fc-past"
                                                                    data-date="2016-01-06"></td>
                                                                <td class="fc-day fc-widget-content fc-thu fc-past"
                                                                    data-date="2016-01-07"></td>
                                                                <td class="fc-day fc-widget-content fc-fri fc-past"
                                                                    data-date="2016-01-08"></td>
                                                                <td class="fc-day fc-widget-content fc-sat fc-past"
                                                                    data-date="2016-01-09"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="fc-content-skeleton">
                                                    <table>
                                                        <thead>
                                                            <tr>
                                                                <td class="fc-day-top fc-sun fc-past" data-date="2016-01-03"><span
                                                                        class="fc-day-number">3</span></td>
                                                                <td class="fc-day-top fc-mon fc-past" data-date="2016-01-04"><span
                                                                        class="fc-day-number">4</span></td>
                                                                <td class="fc-day-top fc-tue fc-past" data-date="2016-01-05"><span
                                                                        class="fc-day-number">5</span></td>
                                                                <td class="fc-day-top fc-wed fc-past" data-date="2016-01-06"><span
                                                                        class="fc-day-number">6</span></td>
                                                                <td class="fc-day-top fc-thu fc-past" data-date="2016-01-07"><span
                                                                        class="fc-day-number">7</span></td>
                                                                <td class="fc-day-top fc-fri fc-past" data-date="2016-01-08"><span
                                                                        class="fc-day-number">8</span></td>
                                                                <td class="fc-day-top fc-sat fc-past" data-date="2016-01-09"><span
                                                                        class="fc-day-number">9</span></td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td rowspan="2"></td>
                                                                <td rowspan="2"></td>
                                                                <td rowspan="2"></td>
                                                                <td rowspan="2"></td>
                                                                <td class="fc-event-container" colspan="3"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable fc-resizable">
                                                                        <div class="fc-content"> <span class="fc-title">Long
                                                                                Event</span></div>
                                                                        <div class="fc-resizer fc-end-resizer"></div>
                                                                    </a></td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable">
                                                                        <div class="fc-content"><span class="fc-time">4p</span>
                                                                            <span class="fc-title">Repeating
                                                                                Event</span></div>
                                                                    </a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 195px;">
                                                <div class="fc-bg">
                                                    <table class="">
                                                        <tbody>
                                                            <tr>
                                                                <td class="fc-day fc-widget-content fc-sun fc-past"
                                                                    data-date="2016-01-10"></td>
                                                                <td class="fc-day fc-widget-content fc-mon fc-past"
                                                                    data-date="2016-01-11"></td>
                                                                <td class="fc-day fc-widget-content fc-tue fc-past"
                                                                    data-date="2016-01-12"></td>
                                                                <td class="fc-day fc-widget-content fc-wed fc-past"
                                                                    data-date="2016-01-13"></td>
                                                                <td class="fc-day fc-widget-content fc-thu fc-past"
                                                                    data-date="2016-01-14"></td>
                                                                <td class="fc-day fc-widget-content fc-fri fc-past"
                                                                    data-date="2016-01-15"></td>
                                                                <td class="fc-day fc-widget-content fc-sat fc-past"
                                                                    data-date="2016-01-16"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="fc-content-skeleton">
                                                    <table>
                                                        <thead>
                                                            <tr>
                                                                <td class="fc-day-top fc-sun fc-past" data-date="2016-01-10"><span
                                                                        class="fc-day-number">10</span></td>
                                                                <td class="fc-day-top fc-mon fc-past" data-date="2016-01-11"><span
                                                                        class="fc-day-number">11</span></td>
                                                                <td class="fc-day-top fc-tue fc-past" data-date="2016-01-12"><span
                                                                        class="fc-day-number">12</span></td>
                                                                <td class="fc-day-top fc-wed fc-past" data-date="2016-01-13"><span
                                                                        class="fc-day-number">13</span></td>
                                                                <td class="fc-day-top fc-thu fc-past" data-date="2016-01-14"><span
                                                                        class="fc-day-number">14</span></td>
                                                                <td class="fc-day-top fc-fri fc-past" data-date="2016-01-15"><span
                                                                        class="fc-day-number">15</span></td>
                                                                <td class="fc-day-top fc-sat fc-past" data-date="2016-01-16"><span
                                                                        class="fc-day-number">16</span></td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td rowspan="6"></td>
                                                                <td class="fc-event-container" colspan="2"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable fc-resizable">
                                                                        <div class="fc-content"> <span class="fc-title">Conference</span></div>
                                                                        <div class="fc-resizer fc-end-resizer"></div>
                                                                    </a></td>
                                                                <td class="fc-event-container" rowspan="6"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable">
                                                                        <div class="fc-content"><span class="fc-time">7a</span>
                                                                            <span class="fc-title">Birthday
                                                                                Party</span></div>
                                                                    </a></td>
                                                                <td rowspan="6"></td>
                                                                <td rowspan="6"></td>
                                                                <td class="fc-event-container" rowspan="6"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable">
                                                                        <div class="fc-content"><span class="fc-time">4p</span>
                                                                            <span class="fc-title">Repeating
                                                                                Event</span></div>
                                                                    </a></td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="5"></td>
                                                                <td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable">
                                                                        <div class="fc-content"><span class="fc-time">10:30a</span>
                                                                            <span class="fc-title">Meeting</span></div>
                                                                    </a></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable">
                                                                        <div class="fc-content"><span class="fc-time">12p</span>
                                                                            <span class="fc-title">Lunch</span></div>
                                                                    </a></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable">
                                                                        <div class="fc-content"><span class="fc-time">2:30p</span>
                                                                            <span class="fc-title">Meeting</span></div>
                                                                    </a></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable">
                                                                        <div class="fc-content"><span class="fc-time">5:30p</span>
                                                                            <span class="fc-title">Happy
                                                                                Hour</span></div>
                                                                    </a></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable">
                                                                        <div class="fc-content"><span class="fc-time">8p</span>
                                                                            <span class="fc-title">Dinner</span></div>
                                                                    </a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 195px;">
                                                <div class="fc-bg">
                                                    <table class="">
                                                        <tbody>
                                                            <tr>
                                                                <td class="fc-day fc-widget-content fc-sun fc-past"
                                                                    data-date="2016-01-17"></td>
                                                                <td class="fc-day fc-widget-content fc-mon fc-past"
                                                                    data-date="2016-01-18"></td>
                                                                <td class="fc-day fc-widget-content fc-tue fc-past"
                                                                    data-date="2016-01-19"></td>
                                                                <td class="fc-day fc-widget-content fc-wed fc-past"
                                                                    data-date="2016-01-20"></td>
                                                                <td class="fc-day fc-widget-content fc-thu fc-past"
                                                                    data-date="2016-01-21"></td>
                                                                <td class="fc-day fc-widget-content fc-fri fc-past"
                                                                    data-date="2016-01-22"></td>
                                                                <td class="fc-day fc-widget-content fc-sat fc-past"
                                                                    data-date="2016-01-23"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="fc-content-skeleton">
                                                    <table>
                                                        <thead>
                                                            <tr>
                                                                <td class="fc-day-top fc-sun fc-past" data-date="2016-01-17"><span
                                                                        class="fc-day-number">17</span></td>
                                                                <td class="fc-day-top fc-mon fc-past" data-date="2016-01-18"><span
                                                                        class="fc-day-number">18</span></td>
                                                                <td class="fc-day-top fc-tue fc-past" data-date="2016-01-19"><span
                                                                        class="fc-day-number">19</span></td>
                                                                <td class="fc-day-top fc-wed fc-past" data-date="2016-01-20"><span
                                                                        class="fc-day-number">20</span></td>
                                                                <td class="fc-day-top fc-thu fc-past" data-date="2016-01-21"><span
                                                                        class="fc-day-number">21</span></td>
                                                                <td class="fc-day-top fc-fri fc-past" data-date="2016-01-22"><span
                                                                        class="fc-day-number">22</span></td>
                                                                <td class="fc-day-top fc-sat fc-past" data-date="2016-01-23"><span
                                                                        class="fc-day-number">23</span></td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 195px;">
                                                <div class="fc-bg">
                                                    <table class="">
                                                        <tbody>
                                                            <tr>
                                                                <td class="fc-day fc-widget-content fc-sun fc-past"
                                                                    data-date="2016-01-24"></td>
                                                                <td class="fc-day fc-widget-content fc-mon fc-past"
                                                                    data-date="2016-01-25"></td>
                                                                <td class="fc-day fc-widget-content fc-tue fc-past"
                                                                    data-date="2016-01-26"></td>
                                                                <td class="fc-day fc-widget-content fc-wed fc-past"
                                                                    data-date="2016-01-27"></td>
                                                                <td class="fc-day fc-widget-content fc-thu fc-past"
                                                                    data-date="2016-01-28"></td>
                                                                <td class="fc-day fc-widget-content fc-fri fc-past"
                                                                    data-date="2016-01-29"></td>
                                                                <td class="fc-day fc-widget-content fc-sat fc-past"
                                                                    data-date="2016-01-30"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="fc-content-skeleton">
                                                    <table>
                                                        <thead>
                                                            <tr>
                                                                <td class="fc-day-top fc-sun fc-past" data-date="2016-01-24"><span
                                                                        class="fc-day-number">24</span></td>
                                                                <td class="fc-day-top fc-mon fc-past" data-date="2016-01-25"><span
                                                                        class="fc-day-number">25</span></td>
                                                                <td class="fc-day-top fc-tue fc-past" data-date="2016-01-26"><span
                                                                        class="fc-day-number">26</span></td>
                                                                <td class="fc-day-top fc-wed fc-past" data-date="2016-01-27"><span
                                                                        class="fc-day-number">27</span></td>
                                                                <td class="fc-day-top fc-thu fc-past" data-date="2016-01-28"><span
                                                                        class="fc-day-number">28</span></td>
                                                                <td class="fc-day-top fc-fri fc-past" data-date="2016-01-29"><span
                                                                        class="fc-day-number">29</span></td>
                                                                <td class="fc-day-top fc-sat fc-past" data-date="2016-01-30"><span
                                                                        class="fc-day-number">30</span></td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable fc-resizable"
                                                                        href="http://google.com/">
                                                                        <div class="fc-content"> <span class="fc-title">Click
                                                                                for Google</span></div>
                                                                        <div class="fc-resizer fc-end-resizer"></div>
                                                                    </a></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 200px;">
                                                <div class="fc-bg">
                                                    <table class="">
                                                        <tbody>
                                                            <tr>
                                                                <td class="fc-day fc-widget-content fc-sun fc-past"
                                                                    data-date="2016-01-31"></td>
                                                                <td class="fc-day fc-widget-content fc-mon fc-other-month fc-past"
                                                                    data-date="2016-02-01"></td>
                                                                <td class="fc-day fc-widget-content fc-tue fc-other-month fc-past"
                                                                    data-date="2016-02-02"></td>
                                                                <td class="fc-day fc-widget-content fc-wed fc-other-month fc-past"
                                                                    data-date="2016-02-03"></td>
                                                                <td class="fc-day fc-widget-content fc-thu fc-other-month fc-past"
                                                                    data-date="2016-02-04"></td>
                                                                <td class="fc-day fc-widget-content fc-fri fc-other-month fc-past"
                                                                    data-date="2016-02-05"></td>
                                                                <td class="fc-day fc-widget-content fc-sat fc-other-month fc-past"
                                                                    data-date="2016-02-06"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="fc-content-skeleton">
                                                    <table>
                                                        <thead>
                                                            <tr>
                                                                <td class="fc-day-top fc-sun fc-past" data-date="2016-01-31"><span
                                                                        class="fc-day-number">31</span></td>
                                                                <td class="fc-day-top fc-mon fc-other-month fc-past"
                                                                    data-date="2016-02-01"><span class="fc-day-number">1</span></td>
                                                                <td class="fc-day-top fc-tue fc-other-month fc-past"
                                                                    data-date="2016-02-02"><span class="fc-day-number">2</span></td>
                                                                <td class="fc-day-top fc-wed fc-other-month fc-past"
                                                                    data-date="2016-02-03"><span class="fc-day-number">3</span></td>
                                                                <td class="fc-day-top fc-thu fc-other-month fc-past"
                                                                    data-date="2016-02-04"><span class="fc-day-number">4</span></td>
                                                                <td class="fc-day-top fc-fri fc-other-month fc-past"
                                                                    data-date="2016-02-05"><span class="fc-day-number">5</span></td>
                                                                <td class="fc-day-top fc-sat fc-other-month fc-past"
                                                                    data-date="2016-02-06"><span class="fc-day-number">6</span></td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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
{{ Html::script('public/coreui/js/moment/moment.min.js') }}
{{ Html::script('public/coreui/js/fullcalendar/js/fullcalendar.min.js') }}
{{ Html::script('public/coreui/js/fullcalendar/js/gcal.js') }}
{{ Html::script('public/coreui/js/calendar.js') }}
@endsection
{{-- --------------- --}}
{{-- End Addtl Script Section --}}