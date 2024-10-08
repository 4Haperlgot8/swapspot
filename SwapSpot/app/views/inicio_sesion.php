<?php
include("../../config/conexion_bd.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/assets/css/styless.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Pacifico&display=swap" rel="stylesheet">
    <title>Iniciar sesion o Registrarse</title>
</head>
<body class="body_i">
    <div class="container">
        <div class="form-container">
            <a href="../../public/index.php"><h2 style="text-align: center;">SwapSpot</h2></a>
            <div class="toggle">
                <button id="loginBtn" class="active">Iniciar Sesión</button>
                <button id="registerBtn">Registrarse</button>
            </div>

            <!-- login -->
            <form action="../models/login.php" method="POST" id="loginForm">
                <h2>Iniciar Sesión</h2>
                <input type="email" id="loginEmail" placeholder="Correo Electrónico" required class="input" name="Email">
                <input type="password" id="loginPassword" placeholder="Contraseña" required class="input" name="contrasena">
                <button type="submit" class="submit-btn" class="button3">Ingresar</button>
            </form>

            <!-- Formulario de Registro -->
            <form action="../php/registro_usuario.php" method="POST" id="registerForm" class="hidden">
            <h2>Registrarse</h2>
                <input type="text" id="registerName" placeholder="Nombre" required class="input" name=nombre >

                <input type="text" id="registerName" placeholder="Apellido" required class="input" name="apellido">

                <input type="email" id="registerEmail" placeholder="Correo Electrónico" required class="input" name="Email">

                <input type="number" id="registerPhone" placeholder="Número de Celular" required class="input" name="numero_de_celular">

                <input type="text" id="registerAddress" placeholder="Dirección" required class="input" name="direccion">

                <input type="password" id="registerPassword" placeholder="Contraseña" required class="input" name="contrasena">

                <button type="submit" class="submit-btn">Registrarse</button>
            </form>
        </div>
    </div>
    <script src="../../public/assets/js/script.js"></script> 
</body>
</html>