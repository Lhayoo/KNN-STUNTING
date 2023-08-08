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
<h1 align="center">Data Poli Klinik</h1>

<div class="rekam">
	<?php echo anchor('Poli/form', 'Tambah Data', array('class'=>'button')); ?>
</div>
<div class="list" style="margin-top: 20px;">
	<table class="table table-dark" align="center">
		<tr>
			<th>Kode Poli</th>
			<th>Nama Poli</th>
			<th>Action</th>
		</tr>

		<?php
		foreach ($p as $value) {

			?>
			<tr>
				<td><?php echo $value->kode_poli;?></td>
				<td><?php echo $value->nama_poli;?></td>
				<td>
					<a class="btn btn-danger" href="<?php echo site_url('#').$value->kode_poli;?>" onclick="return confirm('Are you sure?')">Hapus</a>
					<a class="btn btn-info " href="<?php echo site_url('#').$value->kode_poli;?>">Edit</a>
				</td>
			</tr>
		<?php } ?>
	</tr>
</table>
</div>