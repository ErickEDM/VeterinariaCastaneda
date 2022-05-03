<?php
	require "../conexion.php";
    session_start();

    if(!isset($_SESSION['id'])){
        header("Location: ../login.php");
    }

    $name = $_SESSION['nombres'];
	$sessionID = $_SESSION['id'];

	$profilePicHref = "profilePic$sessionID.jpg";

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
				<a href="#" class="active">
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

		<div class="container">
			<div class="row ">
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
			<div class="row" id="newButtonContainer">
				<a class="offset-10 col-2 text-center" id="newButton" href="new.php">Nueva entrada</a>
			</div>
			<div class="row">
				<div class="entriesSectionContainer col-12 col-md-4">
					<form action="" method="GET" autocomplete="off">
						<div class="input-group mb-3">
							<input type="text" name="searchEntry" required value="<?php if(isset($_GET['searchEntry'])){echo $_GET['searchEntry']; } ?>" class="form-control" placeholder="Nombre del artículo">
							<button type="submit" id="searchButton">Buscar</button>
						</div>
					</form>
					<div class="card mt-4">
						<div class="card-body">
							<table class="table" id="entriesSearchResult">
								<tbody>
									<?php 
										if(isset($_GET['searchEntry']))
										{
											$filtervalues = $_GET['searchEntry'];
											$query = "SELECT * FROM articulo WHERE titulo LIKE '%$filtervalues%'";
											$result = $mysqli->query($query);

											if(mysqli_num_rows($result) > 0)
											{
												foreach($result as $items)
												{
													?>
													<tr>
														<td><a href="entry.php?entryID=<?= $items['id']; ?>"><?= $items['titulo']; ?></a></td>
													</tr>
													<?php
												}
											}
											else
											{
												?>
													<tr>
														<td colspan="4">No se encontraron entradas</td>
													</tr>
												<?php
											}
										}
									?>
								</tbody>
							</table>
						</div>	
					</div>
				</div>
				<div class="entriesSectionContainer col-12 col-md-4">
					<div id="lastEntriesTitle">Todos los artículos</div>
					<div class="card mt-4">
						<div class="card-body">
							<table class="table" id="entriesSearchResult">
								<tbody>
									<?php 
										$query = "SELECT * FROM articulo";
										$result = $mysqli->query($query);

										if(mysqli_num_rows($result) > 0)
										{
											foreach($result as $items)
											{
												?>
												<tr>
													<td><a href="entry.php?entryID=<?= $items['id']; ?>"><?= $items['titulo']; ?></a></td>
												</tr>
												<?php
											}
										}
										else
										{
											?>
												<tr>
													<td colspan="4">No hay entradas</td>
												</tr>
											<?php
										}
									?>
								</tbody>
							</table>
						</div>	
					</div>	
				</div>
				<div class="entriesSectionContainer col-12 col-md-4">
					<div id="lastEntriesTitle">Últimos artículos</div>
					<div class="card mt-4">
						<div class="card-body">
							<table class="table" id="entriesSearchResult">
								<tbody>
									<?php 
										$todayDate = date('Y-m-d');
										$todayMinusDate = date('Y-m-d',strtotime('-7 days'));
										$query = "SELECT * FROM articulo WHERE fecha BETWEEN '$todayMinusDate' AND '$todayDate'";
										$result = $mysqli->query($query);

										if(mysqli_num_rows($result) > 0)
										{
											foreach($result as $items)
											{
												?>
												<tr>
													<td><a href="entry.php?entryID=<?= $items['id']; ?>"><?= $items['titulo']; ?></a></td>
												</tr>
												<?php
											}
										}
										else
										{
											?>
												<tr>
													<td colspan="4">No hay nuevas entradas</td>
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
</body>

</html>