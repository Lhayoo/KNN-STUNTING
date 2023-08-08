<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Data Lansia</h3>
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
                <form action="<?= base_url('Lansia/add') ?>" method="POST">
                <input type="submit" name="simpan" value="Tambah Data Lansia" class="btn btn-primary">
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
                                            <th>Nama Lansia</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tempat/Tanggal Lahir</th>
                                            <th>Alamat</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($lansia as $l) : ?>
                                            <tr>
                                                <th scope="row">
                                                    <center><?= $i; ?></center>
                                                </th>
                                                <td><?= $l['namaLansia']; ?></td>
                                                <td><?= $l['jk']; ?></td>
                                                <td><?= $l['tempatLahir']. ',' . $l['tanggalLahir']; ?></td>
                                                <td><?= $l['alamatLansia']; ?></td>
                                                <td>
                                                <a href="<?php echo base_url()."Lansia/detail/".$l['id']; ?>" style="text-decoration: none" title="Informasi Lengkap"><button type="button" class="btn btn-primary btn-circle"><i class="fa fa-list"></i></button>
                                                <a href="<?php echo base_url()."Lansia/edit/".$l['id']; ?>" style="text-decoration: none" title="Ubah Data"><button type="button" class="btn btn-warning btn-circle"><i class="fa fa-pencil"></i></button>
                                                <a href="<?php echo base_url()."Lansia/delete/".$l['id']; ?>" style="text-decoration: none" title="Hapus Data"><button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button>
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