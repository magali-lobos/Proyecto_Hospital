// Verificar si el navegador soporta la reproducción de audio y la vibración
if ("vibrate" in navigator && "Audio" in window) {
    // Solicitar permiso para reproducir audio y activar la vibración
    document.addEventListener("DOMContentLoaded", function() {
        const miBtn = document.getElementById("miboton");
        const alarmaSound = document.getElementById("alarmaSound");
        const fechaHoraInput = document.getElementById("fechahora");

        miBtn.addEventListener("click", function() {
            // Reproducir el sonido de la alarma en bucle
            alarmaSound.loop = true;
            alarmaSound.play();

            // Vibrar durante 10 minutos (valor en milisegundos)
            navigator.vibrate(10);

            // Obtener la fecha y hora actual
            const fechaHoraActual = new Date();
            const fechaHoraFormateada = fechaHoraActual.toLocaleString();

            // Alerta para verificar el formato de fecha y hora
            alert(fechaHoraFormateada);

            // Llenar el campo oculto con la fecha y hora
            fechaHoraInput.value = fechaHoraFormateada;

            // Abrir una nueva pestaña con "emision.html"
            const nuevaPestana = window.open("emision.html", "_blank");

            if (nuevaPestana) {
                // La nueva pestaña se ha abierto con éxito
                console.log("Nueva pestaña abierta con 'emision.html'.");
            } else {
                // No se pudo abrir la nueva pestaña
                console.error("No se pudo abrir la nueva pestaña.");
            }
        });
    });
}