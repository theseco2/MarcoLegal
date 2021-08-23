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
if ($_SESSION['evaluacion']==1)
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
                        <a target="_self" href="../modulos/evaluacion.php"> <button class="btn btn-primary" id="btnretroceso"><i class="fa fa-arrow-circle-left"></i></button></a>
                          <h1 class="box-title">Evaluacion de Leyes </h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <div class="form-inline col-lg-4 col-md-4 col-sm-6 col-xs-12">
                          <label>Ley</label>
                          <select name="idley" id="idley" class="form-control selectpicker" data-live-search="true" required>
                          </select>
                        </div>
                        <div class="form-inline col-lg-4 col-md-4 col-sm-6 col-xs-12">
                          <label>Titulo</label>
                          <select name="idtitulo" id="idtitulo" class="form-control selectpicker" data-live-search="true" required>
                          </select>
                        </div>
                        <div class="form-inline col-lg-4 col-md-6 col-sm-4 col-xs-12">
                          <label>Capitulo</label>
                          <select name="idcapitulo" id="idcapitulo" class="form-control selectpicker" data-live-search="true" required>
                          </select>
                        </div>
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opcion</th>
                            <th>Numero</th>
                            <th>Nombre</th>
                            <th>Descripcion</th> 
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opcion</th>
                            <th>Numero</th>
                            <th>Nombre</th>
                            <th>Descripcion</th> 
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

<script type="text/javascript" src="../scripts/evaluacion2.js"></script>
<?php 
}
ob_end_flush();
?>