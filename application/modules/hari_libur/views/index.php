<div class="page-body">
	<div class="container-fluid">
		<div class="page-header">
			<div class="row">
				<div class="col-sm-6">
					<h3 class="">List Hari Libur</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= base_url('hari_libur') ?>">Hari Libur</a></li>
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
						<h5 class="sub-title">Hari Libur </h5>
						<button class="btn btn-primary btn-square mt-2 tombol-tambah" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">Tambah Hari Libur</button>
					</div>
					<div class="card-body">
						<div class="table-responsive ">
							<table class="row-border" id="example-style-1">
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
									foreach ($data as $d) {

									?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $d->tanggal ?></td>
											<td><?= $d->keterangan ?></td>
											<td>
												<button class="btn btn-warning  tombol-ubah " type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal" data-id="<?= $d->id_hari_libur; ?>"><i class="fa fa-edit"></i></button>
												<a href="<?= base_url('hari_libur/hapus/') . $d->id_hari_libur ?>" class="btn btn-danger tombol-hapus"><i class="fa fa-trash"></i></a>
											</td>
										</tr>
									<?php }
									?>
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

<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog " role="document">
		<div class="modal-content">
			<form action="<?= site_url('hari_libur/tambah') ?>" method="POST">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Role</h5>
					<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label class="form-label">Tanggal</label>
						<input class="" id="id" name="id" type="hidden">
						<input class="form-control btn-square" id="tgl" name="tgl" type="date" required autocomplete="off">
					</div>
					<div class="form-group">
						<label class="form-label">Keterangan</label>
						<input class="form-control btn-square" id="ket" name="ket" type="text" required autocomplete="off">
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-danger btn-square" type="button" data-bs-dismiss="modal">Batal</button>
					<button class="btn btn-primary btn-square" type="submit">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	$(function() {
		// tambah
		$('.tombol-tambah').on('click', function() {
			$('.modal-title').html('Tambah Hari Libur')

			$('.modal-footer button[type= submit] ').html('Simpan')
			$('#id').val('')
			$('#tgl').val('')
			$('#ket').val('')
		})
		// ubah
		$('.tombol-ubah').on('click', function() {
			$('.modal-title').html('Ubah Hari Libur')
			$('.modal-footer button[type= submit] ').html('Ubah')
			$('.modal-dialog form').attr('action', `<?= site_url('hari_libur/ubah') ?>`)
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

					$('#id').val(data.id_hari_libur)
					$('#tgl').val(data.tanggal)
					$('#ket').val(data.keterangan)
				}
			})
		})
	})
</script>