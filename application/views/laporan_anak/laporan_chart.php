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
            <h1>Data Laporan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Laporan</li>
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
              <h3 class="card-title">List Karyawan</h3>&nbsp;
            </div>
            <!-- /.card-header -->
            <div class="card-body">                         
              <table id="table_laporan" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Karyawan</th>
                  <th>Detail Jabatan</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $n=0;                  
                  foreach ($list as $data) 
                  {
                    $n++;
                    $divisi = $this->session->divisi;
                    if ($divisi)
                    {
                ?>  
                <tr>
                  <td><?php echo $n?></td>
                  <td><?php echo $data->nama_karyawan?></td>
                  <td><?php echo $data->detail_jabatan?></td>
                  <td>
                    <a href="<?php echo base_url().'Laporan/ChartKaryawan/'.$data->id_karyawan?>" class="btn-sm btn-success"><i class="fa fa-chart-bar"></i> Lihat Grafik</a>
                    <!-- <a target="_BLANK" href="<?php echo base_url()?>Laporan/ChartKaryawan" class="btn-sm btn-success"><i class="fa fa-chart-bar"></i> Lihat Grafik</a> -->
                  </td>
                </tr>
                <?php
                    }
                  }
                ?>                    
                </tbody>
              </table>
            </div>
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