import Dropzone from "dropzone";
//DropZone
Dropzone.autoDiscover = false;

let dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "DROP your image here",
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: "Delete image",
    maxFiles:1,
    uploadMultiple:false,
});

//Dropzone Events

dropzone.on('sending', function(file,xhr, formData){
    console.log(file);
});

dropzone.on("removedfile", function(file, response){
    console.log("Foto eliminada");
});

dropzone.on("success", function(file, response){
    console.log("Image upload correctly");
});