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

            <div class="sidebar-heading">
                Absensi
            </div>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('absensi') ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Absensi</span>
                </a>
            </li>
            <li class="nav-item" <?= $hide; ?>>
                <a class="nav-link" href="<?= base_url('absensi/laporan') ?>">
                    <i class="fas fa-fw fa-mail-bulk"></i>
                    <span>Laporan</span>
                </a>
            </li>
            <hr class="sidebar-divider">
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