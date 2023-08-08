<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Data Testing KNN Balita</h3>
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
                    <form action="<?= base_url('Balita/add') ?>" method="POST">
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
                                            <th>Jenis Kelamin</th>
                                            <th>Berat Badan</th>
                                            <th>Tinggi Badan</th>
                                            <th>Lingkar Kepala</th>
                                            <th>Nama Ibu</th>
                                            <th>Status</th>
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
                                                <td><?= $b['namaBayi']; ?></td>
                                                <td><?= $b['jenisKelamin']; ?></td>
                                                <td><?= $b['beratLahir']; ?> kg</td>
                                                <td><?= $b['panjangLahir']; ?> cm</td>
                                                <td><?= $b['lingkar_kepala']; ?> cm</td>
                                                <td><?= $b['namaIbu']; ?></td>
                                                <td><?= $b['status']; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url() . "Penimbangan_Balita/detail_hitung/" . $b['id']; ?>" style="text-decoration: none;"><button type="button" class="btn btn-warning btn-plus"><i class="fa fa-plus"></i></button>
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