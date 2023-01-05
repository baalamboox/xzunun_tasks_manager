<div id="vista_recuperacion-alumno">
    <div class="container efecto_blur rounded p-4 mb-4">
        <div class="row mb-4">
            <div class="col-lg-12 text-center">
                <h3>Recuperar alumno</h3>
                <hr class="borde_hr mt-4">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <form>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="numero_control">Número de control:</label>
                                    <input type="text" class="form-control form-control-sm rounded-pill" id="numero_control" name="numero_control" placeholder="Ingresar número de control">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-center" id="vista_datos_recuperados">
            <div class="col-lg-5">
                <form>
                    <div class="container">
                        <div class="row my-4">
                            <div class="col-lg-12">
                                <small><i class="fas fa-check-circle mr-2"></i>Datos recuperados</small>
                                <hr class="borde_hr">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="email_institucional">Email institucional:</label>
                                    <input type="text" class="form-control form-control-sm rounded-pill" id="email_institucional" name="email_institucional" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="contrasenia">Contraseña:</label>
                                    <input type="password" class="form-control form-control-sm rounded-pill" id="contrasenia" name="contrasenia" value="12345678" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-lg-5 text-right">
                <div class="btn-group">
                    <span class="btn btn-sm rounded-pill mr-2 boton_personalizado" id="boton_cancelar"><i class="fas fa-times-circle mr-2"></i>Cancelar</span>
                    <span class="btn btn-sm rounded-pill mr-2 boton_personalizado" id="boton_recuperar_datos"><i class="fas fa-undo mr-2"></i>Recuperar</span>
                    <span class="btn btn-sm rounded-pill boton_personalizado" id="boton_restaurar_datos"><i class="fas fa-eraser mr-2"></i>Restaurar</span>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../../manager/administrador/recuperar-alumno.js"></script>