<script type="text/javascript">
	function b64_to_utf8( str ) {
	    str = str.replace(/\s/g, '');    
	    return decodeURIComponent(escape(window.atob( str )));
	}

	var lists = function () {
	    var table_id = "#dataTable";
	    var ajax_source = "<?= site_url('slip/list_all_data_bni') ?>";
	    var url = "<?= site_url('slip/'); ?>";
	    var columns = [
	        {"data": "upload_id" },
	        {"data": "nik" },
	        {"data": "name" },
	        {"data": "basic_sallary" },
	        { "data": "upload_date",
	            "render":function(data, type, full) {
	                if (data != null && data != "") {
	                    return moment(data).format("DD MMMM YYYY");
	                }

	                return "";
	            }
	        },
	        {
	            "title": "Action",
	            "class": "text-center",
	            "data": null,
	            "sortable": false,
	            "render": function(data, type, full) {
	                var edit =  '<td>';
	                    edit +=  ' <a href="' + url + "preview-print-hsbc/" +full.upload_id + '" class="btn btn-info btn-circle print-slip" rel="tooltip" title="Print Slip" data-placement="top" data-validate="' + data.upload_id + '"><i class="fa fa-print"></i></a>';
	                    // edit +=  ' <a href="' + url + "print_pdf/"+ full.upload_id + '" class="btn btn-success btn-circle" rel="tooltip" title="Download PDF" data-placement="top" ><i class="fa fa-download"></i></a>';	                           
	                    edit +=  '</td>';

	                return edit;
	            }
	        },
	    ];
	    setup_daterangepicker(".date-range-picker");
	    init_datatables (table_id, ajax_source, columns);

	    $(document).on("click", ".delete-confirm", function(e) {
	        e.stopPropagation();
	        e.preventDefault();
	        var url = $(this).attr("href");
	        var data_id = $(this).data("id");
	        var data_name = $(this).data("name");

	        title = 'Delete Confirmation';
	        content = 'Do you really want to delete group' + data_name + ' ?';

	        popup_confirm (url, data_id, title, content);

	    });

	    $(document).on("popup-confirm:success", function (e, url, data_id){
	        $("#dataTable").dataTable().fnClearTable();
	    });
	};

	/**
	 * This js file is used in multiple places.
	 * it provides password confirmation alert.
	 */
	function showPasswordConfirm(onSuccess) {
	    swal({
	        title: "Verifikasi User",
	        text: "Kegiatan ini membutuhkan verifikasi user, silahkan masukan NIK Anda.",
	        type: "warning",
	        showCancelButton: true,
	        cancelButtonText: "Batal",
	        confirmButtonText: "Verifikasi",
	        animation: true,
	        input: 'password',
	        inputAttributes: {
	            'autocomplete': 'off',
	            'autocapitalize': 'off',
	            'autocorrect': 'off'
	        },
	        inputValidator: function(value) {
	            return new Promise(function(resolve, reject) {
	                if (value) {
	                    resolve();
	                } else {
	                    reject('Tolong masukan nik Anda.');
	                }
	            });
	        }
	    }).then(function(pass) {
	        onSuccess(pass);
	    }).catch(swal.noop);
	}

	var listenToPrintWithConfirmation = function() {
	    $(document).on('click', '.print-slip', function(event) {
	        var button = $(this);
	        event.preventDefault();
	        event.stopPropagation();

	        var should_validate = $(this).data('validate');
	        if (should_validate) {
	            //get password first.
	            showPasswordConfirm(function(nik) {
	                //show loading.
	                $('.loading').css("display", "block");

	                var url = "<?= site_url("slip/check_nik_valid"); ?>";
	                //ajax post.
	                $.ajax({
	                    type: "post",
	                    url: url,
	                    cache: false,
	                    data: {
	                        nik: nik,
	                    },
	                    dataType: 'json',
	                    success: function(data) {
	                        //stop loading.
	                        $('.loading').css("display", "none");

	                        if (data.error_msg) {
	                            swal("Oops!", data['error_msg'], "error");
	                        } else {
	                            //print this.
	                            $(button).printPage({showMessage:false}, "fire!");

	                            //refresh table!.
	                            $("#dataTable").dataTable().fnClearTable();
	                        }
	                    },
	                    error: function() {
	                        console.log("error");

	                        //stop loading.
	                        $('.loading').css("display", "none");
	                    }
	                });
	            });
	        } else {
	            //nope? then print it.
	            $(button).printPage({showMessage:false}, "fire!");

	            //refresh table!.
	            $("#dataTable").dataTable().fnClearTable();
	        }
	    });
	}

	$(document).ready(function() {
	    lists();
	    listenToPrintWithConfirmation();
	});

</script>