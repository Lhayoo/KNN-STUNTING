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
    <?php
      if ($this->session->level == 1) 
      {
    ?>
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">List Karyawan</h3>&nbsp;
              <a target="_BLANK" href="<?php echo base_url()?>Laporan/CetakLaporanTahunan/" class="btn-sm btn-success"><i class="fa fa-eye"></i> Lihat Laporan Tahunan</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">                         
              <table id="table_laporan" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal Penilaian</th>
                  <th>Nama Karyawan</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $n=0;
                  $id_tahun = $this->session->id_tahun;
                  $sql = "SELECT penilaian_header.* , karyawan.*, divisi.*, atasan.* FROM penilaian_header INNER JOIN karyawan ON penilaian_header.id_karyawan = karyawan.id_karyawan INNER JOIN divisi ON karyawan.id_divisi = divisi.id_divisi INNER JOIN atasan ON karyawan.id_atasan = atasan.id_atasan AND penilaian_header.id_tahun = '$id_tahun' ORDER BY penilaian_header.id_karyawan ASC";
                  $list = $this->db->query($sql)->result();
                  foreach ($list as $data)
                  {
                    $n++;
                ?>  
                <tr>
                  <td><?php echo $n?></td>
                  <td><?php echo $data->tanggal_penilaian?></td>
                  <td><?php echo $data->nama_karyawan?></td>
                  <td>
                    <a target="_BLANK" href="<?php echo base_url().'Laporan/Cetak/'.$data->id_penilaian?>" class="btn-sm btn-success"><i class="fa fa-eye"></i> Lihat Laporan</a>
                  </td>
                </tr>
                <?php
                  }
                ?>                    
                </tbody>
                <input type="text" class="form-control" name="keterangan_tahun" id="keterangan_tahun" required="" value="<?php echo $this->session->keterangan_tahun?>" hidden>
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
    <?php
      }
      else
      {
    ?>
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">List Karyawan</h3>&nbsp;
              <a target="_BLANK" href="<?php echo base_url()?>Laporan/CetakLaporanpertahun/" class="btn-sm btn-success"><i class="fa fa-eye"></i> Lihat Laporan Tahunan</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">                         
              <table id="table_laporan" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal Penilaian</th>
                  <th>Nama Karyawan</th>
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
                  <td><?php echo $data->tanggal_penilaian?></td>
                  <td><?php echo $data->nama_karyawan?></td>
                  <td>
                    <a target="_BLANK" href="<?php echo base_url().'Laporan/Cetak/'.$data->id_penilaian?>" class="btn-sm btn-success"><i class="fa fa-eye"></i> Lihat Laporan</a>
                  </td>
                </tr>
                <?php
                    }
                  }
                ?>                    
                </tbody>
                <input type="text" class="form-control" name="keterangan_tahun" id="keterangan_tahun" required="" value="<?php echo $this->session->keterangan_tahun?>" hidden>
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
    <?php
      }    
    ?>
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