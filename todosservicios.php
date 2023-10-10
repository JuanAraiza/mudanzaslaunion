<?php
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

if(isset($_GET['regre'])){

    $query = "update servicio set cerrado='NO',estatus=1 where clave='".$_GET['c']."'";
    $resultr2 = $link->query($query);
    $rowr2 = mysqli_fetch_row($resultr2);
//echo "update servicio set cerrado='SI' where id=".$_POST['idser'];
//  echo $rowr[0].'  -  '.$rrr.'  -  '.$_POST[$rrr].'<br>'; 
//echo "update servicio set estatus=2 where id in(".$_POST['registrosf'].")";
}


if(isset($_POST['enviarfiniquitados'])){
  
  $query = "select * from  servicio where id in(".$_POST['registrosf'].")";
 $resultr = $link->query($query);
while ($rowr = mysqli_fetch_row($resultr)){
$rrr='check'.$rowr[0];
if($_POST[$rrr]=='on'){
 // echo "update servicio set estatus=2 where id=".$rowr[0].'<br>';
    $query2 ="update servicio set estatus=2 where id=".$rowr[0];
$link->query($query2);


 // echo $rowr[0].'  -  '.$rrr.'  -  '.$_POST[$rrr].'<br>'; 
}
}
//echo "update servicio set estatus=2 where id in(".$_POST['registrosf'].")<br>";
}

?>
<div class="row">
    <div class="col-md-12">
<a class="btn bg-green" href="excelservicios.php" target="_blank">Exportar tabla a Excel</a>
<br>
<form method="post" action="tareas.php?ser=5">


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

<form method="post" action="tareas.php?ser=1">
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
    <td></td>
    <td></td>
   <td></td>
    <td></td>
    <td></td>
    <td></td>
   <!--  <td></td>-->
    </tr>
    <?
  include("config.php");
  		
if(isset($_POST['buscar'])){
$cade="";
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
}
*/
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
$query = "SELECT * from servicio where id>=1 ".$cade." order by id desc";
}else{
	$query = "SELECT * from servicio where cerrado in ('NO','AC') order by id desc";
}
$_SESSION['query']=$query;
$_SESSION['servicios']='ACTIVOS';

		//echo $query.'<br>';
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
         
    <td style="vertical-align:middle;"><? 
if($row[47]=='NO' and $row[46]>=1){
     echo $dias;

     } ?></td>
    <td style="vertical-align:middle;"><h2><? echo $row[0]; ?></h2></td>
    <td style="vertical-align:middle;"><? echo $row[1]; ?></td>
    <td style="vertical-align:middle;"><? echo $row[2]; ?></td>
    <td style="vertical-align:middle;"><? echo $row[3]; ?></td>
    <td style="vertical-align:middle;"><? echo substr($row[22],8,2).'-'.substr($row[22],5,2).'-'.substr($row[22],0,4); ?></td>
    <td style="vertical-align:middle;"><? echo $row[4]; ?></td>


    <td style="vertical-align:middle;"><a class="btn bg-teal"  data-toggle="modal" data-target="#modal-pnd<?php echo $row[0]; ?>"> <i class="fa fa-fw fa-file-text-o "></i></a>
  <div class="modal fade" id="modal-pnd<?php echo $row[0]; ?>">
          <div class="modal-dialog"  role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h3 class="box-title">Documentos</h3>
              </div>
             
              <div class="modal-body" >
<?  if($row[4]=='Vehiculo'){ ?>
<a class="btn btn-primary" href="serviciopdf2021.php?c=<? echo $row[9]; ?>" target="_blank">1.- PDF CLIENTE</a>
    <? }else{ ?>
<a class="btn btn-primary" href="serviciopdf2021.php?c=<? echo $row[9]; ?>" target="_blank">1.- PDF CLIENTE</a>
    <? }  ?>
