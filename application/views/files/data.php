<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Data File</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <form action="<?= base_url('file/create') ?>" method="POST">
                        <input type="submit" name="simpan" value="Tambah Data" class="btn btn-primary">
                        <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama File</th>
                                            <th>Ukuran</th>
                                            <th>Status</th>
                                            <th>Tipe</th>
                                            <th>Di Unduh(X)</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($file as $b) : ?>
                                        <tr>
                                            <th scope="row">
                                                <center><?= $i; ?></center>
                                            </th>
                                            <td><?= $b['file_title']; ?></td>
                                            <td>
                                                <?php echo $b['file_size']; ?> KB
                                            </td>
                                            <td>
                                                <?php
                                              if($b['file_visibility'] == 1){
                                                echo '<span class="badge badge-info">Public</span>';
                                              }else{
                                                echo '<span class="badge badge-danger">Private</span>';
                                              }
                                              ?>
                                            </td>
                                            <td>
                                                <?php echo $b['file_type']; ?>
                                            </td>
                                            <td>

                                                <?= $b['file_counter'] ;?>
                                            </td>

                                            <td>
                                                <a href="<?php echo site_url("file/download/". $b['file_id'])?>"
                                                    class="btn btn-primary btn-sm"><i class="fa fa-download"></i>
                                                </a>
                                                <a href="<?php echo base_url() . "file/edit/" . $b['file_id']; ?>"
                                                    style="text-decoration: none;" title="Ubah Data"><button
                                                        type="button" class="btn btn-warning btn-circle"><i
                                                            class="fa fa-pencil"></i></button>
                                                    <a href="<?php echo base_url() . "file/delete/" . $b['file_id']; ?>"
                                                        style="text-decoration: none;" title="Hapus Data"><button
                                                            type="button" class="btn btn-danger btn-circle"><i
                                                                class="fa fa-times"></i></button>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
<?php if ($this->session->flashdata('success')) { ?>
toastr.success("<?php echo $this->session->flashdata('success'); ?>");

<?php } ?>
console.log();
</script>