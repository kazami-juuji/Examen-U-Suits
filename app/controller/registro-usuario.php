<?php
require_once "../config/conexion.php";
session_start();

$expresion = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

if ($_POST) {
    // Validar que todos los campos estén presentes
    if (isset($_POST['nombre']) && !empty($_POST['nombre']) && isset($_POST['apellido']) && !empty($_POST['apellido'])
        && isset($_POST['anio_ingreso']) && !empty($_POST['anio_ingreso']) && isset($_POST['carrera']) && !empty($_POST['carrera'])
        && isset($_POST['anio_nacimiento']) && !empty($_POST['anio_nacimiento'])) {

        // Validar que el nombre no sea numérico
        if (is_numeric($_POST['nombre'])) {
            echo json_encode([0, "No puedes agregar números en el input nombre"]);
        } else {

            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $anio_ingreso = $_POST['anio_ingreso'];
            $carrera = $_POST['carrera'];
            $anio_nacimiento = $_POST['anio_nacimiento'];
            $rol = 'Alumno';

            // Generar una contraseña aleatoria de 8 caracteres
            $passwordAleatoria = generarPasswordAleatoria(8);
            // Encriptar la contraseña generada
            $contrasenaEncriptada = password_hash($passwordAleatoria, PASSWORD_BCRYPT);

            try {
                // Iniciar una transacción
                $conexion->beginTransaction();

                // Inserción en t_alumno
                $insercionAlumno = $conexion->prepare("INSERT INTO t_alumno (nombre, apellido, anio_ingreso, carrera, anio_nacimiento) 
                VALUES (:nombre, :apellido, :anio_ingreso, :carrera, :anio_nacimiento)");

                $insercionAlumno->bindParam(':nombre', $nombre);
                $insercionAlumno->bindParam(':apellido', $apellido);
                $insercionAlumno->bindParam(':anio_ingreso', $anio_ingreso);
                $insercionAlumno->bindParam(':carrera', $carrera);
                $insercionAlumno->bindParam(':anio_nacimiento', $anio_nacimiento);

                $insercionAlumno->execute();

                // Inserción en t_usuario
                $insercionUsuario = $conexion->prepare("INSERT INTO t_usuario (usuario, password, rol) VALUES
                (:usuario, :password, :rol)");

                $insercionUsuario->bindParam(':usuario', $nombre);
                $insercionUsuario->bindParam(':password', $contrasenaEncriptada);  // Contraseña encriptada
                $insercionUsuario->bindParam(':rol', $rol);

                $insercionUsuario->execute();

                // Confirmar la transacción si todo va bien
                $conexion->commit();

                // Mostrar la contraseña generada en la respuesta JSON
                echo json_encode([1, "Usuario registrado correctamente. Contraseña generada: " . $passwordAleatoria]);

            } catch (Exception $e) {
                // Revertir la transacción en caso de error
                $conexion->rollBack();
                echo json_encode([0, "Error al registrar usuario o alumno: " . $e->getMessage()]);
            }
        }

    } else {
        echo json_encode([0, "No puedes dejar campos vacíos"]);
    }
}

// Función para generar una contraseña aleatoria
function generarPasswordAleatoria($longitud) {
    $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $password = '';
    for ($i = 0; $i < $longitud; $i++) {
        $password .= $caracteres[rand(0, strlen($caracteres) - 1)];
    }
    return $password;
}
?>
