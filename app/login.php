<?php
	require "conexion.php";

	session_start();

	if($_POST){
		$user = $_POST['user'];
		$pass = $_POST['pass'];

		$sql = "SELECT idUsuario, nombreUsuario, passwordUsuario FROM credenciales WHERE nombreUsuario='$user'";
		$resultCredentials = $mysqli->query($sql);
		$num = $resultCredentials->num_rows;

		if($num>0){
			$rowCredentials = $resultCredentials->fetch_assoc();

			$id = $rowCredentials['idUsuario'];

			$sql = "SELECT id, nombres, apellidoPaterno, apellidoMaterno, telefono, tipo FROM usuario WHERE id='$id'";
			$resultUser = $mysqli->query($sql);

			$rowUser = $resultUser->fetch_assoc();


			$pass_bd = $rowCredentials['passwordUsuario'];
			$pass_encrypt = sha1($pass);
			if($pass_bd == $pass_encrypt){
				$_SESSION['id'] = $rowUser['id'];
				$_SESSION['usuario'] = $rowCredentials['nombreUsuario'];
				$_SESSION['nombres'] = $rowUser['nombres'];
				$_SESSION['apellidoPaterno'] = $rowUser['apellidoPaterno'];
				$_SESSION['apellidoMaterno'] = $rowUser['apellidoMaterno'];
				$_SESSION['telefono'] = $rowUser['telefono'];
				$_SESSION['tipo'] = $rowUser['tipo'];

				header("Location: index.php");		
			}	
		}
	}
?>


<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Iniciar Sesión</title>
	<link href="../css/bootstrap.min.css" type="text/css" rel="stylesheet">
	<link href="../css/stylesLogin.css" type="text/css" rel="stylesheet">
	<link rel="icon" href="../images/icono.png">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin Sans">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto Serif">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dosis">
</head>

<body>
	<img id="background" src="../images/LoginBack3.jpg"/>
	<div class="container-fluid">
		<div class="row align-items-center" id="loginContainer">
			<div class="offset-1 col-10 offset-md-3 col-md-6">
				<div class="offset-2 col-8" id="login">
					<img id="logo" src="../images/logo2.png">
				</div>
				<div class="offset-2 col-8" id="login">
					<h1 id="loginTitle">Veterinaria Castañeda</h1>
				</div>	
				<div class="offset-2 col-8" id="login">
					<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" autocomplete="off">		  
					  <input type="text" id="user" name="user" placeholder="Usuario"><br>		 
					  <input type="password" id="pass" name="pass" placeholder="Contraseña"><br>
					  <input type="submit" value="Ingresar" id="submit">
					</form>
			<?php 
					if(isset($pass_bd) && isset($pass_encrypt)){
						if($pass_bd != $pass_encrypt){
							echo "<div class='col-12' id='passIncorrect'>La constraseña no coincide</div>";
						}	
					}
					if(isset($num)){
						if($num==0){
							echo "<div class='col-12' id='passIncorrect'>No se encontró el usuario</div>";
						}	
					}
			?>
				</div>
			</div>
		</div>
	</div>
	
	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>



</html>