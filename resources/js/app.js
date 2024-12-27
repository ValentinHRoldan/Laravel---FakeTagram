import Dropzone from 'dropzone';

Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Subi tu imagen acá",
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: "Eliminar archivo",
    maxFiles: 1,
    uploadMultiple: false
})
