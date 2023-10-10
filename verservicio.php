

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




<?php

if(isset($_POST['guardarcambios'])){

$corr=0;
$cade="";
if($_POST['cliente']==''){
$corr=1;
$cade=$cade."Falta CLiente \\n";
}
if($_POST['origen']==''){
$corr=1;
$cade=$cade."Falta Origen \\n";
}
if($_POST['m3']==''){
$corr=1;
$cade=$cade."Falta M3 \\n";
}

if($_POST['proveedor']==''){
$corr=1;
$cade=$cade."Falta Proveedor \\n";
}
if($_POST['cproveedor1']==''){
$corr=1;
$cade=$cade."Falta Costo Proveedor \\n";
}
if($_POST['costocliente']==''){
$corr=1;
$cade=$cade."Falta Costo Cliente \\n";
}

if($_POST['lista_m']==''){
$corr=1;
$cade=$cade."Falta Lista Muebles \\n";
}
if($_POST['quien_vendio']==''){
$corr=1;
$cade=$cade."Falta Quien Vendio \\n";
}



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
//$campo18=nl2br($_POST['observaciones']);
$campo18='';
$campo19=$_POST['proveedor'];
//$campo20=$_POST['favor_llevar'];
$campo20='';
$campo21=$_POST['costot1'];
$campo22=$_POST['costot2'];
$campo23=$_POST['costote'];
$campo24=nl2br($_POST['lista_m']);
$campo24=str_replace("'","\'",$campo24);
$campo25=$_POST['tiposs'];
$campo26=$_POST['costocliente'];
//$campo27=$_POST['costoproveedor'];
$campo28=$_POST['m3'];
$campo29=$_POST['ciudad_c'];
$campo30=$_POST['ciudad_d'];
$campo31=$_POST['dias_a'];
//$campo32=$_POST['faltante_cliente'];
$campo32='';
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

/*
      $c44=$_POST['empaque_g'];
      $c45=$_POST['empaque_p'];
      $c46=$_POST['emplaye_t'];
      $c47=$_POST['desempaque'];
      $c48=$_POST['caja_closet'];
      $c49=$_POST['supervision_s'];
      $c50=$_POST['supervision_ps'];
      $c51=$_POST['maniobras_c'];
      $c52=$_POST['maniobras_d'];
*/
      $c44='';
      $c45='';
      $c46='';
      $c47='';
      $c48='';
      $c49='';
      $c50='';
      $c51='';
      $c52='';

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
      //$c79=nl2br($_POST['adicionales']);
      $c79='';
      //$c80=$_POST['categoria_s'];
      $c80='';
      $c81=$_POST['modalidad'];


      $c82=$_POST['tipo_moneda'];
     /* $c83=$_POST['tarjeta'];
      $c84=$_POST['banco'];
      $c85=$_POST['titular'];
      $c86=$_POST['fecha_exp'];
      $c87=$_POST['cod_seg'];*/

      $c83=$_POST['proveedor2'];
      $c84=$_POST['proveedor3'];

      $c85=$_POST['cproveedor1'];
      $c86=$_POST['cproveedor2'];
      $c87=$_POST['cproveedor3'];
      $campo27= $c85 + $c86 + $c87;


      $c88=$_POST['srfc'];
      $c89=$_POST['srazon_social'];
      $c90=$_POST['semail'];
      $c91=$_POST['local'];
      $c92=$_POST['seguro_prov'];
      $c93=$_POST['seguro_clie'];
      $c94=$_POST['total_seguros'];

      $c95=$_POST['incluir_s'];
      $c96=$_POST['quien_vendio'];

      if($campo42>50000){
                $segpro= $campo42 * ($campo43/100);
            }else{
                $segpro= 580;
            }

$csql="delete from articulos_desl where cve_servicio='".$campo0."'";
$link->query($csql);    
$lista_arr=explode( '<br />',$campo24);
$cue_list=count($lista_arr);
for($i=0; $i<$cue_list; $i++){
$cadc='check_list'.$i;
if($_POST[$cadc]=='on'){
$csql="insert into articulos_desl(cve_servicio,articulo) values('".$campo0."','".$lista_arr[$i]."')";
$link->query($csql);
}

} 



$c97=$_POST['unidad'];
$c98=$_POST['desgaste'];
$c99=$_POST['combustible'];
$c100=$_POST['cuota'];

$c101=$_POST['casetas'];
$c102=$_POST['playo'];
$c103=$_POST['comision_m3'];

$c104=$_POST['ahorro'];
$c105=$_POST['fondo'];
$c106=$_POST['empresa'];

$c107=$_POST['seguro_i'];

$c108=$_POST['telefono2'];


if($corr!=1){

$csql = "update servicio set fecha_s='".$campo1."',hora_s='".$campo2."',calle_no_c='".$campo4."',colonia_c='".$campo5."',referencia_c='".$campo6."',nom_c='".$campo7."',tel_c='".$campo8."',calle_no_d='".$campo9."',colonia_d='".$campo10."',referencia_d='".$campo11."',nom_d='".$campo12."',tel_d='".$campo13."',anticipo='".$campo14."',a_la_carga='".$campo15."',antes_de_la_carga='".$campo16."',forma_de_pago='".$campo17."',tiempo_entrega_aprox='".$campo3."',observaciones='".$campo18."',proveedor='".$campo19."',favorllevar='".$campo20."',costo='".$campo21."',costo2='".$campo22."',extras='".$campo23."',muebles='".$campo24."',tipo_mudanza='".$campo25."',costocliente='".$campo26."',costoproveedor='".$campo27."',m3='".$campo28."',ciudad_c='".$campo29."',ciudad_d='".$campo30."',dias='".$campo31."',falta_pagar='".$campo32."',cliente='".$campo33."',origen='".$campo34."',destino='".$campo35."',email='".$campo36."',telefono='".$campo37."',p1='".$campo39."',p2='".$campo40."',p3='".$campo41."',seguro='".$campo42."',pc_seguro='".$campo43."',empaque_g='".$c44."',empaque_p='".$c45."',emplaye_t='".$c46."',desempaque='".$c47."',caja_closet='".$c48."',supervision_s='".$c49."',supervision_ps='".$c50."',maniobras_c='".$c51."',maniobras_d='".$c52."',permiso_t='".$c53."',gruas='".$c54."',ruta='".$c55."',metodo_p='".$c56."',medio='".$c57."',factura='".$c58."',presupuesto='".$c59."',niveles='".$c60."',pie_casa='".$c61."',articulo_v='".$c62."',complejidad='".$c63."',comentarios='".$c64."',sr='".$c65."',codpostal_c='".$c66."',estado_c='".$c67."',codpostal_d='".$c68."',estado_d='".$c69."',ine_ine='".$c70."',ine_calle='".$c71."',ine_colonia='".$c72."',ine_ciudad='".$c73."',ine_estado='".$c74."',ine_cp='".$c75."',ine_cel='".$c76."',ine_email='".$c77."',fuente_i='".$c78."',adicionales='".$c79."',categoria_s='".$c80."',modalidad='".$c81."',tipo_moneda='".$c82."',proveedor2='".$c83."',proveedor3='".$c84."',cproveedor1='".$c85."',cproveedor2='".$c86."',cproveedor3='".$c87."',srfc='".$c88."',srazon_social='".$c89."',semail='".$c90."',local='".$c91."',seguro_prov='".$c92."' ,cscliente='".$c93."' ,totalseguros='".$c94."',incluir_s=".$c95.",quien_vendio='".$c96."',unidad='".$c97."',desgaste='".$c98."',combustible='".$c99."',cuota='".$c100."' ,casetas='".$c101."',playo='".$c102."',comision_m3='".$c103."',ahorro='".$c104."',fondo='".$c105."',empresa='".$c106."',seguro_incluido='".$c107."',telefono2='".$c108."'  where clave='".$campo0."'";
 //echo $csql.'<br>';
$link->query($csql);

///////////////////////// Insertar Muebles ///////////////////
$g=$_POST['cuenta'];

/*
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

*/


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

///////////////////////  Fin images  /////////////////////////


?>
    <script type="text/javascript">
    location.href="tareas.php?verservicio=1&verserv=1&c=<? echo $campo0; ?>"; </script>
<?


}else{
  ?>
<script type="text/javascript">alert('<?php echo $cade; ?>');</script>
<?php
}


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
<script type="text/javascript"> 
location.href="tareas.php?verservicio=1&verserv=1&c=<? echo $_GET['c']; ?>"; </script>
<?
  }
  else{
?>
    <script type="text/javascript">
alert('<? echo $cade; ?>');
   //  location.href="tareas.php?verserv=1&c=<? echo $_GET['c']; ?>"; </script>
<?
  }


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

