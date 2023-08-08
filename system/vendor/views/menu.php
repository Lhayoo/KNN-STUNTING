<style type="text/css">
	.border{
		border: 1px solid black;
	}
	.border li{
		list-style: none;
	}
	.border li a{
		text-decoration: none;
		color: black;
	}
	.border li a:hover{
		color: grey;
	}
	ul{
		margin-left: 20px;
		margin-right: 25px;
	}
</style>
<h3 align="center">MENU</h3>
<ul class="border">
	<br>
	<li><b>FORM</b></li>
	<br>
	<li><?php echo anchor('peserta/form', 'Data Peserta'); ?></li>
	<li><?php echo anchor('bidan/form', 'Data Bidan'); ?></li>
	<li><?php echo anchor('poli/form', 'Data Poli'); ?></li>
	<li><?php echo anchor('rekam/form', 'Data Rekam Medis'); ?></li>
	<br>
</ul>
<br>
<ul class="border">
	<br>
	<li><b>LAPORAN</b></li>
	<br>
	<li><?php echo anchor('peserta/list', 'List Peserta'); ?></li>
	<li><?php echo anchor('bidan/list', 'List Bidan'); ?></li>
	<li><?php echo anchor('poli/list', 'List Poli'); ?></li>
	<li><?php echo anchor('rekam', 'List Data Rekam Medis'); ?></li>
	<br>
</ul>