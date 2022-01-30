<script src="<?= site_url('assets/backand/js/jquery-3.6.0.min.js') ?>"></script>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data <?= $judul; ?></h6>
        </div>
        <div class="card-body">
            <a href="<?= base_url('user/tambah') ?>" class="btn btn-success btn-icon-split mb-2 tombol-tambah">
                <span class="icon text-white-50">
                    <i class="fas fa-plus-square"></i>
                </span>
                <span class="text">Tambah</span>
            </a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>OPD</th>
                            <th style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($user as $d) {
                            if ($d->idrole != 1 && $d->idrole == 5) {
                        ?>
                                <tr>
                                    <td scope="row"><?= $no++; ?></td>
                                    <td><?= $d->namalengkap; ?></td>
                                    <td><?= $d->email; ?></td>
                                    <td><?= $d->opd; ?></td>
                                    <td>
                                        <a href="<?= base_url('user/edit/') . $d->iduser ?>" class="btn btn-warning btn-circle ">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url('user/profile/') . $d->iduser ?>" class="btn btn-primary btn-circle ">
                                            <i class="fas fa-user"></i>
                                        </a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>