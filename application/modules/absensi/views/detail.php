<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Detail Absensi</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('user') ?>">Absensi</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h4 class="card-title mb-0">Profile</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="profile-title">
                                    <div class="media"> <img class="img-70 rounded-circle" alt="" src="<?= base_url('assets/backand') ?>/img/profile/<?= $user->foto ?>">
                                        <div class="media-body">
                                            <h3 class="mb-1 f-20 txt-primary"><?= strtoupper($user->namalengkap); ?></h3>
                                            <p class="f-12"><?= strtoupper($user->role); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h5 class="sub-title card-title mb-0">Data User</h5>
                        </div>
                        <div class="card-body">
                            <div class="card">
                                <div class="collapse show" id="collapseicon2" aria-labelledby="collapseicon2" data-parent="#accordion">
                                    <div class="card-body filter-cards-view">
                                        <div class="filter-view-group"><span class="f-w-600">Nama Lengkap :</span>
                                            <p>
                                                <?= $user->namalengkap; ?>
                                            </p>
                                        </div>
                                        <div class="filter-view-group"><span class="f-w-600">Email :</span>
                                            <p>
                                                <?= $user->email; ?>
                                            </p>
                                        </div>
                                        <div class="filter-view-group"><span class="f-w-600">No Handphone :</span>
                                            <p>
                                                <?= $user->no; ?>
                                            </p>
                                        </div>
                                        <div class="filter-view-group"><span class="f-w-600">NIK :</span>
                                            <p>
                                                <?= $user->nik; ?>
                                            </p>
                                        </div>
                                        <div class="filter-view-group"><span class="f-w-600">NIP :</span>
                                            <p>
                                                <?= $user->nip; ?>
                                            </p>
                                        </div>
                                        <div class="filter-view-group"><span class="f-w-600">Tenaga :</span>
                                            <p>
                                                <?php
                                                if ($user->statustenaga = 1) {
                                                    echo "Honorer";
                                                } else {
                                                    echo "Pegawai Negeri Sipil";
                                                }
                                                ?>
                                            </p>
                                        </div>
                                        <div class="filter-view-group"><span class="f-w-600">Created :</span>
                                            <p>
                                                <?= date('d-F-Y', $user->created_at); ?>
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h5 class="sub-title mb-0">Organisasi Perangkat Daerah</h5>
                        </div>
                        <div class="card-body">
                            <div class="card">
                                <div class="collapse show" id="collapseicon2" aria-labelledby="collapseicon2" data-parent="#accordion">
                                    <?php

                                    $opd = $this->db->get_where('user', ['idopd' => $user->idopd, 'idrole' => 2])->row();
                                    // var_dump($opd);
                                    ?>
                                    <div class="card-body filter-cards-view">
                                        <div class="filter-view-group"><span class="f-w-600">Organisasi Perangkat Daerah :</span>
                                            <p>
                                                <?= $user->opd; ?>
                                            </p>
                                        </div>
                                        <div class="filter-view-group"><span class="f-w-600">Admin OPD :</span>
                                            <p>
                                                <?= $opd->namalengkap; ?>
                                            </p>
                                        </div>

                                        <div class="filter-view-group"><span class="f-w-600">NIP :</span>
                                            <p>
                                                <?= $opd->nip; ?>
                                            </p>
                                        </div>
                                        <div class="filter-view-group"><span class="f-w-600">NO Hanphone :</span>
                                            <p>
                                                <?= $opd->no; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h6 class="sub-title mb-0">Bidang Organisasi Perangkat Daerah</h6>
                        </div>
                        <div class="card-body">
                            <div class="card">
                                <div class="collapse show" id="collapseicon2" aria-labelledby="collapseicon2" data-parent="#accordion">
                                    <?php

                                    $bagian = $this->db->get_where('user', ['id_bagian' => $user->id_bagian, 'idrole' => 3])->row();
                                    // var_dump($opd);
                                    ?>
                                    <div class="card-body filter-cards-view">
                                        <div class="filter-view-group"><span class="f-w-600">Bidang Organisasi Perangkat Daerah :</span>
                                            <p>
                                                <?= $user->nama_bagian; ?>
                                            </p>
                                        </div>
                                        <div class="filter-view-group"><span class="f-w-600">Admin Atasan :</span>
                                            <p>
                                                <?= $bagian->namalengkap; ?>
                                            </p>
                                        </div>

                                        <div class="filter-view-group"><span class="f-w-600">NIP :</span>
                                            <p>
                                                <?= $bagian->nip; ?>
                                            </p>
                                        </div>
                                        <div class="filter-view-group"><span class="f-w-600">NO Hanphone :</span>
                                            <p>
                                                <?= $bagian->no; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-lg-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="sub-title">Log Absensi <?= $user->namalengkap ?></h5>
                        </div>
                        <div class="card-body">

                            <table class="row-border" id="example-style-1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Pulang</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($absen as $ab) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $ab->tgl ?></td>
                                            <td><?= $ab->jam_masuk ?></td>
                                            <td><?= $ab->jam_pulang ?></td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>

                        </div>
                        <div class="card-footer">
                            <a href="<?= base_url('absensi') ?>" class="btn btn-square btn-danger">Kembali</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
<!-- Container-fluid Ends-->