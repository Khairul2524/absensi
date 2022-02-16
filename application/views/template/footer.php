<!-- Modal Logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to logout?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                <a href="<?= base_url('auth/logout') ?>" class="btn btn-primary">Logout</a>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>copyright &copy; <script>
                    document.write(new Date().getFullYear());
                </script> Kominfo Loteng

            </span>
        </div>
    </div>
</footer>
<!-- Footer -->
</div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>



<script src="<?= base_url('assets/backand/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/backand/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/backand/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/backand/') ?>js/ruang-admin.js"></script>
<script src="<?= base_url('assets/backand/') ?>js/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/backand/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/backand/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
<!-- Page level custom scripts -->

<script>
    // sweat alert
    const flashGagal = $('.flash-gagal').data('flashgagal')
    // console.log(flashData) 
    if (flashGagal) {
        Swal.fire(
            flashGagal,
            '',
            'error'
        )
    }
    const flashberhasil = $('.flash-berhasil').data('flashberhasil')
    // console.log(flashberhasil)
    if (flashberhasil) {
        Swal.fire(
            flashberhasil,
            '',
            'success'
        )
    }
    const flashinfo = $('.flash-info').data('flashinfo')
    // console.log(flashinfo)
    if (flashinfo) {
        Swal.fire(
            flashinfo,
            '',
            'info'
        )
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#example').DataTable({
            responsive: true
        });

        new $.fn.dataTable.FixedHeader(table);
    });
</script>


<script>
    $(document).ready(function() {
        $('#dataTable').DataTable(); // ID From dataTable 
        $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
</script>

</body>

</html>