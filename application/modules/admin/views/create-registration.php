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
	<!-- css files -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/regis/css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/regis/css/font-awesome.css">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->
	<!-- load cdn bootstrap -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" media="screen" href="<?= base_url(); ?>assets/css/sweetalert.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<!-- jquery -->
	<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
 	<!--  -->
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
	<marquee>SYSTEM INFORMASI SLIP GAJI</marquee>	
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
						<input placeholder="Your Name" name="fullname" type="text" required="">
					</div>
				</div>

				<div class="form-style-agile">
					<label>Username</label>
					<div class="pom-agile">
						<span class="fa fa-user-o" aria-hidden="true"></span>
						<input placeholder="Your Name" name="username" type="text" required="">
					</div>
				</div>

				<div class="form-style-agile">
					<label>NIK</label>
					<div class="pom-agile">
						<span class="fa fa-address-card" aria-hidden="true"></span>
						<input placeholder="NIK" name="nik" type="text" required="">
					</div>
				</div>

				<div class="form-style-agile">
					<label>Email</label>
					<div class="pom-agile">
						<span class="fa fa-envelope" aria-hidden="true"></span>
						<input placeholder="Email" name="email" type="email" required="">
					</div>
				</div>

				<div class="form-style-agile">
					<label>Divisi</label>
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
						<input placeholder="Password" name="password" type="password" id="password1" required="">
					</div>
				</div>

				<div class="form-style-agile">
					<label>Confirm Password</label>
					<div class="pom-agile">
						<span class="fa fa-key" aria-hidden="true"></span>
						<input placeholder="Confirm Password" name="conf_password" type="password" id="password2" required="">
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
	<?php $this->load->view("admin/regis_js_nav"); ?>
</body>
</html>