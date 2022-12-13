document.getElementById("delete").addEventListener("click", function () {
    swal.fire({
        title: "Estas seguro?",
        text: "No podrás recuperar tu usuario!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, borrar!',
        cancelButtonText: "No, quiero mi cuenta"
    }).then((result) => {
        if (result.isConfirmed) {
            swal.fire(
                'Borrada!',
                'No hay marcha atras.',
                'success',
                window.location.href = '../php/perfil.php?borrar=1'
            )
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swal.fire(
                'Cancelado',
                'Tu cuenta no se ha borrado :)',
                'success'
            )
        }
    })
});