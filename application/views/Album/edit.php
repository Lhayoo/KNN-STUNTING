<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Edit Data Album</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form method="POST" action="<?php echo base_url() . "index.php/Album/processUpdate/" ?>"
                                enctype="multipart/form-data">
                                <div class="col-lg">
                                    <h2>Data Album</h2>
                                    <hr>
                                    <input type="hidden" value="<?= $album->album_id ;?>" name="id">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama Album</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="title"
                                                placeholder="Nama Album" required value="<?= $album->album_name ;?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Deskripsi</label>
                                        <div class="col-sm-10">
                                            <textarea type="text" class="form-control" name="desc"
                                                placeholder="Deskripsi" required><?= $album->album_desc ;?>
                                            </textarea>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Thumbnail Album</label>
                                        <div class="col-sm-10">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="gambar" name="userfile"
                                                    id="inputgambar">
                                                <label class="custom-file-label" for="gambar">Choose file</label>
                                            </div>
                                            <img src="<?= base_url('./uploads/album/'.$album->album_thumbnail) ;?>"
                                                class="img-thumbnail" style="width: 200px">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="status" required>
                                                <option value="">-- Pilih Status --</option>
                                                <option value="1" <?= ($album->album_status == '1')?'selected':'' ;?>>
                                                    Publish</option>
                                                <option value="0" <?= ($album->album_status == '0')?'selected':'' ;?>>
                                                    Draft
                                                </option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-lg-12 text-center mt-2">
                                        <a href="<?= base_url('Album') ;?>" class="btn btn-secondary text-white"
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