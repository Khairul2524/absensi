    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Laporan Bulanan</h1>
        </div>
        <div class="row mb-3">

            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <a href="<?= site_url('absensi/print') ?>" class="btn btn-success btn-icon-split mb-2 ">
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
                                    echo '<tr>';
                                    if ($d->idopd == $this->session->userdata('opd')) {
                                        if ($d->idrole == 5) {
                                            echo "<td>"     . $no++ . "</td>";
                                            echo "<td>"     . $d->namalengkap . "</td>";
                                            echo "<td>"     . date('F') . "</td>";
                                            $absenya = $this->db->select('statusmasuk, COUNT(statusmasuk) as totalst')->from('absensi')->where(['statusmasuk' => 1, 'iduser' => $d->iduser])->get()->result();
                                            // var_dump($absen[0]->totalst);
                                            echo '<td>' . $absenya[0]->totalst . '</td>';
                                            $absentidak = $this->db->select('statusmasuk, COUNT(statusmasuk) as totalst')->from('absensi')->where(['statusmasuk' => 2, 'iduser' => $d->iduser])->get()->result();
                                            echo '<td>' . $absentidak[0]->totalst . '</td>';
                                            $izin = $this->db->select('statusmasuk, COUNT(statusmasuk) as totalst')->from('absensi')->where(['statusmasuk' => 3, 'iduser' => $d->iduser])->get()->result();
                                            echo '<td>' . $izin[0]->totalst . '</td>';
                                            $izin = $this->db->select('statusmasuk, COUNT(statusmasuk) as totalst')->from('absensi')->where(['statusmasuk' => 4, 'iduser' => $d->iduser])->get()->result();
                                            echo '<td>' . $absentidak[0]->totalst . '</td>';
                                        }
                                    }
                                    echo '</tr>';
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