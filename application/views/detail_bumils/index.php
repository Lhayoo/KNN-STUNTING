<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Data Ibu Hamil</h3>
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
                                            <th>Nama Ibu</th>
                                            <th>Tempat/Tgl Lahir</th>
                                            <th>Usia Kandungan</th>
                                            <th>Nama Suami</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($bumil as $m) : ?>
                                            <tr>
                                                <th scope="row">
                                                    <center><?= $i; ?></center>
                                                </th>
                                                <td><?= $m['namaBumil']; ?></td>
                                                <td><?= $m['tempatLahir'] . ',' . $m['tanggalLahir']; ?></td>
                                                <td><?= $m['usiaKandungan']; ?></td>
                                                <td><?= $m['namaSuami']; ?></td>
                                                <td>
                                                <a href="<?php echo base_url()."/Bumil/detail/".$m['idIbu']; ?>" style="text-decoration: none" title="Informasi Lengkap"><button type="button" class="btn btn-primary btn-circle"><i class="fa fa-list"></i></button>
                                                <a href="<?php echo base_url()."/Bumil/edit/".$m['idIbu']; ?>" style="text-decoration: none" title="Ubah Data"><button type="button" class="btn btn-warning btn-circle"><i class="fa fa-pencil"></i></button>
                                                <a href="<?php echo base_url()."/Bumil/delete/".$m['idIbu']; ?>" style="text-decoration: none" title="Hapus Data"><button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button>
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