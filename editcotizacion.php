


<?php 
  if(isset($_POST['editarcotizacion'])){
		  
    $c1=$_POST['cliente'];
           $c2=$_POST['origen'];
           $c3=$_POST['destino'];
           $c4=$_POST['tipo_mudanza'];
           $c5=$_POST['costo'];
           $c6=$_POST['costo'];
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
           $c53='';
           $c54=$_POST['niveles'];
           $c55='';
           $c56='';
           $c57='';
           $c58=$_POST['comentarios'];
           $c59=$_POST['modalidad'];
           $c60=$_POST['tiempo_e'];
    
           $c61=$_POST['whatsapp'];
           if($_POST['fecha_aprox']=''){
          $c62='0000-00-00';
           }else{
          $c62=substr($_POST['fecha_aprox'],6,4).'-'.substr($_POST['fecha_aprox'],3,2).'-'.substr($_POST['fecha_aprox'],0,2);
           }
          
            
           $c63=$_POST['incluye_1'];
           $c64=$_POST['incluye_2'];
           $c65=$_POST['incluye_3'];
           $c66=$_POST['no_incluye_1'];
           $c67=$_POST['no_incluye_2'];
           $c68=$_POST['no_incluye_3'];
          
          $csql = "update cotizacion2 set cliente='".$c1."',origen='".$c2."',destino='".$c3."',tipo_mudanza='".$c4."',muebles='".$c7."',km='".$c10."',m3='".$c11."',kmextra='".$c12."',empaquec='".$c13."',emplayet='".$c14."',cajacv='".$c15."',cajacr='".$c16."',desempaqueg='".$c17."',empaquem='".$c18."',seguro='".$c28."',otros='".$c20."',extras='".$c21."',costo='".$c22."',costo2='".$c22."',testimado='".$c23."',email='".$c24."',telefono='".$c25."',costoproveedor='".$c26."',pc_seguro='".$c29."',marca='".$c30."',modelo='".$c31."',placas='".$c32."',color='".$c33."',empaque_g='".$c34."',empaque_p='".$c35."',emplaye_t='".$c36."',desempaque='".$c37."',caja_closet='".$c38."',supervision_s='".$c39."',supervision_ps='".$c40."',maniobras_c='".$c41."',maniobras_d='".$c42."',permiso_t='".$c43."',proveedor1=".$c44.",proveedor2=".$c45.",proveedor3=".$c46.",fecha_s='".$c47."',hora_s='".$c48."',ruta='".$c49."',metodo_p='".$c50."',medio='".$c51."',factura='".$c52."',presupuesto='".$c53."',niveles='".$c54."',pie_casa='".$c55."',articulo_v='".$c56."',complejidad='".$c57."',comentarios='".$c58."',modalidad='".$c59."',tiempo_estimado='".$c60."',whatsapp='".$c61."',fecha_aprox='".$c62."',incluye1='".$c63."',incluye2='".$c64."',incluye3='".$c65."',noincluye1='".$c66."',noincluye2='".$c67."',noincluye3='".$c68."' where clave='".$_GET['c']."'";  
           
        $link->query($csql);

          $g=$_POST['cuenta'];

          $query2 = "delete from muebles_s where cve_cotizacion='".$_GET['c']."'";
             $link->query($query2);
    

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
               $link->query($query3);
                }
          
        
        
        
          //echo "insert into articulo_ofi(concepto,cantidad,descripcion,clave_soli,uso_material) values('".$c21."','".$c22."','".$c23."','".$c12."','".$c24."')";
                 $query2 = "insert into muebles_s(cve_cotizacion,cve_servicio,mercancia,alto,ancho,profundidad,peso,cantidad) values('".$_GET['c']."','".$_GET['c']."','".$c21."','".$c22."','".$c23."','".$c24."','".$c25."',".$c26.")";
                // echo $query2.'<br>';
               $link->query($query2);
          
            }
        
          }


         /* 
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
$csqle1 = "insert into images_s(cve_cotizacion,cve_servicio,archivo) values('".$c9."','".$_GET['c']."','".$e1."')";  
 $link->query($csqle1);
}

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
$e1 = "N_A";
}
if($e2!="N_A"){
$csqle2 = "insert into images_s(cve_cotizacion,cve_servicio,archivo) values('".$c9."','".$_GET['c']."','".$e2."')";  
  $link->query($csqle2);
}

/////////////

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
$csqle3 = "insert into images_s(cve_cotizacion,cve_servicio,archivo) values('".$c9."','".$_GET['c']."','".$e3."')";  
  $link->query($csqle3);
}

/////////////////

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
$csqle4 = "insert into images_s(cve_cotizacion,cve_servicio,archivo) values('".$c9."','".$_GET['c']."','".$e4."')";  
 $link->query($csqle4);
}


///////////////////////  Fin images  /////////////////////////


    */
           ?>
    <script language="JavaScript" type="text/javascript">
    location.href='tareas.php?cs=1&c=<?php echo $_POST['cla']; ?>"&abrir=2';
    </script>
    <?php		   
         }

         ?>
         
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


