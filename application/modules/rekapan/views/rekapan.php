<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail</h1>
    </div>

    <div class="row ">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-4 mb-4">
            <div class="card ">
                <img src="<?= base_url('assets/backand/img/profile/') . $user->foto ?>" class="card-img-top" alt="..." style="height: 275px;">
            </div>
        </div>
        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-9 col-md-7 ">
            <div class="card">
                <div class="card-header ">
                </div>
                <div class="card-body">
                    <div class="table-responsive ">
                        <table class="table align-items-center table-flush table-hover table-striped">
                            <tr>
                                <td>Nama Lengkap</td>
                                <td>:</td>
                                <td><?= $user->namalengkap; ?></td>
                                <td>Email</td>
                                <td>:</td>
                                <td><?= $user->email; ?></td>
                            </tr>
                            <tr>
                                <td>Nik</td>
                                <td>:</td>
                                <td><?= $user->nik; ?></td>
                                <td>Nip</td>
                                <td>:</td>
                                <td><?= $user->nip; ?></td>
                            </tr>
                            <tr>
                                <td>No Hanphone</td>
                                <td>:</td>
                                <td><?= $user->no; ?></td>
                                <td>OPD</td>
                                <td>:</td>
                                <td><?= $user->opd ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card-footer ">
                </div>
            </div>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header ">
                    <h6 class="m-0 font-weight-bold text-primary">Log Absensi <?= $user->namalengkap; ?></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive ">
                        <table class="table align-items-center table-flush table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>TGL</th>
                                    <th>Jam Masuk</th>
                                    <th>Jam Pulang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($absen as $absen) {
                                ?>
                                    <tr>
                                        <th scope="row"><?= $no++; ?></th>
                                        <td><?= $absen->tgl; ?></td>
                                        <td><?= $absen->jam_masuk; ?></td>
                                        <td><?= $absen->jam_pulang; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="card-footer ">
                    <a href="<?= base_url('rekapan') ?>" class="btn btn-sm btn-danger">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!---Container Fluid-->