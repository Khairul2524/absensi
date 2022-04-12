<div class="page-body">
	<div class="container-fluid">
		<div class="page-header">
			<div class="row">
				<div class="col-sm-6">
					<h3>List Role</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= base_url('user') ?>">User</a></li>
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
						<h5 class="sub-title">Data User </h5>
						<button class="btn btn-primary btn-square mt-2 tombol-tambah" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">Tambah Role</button>
					</div>
					<div class="card-body">
						<div class="table-responsive ">
							<table class="row-border" id="example-style-1">
								<thead>
									<tr>
										<th>NO</th>
										<th>Role</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($data as $d) {
										if ($d->idrole != 1) {
									?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $d->role ?></td>
												<td style="width: 175px;">
													<button class="btn btn-warning btn-square tombol-ubah " type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal" data-id="<?= $d->idrole; ?>"><i class="fa fa-edit"></i></button>
													<a href="<?= base_url('role	/hapus/') . $d->idrole ?>" class="btn btn-danger tombol-hapus"><i class="fa fa-trash"></i></a>
												</td>
											</tr>
									<?php }
									} ?>
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
<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog " role="document">
		<div class="modal-content">
			<form action="<?= site_url('role/tambah') ?>" method="POST">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Role</h5>
					<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<label class="form-label" for="email">Role</label>
					<input class="" id="id" name="id" type="hidden">
					<input class="form-control btn-square" id="role" name="role" type="text" required autocomplete="off">
				</div>
				<div class="modal-footer">
					<button class="btn btn-danger btn-square" type="button" data-bs-dismiss="modal">Batal</button>
					<button class="btn btn-primary btn-square" type="submit">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
</div>