<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Data menu</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <form action="<?= base_url('Menu/create') ?>" method="POST">
                        <input type="submit" name="simpan" value="Tambah Data menu" class="btn btn-primary">
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
                                            <th>Nama Menu</th>
                                            <th>Link</th>
                                            <th>Parent</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($menu as $b) : ?>
                                        <tr>
                                            <th scope="row">
                                                <center><?= $i; ?></center>
                                            </th>
                                            <td><?= $b['menu_title']; ?></td>
                                            <td><?= $b['menu_link']; ?></td>
                                            <td>
                                                <?php if ($b['is_main_menu'] == 0) { ?>
                                                <label class="">Menu Utama</label>
                                                <?php }else{ ?>
                                                <label class="label label-info">Submenu</label>
                                                <?php } ?>
                                            </td>

                                            <td>
                                                <a href="<?php echo base_url() . "menu/edit/" . $b['menu_id']; ?>"
                                                    style="text-decoration: none;" title="Ubah Data"><button
                                                        type="button" class="btn btn-warning btn-circle"><i
                                                            class="fa fa-pencil"></i></button>
                                                    <a href="<?php echo base_url() . "menu/delete/" . $b['menu_id']; ?>"
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