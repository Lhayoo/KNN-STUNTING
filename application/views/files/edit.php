<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Edit Data File</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form method="POST" action="<?php echo base_url() . "index.php/File/processUpdate/" ?>"
                                enctype="multipart/form-data">
                                <div class="col-lg">
                                    <h2>Data File</h2>
                                    <hr>
                                    <input type="hidden" value="<?= $file->file_id ;?>" name="id">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama File</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="title" placeholder="Nama File"
                                                required value="<?= $file->file_title ;?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Deskripsi</label>
                                        <div class="col-sm-10">
                                            <textarea type="text" class="form-control" name="desc"
                                                placeholder="Deskripsi " required><?= $file->file_desc ;?></textarea>
                                        </div>

                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Upload File</label>
                                        <div class="col-sm-10">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="gambar" name="userfile"
                                                    id="inputgambar">

                                                <p>File saat ini : <?php echo $file->file_name;?></p>
                                                <label class="custom-file-label" for="gambar">Choose file</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="status" required>
                                                <option value="1" <?= ($file->file_visibility == 1) ? 'selected': '';?>>
                                                    Publish</option>
                                                <option value="0" <?= ($file->file_visibility == 0) ? 'selected': '';?>>
                                                    Private</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-lg-12 text-center mt-2">
                                        <a href="<?= base_url('File') ;?>" class="btn btn-secondary text-white"
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