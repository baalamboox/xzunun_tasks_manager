<?php
    require_once '../../app/conexion.php';
    $conexion = conexion_xzunun_gestor_evidencias();
    $numero_control_alumno = strtolower($_POST['numero_control']);
    $clave_profesor = strtolower($_POST['clave_profesor']);
    $semestre_materia = strtolower($_POST['semestre_materia']);
    $grupo_profesor = strtolower($_POST['grupo_profesor']);
    $ciclo_profesor = strtolower($_POST['ciclo_profesor']);
    $sql = 'INSERT INTO tabla_alumnos_profesores(numero_control_alumno, clave_profesor, semestre_materia, grupo_profesor, ciclo_profesor) VALUES (?, ?, ?, ?, ?)';
    $consulta = $conexion->prepare($sql);
    $consulta->bind_param('ssiss', $numero_control_alumno,$clave_profesor, $semestre_materia  ,$grupo_profesor, $ciclo_profesor);
    $consulta_ejecutada = $consulta->execute();
    echo $consulta_ejecutada;
    $conexion->close();
?>