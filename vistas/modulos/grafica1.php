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
                 <!-- <div class="box">-->
                    <div class="box-header with-border">
                          <h1 class="box-title">Graficos Estatus de Evaluación </h1>
                        <div class="box-tools pull-right">
                        </div>
						</div>  
						
						 <div class="panel-body" id="formulariofiltros">
						 <div class="form-inline col-lg-6 col-md-12 col-sm-12 col-xs-12">
                          <label>Institución:</label>
                          <select name="idinstitucion" id="idinstitucion" class="form-control selectpicker" data-live-search="true" required>
                          </select>
                        </div>
						
						 <div class="form-inline col-lg-6 col-md-4 col-sm-6 col-xs-12">
                          <label>Ley:</label>
                          <select name="idley" id="idley" class="form-control selectpicker" data-live-search="true" required>
                          </select>
                        </div>
                    
						</div>
                       <!-- <div class="col-lg-12 col-md-6 col-sm-6 col-xs-6">-->
                         <div class="box-header with-border">
						<center><button class="btn btn-primary" id="btngenerar" onclick="generagrafica()"><i class="fa fa-bar-chart"></i> Generar</button></center>  
                        <div class="box-tools pull-right">
                        </div>
						</div>
					
						 
                       <!-- </div>-->
                   <!-- </div>-->
                   <!-- Fin centro -->
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
<script type="text/javascript" src="../scripts/grafica1.js"></script>
<script src="../public/js/Chart.min.js"></script>
<script src="../public/js/Chart.bundle.min.js"></script> 


<?php 
}
ob_end_flush();
?>


