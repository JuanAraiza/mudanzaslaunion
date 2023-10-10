<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mudanzas - La Unión</title>

  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">


  <meta charset="UTF-8">

<style type="text/css">
body{
	text-transform: uppercase;
}

.form-group{
width: 25%;
float: left;
padding: 5px; 

}

</style>

</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="tareas.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>MUDANZAS</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>MUDANZAS</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
	 <!-- Sidebar toggle button-->
	 <a href="#" onClick="coll()" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel" style="background-color: #fff; height: 220px;">
         <img src="images/logo_png2.png" style=" width: 100%">

       <!-- <div class="pull-left image">
         
          <img src="dist/img/usuario.jpg" class="img-circle" alt="User Image">
        </div>-->
        <div class="pull-left info" style="background-color: #000; width: 100%; left: 0px; margin-top:8px;">

          <p>admin<br><a href="#"></a></p>
          <a href="#"><!--<i class="fa fa-circle text-success"></i>-->
           </a>
        </div>
      </div>
      <!-- search form -->
      <!--<form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>-->
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
           <!-- <li class="active"><a href="tareas.php"><i class="fa fa-circle-o"></i> Incio</a></li>-->
           
           <li><a href="tareas.php?nc=1"><i class="fa fa-circle-o"></i>Solicitud Cotización</a></li>
           <!--<li><a href="tareas.php?pet=1"><i class="fa fa-circle-o"></i>Peticiones</a></li>-->
           <li><a href="tareas.php?bu=10"><i class="fa fa-circle-o"></i>Generar Cotizaciones</a></li> 
          <li><a href="tareas.php?cs=1"><i class="fa fa-circle-o"></i>Cotizaciones</a></li> 

           <li><a href="tareas.php?ser=1"><i class="fa fa-circle-o"></i>Servicios</a></li>
           <li><a href="tareas.php?ser=3"><i class="fa fa-circle-o"></i>Finiquitados</a></li>
           <li><a href="tareas.php?ser=2"><i class="fa fa-circle-o"></i>Cerrados</a></li>
           <li><a href="tareas.php?ckm=1"><i class="fa fa-circle-o"></i>Checklist por mes</a></li> 
           <!--<li><a href="tareas.php?ta=1"><i class="fa fa-circle-o"></i>Traslado de Auto</a></li>-->
           <li><a href="tareas.php?p=1"><i class="fa fa-circle-o"></i>Proveedores</a></li>
           <li><a href="tareas.php?ter=1"><i class="fa fa-circle-o"></i>Terminos y Condiciones</a></li>
<li><a href="tareas.php?med=1"><i class="fa fa-circle-o"></i>Medidas</a></li>
          </ul>
        </li>
       
       <li><a href="index.php?c=1"><i class="fa fa-circle-o text-red"></i> <span>Cerrar Sesión</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Panel de Control - 
      


							Nueva Solicitud Cotización
		      </h1>
      <!--<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>-->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
     <div class="box-body">
          <div class="row">

                       
                <!--
        <div id="form-overlaymovimientos" class="hidden" style="border-radius:8px;">
        
        </div>
-->



<!--	<a id="movim" href="#"  data-lightbox-target="#form-overlaymovimientos" data-lightbox-fit-viewport="false"></a>-->








<div class="row">
    <div class="col-md-12">
<form id="formn" name="formn" action="tareas.php?edit=1&nc=1&c=3e2aa801e3e6e7ca373cd676fa079991" method="post" >
<input type="hidden" name="cla" id="cla" value="3e2aa801e3e6e7ca373cd676fa079991">

