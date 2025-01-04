const d = document;
const $formDelete = d.getElementById('delete_form');
const $msg_agregacion = d.getElementById('msg_agregacion');
const $msg_eliminacion = d.getElementById('msg_eliminacion');

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

if($formDelete){
    $formDelete.addEventListener('submit', function(e){
        e.preventDefault();
        confirmCancel(this.action);
    })
}

d.addEventListener('DOMContentLoaded', function(e){
    if($msg_agregacion){
        setTimeout(function(){
            $msg_agregacion.style.display = "none";
        }, 2500);
    }
    if($msg_eliminacion){
        setTimeout(function(){
            $msg_eliminacion.style.display = "none";
        }, 2500);
    }
})
