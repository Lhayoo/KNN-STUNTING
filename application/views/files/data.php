
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data File
        <small>Mengelola Data File</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('file');?>">Data</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo anchor('file/create','<i class="fa fa-plus"></i> Tambah Data',array('class'=>'btn btn-sm btn-warning'));?></h3>


          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <?php
                $info = $this->session->flashdata('info');
                if (!empty($info)) {
                    echo $info;
                }
            ?>
              <table id="example2" class="table table-hover">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Nama File</th>
                          <th>Ukuran</th>
                          <th>Status</th>
                          <th>Tipe</th>
                          <th>Di Unduh (x)</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php $no=1; foreach ($query->result() as $row): ?>
                      <tr>
                          <th scope="row"><?php echo $no++; ?></th>
                          <td>
                              <a href="#"><?php echo $row->file_title; ?></a>
                          </td>
                          <td>
                              <?php echo $row->file_size; ?> KB
                          </td>
                          <td>
                              <?php if ($row->file_visibility==1) { ?>
                                  <label class="label label-info">Public</label>
                              <?php }else{ ?>
                                  <label class="label label-danger">Private</label>
                              <?php } ?>
                          </td>
                          <td>
                              <?php echo $row->file_type; ?>
                          </td>
                          <td>
                              <?php echo $row->file_counter; ?>
                          </td>
                          <td>
                              <a href="<?php echo site_url("file/download/". $row->file_id)?>" class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Download</a>
                              <a href="<?php echo site_url("file/edit/". $row->file_id)?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>
                              <a href="<?php echo site_url("file/delete/". $row->file_id)?>" onclick="return confirm('File ini akan di hapus?')" class="btn btn-danger btn-sm"><i class="fa fa-close"></i> Hapus</a>
                          </td>
                      </tr>
                      <?php endforeach; ?>
                  </tbody>
              </table>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
