<?php
    require_once '../../app/conexion.php';
    $conexion = conexion_xzunun_gestor_evidencias();
    $clave_materia = strtolower($_POST['clave_materia']);
    $sql = "SELECT DISTINCT tabla_profesores.clave, tabla_profesores.nombres, tabla_profesores.apellido_paterno, tabla_profesores.apellido_materno FROM tabla_profesores INNER JOIN tabla_materias_profesores ON tabla_profesores.clave = tabla_materias_profesores.clave_profesor WHERE clave_materia = '$clave_materia'";
    $consulta_consultada = $conexion->query($sql);
    $datos = mysqli_fetch_all($consulta_consultada);
    if($datos != null) {
        echo json_encode($datos);
    } else {
        echo 0;
    }
    $conexion->close();
?>