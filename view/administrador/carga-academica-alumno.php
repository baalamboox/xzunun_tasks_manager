<?php
    require_once '../../app/conexion.php';
    $conexion = conexion_xzunun_gestor_evidencias();
    $min = 0;
    $max = 0;
    $step = 0;
    $sql = "SELECT ciclo FROM tabla_ciclos WHERE estado = 1";
    $consulta_consultada = $conexion->query($sql);
    $datos = mysqli_fetch_assoc($consulta_consultada);
    if(substr($datos['ciclo'], strlen($datos['ciclo']) - 1) == 'a') {
        $min = 1;
        $max = 9;
        $step = 2;
    } else {
        $min = 2;
        $max = 8;
        $step = 2;
    }
?>
<div id="vista_carga_academica_alumno">
    <div class="container efecto_blur rounded p-4">
        <div class="row">
            <div class="col-lg-12">
                <form>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <h3>Carga académica alumno</h3>
                                <hr class="my-4 borde_hr">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="numero_control">Número de control:</label>
                                    <input type="text" class="form-control form-control-sm rounded-pill" id="numero_control" name="numero_control" placeholder="Ingresar número de control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="carrera">Carrera:</label>
                                    <select class="form-control form-control-sm rounded-pill" id="carrera" name="carrera">
                                        <option value="sc">Selecionar carrera</option>
                                        <option value="ingeniería en sistemas computacionales">Ingeniería en sistemas computacionales</option>
                                        <option value="ingeniería en gestión empresarial">Ingeniería en gestión empresarial</option>
                                        <option value="ingeniería industrial">Ingeniería industrial</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="ciclo">Ciclo:</label>
                                    <input type="text" class="form-control form-control-sm rounded-pill" id="ciclo" name="ciclo" value="<?php echo strtoupper($datos['ciclo']);?>" readonly>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label for="semestre">Semestre:</label>
                                <input type="number" class="form-control form-control-sm rounded-pill" id="semestre" min="<?php echo $min;?>" max="<?php echo $max;?>" step="<?php echo $step;?>" placeholder="Ingresar semestre">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 text-right" id="boton_siguiente">
                                <span class="btn btn-sm mt-4 rounded-pill boton_personalizado">Siguiente<i class="fas fa-arrow-right ml-2"></i></span>
                            </div>
                        </div>
                        <div class="row mt-3" id="vista_materia_profesor_grupo_ciclo">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="materia">Materia:</label>
                                    <select  class="form-control form-control-sm rounded-pill" id="materia" name="materia"></select>
                                </div>
                            </div>
                            <div class="col-lg-4" id="vista_profesor">
                                <div class="form-group">
                                    <label for="profesor">Profesor:</label>
                                    <select class="form-control form-control-sm rounded-pill" id="profesor" name="profesor"></select>
                                </div>
                            </div>
                            <div class="col-lg-3" id="vista_grupo">
                                <div class="form-group">
                                    <label for="grupo">Grupo:</label>
                                    <select class="form-control form-control-sm rounded-pill" id="grupo" name="grupo"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4" id="vista_boton_cancelar_registrar">
                            <div class="col-lg-12 text-right">
                                <div class="btn-group">
                                    <span class="btn btn-sm rounded-pill mr-2 boton_personalizado" id="boton_cancelar"><i class="fas fa-times-circle mr-2"></i>Cancelar</span>
                                    <span class="btn btn-sm rounded-pill boton_personalizado" id="boton_agregar_materia"><i class="fas fa-save mr-2"></i>Agregar materia</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="../../manager/administrador/carga-academica-alumno.js"></script>