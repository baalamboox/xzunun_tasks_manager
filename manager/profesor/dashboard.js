$(document).ready(() => {
    let fecha = new Date();
    let dia = fecha.getDate();
    let mes = fecha.getMonth() + 1; 
    let anio = fecha.getFullYear();
    if(mes < 10) {
       $('#vista_fecha').text('0' + dia + '/' + '0' + mes + '/' + anio); 
    } else {
        $('#vista_fecha').text(dia + '/' + mes + '/' + anio);
    }
    function cargar_reloj() {
        // Haciendo uso del objeto Date() obtenemos la hora, minuto y segundo 
        let fecha_hora = new Date();
        let hora = fecha_hora.getHours(); 
        let minuto = fecha_hora.getMinutes(); 
        let segundo = fecha_hora.getSeconds(); 
        // Variable meridiano con el valor 'AM' 
        let meridiano = "AM";
        // Si la hora es igual a 0, declaramos la hora con el valor 12 
        if(hora == 0){
            hora = 12;
        }
        // Si la hora es mayor a 12, restamos la hora - 12 y mostramos la variable meridiano con el valor 'PM' 
        if(hora > 12) {
            hora = hora - 12;
            // Variable meridiano con el valor 'PM' 
            meridiano = "PM";
        }
        // Formateamos los ceros '0' del reloj 
        hora = (hora < 10) ? "0" + hora : hora;
        minuto = (minuto < 10) ? "0" + minuto : minuto;
        segundo = (segundo < 10) ? "0" + segundo : segundo;
        // Enviamos la hora a la vista HTML 
        var tiempo = hora + ":" + minuto + ":" + segundo + " " + meridiano;    
        $('#reloj').text(tiempo);
        // Cargamos el reloj a los 500 milisegundos 
        setTimeout(cargar_reloj, 500);
    }
    // Ejecutamos la función 'CargarReloj' 
    cargar_reloj();
});