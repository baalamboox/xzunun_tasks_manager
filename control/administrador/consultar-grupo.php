<?php
    require_once '../../app/conexion.php';
    $conexion = conexion_xzunun_gestor_evidencias();
    $clave_profesor = strtolower($_POST['clave_profesor']);
    $sql = "SELECT DISTINCT grupo FROM tabla_materias_profesores WHERE clave_profesor = '$clave_profesor'";
    $consulta_consultada = $conexion->query($sql);
    $datos = mysqli_fetch_all($consulta_consultada);
    if($datos != null) {
        echo json_encode($datos);
    } else {
        echo 0;
    }
    $conexion->close();
?>