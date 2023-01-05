<?php
    require_once '../../app/conexion.php';
    $conexion = conexion_xzunun_gestor_evidencias();
    $clave = $_POST['clave'];
    $sql = "SELECT email_institucional FROM tabla_profesores WHERE clave = '$clave'";
    $consulta_consultada = $conexion->query($sql);
    $datos = mysqli_fetch_assoc($consulta_consultada);
    if($datos != null) {
        echo json_encode($datos);
    } else {
        echo 0;
    }
    $conexion->close();
?>