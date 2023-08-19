
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Detail Data Kecamatan
        <small>Form Detail Kecamatan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('kecamatan');?>">Data Kecamatan</a></li>
        <li><a href="#">Detail Data Kecamatan</a></li>
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
          <div class="row">
            <div class="col-md-12">
              <table class="table table-bordered table-striped">
            <tr>
              <td width="10%">Nama Kecamatan</td>
              <td width="45%">
                <?php echo $query->nama_kecamatan;?>
              </td>
            </tr>
            
             


            <tr>
              <td width="10%">Ordinat Lokasi </td>
              <td width="45%">
                 <div class="well">
              <style>
      #map {
        height: 250px;
        width: 100%;
       }
    </style>
              <div id="map"></div>
                <script>
                  function initMap() {
                    var tegal = {lat: <?php echo $query->latitude;?>, lng: <?php echo $query->longitude;?>};
                    /*var map = new google.maps.Map(document.getElementById('map'), {
                      zoom: 12,
                      center: tegal
                    });

                    var marker = new google.maps.Marker({
                      position: tegal,
                      map: map
                    });*/


                      var myOptions = {
                          zoom:16,
                          center: tegal,
                          mapTypeId: google.maps.MapTypeId.ROADMAP
                      }
                      map = new google.maps.Map(document.getElementById("map"), myOptions);
                      // marker refers to a global variable
                      marker = new google.maps.Marker({
                          position: tegal,
                          map: map
                      });

                     

                  }
                </script>
                <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDz7_MuIHt1J2YapFw63aE1oWP9R-xO8HY&callback=initMap">
                </script>

              </div>
                </td>
            </tr>         
                      
          </table>
              
            </div>
            </div>
                     
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer-->
      </div>
      <?php echo form_close();?>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->