<div class="row">
    <div class="col-md-12">
<form id="formn" name="formn" action="tareas.php?edit=1&nc=1&c=<? echo $_GET['c']; ?>" method="post" enctype="multipart/form-data" >

<input id="cuenta" name="cuenta" type="hidden" value="0">
	<input id="cuenta2" name="cuenta2" type="hidden" value="1">
	<input id="cuenta3" name="cuenta3" type="hidden" value="1">
  <input name="total_v" id="total_v" type="hidden"/> 
<input id="agregados" name="agregados" type="hidden">

<?

	$query = "SELECT * from cotizacion2 where clave='".$_GET['c']."'";
  $result = $link->query($query);
	$row=mysqli_fetch_row($result);
?>
<input type="hidden" name="cla" id="cla" value="<? echo $_GET['c']; ?>">

<div class="col-md-12" style="width: 100%; overflow: hidden;">
<div class="form-group col-md-3">
            <label>Origen</label>
               <input  name="origen" id="origen"  style="text-transform: uppercase;" class="form-control" type="text"  autocomplete="off" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['origen']; ?>"  <?  }else{ ?>  value="<? echo $row[2]; ?>" <? } ?> >
              </div>

              <div  class="form-group col-md-3">
            <label>Destino</label>
               <input name="destino" id="destino" style="text-transform: uppercase;" class="form-control" type="text" autocomplete="off" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['destino']; ?>"  <?  }else{ ?>  value="<? echo $row[3]; ?>"  <? } ?> onChange="javascript: buscarkm();"  >
              </div>
<div  class="form-group col-md-3" >
            <label>Cliente</label>
               <input name="cliente" id="cliente" autocomplete="off"  style="text-transform: uppercase;" class="form-control" type="text" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['cliente']; ?>"  <?  }else{ ?>  value="<? echo $row[1]; ?>" <? } ?>>
              </div>
              <div  class="form-group col-md-3">
                  <label>TELEFONO:</label>
                   <input name="telefono" id="telefono" placeholder=""  style="text-transform: uppercase;" class="form-control" type="text"  <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['telefono']; ?>"  <?  }else{ ?>  value="<? echo $row[24]; ?>" <? } ?>  >
                </div>

                <!--<div class="form-group" style="height: 92px;">
                  <label>WHATSAPP:</label>
                   <input name="whatsapp" id="whatsapp" placeholder=""  style="text-transform: uppercase;" class="form-control" type="text"  <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['whatsapp']; ?>"  <?  }else{ ?>  value="<? echo $row[60]; ?>" <? } ?>  >
                </div>
              -->
              <? /*
<div class="form-group" style="width: 100px;">
            <label>KM</label>
               <input name="km" id="km"  style="text-transform: uppercase;" class="form-control" type="text" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['km']; ?>"  <?  }else{ ?>  value="<? echo $row[10]; ?>" <? } ?>onkeypress="return valida(event)" >
              </div>
*/ ?>
              <div  class="form-group col-md-3">
            <label>M3</label>
               <input name="m3" id="m3"  style="text-transform: uppercase;" class="form-control" type="text" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['m3']; ?>"  <?  }else{ ?>  value="<? echo $row[11]; ?>" <? } ?> onkeypress="return valida(event)" >
              </div>

             
