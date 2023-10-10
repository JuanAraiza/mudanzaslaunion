<style type="text/css">
  
  
   .pagind .active > a{
      background: rgb(255,116,0); 
     }
    .pagind{
      margin-left: 0px;
          padding: 0px;
    } 
      .pagind > li{
        list-style: none;
        display: inline-block;
        margin-right:7px;
      }
      .pagind > li > a {
        color: #FFFFFF;
        text-decoration: none;
        padding: 5px 10px 5px 10px;
        display: block;
        background: #d60000;
    border-radius: 20px;

      }
      .btn > a{
        padding: 2px;
    background: #d60000; 
     border-radius: 2px;
     text-align: center;
     width:30px;
      }

.pagind#menu {
 background: #333;
 width: 940px;
 float:left;
 padding: 5px;
}
  
.pagind#menu li {
 color: #fff;
 float: left;
 list-style: none;
 
 font-size: 10px;
}
  
.pagind#menu li:hover{
 color: #aaa073;
 cursor:pointer;
}
  
.pagind#menu ul {
 display: none;
 position: absolute;

 background: #333;
 color: #fff;
 padding: 5px 0px 5px 5px;
 margin: 0;
 }
  
.pagind#menu ul li{
 float: left;
 color: #fff;
 width:100%;
 margin:2% 0%;
}
 
 
.pagind#menu ul li a{
 color: #fff;
}
  
.pagind#menu ul li a:hover{
 color: #aaa073;
 cursor:pointer;
}
  
.pagind#menu li:hover ul ul,ul#menu li:hover ul ul ul,ul#menu li.iehover ul ul,ul#menu li.iehover ul ul ul {
 display: none;
 cursor:pointer;
}
  
.pagind#menu li:hover ul,ul#menu ul li:hover ul,ul#menu ul ul li:hover ul,ul#menu li.iehover ul,ul#menu ul li.iehover ul,ul#menu ul ul li.iehover ul {
 display: block;
 cursor:pointer;
}

     
  </style>
<?
function number_of_working_days($from, $to) {
    $workingDays = [1, 2, 3, 4, 5]; # date format = N (1 = Monday, ...)
    $holidayDays = ['*-12-25', '*-01-01', '*-05-01',   '*-11-02',  '*-11-20',  '*-12-12']; # variable and fixed holidays
//$feriados  = array('1-1','29-3','30-3','1-5','16-9','2-11','20-11','12-12', '25-12' );
    $from = new DateTime($from);
    $to = new DateTime($to);
    $to->modify('+1 day');
    $interval = new DateInterval('P1D');
    $periods = new DatePeriod($from, $interval, $to);

    $days = 0;
    foreach ($periods as $period) {
        if (!in_array($period->format('N'), $workingDays)) continue;
        if (in_array($period->format('Y-m-d'), $holidayDays)) continue;
        if (in_array($period->format('*-m-d'), $holidayDays)) continue;
        $days++;
    }
    return $days;
}
?>
<div class="row">
    <div class="col-md-12">
<a class="btn bg-green" href="excelservicios.php" target="_blank">Exportar Cerrados a Excel</a>
<br>
<form method="post" accept="tareas.php?ser=1">



<div class="row col-md-12">

  <div class="form-group col-md-3">
                  <label>FOLIO</label>
                        
                          <input  class="form-control" autocomplete="off"  type="text" name="folio">
               
                </div>

              <div class="form-group col-md-3" >
            <label>CLIENTE:</label>
               <select class="form-control select2" style="width: 100%;" id="cliente" name="cliente">
                  <option value="--">--</option>
                  
                  <?

                 
  $query = "select distinct(cliente) FROM servicio";
 $result = $link->query($query);
while ($row = mysqli_fetch_row($result)){
  ?>

<option value="<? echo $row[0]; ?>"><? echo $row[0] ; ?></option>
<? } ?>
                </select>
              </div>
 

  <div class="form-group col-md-3">
                  <label>FECHA 1 DEL SERVICIO</label>
                        
                          <input  class="form-control" autocomplete="off"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask maxlength="10" type="text" name="fecha" id="datepicker">
               
                </div>

 <div class="form-group col-md-3">
                  <label>FECHA 2 DEL SERVICIO</label>
                        
                          <input name="fecha2" id="fecha2" autocomplete="off" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask maxlength="10" type="text" class="form-control" >
                  
                </div>

   <div class="form-group col-md-3">
            <label>ORIGEN:</label>
               <select class="form-control select2" style="width: 100%;" id="origen" name="origen">
                  <option value="--">--</option>
                  
                  <?

                 
  $query = "select distinct(origen) FROM servicio";
  $result = $link->query($query);
