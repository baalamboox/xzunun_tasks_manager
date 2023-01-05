<?php
    error_reporting(E_ERROR | E_PARSE | E_NOTICE);
    session_start();
    require_once '../../app/conexion.php';
    $conexion = conexion_xzunun_gestor_evidencias();
    $usuario = $_SESSION['usuario'];
    $sql = "SELECT ciclo FROM tabla_ciclos WHERE estado = 1";
    $consulta_consultada = $conexion->query($sql);
    $ciclo = mysqli_fetch_assoc($consulta_consultada);
    $word = 0;
    $excel = 0;
    $power_point = 0;
    $pdf = 0;
    $imagenes = 0;
    $todo = 0;
    if($ciclo != null) {
        $sql = "SELECT numero_control FROM tabla_alumnos WHERE email_institucional = '$usuario'";
        $consulta_consultada = $conexion->query($sql);
        $numero_control = mysqli_fetch_assoc($consulta_consultada);
        if($numero_control != null) {
            $sql = "SELECT COUNT(extension) AS word FROM tabla_archivos WHERE extension = 'docx' AND numero_control_alumno = '" . $numero_control['numero_control'] . "'" . " AND ciclo_profesor = '" . $ciclo['ciclo'] . "'";
            $consulta_consultada = $conexion->query($sql);
            $word = mysqli_fetch_assoc($consulta_consultada);

            $sql = "SELECT COUNT(extension) AS excel FROM tabla_archivos WHERE extension = 'xlsx' AND numero_control_alumno = '" . $numero_control['numero_control'] . "'" . " AND ciclo_profesor = '" . $ciclo['ciclo'] . "'";
            $consulta_consultada = $conexion->query($sql);
            $excel = mysqli_fetch_assoc($consulta_consultada);

            $sql = "SELECT COUNT(extension) AS power_point FROM tabla_archivos WHERE extension = 'pptx' AND numero_control_alumno = '" . $numero_control['numero_control'] . "'" . " AND ciclo_profesor = '" . $ciclo['ciclo'] . "'";
            $consulta_consultada = $conexion->query($sql);
            $power_point = mysqli_fetch_assoc($consulta_consultada);

            $sql = "SELECT COUNT(extension) AS pdf FROM tabla_archivos WHERE extension = 'pdf' AND numero_control_alumno = '" . $numero_control['numero_control'] . "'" . " AND ciclo_profesor = '" . $ciclo['ciclo'] . "'";
            $consulta_consultada = $conexion->query($sql);
            $pdf = mysqli_fetch_assoc($consulta_consultada);

            $sql = "SELECT COUNT(extension) AS imagenes FROM tabla_archivos WHERE (extension = 'jpg' OR extension = 'jpeg' OR extension = 'png') AND numero_control_alumno = '" . $numero_control['numero_control'] . "'" . " AND ciclo_profesor = '" . $ciclo['ciclo'] . "'";
            $consulta_consultada = $conexion->query($sql);
            $imagenes = mysqli_fetch_assoc($consulta_consultada);

            $sql = "SELECT COUNT(extension) AS todo FROM tabla_archivos WHERE numero_control_alumno = '" . $numero_control['numero_control'] . "'" . " AND ciclo_profesor = '" . $ciclo['ciclo'] . "'";
            $consulta_consultada = $conexion->query($sql);
            $todo = mysqli_fetch_assoc($consulta_consultada);
        } else {
            echo 0;
        }
        $sql = "SELECT sexo FROM tabla_alumnos WHERE email_institucional = '$usuario'";
        $consulta_consultada = $conexion->query($sql);
        $sexo = mysqli_fetch_assoc($consulta_consultada);
    } else {
        echo 0;
    }
    $conexion->close();
