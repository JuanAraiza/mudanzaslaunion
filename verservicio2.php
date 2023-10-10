<script type="text/javascript">
var datos = new Array(40);
datos[1] = new Array(6);
datos[2] = new Array(6);
datos[3] = new Array(6);
datos[4] = new Array(6);
datos[5] = new Array(6);
datos[6] = new Array(6);
datos[7] = new Array(6);
datos[8] = new Array(6);
datos[9] = new Array(6);
datos[10] = new Array(6);
datos[11] = new Array(6);
datos[12] = new Array(6);
datos[13] = new Array(6);
datos[14] = new Array(6);
datos[15] = new Array(6);
datos[16] = new Array(6);
datos[17] = new Array(6);
datos[18] = new Array(6);
datos[19] = new Array(6);
datos[20] = new Array(6);
datos[21] = new Array(6);
datos[22] = new Array(6);
datos[23] = new Array(6);
datos[24] = new Array(6);
datos[25] = new Array(6);
datos[26] = new Array(6);
datos[27] = new Array(6);
datos[28] = new Array(6);
datos[29] = new Array(6);
datos[30] = new Array(6);
datos[31] = new Array(6);
datos[32] = new Array(6);
datos[33] = new Array(6);
datos[34] = new Array(6);
datos[35] = new Array(6);
datos[36] = new Array(6);
datos[37] = new Array(6);
datos[38] = new Array(6);
datos[39] = new Array(6);
datos[40] = new Array(6);
  </script>


<?php if(isset($_POST['mercancia'])){

$agregados=$_POST['agregados'];
$arr='';
//echo $agregados.'<br><br>';

$c=0;
$r=0;

for($i=0; $i<=strlen($agregados); $i++){

   if(substr($agregados,$i,4)=='|||,'){
    $c++;
  $datos2[$r][$c]=$arr;

          ?>
          <script type="text/javascript">
            datos[<?php echo $r; ?>][<?php echo $c; ?>]='<?php echo $arr; ?>|';
          </script>
          <?php
      $r++;


      $c=0;
      $i++;
      $i++;
      $i++;
     $arr='';

    }else{
    if(substr($agregados,$i,3)=='||,'){
      $r++;
      $c=0;
      $i++;
      $i++;
      $arr='';

    }}
            if(substr($agregados,$i,2)=='|,'){
                    if($arr!='|'){
                  $c++;
                  $datos2[$r][$c]=$arr;
                  if($c==10){
                  }

          ?>
          <script type="text/javascript">
            datos[<?php echo $r; ?>][<?php echo $c; ?>]='<?php echo $arr; ?>|';
          </script>
          <?php
          }
          $arr='';
            }else{
             if(substr($agregados,($i-1),2)!='|,'){
          $arr.=str_replace("'","\'",substr($agregados,$i,1));
          }
            }


}
  }
  ?>

<?php
if(isset($_GET['eliaa'])){
unlink('archivos/'.$_GET['archivo']);


    $csql = "delete from images_s where id=".$_GET['id'];  
    $link->query($csql);
     ?>
<script language="JavaScript" type="text/javascript">
location.href='tareas.php?verservicio=1&verserv=1&c=<? echo $_GET['c']; ?>';
</script>
<?php
}

?>

<form id="formn" name="formn" action="tareas.php?verservicio=1&verserv=1&c=<? echo $_GET['c']; ?>#agregadodiv" method="post" enctype="multipart/form-data" >
<input id="cuenta" name="cuenta" type="hidden" value="0">
	<input id="cuenta2" name="cuenta2" type="hidden" value="1">
	<input id="cuenta3" name="cuenta3" type="hidden" value="1">
  <input name="total_v" id="total_v" type="hidden"/> 
<input id="agregados" name="agregados" type="hidden">


    <div class="col-md-12">

           
 <?

  $query = "SELECT * from servicio where clave='".$_GET['c']."'";
  $result = $link->query($query);
  $row=mysqli_fetch_row($result);
?>
<? 
if($row[4]=='Exclusivo'){
$cos=$row[5];
?><input type="hidden" name="costot1"  class="form-control" value="<? echo $cos; ?>"><?
}else{
$cos=$row[6];
?><input type="hidden" name="costot2"  class="form-control" value="<? echo $cos; ?>"><?
}
?>
<input type="hidden" name="cla" id="cla" value="<? echo $_GET['c']; ?>">

<div class="form-group col-lg-3"  >
            <label>Sr. / Sra. / Srita.</label>
              <select class="form-control select2" style=" text-transform: uppercase;"  name="sr" id="sr" >
         <option value="--">--</option>
                   <option <? if($row[104]=='Sr.'){ ?> selected <? } ?> value="Sr.">Sr.</option>
                   <option <? if($row[104]=='Sra.'){ ?> selected <? } ?> value="Sra.">Sra.</option>
                   <option <? if($row[104]=='Srita.'){ ?> selected <? } ?> value="Srita.">Srita.</option>
                  </select>
              </div>

   <div class="form-group col-lg-3"  >
            <label>Cliente</label>
               <input name="cliente" id="cliente" autocomplete="off"  style="text-transform: uppercase;" class="form-control" type="text" value="<? echo $row[1]; ?>">
              </div>

              <div class="form-group col-lg-3"  >
            <label>Origen</label>
               <input  name="origen" id="origen"  style="text-transform: uppercase;" class="form-control" type="text"  autocomplete="off" value="<? echo $row[2]; ?>" >
              </div>

              <div class="form-group col-lg-3" >
            <label>Destino</label>
               <input name="destino" id="destino" style="text-transform: uppercase;" class="form-control" type="text" autocomplete="off" value="<? echo $row[3]; ?>" >
              </div>
<!--<div class="form-group" style="width: 100px;">
            <label>KM</label>
               <? echo $row[10]; ?>
              </div>
-->
              <div class="form-group col-lg-3" >
            <label>M3</label>
            <input name="me" id="m3" style="text-transform: uppercase;" class="form-control" onkeypress="return valida(event)" type="text" autocomplete="off" value="<? echo $row[11]; ?>" >
               <? //echo $row[11]; ?>
              </div>




<div class="box-footer" style="width: 100%; overflow: hidden;">



<div class="form-group col-lg-3" style="height: 92px;" >
            <label>Ruta</label>
              <select class="form-control select2" style=" text-transform: uppercase;"  name="ruta" id="ruta" >
         <option value="--">--</option>
                   <option <? if($row[89]=='México – Tijuana'){ ?> selected <? } ?> value="México – Tijuana">México – Tijuana</option>
                   <option <? if($row[89]=='México-Cancún'){ ?> selected <? } ?> value="México-Cancún">México-Cancún</option>
                   <option <? if($row[89]=='Cd Mx-GDL'){ ?> selected <? } ?> value="Cd Mx-GDL">Cd Mx-GDL</option>
                   <option <? if($row[89]=='México – Monterrey'){ ?> selected <? } ?> value="México – Monterrey">México – Monterrey</option>
                   <option <? if($row[89]=='GDL - TIJUANA'){ ?> selected <? } ?> value="GDL - TIJUANA">GDL - TIJUANA</option>
                  </select>
              </div>

              <div class="form-group col-lg-3" style="height: 92px;">
                  <label>Costo Neto Cliente:</label>
                   <input name="costo" id="costo"  style="text-transform: uppercase;" class="form-control" type="text" onkeypress="return valida(event)" value="<?php  echo $_POST['costo']; ?>"  >
                </div>

<div class="form-group col-lg-3" >
<label>Metodo de Pago</label>
   <input name="metodo_p" id="metodo_p"  style="text-transform: uppercase;" class="form-control" type="text" value="<? echo $row[90]; ?>" >
  </div>

  <div class="form-group col-lg-3" style="height: 92px;" >
            <label>Medio por el que se entero</label>
              <select class="form-control select2" style=" text-transform: uppercase;"  name="medio" id="medio" >
         <option value="--">--</option>
                   <option <? if($row[91]='FB'){ ?> selected <? } ?> value="FB">FB</option>
                   <option <? if($row[91]='Mudanzas Mx'){ ?> selected <? } ?> value="Mudanzas Mx">Mudanzas Mx</option>
                   <option <? if($row[91]='Recomendación'){ ?> selected <? } ?> value="Recomendación">Recomendación</option>
                   <option <? if($row[91]='Otro'){ ?> selected <? } ?> value="Otro">Otro</option>
                    </select>
              </div>

      <div class="form-group col-lg-3" style="height: 92px;" >
            <label>Requiere Factura?</label>
              <select class="form-control select2" style=" text-transform: uppercase;"  name="factura" id="factura" >
         <option value="--">--</option>
                   <option <? if($row[92]=='SI'){ ?> selected <? } ?> value="SI">SI</option>
                   <option <? if($row[92]=='NO'){ ?> selected <? } ?> value="NO">NO</option>
                   
                    </select>
              </div>



  <div class="form-group col-lg-3" style="height: 92px;" >
<label>Presupuesto Maximo</label>
   <input name="presupuesto" id="presupuesto"  style="text-transform: uppercase;" class="form-control" type="text" value="<? echo $row[93]; ?>" >
  </div>

  <div class="form-group col-lg-3" style="height: 92px;" >
