<script src="<?= site_url('assets/backand/js/jquery-3.6.0.min.js') ?>"></script>


<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data <?= $judul; ?></h6>
		</div>
		<div class="card-body">
			<button class="btn btn-success btn-icon-split mb-2 absen-masuk">
				<span class="icon text-white-50">
					<i class="fas fa-plus-square"></i>
				</span>
				<span class="text">Absen Masuk</span>
			</button>
			<button class="btn btn-warning btn-icon-split mb-2 absen-pulang">
				<span class="icon text-white-50">
					<i class="fas fa-plus-square"></i>
				</span>
				<span class="text">Absen Pulang</span>
			</button>
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Nama</th>
							<th>TGL</th>
							<th>Jam Masuk</th>
							<th>Jam Pulang</th>
							<th style="width: 100px;">Aksi</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
	<!-- <?= $this->session->userdata('idbagian') ?> -->
</div>

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
						Swal.fire(
							data,
							'',
							'success'
						)
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
						Swal.fire(
							data,
							'',
							'success'
						)
					}
				})
			}
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
					$("tbody").append("<tr><td>" + this['namalengkap'] + "</td><td>" + this['tgl'] + "</td><td>" + this['jam_masuk'] + "</td><td>" + this['jam_pulang'] + "</td><td>" + `<a href="<?php echo base_url('absensi/detail/') ?>` + this['iduser'] + `" class="btn btn-primary btn-circle"><i class="fas fa-eye"></i></a>` + "</td></tr>");
				} else if (`<?= $this->session->userdata('role') ?>` == 2) {
					if (this['idopd'] == `<?= $this->session->userdata('opd') ?>`) {
						$("tbody").append("<tr><td>" + this['namalengkap'] + "</td><td>" + this['tgl'] + "</td><td>" + this['jam_masuk'] + "</td><td>" + this['jam_pulang'] + "</td><td>" + `<a href="<?php echo base_url('absensi/detail/') ?>` + this['iduser'] + `" class="btn btn-primary btn-circle"><i class="fas fa-eye"></i></a>` + "</td></tr>");
					}
				} else if (`<?= $this->session->userdata('role') ?>` == 3) {
					if (this['idopd'] == `<?= $this->session->userdata('opd') ?>`) {
						if (this['id_bagian'] == `<?= $this->session->userdata('idbagian') ?>`) {
							$("tbody").append("<tr><td>" + this['namalengkap'] + "</td><td>" + this['tgl'] + "</td><td>" + this['jam_masuk'] + "</td><td>" + this['jam_pulang'] + "</td><td>" + `<a href="<?php echo base_url('absensi/detail/') ?>` + this['iduser'] + `" class="btn btn-primary btn-circle"><i class="fas fa-eye"></i></a>` + "</td></tr>");
						}
					}
				} else if (`<?= $this->session->userdata('role') ?>` == 4) {
					if (this['id_user'] == `<?= $this->session->userdata('iduser') ?>`) {
						$("tbody").append("<tr><td>" + this['namalengkap'] + "</td><td>" + this['tgl'] + "</td><td>" + this['jam_masuk'] + "</td><td>" + this['jam_pulang'] + "</td><td>" + `<a href="<?php echo base_url('absensi/detail/') ?>` + this['iduser'] + `" class="btn btn-primary btn-circle"><i class="fas fa-eye"></i></a>` + "</td></tr>");
					}
				}
			});
		});
	}
</script>