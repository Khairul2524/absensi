<div class="page-body">
	<div class="container-fluid">
		<div class="page-header">
			<div class="row">
				<div class="col-sm-6">
					<h3>List <?= $judul ?></h3>
					<button class="btn-primary btn btn-sm mt-2 btn-square tombol-tambah" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal"> Add New</button>
				</div>

			</div>
		</div>
	</div>
	<div class="flash-berhasil" data-flashberhasil="<?= $this->session->flashdata('berhasil') ?>"></div>
	<div class="flash-gagal" data-flashgagal="<?= $this->session->flashdata('gagal') ?>"></div>

	<!-- Container-fluid starts-->
	<div class="container-fluid">
		<div class="row starter-main">

			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
						<div class="dt-ext table-responsive">
							<table class="display" id="basic-1">
								<thead>
									<tr>
										<th>NO</th>
										<th>Tanggal</th>
										<th>Keterangan</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($data as $row) {
									?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $row->tgl ?></td>
											<td><?= $row->keterangan ?></td>
											<td>
												<button class="btn-warning btn btn-sm btn-square tombol-ubah" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal" data-id="<?= $row->id_hari_libur ?>"> <i class="fa fa-edit"></i></button>
												<button class="btn btn-danger btn-sm tombol-h" href="<?= base_url('hari_libur/hapus/') . $row->id_hari_libur ?>"><i class="fa fa-trash"></i></button>
											</td>
										</tr>
									<?php } ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Container-fluid Ends-->
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"></h5>
				<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form class="needs-validation" action="<?= base_url('hari_libur/tambah') ?>" method="post">
				<div class="modal-body">

					<input type="text" name="id" id="id" hidden>
					<div class="row g-3 mb-3">
						<div class="col-md-12">
							<label class="form-label" for="tgl">Tanggal</label>
							<input class="form-control" id="tgl" type="date" name="tgl" required="" autocomplete="off">
						</div>
						<div class="col-md-12">
							<label class="form-label" for="ket">Keterangan</label>
							<input class="form-control" id="ket" type="text" name="ket" required="" autocomplete="off">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-primary btn-square" type="button" data-bs-dismiss="modal">Keluar</button>
					<button class="btn btn-secondary btn-square" type="submit">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	$(function() {
		// tambah
		$('.tombol-tambah').on('click', function() {

			$('#exampleModalLabel').html('Form Hari Libur')
			$('.modal-footer button[type= submit]').html('Simpan')
			$('#id').val('')
			$('#tgl').val('')
			$('#ket').val('')
		})
		// ubah
		$('.tombol-ubah').on('click', function() {
			$('#exampleModalLabel').html('Form Hari Liburs')
			$('.modal-footer button[type= submit]').html('Ubah')
			$('.modal-content form').attr('action', `<?= site_url('hari_libur/ubah') ?>`)

			const id = $(this).data('id')
			// console.log(id)
			$.ajax({
				url: `<?= site_url('hari_libur/getubah') ?>`,
				data: {
					id: id
				},
				method: 'post',
				dataType: 'json',
				success: function(data) {
					// console.log(data)
					$('#id').val(data.id_hari_libur)
					$('#tgl').val(data.tgl)
					$('#ket').val(data.keterangan)
				}
			})
		})
	})
</script>
<script src="<?= base_url('assets/backend') ?>/js/sweet-alert/sweetalert2.all.min.js"></script>