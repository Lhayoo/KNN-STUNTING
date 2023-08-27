<style type="text/css">
  p{
    font-size: 14px !important;
  }
</style>
<h4><b>Narkoba <?= $query['nama_narkoba'] ?></b></h4>
<hr>
<div class='row' style="font-weight: 12px;">
    <div class="col-sm-6" style="border-right: 1px solid #cfd8dc">
        <h6><b>Kode Narkoba:</b></h6>
        <p style="margin-left: 5%"><?php echo $query['kode_narkoba'] ?></p>
        <h6><b>Jenis Narkoba:</b></h6>
        <p style="margin-left: 5%"><span class="badge badge-primary"><?php echo $query['jenis_narkoba'] ?></span></p>
        <h6><b>Nama Narkoba:</b></h6>
        <p style="margin-left: 5%"><?php echo $query['nama_narkoba'] ?></p>
        <h6><b>Jumlah:</b></h6>
        <p style="margin-left: 5%"><?php echo $query['jumlah'] ?></p>
        <h6><b>Kelurahan:</b></h6>
        <p style="margin-left: 5%"><?php echo $query['nama_kelurahan'] ?></p>
        <h6><b>Kecamatan:</b></h6>
        <p style="margin-left: 5%"><?php echo $query['nama_kecamatan'] ?></p>
        <h6><b>Lokasi:</b></h6>
        <p style="margin-left: 5%">
              <a target="_blank" href="<?php echo("https://www.google.co.id/maps/search/". $query['lat'].",+". $query['lng']."") ?>">
              <?php echo $query['lat'] ?>, <?php echo $query['lng'] ?>
            </a>
        </p>
    </div>
    <div class="col-sm-6">
        <h6><b>Keterangan Kasus:</b></h6>
        <p style="margin-left: 5%; text-align: justify;">
          <?php echo $query['alamat']; ?>
        </p>
        <h6><b>Gambar:</b></h6>
        <p style="margin-left: 5%; text-align: justify;">
          <img class="img-responsive" src="<?php echo base_url();?>uploads/gambar_narkoba/<?php echo $query['gambar']; ?>">
        </p>
    </div>
</div>
