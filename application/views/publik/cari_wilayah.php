<script type="text/javascript">
function tampil(id) {
    $(document).ready(function() {
        $('#detailMap').modal('show');

        $.ajax({
            url: '<?php echo site_url('publik/detail_narkoba_wilayah/');?>',
            data: 'id=' + id,
            type: 'POST',
            beforeSend: function() {
                $('#showdetaildata').html(
                    '<center><img src="<?php echo base_url("assets/loading-biru.gif");?>" width="100"></center>'
                );
            },
            success: function(result) {
                $('#showdetaildata').html(result);
            }
        })
    });
}
</script>

<!-- banner-bottom-wthree -->
<section class="banner-bottom-wthree py-5">
    <div class="container-fluid">
        <h4 class="heading text-center" style="font-size: 38px;">Peta Geografis Sebaran</h4>
        <h4 class="heading text-center mb-5" style="font-size: 28px;">Sebaran Kasus Narkoba Polres Pekalongan Kota </h4>
        <div class="inner-sec-w3ls">

            <div class="container">
                <div class="alert alert-info">
                    <center><i>
                            <h4>Hasil Pencarian : Ditemukan sebanyak <?php echo number_format($jumlah);?> data.</h4>
                        </i></center>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="join py-5">
    <br>
    <div class="row join_grids">
        <div class="col-lg-12">
            <?php echo $this->session->flashdata('pesan');?>

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
					                    foreach($list_kecamatan as $row){
					                      echo '<option value="'.$row['id_kecamatan'].'">'.$row['nama_kecamatan'].'</option>';
					                    }
					                  ?>
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
                                    Status stunting<br>
                                    <select name="status" id="status" class="form-control input-sm">
                                        <option value="">--Pilih Status Stuting--</option>
                                        <option value="1">Stunting</option>
                                        <option value="0">Tidak Stunting</option>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-md-2">
                                    Tahun<br>
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
                <table>
                    <thead>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Staus 1</th>
                        <th>Staus 2</th>
                        <th>Staus 3</th>
                        <th>Staus 4</th>

                    </thead>
                    <tbody>
                        <?php
                            foreach($get_data as $data):
                                $status1=0;
                                $status2=0;
                                $status3=0;
                                $status4=0;
                                foreach($fetchAll as $rows){
                                    if($data->kel_id == $rows->kel_id){   
                                        if($kelurahan != ''){
                                            if($rows->kel_id == $kelurahan){
                                                if($rows->status == 1){
                                                    $status1++;
                                                }else if($rows->status == 2){
                                                    $status2++;
                                                }else if($rows->status == 3){
                                                    $status3++;
                                                }else if($rows->status == 4){
                                                    $status4++;
                                                }
                                            }
                                        }elseif($kecamatan != ''){
                                            if($rows->id_kecamatan == $kecamatan){
                                                foreach($list_kelurahan as $kel){
                                                    if($rows->id_kecamatan == $kel['id_kecamatan']){
                                                        if($rows->kel_id == $kel['id_kelurahan']){
                                                            if($rows->status == 1){
                                                                $status1++;
                                                            }else if($rows->status == 2){
                                                                $status2++;
                                                            }else if($rows->status == 3){
                                                                $status3++;
                                                            }else if($rows->status == 4){
                                                                $status4++;
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }else{
                                            foreach($list_kelurahan as $kel){
                                                if($rows->id_kecamatan == $kel['id_kecamatan']){
                                                    if($rows->kel_id == $kel['id_kelurahan']){
                                                        if($rows->status == 1){
                                                            $status1++;
                                                        }else if($rows->status == 2){
                                                            $status2++;
                                                        }else if($rows->status == 3){
                                                            $status3++;
                                                        }else if($rows->status == 4){
                                                            $status4++;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                        ?>
                        <tr>
                            <td><?php echo $data->nama_kecamatan;?></td>
                            <td><?php echo $data->nama_kelurahan;?></td>
                            <td><?php echo $status1;?></td>
                            <td><?php echo $status2;?></td>
                            <td><?php echo $status3;?></td>
                            <td><?php echo $status4;?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
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
                    zoom: 10,
                    center: pekl,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                }

                map = new google.maps.Map(document.getElementById("map"), myOptions);



                var dampakrob = new google.maps.KmlLayer({
                    url: 'https://www.akusiap.com/satukelpkl.kml',
                    map: map
                });

                var dampakrob = new google.maps.KmlLayer({
                    url: 'https://akusiap.com/narkoba.kml',
                    map: map
                });

                function addMarker(latitude, longitude, status, nama_kelurahan, nama_kecamatan, id, namaBayi) {
                    var contentString = `

                        <div style="width:300px;">
                        <table width="100%"  border="0">
                        <td width="30%">
                        <img src="<?php echo base_url();?>uploads/gambar_narkoba/" style="width:75px;" align="left" class="img-responsive img-thumbnail img-rounded">
                        </td>
                        <td width="60%">
                        <h4>` + nama_kelurahan + `</h4>
                        <br><b>Jumlah : '` + nama_kelurahan + `' | Status : '` + status + `'</b><br><br>
                         <button onclick="tampil('` + id +
                        `');" class="btn btn-info btn-sm"><i class="fa fa-search"></i> Detail</button>&nbsp;<a href="http://www.google.com/maps/place/'` +
                        latitude + `','` + longitude + `'" class="btn btn-warning btn-sm" target="_blank"><i class="fa fa-map"></i> Ke Lokasi</button>
                         </td></table></div>
                           `;

                    var infowindow = new google.maps.InfoWindow({
                        content: contentString
                    });

                    var image = '<?php echo base_url();?>uploads/icon_jenis_narkoba/icon-steril.png';

                    var beachMarker = new google.maps.Marker({
                        position: {
                            lat: latitude,
                            lng: longitude
                        },
                        map: map,
                        icon: image
                    });


                    beachMarker.addListener('click', function() {
                        infowindow.open(map, beachMarker);
                        // alert(lat+'|'+lng+'|'+id_kecamatan+'|'+icon+'|'+glok+'|'+jml+'|'+jnarkoba+'|'+id_kelurahan+'|'+nama_narkoba+'|'+periode+'|'+kode_narkoba);
                    });
                }
                <?php
                foreach($get_data as $gd):
                ?>
                addMarker(
                    <?php echo $gd->latitude;?>,
                    <?php echo $gd->longitude;?>,
                    `<?php echo $gd->status;?>`,
                    `<?php echo $gd->nama_kelurahan;?>`,
                    `<?php echo $gd->id;?>`,
                    `<?php echo $gd->namaBayi;?>`
                );
                <?php endforeach;?>



            }
            </script>
            <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDz7_MuIHt1J2YapFw63aE1oWP9R-xO8HY&callback=initMap">
            </script>

        </div>

    </div>

</section>

<!-- modal cari-->
<div class="modal fade" id="detailMap" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="text-center mb-4"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="login px-4 mx-auto mw-100">

                    <div id="showdetaildata"></div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- end of modal-->