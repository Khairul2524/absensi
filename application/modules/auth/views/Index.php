<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="backand admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, backand admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="<?= base_url('assets/backand') ?>/img/logo32.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url('assets/backand') ?>/img/logo32.png" type="image/x-icon">
    <title>Absensi Loteng </title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/backand') ?>/css/fontawesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/backand') ?>/css/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/backand') ?>/css/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/backand') ?>/css/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/backand') ?>/css/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/backand') ?>/css/sweetalert2.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/backand') ?>/css/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/backand') ?>/css/style.css">
    <link id="color" rel="stylesheet" href="<?= base_url('assets/backand') ?>/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/backand') ?>/css/responsive.css">
    <script src="<?= base_url('assets/backand') ?>/js/jquery-3.5.1.min.js"></script>
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
    <section>
        <div class="container-fluid p-0">
            <div class="flash-berhasil" data-flashberhasil="<?= $this->session->flashdata('berhasil') ?>"></div>
            <div class="flash-gagal" data-flashgagal="<?= $this->session->flashdata('gagal') ?>"></div>
            <div class="row">
                <div class="col-12">
                    <div class="login-card">
                        <form class="theme-form login-form" action="<?= base_url('auth/login') ?>" method="post">
                            <h4>Login</h4>
                            <h6>Welcome To Sistem Absensi Loteng!</h6>
                            <div class="form-group">
                                <label>Email Address</label>
                                <div class="input-group"><span class="input-group-text"><i class="icon-email"></i></span>
                                    <input class="form-control" type="email" name="email" id="email" required="" placeholder="Kominfo@gmail.com" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                                    <input class="form-control" type="password" name="password" id="password" required="" placeholder="*********" autocomplete="off">
                                    <div class="show-hide"><span class="show"> </span></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                            </div>
                            <div class="login-social-title">
                                <h5>Sign in with</h5>
                            </div>
                            <div class="form-group">
                                <ul class="login-social">
                                    <li><a href="<?= site_url('auth/akun') ?>" target="_blank"><i data-feather="mail"></i></a></li>
                                </ul>
                            </div>
                            <p>Don't have account?<a class="ms-2" href="log-in.html">Create Account</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page-wrapper end-->
    <!-- latest jquery-->

    <!-- feather icon js-->
    <script src="<?= base_url('assets/backand') ?>/js/icons/feather-icon/feather.min.js"></script>
    <script src="<?= base_url('assets/backand') ?>/js/icons/feather-icon/feather-icon.js"></script>
    <!-- Sidebar jquery-->
    <script src="<?= base_url('assets/backand') ?>/js/sidebar-menu.js"></script>
    <script src="<?= base_url('assets/backand') ?>/js/config.js"></script>
    <!-- Bootstrap js-->
    <script src="<?= base_url('assets/backand') ?>/js/bootstrap/popper.min.js"></script>
    <script src="<?= base_url('assets/backand') ?>/js/bootstrap/bootstrap.min.js"></script>
    <!-- Plugins JS start-->
    <script src="<?= base_url('assets/backand') ?>/js/sweet-alert/sweetalert.min.js"></script>
    <script src="<?= base_url('assets/backand') ?>/js/sweet-alert/app.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="<?= base_url('assets/backand') ?>/js/script.js"></script>
    <script src="<?= base_url('assets/backand') ?>/js/scriptku.js"></script>
    <!-- login js-->
    <!-- Plugin used-->
</body>

</html>