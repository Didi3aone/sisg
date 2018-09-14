<!DOCTYPE html>
<html>
<head>
	<title>Change Log Version</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->
	<style type="text/css" media="screen">
		.box {
		  background:#fff;
		  transition:all 0.2s ease;
		  border:2px dashed #dadada;
		  margin-top: 10px;
		  box-sizing: border-box;
		  border-radius: 5px;
		  background-clip: padding-box;
		  padding:0 20px 20px 20px;
		  min-height:340px;
		}

		.box:hover {
		  border:2px solid #525C7A;
		}

		.box span.box-title {
		    color: #fff;
		    font-size: 24px;
		    font-weight: 300;
		    text-transform: uppercase;
		}

		.box .box-content {
		  padding: 16px;
		  border-radius: 0 0 2px 2px;
		  background-clip: padding-box;
		  box-sizing: border-box;
		}
		.box .box-content p {
		  color:#515c66;
		  text-transform:none;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<h2 class="text-center">Change Log SISG</h2>
	            <div class="row">
                	<?php 
                		$log = $this->Dynamic_model->set_model("tbl_change_log","tcl","log_id")->get_all_data()['datas'];

                		foreach($log as $key => $value):
                	?>
	                <div class="col-md-4 text-center">
	                    <div class="box">
	                        <div class="box-content">
	                            <h1 class="tag-title"><?= $value['log_name']; ?></h1>
	                            <hr />
	                            <p><?= $value['log_desc'] ?></p>
	                            <br />
	                            <p>Log Date: <?= $value['log_date']; ?></p><br/>
	                            <p>Log Created By: <?= $value['log_user_create']; ?></p>
	                            <!-- <a href="" class="btn btn-block btn-primary">Learn more</a> -->
	                        </div>
	                    </div>
	                </div>
	                <?php endforeach; ?>
	            </div>           
	        </div>
		</div>
	</div>
</body>
</html>