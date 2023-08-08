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
<h1 align="center">Data Bidan Klinik</h1>

<div class="rekam">
	<?php echo anchor('Bidan/form', 'Tambah Data', array('class'=>'button')); ?>
</div>
<div class="list" style="margin-top: 20px;">
	<table align="center" class="table table-dark">
		<thead>
		<tr>
			<th >Kode Bidan</th>
			<th >Nama Bidan</th>
			<th >Kode Poli</th>
			<th >Action</th>
		</tr>
		</thead>
		<tbody>

		<?php
		foreach ($bidan as $value) {

			?>
			<tr>
				<td><?php echo $value->kode_bidan;?></td>
				<td><?php echo $value->nama_bidan;?></td>
				<td><?php echo $value->kode_poli;?></td>
				<td>
					<a class="btn btn-danger" href="<?php echo site_url('#').$value->kode_bidan;?>" onclick="return confirm('Are you sure?')">Hapus</a>
					<a class="btn btn-info" href="<?php echo site_url('#').$value->kode_bidan;?>">Edit</a>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>
</div>