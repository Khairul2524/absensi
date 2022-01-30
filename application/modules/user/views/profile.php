<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
    </div>

    <div class="row ">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card  " style="width: 22rem;">
                <img src="<?= base_url('assets/backand/img/default.png') ?>" class="card-img-top" alt="..." </div>

            </div>
        </div>


        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-8 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header ">
                    <h6 class="m-0 font-weight-bold text-primary">Identitas User</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive ">
                        <table class="table align-items-center table-flush" id="dataTable">
                            <tr>
                                <td>Nama Lengkap</td>
                                <td>:</td>
                                <td><?= $user->namalengkap; ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><?= $user->email; ?></td>
                            </tr>
                            <tr>
                                <td>Nik</td>
                                <td>:</td>
                                <td><?= $user->nik; ?></td>
                            </tr>
                            <tr>
                                <td>Nip</td>
                                <td>:</td>
                                <td><?= $user->nip; ?></td>
                            </tr>
                            <tr>
                                <td>No Hanphone</td>
                                <td>:</td>
                                <td><?= $user->no; ?></td>
                            </tr>
                            <tr>
                                <td>OPD</td>
                                <td>:</td>
                                <td><?= $user->opd ?></td>
                            </tr>
                            <tr>
                                <td>Status Tenaga</td>
                                <td>:</td>
                                <td><?php
                                    if ($user->statustenaga == 1) {
                                        echo "Honorer";
                                    } else {
                                        echo "PNS";
                                    }
                                    ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card-footer ">
                    <a href="<?= base_url('user') ?>" class="btn btn-danger btn-icon-split mb-2 ">
                        <span class="icon text-white-50">
                            <i class="fas fa-backward"></i>
                        </span>
                        <span class="text">Kembali</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
<!---Container Fluid-->