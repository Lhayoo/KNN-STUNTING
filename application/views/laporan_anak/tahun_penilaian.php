<!DOCTYPE html>
<html>
<?php $this->load->view('include/header')?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php $this->load->view('include/navbar')?>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <?php $this->load->view('include/brand')?>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <?php $this->load->view('include/sidebar_user')?>

      <!-- Sidebar Menu -->
      <?php $this->load->view('include/sidebar_menu')?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Rekap Laporan Penilaian</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Rekap Laporan Penilaian</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Rekap Laporan Penilaian</h3>
            </div>
            <!-- /.card-header -->  
            <form class="form-horizontal" method="POST" action="<?php echo base_url('Laporan/CekLaporan')?>">
              <div class="card-body">
                <div class="form-group row">
                  <label for="tahun_penilaian" class="col-sm-2 col-form-label">Pilih Tahun</label>
                  <div class="col-sm-10">
                    <?php                    
                    $atr = "class='form-control' id='combotahun' required";
                    echo form_dropdown('combotahun',$ctahun,'',$atr);                
                    ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="tahun_penilaian" class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <input type="text" name="keterangan_tahun" id="keterangan_tahun" class="form-control" hidden="" value="<?php echo $keterangan_tahun?>">                    
                    <input type="text" name="mulai_penilaian" id="mulai_penilaian" class="form-control" hidden="" value="<?php echo $mulai_penilaian?>">
                    <input type="text" name="akhir_penilaian" id="akhir_penilaian" class="form-control"hidden="" value="<?php echo $akhir_penilaian?>">
                    <input type="text" name="tanggal_sekarang" id="tanggal_sekarang" class="form-control" hidden="" value="<?php echo date('Y-m-d')?>">  
                    <input type="text" name="status" id="status" class="form-control" hidden="" value="<?php echo $status?>">                    
                  </div>
                </div>
                <button type="submit" class="btn btn-info">Submit</button>
              </div>     
            </form>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view('include/footer')?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php $this->load->view('include/script')?>
</body>
</html>