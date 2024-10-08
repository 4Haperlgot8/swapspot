<?php
    include("../../../config/conexion_bd.php");
    include("../../controllers/sesion.php"); // Archivo que contiene la conexión a la base de datos
    
    // Recupera el ID del producto de la URL
    $product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    // Consulat el nombre del producto 
    $query = "SELECT Id_articulo, Nombre, Descripcion_producto, Precio, cambio, Imagen, Nombre_ca FROM articulo INNER JOIN categoria ON Id_categoria = categoria WHERE Id_articulo = ' $product_id'";
    $resultado = $conexion->query($query); 
    //CONSULTAS DE LAS CATEGORIAS
    
?>  
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/assets/css/styless.css">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Linden+Hill:ital@0;1&display=swap" rel="stylesheet">
    <!--<link rel="icon" href="img/favicon_io/favicon-32x32.png" type="image/x-icon"> Logo Cambiar-->
    <!-- fuente precio-swap -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <title>SwapSpot</title>
</head>
<body>
    <header>
        <a href="Sesion_iniciada.php" class="Logo">SwapSpot</a>
        <nav class="Buscar">
            <h1 class="Buscar2">
            <input type="text" placeholder="Buscar" class="Buscar_i">
            <i class="busqueda"><img src="../../../public/assets/images/iconos/busqueda.png" alt="busqueda" width="27px"></i>
            </h1>
        </nav> 
        <!--Cambio-->
        <nav class="navbar">
                <button class="boton-cerrar">
                <img src="../../../public/assets/images/iconos/circulo-de-usuario.png" alt="Inicio_sesion" width="30px" title="Iniciar sesion o Registrarse"></button>
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
            <script src="botones_index.js"></script>
            </nav>
</header>
    <div class="back-row">
        <a href="sesion_iniciada.php">
            <svg viewBox="0 0 1024 1024" fill="#000000" class="icon-back" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path d="M669.6 849.6c8.8 8 22.4 7.2 30.4-1.6s7.2-22.4-1.6-30.4l-309.6-280c-8-7.2-8-17.6 0-24.8l309.6-270.4c8.8-8 9.6-21.6 2.4-30.4-8-8.8-21.6-9.6-30.4-2.4L360.8 480.8c-27.2 24-28 64-0.8 88.8l309.6 280z" fill=""></path>
                </g>
            </svg>
        </a>
    </div>
    <div class="container-all-product">
    <?php while ($row = $resultado->fetch_assoc()) { ?>
        <div class="container-producto">
            <div>
            <img src="<?php echo '../../../public/assets/images/images_productos/' . $row['Imagen']; ?>" alt="Producto" class="imagen-product-select">
            </div> 
                <div class="info-product-select">
                <div class="cat-product-select">
                    <h2 class="name-product-select"><?php echo $row['Nombre']; ?></h2>
                    <h2 class="categoria"> <?php echo $row['Nombre_ca']; ?></h2>
                </div>
                <div class="valor-swap">
                    <h3 class="precio"> <?php echo $row['cambio']; ?> </h3>
                    <h3 class="precio"> <?php echo $row['Precio']; ?> </h3>
                    <h3 class="swap"><?php echo $row['Descripcion_producto']; ?> </h3>
                </div>
                <button  class="cambiarocomprar" onclick="location.href='intercambio.php?id=<?php echo $row['Id_articulo']; ?>'">Cambiar/Comprar</button>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</body>
</html>