<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Admin</h1>
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
                    <h6 class="m-0 font-weight-bold text-primary">Identitas Admin</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?= $action ?>">
                        <input type="hidden" name="id" id="id" value="">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" name="email" value=" <?= $email ?>" autocomplete="off" placeholder="Alamat Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required autocomplete="off" value="<?= $nama ?>">
                            </div>
                        </div>

                        <div class="form-group row" <?php
                                                    if ($kode == 0) {
                                                        echo 'hidden';
                                                    }
                                                    ?>>
                            <label for="nama" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="password" name="password" placeholder="Password" required autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" required autocomplete="off" value="<?= $nik ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nip" class="col-sm-3 col-form-label">NIP</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nip" name="nip" placeholder="NIP" required autocomplete="off" value="<?= $nip ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no" class="col-sm-3 col-form-label">NO HP</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="no" name="no" placeholder="NO HP" required autocomplete="off" value="<?= $no ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="opd" class="col-sm-3 col-form-label">Status Tenaga</label>
                            <div class="col-sm-9">
                                <select name="st" id="st" class="form-control" required>
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
                        <div class="form-group row">
                            <label for="opd" class="col-sm-3 col-form-label">OPD</label>
                            <div class="col-sm-9">
                                <select name="opd" id="opd" class="form-control" required>
                                    <?php
                                    foreach ($opd as $opd) {
                                        if ($idopd != $opd->idopd) {
                                    ?>
                                            <option value="<?= $opd->idopd; ?>"><?= $opd->opd; ?></option>
                                    <?php }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="role" class="col-sm-3 col-form-label">Role</label>
                            <div class="col-sm-9">
                                <select name="role" id="role" class="form-control" required>
                                    <?php
                                    foreach ($role as $role) {
                                        if ($role->idrole != 1) {
                                    ?>
                                            <option value="<?= $role->idrole; ?>"><?= $role->role; ?></option>
                                    <?php }
                                    } ?>
                                </select>
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
                </div>
            </div>
        </div>



    </div>

</div>
<!---Container Fluid-->