<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Edit Data Video</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form method="POST" action="<?php echo base_url() . "index.php/Video/processUpdate/" ?>"
                                enctype="multipart/form-data">
                                <div class="col-lg">
                                    <h2>Data Video</h2>
                                    <hr>
                                    <input type="hidden" value="<?= $video->post_id ;?>" name="id">

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Judul Video</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="title"
                                                placeholder="Nama Video" required value="<?= $video->post_title ;?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Embed Video URL</label>
                                        <div class="col-sm-10">
                                            <textarea type="text" class="form-control" name="link"
                                                placeholder="Deskripsi "
                                                required><?= $video->post_content ;?></textarea>
                                        </div>

                                    </div>
                                    <div class="col-lg-12 text-center mt-2">
                                        <a href="<?= base_url('Video') ;?>" class="btn btn-secondary text-white"
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