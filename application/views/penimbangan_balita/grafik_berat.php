<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_content">
<div class="panel panel-headline">
	<div class="panel-heading">
		<h3 class="panel-title">Grafik Berat Badan <?php echo $balita->namaBayi ?></h3>
	</div>
	<div class="panel-body">
		<div id="chart" style="width: 100%;height: 365px"></div>
	</div>
</div>
</div>
<script>
	google.charts.load('current', {packages: ['corechart', 'line']});
	google.charts.setOnLoadCallback(drawBasic);

	function drawBasic() {

		var data = new google.visualization.DataTable();
		data.addColumn('number', 'X');
		data.addColumn('number', <?php echo "'".$balita->namaBayi."'"; ?>);

		data.addRows([
				<?php 
				$no=0;
				foreach($penimbangan as $p) {
					echo
					"[".$no.", ".$p->beratLahir."],";
					$no++;
				}
				?>
			]);

		var options = {
			hAxis: {
				title: 'Bulan'
			},
			vAxis: {
				title: 'Berat Badan (Kg)'
			}
		};

		var chart = new google.visualization.LineChart(document.getElementById('chart'));
		chart.draw(data, options);
	}
</script>