<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location: login.php');
}
require_once "./app/config/dependencias.php";
require_once "./app/config/conexion.php";


// Consulta a la tabla t_producto
$sql = "SELECT * FROM t_alumno";
$query = $conexion->prepare($sql);
$query->execute();
$alumnos = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesion de Administrador</title>
    <link rel="stylesheet" href="<?=CSS.'style.css';?>">
</head>
<body>
<div class="row">
    <?php echo 'hola ' . $_SESSION['usuario']['usuario'] ?>
    <a id="cerrar" type="button">Cerrar sesion</a>
</div>
<h1 style="text-align: center;">Lista de Alumnos</h1>


<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre del Alumno</th>
            <th>Apellido</th>
            <th>Fecha de ingreso</th>
            <th>Carrera</th>
            <th>Fecha de nacimiento</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($alumnos as $alumno): ?>
        <tr>
            <td><?php echo $alumno['id_usuario']; ?></td>
            <td><?php echo $alumno['nombre']; ?></td>
            <td><?php echo $alumno['apellido']; ?></td>
            <td><?php echo $alumno['anio_ingreso']; ?></td>
            <td><?php echo $alumno['carrera']; ?></td>
            <td><?php echo $alumno['anio_nacimiento']; ?></td>
            <td class="actions">
            <td class="actions">
                <a href="./app/controller/editar-prod.php?id=<?php echo $alumno['id_usuario']; ?>" class="edit">Editar</a>
                <!-- Pasamos el id del alu$alumno a la función eliminar_producto() -->
                 <br>
                <a href="#" class="delete" onclick="eliminar_producto(<?php echo $alumno['id_usuario']; ?>);">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script src="./public/js/crud.js"></script>
<script src="./public/js/cerrar-sesion.js"></script>
</body>
</html>
