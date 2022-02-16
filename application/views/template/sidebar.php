<?php

if ($this->session->userdata('role') == 5) {
    $hide = "hidden";
} else {
    $hide = "";
} ?>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <img src="<?= base_url('assets/backand/') ?>img/logo32.png">
                </div>
                <div class="sidebar-brand-text mx-3">Absensi Loteng</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item" <?= $hide; ?>>
                <a class="nav-link" href="<?= base_url('dashboard/dash') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('dashboard/cek') ?>">
                    <i class="fas fa-fw fa-user-tie"></i>
                    <span>Profile</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading" <?= $hide ?>>
                Admin
            </div>
            <li class="nav-item" <?= $hide ?>>
                <a class="nav-link" href="<?= base_url('opd') ?>">
                    <i class="fas fa-fw fa-building"></i>
                    <span>Gedung OPD</span>
                </a>
            </li>
            <li class="nav-item" <?= $hide ?>>
                <a class="nav-link" href="<?= base_url('user') ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Pegawai</span>
                </a>
            </li>
            <hr class="sidebar-divider" <?= $hide ?>>
            <?php
            if ($this->session->userdata('opd')) {  ?>
                <div class="sidebar-heading">
                    Absensi
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('absen_masuk') ?>">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Absen Masuk</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('absen_pulang') ?>">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Absen Pulang</span>
                    </a>
                </li>
            <?php } ?>
            <hr class="sidebar-divider" <?= $hide; ?>>
            <div class="sidebar-heading" <?= $hide; ?>>
                Laporan
            </div>
            <li class="nav-item" <?= $hide; ?>>
                <a class="nav-link" href="<?= base_url('laporan') ?>">
                    <i class="fas fa-fw fa-user-clock"></i>
                    <span>Laporan Mingguan</span>
                </a>
            </li>
            <li class="nav-item" <?= $hide; ?>>
                <a class="nav-link" href="<?= base_url('jam_kerja') ?>">
                    <i class="fas fa-fw fa-user-clock"></i>
                    <span>Laporan Bulanan</span>
                </a>
            </li>
            <li class="nav-item" <?= $hide; ?>>
                <a class="nav-link" href="<?= base_url('jam_kerja') ?>">
                    <i class="fas fa-fw fa-user-clock"></i>
                    <span>Laporan Tahunan</span>
                </a>
            </li>
            <hr class="sidebar-divider" <?= $hide; ?>>
            <div class="sidebar-heading" <?= $hide; ?>>
                Setting
            </div>
            <li class="nav-item" <?= $hide; ?>>
                <a class="nav-link" href="<?= base_url('jam_kerja') ?>">
                    <i class="fas fa-fw fa-user-clock"></i>
                    <span>Jam Kerja</span>
                </a>
            </li>
            <hr class="sidebar-divider" <?= $hide; ?>>
            <div class="sidebar-heading" <?= $hide; ?>>
                Manajemen User
            </div>
            <li class="nav-item" <?= $hide; ?>>
                <a class="nav-link" href="<?= base_url('user') ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Users</span>
                </a>
            </li>

            <li class="nav-item" <?= $hide; ?>>
                <a class="nav-link" href="<?= base_url('role') ?>">
                    <i class="fas fa-fw fa-users-cog"></i>
                    <span>Role</span>
                </a>
            </li>

            <hr class="sidebar-divider" <?= $hide; ?>>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('role/hakases') ?>" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Keluar</span>
                </a>
            </li>
        </ul>
        <!-- Sidebar -->