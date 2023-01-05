<?php
    require_once '../../app/conexion.php';
    $conexion = conexion_xzunun_gestor_evidencias();
    $numero_control = strtolower($_POST['numero_control']);
    $carrera = strtolower($_POST['carrera']);
    $nombres = strtolower($_POST['nombres']);
    $apellido_paterno = strtolower($_POST['apellido_paterno']);
    $apellido_materno = strtolower($_POST['apellido_materno']);
    $fecha_nacimiento = strtolower($_POST['fecha_nacimiento']);
    $sexo = strtolower($_POST['sexo']);
    $email_institucional = strtolower($_POST['email_institucional']);
    $contrasenia = sha1($_POST['contrasenia']);
    $foto_perfil = 'raw/img/usuario-defecto.jpg';
    $sql = 'INSERT INTO tabla_alumnos(numero_control, carrera, nombres, apellido_paterno, apellido_materno, fecha_nacimiento, sexo, email_institucional, contrasenia, foto_perfil) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
    $consulta = $conexion->prepare($sql);
    $consulta->bind_param('ssssssssss', $numero_control, $carrera, $nombres, $apellido_paterno, $apellido_materno, $fecha_nacimiento, $sexo, $email_institucional, $contrasenia, $foto_perfil);
    $consulta_ejecutada = $consulta->execute();
    echo $consulta_ejecutada;
    $conexion->close();
?>