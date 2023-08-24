<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Tambah Data slider</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form method="POST" action="<?php echo base_url() . "index.php/slider/processAdd/" ?>"
                                enctype="multipart/form-data">
                                <div class="col-lg">
                                    <h2>Data slider</h2>
                                    <hr>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Judul slider</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="title"
                                                placeholder="Judul slider" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Deskripsi</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="desc" placeholder="Deskripsi "
                                                required>
                                        </div>

                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Gambar slider</label>
                                        <div class="col-sm-10">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="gambar" name="userfile"
                                                    id="inputgambar">
                                                <label class="custom-file-label" for="gambar">Choose file</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="status" required>
                                                <option value="">-- Pilih Status --</option>
                                                <option value="aktif">Aktif</option>
                                                <option value="tidak">Tidak Aktif</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-lg-12 text-center mt-2">
                                        <a href="<?= base_url('slider') ;?>" class="btn btn-secondary text-white"
                                            style="width: 25%">Back</a>

                                        <button type="submit" class="btn btn-info" style="width: 25%">Simpan
                                            Data</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').html(fileName);

});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<!-- /.content-wrapper -->