<h2>Folio: <?php echo $row[0]; ?></h2>
</div>

   <div class="col-md-12">

<div class="box-footer" style="width: 100%; overflow: hidden;">

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
               <input name="cliente" id="cliente" autocomplete="off"  style="text-transform: uppercase;" class="form-control" type="text" value="<?php if(isset($_POST['cliente'])){ echo $_POST['cliente']; }else{ echo $row[1]; } ?>">
              </div>

 
              <div class="form-group col-lg-3"  >
            <label>Origen</label>
               <input  name="origen" id="origen"  style="text-transform: uppercase;" class="form-control" type="text"  autocomplete="off" value="<?php if(isset($_POST['origen'])){ echo $_POST['origen']; }else{ echo $row[2]; } ?>" >
              </div>

              <div class="form-group col-lg-3" >
            <label>Destino</label>
               <input name="destino" id="destino" style="text-transform: uppercase;" class="form-control" type="text" autocomplete="off" value="<?php if(isset($_POST['destino'])){ echo $_POST['destino']; }else{ echo $row[3]; } ?>" >
              </div>
              <div class="form-group col-lg-2"  >
            <label>M3</label>
               <input name="m3" id="m3"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="M3" onkeypress="return valida(event)"  value="<?php if(isset($_POST['M3'])){ echo $_POST['M3']; }else{ echo $row[11]; } ?>"  >
              </div>
              <div class="form-group col-lg-2">
            <label>TELEFONO</label>
               <input name="telefono" id="telefono" style="text-transform: uppercase;" class="form-control" type="text" autocomplete="off" value="<?php if(isset($_POST['telefono'])){ echo $_POST['telefono']; }else{ echo $row[50]; } ?>" >
              </div>
              <div class="form-group col-lg-2">
            <label>TELEFONO 2</label>
               <input name="telefono2" id="telefono2" style="text-transform: uppercase;" class="form-control" type="text" autocomplete="off" value="<?php if(isset($_POST['telefono2'])){ echo $_POST['telefono2']; }else{ echo $row[153]; } ?>" >
              </div>
              <div class="form-group col-lg-3">
            <label>CORREO ELECTRONICO</label>
               <input name="email" id="email" style="text-transform: uppercase;" class="form-control" type="text" autocomplete="off" value="<?php if(isset($_POST['email'])){ echo $_POST['email']; }else{ echo $row[49]; } ?>" >
              </div>




  <div class="form-group col-lg-3"  >
            <label>Servicio</label>
              <select class="form-control select2" style=" text-transform: uppercase;"  name="local" id="local" >
                   <option <? if($row[135]=='LOCAL'){ ?> selected <? } ?> value="LOCAL">LOCAL</option>
                   <option <? if($row[135]=='FORANEO'){ ?> selected <? } ?> value="FORANEO">FORANEO</option>
                  </select>
              </div>




                <div class="form-group col-lg-12" id="lista_muebles">
                  <label>Comentarios</label>
                  
                  <textarea  id="comentarios" name="comentarios" class="form-control" rows="4" placeholder="comentarios ..." style="text-transform: uppercase;" ><?php if(isset($_POST['comentarios'])){ echo $_POST['comentarios']; }else{ echo str_replace('<br />','',$row[98]); } ?></textarea>
                </div>

