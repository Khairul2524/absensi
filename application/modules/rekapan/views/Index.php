<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Rekapitulasi Absensi </h1>

    </div>

    <!-- Row -->
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Rekapitulasi Absensi Staf Non ASN Dinas KOMINFO</h6>
                </div>
                <div class="table-responsive p-3">
                    <table class="display nowrap table-striped table-bordered table" id="example" width="100%">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Jumlah Hari Kerja</th>
                                <th>Hadir</th>
                                <th>Tidak Hadir</th>
                                <th>Izin</th>
                                <th>Tepat Waktu</th>
                                <th>Terlambat</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Jumlah Hari Kerja</th>
                                <th>Hadir</th>
                                <th>Tidak Hadir</th>
                                <th>Izin</th>
                                <th>Tepat Waktu</th>
                                <th>Terlambat</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $no = 1;
                            $jumlah_hadir = [];
                            foreach ($data as $d) {
                                if ($d->idrole == 5) {
                                    if ($this->session->userdata('opd') == $d->idopd) {
                                        $jumlah_hadir[] = $d->jam_masuk;
                            ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $d->namalengkap; ?></td>
                                            <td><?= $d->nip; ?></td>
                                            <td><?= count($jumlah_hadir); ?></td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                            <?php }
                                }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- DataTable with Hover -->

    </div>
    <!--Row-->
</div>