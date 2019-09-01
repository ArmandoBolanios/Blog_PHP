<?php error_reporting(E_ALL & ~E_NOTICE); ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Blog plantilla digital Web</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/estilos.css" />
    </head>
    <body>
    <?php include 'php/lib-blog.php';             ?>
        <?php  HeaderBlog(); //estandar encabezado.   ?>
        <?php  ContentBlog();  //va el contenido.     ?>
        
        <!-- Categorias -->
        <div class="holder-categorias">
            <h2 class="holder-tit-cat">
                Categorias
            </h2>
            <?php
            //incluimos conexion
            require_once 'conexion.php';
            
            //caonsulta SQL a categoria
            $sql = "SELECT * FROM categoria ORDER BY categoria_id DESC";
            $query = mysqli_query($ConexionBD, $sql);
            
            //comprobamos si existen registros
            if(mysqli_num_rows($query) > 0 ) {
                //salida de datos
                while($row = mysqli_fetch_assoc($query)) {
                    $categoria_id = $row['categoria_id'];
            ?>
            
            <!-- Visualizamos categorias desde la tabla categoria -->
            <div class="holder-a-cat">
                <a href="categorias.php?id=
                <?php echo $row['categoria_id']; ?> ">
                <?php echo $row['categoria']; ?>
                </a>
                <br />
            </div>
            
            <?php
                } //fin de while
            } // finde if
            ?>
            
        </div>
        <!-- termina categoria -->
        
        
        <!-- Resultado Blog -->
        <section class="holder50" >
            <h1 class="inline">Post</h1>
            <h4 class="inline">/rednes-neuronales-artificiales-hermann.com</h4><br />
            <br />
            
            
            <?php   //visualizacion de articulos del Blog
            //se hace la conexión...
            require_once 'conexion.php';
            
            //seleccionamos nuestra tabla articulos
            $sql = "SELECT * FROM articulos ORDER BY id_articulo  DESC";
            $resultado = mysqli_query($ConexionBD, $sql);
            
            //Comprobamos existencia
            if(mysqli_num_rows($resultado) > 0 ) {
                //salida
                while($row = mysqli_fetch_assoc($resultado)) {
            ?>
            
               
                <div class="holder-blog"><div class="padding03">
                   
                    <div class="inline">
                        <img src="img/calendario.png" alt="calendario.png" />
                    </div>
                    
                    <div class="inline">
                        <h6 class="bg-fecha">
                            <?php
                            echo $row['fecha'];
                            ?>
                        </h6>
                    </div>
                    
                    <div class="holder-contenido-blog">
                    <div class="padding1">
                    <h1>
                        <?php
                        echo $row['titulo'];
                        ?>
                    </h1>
                        <?php
                        echo $row['contenido']."<br/><br/>";
                        ?>
                        <?php
                        echo " <img src= '".$row['imagen']."' width='200px' height='200px' /> ";
                        ?>
                    </div>
                    </div>
                    
                    <div class="inline padding03">
                        <h6 class="grey">Autor: 
                        <?php
                        echo $row['autor'];
                        ?>                        
                        </h6>
                    </div>
                    
                    <div class="inline padding03">
                        <h6 class="grey">Categoria:
                         <a href="categorias.php?id=
                         <?php echo $row['categoria_id']; ?>
                         ">
                         <?php echo $row['categoria']; ?>
                            </a>
                        </h6>
                    </div>
                    
                </div>
                </div>
                
            <a class="btn-publicar" href="comentarios.php?id=
                <?php echo $row['id_articulo']; ?>" 
                title= "Publicar un comentario">Publicar un comentario
            </a> <br />
            <br />
            <hr /> <br />
            
            
            <?php
                } //fin de while
            }//fin de if
            else {
                echo "0 articulos.<br />";
            }
            ?>
            
        </section>
        <?php  FooterBlog();  //pie de página.    ?>
    </body>
</html>