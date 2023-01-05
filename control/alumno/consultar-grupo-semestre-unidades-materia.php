<?php
    require_once '../../app/conexion.php';
    $conexion = conexion_xzunun_gestor_evidencias();
    $numero_control = $_POST['numero_control'];
    $clave_materia = $_POST['clave_materia'];
    $sql = "SELECT DISTINCT tabla_alumnos_profesores.grupo_profesor, tabla_alumnos_profesores.semestre_materia, tabla_materias.nombre, tabla_materias.unidades FROM (tabla_alumnos_profesores INNER JOIN tabla_materias_profesores ON tabla_alumnos_profesores.clave_profesor = tabla_materias_profesores.clave_profesor) INNER JOIN tabla_materias ON tabla_materias_profesores.clave_materia = tabla_materias.clave WHERE tabla_alumnos_profesores.numero_control_alumno = '$numero_control' AND tabla_materias_profesores.clave_materia = '$clave_materia'";
    $consulta_consultada = $conexion->query($sql);
    $datos = mysqli_fetch_assoc($consulta_consultada);
    if($datos != null) {
        echo json_encode($datos);
    } else {
        echo 0;
    }
    $conexion->close();
?>