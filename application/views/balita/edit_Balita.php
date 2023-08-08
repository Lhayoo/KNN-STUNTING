<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Edit Data Balita</h3>
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
                            <form method ="POST" action="<?php echo base_url() . "Balita/doUpdate/" ?>">
                                <div class="col-lg-6">
                                    <h2>Informasi Pribadi</h2>
                                    <hr>
                                    <div class="form-group">
                                        <label>ID Balita</label>
                                        <input class="form-control" type="hidden" name="id" value="<?php echo $id; ?>" >
                                        <input class="form-control" title="Nomor Daftar Bayi" type="text" name="idBalita" value="<?php echo $idBalita; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Balita</label>
                                        <input class="form-control" title="Nama Bayi" type="text" name="namaBayi" value="<?php echo $namaBayi; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="jenisKelamin">Jenis Kelamin</label><br>
				                        <label class="radio-inline"><input type="radio" name="jenisKelamin" value="Laki-Laki"/> Laki-Laki</label>&nbsp;&nbsp;
				                        <label class="radio-inline"><input type="radio" name="jenisKelamin" value="Perempuan"/>	Perempuan</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input class="form-control" type="text" title="Tempat Lahir" name="tempatLahir" value="<?php echo $tempatLahir; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input class="form-control" type="date"  title ="Tanggal Lahir" name="tanggalLahir" value="<?php echo $tanggalLahir; ?>">
                                        </div>
                                    </div>
                                        <div class="form-group">
                                            <label>Nomor Telpon Ibu</label>
                                            <input class="form-control" type="number" name="telp_ibu" title="telp" value="<?php echo $telp_ibu; ?>">
                                        </div>
                                    <div class="form-group">
                                        <label>Nama Ibu</label>
                                        <input class="form-control" title="Nama Ibu Bayi" type="text" name="namaIbu" value="<?php echo $namaIbu; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Ayah</label>
                                        <input class="form-control" type="text" title="Nama Ayah Ibu" name="namaAyah" value="<?php echo $namaAyah; ?>">
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" rows="4" title="Alamat" name="alamat"><?php echo $alamat; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <h2>Informasi Kesehatan</h2>
                                    <hr>
                                    <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>Golongan Darah</label>
                                        <input class="form-control" title="goldar" type="text" name="goldar" placeholder="" value="<?php echo $goldar; ?>">
                                    </div>
                                </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>Umur Balita</label>
                                        <input class="form-control" title="umur Balita" type="text" name="umur" placeholder="dalam bulan" value="<?php echo $umur; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>Panjang Lahir</label>
                                        <input class="form-control" title="Panjang Lahir Balita" type="number" step="0.01" name="panjangLahir" placeholder="dalam cm" value="<?php echo $panjangLahir; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>Berat Lahir</label>
                                        <input class="form-control" title="Berat Lahir Balita" type="number" step="0.01" name="beratLahir" placeholder="dalam cm" value ="<?php echo $beratLahir; ?>" >
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>Lingkar Kepala</label>
                                        <input class="form-control" title="lingkar kepala" type="number" step="0.01" name="lingkar_kepala" placeholder="dalam cm" value ="<?php echo $lingkar_kepala; ?>" >
                                    </div>
                                </div>
                                <br>
                                
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
