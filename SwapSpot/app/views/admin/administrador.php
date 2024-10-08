<?php
include("../../../config/conexion_bd.php");
include("../../controllers/sesion.php"); // Archivo que contiene la conexión a la base de datos

$query = "SELECT Id_articulo, Nombre, Precio, cambio, Imagen FROM articulo";
$resultado = $conexion->query($query);

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
        <a href="administrador.php" class="Logo">SwapSpot</a>
        <nav class="Buscar">
            <h1 class="Buscar2">
                <input type="text" placeholder="Buscar" class="Buscar_i">
                <i class="busqueda"><img src="../../../public/assets/images/iconos/busqueda.png" alt="busqueda" width="27px"></i>
            </h1>
        </nav> 
        <nav class="navbar">
            <button class="boton-cerrar">
                <img src="../../../public/assets/images/iconos/circulo-de-usuario.png" alt="Inicio_sesion" width="30px" title="Iniciar sesion o Registrarse">
            </button>
            <div class="container-cerrar-sesion">
                <img src="../../../public/assets/images/iconos/circulo-de-usuario.png" alt="Usuario">
                <span class="nombre-usu">Admin</span>
                <span class="cerrar-sesion">
                    <a class="cerrar-sesion" onclick="window.location.href='../../controllers/cerrar_sesion.php';">Cerrar Sesión</a>
                </span>
                <span class="info-noti">
                    <a href="admin_usuarios.php">Usuarios</a>
                </span>
            </div>
        </nav>
    </header>
    
    <div class="container-items">
        <?php while ($row = $resultado->fetch_assoc()) { ?>
            <div class="item">
                <a href="../user/producto_info.php?id=<?php echo $row['Id_articulo']; ?>" class="link-product">
                    <figure>
                        <img src="<?php echo '../../../public/assets/images/images_productos/' . $row['Imagen']; ?>" alt="producto" title="">
                    </figure>
                    <div class="Info_producto">
                        <h2 class="name-product"><?php echo $row['Nombre']; ?></h2>
                        <p class="price">Precio <?php echo number_format($row['Precio'], 2, ',', '.'); ?></p>
                        <p class="cambio">Cambio <?php echo $row['cambio']; ?></p>
                    </div>
                    </a>
                    <button  class="cambiarocomprar" onclick="location.href='../../models/models_admin/eliminar_publicacion.php?id=<?php echo $row['Id_articulo']; ?>'">Eliminar</button>

            </div>
        <?php } ?>
    </div>

    <script src="../../../public/assets/js/botones_index.js"></script>
</body>
</html>
