$(document).ready(() => {
    function fecha_email_institucional(fecha) {
        fecha = fecha.split('-');
        fecha = fecha[2] + fecha[1] + fecha[0].slice(-2);
        return fecha;
    }
    function iniciales_nombres(nombres) {
        iniciales = '';
        nombres = nombres.split(' ');
        for(let i = 0; i < nombres.length; i++) {
            iniciales = iniciales + nombres[i].slice(0, 1).toLowerCase();
        }
        return iniciales;
    }
    $('#boton_agregar').hide();
    $('#boton_cancelar').click(() => {
        $('#vistas').load('nuevo.php');
    });
    $('#boton_generar_email').click(() => {
        if($('#nombres').val() != '') {
            if($('#apellido_paterno').val() != '') {
                if($('#apellido_materno').val() != '') {
                    if($('#fecha_nacimiento').val() != '') {
                        let dominio = 'tecnm.mx';
                        $('#email_institucional').val($('#apellido_paterno').val().slice(0, 1).toLowerCase() + $('#apellido_materno').val().slice(0, 1).toLowerCase() + iniciales_nombres($('#nombres').val()) + fecha_email_institucional($('#fecha_nacimiento').val()) + '@' + dominio);
                        $('#boton_generar_email').hide();
                        $('#boton_agregar').show();
                    } else {
                        Swal.fire({
                            customClass: {
                                title: 'titulo',
                                confirmButton: 'boton_ok'
                            },
                            icon: 'error',
                            title: '¡Ups!',
                            html: '<span class="text-white">Para generar el email, la fecha de nacimiento no debe de estar vacía.</span>',
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
                        html: '<span class="text-white">Para generar el email, el apellido materno no debe de estar vacío.</span>',
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
                    html: '<span class="text-white">Para generar el email, el apellido paterno no debe de estar vacío.</span>',
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
                html: '<span class="text-white">Para generar el email, el nombre(s) no debe de estar vacío.</span>',
                background: 'rgb(52, 58, 64)',
                backdrop: 'rgb(52, 58, 64)'
            });
        }
    });
    $('#boton_agregar').click(() => {
        if($('#numero_control').val() != '') {
            if($('#carrera').val() != 'sc') {
                if($('#nombres').val() != '') {
                    if($('#apellido_paterno').val() != '') {
                        if($('#apellido_materno').val() != '') {
                            if($('#fecha_nacimiento').val() != '') {
                                if($('#sexo').val() != 'ss') {
                                    if($('#email_institucional').val() != '') {
                                        if($('#contrasenia').val() != '') {
                                            $.ajax({
                                                type: 'POST',
                                                url: '../../control/administrador/agregar-alumno.php',
                                                data: $('#registro_alumno').serialize(),
                                                success: resultado => {
                                                    if(resultado == 1) {
                                                        Swal.fire({
                                                            customClass: {
                                                                title: 'titulo',
                                                                confirmButton: 'boton_ok'
                                                            },
                                                            icon: 'success',
                                                            title: '¡Genial!',
                                                            html: '<span class="text-white">Alumno agregado correctamente.</span>',
                                                            background: 'rgb(52, 58, 64)',
                                                            backdrop: 'rgb(52, 58, 64)'
                                                        });
                                                        $('#registro_alumno')[0].reset();
                                                        $('#boton_agregar').hide();
                                                        $('#boton_generar_email').show();
                                                    } else {
                                                        Swal.fire({
                                                            customClass: {
                                                                title: 'titulo',
                                                                confirmButton: 'boton_ok'
                                                            },
                                                            icon: 'error',
                                                            title: '¡Ups!',
                                                            html: '<span class="text-white">Ocurrio un error al agregar alumno, esto se puede deber a que ya exista.</span>',
                                                            background: 'rgb(52, 58, 64)',
                                                            backdrop: 'rgb(52, 58, 64)'
                                                        });
                                                        $('#registro_alumno')[0].reset();
                                                        $('#boton_agregar').hide();
                                                        $('#boton_generar_email').show();
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
                                                html: '<span class="text-white">La contraseña esta vacía.</span>',
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
                                            html: '<span class="text-white">El email institucional esta vacío.</span>',
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
                                        html: '<span class="text-white">No se ha seleccionado el sexo.</span>',
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
                                    html: '<span class="text-white">La fecha de nacimiento esta vacía.</span>',
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
                                html: '<span class="text-white">El apellido materno esta vacío.</span>',
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
                            html: '<span class="text-white">El apellido paterno esta vacío.</span>',
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
                        html: '<span class="text-white">El nombre(s) esta vacío.</span>',
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
});