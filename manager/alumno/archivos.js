$(document).ready(() => {
    $('#tabla_archivos').DataTable({
        language: {
            url: '../../raw/lib/datatables-1.10.25/json/spanish-mexico.json'
        }
    });
    $('#boton_agregar_archivo').click(() => {
        $('#vistas').load('agregar-archivo.php');
    });
});
function eliminar_archivo(id_archivo, ruta_archivo) {
    Swal.fire({
        customClass: {
            title: 'titulo',
            confirmButton: 'boton_ok',
            cancelButton: 'boton_cancelar'
        },
        icon: 'warning',
        title: '¿Estás seguro?',
        html: '<span class="text-white">El archivo será eliminado.</span>',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        background: 'rgb(52, 58, 64)',
        backdrop: 'rgb(52, 58, 64)'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'POST',
                url: '../../control/alumno/eliminar-archivo.php',
                data: {
                    'id_archivo': id_archivo,
                    'ruta_archivo': ruta_archivo
                },
                success: resultado => {
                    if(resultado != 0) {
                        Swal.fire({
                            customClass: {
                                title: 'titulo',
                                confirmButton: 'boton_ok'
                            },
                            icon: 'success',
                            title: '¡Genial!',
                            html: '<span class="text-white">El archivo se elimino correctamente.</span>',
                            background: 'rgb(52, 58, 64)',
                            backdrop: 'rgb(52, 58, 64)'
                        }).then(result => {
                            if(result.isConfirmed) {
                                $('#vistas').load('archivos.php');
                            }
                        });
                    } else {
                        Swal.fire({
                            customClass: {
                                title: 'titulo',
                                confirmButton: 'boton_ok'
                            },
                            icon: 'error',
                            title: '¡Ups!',
                            html: '<span class="text-white">Ocurrio un error al eliminar el archivo.</span>',
                            background: 'rgb(52, 58, 64)',
                            backdrop: 'rgb(52, 58, 64)'
                        });
                    }
                }
            });
        }
    });
}