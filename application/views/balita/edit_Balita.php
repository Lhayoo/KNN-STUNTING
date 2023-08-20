<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Edit Data Balita</h3>
        </div>
    </div>
    <div class="flash-dataq" data-flashdata="<?php echo $this->session->flashdata('msg'); ?>"></div>
    <?php if ($this->session->flashdata('msg')) : ?>

    <?php endif; ?>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form method="POST" action="<?php echo base_url() . "Balita/doUpdate/" ?>">
                                <div class="col-lg-6">
                                    <h2>Informasi Pribadi</h2>
                                    <hr>
                                    <div class="form-group">
                                        <label>ID Balita</label>
                                        <input class="form-control" type="hidden" name="id" value="<?php echo $id; ?>">
                                        <input class="form-control" title="Nomor Daftar Bayi" type="text"
                                            name="idBalita" value="<?php echo $idBalita; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Balita</label>
                                        <input class="form-control" title="Nama Bayi" type="text" name="namaBayi"
                                            value="<?php echo $namaBayi; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="jenisKelamin">Jenis Kelamin</label><br>
                                        <label class="radio-inline"><input type="radio" name="jenisKelamin"
                                                value="Laki-Laki" /> Laki-Laki</label>&nbsp;&nbsp;
                                        <label class="radio-inline"><input type="radio" name="jenisKelamin"
                                                value="Perempuan" /> Perempuan</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input class="form-control" type="text" title="Tempat Lahir"
                                                name="tempatLahir" value="<?php echo $tempatLahir; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input class="form-control" type="date" title="Tanggal Lahir"
                                                name="tanggalLahir" value="<?php echo $tanggalLahir; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Telpon Ibu</label>
                                        <input class="form-control" type="number" name="telp_ibu" title="telp"
                                            value="<?php echo $telp_ibu; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Ibu</label>
                                        <input class="form-control" title="Nama Ibu Bayi" type="text" name="namaIbu"
                                            value="<?php echo $namaIbu; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Ayah</label>
                                        <input class="form-control" type="text" title="Nama Ayah Ibu" name="namaAyah"
                                            value="<?php echo $namaAyah; ?>">
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" rows="4" title="Alamat"
                                                name="alamat"><?php echo $alamat; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>latitude</label>
                                                    <input type="text" class="form-control" rows="4" name="lat" id="lat"
                                                        title="lat" required value="<?= $lat ;?>">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>longitude</label>
                                                    <input type="text" class="form-control" rows="4" name="lon" id="lon"
                                                        title="lon" required value="<?= $long ;?>">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <style>
                                    #map {
                                        height: 250px;
                                        width: 100%;
                                    }
                                    </style>
                                    <div class="col-lg-12">

                                        <div id="map"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <h2>Informasi Kesehatan</h2>
                                    <hr>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label>Golongan Darah</label>
                                            <input class="form-control" title="goldar" type="text" name="goldar"
                                                placeholder="" value="<?php echo $goldar; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>Umur Balita</label>
                                        <input class="form-control" title="umur Balita" type="text" name="umur"
                                            placeholder="dalam bulan" value="<?php echo $umur; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>Panjang Lahir</label>
                                        <input class="form-control" title="Panjang Lahir Balita" type="number"
                                            step="0.01" name="panjangLahir" placeholder="dalam cm"
                                            value="<?php echo $panjangLahir; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>Berat Lahir</label>
                                        <input class="form-control" title="Berat Lahir Balita" type="number" step="0.01"
                                            name="beratLahir" placeholder="dalam cm" value="<?php echo $beratLahir; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>Lingkar Kepala</label>
                                        <input class="form-control" title="lingkar kepala" type="number" step="0.01"
                                            name="lingkar_kepala" placeholder="dalam cm"
                                            value="<?php echo $lingkar_kepala; ?>">
                                    </div>
                                </div>
                                <br>

                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn btn-info" style="width: 25%">Perbarui Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function initMap() {
    var pekl = {
        lat: <?php echo $lat;?>,
        lng: <?php echo $long;?>
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
    // marker refers to a global variable
    marker = new google.maps.Marker({
        position: pekl,
        map: map
    });

    google.maps.event.addListener(map, "click", function(event) {
        // cahnge the position of the marker
        marker.setPosition(event.latLng);
        var clickLat = event.latLng.lat();
        var clickLon = event.latLng.lng();

        // show in input box
        document.getElementById("lat").value = clickLat.toFixed(5);
        document.getElementById("lon").value = clickLon.toFixed(5);


    });


}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDz7_MuIHt1J2YapFw63aE1oWP9R-xO8HY&callback=initMap">
</script>