<br><br>
<a class="btn btn-info" href="deslinde.php?c=<? echo $row[9]; ?>" target="_blank">2.- DESLINDE</a>
<br><br>
<a class="btn bg-orange" href="formatotc.php?c=<? echo $row[9]; ?>" target="_blank">3.- TC</a>
<br><br>
<a class="btn bg-maroon" href="formatopagos.php?c=<? echo $row[9]; ?>" target="_blank">4.- FP</a>
<br><br>
<a class="btn bg-teal" href="TRASLADO-DE-VEHICULOS.pdf" target="_blank">5.- FORMATO PARA TRASLADO VEHICULOS</a>
<br><br>
<a class="btn bg-green" href="hojaverde.php?c=<? echo $row[9]; ?>" target="_blank">6.- <i class="fa fa-fw  fa-file-powerpoint-o  "></i></a>
<br>
      </div>
     
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
</td>

<?php /* 
    <!--<td style="vertical-align:middle;"><a class="btn btn-primary" href="serviciopdf.php?c=<? echo $row[9]; ?>" target="_blank">PDF</a></td>-->
    <?  if($row[4]=='Vehiculo'){ ?>
<td style="vertical-align:middle;"><a class="btn btn-primary" style="font-size: 11px;" href="serviciopdf2021.php?c=<? echo $row[9]; ?>" target="_blank">PDF Cliente</a></td>
   <!-- <td style="vertical-align:middle;"><a class="btn btn-primary" style="font-size: 11px;" href="servicioproveedorvpdf.php?c=<? echo $row[9]; ?>" target="_blank">PDF Proveedor</a></td>-->
    <? }else{ ?>
<td style="vertical-align:middle;"><a class="btn btn-primary" style="font-size: 11px;" href="serviciopdf2021.php?c=<? echo $row[9]; ?>" target="_blank">PDF Cliente</a></td>
    <!--<td style="vertical-align:middle;"><a class="btn btn-primary" style="font-size: 11px;" href="servicioproveedorpdf.php?c=<? echo $row[9]; ?>" target="_blank">PDF Proveedor</a></td>-->
    <? }  ?>
    <td style="vertical-align:middle;"><a class="btn btn-info" style="font-size: 11px;" href="deslinde.php?c=<? echo $row[9]; ?>" target="_blank">Deslinde</a></td>
    <td style="vertical-align:middle;"><a class="btn bg-orange" style="font-size: 11px;" href="formatotc.php?c=<? echo $row[9]; ?>" target="_blank">TC</a></td>
    <td style="vertical-align:middle;"><a class="btn bg-maroon" style="font-size: 11px;" href="formatopagos.php?c=<? echo $row[9]; ?>" target="_blank">FP</a></td>
    <td style="vertical-align:middle;"><a class="btn bg-green" style="font-size: 11px;" href="hojaverde.php?c=<? echo $row[9]; ?>" target="_blank"><i class="fa fa-fw  fa-file-powerpoint-o  "></i></a></td>
*/ ?>

    <td style="vertical-align:middle;"><?php // if($row[9]!=3){ ?><a class="btn bg-purple"  data-toggle="modal" data-target="#modal-pn<?php echo $row[0]; ?>"> <i class="fa fa-fw fa-file-word-o "></i></a>
  <div class="modal fade" id="modal-pn<?php echo $row[0]; ?>">
          <div class="modal-dialog  modal-lg"  role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h3 class="box-title"></h3>
              </div>
             
              <div class="modal-body" >

      <iframe src="http://mudanzaslaunion.com/aplicacion/phpword/samples/Contrato.php?c=<?php echo $row[9]; ?>" style="width:100%;" frameBorder="0" height="300"></iframe>

	  </div>
	 
	</div>
	<!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
      <?php // } ?>
</td>
    <td style="vertical-align:middle;"><a class="btn bg-yellow" style="font-size: 11px;" href="tareas.php?verservicio=1&verserv=1&c=<? echo $row[9]; ?>">Ver</a></td>
   
    </tr> <?
		}
  ?>
    
    </table>
  </div>

<input type="hidden" name="registrosf" value="<?php echo $cacheck; ?>">

<div class="form-group" style="width: 33%; align-content: center;">
               <?php /* <button type="submit" class="btn btn-primary"  name="borrador" id="borrador">Generar Borrador</button> */ ?>
                <button type="submit" class="btn btn-primary"  name="enviarfiniquitados" id="enviarfiniquitados">Enviar a Finiquitados Seleccionados</button>
            </div>

  </form>
</div>
</div>