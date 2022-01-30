<script src="<?= site_url('assets/backand/js/jquery-3.6.0.min.js') ?>"></script>
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data <?= $judul; ?></h6>
		</div>
		<div class="card-body">
			<?php
			if ($this->session->userdata('role') == 5) {
				$email = $this->session->userdata('email');
				$getuser = $this->db->get_where('user', ['email' => $email])->row();
			?>
				<a href="#" class="btn btn-success btn-icon-split mb-2 tombol-absen" data-toggle="modal" data-target="#absenmodal">
					<span class="icon text-white-50">
						<i class="fas fa-user"></i>
					</span>
					<span class="text">Absen</span>
				</a>
			<?php
			} else {
			?>
				<a href="#" class="btn btn-success btn-icon-split mb-2 tombol-tambah" data-toggle="modal" data-target="#menumodal">
					<span class="icon text-white-50">
						<i class="fas fa-plus-square"></i>
					</span>
					<span class="text">Tambah</span>
				</a>
			<?php
			}
			?>
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>NO</th>
							<th>Tanggal</th>
							<th>Nama Lengkap</th>
							<th>NIK</th>
							<th>Keterangan</th>
							<th>Jam Masuk</th>
							<?php
							if ($this->session->userdata('role') != 5) {
							?>
								<th>Aksi</th>
							<?php } ?>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($data as $d) {
						?>
							<tr>
								<td scope="row"><?= $no++; ?></td>
								<td><?= date('d, M, Y', $d->jammasuk); ?></td>
								<td><?= $d->namalengkap; ?></td>
								<td><?= $d->nik; ?></td>
								<td><?= $d->keterangan; ?></td>
								<td><?= date('H:i:s', $d->jammasuk); ?></td>
								<?php
								if ($this->session->userdata('role') != 5) {
								?>
									<td>
										<a href="#" class="btn btn-warning btn-circle tombol-ubah" data-toggle="modal" data-target="#menumodal" data-id="<?= $d->idabsensi; ?>">
											<i class="fas fa-edit"></i>
										</a>

									</td>
								<?php } ?>
							</tr>
						<?php }
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- /.container-fluid -->


	<!-- End of Main Content -->
	<div class="modal fade" id="menumodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<form method="POST" action="<?= site_url('absensi/tambah') ?>">
				<input type="text" id="id" name="id" hidden>
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"></h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">

						<div class="form-group" id="forminput">

						</div>
					</div>
					<div class="modal-footer">
						<button type="reset" class="btn btn-danger btn-icon-split mb-2">
							<span class="icon text-white-50">
								<i class="fas fa-times"></i>
							</span>
							<span class="text">Batal</span>
						</button>
						<button type="submit" class="btn btn-success btn-icon-split mb-2">
							<span class="icon text-white-50">
								<i class="fas fa-plus-square"></i>
							</span>
							<span class="text">Simpan</span>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="modal fade" id="absenmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<form method="POST" action="<?= site_url('absensi/tambah') ?>">
				<input type="text" id="id" name="id" hidden>
				<input type="text" id="pegawai" name="pegawai" value="<?= $getuser->iduser ?>" hidden>
				<input type="text" id="lat" name="lat" hidden>
				<input type="text" id="long" name="long" hidden>
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Absen Keadiran</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<h5 class="modal-title" id="demo">Absen Keadiran</h5>
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<tr>
								<td>Nama</td>
								<td>:</td>
								<td><?= $getuser->namalengkap; ?></td>
							</tr>

							<tr>
								<td>NIP</td>
								<td>:</td>
								<td><?= $getuser->nip; ?></td>
							</tr>

							<tr>
								<td>Izin ?</td>
								<td>:</td>
								<td>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="izin" id="ya" value="1" required>
										<label class="form-check-label" for="ya">
											Iya
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="izin" id="tidak" value="0" required>
										<label class="form-check-label" for="tidak">
											Tidak
										</label>
									</div>
								</td>
							</tr>
						</table>
						<div class="form-group" id="keterangan">
						</div>
					</div>
					<div class="modal-footer">
						<a href="#" class="btn btn-danger btn-icon-split mb-2">
							<span class="icon text-white-50">
								<i class="fas fa-times"></i>
							</span>
							<span class="text">Batal</span>
						</a>
						<button type="submit" class="btn btn-success btn-icon-split mb-2">
							<span class="icon text-white-50">
								<i class="fas fa-plus-square"></i>
							</span>
							<span class="text">Simpan</span>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<script>
		$(function() {
			// tambah
			$('.tombol-tambah').on('click', function() {
				$('.modal-title').html('Absensi')
				$('#forminput').html(`<label for="pegawai">Pegawai</label>
							<select name="pegawai" id="pegawai" class="form-control">
								<option value="">pilih Pegawai</option>
								<?php
								foreach ($user as $user) {
									if ($user->idrole == 5) {
								?>
										<option value="<?= $user->iduser; ?>"><?= $user->namalengkap; ?></option>
								<?php }
								} ?>
							</select>`)
				$('.modal-footer button[type= submit] span[class="icon text-white-50"]').html('	<i class="fas fa-plus-square"></i>')
				$('.modal-footer button[type= submit] span[class="text"]').html('Simpan')
				$('#id').val('')
			})
			// ubah
			$('.tombol-ubah').on('click', function() {
				$('.modal-title').html('Ubah Absensi')
				$('#forminput').html(`<label for="pegawai">Keterangan</label>
						<textarea name="ket" id="ket" cols="30" rows="5" class="form-control"></textarea>`)
				$('.modal-footer button[type= submit] span[class="icon text-white-50"]').html('	<i class="fas fa-check"></i>')
				$('.modal-footer button[type= submit] span[class="text"]').html('Ubah')
				$('.modal-dialog form').attr('action', `<?= site_url('absensi/ubah') ?>`)
				const id = $(this).data('id')
				$.ajax({
					url: `<?= site_url('absensi/getubah') ?>`,
					data: {
						id: id
					},
					method: 'post',
					dataType: 'json',
					success: function(data) {
						// console.log(data);
						$('#id').val(data.idabsensi)
						$('#ket').val(data.keterangan)
					}
				})
			})
			$('.tombol-absen').on('click', function() {
				if (navigator.geolocation) {
					navigator.geolocation.getCurrentPosition(showPosition);
				} else {
					$('.demo') = "Geolocation is not supported by this browser.";
				}

				function showPosition(position) {
					$('#lat').val(position.coords.latitude)
					$('#long').val(position.coords.longitude)
					// console.log(position.coords.longitude)
				}
			})
			$('#ya').on('click', function() {
				$('#keterangan').html(`<label for="pegawai">Keterangan</label>
						<textarea name="ket" id="ket" cols="30" rows="5" class="form-control"></textarea>`)
			})
			$('#tidak').on('click', function() {
				$('#keterangan').html('')
			})
		})
	</script>