</div>
<div class="box-footer" style="width: 100%; overflow: hidden;">
<? if($row[4]!='Vehiculo'){ ?>

<? }else{ ?>
<div class="form-group col-lg-3" >
            <label>Gruas</label>
               <input name="gruas" id="gruas"  style="text-transform: uppercase;" class="form-control" type="text" onkeypress="return valida(event)" <? if(isset($_POST['gruas'])){ ?> value="<? echo $_POST['gruas']; ?>"  <?  }else{ ?>  value="<? echo $row[86]; ?>" <? } ?> >
              </div>
<? } ?>

            
              

    <div class="form-group col-lg-2"  >
      <label>Monto Seg. Cli.</label>
      <input name="monto_s" id="monto_s"  style="text-transform: uppercase;" placeholder="Valor Declarado"  class="form-control" type="text" onkeypress="return valida(event)" <? if(isset($_POST['monto_s'])){ ?> value="<? echo $_POST['monto_s']; ?>"  <?  }else{ ?>  value="<? echo round($row[19],2); ?>" <? } ?> >
      </div>

      <?php 
if($row[154]!=''){
  $segclie=$row[19] * ($row[154]/100);
  $porc_s=$row[154];
}else{
if($row[19]>=1){
if($row[19]>50000){
    $segclie=$row[19] * 0.015;
    $porc_s=1.5;
}else{
    $segclie=750;
    $porc_s=0;
}
}else{
$segclie=0;
$porc_s='';
}

}
?>

      <div class="form-group col-lg-2"  >
      <label>Porcentaje Seg.</label>
      <input name="porcentaje_s" id="porcentaje_s"  style="text-transform: uppercase;" placeholder="0"  class="form-control" type="text" onkeypress="return valida(event)" <? if(isset($_POST['porcentaje_s'])){ ?> value="<? echo $_POST['porcentaje_s']; ?>"  <?  }else{ ?>  value="<? echo $porc_s; ?>" <? } ?> >
      </div>
           
              <div class="form-group col-lg-2"  >
            <label>Seguro Cliente</label>
           
            <p>$ <?php echo number_format($segclie,2); ?></p>
               <input name="seguro_clie" type="hidden"   value="<?php if(isset($_POST['seguro_clie'])){ echo $_POST['seguro_clie']; }else{ echo $segclie; } ?>"  >
              </div>

              <div class="form-group col-lg-2"  >
            <label>Seguro Proveedor</label>
            <?php 
            if($row[19]>=1){
            if($row[19]>50000){
                $segpro=$row[19] * 0.015;
            }else{
                $segpro=580;
            }
            }else{
            $segpro=0;
        }
            ?>
            <p>$ <?php echo number_format($segpro,2); ?></p>
               <input name="seguro_prov" type="hidden"   value="<?php if(isset($_POST['seguro_prov'])){ echo $_POST['seguro_prov']; }else{ echo $segpro; } ?>"  >
              </div>

            <div class="form-group col-lg-2"  >
            <label>Ganancia Seguro</label>
            <?php 
            $ganacias=$segclie-$segpro;
            ?>
            <p>$ <?php echo number_format($ganacias,2); ?></p>
               <input name="seguro_prov" type="hidden"   value="<?php if(isset($_POST['seguro_prov'])){ echo $_POST['seguro_prov']; }else{ echo $segpro; } ?>"  >
              </div>


<div class="form-group col-lg-3" >
            <label>Incluir Seguro</label>
            <select class="form-control select2" id="incluir_s" name="incluir_s" >
                  <option value="0">--</option>
                   <option <? if($_POST['incluir_s']=='1'){ ?> selected <? } ?> <? if($row[136]=='1'){ ?> selected <? } ?> value="1">Si</option>
                   <option <? if($_POST['incluir_s']=='2'){ ?> selected <? } ?> <? if($row[136]=='2'){ ?> selected <? } ?> value="2">No</option>
                  
                </select>
             
              </div>


</div>

