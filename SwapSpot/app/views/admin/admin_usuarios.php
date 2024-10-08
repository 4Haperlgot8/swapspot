<?php
    include("../../../config/conexion_bd.php");
    include("../../controllers/sesion.php"); // Archivo que contiene la conexión a la base de datos
        
    $sql = "SELECT * FROM usuarios WHERE Cargo = 2";
    $resultado = mysqli_query($conexion, $sql);

    mysqli_close($conexion)
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
            <a href="administrador.php" class="Logo">SwapSpot</a>
        </header>
        <!--SE MUESTRAN LOS DATOS DEL USUARIO-->
        <section class="center">
        
            <div class="table-styled">
            
                <table>
                    <thead>
                        <tr>
                            <td> Id_usuario </td>
                            <td> Nombres </td>
                            <td> Apellidos </td>
                            <td> Email </td>
                            <td> Suspender </td>
                            <td> Estado </td>

                        </tr>
                    </thead>
                    <?php while ($row = $resultado->fetch_assoc()) { ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row['Id_usuario']; ?></td>
                            <td><?php echo $row['Nombres']; ?></td>
                            <td><?php echo $row['Apellidos']; ?></td>
                            <td><?php echo $row['Email']; ?></td>
                            <td>
                                <?php 
                                    echo $row['Estado'] == 1 ? 'Inactivo' : 'Activo'; 
                                ?>
                            </td>
                            <td>
                                <a href="../../models/models_admin/suspender_usuario.php?id=<?php echo $row['Id_usuario']; ?>" onclick="return confirm('¿Estás seguro de que deseas activar/desactivar este usuario?');">
                                Activar/Desactivar
                                </a>
                        </td>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>

                
                
            </div>
            
        </section>
    </body>
</html>

