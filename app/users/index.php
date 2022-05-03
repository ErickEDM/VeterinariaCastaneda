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
	<title>Usuarios</title>
	<link href="../../css/bootstrap.min.css" type="text/css" rel="stylesheet">
	<link href="../../css/app/stylesApp.css" type="text/css" rel="stylesheet">
	<link href="../../css/app/stylesUsers.css" type="text/css" rel="stylesheet">
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
				<a href="index.php"  class="active">
					<i class='bx bxs-user-rectangle'></i>	
					<span class="links_name">Usuarios</span>
				</a>
			</li>
			
			<?php } ?>	

			<li>
				<a href="../record/">
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
					<h1>Usuarios</h1>
				</div>
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
										<th>Usuario</th>
										<th>Nombres</th>
										<th>Apellidos</th>
										<th>Teléfono</th>
										<th>Tipo</th>
									</tr>
								</thead>
								<tbody>
									<?php 
											$sql = "SELECT
											u.id,
											u.nombres,
											u.apellidoPaterno,
											u.apellidoMaterno,
											u.telefono,
											c.nombreUsuario,
											u.tipo
										FROM
											usuario u
										INNER JOIN credenciales c ON u.id = c.idUsuario;";
											$result = $mysqli->query($sql);

											if(mysqli_num_rows($result) > 0)
											{
												foreach($result as $items)
												{
													?>
													<tr>
														<td><?= $items['id']; ?></td>
														<td><?= $items['nombreUsuario']; ?></td>
														<td><?= $items['nombres']; ?></td>
														<td><?= $items['apellidoPaterno']." ".$items['apellidoMaterno']; ?></td>
														<td><?= $items['telefono']; ?></td>
														<td><?= $items['tipo']; ?></td>
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
		<div class="container" id="btnContainer">
			<div class="row">
<?php if($_SESSION['tipo']=="1"){ ?>

				<div class="col-4 offset-md-6 col-md-2">
					<input class="btnCUD" id="btnDelete" type="button" value="Eliminar"></input>
				</div>
				<div class="col-4 col-md-2">
					<input class="btnCUD" id="btnAdd" type="button" value="Agregar"></input>
				</div>
				<div class="col-4 col-md-2">
					<input class="btnCUD" id="btnUpdate" type="button" value="Actualizar"></input>
				</div>
<?php } else{ ?>

				<div class="col-4 offset-md-8 col-md-2">
					<input class="btnCUD" id="btnAdd" type="button" value="Agregar"></input>
				</div>
				<div class="col-4 col-md-2">
					<input class="btnCUD" id="btnUpdate" type="button" value="Actualizar"></input>
				</div>

<?php } ?>			

			</div>
		</div>
		<div class="container" id="updateSearch">
			<form action="edit.php" method="POST" id="idForm">
				<div class="row">
					<h2 class="offset-1 col-10 offset-md-0 col-md-4">Ingresar ID de usuario</h2>
					<input class="formInputField offset-1 col-10 offset-md-0 col-md-1" type="number" id="idUpdate" name="idUpdate" placeholder="ID"><br>	
				</div>	
				<div class="row">
					<input class="offset-2 col-8 offset-md-2 col-md-3" type="submit" value="Buscar" id="btnUpdateSearchView" name="idUpdateSearch">
					<input class="offset-2 col-8 offset-md-2 col-md-3" type="button" value="Cancelar" id="btnUpdateCancelView" onclick="viewCancelFunction()">
				</div>	
			</form>
		</div>
		<div class="container" id="deleteSearch">
			<form action="delete.php" method="POST" id="deleteForm">
				<div class="row">
					<h2 class="offset-1 col-10 offset-md-0 col-md-4">Ingresar ID de usuario</h2>
					<input class="formInputField offset-1 col-10 offset-md-0 col-md-1" type="number" id="idDelete" name="idDelete" placeholder="ID"><br>
				</div>	
				<div class="row">		 
					<input class="offset-2 col-8 offset-md-2 col-md-3" type="submit" value="Buscar" id="btnDeleteSearchView" name="idDeleteSearch">
					<input class="offset-2 col-8 offset-md-2 col-md-3" type="button" value="Cancelar" id="btnDeleteCancel" onclick="viewCancelFunction()">
				</div>
			</form>
		</div>	
    </div>		

	<script type="text/javascript" src="../../js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../js/app/sideBar.js"></script>
	<script type="text/javascript" src="../../js/app/scriptUsers.js"></script>
</body>

</html>