<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Kecamatan
            <small>Mengelola Data Kecamatan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo site_url('kecamatan');?>">Data Kecamatan</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <?php echo anchor('kecamatan/tambah','<i class="fa fa-plus"></i> Tambah Data',array('class'=>'btn btn-sm btn-warning'));?>
                </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">

                <?php echo $this->session->flashdata('pesan');?>
                <table class="table table-striped table-bordered">
                    <tr>
                        <th width="5%">No.</th>
                        <th width="10%">Nama Kecamatan</th>
                        <th width="15%">Aksi</th>
                    </tr>

                    <?php
            if(!empty($query)){
              $no = 0;
              foreach($query as $row):
                $no++;
                ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $row->nama_kecamatan;?></td>
                        <td>
                            <?php echo anchor('kecamatan/detail/'.$row->id_kecamatan, '<i class="fa fa-search"></i>',array(
                      'class'=>'btn btn-info btn-xs'
                    ));?>&nbsp;
                            <?php echo anchor('kecamatan/ubah/'.$row->id_kecamatan, '<i class="fa fa-pencil"></i>',array(
                      'class'=>'btn btn-warning btn-xs'
                    ));?>&nbsp;
                            <?php echo anchor('kecamatan/hapus/'.$row->id_kecamatan, '<i class="fa fa-trash"></i>',array(
                      'class'=>'btn btn-danger btn-xs',
                      'onclick'=>"return confirm('Anda yakin akan menghapus data ini?')"
                    ));?>&nbsp;
                        </td>
                    </tr>
                    <?php
                endforeach;
            }else{
              echo '<tr class="danger"><th colspan="6">Data tidak tersedia.</th></tr>';
            }
            ?>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <?php echo $halaman;?>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->