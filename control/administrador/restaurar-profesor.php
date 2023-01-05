<?php
    require_once '../../app/conexion.php';
    $conexion = conexion_xzunun_gestor_evidencias();
    $clave = $_POST['clave'];
    $contrasenia = sha1($_POST['contrasenia']);
    $sql = 'UPDATE tabla_profesores SET contrasenia = ? WHERE clave = ?';
    $consulta = $conexion->prepare($sql);
    $consulta->bind_param('ss', $contrasenia, $clave);
    $consulta_ejecutada = $consulta->execute();
    echo $consulta_ejecutada;
    $conexion->close();
?>