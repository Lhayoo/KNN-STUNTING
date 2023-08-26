<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Detail Data Balita</h3>
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
                                    <h4><strong>ID Bayi</strong></h4>
                                    <p><?php echo $idBalita; ?></p>
                                </div>
                                <div class="col-lg-6">
                                    <h4><strong>Nama Bayi</strong></h4>
                                    <p><?php echo $namaBayi; ?></p>
                                </div>
                                <div class="col-lg-3">
                                    <h4><strong>Tempat Lahir</strong></h4>
                                    <p><?php echo $tempatLahir; ?></p>
                                </div>
                                <div class="col-lg-3">
                                    <h4><strong>Tanggal Lahir</strong></h4>
                                    <p><?php echo $tanggalLahir; ?></p>
                                </div>
                                <div class="col-lg-3">
                                    <h4><strong>Jenis Kelamin </strong></h4>
                                    <p><?php echo $jenisKelamin; ?></p>
                                </div>
                                <div class="col-lg-6">
                                    <h4><strong>Nama Ibu</strong></h4>
                                    <p><?php echo $namaIbu; ?></p>
                                </div>
                                <div class="col-lg-6">
                                    <h4><strong>Nama Ayah</strong></h4>
                                    <p><?php echo $namaAyah; ?></p>
                                </div>
                                <div class="col-lg-6">
                                    <h4><strong>Alamat</strong></h4>
                                    <p><?php echo $alamat; ?></p>
                                </div>
                                <div class="col-lg-6">
                                    <h4><strong>Kel</strong></h4>
                                    <p><?php echo $kel_nama; ?></p>
                                </div>

                                <!-- <div class="col-lg-12 mb-2">
                                    <style>
                                    #map {
                                        height: 250px;
                                        width: 100%;
                                    }
                                    </style>
                                    <div class="col-lg-12">

                                        <div id="map"></div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <p style="text-align: right;">
                        <a href="<?php echo base_url()."index.php/Balita"; ?>" style="text-decoration: none;"><button
                                type="button" class="btn btn-primary">Kembali</button>
                            <a href="<?php echo base_url()."index.php/Balita/edit/".$idBalita; ?>"
                                style="text-decoration: none;"><button type="button"
                                    class="btn btn-warning">Edit</button>
                                <a href="<?php echo base_url()."index.php/Balita/delete/".$idBalita; ?>"
                                    style="text-decoration: none;"><button type="button"
                                        class="btn btn-danger">Hapus</button>
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
function initMap() {
    var pekl = {
        lat: <?= ($lat != '') ? $lat : '-6.888701' ;?>,
        lng: <?= ($long !='') ?  $long : '109.668289' ;?>
    };
    /*var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 12,
      center: pekl
    });

    var marker = new google.maps.Marker({
      position: pekl,
      map: map
    });*/


    var myOptions = {
        zoom: 16,
        center: pekl,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById("map"), myOptions);

    marker = new google.maps.Marker({
        <?= ($lat !="")?'position: pekl,': '' ;?>
        map: map
    });



}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDz7_MuIHt1J2YapFw63aE1oWP9R-xO8HY&callback=initMap">
</script>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="../vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>