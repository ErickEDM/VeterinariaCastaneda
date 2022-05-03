<!--?php

	session_start();

	$name = $_SESSION['nombre'];

?-->


<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Veterinaria Castañeda</title>
	<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
	<link href="css/styles.css" type="text/css" rel="stylesheet">
	<link href="css/stylesSlider.css" type="text/css" rel="stylesheet">
	<link rel="icon" href="images/icono.png">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nerko One">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anton">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin Sans">
</head>

<body>
	<nav class="navbar navbar-dark navbar-expand-sm bg-custom sticky-top">
		<div class="container">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a class="navbar-brand mr-auto" id="brand" href="index.php">
				<img id="logo" src="images/logo3.png"></a>
			<div class="collapse navbar-collapse" id="Navbar">
				<ul class="navbar-nav mr-auto" id="navbarContent">
					<li class="nav-item active" id="Inicio"><a class="nav-link" href="index.php">Inicio</a></li>
					<li class="nav-item"><a class="nav-link" href="servicios.php">Servicios</a></li>
					<!--li class="nav-item"><a class="nav-link" href="productos.html">Productos</a></li>
					<li class="nav-item"><a class="nav-link" href="consejos.html">Consejos y más</a></li-->
					<li class="nav-item"><a class="nav-link" href="quien.php">Quiénes somos</a></li>

				</ul>
			</div>
		</div>
	</nav>


	<div class="container-fluid">
			
		<div class="row align-items-center" >
			<div class="col-12" id="barra2">
				<div class="row align-items-center text-center" >
					<div class="col-2 col-md-1" id="enterate">Avisos</div>
					<div class="col-8 col-md-7" id="enterateContent">
						<marquee> Aviso de prueba </marquee>
					</div>
					<div class="offset-0 offset-md-1 col-12 col-md-2 text-right" id="numUrgencias">Contacto: 656-681-5425</div>
				</div>
			</div>
			<img class="col-12" id="mainImage" src="images/main.jpg">
			<div class="col-12 text-center" id="mainWord">"Una mascota, un miembro más<br> de la familia."</div>
		</div>	
	</div>

	<div class="container">
		<div class="row text-center" id="midSectionUsContainer">
			<div class="offset-5 col-2 reveal" id="midSectionUsTitle">Quiénes somos</div>
			<div class="col-12 reveal" id="midSectionUs">Somos Veterinaria Castañeda, estamos orgullosos de ser su opción para atender y ofrecer los
				 servicios y cuidados que requiere su mejor amigo, quien mejor que una mascota que nos pueda
				 aumentar la felicidad por su fidelidad. Ofrecemos consultas, cirugías, tratamientos, vacunas,
				 hospitalización, baños, estética canina, diferentes productos para el cuidado de su mascota, 
				 entre otras cosas. La Dra. Norma Castañeda le atenderá con mucho gusto y el amor que merece su mascota. 
				 ¡Visítenos hoy mismo!"</div>
			</div>
	</div>

	<div class="container-fluid" id="mid-section">
		<div class="row">
			<div class="fb-page offset-0 col-12 offset-md-4 col-md-4" id="facebook" data-href="https://www.facebook.com/vetcasta/" data-tabs="timeline" data-width="420" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
				<blockquote cite="https://www.facebook.com/vetcasta/" class="fb-xfbml-parse-ignore">
					<a href="https://www.facebook.com/vetcasta/">Veterinaria Castañeda</a>
				</blockquote>
			</div>
		</div>

		<div id="imagenMedio"></div>


		<div class="container">
			<div class="row">
				<div class="col-12 col-md-4">
					<div class="row reveal" id="tresColumnas1">
						<img class=" offset-2 col-8" id="tresColumnasIMG" src="images/phone.png">
						<p class="col-12" id="tresColumnasTitle1">Contacto</p>
						<p class="col-12" id="tresColumnasContent">Emergencias: 656-681-5425</p>
						<p class="col-12" id="tresColumnasContent">Horario: lunes a viernes 9:00 AM - 7:30 PM <br> domingo 10:00 AM - 3:00 PM</p>
					</div>
				</div>
				<div class="col-12 col-md-4">
					<div class="row reveal" id="tresColumnas2">
						<img class=" offset-2 col-8" id="tresColumnasIMG2" src="images/cruz.png">
						<a class="col-12" id="tresColumnasTitle2" href="servicios.php">Servicios</a>
						<p class="col-12" id="tresColumnasContent">En Veterinaria Castañeda ofrecemos calidad y calidez
							en todos nuestros servicios.</p>
					</div>
				</div>
				<div class="col-12 col-md-4">
					<div class="row reveal" id="tresColumnas3">
						<img class=" offset-2 col-8" id="tresColumnasIMG3" src="images/doc.png">
						<a class="col-12" id="tresColumnasTitle3" href="quien.php">Conócenos</a>
						<p class="col-12" id="tresColumnasContent">Somos Veterinaria Castañeda, estamos orgullosos de ser su opción...</p>
					</div>
				</div>
			</div>
		</div>

		<div class="container-fluid">
			<div class="row">
				<iframe class="col-12" id="mapa"
					src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d378.3606364698703!2d-106.37743722374631!3d31.618399811644448!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86e767bbb71bdbf9%3A0xbac5599591387cb0!2sVeterinaria%20Casta%C3%B1eda!5e0!3m2!1ses-419!2smx!4v1643851797297!5m2!1ses-419!2smx"
					width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
			</div>
		</div>


		<footer>
			<div class="container">
				<div class="row">
					<div class="col-6 col-md-4">
						<p>Dirección</p>
						<p>C. Ramón Rayón #2014 esq. Palacio de Paquime<br>Fracc Rinconada de las Torres. Frente a farmacia Benavides. Cd. Juárez. Chih.</p>
					</div>
					<div class="col-6 col-md-4">
						<p>Síguenos</p>
						<a href="https://www.facebook.com/vetcasta"><img id="footerFB"
								src="images/facebook.png"></a>
					</div>
					<div class="col-12 col-md-4">
						<img id="brandFoot" src="images/logo3.png">
					</div>
				</div>
				<hr id="hrFoot">
				<div class="row">
					<p class="col-12" id="marca">Veterinaria Castañeda</p>
				</div>
			</div>
		</footer>




		<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/scriptIndex.js"></script>
		<div id="fb-root"></div>
		<div id="fb-root"></div>
		<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v13.0" nonce="3PrtV0QK"></script>

</body>

</html>