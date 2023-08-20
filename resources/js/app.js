import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

let dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "DROP your image here",
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: "Delete image",
    maxFiles:1,
    uploadMultiple:false,
});
