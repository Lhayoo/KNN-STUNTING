
<h1 align="center">From Rekam Medis</h1>
<form action="<?php echo site_url("Rekam/submit"); ?>" method="POST">
	<div class="form-group row">
		<label>No Transaksi</label>
		<input type="text" name="no_transaksi" disabled="true" class="form-control" placeholder="Auto">
	</div>

	<div class="form-group row">
		<label>Nama Peserta</label>
		
		<select name="nama_peserta" class="form-control">
			<?php foreach($namapeserta as $r) { ?>
				<option value="<?php echo $r->kode_peserta ?>"><?php echo $r->nama_peserta ?></option>
				<?php } ?>
		</select>
		
	</div>

	<div class="form-group row">
		<label>Tanggal</label>
		<input type="date" name="tanggal" class="form-control">
	</div>

	<div class="form-group row">
		<label>Nama Bidan</label>

		<select name="nama_bidan" class="form-control">
			<?php foreach($namabidan as $b) { ?>
				<option value="<?php echo $b->kode_bidan ?>"><?php echo $b->nama_bidan ?></option>
				<?php } ?>	
		</select>
	</div>

	<div class="form-group row">
		<label>Keluhan</label>
		<input type="text" name="keluhan" class="form-control" placeholder="Keluhan">
	</div>

	<div class="form-group row">
		<label>Biaya</label>
		<input type="text" name="biaya" class="form-control" placeholder="Biaya">
	</div>

	<div class="form-group">
		<button type="submit" class="btn btn-primary">Simpan</button>
		<button type="reset" class="btn btn-danger">Clear</button>
	</div>
</form>