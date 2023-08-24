<div class="col-md-3 left_col sidebar_fixed">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a class="site_title"><img style="width: 29px; height: 29px; border-radius: 50%; margin-left: 10px"
                    src="<?= base_url('build/img/'); ?>logo-posyandu-1.png" alt=""></i> <span>STUNTING & </span></a>
        </div>

        <div class="clearfix"></div>
        <br />
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a href="<?= base_url('dashboard/petugas') ?>"><i class="fa fa-home"></i> Dashboard</a>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>Master</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-child"></i>Daerah <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?= base_url('Kelurahan') ?>">Kelurahan</a></li>
                            <li><a href="<?= base_url('Kecamatan') ?>">Kecamatan</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav side-menu">
                    <li><a href="<?= base_url('Menu') ?>"><i class="fa fa-child"></i>
                            Menu</a>
                    </li>
                </ul>
                <ul class="nav side-menu">
                    <li><a href="<?= base_url('slider') ?>"><i class="fa fa-child"></i>
                            Slider</a>
                    </li>
                </ul>
                <ul class="nav side-menu">
                    <li><a href="<?= base_url('blog') ?>"><i class="fa fa-child"></i>
                            Artikel</a>
                    </li>
                </ul>
                <h3>Data Balita dan User</h3>
                <ul class="nav side-menu">
                    <li><a href="<?= base_url('UsersController') ?>"><i class="fa fa-user"></i> Data Users</a>
                    </li>
                </ul>


                <ul class="nav side-menu">
                    <li><a href="<?= base_url('balita') ?>"><i class="fa fa-child"></i> Data Balita</a>
                    </li>
                </ul>
                <ul class="nav side-menu">
                    <li><a href="<?= base_url('Penimbangan_Balita') ?>"><i class="fa fa-child"></i> Penimbangan
                            Balita</a>
                    </li>
                </ul>
                <ul class="nav side-menu">
                    <li><a href="<?= base_url('laporan_anak') ?>"><i class="fa fa-file-pdf-o"></i> Laporan Balita</a>
                    </li>
                </ul>

            </div>

            <div class="menu_section">
                <h3>Pengolah Data Balita dengan KNN</h3>


                <ul class="nav side-menu">
                    <li><a href="<?= base_url('knn') ?>"><i class="fa fa-child"></i> Data Train Balita</a>
                    </li>
                </ul>
                <ul class="nav side-menu">
                    <li><a href="<?= base_url('knn_balita') ?>"><i class="fa fa-child"></i>Data Uji Balita</a>
                    </li>
                </ul>

            </div>

            <div class="menu_section">
                <h3>Logout</h3>
                <ul class="nav side-menu">
                    <li><a href="<?= base_url('Login/logout') ?>"><i class="fa fa-file-pdf-o"></i> Logout</a>
                    </li>
                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->
    </div>
</div>