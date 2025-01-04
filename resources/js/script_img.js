import Dropzone from 'dropzone';
const d = document;
const $formImg = d.getElementById("dropzone");
const $imgInput = d.getElementById('imagen');
const $btnPost = d.getElementById('btn_post');

Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Subi tu imagen acá",
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: "Eliminar archivo",
    maxFiles: 1,
    uploadMultiple: false,
    maxFilesize: 5,

    init: function(){
        if($imgInput.value.trim()){
            const imagenPublicada = {};
            imagenPublicada.size = 1234;
            imagenPublicada.name = $imgInput.value;
            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`);
            imagenPublicada.previewElement.classList.add(
                "dz-success",
                "dz-complete"
            )
        }
    },
})

dropzone.on("sending", function(file, xhr, formdata){
    $formImg.classList.remove("text-white");
    $formImg.classList.add("text-red-700");
})

dropzone.on("success", function(file, response){
    $imgInput.value = response.imagen;
    $btnPost.disabled = false;

})

dropzone.on("error", function(file, message){
    console.log(file);
})

dropzone.on("removedfile", function(){
    $formImg.classList.add("text-white");
    $formImg.classList.remove("text-red-700");
    $imgInput.value = "";
    $btnPost.disabled = true;
});