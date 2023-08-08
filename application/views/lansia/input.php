<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Tambah Data Lansia</h3>
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
                            <form method ="POST" action="<?php echo base_url() . "Lansia/processAdd/" ?>">
                                <div class="col-lg-6">
                                    <h2>Informasi Pribadi</h2>
                                    <hr>
                                    <div class="form-group">
                                        <label>Kode</label>
                                        <input class="form-control" type="text" name="idLansia">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input class="form-control" type="text" name="namaLansia" onkeypress="return hanyaHuruf(event)" title="Nama" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jk">Jenis Kelamin</label><br>
				                        <label class="radio-inline"><input type="radio" name="jk" value="Laki-Laki"/> Laki-Laki</label>&nbsp;&nbsp;
				                        <label class="radio-inline"><input type="radio" name="jk" value="Perempuan"/>	Perempuan</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input class="form-control" type="text" name="tempatLahir" title="Tempat Lahir" onkeypress="return hanyaHuruf(event)" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input class="form-control" type="date" title="Tanggal Lahir " name="tanggalLahir">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Pasangan</label>
                                        <input class="form-control" type="text" name="namaPasangan" title="Nama " onkeypress="return hanyaHuruf(event)" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Telpon</label>
                                        <input class="form-control" type="number" name="telp" title="No telp" required>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" rows="4" name="alamatLansia" title="Alamat" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <h2>Informasi Kesehatan</h2>
                                    <hr>
                                    <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>Golongan Darah</label>
                                        <input class="form-control" title="goldar" type="text" name="goldar" placeholder="" required>
                                    </div>
                                </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>Umur</label>
                                        <input class="form-control" title="umur" type="text" name="umur" placeholder="dalam tahun" required>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>Tinggi Badan</label>
                                        <input class="form-control" title="tinggi" type="number" step="0.01" name="tinggiAwal" placeholder="dalam cm" required>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>Berat Badan</label>
                                        <input class="form-control" title="Berat" type="number" step="0.01" name="beratAwal" placeholder="dalam kg" required>
                                    </div>
                                </div>
                        </div>
                        <div class="col-lg-12 text-center">
                            <button type="submit" class="btn btn-info" style="width: 25%">Simpan Data</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
    function hanyaHuruf(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 32 && (charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && charCode > 39)
            return false;
        return true;
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
