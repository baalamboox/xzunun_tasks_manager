<div>
    <form class="shadow rounded p-4 efecto_blur">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h5>Alumno</h5>
                </div>
            </div>
            <hr class="borde_hr">
            <div class="row">
                <div class="col-md-12 text-center">
                    <img src="raw/img/usuario-defecto.jpg" class="img-fluid rounded-circle" id="foto_perfil" alt="foto perfil" width="120" height="120">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="usuario"><i class="fas fa-user mr-2"></i>Usuario:</label>
                        <input type="text" class="form-control form-control-sm rounded-pill" id="usuario" placeholder="Ingresar usuario">
                    </div>
                    <div class="text-center" id="vista_boton_siguiente">
                        <span class="btn btn-sm rounded-pill boton_personalizado" id="boton_siguiente">Siguiente<i class="fas fa-arrow-right ml-2"></i></span>
                    </div>
                </div>
            </div>
            <div class="row" id="vista_contrasenia">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="contrasenia"><i class="fas fa-lock mr-2"></i>Contraseña:</label>
                        <input type="password" class="form-control form-control-sm rounded-pill" id="contrasenia" placeholder="Ingresar contraseña">
                    </div>
                    <div class="text-center" id="boton_ingresar">
                        <span class="btn btn-sm rounded-pill boton_personalizado" id="boton_ingresar"><i class="fas fa-sign-in-alt mr-2"></i>Ingresar</span>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="manager/alumno/inicio-sesion.js"></script>