<div class="col-md-6" style="width: 100%; overflow: hidden;">
<div class="form-group" >
            <label>Cliente</label>
               <input name="cliente" id="cliente" autocomplete="off"  style="text-transform: uppercase;" class="form-control" type="text"   value="Brenda " >
              </div>

              <div class="form-group" >
            <label>Origen</label>
               <input  name="origen" id="origen"  style="text-transform: uppercase;" class="form-control" type="text"  autocomplete="off"   value="prueba"  >
              </div>

              <div class="form-group">
            <label>Destino</label>
               <input name="destino" id="destino" style="text-transform: uppercase;" class="form-control" type="text" autocomplete="off"   value="prueba"   onChange="javascript: buscarkm();"  >
              </div>
                            <div class="form-group" style="width: 100px;">
            <label>M3</label>
               <input name="m3" id="m3"  style="text-transform: uppercase;" class="form-control" type="text" onkeypress="return valida(event)"   value=""  onkeypress="return valida(event)" >
              </div>

             
                <div class="form-group">
                  <label>TELEFONO:</label>
                   <input name="telefono" id="telefono" placeholder=""  style="text-transform: uppercase;" class="form-control" type="text"    value="1111111111"   >
                </div>

                  <div class="form-group" style=" height: 92px;">
            <label>Tipo Mudanza</label>
              <select class="form-control select2" style="width: 100%; text-transform: uppercase;"  name="tipo_mudanza" id="tipo_mudanza"  onChange="changeTipoServ(this.value)">
                  <option value="--">--</option>
                  <option   value="Vehiculo">Vehiculo</option>
                  <option   value="Moto">Moto</option>
                  <option   value="Auto con Mudanza">Auto con Mudanza</option>
                  <option   value="Compartido">Compartido</option>
        <option   selected  value="Exclusivo">Exclusivo</option>
        <option   value="Flete">Flete</option>
        <option   value="Paqueteria">Paqueteria</option>
        <option   value="Exclusivo y Compartido">Exclusivo y Compartido</option>
        <!-- <option   value="Coordinado">Coordinado</option>-->
                </select>
              </div>

              <div class="form-group" style=" height: 92px;">
            <label>Modalidad</label>
              <select class="form-control select2" style="width: 100%; text-transform: uppercase;"  name="modalidad" id="modalidad" >
                  <option value="--">--</option>
                  <option   value="Exclusivo">Exclusivo</option>
                  <option   value="Compartido">Compartido</option>
                 </select>
              </div>


<div id="divve"  style="display: none;" >
            
            <div class="form-group" >

            <label>Marca</label>
               <input name="marca" id="marca"  style="text-transform: uppercase;" class="form-control" type="text"   value=""  >
              </div>
              <div class="form-group" >

            <label>Modelo</label>
               <input name="modelo" id="modelo"  style="text-transform: uppercase;" class="form-control" type="text"   value=""  >
              </div>
              <div class="form-group" >

            <label>Tipo de Auto</label>
               <input name="tipo" id="tipo"  style="text-transform: uppercase;" class="form-control" type="text"   value=""  >
              </div>
            




</div>

<div class="form-group">
                  <label>FECHA DEL SERVICIO</label>
                        <div class="input-group">
                          <input  class="form-control" autocomplete="off"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask maxlength="10" type="text" name="fecha_s" id="datepicker"   value="00/00/0000" >
                    </div>
                </div>


                 <div class="form-group">
                  <label>HORA DEL SERVICIO</label>
                  <input type="text" name="hora_s"  class="form-control"   value="" >
                </div>


                
                 <div class="form-group">
                  <label>Costo Cliente:</label>
                   <input name="costo" id="costo"  style="text-transform: uppercase;" class="form-control" type="text" onkeypress="return valida(event)"   value=""   >
                </div>
                <div class="form-group">
                  <label>Costo Proveedor:</label>
                   <input name="costo2" id="costo2"  style="text-transform: uppercase;" class="form-control" type="text" onkeypress="return valida(event)"   value=""   >
                </div>


<div class="form-group" style="height: 92px;">
               <label>PROVEEDOR 1</label>
               
               <select class="form-control select2" id="proveedor1" name="proveedor1">
                  <option value="--">--</option>
                   
                  
<option  value="8">RAFAEL  GARCIA - </option>

<option  value="7">JESUS GARFIAS - GANJ660219HSA</option>

<option  value="4">EDUARDO ACOSTA - </option>

<option  value="9">CHRISTIAN GUTIERREZ - </option>

<option  value="13">GIBRAN ESPINOSA - </option>

<option  value="14">GARFIAS/BENITO  - </option>

<option  value="15">RAUL HERNANDEZ - </option>

