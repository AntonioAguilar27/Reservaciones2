<?php 

function mostrarError ($errores, $campo){
    $alerta = '';
    if(isset($errores[$campo]) && !empty($campo)){
        $alerta = "<div class='alert alert-danger'>$errores[$campo]</div>";
    }
    return $alerta;
}

function borrarErrores() {
	$borrado = false;
	if (isset($_SESSION['errores'])) {
		$_SESSION['errores'] = null;	
		unset($_SESSION['errores']);
	}
	if (isset($_SESSION['completado'])) {
		$_SESSION['completado'] = null;
		unset($_SESSION['completado']);
	}
	return $borrado;
}

function conseguirCategorias($conexion){
	$sql = "SELECT * FROM categorias ORDER BY id ASC;";  
	$categorias = mysqli_query($conexion, $sql);
	
	$result = array();
	if ($categorias && mysqli_num_rows($categorias) >= 1) {
		$result = $categorias;
	}

	return $result;
}


function totalReservaciones($db){
    $sql = "SELECT COUNT(*) FROM reserva WHERE fecha = CURDATE();";
    $suma_reservas = mysqli_query($db, $sql);

    $resultado = array();
    if ($suma_reservas && mysqli_num_rows($suma_reservas) >= 1){
        $resultado = $suma_reservas;
    }
    return $suma_reservas;
}

function calcularCumpleaneros($db){
	$sql = "SELECT COUNT(*) FROM  reserva WHERE cumpl = true and fecha = CURDATE();";
	$total_cumpleaneros = mysqli_query($db, $sql);

	$resultado = array();
    if ($total_cumpleaneros && mysqli_num_rows($total_cumpleaneros) >= 1){
        $resultado = $total_cumpleaneros;
    }
    return $total_cumpleaneros;
}

function calcularColab($db){
	$sql = "SELECT COUNT(*) FROM  reserva WHERE colab = true and fecha = CURDATE();";
	$total_colab = mysqli_query($db, $sql);

	$resultado = array();
    if ($total_colab && mysqli_num_rows($total_colab) >= 1){
        $resultado = $total_colab;
    }
    return $total_colab;
}

function conseguirUltimasReservas($conexion) {
    $sql = "SELECT r.nombre, r.apellido, r.numper, DATE_FORMAT(r.fecha, '%d/%m/%Y') AS fecha_formateada, r.cumpl, r.colab, u.nombre AS nombre_usuario, u.apellido AS apellido_usuario, DATE_FORMAT(r.fecha_registro, '%d/%m/%Y %H:%i:%s') AS fecha_creacion_formateada
        FROM reserva r
        JOIN usuarios u ON r.id_usuario = u.id
        ORDER BY r.id DESC LIMIT 4";
    $reservas = mysqli_query($conexion, $sql);

    $resultado = array();
    if ($reservas && mysqli_num_rows($reservas) >= 1) {
        $resultado = $reservas;
    }
    return $resultado;
}

