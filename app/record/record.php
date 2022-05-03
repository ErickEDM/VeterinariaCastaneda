<?php
	require "../conexion.php";
    session_start();

    if(!isset($_SESSION['id'])){
        header("Location: ../login.php");
    }

	if($_SESSION['tipo']!="1" && $_SESSION['tipo']!="2"){
        header("Location: index.php");
    }

    $name = $_SESSION['nombres'];
	$sessionID = $_SESSION['id'];

	$query = "SELECT `nombre`,`apellido` FROM `mascota` WHERE id = '".$_GET['petID']."'";
	$result = $mysqli->query($query);
	$row = $result->fetch_assoc();
	
	$petName = $row['nombre'];
	$petLname = $row['apellido'];

	$query = "SELECT `contenido` FROM `expediente` WHERE idMascota = '".$_GET['petID']."'";
	$result = $mysqli->query($query);
	$row = $result->fetch_assoc();

	$petContent = $row['contenido'];



	if(isset($_POST["submit"])){		

		$query = "UPDATE `expediente` SET `contenido`='".$_POST['recordContent']."' WHERE idMascota = '".$_GET['petID']."'";          
		$mysqli->query($query);
    
        echo "<script type='text/javascript'>window.location = 'http://localhost/veterinaria/app/record/';</script>";
	}

?>


<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pacientes</title>
	<link href="../../css/bootstrap.min.css" type="text/css" rel="stylesheet">
	<link href="../../css/app/stylesApp.css" type="text/css" rel="stylesheet">
	<link href="../../css/app/stylesRecord.css" type="text/css" rel="stylesheet">
	<link rel="icon" href="../../images/icono.png">
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
				<img id="logo" src="../../images/icono.png">
				<div class="logo_name">Vet. Castañeda</div>
			</div>
			<i class='bx bx-menu' id="btnMenu"></i>
		</div>
		<ul class="nav-list">
			<li>
				<a href="../">
					<i class='bx bx-grid-alt'></i>
					<span class="links_name">Tablero</span>
				</a>
			</li>

			<?php if($_SESSION['tipo']=="1" || $_SESSION['tipo']=="2"){ ?>

			<li>
				<a href="../users/">
					<i class='bx bxs-user-rectangle'></i>	
					<span class="links_name">Usuarios</span>
				</a>
			</li>
			<li>
				<a href="../record/" class="active">
					<i class='bx bxs-dog'></i>
					<span class="links_name">Pacientes</span>
				</a>
			</li>

			<?php } ?>

			<li>
				<a href="../entries/">
					<i class='bx bx-book-open'></i>
					<span class="links_name">Entradas</span>
				</a>
			</li>
			<li>
				<a href="../site/">
					<i class='bx bx-detail'></i>
					<span class="links_name">Modificar sitio</span>
				</a>
			</li>
		</ul>
		<div class="profile_content">
			<div class="profile">
				<div class="profile_details">
					<a href="../profile/index.php"><img src="../../images/users/<?php echo "profilePic$sessionID.jpg" ?>" alt="" id="profilePicture"></a>
					<a class="name" id="myNames" href="../profile/index.php"><?php echo $name ?></a>
				</div>
				<a href="../logout.php"><i class="bx bx-log-out" id="log_out"></i></a>	
			</div>	
		</div>
	</div>	
	<div class="home_content">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-6 align-self-center text-center text-md-left">
					<h1><?php echo $petName, " ", $petLname ?></h1>
				</div>
				<div class="col-12">
					<hr></hr>
				</div>
			</div>	
		</div>
        <div class="container">
            <div class="row">
                <form class="col-12" method="POST" id="recordForm" enctype="multipart/form-data">
                    <textarea class="formInputField col-12" type="text" id="recordContent" autocomplete="off" required name="recordContent" placeholder="Contenido" ><?php if(isset($petContent)){echo $petContent;} ?></textarea>
                    <input class="offset-2 col-8 offset-md-2 col-md-3" type="submit" value="Guardar" id="submit" name="submit" onclick="return confirm('¿Segur@ que desea guardar la entrada?');">
                    <input class="offset-2 col-8 offset-md-2 col-md-3" type="button" value="Cancelar" id="cancel" onclick="cancelRecord()">
                </form>
            </div>
        </div>
		
		
    </div>
	<script type="text/javascript" src="../../js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../js/app/sideBar.js"></script>
	<script type="text/javascript" src="../../js/app/scriptRecord.js"></script>
</body>

</html>