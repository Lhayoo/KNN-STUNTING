<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Menu & Halaman
        <small>Mengelola Data Menu dan Halaman</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('menu');?>">Data Menu & Halaman</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo anchor('menu/create','<i class="fa fa-plus"></i> Tambah Data',array('class'=>'btn btn-sm btn-warning'));?></h3>

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
                        <th>Nama Menu</th>
                        <th>Link</th>
                        <th>Parent</th>
                        <th width="120px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach ($query->result() as $row): ?>
                    <tr>
                        <th scope="row"><?php echo $no++; ?></th>
                        <td><a href="#"><?php echo $row->menu_title; ?></a></td>
                        <td><a href="#"><?php echo $row->menu_link; ?></a></td>
                        <td>
                            <?php if ($row->is_main_menu == 0) { ?>
                                <label class="label label-success">Menu Utama</label>
                            <?php }else{ ?>
                                <label class="label label-info">Submenu</label>
                            <?php } ?>
                        </td>
                        <td>
                            <a href="<?php echo site_url("menu/edit/". $row->menu_id)?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>
                            <a href="<?php echo site_url("menu/delete/". $row->menu_id)?>" onclick="return confirm('Menu ini akan di hapus?')" class="btn btn-danger btn-sm"><i class="fa fa-close"></i> Hapus</a>
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
