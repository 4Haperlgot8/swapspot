<?php
include("../config/conexion_bd.php");

$query = "SELECT Id_articulo, Nombre, Precio, cambio, Imagen FROM articulo";
$resultado = $conexion->query($query);

mysqli_close($conexion);

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/styless.css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Pacifico&display=swap" rel="stylesheet">
        <title>SwapSpot</title>
    </head>
    <body>
    <header>
        <a href="index.php" class="Logo">SwapSpot</a>
        <nav class="Buscar" ><a href="Inicio_sesion.php">
            <h1 class="Buscar2">
                <input type="text" placeholder="Buscar" class="Buscar_i">
                <i class="busqueda"><img src="assets/images/iconos/busqueda.png" alt="busqueda" width="27px"></i>
            </h1>
            </a>
        </nav> 
        <nav class="navbar">
            <a href="../app/views/inicio_sesion.php"> <img src="assets/images/iconos/circulo-de-usuario.png" alt="Inicio_sesion" width="30px" title="Iniciar sesion o Registrarse"></a>
            <a href="../app/views/inicio_sesion.php"><img src="assets/images/iconos/notificacion.png" alt="notificaciones" class="icon-noti"></a>
            <a href="../app/views/inicio_sesion.php" class="publicar-btn"><img src="assets/images/iconos/agregar.png" alt="agregar" width="30px" class="icon-publicar"></a> 
        </nav>
    </header>
        
        <div class="container-items">
            <?php while ($row = $resultado->fetch_assoc()) { ?>
                <div class="item">
                    <a href="../app/views/inicio_sesion.php?id=<?php echo $row['Id_articulo']; ?>" class="link-product">
                        <figure>
                            <img src="<?php echo 'assets/images/images_productos/'.$row['Imagen']; ?>" alt="producto" title="">
                        </figure>
                        <div class="Info_producto">
                            <h2 class="name-product"><?php echo $row['Nombre']; ?></h2>
                            <p class="price">Precio <?php echo number_format($row['Precio'], 2, ',', '.'); ?></p>
                            <p class="cambio">Cambio <?php echo $row['cambio']; ?></p>
                        </div>
                        </a>
                        <button  class="cambiarocomprar" onclick="location.href='../app/views/inicio_sesion.php?id=<?php echo $row['Id_articulo']; ?>'">Cambiar/Comprar</button>
    
                </div>
            <?php } ?>
        </div>
    
        <script src="c.js"></script>
        <script src="assets/js/botones_index.js"></script>
    </body>
</html>
