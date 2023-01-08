<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>List User</h3>
                    <a href="<?= base_url('user/tambah') ?>" class="btn-primary btn btn-sm mt-2 btn-square"> Add New</a>
                </div>

            </div>
        </div>
    </div>
    <div class="flash-berhasil" data-flashberhasil="<?= $this->session->flashdata('berhasil') ?>"></div>
    <div class="flash-gagal" data-flashgagal="<?= $this->session->flashdata('gagal') ?>"></div>

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row starter-main">

            <div class="col-sm-12">
                <div class="card">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <h5>Daftar User</h5>
                                <table class="display" id="basic-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>OPD</th>
                                            <th>Bidang</th>
                                            <th style="width: 20%;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($user as $row) {
                                        ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $row->nama_lengkap ?></td>
                                                <td><?= $row->email ?></td>
                                                <td><?= $row->nama_opd ?></td>
                                                <td><?= $row->nama_bidang ?></td>
                                                <td>
                                                    <a href="<?= base_url('user/edit/') . $row->id_user ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                                    <a class="btn btn-danger btn-sm tombol-h" href="<?= base_url('user/hapus/') . $row->id_user ?>"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
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