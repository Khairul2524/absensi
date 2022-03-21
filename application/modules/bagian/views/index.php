<script src="<?= site_url('assets/backand/js/jquery-3.6.0.min.js') ?>"></script>


<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="flash-gagal" data-flashgagal="<?= $this->session->flashdata('gagal') ?>"></div>
	<!-- <div class="flash-info" data-flashinfo="<?= $this->session->flashdata('info') ?>"></div> -->
	<div class="flash-berhasil" data-flashberhasil="<?= $this->session->flashdata('berhasil') ?>"></div>
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
				<table class="display table-striped table-bordered table" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>NO</th>
							<th style="width: 150px;">Aksi</th>
							<th>Organisasi Perangkat Daerah</th>
							<th>Bagian Organisasi Perangkat Daerah</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($data as $d) {
						?>
							<tr>
								<td scope="row"><?= $no++; ?></td>
								<td>
									<a href="#" class="btn btn-warning btn-circle tombol-ubah" data-toggle="modal" data-target="#menumodal" data-id="<?= $d->id_bagian; ?>">
										<i class="fas fa-edit"></i>
									</a>
									<a href="<?= site_url('bagian/hapus/') . $d->id_bagian ?>" class="btn btn-danger btn-circle" onclick="return confirm('Yakin Hapus?')">
										<i class="fas fa-trash"></i>
									</a>
								</td>
								<td><?= $d->opd; ?></td>
								<td><?= $d->nama_bagian; ?></td>

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
		<form method="POST" action="<?= site_url('bagian/tambah') ?>">
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
						<label for="opd" class=" col-form-label">OPD</label>

						<select name="opd" id="opd" class="form-control" required>
							<option value="">Pilih OPD</option>
							<?php
							foreach ($opd as $opd) {

							?>
								<option value="<?= $opd->idopd; ?>"><?= $opd->opd; ?></option>
							<?php
							} ?>
						</select>
					</div>
					<div class="form-group">
						<label for="bagian" class=" col-form-label">Bagian</label>
						<div class="form-group">
							<textarea name="bagian" id="bagian" class="form-control" cols="30" rows="3"></textarea>
						</div>
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
			$('.modal-title').html('Tambah Bagian Organisasi Perangkat Daerah')
			$('.modal-footer button[type= submit] span[class="icon text-white-50"]').html('	<i class="fas fa-plus-square"></i>')
			$('.modal-footer button[type= submit] span[class="text"]').html('Simpan')
			$('#id').val('')
			$('#opd').val('')
			$('#bagian').val('')
		})
		// ubah
		$('.tombol-ubah').on('click', function() {
			$('.modal-title').html('Ubah Bagian Organisasi Perangkat Daerah')
			$('.modal-footer button[type= submit] span[class="icon text-white-50"]').html('	<i class="fas fa-check"></i>')
			$('.modal-footer button[type= submit] span[class="text"]').html('Ubah')
			$('.modal-dialog form').attr('action', `<?= site_url('bagian/ubah') ?>`)
			const id = $(this).data('id')
			// console.log(id)
			$.ajax({
				url: `<?= site_url('bagian/getubah') ?>`,
				data: {
					id: id
				},
				method: 'post',
				dataType: 'json',
				success: function(data) {
					// console.log(data)
					// console.log(data)
					$('#id').val(data.id_bagian)
					$('#opd').val(data.id_opd)
					$('#bagian').val(data.nama_bagian)
				}
			})
		})
	})
</script>