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
			<a href="#" class="btn btn-success btn-icon-split mb-2 tombol-tambah" data-toggle="modal" data-target="#menumodal">
				<span class="icon text-white-50">
					<i class="fas fa-plus-square"></i>
				</span>
				<span class="text">Tambah</span>
			</a>
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>NO</th>
							<th>Organisasi Perangkat Daerah</th>
							<th>Qr Code</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($data as $d) {
						?>
							<tr>
								<td scope="row"><?= $no++; ?></td>
								<td><?= $d->opd; ?></td>
								<td><img src="<?= base_url('assets/backand/img/qrcode/') . $d->qr_code ?>" alt="" width="150px"></td>
								<td>
									<a href="#" class="btn btn-warning btn-circle tombol-ubah" data-toggle="modal" data-target="#menumodal" data-id="<?= $d->idopd; ?>">
										<i class="fas fa-edit"></i>
									</a>
									<a href="<?= site_url('opd/hapus/') . $d->idopd ?>" class="btn btn-danger btn-circle" onclick="return confirm('Yakin Hapus?')">
										<i class="fas fa-trash"></i>
									</a>
								</td>
							</tr>
						<?php }
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<div class="modal fade" id="menumodal" tabindex="-1" opd="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<form method="POST" action="<?= site_url('opd/tambah') ?>">
			<input type="text" id="id" name="id" hidden>
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"></h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="opd">Organisasi Perangkat Daerah</label>
						<input type="text" class="form-control" id="opd" name="opd" placeholder="Organisasi Perangkat Daerah" autocomplete="off" required>
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
			$('.modal-title').html('Tambah Organisasi Perangkat Daerah')
			$('.modal-footer button[type= submit] span[class="icon text-white-50"]').html('	<i class="fas fa-plus-square"></i>')
			$('.modal-footer button[type= submit] span[class="text"]').html('Simpan')
			$('#id').val('')
			$('#opd').val('')
		})
		// ubah
		$('.tombol-ubah').on('click', function() {
			$('.modal-title').html('Ubah Organisasi Perangkat Daerah')
			$('.modal-footer button[type= submit] span[class="icon text-white-50"]').html('	<i class="fas fa-check"></i>')
			$('.modal-footer button[type= submit] span[class="text"]').html('Ubah')
			$('.modal-dialog form').attr('action', `<?= site_url('opd/ubah') ?>`)
			const id = $(this).data('id')
			// console.log(id)
			$.ajax({
				url: `<?= site_url('opd/getubah') ?>`,
				data: {
					id: id
				},
				method: 'post',
				dataType: 'json',
				success: function(data) {
					// console.log(data)
					// console.log(data)
					$('#id').val(data.idopd)
					$('#opd').val(data.opd)
				}
			})
		})
	})
</script>