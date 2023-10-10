<?php


if(isset($_GET['regre'])){

    $query = "update servicio set cerrado='NO',estatus=1 where clave='".$_GET['c']."'";
    $resultr2 = $link->query($query);
    $rowr2 = mysqli_fetch_row($resultr2);

}


if(isset($_POST['enviarfolio2'])){

    
  
  $query = "select * from  servicio where id in(".$_POST['registrosf'].")";
 $resultr = $link->query($query);
while ($rowr = mysqli_fetch_row($resultr)){
$rrr='check'.$rowr[0];
if($_POST[$rrr]=='on'){
 // echo "update servicio set estatus=5 where id=".$rowr[0].'<br>';
    $query2 ="update servicio set folio2='".$_POST['folio2']."' where id=".$rowr[0];
$link->query($query2);


 // echo $rowr[0].'  -  '.$rrr.'  -  '.$_POST[$rrr].'<br>'; 
}
}
//echo "update servicio set estatus=2 where id in(".$_POST['registrosf'].")<br>";
}



if(isset($_POST['enviarfiniquitados'])){

    
  
  $query = "select * from  servicio where id in(".$_POST['registrosf'].")";
 $resultr = $link->query($query);
while ($rowr = mysqli_fetch_row($resultr)){
$rrr='check'.$rowr[0];
if($_POST[$rrr]=='on'){
 // echo "update servicio set estatus=5 where id=".$rowr[0].'<br>';
    $query2 ="update servicio set  estatus='5' where id=".$rowr[0];
$link->query($query2);


 // echo $rowr[0].'  -  '.$rrr.'  -  '.$_POST[$rrr].'<br>'; 
}
}
//echo "update servicio set estatus=2 where id in(".$_POST['registrosf'].")<br>";
}

?>
<div class="row">
    <div class="col-md-12">
<!--<a class="btn bg-green" href="excelservicios.php" target="_blank">Exportar tabla a Excel</a> || --><a class="btn bg-green" href="excelserviciosnews.php" target="_blank">Exportar tabla a Excel</a>
<br>
<form method="post" action="tareas.php?ser=1">


<div class="row col-md-12">

  <div class="form-group col-md-2">
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
 

  <div class="form-group col-md-2">
                  <label>FECHA 1 DEL SERVICIO</label>
                        
                          <input  class="form-control" autocomplete="off"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask maxlength="10" type="text" name="fecha" id="datepicker">
               
                </div>

 <div class="form-group col-md-2">
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

 <div class="form-group col-md-3">
                <label>ESTATUS</label>
                <select class="form-control select2" style="width: 100%;" name="estatus_s">
                    <option  value="--">--</option>
                  <option  value="1">Activo</option>
                  <option  value="2">Por Recolectar</option>
                  <option  value="3">Embodegamiento</option>
                  <option  value="4">En Aclaración</option>
                </select>
              </div>

  <div class="form-group col-md-3">
            <label>&nbsp;</label>
            <input type="submit" name="buscar" id="buscar" class="form-control bg-blue" value="Buscar" >
    </div>



</div>
</form>
<br>

<form method="post" action="tareas.php?ser=1">
<div class="box-body table-responsive no-padding" style="width:100%;">

<br>
<div class="form-group col-md-3">
                <input name="folio2" type="text" class="form-control"/>
                <button type="submit" class="btn btn-primary"  name="enviarfolio2" id="enviarfolio2">Asignar Folio a Seleccionados</button>
</div>
            <br><br><br>&nbsp;&nbsp;&nbsp;
<table class="table table-hover">
    <tr>
    <td></td>
    <td></td>
      <td align="center"><strong>Estatus</strong></td>
      <td align="center"><strong>Folio</strong></td>
      <td align="center"><strong>F. Int.</strong></td>
    <td align="center"><strong>Cliente</strong></td>
    <td align="center"><strong>Origen</strong></td>
    <td align="center"><strong>Destino</strong></td>
    <td align="center"><strong>Fecha de Servicio</strong></td>
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
$cade=" and cerrado in ('NO','AC')  and estatus=1";
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