while ($row = mysqli_fetch_row($result)){
  ?>

<option value="<? echo $row[0]; ?>"><? echo $row[0] ; ?></option>
<? } ?>
                </select>
              </div>
                              <div class="form-group col-md-3">
            <label>DESTINO:</label>
               <select class="form-control select2" style="width: 100%;" id="destino" name="destino">
                  <option value="--">--</option>
                  
                  <?

  $query ="select distinct(destino) FROM servicio";
  $result = $link->query($query);
while ($row = mysqli_fetch_row($result)){
  ?>

<option value="<? echo $row[0]; ?>"><? echo $row[0] ; ?></option>
<? } ?>
                </select>
              </div>


  <div class="form-group col-md-3">
            <label>PROVEEDOR:</label>
               <select class="form-control select2" style="width: 100%;" id="proveedor" name="proveedor">
                  <option value="--">--</option>
                  
                  <?
$query = "select * FROM proveedores";
  $result = $link->query($query);
while ($row = mysqli_fetch_row($result)){
  ?>

<option value="<? echo $row[0]; ?>"><? echo $row[1].' '.$row[2].' '.$row[6]; ?></option>
<? } ?>
                </select>
              </div>
<?php /*
                <div class="form-group" style="width: 14%; float: left; padding: 5px;">
            <label>ESTATUS:</label>
               <select class="form-control select2" style="width: 100%;" id="estatus" name="estatus">
                  <option value="--">--</option>
                  
        
<option value="NO">ABIERTO</option>
<option value="SI">CERRADO</option>
<option value="AC">EN ACLARACION</option>
                </select>
              </div>
*/ ?>

                

  <div class="form-group" style="width: 25%; float: left; padding: 5px;">
            <label>&nbsp;</label>
            <input type="submit" name="buscar" id="buscar" class="form-control bg-blue" value="Buscar" >
    </div>
</div>

</form>
<br>
<div class="box-body table-responsive no-padding" style="width:100%;">
<table class="table table-hover">
    <tr>
      <td align="center"><strong>Dias</strong></td>
      <td align="center"><strong>Folio</strong></td>
    <td align="center"><strong>Cliente</strong></td>
    <td align="center"><strong>Origen</strong></td>
    <td align="center"><strong>Destino</strong></td>
    <td align="center"><strong>Fecha</strong></td>
    <td align="center"><strong>Tipo</strong></td>
    <td></td>
    <td></td>
   <!--  <td></td>-->
    </tr>
    <?
  include("config.php");
  		
if(isset($_POST['buscar'])){
$cade='';


if($_POST['folio']!=''){
$cade.=" and id=".$_POST['folio'];
}
if($_POST['cliente']!='--'){
$cade.=" and cliente='".$_POST['cliente']."'";
}
if($_POST['origen']!='--'){
$cade.=" and origen='".$_POST['origen']."'";
}
if($_POST['destino']!='--'){
$cade.=" and destino='".$_POST['destino']."'";
}
/*
if($_POST['estatus']!='--'){
$cade.=" and cerrado='".$_POST['estatus']."'";
}*/
if($_POST['fecha']!=''){
  
if($_POST['fecha2']!=''){
    $fech1=substr($_POST['fecha'],6,4).'-'.substr($_POST['fecha'],3,2).'-'.substr($_POST['fecha'],0,2);
    $fech2=substr($_POST['fecha2'],6,4).'-'.substr($_POST['fecha2'],3,2).'-'.substr($_POST['fecha2'],0,2);
    $cade.=" and fecha_s between '".$fech1."' and '".$fech2."'";
}else{
    $fech1=substr($_POST['fecha'],6,4).'-'.substr($_POST['fecha'],3,2).'-'.substr($_POST['fecha'],0,2);
    $cade.=" and fecha_s = '".$fech1."'";
}

}
if($_POST['proveedor']!='--'){
$cade.=" and (proveedor='".$_POST['proveedor']."' or proveedor2='".$_POST['proveedor']."' or proveedor3='".$_POST['proveedor']."') ";
}
$query = "SELECT * from servicio where id>=1 ".$cade." and cerrado='SI' order by id desc";
}else{
	$query = "SELECT * from servicio where cerrado='SI' order by id desc";
}

