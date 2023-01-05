<?php
    require_once '../../app/conexion.php';
    $conexion = conexion_xzunun_gestor_evidencias();
    $clave_materia = $_POST['clave_materia'];
    $ciclo = $_POST['ciclo'];
    $clave_profesor = $_POST['clave_profesor'];
    $sql = "SELECT DISTINCT tabla_materias_profesores.grupo, tabla_materias.nombre FROM tabla_materias_profesores INNER JOIN tabla_materias ON tabla_materias_profesores.clave_materia = tabla_materias.clave WHERE tabla_materias_profesores.clave_profesor = '$clave_profesor' AND tabla_materias_profesores.ciclo = '$ciclo' AND tabla_materias_profesores.clave_materia = '$clave_materia'";
    $consulta_consultada = $conexion->query($sql);
    $datos = mysqli_fetch_all($consulta_consultada);
    if($datos != null) {
        echo json_encode($datos);
    } else {
        echo 0;
    }
    $conexion->close();
?>