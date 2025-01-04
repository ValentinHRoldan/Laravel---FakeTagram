const d = document;
const $formDelete = d.getElementById('delete_form');

function confirmCancel(enlace) {
    Swal.fire({
        title: '¿Eliminar la publicacion?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar post',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $formDelete.submit()
        }
    });
}

$formDelete.addEventListener('submit', function(e){
    e.preventDefault();
    confirmCancel(this.action);
})
