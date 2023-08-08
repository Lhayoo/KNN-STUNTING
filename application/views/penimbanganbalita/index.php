<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Penimbangan Balita</h3>
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
                <form action="<?= base_url('Penimbangan_Balita/add') ?>" method="POST">
                <input type="submit" name="simpan" value="Tambah Penimbangan Balita" class="btn btn-primary">
                <a href="<?= base_url('Laporan_Anak/grafik') ?>" class="btn btn-success">Grafik</a>
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
                                                <td>
                                                <a href="<?php echo base_url()."Penimbangan_Balita/detail/".$b['idBalita']; ?>" style="text-decoration: none" title="Informasi Lengkap"><button type="button" class="btn btn-primary btn-circle"><i class="fa fa-list"></i></button>
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