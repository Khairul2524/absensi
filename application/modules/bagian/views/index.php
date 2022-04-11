<div class="page-body">
	<div class="container-fluid">
		<div class="page-header">
			<div class="row">
				<div class="col-sm-6">
					<h3 class="">List Bidang OPD</h3>
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
						<h5 class="sub-title">Bidang OPD </h5>
						<button class="btn btn-primary btn-square mt-2 tombol-tambah" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target=".bd-example-modal-lg">Tambah Bidang OPD</button>
					</div>
					<div class="card-body">
						<div class="table-responsive ">
							<table class="row-border" id="example-style-1">
								<thead>
									<tr>
										<th>NO</th>
										<th>Organisasi Perangkat Daerah</th>
										<th>Bidang</th>
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
											<td><?= $d->opd ?></td>
											<td><?= $d->nama_bagian ?></td>
											<td style="width: 200px;">
												<button class="btn btn-warning btn-square tombol-ubah " type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target=".bd-example-modal-lg" data-id="<?= $d->id_bagian; ?>"><i class="fa fa-edit"></i></button>
												<a href="<?= base_url('bagian/hapus/') . $d->id_bagian ?>" class="btn btn-danger tombol-hapus"><i class="fa fa-trash"></i></a>
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
</div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myLargeModalLabel">Large modal</h5>
				<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('bagian/tambah') ?>" method="POST">
					<div class="form-group">
						<label class="form-label">OPD</label>
						<input class="" id="id" name="id" type="hidden">
						<select name="opd" id="opd" class="form-control btn-square" required>
							<option value="">Piih OPD</option>
							<?php
							foreach ($opd as $opd) {
							?>
								<option value="<?= $opd->idopd; ?>"><?= $opd->opd; ?></option>
							<?php
							} ?>
						</select>
					</div>
					<div class="form-group">
						<label class="form-label">Nama Bidang</label>
						<input class="form-control btn-square" id="bagian" name="bagian" type="text" required autocomplete="off">
					</div>
					<button class="btn btn-danger btn-square" type="button" data-bs-dismiss="modal">Batal</button>
					<button class="btn btn-primary btn-square" type="submit">Simpan</button>

				</form>
			</div>
		</div>
	</div>
</div>

<script>
	$(function() {
		// tambah
		$('.tombol-tambah').on('click', function() {
			$('.modal-title').html('Tambah Bidang OPD')
			$('.modal-footer button[type= submit] ').html('Simpan')
			$('#id').val('')
			$('#opd').val('')
			$('#bagian').val('')
		})
		// ubah
		$('.tombol-ubah').on('click', function() {
			$('.modal-title').html('Ubah Bidang OPD')
			$('.modal-footer button[type= submit] ').html('Ubah')
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

					$('#id').val(data.id_bagian)
					$('#opd').val(data.id_opd)
					$('#bagian').val(data.nama_bagian)
				}
			})
		})
	})
</script>