<? /*

              <div class="form-group">
                  <label>Tiempo Estimado:</label>
                   <input name="testimado" id="testimado"  style="text-transform: uppercase;" class="form-control" type="text"  <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['testimado']; ?>"  <?  }else{ ?>  value="<? echo $row[22]; ?>" <? } ?>  >
                </div>
                <div class="form-group">
                  <label>CORREO ELECTRONICO:</label>
                   <input name="email" id="email"  style="text-transform: uppercase;" class="form-control" type="text"  <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['email']; ?>"  <?  }else{ ?>  value="<? echo $row[23]; ?>" <? } ?>  >
                </div> */ ?>
                

                  <div  class="form-group col-md-3">
            <label>Tipo Mudanza</label>
              <select class="form-control select2" style="width: 100%; text-transform: uppercase;"  name="tipo_mudanza" id="tipo_mudanza"  onChange="changeTipoServ(this.value)">
                  <option value="--">--</option>
                 <option <? if($_POST['tipo_mudanza']=='Vehiculo'){ ?> selected <? } ?> <? if($row[4]=='Vehiculo'){ ?> selected <? } ?> value="Vehiculo">Vehiculo</option>
                   <option <? if($_POST['tipo_mudanza']=='Local'){ ?> selected <? } ?> <? if($row[4]=='Local'){ ?> selected <? } ?> value="Local">Local</option>
                   <option <? if($_POST['tipo_mudanza']=='Moto'){ ?> selected <? } ?> <? if($row[4]=='Moto'){ ?> selected <? } ?> value="Moto">Moto</option>
                  <option <? if($_POST['tipo_mudanza']=='Auto con Mudanza'){ ?> selected <? } ?> <? if($row[4]=='Auto con Mudanza'){ ?> selected <? } ?> value="Auto con Mudanza">Auto con Mudanza</option>
                  <option <? if($_POST['tipo_mudanza']=='Compartido'){ ?> selected <? } ?> <? if($row[4]=='Compartido'){ ?> selected <? } ?> value="Compartido">Compartido</option>
        <option <? if($_POST['tipo_mudanza']=='Exclusivo'){ ?> selected <? } ?> <? if($row[4]=='Exclusivo'){ ?> selected <? } ?> value="Exclusivo">Exclusivo</option>
        <option <? if($_POST['tipo_mudanza']=='Maniobras'){ ?> selected <? } ?> <? if($row[4]=='Maniobras'){ ?> selected <? } ?> value="Maniobras">Maniobras</option>
        <option <? if($_POST['tipo_mudanza']=='Flete'){ ?> selected <? } ?> <? if($row[4]=='Flete'){ ?> selected <? } ?> value="Flete">Flete</option>
        <option <? if($_POST['tipo_mudanza']=='Paqueteria'){ ?> selected <? } ?> <? if($row[4]=='Paqueteria'){ ?> selected <? } ?> value="Paqueteria">Paqueteria</option>
                    <option <? if($_POST['tipo_mudanza']=='Exclusivo y Compartido'){ ?> selected <? } ?> <? if($row[4]=='Exclusivo y Compartido'){ ?> selected <? } ?> value="Exclusivo y Compartido">Exclusivo y Compartido</option>

<?php /*
                  <option <? if($_POST['tipo_mudanza']=='Vehiculo'){ ?> selected <? } ?> <? if($row[4]=='Vehiculo'){ ?> selected <? } ?> value="Vehiculo">Vehiculo</option>
                  <option <? if($_POST['tipo_mudanza']=='Moto'){ ?> selected <? } ?> <? if($row[4]=='Moto'){ ?> selected <? } ?> value="Moto">Moto</option>
                  <option <? if($_POST['tipo_mudanza']=='Auto con Mudanza'){ ?> selected <? } ?> <? if($row[4]=='Auto con Mudanza'){ ?> selected <? } ?> value="Auto con Mudanza">Auto con Mudanza</option>
                  <option <? if($_POST['tipo_mudanza']=='Compartido'){ ?> selected <? } ?> <? if($row[4]=='Compartido'){ ?> selected <? } ?> value="Compartido">Compartido</option>
        <option <? if($_POST['tipo_mudanza']=='Exclusivo'){ ?> selected <? } ?> <? if($row[4]=='Exclusivo'){ ?> selected <? } ?> value="Exclusivo">Exclusivo</option>
        <option <? if($_POST['tipo_mudanza']=='Flete'){ ?> selected <? } ?> <? if($row[4]=='Flete'){ ?> selected <? } ?> value="Flete">Flete</option>
        <option <? if($_POST['tipo_mudanza']=='Paqueteria'){ ?> selected <? } ?> <? if($row[4]=='Paqueteria'){ ?> selected <? } ?> value="Paqueteria">Paqueteria</option>
        <option <? if($_POST['tipo_mudanza']=='Exclusivo y Compartido'){ ?> selected <? } ?> <? if($row[4]=='Exclusivo y Compartido'){ ?> selected <? } ?> value="Exclusivo y Compartido">Exclusivo y Compartido</option>

        */ ?>
        </select>
              </div>


              <div  class="form-group col-md-3">
            <label>Modalidad</label>
              <select class="form-control select2" style="width: 100%; text-transform: uppercase;"  name="modalidad" id="modalidad" >
                  <option value="--">--</option>
                  <option <? if($_POST['modalidad']=='EXCLUSIVA/ UNDAD SOLO PARA EL CLIENTE'){ ?> selected <? } ?> <? if($row[102]=='EXCLUSIVA/ UNDAD SOLO PARA EL CLIENTE'){ ?> selected <? } ?> value="EXCLUSIVA/ UNDAD SOLO PARA EL CLIENTE">EXCLUSIVA/ UNDAD SOLO PARA EL CLIENTE</option>
                  <option <? if($_POST['modalidad']=='Mudanza'){ ?> selected <? } ?> <? if($row[102]=='Mudanza'){ ?> selected <? } ?> value="Mudanza">Mudanza</option>
                  <option <? if($_POST['modalidad']=='Auto'){ ?> selected <? } ?> <? if($row[102]=='Auto'){ ?> selected <? } ?> value="Auto">Auto</option>
                  <option <? if($_POST['modalidad']=='Flete'){ ?> selected <? } ?> <? if($row[102]=='Flete'){ ?> selected <? } ?> value="Flete">Flete</option>
                </select>
              </div>


