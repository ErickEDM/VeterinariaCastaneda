const btnAdd = document.getElementById("btnAdd");
const btnUpdate = document.getElementById("btnUpdate");
const btnDelete = document.getElementById("btnDelete");

const btnAddSubmit = document.getElementById("btnAddSubmit");
const btnUpdateSubmit = document.getElementById("btnUpdateSubmit");

const btnUpdateSearchView = document.getElementById("btnUpdate");
const btnUpdateCancelView = document.getElementById("btnDelete");

const updateSearch = document.getElementById("updateSearch");
const deleteSearch = document.getElementById("deleteSearch");

const addForm = document.getElementById("addForm");
const updateForm = document.getElementById("updateForm");
const deleteForm = document.getElementById("deleteForm");

btnAdd.onclick = function(){
    window.location = 'http://localhost/veterinaria/app/users/add.php';
}
btnUpdate.onclick = function(){
    updateSearch.style.display = "block";
    btnAdd.disabled = true;
    btnUpdate.disabled = true;
    btnDelete.disabled = true;
}
btnDelete.onclick = function(){
    deleteSearch.style.display = "block";
    btnAdd.disabled = true;
    btnUpdate.disabled = true;
    btnDelete.disabled = true;
}

function required(){
    if (document.getElementById("addUser").value.length == 0 || document.getElementById("addNames").value.length == 0 ||
    document.getElementById("addLnames").value.length == 0 || document.getElementById("addNum").value.length == 0 ||
    document.getElementById("addType").value.length == 0){ 
        alert("Faltan campos");  	  
        return false; 
    }  	
        return true; 
}  

function viewCancelFunction(){
    if(confirm("¿Estás seguro que deseas cancelar?")==true){
        updateSearch.style.display = "none";
        deleteSearch.style.display = "none";
        btnAdd.disabled = false;
        btnUpdate.disabled = false;
        btnDelete.disabled = false;
        document.getElementById("idUpdate").value = "";
        document.getElementById("idDelete").value = "";
    }
}

function cancel(){
    if(confirm("¿Estás seguro que deseas cancelar?")==true){
        window.location = 'http://localhost/veterinaria/app/users/index.php';
    }
}
