<?php
/*SE HACE LA CONEXION PARA QUE PUEDA ACCEDER A LA BASE DE DATOS */
    include("../../../config/conexion_bd.php");
        
    /* SE CREAN LAS VARIABLES PARA ALMACENAR LOS DATOS DEL REGISTRO */
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $Email = $_POST['Email'];
    $contrasena = $_POST['contrasena'];
    $direccion = $_POST['direccion'];
    $numero_de_celular = $_POST['numero_de_celular'];
    
    /* ENCRIPTAR LA CONTRASEÑA */
    $contrasena = hash('sha512', $contrasena);
    
    /* SE ALMACENAN LOS VALORES EN LA COLUMNA DE LA TABLA USUARIOS*/
    $query = "INSERT INTO usuarios(Nombres, Apellidos, Email, Contraseña, Direccion, Celular, Cargo, Estado)
    VALUES('$nombre', '$apellido', '$Email', '$contrasena', '$direccion', '$numero_de_celular', 2, 0)";
    
    /* VERIFICAR QUE EL CORREO NO SE REPITA */
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE Email = '$Email' ");
    if (mysqli_num_rows($verificar_correo) > 0){
        echo '
        <script>
        alert(" El correo ya se encuentr aregistrado ");
        window.location = "../../views/inicio_sesion.php";
        </script>
        ';
        exit();
    }
    /* SE EJECUTA PARA QUE PUEDA ALMACENAR */
    $ejecutar = mysqli_query($conexion, $query);
    /* SE MUESTRA UN MENSAJE EN PANTALLA PARA INDICAR SI EL USUARIO SE HA REGISTRADO O NO EXITOSAMNETE*/
    if($ejecutar){
        echo '
        <script>
        alert(" Se ha registrado exsitosamente ");
        window.location = "../../views/inicio_sesion.php";
        </script>
        ';
    }else{
        echo '  
        <script>
        alert(" Usuario no registrado.Intentelo nuevamente ");
        window.location = "../../views/inicio_sesion.php";
        </script>      
        ';
    }
    /* Cerramos la coneccion  */
    mysqli_close($conexion);
?>