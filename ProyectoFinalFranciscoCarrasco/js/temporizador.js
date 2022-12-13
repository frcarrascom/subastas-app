//===
// VARIABLES
//===
var fechaDos = new Date(fechaF.value);
var timer;

timer = setInterval(function() {
    timeBetweenDates(fechaDos);
}, 1000);

//funcion que calcula el tiempo restante
function timeBetweenDates(fechaD) {

    var fechaUno = new Date();

    var difference = fechaD.getTime() - fechaUno.getTime();

    if (difference <= 0) {

        // Timer done
        clearInterval(timer);

    } else {

        var segundos = Math.floor(difference / 1000);
        var minutos = Math.floor(segundos / 60);
        var horas = Math.floor(minutos / 60);
        var dias = Math.floor(horas / 24);

        horas %= 24;
        minutos %= 60;
        segundos %= 60;

        document.getElementById("dias").textContent = dias + " días";
        document.getElementById("horas").textContent = horas + " horas";
        document.getElementById("minutos").textContent = minutos + " minutos";
        document.getElementById("segundos").textContent = segundos + " segundos";
    }
}