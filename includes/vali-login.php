<?php
// iniciar la sesion y la conexion a la bd 
require_once './conexion.php';

// recoger datos del formulario
if (isset($_POST)) {    // recoger datos del formulario
    $email = isset($_POST['email']) ? $_POST['email'] : false ;
    $password = isset($_POST['password']) ? $_POST['password'] : false ;

    // consulta para comprobar credenciales
    $sql = "SELECT * FROM usuarios WHERE correo = '$email'";
    $login = mysqli_query($db, $sql);



    if ($login && mysqli_num_rows($login) == 1) {
        $usuario = mysqli_fetch_assoc($login);

        if ($password == $usuario['password']) {
            // utilizar una sesion para guardar los datos 
            $_SESSION['usuario'] = $usuario;

            if (isset($_SESSION['error_login'])) {
                unset($_SESSION['error_login']);
            }
            header('Location: ../landin.php'); // Cambiado a la página principal después de un inicio de sesión exitoso
        } else {
            // si algo falla se envía una sesión con el fallo
            $_SESSION['error_login'] = "Contraseña o correo incorrecto!.";
            header('Location: ../login.php');
        } 
    // Redirigir de nuevo a la página de inicio de sesión con mensaje de error
    } else {
            // mensaje de error 
            $_SESSION['error_login'] = "Error";
            header('Location: ../login.php');
    }
}
?>