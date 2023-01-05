<?php
    $carrera = str_replace(' ', '_', $_POST['carrera']);
    $semestre = $_POST['semestre'];
    $ciclo = strtolower($_POST['ciclo']);
    $nombre_materias = str_replace(' ', '_', $_POST['nombre_materia']);
    $grupo = strtolower($_POST['grupo']);
    $ruta_archivos = '../../files/evidencias/' . $carrera . '/' . $semestre . '_' . $ciclo . '/' . $nombre_materias . '/' . $grupo . '/';
    $nombre_zip = '../../zips/' . $nombre_materias . '-' . $semestre . '_' . $ciclo .'.zip';
    $zip = new ZipArchive();
    if(is_dir($ruta_archivos)) {
        if($gestor_1 = opendir($ruta_archivos)) {
            while(($entrada_1 = readdir($gestor_1)) != false) {
                if($entrada_1 != '.' && $entrada_1 != '..') {
                    if($gestor_2 = opendir($ruta_archivos . $entrada_1 . '/')) {
                        while(($entrada_2 = readdir($gestor_2)) != false) {
                            if($entrada_2 != '.' && $entrada_2 != '..') {
                                if($gestor_3 = opendir($ruta_archivos . $entrada_1 . '/' . $entrada_2 . '/')) {
                                    while(($entrada_3 = readdir($gestor_3)) != false) {
                                        if($entrada_3 != '.' && $entrada_3 != '..') {
                                            if($zip->open($nombre_zip, ZipArchive::CREATE)!==TRUE) {
                                                exit("cannot open <$nombre_zip>\n");
                                            }
                                            $zip->addFile($ruta_archivos . $entrada_1 . '/' . $entrada_2 . '/' . $entrada_3);
                                        }
                                    }
                                    closedir($gestor_3);
                                }

                            }
                        }
                        closedir($gestor_2);
                    }
                }
            }
            closedir($gestor_1);
            $zip->close();
        } else {
            echo 0;
        }
    } else {
        echo 0;
    }
    echo $nombre_zip;
?>
