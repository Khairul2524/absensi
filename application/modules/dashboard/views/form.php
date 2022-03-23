<script src="<?= site_url('assets/backand/js/jquery-3.6.0.min.js') ?>"></script>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
    </div>

    <div class="row ">
        <div class="flash-gagal" data-flashgagal="<?= $this->session->flashdata('gagal') ?>"></div>
        <div class="flash-info" data-flashinfo="<?= $this->session->flashdata('info') ?>"></div>
        <div class="flash-berhasil" data-flashberhasil="<?= $this->session->flashdata('berhasil') ?>"></div>
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
                    <form method="POST" action="<?= base_url('dashboard/simpan') ?>" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" name="email" value="<?= $this->session->userdata('email') ?>" readonly>
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label for="password" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            </div>
                        </div> -->
                        <div class="form-group row">
                            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nik" name="nik" placeholder="No Induk Keluarga" required autocomplete="off" maxlength="16" onkeypress="return Angka(event)">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nip" class="col-sm-3 col-form-label">NIP</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nip" name="nip" placeholder="No Induk Pegawai" required autocomplete="off" maxlength="18" onkeypress="return Angka(event)">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no" class="col-sm-3 col-form-label">NO HP</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="no" name="no" placeholder="No Handphone" required autocomplete="off" maxlength="12" onkeypress="return Angka(event)">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="opd" class="col-sm-3 col-form-label">Status Tenaga</label>
                            <div class="col-sm-9">
                                <select name="st" id="st" class="form-control" required>
                                    <option value="">Pilih Status Tenaga</option>
                                    <option value="1">Honorer</option>
                                    <option value="2">PNS</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="opd" class="col-sm-3 col-form-label">OPD</label>
                            <div class="col-sm-9">
                                <select name="opd" id="opd" class="form-control" required>
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
                        <div class="form-group row">
                            <label for="bagian" class="col-sm-3 col-form-label">Bidang</label>
                            <div class="col-sm-9">
                                <select name="bagian" id="bagian" class="form-control" required>
                                    <option value="">Pilih Bagian</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nip" class="col-sm-3 col-form-label">Foto</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto" required autocomplete="off" accept="png,jpeg,jpg,gif">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-save"></i>
                                    </span>
                                    <span class="text">Simpan</span>
                                </button>
                            </div>
                        </div>
                    </form>
                    <script>
                        function Angka(event) {
                            var angka = (event.which) ? event.which : event.keyCode
                            if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                                return false;
                            return true;
                        }
                    </script>

                </div>
            </div>
        </div>



    </div>

</div>
<!---Container Fluid-->

<script>
    $(document).ready(function() {
        $("#opd").change(function() {
            var id_opd = $(this).val();
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