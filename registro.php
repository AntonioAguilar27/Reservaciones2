<?php  

if(isset($_POST['submit'])){
    // CONEXION A LA BD
    require_once 'includes/conexion.php';


    // INICIAR SESION
    session_start();
    // recoger los valores del formulario
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false ;
    $apellido = isset($_POST['apellidos']) ? $_POST['apellido'] : false ;
    $numper = isset($_POST['numper']) ? $_POST['numper'] : false ;
    $numtel = isset($_POST['numtel']) ? $_POST['numtel'] : false ;
    $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : false ;
    $seleccion = isset($_POST['cumpl']) ? $_POST['cumpl'] : false;
    $comentarios = isset($_POST['textarea']) ? $_POST['textarea'] : false;

    
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
    if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
        $apellido_validado = true;
    } else {
        $apellido_validado = false;
        $errores['apellidos'] = "El apellido es invalido";
    }
    

    // registro 

    $guardar_usuario = false;
    
    if(count($errores) ==0){
        $guardar_usuario = true;

        // cifrar la contraseña
        $opciones = ['cost' => 12,];
        $password_segura= password_hash($password, PASSWORD_BCRYPT, $opciones);

        // INSERTAR USUARIO EN LA TABLA USUARIOS
        $sql = "INSERT INTO  usuarios VALUES (null, '$nombre', '$apellidos', '$email', '$password_segura', CURDATE());"; 
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
header("Location: includes/inicio.php");
?>