<div class="page-body">
  <div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col-sm-6">
          <h3>User</h3>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('user') ?>">User </a></li>
            <li class="breadcrumb-item active"><a href="<?= base_url('user') ?>">Tambah User </a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-body">
            <form action="<?= base_url('user/simpan') ?>" method="POST" enctype="multipart/form-data">
              <div class="form theme-form">
                <div class="row">
                  <div class="col">
                    <div class="mb-3">
                      <label>Nama Lengkap</label>
                      <input class="form-control btn-square" type="text" name="nama" id="nama" placeholder="Nama Lengkap *" required autocomplete="off">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label>Alamat Email</label>
                      <input class="form-control btn-square" name="email" id="id" type="text" placeholder="Alamat Email" required autocomplete="off">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label>Password</label>
                      <input class="form-control btn-square" type="password" placeholder="************" name="password" id="password" required autocomplete="off">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4">
                    <div class="mb-3">
                      <label>NIK</label>
                      <input class="form-control btn-square" type="text" placeholder="52***************" maxlength="16" onkeypress="return Angka(event)" name="nik" id="nik" required autocomplete="off">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="mb-3">
                      <label>NIP</label>
                      <input class="form-control btn-square" type="text" placeholder="19********************" name="nip" id="nip" required autocomplete="off" maxlength="20" onkeypress="return Angka(event)">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="mb-3">
                      <label>NO Handphone</label>
                      <input class="form-control btn-square" type="text" placeholder="08**********" name="no" id="no" required autocomplete="off" maxlength="12" onkeypress="return Angka(event)">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="mb-3">
                      <label>Organisasi Perangkat Daerah</label>
                      <select class="form-select btn-square digits" id="opd" name="opd" required autocomplete="off">
                        <option value="">Piih OPD</option>
                        <?php
                        foreach ($opd as $opd) {
                          echo ' <option ' . $select . ' class="pilihan" value=" ' . $opd->idopd . '">' . $opd->opd . '</option>';
                        } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="mb-3">
                      <label>Bidang</label>
                      <select name="bagian" id="bagian" class="form-control btn-square" required autocomplete="off">
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="mb-3">
                      <label>Role</label>
                      <select class="form-select btn-square digits" id="role" name="role" required autocomplete="off">
                        <option value="">Piih Role</option>
                        <?php
                        foreach ($role as $role) {
                          if ($role->idrole != 1) {
                            echo ' <option class="pilihan" value=" ' . $role->idrole . '">' . $role->role . '</option>';
                          }
                        } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="mb-3">
                      <label>Status Tenaga</label>
                      <select name="st" id="st" class="form-select btn-square">
                        <option value="">Pilih Status Tenaga</option>
                        <option value="1">Honorer</option>
                        <option value="2">PNS</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="mb-3">
                      <label>Foto</label>
                      <input class="form-control btn-square" type="file" name="foto" id="foto" required autocomplete="off">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="text-end">
                      <button class="btn btn-primary me-3 btn-square" type="submit">Simpan</button>
                      <button class="btn btn-warning me-3 btn-square" type="reset">Reset</button>
                      <a class="btn btn-danger btn-square" href="<?= base_url('user') ?>">Kembali</a>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid Ends-->
</div>

<script>
  $(document).ready(function() {
    $("#opd").change(function() {
      var id_opd = $(this).val();
      console.log(id_opd);
      $.ajax({
        url: `<?= base_url('user/get_bagian') ?>`,
        type: 'post',
        data: {
          opd_id: id_opd
        },
        dataType: 'json',
        success: function(response) {
          console.log(response)
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