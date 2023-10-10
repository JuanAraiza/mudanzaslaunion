<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;">
      <!-- Sidebar user panel -->
      <div class="user-panel" style="background-color: #fff; height: 252px;">
         <img src="images/logo_png2.png" style=" width: 100%">

      
        <div class="pull-left info" style="background-color: #000; width: 100%; left: 0px; margin-top:8px;">

          <p><? 

    echo $_SESSION['nombre'].'<br><a href="#">'.$_SESSION['puesto'].'</a>';
    ?></p>
          <a href="#"><!--<i class="fa fa-circle text-success"></i>-->
           </a>
        </div>
      </div>
     
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU PRINCIPAL</li>
        <li class="active treeview">
          <a href="tareas.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="tareas.php"><i class="fa fa-circle-o"></i>Calendario</a></li>
            <?php if($_SESSION['id_user']==1){ ?>
  <li><a href="tareas.php?ncoti_flete=1&tr=1&tipoc=1"><i class="fa fa-circle-o"></i>Cotización - Flete</a></li>
  <li><a href="tareas.php?ncoti_flete=1&tr=1&tipoc=2"><i class="fa fa-circle-o"></i>Cotización - Autos</a></li>
  <li><a href="tareas.php?ncoti_flete=1&tr=1&tipoc=3"><i class="fa fa-circle-o"></i>Cotización - Mudanza</a></li>
  <li><a href="tareas.php?cotizaciones2023=1"><i class="fa fa-circle-o"></i>Cotizaciónes</a></li>
<?php } ?>

            <li><a href="tareas.php?ncotizacion=1"><i class="fa fa-circle-o"></i>Generar Cotizaciones</a></li>
            <li><a href="tareas.php?cs=1"><i class="fa fa-circle-o"></i>Cotizaciones</a></li>
           <li><a href="tareas.php?nc=1"><i class="fa fa-circle-o"></i>Generar Servicio</a></li>
           <!--<li><a href="tareas.php?bu=10"><i class="fa fa-circle-o"></i>Generar Cotizaciones</a></li> -->
           <li><a href="tareas.php?rutas=1"><i class="fa fa-circle-o"></i>Rutas</a></li>

           <li><a href="tareas.php?ser=1"><i class="fa fa-circle-o"></i>Servicios Activos</a></li>
           <?php  if($_SESSION['tipo_usuario']!='visor'){ ?>
           <li><a href="tareas.php?ser=3"><i class="fa fa-circle-o"></i>Finiquitados</a></li>
           <!--<li><a href="tareas.php?ser=4"><i class="fa fa-circle-o"></i>Cancelados</a></li>-->
           <li><a href="tareas.php?ser=2"><i class="fa fa-circle-o"></i>Cerrados</a></li>
           <li><a href="tareas.php?ser=5"><i class="fa fa-circle-o"></i>Todos Servicios</a></li>
         <?php } ?>
           <!--<li><a href="tareas.php?ckm=1"><i class="fa fa-circle-o"></i>Checklist por mes</a></li>-->
           <li><a href="tareas.php?not=1"><i class="fa fa-circle-o"></i>Notas</a></li>
           <?php  if($_SESSION['tipo_usuario']!='visor'){ ?>
           <li><a href="tareas.php?p=1"><i class="fa fa-circle-o"></i>Proveedores</a></li>
           <li><a href="tareas.php?ter=1"><i class="fa fa-circle-o"></i>Terminos y Condiciones</a></li>
         <?php } ?>
<!--<li><a href="tareas.php?med=1"><i class="fa fa-circle-o"></i>Medidas</a></li>-->
          </ul>
        </li>
       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Inventario</span>
              <i class="fa fa-angle-left pull-right"></i>
          </a>
            <ul class="treeview-menu">
              <li><a href="tareas.php?bu=17&tip=1">&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-box-open" aria-hidden="true"></i>&nbsp;&nbsp;Mobiliaro</a></li>
              <li><a href="tareas.php?bu=17&tip=2">&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-box-open" aria-hidden="true"></i>&nbsp;&nbsp;Papeleria</a></li>
              <li><a href="tareas.php?bu=17&tip=3">&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-box-open" aria-hidden="true"></i>&nbsp;&nbsp;Herramienta</a></li>
              <li><a href="tareas.php?bu=17&tip=4">&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-box-open" aria-hidden="true"></i>&nbsp;&nbsp;Equipo</a></li>
              <li><a href="tareas.php?bu=17&tip=5">&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-box-open" aria-hidden="true"></i>&nbsp;&nbsp;Limpieza</a></li>
              <li><a href="tareas.php?bu=17&tip=6">&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-box-open" aria-hidden="true"></i>&nbsp;&nbsp;Despensa</a></li>
            </ul>
          </li>


          <?php if($_SESSION['id_user']==1){ ?>
          <li class="treeview">
          <a href="#">
          <i class="fa-solid fa-people-group"></i>&nbsp;&nbsp;<span>RRHH</span>
              <i class="fa fa-angle-left pull-right"></i>
          </a>
            <ul class="treeview-menu">
              <li><a href="tareas.php?bu=18">&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-address-card"></i>&nbsp;&nbsp;Cedula Profecional</a></li>
              </ul>
          </li>
<?php } ?>


       <li><a href="index.php?cerrar=1"><i class="fa fa-circle-o text-red"></i> <span>Cerrar Sesión</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>