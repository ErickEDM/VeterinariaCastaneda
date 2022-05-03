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
	
	if(isset($_POST['newSubmit'])){
	
        $petName = $_POST['petName'];
		$petLname = $_POST['petLname'];
		$petWeight = $_POST['petWeight'];
		$petAge = $_POST['petAge'];
		$petColor = $_POST['petColor'];
		$petRace = $_POST['petRace'];

		$todayDate = date('Y-m-d');

		$query = "INSERT INTO `mascota` (`nombre`, `apellido`, `peso`, `edad`,`color`,`raza`,`fechaPrimera`)
		VALUES ('$petName','$petLname','$petWeight','$petAge','$petColor','$petRace','$todayDate')";
		$mysqli->query($query);

		$query = "SELECT `id` FROM `mascota` WHERE (nombre = '$petName') AND (apellido = '$petLname')";
		$result = $mysqli->query($query);
		$row = $result->fetch_assoc();
		
		$idNewPet = $row['id'];   

		$query = "INSERT INTO `expediente`(`idMascota`, `contenido`)
		VALUES ('$idNewPet','$petName $petLname,\n $petWeight Kg,\n $petAge años,\n color $petColor,\n $petRace')";

		$mysqli->query($query);

		header("Location: index.php");
		
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
				<a href="../index.php">
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
		<div class="container" id="updateContainer">
			<form method="POST" id="updateForm" enctype="multipart/form-data" autocomplete="off">
				<div class="row text-center text-md-left">
					<h2 class="col-10 col-md-4">Datos del nuevo paciente</h2>
				</div>		
                <div class="row">	
				<div class="inputContainer col-6">	
					<div class="formText offset-1 col-10">Nombre</div>
					<input class="formInputField offset-1 col-10" type="text" id="petName" name="petName" placeholder="Nombre" value="<?php if(isset($petName)){echo $petName;} ?>">
				</div>
				<div class="inputContainer col-6">	
					<div class="formText offset-1 col-10">Apellido</div>
					<input class="formInputField offset-1 col-10" type="text" id="petLname" name="petLname" placeholder="Apellido" value="<?php if(isset($petLname)){echo $petLname;} ?>">
				</div>
				<div class="inputContainer col-6">	
					<div class="formText offset-1 col-10">Peso</div>
					<input class="formInputField offset-1 col-10" type="number" id="petWeight" name="petWeight" step=".01" placeholder="Peso" value="<?php if(isset($petWeight)){echo $petWeight;} ?>">
				</div>
				<div class="inputContainer col-6">	
					<div class="formText offset-1 col-10">Edad</div>
					<input class="formInputField offset-1 col-10" type="number" id="petAge" name="petAge" placeholder="Edad" value="<?php if(isset($petAge)){echo $petAge;} ?>">
				</div>
				<div class="inputContainer col-6">	
					<div class="formText offset-1 col-10">Color</div>
					<input class="formInputField offset-1 col-10" type="text" id="petColor" name="petColor" placeholder="Color" value="<?php if(isset($petColor)){echo $petColor;} ?>">
				</div>
				<div class="inputContainer col-6">	
					<div class="formText offset-1 col-10">Raza</div>
					<input class="formInputField offset-1 col-10" type="text" id="petRace" name="petRace" placeholder="Raza" value="<?php if(isset($petRace)){echo $petRace;} ?>">
				</div>
				<div class="inputContainer col-12" id="btnContainer">	
					<input class="offset-2 col-8 offset-md-2 col-md-3" type="submit" value="Guardar" id="btnNewSubmit" name="newSubmit" onclick="return confirm('¿Segur@ que desea guardar los cambios?');">
					<input class="offset-2 col-8 offset-md-2 col-md-3" type="button" value="Cancelar" id="btnNewCancel" onclick="cancelRecord()">
				</div>
                </div>
			</form>
		</div>
    </div>

	<script type="text/javascript" src="../../js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../js/app/sideBar.js"></script>
	<script type="text/javascript" src="../../js/app/scriptRecord.js"></script>
</body>

</html>