<div class="box-footer" style="width: 100%; overflow: hidden;">

 <div class="form-group col-lg-3">
               <label>PROVEEDOR 1</label>
               
               <select class="form-control select2" id="proveedor" name="proveedor">
                  <option value="0">--</option>
                   
                  <?
  $queryp = "select * FROM proveedores";
  $resultp = $link->query($queryp);
while ($rowp = mysqli_fetch_row($resultp)){
  ?>

<option <? if($_POST['proveedor']==$rowp[0]){ ?> selected <? } ?><? if($rowp[0]==$row[40]){ ?> selected <? } ?> value="<? echo $rowp[0]; ?>"><? echo htmlentities($rowp[1]).' '.htmlentities($rowp[2]) ; ?></option>
<? } ?>

                </select>
              </div>

               <div class="form-group col-lg-3" >
               <label>PROVEEDOR 2</label>
               
               <select class="form-control select2" id="proveedor2" name="proveedor2">
                  <option value="0">--</option>
                   
                  <?
  $queryp = "select * FROM proveedores";
  $resultp = $link->query($queryp);
while ($rowp = mysqli_fetch_row($resultp)){
  ?>

<option <? if($_POST['proveedor2']==$rowp[0]){ ?> selected <? } ?><? if($rowp[0]==$row[87]){ ?> selected <? } ?> value="<? echo $rowp[0]; ?>"><? echo htmlentities($rowp[1]).' '.htmlentities($rowp[2]); ?></option>
<? } ?>

                </select>
              </div>
              
              <div class="form-group col-lg-3" >
               <label>PROVEEDOR 3</label>
               
               <select class="form-control select2" id="proveedor3" name="proveedor3">
                  <option value="0">--</option>
                   
                  <?
  $queryp = "select * FROM proveedores";
  $resultp = $link->query($queryp);
while ($rowp = mysqli_fetch_row($resultp)){
  ?>

<option <? if($_POST['proveedor3']==$rowp[0]){ ?> selected <? } ?><? if($rowp[0]==$row[88]){ ?> selected <? } ?> value="<? echo $rowp[0]; ?>"><? echo htmlentities($rowp[1]).' '.htmlentities($rowp[2]) ; ?></option>
<? } ?>

                </select>
              </div>
 <div class="form-group col-lg-3" >
            <label>Tipo Mudanza</label>
            <select class="form-control select2" id="tiposs" name="tiposs" onChange="changeTipoServ(this.value)">
                  <option value="--">--</option>
                   <option <? if($_POST['tiposs']=='Vehiculo'){ ?> selected <? } ?> <? if($row[4]=='Vehiculo'){ ?> selected <? } ?> value="Vehiculo">Vehiculo</option>
                   <option <? if($_POST['tiposs']=='Local'){ ?> selected <? } ?> <? if($row[4]=='Local'){ ?> selected <? } ?> value="Local">Local</option>
                   <option <? if($_POST['tiposs']=='Moto'){ ?> selected <? } ?> <? if($row[4]=='Moto'){ ?> selected <? } ?> value="Moto">Moto</option>
                  <option <? if($_POST['tiposs']=='Auto con Mudanza'){ ?> selected <? } ?> <? if($row[4]=='Auto con Mudanza'){ ?> selected <? } ?> value="Auto con Mudanza">Auto con Mudanza</option>
                  <option <? if($_POST['tiposs']=='Compartido'){ ?> selected <? } ?> <? if($row[4]=='Compartido'){ ?> selected <? } ?> value="Compartido">Compartido</option>
                  <option <? if($_POST['tiposs']=='Exclusivo'){ ?> selected <? } ?> <? if($row[4]=='Exclusivo'){ ?> selected <? } ?> value="Exclusivo">Exclusivo</option>
        <option <? if($_POST['tiposs']=='Maniobras'){ ?> selected <? } ?> <? if($row[4]=='Maniobras'){ ?> selected <? } ?> value="Maniobras">Maniobras</option>
        <option <? if($_POST['tiposs']=='Flete'){ ?> selected <? } ?> <? if($row[4]=='Flete'){ ?> selected <? } ?> value="Flete">Flete</option>
        <option <? if($_POST['tiposs']=='Paqueteria'){ ?> selected <? } ?> <? if($row[4]=='Paqueteria'){ ?> selected <? } ?> value="Paqueteria">Paqueteria</option>
                    <option <? if($_POST['tiposs']=='Exclusivo y Compartido'){ ?> selected <? } ?> <? if($row[4]=='Exclusivo y Compartido'){ ?> selected <? } ?> value="Exclusivo y Compartido">Exclusivo y Compartido</option>
                    <option <? if($_POST['tiposs']=='Directo'){ ?> selected <? } ?> <? if($row[4]=='Directo'){ ?> selected <? } ?> value="Directo">Directo</option>
                </select>
     
              </div>



<div class="form-group col-lg-3" >
               <label>COSTO PROVEEDOR 1</label>
    <input type="text" name="cproveedor1"  class="form-control" onkeypress="return valida(event)" value="<?php if(isset($_POST['cproveedor1'])){ echo $_POST['cproveedor1']; }else{ echo $row[129]; } ?>">
              </div>
              <div class="form-group col-lg-3" >
               <label>COSTO PROVEEDOR 2</label>
    <input type="text" name="cproveedor2"  class="form-control" onkeypress="return valida(event)" value="<?php if(isset($_POST['cproveedor2'])){ echo $_POST['cproveedor2']; }else{ echo $row[130]; } ?>">
              </div>
              <div class="form-group col-lg-3" >
               <label>COSTO PROVEEDOR 3</label>
    <input type="text" name="cproveedor3"  class="form-control" onkeypress="return valida(event)" value="<?php if(isset($_POST['cproveedor3'])){ echo $_POST['cproveedor3']; }else{ echo $row[131]; } ?>">
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
    <input type="text" name="costocliente"  onkeypress="return valida(event)" class="form-control" value="<?php if(isset($_POST['costocliente'])){ echo $_POST['costocliente']; }else{ echo $cost2; } ?>">
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



