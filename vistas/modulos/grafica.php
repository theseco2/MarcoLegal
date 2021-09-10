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

//Recupera la realizando las consultas a la base de datos

require_once "../../modelos/Consultas.php";
$consultas=new Consultas();


$idinstitucion = $_GET['idinst'];
$idley = $_GET['idley'];

		
 		$rspta = Consultas::select($idley);

 		$idinstitucionint = (int)$idinstitucion;
		$contacomple = 0;
		$contaparcom = 0;
		$contanocomp = 0;
		$contanoeval = 0;
 		while ($reg=$rspta->fetch_object()){
 			//Recupera la marca
 			$rspta1 = Consultas::comarca($idinstitucion,$idley,$reg->idarticulo);

 			$prueba=$rspta1;
 			if ($prueba==1) {
 				$contacomple = $contacomple + 1;
 			}elseif ($prueba==2) {
 				$contaparcom = $contaparcom + 1;
 			}elseif ($prueba==3) {
 				$contanocomp = $contanocomp + 1;
 			}else $contanoeval = $contanoeval + 1;

 		}
 		
  $stat='"Completado","Parcialmento Completado","No Completado","No Evaluado",';
  $cantidad=$contacomple.','.$contaparcom.','.$contanocomp.','.$contanoeval.',';
	
  //Quitamos la última coma
  $stat=substr($stat, 0, -1);
  $cantidad=substr($cantidad, 0, -1);
  
	if ($contanoeval > $contaparcom and $contanoeval > $contanocomp and $contanoeval > $contacomple) {
 		$recomendacion = 'Apreaciable gerente se recomienda que se realice una auditoria de los articulos que no han sido evaluados ya que estos son la mayoria.';
 	}elseif ($contanocomp > $contacomple and $contanocomp > $contaparcom and $contanocomp > $contanoeval) {
 		$recomendacion = 'Apreciable gerente se recomienda revisar los articulos que no cumplen y hacer las gestiones necesarias para cumplir con los requisitos y ejecutar una nueva auditoria.';
 	}elseif ($contaparcom > $contanocomp and $contaparcom > $contacomple and $contaparcom > $contanoeval) {
 		$recomendacion = 'Apreciable gerente se recomienda revisar los articulos que no cumplen completamente los requisitos y ejecutar una nueva auditoria.';
	}elseif ($contacomple > 0 and $contaparcom == 0 and $contanoeval == 0 and $contanocomp == 0) {
 		$recomendacion = 'Apreciable gerente la evaluacion es satisfactoria ya que cumple con todos los requisitos de la ley.';	
	}elseif (($contacomple > $contanocomp and $contacomple > $contaparcom and $contacomple > $contanoeval) and ($contaparcom == 0 or $contanoeval == 0 or $contanocomp == 0)) 
 		$recomendacion = 'Apreciable gerente la mayoria de los articulos cumplen con los requisitos requeridos se recomienda crear acciones para cumplir con los articulos aun pendientes.';	
 			
 

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
					<a target="_self" href="../modulos/grafica1.php"> <button class="btn btn-primary" id="btnretroceso"><i class="fa fa-arrow-circle-left"></i></button></a>
                          <h1 class="box-title">Graficos Estatus de Evaluación </h1>
						  
						<div class="box-header with-border">
						
						<label>Institución:</label>
						<input type="text" class="form-control" name="descripcioninstitucion" id="descripcioninstitucion" maxlength="30" disabled>
						
						<label>Ley:</label>
						<input type="text" class="form-control" name="descripcionley" id="descripcionley" maxlength="30" disabled>
						
					
                        <div class="box-tools pull-right">
                        </div>
						</div>  
						
						<div class="box-header with-border">
						<h4> <?php echo $recomendacion; ?> </h4>
						</div>  
                       <!-- <div class="col-lg-12 col-md-6 col-sm-6 col-xs-6">-->
                          <div class="box box-primary">                         
                                <!--<canvas id="estuiosxdeph" width="400" height="300"></canvas>-->
								<canvas id="estatusxeva" width="1500" height="600"></canvas>
                              <!--</div>-->
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
<script type="text/javascript" src="../scripts/grafica.js"></script>
<script type="text/javascript" ></script>
<script src="../public/js/Chart.min.js"></script>
<script src="../public/js/Chart.bundle.min.js"></script> 
<script type="text/javascript">

//Diseño de graficas
var ctx = document.getElementById("estatusxeva").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php echo $stat; ?>],
        datasets: [{
            label: 'Estatus de Evaluación',
            data: [<?php echo $cantidad; ?>],
            backgroundColor: [
				'rgba(75, 192, 192, 0.2)',
				'rgba(255, 206, 86, 0.2)',
                'rgba(255, 99, 132, 0.2)',
				'#b9b9b9'
                  
            ],
            borderColor: [
				'rgba(75, 192, 192, 1)',
				'rgba(255, 206, 86, 1)',
				'rgba(255,99,132,1)',
                '#9b9b9b'
                          
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

var elem = document.getElementById('estatusxeva');
elem.onclick = function() 

{
		
	var idinstpar = getParameterByName('idinst');
	var idleypar = getParameterByName('idley');
	
	location.href = 'ConsultaEvaluacion3.php?idinst='+idinstpar+'&idley='+idleypar;
	
}

/*=============================================
	 FUNCION Recupera parametro
=============================================*/
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

</script>




<?php 
}
ob_end_flush();
?>