<div id="divve" <? if($row[4]!='Vehiculo'){ ?> style="display: none;" <? } ?>>
            
            <div  class="form-group col-md-3" >

            <label>Marca</label>
               <input name="marca" id="marca"  style="text-transform: uppercase;" class="form-control" type="text" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['marca']; ?>"  <?  }else{ ?>  value="<? echo $row[28]; ?>" <? } ?> >
              </div>
              <div  class="form-group col-md-3" >

            <label>Modelo</label>
               <input name="modelo" id="modelo"  style="text-transform: uppercase;" class="form-control" type="text" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['modelo']; ?>"  <?  }else{ ?>  value="<? echo $row[29]; ?>" <? } ?> >
              </div>
              <div  class="form-group col-md-3">

            <label>Tipo de Auto</label>
               <input name="tipo" id="tipo"  style="text-transform: uppercase;" class="form-control" type="text" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['tipo']; ?>"  <?  }else{ ?>  value="<? echo $row[30]; ?>" <? } ?> >
              </div>
            




</div>

<div  class="form-group col-md-3">
                  <label>FECHA DEL SERVICIO</label>
                        <div class="input-group">
                          <input  class="form-control" autocomplete="off"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask maxlength="10" type="text" name="fecha_s" id="datepicker" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['fecha_s']; ?>"  <?  }else{ ?>  value="<? echo substr($row[45],8,2).'/'.substr($row[45],5,2).'/'.substr($row[45],0,4); ?>" <? } ?>>
                    </div>
                </div>
<!--<div class="form-group col-md-3"  >
                  <label>FECHA APROXIMADA DEL SERVICIO</label>
                          <input  class="form-control" autocomplete="off"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask maxlength="10" type="text" name="fecha_aprox" id="fecha_aprox" value="<?php  echo $_POST['fecha_aprox']; ?>">
                   
                </div>
-->

<div class="form-group col-md-3" >
                  <label>TIEMPO DE ENTREGA</label>
                          <input  class="form-control" autocomplete="off"   type="text" name="tiempo_e" id="tiempo_e" value="<? echo $row[59]; ?>">
              
                </div>

              <div class="form-group col-md-3" >
            <label>Costo Cliente</label>
             
    <input type="text" name="costo"  onkeypress="return valida(event)" class="form-control" value="<?php if(isset($_POST['costo'])){ echo $_POST['costo']; }else{ echo $row[5]; } ?>">
              </div>

<!--
                 <div class="form-group col-md-3">
                  <label>HORA DEL SERVICIO</label>
                  <input type="text" name="hora_s"  class="form-control" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['hora_s']; ?>"  <?  }else{ ?>  value="<? echo $row[46]; ?>" <? } ?>>
                </div>

-->
                <?php /*
                 <div class="form-group col-md-3">
                  <label>Costo Cliente:</label>
                   <input name="costo" id="costo"  style="text-transform: uppercase;" class="form-control" type="text" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['costo']; ?>"  <?  }else{ ?>  value="<? echo $row[5]; ?>" <? } ?>  >
                </div>

                */ ?>
                <!--
                <div class="form-group col-md-3">
                  <label>Costo Proveedor:</label>
                   <input name="costo2" id="costo2"  style="text-transform: uppercase;" class="form-control" type="text" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['costo2']; ?>"  <?  }else{ ?>  value="<? echo $row[26]; ?>" <? } ?>  >
                </div>


