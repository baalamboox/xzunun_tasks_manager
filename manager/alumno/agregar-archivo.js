$(document).ready(() => {
    $('#unidad').prop('disabled', true);
    $('#boton_tabla_archivos').click(() => {
        $('#vistas').load('archivos.php');
    });
    $('#materia').change(() => {
        $.ajax({
            type: 'POST',
            url: '../../control/alumno/consultar-grupo-semestre-unidades-materia.php',
            data: {
                'numero_control': $('#numero_control').val(),
                'clave_materia': $('#materia').val()
            },
            success: resultado => {
                if(resultado != 0) {
                    $('#grupo').val(JSON.parse(resultado).grupo_profesor);
                    $('#semestre').val(JSON.parse(resultado).semestre_materia);
                    $('#nombre_materia').val(JSON.parse(resultado).nombre);
                    $('#unidad').attr('max', JSON.parse(resultado).unidades);
                    $('#unidad').prop('disabled', false);
                } else {
                    Swal.fire({
                        customClass: {
                            title: 'titulo',
                            confirmButton: 'boton_ok'
                        },
                        icon: 'error',
                        title: '¡Ups!',
                        html: '<span class="text-white">Materias no econtradas.</span>',
                        background: 'rgb(52, 58, 64)',
                        backdrop: 'rgb(52, 58, 64)'
                    });
                }
            }
        });
    });
    $('#boton_subir').click(() => {
        if($('#materia').val() != 'sm') {
            if($('#unidad').val() != '') {
                if($('#archivo')[0].files[0] != null) {
                    let datos_formulario = new FormData();
                    let archivo = $('#archivo')[0].files[0];
                    datos_formulario.append('carrera', $('#carrera').val()); 
                    datos_formulario.append('semestre', $('#semestre').val()); 
                    datos_formulario.append('ciclo', $('#ciclo').val()); 
                    datos_formulario.append('nombre_materia', $('#nombre_materia').val());
                    datos_formulario.append('grupo', $('#grupo').val());
                    datos_formulario.append('unidad', $('#unidad').val()); 
                    datos_formulario.append('numero_control', $('#numero_control').val()); 
                    datos_formulario.append('archivo', archivo);
                    $.ajax({
                        type: 'POST',
                        url: '../../control/alumno/subir-archivo.php',
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
                                    html: '<span class="text-white">Se subió el archivo correctamente.</span>',
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
                                    html: '<span class="text-white">Ocurrio un error al subir archivo.</span>',
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
                        html: '<span class="text-white">No se a seleccionado archivo.</span>',
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
                    html: '<span class="text-white">La unidad esta vacía.</span>',
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