<label>Niveles de la Casa</label>
   <input name="niveles" id="niveles"  style="text-transform: uppercase;" class="form-control" type="text" value="<? echo $row[94]; ?>" >
  </div>



  <div class="form-group col-lg-3" style="height: 92px;" >
            <label>Puede descargar a pie de casa?</label>
              <select class="form-control select2" style=" text-transform: uppercase;"  name="pie_casa" id="pie_casa" >
         <option value="--">--</option>
                   <option <? if($row[95]=='SI'){ ?> selected <? } ?> value="SI">SI</option>
                   <option <? if($row[95]=='NO'){ ?> selected <? } ?> value="NO">NO</option>
                   
                    </select>
  </div>     

  <div class="form-group col-lg-3" style="height: 92px;" >
<label>Articulo de Valor</label>
   <input name="articulo_v" id="articulo_v"  style="text-transform: uppercase;" class="form-control" type="text" value="<? echo $row[96]; ?>" >
  </div>

  <div class="form-group col-lg-3" >
<label>Complejidad de Maniobra</label>
   <input name="complejidad" id="complejidad"  style="text-transform: uppercase;" class="form-control" type="text" value="<? echo $row[97]; ?>" >
  </div>
  <div class="form-group col-lg-3" >
<label>Categoria del Sercivio</label>
   <input name="categoria_s" id="categoria_s"  style="text-transform: uppercase;" class="form-control" type="text" value="<? echo $row[120]; ?>" >
  </div>
             



                <div class="form-group col-lg-3" id="lista_muebles">
                  <label>Comentarios</label>
                  <textarea  id="comentarios" name="comentarios" class="form-control" rows="3" placeholder="comentarios ..." style="text-transform: uppercase;" ><? echo str_replace('<br />','',$row[98]); ?></textarea>
                </div>

</div>
<div class="box-footer" style="width: 100%; overflow: hidden;">
<? if($row[4]!='Vehiculo'){ ?>

<div class="form-group col-lg-3" >
            <label>Empaque a Granel</label>
               <input name="empaque_g" id="empaque_g"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="No. Cajas" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['empaque_g']; ?>"  <?  }else{ ?>  value="<? echo $row[61]; ?>" <? } ?> >
              </div>
              
              <div class="form-group col-lg-3" >
            <label>Empaque Profesional</label>
               <input name="empaque_p" id="empaque_p"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="$$$" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['empaque_p']; ?>"  <?  }else{ ?>  value="<? echo $row[62]; ?>" <? } ?> >
              </div>
              <div class="form-group col-lg-3"  >
            <label>Emplaye Total</label>
               <input name="emplaye_t" id="emplaye_t"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="No. Rollos" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['emplaye_t']; ?>"  <?  }else{ ?>  value="<? echo $row[63]; ?>" <? } ?> >
              </div>
              <div class="form-group col-lg-3"  >
            <label>Desempaque</label>
               <input name="desempaque" id="desempaque"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="No. Cajas" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['desempaque']; ?>"  <?  }else{ ?>  value="<? echo $row[64]; ?>" <? } ?> >
              </div>
              <div class="form-group col-lg-3"  >
            <label>Caja Closet</label>
               <input name="caja_closet" id="caja_closet"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="No. Cajas" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['caja_closet']; ?>"  <?  }else{ ?>  value="<? echo $row[65]; ?>" <? } ?> >
              </div>
<? }else{ ?>
<div class="form-group col-lg-3" >
            <label>Gruas</label>
               <input name="gruas" id="gruas"  style="text-transform: uppercase;" class="form-control" type="text" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['gruas']; ?>"  <?  }else{ ?>  value="<? echo $row[86]; ?>" <? } ?> >
              </div>
<? } ?>

              <div class="form-group col-lg-3"  >
            <label>Supervision Sencilla</label>
               <input name="supervision_s" id="supervision_s"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="M3" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['supervision_s']; ?>"  <?  }else{ ?>  value="<? echo $row[66]; ?>" <? } ?> >
              </div>
              
<div class="form-group col-lg-3" >
            <label>Supervision por servicio</label>
               <input name="supervision_ps" id="supervision_ps"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['supervision_ps']; ?>"  <?  }else{ ?>  value="<? echo $row[67]; ?>" <? } ?> >
              </div>
              
            <div class="form-group col-lg-3" >
            <label>Maniobras Carga</label>
               <input name="maniobras_c" id="maniobras_c"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['maniobras_c']; ?>"  <?  }else{ ?>  value="<? echo $row[68]; ?>" <? } ?> >
              </div>
              <div class="form-group col-lg-3"  >
            <label>Maniobras Descarga</label>
               <input name="maniobras_d" id="maniobras_d"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['maniobras_d']; ?>"  <?  }else{ ?>  value="<? echo $row[69]; ?>" <? } ?> >
              </div>
              
    <div class="form-group col-lg-3"  >
      <label>Seguro</label>
      <input name="monto_s" id="monto_s"  style="text-transform: uppercase;" placeholder="Valor Declarado"  class="form-control" type="text" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['monto_s']; ?>"  <?  }else{ ?>  value="<? echo round($row[19],2); ?>" <? } ?> >
      </div>

              <div class="form-group col-lg-3"  >
            <label>Porcentaje Seguro</label>
            
               <input name="pc_seguro" id="pc_seguro"  placeholder="0.0" style="text-transform: uppercase;" class="form-control" type="text" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['pc_seguro']; ?>"  <?  }else{ ?>  value="<? echo $row[56]; ?>" <? } ?> >
              </div>

<div class="form-group col-lg-3"  >
            <label>Permiso de Transito</label>
               <input name="permiso_t" id="permiso_t"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="$$$" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['permiso_t']; ?>"  <?  }else{ ?>  value="<? echo $row[70]; ?>" <? } ?> >
              </div>


</div>

<div class="box-footer" style="width: 100%; overflow: hidden;">

 <div class="form-group col-lg-3" style="height: 92px;">
               <label>PROVEEDOR</label>
               
               <select class="form-control select2" id="proveedor" name="proveedor">
                  <option value="--">--</option>
                   
                  <?
  $queryp = "select * FROM proveedores";
  $resultp = $link->query($queryp);
while ($rowp = mysqli_fetch_row($resultp)){
  ?>

<option <? if($rowp[0]==$row[40]){ ?> selected <? } ?> value="<? echo $rowp[0]; ?>"><? echo htmlentities($rowp[1]).' '.htmlentities($rowp[2]).' - '.$rowp[6] ; ?></option>
<? } ?>

                </select>
              </div>

               <div class="form-group col-lg-3" style="height: 92px;">
               <label>PROVEEDOR 2</label>
               
               <select class="form-control select2" id="proveedor2" name="proveedor2">
                  <option value="--">--</option>
                   
                  <?
  $queryp = "select * FROM proveedores";
  $resultp = $link->query($queryp);
while ($rowp = mysqli_fetch_row($resultp)){
  ?>

<option <? if($rowp[0]==$row[87]){ ?> selected <? } ?> value="<? echo $rowp[0]; ?>"><? echo htmlentities($rowp[1]).' '.htmlentities($rowp[2]).' - '.$rowp[6] ; ?></option>
<? } ?>

                </select>
              </div>
              <div class="form-group col-lg-3" style="height: 92px;">
               <label>PROVEEDOR 3</label>
               
               <select class="form-control select2" id="proveedor3" name="proveedor3">
                  <option value="--">--</option>
                   
                  <?
  $queryp = "select * FROM proveedores";
  $resultp = $link->query($queryp);
while ($rowp = mysqli_fetch_row($resultp)){
  ?>

<option <? if($rowp[0]==$row[88]){ ?> selected <? } ?> value="<? echo $rowp[0]; ?>"><? echo htmlentities($rowp[1]).' '.htmlentities($rowp[2]).' - '.$rowp[6] ; ?></option>
<? } ?>

                </select>
              </div>

               <div class="form-group col-lg-3">
               <label>COSTO PROVEEDOR</label>
               
               <? $tot = $cos + $row[21]; //echo $tot
if($row[43]>=1){
$cost1=$row[43];
}else{
//$cost1=$tot;
$cost1=0;
}
   ?>
    <input type="text" name="costoproveedor"  class="form-control" value="<? echo round($cost1, 2); ?>">
              </div>
              <div class="form-group col-lg-3" >
            <label>Costo Cliente</label>
               <? //echo $tot;
if($row[42]>=1){
$cost2=$row[42];
}else{
$cost2=$tot;
}
$cost2=round($cost2, 2);

   ?>
    <input type="text" name="costocliente"  class="form-control" value="<? echo $cost2; ?>">
              </div>

                
<?
if($n1>=1 and $n2>=1){
  $n3=$n1*($n2/100);
  ?>


    <div class="form-group col-lg-3" >
               <label>COSTO TOTAL</label>
               
               <label class="form-control">$ <? echo round(($cost2 + ($n3)),2); ?></label>
              </div>
<? } ?>


</div>

