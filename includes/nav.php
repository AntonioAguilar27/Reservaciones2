<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<div>
		<header class="site-header custom-bg">
			<div class="container-fluid ">
		
				<a href="landin.php" class="site-logo">
					<div class="custom-bg">
					<img src="./img/logo.png" alt="logo empresa">
					</div>
				</a>		
				<button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
					<span>toggle menu</span>
				</button>
				<button class="hamburger hamburger--htla">
					<span>toggle menu</span>
				</button>
				<div class="site-header-content">
					<div class="site-header-content-in">
						<div class="site-header-shown">
							<div class="dropdown user-menu">
								<button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									<img src="img/avatar-2-64.png" alt="">
									<?php
									$nombre = $_SESSION['usuario']['nombre'];
									$apellido = $_SESSION['usuario']['apellido'];
									echo $nombre;
									echo " ";
									echo $apellido;
									?> 
								</button>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
									<a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-cog"></span>Settings</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="./includes/cerrar.php"><span class="font-icon glyphicon glyphicon-log-out"></span>Logout</a>
								</div>
							</div>
					
						</div><!--.site-header-shown-->
		
						<div class="mobile-menu-right-overlay"></div>
						<div class="site-header-collapsed">
							<div class="site-header-collapsed-in">
								<div class="dropdown dropdown-typical">
									
								</div>
							</div><!--.site-header-collapsed-in-->
						</div><!--.site-header-collapsed-->
					</div><!--site-header-content-in-->
				</div><!--.site-header-content-->
			</div><!--.container-fluid-->
		</header><!--.site-header-->
		
		<div class="mobile-menu-left-overlay"></div>
		<nav class="side-menu">
			<section>
				<ul class="side-menu-list">
					<li>
						<a href="reservaciones.php" id="boton">
							<i class="tag-color red"></i>
							<span class="lbl">Reservaciones</span>
						</a>
					</li>
					<li>
						<a href="hacer_reservacion.php">
							<i class="tag-color red"></i>
							<span class="lbl">Nueva reservación</span>
						</a>
					</li>
					<li>
						<a href="registro-usuario.php" id="boton">
							<i class="tag-color red"></i>
							<span class="lbl">Registrar usuario</span>
						</a>
					</li>
				</ul>
			</section>
		</nav><!--.side-menu-->
		<script src="js/lib/jquery/jquery.min.js"></script>
		<script src="js/lib/tether/tether.min.js"></script>
	    <script src="js/lib/bootstrap/bootstrap.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
	</div>