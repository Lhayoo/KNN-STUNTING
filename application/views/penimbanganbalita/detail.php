<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Detail Data Bumil</h3>
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
                                <p><?php echo $getDetailBalita['idpBalita'] ?></p>
                            </div>
                            <div class="col-lg-4">
                                <h4><strong>Nama Balita</strong></h4>
                                <p><?php echo $getDetailBalita['namaBayi']; ?></p>
                            </div>
                           
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>Informasi Balita</strong>
                        </div>
                        <div class="panel-body">
                            
                                <table style="margin: 20px 0 10px 25px; height: 10%">
                                    <tr style="margin-bottom: 10px;">
                                        <td>Tempat lahir </td>
                                        <td> : </td>
                                        <td> <?php echo $getDetailBalita['tempatLahir']; ?></td>
                                    </tr>
                                    <tr style="margin-bottom: 10px;">
                                        <td>tanggal Lahir </td>
                                        <td> : </td>
                                        <td> <?php echo $getDetailBalita['tanggalLahir']; ?></td>
                                    </tr>
                                    <tr style="margin-bottom: 10px;">
                                        <td>Jenis Kelamin </td>
                                        <td> : </td>
                                        <td> <?php echo $getDetailBalita['jenisKelamin']; ?></td>
                                    </tr>
                                    <tr style="margin-bottom: 10px;">
                                        <td>nama Ibu</td>
                                        <td> : </td>
                                        <td> <?php echo $getDetailBalita['namaIbu']; ?></td>
                                    </tr>
                                    <tr style="margin-bottom: 10px;">
                                        <td>nama Ayah</td>
                                        <td> : </td>
                                        <td> <?php echo $getDetailBalita['namaAyah']; ?></td>
                                    </tr>
                                </table>
                            
                            <div class="col-lg-10">
                                <div class="col-lg-4">
                                    <h4><strong>Tanggal Timbang : </strong></h4>
                                    <br>
                                    <p><?php echo $getDetailBalita['tgl_skrng']; ?> cm</p>
                                </div>
                                <div class="col-lg-4">
                                    <h4><strong>Berat Lahir :</strong></h4>
                                    <p><?php echo $getDetailBalita['beratLahir']; ?> kg</p>
                                </div>
                                <div class="col-lg-4">
                                    <h4><strong>Panjang : (terakhir)</strong></h4>
                                    <p><?php echo $getDetailBalita['panjangLahir']; ?> kg</p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h4><strong>Status Gizi : </strong></h4>
                                <p><?php echo $status; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <p style="text-align: right;">
                    <a href="<?php echo base_url()."Penimbangan_Balita"; ?>"><button type="button" class="btn btn-primary">Kembali</button>
                   
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