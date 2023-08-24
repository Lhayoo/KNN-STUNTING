<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Data Artikel</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <form action="<?= base_url('blog/create') ?>" method="POST">
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
                                            <th>Judul Artikel</th>
                                            <th>Publish</th>
                                            <th>Julmah View</th>
                                            <th>Post oleh</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($blog as $b) : ?>
                                        <tr>
                                            <th scope="row">
                                                <center><?= $i; ?></center>
                                            </th>
                                            <td><?= $b['post_title']; ?></td>
                                            <td>
                                                <i class="fa fa-clock-o"></i> <?php echo $b['post_date']; ?>
                                            </td>
                                            <td>
                                                <i class="fa fa-eye"></i> <?php echo $b['post_views']; ?>
                                            </td>
                                            <td>
                                                <i class="fa fa-user"></i> <?php echo $b['name']; ?>
                                            </td>
                                            <td>
                                                <!-- label -->
                                                <?php if ($b['post_status'] == '1') { ?>
                                                <span class="label label-success">Publish</span>
                                                <?php } else { ?>
                                                <span class="label label-danger">Draft</span>
                                                <?php } ?>
                                            </td>

                                            <td>
                                                <a href="<?php echo base_url() . "blog/detail/" . $b['post_id']; ?>"
                                                    style="text-decoration: none;" title="Informasi Lengkap"><button
                                                        type="button" class="btn btn-primary btn-circle"><i
                                                            class="fa fa-list"></i></button>
                                                    <a href="<?php echo base_url() . "blog/edit/" . $b['post_id']; ?>"
                                                        style="text-decoration: none;" title="Ubah Data"><button
                                                            type="button" class="btn btn-warning btn-circle"><i
                                                                class="fa fa-pencil"></i></button>
                                                        <a href="<?php echo base_url() . "blog/delete/" . $b['post_id']; ?>"
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