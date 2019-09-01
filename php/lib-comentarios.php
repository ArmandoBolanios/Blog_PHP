<?php
    function HeaderBlog() {
?>
        <!-- Encabezado estandar -->
        <header>
            <nav>
            <ul>
            <li><a href= "administrador.php">Admininistrador</a></li>
            <li><a href="blog.php">Blog</a></li>
            </ul>
            </nav>

            <div clas="bg2"></div>

            <div class="holder-tit">
            <section class="bg-tit">
                <h1 class="white"> Redes Neuronales Artificiales (RNA)</h1>
                <span class="small">Todo lo que necesitas saber de Redes Neuronales Artificiales. </span>
                </section>
            </div>
</header>

<div id="flujo-header">
    <!-- Flujo copn nuestro documento fixed... -->
</div>



<?php
    } //fin de la funcion HeaderBlog
    function FooterBlog() {


?>

<!-- flujo footer -->
<div class="holder-last"> </div>

<!-- página estándar -->
<footer class="holder-f-admin">
    <section class="holder50">
        
        <!-- Formulario para insertar un nuevo comentario de usuario a TABLA comentario  -->
        <form method="POST" action="">
            <fieldset>
                <legend>Publicar comentario</legend>
                Nickname: <input type="text" name="nick" placeholder="*" /> <br />
                Comentario: <br />
                <textarea name="comentario" placeholder="*"></textarea><br />
                Fecha: <input type="text" name="fecha" value="
                <?php
                date_default_timezone_set("America/Chihuahua");
                echo date("Y-m-d H:i:s");
                ?>
                ">
                <br /> <br />
                
                <input type="submit" name="insertar_comentario" value="Comentar articulo" />
                
            </fieldset>
        </form>
        <br />
        <a href="blog.php" title="Regresar al Blog">Regresar</a><br />
        </hr >
        <h6 class="center">&copy; Copyright 2016 ITSM-SISTEMAS COMPUTACIONALES, todos los derechos reservados.</h6>
    </section>
</footer>


<?php
    }
function ContentBlog() {
    ?>
<?php
}
?>