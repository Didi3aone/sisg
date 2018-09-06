<!DOCTYPE HTML>
<html lang="zxx">

<head>
	<title>User registration</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Creative Register Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements"
	/>
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Meta tag Keywords -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
	<!-- css files -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/regis/css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/regis/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" media="screen" href="<?= base_url(); ?>assets/css/sweetalert.css">
	<!-- jquery -->
	<script src="<?= base_url(); ?>assets/js/jquery-1.12.4.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
	<!-- end -->
	<!-- select 2 -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Bellefair&amp;subset=hebrew,latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<!-- //web-fonts -->
</head>
<body>
	<!--header-->
	<marquee style="color:white;">SYSTEM INFORMASI SLIP GAJI</marquee>	
	<h1>
		<span>U</span>ser
		<span>R</span>egister
		<span>F</span>orm</h1>
	<!--//header-->
	<!-- content -->
	<div class="main-content-agile">
		<div class="sub-main-w3">
			<form method="post" id="user-form">
				<div class="form-style-agile">
					<label>Full Name</label>
					<div class="pom-agile">
						<span class="fa fa-user-o" aria-hidden="true"></span>
						<input placeholder="Your Name" name="fullname" type="text" required>
					</div>
				</div>

				<div class="form-style-agile">
					<label>Username</label>
					<div class="pom-agile">
						<span class="fa fa-user-o" aria-hidden="true"></span>
						<input placeholder="Your Name" name="username" type="text" >
					</div>
				</div>

				<div class="form-style-agile">
					<label>NIK</label>
					<div class="pom-agile">
						<span class="fa fa-address-card" aria-hidden="true"></span>
						<input placeholder="NIK" name="nik" type="text" >
					</div>
				</div>

				<div class="form-style-agile">
					<label>Email</label>
					<div class="pom-agile">
						<span class="fa fa-envelope" aria-hidden="true"></span>
						<input placeholder="Email" name="email" type="email" >
					</div>
				</div>

				<div class="form-style-agile">
					<label>Divisi OR Position</label>
					<div class="pom-agile">
						<select name="divisi_id" class="js-example-disabled-results">
							<option value="0"> -- choose --</option>
							<?php 
								foreach($datas as $key => $value) : ?>
								  	<option value="<?php echo $value['divisi_id']?>"><?php echo $value['divisi_name']?></option>
							<?php endforeach;?>
						</select>
					</div>
				</div>

				<div class="form-style-agile">
					<label>Password</label>
					<div class="pom-agile">
						<span class="fa fa-key" aria-hidden="true"></span>
						<input placeholder="Password" name="password" type="password" id="password1" >
					</div>
				</div>

				<div class="form-style-agile">
					<label>Confirm Password</label>
					<div class="pom-agile">
						<span class="fa fa-key" aria-hidden="true"></span>
						<input placeholder="Confirm Password" name="conf_password" type="password" id="password2" >
					</div>
				</div>

				<button class="submit-save"> Register</button>
				<a href="<?= site_url('login'); ?>" style="margin-top: 10px;" class="btn btn-success">Have account</a>
			</form>
		</div>
	</div>
	<!-- //content -->
	<!-- footer -->
	<div class="footer" style="color: white;">
        <p>&copy; <?php echo date('Y') ?> Development AKS. All rights reserved | Design by <a href="http://it-underground.web.id" target="_blank">IT UNDERGROUND</a></p>
    </div>
	<!-- //footer -->
	<script src="<?= base_url("assets/js/bootstrap-notify.js"); ?>"></script>
	<?php $this->load->view("user/regis-js-nav"); ?>
</body>
</html>