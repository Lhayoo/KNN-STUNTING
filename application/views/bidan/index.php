<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Data Pengguna</h3>
        </div>
    </div>
    <div class="flash-dataw" data-flashdata="<?php echo $this->session->flashdata('msg'); ?>"></div>
    <?php if ($this->session->flashdata('msg')) : ?>

    <?php endif; ?>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <button type="button" class="btn btn-primary">Tambah Data Pengguna</button>
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
                                            <th>Nama lengkap</th>
                                            <th>Tempat/Tanggal Lahir</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($bidan as $d) : ?>
                                            <tr>
                                                <th scope="row">
                                                    <center><?= $i; ?></center>
                                                </th>
                                                <td><?= $d['nama_bidan']; ?></td>
                                                <td><?= $d['tempat_lahir'] . ', ' . $d['tanggal_lahir']; ?></td>
                                                <td>
                                                    <a data-toggle="modal" data-target="#newViewBidanModal<?= $d['id_bidan']; ?>" href="<?= base_url(); ?>bidan/viewData/<?= $d['id_bidan']; ?>" class="btn btn-info btn-circle btn-sm">
                                                        <i class="fa fa-sticky-note"></i>
                                                    </a>
                                                    <a data-toggle="modal" data-target="#newEditBidanModal<?= $d['id_bidan']; ?>" href="<?= base_url(); ?>bidan/editData/<?= $d['id_bidan']; ?>" class="btn btn-warning btn-circle btn-sm">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="<?= base_url(''); ?>bidan/deleteData/<?= $d['id_bidan']; ?>" class="btn btn-danger btn-circle btn-sm tbl-hapus">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
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