//$_SESSION['query']=$query.' limit 100';
$_SESSION['query2']=$query;
$_SESSION['servicios']='CERRADOS';
//echo $query.'<br>';

    $CantidadMostrar=50;
//Conexion  al servidor mysql
if(isset($_SESSION['query2'])){
 // echo $_SESSION['query'];
                    // Validado  la variable GET
    $compag         =(int)(!isset($_GET['pag'])) ? 1 : $_GET['pag']; 
    $TotalReg       =$link->query($_SESSION['query2']);
    //Se divide la cantidad de registro de la BD con la cantidad a mostrar 
    $TotalRegistro  =ceil($TotalReg->num_rows/$CantidadMostrar);
    //echo "<b>La cantidad de resgistro se dividio a: </b>".$TotalRegistro." para mostrar 5 en 5<br>";
    //Consulta SQL
    $consultavistas =$_SESSION['query2'] ." LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar;
                        //echo $consultavistas;
    //$consulta=$conetar->query($consultavistas);
$_SESSION['query']=$consultavistas;

    $result = $link->query($consultavistas);
}



		//$result = $link->query($query);
$r=1;
	while($row=mysqli_fetch_row($result)){
		if($r==1){
			$r=2;
			$c='#c8c8c6';
		}else{
			$r=1;
			$c='#dbdbdb';
		}


/*
$inicio = substr($rowes1[2],8,2).'-'.substr($rowes1[2],5,2).'-'.substr($rowes1[2],0,4);
$fin = substr($rowes2[2],8,2).'-'.substr($rowes2[2],5,2).'-'.substr($rowes2[2],0,4);
$dias = Evalua(DiasHabiles($inicio,$fin));
*/

if($row[47]!='SI'  and $row[46]>=1){

$dias = $row[46]-(number_of_working_days(substr($row[22],0,10), date('Y-m-d')));
    if($dias<=0){
      $c='#e74141';
    }else{
      if($dias<=3){
      $c='#e79b41';
    }else{
      if($dias<=5){
      $c='#59d65f';
    }else{
      $c='#5bb8de';
    }
    }
    }

     } 
     if($row[47]=='AC'){
      $c='#d0d22f';
     }

		?>
         <tr style="background:<? echo $c; ?>; height: 48px; vertical-align:middle; border:#5A5959 solid 1px; ">
    <td style="vertical-align:middle;"><? 
if($row[47]=='NO' and $row[46]>=1){
     echo $dias;

     } ?></td>
    <td style="vertical-align:middle;"><h2><? echo $row[0]; ?></h2></td>
    <td style="vertical-align:middle;"><? echo $row[1]; ?></td>
    <td style="vertical-align:middle;"><? echo $row[2]; ?></td>
    <td style="vertical-align:middle;"><? echo $row[3]; ?></td>
    <td style="vertical-align:middle;"><? echo substr($row[8],8,2).'-'.substr($row[8],5,2).'-'.substr($row[8],0,4); ?></td>
    <td style="vertical-align:middle;"><? echo $row[4]; ?></td>
    <!--<td style="vertical-align:middle;"><a class="btn btn-primary" href="serviciopdf.php?c=<? echo $row[9]; ?>" target="_blank">PDF</a></td>-->
    <? if($row[4]=='Vehiculo'){ ?>
<td style="vertical-align:middle;"><a class="btn btn-primary" style="font-size: 11px;" href="serviciopdf2021.php?c=<? echo $row[9]; ?>" target="_blank">PDF Cliente</a></td>
    <!--<td style="vertical-align:middle;"><a class="btn btn-primary" style="font-size: 11px;" href="servicioproveedorvpdf.php?c=<? echo $row[9]; ?>" target="_blank">PDF Proveedor</a></td>-->
    <? }else{ ?>
<td style="vertical-align:middle;"><a class="btn btn-primary" style="font-size: 11px;" href="serviciopdf2021.php?c=<? echo $row[9]; ?>" target="_blank">PDF Cliente</a></td>
    <!--<td style="vertical-align:middle;"><a class="btn btn-primary" style="font-size: 11px;" href="servicioproveedorpdf.php?c=<? echo $row[9]; ?>" target="_blank">PDF Proveedor</a></td>-->
    <? } ?>
    <td style="vertical-align:middle;"><a class="btn bg-yellow" style="font-size: 11px;" href="tareas.php?verservcer=1&c=<? echo $row[9]; ?>">Ver</a></td>
    <?php /*
    <td style="vertical-align:middle;"><a class="btn bg-yellow" style="font-size: 11px;" href="tareas.php?verserv=1&c=<? echo $row[9]; ?>">Ver</a></td>
    <td style="vertical-align:middle;"><a class="btn bg-green" style="font-size: 11px;" href="tareas.php?conta=1&c=<? echo $row[9]; ?>">Checklist</a></td>

    <td style="vertical-align:middle;"><a class="btn bg-red" style="font-size: 11px;" href="tareas.php?ser=1&c=<? echo $row[9]; ?>&elise=1" >Eliminar</a></td>
    */ ?>
   <!-- <td style="vertical-align:middle;"><? if($row[47]=='NO'){?><a class="btn" style="background-color: #d0d22f; color: #fff; font-size: 11px;" href="tareas.php?ser=1&c=<? echo $row[9]; ?>&acla=1" >En Aclaracion</a><? }else{ ?><a class="btn bg-black" style="font-size: 11px;"  href="tareas.php?ser=1&c=<? echo $row[9]; ?>&abi=1" >Reabrir</a><? }?></td>-->
     <?php /* <td style="vertical-align:middle;"><? if($row[47]=='NO' || $row[47]=='AC'){?><a class="btn bg-black" style="font-size: 11px;"  href="tareas.php?ser=1&c=<? echo $row[9]; ?>&cerr=1" >Cerrar</a><? }else{ ?><a class="btn bg-black" style="font-size: 11px;"  href="tareas.php?ser=1&c=<? echo $row[9]; ?>&abi=1" >Reabrir</a><? }?></td> */ ?>
   <!-- <td style="vertical-align:middle;"><a class="btn bg-green" href="tareas.php?c=<? echo $row[9]; ?>&newsevicio=1">Generar Servicio</a></td>-->
    </tr> <?
		}
  ?>
    
    </table>
