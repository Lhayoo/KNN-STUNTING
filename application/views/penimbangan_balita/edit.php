<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Edit Data Penimbangan Balita</h3>
        </div>
    </div>
    <div class="flash-dataq" data-flashdata="<?php echo $this->session->flashdata('msg'); ?>"></div>
    <?php if ($this->session->flashdata('msg')) : ?>

    <?php endif; ?>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form method ="POST" action="<?php echo base_url() . "index.php/Penimbangan_Balita/doUpdate/" ?>">
                                <div class="col-lg-6">
                                    <h2>Informasi Pribadi</h2>
                                    <hr>
                                    <div class="form-group">
                                        <label>ID Penimbangan</label>
                                        <input class="form-control" title="Nomor Daftar Bayi" type="text" name="idpBalita" value="<?php echo $idpBalita; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Balita</label>
                                        <input class="form-control" title="Nama Bayi" type="text" name="namaBayi" value="<?php echo $namaBayi; ?>" readonly>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input class="form-control" type="date"  title ="Tanggal Lahir" name="tanggalLahir" value="<?php echo $tanggalLahir; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <h2>Informasi Kesehatan</h2>
                                    <hr>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <input class="form-control" type="text" title="Jenis Kelamin" name="jenisKelamin" value="<?php echo $jenisKelamin; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>Panjang Lahir</label>
                                        <input class="form-control" title="Panjang Lahir Balita" type="text" name="panjangLahir" placeholder="dalam cm" value="<?php echo $panjangLahir; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>Berat Lahir</label>
                                        <input class="form-control" title="Berat Lahir Balita" type="text" name="beratLahir" placeholder="dalam cm" value ="<?php echo $beratLahir; ?>" readonly >
                                    </div>
                                </div>
                                <br>
                                <h2>Perkembangan Bayi</h2>
                                <hr>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>Panjang Sekarang</label>
                                        <input class="form-control" title="Panjang Sekarang" type="number" name="panjangSekarang" placeholder="dalam cm" step="0.01" value="" required>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>Berat Sekarang</label>
                                        <input class="form-control" type="number" title="Berat Sekarang" name="beratSekarang" placeholder="dalam kg" step="0.01" value ="" required>
                                    </div>
                                </div>
                        </div>
                        <div class="col-lg-12 text-center">
                            <button type="submit" class="btn btn-info" style="width: 25%">Perbarui Data</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