<option  value="16">ARMANDO SALINA - </option>

<option  value="17">VICTOR V&Aacute;ZQUEZ - </option>

<option  value="18">VICTOR VAZQUEZ - </option>

<option  value="19">SERGIO  ISRAEL  - </option>

<option  value="20">BENITO  SALAZAR - </option>

<option  value="21">BRIAN ROMUALDO - </option>

<option  value="22">GILBERTO ESTRADA - </option>

<option  value="23">MAURICIO FERRER - </option>

<option  value="24">JORGE BRETADO  - </option>

<option  value="25">FERNANDO   - </option>

<option  value="26">GAUDENCIO MIRANDA - </option>

<option  value="27">ERNESTO VAZQUEZ  - </option>

<option  value="28">IGNACIO GARCIA  - </option>

<option  value="29">GONZALO SAN JUAN   - </option>

<option  value="30">JORGE ALBERTO  BRETADO - BEPJ840716DC9</option>

<option  value="31">JOSE RAUL  HERNANDEZ - </option>

<option  value="32">JESUS TORRES  - </option>

<option  value="33">ISRAEL  ELIZONDO - </option>

<option  value="34">Gabriel   L&oacute;pez - </option>

<option  value="35">GERMAN  RODRIGUEZ  - </option>

<option  value="36">ISMAEL  CRUZ  - </option>

<option  value="37">FERNANDO  MAGA&Ntilde;A - </option>

                </select>
              </div>
              <div class="form-group" style="height: 92px;">
               <label>PROVEEDOR 2</label>
               
               <select class="form-control select2" id="proveedor2" name="proveedor2">
                  <option value="--">--</option>
                   
                  
<option  value="8">RAFAEL  GARCIA - </option>

<option  value="7">JESUS GARFIAS - GANJ660219HSA</option>

<option  value="4">EDUARDO ACOSTA - </option>

<option  value="9">CHRISTIAN GUTIERREZ - </option>

<option  value="13">GIBRAN ESPINOSA - </option>

<option  value="14">GARFIAS/BENITO  - </option>

<option  value="15">RAUL HERNANDEZ - </option>

<option  value="16">ARMANDO SALINA - </option>

<option  value="17">VICTOR V&Aacute;ZQUEZ - </option>

<option  value="18">VICTOR VAZQUEZ - </option>

<option  value="19">SERGIO  ISRAEL  - </option>

<option  value="20">BENITO  SALAZAR - </option>

<option  value="21">BRIAN ROMUALDO - </option>

<option  value="22">GILBERTO ESTRADA - </option>

<option  value="23">MAURICIO FERRER - </option>

<option  value="24">JORGE BRETADO  - </option>

<option  value="25">FERNANDO   - </option>

<option  value="26">GAUDENCIO MIRANDA - </option>

<option  value="27">ERNESTO VAZQUEZ  - </option>

<option  value="28">IGNACIO GARCIA  - </option>

<option  value="29">GONZALO SAN JUAN   - </option>

<option  value="30">JORGE ALBERTO  BRETADO - BEPJ840716DC9</option>

<option  value="31">JOSE RAUL  HERNANDEZ - </option>

<option  value="32">JESUS TORRES  - </option>

<option  value="33">ISRAEL  ELIZONDO - </option>

<option  value="34">Gabriel   L&oacute;pez - </option>

<option  value="35">GERMAN  RODRIGUEZ  - </option>

<option  value="36">ISMAEL  CRUZ  - </option>

<option  value="37">FERNANDO  MAGA&Ntilde;A - </option>

                </select>
              </div>
              <div class="form-group" style="height: 92px;">
               <label>PROVEEDOR 3</label>
               
               <select class="form-control select2" id="proveedor3" name="proveedor3">
                  <option value="--">--</option>
                   
                  
<option  value="8">RAFAEL  GARCIA - </option>

<option  value="7">JESUS GARFIAS - GANJ660219HSA</option>

<option  value="4">EDUARDO ACOSTA - </option>

<option  value="9">CHRISTIAN GUTIERREZ - </option>

<option  value="13">GIBRAN ESPINOSA - </option>

