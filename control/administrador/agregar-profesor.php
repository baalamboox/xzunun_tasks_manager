<?php
    require_once '../../app/conexion.php';
    $conexion = conexion_xzunun_gestor_evidencias();
    $clave = strtolower($_POST['clave']);
    $nombres = strtolower($_POST['nombres']);
    $apellido_paterno = strtolower($_POST['apellido_paterno']);
    $apellido_materno = strtolower($_POST['apellido_materno']);
    $fecha_nacimiento = strtolower($_POST['fecha_nacimiento']);
    $sexo = strtolower($_POST['sexo']);
    $email_institucional = strtolower($_POST['email_institucional']);
    $contrasenia = sha1($_POST['contrasenia']);
    $foto_perfil = 'raw/img/usuario-defecto.jpg';
    $sql = 'INSERT INTO tabla_profesores(clave, nombres, apellido_paterno, apellido_materno, fecha_nacimiento, sexo, email_institucional, contrasenia, foto_perfil) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
    $consulta = $conexion->prepare($sql);
    $consulta->bind_param('sssssssss', $clave, $nombres, $apellido_paterno, $apellido_materno, $fecha_nacimiento, $sexo, $email_institucional, $contrasenia, $foto_perfil);
    $consulta_ejecutada = $consulta->execute();
    echo $consulta_ejecutada;
    $conexion->close();
?>