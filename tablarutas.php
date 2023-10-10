
<?php 
if(isset($_POST['guardarcambios_ruta'])){

$fol_ruta=$_POST['ruta_folio'];
	$queryfol = "SELECT * from servicio where cerrado in ('NO','AC') and folio2='".$fol_ruta."'  and estatus=1 order by id desc";
  //echo $queryfol;
    $resultfol = $link->query($queryfol);
	while($rowfol=mysqli_fetch_row($resultfol)){

$folioser='folio_serv_'.$rowfol[0];
$tiposs='tiposs_'.$rowfol[0];
$porcobrar='por_cobrar_'.$rowfol[0];
$observaciones='observaciones_'.$rowfol[0];

  $queryups = "update servicio set  tipo_mudanza='".$_POST[$tiposs]."', por_cobrar ='".$_POST[$porcobrar]."', observaciones_r='".$_POST[$observaciones]."'  where id=".$_POST[$folioser];
  $link->query($queryups);

  }

$unidad=$_POST['unidad'];
$operador=$_POST['operador'];
$mudanza=$_POST['mudanza'];
$ruta=$_POST['ruta'];
$fecha=date('Y-m-d H:i:s');


  $querycru = "SELECT count(id) from lista_rutas where folio='".$fol_ruta."'";
  $resultcru = $link->query($querycru);
  $rowcru=mysqli_fetch_row($resultcru);

  if($rowcru[0]>=1){
    $querylr = "update lista_rutas set unidad='".$unidad."',operador='".$operador."',mudanza='".$mudanza."',ruta='".$ruta."' where folio ='".$fol_ruta."'";
    $link->query($querylr);
  }else{
    $querylr = "insert into lista_rutas(folio,unidad,operador,mudanza,ruta,fecha) values('".$fol_ruta."','".$unidad."','".$operador."','".$mudanza."','".$ruta."','".$fecha."')";
    $link->query($querylr);

  }

  ?>
<script language="JavaScript" type="text/javascript">
location.href='tareas.php?rutas=1';
</script>
<?php

} ?>

<div class="row">
    <div class="col-md-12">


<div class="box-body table-responsive no-padding" style="width:100%;">


