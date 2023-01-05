<?php
    require_once '../../app/conexion.php';
    $conexion = conexion_xzunun_gestor_evidencias();
    $numero_control = $_POST['numero_control'];
    $sql = "SELECT email_institucional FROM tabla_alumnos WHERE numero_control = '$numero_control'";
    $consulta_consultada = $conexion->query($sql);
    $datos = mysqli_fetch_assoc($consulta_consultada);
    if($datos != null) {
        echo json_encode($datos);
    } else {
        echo 0;
    }
    $conexion->close();
?>