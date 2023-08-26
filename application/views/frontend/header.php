<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?= base_url() ?>assets/frontend/images/icons/favicon.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?= base_url() ?>assets/frontend/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?= base_url() ?>assets/frontend/fonts/fontawesome-5.0.8/css/fontawesome-all.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?= base_url() ?>assets/frontend/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?= base_url() ?>assets/frontend/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?= base_url() ?>assets/frontend/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/css/util.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/css/main.css">
    <!--===============================================================================================-->
    <script src="<?= base_url() ?>assets/frontend/vendor/jquery/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

    </script>

    <link href="<?php echo base_url();?>assets/frontend/css/style.css" rel='stylesheet' type='text/css' />
    <!-- custom css -->
    <!--===============================================================================================-->
</head>

<body class="animsition">

    <!-- Header -->
    <header>
        <!-- Header desktop -->

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->
            <div class="logo-mobile">
                <a href="index.html"><img src="<?= base_url() ?>assets/frontend/images/icons/logo_sigata.png"
                        alt="IMG-LOGO"></a>
            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze m-r--8">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>

        <!-- Menu Mobile -->
        <div class="menu-mobile">

            <ul class="main-menu-m">

                <li>
                    <a href="<?= site_url() ?>">BERANDA</a>
                </li>

                <?php
			            $main_menu = $this->db->get_where('tbl_menu', array('is_main_menu' => 0));
			            foreach ($main_menu->result() as $main) {
			              $sub_menu = $this->db->get_where('tbl_menu', array('is_main_menu' => $main->menu_id));
			              if ($sub_menu->num_rows() > 0) { ?>
                <li>
                    <a href="#"><?php echo $main->menu_title; ?></a>
                    <ul class="sub-menu-m">
                        <?php foreach ($sub_menu->result() as $sub) { ?>
                        <li><a href="<?php echo $sub->menu_link; ?>"><?php echo $sub->menu_title; ?></a></li>
                        <?php } ?>
                    </ul>
                    <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span>
                </li>
                <?php } else { ?>
                <li>
                    <a href="<?php echo $main->menu_link; ?>"><?php echo $main->menu_title; ?></a>
                </li>
                <?php }
			            }
			          ?>

                <li>
                    <a href="#">SEBARAN STUNTING</a>
                </li>

                <li>


                    <a href="#">GALERI</a>
                    <ul class="sub-menu-m">
                        <li><a href="<?= site_url('album/view_album') ?>">ALBUM FOTO</a></li>
                        <li><a href="<?= site_url('album/view_album') ?>">ALBUM VIDEO</a></li>
                    </ul>
                    <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span>
                </li>

                <li>
                    <a href="#">DOWNLOAD</a>
                </li>
            </ul>
        </div>

        <!--  -->
        <div class="wrap-logo container">
            <!-- Logo desktop 
				<div class="logo">
					<a href="index.html"><img src="<?= base_url() ?>assets/frontend/images/icons/logo_banner.jpg" alt="LOGO"></a>
				</div> -->

            <!-- Banner -->
            <div class="wrap-logo container">
                <a href="#"><img src="<?= base_url() ?>assets/frontend/images/header.png" width=1200px alt="IMG"></a>
            </div>
        </div>

        <!--  -->
        <div class="wrap-main-nav">
            <div class="main-nav">
                <!-- Menu desktop -->
                <nav class="menu-desktop">

                    <ul class="main-menu">


                        <li>
                            <a href="<?= site_url() ?>">BERANDA</a>
                        </li>

                        <?php
			                $main_menu = $this->db->get_where('tbl_menu', array('is_main_menu' => 0));
			                foreach ($main_menu->result() as $main) {
			                  $sub_menu = $this->db->get_where('tbl_menu', array('is_main_menu' => $main->menu_id));
			                  if ($sub_menu->num_rows() > 0) { ?>
                        <li>
                            <a href="#"><?php echo $main->menu_title; ?> <i style="margin-left: 6px;"
                                    class="fa fa-angle-down" aria-hidden="true"></i></a>
                            <ul class="sub-menu">
                                <?php foreach ($sub_menu->result() as $sub) { ?>
                                <li><a href="<?php echo $sub->menu_link; ?>"><?php echo $sub->menu_title; ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php } else { ?>
                        <li>
                            <a href="<?php echo $main->menu_link; ?>"><?php echo $main->menu_title; ?></a>
                        </li>
                        <?php }
			                }
			              ?>



                        <li>
                            <a href="<?= site_url('publik') ?>">SEBARAN NARKOBA</a>
                        </li>



                        <li>
                            <a href="#">GALERI <i style="margin-left: 6px;" class="fa fa-angle-down"
                                    aria-hidden="true"></i></a>
                            <ul class="sub-menu">
                                <li><a href="<?= site_url('album/view_album') ?>">ALBUM FOTO</a></li>
                                <li><a href="<?= site_url('album/view_video') ?>">ALBUM VIDEO</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="<?= site_url('download') ?>">DOWNLOAD</a>
                        </li>

                        <li>
                            <a href="<?= site_url('Contact') ?>">KONTAK</a>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>
        </div>
    </header>