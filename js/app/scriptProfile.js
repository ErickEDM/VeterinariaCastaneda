const profileUser = document.getElementById("profileUser");
const profileNum = document.getElementById("profileNum");
const customLabelUpload = document.getElementById("customLabelUpload");

const btnProfileEdit = document.getElementById("btnProfileEdit");
const btnProfileSubmit = document.getElementById("btnProfileSubmit");



function enable(){
    profileUser.style.pointerEvents = "auto";
    profileNum.style.pointerEvents = "auto";
    customLabelUpload.style.pointerEvents = "auto";
    btnProfileSubmit.style.display= "block"
}

function cancelPass(){
    if(confirm("¿Estás seguro que deseas cancelar?")==true){
        window.location = 'http://localhost/veterinaria/app/profile/';
    }
}