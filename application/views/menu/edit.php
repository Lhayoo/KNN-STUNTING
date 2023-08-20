
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ubah Data
        <small>Form Ubah Data Menu & Halaman</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('menu');?>">Data Menu & Halaman</a></li>
        <li><a href="#">Ubah Data Menu & Halaman</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">
          <?php echo anchor('menu','Kembali',array('class'=>'btn btn-sm btn-danger'));?></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <form method="POST" action="<?php echo site_url('menu/edit'); ?>">
            <input type="hidden" name="id" value="<?php echo $row['menu_id'];?>"">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama menu</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" value="<?php echo $row['menu_title'];?>"  placeholder="Type your menu title">
                    <p class="text-danger"><?php echo form_error('title'); ?></p>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Parent</label>
                <div class="col-sm-10">
                    <select name="parent" class="form-control">
                        <option value="0">Menu Utama</option>
                        <?php
                        foreach ($parent->result() as $p){
                            echo "<option value='$p->menu_id'";
                            echo $row['is_main_menu']==$p->menu_id?'selected':'';
                            echo ">$p->menu_title</option>";
                        }
                        ?>

                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Content</label>
                <div class="col-sm-10">
                    <textarea name="content" class="ckeditor" id="ckeditor"><?php echo $row['menu_content'];?></textarea>
                    <p class="text-danger"><?php echo form_error('content'); ?></p>
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
