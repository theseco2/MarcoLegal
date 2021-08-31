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
						<button class="btn btn-primary" id="btnretroceso" onclick="retornaeva()"><i class="fa fa-arrow-circle-left"></i></button>
						 <!-- <a target="_self" href="../vistas/departamento.php?iddep=" + > <button class="btn btn-primary" id="btnretroceso"><i class="fa fa-arrow-circle-left"></i></button></a> -->
                        <!-- <h1 class="box-title">Documentos <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1> -->
						  
                        <div class="box-tools pull-right">
                        </div>
                    </div>
					
					<div class="box-header with-border">
					<label>Institucion:</label>
					<input type="text" class="form-control" name="descripcioninstitucion" id="descripcioninstitucion" maxlength="60" disabled>
					<label>Ley:</label>
					<input type="text" class="form-control" name="descripcionley" id="descripcionley" maxlength="60" disabled>
					<label>Titulo:</label>
					<input type="text" class="form-control" name="descripciontitulo" id="descripciontitulo" maxlength="60" disabled>
					<label>Capitulo:</label>
					<input type="text" class="form-control" name="descripcioncapitulo" id="descripcioncapitulo" maxlength="60" disabled>
					 </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
							<th>Nombre del documento</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
		                    <th>Nombre del documento</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          
						  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">                      
							<label>Nombre(*):</label>
                             <!-- <input type="hidden" name="idregion" id="idregion">-->
							<input type="hidden" name="iddocumento" id="iddocumento">
                            <input type="number" class="form-control" name="numero" id="numero" maxlength="9" placeholder="Numero" required>
							</div>
						  
							<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                        </form>
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
<script type="text/javascript" src="../scripts/documento2.js"></script>
<?php 
}
ob_end_flush();
?>