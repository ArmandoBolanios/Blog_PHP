<?php 
error_reporting(E_ALL & ~E_NOTICE); 
include 'sql/sql_comentarios.php';
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Comentarios</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/estilos.css" />
    </head>
    <body>
        <?php include 'php/lib-comentarios.php';             ?>
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
        
        <!-- Resultado Blog identificando su ID-->
        <section class="holder50" >
           <?php
            //incluimos conexion
            require_once 'conexion.php';
            
            //consulta sql 
            $sql = "SELECT * FROM articulos WHERE id_articulo = '{$_GET['id']}' ";
            $resultado = mysqli_query($ConexionBD, $sql);
            
            //comprobamos si existe el articulo
            if(mysqli_num_rows($resultado) > 0) {
                //visualizar los datos si existen
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
                         <?php echo $row['categoria_id']; ?>"
                         >
                         <?php echo $row['categoria']; ?>
                            </a>
                        </h6>
                    </div>
                </div> </div>
            <br />
            <hr /> <br />         
            
            <?php
                } // fin de while
            } // fin de if
            ?>
            
            <h3>Comentarios</h3> <br />
            <?php
            //ver los comentarios
            //incluimos conexion
            require_once 'conexion.php';
            
            //sentencia sql
            $sql = "SELECT * FROM comentarios WHERE id_articulo = '{$_GET['id']}' ORDER BY fecha";
            $resultado = mysqli_query($ConexionBD, $sql);
            
            //comprobamos si ha datos existentes
            if(mysqli_num_rows($resultado) > 0) {
                //salida de datos
                while($row = mysqli_fetch_assoc($resultado)) {      
            ?>
               
               <div class="holder-bg-comentario"> <div class="padding03">
                  <div class="holder-nick">
                   <h3>
                       <span class="bold">
                           Nickname:
                       </span>
                       <?php
                        echo $row['nick'];
                       ?>
                   </h3>
               </div>
               
               <div class="holder-comentario">
                   <?php
                    echo $row['comentario'];
                    ?>
               </div>
               
               <h6 class="inline grey padding03">
                   publicado el:
                   <?php
                    echo $row['fecha'];
                    ?>
               </h6>
               <h6 class="inline grey padding03">
                   #
                   <?php
                    echo $row['id_coment'];
                    ?>
               </h6>
                   </div> </div>
               
            <?php
                } //fin de while
            } // fin de if
            else {
                echo "0 comentarios. <br />";
            }
            ?>
            
            <a name="#coment">
                <!--  vinculo interno publicado-->
            </a>
        </section>
        <?php  FooterBlog();  //pie de página.    ?>
    </body>
</html>