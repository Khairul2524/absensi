<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="<?= base_url('assets/backand') ?>/img/logo32.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url('assets/backand') ?>/img/logo32.png" type="image/x-icon">
    <title>Absensi Loteng</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/viho') ?>/css/fontawesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/viho') ?>/css/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/viho') ?>/css/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/viho') ?>/css/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/viho') ?>/css/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/viho') ?>/css/animate.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/viho') ?>/css/chartist.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/viho') ?>/css/date-picker.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/viho') ?>/css/prism.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/viho') ?>/css/vector-map.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/viho') ?>/css/calendar.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/viho') ?>/css/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/viho') ?>/css/style.css">
    <link id="color" rel="stylesheet" href="<?= base_url('assets/viho') ?>/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/viho') ?>/css/responsive.css">
</head>

<body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
        <div class="theme-loader">
            <div class="loader-p"></div>
        </div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <div class="page-main-header">
            <div class="main-header-right row m-0">
                <div class="main-header-left">
                    <div class="logo-wrapper"><a href="index.html"><img class="img-fluid" src="<?= base_url('assets/backand') ?>/img/logo32.png" alt=""></a></div>
                    <div class="dark-logo-wrapper"><a href="index.html"><img class="img-fluid" src="<?= base_url('assets/backand') ?>/img/logo32.png" alt=""></a></div>
                    <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle"></i></div>
                </div>
                <div class="left-menu-header col">
                    <ul>
                        <li>
                            <form class="form-inline search-form">
                                <div class="search-bg"><i class="fa fa-search"></i>
                                    <input class="form-control-plaintext" placeholder="Search here.....">
                                </div>
                            </form><span class="d-sm-none mobile-search search-bg"><i class="fa fa-search"></i></span>
                        </li>
                    </ul>
                </div>
                <div class="nav-right col pull-right right-menu p-0">
                    <ul class="nav-menus">

                        <li class="onhover-dropdown p-0">
                            <button class="btn btn-primary-light" type="button"><a href="<?= base_url('auth/logout') ?>"><i data-feather="log-out"></i>Log out</a></button>
                        </li>
                    </ul>
                </div>
                <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
            </div>
        </div>
        <!-- Page Header Ends                              -->
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
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3>Dashboard</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid starts-->
                <div class="container-fluid dashboard-default-sec">
                    <div class="col-xl-12 box-col-12 des-xl-100">
                        <div class="row">
                            <div class="col-xl-4 col-50 box-col-4 des-xl-50">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="header-top d-sm-flex align-items-center">
                                            <h5>Jumlah Staf</h5>
                                            <div class="center-content">
                                                <p class="d-flex align-items-center"><i class=" fa fa-users me-2"></i>80 Orang</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-3 col-sm-6 box-col-3 des-xl-25 rate-sec">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="header-top d-sm-flex align-items-center">
                                            <h5>Jumlah Masuk</h5>
                                            <div class="center-content">
                                                <p class="d-flex align-items-center"><i class=" fa fa-users me-2"></i>80 Orang</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-3 col-sm-6 box-col-3 des-xl-25 rate-sec">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="header-top d-sm-flex align-items-center">
                                            <h5>Jumlah Izin</h5>
                                            <div class="center-content">
                                                <p class="d-flex align-items-center"><i class=" fa fa-user me-2"></i>80 Orang</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="col-sm-12 col-xl-6 box-col-6">
                                <div class="card">
                                    <div class="card-header pb-0">
                                        <h5>Performence </h5>
                                    </div>
                                    <div class="card-body apex-chart">
                                        <div id="donutchart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-xl-6 box-col-6">
                                <div class="card">
                                    <div class="card-header pb-0">
                                        <h5>Donut Chart</h5>
                                    </div>
                                    <div class="card-body apex-chart">
                                        <div id="pie"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8 recent-order-sec">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <h5>Hari Libur</h5>
                                            <table class="table table-bordernone">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Date</th>
                                                        <th>Quantity</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>

                                                        </td>
                                                        <td>
                                                            <p>16 August</p>
                                                        </td>
                                                        <td>
                                                            <p>54146</p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header pb-0">
                                            <h5>Sample Card</h5><span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                                        </div>
                                        <div class="card-body">
                                            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                            <!-- Container-fluid Ends-->
                            <!-- </div> -->
                            <!-- Container-fluid starts-->
                            <div class="container-fluid calendar-basic">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div id="menu">
                                                            <div id="menu-navi">
                                                                <div class="menu-navi-left">
                                                                    <button class="btn btn-primary move-today" type="button" data-action="move-today">Today</button>
                                                                </div>
                                                                <div class="render-range menu-navi-center" id="renderRange"></div>
                                                                <div class="menu-navi-right">
                                                                    <button class="btn btn-primary" id="dropdownMenu-calendarType" type="button" data-bs-toggle="dropdown"><i id="calendarTypeIcon"></i><span id="calendarTypeName">Dropdown</span><i class="fa fa-angle-down"></i></button>
                                                                    <ul class="dropdown-menu" role="menu">
                                                                        <li role="presentation"><a class="dropdown-menu-title" role="menuitem" data-action="toggle-daily"><i class="fa fa-bars"></i>Daily</a></li>
                                                                        <li role="presentation"><a class="dropdown-menu-title" role="menuitem" data-action="toggle-weekly"><i class="fa fa-th-large"></i>Weekly</a></li>
                                                                        <li role="presentation"><a class="dropdown-menu-title" role="menuitem" data-action="toggle-monthly"><i class="fa fa-th"></i>Month</a></li>
                                                                        <li role="presentation"><a class="dropdown-menu-title" role="menuitem" data-action="toggle-weeks2"><i class="fa fa-th-large"></i>2 weeks</a></li>
                                                                        <li role="presentation"><a class="dropdown-menu-title" role="menuitem" data-action="toggle-weeks3"><i class="fa fa-th-large"></i>3 weeks</a></li>
                                                                        <li class="dropdown-divider" role="presentation"></li>
                                                                        <li role="presentation"><a role="menuitem" data-action="toggle-workweek">
                                                                                <input class="tui-full-calendar-checkbox-square" type="checkbox" value="toggle-workweek" checked=""><span class="checkbox-title"></span>Show weekends</a></li>
                                                                        <li role="presentation"><a role="menuitem" data-action="toggle-start-day-1">
                                                                                <input class="tui-full-calendar-checkbox-square" type="checkbox" value="toggle-start-day-1"><span class="checkbox-title"></span>Start Week on Monday</a></li>
                                                                        <li role="presentation"><a role="menuitem" data-action="toggle-narrow-weekend">
                                                                                <input class="tui-full-calendar-checkbox-square" type="checkbox" value="toggle-narrow-weekend"><span class="checkbox-title"></span>Narrower than weekdays</a></li>
                                                                    </ul>
                                                                    <div class="move-btn">
                                                                        <button class="btn btn-primary move-day" type="button" data-action="move-prev"><i class="fa fa-angle-left" data-action="move-prev"></i></button>
                                                                        <button class="btn btn-primary move-day" type="button" data-action="move-next"><i class="fa fa-angle-right" data-action="move-next"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="lnb">
                                                            <div class="lnb-new-schedule">
                                                                <button class="btn lnb-new-schedule-btn btn-primary" id="btn-new-schedule" type="button" data-bs-toggle="modal">New schedule</button>
                                                            </div>
                                                            <div class="lnb-calendars" id="lnb-calendars">
                                                                <div class="lnb-calendars-d1" id="calendarList"></div>
                                                                <div class="lnb-calendars-item m-0 p-0">
                                                                    <label>
                                                                        <input class="tui-full-calendar-checkbox-square" type="checkbox" value="all" checked=""><span></span><strong>View all</strong>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div id="right">
                                                            <div id="calendar"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Container-fluid Ends-->
                        </div>
                    </div>
                    <!-- footer start-->
                    <footer class="footer footer-fix">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 footer-copyright">
                                    <p class="mb-0">Copyright <?= date('Y'); ?> © Kominfo All rights reserved.</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="pull-right mb-0">Dinas Kominfo Lombok Tengah</p>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
            <!-- latest jquery-->
            <script src="<?= base_url('assets/viho') ?>/js/jquery-3.5.1.min.js"></script>
            <!-- feather icon js-->
            <script src="<?= base_url('assets/viho') ?>/js/icons/feather-icon/feather.min.js"></script>
            <script src="<?= base_url('assets/viho') ?>/js/icons/feather-icon/feather-icon.js"></script>
            <!-- Sidebar jquery-->
            <script src="<?= base_url('assets/viho') ?>/js/sidebar-menu.js"></script>
            <script src="<?= base_url('assets/viho') ?>/js/config.js"></script>
            <!-- Bootstrap js-->
            <script src="<?= base_url('assets/viho') ?>/js/bootstrap/popper.min.js"></script>
            <script src="<?= base_url('assets/viho') ?>/js/bootstrap/bootstrap.min.js"></script>
            <!-- Plugins JS start-->
            <script src="<?= base_url('assets/viho') ?>/js/chart/chartist/chartist.js"></script>
            <script src="<?= base_url('assets/viho') ?>/js/chart/chartist/chartist-plugin-tooltip.js"></script>
            <script src="<?= base_url('assets/viho') ?>/js/chart/knob/knob.min.js"></script>
            <script src="<?= base_url('assets/viho') ?>/js/chart/knob/knob-chart.js"></script>
            <script src="<?= base_url('assets/viho') ?>/js/chart/apex-chart/apex-chart.js"></script>
            <script src="<?= base_url('assets/viho') ?>/js/chart/apex-chart/stock-prices.js"></script>
            <script src="<?= base_url('assets/viho') ?>/js/prism/prism.min.js"></script>
            <script src="<?= base_url('assets/viho') ?>/js/clipboard/clipboard.min.js"></script>
            <script src="<?= base_url('assets/viho') ?>/js/counter/jquery.waypoints.min.js"></script>
            <script src="<?= base_url('assets/viho') ?>/js/counter/jquery.counterup.min.js"></script>
            <script src="<?= base_url('assets/viho') ?>/js/counter/counter-custom.js"></script>
            <script src="<?= base_url('assets/viho') ?>/js/custom-card/custom-card.js"></script>
            <script src="<?= base_url('assets/viho') ?>/js/notify/bootstrap-notify.min.js"></script>
            <script src="<?= base_url('assets/viho') ?>/js/vector-map/jquery-jvectormap-2.0.2.min.js"></script>
            <script src="<?= base_url('assets/viho') ?>/js/vector-map/map/jquery-jvectormap-world-mill-en.js"></script>
            <script src="<?= base_url('assets/viho') ?>/js/vector-map/map/jquery-jvectormap-us-aea-en.js"></script>
            <script src="<?= base_url('assets/viho') ?>/js/vector-map/map/jquery-jvectormap-uk-mill-en.js"></script>
            <script src="<?= base_url('assets/viho') ?>/js/vector-map/map/jquery-jvectormap-au-mill.js"></script>
            <script src="<?= base_url('assets/viho') ?>/js/vector-map/map/jquery-jvectormap-chicago-mill-en.js"></script>
            <script src="<?= base_url('assets/viho') ?>/js/vector-map/map/jquery-jvectormap-in-mill.js"></script>
            <script src="<?= base_url('assets/viho') ?>/js/vector-map/map/jquery-jvectormap-asia-mill.js"></script>
            <script src="<?= base_url('assets/viho') ?>/js/dashboard/default.js"></script>
            <script src="<?= base_url('assets/viho') ?>/js/notify/index.js"></script>
            <script src="<?= base_url('assets/viho') ?>/js/datepicker/date-picker/datepicker.js"></script>
            <script src="<?= base_url('assets/viho') ?>/js/datepicker/date-picker/datepicker.en.js"></script>
            <script src="<?= base_url('assets/viho') ?>/js/datepicker/date-picker/datepicker.custom.js"></script>
            <script src="<?= base_url('assets/viho') ?>/js/chart/apex-chart/apex-chart.js"></script>
            <script src="<?= base_url('assets/viho') ?>/js/chart/apex-chart/stock-prices.js"></script>
            <script src="<?= base_url('assets/viho') ?>/js/calendar/tui-code-snippet.min.js"></script>
            <script src="<?= base_url('assets/viho') ?>/js/calendar/tui-time-picker.min.js"></script>
            <script src="<?= base_url('assets/viho') ?>/js/calendar/tui-date-picker.min.js"></script>
            <!-- <script src="<?= base_url('assets/viho') ?>/js/calendar/moment.min.js"></script> -->
            <!-- <script src="<?= base_url('assets/viho') ?>/js/calendar/chance.min.js"></script> -->
            <script src="<?= base_url('assets/viho') ?>/js/calendar/tui-calendar.js"></script>
            <script src="<?= base_url('assets/viho') ?>/js/calendar/calendars.js"></script>
            <script src="<?= base_url('assets/viho') ?>/js/calendar/schedules.js"></script>
            <script src="<?= base_url('assets/viho') ?>/js/calendar/app.js"></script>
            <!-- <script src="<?= base_url('assets/viho') ?>/js/chart/apex-chart/chart-custom.js"></script> -->
            <!-- Plugins JS Ends-->
            <!-- Theme js-->
            <script src="<?= base_url('assets/viho') ?>/js/script.js"></script>
            <script src="<?= base_url('assets/viho') ?>/js/theme-customizer/customizer.js"></script>
            <!-- login js-->
            <!-- Plugin used-->
            <script>
                // donut chart
                var options9 = {
                    chart: {
                        width: 380,
                        type: 'donut',
                    },
                    series: [17, 15, 10],
                    labels: ["Hadir", "Izin", "Tidak Masuk"],
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 200
                            },
                            legend: {
                                position: 'bottom'
                            },
                        }
                    }],
                    colors: [vihoAdminConfig.primary, vihoAdminConfig.secondary, '#222222', '#717171', '#e2c636']
                }

                var chart9 = new ApexCharts(
                    document.querySelector("#donutchart"),
                    options9
                );
                chart9.render();
            </script>
            <script>
                calendar.createSchedules([{
                        id: '1',
                        calendarId: '1',
                        title: 'my schedule',
                        category: 'time',
                        dueDateClass: '',
                        start: '2018-01-18T22:30:00+09:00',
                        end: '2018-01-19T02:30:00+09:00'
                    },
                    {
                        id: '2',
                        calendarId: '1',
                        title: 'second schedule',
                        category: 'time',
                        dueDateClass: '',
                        start: '2022-03-23T17:30:00+09:00',
                        end: '2022-03-24T17:31:00+09:00',
                        isReadOnly: true // schedule is read-only
                    }
                ]);
            </script>
</body>

</html>