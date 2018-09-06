<?php
	$user_id   		= isset($data["user_id"]) ? $data["user_id"] : "";
	$name       	= isset($data["user_full_name"]) ? $data["user_full_name"] : "";
	$username   	= isset($data["user_name"]) ? $data["user_name"] : "";
	$email      	= isset($data["user_email"]) ? $data["user_email"] : "";
	$password   	= isset($data["user_password"]) ? $data["user_password"] : "";
	$role_id        = isset($data['role_id']) ? $data['role_id'] : "";
	$role_name      = isset($data['role_name']) ? $data['role_name'] : "";
	$nik 		    = isset($data['user_nik']) ? $data['user_nik'] : "";

    $btn_msg 		= ($user_id == 0) ? "Create" : " Update";
    $title_msg 		= ($user_id == 0) ? "Create" : " Update";
?>
<!-- MAIN CONTENT -->
<div id="content">
    <div class="row">
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
			<h1 class="page-title txt-color-blueDark"><?= $title_page ?></h1>
		</div>
        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-4 col-lg-offset-1 text-right">
			<h1>
                <button class="btn btn-warning back-button" onclick="<?= (isset($back) ? "go('".$back."');" : "window.history.back();") ?>" title="Back" rel="tooltip" data-placement="left" data-original-title="Batal">
					<i class="fa fa-arrow-circle-left fa-lg"></i>
				</button>
				<button class="btn btn-primary submit-form" data-form-target="user-form" title="Simpan" rel="tooltip" data-placement="top" >
					<i class="fa fa-floppy-o fa-lg"></i>
				</button>
			</h1>
		</div>
	</div>

    <!-- widget grid -->
    <section id="widget-grid" class="">
        <div class="row">
            <!-- NEW WIDGET ROW START -->
            <article class="col-sm-12 col-md-12 col-lg-12">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget" id="wid-id-0"
                data-widget-editbutton="false"
                data-widget-deletebutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-pencil-square-o"></i> </span>
                        <h2><?= $title_msg ?> User</h2>

                    </header>
                    <!-- widget div-->
                    <div>
                        <form class="smart-form" id="user-form" action="<?= site_url('user/process_forms'); ?>" method="post">
                            <?php if($user_id != 0): ?>
                                <input type="hidden" name="id" value="<?= $user_id ?>" />
                            <?php endif; ?>
                            <fieldset>
                                <section>
                                    <label class="label">User Full Name <sup class="color-red">*</sup></label>
                                    <label class="input">
                                        <input type="text" name="fullname" value="<?= $name ?>" placeholder="User Full Name">
                                    </label>
	                            </section>

                                <section>
                                    <label class="label">User ROLE<sup class="color-red">*</sup></label>
                                    <label class="select">
          								<?= select_role("user_role", $role_id, 	"id='role'") ?>
                                        <i></i>
                                    </label>
	                            </section>

                                <div class="row">
                                    <section class="col col-6">
                                        <label class="label">Username <sup class="color-red">*</sup></label>
                                        <label class="input">
                                            <input type="text" name="username" value="<?= $username ?>" placeholder="Username">
                                        </label>
                                    </section>

                                    <section class="col col-6">
                                        <label class="label">Email <sup class="color-red">*</sup></label>
                                        <label class="input">
                                            <input type="text" name="email" value="<?= $email ?>" placeholder="Email">
                                        </label>
                                    </section>

                                    <?php if($user_id == 0): ?>
                                    <section class="col col-6">
                                        <label class="label">Password <sup class="color-red">*</sup></label>
                                        <label class="input">
                                            <input type="password" name="user_password" id="password" placeholder="Password">
                                        </label>
                                    </section>

                                    <section class="col col-6">
                                        <label class="label">Confirm New Password <sup class="color-red">*</sup></label>
                                        <label class="input">
                                            <input type="password" name="conf_password" placeholder="Confirm Password">
                                        </label>
                                    </section>

                                    <?php else: ?>
                                    <section class="col col-6">
                                        <label class="label">New Password</label>
                                        <label class="input">
                                            <input type="password" name="new_password" id="new_password" placeholder="New Password">
                                        </label>
                                    </section>

                                    <section class="col col-6">
                                        <label class="label">Confirm New Password</label>
                                        <label class="input">
                                            <input type="password" name="conf_new_password" placeholder="Confirm New Password">
                                        </label>
                                    </section>

                                    <section class="col col-6">
                                        <label class="label">User NIK</label>
                                        <label class="input">
                                            <input type="text" name="nik" placeholder="User NIK">
                                        </label>
                                    </section>

                                    <section class="col col-6">
                                        <label class="label">User Divisi</label>
                                        <label class="select">
                                            <select name="divisi_id">
	                                        	<option value="">-- Choose --</option>
	                                        	<?php 
	                                        		foreach($divisi as $key => $value) :
	                                        	?>
		                                        	<option value="<?= $value['divisi_id']; ?>"><?= $value['divisi_name']; ?></option>
		                                        <?php endforeach; ?>
	                                        </select>
                                        </label>
                                    </section>

                                    <?php endif; ?>
                            		<section class="col col-6" id="nik" style="display: none;">
                                        <label class="label">User NIK</label>
                                        <label class="input">
                                            <input type="text" name="nik" placeholder="User NIK" value="<?= $nik ?>">
                                        </label>
                                    </section>

                                    <section class="col col-6" id="divisi" style="display: none;">
                                        <label class="label">User Divisi</label>
                                        <label class="select">
                                            <select name="divisi_id">
	                                        	<option value="">-- Choose --</option>
	                                        	<?php 
	                                        		foreach($divisi as $key => $value) :
	                                        	?>
		                                        	<option value="<?= $value['divisi_id']; ?>"><?= $value['divisi_name']; ?></option>
		                                        <?php endforeach; ?>
	                                        </select>
                                        </label>
                                    </section>
                                <div>
                            </fieldset>
                        </form>
                    </div>
                    <!-- end widget content -->
                </div>
                <!-- end widget div -->
            </article>
        </div>
    </section> <!-- end widget grid -->
</div> <!-- END MAIN CONTENT -->