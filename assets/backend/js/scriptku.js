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


        $('.tombol-h').on('click', function(e) {
            e.preventDefault()
            const a = $(this).attr('href')

            Swal.fire({
                title: '<strong>Apakah Anda Yakin ?</strong>',
                icon: 'warning',
                html: 'Anda akan menghapus Data ini',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: `Hapus`,
                denyButtonText: `Don't save`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Swal.fire
                    document.location.href = a
                }
            })

        })