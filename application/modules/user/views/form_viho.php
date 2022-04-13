<script src="<?= site_url('assets/backand/js/jquery-3.6.0.min.js') ?>"></script>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>User</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('user') ?>">User </a></li>
                        <li class="breadcrumb-item active"><a href="<?= base_url('user') ?>">Edit User </a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="edit-profile">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data" action="<?= site_url('user/edit_profile') ?>">
                                <div class="row mb-2">
                                    <div class="profile-title">
                                        <div class="media"> <img class="img-70 rounded-circle" alt="" src="<?= base_url('assets/backand') ?>/img/profile/<?= $foto ?>">
                                            <div class="media-body">
                                                <h3 class="mb-1 f-20 txt-primary"><?= strtoupper($nama) ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <input type="hidden" name="id" id="id" value="<?= $id ?>">
                                    <input type="hidden" name="foto_lama" id="foto_lama" value="<?= $foto ?>">
                                    <label class="form-label">Foto</label>
                                    <input class="form-control" type="file" name="foto">
                                </div>

                                <div class="form-footer">
                                    <button class="btn btn-primary btn-block" type="submit">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php
                    if ($this->session->userdata('role') == 1) {
                    ?>
                        <div class="card">
                            <form action="<?= site_url('user/ubah_password') ?>" class="form theme-form" method="POST">
                                <div class="card-header pb-0">
                                    <h5>Ubah Password</h5>
                                </div>
                                <div class="card-body">
                                    <input type="hidden" name="id" id="id" value="<?= $id ?>">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="email">Email</label>
                                                <input class="form-control btn-square" id="email" name="email" type="text" placeholder="Kominfo@gmail.com" value="<?= $email ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="email">Password</label>
                                                <input class="form-control btn-square" id="password" name="password" type="text" placeholder="**********" required autocomplete="off">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                </div>
                            </form>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Data User</h5>
                    </div>
                    <form class="form theme-form" method="POST" action="<?= $action ?>">
                        <input type="text" name="id" id="id" hidden value="<?= $id ?>">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="nama">Nama Lengkap</label>
                                        <input class="form-control btn-square" id="nama" name="nama" type="text" placeholder="Abdul Aziz Al Jaelani" value="<?= $nama ?>" required autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email</label>
                                        <input class="form-control btn-square" id="email" name="email" type="text" placeholder="Kominfo@gmail.com" value="<?= $email ?>" required autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="nik">NIK</label>
                                        <input class="form-control btn-square" id="nik" type="text" name="nik" placeholder="52*************" value="<?= $nik ?>" maxlength="16" onkeypress="return Angka(event)" required autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="nip">NIP</label>
                                        <input class="form-control btn-square" id="nip" type="text" name="nip" placeholder="19****************" value="<?= $nip ?>" maxlength="20" onkeypress="return Angka(event)" required autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="no">NO Handphone</label>
                                        <input class="form-control btn-square" id="no" name="no" type="text" placeholder="08**********" value="<?= $no ?>" maxlength="12" onkeypress="return Angka(event)" required autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Organisasi Perangkat Daerah</label>
                                        <select class="form-select btn-square digits" id="opd" name="opd" required autocomplete="off">
                                            <option value="">Piih OPD</option>
                                            <?php
                                            foreach ($opd as $opd) {
                                                if ($idopd == $opd->idopd) {
                                                    $select = "selected";
                                                } else {
                                                    $select = "";
                                                }
                                                echo ' <option ' . $select . ' class="pilihan" value=" ' . $opd->idopd . '">' . $opd->opd . '</option>';
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Bidang</label>
                                        <select name="bagian" id="bagian" class="form-control" required autocomplete="off">

                                            <?php
                                            if ($bagian) {
                                                $get = $this->db->get_where('bagian', ['id_bagian' => $bagian])->row();
                                                echo '<option value="' . $get->id_bagian . '">' . $get->nama_bagian . '</option>';
                                            } else {
                                            ?>
                                                <option value="">Pilih Bagian</option>
                                            <?php
                                            }

                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Status Tenaga</label>
                                        <select class="form-select btn-square digits" id="st" name="st" required autocomplete="off">
                                            <option value="<?= $statustenaga ?>" selected>
                                                <?php if ($statustenaga == 1) {
                                                    echo "Honorer";
                                                } elseif ($statustenaga == 2) {
                                                    echo "PNS";
                                                } else {
                                                    echo "Pilih Status Tenaga";
                                                }  ?></option>
                                            <option value="1">Honorer</option>
                                            <option value="2">PNS</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Role</label>
                                        <select class="form-select btn-square digits" id="role" name="role" required autocomplete="off">
                                            <option value="">Piih Role</option>
                                            <?php
                                            foreach ($role as $role) {

                                                if ($idrole == $role->idrole) {
                                                    $select = "selected";
                                                } else {
                                                    $select = "";
                                                }
                                                if ($role->idrole != 1 && $role->idrole != 5) {
                                            ?>
                                                    <option <?= $select; ?> value="<?= $role->idrole; ?>"><?= $role->role; ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <input class="btn btn-light" type="reset" value="Cancel">
                            <a href="<?= base_url('user') ?>" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->


<script>
    $(document).ready(function() {
        $("#opd").change(function() {
            var id_opd = $(this).val();
            // console.log(id_opd);
            $.ajax({
                url: `<?= base_url('user/get_bagian') ?>`,
                type: 'post',
                data: {
                    opd_id: id_opd
                },
                dataType: 'json',
                success: function(response) {
                    // console.log(response)
                    var len = response.length;

                    $("#bagian").empty();
                    $("#bagian").append("<option value=''>Pilih Bidang</option>");
                    for (var i = 0; i < len; i++) {
                        var id = response[i]['id_bagian'];
                        var name = response[i]['nama_bagian'];

                        $("#bagian").append("<option value='" + id + "'>" + name + "</option>");
                    }
                }
            });
        })
    })
</script>
<script>
    function Angka(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
            return false;
        return true;
    }
</script>