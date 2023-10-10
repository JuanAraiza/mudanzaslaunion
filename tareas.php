<? session_start();
if(isset($_SESSION['tipo_usuario'])){
	
}else{
	?>
    <script language="JavaScript" type="text/javascript">
location.href='index.php';
</script>
    <?
}
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mudanzas - La Unión</title>
  <?php /* <meta name="viewport" content="width=device-width, initial-scale=1">  */?>
  
<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <link rel="stylesheet" href="plugins/fullcalendar/main.min.css">
  <link rel="stylesheet" href="plugins/fullcalendar-daygrid/main.min.css">
  <link rel="stylesheet" href="plugins/fullcalendar-timegrid/main.min.css">
  <link rel="stylesheet" href="plugins/fullcalendar-bootstrap/main.min.css">

  <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.min.css">
  <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.print.css" media="print">

       <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <link rel="stylesheet" href="fontawesome/css/all.css">

<meta charset="UTF-8">

<style type="text/css">
body{
	text-transform: uppercase;
}

.form-group{
/*width: 25%;
float: left;*/
padding: 5px; 

}

</style>
<?php  /*<link href="css/responsive.min.css" rel="stylesheet" /> */ ?>
<script type="text/javascript">
	/*
function cambiarconsejo(v){
	if(v.value!='--'){
		document.getElementById('tipoc').style.display = 'block';
	}else{
		document.getElementById('tipoc').style.display = 'none';
		document.getElementById('directorio').style.display = 'none';
		document.getElementById('archivos').style.display = 'none';
	}
}

function cambiar(v){
	
	switch(v.value){
	case '1':
	document.getElementById('directorio').style.display = 'block';
	document.getElementById('archivos').style.display = 'none';
	document.getElementById('archivos2').style.display = 'none';
	break;	
	case '4':
	document.getElementById('archivos2').style.display = 'block';
	document.getElementById('directorio').style.display = 'none';
	document.getElementById('archivos').style.display = 'none';
	break;	
	case '--':
	document.getElementById('directorio').style.display = 'none';
	document.getElementById('archivos').style.display = 'none';
	document.getElementById('archivos2').style.display = 'none';
	break;	
	default:
	document.getElementById('directorio').style.display = 'none';
	document.getElementById('archivos').style.display = 'block';
	document.getElementById('archivos2').style.display = 'none';
	
	}
}
*/
function changeTipoServ(i){
if(i=='Vehiculo' || i=='Moto'){
document.getElementById('divve').style.display = 'block';
document.getElementById('lista_muebles').style.display = 'none';
}else{
	document.getElementById('divve').style.display = 'none';
	document.getElementById('lista_muebles').style.display = 'block';
}
}
</script>


<?php	
	
	/*
	function clientes(){
	
	  $texto = '';

	include('config.php');
	
	$query="SELECT distinct(cliente) from cotizacion2";
	$r=1;
	$result = $link->query($query);
	while($row=mysqli_fetch_row($result)){
              $texto .= '"' . $row[0] . '",';
	}
	  
	  return $texto;
}
$clientes = clientes();


function origen(){
	
	  $texto = '';

	include('config.php');

	$query = "SELECT distinct(origen) from cotizacion2";
	$r=1;
	$result = $link->query($query);
	while($row=mysqli_fetch_row($result)){
              $texto .= '"' . $row[0] . '",';
	}
	  
	  return $texto;
}
$origen = origen();


function destino(){
	
	  $texto = '';

	include('config.php');

	$query = "SELECT distinct(destino) from cotizacion2";
	$result = $link->query($query);
	$r=1;
	while($row=mysqli_fetch_row($result)){
              $texto .= '"' . $row[0] . '",';
	}
	  
	  return $texto;
}
$destino = destino();

*/
?>

