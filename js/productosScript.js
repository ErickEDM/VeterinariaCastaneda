const btnAlimentos = document.getElementById("btnAlimentos");
const btnArticulos = document.getElementById("btnArticulos");
const btnJuguetes = document.getElementById("btnJuguetes");
const btnRopa = document.getElementById("btnRopa");
const btnSuplementos = document.getElementById("btnSuplementos");
const alimentos = document.getElementById("alimentos");
const articulos = document.getElementById("articulos");
const juguetes = document.getElementById("juguetes");
const ropa = document.getElementById("ropa");
const suplementos = document.getElementById("suplementos");
const btnClaro = document.getElementById("btnClaro");
const btnOscuro = document.getElementById("btnOscuro");
const enterateContent = document.getElementById("enterateContent");
const numUrgencias = document.getElementById("numUrgencias");
const titulo = document.getElementById("titulo");
var elements = document.getElementsByClassName("pText");
var alimento = document.getElementsByClassName("alimento");
var articulo = document.getElementsByClassName("articulo");
var juguete = document.getElementsByClassName("juguete");
var ropas = document.getElementsByClassName("ropas");
var suplemento = document.getElementsByClassName("suplemento");



btnOscuro.onclick = function(){ 
	document.body.style.backgroundColor = "#333333";
	enterateContent.style.color = "#FFFFFF";
	numUrgencias.style.color = "#FFFFFF";
	titulo.style.color = "#FFFFFF";
	for(var i=0; i<elements.length; i++) {
    elements[i].style.color = "#FFFFFF";
	}
	
}

btnClaro.onclick = function(){ 
	document.body.style.backgroundColor = "#FFFFFF";
	enterateContent.style.color = "#000000";
	numUrgencias.style.color = "#000000";
	titulo.style.color = "#000000";
	for(var i=0; i<elements.length; i++) {
    elements[i].style.color = "#000000";
	}
}


btnAlimentos.onclick = function(){ 
	/*Ancho*/
	for(var i=0; i<alimento.length; i++) {
    alimento[i].style.width = "100%";
	}
	alimentos.style.width = "100%";

	for(var i=0; i<articulo.length; i++) {
    articulo[i].style.width = "0";
	}
	articulos.style.width = "0";

	for(var i=0; i<juguete.length; i++) {
    juguete[i].style.width = "0";
	}
	juguetes.style.width = "0";

	for(var i=0; i<ropas.length; i++) {
    ropas[i].style.width = "0";
	}
	ropa.style.width = "0";

	for(var i=0; i<suplemento.length; i++) {
    suplemento[i].style.width = "0";
	}
	suplementos.style.width = "0";

	/*Altura*/
	for(var i=0; i<alimento.length; i++) {
    alimento[i].style.height = "100%";
	}
	alimentos.style.height = "100%";

	for(var i=0; i<articulo.length; i++) {
    articulo[i].style.height = "0";
	}
	articulos.style.height = "0";

	for(var i=0; i<juguete.length; i++) {
    juguete[i].style.height = "0";
	}
	juguetes.style.height = "0";

	for(var i=0; i<ropas.length; i++) {
    ropas[i].style.height = "0";
	}
	ropa.style.height = "0";

	for(var i=0; i<suplemento.length; i++) {
    suplemento[i].style.height = "0";
	}
	suplementos.style.height = "0";

	/*Opacidad*/
	for(var i=0; i<alimento.length; i++) {
    alimento[i].style.opacity = "100%";
	}
	alimentos.style.opacity = "100%";

	for(var i=0; i<articulo.length; i++) {
    articulo[i].style.opacity = "0";
	}
	articulos.style.opacity = "0";

	for(var i=0; i<juguete.length; i++) {
    juguete[i].style.opacity = "0";
	}
	juguetes.style.opacity = "0";

	for(var i=0; i<ropas.length; i++) {
    ropas[i].style.opacity = "0";
	}
	ropa.style.opacity = "0";

	for(var i=0; i<suplemento.length; i++) {
    suplemento[i].style.opacity = "0";
	}
	suplementos.style.opacity = "0";
}

