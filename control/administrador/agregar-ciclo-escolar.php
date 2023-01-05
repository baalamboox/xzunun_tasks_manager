<?php
    require_once '../../app/conexion.php';
    $conexion = conexion_xzunun_gestor_evidencias();
    $ciclo = strtolower($_POST['ciclo']);
    $sql = 'UPDATE tabla_ciclos SET estado = false WHERE estado = true';    
    $consulta_consultada = $conexion->query($sql);
    if($consulta_consultada == 1) {
        $sql = "INSERT INTO tabla_ciclos(ciclo, estado) values (?, true)";
        $consulta = $conexion->prepare($sql);
        $consulta->bind_param('s', $ciclo);
        $consulta_ejecutada = $consulta->execute();
        echo $consulta_ejecutada;
        $conexion->close();
    } else {
        echo 0;
    }
?>