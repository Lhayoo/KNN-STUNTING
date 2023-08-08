<div class="panel panel-headline">
	<div class="panel-heading">
		<h3 class="panel-title">Detail <?php echo $balita->namaBalita ?></h3>
	</div>
	<div class="panel-body">
		<img src="<?php echo base_url('assets/foto/').$balita->foto; ?>" alt="" width="300" height="450" class="img-thumbnail">
		<br>
		<div class="form-group">
			<label for="">Nama</label>
			<input type="text" value="<?php echo $balita->namaBalita ?>" class="form-control" readonly>
		</div>
		<div class="form-group">
			<label for="">Tanggal Lahir</label>
			<input type="text" value="<?php echo $bayi->tanggal_lahir ?>" class="form-control" readonly>
		</div>
		<div class="form-group">
			<label for="">Jenis Kelamin</label>
			<input type="text" value="<?php echo $bayi->jenis_kelamin ?>" class="form-control" readonly>
		</div>
		<div class="form-group">
			<label for="">Nama Ayah</label>
			<input type="text" value="<?php echo $bayi->nama_ayah ?>" class="form-control" readonly>
		</div>
		<div class="form-group">
			<label for="">Nama Ibu</label>
			<input type="text" value="<?php echo $bayi->nama_ibu ?>" class="form-control" readonly>
		</div>
		<div class="form-group">
			<label for="">NIK Ibu</label>
			<input type="text" value="<?php echo $bayi->NIK_ibu ?>" class="form-control" readonly>
		</div>
		<br>
		<a href="<?php echo site_url('Penimbangan/penimbangan_bayi/'.$bayi->id_bayi) ?>" class="btn btn-sm btn-success">Tabel Berat dan Tinggi Badan</a>
		<a href="<?php echo base_url('penimbangan/penimbangan_grafik/'.$bayi->id_bayi) ?>" class="btn btn-sm btn-info">Grafik Berat Badan</a>
		<a href="<?php echo base_url('penimbangan/grafik_tinggibadan/'.$bayi->id_bayi) ?>" class="btn btn-sm btn-info">Grafik Tinggi Badan</a>		
	</div>
</div>