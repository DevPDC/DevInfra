<script>
        $("#ppd_form_reset").click(function () {
            $("#ppd_category_id").val(1);
            $("#ppd_request_title").val("");
            $("#ppd_request_details").val("");
            $("#ppd_date_needed").val("2019-02-04");
        });
        var ppdis_url = "http://192.168.11.119/infra-main/api/api/insertNewServiceRequest";
        $("#submit_ppd_request").click(function () {
            var ppd_category_id = $("#ppd_category_id").val();
            var ppd_request_title = $("#ppd_request_title").val();
            var ppd_request_details = $("#ppd_request_details").val();
            var ppd_date_needed = $("#ppd_date_needed").val();
            if (ppd_request_details == '') {
                swal({
                    title: 'Please put maintenance details',
                    type: 'error'
                });
            } else {
                HoldOn.open(options);
                $.post(ppdis_url + "/save_request", {
                    category_id: ppd_category_id,
                    request_title: ppd_request_title,
                    request_details: ppd_request_details,
                    proposed_service_date: ppd_date_needed,
                    emp_idno: 17-0811
                }, function () {
                    HoldOn.close();
                    swal({
                        title: 'Request Submitted',
                        type: 'success'
                    });
                    $("#ppd_form_reset").trigger("click");
                    $("#reload_ppd_requests").mask('Loading... Please wait.');
                    $("#reload_ppd_requests").load(ppdis_url + "/reload_requests", {}, function () {
                        $("#reload_ppd_requests").unmask();
                    });
                });
            }
        });
        $(function () {
            $('#ppd_date_needed').datepicker({dateFormat: 'yy-mm-dd'});
        });
        $(".psis_scroll").slimScroll({
            size: '6px',
            width: '100%',
            height: '26vw',
            allowPageScroll: true,
            alwaysVisible: true
        });
    </script>