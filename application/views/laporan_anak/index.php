<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Laporan Balita</h3>
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
                <form method ="POST" action="">
                        <table>
                           
                            <tr>
                                <td>Status Gizi</td>
                                <td>
                                    <select name="status" id="">
                                        <option value=""></option>
                                        <option value="Terlalu Kurus">Terlalu Kurus</option>
                                        <option value="Ideal">Ideal</option>
                                        <option value="Terlalu Gemuk">Terlalu Gemuk</option>
                                    </select>
                                </td>
                            </tr>
                            
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" class="btn btn-success" value="Cari" target="_blank">
                                    <a href="" class="btn btn-primary" target="_blank" onclick="window.print()">Cetak</a>
                                </td>
                            </tr>
                        </table>
                    </form>
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
                                            <th>Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Berat</th>
                                            <th>Panjang</th>
                                            <th>Tanggal Penimbangan</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($penimbangan as $b) : ?>
                                            <tr>
                                                <th scope="row">
                                                    <center><?= $i; ?></center>
                                                </th>
                                                <td><?= $b['namaBayi']; ?></td>
                                                <td><?= $b['tanggalLahir']; ?></td>
                                                <td><?= $b['jenisKelamin']; ?></td>
                                                <td><?= $b['beratLahir']; ?></td>
                                                <td><?= $b['panjangLahir']; ?></td>
                                                <td><?= $b['tgl_skrng']; ?></td>
                                                <td><?= $b['status']; ?></td>
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