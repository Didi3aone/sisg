<!-- BOOTSTRAP JS -->
<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/js/plugins/sweetalert.min.js"></script>
<script src="<?= base_url(); ?>assets/js/bootstrap-notify.js"></script>
<!-- form and validate js -->
<script src="<?= base_url(); ?>assets/js/plugins/jquery.form.min.js"></script>
<script src="<?= base_url(); ?>assets/js/plugins/jquery.validate.min.js"></script>
<script src="<?= base_url(); ?>assets/js/plugins/validate-extension.js"></script>
<script src="<?= base_url(); ?>assets/js/global.js"></script>
<script type="text/javascript">
    window.onload = function () {
        document.getElementById("password1").onchange = validatePassword;
        document.getElementById("password2").onchange = validatePassword;
    }

    function validatePassword() {
        var pass2 = document.getElementById("password2").value;
        var pass1 = document.getElementById("password1").value;
        if (pass1 != pass2)
            document.getElementById("password2").setCustomValidity("Passwords Don't Match");
        else
            document.getElementById("password2").setCustomValidity('');
        //empty string means no validation error
    }
    // var $disabledResults = $(".js-example-disabled-results");
    // $disabledResults.select2();

    var create = function (){
    //init validate form org
    var create_form = "#user-form";
    var create_rules = {
        name: {
            required: true,
        },
        username: {
            required: true,
            minlength: 3,
            maxlength: 100,
        },
        email: {
            required: true,
            email: true,
        },
        password: {
            required: true,
            minlength: 4,
            maxlength: 20,
        },
        conf_password: {
            required: true,
            minlength: 4,
            maxlength: 20,
            equalTo: "#password1"
        },
        new_password: {
            minlength: 4,
            maxlength: 20,
        },
        conf_new_password: {
            minlength: 4,
            maxlength: 20,
            equalTo: "#new_password"
        },
    };

    init_validate_forms (create_form,create_rules);
};

$(document).ready(function() {
    // create();
    $('.submit-save').click(function(e) {
        e.preventDefault();
        var form = $('form');

        $.ajax({
            url:"<?php echo site_url('user/process_form'); ?>",
            type:'post',
            data: form.serialize(),
            dataType: 'json',
            success: function(response) {
                console.log(response['alert_error']);
                if (response['alert_error'] == true) {
                    var message = response['error_msg'];
                    // console.log(message);
                    $.notify({
                        title: "<strong>Error</strong>",
                        message: message,
                    }, {
                        type: 'danger' 
                    })
                } else {
                    //success.
                    swal("Success !!!", response['error_msg'], "success")
                    setTimeout(function() { 
                        location.href = "<?php echo site_url('login'); ?>"; 
                    }, 3000);
                   
                    // swal("Good job!", response['error_msg'], "success")
                }
            }, error: function(jqxhr, status, exception) {
                alert('Exception:', exception);
            }
        })
    })
});

</script>