?>
<div id="vista_dasboard">
    <div class="container efecto_blur rounded p-4 mb-4">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="d-none d-sm-block display-3">
                    <?php
                        if($sexo['sexo'] == 'masculino') {
                            echo '¡Bienvenido!';
                        } else if($sexo['sexo'] == 'femenino') {
                            echo '¡Bienvenida!';
                        } else {
                            echo '¡Bienvenid@';
                        }
                    ?>
                </h1>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12 text-center">
                <!-- Cuando la página carga (onload), llamamos al método cargarReloj() de JavaScript -->
                <span id="reloj" class="display-4" onload="cargar_reloj();">
                    <!-- Acá mostraremos el reloj desde JavaScript --> 
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <span class="" id="vista_fecha"></span>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12">
                <small><i class="fas fa-file mr-2"></i>Archivos más comunes</small>
                <hr class="mb-4 borde_hr">
            </div>
        </div>
        <div class="row">
                <div class="col-sm-2 text-center">
                    <small>Word</small>
                    <div><i class="fas fa-file-word display-4"></i></div>
                    <span><?php echo $word['word'];?></span>
                </div>
                <div class="col-sm-2 text-center">
                    <small>Excel</small>
                    <div><i class="fas fa-file-excel display-4"></i></div>
                    <span><?php echo $excel['excel'];?></span>
                </div>
                <div class="col-sm-2 text-center">
                    <small>PowerPoint</small>
                    <div><i class="fas fa-file-powerpoint display-4"></i></div>
                    <span><?php echo $power_point['power_point'];?></span>
                </div>
                <div class="col-sm-2 text-center">
                    <small>PDF</small>
                    <div><i class="fas fa-file-pdf display-4"></i></div>
                    <span><?php echo $pdf['pdf'];?></span>
                </div>
                <div class="col-sm-2 text-center">
                    <small>Imágenes</small>
                    <div><i class="fas fa-images display-4"></i></div>
                    <span><?php echo $imagenes['imagenes'];?></span>
                </div>
                <div class="col-sm-2 text-center">
                    <small>Todos</small>
                    <div><i class="fas fa-folder display-4"></i></div>
                    <span><?php echo $todo['todo'];?></span>
                </div>
                <!-- word excel powerpoint pdf imagenes todos -->
        </div>
        <div class="row mt-5">
            <div class="col-lg-12 text-center">
                <span>Ciclo escolar: <?php echo strtoupper($ciclo['ciclo']);?></span>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(() => {
        let fecha = new Date();
        let dia = fecha.getDate();
        let mes = fecha.getMonth() + 1; 
        let anio = fecha.getFullYear();
        if(mes < 10) {
           $('#vista_fecha').text(dia + '/' + '0' + mes + '/' + anio); 
        } else {
            $('#vista_fecha').text(dia + '/' + mes + '/' + anio);
        }
        function cargar_reloj() {
            // Haciendo uso del objeto Date() obtenemos la hora, minuto y segundo 
            let fecha_hora = new Date();
            let hora = fecha_hora.getHours(); 
            let minuto = fecha_hora.getMinutes(); 
            let segundo = fecha_hora.getSeconds(); 
            // Variable meridiano con el valor 'AM' 
            let meridiano = "AM";
            // Si la hora es igual a 0, declaramos la hora con el valor 12 
            if(hora == 0){
                hora = 12;
            }
            // Si la hora es mayor a 12, restamos la hora - 12 y mostramos la variable meridiano con el valor 'PM' 
            if(hora > 12) {
                hora = hora - 12;
                // Variable meridiano con el valor 'PM' 
                meridiano = "PM";
            }
            // Formateamos los ceros '0' del reloj 
            hora = (hora < 10) ? "0" + hora : hora;
            minuto = (minuto < 10) ? "0" + minuto : minuto;
            segundo = (segundo < 10) ? "0" + segundo : segundo;
            // Enviamos la hora a la vista HTML 
            var tiempo = hora + ":" + minuto + ":" + segundo + " " + meridiano;    
            $('#reloj').text(tiempo);
            // Cargamos el reloj a los 500 milisegundos 
            setTimeout(cargar_reloj, 500);
        }
        // Ejecutamos la función 'CargarReloj' 
        cargar_reloj();
    });
</script>
