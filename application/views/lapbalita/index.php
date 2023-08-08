<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Data Penimbangan Balita</h3>
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
                <form action="<?= base_url('Penimbangan_Balita/add') ?>" method="POST">
                <input type="submit" name="simpan" value="Tambah Data Penimbangan" class="btn btn-primary">
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
                                            <th>Nama Balita</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Panjang Badan</th>
                                            <th>Berat Badan</th>
                                            <th>Tanggal Penimbangan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($penimbangan as $n) : ?>
                                            <tr>
                                                <th scope="row">
                                                    <center><?= $i; ?></center>
                                                </th>
                                                <td><?= $n['namaBayi']; ?></td>
                                                <td><?= $n['tanggalLahir']; ?></td>
                                                <td><?= $n['jenisKelamin']; ?></td>
                                                <td><?= $n['panjangLahir']; ?></td>
                                                <td><?= $n['beratLahir']; ?></td>
                                                <td><?= $n['tgl_skrng']; ?></td>
                                                <td>
                                                <a href="<?php echo base_url()."/Penimbangan_Balita/detail/".$n['idpBalita']; ?>" style="text-decoration: none;" title="Informasi Lengkap"><button type="button" class="btn btn-primary btn-circle"><i class="fa fa-list"></i></button>
                                               
                                                <a href="<?php echo base_url()."/Penimbangan_Balita/delete/".$n['idpBalita']; ?>" style="text-decoration: none;" title="Hapus Data"><button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button>
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