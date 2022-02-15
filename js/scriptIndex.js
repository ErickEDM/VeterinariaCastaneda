const btnClaro = document.getElementById("btnClaro");
const btnOscuro = document.getElementById("btnOscuro");
const enterateContent = document.getElementById("enterateContent");
const numUrgencias = document.getElementById("numUrgencias");
const tresColumnas1 = document.getElementById("tresColumnas1");
const tresColumnas2= document.getElementById("tresColumnas2");
const tresColumnas3 = document.getElementById("tresColumnas3");




btnOscuro.onclick = function(){ 
	document.body.style.backgroundColor = "#333333";
	enterateContent.style.color = "#FFFFFF";
	numUrgencias.style.color = "#FFFFFF";
	tresColumnas1.style.color = "#FFFFFF";
	tresColumnas2.style.color = "#FFFFFF";
	tresColumnas3.style.color = "#FFFFFF";
}

btnClaro.onclick = function(){ 
	document.body.style.backgroundColor = "#FFFFFF";
	enterateContent.style.color = "#000000";
	numUrgencias.style.color = "#000000";
	tresColumnas1.style.color = "#000000";
	tresColumnas2.style.color = "#000000";
	tresColumnas3.style.color = "#000000";
}
