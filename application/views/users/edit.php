
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Tambah Data Users</h3>
        </div>
    </div>
    <div class="flash-dataq" data-flashdata="<?php echo $this->session->flashdata('msg'); ?>"></div>
    <?php if ($this->session->flashdata('msg')) : ?>

    <?php endif; ?>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form method ="POST" action="<?php echo base_url() . "UsersController/doUpdate/" ?>">
                                <div class="col-lg-6">
                                    <h2>Informasi Pribadi</h2>
                                    <hr>
                                    <div class="form-group">
                                        <label>Nama User</label>
                                        <input class="form-control" type="text" name="name" onkeypress="return anyaHuruf(event)" title="Nama" value="<?= $user['name'] ?>" required>
                                        <input class="form-control" type="text" name="id" value="<?= $user['id_users'] ?>">
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" type="text" name="username"  onkeypress="return hanyaHuruf(event)" required value="<?= $user['username'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" type="text" name="password" onkeypress="return hanyaHuruf(event)" required value="<?= $user['password'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Role User</label>
                                        <select name="level" class="form-control">
                                        <?php if($user['level_id'] == 1  ){ ?>
                                                <option value="1" checked>Petugas</option>
                                                <option value="2">Peserta</option>
                                            <?php }else{ ?>
                                                <option value="1">Petugas</option>
                                                <option value="2" checked>Peserta</option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn btn-info" style="width: 25%">Simpan Data</button>
                                </div>
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
