<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Penimbangan Balita</h3>
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
                    <a href="<?= site_url('Balita/add'); ?>" class="btn btn-primary">Tambah Data Balita</a>
                    <a href="<?= site_url('knn/import'); ?>" class="btn btn-primary">Import dari Database Balita</a>
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
                                            <th>BB/U</th>
                                            <th>TB/U</th>
                                            <th>BB/TB</th>
                                            <th>BB/U Label</th>
                                            <th>TB/U Label</th>
                                            <th>BB/TB Label</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($balitaData as $b) : ?>
                                            <tr <?php if ($b->bbtb_label === "INVALID") echo "class='table-danger'" ?>>
                                                <th scope="row">
                                                    <center><?= $i; ?></center>
                                                </th>
                                                <td><?= $b->namaBayi; ?></td>
                                                <td><?= $b->jenisKelamin; ?></td>
                                                <td><?= $b->beratLahir; ?> kg</td>
                                                <td><?= $b->panjangLahir; ?> cm</td>
                                                <td><?= $b->lingkar_kepala; ?> cm</td>
                                                <td><?= $b->bbu; ?> </td>
                                                <td><?= $b->tbu; ?> </td>
                                                <td><?= $b->bbtb; ?> </td>
                                                <td><?= $b->bbu_label; ?> </td>
                                                <td><?= $b->tbu_label; ?> </td>
                                                <td><?= $b->bbtb_label; ?> </td>
                                                <!-- <td>
                                                    <a href="<?php echo base_url() . "Penimbangan_Balita/detail_hitung/" . $b->id; ?>" style="text-decoration: none;"><button type="button" class="btn btn-warning btn-plus"><i class="fa fa-plus"></i></button>
                                                </td> -->
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