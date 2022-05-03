<?php
	require "../conexion.php";
    session_start();

    if(!isset($_SESSION['id'])){
        header("Location: ../login.php");
    }

    $name = $_SESSION['nombres'];
	$sessionID = $_SESSION['id'];

	$profilePicHref = "profilePic$sessionID.jpg";
	
	if(isset($_POST['submit'])){
		if ($_FILES["imageToUpload"]["name"] != ""){
			
			# Subir imagen
			$target_dir = "../../images/users/";
			$extension = pathinfo($_FILES["imageToUpload"]["name"], PATHINFO_EXTENSION);
			$name = "profilePic".$sessionID;
			$target_file = $target_dir . $name.".".$extension;
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			// Verificar si es una imagen real
			if(isset($_POST["submit"])) {
				$check = getimagesize($_FILES["imageToUpload"]["tmp_name"]);
				if($check !== false) {
					
					$uploadOk = 1;
				} else {
					echo "<script type='text/javascript'>alert('El archivo seleccionado no es una imagen.');</script>";
					$uploadOk = 0;
				}
			}

			// Verificar tamaño de imagen
			if ($_FILES["imageToUpload"]["size"] > 8000000) {
				echo "<script type='text/javascript'>alert('El tamaño de la imagen debe se menor a 8.0 MB');</script>";
				$uploadOk = 0;
			}

			// Permitir JPG
			if($imageFileType != "jpg" && $imageFileType != "jpeg") {
				echo "<script type='text/javascript'>alert('Solo se permiten imágenes JPG.');</script>";
				$uploadOk = 0;
			}

			// Verificar si uploadOK es correcto (1)
			if ($uploadOk == 0) {
				echo "<script type='text/javascript'>alert('Hubo un problema, no se subió la imagen');</script>";
				// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["imageToUpload"]["tmp_name"], $target_file)) {
					#echo "The file ". htmlspecialchars( basename( $_FILES["imageToUpload"]["name"])). " has been uploaded.";
					echo "<script type='text/javascript'>alert('Subida de imagen exitosa.');</script>";
				} else {
					echo "<script type='text/javascript'>alert('Hubo un problema, no se subió la imagen');</script>";
				}
			}
			
		}
        $userUpdated = trim($_POST['profileUser']);
        $numUpdated = trim($_POST['profileNum']);
		
		$query = "SELECT `nombreUsuario` FROM `credenciales` WHERE nombreUsuario = '$userUpdated'";          
        $result = $mysqli->query($query);
        $row = $result->fetch_assoc();
		$num = $result->num_rows;

		if($num==0){
			$query = "UPDATE `credenciales` SET `nombreUsuario`='$userUpdated' WHERE idUsuario = $sessionID";          
			$mysqli->query($query);
			$query = "UPDATE `usuario` SET `telefono`='$numUpdated' WHERE id = $sessionID";          
			$mysqli->query($query);
			$_SESSION['usuario'] = $userUpdated;
			$_SESSION['telefono'] = $numUpdated;
			echo "<script type='text/javascript'>window.location = 'http://localhost/veterinaria/app/profile/index.php';</script>";
		} else if($num==1 && $userUpdated == $_SESSION['usuario']){
			$query = "UPDATE `usuario` SET `telefono`='$numUpdated' WHERE id = $sessionID";          
			$mysqli->query($query);
			$_SESSION['usuario'] = $userUpdated;
			$_SESSION['telefono'] = $numUpdated;
			echo "<script type='text/javascript'>window.location = 'http://localhost/veterinaria/app/profile/index.php';</script>";
		} else{	
			$query = "UPDATE `usuario` SET `telefono`='$numUpdated' WHERE id = $sessionID";          
			$mysqli->query($query);
			$_SESSION['telefono'] = $numUpdated;
			echo "<script type='text/javascript'>alert('Ya existe el usuario, pruebe otro.');</script>";
			echo "<script type='text/javascript'>window.location = 'http://localhost/veterinaria/app/profile/index.php';</script>";
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
					<a class="name" id="myNames" href="#"><?php echo $name ?></a>
				</div>
				<a href="../logout.php"><i class="bx bx-log-out" id="log_out"></i></a>	
			</div>	
		</div>
	</div>	
	<div class="home_content">
		<div class="container">
			<div class="row ">
				<div class="col-12 col-md-2 text-center">
					<img src="../../images/users/<?php echo "profilePic$sessionID.jpg" ?>" alt="" id="profileBigPicture">
				</div>
				<div class="col-12 col-md-6 align-self-center text-center text-md-left">
					<h1><?php echo $_SESSION["nombres"], " ", $_SESSION["apellidoPaterno"], " ", $_SESSION["apellidoMaterno"]  ?></h1>
				</div>
				<div class="col-12">
					<hr></hr>
				</div>
				
			</div>	
		</div>
		<div class="container" id="updateContainer">
			<form method="POST" id="updateForm" enctype="multipart/form-data">
				<div class="row text-center text-md-left">
					<h2 class="offset-1 col-10 offset-md-1 col-md-4">Mis datos</h2>
				</div>	
				<div class="row">
					<label class="custom-file-upload offset-1 col-10" id="customLabelUpload" for="imageToUpload">Elegir nueva foto del perfil</label>
                	<input class="formInputField" type="file" name="imageToUpload" id="imageToUpload"> 
				</div>				
				<div class="row inputContainer">	
					<div class="formText offset-1 col-10">Usuario</div>
					<input class="formInputField offset-1 col-10" type="text" id="profileUser" name="profileUser" placeholder="Usuario" value="<?php print $_SESSION['usuario'] ?>">
				</div>
				<div class="row inputContainer">	
					<div class="formText offset-1 col-10">Nombre/s</div>
					<input class="formInputField offset-1 col-10" readonly type="text" id="profileNames" placeholder="Nombre(s)" value="<?php print $_SESSION['nombres'] ?>">
				</div>
				<div class="row inputContainer">	
					<div class="formText offset-1 col-10">Apellido materno</div>
					<input class="formInputField offset-1 col-10" readonly type="text" id="profileLnames" placeholder="Apellido(s)" value="<?php print $_SESSION['apellidoPaterno'] ?>">
				</div>
				<div class="row inputContainer">	
					<div class="formText offset-1 col-10">Apellido materno</div>
					<input class="formInputField offset-1 col-10" readonly type="text" id="profileLnames" placeholder="Apellido(s)" value="<?php print $_SESSION['apellidoMaterno'] ?>">
				</div>
				<div class="row inputContainer">	
					<div class="formText offset-1 col-10">Número de teléfono</div>
					<input class="formInputField offset-1 col-10" type="number" id="profileNum" name="profileNum" placeholder="Teléfono" value="<?php print $_SESSION['telefono'] ?>">
				</div>
				<div class="row inputContainer">	
					<div class="formText offset-1 col-10">Tipo de usuario</div>
					<input class="formInputField offset-1 col-10" readonly type="number" id="profileType" placeholder="Tipo de usuario" value="<?php print $_SESSION['tipo'] ?>">
				</div>
				<div class="row inputContainer">	
					<a class="btnEdit offset-1 col-10 offset-md-1 col-md-2" type="button" id="btnPassChange" href="cpass.php">Cambiar password</a>
					<input class="btnEdit offset-1 col-10 offset-md-5 col-md-1" type="button" value="Editar" id="btnProfileEdit" onclick="enable()">
					<input class="btnEdit offset-1 col-10 offset-md-1 col-md-1" type="submit" value="Guardar" id="btnProfileSubmit" name="submit" onclick="return confirm('¿Segur@ que desea guardar los cambios?');">
				</div>
			</form>
		</div>
    </div>

	<script type="text/javascript" src="../../js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../js/app/sideBar.js"></script>
	<script type="text/javascript" src="../../js/app/scriptProfile.js"></script>
</body>

</html>