</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper" style="position: unset;">

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
	 <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      
    </nav>
  </header>
  <? include('sidebar-home.php');
  include('config.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Panel de Control - 
      
<? if(isset($_GET['verserv'])){ ?>
Servicio
<? } ?>

<? if(isset($_GET['verservp'])){ ?>
Pendientes
<? } ?>

<? if(isset($_GET['ter'])){ ?>
Terminos y Condiciones
	<? } ?>
	<? if(isset($_GET['p'])){ ?>
Proveedor
	<? } ?>
	<? if(isset($_GET['ta'])){ ?>
Traslado de Auto
	<? } ?>
	<? if(isset($_GET['med'])){ ?>
Medidas Muebles
	<? } ?>
	<? if(isset($_GET['not'])){ ?>
Notas Importantes
	<? } ?>
	<? if(isset($_GET['ser'])){ ?>
Servicios <?php if($_GET['ser']==1){ 
  echo '- Activos';
}else{
	if($_GET['ser']==3){ 
		echo '- Finiquitados';
	  }else{
		if($_GET['ser']==2){ 
			echo '- Cerrados'; 
		  }else{
			if($_GET['ser']==4){ 
			echo '- Cancelados'; 
		  }else{
			echo '- Todos';	
		  } 	
		  } 	
	  } 
} 
  ?>

	<? } ?>
	<? if(isset($_GET['conta'])){ ?>
Movimientos
	<? } ?>
	<? if(isset($_GET['rutas'])){ ?>
Rutas
	<? } ?>
	<? if(isset($_GET['cs'])){ ?>
Cotizaciones
	<? } ?>
	<? if(isset($_GET['nc'])){ ?>
Nueva Solicitud Cotización
	<? } ?>
	<? if(isset($_GET['ckm'])){ ?>
Checklist Mes
	<? } ?>
	<? if(isset($_GET['formatocruz'])){ ?>
Datos Mudanzas Cruz
	<? } ?>


	<? if(isset($_GET['ncoti_flete'])){ 

switch($_GET['tipoc']){
	case 1:
		echo 'Cotización Flete';
	break;
	case 2:
		echo 'Cotización Auto';
	break;
	case 3:
		echo 'Cotización Mudanza';
	break;
}
 
   } ?>

<? if(isset($_GET['cotizaciones2023'])){ ?>
Cotizaciones
	<? } ?>


	<? if(isset($_GET['bu'])){
		switch($_GET['bu']){
			case 17:
				echo 'Inventario';
			break;
			case 18:
				echo 'Cedula Personal';
			break;
			}
} ?>

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

  <? /* date_default_timezone_set('America/Mexico_City');  
				
			 require_once('calendar/tc_calendar.php');*/
			 ?>
       <? include('config.php'); ?>
       <? 
        if(isset($_GET['elia'])){
		   unlink('archivos/'.$_GET['archivo']);
		  
		  $csql = "delete from archivos where id=".$_GET['id'];  
			$link->query($csql);
		   ?>
<script language="JavaScript" type="text/javascript">
location.href='tareas.php?verserv=1&c=<? echo $_GET['c']; ?>';
</script>
<?   
	   }

 if(isset($_GET['newsevicio'])){
	   	 
		 	 $csql = "INSERT INTO servicio (cliente,origen,destino,tipo_mudanza,costo,costo2,muebles,fecha,clave,km,m3,kmextra,empaquec,emplayet,cajacv,cajacr,desempaqueg,empaquem,seguro,otros,extras,tiempo_entrega_aprox,email,telefono,id_user, costoproveedor,pc_seguro,marca,modelo,placas,color,empaque_g,empaque_p,emplaye_t,desempaque,caja_closet,supervision_s,supervision_ps,maniobras_c,maniobras_d,permiso_t,proveedor,proveedor2,proveedor3,fecha_s,hora_s,ruta,metodo_p,medio,factura,presupuesto,niveles,pie_casa,articulo_v,complejidad,comentarios,whatsapp,modalidad) select cliente,origen,destino,tipo_mudanza,costo,costo2,muebles,'".date('Y-m-d H:i:s')."',clave,km,m3,kmextra,empaquec,emplayet,cajacv,cajacr,desempaqueg,empaquem,seguro,otros,extras,testimado,email,telefono,".$_SESSION['id_user'].",costoproveedor,pc_seguro,marca,modelo,placas,color,empaque_g,empaque_p,emplaye_t,desempaque,caja_closet,supervision_s,supervision_ps,maniobras_c,maniobras_d,permiso_t,proveedor1,proveedor2,proveedor3,fecha_s,hora_s,ruta,metodo_p,medio,factura,presupuesto,niveles,pie_casa,articulo_v,complejidad,comentarios,whatsapp,modalidad from cotizacion2 where clave='".$_GET['c']."'";   
		 	
			$link->query($csql);

			 $csql = "update cotizacion2 set estatus=3 where clave='".$_GET['c']."'";    
			$link->query($csql);
		?>
<script type="text/javascript">
location.href='tareas.php?verservicio=1&verserv=1&c=<? echo $_GET['c']; ?>';
</script>
		<? 
	   }

if(isset($_GET['elim'])){
	
		  $csql = "delete from servicios where id=".$_GET['id'];  
		$link->query($csql);

			
		  $csql = "delete from ingresosyegresos where id_mudanza=".$_GET['id'];  
			$link->query($csql);


		   ?>
<script language="JavaScript" type="text/javascript">
location.href='tareas.php';
</script>

<?
	}

	   if(isset($_GET['abrir'])){
	   	switch($_GET['abrir']){
	   		case 2:
?><a id="pdfc" href="whatscotizacionpdf.php?c=<? echo $_GET['c']; ?>" target="_blank"></a>
        <script type="text/javascript">
		document.getElementById("pdfc").click();
		document.getElementById("pdfc").style.display='none';
		</script>
        <? 
	   		break;
	   		case 3:
	   		?><a id="pdfc" href="serviciopdf.php?c=<? echo $_GET['c']; ?>" target="_blank"></a>
        <script type="text/javascript">
		document.getElementById("pdfc").click();
		document.getElementById("pdfc").style.display='none';
		</script>
        <? 
	   		break;
	   		case 4:
?><a id="pdfc" href="whatscotizacionvpdf.php?c=<? echo $_GET['c']; ?>" target="_blank"></a>
        <script type="text/javascript">
		document.getElementById("pdfc").click();
		document.getElementById("pdfc").style.display='none';
		</script>
        <? 
	   		break;

	   	}
		  
	   }


	   
	  /*

	   if(isset($_POST['editarcotizacion'])){
		  
$c1=$_POST['cliente'];
		   $c2=$_POST['origen'];
		   $c3=$_POST['destino'];
		   $c4=$_POST['tipo_mudanza'];
		   $c5=$_POST['costo'];
		   $c6=$_POST['costo2'];
		   $c7=nl2br($_POST['muebles']);
		  
		   $c10=$_POST['km'];
		   $c11=$_POST['m3'];
		   $c12=$_POST['kmextra'];
		   $c13=$_POST['empaquec'];
		   $c14=$_POST['emplayet'];
		   $c15=$_POST['cajacv'];
		   $c16=$_POST['cajacr'];
		   $c17=$_POST['desempaqueg'];
		   $c18=$_POST['empaquem'];
		   $c19=$_POST['seguro'];
		   $c20=$_POST['otros'];
		   $c21=($c13*160)+($c14*400)+($c15*300)+($c16*160)+($c17*80)+($c18*75)+($c19 * .025)+($c20*2500);
		   $c22=$_POST['costo'];
		   $c23=$_POST['testimado'];
		   $c24=$_POST['email'];
		   $c25=$_POST['telefono'];
		   $c26=$_POST['costo2'];
		   $c28=$_POST['sseguro'];
		   $c29=$_POST['pcseguro'];
			$c30=$_POST['marca'];
		   $c31=$_POST['modelo'];
		   $c32=$_POST['tipo'];
		   $c33='';

			$c34=$_POST['empaque_g'];
			$c35=$_POST['empaque_p'];
			$c36=$_POST['emplaye_t'];
			$c37=$_POST['desempaque'];
			$c38=$_POST['caja_closet'];
			$c39=$_POST['supervision_s'];
			$c40=$_POST['supervision_ps'];
			$c41=$_POST['maniobras_c'];
			$c42=$_POST['maniobras_d'];
			$c43=$_POST['permiso_t'];

			$c44=0;
		   $c45=0;
		   $c46=0;
		   $c47=substr($_POST['fecha_s'],6,4).'-'.substr($_POST['fecha_s'],3,2).'-'.substr($_POST['fecha_s'],0,2);
		   $c48='';

		   $c49=$_POST['ruta'];
		   $c50=$_POST['metodo_p'];
		   if($_POST['medio']=='Otro'){
			$c51=$_POST['otro_m'];
		   }else{
			$c51=$_POST['medio'];
		   }
		   $c52=$_POST['factura'];
		   $c53=$_POST['presupuesto'];
		   $c54=$_POST['niveles'];
		   $c55=$_POST['pie_casa'];
		   $c56=$_POST['articulo_v'];
		   $c57=$_POST['complejidad'];
		   $c58=$_POST['comentarios'];
		   $c59=$_POST['modalidad'];
		   $c60=$_POST['tiempo_estimado'];

		   $c61=$_POST['whatsapp'];
		   if($_POST['fecha_aprox']=''){
			$c62='0000-00-00';
		   }else{
			$c62=substr($_POST['fecha_aprox'],6,4).'-'.substr($_POST['fecha_aprox'],3,2).'-'.substr($_POST['fecha_aprox'],0,2);
		   }
		  
		    
		 
		   $conexio = mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
	mysql_select_db($bbdd,$conexio) or die("resultado=".urlencode(mysql_error()));
	
		  $csql = "update cotizacion2 set cliente='".$c1."',origen='".$c2."',destino='".$c3."',tipo_mudanza='".$c4."',muebles='".$c7."',km='".$c10."',m3='".$c11."',kmextra='".$c12."',empaquec='".$c13."',emplayet='".$c14."',cajacv='".$c15."',cajacr='".$c16."',desempaqueg='".$c17."',empaquem='".$c18."',seguro='".$c28."',otros='".$c20."',extras='".$c21."',costo='".$c22."',costo2='".$c22."',testimado='".$c23."',email='".$c24."',telefono='".$c25."',costoproveedor='".$c26."',pc_seguro='".$c29."',marca='".$c30."',modelo='".$c31."',placas='".$c32."',color='".$c33."',empaque_g='".$c34."',empaque_p='".$c35."',emplaye_t='".$c36."',desempaque='".$c37."',caja_closet='".$c38."',supervision_s='".$c39."',supervision_ps='".$c40."',maniobras_c='".$c41."',maniobras_d='".$c42."',permiso_t='".$c43."',proveedor1=".$c44.",proveedor2=".$c45.",proveedor3=".$c46.",fecha_s='".$c47."',hora_s='".$c48."',ruta='".$c49."',metodo_p='".$c50."',medio='".$c51."',factura='".$c52."',presupuesto='".$c53."',niveles='".$c54."',pie_casa='".$c55."',articulo_v='".$c56."',complejidad='".$c57."',comentarios='".$c58."',modalidad='".$c59."',tiempo_estimado='".$c60."',whatsapp='".$c61."',fecha_aprox='".$c62."' where clave='".$_GET['c']."'";  
		   
			mysql_query($csql)or die("resultado=".urlencode(mysql_error()));

		   ?>
<script language="JavaScript" type="text/javascript">
location.href='tareas.php?cs=1&c=<?php echo $_POST['cla']; ?>"&abrir=2';
</script>
<?		   
	   }*/
	   
	   if(isset($_POST['guardarnservicio'])){
		   $c1=$_POST['origen'];
		   $c2=$_POST['destino'];
		   $c3=$_POST['tipo_mudanza'];
		   $c4=$_POST['servicio'];
		   $c5=$_POST['tiempo_entrega'];
		   $c6=$_POST['proveedor'];
		   $c7=$_POST['d_recolecta'];
		   $c8=$_POST['recibe_r'];
		   $c9=$_POST['d_entrega'];
		   $c10=$_POST['e_recibe'];
		   $c11=$_POST['horario'];
		   $c12=nl2br($_POST['lista']);
		   $c13=nl2br($_POST['indicaciones']);
		   $c14=date('Y-m-d H:i:s');
		   $c15=$_POST['anio'].'-'.$_POST['mes'].'-'.$_POST['dia'];
		   $c16=$_POST['costocliente'];
		   $c17=$_POST['costoproveedor'];
		   $c18=$_POST['utilidadflete'];
		   $c19=$_POST['factura'];
		   $c20=$_POST['no_mudanza'];
		   $c21=md5($_POST['origen'].$_POST['destino'].$_POST['tipo_mudanza'].$_POST['servicio'].date('Y-m-d H:i:s'));
		   $c22=$_POST['incluye'];
		   $c23=$_POST['no_incluye'];

		   $c24=$_POST['proveedor2'];
		   $c25=$_POST['proveedor3'];

		  $csql = "INSERT INTO servicios(origen,destino,tipo_mudanza,servicio,tiempo_entrega,proveedor,donde_recolecta,r_recibe,donde_entrega,e_recibe,horario,lista,indicaciones,fecha,fecha_m,costo_cliente,costo_proveedor,utilidad_flete,factura,no_mudanza,clave,incluye,no_incluye,proveedor2,proeveedor3) VALUES ('".$c1."','".$c2."','".$c3."','".$c4."','".$c5."','".$c6."','".$c7."','".$c8."','".$c9."','".$c10."','".$c11."','".$c12."','".$c13."','".$c14."','".$c15."','".$c16."','".$c17."','".$c18."','".$c19."','".$c20."','".$c21."','".$c22."','".$c23."',".$c24.",".$c25.")";  
			$link->query($csql);
		   ?>
<script language="JavaScript" type="text/javascript">
	
location.href='tareas.php?c=<? echo $c21; ?>"&abrir=3';
</script>
<?   
	   }


	  

	   if(isset($_POST['editarservicio'])){
		   $c1=$_POST['origen'];
		   $c2=$_POST['destino'];
		   $c3=$_POST['tipo_mudanza'];
		   $c4=$_POST['servicio'];
		   $c5=$_POST['tiempo_entrega'];
		   $c6=$_POST['proveedor'];
		   $c7=$_POST['d_recolecta'];
		   $c8=$_POST['recibe_r'];
		   $c9=$_POST['d_entrega'];
		   $c10=$_POST['e_recibe'];
		   $c11=$_POST['horario'];
		   $c12=nl2br($_POST['lista']);
		   $c13=nl2br($_POST['indicaciones']);
		   $c14=date('Y-m-d H:i:s');
		   $c15=$_POST['anio'].'-'.$_POST['mes'].'-'.$_POST['dia'];
		   $c16=$_POST['costocliente'];
		   $c17=$_POST['costoproveedor'];
		   $c18=$_POST['utilidadflete'];
		   $c19=$_POST['factura'];
		   $c20=$_POST['no_mudanza'];
		   $c21=md5($_POST['origen'].$_POST['destino'].$_POST['tipo_mudanza'].$_POST['servicio'].date('Y-m-d H:i:s'));
		   $c22=$_POST['incluye'];
		   $c23=$_POST['no_incluye'];
		   $c24=$_POST['proveedor2'];
		   $c25=$_POST['proveedor3'];
		   $clave=$_POST['c'];

		  $csql = "update servicios set origen='".$c1."',destino='".$c2."',tipo_mudanza='".$c3."',servicio='".$c4."',tiempo_entrega='".$c5."',proveedor='".$c6."',donde_recolecta='".$c7."',r_recibe='".$c8."',donde_entrega='".$c9."',e_recibe='".$c10."',horario='".$c11."',lista='".$c12."',indicaciones='".$c13."',fecha='".$c14."',fecha_m='".$c15."',costo_cliente='".$c16."',costo_proveedor='".$c17."',utilidad_flete='".$c18."',factura='".$c19."',no_mudanza='".$c20."',incluye='".$c21."',no_incluye='".$c22."',proveedor2=".$c24.",proveedor3=".$c25." where clave='".$clave."'";  
			$link->query($csql);
		   ?>
<script language="JavaScript" type="text/javascript">
location.href='tareas.php';
</script>
<?   
	   }
	   
	   if(isset($_GET['elim'])){
		  
		  $csql = "delete from generales where id=".$_GET['id'];  
		  $link->query($csql);
		   
		  $csql = "delete from ingresosyegresos where id_mudanza=".$_GET['id'];  
		  $link->query($csql);
		   ?>
<script language="JavaScript" type="text/javascript">
location.href='tareas.php';
</script>
<?
	   }
	   
	   if(isset($_POST['guardar'])){
		    
		   if($_POST['no']!='' and $_POST['origenydestino']!=''){
	
		
			$campo1=$_POST['no'];
			$campo2=$_POST['anio'].'-'.$_POST['mes'].'-'.$_POST['dia'];
			$campo3=$_POST['origenydestino'];
			$campo4=$_POST['costocliente'];
			$campo5=$_POST['costoproveedor'];
			$campo6=$_POST['utilidadflete'];
			$campo7=$_POST['factura'];
			
			$csql = "INSERT INTO generales(no,fecha_mud,origen_y_destino,costo_cliente,costo_proveedor,utilidad_flete,facturado) VALUES ('".$campo1."','".$campo2."','".$campo3."','".$campo4."','".$campo5."','".$campo6."','".$campo7."')";  
		   
		$link->query($csql);
		   ?>
<script language="JavaScript" type="text/javascript">
location.href='tareas.php';
</script>

<?
		   }
	   }
	   
	   
	   ?>
       
        <? //include('formulario.php'); ?>
        <!--
        <div id="form-overlaymovimientos" class="hidden" style="border-radius:8px;">
        
        </div>
-->



<!--	<a id="movim" href="#"  data-lightbox-target="#form-overlaymovimientos" data-lightbox-fit-viewport="false"></a>-->
<? if(isset($_GET['p']) || isset($_GET['n']) || isset($_GET['nc']) || isset($_GET['cs'])){ }else{ ?>
<? //include('tablainicio.php'); ?>
<? } ?>



<? 
 if(isset($_GET['elimov'])){
	
	$csql = "delete from ingresosyegresos where id=".$_GET['id'];  
	$link->query($csql);
	
}

if(isset($_GET['elic'])){
	
		
		  $csql = "delete from cotizacion2 where clave='".$_GET['c']."'";   
			$link->query($csql);
		   ?>
<script language="JavaScript" type="text/javascript">
location.href='tareas.php?cs=1';
</script>

<?
	}
if(isset($_GET['med'])){
	
	if(isset($_POST['guardar'])){
	
		$campo1=$_POST['mueble'];
		$campo2=$_POST['alto'];
		$campo3=$_POST['ancho'];
		$campo4=$_POST['profundidad'];
		
	
		
		  $csql = "INSERT INTO medidas(nombre,alto,ancho,profundidad) VALUES ('".$campo1."','".$campo2."','".$campo3."','".$campo4."')";  
		$link->query($csql);
		   ?>
<script language="JavaScript" type="text/javascript">
location.href='tareas.php?med=1';
</script>

<?
	}

	if(isset($_POST['editar'])){
	
		$campo1=$_POST['mueble'];
		$campo2=$_POST['alto'];
		$campo3=$_POST['ancho'];
		$campo4=$_POST['profundidad'];
		
	
		
		  $csql = "update medidas set nombre='".$campo1."',alto='".$campo2."',ancho='".$campo3."',profundidad='".$campo4."' where id=".$_POST['id'];  
		$link->query($csql);
		   ?>
<script language="JavaScript" type="text/javascript">
location.href='tareas.php?med=1';
</script>

<?
	}

		if(isset($_GET['eli'])){
	
		
	
		  
		  $csql = "delete from medidas where id=".$_GET['id'];  
		$link->query($csql);
		   ?>
<script language="JavaScript" type="text/javascript">
location.href='tareas.php?med=1';
</script>

<?
	}


}

if(isset($_GET['p'])){
	
	if(isset($_POST['guardar'])){
	
		$campo1=$_POST['nombre'];
		$campo2='';
		$campo3='';
		$campo4=$_POST['telefono'];
		$campo5=$_POST['correo'];
		$campo6='';
		$campo7='';
		$campo8=$_POST['no_cuenta'];
		$campo9=$_POST['banco'];
		/////////////////////// Images //////////////////////////
		$errore1=false;
		if (is_uploaded_file($_FILES['img_tarjeta']['tmp_name'])) {
		  $campo10 = date('dmYHis').$_FILES['img_tarjeta']['name'];
		  $campo10 =str_replace(' ','_',$campo10 );
		  // echo $e1;
		 
		  move_uploaded_file($_FILES['img_tarjeta']['tmp_name'], "archivos/".$campo10 );
		} else {
		$errore1=true;
		$errormsg = "Error al cargar imagen: " . $_FILES['img_tarjeta']['name'];
		}
		if($errore1){
		$campo10  = "N_A";
		}
		/////////////////////// Fin Images //////////////////////////
		$campo11=$_POST['direccion'];
		$campo12=$_POST['no_cuenta2'];
		$campo13=$_POST['banco2'];
		

		  $csql = "INSERT INTO proveedores(nombre,paterno,materno,telefono,correo,rfc,empresa,no_cuenta,banco,tarjeta,direccion,no_cuenta2,banco2) VALUES ('".$campo1."','".$campo2."','".$campo3."','".$campo4."','".$campo5."','".$campo6."','".$campo7."','".$campo8."','".$campo9."','".$campo10."','".$campo11."','".$campo12."','".$campo13."')";  
	
//echo $csql;
	$link->query($csql);
		   ?>
<script language="JavaScript" type="text/javascript">
location.href='tareas.php?p=1';
</script>

<?
	}
	
	if(isset($_POST['editar'])){
	
		$campo1=$_POST['nombre'];
		$campo2='';
		$campo3='';
		$campo4=$_POST['telefono'];
		$campo5=$_POST['correo'];
		$campo6='';
		$campo7='';
		$campo8=$_POST['no_cuenta'];
		$campo9=$_POST['banco'];
		/////////////////////// Images //////////////////////////
		$errore1=false;
		if (is_uploaded_file($_FILES['img_tarjeta']['tmp_name'])) {
		  $campo10 = date('dmYHis').$_FILES['img_tarjeta']['name'];
		  $campo10 =str_replace(' ','_',$campo10 );
		  // echo $e1;
		 
		  move_uploaded_file($_FILES['img_tarjeta']['tmp_name'], "archivos/".$campo10 );
		} else {
		$errore1=true;
		$errormsg = "Error al cargar imagen: " . $_FILES['img_tarjeta']['name'];
		}
		if($errore1){
		$campo10  = "N_A";
		}
		$campo11=$_POST['direccion'];
		$campo12=$_POST['no_cuenta2'];
		$campo13=$_POST['banco2'];
		 
		  $csql = "update proveedores set nombre='".$campo1."',paterno='".$campo2."',materno='".$campo3."',telefono='".$campo4."',correo='".$campo5."',rfc='".$campo6."',empresa='".$campo7."',no_cuenta='".$campo8."',banco='".$campo9."',tarjeta='".$campo10."',direccion='".$campo11."',no_cuenta2='".$campo12."',banco2='".$campo13."' where id=".$_POST['id'];  
			$link->query($csql);
		   ?>
<script language="JavaScript" type="text/javascript">
location.href='tareas.php?p=1';
</script>

<?
	}
	
	if(isset($_GET['eli'])){
	
		  
		  $csql = "delete from proveedores where id=".$_GET['id'];  
			$link->query($csql);
		   ?>
<script language="JavaScript" type="text/javascript">
location.href='tareas.php?p=1';
</script>

<?
	}
	$ini=0;
	
	
	if(isset($_GET['edi'])){
		$ini=1;
		//echo 'edi1';
		include('edi1.php');
	}else{
		$ini=1;
		//echo 'edi2';
		include('edi2.php');
	}
	?>
    <br><br>
   <?
   $ini=1;
	include('tablaproveedores.php'); 
} ?>


<? if(isset($_GET['n'])){ 
	if(isset($_GET['edit'])){ 
		$ini=1;
include('editservicio.php');
		?>


	<? }else{
		$ini=1;
		include('nuevoservicio.php');
	?>

<?	} } ?>


<? 

if(isset($_GET['bu'])){ 
switch($_GET['bu']){
	case 10:
		include('tablacotizacionparagenerar.php');
	break;
	case 11:
		include('verserviciocot.php'); 
	break;

}
$ini=1;

}

if(isset($_GET['cs'])){ 
$ini=1;
	?>
  <? include('tablacotizacion.php'); ?>
<? }else{ ?>
<? if(isset($_GET['nc'])){ ?>
<? if(isset($_GET['edit'])){ ?>

<? 
$ini=1;
include('editcotizacion.php'); ?>

<? } else{ ?>

<?
$ini=1;
 include('nc.php'); ?>

    <? } ?>
    
    <? } ?>

<?	} ?>



<? if(isset($_GET['verserv'])){ ?>
<?
$ini=1;
 include('verservicio.php');
  ?>
	<? } ?>

	<? if(isset($_GET['verservp'])){ ?>
<?
$ini=1;
if(isset($_GET['eli'])){
$ini=0;

		  $csql = "delete from viaweb where id=".$_GET['c'];  
		  $link->query($csql);
}else{
	include('verserviciop.php'); 
}
 ?>
	<? } ?>

<? if(isset($_GET['ter'])){ ?>
<? 
$ini=1;
include('terminos.php'); ?>
	<? } ?>

	<? if(isset($_GET['med'])){ ?>
<? 
$ini=1;
include('medidas.php'); ?>
	<? } ?>

<? if(isset($_GET['ser'])){ 
	 if(isset($_GET['elise'])){
	

	$csql = "insert into servicio_eli(cliente,origen,destino,tipo_mudanza,costo,costo2,muebles,fecha,clave,km,m3,kmextra,empaquec,emplayet,cajacv,cajacr,desempaqueg,empaquem,seguro,otros,extras,fecha_s,hora_s,calle_no_c,colonia_c,referencia_c,nom_c,tel_c,calle_no_d,colonia_d,referencia_d,nom_d,tel_d,anticipo,a_la_carga,antes_de_la_carga,forma_de_pago,tiempo_entrega_aprox,observaciones,proveedor,favorllevar,costocliente,costoproveedor,ciudad_c,ciudad_d,dias,cerrado,falta_pagar,email,telefono,id_user,s_cortecia,p1,p2,p3,pc_seguro,marca,modelo,placas,color,empaque_g,empaque_p,emplaye_t,desempaque,caja_closet,supervision_s,supervision_ps,maniobras_c,maniobras_d,permiso_t,material_e,emplaye_tt,empaque_t,desempaque_t,supervision,factura_prov,factura_cliente,persona_fc,evidencia_carga,evidencia_descarga,firma_conformidad,seguro_prov,factura_a_c,factura_a_p,razon_s_c,gruas,proveedor2,proveedor3,ruta,metodo_p,medio,factura,presupuesto,niveles,pie_casa,articulo_v,complejidad,comentarios,estatus,cscliente,totalseguros,modalidad,tiempo_estimado,sr,codpostal_c,estado_c,codpostal_d,estado_d) select cliente,origen,destino,tipo_mudanza,costo,costo2,muebles,fecha,clave,km,m3,kmextra,empaquec,emplayet,cajacv,cajacr,desempaqueg,empaquem,seguro,otros,extras,fecha_s,hora_s,calle_no_c,colonia_c,referencia_c,nom_c,tel_c,calle_no_d,colonia_d,referencia_d,nom_d,tel_d,anticipo,a_la_carga,antes_de_la_carga,forma_de_pago,tiempo_entrega_aprox,observaciones,proveedor,favorllevar,costocliente,costoproveedor,ciudad_c,ciudad_d,dias,cerrado,falta_pagar,email,telefono,id_user,s_cortecia,p1,p2,p3,pc_seguro,marca,modelo,placas,color,empaque_g,empaque_p,emplaye_t,desempaque,caja_closet,supervision_s,supervision_ps,maniobras_c,maniobras_d,permiso_t,material_e,emplaye_tt,empaque_t,desempaque_t,supervision,factura_prov,factura_cliente,persona_fc,evidencia_carga,evidencia_descarga,firma_conformidad,seguro_prov,factura_a_c,factura_a_p,razon_s_c,gruas,proveedor2,proveedor3,ruta,metodo_p,medio,factura,presupuesto,niveles,pie_casa,articulo_v,complejidad,comentarios,estatus,cscliente,totalseguros,modalidad,tiempo_estimado,sr,codpostal_c,estado_c,codpostal_d,estado_d from servicio where clave='".$_GET['c']."'";  
	//echo $csql.'<br>';
	$link->query($csql);

	$csql = "delete from servicio where clave='".$_GET['c']."'";  
	$link->query($csql);
	
}

if(isset($_GET['canse'])){
	

	$csql = "update servicio set estatus=4 where clave='".$_GET['c']."'";  
	$link->query($csql);
	
}
 
if(isset($_GET['cerr'])){

	$csql = "update servicio set cerrado='SI' where clave='".$_GET['c']."'";  
	$link->query($csql);
	
}

if(isset($_GET['acla'])){
	
	
	$csql = "update servicio set cerrado='AC' where clave='".$_GET['c']."'";  
	$link->query($csql);
	
}

if(isset($_GET['abi'])){
	
	
	$csql = "update servicio set cerrado='NO' where clave='".$_GET['c']."'";  
	$link->query($csql);
	
}

$ini=1;
if($_GET['ser']==1){ 
  include('tablaservicios.php'); 
}else{
	if($_GET['ser']==3){ 
		include('tablaservicios3.php'); 
	  }else{
		if($_GET['ser']==2){ 
			include('tablaservicios2.php'); 
		  }else{
		  	if($_GET['ser']==4){ 
			include('tablaservicios4.php'); 
		  }else{
			include('todosservicios.php'); 	
		  } 	
				
		  } 	
	  } 
} 
  ?>
<? } ?>

<? if(isset($_GET['ta'])){ ?>
  <? 
$ini=1;
  include('ncta.php'); ?>
<? } ?>
<? if(isset($_GET['conta2022'])){ ?>
  <? 
$ini=1;
  include('checklist2022.php'); ?>
<? } ?>



<? if(isset($_GET['conta'])){ ?>
  <? 
$ini=1;
  include('formulariomovimientos.php'); ?>
<? } ?>

<? if(isset($_GET['rutas'])){ ?>
  <? 
$ini=1;
  include('tablarutas.php'); ?>
<? } ?>

<? if(isset($_GET['conta22'])){ ?>
  <? 
$ini=1;
  include('formulariomovimientosnew.php'); ?>
<? } ?>
<? if(isset($_GET['conta23'])){ ?>
  <? 
$ini=1;
  include('formulariomovimientosnew2.php'); ?>
<? } ?>

<? if(isset($_GET['pet'])){ ?>
  <? 
$ini=1;
  include('tablapeticiones.php'); ?>
<? } ?>
<? if(isset($_GET['ckm'])){ 
$ini=1;
//echo "dd";
  include('cehckspormes.php');
   } ?>

   <? if(isset($_GET['not'])){ 
$ini=1;
//echo "dd";
  include('notas_i.php');
   } ?>

    <? if(isset($_GET['ncotizacion'])){ 
$ini=1;
//echo "dd";
  include('ncotizacion.php');
   } ?>

<? if(isset($_GET['verservcer'])){ 
$ini=1;
 include('verserviciocer.php');
   } ?>

<? if(isset($_GET['formatocruz'])){ 
$ini=1;
 include('verserviciocruz.php');
   } ?>

<? if(isset($_GET['ncoti_flete'])){ 
$ini=1;
switch($_GET['tipoc']){
	case 1:
		include('cotizador-flete.php');
	break;
	case 2:
		include('cotizador-auto.php');
	break;
	case 3:
		include('cotizador-mudanza.php');
	break;
}
 
   } ?>

<? if(isset($_GET['cotizaciones2023'])){ 
$ini=1;
 include('tablacotizacion.php');
   } ?>


<?php if(isset($_GET['bu'])){
$ini=1;
switch($_GET['bu']){
	case 17:
		include('inventario_gral.php');
		break;
	case 18:
		include('cedula_personal.php');
		break;

}


}
?>




<? if($ini==0){ ?>
  <? 
  include('calendario.php');
$ini=0;
//include('tablacotizacion.php');
  //include('tablapeticiones.php'); ?>
<!--  <div align="center">
  <img src="images/fondopanel.png" />
  </div>-->
<? } ?>

<script type="text/javascript">
document.getElementById('tipoc').style.display = 'none';
document.getElementById('directorio').style.display = 'none';
document.getElementById('archivos').style.display = 'none';
document.getElementById('archivos2').style.display = 'none';
</script>
<!--
<script
			  src="https://code.jquery.com/jquery-2.1.0.js"
			  integrity="sha256-D6d1KSapXjq2tfZ6Ie9AYozkRHyB3fT2ys9mO2+4Wvc="
			  crossorigin="anonymous"></script>

<script src="js/responsive.min.js"></script>

-->
<? 

	   ?>

        

      </div>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>



<div class="modal fade" id="modal-not<?php //echo $row[0]; ?>">
          <div class="modal-dialog"  role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h3 class="box-title">Nota</h3>
              </div>
             
              <div class="modal-body" >

      </div>
     
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



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

<script type="text/javascript">
      function coll(){
       // alert("aqui");
         $('.push-menu').collapse()
      }

    </script>
<!-- ./wrapper -->





<script>

</script>
<? if($ini==0){ ?>
<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- jQuery UI 1.11.4 -->

<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="ist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="plugins/moment/moment.min.js"></script>
<script type="text/javascript" src="plugins/moment/locale/es.js"></script>
<script src="plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="dist/js/app.min.js"></script>
<script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        };

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject);

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex: 1070,
          revert: true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        });

      });
    }

    ini_events($('#external-events div.external-event'));

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date();
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear();
    $('#calendar').fullCalendar({
    	lang: 'es',
      
      //Random default events
      events: [
        <?php
        $query = "SELECT * from servicio where cerrado!='SI' order by id desc";

    $result = $link->query($query);
	while($row=mysqli_fetch_row($result)){
		if(substr($row[22],0,10)!='0000-00-00'){

switch($row[99]){
                     case 1:
                     $c='#3c8dbc';
                    break;
                    case 2:
                    $c='#e79b41';
                    break;
                    case 3:
                    $c='#59d65f';
                    break;
                    case 4:
                    $c='#d0d22f';
                    break;
                    
                  } 
?>
        {
          title: '<?php echo $row[1]; ?>\n\rOri: <?php echo $row[2]; ?>\n\rDes: <?php echo $row[3]; ?>',
          start: '<?php echo substr($row[22],0,4).'-'.substr($row[22],5,2).'-'.substr($row[22],8,2); ?>',
          end: '<?php echo substr($row[22],0,4).'-'.substr($row[22],5,2).'-'.substr($row[22],8,2); ?>',
          url: 'tareas.php?conta22=1&c=<?php echo $row[9]; ?>',
          backgroundColor: "<?php echo $c; ?>", //Primary (light-blue)
          borderColor: "<?php echo $c; ?>" //Primary (light-blue)
        },
    <?php } } ?>

    <?php
        $query = "SELECT * from notas_i ";

    $result = $link->query($query);
	while($row=mysqli_fetch_row($result)){
		
if($row[5]!=''){
	$c=$row[5];
}else{
  $c='#ff2400';              
    }                
                   
?>
        {
          title: '<?php echo $row[1]; ?>',
          start: '<?php echo substr($row[2],0,4).'-'.substr($row[2],5,2).'-'.substr($row[2],8,2); ?>',
          end: '<?php echo substr($row[2],0,4).'-'.substr($row[2],5,2).'-'.substr($row[2],8,2); ?>',
          url: 'tareas.php?vernot=1&nt=<?php echo $row[0]; ?>',
          backgroundColor: "<?php echo $c; ?>", //Primary (light-blue)
          borderColor: "<?php echo $c; ?>" //Primary (light-blue)
        },
    <?php }  ?>
      ],
      editable: true,
      droppable: true, // this allows things to be dropped onto the calendar !!!
      drop: function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject');

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject);

        // assign it the date that was reported
        copiedEventObject.start = date;
        copiedEventObject.allDay = allDay;
        copiedEventObject.backgroundColor = $(this).css("background-color");
        copiedEventObject.borderColor = $(this).css("border-color");

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove();
        }

      }
    });

    
    
  });
