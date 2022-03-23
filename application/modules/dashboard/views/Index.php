<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row mb-3">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Staf</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= $masuk ?> Orang</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span><?= date('d F y'); ?> </span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Hadir</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                Orang
                            </div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span><?= date('d F y'); ?></span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tie fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- New User Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Izin</div>
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">

                                Orang</div>
                            <div class="mt-2 mb-0 text-muted text-xs">

                                <span><?= date('d F y'); ?></span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-minus fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!---Container Fluid-->