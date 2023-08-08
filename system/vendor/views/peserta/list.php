<style type="text/css">
.button{
	text-decoration: none;
	color:white;
	border: 1px solid black;
	padding: 10px;
	background-color: black;
}
.button:hover{
	cursor:not-allowed;
}
</style>
<h1 align="center">Data Peserta Klinik</h1>

<div class="rekam">
	<?php echo anchor('Peserta/form', 'Tambah Data', array('class'=>'button')); ?>
</div>
<div class="list" style="margin-top: 20px;">
	<table class="table table-dark" align="center">
		<tr>
			<th>Kode Peserta</th>
			<th>Nama Peserta</th>
			<th>Usia</th>
			<th>Jenis Kelamin</th>
			<th>Alamat</th>
			<th>Telephone</th>
			<th>E-mail</th>
			<th>Action</th>
		</tr>

		<?php
		foreach ($p as $value) {

			?>
			<tr>
				<td><?php echo $value->kode_peserta;?></td>
				<td><?php echo $value->nama_peserta;?></td>
				<td><?php echo $value->umur;?></td>
				<td><?php echo $value->jenis_kelamin;?></td>
				<td><?php echo $value->alamat;?></td>
				<td><?php echo $value->tlp;?></td>
				<td><?php echo $value->email;?></td>
				<td>
					<a class="btn btn-danger " href="<?php echo site_url('#').$value->kode_peserta;?>" onclick="return confirm('Are you sure?')">Hapus</a>
					<a class="btn btn-info " href="<?php echo site_url('#').$value->kode_peserta;?>">Edit</a>
				</td>
			</tr>
		<?php } ?>
	</tr>
</table>
</div>