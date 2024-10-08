<?php

include("../../../config/conexion_bd.php");// Archivo que contiene la conexión a la base de datos
include("../../controllers/sesion.php"); 


if (!isset($_SESSION['Cargo']) || $_SESSION['Cargo'] == 2) {
    header("Location:  ../../views/inicio_sesion");
    exit();
}

// Obtener el ID del usuario desde el formulario
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    // Preparar y ejecutar la consulta para eliminar el usuario
    $sqll = "DELETE FROM articulo WHERE Id_articulo='$product_id'";
    $ejecutar = mysqli_query($conexion, $sqll);
    header("Location:  ../../views/admin/administrador.php");
exit();

?>