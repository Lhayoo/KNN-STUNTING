<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Galeri Video
        <small>Mengelola Data Galeri Video</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('video');?>">Galeri Video</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo anchor('video/create','<i class="fa fa-plus"></i> Tambah Data',array('class'=>'btn btn-sm btn-warning'));?></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        <?php echo $this->session->flashdata('pesan');?>
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
                        <th>Judul</th>
                        <th>Video</th>
                        <th width="100px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach ($query->result() as $row): ?>
                    <tr>
                        <th scope="row"><?php echo $no++; ?></th>
                        <td><a href="<?php echo site_url("video/delete/". $row->post_id)?>"><?php echo $row->post_title; ?></a></td>
                        <td><iframe width="230" height="115" src="<?php echo $row->post_content; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td>
                        <td>
                            <a href="<?php echo site_url("video/edit/". $row->post_id)?>" class="btn btn-success btn-sm"><i class="icofont icofont-ui-edit"></i> Edit</a>
                            <a href="<?php echo site_url("video/delete/". $row->post_id)?>" onclick="return confirm('Video ini akan di hapus?')" class="btn btn-danger btn-sm"><i class="icofont icofont-ui-delete"></i> Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        </div>
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
