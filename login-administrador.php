<?php error_reporting(E_ALL & ~E_NOTICE);
session_start();
//control para login de administrador
if($_POST['login']) {
    $admin = 'armando';
    $admin_passw = 'Lacrimosa';

    $usuario = strip_tags($_POST['usuario']);
    $usuario = strtolower($usuario);
    $password = strip_tags($_POST['password']);
    
    if($usuario == $admin && $password == $admin_passw) {
        //Activamos la sesion para el administrador
        $_SESSION['usuario'] = $usuario;
        
        //redirigimos la página administradora
        header('location: administrador.php');
    }
    else {
    echo "<div class= holder-error>Error, el usuario o contraseña son incorrectos. </div>";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Login Administrador de Blog</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/estilos.css" />
    </head>
    <body>
        <?php include 'php/lib-blog.php';             ?>
        <?php  HeaderBlog(); //estandar encabezado.   ?>
        <?php  ContentBlog();  //va el contenido.     ?>
        <section class="holder50" >
            <!-- Formulario Login -->
            <form method="POST" action="">
                
                <fieldset>
                    <legend>Login</legend>
                    Usuario: <input type="text" name="usuario" placeholder="*" /> <br />
                    Contraseña: <input type="password" name="password" placeholder="*" /> <br />
                    <br />
                    <input type="submit" name="login" value="¡Login!" />
                </fieldset>
            </form>
            <img src="img/chip.jpg" width="2000" height="200" >
        </section>
        
        <?php  FooterBlog();  //pie de página.    ?>
    </body>
</html>