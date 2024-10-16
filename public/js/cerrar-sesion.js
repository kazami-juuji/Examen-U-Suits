const cerrar_sesion = () => {
    fetch("./app/controller/cerrar-sesion.php")
    .then(respuesta => respuesta.json())
    .then(respuesta => {
        if (respuesta[0] == 1) {
            alert(`${respuesta[1]}`);
            window.location = "login.php"; // Redirigir al listado después de la actualización
        }
    });
}
document.getElementById('cerrar').addEventListener('click',() => {
    cerrar_sesion();
});