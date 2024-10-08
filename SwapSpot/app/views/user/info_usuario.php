<?php
    include("../../../config/conexion_bd.php");
    include("../../controllers/sesion.php"); // Archivo que contiene la conexión a la base de datos

    // Asegúrate de que la sesión esté iniciada y el email del usuario esté disponible
    if (isset($_SESSION['Email'])) {
        
        $query = "SELECT Nombres, Apellidos, Email, Direccion, Celular FROM Usuarios WHERE Email = '$email'";

        if ($result = $conexion->query($query)) {
            while ($row = $result->fetch_assoc()) {
                // Solo un usuario debería ser devuelto
                $Nombres = $row["Nombres"];
                $Apellido = $row["Apellidos"];
                $Email = $row["Email"];
                $Direccion = $row["Direccion"];
                $Celular = $row["Celular"];
            }
            $result->free();
        }}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../../public/assets/css/styless.css">
        <link rel="stylesheet" href="../../../public/assets/css/tabla.css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Pacifico&display=swap" rel="stylesheet">
        <title>SwapSpot</title>
    </head>
    <body>
        <header>
            <a href="sesion_iniciada.php" class="Logo">SwapSpot</a>
        </header>
        <!--SE MUESTRAN LOS DATOS DEL USUARIO-->
        <section class="center">
            <div class="table-styled">
                <table>
                    <thead>
                        <tr>
                            <td> Nombres </td>
                            <td> Apellidos </td>
                            <td> Email </td>
                            <td> Direccion </td>
                            <td> Celular </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $Nombres; ?></td>
                            <td><?php echo $Apellido; ?></td>
                            <td><?php echo $Email; ?></td>
                            <td><?php echo $Direccion; ?></td>
                            <td><?php echo $Celular; ?></td>
                        </tr>
                    </tbody>
                </table>

                <button class="b-update"onclick="location.href='actualizar_info.php'"> 
                    Actualizar informacion 
                </button>
    
            </div>
        </section>
    </body>
</html>

