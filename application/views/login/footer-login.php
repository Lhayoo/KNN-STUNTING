<!-- Jquery -->
<script src="<?= base_url('vendors/jquery/dist/jquery.js') ?>"></script>
<script src="<?= base_url('vendors/jquery/dist/jquery.min.js') ?>"></script>
<!-- Toastr alert -->
<script src="<?= base_url('build/js/toastr.min.js') ?>"></script>

<script type="text/javascript">
    <?php if ($this->session->flashdata('msg-info')) { ?>
        toastr.warning("<?php echo $this->session->flashdata('msg-info'); ?>");

    <?php } ?>
    console.log();
</script>
</body>

</html>