<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>List User</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('user') ?>">User</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="flash-berhasil" data-flashberhasil="<?= $this->session->flashdata('berhasil') ?>"></div>
    <div class="flash-gagal" data-flashgagal="<?= $this->session->flashdata('gagal') ?>"></div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="sub-title">Data User </h5>
                        <a href="<?= base_url('user/tambah') ?>" class="btn-primary btn mt-2 btn-square"><i class="fa fa-user-plus me-1"></i> Tambah User</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table class="row-border" id="example-style-1">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama Lengkap</th>
                                        <th>Role</th>
                                        <th>OPD</th>
                                        <th>Bidang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($user as $u) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $u->namalengkap ?></td>
                                            <td><?= $u->role ?></td>
                                            <td><?= $u->opd ?></td>
                                            <td><?= $u->nama_bagian ?></td>
                                            <td style="width: 175px;">
                                                <a href="<?= base_url('user/profile/') . $u->iduser ?>" class="btn btn-primary px-2"><i class="fa fa-user"></i></a>
                                                <a href="<?= base_url('user/edit/') . $u->iduser ?>" class="btn btn-warning px-2"><i class="fa fa-edit"></i></a>
                                                <a href="<?= base_url('user/hapus/') . $u->iduser ?>" class="btn btn-danger px-2 tombol-hapus"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
</div>