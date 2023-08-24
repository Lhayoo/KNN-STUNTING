<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Tambah Data Artikel</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form method="POST" action="<?php echo base_url() . "index.php/Blog/processAdd/" ?>"
                                enctype="multipart/form-data">
                                <div class="col-lg">
                                    <h2>Data Artikel</h2>
                                    <hr>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Judul Artikel</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="title"
                                                placeholder="Judul Artikel" required>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Kategori</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="kategori" required>
                                                <option value="">-- Pilih Kategori --</option>
                                                <option value="Kota">Berita Kota</option>
                                                <option value="Luar">Berita Luar</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Content</label>
                                        <div class="col-sm-10">
                                            <textarea name="content" class="ckeditor" id="ckeditor"></textarea>
                                            <p class="text-danger"><?php echo form_error('content'); ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Gambar Thumbnail</label>
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
                                                <option value="1">Publish</option>
                                                <option value="0">Draft</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-12 text-center mt-2">
                                    <a href="<?= base_url('Blog') ;?>" class="btn btn-secondary text-white"
                                        style="width: 25%">Back</a>

                                    <button type="submit" class="btn btn-info" style="width: 25%">Simpan Data</button>
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
function hanyaHuruf(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 32 && (charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && charCode > 39)
        return false;
    return true;
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<!-- /.content-wrapper -->