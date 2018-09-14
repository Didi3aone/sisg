<?php 
	$id = isset($datas['user_id']) ? $datas['user_id'] : NULL;
	// pr($id);exit;
?>
<div class="center-container">
    <!--header-->
    <div class="header-w3l">
        <h1> SYSTEM INFORMASI SLIP GAJI</h1>
    </div>
    <!--//header-->
    <div class="main-content-agile">
        <div class="sub-main-w3">   
            <div class="wthree-pro">
                <h2>Form change password</h2>
            </div>
            <form method="POST" id="reset-form">
            	<input type="hidden" name="id" value="<?= $id ?>">
                <div class="pom-agile">
                    <input placeholder="Password" name="password" class="user" type="password" id="password" required>
                    <span class="icon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                </div>
                <div class="pom-agile">
                    <input  placeholder="Password Confirmation" name="conf_password" id="conf_password"  class="pass" type="password" required>
                    <span class="icon2"><i class="fa fa-unlock" aria-hidden="true"></i></span>
                </div>
                <div class="pom-agile">
                    <input  placeholder="Enter unique code" name="code" id="" class="pass" type="text" required>
                    <span class="icon2"><i class="fa fa-unlock" aria-hidden="true"></i></span>
                </div>
                 <div class="right-w3l">
                    <button type="submit" class="submit-save" data-form-target="reset-form"  value="Login">Submit</button>&nbsp;
                	 <a href="<?= site_url('login'); ?>" class="btn btn-remember-back"> Back to login </a> 
                </div>
            </form>
            <br/>
            <div class="col-lg-12" style="color:white;">
                <p>&copy; <?php echo date('Y') ?> Development AKS. All rights reserved || Design by <a href="http://it-underground.web.id" target="_blank">IT DEVELOPMENT AKS</a></p>
            </div>
        </div>
    </div>
    <!--//main-->
     <!--//main-->
    <script type="text/javascript" src="<?= base_url('assets/js/jquery-1.12.4.min.js'); ?>"></script>
	    <!-- BOOTSTRAP JS -->
	<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/plugins/sweetalert.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/bootstrap-notify.js"></script>
	<!-- form and validate js -->
	<script src="<?= base_url(); ?>assets/js/plugins/jquery.form.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/plugins/jquery.validate.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/plugins/validate-extension.js"></script>
	<script src="<?= base_url(); ?>assets/js/global.js"></script>
    <script>
       $(document).ready(function() {
	    // create();
	    $("form").validate({
            rules: {
               	password: { 
                 	required: true,
                 	minlength: 5
               	}, 

                conf_password: { 
                    equalTo: "#password"
               	}
            },
        });

	    $('.submit-save').click(function(e) {
	        e.preventDefault();
	        var form = $('form');

	        $.ajax({
	            url:"<?php echo site_url('index/auth/process_reset_password'); ?>",
	            type:'post',
	            data: form.serialize(),
	            dataType: 'json',
	            success: function(response) {
	                console.log(response['error_msg']);
	                if (response['is_error'] == true) {
	                    var message = response['error_msg'];
	                    // console.log(message);
	                    swal("Oopps !!!", response['error_msg'], "error");
	                } else {
	                    //success.
	                    swal("Success !!!", response['error_msg'], "success");

	                    $("#btn_back").show();
	                }
	            }, error: function(jqxhr, status, exception) {
	                alert('Exception:', exception);
	            }
	        })
	    })
	});

    </script>