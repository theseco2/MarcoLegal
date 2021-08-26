<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();

if (!isset($_SESSION["nombre"]))
{
  header("Location: login.html");
}
else
{
require 'header.php';
if ($_SESSION['seguridad']==1)
{
?>
<!--Contenido-->
      <div class="content-wrapper">
      <section class="content">
        <div class="row">
        <div class="box">
          <hr style="margin-top:5px;margin-bottom: 5px;">
          <div class="box-header with-border">
              <h1 class="box-title">Cargar Documentos</h1>
          </div>
          <div class="box-header with-border">
              <h1 class="box-title">Ley:</h1><h1 class="box-title">Titulo:</h1><h1 class="box-title">Capitulo:</h1> 
          </div>
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Cargar Ficheros</h3>
            </div>
            <div class="panel-body">
              <div class="col-lg-6">
                <form method="POST" action="../documentos/CargarFicheros.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label class="btn btn-primary" for="my-file-selector">
                      <input required="" type="file" name="file" id="exampleInputFile">
                    </label>
                    
                  </div>
                  <button class="btn btn-primary" type="submit" onclick="grabararchivo()">Cargar Fichero</button>
                </form>
              </div>
              <div class="col-lg-6"> </div>
            </div>
          </div>
  
      <!--tabla-->
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Descargas Disponibles</h3>
            </div>
          <div class="panel-body">
         
              <table class="table">
                <thead>
                  <tr>
                    <th width="7%">#</th>
                    <th width="70%">Nombre del Archivo</th>
                    <th width="13%">Descargar</th>
                    <th width="10%">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $archivos = scandir("../documentos/subidas");
                    $num=0;
                    for ($i=2; $i<count($archivos); $i++)
                    {$num++;
                    ?>
                      <p>  
                      </p>
               
                      <tr>
                        <th scope="row"><?php echo $num;?></th>
                          <td><?php echo $archivos[$i]; ?></td>
                          <td><a title="Descargar Archivo" href="../documentos/subidas/<?php echo $archivos[$i]; ?>" download="<?php echo $archivos[$i]; ?>" style="color: blue; font-size:18px;"> <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> </a></td>
                          <td><a title="Eliminar Archivo" href="../documentos/Eliminar.php?name=../documentos/subidas/<?php echo $archivos[$i]; ?>" style="color: red; font-size:18px;" onclick="return confirm('Esta seguro de eliminar el archivo?');"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> </a></td>
                      </tr>
                      <?php }?> 

                </tbody>
              </table>
          </div>
          </div>
      <!-- Fin tabla--> 
        </div>
        </div>
        </section><!-- /.content -->
      </div>

<?php
}
else
{
  require 'noacceso.php';
}
require 'footer.php';
?>

<script type="text/javascript" src="../scripts/documento.js"></script>
<?php 
}
ob_end_flush();
?>
