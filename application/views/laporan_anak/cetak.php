<div class="x_content">
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Balita</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Berat Badan</th>
                        <th>Panjang Badan</th>
                        <th>Tanggal Penimbangan</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($penimbangan as $b) : ?>
                        <tr>
                            <th scope="row">
                                <center><?= $i; ?></center>
                            </th>
                            <td><?= $b['namaBayi']; ?></td>
                            <td><?= $b['tanggalLahir']; ?></td>
                            <td><?= $b['jenisKelamin']; ?></td>
                            <td><?= $b['beratLahir']; ?></td>
                            <td><?= $b['panjangLahir']; ?></td>
                            <td><?= $b['tgl_skrng']; ?></td>
                            <td><?= $b['status']; ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
<script>
    window.print();
</script>