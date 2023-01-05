$(document).ready(() => {
    $('#ciclo').prop('disabled', true);
    $('#boton_guardar').hide();
    $('#habilitar_edicion').click(() => {
        if($('#habilitar_edicion').is(':checked') != true) {
            $('#ciclo').prop('disabled', true);
            $('#boton_guardar').hide();
        } else {
            $('#ciclo').prop('disabled', false)
            $('#boton_guardar').show();
        }
    });
    $('#boton_guardar').click(() => {
        if($('#ciclo').val() != '') {
            if($('#ciclo').val() != $('#ciclo_comparar').val()) {
                $.ajax({
                    type: 'POST',
                    url: '../../control/administrador/agregar-ciclo-escolar.php',
                    data: {
                        'ciclo': $('#ciclo').val()
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
                                html: '<span class="text-white">Se ha dado de alta el ciclo correctamente.</span>',
                                background: 'rgb(52, 58, 64)',
                                backdrop: 'rgb(52, 58, 64)'
                            }).then(result => {
                                if(result.isConfirmed) {
                                    $('#vistas').load('dashboard.php');
                                }
                            }); 
                        } else {
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
                    html: '<span class="text-white">El ciclo ya existe.</span>',
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
                html: '<span class="text-white">El ciclo esta vacío.</span>',
                background: 'rgb(52, 58, 64)',
                backdrop: 'rgb(52, 58, 64)'
            });
        }
    });
});