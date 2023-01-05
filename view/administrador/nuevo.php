<div id="vista_nuevo">
    <div class="container efecto_blur rounded p-4">
        <div class="row mb-4">
            <div class="col-lg-12 text-center">
                <h3>¿A quién deseas agregar?</h3>
                <hr class="borde_hr mt-4">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6  text-center mb-4">
                <i class="fas fa-user-graduate d-block mb-4" style="font-size: 60px;"></i>
                <span class="btn btn-sm rounded-pill boton_personalizado" id="boton_agregar_alumno"><i class="fas fa-plus-circle mr-2"></i>Agregar alumno</span>
            </div>
            <div class="col-lg-6 text-center mb-4">
                <i class="fas fa-chalkboard-teacher d-block mb-4" style="font-size: 60px;"></i>
                <span class="btn btn-sm rounded-pill boton_personalizado" id="boton_agregar_profesor"><i class="fas fa-plus-circle mr-2"></i>Agregar profesor</span>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(() => {
        $('#boton_agregar_alumno').click(() => {
            $('#vistas').load('agregar-alumno.php');
        });
        $('#boton_agregar_profesor').click(() => {
            $('#vistas').load('agregar-profesor.php');
        });
    });
</script>