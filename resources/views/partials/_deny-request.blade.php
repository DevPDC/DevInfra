<div class="modal fade" aria-hidden="true" tabindex="-1" role="dialog" id="denyRequestModal" style="top: 15%">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="text-bold text-raleway">Do you want to cancel this request?</h4>
                <hr>
                <textarea name="cancel_remark" id="cancel_remark" rows="2" class="form-control"></textarea>
                <input type="text" id="cancelled_by" value="{{ Auth::user()->user_idno }}" class="form-control" hidden>
            </div>
            <div class="modal-footer">
                <button class="btn-sm btn-secondary btn" type="button" id="denyConfirm">
                    <i class="fa fa-check">
                        Confirm
                    </i>
                </button>
            </div>
        </div>
    </div>
</div>