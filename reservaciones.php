<?php require_once './includes/conexion.php'; ?>
<?php require_once './includes/helpers.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Reservaciones</title>

	<link href="img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
	<link href="img/favicon.png" rel="icon" type="image/png">
	<link href="img/favicon.ico" rel="shortcut icon">
    <link rel="stylesheet" href="css/separate/pages/others.min.css">
    <link rel="stylesheet" href="css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="css/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="with-side-menu">
      <?php require_once'includes/nav.php'?>
      <div class="page-content" >
		<div class="container-fluid">
			<div class="row ">
				
				<div class="col-xl-6">
					<header class="section-header">
						<div class="tbl">
							<div class="tbl-row">
								<div class="tbl-cell">
									<h3>Reservaciones</h3>
									<ol class="breadcrumb breadcrumb-simple">
										<li><a href="landin.php">Panel principal</a></li>
										<li class="active">Reservaciones</li>
									</ol>
								</div>
							</div>
						</div>
					</header>
				</div>
			</div> <!-- /.row -->
			<div class="row">
				<div class="col-xl-6">
					<input 
					type="select">
				</div>
				<div class="col-xl-6">
					<h2>Hola</h2>
				</div>
			</div>
			<div class="row">
			<div class="col-xl-12">
					<?php
						// Obtener las últimas 4 reservas
						$reservas = conseguirTodasReservas($db);
					?>
					<section class="box-typical">
							<header class="box-typical-header panel-heading">
								<h3 class="panel-title m-lg-1 ">Reservaciones</h3>
							</header>
							<div class="box-typical-body panel-body">
								<table class="tbl-typical">
									<tr>
											<th><div>Nombre</div></th>
											<th><div>Apellido</div></th>
											<th><div>personas</div></th>
											<th><div>Fecha</div></th>
											<th><div>Cumplea&ntilde;ero</div></th>
											<th><div>Colaboracion</div></th>
											<th><div>Reservado por</div></th>
											<th><div>Fecha reservación</div></th>
											<th><div>Accion</div></th>
									</tr>
									<?php foreach ($reservas as $reserva): ?>
										<tr>
											<td><?php echo htmlspecialchars($reserva['nombre']); ?></td>
											<td><?php echo htmlspecialchars($reserva['apellido']); ?></td>
											<td><?php echo htmlspecialchars($reserva['numper']); ?></td>
											<td><?php echo htmlspecialchars($reserva['fecha_formateada']); ?></td>
											<td><?php $reserva['cumpl'] == 1 ? $reserva['cumpl'] = 'si' : $reserva['cumpl'] = 'no';  echo htmlspecialchars($reserva['cumpl']); ?></td>
											<td><?php $reserva['colab'] == 1 ? $reserva['colab'] = 'si' : $reserva['colab'] = 'no';  echo htmlspecialchars($reserva['colab']); ?></td>
											<td><?php echo htmlspecialchars($reserva['nombre_usuario']) . " " . htmlspecialchars($reserva['apellido_usuario']); ?></td>
											<td><?php echo htmlspecialchars($reserva['fecha_creacion_formateada']); ?></td>
											<td>
												<div class="form-group">
													<div class="row">
														<div class="col-xl-4">
															<form action="./includes/helpers.php">
																<button class="btn btn-inline btn-warning-outline">Editar</button>
															</form>
														</div>
														<div class="col-xl-4">
															<form action="./includes/helpers.php" method="GET">
																<button class="btn btn-inline btn-danger-outline" value="<?php echo htmlspecialchars($reserva['id']); ?>" name="delete" submit>Eliminar</button>
															</form>
														</div>
													</div>
												</div>
											</td>

										</tr>
									<?php endforeach; ?>
								</table>
							</div><!--.box-typical-body-->
						</section><!--.box-typical-dashboard-->
				</div>
			</div>
		</div>
	</div>
</body>
</html>