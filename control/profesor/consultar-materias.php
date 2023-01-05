<?php
    require_once '../../app/conexion.php';
    $conexion = conexion_xzunun_gestor_evidencias();
    $carrera = $_POST['carrera'];
    $semestre = $_POST['semestre'];
    $ciclo = $_POST['ciclo'];
    $clave_profesor = $_POST['clave_profesor'];
    $sql = "SELECT DISTINCT tabla_materias.clave, tabla_materias.nombre FROM tabla_materias INNER JOIN tabla_materias_profesores ON tabla_materias.clave = tabla_materias_profesores.clave_materia WHERE tabla_materias.carrera = '$carrera' AND tabla_materias.semestre = $semestre AND tabla_materias_profesores.clave_profesor = '$clave_profesor' AND tabla_materias_profesores.ciclo = '$ciclo'";
    $consulta_consultada = $conexion->query($sql);
    $datos = mysqli_fetch_all($consulta_consultada);
    if($datos != null) {
        echo json_encode($datos);
    } else {
        echo 0;
    }
    $conexion->close();
?>
