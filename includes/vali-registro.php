<?php  

if(isset($_POST['submit'])){
    // CONEXION A LA BD
    require_once './conexion.php';

    // INICIAR SESION
    // recoger los valores del formulario
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false ;
    $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : false ;
    $numtel = isset($_POST['numtel']) ? $_POST['numtel'] : false ;
    $email = isset($_POST['email']) ? $_POST['email'] : false ;
    $password = isset($_POST['password']) ? $_POST['password'] : false ;
    $admin = isset($_POST['admin']) ? 1 : 0; // Si está marcado, asigna 1, de lo contrario, 0
    $rp = isset($_POST['rp']) ? 1 : 0; // Si está marcado, asigna 1, de lo contrario, 0
    $activo = 1;


    // array errores 

    $errores = array();

    // validar los datos del formulario

    // VALIDAR NOMBRE
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
        $nombre_validado = true;
    } else {
        $nombre_validado = false;
        $errores['nombre'] = "El nombre es invalido";
    }
    // VALIDAR APELLIDO

    if(!empty($apellido) && !is_numeric($apellido) && !preg_match("/[0-9]/", $apellido)){
        $apellido_validado = true;
    } else {
        $apellido_validado = false;
        $errores['apellidos'] = "El apellido es invalido";
    }
    // VALIDAR CORREO 

    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_validado = true;
    } else {
        $email_validado = false;
        $errores['email'] = "El email es invalido";
    }

    // VALIDAR NUMERO DE TELEFONO
    if (empty($numtel)) {
        $telefono_validado = false;
        $errores['numtel'] = "El telefono esta vacio!";
    } elseif (!preg_match('/^\d{10}$/', $numtel)) {
        $telefono_validado = false;
        $errores['numtel'] = "el telefono debe de tener 10 digitos!!";
    } else {
        $telefono_validado = true;
    }

    // VALIDAR PASSWORD 

    if(!empty($password)){
        $password_validado = true;
    } else {
        $password_validado = false;
        $errores['password'] = "El password es invalido";
    }



    // registro 
    var_dump($errores);

    $guardar_usuario = false;
    
    if(count($errores) ==0){
        $guardar_usuario = true;


       

        // INSERTAR USUARIO EN LA TABLA USUARIOS
        $sql = "INSERT INTO usuarios (nombre, apellido, telefono, correo, password, activo, admin, rp) VALUES ('$nombre', '$apellido', '$numtel', '$email', '$password', '$activo', '$admin', '$rp')"; 
        $guardar = mysqli_query($db, $sql);

        if($guardar){
            $_SESSION['completado'] = "El registro se ha completado con éxito";
        }else {
            // error 1060 = entrada duplicada
            if(mysqli_errno($db) == 1062){
                $_SESSION['errores']['duplicado'] = "Ya existe un usuario con ese email";
            }else{           
                $_SESSION['errores']['general'] = "Fallo al guardar el usuario!!";
            }
        }
    } else {
          $_SESSION['errores'] = $errores;
    }
}
header("Location: ../registro-usuario.php");
?>