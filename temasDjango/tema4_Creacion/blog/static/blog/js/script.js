// Botón "Subir" que lleva al inicio de la página
document.addEventListener("DOMContentLoaded", function () {
    var boton = document.getElementById("btn-subir");
    boton.addEventListener("click", function () {
        window.scrollTo({ top: 0, behavior: "smooth" });
    });
});
