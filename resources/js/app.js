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




dropzone.on("success", function(file, response){
    alert("Image uploaded correctly");
    console.log(`Name of the image: ${response.image}`);
    document.getElementById("image").value = response.image;
});

dropzone.on("removedfile", function(file, response){
    console.log("Foto eliminada");
});

