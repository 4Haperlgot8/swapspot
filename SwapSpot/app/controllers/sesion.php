<?php
/* MANTIENE LA SESION EN LAS PAGINAS REQUERIDAS */
    session_start();

    include $_SERVER['DOCUMENT_ROOT'] . '/SwapSpot/config/conexion_bd.php';

    
    if (isset($_SESSION['Email'])) {  // Verifica si la sesión está establecida
        $email = $_SESSION['Email'];
        
        // Consulta para obtener el Id_usuario y el Cargo (rol) del usuario
        $query = "SELECT Id_usuario, Cargo FROM Usuarios WHERE Email = '$email'";
        
        if ($resultado = $conexion->query($query)) {
            if ($row = $resultado->fetch_assoc()) {
                // Almacena el Id_usuario y el Cargo en la sesión para su uso posterior
                $_SESSION['Id_usuario_sesion'] = $row["Id_usuario"];
                $_SESSION['Cargo'] = $row["Cargo"];  // Almacena el Cargo en la sesión
            } else {
                // Si no se encuentra el usuario, redirigir al usuario a la página de inicio de sesión
                header("Location: ../views/inicio_sesion");
                exit();
            }
            $resultado->free();
        } else {
            // Manejo de errores de consulta SQL
            echo "Error en la consulta SQL: " . $conexion->error;
        }
    } else {
        // Si la sesión no está establecida, redirigir al usuario a la página de inicio de sesión 
        header("Location:  ../views/inicio_sesion");
        exit();
    }

?>
