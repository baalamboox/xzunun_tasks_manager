$(document).ready(() => {
    $('#link_descargar_zip').hide();
    $('#boton_cancelar').hide();
    $('#boton_cancelar').click(() => {
        $('#vistas').load('evidencias.php');
    });
    $('#boton_generar_zip').click(() => {
        if($('#carrera').val() != 'sc') {
            if($('#semestre').val() != '') {
                $.ajax({
                    type: 'POST',
                    url: '../../control/administrador/generar-zip.php',
                    data: {
                        'carrera': $('#carrera').val(),
                        'semestre': $('#semestre').val(),
                        'ciclo': $('#ciclo').val()
                    },
                    success: resultado => {
                        if(resultado != 0) {
                            $('#link_descargar_zip').attr('href', resultado);
                            $('#boton_generar_zip').hide();
                            $('#boton_cancelar').show();
                            $('#link_descargar_zip').show();
                        } else {
                            Swal.fire({
                                customClass: {
                                    title: 'titulo',
                                    confirmButton: 'boton_ok'
                                },
                                icon: 'error',
                                title: '¡Ups!',
                                html: '<span class="text-white">Ocurrio un error al generar ZIP.</span>',
                                background: 'rgb(52, 58, 64)',
                                backdrop: 'rgb(52, 58, 64)'
                            });
                        }
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
                    html: '<span class="text-white">No se ha seleccionado el semestre.</span>',
                    background: 'rgb(52, 58, 64)',
                    backdrop: 'rgb(52, 58, 64)'
                });
            }
        } else {
            Swal.fire({
                customClass: {
                    title: 'titulo',
                    confirmButton: 'boton_ok'
                },
                icon: 'error',
                title: '¡Ups!',
                html: '<span class="text-white">No se ha seleccionado la carrera.</span>',
                background: 'rgb(52, 58, 64)',
                backdrop: 'rgb(52, 58, 64)'
            });
        }
    });
});