</script>
<?php }else{ ?>
	<!--<script src="bower_components/jquery/dist/jquery.min.js"></script>-->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="bower_components/moment/min/moment.min.js"></script>

<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<script src="plugins/iCheck/icheck.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="dist/js/app.min.js"></script>
<!-- CK Editor -->
<script src="bower_components/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
	
	$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

$('#datepicker').datepicker({
		autoclose: true,
    format: 'dd/mm/yyyy',
	language: 'es'
	} )
$('#fecha').datepicker({
		autoclose: true,
    format: 'dd/mm/yyyy',
	language: 'es'
	} )
$('#fecha2').datepicker({
		autoclose: true,
    format: 'dd/mm/yyyy',
	language: 'es'
	} )
	
	$('#fecha_aprox').datepicker({
		autoclose: true,
    format: 'dd/mm/yyyy',
	language: 'es'
	} )

    $('#fsalida').datepicker({
    	format: 'dd/mm/yyyy',
		autoclose: true,
	language: 'es'
	} )

    $('#ffactura2').datepicker({
    autoclose: true,
	language: 'es'
  } )
  
  
    $('#fcomprobante').datepicker({
    autoclose: true,
	language: 'es'
  } )
  

$('.timepicker').timepicker({
      showInputs: false
    })

/*
	$('input[type="checkbox"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue'
    });

*/



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
function cambioMedio(v){
	if(v=='Otro'){
		document.getElementById('otro_medio').style.display = 'block';
	}else{
		document.getElementById('otro_medio').style.display = 'none';
	}
}
</script>
<?php } ?>
</body>
</html>
