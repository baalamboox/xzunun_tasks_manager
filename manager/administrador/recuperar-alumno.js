$(document).ready(() => {
    $('#vista_datos_recuperados').hide();
    $('#boton_restaurar_datos').hide();
    $('#boton_cancelar').click(() => {
        $('#vistas').load('recuperar.php');
    });
    $('#boton_recuperar_datos').click(() => {
        if ($('#numero_control').val() != '') {
            $.ajax({
                type: 'POST',
                url: '../../control/administrador/recuperar-alumno.php',
                data: {
                    'numero_control': $('#numero_control').val()
                },
                success: resultado => {
                    if (resultado != 0) {
                        let datos = JSON.parse(resultado);
                        $('#email_institucional').val(datos.email_institucional);
                        $('#boton_recuperar_datos').hide();
                        $('#boton_restaurar_datos').show();
                        $('#vista_datos_recuperados').show();
                    } else {
                        Swal.fire({
                            customClass: {
                                title: 'titulo',
                                confirmButton: 'boton_ok'
                            },
                            icon: 'error',
                            title: '¡Ups!',
                            html: '<span class="text-white">Ocurrio un error al recuperar alumno, esto se puede deber a que no existe.</span>',
                            background: 'rgb(52, 58, 64)',
                            backdrop: 'rgb(52, 58, 64)'
                        });
                        $('#numero_control').val('');
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
                html: '<span class="text-white">El número de control esta vacío.</span>',
                background: 'rgb(52, 58, 64)',
                backdrop: 'rgb(52, 58, 64)'
            });
        }
    });
    $('#boton_restaurar_datos').click(() => {
        Swal.fire({
            customClass: {
                title: 'titulo',
                confirmButton: 'boton_ok',
                cancelButton: 'boton_cancelar'
            },
            icon: 'warning',
            title: '¿Estás seguro?',
            html: '<span class="text-white">Restaurarás la contraseña por defecto.</span>',
            showCancelButton: true,
            cancelButtonText: 'Cancelar',
            background: 'rgb(52, 58, 64)',
            backdrop: 'rgb(52, 58, 64)'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: '../../control/administrador/restaurar-alumno.php',
                    data: {
                        'numero_control': $('#numero_control').val(),
                        'contrasenia': $('#contrasenia').val()
                    },
                    success: resultado => {
                        if (resultado != 0) {
                            Swal.fire({
                                customClass: {
                                    title: 'titulo',
                                    confirmButton: 'boton_ok'
                                },
                                icon: 'success',
                                title: '¡Genial!',
                                html: '<span class="text-white">La contraseña se restauró correctamente.</span>',
                                background: 'rgb(52, 58, 64)',
                                backdrop: 'rgb(52, 58, 64)'
                            }).then(result => {
                                if(result.isConfirmed) {
                                    $('#vistas').load('recuperar.php');
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
                                html: '<span class="text-white">Ocurrio un error al restaurar la contraseña.</span>',
                                background: 'rgb(52, 58, 64)',
                                backdrop: 'rgb(52, 58, 64)'
                            });
                        }
                    }
                });
            }
        });
    });
});