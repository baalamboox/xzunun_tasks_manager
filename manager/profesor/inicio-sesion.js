$(document).ready(() => {
    $('#vista_contrasenia').hide();
    $('#boton_siguiente').click(() => {
        if($('#usuario').val() != '') {
            $.ajax({
                type: 'POST',
                url: 'control/profesor/inicio-sesion.php',
                data: {
                    'usuario': $('#usuario').val()
                },
                success: resultado => {
                    if(resultado != 0) {
                        if(JSON.parse(resultado).email_institucional == $('#usuario').val()) {
                            $('#vista_boton_siguiente').hide();
                            if(JSON.parse(resultado).foto_perfil == 'raw/img/usuario-defecto.jpg') {
                                $('#foto_perfil').attr('src', JSON.parse(resultado).foto_perfil); 
                            } else {
                                $('#foto_perfil').attr('src', JSON.parse(resultado).foto_perfil);
                            }
                            $('#vista_contrasenia').show();
                            $('#boton_ingresar').click(() => {
                                let contrasenia = $('#contrasenia').val();
                                if(contrasenia != '') {
                                    if(JSON.parse(resultado).contrasenia == sha1(contrasenia)) {
                                        window.location.href = 'view/profesor/plantilla-barra-lateral.php';
                                    } else {
                                        Swal.fire({
                                            customClass: {
                                                title: 'titulo',
                                                confirmButton: 'boton_ok'
                                            },
                                            icon: 'error',
                                            title: '¡Ups!',
                                            html: '<span class="text-white">Contraseña incorrecta.</span>',
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
                                        html: '<span class="text-white">La contraseña se ecuentra vacía.</span>',
                                        background: 'rgb(52, 58, 64)',
                                        backdrop: 'rgb(52, 58, 64)'
                                    });
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
                                html: '<span class="text-white">Usuario incorrecto.</span>',
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
                            html: '<span class="text-white">Este usuario no esta registrado.</span>',
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
                html: '<span class="text-white">El usuario se encuentra vacío.</span>',
                background: 'rgb(52, 58, 64)',
                backdrop: 'rgb(52, 58, 64)'
            });
        }
    });
});