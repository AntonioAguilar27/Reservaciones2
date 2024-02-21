<?php require_once 'includes/redireccion.php';?>
<?php require_once './includes/conexion.php'; ?>
<?php require_once './includes/helpers.php'; ?>

<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Pagina principal</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
						<?php
						// Llamar a la función totalReservaciones() y obtener el resultado
						$total_reservaciones = totalReservaciones($db);
						// Obtener el valor de la consulta COUNT(*)
						$total_reservaciones_numero = mysqli_fetch_array($total_reservaciones)[0];
						?>
						<?php
						// Llamar a la función totalReservaciones() y obtener el resultado
						$total_colab = calcularColab($db);
						// Obtener el valor de la consulta COUNT(*)
						$total_colab_numeros = mysqli_fetch_array($total_colab)[0];
						?>
<div class="page-content">
	    <div class="container-fluid">
			<div class="row">
				<div class="col-xl-6">
					<div class="tbl-cell">
						<h2>
						<?php
														// Obtener el nombre del día de la semana
							$nombre_dia = date("l");
							if ($nombre_dia == 'Monday') {
								$nombre_dia = 'Lunes';
							} elseif ($nombre_dia == 'Tuesday') {
								$nombre_dia = 'Martes';
							} elseif ($nombre_dia == 'Wednesday') {
								$nombre_dia = 'Miércoles';
							} elseif ($nombre_dia == 'Thursday') {
								$nombre_dia = 'Jueves';
							} elseif ($nombre_dia == 'Friday') {
								$nombre_dia = 'Viernes';
							} elseif ($nombre_dia == 'Saturday') {
								$nombre_dia = 'Sábado';
							} elseif ($nombre_dia == 'Sunday') {
								$nombre_dia = 'Domingo';
							}
							// Obtener el día del mes
							$dia_mes = date("j");
							// Obtener el nombre del mes
							$nombre_mes = date("F");
							if ($nombre_mes == 'January') {
								$nombre_mes = 'Enero';
							} elseif ($nombre_mes == 'February') {
								$nombre_mes = 'Febrero';
							} elseif ($nombre_mes == 'March') {
								$nombre_mes = 'Marzo';
							} elseif ($nombre_mes == 'April') {
								$nombre_mes = 'Abril';
							} elseif ($nombre_mes == 'May') {
								$nombre_mes = 'Mayo';
							} elseif ($nombre_mes == 'June') {
								$nombre_mes = 'Junio';
							} elseif ($nombre_mes == 'July') {
								$nombre_mes = 'Julio';
							} elseif ($nombre_mes == 'August') {
								$nombre_mes = 'Agosto';
							} elseif ($nombre_mes == 'September') {
								$nombre_mes = 'Septiembre';
							} elseif ($nombre_mes == 'October') {
								$nombre_mes = 'Octubre';
							} elseif ($nombre_mes == 'November') {
								$nombre_mes = 'Noviembre';
							} elseif ($nombre_mes == 'December') {
								$nombre_mes = 'Diciembre';
							}
							// Obtener el año
							$anio = date("Y");
							// Imprimir la fecha en el formato deseado
							echo "$nombre_dia $dia_mes de $nombre_mes de $anio";
							?>
						</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-6">
					<div class="tbl-cell">
						<br></br>
					</div>
				</div>
			</div>
	        <div class="row">
	            <div class="col-xl-6">
				<div class="row">
				<div class="col-sm-6">
							<article class="statistic-box green">
								<div>
									<!-- Mostrar el número de reservaciones -->
									<div class="number"><?php echo $total_reservaciones_numero; ?></div>
									<div class="caption"><div>Reservaciones</div></div>
								</div>
							</article>
						</div><!--.col-->
	                    <div class="col-sm-6">
							<article class="statistic-box purple">
								<div>
									<!-- Mostrar el número de reservaciones -->
									<div class="number"><?php echo $total_colab_numeros; ?></div>
									<div class="caption"><div>Colaboraciones</div></div>
								</div>
							</article>
						</div><!--.col-->
	                </div><!--.row-->
	            </div><!--.col-->
	            <div class="col-xl-6">
				<div class="row">
						<?php
						// Llamar a la función totalReservaciones() y obtener el resultado
						$total_cumpleaneros = calcularCumpleaneros($db);
						// Obtener el valor de la consulta COUNT(*)
						$total_cumpleaneros_numero = mysqli_fetch_array($total_cumpleaneros)[0];
						?>
	                    <div class="col-sm-6">
	                        <article class="statistic-box yellow">
	                            <div>
	                                <div class="number"><?php echo $total_cumpleaneros_numero; ?></div>
	                                <div class="caption"><div>Cumpleañeros</div></div>
	                            </div>
	                        </article>
	                    </div><!--.col-->
	                </div><!--.row-->
	            </div><!--.col-->
	        </div><!--.row-->


	        <div class="row">
	            <div class="col-xl-12 dahsboard-column">
					<?php
					// Obtener las últimas 4 reservas
					$reservas = conseguirUltimasReservas($db);
					?>
					<a href="reservaciones.php"  style="text-decoration: none; color: inherit;">
					<section class="box-typical box-typical-dashboard panel panel-default scrollable">
						<header class="box-typical-header panel-heading">
							<h3 class="panel-title m-lg-1 ">Ultimas reservaciones</h3>
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
							</tr>
							<?php foreach ($reservas as $reserva): ?>
							<tr>
								<td><?php echo htmlspecialchars($reserva['nombre']); ?></td>
								<td><?php echo htmlspecialchars($reserva['apellido']); ?></td>
								<td><?php echo htmlspecialchars($reserva['numper']); ?></td>
								<td><?php echo htmlspecialchars($reserva['fecha_formateada']); ?></td>
								<td><?php echo htmlspecialchars($reserva['cumpl']); ?></td>
								<td><?php echo htmlspecialchars($reserva['colab']); ?></td>
								<td><?php echo htmlspecialchars($reserva['nombre_usuario']) . " " . htmlspecialchars($reserva['apellido_usuario']); ?></td>
								<td><?php echo htmlspecialchars($reserva['fecha_creacion_formateada']); ?></td>

							</tr>
							<?php endforeach; ?>
						</table>
						</div><!--.box-typical-body-->
					</section><!--.box-typical-dashboard-->
					</a>
	                <section class="box-typical box-typical-dashboard panel panel-default scrollable">
	                    <header class="box-typical-header panel-heading">
	                        <h3 class="panel-title">Comments</h3>
	                    </header>
	                    <div class="box-typical-body panel-body">
	                        <article class="comment-item">
	                            <div class="user-card-row">
	                                <div class="tbl-row">
	                                    <div class="tbl-cell tbl-cell-photo">
	                                        <a href="#">
	                                            <img src="img/photo-64-1.jpg" alt="">
	                                        </a>
	                                    </div>
	                                    <div class="tbl-cell">
	                                        <span class="user-card-row-name"><a href="#">Matt McGill</a></span>
	                                    </div>
	                                    <div class="tbl-cell tbl-cell-date">
	                                        <span class="semibold">Today</span>
	                                        12:45
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="comment-item-txt">
	                                <p>That’s a great idea! I’m sure we could start this project as soon as possible.</p>
	                                <p>Let’s meet tomorow!</p>
	                            </div>
	                            <div class="comment-item-meta">
	                                <a href="#" class="star">
	                                    <i class="font-icon font-icon-star"></i>
	                                </a>
	                                <a href="#">
	                                    <i class="font-icon font-icon-re"></i>
	                                </a>
	                                <!--Реализация кнопками-->
	                                <!--<button type="button" class="star">-->
	                                <!--<i class="font-icon font-icon-star"></i>-->
	                                <!--</button>-->
	                                <!--<button type="button">-->
	                                <!--<i class="font-icon font-icon-re"></i>-->
	                                <!--</button>-->
	                            </div>
	                        </article>
	                        <article class="comment-item">
	                            <div class="user-card-row">
	                                <div class="tbl-row">
	                                    <div class="tbl-cell tbl-cell-photo">
	                                        <a href="#">
	                                            <img src="img/photo-64-2.jpg" alt="">
	                                        </a>
	                                    </div>
	                                    <div class="tbl-cell">
	                                        <span class="user-card-row-name"><a href="#">Tim Collins</a></span>
	                                    </div>
	                                    <div class="tbl-cell tbl-cell-date">
	                                        <span class="semibold">Today</span>
	                                        12:45
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="comment-item-txt">
	                                <p>That’s a great idea! I’m sure we could start this project as soon as possible.</p>
	                                <p>Let’s meet tomorow!</p>
	                            </div>
	                            <div class="comment-item-meta">
	                                <a href="#" class="star active">
	                                    <i class="font-icon font-icon-star"></i>
	                                </a>
	                                <a href="#">
	                                    <i class="font-icon font-icon-re"></i>
	                                </a>
	                                <!--Реализация кнопками-->
	                                <!--<button type="button" class="star">-->
	                                <!--<i class="font-icon font-icon-star"></i>-->
	                                <!--</button>-->
	                                <!--<button type="button">-->
	                                <!--<i class="font-icon font-icon-re"></i>-->
	                                <!--</button>-->
	                            </div>
	                        </article>
	                    </div><!--.box-typical-body-->
	                </section>
	            </div><!--.col-->
	            <div class="col-xl-6 dahsboard-column">
	                <section class="box-typical box-typical-dashboard panel panel-default scrollable">
	                    <header class="box-typical-header panel-heading">
	                        <h3 class="panel-title">Contacts</h3>
	                    </header>
	                    <div class="box-typical-body panel-body">
	                        <div class="contact-row-list">
	                            <article class="contact-row">
	                                <div class="user-card-row">
	                                    <div class="tbl-row">
	                                        <div class="tbl-cell tbl-cell-photo">
	                                            <a href="#">
	                                                <img src="img/photo-64-2.jpg" alt="">
	                                            </a>
	                                        </div>
	                                        <div class="tbl-cell">
	                                            <p class="user-card-row-name"><a href="#">Tim Collins</a></p>
	                                            <p class="user-card-row-mail"><a href="#">timcolins@mail.com</a></p>
	                                        </div>
	                                        <div class="tbl-cell tbl-cell-status">Director at Tony’s</div>
	                                    </div>
	                                </div>
	                            </article>
	                            <article class="contact-row">
	                                <div class="user-card-row">
	                                    <div class="tbl-row">
	                                        <div class="tbl-cell tbl-cell-photo">
	                                            <a href="#">
	                                                <img src="img/photo-64-1.jpg" alt="">
	                                            </a>
	                                        </div>
	                                        <div class="tbl-cell">
	                                            <p class="user-card-row-name"><a href="#">Maggy Smith</a></p>
	                                            <p class="user-card-row-mail"><a href="#">maggysmith@mail.com</a></p>
	                                        </div>
	                                        <div class="tbl-cell tbl-cell-status">PR Manager</div>
	                                    </div>
	                                </div>
	                            </article>
	                            <article class="contact-row">
	                                <div class="user-card-row">
	                                    <div class="tbl-row">
	                                        <div class="tbl-cell tbl-cell-photo">
	                                            <a href="#">
	                                                <img src="img/photo-64-3.jpg" alt="">
	                                            </a>
	                                        </div>
	                                        <div class="tbl-cell">
	                                            <p class="user-card-row-name"><a href="#">Molly Bridjet</a></p>
	                                            <p class="user-card-row-mail"><a href="#">mollybr@mail.com</a></p>
	                                        </div>
	                                        <div class="tbl-cell tbl-cell-status">Assistan</div>
	                                    </div>
	                                </div>
	                            </article>
	                            <article class="contact-row">
	                                <div class="user-card-row">
	                                    <div class="tbl-row">
	                                        <div class="tbl-cell tbl-cell-photo">
	                                            <a href="#">
	                                                <img src="img/photo-64-4.jpg" alt="">
	                                            </a>
	                                        </div>
	                                        <div class="tbl-cell">
	                                            <p class="user-card-row-name"><a href="#">Maggy Smith</a></p>
	                                            <p class="user-card-row-mail"><a href="#">maggysmith@mail.com</a></p>
	                                        </div>
	                                        <div class="tbl-cell tbl-cell-status">PR Manager</div>
	                                    </div>
	                                </div>
	                            </article>
	                            <article class="contact-row">
	                                <div class="user-card-row">
	                                    <div class="tbl-row">
	                                        <div class="tbl-cell tbl-cell-photo">
	                                            <a href="#">
	                                                <img src="img/photo-64-2.jpg" alt="">
	                                            </a>
	                                        </div>
	                                        <div class="tbl-cell">
	                                            <p class="user-card-row-name"><a href="#">Tim Collins</a></p>
	                                            <p class="user-card-row-mail"><a href="#">timcolins@mail.com</a></p>
	                                        </div>
	                                        <div class="tbl-cell tbl-cell-status">Director at Tony’s</div>
	                                    </div>
	                                </div>
	                            </article>
	                            <article class="contact-row">
	                                <div class="user-card-row">
	                                    <div class="tbl-row">
	                                        <div class="tbl-cell tbl-cell-photo">
	                                            <a href="#">
	                                                <img src="img/photo-64-1.jpg" alt="">
	                                            </a>
	                                        </div>
	                                        <div class="tbl-cell">
	                                            <p class="user-card-row-name"><a href="#">Maggy Smith</a></p>
	                                            <p class="user-card-row-mail"><a href="#">maggysmith@mail.com</a></p>
	                                        </div>
	                                        <div class="tbl-cell tbl-cell-status">PR Manager</div>
	                                    </div>
	                                </div>
	                            </article>
	                            <article class="contact-row">
	                                <div class="user-card-row">
	                                    <div class="tbl-row">
	                                        <div class="tbl-cell tbl-cell-photo">
	                                            <a href="#">
	                                                <img src="img/photo-64-3.jpg" alt="">
	                                            </a>
	                                        </div>
	                                        <div class="tbl-cell">
	                                            <p class="user-card-row-name"><a href="#">Molly Bridjet</a></p>
	                                            <p class="user-card-row-mail"><a href="#">mollybr@mail.com</a></p>
	                                        </div>
	                                        <div class="tbl-cell tbl-cell-status">Assistan</div>
	                                    </div>
	                                </div>
	                            </article>
	                            <article class="contact-row">
	                                <div class="user-card-row">
	                                    <div class="tbl-row">
	                                        <div class="tbl-cell tbl-cell-photo">
	                                            <a href="#">
	                                                <img src="img/photo-64-4.jpg" alt="">
	                                            </a>
	                                        </div>
	                                        <div class="tbl-cell">
	                                            <p class="user-card-row-name"><a href="#">Maggy Smith</a></p>
	                                            <p class="user-card-row-mail"><a href="#">maggysmith@mail.com</a></p>
	                                        </div>
	                                        <div class="tbl-cell tbl-cell-status">PR Manager</div>
	                                    </div>
	                                </div>
	                            </article>
	                        </div>
	                    </div><!--.box-typical-body-->
	                </section><!--.box-typical-dashboard-->
	            </div><!--.col-->
	        </div>
	    </div><!--.container-fluid-->
	</div><!--.page-content-->
</body>
</html>



					