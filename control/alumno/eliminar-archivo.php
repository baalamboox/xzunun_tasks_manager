<?php
    require_once '../../app/conexion.php';
    $conexion = conexion_xzunun_gestor_evidencias();
    $id_archivo = $_POST['id_archivo'];
    $ruta_archivo = $_POST['ruta_archivo'];
    $sql = "DELETE FROM tabla_archivos WHERE id = '$id_archivo'";
    $consulta_consultada = $conexion->query($sql);
    if($consulta_consultada == 1) {
        echo unlink($ruta_archivo);
    } else {
        echo 0;
    }
?>