<div class="form-group col-md-3">
               <label>PROVEEDOR 1</label>
               
               <select class="form-control select2" id="proveedor1" name="proveedor1">
                  <option value="--">--</option>
                   
                  <?
  $queryp = "select * FROM proveedores";
  $resultp = $link->query($queryp);
while ($rowp = mysqli_fetch_row($resultp)){
  ?>

<option <? if($rowp[0]==$row[42]){ ?> selected <? } ?> value="<? echo $rowp[0]; ?>"><? echo htmlentities($rowp[1]).' '.htmlentities($rowp[2]).' - '.$rowp[6] ; ?></option>
<? } ?>

                </select>
              </div>
              <div  class="form-group col-md-3">
               <label>PROVEEDOR 2</label>
               
               <select class="form-control select2" id="proveedor2" name="proveedor2">
                  <option value="--">--</option>
                   
                  <?
  $queryp = "select * FROM proveedores";
    $resultp = $link->query($queryp);
while ($rowp = mysqli_fetch_row($resultp)){
  ?>

<option <? if($rowp[0]==$row[43]){ ?> selected <? } ?> value="<? echo $rowp[0]; ?>"><? echo htmlentities($rowp[1]).' '.htmlentities($rowp[2]).' - '.$rowp[6] ; ?></option>
<? } ?>

                </select>
              </div>
              <div class="form-group col-md-3">
               <label>PROVEEDOR 3</label>
               
               <select class="form-control select2" id="proveedor3" name="proveedor3">
                  <option value="--">--</option>
                   
                  <?
  $queryp = "select * FROM proveedores";
    $resultp = $link->query($queryp);
while ($rowp = mysqli_fetch_row($resultp)){
  ?>

<option <? if($rowp[0]==$row[44]){ ?> selected <? } ?> value="<? echo $rowp[0]; ?>"><? echo htmlentities($rowp[1]).' '.htmlentities($rowp[2]).' - '.$rowp[6] ; ?></option>
<? } ?>

                </select>
              </div>
-->

<!--

<div class="form-group col-md-3" >
            <label>Empaque a Granel</label>
               <input name="empaque_g" id="empaque_g"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="No. Cajas" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['empaque_g']; ?>"  <?  }else{ ?>  value="<? echo $row[32]; ?>" <? } ?> >
              </div>
              
              <div class="form-group col-md-3">
            <label>Empaque Profecional</label>
               <input name="empaque_p" id="empaque_p"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="$$$" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['empaque_p']; ?>"  <?  }else{ ?>  value="<? echo $row[33]; ?>" <? } ?> >
              </div>
              <div class="form-group col-md-3">
            <label>Emplaye Total</label>
               <input name="emplaye_t" id="emplaye_t"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="No. Rollos" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['emplaye_t']; ?>"  <?  }else{ ?>  value="<? echo $row[34]; ?>" <? } ?> >
              </div>
              <div class="form-group col-md-3" >
            <label>Desempaque</label>
               <input name="desempaque" id="desempaque"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="No. Cajas" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['desempaque']; ?>"  <?  }else{ ?>  value="<? echo $row[35]; ?>" <? } ?> >
              </div>
              <div  class="form-group col-md-3" >
            <label>Caja Closet</label>
               <input name="caja_closet" id="caja_closet"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="No. Cajas" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['caja_closet']; ?>"  <?  }else{ ?>  value="<? echo $row[36]; ?>" <? } ?> >
              </div>
              <div class="form-group col-md-3" >
            <label>Supervision Sencilla</label>
               <input name="supervision_s" id="supervision_s"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="M3" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['supervision_s']; ?>"  <?  }else{ ?>  value="<? echo $row[37]; ?>" <? } ?> >
              </div>
              
