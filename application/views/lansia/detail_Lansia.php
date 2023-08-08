<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Detail Data Lansia</h3>
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
                            <h2><strong>Informasi Dasar</strong></h2>
                        </div>
                        <div class="panel-body"> 
                            <div class="col-lg-4">
                                <h4><strong>Nomor Identitas</strong></h4>
                                <p><?php echo $idLansia; ?></p>
                            </div>
                            <div class="col-lg-4">
                                <h4><strong>Nama Lansia</strong></h4>
                                <p><?php echo $namaLansia; ?></p>
                            </div>
                            <div class="col-lg-4">
                                <h4><strong>Tempat Lahir</strong></h4>
                                <p><?php echo $tempatLahir; ?></p>
                            </div>
                            <div class="col-lg-4">
                                <h4><strong>Tanggal Lahir</strong></h4>
                                <p><?php echo $tanggalLahir; ?></p>
                            </div>
                            <div class="col-lg-3">
                                <h4><strong>Jenis Kelamin </strong></h4>
                                <p><?php echo $jk; ?></p>
                            </div>
                            <div class="col-lg-4">
                                <h4><strong>Umur</strong></h4>
                                <p><?php echo $umur; ?></p>
                            </div>
                            <div class="col-lg-4">
                                <h4><strong>Berat Badan</strong></h4>
                                <p><?php echo $beratAwal; ?></p>
                            </div>
                            <div class="col-lg-4">
                                <h4><strong>Tinggi Badan</strong></h4>
                                <p><?php echo $tinggiAwal; ?></p>
                            </div>
                            <div class="col-lg-4">
                                <h4><strong>Golongan Darah</strong></h4>
                                <p><?php echo $goldar; ?></p>
                            </div>
                            <div class="col-lg-4">
                                <h4><strong>Nomor Telpon</strong></h4>
                                <p><?php echo $telp; ?></p>
                            </div>
                            <div class="col-lg-4">
                                <h4><strong>Nama Pasangan</strong></h4>
                                <p><?php echo $namaPasangan; ?></p>
                            </div>
                            <div class="col-lg-6">
                                <h4><strong>Alamat</strong></h4>
                                <p><?php echo $alamatLansia; ?></p>
                            </div>
                        </div>
                    </div>
                    
                        </div>
                    </div>
                </div>
                <p style="text-align: right;">
                <td>
                <a href="<?php echo base_url()."index.php/Lansia"; ?>" style="text-decoration: none;"><button type="button" class="btn btn-primary">Kembali</button>
                <a href="<?php echo base_url()."index.php/Lansia/edit/".$idLansia; ?>" style="text-decoration: none;"><button type="button" class="btn btn-warning">Edit</button>
                <a href="<?php echo base_url()."index.php/Lansia/delete/".$idLansia; ?>" style="text-decoration: none;"><button type="button" class="btn btn-danger">Hapus</button>
                </td>
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