<div id="vista_agregar_alumno">
    <div class="container efecto_blur rounded p-4 mb-5">
        <div class="row">
            <div class="col-lg-12">
                <form id="registro_alumno">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <h3>Agregar alumno</h3>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-lg-12">
                                <small><i class="fas fa-address-card mr-2"></i>Datos básicos</small>
                                <hr class="borde_hr">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="numero_control">Número de control:</label>
                                    <input type="text" class="form-control form-control-sm rounded-pill" id="numero_control" name="numero_control" placeholder="Ingresar número de control">
                                </div>
                            </div>
                            <div class="col-lg-8">
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
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="nombres">Nombre(s):</label>
                                    <input type="text" class="form-control form-control-sm rounded-pill" id="nombres" name="nombres" placeholder="Ingresar nombres">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="apellido_paterno">Apellido paterno:</label>
                                    <input type="text" class="form-control form-control-sm rounded-pill" id="apellido_paterno" name="apellido_paterno" placeholder="Ingresar apellido paterno">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="apellido_materno">Apellido materno:</label>
                                    <input type="text" class="form-control form-control-sm rounded-pill" id="apellido_materno" name="apellido_materno" placeholder="Ingresar apellido materno">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Fecha de nacimiento</label>
                                    <input type="date" class="form-control form-control-sm rounded-pill" id="fecha_nacimiento" name="fecha_nacimiento">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="sexo">Sexo:</label>
                                    <select class="form-control form-control-sm rounded-pill" id="sexo" name="sexo">
                                        <option value="ss">Selecionar sexo</option>
                                        <option value="masculino">Masculino</option>
                                        <option value="femenino">Femenino</option>
                                        <option value="otro">Otro</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-lg-12">
                                <small><i class="fas fa-user mr-2"></i>Datos de la cuenta</small>
                                <hr class="borde_hr">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="email_institucional"><i class="fas fa-at mr-2"></i>Email institucional:</label>
                                    <input type="text" class="form-control form-control-sm rounded-pill" id="email_institucional" name="email_institucional" value="alguien010100@tecnm.mx" readonly>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="contrasenia"><i class="fas fa-lock mr-2"></i>Contraseña:</label>
                                    <input type="password" class="form-control form-control-sm rounded-pill" id="contrasenia" name="contrasenia" value="12345678" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-12 text-right">
                                <div class="btn-group">
                                    <span class="btn btn-sm rounded-pill mr-2 boton_personalizado" id="boton_cancelar"><i class="fas fa-times-circle mr-2"></i>Cancelar</span>
                                    <span class="btn btn-sm rounded-pill mr-2 boton_personalizado" id="boton_generar_email"><i class="fas fa-at mr-2"></i>Generar email</span>
                                    <span class="btn btn-sm rounded-pill boton_personalizado" id="boton_agregar"><i class="fas fa-save mr-2"></i>Agregar</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="../../manager/administrador/agregar-alumno.js"></script>