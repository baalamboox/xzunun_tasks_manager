<?php
    require_once '../../app/conexion.php';
    $conexion = conexion_xzunun_gestor_evidencias();
    $carrera = $_POST['carrera'];
    $semestre = $_POST['semestre'];
    $ciclo = $_POST['ciclo'];
    $nombre_materia = $_POST['nombre_materia'];
    $grupo = $_POST['grupo'];
    $unidad = $_POST['unidad'];
    $numero_control = $_POST['numero_control'];
    mkdir('../../files/evidencias/' . str_replace(' ',  '_', $carrera) . '/' . $semestre . '_' . $ciclo . '/' . str_replace(' ', '_', $nombre_materia) . '/' . $grupo . '/unidad_'. $unidad . '/' . $numero_control . '/' , 0777, true);
    $direccion_guardar = '../../files/evidencias/' . str_replace(' ',  '_', $carrera) . '/' . $semestre . '_' . $ciclo . '/' . str_replace(' ', '_', $nombre_materia) . '/' . $grupo . '/unidad_'. $unidad . '/' . $numero_control . '/'; 
    $direccion_archivo = $direccion_guardar . basename($_FILES['archivo']['name']);
    $direccion_archivo_bd = '../../files/evidencias/' . str_replace(' ',  '_', $carrera) . '/' . $semestre . '_' . $ciclo . '/' . str_replace(' ', '_', $nombre_materia) . '/' . $grupo . '/unidad_'. $unidad . '/' . $numero_control . '/' . basename($_FILES['archivo']['name']);
    move_uploaded_file($_FILES['archivo']['tmp_name'], $direccion_archivo);
    $sql = "INSERT INTO tabla_archivos(numero_control_alumno, nombre, extension, nombre_materia, unidad_materia, semestre_materia, ciclo_profesor, ruta) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $consulta = $conexion->prepare($sql);
    $consulta->bind_param('ssssiiss', $numero_control, explode('.', $_FILES['archivo']['name'])[0], explode('.', $_FILES['archivo']['name'])[1], $nombre_materia, $unidad, $semestre, $ciclo, $direccion_archivo_bd);
    $consulta_ejecutada = $consulta->execute();
    echo $consulta_ejecutada;
    $conexion->close();
?>