    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Laporan Bulanan</h1>
        </div>
        <div class="row mb-3">

            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <a href="#" class="btn btn-success btn-icon-split mb-2 tombol-tambah" data-toggle="modal" data-target="#menumodal">
                            <span class="icon text-white-50">
                                <i class="fas fa-print"></i>
                            </span>
                            <span class="text">Print</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                <tr>
                                    <td rowspan="2">NO</td>
                                    <td rowspan="2">Nama</td>
                                    <td rowspan="2">Bulan</td>
                                    <td colspan="2">Jumlah Hadir</td>
                                    <td colspan="2">Jumlah Tidak Hadir</td>
                                </tr>
                                <tr>
                                    <td>Tepat Waktu</td>
                                    <td>Tidak Tepat Waktu</td>
                                    <td>Izin</td>
                                    <td>Tidak Izin</td>
                                </tr>
                                <?php
                                $no = 1;
                                foreach ($data as $d) {
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $d->namalengkap ?></td>
                                        <td><?= date('F', $d->jammasuk) ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!---Container Fluid-->