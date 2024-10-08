<?php 

    include("../../../config/conexion_bd.php");// Archivo que contiene la conexión a la base de datos
    include("../../controllers/sesion.php"); //Archivo con variables de sesion 

    $sql = 'SELECT * FROM usuarios Where Id_usuario = "'.$_SESSION['Id_usuario_sesion'].'"';
    if ($resultado = $conexion->query($sql)) {
        while ($row = $resultado->fetch_assoc()) {
            $Nombres = $row["Nombres"];
            $Apellidos = $row["Apellidos"];
            $Email = $row["Email"];
            $Celular = $row["Celular"];
            $Direccion = $row["Direccion"];
        }
        $resultado->free();
    } 
    
    mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../../public/assets/css/styless.css">
        <link rel="icon" href="img/favicon_io/favicon-32x32.png" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Pacifico&display=swap" rel="stylesheet">
        <title>Publicar Producto - SwapSpot</title>
    </head>
    <body class="body_i">
        <div class="salir">
            <div class="back-row">
                <a href="sesion_iniciada.php"> </a>
            </div>
        </div>
        <div class="container">
            <h2>Actualiza tus datos</h2>
            <p>Borra y reemplaza los datos que quieras eliminar. <br>Los que no dejalos como estan <br></p>
            <div class="form-image-container">
                <form action="../../models/models_user/info_actualizar.php" method="POST" enctype="multipartform-data" class="form-container" >

                <!--El id del usuario-->
                <input type="text" name=id_usuario_sesion value="<?php echo($Id_usuario_sesion); ?>" hidden>

                <input type="text" id="registerName" required class="input" name=nombre_ac value="<?php echo ($Nombres); ?>">

                <input type="text" id="registerName" required class="input" name="apellido_ac" value="<?php echo ($Apellidos); ?>">
                
                <input type="email" id="registerEmail" required class="input" name="email_ac" value="<?php echo ($Email); ?>">
                
                <input type="number" id="registerPhone" required class="input" name="numero_de_celular_ac" value="<?php echo ($Celular); ?>">
                
                <input type="text" id="registerAddress" required class="input" name="direccion_ac" value="<?php echo ($Direccion); ?>">
                
                <button type="submit" class="submit-btn">Actualizar datos</button>

                </form>
            </div>
        </div>
        <script src="../../../public/assets/js/botones_index.js"></script>
    </body>
</html>