<div class="form-group col-lg-3" >
            <label>Unidad</label>
<select class="form-control select2" id="unidad" name="unidad" >
                  <option value="--">--</option>
                   <option <? if($_POST['unidad']=='001 Camion Blanco'){ ?> selected <? } ?> <? if($row[138]=='001 Camion Blanco'){ ?> selected <? } ?> value="001 Camion Blanco">001 Camion Blanco</option> 
                   <option <? if($_POST['unidad']=='002 Camion Azul'){ ?> selected <? } ?> <? if($row[138]=='002 Camion Azul'){ ?> selected <? } ?> value="002 Camion Azul">002 Camion Azul</option>
                   <option <? if($_POST['unidad']=='003 Camioncito'){ ?> selected <? } ?> <? if($row[138]=='003 Camioncito'){ ?> selected <? } ?> value="003 Camioncito">003 Camioncito</option> 
                   <!--<option <? if($_POST['unidad']=='Chevrolet'){ ?> selected <? } ?> <? if($row[138]=='Chevrolet'){ ?> selected <? } ?> value="Chevrolet">Chevrolet</option>
                   <option <? if($_POST['unidad']=='Camion 10 mt3'){ ?> selected <? } ?> <? if($row[138]=='Camion 10 mt3'){ ?> selected <? } ?> value="Camion 10 mt3">Camion 10 mt3</option>
                   <option <? if($_POST['unidad']=='Camion 30 mt3'){ ?> selected <? } ?> <? if($row[138]=='Camion 30 mt3'){ ?> selected <? } ?> value="Camion 30 mt3">Camion 30 mt3</option>
                   <option <? if($_POST['unidad']=='Camion 90 mt3'){ ?> selected <? } ?> <? if($row[138]=='Camion 90 mt3'){ ?> selected <? } ?> value="Camion 90 mt3">Camion 90 mt3</option>-->
          </select>
</div>

<div class="form-group col-lg-3" >
            <label>Operador</label>
<select class="form-control select2" id="operador" name="operador" >
                  <option value="--">--</option>
                   <option <? if($_POST['operador']=='OP1 VICTOR ZURITA'){ ?> selected <? } ?> <? if($row[155]=='OP1 VICTOR ZURITA'){ ?> selected <? } ?> value="OP1 VICTOR ZURITA">OP1 VICTOR ZURITA</option> 
                   <option <? if($_POST['operador']=='OP2 IVAN OLALDE'){ ?> selected <? } ?> <? if($row[155]=='OP2 IVAN OLALDE'){ ?> selected <? } ?> value="OP2 IVAN OLALDE">OP2 IVAN OLALDE</option>
                   <option <? if($_POST['operador']=='OP3 ABRAHAM'){ ?> selected <? } ?> <? if($row[155]=='OP3 ABRAHAM'){ ?> selected <? } ?> value="OP3 ABRAHAM">OP3 ABRAHAM</option> 
                   <option <? if($_POST['operador']=='OP4 NUEVO'){ ?> selected <? } ?> <? if($row[155]=='OP4 NUEVO'){ ?> selected <? } ?> value="OP4 NUEVO">OP4 NUEVO</option> 
                </select>
      </div>


 <div class="form-group col-lg-3"  >
      <label>Desgaste</label>
      <input name="desgaste" id="desgaste"  style="text-transform: uppercase;" placeholder="Valor Declarado"  class="form-control" type="text" onkeypress="return valida(event)" <? if(isset($_POST['desgaste'])){ ?> value="<? echo $_POST['desgaste']; ?>"  <?  }else{ ?>  value="<? echo round($row[139],2); ?>" <? } ?> >
      </div>

       <div class="form-group col-lg-3"  >
      <label>Combustible</label>
      <input name="combustible" id="combustible"  style="text-transform: uppercase;" placeholder="Valor Declarado"  class="form-control" type="text" onkeypress="return valida(event)" <? if(isset($_POST['combustible'])){ ?> value="<? echo $_POST['combustible']; ?>"  <?  }else{ ?>  value="<? echo round($row[140],2); ?>" <? } ?> >
      </div>


