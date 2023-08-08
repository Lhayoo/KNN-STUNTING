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
  <a href="<?= base_url('Penimbangan_Anak') ?>" class="btn btn-warning">Kembali</a>
  <a href="<?= base_url('Laporan_Anak/cetak_grafik/'. $getById['id']) ?>" class="btn btn-success">Cetak</a>
 
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <script type="text/javascript">
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
    type: 'bar',
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
            backgroundColor: '#b7ca1f',
            borderColor: '#93C3D2',
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
            label: 'Pengecekan Tinggi',
            backgroundColor: '#00ac8a',
            borderColor: '#93C3D2',
            data: [
              <?php
                if (count($graph)>0) {
                   foreach ($graph as $data) {
                    echo $data->tinggi . ", ";
                  }
                }
              ?>
            ]
        }]
    },
});
setTimeout(() => {
    window.print();
}, 2*1000);
  </script>
  </body>
</html>