<?php
	require "../conexion.php";
    session_start();

    if(!isset($_SESSION['id'])){
        header("Location: ../login.php");
    }

    $name = $_SESSION['nombres'];
	$sessionID = $_SESSION['id'];
	
	if(isset($_POST['submit'])){
		$pass = $_POST['pass'];
		$confirmPass = $_POST['confirmPass'];

		if($pass == $confirmPass){
			$pass_encrypt = sha1($pass);
			$query = "UPDATE `credenciales` SET `passwordUsuario`='$pass_encrypt' WHERE idUsuario = ".$_SESSION['id'];
			$result = $mysqli->query($query);
			if(isset($result)){
				echo "<script type='text/javascript'>alert('La contraseña se ha actualizado');</script>";
				echo "<script type='text/javascript'>window.location = 'http://localhost/veterinaria/app/profile/index.php';</script>";
			}
			
		}else{
			echo "<script type='text/javascript'>alert('Las contraseñas no coinciden');</script>";
		}
        
    }

?>


<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Perfil</title>
	<link href="../../css/bootstrap.min.css" type="text/css" rel="stylesheet">
	<link href="../../css/app/stylesApp.css" type="text/css" rel="stylesheet">
	<link href="../../css/app/stylesProfile.css" type="text/css" rel="stylesheet">
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
					<a class="name" id="myNames" href="index.php"><?php echo $name ?></a>
				</div>
				<a href="../logout.php"><i class="bx bx-log-out" id="log_out"></i></a>	
			</div>	
		</div>
	</div>	
	<div class="home_content">
		<div class="container" id="updateContainer">
			<div class="row text-center">
				<div class="passChangeContainer offset-1 offset-md-4 col-10 col-md-4">
					<form method="POST" action="" autocomplete="off">
						<div class="formTitle">Nueva contraseña</div>		  
					  	<input class="formInputFieldPass" type="password" id="pass" name="pass" placeholder="Nueva contraseña"><br>	
						<div class="formTitle">Confirmar contraseña</div>	 
					  	<input class="formInputFieldPass" type="password" id="confirmPass" name="confirmPass" placeholder="Nueva contraseña"><br>
					  	<input type="submit" value="Aceptar" id="submit" name="submit">
						<input type="button" value="Cancelar" id="cancel" onclick="cancelPass()">
					</form>
				</div>
			</div>
		</div>
    </div>

	<script type="text/javascript" src="../../js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../js/app/sideBar.js"></script>
	<script type="text/javascript" src="../../js/app/scriptProfile.js"></script>
</body>

</html>