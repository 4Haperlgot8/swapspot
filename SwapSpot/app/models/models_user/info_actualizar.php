<?php
/*SE HACE LA CONEXION PARA QUE PUEDA ACCEDER A LA BASE DE DATOS */
    include("../../../config/conexion_bd.php");
    include("../../controllers/sesion.php");
        
    /* SE CREAN LAS VARIABLES PARA ALMACENAR LOS DATOS DEL REGISTRO */
    $id_usuario_sesion = $_POST['id_usuario_sesion'];
    $nombre_ac = $_POST['nombre_ac'];
    $apellido_ac = $_POST['apellido_ac'];
    $email_ac = $_POST['email_ac'];
    $numero_de_celular_ac = $_POST['numero_de_celular_ac'];
    $direccion_ac = $_POST['direccion_ac'];
    
    /* SE ALMACENAN LOS VALORES EN LA COLUMNA DE LA TABLA USUARIOS*/
    $update = "UPDATE usuarios SET Nombres = '$nombre_ac', Apellidos = '$apellido_ac', Email = '$email_ac', Celular = '$numero_de_celular_ac', Direccion = '$direccion_ac' WHERE Id_usuario = '".$_SESSION['Id_usuario_sesion']."'";
    
    $ejecutar = mysqli_query($conexion, $update);
    /* SE MUESTRA UN MENSAJE EN PANTALLA PARA INDICAR SI SE HAN ACTUALIZADO LOS DATOS EXITOSAMNETE*/
    if($ejecutar){
        echo '
        <script>
        alert(" Los datos se han actualizado exitosamente ");
        window.location = "../../views/user/info_usuario.php";
        </script>
        ';
    }else{
        echo '  
        <script>
        alert(" !ERROR¡ Porfavor intentelo nuevamente ");
        window.location = "../../views/user/info_usuario.php";
        </script>      
        ';
    }
    /* Cerramos la coneccion  */
    mysqli_close($conexion);
?>