<div class="form-group col-md-3" >
            <label>Supervision por servicio</label>
               <input name="supervision_ps" id="supervision_ps"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['supervision_ps']; ?>"  <?  }else{ ?>  value="<? echo $row[38]; ?>" <? } ?> >
              </div>
              
            <div class="form-group col-md-3">
            <label>Maniobras Carga</label>
               <input name="maniobras_c" id="maniobras_c"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['maniobras_c']; ?>"  <?  }else{ ?>  value="<? echo $row[39]; ?>" <? } ?> >
              </div>
              <div class="form-group col-md-3" >
            <label>Maniobras Descarga</label>
               <input name="maniobras_d" id="maniobras_d"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['maniobras_d']; ?>"  <?  }else{ ?>  value="<? echo $row[40]; ?>" <? } ?> >
              </div>
              
    <div class="form-group col-md-3">
      <label>Seguro</label>
      <input name="sseguro" id="sseguro"  style="text-transform: uppercase;" placeholder="Valor Declarado"  class="form-control" type="text" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['sseguro']; ?>"  <?  }else{ ?>  value="<? echo $row[19]; ?>" <? } ?> >
      </div>

              <div class="form-group col-md-3" >
            <label>Porcentaje Seguro</label>
               <input name="pcseguro" id="pcseguro"  placeholder="0.0" style="text-transform: uppercase;" class="form-control" type="text" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['pcseguro']; ?>"  <?  }else{ ?>  value="<? echo $row[27]; ?>" <? } ?> >
              </div>

<div class="form-group col-md-3" >
            <label>Permiso de Transito</label>
               <input name="permiso_t" id="permiso_t"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="$$$" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['permiso_t']; ?>"  <?  }else{ ?>  value="<? echo $row[41]; ?>" <? } ?> >
              </div>

-->

<?php /*
              <div class="form-group col-md-3" >
            <label>Ruta</label>
              <select class="form-control select2" style=" text-transform: uppercase;"  name="ruta" id="ruta" >
         <option value="--">--</option>
                   <option <? if($row[47]=='México – Tijuana'){ ?> selected <? } ?> value="México – Tijuana">México – Tijuana</option>
                   <option <? if($row[47]=='México-Cancún'){ ?> selected <? } ?> value="México-Cancún">México-Cancún</option>
                   <option <? if($row[47]=='Cd Mx-GDL'){ ?> selected <? } ?> value="Cd Mx-GDL">Cd Mx-GDL</option>
                   <option <? if($row[47]=='México – Monterrey'){ ?> selected <? } ?> value="México – Monterrey">México – Monterrey</option>
                   <option <? if($row[47]=='GDL - TIJUANA'){ ?> selected <? } ?> value="GDL - TIJUANA">GDL - TIJUANA</option>
                  </select>
              </div>

<div class="form-group col-md-3">
<label>Metodo de Pago</label>
   <input name="metodo_p" id="metodo_p"  style="text-transform: uppercase;" class="form-control" type="text" value="<? echo $row[48]; ?>" >
  </div>

  <div class="form-group col-md-3" >
            <label>Medio por el que se entero</label>
              <select class="form-control select2" style=" text-transform: uppercase;"  name="medio" id="medio" onChange="cambioMedio(this.value)" >
         
         <option value="<?php echo $row[49]; ?>"><?php echo $row[49]; ?></option>
                   <option  value="FB">FB</option>
                   <option  value="Mudanzas Mx">Mudanzas Mx</option>
                   <option  value="Recomendación">Recomendación</option>
                   <option value="Otro">Otro</option>
                    </select>
              </div>

              <div  class="form-group col-md-3" style=" display:none;" id="otro_medio" >
<label>Otro Medio</label>
   <input name="otro_m" id="otro_m"  style="text-transform: uppercase;" class="form-control" type="text"  >
  </div>

      <div  class="form-group col-md-3">
            <label>Requiere Factura?</label>
              <select class="form-control select2" style=" text-transform: uppercase;"  name="factura" id="factura" >
         <option value="--">--</option>
                   <option <? if($row[50]=='SI'){ ?> selected <? } ?> value="SI">SI</option>
                   <option <? if($row[50]=='NO'){ ?> selected <? } ?> value="NO">NO</option>
                   
                    </select>
              </div>

             <!--

  <div class="form-group" style="height: 92px;" >
<label>Presupuesto Maximo</label>
   <input name="presupuesto" id="presupuesto"  style="text-transform: uppercase;" class="form-control" type="text" value="<? echo $row[51]; ?>" >
  </div>
-->
  <div  class="form-group col-md-3" >
<label>Niveles de la Casa</label>
   <input name="niveles" id="niveles"  style="text-transform: uppercase;" class="form-control" type="text" value="<? echo $row[52]; ?>" >
  </div>
 */ ?>

