<script src="<?= site_url('assets/backand/js/jquery-3.6.0.min.js') ?>"></script>


<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
	<div class="flash-gagal" data-flashgagal="<?= $this->session->flashdata('gagal') ?>"></div>
	<div class="flash-info" data-flashinfo="<?= $this->session->flashdata('info') ?>"></div>
	<div class="flash-berhasil" data-flashberhasil="<?= $this->session->flashdata('berhasil') ?>"></div>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data <?= $judul; ?></h6>
		</div>
		<div class="card-body">
			<button class="btn btn-success btn-icon-split mb-2 tombol-tambah">
				<span class="icon text-white-50">
					<i class="fas fa-plus-square"></i>
				</span>
				<span class="text">Absen Masuk</span>
			</button>
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Nama</th>
							<th>TGL</th>
							<th>Jam Masuk</th>
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

</div>

<script>
	$(function() {
		// tambah
		$('.tombol-tambah').on('click', function() {
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
			var no = 1;
			$.each(data.result, function() {
				$("tbody").append("<tr><td>" + this['id_user'] + "</td><td>" + this['tgl'] + "</td><td>" + this['jam_masuk'] + "</td><td>" + `<?= 'Aksi' ?>` + "</td></tr>");
			});
		});
	}
</script>