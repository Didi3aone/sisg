<div class="center-container">
    <!--header-->
    <div class="header-w3l">
        <h1> SYSTEM INFORMASI SLIP GAJI</h1>
    </div>
    <!--//header-->
    <div class="main-content-agile">
        <div class="sub-main-w3">   
            <div class="wthree-pro">
                <h2>Enter your email</h2>
            </div>
            <form action="<?php echo site_url('forgot-password');?>" id="forgotpass-form" method="POST">
                <div class="pom-agile">
                    <input placeholder="email" name="email" class="user" type="email" required>
                    <span class="icon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                </div>
                <div class="sub-w3l">
                    <div class="right-w3l">
                        <button type="submit" value="Login">Send</button>&nbsp;
                    </div>
                    <br/>
                    <p style="color: white;">OR
                        <a href="<?php echo site_url('login'); ?>" class="btn btn-remember-back ">&nbsp;&nbsp;I remember my password</a>
                    </p>
                </div>
            </form><br/>
            <div class="col-lg-12" style="color:white;">
                <p>&copy; <?php echo date('Y') ?> Development AKS. All rights reserved || Design by <a href="http://it-underground.web.id" target="_blank">IT UNDERGROUND</a></p>
            </div>
        </div>
    </div>
    <!--//main-->
    <script type="text/javascript" src="<?= base_url('assets/js/jquery-1.12.4.min.js'); ?>"></script>