<div class="form-group col-lg-3"  >
      <label>Cuota</label>
      <input name="cuota" id="cuota"  style="text-transform: uppercase;" placeholder="Valor Declarado"  class="form-control" type="text" onkeypress="return valida(event)" <? if(isset($_POST['cuota'])){ ?> value="<? echo $_POST['cuota']; ?>"  <?  }else{ ?>  value="<? echo round($row[141],2); ?>" <? } ?> >
      </div>

      <div class="form-group col-lg-3"  >
      <label>Casetas</label>
      <input name="casetas" id="casetas"  style="text-transform: uppercase;" placeholder="Valor Declarado"  class="form-control" type="text" onkeypress="return valida(event)" <? if(isset($_POST['casetas'])){ ?> value="<? echo $_POST['casetas']; ?>"  <?  }else{ ?>  value="<? echo round($row[142],2); ?>" <? } ?> >
      </div>

      <div class="form-group col-lg-3"  >
      <label>Playo</label>
      <input name="playo" id="playo"  style="text-transform: uppercase;" placeholder="Valor Declarado"  class="form-control" type="text" onkeypress="return valida(event)" <? if(isset($_POST['playo'])){ ?> value="<? echo $_POST['playo']; ?>"  <?  }else{ ?>  value="<? echo round($row[143],2); ?>" <? } ?> >
      </div>

      <div class="form-group col-lg-3"  >
      <label>Comision M3</label>
      <input name="comision_m3" id="comision_m3"  style="text-transform: uppercase;" placeholder="Valor Declarado"  class="form-control" type="text" onkeypress="return valida(event)" <? if(isset($_POST['comision_m3'])){ ?> value="<? echo $_POST['comision_m3']; ?>"  <?  }else{ ?>  value="<? echo round($row[144],2); ?>" <? } ?> >
      </div>

      <div class="form-group col-lg-3"  >
      <label>Ahorro</label>
      <input name="ahorro" id="ahorro"  style="text-transform: uppercase;" placeholder="Ahorro"  class="form-control" type="text" onkeypress="return valida(event)" <? if(isset($_POST['ahorro'])){ ?> value="<? echo $_POST['ahorro']; ?>"  <?  }else{ ?>  value="<? echo round($row[148],2); ?>" <? } ?> >
      </div>
      <div class="form-group col-lg-3"  >
      <label>Fondo</label>
      <input name="fondo" id="fondo"  style="text-transform: uppercase;" placeholder="Fondo"  class="form-control" type="text" onkeypress="return valida(event)" <? if(isset($_POST['fondo'])){ ?> value="<? echo $_POST['fondo']; ?>"  <?  }else{ ?>  value="<? echo round($row[149],2); ?>" <? } ?> >
      </div>

      <div class="form-group col-lg-3"  >
      <label>Seguro Incluido</label>
      <input name="seguro_i" id="seguro_i"  style="text-transform: uppercase;" placeholder="Seguro Incluido"  class="form-control" type="text" onkeypress="return valida(event)" <? if(isset($_POST['seguro_i'])){ ?> value="<? echo $_POST['seguro_i']; ?>"  <?  }else{ ?>  value="<? echo round($row[151],2); ?>" <? } ?> >
      </div>

      <div class="form-group col-lg-3"  >
            <label>Empresa</label>
              <select class="form-control select2" style=" text-transform: uppercase;"  name="empresa" id="empresa" >
                   <option <? if($row[150]=='launion'){ ?> selected <? } ?> value="launion">LA UNION</option>
                   <option <? if($row[150]=='cruz'){ ?> selected <? } ?> value="cruz">CRUZ</option>
                   <option <? if($row[150]=='compartido'){ ?> selected <? } ?> value="compartido">COMPARTIDO</option>
                   <option <? if($row[150]=='sedido'){ ?> selected <? } ?> value="sedido">SEDIDO A LAUNION</option>
                  </select>
              </div>


</div>

<div class="box-footer"  class="form-group" style="width: 100%; ">
              
             
          

<div class="row">
 <div class="form-group col-lg-6" style=" <? if($row[4]=='Vehiculo'){ ?> display:none; <? } ?>" id="lista_muebles">
                  <label>Lista de muebles:</label>
                  <textarea class="form-control" name="lista_m" rows="12" ><?php if(isset($_POST['lista_m'])){ echo $_POST['lista_m']; }else{ echo str_replace('<br />','',$row[7]); } ?></textarea>
                  <? // echo str_replace('<br />','',$row[7]); ?>
                 
                </div>


                <div class="form-group col-lg-6">
                    <label>Enviar a hoja de Deslinde:</label>
 <?php
$lista_arr=explode( '<br />',$row[7] );
$cue_list=count($lista_arr);
for($i=0; $i<$cue_list; $i++){ 

 $querycl = "SELECT count(id) from articulos_desl where cve_servicio='".$row[9]."' and articulo='".$lista_arr[$i]."'";
 //echo $querycl.'<br>';
                    $resultcl = $link->query($querycl);
                    $rowcl=mysqli_fetch_row($resultcl);


    ?>
 <div class="form-group col-md-12" style="margin-bottom: 5px;" >
        
        <label> 
          <input type="checkbox" class="minimal" name="check_list<?php echo $i; ?>" style="-moz-transform: scale(2); width:15px; height:15px;" <?php $ck='check_list'.$i; if($_POST[$ck]=='on'){  ?> checked <?php } ?><?php if($rowcl[0]>=1){ ?> checked <?php } ?> >
          &nbsp;&nbsp;&nbsp;<?php echo $lista_arr[$i]; ?>
        </label>
      </div>
<?php //echo $i.' - '.$lista_arr[$i].'<br>'; ?>

<?php } ?>
                </div>

</div>
                <?php // } ?>

               


