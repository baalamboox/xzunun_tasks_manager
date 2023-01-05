<?php
    session_start();
    require_once '../../app/conexion.php';
    $conexion = conexion_xzunun_gestor_evidencias();
    $usuario = $_SESSION['usuario'];
    $sql = "SELECT numero_control FROM tabla_alumnos WHERE email_institucional = '$usuario'";
    $consulta_consultada = $conexion->query($sql);
    $datos = mysqli_fetch_assoc($consulta_consultada);
    $sql = "SELECT ciclo FROM tabla_ciclos WHERE estado = 1";
    $consulta_consultada = $conexion->query($sql);
    $ciclo = mysqli_fetch_assoc($consulta_consultada)['ciclo'];
    $archivos = null;
    if($datos != null) {
        $numero_control = $datos['numero_control'];
        $sql = "SELECT id, nombre, extension, nombre_materia, unidad_materia, semestre_materia, ciclo_profesor, fecha_insercion, hora_insercion, ruta FROM tabla_archivos WHERE numero_control_alumno = '$numero_control' AND ciclo_profesor = '$ciclo'";
        $consulta_consultada = $conexion->query($sql);
        $archivos = $consulta_consultada;
    } else {
        echo 0;
    }
    $conexion->close();
?>
<div id="vista_archivos">
    <div class="container efecto_blur rounded p-4 mb-4">
        <div class="row">
            <div class="col-lg-12">
                <form>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <h3>Archivos</h3>
                                <hr class="my-4 borde_hr">
                            </div>
                        </div>
                        <div class="row justify-content-center my-4" id="vista_boton_agregar_archivo">
                            <div class="col-lg-4 text-center">
                                <span class="btn btn-sm rounded-pill boton_personalizado" id="boton_agregar_archivo"><i class="fas fa-plus-circle mr-2"></i>Agregar archivo</span>
                            </div>
                        </div>
                        <div class="row" id="vista_tabla_archivos">
                            <div class="col-lg-12">
                                <table class="table table-striped table-responsive" id="tabla_archivos">
                                    <thead>
                                        <tr>
                                            <th>Archivo</th>
                                            <th>Extensión</th>
                                            <th>Materia</th>
                                            <th>Unidad</th>
                                            <th>Semestre</th>
                                            <th>Ciclo</th>
                                            <th>Fecha</th>
                                            <th>Hora</th>
                                            <th>Descargar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            while($datos = mysqli_fetch_assoc($archivos)) {
                                        ?>
                                        <tr>
                                            <td><small><?php echo $datos['nombre'];?></small></td>
                                            <td><small><?php echo $datos['extension'];?></small></td>
                                            <td><small><?php echo $datos['nombre_materia'];?></small></td>
                                            <td><small><?php echo $datos['unidad_materia'];?></small></td>
                                            <td><small><?php echo $datos['semestre_materia'];?></small></td>
                                            <td><small><?php echo $datos['ciclo_profesor'];?></small></td>
                                            <td><small><?php echo $datos['fecha_insercion'];?></small></td>
                                            <td><small><?php echo $datos['hora_insercion'];?></small></td>
                                            <td class="text-center">
                                                <a href="<?php echo $datos['ruta'];?>" download="<?php echo $datos['nombre'] . '.' . $datos['extension'];?>">
                                                    <span class="btn btn-sm boton_personalizado" id="boton_descargar"  download="'<?php echo $datos['ruta'];?>'"><i class="fas fa-download"></i></span>
                                                </a>    
                                            </td>
                                            <td class="text-center">
                                                <span class="btn btn-sm boton_personalizado" id="boton_eliminar" onclick="eliminar_archivo('<?php echo $datos['id'];?>', '<?php echo $datos['ruta'];?>')"><i class="fas fa-trash-alt"></i></span>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="../../manager/alumno/archivos.js"></script>