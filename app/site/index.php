<?php
	require "../conexion.php";
    session_start();

    if(!isset($_SESSION['id'])){
        header("Location: ../login.php");
    }

    $name = $_SESSION['nombres'];
	$sessionID = $_SESSION['id'];

	$query = "SELECT * FROM `informacion_pagina` WHERE objeto = 'aviso'";
    $result = $mysqli->query($query);
    $row = $result->fetch_assoc();

    $aviso = $row['contenido'];

    $query = "SELECT * FROM `informacion_pagina` WHERE objeto = 'telefono'";
    $result = $mysqli->query($query);
    $row = $result->fetch_assoc();

    $telefono = $row['contenido'];

    $query = "SELECT * FROM `informacion_pagina` WHERE objeto = 'direccion'";
    $result = $mysqli->query($query);
    $row = $result->fetch_assoc();

    $direccion = $row['contenido'];

	if(isset($_POST['submit'])){
        $query = "UPDATE `informacion_pagina` SET `contenido`='".$_POST['aviso']."' WHERE objeto = 'aviso'";
        $mysqli->query($query);

        $query = "UPDATE `informacion_pagina` SET `contenido`='".$_POST['telefono']."' WHERE objeto = 'telefono'";
        $mysqli->query($query);

        $query = "UPDATE `informacion_pagina` SET `contenido`='".$_POST['direccion']."' WHERE objeto = 'direccion'";
        $mysqli->query($query);
		
        echo "<script type='text/javascript'>window.location = 'http://localhost/veterinaria/app/';</script>";
    }

?>


<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sitio</title>
	<link href="../../css/bootstrap.min.css" type="text/css" rel="stylesheet">
	<link href="../../css/app/stylesApp.css" type="text/css" rel="stylesheet">
	<link href="../../css/app/stylesSite.css" type="text/css" rel="stylesheet">
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
				<a href="../record/">
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
			<form method="POST" id="updateForm" enctype="multipart/form-data">
				<div class="row text-center text-md-left">
					<h2 class="offset-1 col-10 offset-md-1 col-md-4">Información del sitio</h2>
				</div>		
                <div class="row">	
                    <div class="inputContainer offset-1 col-10">	
                        <div class="formText col-12">Aviso (parte superior del sitio)</div>
                        <input class="formInputField col-12" type="text" id="aviso" name="aviso" placeholder="Aviso" value="<?php echo $aviso ?>">
                    </div>
                    <div class="inputContainer offset-1 col-10 col-md-5">	
                        <div class="formText col-12">Teléfono</div>
                        <input class="formInputField col-12" type="text" id="telefono" placeholder="Teléfono" name="telefono" value="<?php echo $telefono ?>">
                    </div>
                    <div class="inputContainer col-10 col-md-5">	
                        <div class="formText col-12">Dirección</div>
                        <input class="formInputField col-12" type="text" id="direccion" placeholder="Dirección" name="direccion" value="<?php echo $direccion ?>">
                    </div>	
                    <div class="inputContainer offset-1 col-10">	
                        <input class="btnEdit offset-5 col-2" type="submit" value="Guardar" id="btnSave" name="submit" onclick="return confirm('¿Segur@ que desea guardar los cambios?');">
                    </div>
                </div>	    
			</form>
		</div>
    </div>

	<script type="text/javascript" src="../../js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../js/app/sideBar.js"></script>
	<script type="text/javascript" src="../../js/app/scriptSite.js"></script>
</body>

</html>