<!--
  <div class="form-group" style="height: 92px;" >
            <label>Puede descargar a pie de casa?</label>
              <select class="form-control select2" style=" text-transform: uppercase;"  name="pie_casa" id="pie_casa" >
         <option value="--">--</option>
                   <option <? if($row[53]=='SI'){ ?> selected <? } ?> value="SI">SI</option>
                   <option <? if($row[53]=='NO'){ ?> selected <? } ?> value="NO">NO</option>
                   
                    </select>
  </div>     

  <div class="form-group" style="height: 92px;" >
<label>Articulo de Valor</label>
   <input name="articulo_v" id="articulo_v"  style="text-transform: uppercase;" class="form-control" type="text" value="<? echo $row[54]; ?>" >
  </div>

  <div class="form-group" style="height: 92px;" >
<label>Complejidad de Maniobra</label>
   <input name="complejidad" id="complejidad"  style="text-transform: uppercase;" class="form-control" type="text" value="<? echo $row[55]; ?>" >
  </div>

                <div class="form-group" style="height: 92px;">
                  <label>FECHA APROXIMADA DEL SERVICIO</label>
                        <div class="input-group">
                          <input  class="form-control" autocomplete="off"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask maxlength="10" type="text" name="fecha_aprox" id="fecha_aprox" value="<? echo substr($row[61],8,2).'/'.substr($row[61],5,2).'/'.substr($row[61],0,4); ?>">
                    </div>
                </div>
-->
         
         <?php /*

  <div  class="form-group col-md-3">
<label>Tiempo estimado de entrega</label>
   <input name="tiempo_estimado" id="tiempo_estimado"  style="text-transform: uppercase;" class="form-control" type="text" value="<? echo $row[59]; ?>" >
  </div>

*/ ?>
                
<?php /*

                <div   id="agregadodiv" style="height: auto; overflow: scroll; width: 100%; "> </div>


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

    */ ?>

<?php if(isset($_POST['mercancia'])){
  //echo 'aqui merca';
  /*
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
    
  
           


<div class="form-group" style="width:15%; float: left; padding: 5px;">
<label>&nbsp;</label>
<input type="button" name="agregar" id="agregar" class="form-control" value="Agregar" onClick="agregars();" type="text">
</div>

<?php */ } ?>

</div>

<div class="col-md-12" style=" overflow: hidden;">
<?php 
/*
    $querym = "SELECT count(id) from muebles_s where cve_cotizacion='".$row[9]."'";
    $resultm = $link->query($querym);
    $rowm=mysqli_fetch_row($resultm);
		if($rowm[0]==0){*/ ?>
<div class="form-group" id="lista_muebles" <? if($row[4]=='Vehiculo'){ ?> style="display: none;" <? } ?>>
                  <label>Lista de muebles:</label>
                  <textarea  id="muebles" name="muebles" class="form-control" rows="3" placeholder="muebles ..." style="text-transform: uppercase;" ><? if(isset($_POST['borrador'])){  echo str_replace('<br />','',$_POST['muebles']);  }else{  echo str_replace('<br />','',$row[7]); } ?></textarea>
                </div>


                <div class="form-group col-md-4" >
                  <label>INCLUYE 1</label>
                          <input  class="form-control" autocomplete="off"   type="text" name="incluye_1" id="incluye_1"  value="<?php if(isset($_POST['incluye_1'])){ echo $_POST['incluye_1']; }else{  echo $row[32];  } ?>">
                </div>
                <div class="form-group col-md-4" >
                  <label>INCLUYE 2</label>
                          <input  class="form-control" autocomplete="off"   type="text" name="incluye_2" id="incluye_2"  value="<?php if(isset($_POST['incluye_2'])){ echo $_POST['incluye_2']; }else{  echo $row[32];  } ?>">
                </div>
                <div class="form-group col-md-4" >
                  <label>INCLUYE 3</label>
                          <input  class="form-control" autocomplete="off"   type="text" name="incluye_3" id="incluye_3"  value="<?php if(isset($_POST['incluye_3'])){ echo $_POST['incluye_3']; }else{  echo $row[32];  } ?>">
                </div>

                <div class="form-group col-md-4" >
                  <label>NO INCLUYE 1</label>
                          <input  class="form-control" autocomplete="off"   type="text" name="no_incluye_1" id="no_incluye_1"  value="<?php if(isset($_POST['no_incluye_1'])){ echo $_POST['no_incluye_1'];  }else{  echo $row[32];  } ?>">
                </div>
                <div class="form-group col-md-4" >
                  <label>NO INCLUYE 2</label>
                          <input  class="form-control" autocomplete="off"   type="text" name="no_incluye_2" id="no_incluye_2"  value="<?php if(isset($_POST['no_incluye_2'])){ echo $_POST['no_incluye_2'];   }else{  echo $row[32];  } ?>">
                </div>
                <div class="form-group col-md-4" >
                  <label>NO INCLUYE 3</label>
                          <input  class="form-control" autocomplete="off"   type="text" name="no_incluye_3" id="no_incluye_3"  value="<?php if(isset($_POST['no_incluye_3'])){ echo $_POST['no_incluye_3'];   }else{  echo $row[32];  } ?>">
                </div>



