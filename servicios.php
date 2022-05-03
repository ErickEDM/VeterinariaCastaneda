<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Veterinaria Happy Paws</title>
	<link href = "css/bootstrap.min.css" type ="text/css" rel ="stylesheet">
	<link href = "css/styles.css" type ="text/css" rel ="stylesheet">
	<link href = "css/stylesServicios.css" type ="text/css" rel ="stylesheet">
	<link rel="icon" href="icono.png">
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
					<li class="nav-item" id="Inicio"><a class="nav-link" href="index.php">Inicio</a></li>
					<li class="nav-item active"><a class="nav-link" href="servicios.php">Servicios</a></li>
					<!--li class="nav-item active"><a class="nav-link" href="productos.html">Productos</a></li-->
					<!--li class="nav-item"><a class="nav-link" href="consejos.html">Consejos y más</a></li-->
					<li class="nav-item"><a class="nav-link" href="quien.php">Quiénes somos</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container-fluid" id="barra2">
		<div class="row align-items-center text-center">
			<div class="col-2 col-md-1" id="enterate">Avisos</div>
			<div class="col-8 col-md-7" id="enterateContent1"><marquee> Aviso de prueba </marquee></div>
			<div class="offset-0 offset-md-1 col-12 col-md-2" id="numUrgencias1">Contacto: 656-681-5425</div>
		</div>
	</div>



	<div class="container" id="serviciosContainer">
		<div class="row">
			<p class="col-12 servCont" id="title">En Veterinaria Castañeda ofrecemos calidad y calidez en todos nuestros servicios</p>
			<hr class="col-12 servCont">
			<p class="col-12 servCont"  id="subtitle">Te ofrecemos:</p>
			<ul class="col-12 servCont" id="contenido">
				<li>En servicio las 24 horas del día, los 365 días del año.</li>
				<li>Lorem ipsum dolor sit amet.</li>
				<li>Lorem ipsum dolor sit amet:
					<ul class="servCont" id="contenido">
						<li>Lorem ipsum dolor sit amet</li>
						<li>Lorem ipsum dolor sit amet</li>
						<li>Lorem ipsum dolor sit amet</li>
					</ul>
				</li>
				<li>Lorem ipsum dolor sit amet.</li>
				<li>Lorem ipsum dolor sit amet</li>
				<li>Lorem ipsum dolor sit amet</li>
				<li>Lorem ipsum dolor sit amet</li>
				<li>Lorem ipsum dolor sit amet</li>
				<li>Lorem ipsum dolor sit amet</li>
				<li>Lorem ipsum dolor sit amet</li>
			</ul>
			<hr class="col-12 servCont">
			<p class="col-12 servCont" id="subtitle">Lorem ipsum dolor sit amet</p>
			<ul class="col-12 servCont" id="contenido">
				<li>Lorem ipsum dolor sit amet</li>
				<li>Lorem ipsum dolor sit amet</li>
				<li>Lorem ipsum dolor sit amet</li>
				<li>Lorem ipsum dolor sit amet</li>
				<li>Lorem ipsum dolor sit amet</li>
			</ul>
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
	<script type="text/javascript" src="js/scriptServicios.js"></script>
</body>
</html>