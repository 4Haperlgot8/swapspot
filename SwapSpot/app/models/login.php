<?php
    /* MANTIENE LA SESION EN EL NAVEGADOR */
    session_start();

    /* SE HACE LA CONEXION PARA QUE PUEDA ACCEDER A LA BASE DE DATOS */
    include("../../config/conexion_bd.php");

    /* SE CREAN LAS VARIABLES PARA VALIDAR LOS DATOS DE CORREO Y CONTRASEÑA */
    $Email = $_POST['Email'];
    $contraseena = $_POST['contrasena'];
    $contrasena = hash('sha512', $contraseena);

    /* SE REALIZA LA CONEXION Y CONSULTA A LA BASE DE DATOS SOBRE EL CORREO Y LA CONTRASEÑA  */
    $validar = mysqli_query($conexion, "SELECT * FROM usuarios WHERE Email = '$Email' and Contraseña = '$contrasena'");

    /* SE REALIZA LA VALIDACION */
    if (mysqli_num_rows($validar) > 0) {
        $usuario = mysqli_fetch_assoc($validar);
        $_SESSION['Email'] = $Email;

        if ($usuario['Estado'] == 0) {

            if ($usuario['Cargo'] == 2) {
                header("location: ../views/user/sesion_iniciada.php");
            } elseif ($usuario['Cargo'] == 1) {
                header('Location: ../views/admin/administrador.php');
            }
            exit();
        }else{
                echo '
                <script>
                    alert("Usuario suspendido");
                    window.location = "../views/inicio_sesion.php";
                </script>
                ';
                exit();}
    } else {
        echo '
        <script>
            alert("Usuario no encontrado. Por favor verifique los datos ingresados.");
            window.location = "../views/inicio_sesion.php";
        </script>
        ';
        exit(); 
    }
?>
