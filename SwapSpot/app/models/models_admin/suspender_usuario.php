<?php

include("../../../config/conexion_bd.php");
include("../../controllers/sesion.php"); // Archivo que contiene la conexión a la base de datos

// Verificar si el usuario es un administrador
if (!isset($_SESSION['Cargo']) || $_SESSION['Cargo'] == 2) {
    header("Location:  ../../views/inicio_sesion.php");
    exit();
}

// Obtener el ID del usuario desde el formulario
if (isset($_POST['Id_usuario']) && !empty($_POST['Id_usuario'])) {
    $Id_usuario = $_POST['Id_usuario'];

    // Preparar y ejecutar la consulta para obtener el estado del usuario
    $sql = "SELECT Estado FROM usuarios WHERE Id_usuario='$Id_usuario'";
    $resultado = $conexion->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
        $Estado = $row['Estado']; // Obtener el valor del estado

        // Cambiar el estado del usuario según su valor actual
        if ($Estado == 0) {
            $suspender = "UPDATE usuarios SET Estado = 1 WHERE Id_usuario='$Id_usuario'";
            $ejecutar = mysqli_query($conexion, $suspender);
            header('Location: ../../views/admin/administrador.php');
        } elseif ($Estado == 1) {
            $suspender = "UPDATE usuarios SET Estado = 0 WHERE Id_usuario='$Id_usuario'";
            $ejecutar = mysqli_query($conexion, $suspender);
            header('Location: ../../views/admin/administrador.php');
        }
    } else {
        echo "Usuario no encontrado.";
    }

    exit();
} else {
    echo "ID de usuario no proporcionado o vacío.";
}
?>
