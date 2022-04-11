const flashberhasil = $('.flash-berhasil').data('flashberhasil')

if (flashberhasil) {
    swal(flashberhasil, "", "success")
}
const flashgagal = $('.flash-gagal').data('flashgagal')

if (flashgagal) {
    swal(flashgagal, "", "error")
}
// sweat alert tombol hapus
$('.tombol-hapus').on('click', function(e) {

    // console.log('oke')
    e.preventDefault()
    const a = $(this).attr('href')
    swal({
        title: "Apakah Anda Yakin?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            document.location.href = a;
        }
    })
})
