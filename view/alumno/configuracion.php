<?php
    session_start();
    require_once '../../app/conexion.php';
    $usuario = $_SESSION['usuario'];
    $conexion = conexion_xzunun_gestor_evidencias();
    $sql = "SELECT contrasenia, foto_perfil FROM tabla_alumnos WHERE email_institucional = '$usuario'";
    $consulta_consultada = $conexion->query($sql);
    $datos =  mysqli_fetch_assoc($consulta_consultada);
?>
<div id="vista_configuracion">
    <div class="container efecto_blur rounded p-4 mb-4">
        <div class="row">
            <div class="col-lg-12">
                <form>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <h3>Configuración</h3>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-12">
                                <span><i class="fas fa-user-circle mr-2"></i>Cambiar foto de perfil</span>
                                <hr class="borde_hr">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div foto_perfil="<?php echo $datos['foto_perfil'];?>" contrasenia="<?php echo $datos['contrasenia'];?>" id="datos"></div>
                            </div>
                        </div>
                        <div class="row my-4 justify-content-center">
                            <div class="col-lg-3">
                                <div class="rounded-circle mx-auto previsualizacion_foto_perfil"></div>
                            </div>
                            <div class="col-lg-4">
                                <div class="container">
                                    <div class="row mt-4">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="btn btn-sm boton_personalizado rounded-pill w-100">
                                                    <i class="fas fa-search mr-2"></i>Buscar foto...
                                                    <input type="file" class="d-none" id="foto_perfil" name="foto_perfil">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group text-center">
                                                <span class="btn btn-sm boton_personalizado rounded-pill" id="boton_guardar"><i class="fas fa-save mr-2"></i>Guardar</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-12">
                                <span><i class="fas fa-lock mr-2"></i>Cambiar contraseña</span>
                                <hr class="borde_hr">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="contrasenia_actual">Contraseña actual:</label>
                                    <input type="password" class="form-control form-control-sm rounded-pill" id="contrasenia_actual" name="contrasenia_actual" placeholder="Ingresar contraseña actual">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="nueva_contrasenia">Nueva contraseña:</label>
                                    <input type="password" class="form-control form-control-sm rounded-pill" id="nueva_contrasenia" name="nueva_contrasenia" placeholder="Ingresar nueva contraseña">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="confirmar_nueva_contrasenia">Confirmar contraseña:</label>
                                    <input type="password" class="form-control form-control-sm rounded-pill" id="confirmar_nueva_contrasenia" name="confirmar_nueva_contrasenia" placeholder="Confirmar contraseña">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-12 text-right">
                                <div class="form-group">
                                    <span class="btn btn-sm rounded-pill boton_personalizado" id="boton_cambiar_contrasenia"><i class="fas fa-edit mr-2"></i>Cambiar contraseña</span>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="../../manager/alumno/configuracion.js"></script>