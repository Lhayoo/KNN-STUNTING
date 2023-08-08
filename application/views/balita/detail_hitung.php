<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
        <h3 class="panel-title">Data Penimbangan <?php echo $balita['namaBayi']; ?></h3>
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
	</div>
	<div class="panel-body">
		<table class="table table-bordered">
			<tr>
				<td><label>Nama</label></td>
				<td><?php echo $balita['namaBayi']; ?></td>
			</tr>
            <tr>
				<td><label>Tempat Lahir</label></td>
				<td><?php echo $balita['tempatLahir']; ?></td>
			</tr>
			<tr>
				<td><label>Tanggal Lahir</label></td>
				<td><?php echo $balita['tanggalLahir']; ?></td>
			</tr>
            <tr>
				<td><label>Jenis Kelamin</label></td>
				<td><?php echo $balita['jenisKelamin']; ?></td>
			</tr>
            <tr>
				<td><label>Alamat</label></td>
				<td><?php echo $balita['alamat']; ?></td>
			</tr>
		</table>
	</div>
</div>
<div class="panel panel-headline">
	<div class="panel-heading">
		<h3 class="panel-title">Penimbangan</h3>
	</div>
	<div class="panel-body">
		<a href="<?= base_url('penimbangan_balita/add') ?>" class="btn btn-primary">Tambah Penimbangan</a>
		<a href="<?= base_url('Laporan_Anak/grafik/'. $balita['id']) ?>" class="btn btn-success">Grafik</a>
		<br>
		<br>
		<table class="table table-bordered table-responsive" id="mytable">
			<thead>
				<tr>
					<th>Tanggal Penimbangan</th>
					<th>Berat</th>
					<th>Tinggi</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$no = 0;
				foreach($getPenimbanganDetailBalita as $p): ?>
					<tr>
						<td><?php echo $p['tgl_skrng']; ?></td>
						<td><?php echo $p['beratLahir']." kg"; ?></td>
						<td><?php echo $p['panjangLahir']." cm" ?></td>
						<td>
						<a href="<?php echo base_url()."Penimbangan_Balita/detail/".$p['idpBalita']; ?>" style="text-decoration: none" title="Informasi Lengkap"><button type="button" class="btn btn-primary btn-circle"><i class="fa fa-list"></i></button>
                        <a href="<?php echo base_url()."/Penimbangan_Balita/delete/".$p['idpBalita']; ?>" style="text-decoration: none;" title="Hapus Data"><button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				<?php 
				$no++;
				endforeach;
				?>
			</tbody>
		</table>
	</div>
</div>

<!-- Modal -->
<div id="myAdd" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Tambah Data Penimbangan <?php echo $balita->namaBayi ?></h4>
			</div>
			<?php echo form_open('penimbangan_balita/penimbangan_bayi/'.$balita->idBalita) ?>
			<div class="modal-body">
				<div class="form-group">
					<label for="beratLahir">Berat Badan</label>
					<div class="input-group">
						<input type="text" name="beratLahir" class="form-control">
						<span class="input-group-addon">Kg</span>
					</div>
				</div> 
				<br>      	
				<div class="form-group">
					<label for="panjangLahir">Tinggi Badan</label>
					<div class="input-group">
						<input type="text" name="panjangLahir" class="form-control">
						<span class="input-group-addon">Cm</span>
					</div>
				</div>  

			</div>
			<div class="modal-footer">
				<input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<?php echo form_close() ?>
			</div>
		</div>

	</div>
</div>