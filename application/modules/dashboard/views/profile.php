<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
    </div>

    <div class="row ">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card  " style="width: 22rem;">
                <img src="<?= base_url('assets/backand/img/default.png') ?>" class="card-img-top" alt="..." </div>

            </div>
        </div>


        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-8 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header ">
                    <h6 class="m-0 font-weight-bold text-primary">Identitas User</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush" id="dataTable">
                            <tr>
                                <td>Nama Lengkap</td>
                                <td>:</td>
                                <td><?= $nama; ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><?= $email; ?></td>
                            </tr>
                            <tr>
                                <td>Nik</td>
                                <td>:</td>
                                <td><?= $nik; ?></td>
                            </tr>
                            <tr>
                                <td>Nip</td>
                                <td>:</td>
                                <td><?= $nip; ?></td>
                            </tr>
                            <tr>
                                <td>No Hanphone</td>
                                <td>:</td>
                                <td><?= $no; ?></td>
                            </tr>
                            <tr>
                                <td>OPD</td>
                                <td>:</td>
                                <td><?php
                                    $opds = $this->db->get_where('opd', ['idopd' => $opd])->row();
                                    echo $opds->opd
                                    ?></td>
                            </tr>
                            <tr>
                                <td>Status Tenaga</td>
                                <td>:</td>
                                <td><?php
                                    if ($statustenaga == 1) {
                                        echo "Honorer";
                                    } else {
                                        echo "PNS";
                                    }
                                    ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!---Container Fluid-->