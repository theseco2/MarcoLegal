<?php

//Activamos el almacenamiento en el buffer
ob_start();
if (strlen(session_id()) < 1) 
  session_start();

if (!isset($_SESSION["nombre"]))
{
  echo 'Debe ingresar al sistema correctamente para visualizar el reporte';
}
else
{
if ($_SESSION['reportes']==1)
{

//Inlcuímos a la clase PDF_MC_Table
require('PDF_MC_Table.php');

  //Instanciamos la clase para generar el documento pdf
      $pdf=new PDF_MC_Table();
 
      //Agregamos la primera página al documento pdf
      $pdf->AddPage();
 
      //Seteamos el inicio del margen superior en 25 pixeles 
      $y_axis_initial = 25;
 
      //Seteamos el tipo de letra y creamos el título de la página. No es un encabezado no se repetirá
      $pdf->SetFont('Arial','B',12);

      $pdf->Image('pgn.jpg' , 75 ,0, 60 , 60,'JPG');
      $pdf->Ln(40);
      //$pdf->Cell(40,6,'',0,0,'C');
      $pdf->Cell(40,6,'',0,0,'C');
      $pdf->Cell(100,6,'Listado de Audiencias',1,0,'C'); 
      $pdf->Ln(10);
   
      //Creamos las celdas para los títulos de cada columna y le asignamos un fondo gris y el tipo de letra
      $pdf->SetFillColor(232,232,232); 
      $pdf->SetFont('Arial','B',10);
      $pdf->Cell(35,6,'Nombre Audiencia',1,0,'C',1); 
      $pdf->Cell(20,6,utf8_decode('Causa'),1,0,'C',1);
      $pdf->Cell(35,6,utf8_decode('Encargado'),1,0,'C',1);
      $pdf->cell(25,6,utf8_decode('Juzgado'),1,0,'C',1);
      $pdf->Cell(33,6,'Tipo de Audiencia',1,0,'C',1);
      $pdf->Cell(21,6,'Fecha',1,0,'C',1);
      $pdf->Cell(16,6,'Hora',1,0,'C',1);
 
      $pdf->Ln(10);
      //Comenzamos a crear las filas de los registros según la consulta mysql
      require_once "../controladores/ctlcalendario.php";
      $ctlcalendario = new ctlcalendario();

      $rspta = $ctlcalendario->ctlreporteporfechayusuario($_GET["fecha_inicio"],$_GET["fecha_fin"],$_GET["idusuario"]);

      //Table with 20 rows and 4 columns
      $pdf->SetWidths(array(35,20,35,25,33,21,16));

      while($reg= $rspta->fetch_object())
      {  
          $nombre = $reg->title;
          $codigo = $reg->descripcion;
          $encargado = $reg->usuario.' '.$reg->apelli;
          $juzgado = $reg->juzgado;
          $tipoaudiencia =$reg->tipoaudiencia;
          $fecha = $reg->Fecha;
          $hora = $reg->Hora;
          
          $pdf->SetFont('Arial','',10);
          $pdf->Row(array(utf8_decode($nombre),utf8_decode($codigo),utf8_decode($encargado),utf8_decode($juzgado),utf8_decode($tipoaudiencia),utf8_decode($fecha),utf8_decode($hora)));
      }
 
      //Mostramos el documento pdf
      $pdf->Output();  
?>
<?php
}
else
{
  echo 'No tiene permiso para visualizar el reporte';
}

}
ob_end_flush();
?>