<?php
    require_once '../../app/conexion.php';
    $conexion = conexion_xzunun_gestor_evidencias();
    $numero_control = $_POST['numero_control'];
    $contrasenia = sha1($_POST['contrasenia']);
    $sql = 'UPDATE tabla_alumnos SET contrasenia = ? WHERE numero_control = ?';
    $consulta = $conexion->prepare($sql);
    $consulta->bind_param('ss', $contrasenia, $numero_control);
    $consulta_ejecutada = $consulta->execute();
    echo $consulta_ejecutada;
    $conexion->close();
?>