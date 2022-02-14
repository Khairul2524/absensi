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
        $jam_masuk = [];
        $jam_pulang = [];
        foreach ($data as $d) {
            if ($d->idrole == 5) {
                if ($d->idopd == $this->session->userdata('opd')) {
                    $jam_masuk[] = $d->absen_masuk;
        ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $d->namalengkap; ?></td>
                        <td><?= $d->nip; ?></td>
                        <td>Hari Kerja</td>
                        <td>Hari Kerja</td>
                        <td>Hari Kerja</td>
                        <td>Hadir</td>
                        <td>Tidak Hadir</td>
                        <td>TK</td>
                        <td>Izin</td>
                        <td>Keterangan</td>
                    </tr>
        <?php }
            }
        }
        var_dump($jam_masuk);
        ?>
    </table>
</body>

</html>