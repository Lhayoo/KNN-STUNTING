<!-- banner-bottom-wthree -->
<section class="banner-bottom-wthree py-2">
    <div class="container-fluid">
        <h4 class="heading text-center mb-2" style="font-size: 18px;">Status Stunting Polres Pekalongan Kota </h4>


    </div>
</section>

<section class="join py-2">
    <div class="row join_grids">
        <div class="col-lg-12">
            <div id="petawilayahtampil">
                <?php echo form_open('publik/cari_wilayah');?>
                <table class="table table-striped">
                    <tr>
                        <th width="15%">
                            <div class="row">
                                <div class="col-xs-12 col-md-2">
                                    <br><i class="fa fa-filter"></i><u> Peta Wilayah</u>
                                </div>
                                <div class="col-xs-12 col-md-2">
                                    Kecamatan<br>
                                    <select name="kecamatan" id="kecamatan" class="form-control input-sm">
                                        <option value="">--Semua--</option>
                                        <?php
					                    foreach($kecamatan as $row){
					                      echo '<option value="'.$row['id_kecamatan'].'">'.$row['nama_kecamatan'].'</option>';
					                    }
					                  ?>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-md-2">

                                    Kelurahan<br>
                                    <div id="showkelurahan">
                                        <select name="kelurahan" id="kelurahan" class="form-control input-sm">
                                            <option value="">--Semua Kelurahan--</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 col-xs-12">
                                    Status Stunting<br>
                                    <select name="status" id="status" class="form-control input-sm">
                                        <option value="">--Pilih Status--</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-md-2">
                                    Periode<br>
                                    <select name="periode" id="periode" class="form-control input-sm">
                                        <option value="0">--Semua Periode--</option>
                                        <?php
										$dateNow = date('Y');
										$tahun = 2020;
                                        while($tahun <= $dateNow){
                                            echo '<option value="'.$tahun.'">'.$tahun.'</option>';
                                            $tahun++;
                                        }												
										  ?>
                                    </select>
                                    <br>
                                </div>

                                <div class="col-xs-12 col-md-2">
                                    <br>
                                    <button class="btn btn-md btn-danger animated-button victoria-two" type="submit"
                                        name="cari">
                                        <i class="fa fa-search"></i> Tampilkan
                                    </button>
                                </div>
                            </div>
                        </th>
                    </tr>
                </table>
                <?php echo form_close();?>
            </div>
            <style>
            #map {
                height: 600px;
                width: 100%;
            }
            </style>
            <div id="map"></div>
            <script>
            function initMap() {
                var pekl = {
                    lat: -6.8958555,
                    lng: 109.6394838
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
                    zoom: 13,
                    center: pekl,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                }
                peta = new google.maps.Map(document.getElementById("map"), myOptions);



                var dampakrob = new google.maps.KmlLayer({
                    url: 'https://www.akusiap.com/satukelpkl.kml',
                    map: peta
                });

                var dampakrob = new google.maps.KmlLayer({
                    url: 'https://akusiap.com/narkoba.kml',
                    map: peta
                });


            }
            </script>
            <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDz7_MuIHt1J2YapFw63aE1oWP9R-xO8HY&callback=initMap">
            </script>

        </div>

    </div>

</section>