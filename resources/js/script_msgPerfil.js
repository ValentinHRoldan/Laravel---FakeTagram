
const $msg_actualizacion = document.getElementById('msg_actualiazacion');

document.addEventListener('DOMContentLoaded', function(e){
    if($msg_actualizacion){
        setTimeout(function(){
            $msg_actualizacion.style.display = "none";
        }, 2500);
    }
})