<div id="divve" <? if($row[4]!='Vehiculo'){ ?> style="display: none;" <? } ?>>
            
            <div class="form-group col-lg-3"  >

            <label>Marca</label>
               <input name="marca" id="marca"  style="text-transform: uppercase;" class="form-control" type="text" <? if(isset($_POST['marca'])){ ?> value="<? echo $_POST['marca']; ?>"  <?  }else{ ?>  value="<? echo $row[57]; ?>" <? } ?> >
              </div>
              <div class="form-group col-lg-3" >

            <label>Modelo</label>
               <input name="modelo" id="modelo"  style="text-transform: uppercase;" class="form-control" type="text" <? if(isset($_POST['modelo'])){ ?> value="<? echo $_POST['modelo']; ?>"  <?  }else{ ?>  value="<? echo $row[58]; ?>" <? } ?> >
              </div>
              <div class="form-group col-lg-3" >

            <label>Tipo de Auto</label>
               <input name="tipo" id="tipo"  style="text-transform: uppercase;" class="form-control" type="text" <? if(isset($_POST['tipo'])){ ?> value="<? echo $_POST['tipo']; ?>"  <?  }else{ ?>  value="<? echo $row[59]; ?>" <? } ?> >
              </div>
            
<div class="form-group col-lg-3"  >
  <label>&nbsp;</label>
            <a class="btn bg-green" style="font-size: 11px;" href="vehiculopdf2021.php?c=<?php echo $_GET['c']; ?>" target="_blank">Descargar Checklist</a>
              </div>



</div>

</div>




<div  class="box-footer">

 <div class="form-group col-lg-3" >
                  <label>FECHA DEL SERVICIO</label>
                        <div class="input-group">
                          <input  class="form-control" autocomplete="off"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask maxlength="10" type="text" name="fecha_s" id="datepicker" value="<?php if(isset($_POST['fecha_s'])){ echo $_POST['fecha_s']; }else{ echo substr($row[22],8,2).'/'.substr($row[22],5,2).'/'.substr($row[22],0,4); } ?>">
                    </div>
                </div>


                 <div class="form-group col-lg-3" >
                  <label>HORA DEL SERVICIO</label>
                  <input type="text" name="hora_s"  class="form-control" value="<?php if(isset($_POST['hora_s'])){ echo $_POST['hora_s']; }else{ echo $row[23]; } ?>">
                </div>
                 <div class="form-group col-lg-3" >
                  <label>TIEMPO DE ENTREGA APROXIMADO</label>
                  <input type="text" name="tiempo_e" class="form-control" value="<?php if(isset($_POST['tiempo_e'])){ echo $_POST['tiempo_e']; }else{ echo $row[38]; } ?>" >
                </div>
                 <div class="form-group col-lg-3" >
                  <label>QUIEN VENDIO EL SERVICIO</label>
                  <input type="text" name="quien_vendio" class="form-control" value="<?php if(isset($_POST['quien_vendio'])){ echo $_POST['quien_vendio']; }else{ echo $row[137]; } ?>" >
                </div>
           
 </div>

<div class="box-footer" style="width: 100%; overflow: hidden;">
<p style="font-size:18px;">DIRECCIÓN DE CARGA</p>
 <div class="form-group col-lg-3" >
                  <label>CALLE Y NO.</label>
                  <input type="text" name="calle_no_c" class="form-control" value="<?php if(isset($_POST['calle_no_c'])){ echo $_POST['calle_no_c']; }else{ echo $row[24]; } ?>" >
                </div>
              <!--
                <div class="form-group col-lg-3" >
                  <label>CIUDAD</label>
                  <input type="text" name="ciudad_c" class="form-control" value="<? echo $row[44]; ?>" >
                </div>
                <div class="form-group col-lg-3" >
                  <label>ESTADO</label>
                  <input type="text" name="estado_c" class="form-control" value="<? echo $row[106]; ?>" >
                </div>
                -->
<input type="hidden" name="ciudad_c" class="form-control" value="<? echo $row[44]; ?>" >
<input type="hidden" name="estado_c" class="form-control" value="<? echo $row[106]; ?>" >           
                 <div class="form-group col-lg-3">
                  <label>NOM. DE QUIEN ENTREGA</label>
                  <input type="text" name="nom_c" class="form-control" value="<?php if(isset($_POST['nom_c'])){ echo $_POST['nom_c']; }else{ echo $row[27]; } ?>" >
                </div>
                <div class="form-group col-lg-3" >
                  <label>TEL. DE QUIEN ENTREGA</label>
                  <input type="text" name="tel_c" class="form-control" value="<?php if(isset($_POST['tel_c'])){ echo $_POST['tel_c']; }else{ echo $row[28]; } ?>" >
                </div>

 </div>

 
 <div class="box-footer">
<p style="font-size:18px;">DIRECCIÓN DE DESCARGA</p>
 <div class="form-group col-lg-3">
                  <label>CALLE Y NO.</label>
                  <input type="text" name="calle_no_d" class="form-control" value="<?php if(isset($_POST['calle_no_d'])){ echo $_POST['calle_no_d']; }else{ echo $row[29]; } ?>" >
                </div>
               <!--
                 <div class="form-group col-lg-3">
                  <label>CIUDAD</label>
                  <input type="text" name="ciudad_d" class="form-control" value="<? echo $row[45]; ?>" >
                </div>
                <div class="form-group col-lg-3">
                  <label>ESTADO</label>
                  <input type="text" name="estado_d" class="form-control" value="<? echo $row[108]; ?>" >
                </div>
                -->
