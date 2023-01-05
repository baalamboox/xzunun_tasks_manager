$(document).ready(() => {
    $('#vistas').load('dashboard.php');
    $('#boton_dashboard').click(() => {
        $('#vistas').load('dashboard.php');
        return false;
    });
    $('#boton_archivos').click(() => {
        $('#vistas').load('archivos.php');
        return false;
    });
    $('#boton_configuracion').click(() => {
        $('#vistas').load('configuracion.php');
        return false;
    });
    $('#boton_salir').click(() => {
        Swal.fire({
            customClass: {
                title: 'titulo',
                confirmButton: 'boton_ok',
                cancelButton: 'boton_cancelar'
            },
            icon: 'warning',
            title: '¿Estás seguro?',
            html: '<span class="text-white">Cerrarás sesión.</span>',
            showCancelButton: true,
            cancelButtonText: 'Cancelar',
            background: 'rgb(52, 58, 64)',
            backdrop: 'rgb(52, 58, 64)'
        }).then((result) => {
            if (result.isConfirmed) {
               window.location.href = '../../control/alumno/cerrar-sesion.php';
            }
        });
        return false;
    });
});