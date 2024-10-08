<?php
    include("../../../config/conexion_bd.php");
    include("../../controllers/sesion.php"); 
    
    $query = "SELECT Id_articulo, Nombre, Precio, cambio, Imagen FROM articulo";
    $resultado =  mysqli_query($conexion, $query);
    
    $Id_usuario_sesion = $_SESSION['Id_usuario_sesion']; // ID del usuario que publicó el producto
    
    $sql = "SELECT * FROM intercambio INNER JOIN articulo ON Id_articulo = Articulo INNER JOIN usuarios ON Usuario_ofertante = Id_usuario WHERE Usuario = '$Id_usuario_sesion'";
    $result = mysqli_query($conexion, $sql);
    
    mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../../public/assets/css/styless.css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Pacifico&display=swap" rel="stylesheet">
        <title>SwapSpot</title>
    </head>
    <body>
        <header>
            <a href="sesion_iniciada.php" class="Logo">SwapSpot</a>
            <nav class="Buscar">
                <h1 class="Buscar2">
                    <input type="text" placeholder="Buscar" class="Buscar_i">
                    <i class="busqueda"><img src="../../../public/assets/images/iconos/busqueda.png" alt="busqueda" width="27px"></i>
                </h1>
            </nav> 
            <nav class="navbar">
                <button class="boton-cerrar">
                    <img src="../../../public/assets/images/iconos/circulo-de-usuario.png" alt="Inicio_sesion"width="30px" title="Iniciar sesion o Registrarse">
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
                
                <button class="boton-noti"><img src="../../../public/assets/images/iconos/notificacion.png" alt="notificaciones" 
                class="icon-noti"></button>

                <?php while ($row = $result->fetch_assoc()) {
                    if ($row['Estado_intercambio'] == 1 || $row['Estado_intercambio'] == 2) { ?>
                        <div class="hidden-noti container-noti">
                            <img src="../../../public/assets/images/iconos/circulo-de-usuario.png" alt="Usuario">
                            <span class="nombre-usu-ofer"><?php echo $row['Nombres']; ?></span>
                            <span class="ofer-text">Ha ofrecido por tu producto</span>
                            <span class="ver">
                                <a href="detalles_oferta.php?id=<?php echo $row['Id_intercambio'];?>">VER</a>
                                <a href="todas_ofertas.php">Ver_todos</a>
                            </span>
                        </div>

                    <?php } else { ?>
                    <p>No tienes ofertas pendientes.</p>
                <?php } } ?>

                <a href="publicar_producto.php" class="publicar-btn">
                    <img src="../../../public/assets/images/iconos/agregar.png" alt="agregar" width="30px" class="icon-publicar">
                </a> 
            </nav>
        </header>
        
        <div class="container-items">

            <?php while ($row = $resultado->fetch_assoc()) { ?>
                
                <div class="item">
                    <a href="producto_info.php?id=<?php echo $row['Id_articulo']; ?>" class="link-product">
                        <figure>
                            <img src="<?php echo '../../../public/assets/images/images_productos/'.$row['Imagen']; ?>" alt="producto" title="">
                        </figure>
                        <div class="Info_producto">
                            <h2 class="name-product"><?php echo $row['Nombre']; ?></h2>
                            <p class="price">Precio <?php echo number_format($row['Precio'], 2, ',', '.'); ?></p>
                            <p class="cambio">Cambio <?php echo $row['cambio']; ?></p>
                        </div>
                    </a>
                        <button  class="cambiarocomprar" onclick="location.href='intercambio.php?id=<?php echo $row['Id_articulo']; ?>'">Cambiar/Comprar</button>
                </div>

            <?php } ?>

        </div>
        <script src="c.js"></script>
        <script src="../../../public/assets/js/botones_index.js"></script>
    </body>
</html>
