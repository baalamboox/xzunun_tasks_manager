<?php
    error_reporting(E_ERROR | E_PARSE | E_NOTICE);
    require_once '../../app/conexion.php';
    $conexion = conexion_xzunun_gestor_evidencias();
    $sql = "SELECT ciclo FROM tabla_ciclos WHERE estado = true";
    $consulta_consultada = $conexion->query($sql);
    $ciclo = mysqli_fetch_assoc($consulta_consultada);
    if($ciclo['ciclo'] == null) {
        $ciclo['ciclo'] = 'aaaa-aaaaX';
    } else {
        $ciclo['ciclo'] = strtoupper($ciclo['ciclo']);
    }
    $conexion->close();
?>
<div id="vista_configuracion">
    <div class="container efecto_blur rounded p-4">
        <div class="row">
            <div class="col-lg-12">
                <form>
                    <div class="container">
                        <div class="row mb-4">
                            <div class="col-lg-12 text-center">
                                <h3>Agregar ciclo escolar</h3>
                                <hr class="borde_hr mt-4">
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="ciclo">Ciclo:</label>
                                    <input type="text" class="form-control form-contro-sm rounded-pill" id="ciclo" name="ciclo" value="<?php echo $ciclo['ciclo'];?>">
                                    <input type="text" id="ciclo_comparar" name="ciclo_comparar" value="<?php echo $ciclo['ciclo'];?>" hidden>
                                    <input type="checkbox" id="habilitar_edicion" name="habilitar_edicion" >
                                    <label for="habilitar_edicion"><small>Habilitar edición</small></label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-12 text-center">
                                <span class="btn btn-sm rounded-pill mr-2 boton_personalizado" id="boton_guardar"><i class="fas fa-save mr-2"></i>Guardar</span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="../../manager/administrador/agregar-ciclo-escolar.js"></script>