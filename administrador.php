<?php error_reporting(E_ALL & ~E_NOTICE);
    session_start();

//comprobamos si esta definida la sesion 'Administrador'.
    if(isset($_SESSION['usuario'])) {
        $usuario = ucfirst($_SESSION['usuario']);
    }
else {
    header('location: login-administrador.php');
    die();
}
?>

<html lang="es">
    <head>
        <title>Control | Administrador</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/estilos.css" />
    </head>
    <body>
       
        <img src="img/chip.jpg" width="2000" height="200" >
        <header>
            <nav>
            <ul>
            <li><a href= "administrador.php">Administrador</a></li>
            <li><a href="blog.php">Blog</a></li>
            </ul>
            </nav>
            
            <div clas="bg2"></div>
         
            <div class="holder-tit">
            <section class="bg-tit">
                <h1 class="white">  Redes Neuronales Artificiales</h1>
                <span class="small ">Bienvenido, <?php echo $usuario; ?>
                </span>
              </section>
            </div>
        </header>
        
<div id="flujo-header">
    <!-- Flujo con nuestro documento fixed... -->
    <br/><br/>
    
</div>
     
   <h1 class="center">PANEL DE CONTROL</h1>
   <section class="holder50">
    
     <?php
       //SQL insertar nuevo articulo a la BD
       if(isset($_POST['insert_articulo'])) {
        
           //incluimos conexion
           require_once 'conexion.php';
           
           //obtenemos datos del formulario mediante la variable superglobal
           $titulo = mysqli_real_escape_string($ConexionBD, $_POST['titulo']);
           $contenido = mysqli_real_escape_string($ConexionBD, $_POST['contenido']);
           $autor = mysqli_real_escape_string($ConexionBD, $_POST['autor']);
           $fecha = mysqli_real_escape_string($ConexionBD, $_POST['fecha']);
           $categoria_id = mysqli_real_escape_string($ConexionBD, $_POST['categoria_id']);
           $categoria; //= mysqli_real_escape_string($ConexionBD, $_POST['categoria']);
		   //$imagen = mysqli_real_escape_string($ConexionBD, $_POST['imagen']);
		    
                  
                  
                  //seleccionamos la tabla categorias
                  $cat = "SELECT * FROM categoria WHERE categoria_id = $categoria_id";
                  $resultado = mysqli_query($ConexionBD, $cat);
                  
                  if(mysqli_num_rows($resultado) > 0) {
                      while($row = mysqli_fetch_assoc($resultado)) {
                      $categoria = $row['categoria'];
                          //echo "<option value='$categoria'>" . $row['categoria'] . "</option>";
                      }
                  }
                  
		   $data;
		   
		   if ( ! isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] > 0){
               echo "ha ocurrido un error";
          } else {
    //ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
    //y que el tamano del archivo no exceda los 16mb
    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
    $limite_kb = 16384; //16mb es el limite de medium blob
     
    if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
     
        //este es el archivo temporal
        //$imagen_temporal  = $_FILES['imagen']['tmp_name'];  
        //este es el tipo de archivo
        //$tipo = $_FILES['imagen']['type'];
        //leer el archivo temporal en binario
        //$fp     = fopen($imagen_temporal, 'r+b');
        //$data = fread($fp, filesize($imagen_temporal));
        //fclose($fp);
        //escapar los caracteres
        //$data = base64_encode($data);
		$archivo = $_FILES['imagen']['tmp_name']; 
        $nombre = $_FILES['imagen']['name']; 
        $directorio = "img/";
		$data = $directorio.$nombre;

        /*$resultado = mysql_query("INSERT INTO articulos (imagen, tipo_imagen) VALUES ('$data', '$tipo') WHERE titulo='$titulo'");
        if ($resultado){
            echo "<div class=holder-error>el archivo ha sido copiado exitosamente</div>";
        } else {
            echo "<div class=holder-error>ocurrio un error al copiar el archivo.</div>";
        }*/
    } else {
        echo "<div class=holder-error>archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes</div>";
    }
}
           
           //Consulta MySQL para comprobar si existe el titulo en nuestra BD
           $sql = "SELECT * FROM articulos WHERE titulo = '$titulo' ";
           
           $existencia = mysqli_query($ConexionBD, $sql);
           
           //enviar mensaje de error en caso de existencia de un titulo repetido en nuestra BD
           if($existe = mysqli_fetch_object($existencia)) {
               echo "<div class=holder-error> El 'Titulo' que has introducido ya existe en TABLA 'Articulos'. </div";
           }
           
           //Comprobamos campos obligatorios
           else if($titulo && $contenido && $autor && $fecha) {
               $sql = "INSERT INTO articulos (titulo, contenido, autor, fecha, categoria_id, categoria,imagen)
               VALUES ('$titulo', '$contenido', '$autor', '$fecha', '$categoria_id', '$categoria','$data') ";
               
               mysqli_query($ConexionBD, $sql);
               echo "<div class=holder-ok>Su 'Articulo' fue posteado con exito. </div>";
               
               //Cierra conexión
               mysqli_close($ConexionBD);
           } else{
               echo "<div class=holder-error>Debes rellenar todos los campos obligatorios (*) para insertar 'Artículo' nuevo.</div>";
		   }
		   
		   
	
       } //Fin de Insertar Artículo ... en latbla articulos
       
       ?>
       
      <h2>Insertar contenidos...</h2>
      
      <form method="POST" action="administrador.php" enctype="multipart/form-data">
          <fieldset>
              <legend>Introducir un artículo</legend>
              Fecha: <input type="text" name="fecha" value=" <?php date_default_timezone_set("America/Chihuahua"); echo date('Y-m-d H:i:s'); ?>" />
              
              Título: <input type="text" name="titulo" placeholder="*" /> <br />
              
              Articulo: <br />
              <textarea name="contenido" placeholder="*"></textarea><br />
              
              Autor: <input type="text" name="autor" placeholder="*" /><br />
              
              Categorias: <br/>
              <select name="categoria_id">
                  <option value="">Categoria</option>
                  -->
                  <?php
                  require_once'conexion.php';
                  
                  //seleccionamos la tabla categorias
                  $sql = "SELECT * FROM categoria";
                  $resultado = mysqli_query($ConexionBD, $sql);
                  
                  if(mysqli_num_rows($resultado) > 0) {
                      while($row = mysqli_fetch_assoc($resultado)) {
                      $categoria_id = $row['categoria_id'];
                          echo "<option value='$categoria_id'>".$row['categoria']."</option>";
                      }
                  }
                  ?>
              </select><br/><br/>
              
              <label for="imagen">Imagen:</label>
		    <input type="file" name="imagen" id="imagen" />
              <br /><br />
              
              
              <br /><br />
              
              <input type="submit" name="insert_articulo" value="Publicar articulo" />
          </fieldset>
      </form>
      <!-- fin del formulario insertar nuevo articulo -->
      
      <br />
