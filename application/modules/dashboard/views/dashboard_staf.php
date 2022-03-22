<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card">
                <img src="<?= base_url('assets/backand/img/profile/') . $user->foto ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $user->namalengkap; ?></h5>
                    <!-- <a href="#" class="btn btn-primary">Ubah Profile</a> -->
                </div>
            </div>
        </div>
        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-8 col-md-8 mb-2">
            <div class="card ">
                <div class="card-header ">
                    <h6 class="m-0 font-weight-bold text-primary">Identitas User</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive p-1">
                        <table class="table align-items-center table-flush">
                            <tr>
                                <td style="width: 110px;">Nama Lengkap</td>
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

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-xl-6 col-lg-6 mb-4">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Hari Libur</h6>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>NO</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($hari_libur as $libur) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $libur->tanggal; ?></td>
                                    <td><?= $libur->keterangan; ?></td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">Kantor Detail</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive p-1">
                        <table class="table align-items-center table-flush" id="dataTable">
                            <tr>
                                <td>OPD</td>
                                <td>:</td>
                                <td><?= $user->opd ?></td>
                            </tr>
                            <tr>
                                <td>Bidang</td>
                                <td>:</td>
                                <td><?= $user->nama_bagian ?></td>
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
            </div>
        </div>

    </div>
</div>
<!---Container Fluid-->