<?php //} ?>

<?php /*
                <div class="form-group" id="lista_muebles">
                  <label>Comentarios</label>
                  <textarea  id="comentarios" name="comentarios" class="form-control" rows="3" placeholder="comentarios ..." style="text-transform: uppercase;" ><? echo str_replace('<br />','',$row[56]); ?></textarea>
                </div>
*/ ?>
<!--

                <div class="form-group" style=" float: left; padding: 5px; ">
             <label>Imagenes</label>
              <input name="img1" id="img1" class="form-control" type="file"><br>
              <input name="img2" id="img2" class="form-control" type="file"><br>
              
    </div>
    <div class="form-group" style=" float: left; padding: 5px; ">
             <label>Imagenes</label>
              <input name="img3" id="img3" class="form-control" type="file"><br>
              <input name="img4" id="img4" class="form-control" type="file"><br>
              
    </div>

  -->


</div>

   <div class="box-footer">
   <button type="submit" class="btn btn-primary"  name="editarcotizacion" id="editarcotizacion">Guardar Cotización</button>
               <!-- <button type="submit" class="btn btn-primary"  name="borrador" id="borrador">Generar Borrador</button>-->
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

<img  src="archivos/<?php echo $rowm[3]; ?>" style="width:100%">
</div>
<?php } ?>
                    </div>


</div>
<script> // alert("aqui"); </script>

              </form>
            </div>
          </div>
        </div>

          </div>

<script> // alert("aqui"); </script>
<script type="text/javascript">


<?php /*
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

<?php  if(isset($_GET['eddt'])){
  
  
                    $querym = "SELECT * from muebles_s where cve_cotizacion='".$row[9]."'";
                    $cc=0;
                      $resultm = $link->query($querym);
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


var cade="<table   class='table table-head-fixed text-nowrap'><tr><td style='padding:5px;'><strong>Mercancia</strong></td><td style='padding:5px;'><strong>Alto</strong></td><td style='padding:5px;'><strong>Ancho</strong></td><td style='padding:5px;'><strong>Profundidad</strong></td><td style='padding:5px;'><strong>Peso</strong></td><td style='padding:5px;'><strong>Cantidad</strong></td><td style='padding:5px;'></td></tr>";
var m3=0.0;
for(var i=1; i<=c; i++){
if(datos[i][1]!= undefined){
  var al = parseFloat(datos[i][2].replace("|", "")) / 100;
  var an = parseFloat(datos[i][3].replace("|", "")) / 100;
  var pr = parseFloat(datos[i][4].replace("|", "")) / 100;
  m3=m3+((al*an*pr)*parseFloat(datos[i][6].replace("|", "")));
document.getElementById("m3").value=Math.round(m3* 100) / 100;
    cade = cade +  "<tr><td style='padding:5px;'><strong>"+datos[i][1].replace("|", "")+"</strong></td><td style='padding:5px;'>"+datos[i][2].replace("|", "")+" cm</td><td style='padding:5px;'>"+datos[i][3].replace("|", "")+" cm</td><td style='padding:5px;'>"+datos[i][4].replace("|", "")+" cm</td><td style='padding:5px;'>"+datos[i][5].replace("|", "")+" kg</td><td style='padding:5px;'><strong>"+datos[i][6].replace("|", "")+"</strong></td><td style='padding:5px;'><a onClick='javascript:desagregar("+i+")' href='#agregadodiv'>Eliminar</a></td></tr>";
}
}
cade= cade + "</table>";

//alert(c);
document.getElementById("cuenta").value=c;
document.getElementById("agregados").value=datos.join("||");
document.getElementById("agregadodiv").innerHTML=cade;

<?php } ?>

<?php  if(isset($regre) || isset($_POST['mercancia'])){
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

*/ ?>


</script>


<script type="text/javascript">

function changeTipoServ(v){
  //alert(v);
}

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