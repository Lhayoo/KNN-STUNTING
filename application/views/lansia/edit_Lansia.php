<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Edit Data Lansia</h3>
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
                            <form method ="POST" action="<?php echo base_url() . "Lansia/doUpdate/" ?>">
                                <div class="col-lg-6">
                                    <h2>Informasi Pribadi</h2>
                                    <hr>
                                    <div class="form-group">
                                        <label>ID Lansia</label>
                                        <input class="form-control" title="Nomor Daftar" type="hidden" name="id" value="<?php echo $id; ?>" >
                                        <input class="form-control" title="Nomor Daftar" type="text" name="idLansia" value="<?php echo $idLansia; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Lansia</label>
                                        <input class="form-control" title="Nama " type="text" name="namaLansia" value="<?php echo $namaLansia; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="jk">Jenis Kelamin</label><br>
				                        <label class="radio-inline"><input type="radio" name="jk" value="Laki-Laki"/> Laki-Laki</label>&nbsp;&nbsp;
				                        <label class="radio-inline"><input type="radio" name="jk" value="Perempuan"/>	Perempuan</label>
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
                                            <label>Nomor Telpon</label>
                                            <input class="form-control" type="number" name="telp" title="telp" value="<?php echo $telp; ?>">
                                        </div>
                                    <div class="form-group">
                                        <label>Nama Pasangan</label>
                                        <input class="form-control" title="Nama pasangan" type="text" name="namaPasangan" value="<?php echo $namaPasangan; ?>">
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" rows="4" title="Alamat" name="alamatLansia"><?php echo $alamatLansia; ?></textarea>
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
                                        <label>Umur Lansia</label>
                                        <input class="form-control" title="umur" type="text" name="umur" placeholder="dalam tahun" value="<?php echo $umur; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>Tinggi Badan</label>
                                        <input class="form-control" title="tinggi" type="number" name="tinggiAwal" placeholder="dalam cm" value="<?php echo $tinggiAwal; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>Berat Badan</label>
                                        <input class="form-control" title="Berat" type="number" name="beratAwal" placeholder="dalam cm" value ="<?php echo $beratAwal ?>" >
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
