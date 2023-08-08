<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Detail Penimbangan Data Balita</h3>
        </div>
    </div>
    <div class="flash-dataq" data-flashdata="<?php echo $this->session->flashdata('msg'); ?>"></div>
    <?php if ($this->session->flashdata('msg')) : ?>

    <?php endif; ?>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                        <div class="panel-heading">
                            <strong>Informasi Pribadi</strong>
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-6">
                                <h4><strong>ID Penimbangan</strong></h4>
                                <p><?php echo $idpBalita; ?></p>
                            </div>
                            <div class="col-lg-6">
                                <h4><strong>Nama Bayi</strong></h4>
                                <p><?php echo $namaBayi; ?></p>
                            </div>
                            <div class="col-lg-3">
                                <h4><strong>Tanggal Lahir</strong></h4>
                                <p><?php echo $tanggalLahir; ?></p>
                            </div>
                            <div class="col-lg-3">
                                <h4><strong>Jenis Kelamin </strong></h4>
                                <p><?php echo $jenisKelamin; ?></p>
                            </div>
                           
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>Informasi Kesehatan</strong>
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-6">
                                <h4><strong>Tanggal Penimbangan </strong></h4>
                                <p><?php echo $tgl_skrng; ?></p>
                            </div>
                            <div class="col-lg-3">
                                <h4><strong>Panjang Lahir </strong></h4>
                                <p><?php echo $panjangLahir; ?> cm</p>
                            </div>
                            <div class="col-lg-3">
                                <h4><strong>Berat Lahir </strong></h4>
                                <p><?php echo $beratLahir; ?> kg</p>
                            </div>
                            <div class="col-lg-6">
                                <h4><strong>Panjang Sekarang </strong></h4>
                                <p><?php echo $panjangSekarang; ?> cm</p>
                            </div>
                            <div class="col-lg-6">
                                <h4><strong>Berat Sekarang </strong></h4>
                                <p><?php echo $beratSekarang; ?> kg</p>
                            </div>
                        </div>
                    </div>
                </div>
                <p style="text-align: right;">
                    <a href="<?php echo base_url()."index.php/Penimbangan_Balita"; ?>" style="text-decoration: none;"><button type="button" class="btn btn-primary">Kembali</button>
                   
                </p>
            </div>
        </div>
    </div>
</div>

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="../vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>