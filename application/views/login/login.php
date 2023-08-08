<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?= base_url('build/img/'); ?>icon-posyandu.png">

    <title><?= $title; ?></title>

    <!-- Bootstrap -->
    <link href="<?= base_url('vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url('vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url('vendors/nprogress/nprogress.css') ?>" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url('vendors/animate.css/animate.min.css') ?>" rel="stylesheet">
    <!-- Toastr alert -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('build/css/toastr.min.css') ?>">

    <!-- Custom Theme Style -->
    <link href="<?= base_url('build/css/custom.min.css') ?>" rel="stylesheet">
</head>

<body>
    <div class="bg-images"></div>
    <div class="bg-text">
        <section class="login_content">
            <form class="user validate-form" action="<?php echo base_url('login'); ?>" method="POST">
                <h1>Login Form</h1>
                <div class="form-group wrap-input100" data-validate="Masukkan Username">
                    <input type="text" class="form-control" placeholder="Username" required="" name="username" autofocus value="<?= set_value('username'); ?>" />
                    <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group wrap-input100" data-validate="Masukkan Password">
                    <input type="password" class="form-control" placeholder="Password" required="" name="password" />
                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Login
                </button>
                <div class="clearfix"></div>

                <div class="separator">
                    <div class="clearfix"></div>
                    <br />

                    <div>
                        <h1><img style="width: 29px; height: 29px; border-radius: 50%; margin-right: 10px" src="<?= base_url('build/img/'); ?>logo-posyandu-1.png" alt=""></i>Sistem Informasi Stunting</h1>
                        <span>Copyright &copy; Kecamatan Kesesi <?= date('Y'); ?></span>
                    </div>
                </div>
            </form>
        </section>
    </div>