<div class="box-footer"  class="form-group" style="width: 100%; ">
               <div class="form-group col-lg-3" >
            <label>Tipo Mudanza</label>
            <select class="form-control select2" style="width: 100%;" id="tiposs" name="tiposs" onChange="changeTipoServ(this.value)">
                  <option value="--">--</option>
                   <option <? if($_POST['tipo_mudanza']=='Vehiculo'){ ?> selected <? } ?> <? if($row[4]=='Vehiculo'){ ?> selected <? } ?> value="Vehiculo">Vehiculo</option>
                   <option <? if($_POST['tipo_mudanza']=='Local'){ ?> selected <? } ?> <? if($row[4]=='Local'){ ?> selected <? } ?> value="Local">Local</option>
                   <option <? if($_POST['tipo_mudanza']=='Moto'){ ?> selected <? } ?> <? if($row[4]=='Moto'){ ?> selected <? } ?> value="Moto">Moto</option>
                  <option <? if($_POST['tipo_mudanza']=='Auto con Mudanza'){ ?> selected <? } ?> <? if($row[4]=='Auto con Mudanza'){ ?> selected <? } ?> value="Auto con Mudanza">Auto con Mudanza</option>
                  <option <? if($_POST['tipo_mudanza']=='Compartido'){ ?> selected <? } ?> <? if($row[4]=='Compartido'){ ?> selected <? } ?> value="Compartido">Compartido</option>
        <option <? if($_POST['tipo_mudanza']=='Exclusivo'){ ?> selected <? } ?> <? if($row[4]=='Exclusivo'){ ?> selected <? } ?> value="Exclusivo">Exclusivo</option>
        <option <? if($_POST['tipo_mudanza']=='Flete'){ ?> selected <? } ?> <? if($row[4]=='Flete'){ ?> selected <? } ?> value="Flete">Flete</option>
        <option <? if($_POST['tipo_mudanza']=='Paqueteria'){ ?> selected <? } ?> <? if($row[4]=='Paqueteria'){ ?> selected <? } ?> value="Paqueteria">Paqueteria</option>
                    <option <? if($_POST['tipo_mudanza']=='Exclusivo y Compartido'){ ?> selected <? } ?> <? if($row[4]=='Exclusivo y Compartido'){ ?> selected <? } ?> value="Exclusivo y Compartido">Exclusivo y Compartido</option>
                </select>
              <? 
			  
			  
			  // echo $row[4]; ?>
              </div>
              <div class="form-group col-lg-3" style="height: 92px;" >
            <label>Modalidad</label>
              <select class="form-control select2" style=" text-transform: uppercase;"  name="modalidad" id="modalidad">
         <option value="--">--</option>
                   <option  <? if($_POST['modalidad']=='Mudanza'){ ?> selected <? } ?> <? if($row[102]=='Mudanza'){ ?> selected <? } ?> value="Mudanza">Mudanza</option>
                   <option  <? if($_POST['modalidad']=='Auto'){ ?> selected <? } ?> <? if($row[102]=='Auto'){ ?> selected <? } ?> value="Auto">Auto</option>
                   <option  <? if($_POST['modalidad']=='Flete'){ ?> selected <? } ?> <? if($row[102]=='Flete'){ ?> selected <? } ?> value="Flete">Flete</option>
                </select>
              </div>
              
              <?php 

        $querym = "SELECT count(id) from muebles_s where cve_cotizacion='".$row[9]."'";
        $resultm = $link->query($querym);
    	$rowm=mysqli_fetch_row($resultm);
		if($rowm[0]==0){ ?>

 <div class="form-group col-lg-3" style=" <? if($row[4]=='Vehiculo'){ ?> display:none; <? } ?>" id="lista_muebles">
                  <label>Lista de muebles:</label>
                  <textarea class="form-control" name="lista_m" ><? echo str_replace('<br />','',$row[7]); ?></textarea>
                  <? // echo str_replace('<br />','',$row[7]); ?>
                </div>
                <?php } ?>

                <div class="form-group col-lg-3" style="height: 92px;" >
            <label>Fuente de Inventario</label>
              <select class="form-control select2" style=" text-transform: uppercase;"  name="fuente_i" id="fuente_i" >
         <option value="--">--</option>
         <option value="<?php echo $row[117]; ?>"><?php echo $row[117]; ?></option>
                   <option  value="WHATSAPP">WHATSAPP</option>
                   <option  value="CORREO ELECTRONICO">CORREO ELECTRONICO</option>
                   <option  value="FACEBOOK">FACEBOOK</option>
                   <option value="OTRO">OTRO</option>
                    </select>
              </div>
 <div class="form-group col-lg-3">
            <label>CORREO ELECTRONICO</label>
               <input name="email" id="email" style="text-transform: uppercase;" class="form-control" type="text" autocomplete="off" value="<? echo $row[49]; ?>" >
              </div>
 <div class="form-group col-lg-3">
            <label>TELEFONO</label>
               <input name="telefono" id="telefono" style="text-transform: uppercase;" class="form-control" type="text" autocomplete="off" value="<? echo $row[50]; ?>" >
              </div>


<div id="divve" <? if($row[4]!='Vehiculo'){ ?> style="display: none;" <? } ?>>
            
            <div class="form-group col-lg-3"  >

            <label>Marca</label>
               <input name="marca" id="marca"  style="text-transform: uppercase;" class="form-control" type="text" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['marca']; ?>"  <?  }else{ ?>  value="<? echo $row[57]; ?>" <? } ?> >
              </div>
              <div class="form-group col-lg-3" >

            <label>Modelo</label>
               <input name="modelo" id="modelo"  style="text-transform: uppercase;" class="form-control" type="text" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['modelo']; ?>"  <?  }else{ ?>  value="<? echo $row[58]; ?>" <? } ?> >
              </div>
              <div class="form-group col-lg-3" >

            <label>Tipo de Auto</label>
               <input name="tipo" id="tipo"  style="text-transform: uppercase;" class="form-control" type="text" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['tipo']; ?>"  <?  }else{ ?>  value="<? echo $row[59]; ?>" <? } ?> >
              </div>
            
<div class="form-group col-lg-3"  >
  <label>&nbsp;</label>
            <a class="btn bg-green" style="font-size: 11px;" href="vehiculopdf2021.php?c=<?php echo $_GET['c']; ?>" target="_blank">Descargar Checklist</a>
              </div>



</div>

</div>

<?/*
 <div class="form-group" style="width: 20%; margin-right: auto; margin-left: auto; align-content: center;">
 <!-- <label style="margin-right: auto; margin-left: auto;" >Extras</label>-->
<table style="width: 300px; margin-right: auto; margin-left: auto;" align="center">
  <? 
/*>
  if($row[12]>=1){ ?>
<tr>
  <td style="padding: 1px;"><label style="margin-bottom: 0px;">KM Extra</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px;"><? echo $row[12]; ?></td>
</tr>
<? } ?>
<? if($row[13]>=1){ ?>
<tr>
  <td style="padding: 1px;"><label style="margin-bottom: 0px;">Empaque Cajas</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px;"><? echo $row[13]; ?></td>
</tr>
<? } ?>
<? if($row[14]>=1){ ?>
<tr>
  <td style="padding: 1px;"><label style="margin-bottom: 0px;">Emplaye Total</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px;"><? echo $row[14]; ?></td>
</tr>
<? } ?>
<? if($row[15]>=1){ ?>
<tr>
  <td style="padding: 1px;"><label style="margin-bottom: 0px;">Caja Closet Venta</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px;"><? echo $row[15]; ?></td>
</tr>
<? } ?>
<? if($row[16]>=1){ ?>
<tr>
  <td style="padding: 1px;"><label style="margin-bottom: 0px;">Caja Closet Renta</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px;"><? echo $row[16]; ?></td>
</tr>
<? } ?>
<? if($row[17]>=1){ ?>
<tr>
  <td style="padding: 1px;"><label style="margin-bottom: 0px;">Desempaque a Granel</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px;"><? echo $row[17]; ?></td>
</tr>
<? } ?>
<? if($row[18]>=1){ ?>
<tr>
  <td style="padding: 1px;"><label style="margin-bottom: 0px;">Empaque de Muebles</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px;"><? echo $row[18]; ?></td>
</tr>
<? } ?>
<? if($row[19]>=1){ ?>
<tr>
  <td style="padding: 1px;"><label style="margin-bottom: 0px;">Seguro</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px;"><? echo $row[19]; ?></td>
</tr>
<? } ?>
<? if($row[20]>=1){ ?>
<tr>
  <td style="padding: 1px;"><label style="margin-bottom: 0px;">Otros</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px;"><? echo $row[20]; ?></td>
</tr>
<? } */ ?>

<? /*
$n1=$row[19];
$n2=$row[56];
if($n1>=1 and $n2>=1){
/*
  ?>
<tr>
  <td style="padding: 1px;"><label style="margin-bottom: 0px;">Monto Asegurado</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px; text-align: right;" align="right"><? //echo round($row[21],2); ?>
    <input type="text" name="monto_s"  class="form-control" value="<? echo round($row[19],2); ?>">
  </td>
</tr>
<tr>
  <td style="padding: 1px;"><label style="margin-bottom: 0px;">Porcentage Seguro</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px; text-align: right;" align="right"><? //echo round($row[21],2); ?>
    <input type="text" name="pc_seguro" placeholder="0.0"  class="form-control" value="<? echo $row[56]; ?>">
  </td>
</tr>
<? }  ?>



</table>
 </div>
*/ ?>



