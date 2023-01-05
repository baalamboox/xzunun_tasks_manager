<?php
    error_reporting(E_ERROR | E_PARSE | E_NOTICE);
    session_start();
    require_once '../../app/conexion.php';
    $usuario = $_SESSION['usuario'];
    $conexion = conexion_xzunun_gestor_evidencias();
    $sql = 'SELECT ciclo FROM tabla_ciclos WHERE estado = 1';
    $consulta_consultada = $conexion->query($sql);
    $ciclo = mysqli_fetch_assoc($consulta_consultada);
    $sql = "SELECT sexo FROM tabla_profesores WHERE email_institucional = '$usuario'";
    $consulta_consultada = $conexion->query($sql);
    $sexo = mysqli_fetch_assoc($consulta_consultada);
?>
<div id="vista_dasboard">
    <div class="container efecto_blur rounded p-4">
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
                <span class="display-4" id="reloj" onload="cargar_reloj();">
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
            <div class="col-lg-12 text-center">
                <span>
                    Ciclo escolar:
                    <?php 
                        if($ciclo['ciclo'] != null) {
                            echo strtoupper($ciclo['ciclo']); 
                        } else {
                            echo 'aaaa-aaaaX';
                        }
                    ?>
                </span>
            </div>
        </div>
    </div>
</div>
<script src="../../manager/profesor/dashboard.js"></script>