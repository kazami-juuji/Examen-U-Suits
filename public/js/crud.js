// Función para editar producto
const editar_producto = (precio) => {
    let nombre_producto = document.getElementById('producto').value;
    let cantidad_producto = document.getElementById('cantidad').value;
    let precio_producto = document.getElementById('precio').value;

    let data = new FormData();
    data.append("producto", nombre_producto);
    data.append("cantidad", cantidad_producto);
    data.append("precio", precio_producto);
    data.append("action", "editar");

    fetch("./editar-prod.php?id=" + precio, { // Enviar el ID del producto a editar
        method: "POST",
        body: data
    }).then(respuesta => respuesta.json())
    .then(respuesta => {
        alert(respuesta[1]);
        if (respuesta[0] == 1) {
            alert(respuesta[1]);
            window.location = "../../index.php"; // Redirigir al listado después de la actualización
        }
    });
}
// Función para eliminar producto
const eliminar_producto = (id_usuario) => {
    if (confirm("¿Estás seguro de que deseas eliminar este Alumno?")) {
        let data = new FormData();
        data.append("producto_key", id_usuario); // Añadimos el id del producto
        data.append("action", "eliminar");

        fetch("./app/controller/borrar-alumno.php", {
            method: "POST",
            body: data
        }).then(respuesta => respuesta.json())
        .then(respuesta => {
            alert(respuesta[1]); // Mostrar mensaje de éxito o error
            if (respuesta[0] == 1) {
                alert(respuesta[1]);
                window.location = "index-administrador.php"; // Redirigir al listado después de la eliminación
            }
        });
    }
}