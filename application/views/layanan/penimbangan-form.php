<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Penimbangan Anak</h3>
        </div>
    </div>
    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('msg'); ?>"></div>
    <?php if ($this->session->flashdata('msg')) : ?>

    <?php endif; ?>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url('user/profile'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="username">Nama Anak
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                    <input type="text" id="idPelanggan" name="idPelanggan" readonly="" class="form-control">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-warning" type="button" data-toggle="modal" data-target="#pelangganModal">Browse</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Jenis Kelamin
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="name" name="name" required="required" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Tanggal Lahir
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="name" name="name" required="required" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Nama Ibu
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="name" name="name" required="required" class="form-control" readonly>
                            </div>
                        </div>
                        <hr>
                        <div class="x_title">
                            <h2>Pertumbuhan</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Tanggal Sekarang
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="name" name="name" required="required" class="form-control">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Usia
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="name" name="name" required="required" class="form-control">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Berat Badan [BB]
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="name" name="name" required="required" class="form-control">
                            </div>
                            <label class="col-form-label label-align" for="name">kg
                            </label>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Tinggi Badan [TB]
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="name" name="name" required="required" class="form-control">
                            </div>
                            <label class="col-form-label label-align" for="name">cm
                            </label>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Deteksi
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="name" name="name" required="required" class="form-control">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Keterangan
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="name" name="name" required="required" class="form-control">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button type="submit" name="submit" class="btn btn-success">Proses</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>