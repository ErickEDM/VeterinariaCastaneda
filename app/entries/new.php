<?php
	require "../conexion.php";
    session_start();

    if(!isset($_SESSION['id'])){
        header("Location: ../login.php");
    }

    $name = $_SESSION['nombres'];
	$sessionID = $_SESSION['id'];

	$profilePicHref = "profilePic$sessionID.jpg";

	if(isset($_POST["submit"])){		
		$insertTitle = $_POST['updateTitle'];
		$insertContent = $_POST['updateContent'];
        $todayDate = date('Y-m-d');

		$query = "INSERT INTO `articulo`(`titulo`, `contenido`, `idUsuario`, `fecha`) VALUES ('$insertTitle','$insertContent','$sessionID','$todayDate')" ;
		$mysqli->query($query);

        $query = "SELECT `id` FROM `articulo` WHERE titulo = '$insertTitle' AND contenido = '$insertContent' AND fecha = '$todayDate'";
		$result = $mysqli->query($query);
        $row = $result->fetch_assoc();

        $idNew = $row['id'];

        if ($_FILES["imageToUpload"]["name"] != ""){
			# Subir imagen
			$target_dir = "../../images/entries/";
			$extension = pathinfo($_FILES["imageToUpload"]["name"], PATHINFO_EXTENSION);
			$name = "entryIMG".$idNew;
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
        echo "<script type='text/javascript'>window.location = 'http://localhost/veterinaria/app/entries/';</script>";
	}

?>


<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Entries</title>
	<link href="../../css/bootstrap.min.css" type="text/css" rel="stylesheet">
	<link href="../../css/app/stylesApp.css" type="text/css" rel="stylesheet">
	<link href="../../css/app/stylesEntries.css" type="text/css" rel="stylesheet">
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
				<a href="../record/">
					<i class='bx bxs-dog'></i>
					<span class="links_name">Pacientes</span>
				</a>
			</li>

			<?php } ?>

			<li>
				<a href="../entries/" class="active">
					<i class='bx bx-detail'></i>
					<span class="links_name">Entradas</span>
				</a>
			</li>
			<li>
				<a href="../site/">
					<i class='bx bx-grid-alt'></i>
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
				<div class="col-12 col-md-2 text-center">
					<img src="../../images/users/<?php echo "profilePic$sessionID.jpg" ?>" alt="" id="profileBigPicture">
				</div>
				<div class="col-12 col-md-6 align-self-center text-center text-md-left">
					<h1><?php echo $_SESSION["nombres"], " ", $_SESSION["apellidoPaterno"], " ", $_SESSION["apellidoMaterno"] ?></h1>
				</div>
				<div class="col-12">
					<hr></hr>
				</div>
			</div>	
		</div>
        <div class="container">
            <div class="row">
                <form class="col-12" method="POST" id="updateEntryForm" enctype="multipart/form-data">
					<label class="custom-file-upload col-12 col-md-2" for="imageToUpload">Elegir imagen</label>
                	<input class="formInputField" type="file" name="imageToUpload" id="imageToUpload">        
					<input class="formInputField col-12 col-md-9" type="text" id="updateTitle" autocomplete="off" required name="updateTitle" placeholder="Título" max="100" value="<?php if(isset($insertTitle)){echo $insertTitle;} ?>">
                    <textarea class="formInputField col-12" type="text" id="updateContent" autocomplete="off" required name="updateContent" placeholder="Contenido" ><?php if(isset($insertContent)){echo $insertContent;} ?></textarea>
                    <input class="offset-2 col-8 offset-md-2 col-md-3" type="submit" value="Guardar" id="submit" name="submit" onclick="return confirm('¿Segur@ que desea guardar la entrada?');">
                    <input class="offset-2 col-8 offset-md-2 col-md-3" type="button" value="Cancelar" id="cancel" onclick="cancelEntry()">
                </form>
            </div>
        </div>
		
		
    </div>
	<script type="text/javascript" src="../../js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../js/app/sideBar.js"></script>
	<script type="text/javascript" src="../../js/app/scriptEntries.js"></script>
</body>

</html>