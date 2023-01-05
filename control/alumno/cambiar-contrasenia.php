<?php
    session_start();
    require_once '../../app/conexion.php';
    $usuario = $_SESSION['usuario'];
    $conexion = conexion_xzunun_gestor_evidencias();
    $nueva_contrasenia = sha1($_POST['nueva_contrasenia']);
    $sql = "UPDATE tabla_alumnos SET contrasenia = ? WHERE email_institucional = ?";
    $consulta = $conexion->prepare($sql);
    $consulta->bind_param('ss', $nueva_contrasenia, $usuario);
    $consulta_ejecutada = $consulta->execute();
    echo $consulta_ejecutada;
    $conexion->close();
?>