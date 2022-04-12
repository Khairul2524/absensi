<<<<<<< HEAD
<div class="page-body">
=======
            <div class="page-body">
>>>>>>> f269a04f5d6323646934ac5c959b136d10f350e7
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3>Profile</h3>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url('user') ?>">User</a></li>
                                    <li class="breadcrumb-item active">Profile</li>
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
                                        <h4 class="card-title mb-0">Data Profile</h4>
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
                                                    <div class="filter-view-group"><span class="f-w-600">OPD :</span>
                                                        <p>
                                                            <?= $user->opd; ?>
                                                        </p>
                                                    </div>
                                                    <div class="filter-view-group"><span class="f-w-600">Bidang :</span>
                                                        <p>
                                                            <?= $user->nama_bagian; ?>
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
                                                    <a href="<?= base_url('user') ?>" class="btn btn-smal btn-danger btn-square mt-4">Kembali</a>
                                                </div>
                                            </div>
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