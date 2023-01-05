<?php
    session_start();
    require_once '../../app/conexion.php';
    $conexion = conexion_xzunun_gestor_evidencias();
    $usuario = strtolower($_POST['usuario']);
    $sql = "SELECT email_institucional, contrasenia, foto_perfil FROM tabla_alumnos WHERE email_institucional = '$usuario'";
    $consulta_consultada = $conexion->query($sql);
    $datos = mysqli_fetch_assoc($consulta_consultada);
    if($datos != null) {
        if($datos['email_institucional'] == $usuario) {
            $_SESSION['usuario'] = $datos['email_institucional'];
            echo json_encode($datos);
        }
    } else {
        session_destroy();
        echo 0;
    }
    $conexion->close();
?>