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

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>

                            <th>Nama Lengkap</th>
                            <th>NIK</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // echo $this->session->userdata('email');
                        $cek = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row();
                        // var_dump($cek);
                        // die;
                        $no = 1;
                        // echo $this->session->userdata('opd');
                        foreach ($data as $d) {
                            if ($d->idopd == $this->session->userdata('opd')) {
                                if ($d->idrole == 5) {
                        ?>
                                    <tr>
                                        <td scope="row"><?= $no++; ?></td>

                                        <td><?= $d->namalengkap; ?></td>
                                        <td><?= $d->nik; ?></td>
                                        <td>
                                            <a href="<?= site_url('absen_pulang/laporan_individu_print/') . $d->iduser ?>" class="btn btn-success btn-circle tombol-ubah">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="<?= site_url('absen_pulang/laporan_individu_pdf/') . $d->iduser ?>" class="btn btn-primary btn-circle tombol-ubah">
                                                <i class="fa fa-file-pdf"></i>
                                            </a>
                                        </td>
                                    </tr>
                        <?php
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