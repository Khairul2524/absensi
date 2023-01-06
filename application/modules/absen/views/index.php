<!-- Page Sidebar Ends-->
<script src="<?= base_url('assets/backend') ?>/js/sweet-alert/sweetalert.min.js"></script>
<script src="<?= base_url('assets/backend') ?>/js/sweet-alert/app.js"></script>
<div class="page-body">
	<div class="container-fluid">
		<div class="page-header">
			<div class="row">
				<div class="col-sm-6">
					<h3>Absen</h3>
				</div>
			</div>
		</div>
	</div>
	<div class="flash-berhasil" data-flashberhasil="<?= $this->session->flashdata('berhasil') ?>"></div>
	<div class="flash-gagal" data-flashgagal="<?= $this->session->flashdata('gagal') ?>"></div>

	<!-- Container-fluid starts-->
	<div class="container-fluid">
		<div class="row starter-main">
			<div class="col-xl-12">
				<div class="card">
					<div class="card-body">
						<div class="row mb-2">
							<div class="profile-title">
								<div class="row">
									<div class="col-md-3 bg-primary ">
										<button class="btn btn-primary absen-masuk btn-square m-3">
											Check In
										</button>
									</div>
									<div class="col-md-3 bg-danger">
										<button class="btn btn-danger absen-pulang btn-square m-3">
											Check Out
										</button>
									</div>

									<div class="col-md-3 bg-info">
										<button class="btn btn-info btn-square tombol-izin m-3" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">Absen Izin</button>
									</div>
									<div class="col-md-3 bg-warning">
										<button class="btn btn-warning tombol_td btn-square m-3 ">
											Tugas Dinas
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Container-fluid Ends-->
</div>
<!-- modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog " role="document">
		<div class="modal-content">
			<form action="<?= site_url('absensi/absen_izin') ?>" method="POST" enctype="multipart/form-data" class="absenizin">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Absen Izin</h5>
					<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label class="form-label">Foto</label>
						<input class="" id="lat" name="lat" hidden>
						<input class="" id="long" name="long" hidden>
						<input class="form-control btn-square" id="foto" name="foto" type="file" required autocomplete="off">
					</div>
					<div class="form-group">
						<label class="form-label">Keterangan</label>
						<textarea name="ket" id="ket" class="form-control btn-square" cols="30" rows="5" required autocomplete="off"></textarea>

					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-danger btn-square" type="button" data-bs-dismiss="modal">Batal</button>
					<button class="btn btn-primary btn-square absen-izin" type="submit">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- modal -->
<!-- modal TD-->
<div class="modal fade " id="modalTD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog " role="document">
		<div class="modal-content">
			<form action="<?= site_url('absensi/tugas_dinas') ?>" method="POST" enctype="multipart/form-data" class="tugas-dinas">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tugas Dinas</h5>
					<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label class="form-label">Foto</label>
						<input class="form-control btn-square" id="foto" name="foto" type="file" required autocomplete="off">
					</div>
					<div class="form-group">
						<label class="form-label">Keterangan</label>
						<textarea name="ket" id="ket" class="form-control btn-square" cols="30" rows="5" required autocomplete="off"></textarea>

					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-danger btn-square" type="button" data-bs-dismiss="modal">Batal</button>
					<button class="btn btn-primary btn-square tugas-dinas" type="submit">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- modal -->

<script>
	$(function() {
		// Absen Masuk
		$('.absen-masuk').on('click', function() {
			// console.log('oke')
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(showPosition);
			} else {
				$('.demo') = "Geolocation is not supported by this browser.";
			}

			function showPosition(position) {
				const long = position.coords.longitude
				const lat = position.coords.latitude
				// console.log(long)
				// console.log(lat)
				$.ajax({
					url: `<?= site_url('absen/absen_masuk') ?>`,
					data: {
						long: long,
						lat: lat
					},
					method: 'post',
					dataType: 'json',
					success: function(data) {
						// console.log(data);
						if (data.status == 0) {
							swal(data.keterangan, "", "info")
						} else {
							swal(
								data.keterangan,
								'',
								'success'
							)
						}
					}
				})
			}
		})
		// Absen Pulang
		$('.absen-pulang').on('click', function() {
			// console.log('oke')
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(showPosition);
			} else {
				$('.demo') = "Geolocation is not supported by this browser.";
			}

			function showPosition(position) {
				const long = position.coords.longitude
				const lat = position.coords.latitude
				// console.log(long)
				// console.log(lat)
				$.ajax({
					url: `<?= site_url('absen/absen_pulang') ?>`,
					data: {
						long: long,
						lat: lat
					},
					method: 'post',
					dataType: 'json',
					success: function(data) {
						// console.log(data)
						if (data.status == 0) {
							// console.log('oke')
							swal(
								data.keterangan,
								'',
								'info'
							)
						} else {
							swal(
								data.keterangan,
								'',
								'success'
							)
						}
					}
				})
			}
		})
		// Absen Izin
		$('.tombol-izin').on('click', function() {
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(showPosition);
			} else {
				$('.demo') = "Geolocation is not supported by this browser.";
			}

			function showPosition(position) {
				const long = position.coords.longitude
				const lat = position.coords.latitude
				$('#lat').val(lat)
				$('#long').val(long)
			}
		})
		$('.absen-izin').on('click', function() {

			var data = $('.absenizin').serialize()
			$.ajax({
				type: 'POST',
				url: `<?= site_url('absen/absen_izin') ?>`,
				data: data,
				dataType: 'json',
				success: function(data) {
					if (data.status == 0) {
						// console.log('oke')
						swal(
							data.keterangan,
							'',
							'info'
						)
					} else {
						swal(
							data.keterangan,
							'',
							'success'
						)
					}
				}
			});
		})
		// Tugas Dinas
		$('.tombol-td').on('click', function() {
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(showPosition);
			} else {
				$('.demo') = "Geolocation is not supported by this browser.";
			}

			function showPosition(position) {
				const long = position.coords.longitude
				const lat = position.coords.latitude
				$('#lat').val(lat)
				$('#long').val(long)
			}
		})
		$('.absen-izin').on('click', function() {

			var data = $('.absenizin').serialize()
			$.ajax({
				type: 'POST',
				url: `<?= site_url('absen/absen_izin') ?>`,
				data: data,
				dataType: 'json',
				success: function(data) {
					if (data.status == 0) {
						// console.log('oke')
						swal(
							data.keterangan,
							'',
							'info'
						)
					} else {
						swal(
							data.keterangan,
							'',
							'success'
						)
					}
				}
			});
		})
	})
</script>