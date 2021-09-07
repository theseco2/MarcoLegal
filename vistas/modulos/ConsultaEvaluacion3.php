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
if ($_SESSION['grafica']==1)
{
?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                      <button class="btn btn-primary" id="btnretroceso" onclick="retornagrafica()"><i class="fa fa-arrow-circle-left"></i></button>
                        <h1 class="box-title">Datos de Grafica Evaluacion de Leyes</h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <input type="hidden" name="idinstitucionG" id="idinstitucionG">
                      
						<label>Institución:</label>
						<input type="text" class="form-control" name="descripcioninstitucion" id="descripcioninstitucion" maxlength="30" disabled>
						
						<label>Ley:</label>
						<input type="text" class="form-control" name="descripcionley" id="descripcionley" maxlength="30" disabled>
                     
                        <br>
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Numero</th>
                            <th>Nombre</th>
                            <th>Observacion</th> 
                            <th>Estatus</th>
                            <th>Documentos</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Numero</th>
                            <th>Nombre</th>
                            <th>Observacion</th> 
                            <th>Estatus</th>
                            <th>Documentos</th>
                          </tfoot>
                        </table>
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php
}
else
{
  require 'noacceso.php';
}
require 'footer.php';
?>

<script type="text/javascript" src="../scripts/consulta3.js"></script>
<?php 
}
ob_end_flush();
?>