<option  value="14">GARFIAS/BENITO  - </option>

<option  value="15">RAUL HERNANDEZ - </option>

<option  value="16">ARMANDO SALINA - </option>

<option  value="17">VICTOR V&Aacute;ZQUEZ - </option>

<option  value="18">VICTOR VAZQUEZ - </option>

<option  value="19">SERGIO  ISRAEL  - </option>

<option  value="20">BENITO  SALAZAR - </option>

<option  value="21">BRIAN ROMUALDO - </option>

<option  value="22">GILBERTO ESTRADA - </option>

<option  value="23">MAURICIO FERRER - </option>

<option  value="24">JORGE BRETADO  - </option>

<option  value="25">FERNANDO   - </option>

<option  value="26">GAUDENCIO MIRANDA - </option>

<option  value="27">ERNESTO VAZQUEZ  - </option>

<option  value="28">IGNACIO GARCIA  - </option>

<option  value="29">GONZALO SAN JUAN   - </option>

<option  value="30">JORGE ALBERTO  BRETADO - BEPJ840716DC9</option>

<option  value="31">JOSE RAUL  HERNANDEZ - </option>

<option  value="32">JESUS TORRES  - </option>

<option  value="33">ISRAEL  ELIZONDO - </option>

<option  value="34">Gabriel   L&oacute;pez - </option>

<option  value="35">GERMAN  RODRIGUEZ  - </option>

<option  value="36">ISMAEL  CRUZ  - </option>

<option  value="37">FERNANDO  MAGA&Ntilde;A - </option>

                </select>
              </div>


<div class="form-group" >
            <label>Empaque a Granel</label>
               <input name="empaque_g" id="empaque_g"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="No. Cajas" onkeypress="return valida(event)"   value=""  >
              </div>
              
              <div class="form-group" >
            <label>Empaque Profecional</label>
               <input name="empaque_p" id="empaque_p"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="$$$" onkeypress="return valida(event)"   value=""  >
              </div>
              <div class="form-group" >
            <label>Emplaye Total</label>
               <input name="emplaye_t" id="emplaye_t"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="No. Rollos" onkeypress="return valida(event)"   value=""  >
              </div>
              <div class="form-group" >
            <label>Desempaque</label>
               <input name="desempaque" id="desempaque"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="No. Cajas" onkeypress="return valida(event)"   value=""  >
              </div>
              <div class="form-group" >
            <label>Caja Closet</label>
               <input name="caja_closet" id="caja_closet"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="No. Cajas" onkeypress="return valida(event)"   value=""  >
              </div>
              <div class="form-group" >
            <label>Supervision Sencilla</label>
               <input name="supervision_s" id="supervision_s"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="M3" onkeypress="return valida(event)"   value=""  >
              </div>
              
<div class="form-group" >
            <label>Supervision por servicio</label>
               <input name="supervision_ps" id="supervision_ps"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="" onkeypress="return valida(event)"   value=""  >
              </div>
              
            <div class="form-group" >
            <label>Maniobras Carga</label>
               <input name="maniobras_c" id="maniobras_c"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="" onkeypress="return valida(event)"   value=""  >
              </div>
              <div class="form-group" >
            <label>Maniobras Descarga</label>
               <input name="maniobras_d" id="maniobras_d"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="" onkeypress="return valida(event)"   value=""  >
              </div>
              
    <div class="form-group" >
      <label>Seguro</label>
      <input name="sseguro" id="sseguro"  style="text-transform: uppercase;" placeholder="Valor Declarado"  class="form-control" type="text" onkeypress="return valida(event)"   value=""  >
      </div>

              <div class="form-group" >
            <label>Porcentaje Seguro</label>
               <input name="pcseguro" id="pcseguro"  placeholder="0.0" style="text-transform: uppercase;" class="form-control" type="text" onkeypress="return valida(event)"   value=""  >
              </div>