<?php
 //Operacion matematica para boton siguiente y atras 
    $IncrimentNum =(($compag +1)<=$TotalRegistro)?($compag +1):1;
    $DecrementNum =(($compag -1))<1?1:($compag -1);
  
    echo "<ul class='pagind'><li class=\"btn\"><a href=\"?pag=".$DecrementNum."&ser=2#tabla\"><i class='fa fa-fw fa-fast-backward'></i></a></li>";
    //Se resta y suma con el numero de pag actual con el cantidad de 
    //numeros  a mostrar
     $Desde=$compag-(ceil($CantidadMostrar/2)-1);
     $Hasta=$compag+(ceil($CantidadMostrar/2)-1);
     
     //Se valida
     $Desde=($Desde<1)?1: $Desde;
     $Hasta=($Hasta<$CantidadMostrar)?$CantidadMostrar:$Hasta;
     //Se muestra los numeros de paginas
     for($i=$Desde; $i<=$Hasta;$i++){
        //Se valida la paginacion total
        //de registros
        if($i<=$TotalRegistro){
            //Validamos la pag activo
          if($i==$compag){
           echo "<li class=\"active\"><a href=\"?pag=".$i."&ser=2#tabla\">".$i."</a></li>";
          }else {
            echo "<li><a href=\"?pag=".$i."&ser=2#tabla\">".$i."</a></li>";
          }             
        }
     }
    echo "<li class=\"btn\"><a href=\"?pag=".$IncrimentNum."&ser=2#tabla\"><i class='fa fa-fw fa-fast-forward'></i></a></li></ul>";
  
?>

  </div>

</div>
</div>