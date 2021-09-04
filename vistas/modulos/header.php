<?php
if (strlen(session_id()) < 1) 
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Marco Legal</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/css/font-awesome.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="../public/css/_all-skins.min.css">
 
    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">    
    <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
    <link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet"/>
    
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">

    <!-- calendario-->
    <script src="../public/calendario/js/jquery.min.js"></script>
    <script src="../public/calendario/js/moment.min.js"></script>
    <!-- Full Calendar -->
    <link rel="stylesheet" href="../public/calendario/css/fullcalendar.min.css">
    <link rel="stylesheet" href="../public/calendario/css/fullcalendar.print.min.css" media="print">

    <!-- Plugin para reloj-->
    <link rel="stylesheet" href="../public/calendario/css/bootstrap-clockpicker.css">

    <!-- Estilo a la fila de los dias -->
    <style>
      .fc th{
        padding: 10px 0px;
        vertical-align: middle;
        background: #F2F2F2;
      }
    </style>

    <!----------------------------------Para Carga de Archivos---------------------------------------->
    <!-- Latest compiled and minified CSS -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css'>-->
    <style>
        .navbar {
          position: relative;
          min-height: 50px;
          margin-bottom: 5px;
        }
    </style>
    <!------------------------------------------------------------------------------------------------>

  </head>

  <body class="hold-transition skin-blue-light sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        
        <!-- Logo -->
        <a class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Marco Legal</b></span>
          <!-- logo for regular state and mobile devices -->
          
          <span class="logo-lg"><b>Marco Legal</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="hidden-xs"><?php echo $_SESSION['nombre']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <a href="../../ajax/usuario.php?op=salir" class="btn btn-default btn-flat">Cerrar</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">       
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            <!--<li>
              <a href="usuario.php">
                <i class="fa fa-tasks"></i> <span>Información</span>
              </a>
            </li> -->
            

            <?php 
            if ($_SESSION['administrar']==1)
            {
              echo '<li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Administración</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="ley.php"><i class="fa fa-circle-o"></i> Ley</a></li>
                <li><a href="institucion.php"><i class="fa fa-circle-o"></i> Institución</a></li>
              </ul>
            </li>';
            }
            ?>

            <?php 
            if ($_SESSION['seguridad']==1)
            {
              echo '<li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Seguridad</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="permiso.php"><i class="fa fa-circle-o"></i> Permisos</a></li>
                <li><a href="rol.php"><i class="fa fa-circle-o"></i> Rol</a></li>
                <li><a href="usuario.php"><i class="fa fa-circle-o"></i> Usuarios</a></li>
              </ul>
            </li>';
            }
            ?>

            <?php 
            if ($_SESSION['evaluacion']==1)
            {
              echo '<li>
              <a href="evaluacion.php">
                <i class="fa fa-bars"></i> <span>Evaluación</span>
              </a>
            </li>';
            }
            ?>
                        
            <?php 
            if ($_SESSION['consultas']==1)
            {
              echo '<li>
              <a href="ConsultaEvaluacion.php">
                <i class="fa fa-folder"></i>
                <span>Consultas</span>
              </a>
            </li>';
            }
            ?>
			
			<?php 
            if ($_SESSION['grafica']==1)
            {
              echo '<li class="treeview">
              <a href="#">
                <i class="fa fa-bar-chart"></i>
                <span>Graficas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="grafica1.php"><i class="fa fa-circle-o"></i> Graficas por Estatus</a></li>
           
              </ul>
            </li>';
            }
            ?>
                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

