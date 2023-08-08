<div class="right_col" role="main">
    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('msg'); ?>"></div>
    <?php if ($this->session->flashdata('msg')) : ?>

    <?php endif; ?>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Profile</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url('user/profile'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="username">Username <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="username" name="username" required="required" class="form-control" value="<?= $user['username']; ?>" readonly>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Nama Lengkap <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="name" name="name" required="required" class="form-control" value="<?= $user['name']; ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Foto Profil </label>
                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-md-3 col-sm-3">
                                        <img src="<?= base_url('build/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                                    </div>
                                    <div class="col-md-9 col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image" />
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="current-password" class="col-form-label col-md-3 col-sm-3 label-align">Current Password</label>
                            <div class="col-md-6 col-sm-6">
                                <input id="current-password" class="form-control" type="password" name="current-password">
                                <span style="color: green"><i>Kosongkan, jika tidak perlu diubah</i></span>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="new-password" class="col-form-label col-md-3 col-sm-3 label-align">New Password</label>
                            <div class="col-md-6 col-sm-6">
                                <input id="new-password" class="form-control" type="password" name="new-password">
                                <span style="color: green"><i>Kosongkan, jika tidak perlu diubah</i></span>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="repeat-password" class="col-form-label col-md-3 col-sm-3 label-align">Repeat Password</label>
                            <div class="col-md-6 col-sm-6">
                                <input id="repeat-password" class="form-control" type="password" name="repeat-password">
                                <span style="color: green"><i>Kosongkan, jika tidak perlu diubah</i></span>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button type="submit" name="submit" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>