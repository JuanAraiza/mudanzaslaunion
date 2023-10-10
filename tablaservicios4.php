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
/*
if(isset($_POST['enviarcerrados'])){
  $link = mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
  mysql_select_db($bbdd,$link) or die("resultado=".urlencode(mysql_error()));
  $resultr = mysql_query("select * from  servicio where id in(".$_POST['registrosf'].")", $link);
  echo "select * from  servicio where id in(".$_POST['registrosf'].")<br>";
  echo $_POST['check789'].'<br>';
while ($rowr = mysql_fetch_row($resultr)){
$rrr='check'.$rowr[0].'<br>';
echo $_POST['$rrr'].' ' .$rrr.'<br>';
if($_POST[$rrr]=='on'){
    $resultr2 = mysql_query("update servicio set cerrado='SI' where id=".$rowr[0], $link);
    $rowr2 = mysql_fetch_row($resultr2);

  echo $rowr[0].'  -  '.$rrr.'  -  '.$_POST[$rrr].'<br>'; 
}
}
//echo "update servicio set estatus=2 where id in(".$_POST['registrosf'].")";
}*/
if(isset($_POST['enviarcerrados'])){
  
    $queryr2 = "update servicio set cerrado='SI' where id=".$_POST['idser'];
    $resultr2 = $link->query($queryr2);
    $rowr2 = mysqli_fetch_row($resultr2);
//echo "update servicio set cerrado='SI' where id=".$_POST['idser'];
//  echo $rowr[0].'  -  '.$rrr.'  -  '.$_POST[$rrr].'<br>'; 


//echo "update servicio set estatus=2 where id in(".$_POST['registrosf'].")";
}

if(isset($_GET['regre'])){

    $queryr2 = "update servicio set cerrado='NO',estatus=1 where clave='".$_GET['c']."'";
    $resultr2 = $link->query($queryr2);
    $rowr2 = mysqli_fetch_row($resultr2);
//echo "update servicio set cerrado='SI' where id=".$_POST['idser'];
//  echo $rowr[0].'  -  '.$rrr.'  -  '.$_POST[$rrr].'<br>'; 


//echo "update servicio set estatus=2 where id in(".$_POST['registrosf'].")";
}

?>
<div class="row">
    <div class="col-md-12">
<a class="btn bg-green" href="excelservicios.php" target="_blank">Exportar Canelados a Excel</a>
<br>
<form method="post" action="tareas.php?ser=4">

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
  <div class="form-group" style="width: 14%; float: left; padding: 5px;">
            <label>&nbsp;</label>
             <input type="submit" name="buscar" id="buscar" class="form-control bg-blue" value="Buscar" >
    </div>

</div>

</form>
<br>


<div class="box-body table-responsive no-padding" style="width:100%;">
<table class="table table-hover">
    <tr>
    <td></td>
      <td align="center"><strong>Dias</strong></td>
      <td align="center"><strong>Folio</strong></td>
    <td align="center"><strong>Cliente</strong></td>
    <td align="center"><strong>Origen</strong></td>
    <td align="center"><strong>Destino</strong></td>
    <td align="center"><strong>Fecha</strong></td>
    <td align="center"><strong>Tipo</strong></td>
    <td></td>
    <td></td>

    </tr>
    <?
  include("config.php");
  	
if(isset($_POST['buscar'])){
$cade=" cerrado in ('NO','AC') and estatus=2";

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
if($_POST['estatus']!='--'){
$cade.=" and cerrado='".$_POST['estatus']."'";
}
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
$cade.="  and (proveedor='".$_POST['proveedor']."' or proveedor2='".$_POST['proveedor']."' or proveedor3='".$_POST['proveedor']."') ";
}
$query = "SELECT * from servicio where id>=1 ".$cade." and estatus=4  order by id desc";
}else{
$query = "SELECT * from servicio where cerrado in ('NO','AC') and estatus=4 order by id desc";
}

$_SESSION['query']=$query;
$_SESSION['servicios']='CANCELADOS';
    $r=1;
    $cacheck='';
    $rc=0;
    $result = $link->query($query);
	while($row=mysqli_fetch_row($result)){
$rc++;
    if($rc==1){
      $cacheck.=$row[0];
    }else{
      $cacheck.=','.$row[0];
    }

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
         <tr style="background:<?php echo $c; ?>; height: 48px; vertical-align:middle; border:#5A5959 solid 1px; ">
         <td style="vertical-align:middle; background:#fff;">
         
         <?php /*<div class="form-group">
                <label>
                  <input type="checkbox"  class="minimal"  name="check<?php echo $row[0]; ?>" id="check<?php echo $row[0]; ?>">
                </label>
                
              </div>
              */ ?>
         </td>
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
    
    
    <td style="vertical-align:middle;"><a class="btn bg-yellow" style="font-size: 11px;" href="tareas.php?verserv=1&c=<? echo $row[9]; ?>">Ver</a></td>
    <td style="vertical-align:middle;"><a class="btn" style="background-color: #d0d22f; color: #fff; font-size: 11px;" href="tareas.php?ser=1&c=<? echo $row[9]; ?>&regre=1" >Regresar a Servicios</a></td>
    </tr> <?
		}
  ?>
    
    </table>
  </div>

<input type="hidden" name="registrosf" value="<?php echo $cacheck; ?>">


</div>
</div>