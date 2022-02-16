<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Absen Masuk</title>
    <style>
        .text-header {
            text-align: center;
        }
    </style>
</head>

<body>
    <p class="text-header">REKAPITULASI ABSENSI KEHADIRAN NON APARTUR SIPIL NEGARA (NON ASN) <br>
        DINAS KOMUNIKASI DAN INFORMATIKA <br>
        BULAN JANUARI TAHUN ANGGARAN TAHUN 2022</p>

    <table rules="all" border="1" class="tabel">
        <tr>
            <td>NO</td>
            <td>Nama</td>
            <td>NIP</td>
            <td>Hari Kerja</td>
            <td>Hadir</td>
            <td>Jam Masuk</td>
            <td>Jam Pulang</td>
            <td>Tidak Hadir</td>
            <td>TK</td>
            <td>Izin</td>
            <td>Keterangan</td>
        </tr>
        <?php
        $no = 1;
        $nama = [];
        $nip = [];
        $jam_masuk = [];
        $jam_pulang = [];
        foreach ($data as $d) {
            if ($d->idrole == 5) {
                if ($d->idopd == $this->session->userdata('opd')) {
                    $nama[] = $d->namalengkap;
                    $nip[] = $d->nip;
                    $jam_masuk[$d->namalengkap][] = $d->absen_masuk;
                    $jam_pulang[$d->namalengkap][] = $d->absen_pulang;
                }
            }
        }
        $kelompok_nama = array_unique($nama);
        foreach ($kelompok_nama as $jm) {

        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $jm; ?></td>
                <td><?= $d->nip; ?></td>
                <td><?= var_dump($jam_masuk); ?></td>
                <td>Hari Kerja</td>
                <td>Hari Kerja</td>
                <td>Hadir</td>
                <td>Tidak Hadir</td>
                <td>TK</td>
                <td>Izin</td>
                <td>Keterangan</td>
            </tr>

        <?php
        }
        // var_dump(array_unique($nama));
        ?>
    </table>
</body>

</html>