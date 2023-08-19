
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Data Kecamatan
        <small>Form Tambah Data Kecamatan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('kecamatan');?>">Data Kecamatan</a></li>
        <li><a href="#">Tambah Data Kecamatan</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">
          <?php echo anchor('kecamatan','Kembali',array('class'=>'btn btn-sm btn-danger'));?></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <?php echo form_open_multipart('kecamatan/tambah');?>
          <?php echo $this->session->flashdata('pesan');?>
          <div class="well well-sm">Kolom dengan tanda <span class="text-danger text-bold">*)</span> wajib diisi.</div>
          <div class="row">
            <div class="col-md-12">
              <table class="table table-bordered table-striped">
            <tr>
              <td width="10%">Nama Kecamatan<span class="text-danger text-bold">*)</span></td>
              <td width="45%">
                <?php echo form_input(array(
                  'name'=>'nama',
                  'class'=>'form-control input-sm',
                  'autofocus'=>'autofocus',
                  'required'=>'required'
                ));?>
              </td>
            </tr>
            
            

            <tr>
              <td width="10%">Ordinat Lokasi<span class="text-danger text-bold">*)</span></td>
              <td width="45%">
                  <div class="col-md-6">
                    <span class="label label-danger">Latitude</span>
                    <?php echo form_input(array(
                    'name'=>'lat',
                    'id'=>'lat',
                    'class'=>'form-control input-sm',
                    'required'=>'required'
                  ));?>
                </div>

                <div class="col-md-6">
                    <span class="label label-danger">Longitude</span>
                    <?php echo form_input(array(
                    'name'=>'lon',
                    'id'=>'lon',
                    'class'=>'form-control input-sm',
                    'required'=>'required'
                  ));?>
                </div>
                </td>
            </tr>

            <tr>
              <th colspan="3">
                <div class="well">
              <style>
      #map {
        height: 400px;
        width: 100%;
       }
    </style>
              <div id="map"></div>
                <script>
                  function initMap() {
                    var pekl = {lat: -6.8958555, lng: 109.6394838};
                    /*var map = new google.maps.Map(document.getElementById('map'), {
                      zoom: 12,
                      center: pekl
                    });

                    var marker = new google.maps.Marker({
                      position: pekl,
                      map: map
                    });*/


                      var myOptions = {
                          zoom:15,
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
                          // get lat/lon of click
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

              </div>
              </th>
            </tr>
           
                      
          </table>
            </div>
           
          </div>  

        
  
          
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-success btn-sm" type="submit">Simpan Data</button>
        </div>
        <!-- /.box-footer-->
      </div>
      <?php echo form_close();?>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->