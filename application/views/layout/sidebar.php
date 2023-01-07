<!-- Page Body Start-->
<div class="page-body-wrapper horizontal-menu">
	<!-- Page Sidebar Start-->
	<header class="main-nav">
		<div class="sidebar-user text-center"><a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a><img class="img-90 rounded-circle" src="<?= base_url('assets/backend') ?>/img/default.png" alt="">
			<div class="badge-bottom"><span class="badge badge-primary">New</span></div><a href="user-profile.html">
				<h6 class="mt-3 f-14 f-w-600">Emay Walter</h6>
			</a>
			<p class="mb-0 font-roboto">Human Resources Department</p>

		</div>

		<nav>
			<div class="main-navbar">
				<div id="mainnav">
					<ul class="nav-menu custom-scrollbar">
						<li class="back-btn">
							<div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
						</li>

						<li class="dropdown"><a class="nav-link" href="<?= base_url('admin') ?>"><i data-feather="home"></i><span>Dashboard</span></a></li>

						<li class="dropdown"><a class="nav-link" href="<?= base_url('absen') ?>"><i data-feather="user"></i><span>Absen</span></a></li>

						<li class="sidebar-main-title">
							<div>
								<h6>Master</h6>
							</div>
						</li>
						<li class="dropdown"><a class="nav-link" href="<?= base_url('rekapan') ?>"><i data-feather="database"></i><span>Rekapan</span></a></li>
						<li class="dropdown"><a class="nav-link" href="<?= base_url('opd') ?>"><i data-feather="folder-plus"></i><span>OPD</span></a></li>
						<li class="dropdown"><a class="nav-link" href="<?= base_url('bidang') ?>"><i data-feather="folder"></i><span>Bidang</span></a></li>
						<li class="dropdown"><a class="nav-link" href="<?= base_url('hari_libur') ?>"><i data-feather="folder-minus"></i><span>Hari Libur</span></a></li>
						<li class="sidebar-main-title">
							<div>
								<h6>Manajemen User</h6>
							</div>
						</li>
						<li class="dropdown"><a class="nav-link" href="<?= base_url('user') ?>"><i data-feather="users"></i><span>User</span></a></li>
						<li><a class="nav-link" href="<?= base_url('role') ?>"><i data-feather="git-commit"></i><span>Role</span></a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- Page Sidebar Ends-->