<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Detail Data kecamatan</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel-heading">
                                <strong>Informasi keluarahn</strong>
                            </div>
                            <div class="panel-body">
                                <div class="col-lg">
                                    <h4><strong>Nama Kecamatan</strong></h4>
                                    <p><?php echo $query->nama_kecamatan; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg">
                            <style>
                            #map {
                                height: 250px;
                                width: 100%;
                            }
                            </style>
                            <div id="map"></div>

                        </div>
                    </div>
                    <p style="text-align: right;" class="mt-2">
                        <a href="<?php echo base_url()."index.php/kecamatan"; ?>" style="text-decoration: none;"><button
                                type="button" class="btn btn-primary">Kembali</button>
                            <a href="<?php echo base_url()."index.php/kecamatan/edit/".$query->id_kecamatan; ?>"
                                style="text-decoration: none;"><button type="button"
                                    class="btn btn-warning">Edit</button>
                                <a href="<?php echo base_url()."index.php/kecamatan/delete/".$query->id_kecamatan; ?>"
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
        lat: <?php echo $query->latitude;?>,
        lng: <?php echo $query->longitude;?>
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



}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDz7_MuIHt1J2YapFw63aE1oWP9R-xO8HY&callback=initMap">
</script>