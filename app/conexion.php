<?php
    function conexion_xzunun_gestor_evidencias() {
        $conexion = new mysqli('localhost', 'root', '', 'xzunun_gestor_evidencias');
        if($conexion->connect_errno) {
            echo 'Error de conexión: ' . $conexion->connect_error;
        } else {
            $conexion->set_charset('utf8');
            return $conexion;
        }
    }
?>