btnArticulos.onclick = function(){ 
	/*Ancho*/
	for(var i=0; i<articulo.length; i++) {
    articulo[i].style.width = "100%";
	}
	articulos.style.width = "100%";

	for(var i=0; i<alimento.length; i++) {
    alimento[i].style.width = "0";
	}
	alimentos.style.width = "0";

	for(var i=0; i<juguete.length; i++) {
    juguete[i].style.width = "0";
	}
	juguetes.style.width = "0";

	for(var i=0; i<ropas.length; i++) {
    ropas[i].style.width = "0";
	}
	ropa.style.width = "0";

	for(var i=0; i<suplemento.length; i++) {
    suplemento[i].style.width = "0";
	}
	suplementos.style.width = "0";

	/*Altura*/
	for(var i=0; i<articulo.length; i++) {
    articulo[i].style.height = "100%";
	}
	articulos.style.height = "100%";

	for(var i=0; i<alimento.length; i++) {
    alimento[i].style.height = "0";
	}
	alimentos.style.height = "0";

	for(var i=0; i<juguete.length; i++) {
    juguete[i].style.height = "0";
	}
	juguetes.style.height = "0";

	for(var i=0; i<ropas.length; i++) {
    ropas[i].style.height = "0";
	}
	ropa.style.height = "0";

	for(var i=0; i<suplemento.length; i++) {
    suplemento[i].style.height = "0";
	}
	suplementos.style.height = "0";

	/*Opacidad*/
	for(var i=0; i<alimento.length; i++) {
    alimento[i].style.opacity = "0";
	}
	alimentos.style.opacity = "0";

	for(var i=0; i<articulo.length; i++) {
    articulo[i].style.opacity = "100%";
	}
	articulos.style.opacity = "100%";

	for(var i=0; i<juguete.length; i++) {
    juguete[i].style.opacity = "0";
	}
	juguetes.style.opacity = "0";

	for(var i=0; i<ropas.length; i++) {
    ropas[i].style.opacity = "0";
	}
	ropa.style.opacity = "0";

	for(var i=0; i<suplemento.length; i++) {
    suplemento[i].style.opacity = "0";
	}
	suplementos.style.opacity = "0";
}

btnJuguetes.onclick = function(){ 
	/*Ancho*/
	for(var i=0; i<juguete.length; i++) {
    juguete[i].style.width = "100%";
	}
	juguetes.style.width = "100%";

	for(var i=0; i<alimento.length; i++) {
    alimento[i].style.width = "0";
	}
	alimentos.style.width = "0";

	for(var i=0; i<articulo.length; i++) {
    articulo[i].style.width = "0";
	}
	articulos.style.width = "0";

	for(var i=0; i<ropas.length; i++) {
    ropas[i].style.width = "0";
	}
	ropa.style.width = "0";

	for(var i=0; i<suplemento.length; i++) {
    suplemento[i].style.width = "0";
	}
	suplementos.style.width = "0";

	/*Altura*/
	for(var i=0; i<juguete.length; i++) {
    juguete[i].style.height = "100%";
	}
	juguetes.style.height = "100%";

	for(var i=0; i<alimento.length; i++) {
    alimento[i].style.height = "0";
	}
	alimentos.style.height = "0";

	for(var i=0; i<articulo.length; i++) {
    articulo[i].style.height = "0";
	}
	articulos.style.height = "0";

	for(var i=0; i<ropas.length; i++) {
    ropas[i].style.height = "0";
	}
	ropa.style.height = "0";

	for(var i=0; i<suplemento.length; i++) {
    suplemento[i].style.height = "0";
	}
	suplementos.style.height = "0";

	/*Opacidad*/
	for(var i=0; i<juguete.length; i++) {
    juguete[i].style.opacity = "100%";
	}
	juguetes.style.opacity = "100%";

	for(var i=0; i<alimento.length; i++) {
    alimento[i].style.opacity = "0";
	}
	alimentos.style.opacity = "0";

	for(var i=0; i<articulo.length; i++) {
    articulo[i].style.opacity = "0";
	}
	articulos.style.opacity = "0";

	for(var i=0; i<ropas.length; i++) {
    ropas[i].style.opacity = "0";
	}
	ropa.style.opacity = "0";

	for(var i=0; i<suplemento.length; i++) {
    suplemento[i].style.opacity = "0";
	}
	suplementos.style.opacity = "0";
}