<div  class="box-footer">

 <div class="form-group col-lg-3" >
                  <label>FECHA DEL SERVICIO</label>
                        <div class="input-group">
                          <input  class="form-control" autocomplete="off"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask maxlength="10" type="text" name="fecha_s" id="datepicker" value="<? echo substr($row[22],8,2).'/'.substr($row[22],5,2).'/'.substr($row[22],0,4); ?>">
                    </div>
                </div>


                 <div class="form-group col-lg-3" >
                  <label>HORA DEL SERVICIO</label>
                  <input type="text" name="hora_s"  class="form-control" value="<? echo $row[23]; ?>">
                </div>
                 <div class="form-group col-lg-3" >
                  <label>TIEMPO DE ENTREGA APROXIMADO</label>
                  <input type="text" name="tiempo_e" class="form-control" value="<? echo $row[38]; ?>" >
                </div>
                <div class="form-group col-lg-3" >
                  <label>DIAS HABILES PARA ENTREGA</label>
                  <input type="text" name="dias_a" class="form-control" onkeypress="return valida(event)" value="<? echo $row[46]; ?>" >
                </div>
               

 </div>

<div class="box-footer" style="width: 100%; overflow: hidden;">
<p style="font-size:18px;">DIRECCIÓN DE CARGA</p>
 <div class="form-group col-lg-3" >
                  <label>CALLE Y NO.</label>
                  <input type="text" name="calle_no_c" class="form-control" value="<? echo $row[24]; ?>" >
                </div>
                 <div class="form-group col-lg-3" >
                  <label>COLONIA</label>
                  <input type="text" name="colonia_c" class="form-control" value="<? echo $row[25]; ?>" >
                </div>
                <div class="form-group col-lg-3">
                  <label>COD. POSTAL</label>
                  <input type="text" name="codpostal_c" class="form-control" value="<? echo $row[105]; ?>" >
                </div>
                <div class="form-group col-lg-3" >
                  <label>CIUDAD</label>
                  <input type="text" name="ciudad_c" class="form-control" value="<? echo $row[44]; ?>" >
                </div>
                <div class="form-group col-lg-3" >
                  <label>ESTADO</label>
                  <input type="text" name="estado_c" class="form-control" value="<? echo $row[106]; ?>" >
                </div>
                 <div class="form-group col-lg-3" >
                  <label>REFERENCIA PARA LLEGAR</label>
                  <input type="text" name="referencia_c" class="form-control" value="<? echo $row[26]; ?>" >
                </div>
                 <div class="form-group col-lg-3">
                  <label>NOM. DE QUIEN ENTREGA</label>
                  <input type="text" name="nom_c" class="form-control" value="<? echo $row[27]; ?>" >
                </div>
                <div class="form-group col-lg-3" >
                  <label>TEL. DE QUIEN ENTREGA</label>
                  <input type="text" name="tel_c" class="form-control" value="<? echo $row[28]; ?>" >
                </div>

 </div>

 
 <div class="box-footer">
<p style="font-size:18px;">DIRECCIÓN DE DESCARGA</p>
 <div class="form-group col-lg-3">
                  <label>CALLE Y NO.</label>
                  <input type="text" name="calle_no_d" class="form-control" value="<? echo $row[29]; ?>" >
                </div>
                 <div class="form-group col-lg-3">
                  <label>COLONIA</label>
                  <input type="text" name="colonia_d" class="form-control" value="<? echo $row[30]; ?>" >
                </div>
                <div class="form-group col-lg-3" >
                  <label>COD. POSTAL</label>
                  <input type="text" name="codpostal_d" class="form-control" value="<? echo $row[107]; ?>" >
                </div>
                 <div class="form-group col-lg-3">
                  <label>CIUDAD</label>
                  <input type="text" name="ciudad_d" class="form-control" value="<? echo $row[45]; ?>" >
                </div>
                <div class="form-group col-lg-3">
                  <label>ESTADO</label>
                  <input type="text" name="estado_d" class="form-control" value="<? echo $row[108]; ?>" >
                </div>
                 <div class="form-group col-lg-3" >
                  <label>REFERENCIA PARA LLEGAR</label>
                  <input type="text" name="referencia_d" class="form-control" value="<? echo $row[31]; ?>" >
                </div>
                 <div class="form-group col-lg-3" >
                  <label>NOM. DE QUIEN RECIBE</label>
                  <input type="text" name="nom_d" class="form-control" value="<? echo $row[32]; ?>" >
                </div>
                <div class="form-group col-lg-3" >
                  <label>TEL. DE QUIEN RECIBE</label>
                  <input type="text" name="tel_d" class="form-control" value="<? echo $row[33]; ?>" >
                </div>

 </div>

 <div class="box-footer" style="width: 100%; overflow: hidden;">
<p style="font-size:18px;">PAGOS</p>
 <div class="form-group col-lg-3" >
                  <label>ANTICIPO</label><br>
                  <input type="text" name="p1" style="width: 70px; float: left; height: 20px;" class="form-control" onkeypress="return valida(event)" <? if($row[53]>=1){ ?> value="<? echo $row[53]; ?>" <? }else{ ?> value="40" <? } ?> ><label>%</label><br>
                  <label>$ <? 
                  if($n1>=1 and $n2>=1){
$cost2=$cost2+$n3;
                  }
if($row[53]>=1){
  $p=$row[53]/100;
echo number_format(round(($cost2*$p), 2),2);
}else{
  echo number_format(round(($cost2*.40), 2),2);
}
                   ?></label>
                </div>
                 <div class="form-group col-lg-3" style="width: 25%;">
                  <label>A LA CARGA</label><br>
                  <input type="text" name="p2" style="width: 70px; float: left; height: 20px;" class="form-control" onkeypress="return valida(event)" <? if($row[54]>=1){ ?> value="<? echo $row[54]; ?>" <? }else{ ?> value="50" <? } ?> ><label>%</label><br>
                 <label>$ <? 
if($row[54]>=1){
  $p=$row[54]/100;
echo number_format(round(($cost2*$p), 2),2);
}else{
  echo number_format(round(($cost2*.50), 2),2);
}
                   ?></label>
                </div>
                 <div class="form-group col-lg-3" style="width: 25%;">
                  <label>LLEGANDO A CD DESTINO</label><br>
                  <input type="text" name="p3" style="width: 70px; float: left; height: 20px;" class="form-control" onkeypress="return valida(event)" <? if($row[55]>=1){ ?> value="<? echo $row[55]; ?>" <? }else{ ?> value="10" <? } ?> ><label>%</label><br>
                 <label>$ <? 
if($row[55]>=1){
  $p=$row[55]/100;
echo number_format(round(($cost2*$p), 2),2);
}else{
  echo number_format(round(($cost2*.10), 2),2);
}
                  ?></label>
                </div>
                <div class="form-group col-lg-3" >
                  <label>TIPO MONEDA</label>
                  <select class="form-control select2" style=" text-transform: uppercase;"  name="tipo_moneda" id="tipo_moneda" >
         <option value="--">--</option>
                   <option <? if($row[123]=='MXN'){ ?> selected <? } ?>  value="MXN">MXN</option>
                   <option <? if($row[123]=='USD'){ ?> selected <? } ?>  value="USD">USD</option>
                    </select>
                </div>

                 <div class="form-group col-lg-3" >
                  <label>FORMA DE PAGO</label>
                  <input type="text" name="forma_p" class="form-control" value="<? echo $row[37]; ?>" >
                </div>
                <div class="form-group col-lg-3" >
                  <label>FALTANTE DEL CLIENTE</label>
                  <input type="text" name="faltante_cliente" class="form-control" onkeypress="return valida(event)" value="<? echo $row[48]; ?>" >
                </div>
                
                </div>
                <div class="box-footer" style="width: 100%; overflow: hidden;"> 

<div class="form-group col-lg-3" >
                  <label>CONDICIONES PARTICULARES</label>
                  <textarea name="observaciones" style="width:100%;"  ><? echo str_replace('<br />','',$row[39]); ?></textarea>
                </div>

                <div class="form-group col-lg-3" >
                  <label>PARA PROVEEDOR FAVOR DE LLEVAR</label>
                  <textarea name="favor_llevar" style="width:100%;" ><? echo str_replace('<br />','',$row[41]); ?></textarea>
                </div>
                <div class="form-group col-lg-6" >
                  <label>Adicionales (Permisos municipales, EN CARGA Y DESCARGA) </label>
                  <textarea name="adicionales" style="width:100%;" ><? echo str_replace('<br />','',$row[118]); ?></textarea>
                </div>


                <div class="box-footer">
