<?php
    require_once '../../app/conexion.php';
    $conexion = conexion_xzunun_gestor_evidencias();
    $clave_profesor = strtolower($_POST['clave']);
    $clave_materia = strtolower($_POST['materia']);
    $grupo = strtolower($_POST['grupo']);
    $ciclo = strtolower($_POST['ciclo']);
    $sql = 'INSERT INTO tabla_materias_profesores(clave_profesor, clave_materia, grupo, ciclo) VALUES (?, ?, ?, ?)';
    $consulta = $conexion->prepare($sql);
    $consulta->bind_param('ssss', $clave_profesor, $clave_materia, $grupo, $ciclo);
    $consulta_ejecutada = $consulta->execute();
    echo $consulta_ejecutada;
    $conexion->close();
?>