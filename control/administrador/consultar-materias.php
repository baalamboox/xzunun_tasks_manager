<?php
    require_once '../../app/conexion.php';
    $conexion = conexion_xzunun_gestor_evidencias();
    $carrera = strtolower($_POST['carrera']);
    $semestre = strtolower($_POST['semestre']);
    $sql = "SELECT clave, nombre FROM tabla_materias WHERE carrera = '$carrera' AND semestre = $semestre";
    $consulta_consultada = $conexion->query($sql);
    $datos = mysqli_fetch_all($consulta_consultada);
    if($datos != null) {
        echo json_encode($datos);
    } else {
        echo 0;
    }
    $conexion->close();
?>