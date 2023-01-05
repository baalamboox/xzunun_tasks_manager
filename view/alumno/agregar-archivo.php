<?php
    session_start();
    require_once '../../app/conexion.php';
    $conexion = conexion_xzunun_gestor_evidencias();
    $usuario = $_SESSION['usuario'];
    $carrera = ''; // viene de la tabla_alumnos
    $ciclo = ''; // viene de la tabla_ciclos
    $numero_control = ''; // viene de la tabla_alumnos
    $materias = null; // viene de la tabla_materias pero en relacion a tabla_profesor y a la vez en relacion con tabla_alumnos
    $sql = "SELECT numero_control, carrera FROM tabla_alumnos WHERE email_institucional = '$usuario'";
    $consulta_consultada = $conexion->query($sql);
    $datos = mysqli_fetch_assoc($consulta_consultada);
    if($datos != null) {
        $carrera = $datos['carrera'];
        $numero_control = $datos['numero_control'];
        $sql_ciclo = 'SELECT ciclo FROM tabla_ciclos WHERE estado = 1';
        $consulta_consultada_ciclo = $conexion->query($sql_ciclo);
        $datos_ciclo = mysqli_fetch_assoc($consulta_consultada_ciclo);
        if($datos_ciclo != null) {
            $ciclo = $datos_ciclo['ciclo'];
            $sql_materias = "SELECT DISTINCT tabla_materias.clave, tabla_materias.nombre FROM (tabla_materias INNER JOIN tabla_materias_profesores ON tabla_materias.clave = tabla_materias_profesores.clave_materia) INNER JOIN tabla_alumnos_profesores ON tabla_alumnos_profesores.clave_profesor = tabla_materias_profesores.clave_profesor WHERE tabla_alumnos_profesores.numero_control_alumno = '$numero_control' AND tabla_materias.carrera = '$carrera'";
            $materias = $conexion->query($sql_materias);
        } else {
            echo 0;
        }
    } else {
        echo 0;
    }
?>
<div id="vista_agregar_archivo">
    <div class="container efecto_blur rounded p-4">
        <div class="row">
            <div class="col-lg-12">
                <form>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <h3>Agregar archivo</h3>
                                <hr class="my-4 borde_hr">
                            </div>
                        </div>
                        <div class="row justify-content-center my-4">
                            <div class="col-lg-4 text-center">
                                <span class="btn btn-sm rounded-pill boton_personalizado" id="boton_tabla_archivos"><i class="fas fa-table mr-2"></i>Ir a tabla archivos</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <form>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input type="text" id="carrera" value="<?php echo $carrera?>" hidden>
                                                    <input type="text" id="numero_control" value="<?php echo $numero_control?>" hidden>
                                                    <input type="text" id="ciclo" value="<?php echo $ciclo?>" hidden>
                                                    <input type="text" id="grupo" hidden>
                                                    <input type="text" id="semestre" hidden>
                                                    <input type="text" id="nombre_materia" hidden>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="materia">Materia:</label>
                                                    <select  class="form-control form-control-sm rounded-pill" id="materia" name="materia">
                                                        <option value="sm">Seleccionar materia:</option>
                                                        <?php
                                                            while($datos = mysqli_fetch_assoc($materias)) {
                                                        ?>
                                                            <option value="<?php echo $datos['clave'];?>"><?php echo $datos['nombre'];?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="unidad">Unidad:</label>
                                                    <input type="number" class="form-control form-control-sm rounded-pill" id="unidad" name="unidad" min="1" placeholder="Ingresar unidad">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-lg-9">
                                                <label for="archivo">Seleccionar archivo:</label>
                                                <input type="file" class="form-control-file rounded-pill bg-white" id="archivo" name="archivo" >
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-lg-12 text-right mt-4">
                                                <span class="btn btn-sm rounded-pill boton_personalizado" id="boton_subir" name="boton_subir"><i class="fas fa-upload mr-2"></i>Subir archivo</span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="../../manager/alumno/agregar-archivo.js"></script>
<!-- select tabla_materias.clave, tabla_materias.nombre, tabla_materias_profesores.grupo, tabla_alumnos_profesores.numero_control_alumno from (tabla_materias inner join tabla_materias_profesores on tabla_materias.clave = tabla_materias_profesores.clave_materia) inner join tabla_alumnos_profesores on tabla_alumnos_profesores.clave_profesor = tabla_materias_profesores.clave_profesor where tabla_alumnos_profesores.numero_control_alumno = '211190001' and tabla_materias.carrera = 'ingeniería en sistemas computacionales';  -->