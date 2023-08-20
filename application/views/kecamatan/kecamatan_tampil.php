<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Data kecamatan</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <form action="<?= base_url('kecamatan/add') ?>" method="POST">
                        <input type="submit" name="simpan" value="Tambah Data kecamatan" class="btn btn-primary">
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
                                            <th>Nama kecamatan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($kecamatan as $b) : ?>
                                        <tr>
                                            <th scope="row" style="width: 15px;">
                                                <center><?= $i; ?></center>
                                            </th>
                                            <td><?= $b['nama_kecamatan']; ?></td>
                                            <td>
                                                <a href="<?php echo base_url() . "kecamatan/detail/" . $b['id_kecamatan']; ?>"
                                                    style="text-decoration: none;" title="Informasi Lengkap"><button
                                                        type="button" class="btn btn-primary btn-circle"><i
                                                            class="fa fa-list"></i></button>
                                                    <a href="<?php echo base_url() . "kecamatan/edit/" . $b['id_kecamatan']; ?>"
                                                        style="text-decoration: none;" title="Ubah Data"><button
                                                            type="button" class="btn btn-warning btn-circle"><i
                                                                class="fa fa-pencil"></i></button>
                                                        <a href="<?php echo base_url() . "kecamatan/delete/" . $b['id_kecamatan']; ?>"
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