<p style="font-size:18px;">DATOS INE</p>
 <div class="form-group col-lg-3">
                  <label>INE</label>
                  <input type="text" name="ine_ine" class="form-control" value="<? echo $row[109]; ?>" >
                </div>
                 <div class="form-group col-lg-3" >
                  <label>CALLE</label>
                  <input type="text" name="ine_calle" class="form-control" value="<? echo $row[110]; ?>" >
                </div>
                <div class="form-group col-lg-3" >
                  <label>COLONIA</label>
                  <input type="text" name="ine_colonia" class="form-control" value="<? echo $row[111]; ?>" >
                </div>
                 <div class="form-group col-lg-3" >
                  <label>CIUDAD</label>
                  <input type="text" name="ine_ciudad" class="form-control" value="<? echo $row[112]; ?>" >
                </div>
                <div class="form-group col-lg-3" >
                  <label>ESTADO</label>
                  <input type="text" name="ine_estado" class="form-control" value="<? echo $row[113]; ?>" >
                </div>
                 <div class="form-group col-lg-3" >
                  <label>CODIGO POSTAL</label>
                  <input type="text" name="ine_cp" class="form-control" value="<? echo $row[114]; ?>" >
                </div>
          
                <!-- incrustacion nuevos campos -->

                <div   id="agregadodiv" style="height: auto; overflow: scroll; width: 100%; ">

</div>


              <div class="form-group" style="width: 35%; float: left; padding: 5px; height: 95px;">
            <label>Mercancia</label>
           
            <select name="mercancia" id="mercancia" class="form-control select2" style="margin-bottom: 1em;" onchange="this.form.submit()">
                <option value="--">--</option>
                <?php 
                  include('config.php');
                 
                    $querym = "SELECT * from medidas";
                    $resultm = $link->query($querym);
                    while($rowm=mysqli_fetch_row($resultm)){
                ?>
                <option <?php if(isset($_POST['mercancia'])){ if($_POST['mercancia']==utf8_encode($rowm[1])){ ?> selected <?php } } ?> value="<?php echo utf8_encode($rowm[1]); ?>"><?php echo utf8_encode($rowm[1]); ?></option>
                
                <?php } ?>
                <option  <?php if(isset($_POST['mercancia'])){ if($_POST['mercancia']==999999){ ?> selected <?php } } ?>  value="999999">Otro</option>
      </select>

      <?php if(isset($_POST['mercancia']) and $_POST['mercancia']==999999){ ?>
        <input name="mercancia2" id="mercancia2" class="form-control" type="text"   >
      <?php } ?>

    </div>

<?php if(isset($_POST['mercancia'])){
  /*
  //echo 'aqui merca';
  $resultmp=mysql_query("SELECT * from medidas where nombre='".$_POST['mercancia']."'", $link);
  $rowmp=mysql_fetch_row($resultmp);
  ?> 


    <div class="form-group" style="width: 10%; float: left; padding: 5px; height: 95px;">
             <label>Alto</label>
              <input name="alto" id="alto" onKeyPress="return valida(event)"  <?php if(isset($_POST['mercancia'])){ ?> value="<?php echo $rowmp[2]; ?>" <?php } ?> class="form-control" type="text"   >
    </div>
    <div class="form-group" style="width: 10%; float: left; padding: 5px; height: 95px;">
             <label>Ancho</label>
              <input name="ancho" id="ancho" onKeyPress="return valida(event)"  class="form-control" type="text"  <?php if(isset($_POST['mercancia'])){ ?> value="<?php echo $rowmp[3]; ?>" <?php } ?>  >
    </div>
    <div class="form-group" style="width: 10%; float: left; padding: 5px; height: 95px;">
             <label>Profundiad</label>
              <input name="profundidad" id="profundidad" onKeyPress="return valida(event)"  class="form-control" type="text"  <?php if(isset($_POST['mercancia'])){ ?> value="<?php echo $rowmp[4]; ?>" <?php } ?>  >
    </div>
    <div class="form-group" style="width: 10%; float: left; padding: 5px; height: 95px;">
             <label>Peso</label>
              <input name="peso" id="peso" onKeyPress="return valida(event)"  class="form-control" type="text" >
    </div>
    <div class="form-group" style="width: 10%; float: left; padding: 5px; height: 95px;">
             <label>Cantidad</label>
              <input name="cantidad" id="cantidad" onKeyPress="return valida(event)"  class="form-control" type="text"   >
    </div>
    
  
           


<div class="form-group" style="width:15%; padding: 5px;">
<label>&nbsp;</label>
<input type="button" name="agregar" id="agregar" class="form-control" value="Agregar" onClick="agregars();" type="text">
</div>

<?php */ } ?>

</div>

<div class="col-md-12" style=" overflow: hidden;">





                <div class="form-group col-lg-3" >
             <label>Imagenes</label>
              <input name="img1" id="img1" class="form-control" type="file"><br>
              <input name="img2" id="img2" class="form-control" type="file"><br>
              
    </div>
    <div class="form-group col-lg-3" >
             <label>Imagenes</label>
              <input name="img3" id="img3" class="form-control" type="file"><br>
              <input name="img4" id="img4" class="form-control" type="file"><br>
              
    </div>

  

                <!-- fin incrustacion nuevos campos -->





 </div>
 


<div style="width:100%; align-content: right; text-align: right;">
  <button type="submit" class="btn btn-primary"  name="guardarcambios" id="guardarcambios">Guardar</button>
</div>

 </div>

 <div class="box-footer" style="width: 100%; overflow: hidden;">
 <?php 
                  include('config.php');
                
                    $querym = "SELECT * from images_s where cve_cotizacion='".$row[9]."'";
                    $resultm = $link->query($querym);
                    while($rowm=mysqli_fetch_row($resultm)){
                ?>
<div class="col-md-3">

<img  src="archivos/<?php echo $rowm[3]; ?>" style="width:100%"><br><br>
<a class="btn bg-red" href="tareas.php?verservicio=1&verserv=1&eliaa=1&id=<? echo $rowm[0]; ?>&archivo=<? echo $rowm[3]; ?>&c=<? echo $_GET['c']; ?>">Eliminar Imagen</a>
</div>
<?php } ?>
                    </div>

       
        <div class="box-footer" >

<table>
  <?

  $queryar1 = "select * FROM archivos where clave='".$_GET['c']."' order by id desc";
  $resultar1 = $link->query($queryar1);
  while($rowar1 = mysqli_fetch_row($resultar1)){
  ?>
  
    <tr>
    <td><? echo $rowar1[4]; ?></td>
    <td><? echo substr($rowar1[3],8,2).'-'.substr($rowar1[3],5,2).'-'.substr($rowar1[3],0,4); ?></td>
    <td><a style="text-decoration: underline;" onClick="javascript:document.getElementById('archi2').src='archivos/<? echo $rowar1[2]; ?>'">Ver Archivo</a></td>
    <td><!--<a style="text-decoration: underline;" href="tareas.php?ser=1&elia=1&id=<? echo $rowar1[0]; ?>&archivo=<? echo $rowar1[2]; ?>&c=<? echo $_GET['c']; ?>">Eliminar Archivo</a>--></td>
    </tr>
<? } ?>
</table>
<?

$queryar = "SELECT * from archivos where clave='".$_GET['c']."'";
$resultar = $link->query($queryar);
  $rowar=mysqli_fetch_row($resultar);
  if($rowar[0]>=1){
  ?>
<iframe id="archi2" style="width:100%; height:600px;"></iframe>
<? } ?>
<table style="width: 60%; margin-left: auto; margin-right: auto;">
<tr>
<!--<td><input  name="tipoarchivo" id="tipoarchivo"  style="text-transform: uppercase; height: 26px; margin-bottom: 0px;" class="form-control" type="text"  autocomplete="off" ></td>-->
<td><input type="file" name="archivo" ></td>
<td><button type="submit" class="btn btn-primary"  name="subir" id="subir">Subir Archivo</button></td>
  </tr>
</table>


              </div>
  
           


<?

