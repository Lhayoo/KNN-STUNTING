
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ubah Data File
        <small>Form Ubah Data File</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('file');?>">Data File</a></li>
        <li><a href="#">Ubah Data File</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">
          <?php echo anchor('file','Kembali',array('class'=>'btn btn-sm btn-danger'));?></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <form method="POST" action="<?php echo site_url('file/edit'); ?>" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?php echo $row['file_id'];?>"">
              <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama File</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" name="file_title" value="<?php echo $row['file_title'];?>">
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Deskripsi</label>
                  <div class="col-sm-10">
                      <textarea name="file_desc" class="form-control" rows="5"><?php echo $row['file_desc'];?></textarea>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Update File</label>
                  <div class="col-sm-10">
                      <input type="file" name="userfile" class="form-control">
                      <p>File saat ini : <?php echo $row['file_name'];?></p>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-10">
                      <div class="form-check-inline">
      				  <label class="form-check-label">
      				    <input type="radio" class="form-check-input" name="status" value="1" <?php echo ($row['file_visibility']==1)?'checked':'' ?>> Public
      				  </label>
      				</div>
      				<div class="form-check-inline">
      				  <label class="form-check-label">
      				    <input type="radio" class="form-check-input" name="status" value="0" <?php echo ($row['file_visibility']==0)?'checked':'' ?>> Private
      				  </label>
      				</div>
                  </div>
              </div>
              <button type="submit" name="save" class="btn btn-success"><i class="icofont icofont-save"></i> simpan</button>
              <button type="reset" class="btn btn-danger"><i class="icofont icofont-ui-reply"></i> Reset</button>
          </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