<!-- ==========================================================================================================-->
      <?php
       //SQL para formulario insertar a la tabla categoria
       if(isset($_POST['insert_categoria'])) {
           //Incluimos conexión
           require_once 'conexion.php';
           //obtenemos los datos de los campos del formulario
           //$categoria_id = mysqli_real_escape_string($ConexionBD, $_POST['categoria_id']);
           $categoria = mysqli_real_escape_string($ConexionBD, $_POST['categoria']);
           
           
           //consulta para comprobar si existe id o nombre de categoria
           //$sql = "SELECT * FROM categorias WHERE categoria_id='$categoria_id' ";
           $sql_n = "SELECT * FROM categoria WHERE categoria='$categoria' ";
           
           //$existencia = mysqli_query($ConexionBD, $sql);
           $existencia_n = mysqli_query($ConexionBD, $sql_n);
           
           //se comprueba existencia y se envia un error
           if($existe = mysqli_fetch_object($existencia_n)) {
               echo "<div class=holder-error>El 'Nombre' que has introducido ya existe en la BD. </div> ";
           //} elseif($existe = mysqli_fetch_object($existencia_n)) {
             //  echo "<div class=holder-error>El 'Nombre' de categoria que has introducido ya existe en la BD. </div> ";
           //}elseif($categoria_id && $categoria ) {
			   }elseif($categoria ) {
               //insertar SQL
               $sql = "INSERT INTO categoria (categoria) VALUES
               ('$categoria')";
               mysqli_query($ConexionBD, $sql);
               
               echo "<div class=holder-ok>Su 'categoria' fue posteado con éxito. </div>";
               mysqli_close($ConexionBD); //cerramos la conexión
               
               //para campos obligatorios
           }else echo "<div class=holder-error>Debes rellenar todos los campos obligatorios para insertar una nueva 'categoria' </div>";
       } // fin del formulario insertar
       ?>
      
      <h2>Crear categoria:</h2>
      <!-- Formulario para insertar nueva categoria -->
      <form method="POST" action="administrador.php">
          <fieldset>
            <legend>Insertar nueva categoría</legend>
              Nombre categoria: <input type="text" name="categoria" placeholder="*" /><br />
              <br />
              <input type="submit" name="insert_categoria" value="Insertar nueva categoría" />
          </fieldset>
      </form>
      <!-- Fin del formulario insertar nueva categoria a tabla categoria -->
      <br />
