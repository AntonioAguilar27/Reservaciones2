<?php  
require_once './conexion.php';

if(isset($_POST['submit'])){
    // CONEXION A LA BD


    // INICIAR SESION
    // recoger los valores del formulario
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false ;
    $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : false ;
    $numper = isset($_POST['numper']) ? $_POST['numper'] : false ;
    $numtel = isset($_POST['numtel']) ? $_POST['numtel'] : false ;
    $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : false ;
    $cumpl = isset($_POST['cumpl']) ? 1 : 0; // Si está marcado, asigna 1, de lo contrario, 0
    $colab = isset($_POST['colab']) ? 1 : 0; // Si está marcado, asigna 1, de lo contrario, 0
    $comentarios = isset($_POST['textarea']) ? $_POST['textarea'] : false;


    // array errores 

    $errores = array();

    // validar los datos del formulario

    // VALIDAR NOMBRE
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
        $nombre_validado = true;
    } else {
        $nombre_validado = false;
        $errores['nombre'] = "El nombre es invalido!!";
    }
    //VALIDAR APELLIDO
    if(!empty($apellido) && !is_numeric($apellido) && !preg_match("/[0-9]/", $apellido)){
        $apellido_validado = true;
    } else {
        $apellido_validado = false;
        $errores['apellido'] = "El apellido es invalido!!";
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

    // registro 

    $guardar_reserva = false;

if (count($errores) == 0) {
    // Validar y sanitizar los datos si es necesario
    $nombre = mysqli_real_escape_string($db, $nombre);
    $apellido = mysqli_real_escape_string($db, $apellido);
    $numtel = mysqli_real_escape_string($db, $numtel);
    $numper = mysqli_real_escape_string($db, $numper);
    $fecha = mysqli_real_escape_string($db, $fecha);
    $cumpl = mysqli_real_escape_string($db, $cumpl);
    $colab = mysqli_real_escape_string($db, $colab);
    $comentarios = mysqli_real_escape_string($db, $comentarios);
    $id = 2;
    // Sentencia preparada para evitar inyección SQL
    
    if(!isset($_SESSION['usuario'])){
        $sql = "INSERT INTO reserva VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?,CURRENT_TIMESTAMP(),?)";
        $stmt = mysqli_prepare($db, $sql);
    } 
    if ($stmt) {
        // Enlazar parámetros
        mysqli_stmt_bind_param($stmt, "sssssssss", $nombre, $apellido, $numtel, $numper, $fecha, $cumpl, $colab, $comentarios, $id);

        // Ejecutar la sentencia
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['completado'] = "El registro se ha completado con éxito";
            $guardar_reserva = true;
        } else {
            echo "Error al ejecutar la sentencia: " . mysqli_error($db);
        }

        // Cerrar la sentencia preparada
        mysqli_stmt_close($stmt);
    } else {
        echo "Error en la preparación de la sentencia: " . mysqli_error($db);
    }
    } else {
    $_SESSION['errores'] = $errores;
    }
} else {
    var_dump("no entro primer if");
}
if(isset($_SESSION['usuario'])){
    header("Location: ../hacer_reservacion.php");
} else {
    header("Location: ../index.php");
}
?>