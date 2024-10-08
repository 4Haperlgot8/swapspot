<?php
    include("../../../config/conexion_bd.php");
    include("../../controllers/sesion.php"); 
    
    $Id_usuario_sesion = $_SESSION['Id_usuario_sesion']; // ID del usuario que publicó el producto

    // Modifica la consulta para incluir la columna estado
    $sql = "SELECT * FROM intercambio 
            INNER JOIN articulo ON Id_articulo = Articulo 
            INNER JOIN usuarios ON Usuario_ofertante = Id_usuario 
            INNER JOIN Estado ON Estado_intercambio = Id_estado
            WHERE Usuario = '$Id_usuario_sesion' 
            ORDER BY articulo DESC";
    $result = mysqli_query($conexion, $sql);

    mysqli_close($conexion);
    
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
        <h1>OFERTAS A MIS PRODUCTOS</h1>
        <nav class="navbar">
            <button class="boton-cerrar">
                <img src="../../../public/assets/images/iconos/circulo-de-usuario.png" alt="Inicio_sesion" width="30px" title="Iniciar sesión o Registrarse">
            </button>
            <div class="container-cerrar-sesion">
                <img src="../../../public/assets/images/iconos/circulo-de-usuario.png" alt="Usuario">
                <span class="nombre-usu">Yo</span>
                <span class="cerrar-sesion">
                    <a class="cerrar-sesion" onclick="window.location.href='../../controllers/cerrar_sesion.php';">Cerrar Sesión</a>
                </span>
                <span class="info-noti">
                    <a href="info_usuario.php">INFO</a>
                </span>
            </div>
            <a href="publicar_producto.php" class="publicar-btn">
                <img src="../../../public/assets/images/iconos/agregar.png" alt="agregar" width="30px" class="icon-publicar">
            </a> 
        </nav>
    </header>

    <div class="container">
        <?php while ($row = $result->fetch_assoc()) { 

            // Verificar el estado de la oferta
            if ($row['Estado_intercambio'] == 1 || $row['Estado_intercambio'] == 2) { ?>
                <div class="div-item">
                    <div class="izquierda">
                        <p>El usuario <?php echo $row['Nombres']; ?> <?php echo $row['Apellidos']; ?> ha hecho una oferta por tu artículo <?php echo $row['Nombre']; ?></p>
                    </div>
                    <div class="contenido">
                        <p>El estado de la oferta es <?php echo $row['Descripcion']; ?></p>
                    </div>

                    <?php if ($row['Estado_intercambio'] == 1) { ?>
                        <div class="derecha">
                            <button onclick="location.href='../../models/models_user/aceptar_oferta.php?id=<?php echo $row['Id_intercambio']; ?>'">Aceptar Oferta</button>
                            <button onclick="location.href='../../models/models_user/rechazar_oferta.php?id=<?php echo $row['Id_intercambio']; ?>'">Rechazar oferta</button>
                        </div>

                    <?php } else { ?>
                        <div class="derecha">
                            <button onclick="location.href='../../models/models_user/inter_realizado.php?id=<?php echo $row['Id_intercambio']; ?>'">Intercambio realizado</button>
                        </div>
                    <?php } ?>
                </div>

            <?php } else { ?>
                <p>No tienes ofertas pendientes.</p>
        <?php } } ?>

    </div>
</body>
</html>
