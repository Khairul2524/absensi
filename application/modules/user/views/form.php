<link rel="stylesheet" type="text/css" href="<?= base_url('assets/backend') ?>/css/autoselect.min.css">
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Form User</h3>

                </div>

            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row starter-main">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= $action ?>" method="POST" enctype="multipart/form-data">
                            <input type="text" id="id" name="id" hidden value="<?= $id ?>">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label" for="nama">Nama Lengkap</label>
                                    <input class="form-control" id="nama" name="nama" type="text" autocomplete="off" required="" value="<?= $nama ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="email">Alamat Email</label>
                                    <input class="form-control" id="email" name="email" autocomplete="off" type="email" required="" value="<?= $email ?>">
                                </div>
                            </div>
                            <div class=" row g-3 ">
                                <div class=" col-md-6">
                                    <label class="form-label" for="password">Password</label>
                                    <input class="form-control" id="password" name="password" type="password" required="" value="<?= $password ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="opd">OPD</label>
                                    <select name="opd" id="opd" class="form-control autoselect">
                                        <?php
                                        foreach ($opd as $opd) {
                                        ?>
                                            <option value="<?= $opd->id_opd ?>"><?= $opd->nama_opd ?></option>
                                        <?php } ?>

                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="bidang">Bidang</label>
                                    <select name="bidang" id="bidang" class="form-control">

                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="role">Role</label>
                                    <select name="role" id="role" class="form-control " require>
                                        <option value="">-- Pilih Role --</option>
                                        <?php
                                        foreach ($role as $role) {
                                        ?>
                                            <option value="<?= $role->id_role ?>"><?= $role->role ?></option>
                                        <?php } ?>

                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="foto">Foto</label>
                                    <input type="file" name="foto" id="foto" class="form-control" value="<?= $foto ?>">

                                </div>
                            </div>

                            <button class="btn btn-primary mt-3" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
<script src="<?= base_url('assets/backend') ?>/js/autoselect/autoselect.min.js"></script>

<script>
    $(document).ready(function() {
        $("#opd").change(function() {
            var id_opd = $(this).val();
            $.ajax({
                url: `<?= base_url('user/get_bidang') ?>`,
                type: 'post',
                data: {
                    opd_id: id_opd
                },
                dataType: 'json',
                success: function(response) {
                    // console.log(response)
                    var len = response.length;

                    $("#bidang").empty();
                    $("#bidang").append("<option value=''>Pilih Bidang</option>");
                    for (var i = 0; i < len; i++) {
                        var id = response[i]['id_bidang'];
                        var name = response[i]['nama_bidang'];

                        $("#bidang").append("<option value='" + id + "'>" + name + "</option>");
                    }
                }
            });
        })
    })
</script>