<div class="form-group" >
            <label>Permiso de Transito</label>
               <input name="permiso_t" id="permiso_t"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="$$$" onkeypress="return valida(event)"   value=""  >
              </div>




              <div class="form-group" style="height: 92px;" >
            <label>Ruta</label>
              <select class="form-control select2" style=" text-transform: uppercase;"  name="ruta" id="ruta" >
         <option value="--">--</option>
                   <option  value="México – Tijuana">México – Tijuana</option>
                   <option  value="México-Cancún">México-Cancún</option>
                   <option  value="Cd Mx-GDL">Cd Mx-GDL</option>
                   <option  value="México – Monterrey">México – Monterrey</option>
                  </select>
              </div>

<div class="form-group" >
<label>Metodo de Pago</label>
   <input name="metodo_p" id="metodo_p"  style="text-transform: uppercase;" class="form-control" type="text" value="" >
  </div>

  <div class="form-group" style="height: 92px;" >
            <label>Medio por el que se entero</label>
              <select class="form-control select2" style=" text-transform: uppercase;"  name="medio" id="medio" >
         <option value="--">--</option>
                   <option  value="FB">FB</option>
                   <option  value="Mudanzas Mx">Mudanzas Mx</option>
                   <option  value="Recomendación">Recomendación</option>
                   <option  selected  value="Otro">Otro</option>
                    </select>
              </div>

      <div class="form-group" style="height: 92px;" >
            <label>Requiere Factura?</label>
              <select class="form-control select2" style=" text-transform: uppercase;"  name="factura" id="factura" >
         <option value="--">--</option>
                   <option  value="SI">SI</option>
                   <option  value="NO">NO</option>
                   
                    </select>
              </div>



  <div class="form-group" >
<label>Presupuesto Maximo</label>
   <input name="presupuesto" id="presupuesto"  style="text-transform: uppercase;" class="form-control" type="text" value="" >
  </div>

  <div class="form-group" >
<label>Niveles de la Casa</label>
   <input name="niveles" id="niveles"  style="text-transform: uppercase;" class="form-control" type="text" value="2" >
  </div>



  <div class="form-group" style="height: 92px;" >
            <label>Puede descargar a pie de casa?</label>
              <select class="form-control select2" style=" text-transform: uppercase;"  name="pie_casa" id="pie_casa" >
         <option value="--">--</option>
                   <option  selected  value="SI">SI</option>
                   <option  value="NO">NO</option>
                   
                    </select>
  </div>     

  <div class="form-group" >
<label>Articulo de Valos</label>
   <input name="articulo_v" id="articulo_v"  style="text-transform: uppercase;" class="form-control" type="text" value="" >
  </div>

  <div class="form-group" >
<label>Complejidad de Maniobra</label>
   <input name="complejidad" id="complejidad"  style="text-transform: uppercase;" class="form-control" type="text" value="" >
  </div>
             


                 <div class="form-group" id="lista_muebles" >
                  <label>Lista de muebles:</label>
                  <textarea  id="muebles" name="muebles" class="form-control" rows="3" placeholder="muebles ..." style="text-transform: uppercase;" >muebles muebles muebles muebles mubles muebles muebles muebles muebles muebles</textarea>
                </div>


                <div class="form-group" id="lista_muebles">
                  <label>Comentarios</label>
                  <textarea  id="comentarios" name="comentarios" class="form-control" rows="3" placeholder="comentarios ..." style="text-transform: uppercase;" ></textarea>
                </div>


           


  </div>

   <div class="box-footer">
   <button type="submit" class="btn btn-primary"  name="editarcotizacion" id="editarcotizacion">Guardar Cotización</button>
               <!-- <button type="submit" class="btn btn-primary"  name="borrador" id="borrador">Generar Borrador</button>-->
              </div>
   

    </div>
</div>

              </form>
            </div>
          </div>
        </div>

          </div>

          
    
    




	

	



 </div>
            <!-- /.box-body -->
           
          </div>
          <!-- /.box -->

        

      </div>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      
    </div>
    <strong>Copyright &copy; </strong>Mudanzas La Union
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>



<script type="text/javascript">
	
	$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

   
$('#datepicker').datepicker({
		autoclose: true
	} )



  })

	function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;
  
    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
  if (tecla==46){
        return '.';
    }
  if (tecla==58){
        return ':';
    }
  
     if (tecla==0){
       
    }   
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
</script>

</body>
</html>