<!-- ==========================================================================================================-->
      
      <?php
       if(isset($_POST['delete_articulo'])) {
           //incluimos conexion
           require_once 'conexion.php';
           
           //obtenemos el dato del formulario
           $titulo = mysqli_real_escape_string($ConexionBD, $_POST['titulo']);
           
           if($titulo) {
               $existe = mysqli_query($ConexionBD, "SELECT * FROM articulos WHERE titulo='$titulo' ") or die("<div class=error-mensaje> No se pudo seleccionar la Base de Datos. </div> ");
               
               //eliminamos el título seleccionado
               if(mysqli_num_rows($existe) != 0) {
                   while($row = mysqli_fetch_assoc($existe)) {
                       //eliminar articulo
                       mysqli_query($ConexionBD, "DELETE FROM articulos WHERE titulo = '$titulo'") or die("<div class=error-mensaje> No se pudo seleccionar la tabla articulos de la Base de Datos. /div>");
                       echo "<div class=holder-ok> 'Articulo' se eliminó correctamente. </div>";
                       
                       //cerramos conexion
                       mysqli_close($ConexionBD);
                   } //fin de while
                   
               } //fin de if
               else echo "<div class=holder-error> El 'Título' que has introducido no existe en la Base de Datos. </div>";
           } //fin de if titulo
           else echo "<div class=holder-error>Debes rellenar los campos obligatorios.</div>";
           
       } //fin de if isset
       ?>
      <h2>Eliminar artículo:</h2>
      <br />
      <form method="POST" action="administrador.php">
          <fieldset>
              <legend>Eliminar artículo</legend>
              Título: <input type="text" name="titulo" placeholder="*" /> 
              <br /> <br />
              <input type="submit" name="delete_articulo" value="Eliminar articulo" />
          </fieldset>
      </form>
<!-- ==========================================================================================================-->
      
      <?php
       //eliminar categoria
       if(isset($_POST['delete_categoria'])) {
           //incluimos conexion
           require_once 'conexion.php';
           
           //obtenemos el dato del formulario
           $categoria = mysqli_real_escape_string($ConexionBD, $_POST['categoria']);
           
           if($categoria) {
               $existe = mysqli_query($ConexionBD, "SELECT * FROM categoria WHERE categoria='$categoria' ") or die("<div class=error-mensaje> No se pudo seleccionar la Base de Datos. </div> ");
               
               //eliminamos el título seleccionado
               if(mysqli_num_rows($existe) != 0) {
                   while($row = mysqli_fetch_assoc($existe)) {
                       //eliminar categoria
                       mysqli_query($ConexionBD, "DELETE FROM categoria WHERE categoria = '$categoria'") or die("<div class=error-mensaje> No se pudo seleccionar la tabla categorias de la Base de Datos. /div>");
                       echo "<div class=holder-ok> La 'Categoría' se eliminó correctamente. </div>";
                       
                       //cerramos conexion
                       mysqli_close($ConexionBD);
                   } //fin de while
                   
               } //fin de if
               else echo "<div class=holder-error> La 'Categoria' que has introducido no existe en la Base de Datos. </div>";
           } //fin de if titulo
           else echo "<div class=holder-error>Debes rellenar los campos obligatorios.</div>";
           
       } //fin de if isset
       ?>
      <h2>Eliminar categoría:</h2>
      <br />
      Debes ingresar una categoría existente en la Base de Datos.
     <form method="POST" action="administrador.php">
          <fieldset>
              <legend>Eliminar categoria</legend>
              Categoria: <input type="text" name="categoria" placeholder="*" /> 
              <br /> <br />
              <input type="submit" name="delete_categoria" value="Eliminar categoria" />
          </fieldset>
      </form>
      <br/>
<!-- ==========================================================================================================-->
     
      <?php
       //eliminar categoria
       if(isset($_POST['delete_coment'])) {
           //incluimos conexion
           require_once 'conexion.php';
           
           //obtenemos el dato del formulario
           $id_coment = mysqli_real_escape_string($ConexionBD, $_POST['id_coment']);
           
           if($id_coment) {
               $existe = mysqli_query($ConexionBD, "SELECT * FROM comentarios WHERE id_coment='$id_coment' ") or die("<div class=error-mensaje> No se pudo seleccionar la tabla 'Comentarios'. </div> ");
               
               //eliminamos el comentario seleccionado si existe
               if(mysqli_num_rows($existe) != 0) {
                   while($row = mysqli_fetch_assoc($existe)) {
                       //eliminar categoria
                       mysqli_query($ConexionBD, "DELETE FROM comentarios WHERE id_coment = '$id_coment'") or die("<div class=error-mensaje> No se pudo seleccionar la tabla Comentarios de la Base de Datos. /div>");
                       echo "<div class=holder-ok> El 'Comentario' se eliminó correctamente. </div>";
                       
                       //cerramos conexion
                       mysqli_close($ConexionBD);
                   } //fin de while 
               } //fin de if
               else echo "<div class=holder-error> El 'Comentario' que has introducido no existe en la Base de Datos. </div>";
           } //fin de if titulo
           else echo "<div class=holder-error>Debes rellenar los campos obligatorios.</div>";
           
       } //fin de if isset
       ?>
       
      <!-- Formulario para eliminar el comentario-->
      <h2>Eliminar comentario:</h2>
      <br />
      Clave del comentario: # <br/>Ejemplo: 1
      <form method="POST" action="administrador.php">
          <fieldset>
              <legend>Eliminar comentario</legend>
              Comentario: <input type="text" name="id_coment" placeholder="*" /> 
              <br /> <br />
              <input type="submit" name="delete_coment" value="Eliminar comentario" />
          </fieldset>
      </form>
<!-- ==========================================================================================================-->
           
      <br />
       <div class="holder-last">
           <a href="logout.php"  title="Logout">Logout</a>
       </div>
   </section>
    
    </body>
   
</html>