<table class="table table-hover">
    <tr>
    <td align="center"><h1>Folio Ruta</h1></td>
    <td></td>
    <td></td>
    </tr>
    <?
  include("config.php");
	$query = "SELECT distinct(folio2) from servicio where cerrado in ('NO','AC') and folio2!=''  and estatus=1 order by folio2";
    $result = $link->query($query);
	while($row=mysqli_fetch_row($result)){
		?>
         <tr>
    <td style="vertical-align:middle;"><h1><? echo $row[0]; ?></h1></td>
  
    <td style="vertical-align:middle;">
    

    <a class="btn bg-teal"  data-toggle="modal" data-target="#modal-pnd<?php echo $row[0]; ?>"><i class="fa-solid fa-pen-to-square" style="font-size:20px;"></i></a>
  <div class="modal fade" id="modal-pnd<?php echo $row[0]; ?>">
          <div class="modal-dialog modal-lg" style="width: 1100px;" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h3 class="box-title">Datos para ruta</h3>
              </div>
             
              <div class="modal-body" >
              <form action="tareas.php?rutas=1" method="POST">

<input type="hidden" name="ruta_folio" value="<?php echo $row[0]; ?>">

<?php
$querycru = "SELECT * from lista_rutas where folio='".$row[0]."'";
$resultcru = $link->query($querycru);
$rowcru=mysqli_fetch_row($resultcru);

?>

              <!-- Tabla de Folios -->
<div class="class">
              <div class="form-group col-lg-3" >
            <label>Unidad</label>
<select class="form-control select2" id="unidad" name="unidad" style="width:100%;" >
                  <option value="--">--</option>
                   <option <? if($_POST['unidad']=='001 Camion Blanco'){ ?> selected <? } ?> <? if($rowcru[2]=='001 Camion Blanco'){ ?> selected <? } ?> value="001 Camion Blanco">001 Camion Blanco</option> 
                   <option <? if($_POST['unidad']=='002 Camion Azul'){ ?> selected <? } ?> <? if($rowcru[2]=='002 Camion Azul'){ ?> selected <? } ?> value="002 Camion Azul">002 Camion Azul</option>
                   <option <? if($_POST['unidad']=='003 Camioncito'){ ?> selected <? } ?> <? if($rowcru[2]=='003 Camioncito'){ ?> selected <? } ?> value="003 Camioncito">003 Camioncito</option> 
                 </select>
</div>

<div class="form-group col-lg-3" >
            <label>Operador</label>
<select class="form-control select2" id="operador" name="operador" style="width:100%;" >
                  <option value="--">--</option>
                   <option <? if($_POST['operador']=='OP1 VICTOR ZURITA'){ ?> selected <? } ?> <? if($rowcru[3]=='OP1 VICTOR ZURITA'){ ?> selected <? } ?> value="OP1 VICTOR ZURITA">OP1 VICTOR ZURITA</option> 
                   <option <? if($_POST['operador']=='OP2 IVAN OLALDE'){ ?> selected <? } ?> <? if($rowcru[3]=='OP2 IVAN OLALDE'){ ?> selected <? } ?> value="OP2 IVAN OLALDE">OP2 IVAN OLALDE</option>
                   <option <? if($_POST['operador']=='OP3 ABRAHAM'){ ?> selected <? } ?> <? if($rowcru[3]=='OP3 ABRAHAM'){ ?> selected <? } ?> value="OP3 ABRAHAM">OP3 ABRAHAM</option> 
                   <option <? if($_POST['operador']=='OP4 NUEVO'){ ?> selected <? } ?> <? if($rowcru[3]=='OP4 NUEVO'){ ?> selected <? } ?> value="OP4 NUEVO">OP4 NUEVO</option> 
                   <option <? if($_POST['operador']=='AZU'){ ?> selected <? } ?> <? if($rowcru[3]=='AZU'){ ?> selected <? } ?> value="AZU">AZU</option> 
                </select>
      </div>


      <div class="form-group col-lg-3"  >
      <label>Mudanza</label>
      <input name="mudanza" id="mudanza"  style="text-transform: uppercase;" placeholder="Mudanza"  class="form-control" type="text"  value="<? echo $rowcru[4]; ?>" >
      </div>

       <div class="form-group col-lg-3"  >
      <label>Ruta</label>
      <input name="ruta" id="ruta"  style="text-transform: uppercase;" placeholder="Ruta"  class="form-control" type="text"  value="<? echo $rowcru[5]; ?>" >
      </div>


  </div>

  

<table class="table table-hover">
    <tr>
    <td align="center" style="width:100px;"><strong>Folio</strong></td>
    <td align="center" style="width:100px;"><strong>Tipo de Servicio</strong></td>
    <td align="center" style="width:100px;"><strong>Origen</strong></td>
    <td align="center" style="width:100px;"><strong>Nombre de Quien Entrega</strong></td>
    <td align="center" style="width:100px;"><strong>Telefono</strong></td>
    <td align="center" style="width:100px;"><strong>Destino</strong></td>
    <td align="center" style="width:100px;"><strong>Nombre de Quien Recibe</strong></td>
    <td align="center" style="width:100px;"><strong>Telefono</strong></td>
    <td align="center" style="width:100px;"><strong>Por Cobrar</strong></td>
    <td align="center" style="width:100px;"><strong>Observaciones</strong></td>
    </tr>

    <?

	$queryfol = "SELECT * from servicio where cerrado in ('NO','AC') and folio2='".$row[0]."'  and estatus=1 order by id desc";
    $resultfol = $link->query($queryfol);
	while($rowfol=mysqli_fetch_row($resultfol)){
		?>
<input name="folio_serv_<?php echo $rowfol[0]; ?>" type="hidden" value="<?php echo $rowfol[0]; ?>"/>
 <tr>
    <td align="center"><?php echo $rowfol[0]; ?></td>
    <td align="center">
            <select  id="tiposs<?php echo $rowfol[0]; ?>" name="tiposs_<?php echo $rowfol[0]; ?>" >
                  <option value="--">--</option>
                  <option <? if($rowfol[4]=='Vehiculo'){ ?> selected <? } ?> value="Vehiculo">Vehiculo</option>
                  <option <? if($rowfol[4]=='Local'){ ?> selected <? } ?> value="Local">Local</option>
                  <option <? if($rowfol[4]=='Moto'){ ?> selected <? } ?> value="Moto">Moto</option>
                  <option <? if($rowfol[4]=='Auto con Mudanza'){ ?> selected <? } ?> value="Auto con Mudanza">Auto con Mudanza</option>
                  <option <? if($rowfol[4]=='Compartido'){ ?> selected <? } ?> value="Compartido">Compartido</option>
                  <option <? if($rowfol[4]=='Exclusivo'){ ?> selected <? } ?> value="Exclusivo">Exclusivo</option>
                  <option <? if($rowfol[4]=='Maniobras'){ ?> selected <? } ?> value="Maniobras">Maniobras</option>
                  <option <? if($rowfol[4]=='Flete'){ ?> selected <? } ?> value="Flete">Flete</option>
                  <option <? if($rowfol[4]=='Paqueteria'){ ?> selected <? } ?> value="Paqueteria">Paqueteria</option>
                  <option <? if($rowfol[4]=='Exclusivo y Compartido'){ ?> selected <? } ?> value="Exclusivo y Compartido">Exclusivo y Compartido</option>
                  <option <? if($rowfol[4]=='Directo'){ ?> selected <? } ?> value="Directo">Directo</option>
                </select>
     </td>
    <td align="center"><?php echo $rowfol[2]; ?></td>
    <td align="center"><?php echo $rowfol[27]; ?></td>
    <td align="center"><?php echo $rowfol[28]; ?></td>
    <td align="center"><?php echo $rowfol[3]; ?></td>
    <td align="center"><?php echo $rowfol[32]; ?></td>
    <td align="center"><?php echo $rowfol[33]; ?></td>
    <td align="center"><input placeholder="Por cobrar" type="text" name="por_cobrar_<?php echo $rowfol[0]; ?>" id="por_cobrar<?php echo $rowfol[0]; ?>" value="<?php echo $rowfol[156]; ?>"></td>
    <td align="center"><textarea placeholder="Observaciones" type="text" name="observaciones_<?php echo $rowfol[0]; ?>" id="observaciones<?php echo $rowfol[0]; ?>"><?php echo $rowfol[157]; ?></textarea></td>
    </tr>

<?php } ?>
  </table>


  <div style="width:100%; align-content: right; text-align: right;">
  <button type="submit" class="btn btn-primary"  name="guardarcambios_ruta" id="guardarcambios_ruta" target="_blank">Guardar Datos</button>
</div>
              <!-- Fin Tabla de Folios -->

  </form>           

      </div>
     
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
</td>

<td style="vertical-align:middle;">
<a class="btn bg-orange"  href="formatoruta.php?c=<? echo $row[0]; ?>" ><i class="fa-regular fa-file-pdf" style="font-size:20px;"></i></a>
</td>

    </tr> <?
		}
  ?>
    
    </table>
  </div>



</div>
</div>