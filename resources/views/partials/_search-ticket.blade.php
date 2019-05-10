<div class="modal fade" id="searchByTicket" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card">
            <div class="modal-header card-header" id="form-wrapper">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-header">Ticket No.: <span id="ticket-number"></span></div>
                    </div>
                </div>
                <a href="#" data-dismiss="modal" class="close">x</a>
            </div>
            <div class="modal-body card-body">
                <ul class="progress-tracker progress-tracker--text progress-tracker--center">
                    <li class="progress-step" id="pending-status">
                        <span class="progress-marker"></span>
                        <span class="progress-text">
                            <h5 class="progress-title">Pending</h5>
                        </span>
                    </li>
                    <li class="progress-step" id="received-status">
                        <span class="progress-marker"></span>
                        <span class="progress-text">
                            <h5 class="progress-title">Received</h5>
                        </span>
                    </li>
                    <li class="progress-step" id="uu-status">
                        <span class="progress-marker"></span>
                        <span class="progress-text">
                            <h5 class="progress-title">Under Inspection</h5>
                        </span>
                    </li>
                    <li class="progress-step" id="inspected-status">
                        <span class="progress-marker"></span>
                        <span class="progress-text">
                            <h5 class="progress-title">Inspected</h5>
                        </span>
                    </li>
          
                    <li class="progress-step" id="ongoing-status">
                        <span class="progress-marker"></span>
                        <span class="progress-text">
                            <h5 class="progress-title">Ongoing</h5>
                        </span>
                    </li>
                    <li class="progress-step" id="completed-status">
                        <span class="progress-marker"></span>
                        <span class="progress-text">
                            <h5 class="progress-title">Completed</h5>
                        </span>
                    </li>
                    <li class="progress-step" id="evaluated-status">
                        <span class="progress-marker"></span>
                        <span class="progress-text">
                            <h5 class="progress-title">Evaluated</h5>
                        </span>
                    </li>
                </ul>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <table class="table table-outline table-hover dataTable-search">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm" type="button" id="refresh-search"><i class="fa fa-refresh"></i> Refresh Table</button>
            </div>
        </div>
    </div>
</div>