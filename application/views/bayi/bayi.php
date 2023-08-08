<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Data Balita</h3>
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
                <form action="<?= base_url('bayi/tambah_data_bayi') ?>" method="POST">
                <input type="submit" name="simpan" value="Tambah Data Balita" class="btn btn-primary">
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
                                            <th>NIK Ibu</th>
                                            <th>Nama Balita</th>
                                            <th>Tempat/Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Nama Ibu</th>
                                            <th>Nama Ayah</th>
                                            <th>Alamat</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($balita as $b) : ?>
                                            <tr>
                                                <th scope="row">
                                                    <center><?= $i; ?></center>
                                                </th>
                                                <td><?= $b['nik']; ?></td>
                                                <td><?= $b['namaBayi']; ?></td>
                                                <td><?= $b['tempatLahir'] . ', ' . $b['tanggalLahir']; ?></td>
                                                <td><?= $b['jenisKelamin']; ?></td>
                                                <td><?= $b['namaIbu']; ?></td>
                                                <td><?= $b['namaAyah']; ?></td>
                                                <td><?= $b['alamat']; ?></td>
                                                <td>
                                                <a href="<?php echo base_url('bayi/detail_bayi/').$b->idBalita ?>" class="btn btn-sm btn-info">Detail</a>
								                <a href="<?php echo base_url('bayi/edit_data_bayi/').$b->idBalita ?>" title="" class="btn btn-sm btn-warning">Edit</a>
								                <a href="<?php echo base_url('bayi/hapus_data_bayi/').$b->idBalita ?>" title="" class="btn btn-sm btn-danger">Hapus</a>
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