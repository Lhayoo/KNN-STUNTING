<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3> Laporan Hasil Penimbangan </h3>
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
                                <p><?php echo $idIbu; ?></p>
                            </div>
                            <div class="col-lg-4">
                                <h4><strong>Nama Ibu Hamil</strong></h4>
                                <p><?php echo $namaBumil; ?></p>
                            </div>
                            <div class="col-lg-4">
                                <h4><strong>Nama Suami</strong></h4>
                                <p><?php echo $namaSuami; ?></p>
                            </div>
                        
                        
                            <div class="col-lg-4">
                                <h4><strong>Tempat Lahir</strong></h4>
                                <p><?php echo $tempatLahir; ?></p>
                            </div>
                            <div class="col-lg-4">
                                <h4><strong>Tanggal Lahir</strong></h4>
                                <p><?php echo $tanggalLahir; ?></p>
                            </div>
                            <div class="col-lg-4">
                                <h4><strong>Umur</strong></h4>
                                <p><?php echo $umur; ?></p>
                            </div>
                        
                            <div class="col-lg-6">
                                <h4><strong>Alamat</strong></h4>
                                <p><?php echo $alamatBumil; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>Informasi Kehamilan</strong>
                        </div>
                        <div class="panel-body">
                            
                                <table style="margin: 20px 0 10px 25px; height: 10%">
                                    <tr style="margin-bottom: 10px;">
                                        <td>Kehamilan Ke </td>
                                        <td> : </td>
                                        <td> <?php echo $kandunganKe; ?></td>
                                    </tr>
                                    <tr style="margin-bottom: 10px;">
                                        <td>Minggu Ke </td>
                                        <td> : </td>
                                        <td> <?php echo $usiaKandungan; ?></td>
                                    </tr>
                                    <tr style="margin-bottom: 10px;">
                                        <td>Hari Pertama Haid Terakhir (HPHT) </td>
                                        <td> : </td>
                                        <td> <?php echo $hpht; ?></td>
                                    </tr>
                                    <tr style="margin-bottom: 10px;">
                                        <td>Hari Perkiraan Persalinan </td>
                                        <td> : </td>
                                        <td> <?php echo $perkiraanLahir; ?></td>
                                    </tr>
                                </table>
                            
                            <div class="col-lg-10">
                                <div class="col-lg-4">
                                    <h4><strong>Tinggi Badan : </strong></h4>
                                    <br>
                                    <p><?php echo $tinggiIbu; ?> cm</p>
                                </div>
                                <div class="col-lg-4">
                                    <h4><strong>Berat badan  : (Awal Kehamilan)</strong></h4>
                                    <p><?php echo $beratAwal; ?> kg</p>
                                </div>
                                <div class="col-lg-4">
                                    <h4><strong>Berat badan : (terakhir)</strong></h4>
                                    <p><?php echo $beratUpdate; ?> kg</p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h4><strong>Kondisi Kehamilan : </strong></h4>
                                <p><?php echo $status; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
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