<?php require_once './includes/conexion.php'; ?>
<?php require_once './includes/helpers.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Registro Usuario</title>

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
<body>
      <?php require_once'includes/nav.php'?>
	  <div class="page-content" >
		<div class="container-fluid">
			<div class="row ">
				<div class="col-xl-2">
				</div>
				<div class="col-xl-6">
				<header class="section-header">
					<div class="tbl">
						<div class="tbl-row">
							<div class="tbl-cell">
								<h3>Reegistrar usuario</h3>
								<ol class="breadcrumb breadcrumb-simple">
									<li><a href="landin.php">Panel principal</a></li>
									<li class="active">Registrar usuario</li>
								</ol>
							</div>
						</div>
					</div>
				</header>
				<form class="sign-box" action="./includes/registro.php" method="POST">
                        <?php if(isset($_SESSION['completado'])): ?>
                        <div class="alert alert-success">
                        <?= $_SESSION['completado']?>
                        </div>
                        <?php elseif(isset($_SESSION['errores']['general'])): ?>
                        <div class="alerta alerta-exito">
                        <?= $_SESSION['errores']['general']?>
                        </div>   
                        <?php elseif(isset($_SESSION['errores']['duplicado'])): ?>
                        <div class="alerta alerta-exito">
                        <?= $_SESSION['errores']['duplicado']?>
                        </div>       
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="form-group">Nombre</label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="nombre"/>
                            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : '' ?>
                        </div>
                        <div class="form-group">
                            <label for="form-group">Apellido</label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="apellido"/>
                            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellido') : '' ?>
                        </div>
                        <div class="form-group">
                            <label for="pwd" class="form-label">Numero de telefono</label>
                            <input type="email" class="form-control" id="pwd" name="numtel">
                            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'numtel') : '' ?>
                        </div>
						<div class="form-group">
						<label for="pwd" class="form-label">Correo</label>
                            <input type="text" class="form-control" name="apellido"/>
                            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellido') : '' ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1" class="form-label mt-2">Comentarios</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="textarea"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success" name="submit">Enviar</button>
                    </form>
                    <?php borrarErrores(); ?>
				</div>
			</div> <!-- /.row -->
		</div>
	</div>
</body>
</html>