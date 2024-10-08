<?php

    include("../../../config/conexion_bd.php"); 
    include("../../controllers/sesion.php"); 

    // Verifica la ID
    if (isset($_GET['id'])) {
        $id_intercambio = $_GET['id']; // Obtiene el ID de la URL

        //Realizamos la actualizacion del estado
        $aceptar = "UPDATE intercambio SET Estado_intercambio = 3 WHERE Id_intercambio = '$id_intercambio'";
        $resultado = mysqli_query($conexion, $aceptar);
        mysqli_close($conexion);

    } else {
        echo "No se proporcionó ningún ID.";
    }

?>