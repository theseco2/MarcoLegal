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
                      <button class="btn btn-primary" id="btnretroceso" onclick="retornaint()"><i class="fa fa-arrow-circle-left"></i></button>
                        <h1 class="box-title">Evaluacion de Leyes</h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <input type="hidden" name="idinstitucionG" id="idinstitucionG">
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <label id="">Institución:</label>
                          <input type="text" class="form-control" name="descripcionIns" id="descripcionIns" maxlength="60" disabled>
                        </div>
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
                        <br><br><br><br><br><br><br><br>
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opcion</th>
                            <th>Numero</th>
                            <th>Nombre</th>
                            <th>Descripcion</th> 
                            <th>Estatus</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opcion</th>
                            <th>Numero</th>
                            <th>Nombre</th>
                            <th>Descripcion</th> 
                            <th>Estatus</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST" enctype="multipart/form-data">
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label id="">Institución:</label>
                            <input type="hidden" name="idinstitucion" id="idinstitucion">
                            <input type="text" class="form-control" name="descripcionIns2" id="descripcionIns2" maxlength="60" disabled>
                          </div>
                          <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Ley:</label>
                            <input type="hidden" name="idley" id="idley">
                            <input type="text" class="form-control" name="descripcionLey" id="descripcionLey" maxlength="60" disabled>
                          </div>
                          <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Titulo:</label>
                            <input type="hidden" name="idtitulo" id="idtitulo">
                            <input type="text" class="form-control" name="descripcionTit" id="descripcionTit" maxlength="60" disabled>
                          </div>
                          <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Capitulo:</label>
                            <input type="hidden" name="idcapitulo" id="idcapitulo">
                            <input type="text" class="form-control" name="descripcionCap" id="descripcionCap" maxlength="60" disabled>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Numero Articulo:</label>
                            <input type="hidden" name="idarticulo" id="idarticulo">
                            <input type="text" class="form-control" name="numero" id="numero" maxlength="10" disabled>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Articulo:</label>
                            <input type="text" class="form-control" name="descripcionArt" id="descripcionArt" maxlength="60" disabled>
                          </div>
                           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Descripcion Articulo:</label>
                            <textarea id="descripcionArtD" name="descripcionArtD" rows="2" class="form-control" disabled></textarea>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Estatus(*):</label>
                            <input type="hidden" name="idevaluacion" id="idevaluacion">
                            <select id='marca' name='marca' class="form-control selectpicker" data-live-search="true" required>
                              <option value="1">Completado</option>
                              <option value="2">Parcialmente Completado</option>
                              <option value="3">No Completado</option>
                            </select>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label></label>
                          </div>
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label>Observación:</label>
                            <textarea id="observacion" name="observacion" rows="3" class="form-control"></textarea>
                          </div>
                          <!-- Para Ingresar los archivos --------------------------------------------------------->  
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="panel-heading">
                              <h3 class="panel-title">Archivos</h3>
                            </div>
                            <div class="panel-body">
                              <!-- Primer Archivo-->
                              <div class="col-lg-4">
                                <div class="form-group" id="SeleccionArchivo">
                                  <label class="btn btn-primary" for="my-file-selector">
                                    <input type="file" name="file" id="exampleInputFile">
                                  </label>    
                                </div>
                                <div class="form-group" id="EliminaArchivo">
                                  <label class="btn btn-primary">
                                    <input type="text" class="form-control" name="nombrearch" id="nombrearch" maxlength="10" disabled>
                                  </label> 
                                  <br>
                                  <button class="btn btn-danger" type="button" onclick="cambiaformu()">Eliminar Fichero</button>   
                                </div>
                              </div>
                              <!-- ---------------->
                              <!-- Segundo Archivo-->
                              <div class="col-lg-4">
                                <div class="form-group" id="SeleccionArchivo2">
                                  <label class="btn btn-primary" for="my-file-selector">
                                    <input type="file" name="file2" id="exampleInputFile2">
                                  </label>    
                                </div>
                                <div class="form-group" id="EliminaArchivo2">
                                  <label class="btn btn-primary">
                                    <input type="text" class="form-control" name="nombrearch2" id="nombrearch2" maxlength="10" disabled>
                                  </label> 
                                  <br>
                                  <button class="btn btn-danger" type="button" onclick="cambiaformu2()">Eliminar Fichero</button>   
                                </div>
                              </div>
                              <!-- ---------------->
                              <!-- Tercer Archivo-->
                              <div class="col-lg-4">
                                <div class="form-group" id="SeleccionArchivo3">
                                  <label class="btn btn-primary" for="my-file-selector">
                                    <input type="file" name="file3" id="exampleInputFile3">
                                  </label>    
                                </div>
                                <div class="form-group" id="EliminaArchivo3">
                                  <label class="btn btn-primary">
                                    <input type="text" class="form-control" name="nombrearch3" id="nombrearch3" maxlength="10" disabled>
                                  </label> 
                                  <br>
                                  <button class="btn btn-danger" type="button" onclick="cambiaformu3()">Eliminar Fichero</button>   
                                </div>
                              </div>
                              <!-- ---------------->
                              <!---------------------------------------------------------------------------------------->
                          <div class="col-lg-6"> </div>
                          </div>
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

<script type="text/javascript" src="../scripts/evaluacion2.js"></script>
<?php 
}
ob_end_flush();
?>