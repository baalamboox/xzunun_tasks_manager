$(document).ready(() => {
    $('#vista_clave_materia_grupo_ciclo').hide();
    $('#vista_boton_cancelar_registrar').hide();
    $('#boton_siguiente').click(() => {
        if($('#carrera').val() != 'sc') {
            if($('#semestre').val() != '') {
                $.ajax({
                    type: 'POST',
                    url: '../../control/administrador/consultar-materias.php',
                    data: {
                        'carrera': $('#carrera').val(),
                        'semestre': $('#semestre').val()
                    },
                    success: resultado => {
                        if(resultado != 0) {
                            $('#boton_siguiente').hide();
                            $('#vista_clave_materia_grupo_ciclo').show();
                            $('#vista_boton_cancelar_registrar').show();
                            $('#materia').html('');
                            $('#materia').html('<option value = "sm" > Seleccionar Materia </option>');
                            $.each(JSON.parse(resultado), function (index, items){
                                $('#materia').html($('#materia').html() + `
                                    <option value = "${JSON.parse(resultado)[index][0]}"> ${JSON.parse(resultado)[index][1].charAt(0).toUpperCase() + JSON.parse(resultado)[index][1].slice(1)} </option>
                                ` );
                            });
                        } else {
                            Swal.fire({
                                customClass: {
                                    title: 'titulo',
                                    confirmButton: 'boton_ok'
                                },
                                icon: 'error',
                                title: '¡Ups!',
                                html: '<span class="text-white">No se encontraron materias en relación a la carrera y al semestre.</span>',
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
                    html: '<span class="text-white">No se ha selecionado el semestre.</span>',
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
                html: '<span class="text-white">No se ha selecionado la carrera.</span>',
                background: 'rgb(52, 58, 64)',
                backdrop: 'rgb(52, 58, 64)'
            });
        }
    });
    $('#boton_cancelar').click(() => {
        $('#vistas').load('carga-academica.php');
    });
    $('#boton_agregar_materia').click(() => {
        if($('#clave').val() != '') {
            if($('#materia').val() != 'sm') {
                if($('#grupo').val() != '') {
                    $.ajax({
                        type: 'POST',
                        url: '../../control/administrador/carga-academica-profesor.php',
                        data: {
                            'clave': $('#clave').val(),
                            'materia' : $('#materia').val(),
                            'grupo' : $('#grupo').val(),
                            'ciclo' : $('#ciclo').val()
                        },
                        success: resultado => {
                            if(resultado == 1) {
                                Swal.fire({
                                    customClass: {
                                        title: 'titulo',
                                        confirmButton: 'boton_ok'
                                    },
                                    icon: 'success',
                                    title: '¡Genial!',
                                    html: '<span class="text-white">Se cargo correctamente la materia.</span>',
                                    background: 'rgb(52, 58, 64)',
                                    backdrop: 'rgb(52, 58, 64)'
                                }).then(result => {
                                    if(result.isConfirmed) {
                                        $('#vistas').load('carga-academica-profesor.php');
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
                                    html: '<span class="text-white">Ocurrio un error al cargar la materia.</span>',
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
                        html: '<span class="text-white">El grupo esta vacío.</span>',
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
                    html: '<span class="text-white">No se ha seleccionado la materia.</span>',
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
                html: '<span class="text-white">La clave esta vacía.</span>',
                background: 'rgb(52, 58, 64)',
                backdrop: 'rgb(52, 58, 64)'
            });
        }
    });
});