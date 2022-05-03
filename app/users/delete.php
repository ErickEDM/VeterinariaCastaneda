<?php
	require "../conexion.php";
    session_start();

    if(!isset($_SESSION['id'])){
        header("Location: login.php");
    }

    if($_SESSION['tipo']!="1" && $_SESSION['tipo']!="2"){
        header("Location: ../dashboard.php");
    }

    $name = $_SESSION['nombres'];
	$sessionID = $_SESSION['id'];
	
	if(isset($_POST['deleteSubmit'])){
		$idToDelete = trim($_POST['deleteID']);
        $userToDelete = trim($_POST['deleteUser']);
        $namesToDelete = trim($_POST['deleteNames']);
        $lname1ToDelete = trim($_POST['deleteLname1']);
		$lname2ToDelete = trim($_POST['deleteLname2']);
        $numToDelete = trim($_POST['deleteNum']);
		
		$query = "SELECT `id`, `nombres`, `apellidoPaterno`, `apellidoMaterno`, `telefono`, `tipo` FROM `usuario` WHERE id = $idToDelete";          
        $result = $mysqli->query($query);
        $row = $result->fetch_assoc();

		if($row['tipo']=="1"){
			echo "<script type='text/javascript'>alert('Imposible eliminar usuario nivel 1.');</script>";
            echo "<script type='text/javascript'>window.location = 'http://localhost/veterinaria/app/users/index.php';</script>";
		} else {
			$query = "DELETE from `credenciales` WHERE idUsuario = $idToDelete";          
		    $mysqli->query($query);
			$query = "DELETE from `usuario` WHERE id = $idToDelete";          
		    $mysqli->query($query);
		    echo "<script type='text/javascript'>window.location = 'http://localhost/veterinaria/app/users/index.php';</script>";
		}

		
    }

    if(isset($_POST['idDeleteSearch']) && $_POST['idDelete'] != ""){
        # Declaración de variables incondicionales	
		$id_POST = trim($_POST['idDelete']);
		

        $query = "SELECT `id`, `nombres`, `apellidoPaterno`, `apellidoMaterno`, `telefono`, `tipo` FROM `usuario` WHERE id = $id_POST";          
        $result = $mysqli->query($query);
        $row = $result->fetch_assoc();
        
		$query2 = "SELECT `nombreUsuario` FROM `credenciales` WHERE idUsuario = $id_POST";          
        $result2 = $mysqli->query($query2);
        $row2 = $result2->fetch_assoc();

		$numRows = $result->num_rows;
		if($numRows==0){
			#header("Location: index.php");
			echo "<script type='text/javascript'>alert('No se encontró el usuario.');</script>";
			echo "<script type='text/javascript'>window.location = 'http://localhost/veterinaria/app/users/index.php';</script>";
		}else if($row['tipo']=="1"){
            echo "<script type='text/javascript'>alert('Imposible eliminar usuario nivel 1.');</script>";
            echo "<script type='text/javascript'>window.location = 'http://localhost/veterinaria/app/users/index.php';</script>";
        }else{	
            $id = $row['id'];
			$user = $row2['nombreUsuario'];
			$names = $row['nombres'];
			$lname1 = $row['apellidoPaterno'];
			$lname2 = $row['apellidoMaterno'];
			$num = $row['telefono'];
			$type = $row['tipo'];
		}
	} else{
		echo "<script type='text/javascript'>window.location = 'http://localhost/veterinaria/app/users/index.php';</script>";
	}

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
		<div class="container" id="updateContainer">
			<form method="POST" id="updateForm" >
                <h2 class="offset-1 col-10 offset-md-0 col-md-4">Editar datos del usuario</h2>
				<div class="row">	
					<input class="formInputField offset-1 col-10 offset-md-0 col-md-3" type="text" readonly id="updateNames" name="deleteNames" placeholder="Nombre(s)" value="<?php print $names ?>">
					<input class="formInputField offset-1 col-10 offset-md-1 col-md-3" type="text" readonly id="updateLname1" name="deleteLname1" placeholder="Apellido paterno" value="<?php print $lname1 ?>">
					<input class="formInputField offset-1 col-10 offset-md-1 col-md-3" type="text" readonly id="updateLname2" name="deleteLname2" placeholder="Apellido materno" value="<?php print $lname2 ?>">
					<input class="formInputField offset-1 col-10 offset-md-0 col-md-3" type="text" readonly id="updateUser" name="deleteUser" placeholder="Usuario" value="<?php print $user ?>">
					<input class="formInputField offset-1 col-10 offset-md-1 col-md-3" type="number" readonly id="updateNum" name="deleteNum" placeholder="Teléfono" value="<?php print $num ?>">
					<input class="formInputField offset-1 col-10 offset-md-1 col-md-3" type="number" readonly id="updateType" name="deleteType" placeholder="Tipo de usuario" value="<?php print $type ?>">
					<input class="formInputField offset-1 col-10 offset-md-4 col-md-3" type="text" readonly id="updateID" name="deleteID" placeholder="ID" value="<?php print $id ?>">
				</div>	
				<div class="row">	
					<input class="offset-2 col-8 offset-md-2 col-md-3" type="submit" value="Eliminar" id="btnUpdateSubmit" name="deleteSubmit" onclick="return confirm('¿Desea eliminar al usuario?');">
					<input class="offset-2 col-8 offset-md-2 col-md-3" type="button" value="Cancelar" id="btnUpdateCancel" onclick="cancel()">
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