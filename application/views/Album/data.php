<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Data album</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <form action="<?= base_url('album/create') ?>" method="POST">
                        <input type="submit" name="simpan" value="Tambah Data album" class="btn btn-primary">
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
                                            <th>album</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($album as $b) : ?>
                                        <tr>
                                            <th scope="row">
                                                <center><?= $i; ?></center>
                                            </th>
                                            <td>
                                                <img style="width: 200px; height: 80px;"
                                                    src="<?php echo base_url().'uploads/album/'. $b['album_thumbnail']?>"
                                                    class="rounded float-left" alt="...">
                                                <a href="#"> &nbsp <?php echo $b['album_name']; ?></a>
                                            </td>
                                            <td>
                                                <?php if ($b['album_status'] == 1) { ?>
                                                <span class="badge badge-success">Publish</span>
                                                <?php } else { ?>
                                                <span class="badge badge-danger">Draft</span>
                                                <?php } ?>
                                            </td>

                                            <td>
                                                <a href="<?php echo base_url() . "album/edit/" . $b['album_id']; ?>"
                                                    style="text-decoration: none;" title="Ubah Data"><button
                                                        type="button" class="btn btn-warning btn-circle"><i
                                                            class="fa fa-pencil"></i></button>
                                                    <a href="<?php echo base_url() . "album/delete/" . $b['album_id']; ?>"
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