<input type="hidden" name="ciudad_d" class="form-control" value="<? echo $row[45]; ?>" >
<input type="hidden" name="estado_d" class="form-control" value="<? echo $row[108]; ?>" >

                 <div class="form-group col-lg-3" >
                  <label>REFERENCIA PARA LLEGAR</label>
                  <input type="text" name="referencia_d" class="form-control" value="<?php if(isset($_POST['referencia_d'])){ echo $_POST['referencia_d']; }else{ echo $row[31]; } ?>" >
                </div>
                 <div class="form-group col-lg-3" >
                  <label>NOM. DE QUIEN RECIBE</label>
                  <input type="text" name="nom_d" class="form-control" value="<?php if(isset($_POST['nom_d'])){ echo $_POST['nom_d']; }else{ echo $row[32]; } ?>" >
                </div>
                <div class="form-group col-lg-3" >
                  <label>TEL. DE QUIEN RECIBE</label>
                  <input type="text" name="tel_d" class="form-control" value="<?php if(isset($_POST['tel_d'])){ echo $_POST['tel_d']; }else{ echo $row[33]; } ?>" >
                </div>

 </div>

 <div class="box-footer" style="width: 100%; overflow: hidden;">


<p style="font-size:18px;">PAGOS</p>


<input type="hidden" name="p1" value="">
<input type="hidden" name="p2" value="">
<input type="hidden" name="p3" value="">


              
                 <div class="form-group col-lg-3" >
                  <label>FORMA DE PAGO</label>
                  <input type="text" name="forma_p" class="form-control" value="<? echo $row[37]; ?>" >
                </div>
                <div class="form-group col-lg-3" >
            <label>Factura?</label>
              <select class="form-control select2" style=" text-transform: uppercase;"  name="factura" id="factura" onchange="cambioSiFactura(this.value)" >
         <option value="--">--</option>
                   <option <? if($_POST['factura']=='SI'){ ?> selected <? } ?> <? if($row[92]=='SI'){ ?> selected <? } ?> value="SI">SI</option>
                   <option <? if($_POST['factura']=='NO'){ ?> selected <? } ?> <? if($row[92]=='NO'){ ?> selected <? } ?> value="NO">NO</option>
                   
                    </select>
              </div>
              <div class="form-group col-lg-3">
                  <label>RFC</label>
                  <input type="text" name="srfc" class="form-control" value="<?php if(isset($_POST['srfc'])){ echo $_POST['srfc']; }else{ echo $row[132]; } ?>" >
                </div>
                <div class="form-group col-lg-3">
                  <label>RAZON SOCIAL</label>
                  <input type="text" name="srazon_social" class="form-control" value="<?php if(isset($_POST['razon_social'])){ echo $_POST['razon_social']; }else{ echo $row[133]; } ?>" >
                </div>
                <div class="form-group col-lg-3" id="emailfac" style="display:none;">
                  <label>EMAIL</label>
                  <input type="text" name="semail" class="form-control" value="<?php if(isset($_POST['semail'])){ echo $_POST['semail']; }else{ echo $row[134]; } ?>" >
                </div>
              
                </div>
                <div class="box-footer" style="width: 100%; overflow: hidden;"> 

                <div class="box-footer">
<p style="font-size:18px;">DATOS INE</p>
 <div class="form-group col-lg-3">
                  <label>INE</label>
                  <input type="text" name="ine_ine" class="form-control" value="<?php if(isset($_POST['ine_ine'])){ echo $_POST['ine_ine']; }else{ echo $row[109]; } ?>" >
                </div>
              

                <div   id="agregadodiv" style="height: auto; overflow: scroll; width: 100%; ">

</div>


</div>

<div class="col-md-12" style=" overflow: hidden;">





                <div class="form-group col-lg-3" >
             <label>Identificacion Oficial</label>
              <input name="img1" id="img1" class="form-control" type="file"><br>
   <!--           <input name="img2" id="img2" class="form-control" type="file"><br>-->
              
    </div>
    <!--
    <div class="form-group col-lg-3" >
             <label>Imagenes</label>
              <input name="img3" id="img3" class="form-control" type="file"><br>
              <input name="img4" id="img4" class="form-control" type="file"><br>
              
    </div>
-->
  

                <!-- fin incrustacion nuevos campos -->





 </div>
 

 <?php  if($_SESSION['tipo_usuario']!='visor'){ ?>
<div style="width:100%; align-content: right; text-align: right;">
  <button type="submit" class="btn btn-primary"  name="guardarcambios" id="guardarcambios">Guardar</button>
</div>
<?php } ?>
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
<?php  if($_SESSION['tipo_usuario']!='visor'){ ?>
<a class="btn bg-red" href="tareas.php?verservicio=1&verserv=1&eliaa=1&id=<? echo $rowm[0]; ?>&archivo=<? echo $rowm[3]; ?>&c=<? echo $_GET['c']; ?>">Eliminar Imagen</a>
<?php } ?>
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
<td>
<?php  if($_SESSION['tipo_usuario']!='visor'){ ?>
    <button type="submit" class="btn btn-primary"  name="subir" id="subir">Subir Archivo</button>
<?php } ?>
</td>
  </tr>
</table>


              </div>
  
           





           
        </div>

      
   </form>                 
   <script type="text/javascript">



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
  


function cambioSiFactura(v){
  if(v=='NO'){
document.getElementById("emailfac").style.display='none';
}else{
document.getElementById("emailfac").style.display='block';
}
}

</script>

