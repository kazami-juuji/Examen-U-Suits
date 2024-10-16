const iniciar_sesion = () => {
    let data = new FormData();
    data.append("usuario",$("#usuario").val());
    data.append("password",$("#password").val());
    data.append("rol",$("#rol").val());
    fetch("./app/controller/login.php", {
        method: "POST",
        body:data
    }).then(respuesta => respuesta.json())
    .then(respuesta => {
        if (respuesta[0]==1) {
            if (respuesta[2] == "Alumno") {
                alert(`${respuesta[1]}  ${respuesta[2]}`);
                window.location="index-alumno.php";
            } else if (respuesta[2] == "Administrador") {
                alert(`${respuesta[1]}  ${respuesta[2]}`);
                window.location="index-administrador.php";
                
            }
        }else{
            alert(respuesta[1]);
        }
    }).catch(error => error);

    
}
document.getElementById('iniciar_sesion').addEventListener('click',() => {
    iniciar_sesion();
});