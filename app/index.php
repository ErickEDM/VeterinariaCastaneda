<?php
	require "conexion.php";
    session_start();

    if(!isset($_SESSION['id'])){
        header("Location: ../login.php");
    }
	
	# Información del usuario en sesión
    $name = $_SESSION['nombres'];
	$sessionID = $_SESSION['id'];

	# Foto del usuario en sesión
	$profilePicHref = "profilePic$sessionID.jpg";
	
	# Contar usuarios totales
	$query = "SELECT * FROM `usuario`";          
	$result = $mysqli->query($query);
	$row = $result->fetch_assoc();
	$num = $result->num_rows;

	$userCount = $num;

	# Usuarios añadidos en los últimos 7 días
	$todayDate = date('Y-m-d');
	$todayMinusDate = date('Y-m-d',strtotime('-7 days'));
	$query = "SELECT * FROM usuario WHERE fechaIngreso BETWEEN '$todayMinusDate' AND '$todayDate'";
	$result = $mysqli->query($query);
	$row = $result->fetch_assoc();
	$num = $result->num_rows;

	$userDateCount = $num;

	# Contar pacientes totales
	$query = "SELECT * FROM `mascota`";          
	$result = $mysqli->query($query);
	$row = $result->fetch_assoc();
	$num = $result->num_rows;

	$petCount = $num;

	# Pacientes añadidos en los últimos 7 días
	$todayDate = date('Y-m-d');
	$todayMinusDate = date('Y-m-d',strtotime('-7 days'));
	$query = "SELECT * FROM mascota WHERE fechaPrimera BETWEEN '$todayMinusDate' AND '$todayDate'";
	$result = $mysqli->query($query);
	$row = $result->fetch_assoc();
	$num = $result->num_rows;

	$petDateCount = $num;

	# Contar entradas totales
	$query = "SELECT * FROM `articulo`";          
	$result = $mysqli->query($query);
	$row = $result->fetch_assoc();
	$num = $result->num_rows;

	$entryCount = $num;

	# Entradas añadidas en los últimos 7 días
	$todayDate = date('Y-m-d');
	$todayMinusDate = date('Y-m-d',strtotime('-7 days'));
	$query = "SELECT * FROM articulo WHERE fecha BETWEEN '$todayMinusDate' AND '$todayDate'";
	$result = $mysqli->query($query);
	$row = $result->fetch_assoc();
	$num = $result->num_rows;

	$entryDateCount = $num;

?>


<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tablero</title>
	<link href="../css/bootstrap.min.css" type="text/css" rel="stylesheet">
	<link href="../css/app/stylesApp.css" type="text/css" rel="stylesheet">
	<link href="../css/app/stylesDashboard.css" type="text/css" rel="stylesheet">
	<link rel="icon" href="../images/icono.png">
	<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Zilla Slab">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto Serif">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dosis">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oxygen">
</head>

