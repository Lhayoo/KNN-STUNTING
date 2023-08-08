<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 
    <title>Grafik</title>
  </head>
  <body>
 
  <div class="container">
    <canvas id="myChart"></canvas>
  </div>
  <a href="<?= base_url('Penimbangan_Balita') ?>" class="btn btn-warning">Kembali</a>
  <a href="<?= base_url('Laporan_Anak/cetak_grafik/'. $getById['id']) ?>" class="btn btn-success">Cetak</a>
  
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <script type="text/javascript">
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [
          <?php
            if (count($graph)>0) {
              foreach ($graph as $data) {
                echo "'" .$data->tgl_penimbangan ."',";
              }
            }
          ?>
        ],
        datasets: [{
            label: 'Pengecekan Berat ',
            backgroundColor: '#E6E6FA',
            borderColor: '#8B0000',
            data: [
              <?php
                if (count($graph)>0) {
                   foreach ($graph as $data) {
                    echo $data->beratUpdate . ", ";
                  }
                }
              ?>
            ]
        },{
            
        }]
    },
});
 
  </script>
  </body>
</html>