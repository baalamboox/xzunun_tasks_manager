$(document).ready(() => {
    $('.previsualizacion_foto_perfil').css('background-image', 'url("../../' + $('#datos').attr('foto_perfil') + '")');
    $('#boton_guardar').hide();
    document.getElementById("foto_perfil").onchange = function(event) {
        // Creamos el objeto de la clase FileReader
        let reader = new FileReader();
        // Leemos el archivo subido y se lo pasamos a nuestro fileReader
        reader.readAsDataURL(event.target.files[0]);
        // Le decimos que cuando este listo ejecute el código interno
        reader.onload = function() {
            let extension = event.target.files[0].name.slice(event.target.files[0].name.indexOf('.') + 1, event.target.files[0].name.length);
            if(extension == 'jpg' || extension == 'jpeg' || extension == 'png' || extension == 'gif') {
                $('.previsualizacion_foto_perfil').css('background-image', 'url("' + reader.result + '")');
                $('#boton_guardar').show();
            } else {
                Swal.fire({
                    customClass: {
                        title: 'titulo',
                        confirmButton: 'boton_ok'
                    },
                    icon: 'error',
                    title: '¡Ups!',
                    html: '<span class="text-white">El formato de la imagen no esta soportado, solo se aceptan (.jpg, .jpeg, .gif y .png)</span>',
                    background: 'rgb(52, 58, 64)',
                    backdrop: 'rgb(52, 58, 64)'
                });
            }
        };
    }
    $('#boton_guardar').click(() => {
        let datos_formulario = new FormData();
        let foto_perfil = $('#foto_perfil')[0].files[0];
        datos_formulario.append('foto_perfil', foto_perfil);
        $.ajax({
            type: 'POST',
            url: '../../control/profesor/subir-foto-perfil.php',
            data: datos_formulario,
            contentType: false,
            processData: false,
            success: resultado => {
                if(resultado != 0) {
                    Swal.fire({
                        customClass: {
                            title: 'titulo',
                            confirmButton: 'boton_ok'
                        },
                        icon: 'success',
                        title: '¡Genial!',
                        html: '<span class="text-white">La foto de perfil se actualizo con éxito.</span>',
                        background: 'rgb(52, 58, 64)',
                        backdrop: 'rgb(52, 58, 64)'
                    }).then(result => {
                        if(result.isConfirmed) {
                            window.location.href = 'plantilla-barra-lateral.php';
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
                        html: '<span class="text-white">La foto de perfil no se actualizo con éxito.</span>',
                        background: 'rgb(52, 58, 64)',
                        backdrop: 'rgb(52, 58, 64)'
                    });
                }
            }
        });
    });
    $('#boton_cambiar_contrasenia').click(() => {
        if($('#contrasenia_actual').val() != '') {
            if($('#nueva_contrasenia').val() != '') {
                if($('#confirmar_nueva_contrasenia').val() != '') {
                    if(sha1($('#contrasenia_actual').val()) == $('#datos').attr('contrasenia')) {
                        if($('#nueva_contrasenia').val() == $('#confirmar_nueva_contrasenia').val()) {
                            $.ajax({
                                type: 'POST',
                                url: '../../control/profesor/cambiar-contrasenia.php',
                                data: {
                                    'nueva_contrasenia': $('#nueva_contrasenia').val()
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
                                            html: '<span class="text-white">La contraseña se modifico correctamente.</span>',
                                            background: 'rgb(52, 58, 64)',
                                            backdrop: 'rgb(52, 58, 64)'
                                        }).then(result => {
                                            if(result.isConfirmed) {
                                                window.location.href = '../../control/profesor/cerrar-sesion.php';
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
                                            html: '<span class="text-white">Ocurrio un error al modificar la contraseña.</span>',
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
                                html: '<span class="text-white">Las contraseñas nuevas no coinciden.</span>',
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
                            html: '<span class="text-white">La contraseña actual no coincide.</span>',
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
                        html: '<span class="text-white">La confirmación de la nueva contraseña esta vacía.</span>',
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
                    html: '<span class="text-white">La nueva contraseña esta vacía.</span>',
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
                html: '<span class="text-white">La contraseña actual esta vacía.</span>',
                background: 'rgb(52, 58, 64)',
                backdrop: 'rgb(52, 58, 64)'
            });
        }
    });
});
