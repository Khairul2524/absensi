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
                    <h6 class="m-0 font-weight-bold text-primary">Rekap Absensi</h6>
                </div>
                <div class="table-responsive p-3">
                    <table class="display nowrap table-striped table-bordered table" id="example" width="100%">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>foto</th>
                                <th>Nama Lengkap</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data as $d) {
                                if ($d->idrole == 4) {
                            ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><img src="<?= base_url('assets/backand/img/profile/') . $d->foto ?>" alt="" srcset="" width="70px"></td>
                                        <td><?= $d->namalengkap; ?></td>
                                        <td><a href="<?= base_url('rekapan/detail/') . $d->iduser ?>" class="btn btn-sm btn-primary">Detail</a></td>
                                    </tr>
                            <?php }
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