<!--footer-->
    <div class="footer">
    </div>
    <!--//footer-->
</div>
<script src="<?= base_url(); ?>assets/js/jquery-1.12.4.min.js"></script>
<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/js/plugins/sweetalert.min.js"></script>
<script type="text/javascript">
	<?php if ($this->session->flashdata('message')) { ?>
        var alert_info = "<?php echo $this->session->flashdata('message'); ?>";
        swal("Oopps!", alert_info , "error");
	<?php } ?>

    <?php if ($this->session->flashdata('message_success')) { ?>
        var alert_info = "<?php echo $this->session->flashdata('message_success'); ?>";
        swal("Success!", alert_info , "success");
    <?php } ?>

    <?php if ($this->session->flashdata('message_failed')) { ?>
        var alert_info = "<?php echo $this->session->flashdata('message_failed'); ?>";
        swal("Oopps!", alert_info , "error");
    <?php } ?>
</script>
</body>
</html>