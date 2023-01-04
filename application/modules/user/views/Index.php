<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>List User</h3>
                    <a href="<?= base_url('user/tambah') ?>" class="btn-primary btn btn-sm mt-2 btn-square"> Add New</a>
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
                            <table class="display" id="responsive">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama Lengkap</th>
                                        <th>Role</th>
                                        <th>OPD</th>
                                        <th>Bidang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                    </tr>
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