if(isset($_POST['guardarcambios'])){

$campo0=$_POST['cla'];
$campo1=substr($_POST['fecha_s'],6,4).'-'.substr($_POST['fecha_s'],3,2).'-'.substr($_POST['fecha_s'],0,2);
$campo2=$_POST['hora_s'];
$campo3=$_POST['tiempo_e'];
$campo4=str_replace("'","`'",$_POST['calle_no_c']);
$campo5=str_replace("'","`",$_POST['colonia_c']);
$campo6=str_replace("'","`",$_POST['referencia_c']);
$campo7=str_replace("'","`'",$_POST['nom_c']);
$campo8=str_replace("'","`",$_POST['tel_c']);
$campo9=str_replace("'","`",$_POST['calle_no_d']);
$campo10=$_POST['colonia_d'];
$campo11=$_POST['referencia_d'];
$campo12=$_POST['nom_d'];
$campo13=$_POST['tel_d'];
if($_POST['p1']!=''){
  $p=$_POST['p1']/100;
$campo14=round(($_POST['costocliente']*$p),2);
}else{
  $campo14=round(($_POST['costocliente']*.30),2);
}

if($_POST['p2']!=''){
  $p=$_POST['p2']/100;
$campo15=round(($_POST['costocliente']*$p),2);
}else{
 $campo15=round(($_POST['costocliente']*.5),2);
}

if($_POST['p3']!=''){
  $p=$_POST['p3']/100;
$campo16=round(($_POST['costocliente']*$p),2);
}else{
$campo16=round(($_POST['costocliente']*.2),2);
}


$campo17=$_POST['forma_p'];
$campo18=nl2br($_POST['observaciones']);
$campo19=$_POST['proveedor'];
$campo20=$_POST['favor_llevar'];
$campo21=$_POST['costot1'];
$campo22=$_POST['costot2'];
$campo23=$_POST['costote'];
$campo24=nl2br($_POST['lista_m']);
$campo25=$_POST['tiposs'];
$campo26=$_POST['costocliente'];
$campo27=$_POST['costoproveedor'];
$campo28=$_POST['m3'];
$campo29=$_POST['ciudad_c'];
$campo30=$_POST['ciudad_d'];
$campo31=$_POST['dias_a'];
$campo32=$_POST['faltante_cliente'];
$campo33=$_POST['cliente'];
$campo34=$_POST['origen'];
$campo35=$_POST['destino'];
$campo36=$_POST['email'];
$campo37=$_POST['telefono'];

$campo39=$_POST['p1'];
$campo40=$_POST['p2'];
$campo41=$_POST['p3'];

$campo42=$_POST['monto_s'];
$campo43=$_POST['pc_seguro'];


      $c44=$_POST['empaque_g'];
      $c45=$_POST['empaque_p'];
      $c46=$_POST['emplaye_t'];
      $c47=$_POST['desempaque'];
      $c48=$_POST['caja_closet'];
      $c49=$_POST['supervision_s'];
      $c50=$_POST['supervision_ps'];
      $c51=$_POST['maniobras_c'];
      $c52=$_POST['maniobras_d'];
      $c53=$_POST['permiso_t'];

      $c54=$_POST['gruas'];

      $c55=$_POST['ruta'];
      $c56=$_POST['metodo_p'];
      $c57=$_POST['medio'];
      $c58=$_POST['factura'];
      $c59=$_POST['presupuesto'];
      $c60=$_POST['niveles'];
      $c61=$_POST['pie_casa'];
      $c62=$_POST['articulo_v'];
      $c63=$_POST['complejidad'];
      $c64=$_POST['comentarios'];

      $c65=$_POST['sr'];
      $c66=$_POST['codpostal_c'];
      $c67=$_POST['estado_c'];
      $c68=$_POST['codpostal_d'];
      $c69=$_POST['estado_d'];

      $c70=$_POST['ine_ine'];
      $c71=$_POST['ine_calle'];
      $c72=$_POST['ine_colonia'];
      $c73=$_POST['ine_ciudad'];
      $c74=$_POST['ine_estado'];
      $c75=$_POST['ine_cp'];
      $c76='';
      $c77='';

      $c78=$_POST['fuente_i'];
      $c79=nl2br($_POST['adicionales']);
      $c80=$_POST['categoria_s'];
      $c81=$_POST['modalidad'];


      $c82=$_POST['tipo_moneda'];
     /* $c83=$_POST['tarjeta'];
      $c84=$_POST['banco'];
      $c85=$_POST['titular'];
      $c86=$_POST['fecha_exp'];
      $c87=$_POST['cod_seg'];*/



$csql = "update servicio set fecha_s='".$campo1."',hora_s='".$campo2."',calle_no_c='".$campo4."',colonia_c='".$campo5."',referencia_c='".$campo6."',nom_c='".$campo7."',tel_c='".$campo8."',calle_no_d='".$campo9."',colonia_d='".$campo10."',referencia_d='".$campo11."',nom_d='".$campo12."',tel_d='".$campo13."',anticipo='".$campo14."',a_la_carga='".$campo15."',antes_de_la_carga='".$campo16."',forma_de_pago='".$campo17."',tiempo_entrega_aprox='".$campo3."',observaciones='".$campo18."',proveedor='".$campo19."',favorllevar='".$campo20."',costo='".$campo21."',costo2='".$campo22."',extras='".$campo23."',muebles='".$campo24."',tipo_mudanza='".$campo25."',costocliente='".$campo26."',costoproveedor='".$campo27."',m3='".$campo28."',ciudad_c='".$campo29."',ciudad_d='".$campo30."',dias='".$campo31."',falta_pagar='".$campo32."',cliente='".$campo33."',origen='".$campo34."',destino='".$campo35."',email='".$campo36."',telefono='".$campo37."',p1='".$campo39."',p2='".$campo40."',p3='".$campo41."',seguro='".$campo42."',pc_seguro='".$campo43."',empaque_g='".$c44."',empaque_p='".$c45."',emplaye_t='".$c46."',desempaque='".$c47."',caja_closet='".$c48."',supervision_s='".$c49."',supervision_ps='".$c50."',maniobras_c='".$c51."',maniobras_d='".$c52."',permiso_t='".$c53."',gruas='".$c54."',ruta='".$c55."',metodo_p='".$c56."',medio='".$c57."',factura='".$c58."',presupuesto='".$c59."',niveles='".$c60."',pie_casa='".$c61."',articulo_v='".$c62."',complejidad='".$c63."',comentarios='".$c64."',sr='".$c65."',codpostal_c='".$c66."',estado_c='".$c67."',codpostal_d='".$c68."',estado_d='".$c69."',ine_ine='".$c70."',ine_calle='".$c71."',ine_colonia='".$c72."',ine_ciudad='".$c73."',ine_estado='".$c74."',ine_cp='".$c75."',ine_cel='".$c76."',ine_email='".$c77."',fuente_i='".$c78."',adicionales='".$c79."',categoria_s='".$c80."',modalidad='".$c81."',tipo_moneda='".$c82."' where clave='".$campo0."'";
 
$link->query($csql);

///////////////////////// Insertar Muebles ///////////////////
$g=$_POST['cuenta'];


for($r=0; $r<=$g; $r++){
  if(isset($datos2[$r][1]) and $datos2[$r][1]!=''){

  $c21=$datos2[$r][1];
      $c22=$datos2[$r][2];
      $c23=$datos2[$r][3];
      $c24=$datos2[$r][4];
      $c25=$datos2[$r][5];
      $c26=$datos2[$r][6];
      $c27=$datos2[$r][7];
      if($c27==999999){
      $query3 = "insert into medidas(nombre,alto,ancho,profundidad) values('".$c21."','".$c22."','".$c23."','".$c24."')";
      //echo $query3.'<br>';
     $link->query($query3);
      }




//echo "insert into articulo_ofi(concepto,cantidad,descripcion,clave_soli,uso_material) values('".$c21."','".$c22."','".$c23."','".$c12."','".$c24."')";
       $query4 = "insert into muebles_s(cve_cotizacion,cve_servicio,mercancia,alto,ancho,profundidad,peso,cantidad) values('".$_GET['c']."','".$_GET['c']."','".$c21."','".$c22."','".$c23."','".$c24."','".$c25."',".$c26.")";
       //echo $query2.'<br>';
     $link->query($query4);

  }

}
echo '5<br>';


//////////////////////// Fin Insertar Muebles ////////////////


/////////////////////// Images //////////////////////////
$errore1=false;
if (is_uploaded_file($_FILES['img1']['tmp_name'])) {
  $e1 = date('dmYHis').$_FILES['img1']['name'];
  $e1=str_replace(' ','_',$e1);
  // echo $e1;
 
  move_uploaded_file($_FILES['img1']['tmp_name'], "archivos/".$e1);
} else {
$errore1=true;
$errormsg = "Error al cargar imagen: " . $_FILES['img1']['name'];
}
if($errore1){
$e1 = "N_A";
}
if($e1!="N_A"){
$csqle1 = "insert into images_s(cve_cotizacion,cve_servicio,archivo) values('".$_GET['c']."','".$_GET['c']."','".$e1."')";  
$link->query($csqle1);

}
echo '1<br>';
//////////
$errore2=false;
if (is_uploaded_file($_FILES['img2']['tmp_name'])) {
  $e2 = date('dmYHis').$_FILES['img2']['name'];
  $e2=str_replace(' ','_',$e2);
  // echo $e1;
  
  move_uploaded_file($_FILES['img2']['tmp_name'], "archivos/".$e2);
} else {
$errore2=true;
$errormsg = "Error al cargar imagen: " . $_FILES['img2']['name'];
}
if($errore2){
$e2 = "N_A";
}
if($e2!="N_A"){
$csqle2 = "insert into images_s(cve_cotizacion,cve_servicio,archivo) values('".$_GET['c']."','".$_GET['c']."','".$e2."')";  
$link->query($csqle2);
}
echo '2<br>';
/////////////
$errore3=false;
if (is_uploaded_file($_FILES['img3']['tmp_name'])) {
  $e3 = date('dmYHis').$_FILES['img3']['name'];
  $e3=str_replace(' ','_',$e3);
 // echo $e1;
  move_uploaded_file($_FILES['img3']['tmp_name'], "archivos/".$e3);
} else {
$errore3=true;
$errormsg = "Error al cargar imagen: " . $_FILES['img3']['name'];
}
if($errore3){
$e3 = "N_A";
}
if($e3!="N_A"){
$csqle3 = "insert into images_s(cve_cotizacion,cve_servicio,archivo) values('".$_GET['c']."','".$_GET['c']."','".$e3."')";  
 $link->query($csqle3);
}
echo '3<br>';
/////////////////
$errore4=false;
if (is_uploaded_file($_FILES['img4']['tmp_name'])) {
  $e4 = date('dmYHis').$_FILES['img4']['name'];
  $e4=str_replace(' ','_',$e4);
 // echo $e1;
  move_uploaded_file($_FILES['img4']['tmp_name'], "archivos/".$e4);
} else {
$errore4=true;
$errormsg = "Error al cargar imagen: " . $_FILES['img4']['name'];
}
if($errore4){
$e4 = "N_A";
}
if($e4!="N_A"){
$csqle4 = "insert into images_s(cve_cotizacion,cve_servicio,archivo) values('".$_GET['c']."','".$_GET['c']."','".$e4."')";  
$link->query($csqle4);
}

echo '4<br>';
///////////////////////  Fin images  /////////////////////////


?>
    <script type="text/javascript">
     location.href="tareas.php?verservicio=1&verserv=1&c=<? echo $campo0; ?>"; </script>
<?

  }




