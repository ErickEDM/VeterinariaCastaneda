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

		$query = "INSERT INTO `mascota` (`nombre`, `apellido`, `peso`, `edad`,`color`,`raza`)
		VALUES ('$petName','$petLname','$petWeight','$petAge','$petColor','$petRace')";
		$mysqli->query($query);

		$query = "SELECT `id` FROM `mascota` WHERE (nombre = '$petName') AND (apellido = '$petLname')";
		$result = $mysqli->query($query);
		$row = $result->fetch_assoc();
		
		$idNewPet = $row['id'];   

		$query = "INSERT INTO `expediente`(`idMascota`, `contenido`)
		VALUES ('$idNewPet','$petName, $petLname, $petWeight Kg, $petAge años, color $petColor, $petRace')";

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
		<div class="container" id="recordContainer">
            <div class="row">
                <div class="recordSectionContainer offset-1 col-10 offset-md-4 col-md-4">
                    <form action="" method="GET" autocomplete="off">
                        <div class="input-group mb-3">
                            <input type="text" name="searchRecord" value="<?php if(isset($_GET['searchRecord'])){echo $_GET['searchRecord']; } ?>" class="form-control" placeholder="Nombre del paciente">
                            <button type="submit" id="searchButton">Buscar</button>
                        </div>
                    </form>
                    <div class="card mt-4">
                        <div class="card-body">
                            <table class="table" id="recordSearchResult">
                                <tbody>
                                    <?php 
                                    if(isset($_GET['searchRecord'])){
										$sql = "SELECT
											id,
											nombre,
											apellido
										FROM
											mascota WHERE nombre LIKE '%".$_GET['searchRecord']."%' 
											OR apellido LIKE '%".$_GET['searchRecord']."%'";
											$result = $mysqli->query($sql);
									}else{
										$sql = "SELECT
											id,
											nombre,
											apellido
										FROM
											mascota";
											$result = $mysqli->query($sql);
									}

									if(mysqli_num_rows($result) > 0)
											{
												foreach($result as $items)
												{
													?>
													<tr>
														<td><a href="record.php?petID=<?= $items['id']; ?>"><?= $items['nombre'].' '.$items['apellido']; ?></a></td>
													</tr>
													<?php
												}
											}
											else
											{
												?>
													<tr>
														<td colspan="4">No se encontraron registros</td>
													</tr>
												<?php
											}
                                    ?>
                                </tbody>
                            </table>
                        </div>	
                    </div>
				</div>
            </div>    
		</div>
    </div>

	<script type="text/javascript" src="../../js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../js/app/sideBar.js"></script>
	<script type="text/javascript" src="../../js/app/scriptRecord.js"></script>
</body>

</html>