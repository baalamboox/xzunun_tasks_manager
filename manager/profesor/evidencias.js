$(document).ready(() => {
    $('#vista_materia_grupo').hide();
    $('#vista_grupo').hide();
    $('#boton_generar_zip').hide();
    $('#link_descargar_zip').hide();
    $('#boton_cancelar').hide();
    $('#boton_siguiente').click(() => {
        if($('#carrera').val() != 'sc') {
            if($('#semestre').val() != '') {
                $.ajax({
                    type: 'POST',
                    url: '../../control/profesor/consultar-materias.php',
                    data: {
                        'carrera': $('#carrera').val(),
                        'semestre': $('#semestre').val(),
                        'ciclo': $('#ciclo').val(),
                        'clave_profesor': $('#clave_profesor').val(),
                    },
                    success: resultado => {
                        if(resultado != 0) {
                            $('#materia').html('');
                            $('#boton_siguiente').hide();
                            $('#vista_materia_grupo').show();
                            $('#boton_generar_zip').show();
                            $('#boton_cancelar').show();
                            $('#materia').html('<option value = "sm">Seleccionar materia</option>');
                            $.each(JSON.parse(resultado), function (index, items){
                                $('#materia').html($('#materia').html() + `
                                    <option value = "${JSON.parse(resultado)[index][0]}">${JSON.parse(resultado)[index][1].charAt(0).toUpperCase() + JSON.parse(resultado)[index][1].slice(1)}</option>
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
                                html: '<span class="text-white">No se encontro materia o materias relacionadas con la carrera y el semestre.</span>',
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
    $('#boton_cancelar').click(() => {
        $('#vistas').load('evidencias.php');
    });
    $('#materia').change(() => {
        
        $.ajax({
            type: 'POST',
            url: '../../control/profesor/consultar-grupo.php',
            data: {
                'clave_materia': $('#materia').val(),
                'ciclo': $('#ciclo').val(),
                'clave_profesor': $('#clave_profesor').val()
            },
            success: resultado => {
                if(resultado != 0) {
                    $('#grupo').html('');
                    $('#nombre_materia').attr('value', JSON.parse(resultado)[0][1]);
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
                        html: '<span class="text-white">No se encontro grupo o grupos relacionados con la materia.</span>',
                        background: 'rgb(52, 58, 64)',
                        backdrop: 'rgb(52, 58, 64)'
                    });
                }
            }
        });
    });
    $('#boton_generar_zip').click(() => {
        if($('#carrera').val() != 'sc') {
            if($('#semestre').val() != '') {
                if($('#materia').val() != 'sm') {
                    if($('#grupo').val() != 'sg') {
                        $.ajax({
                            type: 'POST',
                            url: '../../control/profesor/generar-zip.php',
                            data: {
                                'carrera': $('#carrera').val(),
                                'semestre': $('#semestre').val(),
                                'ciclo': $('#ciclo').val(),
                                'nombre_materia': $('#nombre_materia').val(),
                                'grupo': $('#grupo').val()
                            },
                            success: resultado => {
                                if(resultado != 0) {
                                    $('#boton_generar_zip').hide();
                                    $('#link_descargar_zip').attr('href', resultado);
                                    $('#link_descargar_zip').show();
                                } else {
                                    console.log('Holis adios!');
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