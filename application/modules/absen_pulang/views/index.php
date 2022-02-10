<script src="<?= site_url('assets/backand/js/jquery-3.6.0.min.js') ?>"></script>
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
	<div class="flash-gagal" data-flashgagal="<?= $this->session->flashdata('gagal') ?>"></div>
	<div class="flash-info" data-flashinfo="<?= $this->session->flashdata('info') ?>"></div>
	<div class="flash-berhasil" data-flashberhasil="<?= $this->session->flashdata('berhasil') ?>"></div>
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

				<a href="#" class="btn btn-warning btn-icon-split mb-2 tombol-absen" data-toggle="modal" data-target="#absenmodal">
					<span class="icon text-white-50">
						<i class="fas fa-user"></i>
					</span>
					<span class="text">Absen Pulang</span>
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
							<th>Jam Pulang</th>
							<?php
							if ($this->session->userdata('role') != 5) {
							?>
								<th>Aksi</th>
							<?php } ?>
						</tr>
					</thead>
					<tbody>
						<?php
						// echo $this->session->userdata('email');
						$cek = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row();
						// var_dump($cek);
						// die;
						$no = 1;
						// echo $this->session->userdata('opd');
						foreach ($data as $d) {
							if ($d->idopd == $this->session->userdata('opd')) {
								if ($this->session->userdata('role') == 5) {
									if ($cek->iduser == $d->iduser) {
						?>
										<tr>
											<td scope="row"><?= $no++; ?></td>
											<td><?= $d->tanggal; ?></td>
											<td><?= $d->namalengkap; ?></td>
											<td><?= $d->nik; ?></td>
											<td><?= $d->keterangan; ?></td>
											<td><?= $d->absen_pulang; ?></td>
											<?php
											if ($this->session->userdata('role') != 5) {
											?>
												<td>
													<a href="#" class="btn btn-warning btn-circle tombol-ubah" data-toggle="modal" data-target="#menumodal" data-id="<?= $d->id_absen_pulang; ?>">
														<i class="fas fa-edit"></i>
													</a>

												</td>
											<?php } ?>
										</tr>
									<?php }
								} else {
									?>
									<tr>
										<td scope="row"><?= $no++; ?></td>
										<td><?= $d->tanggal; ?></td>
										<td><?= $d->namalengkap; ?></td>
										<td><?= $d->nik; ?></td>
										<td><?= $d->keterangan; ?></td>
										<td><?= $d->absen_pulang; ?></td>
										<td>
											<a href="#" class="btn btn-warning btn-circle tombol-ubah" data-toggle="modal" data-target="#menumodal" data-id="<?= $d->id_absen_pulang; ?>">
												<i class="fas fa-edit"></i>
											</a>
										</td>
									</tr>
						<?php
								}
							}
						}
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
			<form method="POST" action="<?= site_url('absen_pulang/tambah') ?>">
				<input type="text" id="id" name="id" hidden>
				<input type="text" id="lat" name="lat" hidden>
				<input type="text" id="long" name="long" hidden>
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
			<form method="POST" action="<?= site_url('absen_pulang/tambah') ?>">
				<input type="text" id="id" name="id" hidden>
				<input type="text" id="pegawai" name="pegawai" value="<?= $getuser->iduser ?>" hidden>
				<input type="text" id="lata" name="lat" hidden>
				<input type="text" id="longa" name="long" hidden>
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Absen Pulang</h5>
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
				$('.modal-title').html('Absen Pulang')
				$('#forminput').html(`<label for="pegawai">Pegawai</label>
							<select name="pegawai" id="pegawai" class="form-control" required>
								<option value="">pilih Pegawai</option>
								<?php
								foreach ($user as $user) {
									if ($user->idrole == 5) {
										if ($user->idopd == $this->session->userdata('opd')) {

								?>
										<option value="<?= $user->iduser; ?>"><?= $user->namalengkap; ?></option>
								<?php }
									}
								} ?>
							</select>`)
				$('.modal-footer button[type= submit] span[class="icon text-white-50"]').html('	<i class="fas fa-plus-square"></i>')
				$('.modal-footer button[type= submit] span[class="text"]').html('Simpan')
				$('#id').val('')
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
			// ubah
			$('.tombol-ubah').on('click', function() {
				$('.modal-title').html('Ubah Absen Pulang')
				$('#forminput').html(`<label for="pegawai">Keterangan</label>
						<textarea name="ket" id="ket" cols="30" rows="5" class="form-control"></textarea>`)
				$('.modal-footer button[type= submit] span[class="icon text-white-50"]').html('	<i class="fas fa-check"></i>')
				$('.modal-footer button[type= submit] span[class="text"]').html('Ubah')
				$('.modal-dialog form').attr('action', `<?= site_url('absen_pulang/ubah') ?>`)
				const id = $(this).data('id')
				$.ajax({
					url: `<?= site_url('absen_pulang/getubah') ?>`,
					data: {
						id: id
					},
					method: 'post',
					dataType: 'json',
					success: function(data) {
						// console.log(data);
						$('#id').val(data.id_absen_pulang)
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
					$('#lata').val(position.coords.latitude)
					$('#longa').val(position.coords.longitude)
					// console.log(position.coords.longitude)
					// console.log(position.coords.latitude)
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