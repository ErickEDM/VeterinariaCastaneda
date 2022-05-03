const btnMenu = document.getElementById("btnMenu");
const sidebar = document.querySelector(".sidebar");


btnMenu.onclick = function(){
    sidebar.classList.toggle("active");
}
