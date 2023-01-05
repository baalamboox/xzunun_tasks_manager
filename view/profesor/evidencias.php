<?php
    session_start();
    require_once '../../app/conexion.php';
    $conexion = conexion_xzunun_gestor_evidencias();
    $usuario = $_SESSION['usuario'];
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
    $sql = "SELECT clave FROM tabla_profesores WHERE email_institucional = '$usuario'";
    $consulta_consultada = $conexion->query($sql);
    $clave_profesor = mysqli_fetch_assoc($consulta_consultada);
?>
<div id="vista_evidencias">
    <div class="container efecto_blur rounded p-4">
        <div class="row">
            <div class="col-lg-12">
                <form>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <h3>Evidencias</h3>
                                <hr class="my-4 borde_hr">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="text" id="clave_profesor" value="<?php echo $clave_profesor['clave'];?>" readonly hidden>
                                <input type="text" id="nombre_materia" readonly hidden>
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
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="semestre">Semestre:</label>
                                    <input type="number" class="form-control form-control-sm rounded-pill" id="semestre" min="<?php echo $min;?>" max="<?php echo $max;?>" step="<?php echo $step;?>" placeholder="Ingresar semestre">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="ciclo">Ciclo:</label>
                                    <input type="text" class="form-control form-control-sm rounded-pill" id="ciclo" name="ciclo" value="<?php echo strtoupper($datos['ciclo']);?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="vista_materia_grupo">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="materia">Materia:</label>
                                    <select class="form-control form-control-sm rounded-pill" id="materia" name="materia" ></select>
                                </div>
                            </div>
                            <div class="col-lg-3" id="vista_grupo">
                                <div class="form-group">
                                    <label for="grupo">Grupo:</label>
                                    <select class="form-control form-control-sm rounded-pill" id="grupo" name="grupo" ></select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-12 text-right">
                                <div class="btn-group">
                                    <span class="btn btn-sm rounded-pill mr-2 boton_personalizado" id="boton_siguiente">Siguiente<i class="fas fa-arrow-right ml-2"></i></span>
                                    <span class="btn btn-sm rounded-pill mr-2 boton_personalizado" id="boton_cancelar"><i class="fas fa-times-circle mr-2"></i>Cancelar</span>
                                    <span class="btn btn-sm rounded-pill mr-2 boton_personalizado" id="boton_generar_zip"><i class="fas fa-file-archive mr-2"></i>Generar ZIP</span>
                                    <a href="#" id="link_descargar_zip">
                                        <span class="btn btn-sm rounded-pill mr-2 boton_personalizado" ><i class="fas fa-download mr-2"></i>Descargar ZIP</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="../../manager/profesor/evidencias.js"></script>