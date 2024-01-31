<?php require_once './includes/conexion.php'; ?>
<?php require_once './includes/helpers.php'; ?>

<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Reservaciones Consentida</title>

	<link href="img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
	<link href="img/favicon.png" rel="icon" type="image/png">
	<link href="img/favicon.ico" rel="shortcut icon">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
<link rel="stylesheet" href="css/separate/pages/login.min.css">
    <link rel="stylesheet" href="css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="css/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="page-center custom-bg">
        <div class="page-center-in">
            <div class="container-fluid margin-b">
                <div class="sign-avatar text-center">
                    <img src="img/logo.png" alt="">
                </div>
            </div>
                <div class="container-fluid">
                    <form class="sign-box" action="./registro.php" method="POST">
                        <header class="sign-title">Ingresa los datos de la reservación</header>
                        <div class="form-group">
                            <label for="form-group">Nombre</label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="nombre"/>
                        </div>
                        <div class="form-group">
                            <label for="form-group">Apellido</label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="apellido"/>
                        </div>
                        <div class="form-group">
                            <label for="form-group">Numero de personas</label>
                        </div>
                        <div class="form-group">
                            <input type="number" id="numero" name="numper" step="1" value="0" class="form-control" placeholder="Numero de personas">
                        </div>
                        <div class="form-group">
                            <label for="pwd" class="form-label">Numero de telefono</label>
                            <input type="password" class="form-control" id="pwd" name="numtel">
                        </div>
                        <div class="form-group">
                            <label for="form-group">Fecha reservación</label>
                        </div>
                        <div class="form-group">
                            <input type="date" id="fecha" name="fecha" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="form-group">¿Cumpleañero?</label>
                        </div>
                        <div class="form-group">
                            <select name="seleccion" id="cumpl" class="form-control" name="cumpl">
                                <option value="defecto">Selecciona una opción</option>
                                <option value="si">Si</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1" class="form-label mt-2">Comentarios</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="textarea"></textarea>
                        </div>
                        <button type="submit" class="btn btn-rounded">Enviar</button>
                    </form>
                </div>
        </div>
    </div><!--.page-center-->


<script src="js/lib/jquery/jquery.min.js"></script>
<script src="js/lib/tether/tether.min.js"></script>
<script src="js/lib/bootstrap/bootstrap.min.js"></script>
<script src="js/plugins.js"></script>
    <script type="text/javascript" src="js/lib/match-height/jquery.matchHeight.min.js"></script>
    <script>
        $(function() {
            $('.page-center').matchHeight({
                target: $('html')
            });

            $(window).resize(function(){
                setTimeout(function(){
                    $('.page-center').matchHeight({ remove: true });
                    $('.page-center').matchHeight({
                        target: $('html')
                    });
                },100);
            });
        });
    </script>
<script src="js/app.js"></script>
</body>
</html>


<!-- <button type="submit" class="btn btn-rounded">Sign in</button>
                        <p class="sign-note">New to our website? <a href="Registro.php">Sign up</a></p> -->


<!-- <div class="form-group">
                            <div class="checkbox float-left">
                                <input type="checkbox" id="signed-in"/>
                                <label for="signed-in">Keep me signed in</label>
                            </div>
                            <div class="float-right reset">
                                <a href="reset-password.html">Reset Password</a>
                            </div>
                        </div> -->