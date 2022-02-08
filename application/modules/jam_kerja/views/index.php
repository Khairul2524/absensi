<script src="<?= site_url('assets/backand/js/jquery-3.6.0.min.js') ?>"></script>



<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
	<div class="flash-gagal" data-flashgagal="<?= $this->session->flashdata('gagal') ?>"></div>
	<div class="flash-berhasil" data-flashberhasil="<?= $this->session->flashdata('berhasil') ?>"></div>
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
				<table class="table align-items-center table-flush table-hover">
					<thead>
						<tr>
							<th>NO</th>
							<th>Tanggal</th>
							<th>Mulai Masuk</th>
							<th>Jam Masuk</th>
							<th>Batas Masuk</th>
							<th>Mulai Pulang</th>
							<th>Jam Pulang</th>
							<th>Batas Pulang</th>
							<th style="width: 150px;">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($data as $d) {
						?>
							<tr>
								<td scope="row"><?= $no++; ?></td>
								<td><?= $d->tanggal ?></td>
								<td><?= $d->mulai_masuk ?></td>
								<td><?= $d->jam_masuk ?></td>
								<td><?= $d->batas_masuk ?></td>
								<td><?= $d->mulai_pulang ?></td>
								<td><?= $d->jam_pulang ?></td>
								<td><?= $d->batas_pulang ?></td>
								<td>
									<a href="#" class="btn btn-warning btn-circle tombol-ubah" data-toggle="modal" data-target="#menumodal" data-id="<?= $d->id_jk; ?>">
										<i class="fas fa-edit"></i>
									</a>
									<a href="<?= site_url('jam_kerja/hapus/') . $d->id_jk ?>" class="btn btn-danger btn-circle" onclick="return confirm('Yakin Hapus?')">
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
<div class="modal fade" id="menumodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form method="POST" action="<?= site_url('jam_kerja/tambah') ?>">
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
						<label for="tgl">Tanggal</label>
						<input type="date" class="form-control" id="tgl" name="tgl" placeholder="tgl" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label for="mulai_masuk">Jam Mulai Absen Masuk</label>
						<input type="time" class="form-control" id="mulai_masuk" name="mulai_masuk" placeholder="mulai_masuk" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label for="jam_masuk">Jam Masuk</label>
						<input type="time" class="form-control" id="jam_masuk" name="jam_masuk" placeholder="jam_masuk" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label for="batas_masuk">Jam Batas Absen Masuk</label>
						<input type="time" class="form-control" id="batas_masuk" name="batas_masuk" placeholder="batas_masuk" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label for="mulai_pulang">Jam Mulai Absen Pulang</label>
						<input type="time" class="form-control" id="mulai_pulang" name="mulai_pulang" placeholder="mulai_pulang" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label for="jam_pulang">Jam Pulang</label>
						<input type="time" class="form-control" id="jam_pulang" name="jam_pulang" placeholder="jam_pulang" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label for="batas_pulang">Jam Batas Absen Pulang</label>
						<input type="time" class="form-control" id="batas_pulang" name="batas_pulang" placeholder="batas_pulang" autocomplete="off" required>
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
			$('.modal-title').html('Tambah Jam Kerja')
			$('.modal-footer button[type= submit] span[class="icon text-white-50"]').html('	<i class="fas fa-plus-square"></i>')
			$('.modal-footer button[type= submit] span[class="text"]').html('Simpan')
			$('#id').val('')
			$('#tgl').val('')
			$('#mulai_masuk').val('')
			$('#jam_masuk').val('')
			$('#batas_masuk').val('')
			$('#mulai_pulang').val('')
			$('#jam_pulang').val('')
			$('#batas_pulang').val('')
		})
		// ubah
		$('.tombol-ubah').on('click', function() {
			$('.modal-title').html('Ubah Jam Kerja')
			$('.modal-footer button[type= submit] span[class="icon text-white-50"]').html('	<i class="fas fa-check"></i>')
			$('.modal-footer button[type= submit] span[class="text"]').html('Ubah')
			$('.modal-dialog form').attr('action', `<?= site_url('jam_kerja/ubah') ?>`)
			const id = $(this).data('id')
			// console.log(id)
			$.ajax({
				url: `<?= site_url('jam_kerja/getubah') ?>`,
				data: {
					id: id
				},
				method: 'post',
				dataType: 'json',
				success: function(data) {
					// console.log(data);
					$('#id').val(data.id_jk)
					$('#tgl').val(data.tanggal)
					$('#mulai_masuk').val(data.mulai_masuk)
					$('#jam_masuk').val(data.jam_masuk)
					$('#batas_masuk').val(data.batas_masuk)
					$('#mulai_pulang').val(data.mulai_pulang)
					$('#jam_pulang').val(data.jam_pulang)
					$('#batas_pulang').val(data.batas_pulang)
				}
			})
		})
	})
</script>
<script src="<?= site_url('assets/backand/js/jquery.dataTables.min.js') ?>"></script>