if($_POST['estatus_s']!='--'){
$cade.=" and estatus='".$_POST['estatus_s']."'";
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
$cade.=" and (proveedor='".$_POST['proveedor']."' or proveedor2='".$_POST['proveedor']."' or proveedor3='".$_POST['proveedor']."') ";
}
    $query = "SELECT * from servicio where id>=1 ".$cade." order by id desc";
    $cades = "where id>=1 ".$cade;
}else{
	$query = "SELECT * from servicio where cerrado in ('NO','AC')  and estatus=1  order by id desc";
    $cades = "where cerrado in ('NO','AC')";
}
$_SESSION['query']=$query;
$_SESSION['cades']=$cades;
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



                    switch($row[99]){
                    case 1:
                     $c='#eee';
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

        
     if($row[47]=='AC'){
      $c='#d0d22f';
     }

		?>
         <tr style="background:<?php echo $c; ?>; height: 48px; vertical-align:middle; border:#5A5959 solid 1px; ">
         <td style="vertical-align:middle;">
            <?php 
            $querycd = "SELECT * from checklist where cve_servicio='".$row[9]."'";
            $resultcd = $link->query($querycd);
            $rowcd=mysqli_fetch_row($resultcd);
            $concd=0;

            if($rowcd[2]=='on'){ $concd++; }
            if($rowcd[3]=='on'){ $concd++; }
            if($rowcd[4]=='on'){ $concd++; }
            if($rowcd[5]=='on'){ $concd++; }
            if($rowcd[6]=='on'){ $concd++; }
            if($rowcd[7]=='on'){ $concd++; }
            if($rowcd[8]=='on'){ $concd++; }
            if($rowcd[9]=='on'){ $concd++; }
            if($rowcd[10]=='on'){ $concd++; }
            if($rowcd[11]=='on'){ $concd++; }

            echo $concd. '/10';
    ?>
         <div class="form-group">
                <label>
                  <input type="checkbox" class="minimal" name="check<?php echo $row[0]; ?>" style="-moz-transform: scale(2); width:15px; height:15px; " <?php if($concd!=10){ ?> disabled <? } ?> >
                </label>
                
              </div>
         </td>
         <?php
switch($row[150]){
                    case 'launion':
                    ?><td style="vertical-align:middle; background:#a3b4ff;">
                    <img src="images/serlaunion.png" style="width:70px;"/>
                    </td>
                    <?php
                    break;
                    case 'cruz':
                    ?><td style="vertical-align:middle; background:#fcf6b2;">
                    <img src="images/serlacruz.png" style="width:70px;"/>
                    </td>
                    <?php
                    break;
                    case 'compartido':
                    ?><td style="vertical-align:middle; background:#00e5ff;">
                    <img src="images/sercompartido.png" style="width:70px;"/>
                    </td>
                    <?php
                    break;
                    case 'sedido':
                    ?><td style="vertical-align:middle; background:#f4cdff;">
                    <img src="images/sersedido.png" style="width:70px;"/>
                    </td>
                    <?php
                    break;
                    default:
                      ?><td style="vertical-align:middle; background:#a3b4ff;">
                      <img src="images/serlaunion.png" style="width:70px;"/>
                      </td>
                      <?php
                    
                  } ?>
    <td style="vertical-align:middle;"><? 
switch($row[99]){
                    case 1:
                    echo 'Activo';
                    break;
                    case 2:
                    echo 'Por Recolectar';
                    break;
                    case 3:
                    echo 'Embodegamiento';
                    break;
                    case 4:
                    echo 'En Acalaracion';
                    break;
                    
                  } ?></td>
    <td style="vertical-align:middle;"><h2><? echo $row[0]; ?></h2></td>
    <td style="vertical-align:middle;"><p><? echo $row[152]; ?></p></td>
    <td style="vertical-align:middle;"><? echo $row[1]; ?></td>
    <td style="vertical-align:middle;"><? echo $row[2]; ?></td>
    <td style="vertical-align:middle;"><? echo $row[3]; ?></td>
    <td style="vertical-align:middle;"><? echo substr($row[22],8,2).'-'.substr($row[22],5,2).'-'.substr($row[22],0,4); ?></td>
    <td style="vertical-align:middle;"><? echo $row[4]; ?></td>


    <td style="vertical-align:middle;">
    
    <a class="btn bg-orange"  href="tareas.php?formatocruz=1&c=<? echo $row[9]; ?>" ><i class="fa-solid fa-pen-to-square"></i></a>
     
    <a class="btn bg-teal"  data-toggle="modal" data-target="#modal-pnd<?php echo $row[0]; ?>"><i class="fa fa-fw fa-file-text-o "></i></a>
  <div class="modal fade" id="modal-pnd<?php echo $row[0]; ?>">
          <div class="modal-dialog"  role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h3 class="box-title">Documentos</h3>
              </div>
             
              <div class="modal-body" >

  <a class="btn bg-yellow" href="serviciopdf2021cruz.php?c=<? echo $row[9]; ?>&emp=<?php echo $row[150]; ?>" target="_blank">1.- CARTA APORTE</a>
  <br><br>


<?  if($row[4]=='Vehiculo'){ ?>
<a class="btn btn-primary" href="serviciopdf2021.php?c=<? echo $row[9]; ?>&emp=<?php echo $row[150]; ?>" target="_blank">1.- PDF CLIENTE</a>
    <? }else{ ?>
<a class="btn btn-primary" href="serviciopdf2021.php?c=<? echo $row[9]; ?>&emp=<?php echo $row[150]; ?>" target="_blank">1.- PDF CLIENTE</a>
    <? }  ?>
<br><br>
<a class="btn btn-info" href="deslinde.php?c=<? echo $row[9]; ?>&emp=<?php echo $row[150]; ?>" target="_blank">2.- DESLINDE</a>
<br><br>
<a class="btn bg-orange" href="formatotc.php?c=<? echo $row[9]; ?>&emp=<?php echo $row[150]; ?>" target="_blank">3.- TC</a>
<br><br>
<a class="btn bg-maroon" href="formatopagos.php?c=<? echo $row[9]; ?>&emp=<?php echo $row[150]; ?>" target="_blank">4.- FP</a>
<br><br>
<a class="btn bg-teal" href="serviciopdf2021vehiculo.php?c=<? echo $row[9]; ?>&emp=<?php echo $row[150]; ?>" target="_blank">5.- FORMATO PARA TRASLADO VEHICULOS</a>
<br><br>
<a class="btn bg-green" href="hojaverde.php?c=<? echo $row[9]; ?>&emp=<?php echo $row[150]; ?>" target="_blank">6.- <i class="fa fa-fw  fa-file-powerpoint-o  "></i></a>
<br>
      </div>
     
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
</td>

<td style="vertical-align:middle;"><a class="btn bg-purple" style="font-size: 11px;" href="https://applaunionmudanzas.com/phpword/samples/Contrato.php?c=<?php echo $row[9]; ?>&emp=<?php echo $row[150]; ?>" target="_blank"><i class="fa fa-fw fa-file-word-o "></i></a></td>

    <?php /* <td style="vertical-align:middle;"><a class="btn bg-purple"  data-toggle="modal" data-target="#modal-pn<?php echo $row[0]; ?>"> <i class="fa fa-fw fa-file-word-o "></i></a>
  <div class="modal fade" id="modal-pn<?php echo $row[0]; ?>">
          <div class="modal-dialog  modal-lg"  role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h3 class="box-title"></h3>
              </div>
             
              <div class="modal-body" >

      <iframe src="https://mudanzaslaunion.com/aplicacion/phpword/samples/Contrato.php?c=<?php echo $row[9]; ?>" style="width:100%;" frameBorder="0" height="300"></iframe>

	  </div>
	 
	</div>
	<!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->     
</td>
*/ ?>
    <td style="vertical-align:middle;"><a class="btn bg-yellow" style="font-size: 11px;" href="tareas.php?verservicio=1&verserv=1&c=<? echo $row[9]; ?>">Ver</a></td>
    <td style="vertical-align:middle;"><a class="btn bg-green" style="font-size: 11px;" href="tareas.php?conta22=1&c=<? echo $row[9]; ?>">Checklist</a></td>

    <?php  if($_SESSION['tipo_usuario']!='visor'){ ?>
    <td style="vertical-align:middle;"><a class="btn bg-red" style="font-size: 11px;" href="tareas.php?ser=1&c=<? echo $row[9]; ?>&elise=1" ><i class="fa fa-fw fa-trash "></i></a></td>
    <td style="vertical-align:middle;"><a class="btn bg-purple" style="font-size: 11px;" href="tareas.php?ser=1&c=<? echo $row[9]; ?>&canse=1" >Cancelar</a></td>
    <td style="vertical-align:middle;"><? if($row[47]=='NO'){?><a class="btn" style="background-color: #d0d22f; color: #fff; font-size: 11px;" href="tareas.php?ser=1&c=<? echo $row[9]; ?>&acla=1" >En Aclaracion</a><? }else{ ?><a class="btn bg-black" style="font-size: 11px;"  href="tareas.php?ser=1&c=<? echo $row[9]; ?>&abi=1" >Reabrir</a><? }?></td>
<?php } ?>

    </tr> <?
		}
  ?>
    
    </table>
  </div>

<input type="hidden" name="registrosf" value="<?php echo $cacheck; ?>">

<div class="form-group" style="width: 33%; align-content: center;">
       
                <button type="submit" class="btn btn-primary"  name="enviarfiniquitados" id="enviarfiniquitados">Enviar a Finiquitados Seleccionados</button>
&nbsp;&nbsp;
</div>
  </form>
</div>
</div>