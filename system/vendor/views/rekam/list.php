<style type="text/css">
.button{
	text-decoration: none;
	color:white;
	border: 1px solid black;
	padding: 10px;
	background-color: black;
}

</style>
<h1 align="center">Rekam Medis Klinik</h1>

<div class="rekam">
	<?php echo anchor('Rekam/form', 'Tambah Data', array('class'=>'button')); ?>
</div>
<div class="list" style="margin-top: 20px;">
	<table class="table table-dark" align="center">
		<tr>
			<th>No Transaksi</th>
			<th>Kode Peserta</th>
			<th>Nama Peserta</th>
			<th>Usia</th>
			<th>Jenis kelamin</th>
			<th>Keluhan</th>
			<th>Nama Poli</th>
			<th>Nama Bidan</th>
			<th>Biaya</th>
			<th>Action</th>
		</tr>

		<?php
		foreach ($rekam as $value) {

			?>
			<tr>
				<td><?php echo $value->no_transaksi;?></td>
				<td><?php echo $value->kode_peserta;?></td>
				<td><?php echo $value->nama_peserta;?></td>
				<td><?php echo $value->umur;?></td>
				<td><?php echo $value->jenis_kelamin;?></td>
				<td><?php echo $value->keluhan;?></td>
				<td><?php echo $value->nama_poli;?></td>
				<td><?php echo $value->nama_bidan;?></td>
				<td><?php echo $value->biaya;?></td>
				<td>
					<a class="btn btn-danger" href="<?php echo site_url('#').$value->no_transaksi;?>" onclick="return confirm('Are you sure?')">Hapus</a>
					<a class="btn btn-info" href="<?php echo site_url('#').$value->no_transaksi;?>">Edit</a>
				</td>
			</tr>
		<?php } ?>
	</tr>
</table>
</div>