<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Tambah Data Kelurahan</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form method="POST" action="<?php echo base_url() . "index.php/Kelurahan/simpan_ubah/" ?>">
                                <div class="col-lg">
                                    <h2>Data kelurahan</h2>
                                    <hr>
                                    <input type="hidden" value="<?= $query->id_kelurahan ;?>" name="id">
                                    <div class="form-group">
                                        <label>Nama kelurahan</label>
                                        <input type="text" class="form-control" name="nama" placeholder="Nama kelurahan"
                                            required value="<?= $query->nama_kelurahan ;?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Kecamatan</label>
                                        <select name="kecamatan" id="kecamatan" class="form-control input-sm">
                                            <option value="<?= $query->id_kecamatan ;?>"><?= $query->nama_kecamatan ;?>
                                            </option>
                                            <?php foreach ($kecamatan as $row) : ?>
                                            <?php
                                                if ($row->id_kecamatan == $query->id_kecamatan) {
                                                    continue;
                                                }
                                              ?>
                                            <option value="<?php echo $row->id_kecamatan; ?>">
                                                <?php echo $row->nama_kecamatan; ?></option>
                                            <?php endforeach; ?>
                                        </select>

                                    </div>



                                    <div class="row">
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label>Latitude</label>
                                                <input type="text" class="form-control" name="lat"
                                                    placeholder="Latitude" id="lat" required
                                                    value="<?= $query->latitude ;?>">
                                            </div>
                                        </div>
                                        <div class="col-5">

                                            <div class="form-group">
                                                <label>Longitude</label>
                                                <input type="text" class="form-control" name="lon"
                                                    placeholder="Longitude" id="lon" required
                                                    value="<?= $query->longitude ;?>">
                                            </div>
                                        </div>

                                    </div>
                                    <style>
                                    #map {
                                        height: 400px;
                                        width: 100%;
                                    }
                                    </style>
                                    <div id="map"></div>
                                </div>
                        </div>
                        <div class="col-lg-12 text-center mt-2">
                            <a href="<?= base_url('Kelurahan') ;?>" class="btn btn-secondary text-white"
                                style="width: 25%">Back</a>
                            <button type="submit" class="btn btn-info" style="width: 25%">Simpan Data</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div id="map"></div>
<script>
function initMap() {
    var pekl = {
        lat: <?= ($query->latitude != '') ? $query->latitude : '-6.888701' ;?>,
        lng: <?= ($query->longitude !='') ?  $query->longitude : '109.668289' ;?>
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

        <?= ($query->latitude !="")?'position: pekl,': '' ;?>
        map: map
    });

    google.maps.event.addListener(map, "click", function(event) {
        // get lat/lon of click
        marker.setPosition(event.latLng);

        var clickLat = event.latLng.lat();
        var clickLon = event.latLng.lng();

        // show in input box
        document.getElementById("lat").value = clickLat.toFixed(5);
        document.getElementById("lon").value = clickLon.toFixed(5);


    });

}
</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDz7_MuIHt1J2YapFw63aE1oWP9R-xO8HY&callback=initMap">
</script>

</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDz7_MuIHt1J2YapFw63aE1oWP9R-xO8HY&callback=initMap">
</script>
<script type="text/javascript">
function hanyaHuruf(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 32 && (charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && charCode > 39)
        return false;
    return true;
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<!-- /.content-wrapper -->