btnRopa.onclick = function(){ 
	/*Ancho*/
	for(var i=0; i<alimento.length; i++) {
    alimento[i].style.width = "0";
	}
	alimentos.style.width = "0";

	for(var i=0; i<articulo.length; i++) {
    articulo[i].style.width = "0";
	}
	articulos.style.width = "0";

	for(var i=0; i<juguete.length; i++) {
    juguete[i].style.width = "0";
	}
	juguetes.style.width = "0";

	for(var i=0; i<ropas.length; i++) {
    ropas[i].style.width = "100%";
	}
	ropa.style.width = "100%";

	for(var i=0; i<suplemento.length; i++) {
    suplemento[i].style.width = "0";
	}
	suplementos.style.width = "0";

	/*Altura*/
	for(var i=0; i<ropas.length; i++) {
    ropas[i].style.height = "100%";
	}
	ropa.style.height = "100%";

	for(var i=0; i<alimento.length; i++) {
    alimento[i].style.height = "0";
	}
	alimentos.style.height = "0";

	for(var i=0; i<articulo.length; i++) {
    articulo[i].style.height = "0";
	}
	articulos.style.height = "0";

	for(var i=0; i<juguete.length; i++) {
    juguete[i].style.height = "0";
	}
	juguetes.style.height = "0";

	for(var i=0; i<suplemento.length; i++) {
    suplemento[i].style.height = "0";
	}
	suplementos.style.height = "0";

	/*Opacidad*/
	for(var i=0; i<alimento.length; i++) {
    alimento[i].style.opacity = "0";
	}
	alimentos.style.opacity = "0";

	for(var i=0; i<articulo.length; i++) {
    articulo[i].style.opacity = "0";
	}
	articulos.style.opacity = "0";

	for(var i=0; i<juguete.length; i++) {
    juguete[i].style.opacity = "0";
	}
	juguetes.style.opacity = "0";

	for(var i=0; i<ropas.length; i++) {
    ropas[i].style.opacity = "100%";
	}
	ropa.style.opacity = "100%";

	for(var i=0; i<suplemento.length; i++) {
    suplemento[i].style.opacity = "0";
	}
	suplementos.style.opacity = "0";
}

btnSuplementos.onclick = function(){ 
	/*Ancho*/
	for(var i=0; i<alimento.length; i++) {
    alimento[i].style.width = "0";
	}
	alimentos.style.width = "0";

	for(var i=0; i<articulo.length; i++) {
    articulo[i].style.width = "0";
	}
	articulos.style.width = "0";

	for(var i=0; i<juguete.length; i++) {
    juguete[i].style.width = "0";
	}
	juguetes.style.width = "0";

	for(var i=0; i<ropas.length; i++) {
    ropas[i].style.width = "0";
	}
	ropa.style.width = "0";

	for(var i=0; i<suplemento.length; i++) {
    suplemento[i].style.width = "100%";
	}
	suplementos.style.width = "100%";

	/*Altura*/
	for(var i=0; i<suplemento.length; i++) {
    suplemento[i].style.height = "100%";
	}
	suplementos.style.height = "100%";

	for(var i=0; i<alimento.length; i++) {
    alimento[i].style.height = "0";
	}
	alimentos.style.height = "0";

	for(var i=0; i<articulo.length; i++) {
    articulo[i].style.height = "0";
	}
	articulos.style.height = "0";

	for(var i=0; i<juguete.length; i++) {
    juguete[i].style.height = "0";
	}
	juguetes.style.height = "0";

	for(var i=0; i<ropas.length; i++) {
    ropas[i].style.height = "0";
	}
	ropa.style.height = "0";


	/*Opacidad*/
	for(var i=0; i<alimento.length; i++) {
    alimento[i].style.opacity = "0";
	}
	alimentos.style.opacity = "0";

	for(var i=0; i<articulo.length; i++) {
    articulo[i].style.opacity = "0";
	}
	articulos.style.opacity = "0";

	for(var i=0; i<juguete.length; i++) {
    juguete[i].style.opacity = "0";
	}
	juguetes.style.opacity = "0";

	for(var i=0; i<ropas.length; i++) {
    ropas[i].style.opacity = "0";
	}
	ropa.style.opacity = "0";

	for(var i=0; i<suplemento.length; i++) {
    suplemento[i].style.opacity = "100%";
	}
	suplementos.style.opacity = "100%";
}