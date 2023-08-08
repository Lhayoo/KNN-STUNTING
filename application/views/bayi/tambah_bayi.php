<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Tambah Data Balita</h3>
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
                            <form method ="POST" action="<?php echo base_url() . "bayi/tambah_data_bayi" ?>">
                                <div class="col-lg-6">
                                    <h2>Informasi Pribadi</h2>
                                    <hr>
                                    <div class="form-group">
				<label for="namaBayi">Nama Bayi</label>
				<input type="text" name="nama" class="form-control" value="<?php echo set_value('namaBayi'); ?>">
				<div style="color: red"><?php echo form_error('namaBayi'); ?></div>
			</div>
            <div class="form-group">
				<label for="tempatLahir">Tempat Lahir</label>
				<input type="text" name="nama" class="form-control" value="<?php echo set_value('tempatLahir'); ?>">
				<div style="color: red"><?php echo form_error('tempatLahir'); ?></div>
			</div>
			<div class="form-group">
				<label for="tanggalLahir">Tanggal Lahir</label>
				<input type="date" name="tanggalLahir" class="form-control" id="flatpickr" value="<?php echo set_value('tanggaLahir'); ?>">
				<div style="color: red"><?php echo form_error('tanggalLahir'); ?></div>	
			</div>
			<div class="form-group">
				<label for="jk">Jenis Kelamin</label><br>
				<label class="radio-inline"><input type="radio" name="jk" value="Laki-Laki"/> Laki-Laki</label>&nbsp;&nbsp;
				<label class="radio-inline"><input type="radio" name="jk" value="Perempuan"/>	Perempuan</label>
			</div>
			<div class="form-group">
				<label for="namaAyah">Nama Ayah</label>
				<input type="text" name="namaAyah" class="form-control" value="<?php echo set_value('namaAyah'); ?>">
				<div style="color: red"><?php echo form_error('namaAyah'); ?></div>
			</div>
			<div class="form-group">
				<label for="namaIbu">Nama Ibu</label>
				<input type="text" name="namaIbu" class="form-control" value="<?php echo set_value('namaIbu'); ?>">
				<div style="color: red"><?php echo form_error('namaIbu'); ?></div>
			</div>
			<div class="form-group">
				<label for="nik">NIK Ibu</label>
				<input type="text" name="nik" class="form-control" value="<?php echo set_value('nik'); ?>">
				<div style="color: red"><?php echo form_error('nik'); ?></div>
			</div>
                                    <div class="col-lg-12">
                                        <label>Alamat</label>
                                        <textarea class="form-control" rows="3" name="alamat" maxlength="255" title="Alamat"></textarea>
                                    </div>
                                </div>
                                <br>
                                <br>
                                    
                        <div class="col-lg-12 text-center">
                            <button type="submit" class="btn btn-info" style="width: 25%">Simpan</button>
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