if(isset($_POST['subir'])){

 
  $error35=false;
    if (is_uploaded_file($_FILES['archivo']['tmp_name'])) {
    $ext = end((explode(".", $_FILES['archivo']['name']))); 
      $campo35 = time().".".$ext;
      move_uploaded_file($_FILES['archivo']['tmp_name'], "archivos/".$campo35);
    
  } else {
    $error35=true;
    $errormsg = "Error al cargar imagen: " . $_FILES['archivo']['name'];
  }
  if($error35){
  $campo35 = "N_A";
  }
  
  $cad=0;
$cade='';
 /* if($_POST['tipoarchivo']==''){
    $cad=1;
    $cade.='Falta llenar tipo del archvio \n';
  }*/
if($campo35 == "N_A"){
    $cad=1;
    $cade.='Falta seleccionar archivo \n';
  }

if($cad!=1){

  $campo1=$_POST['cla']; 
  $campo2 = $campo35;
  $campo3=date("Y-m-d H:i:s");
  $campo4 = $_FILES['archivo']['name'];
  
    
 $csql = "insert into archivos(clave,archivo,fecha,tipo) values('".$campo1."','".$campo2."','".$campo3."','".$campo4."')";
   $link->query($csql);
  
  

    
      ?>
<script type="text/javascript"> location.href="tareas.php?verservicio=1&verserv=1&c=<? echo $_GET['c']; ?>"; </script>
<?
  }
  else{
?>
    <script type="text/javascript">
alert('<? echo $cade; ?>');
     location.href="tareas.php?verserv=1&c=<? echo $_GET['c']; ?>"; </script>
<?
  }


} 
?>

<? if(isset($_POST['borrador'])){
$km=$_POST['km'];
$m3=$_POST['m3'];



       $c13=$_POST['empaquec'];
       $c14=$_POST['emplayet'];
       $c15=$_POST['cajacv'];
       $c16=$_POST['cajacr'];
       $c17=$_POST['desempaqueg'];
       $c18=$_POST['empaquem'];
       $c19=$_POST['seguro'];
       $c20=$_POST['otros'];
       $c21=($c13*160)+($c14*400)+($c15*300)+($c16*160)+($c17*80)+($c18*75)+($c19 * .025)+($c20*2500);

if($km>1000){
  if($m3<=13){
    $cm3=($km*5)/1000;
  }else{
    if($m3<=23){
    $cm3=($km*7)/1000;
  }else{
    if($m3<=30){
    $cm3=($km*8)/1000;
   }else{
    $cm3=($km*10)/1000;
    }
   }
  }
} else{

if($km>500){
  if($m3<=13){
    $cm3=($km*9)/1000;
  }else{
    if($m3<=23){
    $cm3=($km*13)/1000;
  }else{
    if($m3<=30){
    $cm3=($km*16)/1000;
   }else{
    $cm3=($km*20)/1000;
    }
   }
  }
} else{

if($m3<=13){
    $cm3=5500/210;
  }else{
    if($m3<=23){
    $cm3=6500/210;
  }else{
    if($m3<=30){
    $cm3=7000/210;
   }else{
    $cm3=9000/210;
    }
   }
  }

}

$kmext=0;
if($_POST['km_extra']!=''){
if($m3<=13){
    $cm3ex=5500/210;
  }else{
    if($m3<=23){
    $cm3ex=6500/210;
  }else{
    if($m3<=30){
    $cm3ex=7000/210;
   }else{
    $cm3ex=9000/210;
    }
   }
  }

$kmext=$cm3ex*$_POST['km_extra'];

}

$costosin=($km*$cm3)+$kmext;
$costocon=($costosin*.4)+$costosin;
$comsin=$costosin-($costosin*.3);
$comcon=$comsin+($comsin*.3);

$costocon=round($costocon,2);

$comcon=round($comcon,2);
?>
<input name="costo" id="costo" type="hidden" value="<? echo $costocon; ?>" >
<input name="costo2" id="costo2" type="hidden" value="<? echo $comcon; ?>" >
<?
}


?>


<? 
} ?>


           
        </div>

      
   </form>                 
   <script type="text/javascript">



function desagregar(v){

delete datos[v][1];
delete datos[v][2];
delete datos[v][3];
delete datos[v][4];
delete datos[v][5];
delete datos[v][6];
delete datos[v][7];

var m3=0.0;

var c= document.getElementById("cuenta").value;
var cade="<table   class='table table-head-fixed text-nowrap'><tr><td style='padding:5px;'><strong>Mercancia</strong></td><td style='padding:5px;'><strong>Alto</strong></td><td style='padding:5px;'><strong>Ancho</strong></td><td style='padding:5px;'><strong>Profundidad</strong></td><td style='padding:5px;'><strong>Peso</strong></td><td style='padding:5px;'><strong>Cantidad</strong></td><td style='padding:5px;'></td></tr>";
for(var i=1; i<=c; i++){
if(datos[i][1]!= undefined){
    cade = cade +  "<tr><td style='padding:5px;'><strong>"+datos[i][1].replace("|", "")+"</strong></td><td style='padding:5px;'>"+datos[i][2].replace("|", "")+" cm</td><td style='padding:5px;'>"+datos[i][3].replace("|", "")+" cm</td><td style='padding:5px;'>"+datos[i][4].replace("|", "")+" cm</td><td style='padding:5px;'>"+datos[i][5].replace("|", "")+" kg</td><td style='padding:5px;'><strong>"+datos[i][6].replace("|", "")+"</strong></td><td style='padding:5px;'><a onClick='javascript:desagregar("+i+")' href='#agregadodiv'>Eliminar</a></td></tr>";
    var al = parseFloat(datos[i][2].replace("|", "")) / 100;
  var an = parseFloat(datos[i][3].replace("|", "")) / 100;
  var pr = parseFloat(datos[i][4].replace("|", "")) / 100;
  m3=m3+((al*an*pr)*parseFloat(datos[i][6].replace("|", "")));
document.getElementById("m3").value=Math.round(m3* 100) / 100;
}
}
cade= cade + "</table>";
//c--;
document.getElementById("cuenta").value=c;
document.getElementById("agregados").value=datos.join("||");
document.getElementById("agregadodiv").innerHTML=cade;

}



function mostrarTabla(){

var c= document.getElementById("cuenta").value;
var m3=0.0;

var cade="<table   class='table table-head-fixed text-nowrap'><tr><td style='padding:5px;'><strong>Mercancia</strong></td><td style='padding:5px;'><strong>Alto</strong></td><td style='padding:5px;'><strong>Ancho</strong></td><td style='padding:5px;'><strong>Profundidad</strong></td><td style='padding:5px;'><strong>Peso</strong></td><td style='padding:5px;'><strong>Cantidad</strong></td><td style='padding:5px;'></td></tr>";
for(var i=1; i<=c; i++){
if(datos[i][1]!= undefined){
    cade = cade +  "<tr><td style='padding:5px;'><strong>"+datos[i][1].replace("|", "")+"</strong></td><td style='padding:5px;'>"+datos[i][2].replace("|", "")+" cm</td><td style='padding:5px;'>"+datos[i][3].replace("|", "")+" cm</td><td style='padding:5px;'>"+datos[i][4].replace("|", "")+" cm</td><td style='padding:5px;'>"+datos[i][5].replace("|", "")+" kg</td><td style='padding:5px;'><strong>"+datos[i][6].replace("|", "")+"</strong></td><td style='padding:5px;'><a onClick='javascript:desagregar("+i+")' href='#agregadodiv'>Eliminar</a></td></tr>";
    var al = parseFloat(datos[i][2].replace("|", "")) / 100;
  var an = parseFloat(datos[i][3].replace("|", "")) / 100;
  var pr = parseFloat(datos[i][4].replace("|", "")) / 100;
  m3=m3+((al*an*pr)*parseFloat(datos[i][6].replace("|", "")));
document.getElementById("m3").value=Math.round(m3* 100) / 100;
}
}
cade= cade + "</table>";
//c--;
document.getElementById("cuenta").value=c;
document.getElementById("agregados").value=datos.join("||");
document.getElementById("agregadodiv").innerHTML=cade;


}

