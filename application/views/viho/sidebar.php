<!-- Page Body Start-->
<div class="page-body-wrapper horizontal-menu">
    <!-- Page Sidebar Start-->
    <header class="main-nav">
        <div class="sidebar-user text-center"><a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a>
            <?php
            if ($this->session->userdata('foto')) {
            ?>
                <img class="img-90 rounded-circle" src="<?= base_url('assets/backand/img/profile/') . $this->session->userdata('foto') ?>" alt="">
            <?php } else {
            ?>
                <img class="img-90 rounded-circle" src="<?= base_url('assets/backand/img/default.png') ?>">
            <?php
            } ?>
            <div class="badge-bottom"><span class="badge badge-primary">New</span></div><a href="user-profile.html">
                <h6 class="mt-3 f-14 f-w-600"><?= $this->session->userdata('namalengkap') ?></h6>
            </a>
            <p class="mb-0 font-roboto">
                <?php
                $getrole = $this->db->get_where('role', ['idrole' => $this->session->userdata('role')])->row();
                // var_dump($getrole);
                echo $getrole->role;
                ?>
            </p>
        </div>
        <nav>
            <div class="main-navbar">
                <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                <div id="mainnav">
                    <ul class="nav-menu custom-scrollbar">
                        <li class="back-btn">
                            <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                        </li>
                        <li class="dropdown"><a class="nav-link menu-title link-nav" href="<?= base_url('dashboard/dash') ?>"><i data-feather="home"></i><span>Dashboard</span></a>
                        </li>
                        <li class="dropdown"><a class="nav-link menu-title link-nav" href="<?= base_url('dashboard/cek') ?>"><i data-feather="user"></i><span>Profile</span></a>
                        </li>
                        <li class="dropdown"><a class="nav-link menu-title link-nav" href="<?= base_url('absensi') ?>"><i data-feather="user-check"></i><span>Absen</span></a>
                        </li>
                        <li class="dropdown"> <a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="server"></i><span>Admin OPD </span></a>
                            <ul class="nav-submenu menu-content">
                                <li><a href="<?= base_url('opd') ?>">OPD Loteng</a></li>
                                <li><a href="<?= base_url('bagian') ?>">Bidang OPD</a></li>
                                <li><a href="<?= base_url('hari_libur') ?>">Hari Libur</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"> <a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="package"></i><span>Rekapan Absensi</span></a>
                            <ul class="nav-submenu menu-content">
                                <li><a href="datepicker.html">Rekapan</a></li>
                                <li><a href="time-picker.html">Laporan</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"> <a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="users"></i><span>Manajemen User</span></a>
                            <ul class="nav-submenu menu-content">
                                <li><a href="<?= base_url('user') ?>">User</a></li>
                                <li><a href="<?= base_url('role') ?>">Role</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
                <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </div>
        </nav>
    </header>
    <!-- Page Sidebar Ends-->