<?php
	require "../conexion.php";
    session_start();

    if(!isset($_SESSION['id'])){
        header("Location: ../login.php");
    }

	if($_SESSION['tipo']!="1" && $_SESSION['tipo']!="2"){
        header("Location: ../index.php");
    }

    $name = $_SESSION['nombres'];
	$sessionID = $_SESSION['id'];
	
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
				<a href="../users/index.php">
					<i class='bx bxs-user-rectangle'></i>	
					<span class="links_name">Usuarios</span>
				</a>
			</li>
			
			<?php } ?>	

            <li>
				<a href="#" class="active">
					<i class='bx bxs-dog'></i>
					<span class="links_name">Pacientes</span>
				</a>
			</li>
			<li>
				<a href="../entries">
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
					<a href="../profile/"><img src="../../images/users/<?php echo "profilePic$sessionID.jpg" ?>" alt="" id="profilePicture"></a>
					<a class="name" id="myNames" href="../profile/"><?php echo $name ?></a>
				</div>
				<a href="../logout.php"><i class="bx bx-log-out" id="log_out"></i></a>	
			</div>	
		</div>
	</div>	
	<div class="home_content">
		<div class="container">
			<div class="row">
				<div class="col-6">
					<h1>Pacientes</h1>
				</div>
			</div>	
		</div>
        <div class="container" id="btnContainer">
			<div class="row">
				
			</div>
		</div>	
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-6">
					<form action="" method="GET" autocomplete="off">
						<div class="input-group mb-3">
							<input type="text" name="searchPet" value="<?php if(isset($_GET['searchPet'])){echo $_GET['searchPet']; } ?>" class="form-control" placeholder="Nombre del paciente">
							<button type="submit" id="searchButton">Buscar</button>
						</div>
					</form>
				</div>
			<?php if($_SESSION['tipo']=="1" || $_SESSION['tipo']=="2"){ ?>
				<div class="col-4 offset-md-2 col-md-2">
					<a class="btnCUD" id="btnNew" type="button" href="new.php">Nuevo expediente</a>
				</div>
				<div class="col-4 col-md-2">
					<a class="btnCUD" id="btnSearch" type="button" href="search.php">Actualizar expediente</a>
				</div>
			<?php } ?>	
			</div>
		</div>
		
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="card mt-4">
						<div class="card-body">
							<table class="table">
								<thead>
									<tr>
										<th>ID</th>
										<th>Nombre</th>
										<th>Apellido</th>
										<th>Peso (Kg)</th>
										<th>Edad</th>
										<th>Color</th>
                                        <th>Raza</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									if(isset($_GET['searchPet'])){
										$sql = "SELECT
											id,
											nombre,
											apellido,
											peso,
											edad,
											color,
											raza
										FROM
											mascota WHERE nombre LIKE '%".$_GET['searchPet']."%' 
											OR apellido LIKE '%".$_GET['searchPet']."%'";
											$result = $mysqli->query($sql);
									}else{
										$sql = "SELECT
											id,
											nombre,
											apellido,
											peso,
											edad,
											color,
											raza
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
														<td><?= $items['id']; ?></td>
														<td><?= $items['nombre']; ?></td>
														<td><?= $items['apellido']; ?></td>
														<td><?= $items['peso']; ?></td>
														<td><?= $items['edad']; ?></td>
														<td><?= $items['color']; ?></td>
                                                        <td><?= $items['raza']; ?></td>
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