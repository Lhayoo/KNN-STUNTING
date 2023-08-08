<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Data Users</h3>
        </div>
    </div>
    <div class="flash-dataq" data-flashdata="<?php echo $this->session->flashdata('msg'); ?>"></div>
    <?php if ($this->session->flashdata('msg')) : ?>

    <?php endif; ?>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                <form action="<?= base_url('UsersController/add') ?>" method="POST">
                <input type="submit" name="simpan" value="Tambah Data Users" class="btn btn-primary">
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
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Level</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($users as $data) : ?>
                                            <tr>
                                                <th scope="row">
                                                    <center><?= $i; ?></center>
                                                </th>
                                                <td><?= $data['name']; ?></td>
                                                <td><?= $data['username']; ?></td>
                                                <td> <?= $data['level_id'] == 1 ? 'Petugas' : "Peserta";  ?></td>
                                                <td>
                                                <a href="<?php echo base_url()."UsersController/edit/".$data['id_users']; ?>" style="text-decoration: none" title="Ubah Data"><button type="button" class="btn btn-warning btn-circle"><i class="fa fa-pencil"></i></button>
                                                <a href="<?php echo base_url()."UsersController/delete/".$data['id_users']; ?>" style="text-decoration: none" title="Hapus Data"><button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button>
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