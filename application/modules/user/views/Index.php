<script src="<?= site_url('assets/backand/js/jquery-3.6.0.min.js') ?>"></script>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <div class="flash-gagal" data-flashgagal="<?= $this->session->flashdata('gagal') ?>"></div>
    <div class="flash-info" data-flashinfo="<?= $this->session->flashdata('info') ?>"></div>
    <div class="flash-berhasil" data-flashberhasil="<?= $this->session->flashdata('berhasil') ?>"></div>
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
                <table class="display nowrap table-striped table-bordered table" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>OPD</th>
                            <th>Bagian</th>
                            <th style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($user as $d) {
                            if ($this->session->userdata('role') == 1) {
                        ?>
                                <tr>
                                    <td scope="row"><?= $no++; ?></td>
                                    <td><?= $d->namalengkap; ?></td>
                                    <td><?= $d->email; ?></td>
                                    <td><?= $d->opd; ?></td>
                                    <td><?= $d->nama_bagian; ?></td>
                                    <td>
                                        <a href="<?= base_url('user/edit/') . $d->iduser ?>" class="btn btn-warning btn-circle ">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url('user/edit/') . $d->iduser ?>" class="btn btn-warning btn-circle ">
                                            <i class="fas fa-key"></i>
                                        </a>
                                        <a href="<?= base_url('user/profile/') . $d->iduser ?>" class="btn btn-primary btn-circle ">
                                            <i class="fas fa-user"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                            if ($this->session->userdata('opd') == $d->idopd) {
                                if ($this->session->userdata('role') == 2) {
                                    if ($d->idrole == 3 || $d->idrole == 4 || $d->idrole == 5) {
                                ?>
                                        <tr>
                                            <td scope="row"><?= $no++; ?></td>
                                            <td><?= $d->namalengkap; ?></td>
                                            <td><?= $d->email; ?></td>
                                            <td><?= $d->opd; ?></td>
                                            <td style="width: 200px;">
                                                <a href="<?= base_url('user/edit/') . $d->iduser ?>" class="btn btn-warning btn-circle ">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button class="btn btn-info tombol-ubah" data-toggle="modal" data-target="#menumodal" data-id="<?= $d->iduser; ?>">
                                                    <i class="fas fa-key"></i>
                                                </button>
                                                <a href="<?= base_url('user/profile/') . $d->iduser ?>" class="btn btn-primary btn-circle ">
                                                    <i class="fas fa-user"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } elseif ($this->session->userdata('role') == 3) {
                                    if ($d->idrole == 4 || $d->idrole == 5) {
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
                                } elseif ($this->session->userdata('role') == 4) {
                                    if ($d->idrole == 5) {
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
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    <!-- End of Main Content -->
    <div class="modal fade" id="menumodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="<?= site_url('user/ubah_password') ?>">
                <input type="text" id="id" name="id" hidden>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="password">Password Baru</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Ubah Password" autocomplete="off" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-danger btn-icon-split mb-2">
                            <span class="icon text-white-50">
                                <i class="fas fa-times"></i>
                            </span>
                            <span class="text">Batal</span>
                        </a>
                        <button type="submit" class="btn btn-success btn-icon-split mb-2">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus-square"></i>
                            </span>
                            <span class="text">Simpan</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('.tombol-ubah').on('click', function() {
            const id = $(this).data('id')
            // console.log(id)
            $.ajax({
                url: `<?= site_url('user/getubah') ?>`,
                data: {
                    id: id
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    // console.log(data);
                    $('#id').val(data.iduser)

                }
            })
        })
    })
</script>