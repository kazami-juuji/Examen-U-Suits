const registrar_usuario = () => {
    let nombre = document.getElementById('nombre').value;
    let apellido = document.getElementById('apellido').value;
    let anio_ingreso = document.getElementById('anio_ingreso').value;
    let carrera = document.getElementById('carrera').value;
    let anio_nacimiento = document.getElementById('anio_nacimiento').value;
    let data = new FormData();
    data.append("nombre", nombre);
    data.append("apellido", apellido); 
    data.append("anio_ingreso", anio_ingreso); 
    data.append("carrera", carrera); 
    data.append("anio_nacimiento", anio_nacimiento); 
    fetch("app/controller/registro-usuario.php", {
        method: "POST",
        body: data
    }).then(respuesta => respuesta.json())
    .then(async respuesta => {
        if (respuesta[0] == 1) {
            alert(`${respuesta[1]}`)
            window.location = "login.php";
        } else {
            alert(`${respuesta[1]}`)
        }
    });
}
document.getElementById('registrar_alumno').addEventListener('click',() => {
    registrar_usuario();
});