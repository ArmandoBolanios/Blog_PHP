<?php
if(isset($_POST['insertar_comentario'])) {
    require_once 'conexion.php';
    
    //obtenemos datos del formulario
    $nick = mysqli_real_escape_string($ConexionBD,$_POST['nick']);
    $comentario = mysqli_real_escape_string($ConexionBD,$_POST['comentario']);
    $fecha = mysqli_real_escape_string($ConexionBD,$_POST['fecha']);

    
    if($nick && $comentario && $fecha) {
        //insert into
        $sql = "INSERT INTO comentarios VALUES('','{$_GET['id']}', '$nick','$comentario','$fecha')";
        
        mysqli_query($ConexionBD, $sql);
        
        header('location: #coment');
        
        //cerramos conexión
        mysqli_close($ConexionBD);
    } else {
        echo "<div class=holder-error>Debes rellenar todos los campos obligatorios.</div>";
    } //fin de else
} // fin de if


?>