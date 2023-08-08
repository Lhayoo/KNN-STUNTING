<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
        <h3 class="panel-title">Data Penimbangan <?php echo $balita->namaBayi; ?></h3>
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
			<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
		</div>
	</div>
	<div class="panel-body">
		<table class="table table-bordered">
			<tr>
				<td><label>Nama Balita</label></td>
				<td><?php echo $balita->namaBayi; ?></td>
			</tr>
            <tr>
				<td><label>Tempat Lahir</label></td>
				<td><?php echo $balita->tempatLahir; ?></td>
			</tr>
			<tr>
				<td><label>Tanggal Lahir</label></td>
				<td><?php echo $balita->tanggalLahir; ?></td>
			</tr>
			<tr>
				<td><label>Jenis Kelamin</label></td>
				<td><?php echo $balita->jenisKelamin; ?></td>
			</tr>
			<tr>
				<td><label>Nama Ayah</label></td>
				<td><?php echo $balita->namaAyah; ?></td>
			</tr>
			<tr>
				<td><label>Nama Ibu</label></td>
				<td><?php echo $balita->namaIbu; ?></td>
			</tr>
            <tr>
				<td><label>Alamat</label></td>
				<td><?php echo $balita->alamat; ?></td>
			</tr>
		</table>
	</div>
</div>
<div class="panel panel-headline">
	<div class="panel-heading">
		<div class="right">
			<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
		</div>
		<h3 class="panel-title">Penimbangan</h3>
	</div>
	<div class="panel-body">
		<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myAdd">Tambah Data Penimbangan</button>
		<a href="<?php echo base_url('Penimbangan_Balita/penimbangan_grafik/'.$balita->idBalita) ?>" class="btn btn-sm btn-warning">Grafik Berat Badan</a>
		<a href="<?php echo base_url('Penimbangan_Balita/grafik_tinggibadan/'.$balita->idBalita) ?>" class="btn btn-sm btn-success">Grafik Tinggi Badan</a>
		<a href="<?php echo base_url('Laporan/laporan_bayi/'.$balita->idBalita) ?>" target="_blank" class="btn btn-sm btn-danger">Laporan</a>
		<br>
		<br>
		<table class="table table-bordered table-responsive" id="mytable">
			<thead>
				<tr>
					<th>Bulan Ke</th>
					<th>Tanggal Penimbangan</th>
					<th>Berat Balita</th>
					<th>Tinggi Balita</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$no = 0;
				foreach($penimbangan as $p): ?>
					<tr>
						<td><?php echo "Bulan Ke-".$no; ?></td>
						<td><?php echo $p->tgl_skrng; ?></td>
						<td><?php echo $p->beratLahir." kg"; ?></td>
						<td><?php echo $p->panjangLahir." cm" ?></td>
						<td>
							<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myEdit-<?php echo $p->idpBalita ?>">Edit</button>
							<div id="myEdit-<?php echo $p->idpBalita; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editLabel-<?php echo $p->idpBalita; ?>" aria-hidden="true">
								<div class="modal-dialog">

									<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title" id="editLabel-<?php echo $p->idpBalita ?>">EDIT</h4>
										</div>
										<div class="modal-body">
											<?php echo form_open('Penimbangan_Balita/edit_penimbangan/'.$p->idpBalita); ?>
											<div class="modal-body">
												<input type="hidden" name="id" value="<?php echo $p->idpBalita ?>">
												<div class="form-group">
													<label for="beratLahir">Berat Badan</label>
													<div class="input-group">
														<input type="text" name="beratLahir" class="form-control" value="<?php echo $p->beratLahir ?>">
														<span class="input-group-addon">Kg</span>
													</div>
												</div>        	
												<div class="form-group">
													<label for="panjangLahir">Tinggi Badan</label>
													<div class="input-group">
														<input type="text" name="panjangLahir" class="form-control" value="<?php echo $p->panjangLahir ?>">
														<span class="input-group-addon">Cm</span>
													</div>
												</div>  

											</div>
										</div>
									</div>

								</div>
							</div>
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