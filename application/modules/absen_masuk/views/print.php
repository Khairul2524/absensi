<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body onload="window.print();">
    <h3 style="text-align: center;">Laporan Absensi Pegawai</h3>
    <h3 style="text-align: center;">Lombok Tengah</h3>

    <table rules="all" border="1">

        <tr>
            <td rowspan="2">NO</td>
            <td rowspan="2" style="width: 200px;">Nama</td>
            <td rowspan="2" style="width: 100px;">Bulan</td>
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

</body>

</html>