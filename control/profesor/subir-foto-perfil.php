<?php
    session_start();
    require_once '../../app/conexion.php';
    $conexion =  conexion_xzunun_gestor_evidencias();
    $usuario = $_SESSION['usuario'];
    mkdir('../../files/fotos-perfil/' . $usuario . '/', 0777);
    $direccion_guardar = '../../files/fotos-perfil/' . $usuario . '/';
    $direccion_archivo = $direccion_guardar . basename($_FILES['foto_perfil']['name']);
    $direccion_archivo_bd = 'files/fotos-perfil/' . $usuario . '/' . basename($_FILES['foto_perfil']['name']);
    move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $direccion_archivo);
    $sql = 'UPDATE tabla_profesores SET foto_perfil = ? WHERE email_institucional = ?';
    $consulta = $conexion->prepare($sql);
    $consulta->bind_param('ss', $direccion_archivo_bd, $usuario);
    $consulta_ejecutada = $consulta->execute();
    echo $consulta_ejecutada;
    $conexion->close();
?>