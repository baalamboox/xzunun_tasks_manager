$(document).ready(() => {
    $('#vista_materia_profesor_grupo_ciclo').hide();
    $('#vista_profesor').hide();
    $('#vista_grupo').hide();
    $('#vista_boton_cancelar_registrar').hide();
    $('#boton_siguiente').click(() => {
        if($('#numero_control').val() != '') {
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
                                $('#materia').html('');
                                $('#boton_siguiente').hide();
                                $('#vista_materia_profesor_grupo_ciclo').show();
                                $('#vista_boton_cancelar_registrar').show();
                                $('#materia').html('<option value = "sm" >Seleccionar Materia</option>');
                                $.each(JSON.parse(resultado), function (index, items){
                                    $('#materia').html($('#materia').html() + `
                                        <option value = "${JSON.parse(resultado)[index][0]}"> ${JSON.parse(resultado)[index][1].charAt(0).toUpperCase() + JSON.parse(resultado)[index][1].slice(1)}</option>
                                    `);
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
                        html: '<span class="text-white">El semestre esta vacío.</span>',
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
    $('#materia').change(() => {
        $.ajax({
            type: 'POST',
            url: '../../control/administrador/consultar-profesores.php',
            data: {
                'clave_materia': $('#materia').val()
            },
            success: resultado => {
                if(resultado != 0) {
                    $('#profesor').html('');
                    $('#profesor').html('<option value = "sp">Seleccionar profesor</option>');
                    $.each(JSON.parse(resultado), function (index, items){
                        $('#profesor').html($('#profesor').html() + `
                            <option value = "${JSON.parse(resultado)[index][0]}">${ JSON.parse(resultado)[index][1].charAt(0).toUpperCase() + JSON.parse(resultado)[index][1].slice(1) + ' ' + JSON.parse(resultado)[index][2].charAt(0).toUpperCase() + JSON.parse(resultado)[index][2].slice(1)+ ' ' + JSON.parse(resultado)[index][3].charAt(0).toUpperCase() + JSON.parse(resultado)[index][3].slice(1)}</option>
                        ` );
                    });
                    $('#vista_profesor').show();
                } else {
                    Swal.fire({
                        customClass: {
                            title: 'titulo',
                            confirmButton: 'boton_ok'
                        },
                        icon: 'error',
                        title: '¡Ups!',
                        html: '<span class="text-white">No se encontro profesor o profesores en relación a la materia selecionada.</span>',
                        background: 'rgb(52, 58, 64)',
                        backdrop: 'rgb(52, 58, 64)'
                    });
                    $('#vista_profesor').hide();
                }
            }
        });
    });
    $('#profesor').change(() => {
        $.ajax({
            type: 'POST',
            url: '../../control/administrador/consultar-grupo.php',
            data: {
                'clave_profesor': $('#profesor').val()
            },
            success: resultado => {
                if(resultado != 0) {
                    $('#grupo').html('');
                    $('#grupo').html('<option value = "sg">Seleccionar grupo</option>');
                    $.each(JSON.parse(resultado), function (index, items){
                        $('#grupo').html($('#grupo').html() + `
                            <option value = "${JSON.parse(resultado)[index][0]}">${JSON.parse(resultado)[index][0].toUpperCase()}</option>
                        ` );
                    });
                    $('#vista_grupo').show();
                } else {
                    Swal.fire({
                        customClass: {
                            title: 'titulo',
                            confirmButton: 'boton_ok'
                        },
                        icon: 'error',
                        title: '¡Ups!',
                        html: '<span class="text-white">No se encontro grupo o grupos en relación al profesor selecionado.</span>',
                        background: 'rgb(52, 58, 64)',
                        backdrop: 'rgb(52, 58, 64)'
                    });
                }
            }
        });
    });
    $('#boton_cancelar').click(() => {
        $('#vistas').load('carga-academica.php');
    });
    $('#boton_agregar_materia').click(() => {
        if($('#materia').val() != 'sm') {
            if($('#profesor').val() != 'sp') {
                if($('#grupo').val() != 'sg') {
                    $.ajax({
                        type: 'POST',
                        url: '../../control/administrador/carga-academica-alumno.php',
                        data: {
                            'numero_control': $('#numero_control').val(),
                            'clave_profesor': $('#profesor').val(),
                            'semestre_materia': $('#semestre').val(),
                            'grupo_profesor': $('#grupo').val(),
                            'ciclo_profesor': $('#ciclo').val()
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
                                        $('#vistas').load('carga-academica-alumno.php');
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
                        html: '<span class="text-white">No se ha seleccionado el grupo.</span>',
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
                    html: '<span class="text-white">No se ha seleccionado el profesor.</span>',
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
    });
});

