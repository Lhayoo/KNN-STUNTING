<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sistem Informasi Geografis Sebaran Kasus Narkoba Polres Pekalongan Kota | SIGAP :: Polres Pekalongan Kota
    </title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="gis, keluarga, kota pekl" />

    <script>
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>

    <!-- css files -->
    <link href="<?php echo base_url();?>assets/publik/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- bootstrap css -->
    <link href="<?php echo base_url();?>assets/publik/css/style.css" rel='stylesheet' type='text/css' />
    <!-- custom css -->
    <link href="<?php echo base_url();?>assets/publik/css/fontawesome-all.css" rel="stylesheet"><!-- fontawesome css -->
    <!-- //css files -->

    <!-- google fonts -->
    <link
        href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext"
        rel="stylesheet">
    <link
        href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
        rel="stylesheet">
    <!-- //google fonts -->

    <!-- js -->
    <script src="<?php echo base_url();?>assets/js/jquery-2.2.3.min.js"></script>
    <script src="<?php echo base_url();?>assets/publik/js/bootstrap.js"></script>

    <!-- scrolling script -->
    <script>
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event) {
            event.preventDefault();
            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 1000);
        });
    });
    </script>
    <!-- //scrolling script -->
</head>

<body>

    <nav class="navbar fixed-top navbar-expand-md navbar-light bg-light">
        <div class="container-fluid">
            <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><i class="fa fa-home"></i> Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-list"></i> Profil
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#"><i class="fa fa-angle-right"></i> Visi Misi</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-angle-right"></i> Struktur Organisasi</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-phone-square"></i> Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-newspaper"></i> Berita</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-puzzle-piece"></i> Galeri
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#"><i class="fa fa-angle-right"></i> Foto</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-angle-right"></i> Video</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-map-signs"></i> Narkoba
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#"><i class="fa fa-angle-right"></i> Sabu-sabu</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-angle-right"></i> Ganja</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-angle-right"></i> Alphrazolam</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-angle-right"></i> Dextro</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="mx-auto order-0">
                <a class="navbar-brand mx-auto" href="#">
                    <h2><i class="fa fa-globe"></i> SIGAP</h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModalCenter"><i
                                class="fa fa-lock"></i> Login Sistem</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-top: 100px;">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img height="500" class="d-block w-100" src="<?php echo base_url() ?>assets/publik/images/slide1.jpg"
                    alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h2>SIGAP</h2>
                    <p>Sistem Informasi Geografis Sebaran Kasus narkoba Polres Pekalongan Kota</p>
                </div>
            </div>
            <div class="carousel-item">
                <img height="500" class="d-block w-100" src="<?php echo base_url() ?>assets/publik/images/slide2.jpg"
                    alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h2>SIGAP</h2>
                    <p>Sistem Informasi Geografis Sebaran Kasus narkoba Polres Pekalongan Kota</p>
                </div>
            </div>
            <div class="carousel-item">
                <img height="500" class="d-block w-100" src="<?php echo base_url() ?>assets/publik/images/slide3.jpg"
                    alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h2>SIGAP</h2>
                    <p>Sistem Informasi Geografis Sebaran Kasus Narkoba Polres Pekalongan Kota</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>