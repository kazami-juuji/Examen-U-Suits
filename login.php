<?php
session_start();
    // if (isset($_SESSION['usuario'])) {
    //     header('location: index.php');
    // }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="./public/css/style.css">
    <style>
        body {
            background-color: purple;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            height: 50vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }       
    </style>
</head>
<body>
    <form id="frm_login" class="container mt-3">
        <div class="row  justify-content-center">
            <div class="col-4 fondo">
                <div class="py-4">
                    <h3 class="text-center"> Ingresar datos de usuario</h3>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="usuario" name="usuario" type="text" placeholder="<i
                        class='fa-solid fa-envelope me-2'></i>e-mail">
                        <label class="text-primary" for="usuario">
                            <i>
                            </i>nombre de usuario
                        </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="password" name="password" type="password" placeholder="<i
                        class='fa-solid fa-envelope me-2'></i>e-mail">
                        <label class="text-primary" for="usuario">
                            <i>
                            </i>password
                        </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="rol" name="rol" type="text" placeholder="<i
                        class='fa-solid fa-envelope me-2'></i>e-mail">
                        <label class="text-primary" for="usuario">
                            <i>
                            </i>rol
                        </label>
                    </div>
                    <button type="button" id="iniciar_sesion" class="btn btn-primary" style="background-color: red;">Iniciar Sesion</button>
                    <a href="./registro.php" id="btn_iniciar" class="btn btn-primary" style="background-color: blue;">Registrarse</a>
                </div>
            </div>
        </div>
    </form>
    <script src="./public/js/jquery.js"></script>
    <script src="./public/js/login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