<body>
	<div class="sidebar" id="sidebar">
		<div class="logo_content">
			<div class="logo">
				<img id="logo" src="../images/icono.png">
				<div class="logo_name">Vet. Castañeda</div>
			</div>
			<i class='bx bx-menu' id="btnMenu"></i>
		</div>
		<ul class="nav-list">
			<li>
				<a href="#" class="active">
					<i class='bx bx-grid-alt'></i>
					<span class="links_name">Tablero</span>
				</a>
			</li>

			<?php if($_SESSION['tipo']=="1" || $_SESSION['tipo']=="2"){ ?>

			<li>
				<a href="users/">
					<i class='bx bxs-user-rectangle'></i>	
					<span class="links_name">Usuarios</span>
				</a>
			</li>
			<li>
				<a href="record/">
					<i class='bx bxs-dog'></i>
					<span class="links_name">Pacientes</span>
				</a>
			</li>

			<?php } ?>

			<li>
				<a href="entries/">
					<i class='bx bx-book-open'></i>
					<span class="links_name">Entradas</span>
				</a>
			</li>
			<li>
				<a href="site/">
					<i class='bx bx-detail'></i>
					<span class="links_name">Modificar sitio</span>
				</a>
			</li>
		</ul>
		<div class="profile_content">
			<div class="profile">
				<div class="profile_details">
					<a href="../profile/index.php"><img src="../images/users/<?php echo "profilePic$sessionID.jpg" ?>" alt="" id="profilePicture"></a>
					<a class="name" id="myNames" href="profile/"><?php echo $name ?></a>
				</div>
				<a href="../logout.php"><i class="bx bx-log-out" id="log_out"></i></a>	
			</div>	
		</div>
	</div>	
	<div class="home_content">
		<div class="container">
			<div class="row ">
				<div class="col-12 col-md-2 text-center">
					<img src="../images/users/<?php echo "profilePic$sessionID.jpg" ?>" alt="" id="profileBigPicture">
				</div>
				<div class="col-12 col-md-6 align-self-center text-center text-md-left">
					<h1><?php echo $_SESSION["nombres"], " ", $_SESSION["apellidoPaterno"], " ", $_SESSION["apellidoMaterno"]  ?></h1>
				</div>
				<div class="col-12">
					<hr></hr>
				</div>
			</div>	
		</div>
		<div class="container">
			<div class="row">
				<div class="dashboardContainer offset-0 offset-md-1 col-12 col-md-4">
					<div class="row">
						<div class="dashboardSectionTitle col-6">Usuarios</div>
						<div class="col-8">Usuarios totales:</div>
						<div class="col-4 text-right"><?php echo $userCount ?></div>
						<div class="col-8">Usuarios nuevos:</div>
						<div class="col-4 text-right"><?php echo $userDateCount ?></div>
						<a class="dashboardButton offset-4 col-4 text-center" href="users/add.php">Nuevo usuario</a>
					</div>	
				</div>
				<div class="dashboardContainer offset-0 offset-md-2 col-12 col-md-4">
				<div class="row">
						<div class="dashboardSectionTitle col-6">Pacientes</div>
						<div class="col-8">Pacientes totales:</div>
						<div class="col-4 text-right"><?php echo $petCount ?></div>
						<div class="col-8">Pacientes nuevos (7 días):</div>
						<div class="col-4 text-right"><?php echo $petDateCount ?></div>
					<?php if($_SESSION['tipo']=="1" || $_SESSION['tipo']=="2"){ ?>
						<a class="dashboardButton offset-2 col-3 text-center" href="users/add.php">Nuevo</a>
						<a class="dashboardButton offset-2 col-3 text-center" href="users/search.php">Actualizar</a>
					<?php } ?>	
					</div>	
				</div>
			</div>
			<div class="row">
				<div class="dashboardContainer offset-0 offset-md-1 col-12 col-md-4">
					<div class="row">
						<div class="dashboardSectionTitle col-6">Entradas</div>
						<div class="col-8">Entradas totales:</div>
						<div class="col-4 text-right"><?php echo $entryCount ?></div>
						<div class="col-8">Entradas nuevas:</div>
						<div class="col-4 text-right"><?php echo $entryDateCount ?></div>
						<a class="dashboardButton offset-2 col-3 text-center" href="users/add.php">Nueva</a>
						<a class="dashboardButton offset-2 col-3 text-center" href="users/add.php">Actualizar</a>
					</div>	
				</div>
				<div class="dashboardContainer offset-0 offset-md-2 col-12 col-md-4">
				<div class="row">
						<div class="dashboardSectionTitle col-6">Mi perfil</div>
						<div class="col-12"><?php echo $_SESSION['nombres']," ",$_SESSION['apellidoPaterno']," ",$_SESSION['apellidoMaterno'] ?></div>
						<div class="col-3">Teléfono: </div>
						<div class="col-8"><?php echo $_SESSION['telefono']?></div>
						<a class="dashboardButton offset-2 col-3 text-center" href="profile/index.php">Mis datos</a>
						<a class="dashboardButton offset-1 col-4 text-center" href="logout.php">Cerrar sesión</a>
					</div>	
				</div>
			</div>
		</div>
		
    </div>

	<script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/app/sideBar.js"></script>
	<script type="text/javascript" src="../js/app/scriptDashboard.js"></script>
</body>

</html>