</div>
<!-- /page content -->

<!-- footer content -->
<footer>
    <div class="pull-right">
        <span>Copyright &copy; Kecamatan Kesesi <?= date('Y'); ?></span>
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>

<!-- jQuery -->
<script src="<?= base_url('vendors/jquery/dist/jquery.min.js') ?>"></script>
<!-- Bootstrap -->
<script src="<?= base_url('vendors/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?= base_url('vendors/fastclick/lib/fastclick.js') ?>"></script>
<!-- NProgress -->
<script src="<?= base_url('vendors/nprogress/nprogress.js') ?>"></script>
<!-- bootstrap-progressbar -->
<script src="<?= base_url('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') ?>"></script>
<!-- iCheck -->
<script src="<?= base_url('vendors/iCheck/icheck.min.js') ?>"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?= base_url('vendors/moment/min/moment.min.js') ?>"></script>
<script src="<?= base_url('vendors/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
<!-- bootstrap-wysiwyg -->
<script src="<?= base_url('vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js') ?>"></script>
<script src="<?= base_url('vendors/jquery.hotkeys/jquery.hotkeys.js') ?>"></script>
<script src="<?= base_url('vendors/google-code-prettify/src/prettify.js') ?>"></script>
<!-- jQuery Tags Input -->
<script src="<?= base_url('vendors/jquery.tagsinput/src/jquery.tagsinput.js') ?>"></script>
<!-- Switchery -->
<script src="<?= base_url('vendors/switchery/dist/switchery.min.js') ?>"></script>
<!-- Select2 -->
<script src="<?= base_url('vendors/select2/dist/js/select2.full.min.js') ?>"></script>
<!-- Parsley -->
<script src="<?= base_url('vendors/parsleyjs/dist/parsley.min.js') ?>"></script>
<script src="<?= base_url('vendors/parsleyjs/dist/i18n/id.js') ?>"></script>
<!-- Autosize -->
<script src="<?= base_url('vendors/autosize/dist/autosize.min.js') ?>"></script>
<!-- jQuery autocomplete -->
<script src="<?= base_url('vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js') ?>"></script>
<!-- starrr -->
<script src="<?= base_url('vendors/starrr/dist/starrr.js') ?>"></script>
<!-- Custom Theme Scripts -->
<script src="<?= base_url('build/js/custom.min.js') ?>"></script>
<!-- Toastr alert -->
<script src="<?= base_url('build/js/toastr.min.js') ?>"></script>
<!-- Sweet Alert 2 -->
<script src="<?= base_url('/build/js/dist/sweetalert2.all.min.js'); ?>"></script>
<script src="<?= base_url('/build/js/dist/myscript.js'); ?>"></script>

<script type="text/javascript">
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        // alert(fileName);
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    <?php if ($this->session->flashdata('success')) { ?>
        toastr.success("<?php echo $this->session->flashdata('success'); ?>");
    <?php } else if ($this->session->flashdata('psn')) {  ?>
        toastr.error("<?php echo $this->session->flashdata('psn'); ?>");
    <?php } else if ($this->session->flashdata('warning')) {  ?>
        toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
    <?php } else if ($this->session->flashdata('info')) {  ?>
        toastr.info("<?php echo $this->session->flashdata('info'); ?>");
    <?php } ?>
</script>

</body>

</html>
<!-- <script type="application/javascript">
    var psn = '<?php echo $this->session->flashdata('psn'); ?>';

    $('#btnProsesS').click(function() {
        $.ajax({
            type: "POST",
            url: "<?= base_url('user/profile'); ?>",
            async: true,
            data: {
                psn: psn
            },
            success: function(data) {
                if (data) {
                    $('#check-reservations').show(function() {
                        if (psn) {
                            new PNotify({
                                title: 'Hmm no new Reservations..',
                                text: psn,
                                type: 'custom',
                                addclass: 'notification-primary',
                                icon: 'fa fa-info-circle '
                            });
                        }
                    });
                }
            }
        });
    });
</script> -->