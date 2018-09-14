<div class="center-container">
    <!--header-->
    <div class="header-w3l">
        <h1> SYSTEM INFORMASI SLIP GAJI</h1>
    </div>
    <!--//header-->
    <div class="main-content-agile">
        <div class="sub-main-w3">   
            <div class="wthree-pro">
                <h2>Please login here</h2>
            </div>
            <form action="<?php echo site_url('login');?>" method="POST" id="login-form">
                <div class="pom-agile">
                    <input placeholder="NIK" name="nik" class="user" type="text" required>
                    <span class="icon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                </div>
                <div class="pom-agile">
                    <input  placeholder="Password" name="password" class="pass" type="password" required>
                    <span class="icon2"><i class="fa fa-unlock" aria-hidden="true"></i></span>
                </div>
                <div class="sub-w3l">
                    <h6><a href="<?= site_url('forgot-password'); ?>" target="_blank">Forgot Password?</a></h6>
                    <div class="right-w3l">
                        <button type="submit" value="Login">Sign in</button>&nbsp;
                    </div>
                    <br/>
                    <!-- <p style="color: white;">OR
                        <a href="<?php //echo site_url('user/user-registration'); ?>" class="btn">&nbsp;&nbsp;Register</a>
                    </p> -->
                </div>
            </form>
            <br/>
            <div class="col-lg-12" style="color:white;">
                <p>&copy; <?php echo date('Y') ?> Development AKS. All rights reserved || Design by <a href="http://it-underground.web.id" target="_blank">IT DEVELOPMENT AKS</a></p>
            </div>
        </div>
    </div>
    <!--//main-->