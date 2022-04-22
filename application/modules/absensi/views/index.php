<script src="<?= base_url('assets/backand') ?>/js/sweet-alert/sweetalert.min.js"></script>
<script src="<?= base_url('assets/backand') ?>/js/sweet-alert/app.js"></script>
<div class="page-body">
	<div class="container-fluid">
		<div class="page-header">
			<div class="row">
				<div class="col-sm-6">
					<h3>List Absensi</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= base_url('user') ?>">Absensi</a></li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<div class="flash-berhasil" data-flashberhasil="<?= $this->session->flashdata('berhasil') ?>"></div>
	<div class="flash-gagal" data-flashgagal="<?= $this->session->flashdata('gagal') ?>"></div>
	<!-- Container-fluid starts-->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h5 class="sub-title">Data Absensi </h5>
						<?php
						if ($this->session->userdata('role') == 4) {
						?>
							<button class="btn btn-success absen-masuk btn-square mt-2">
								Absen Masuk
							</button>
							<button class="btn btn-danger absen-pulang btn-square mt-2">
								Absen Pulang
							</button>
							<button class="btn btn-warning btn-square mt-2 tombol-izin" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">Absen Izin</button>
						<?php
						}
						?>
					</div>

					<div class="card-body">
						<div class="table-responsive ">
							<table class="row-border" id="basic-1">
								<thead>
									<tr>
										<th>NO </th>
										<th>Tanggal</th>
										<th>Jam Masuk</th>
										<th>Jam Pulang</th>
										<th style="width:200px">Aksi</th>
									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
						</div>
					</div>
					<div class="card-footer">

					</div>
				</div>
			</div>
		</div>
	</div>
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
				$.ajax({
					url: `<?= site_url('absensi/absen_masuk') ?>`,
					data: {
						long: long,
						lat: lat
					},
					method: 'post',
					dataType: 'json',
					success: function(data) {

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
				$.ajax({
					url: `<?= site_url('absensi/absen_pulang') ?>`,
					data: {
						long: long,
						lat: lat
					},
					method: 'post',
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
				url: `<?= site_url('absensi/absen_izin') ?>`,
				data: data,
				// dataType: 'json',
				// success: function(data) {
				// 	if (data.status == 0) {
				// 		// console.log('oke')
				// 		swal(
				// 			data.keterangan,
				// 			'',
				// 			'info'
				// 		)
				// 	} else {
				// 		swal(
				// 			data.keterangan,
				// 			'',
				// 			'success'
				// 		)
				// 	}
				// }
			});

		})
	})
	$(document).ready(function() {
		selesai();
	});

	function selesai() {
		setTimeout(function() {
			update();
			selesai();
		}, 200);
	}

	function update() {
		$.getJSON("absensi/getdata", function(data) {
			$("tbody").empty();
			// console.log(data.result);
			$.each(data.result, function() {
				if (`<?= $this->session->userdata('role') ?>` == 1) {
					$("tbody").append("<tr><td>" + this['namalengkap'] + "</td><td>" + this['tgl'] + "</td><td>" + this['jam_masuk'] + "</td><td>" + this['jam_pulang'] + "</td><td>" + `<a href="<?php echo base_url('absensi/detail/') ?>` + this['iduser'] + `" class="btn btn-primary btn-square ml-5"><i class="fa fa-eye"></i></a>` + "</td></tr>");
				} else if (`<?= $this->session->userdata('role') ?>` == 2) {
					if (this['idopd'] == `<?= $this->session->userdata('opd') ?>`) {
						$("tbody").append("<tr><td>" + this['namalengkap'] + "</td><td>" + this['tgl'] + "</td><td>" + this['jam_masuk'] + "</td><td>" + this['jam_pulang'] + "</td><td>" + `<a href="<?php echo base_url('absensi/detail/') ?>` + this['iduser'] + `" class="btn btn-primary btn-square"><i class="fa fa-eye"></i></a>` + "</td></tr>");
					}
				} else if (`<?= $this->session->userdata('role') ?>` == 3) {
					if (this['idopd'] == `<?= $this->session->userdata('opd') ?>`) {
						if (this['id_bagian'] == `<?= $this->session->userdata('idbagian') ?>`) {
							$("tbody").append("<tr><td>" + this['namalengkap'] + "</td><td>" + this['tgl'] + "</td><td>" + this['jam_masuk'] + "</td><td>" + this['jam_pulang'] + "</td><td>" + `<a href="<?php echo base_url('absensi/detail/') ?>` + this['iduser'] + `" class="btn btn-primary btn-square"><i class="fa fa-eye"></i></a>` + "</td></tr>");
						}
					}
				} else if (`<?= $this->session->userdata('role') ?>` == 4) {
					if (this['id_user'] == `<?= $this->session->userdata('iduser') ?>`) {
						$("tbody").append("<tr><td>" + this['namalengkap'] + "</td><td>" + this['tgl'] + "</td><td>" + this['jam_masuk'] + "</td><td>" + this['jam_pulang'] + "</td><td>" + `<a href="<?php echo base_url('absensi/detail/') ?>` + this['iduser'] + `" class="btn btn-primary btn-square"><i class="fa fa-eye"></i></a>` + "</td></tr>");
					}
				}
			});
		});
	}
</script>