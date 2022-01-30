<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?= base_url('assets/backand/') ?>img/logo32.png" rel="icon">
    <title>Absensi Loteng</title>
    <link href="<?= base_url('assets/backand/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/backand/') ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/backand/') ?>css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
    <!-- Login Content -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-12 col-md-9">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <img src="<?= base_url('assets/backand/img/LOGO1.png') ?>" alt="" width="100px">
                                        <h1 class="h4 text-gray-900 my-4">Absensi Loteng</h1>
                                    </div>
                                    <div class="flash-gagal" data-flashgagal="<?= $this->session->flashdata('gagal') ?>"></div>
                                    <div class="flash-berhasil" data-flashberhasil="<?= $this->session->flashdata('berhasil') ?>"></div>
                                    <form class="user" method="post" action="<?= base_url('auth/login') ?>">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email Address" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off" required>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="font-weight-bold small" href="<?= base_url('auth/register') ?>">Create an Account!</a>
                                    </div>
                                    <div class="text-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Content -->
    <script src="<?= base_url('assets/backand/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/backand/') ?>js/sweetalert2.all.min.js"></script>
    <script src="<?= base_url('assets/backand/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/backand/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= base_url('assets/backand/') ?>js/ruang-admin.min.js"></script>
</body>

</html>
<script>
    // sweat alert
    const flashGagal = $('.flash-gagal').data('flashgagal')
    // console.log(flashData) 
    if (flashGagal) {
        Swal.fire(
            flashGagal,
            '',
            'error'
        )
    }
    const flashberhasil = $('.flash-berhasil').data('flashberhasil')
    // console.log(flashberhasil)
    if (flashberhasil) {
        Swal.fire(
            flashberhasil,
            '',
            'success'
        )
    }
</script>