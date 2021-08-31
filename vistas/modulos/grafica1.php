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

$idinstitucion = 1;
$idley = 1;
$idtitulo = 1;
$idcapitulo = 1;
		
 		$rspta = Consultas::select($idley,$idtitulo,$idcapitulo);

 		$idinstitucionint = (int)$idinstitucion;
		$contacomple = 0;
		$contaparcom = 0;
		$contanocomp = 0;
		$contanoeval = 0;
 		while ($reg=$rspta->fetch_object()){
 			//Recupera la marca
 			$rspta1 = Consultas::comarca($idinstitucion,$idley,$idtitulo,$idcapitulo,$reg->idarticulo);

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
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
             
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

</script>




<?php 
}
ob_end_flush();
?>