<?php  if(isset($_GET['verservicio'])){
  
 
                    $query = "SELECT * from muebles_s where cve_cotizacion='".$row[9]."'";
                    $cc=0;
                    $resultm = $link->query($query);
                    while($rowm=mysqli_fetch_row($resultm)){
                      $cc++;
?>
datos[<?php echo $cc; ?>][1]='<?php echo $rowm[3]; ?>|';
    datos[<?php echo $cc; ?>][2]='<?php echo $rowm[4]; ?>|';
    datos[<?php echo $cc; ?>][3]='<?php echo $rowm[5]; ?>|';
    datos[<?php echo $cc; ?>][4]='<?php echo $rowm[6]; ?>|';
    datos[<?php echo $cc; ?>][5]='<?php echo $rowm[7]; ?>|';
    datos[<?php echo $cc; ?>][6]='<?php echo $rowm[8]; ?>|';
    datos[<?php echo $cc; ?>][7]='<?php echo $rowm[3]; ?>|';
<?php
                    }

  ?>

var c=<?php echo $cc; ?>;

var m3=0.0;
var cade="<table   class='table table-head-fixed text-nowrap'><tr><td style='padding:5px;'><strong>Mercancia</strong></td><td style='padding:5px;'><strong>Alto</strong></td><td style='padding:5px;'><strong>Ancho</strong></td><td style='padding:5px;'><strong>Profundidad</strong></td><td style='padding:5px;'><strong>Peso</strong></td><td style='padding:5px;'><strong>Cantidad</strong></td><td style='padding:5px;'></td></tr>";
for(var i=1; i<=c; i++){
if(datos[i][1]!= undefined){
    cade = cade +  "<tr><td style='padding:5px;'><strong>"+datos[i][1].replace("|", "")+"</strong></td><td style='padding:5px;'>"+datos[i][2].replace("|", "")+" cm</td><td style='padding:5px;'>"+datos[i][3].replace("|", "")+" cm</td><td style='padding:5px;'>"+datos[i][4].replace("|", "")+" cm</td><td style='padding:5px;'>"+datos[i][5].replace("|", "")+" kg</td><td style='padding:5px;'><strong>"+datos[i][6].replace("|", "")+"</strong></td><td style='padding:5px;'><a onClick='javascript:desagregar("+i+")' href='#agregadodiv'>Eliminar</a></td></tr>";
    var al = parseFloat(datos[i][2].replace("|", "")) / 100;
  var an = parseFloat(datos[i][3].replace("|", "")) / 100;
  var pr = parseFloat(datos[i][4].replace("|", "")) / 100;
  m3=m3+((al*an*pr)*parseFloat(datos[i][6].replace("|", "")));
document.getElementById("m3").value=Math.round(m3* 100) / 100;
}
}
cade= cade + "</table>";

//alert(c);
document.getElementById("cuenta").value=c;
document.getElementById("agregados").value=datos.join("||");
document.getElementById("agregadodiv").innerHTML=cade;

<?php } ?>

<?php  if(isset($_POST['guardar']) || isset($_POST['mercancia'])){
?>
//alert("aqui");
var c= "<?php echo $_POST['cuenta']; ?>";
var m3=0.0;
//alert('cuenta '+c+' ' +datos[1][2]);
var cade="<table   class='table table-head-fixed text-nowrap'><tr><td style='padding:5px;'><strong>Mercancia</strong></td><td style='padding:5px;'><strong>Alto</strong></td><td style='padding:5px;'><strong>Ancho</strong></td><td style='padding:5px;'><strong>Profundidad</strong></td><td style='padding:5px;'><strong>Peso</strong></td><td style='padding:5px;'><strong>Cantidad</strong></td><td style='padding:5px;'></td></tr>";
for(var i=1; i<=c; i++){
if(datos[i][1]!= undefined){
    cade = cade +  "<tr><td style='padding:5px;'><strong>"+datos[i][1].replace("|", "")+"</strong></td><td style='padding:5px;'>"+datos[i][2].replace("|", "")+" cm</td><td style='padding:5px;'>"+datos[i][3].replace("|", "")+" cm</td><td style='padding:5px;'>"+datos[i][4].replace("|", "")+" cm</td><td style='padding:5px;'>"+datos[i][5].replace("|", "")+" kg</td><td style='padding:5px;'><strong>"+datos[i][6].replace("|", "")+"</strong></td><td style='padding:5px;'><a onClick='javascript:desagregar("+i+")' href='#agregadodiv'>Eliminar</a></td></tr>";
    var al = parseFloat(datos[i][2].replace("|", "")) / 100;
  var an = parseFloat(datos[i][3].replace("|", "")) / 100;
  var pr = parseFloat(datos[i][4].replace("|", "")) / 100;
  m3=m3+((al*an*pr)*parseFloat(datos[i][6].replace("|", "")));
document.getElementById("m3").value=Math.round(m3* 100) / 100;
}
}
cade= cade + "</table>";
//c--;
//alert(cade);
document.getElementById("cuenta").value=c;
document.getElementById("agregados").value=datos.join("||");
document.getElementById("agregadodiv").innerHTML=cade;

<?php
} 
?>


function agregars(){

  var m3=0.0;
var c= document.getElementById("cuenta").value;
//alert(c);
var des=1;
var f=1;
var cad='';

if(document.getElementById("mercancia").value!='999999'){

     if(document.getElementById("mercancia").value=='--'){
      f=2;
    cad=cad + 'Mercancia \n';
    }
    if(document.getElementById("cantidad").value==''){
      f=2;
    cad=cad + 'Cantidad \n';
    }

}

    
if(f==1){
  c++;
  if(document.getElementById("mercancia").value=='999999'){
    datos[c][1]=document.getElementById("mercancia2").value+'|';
    datos[c][2]=document.getElementById("alto").value+'|';
    datos[c][3]=document.getElementById("ancho").value+'|';
    datos[c][4]=document.getElementById("profundidad").value+'|';
    datos[c][5]=document.getElementById("peso").value+'|';
    datos[c][6]=document.getElementById("cantidad").value+'|';
    datos[c][7]=document.getElementById("mercancia").value+'|';

  }else{
   
    datos[c][1]=document.getElementById("mercancia").value+'|';
    datos[c][2]=document.getElementById("alto").value+'|';
    datos[c][3]=document.getElementById("ancho").value+'|';
    datos[c][4]=document.getElementById("profundidad").value+'|';
    datos[c][5]=document.getElementById("peso").value+'|';
    datos[c][6]=document.getElementById("cantidad").value+'|';
    datos[c][7]=document.getElementById("mercancia").value+'|';
  
  }


}else{

alert(cad);
}

var cade="<table   class='table table-head-fixed text-nowrap'><tr><td style='padding:5px;'><strong>Mercancia</strong></td><td style='padding:5px;'><strong>Alto</strong></td><td style='padding:5px;'><strong>Ancho</strong></td><td style='padding:5px;'><strong>Profundidad</strong></td><td style='padding:5px;'><strong>Peso</strong></td><td style='padding:5px;'><strong>Cantidad</strong></td><td style='padding:5px;'></td></tr>";
for(var i=1; i<=c; i++){
if(datos[i][1]!= undefined){
    cade = cade +  "<tr><td style='padding:5px;'><strong>"+datos[i][1].replace("|", "")+"</strong></td><td style='padding:5px;'>"+datos[i][2].replace("|", "")+" cm</td><td style='padding:5px;'>"+datos[i][3].replace("|", "")+" cm</td><td style='padding:5px;'>"+datos[i][4].replace("|", "")+" cm</td><td style='padding:5px;'>"+datos[i][5].replace("|", "")+" kg</td><td style='padding:5px;'><strong>"+datos[i][6].replace("|", "")+"</strong></td><td style='padding:5px;'><a onClick='javascript:desagregar("+i+")' href='#agregadodiv'>Eliminar</a></td></tr>";
    var al = parseFloat(datos[i][2].replace("|", "")) / 100;
  var an = parseFloat(datos[i][3].replace("|", "")) / 100;
  var pr = parseFloat(datos[i][4].replace("|", "")) / 100;
  m3=m3+((al*an*pr)*parseFloat(datos[i][6].replace("|", "")));
document.getElementById("m3").value=Math.round(m3* 100) / 100;
}
}
cade= cade + "</table>";

document.getElementById("cuenta").value=c;
//document.getElementById("total_v").value=sum;
document.getElementById("agregados").value=datos.join("||");
document.getElementById("agregadodiv").innerHTML=cade;

}




</script>
        

<script type="text/javascript">

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
  

function buscarkm(){



var d1=document.getElementById("origen").value;
var d2=document.getElementById("destino").value;


var kms = new Array(3);
kms[0] = new Array(300);
kms[1] = new Array(300);
kms[2] = new Array(300);
kms[3] = new Array(300);
var cuenta=0;

 <?

 
  $query = "SELECT origen, destino, km, kmextra FROM cotizacion2 group by origen, destino";
  $r=0;
  $result = $link->query($query);
while($row = mysqli_fetch_row($result)){

?>

kms[0][<? echo $r; ?>]="<? echo $row[0]; ?>";
kms[1][<? echo $r; ?>]="<? echo $row[1]; ?>";
kms[2][<? echo $r; ?>]="<? echo $row[2]; ?>";
kms[3][<? echo $r; ?>]="<? echo $row[3]; ?>";

cuenta=<? echo $r; ?>;

<? 
$r++;
} ?>


  

//alert('aqui '+d1+' '+d2+' '+cuenta);
for(var i=0; i<=cuenta; i++){

if(kms[0][i]==d1 && kms[1][i]==d2){

  document.getElementById("km").value=kms[2][i];
  document.getElementById("m3").value=kms[3][i];
}


}




}

</script>

