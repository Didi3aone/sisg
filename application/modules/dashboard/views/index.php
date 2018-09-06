<!-- MAIN CONTENT -->
<div id="content">

	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
			<h1 class="page-title txt-color-blueDark"><?= $title_page ?></h1>
		</div>
	</div>
</div>

<?php 
	$level = $this->session->userdata('level');

	if( $level == "ADMINISTRATOR" || $level == "SYSTEM") :
?>
	<div class="col-md-3 col-sm-4">
		<div class="wrimagecard wrimagecard-topimage">
			<a href="#">
				<div class="wrimagecard-topimage_header" style="background-color:rgba(187, 120, 36, 0.1) ">
					<center><i class="fa fa-area-chart" style="color:#BB7824"></i></center>
				</div>
				<div class="wrimagecard-topimage_title">
					<h4>Total Data Upload AKS
						<div class="pull-right badge"><?php echo $data_aks['total'] ?></div>
					</h4>
				</div>
			</a>
		</div>
	</div>

	<div class="col-md-3 col-sm-4">
		<div class="wrimagecard wrimagecard-topimage">
			<a href="#">
				<div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
					<center><i class = "fa fa-area-chart" style="color:#16A085"></i></center>
				</div>
				<div class="wrimagecard-topimage_title">
					<h4>Total Data Upload HSBC
						<div class="pull-right badge" id="WrControls"><?= $data_hsbc['total']; ?></div>
					</h4>
				</div>
			</a>
		</div>
	</div>
	
	<?php else : ?>
		<div class="col-md-8" style="margin-top: 10px;">
			<div class="alert alert-success fade in">
				<button class="close" data-dismiss="alert">
					×
				</button>
				<i class="fa-fw fa fa-check"></i>
				<strong><?php echo greeting(); ?></strong> <b><?= $this->session->userdata('name');?></b>  selamat datang di sistem informasi slip gaji v.1.0.1
			</div>
		</div>

		<div class="col-sm-12 col-md-12 col-lg-6">
			<!-- well -->
			<div class="well">
				<h3>Login Information</h3>
				<!-- <div class="text-center">
					<img src="img/demo/demo-smartbig-alert.png" alt="demo" class="img-responsive">
				</div> -->
				YOUR LOGIN IN BROWSER <h5><b><?= $browser ?></b></h5>
				<p class="note">
					<span class="label bg-color-darken txt-color-white">INFO!</span> Messages are tabbale and does not overpopulate the user screen. Sounds can also be disabled if not needed
				</p>				
			</div>
			<!-- end well -->				
		</div>
	</div>
	<?php endif;?>