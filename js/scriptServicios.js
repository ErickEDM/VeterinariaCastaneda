const btnClaro = document.getElementById("btnClaro");
const btnOscuro = document.getElementById("btnOscuro");
const enterateContent = document.getElementById("enterateContent");
const numUrgencias = document.getElementById("numUrgencias");
var servCont = document.getElementsByClassName("servCont");


btnOscuro.onclick = function(){ 
	document.body.style.backgroundColor = "#333333";
	enterateContent.style.color = "#FFFFFF";
	numUrgencias.style.color = "#FFFFFF";
	for(var i=0; i<servCont.length; i++) {
    servCont[i].style.color = "#FFFFFF";
	}
}

btnClaro.onclick = function(){ 
	document.body.style.backgroundColor = "#FFFFFF";
	enterateContent.style.color = "#000000";
	numUrgencias.style.color = "#000000";
	for(var i=0; i<servCont.length; i++) {
    servCont[i].style.color = "#000000";
	}
}