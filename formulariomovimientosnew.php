<div class="row">
    <div class="col-md-12">
<? 
setlocale(LC_MONETARY, 'es_MX');
 ?>
<script type="text/javascript">
function cambiartipo(t){
	if(t.value=='EFECTIVO'){
		document.getElementById('efectivodiv').style.display = 'block';
		document.getElementById('bancodiv').style.display = 'none';
	}else{
		if(t.value=='BANCO'){
			document.getElementById('efectivodiv').style.display = 'none';
			document.getElementById('bancodiv').style.display = 'block';
		}else{
      document.getElementById('efectivodiv').style.display = 'block';
		document.getElementById('bancodiv').style.display = 'none';
		}	
	}
}

</script>

<?php include('config.php'); 



if(isset($_POST['guardarevidencias'])){


    $errore1=false;
if (is_uploaded_file($_FILES['archivo']['tmp_name'])) {
  $c3 = date('dmYHis').$_FILES['archivo']['name'];
  $c3=str_replace(' ','_',$c3);
  // echo $e1;
 
  move_uploaded_file($_FILES['archivo']['tmp_name'], "archivos/".$c3);
} else {
$errore1=true;
$errormsg = "Error al cargar imagen: " . $_FILES['archivo']['name'];
}
if($errore1){
$c3 = "N_A";
}


$c1=$_GET['c'];
$c2='';
$c4=date('Y-m-d H:i:s');
$c5=$_POST['concepto'];

if($c3!="N_A"){
$querygp = "insert into evidencias(clave_servicio,tipo,archivo,fecha,titulo) values('".$c1."','".$c2."','".$c3."','".$c4."','".$c5."')";
$link->query($querygp); 


?>
<script type="text/javascript">
 location.href="tareas.php?conta22=1&c=<?php echo $c1; ?>";
</script>
<?php
}else{
  $regre=1;
?>
<script type="text/javascript">alert('<?php echo $cade; ?>');</script>
<?php
}

}


if(isset($_GET['eli'])){
   $query = "delete from cargos_extra where id=".$_GET['id'];
  $link->query($query);

$querym = "SELECT sum(cargo) from cargos_extra where cve_servicio='".$c1."' and para='Cliente'";
 $resultm = $link->query($querym);
    $rowm=mysqli_fetch_row($resultm);
$queryme = "update servicio set extras='".$rowm[0]."' where clave='".$_GET['c']."'";
 $link->query($queryme); 
 $querym = "SELECT sum(cargo) from cargos_extra where cve_servicio='".$c1."' and para='Proveedor'";
 $resultm = $link->query($querym);
    $rowm=mysqli_fetch_row($resultm);
$queryme = "update servicio set extras_prov='".$rowm[0]."' where clave='".$_GET['c']."'";
 $link->query($queryme); 
?>
<script type="text/javascript">
  location.href="tareas.php?conta22=1&c=<?php echo $_GET['c']; ?>";
</script>
<?php

  }

  if(isset($_GET['elides'])){
   $query = "delete from descuentos where id=".$_GET['id'];
  $link->query($query);

$querym = "SELECT sum(cargo) from descuentos where cve_servicio='".$c1."' and para='Cliente'";
 $resultm = $link->query($querym);
    $rowm=mysqli_fetch_row($resultm);
$queryme = "update servicio set descuentos='".$rowm[0]."' where clave='".$_GET['c']."'";
 $link->query($queryme); 

 $querym = "SELECT sum(cargo) from descuentos where cve_servicio='".$c1."' and para='Proveedor'";
 $resultm = $link->query($querym);
    $rowm=mysqli_fetch_row($resultm);
$queryme = "update servicio set descuentos_prov='".$rowm[0]."' where clave='".$_GET['c']."'";
 $link->query($queryme); 
?>
<script type="text/javascript">
  location.href="tareas.php?conta22=1&c=<?php echo $_GET['c']; ?>";
</script>
<?php

  }


  if(isset($_GET['elicom'])){
   $query = "delete from estatus_s where id=".$_GET['id'];
  $link->query($query);

  
?>
<script type="text/javascript">
  location.href="tareas.php?conta22=1&c=<?php echo $_GET['c']; ?>";
</script>
<?php

  }

if(isset($_GET['elievi'])){



    $queryce = "SELECT * from evidencias where id=".$_GET['id'];
    $resultce = $link->query($queryce);
    $rowce=mysqli_fetch_row($resultce);

unlink('archivos/'.$rowce[3]);

   $query = "delete from evidencias where id=".$_GET['id'];
  $link->query($query);
?>
<script type="text/javascript">
  location.href="tareas.php?conta22=1&c=<?php echo $_GET['c']; ?>";
</script>
<?php

  }

if(isset($_POST['guardarcargos'])){


    $corr=0;
$cade="";

if($_POST['concepto']==''){
$corr=1;
$cade=$cade."Falta Concepto \\n";
}


if($_POST['cantidad']==''){
$corr=1;
$cade=$cade."Falta Cantidad \\n";
}


$c1=$_GET['c'];

$c2=$_POST['concepto'];
$c3=$_POST['cantidad'];
$c4=$_POST['para'];
$regre=0;

if($corr!=1){
$querygp = "insert into cargos_extra(cve_servicio,concepto,cargo,para) values('".$c1."','".$c2."',".$c3.",'".$c4."')";
$link->query($querygp); 


$querym = "SELECT sum(cargo) from cargos_extra where cve_servicio='".$c1."' and para='Cliente'";
 $resultm = $link->query($querym);
    $rowm=mysqli_fetch_row($resultm);
$queryme = "update servicio set extras='".$rowm[0]."' where clave='".$_GET['c']."'";
 $link->query($queryme); 
 $querym = "SELECT sum(cargo) from cargos_extra where cve_servicio='".$c1."' and para='Proveedor'";
 $resultm = $link->query($querym);
    $rowm=mysqli_fetch_row($resultm);
$queryme = "update servicio set extras_prov='".$rowm[0]."' where clave='".$_GET['c']."'";
 $link->query($queryme); 
 //echo $querygp .'<br>';
?>
<script type="text/javascript">
//document.getElementById("btn_acuse").click();
 location.href="tareas.php?conta22=1&c=<?php echo $c1; ?>";
</script>
<?php
}else{
  $regre=1;
?>
<script type="text/javascript">alert('<?php echo $cade; ?>');</script>
<?php
}

}



if(isset($_POST['guardardescuento'])){


    $corr=0;
$cade="";

if($_POST['concepto']==''){
$corr=1;
$cade=$cade."Falta Concepto \\n";
}


if($_POST['cantidad']==''){
$corr=1;
$cade=$cade."Falta Cantidad \\n";
}


$c1=$_GET['c'];

$c2=$_POST['concepto'];
$c3=$_POST['cantidad'];
$c4=$_POST['para'];
$regre=0;

if($corr!=1){
$querygp = "insert into descuentos(cve_servicio,concepto,cargo,para) values('".$c1."','".$c2."',".$c3.",'".$c4."')";
$link->query($querygp); 


$querym = "SELECT sum(cargo) from descuentos where cve_servicio='".$c1."' and para='Cliente'";
 $resultm = $link->query($querym);
    $rowm=mysqli_fetch_row($resultm);
$queryme = "update servicio set descuentos='".$rowm[0]."' where clave='".$_GET['c']."'";
 $link->query($queryme); 

 $querym = "SELECT sum(cargo) from descuentos where cve_servicio='".$c1."' and para='Proveedor'";
 $resultm = $link->query($querym);
    $rowm=mysqli_fetch_row($resultm);
$queryme = "update servicio set descuentos_prov='".$rowm[0]."' where clave='".$_GET['c']."'";
 $link->query($queryme); 

 //echo $querygp .'<br>';
?>
<script type="text/javascript">
//document.getElementById("btn_acuse").click();
 location.href="tareas.php?conta22=1&c=<?php echo $c1; ?>";
</script>
<?php
}else{
  $regre=1;
?>
<script type="text/javascript">alert('<?php echo $cade; ?>');</script>
<?php
}

}



if(isset($_POST['guardarcambios'])){
 
      $campo1=$_POST['seguro_sp'];
      $campo2=$_POST['costo_sp'];
      $campo3=$_POST['costo_prov'];
      $campo4=$_POST['costo_un'];
      $campo5=$_POST['material_e'];
      $campo6=$_POST['emplaye_tt'];
      $campo7=$_POST['empaque_t'];
      $campo8=$_POST['desempaque_t'];
      $campo9=$_POST['supervision'];
      $campo10=$_POST['factura_prov'];
      $campo11=$_POST['factura_cliente'];
      $campo12=$_POST['persona_fc'];
      $campo13=substr($_POST['fecha_s'],6,4).'-'.substr($_POST['fecha_s'],3,2).'-'.substr($_POST['fecha_s'],0,2);;
      $campo14=$_POST['hora_s'];
      $campo15=$_POST['evidencia_carga'];
      $campo16=$_POST['evidencia_descarga'];
      $campo17=$_POST['firma_conformidad'];

      $campo18=$_POST['factura_a_p'];
      $campo19=$_POST['factura_a_c'];
      $campo20=$_POST['razon_s_c'];

      $campo21=$_POST['estatus_s'];



      $c1=$_POST['id_movi'];
      $ce1=$_POST['clave_serv'];
$ce2=date('Y-m-d H-i-s');


if($_POST['comentarios_es']!=''){


 $csqlest = "insert into estatus_s(cve_servicio,estatus,comentario,fecha,id_usuario) values('".$ce1."',".$campo21.",'".$_POST['comentarios_es']."','".date('Y-m-d H:i:s')."',".$_SESSION['id_user'].")";  
      $link->query($csqlest);


}


if (is_uploaded_file($_FILES['evi1']['tmp_name'])) {
      $e1 = $c1.$_FILES['evi1']['name'];
      echo $e1;
      move_uploaded_file($_FILES['evi1']['tmp_name'], "archivos/".$e1);
  } else {
    $error=true;
    $errormsg = "Error al cargar imagen: " . $_FILES['evi1']['name'];
  }
  if($error){
  $e1 = "N_A";
  }
  if($e1!="N_A"){
    $csqle1 = "insert into evidencias(clave_servicio,tipo,archivo,fecha,titulo) values('".$ce1."','1','".$e1."','".$ce2."','".$e1."')";  
      $link->query($csqle1);
  }

  if (is_uploaded_file($_FILES['evi2']['tmp_name'])) {
      $e2 = $c1.$_FILES['evi2']['name'];
      move_uploaded_file($_FILES['evi2']['tmp_name'], "archivos/".$e2);
  } else {
    $error=true;
    $errormsg = "Error al cargar imagen: " . $_FILES['evi2']['name'];
  }
  if($error){
  $e2 = "N_A";
  }
 if($e2!="N_A"){
    $csqle2 = "insert into evidencias(clave_servicio,tipo,archivo,fecha,titulo) values('".$ce1."','2','".$e2."','".$ce2."','".$e2."')";  
     $link->query($csqle2);
  }
  if (is_uploaded_file($_FILES['evi3']['tmp_name'])) {
      $e3 = $c1.$_FILES['evi3']['name'];
      move_uploaded_file($_FILES['evi3']['tmp_name'], "archivos/".$e3);
  } else {
    $error=true;
    $errormsg = "Error al cargar imagen: " . $_FILES['evi3']['name'];
  }
  if($error){
  $e3 = "N_A";
  }
   if($e3!="N_A"){
    $csqle3 = "insert into evidencias(clave_servicio,tipo,archivo,fecha,titulo) values('".$ce1."','3','".$e3."','".$ce2."','".$e3."')";  
      $link->query($csqle3);
  }

  $c1 = $_POST['check1'];
  $c2 = $_POST['check2'];
  $c3 = $_POST['check3'];
  $c4 = $_POST['check4'];
  $c5 = $_POST['check5'];
  $c6 = $_POST['check6'];
  $c7 = $_POST['check7'];
  $c8 = $_POST['check8'];
  $c9 = $_POST['check9'];
  $c10 = $_POST['check10'];


$querych = "SELECT count(id) from checklist where cve_servicio='".$_GET['c']."'";
$resultch = $link->query($querych);
$rowch=mysqli_fetch_row($resultch);
if($rowch[0]>=1){

  $csqlch = "update checklist set lista='".$c1."',cotizacion='".$c2."',contrato='".$c3."',forma_pago='".$c4."',contrato2='".$c5."',evidencia_c='".$c6."',verifi_pp='".$c7."',evidencia_d='".$c8."',infografia='".$c9."',conformidad='".$c10."' where cve_servicio='".$ce1."'";  
  $link->query($csqlch);

}else{

 $csqlch = "insert into checklist(cve_servicio,lista,cotizacion,contrato,forma_pago,contrato2,evidencia_c,verifi_pp,evidencia_d,infografia,conformidad) values('".$ce1."','".$c1."','".$c2."','".$c3."','".$c4."','".$c5."','".$c6."','".$c7."','".$c8."','".$c9."','".$c10."') ";  
  $link->query($csqlch);

}

  $pc1 = $_POST['p_ant'];
  $pc2 = $_POST['p_car'];
  $pc3 = $_POST['p_des'];
  $pc4 = $_POST['ant'];
  $pc5 = $_POST['car'];
  $pc6 = $_POST['des'];

  $querytp = "SELECT count(id) from tabla_pagos where cve_servicio='".$_GET['c']."'";
$resulttp = $link->query($querytp);
$rowtp=mysqli_fetch_row($resulttp);
if($rowtp[0]>=1){

  $csqlch = "update tabla_pagos set p_ant='".$pc1."',p_car='".$pc2."',p_des='".$pc3."',ant='".$pc4."',car='".$pc5."',des='".$pc6."' where cve_servicio='".$ce1."'";  
  $link->query($csqlch);

}else{

 $csqlch = "insert into tabla_pagos(cve_servicio,p_ant,p_car,p_des,ant,car,des) values('".$ce1."','".$pc1."','".$pc2."','".$pc3."','".$pc4."','".$pc5."','".$pc6."') ";  
  $link->query($csqlch);

}

      
      $csql = "update servicio set seguro='".$campo1."',seguro_prov='".$campo2."',material_e ='".$campo5."',emplaye_tt='".$campo6."',empaque_t='".$campo7."',desempaque_t='".$campo8."',supervision='".$campo9."',factura_prov='".$campo10."',factura_cliente='".$campo11."',persona_fc='".$campo12."',evidencia_carga='".$campo15."',evidencia_descarga='".$campo16."',firma_conformidad='".$campo17."',factura_a_p='".$campo18."',factura_a_c='".$campo19."',razon_s_c='".$campo20."',estatus=".$campo21." where id=".$_POST['id_movi'];  
   // echo $csql.'<br>';
     $link->query($csql);
       ?>
<script language="JavaScript" type="text/javascript">
location.href="tareas.php?conta22=1&c=<? echo $_GET['c']; ?>";
</script>
<?
}

if(isset($_POST['actualizarmov'])){
 
      $campo1=$_POST['id_movi'];
      $campo2=$_POST['referencia'];
      $campo3=substr($_POST['fsalida'],6,4).'-'.substr($_POST['fsalida'],3,2).'-'.substr($_POST['fsalida'],0,2);
      $campo4=$_POST['tipo'];
      if($campo4=='BANCO'){
        $campo5=$_POST['bancob'];
      $campo6=$_POST['cantidadb'];
      }else{
        $campo5=$_POST['bancoe'];
      $campo6=$_POST['cantidade'];
      }
      
      $campo7=$_SESSION['id_user'];
      $campo8=$_POST['proveedor'];
      
      $csql = "update ingresosyegresos set referencia=".$campo2.",fecha='".$campo3."',tipo='".$campo4."',banco='".$campo5."',cantidad='".$campo6."',usuario='".$campo7."',proveedor=".$campo8." where id=".$campo1;  
     $link->query($csql);
       ?>
<script language="JavaScript" type="text/javascript">
location.href="tareas.php?conta=1&c=<? echo $_GET['c']; ?>";
</script>
<?
}

if(isset($_POST['guardarmov'])){
      
     
      $campo1=$_POST['id_general'];
      $campo2=$_POST['referencia'];
      $campo3=substr($_POST['fsalida'],6,4).'-'.substr($_POST['fsalida'],3,2).'-'.substr($_POST['fsalida'],0,2);
      $campo4=$_POST['tipo'];
      if($campo4=='BANCO'){
        $campo5=$_POST['bancob'];
      $campo6=$_POST['cantidadb'];
      if (is_uploaded_file($_FILES['evidb']['tmp_name'])) {
      $campo8 = $campo1.$_FILES['evidb']['name'];
      move_uploaded_file($_FILES['evidb']['tmp_name'], "archivos/". $campo8);
  } else {
    $error=true;
    $errormsg = "Error al cargar imagen: " . $_FILES['evidb']['name'];
  }
  if($error){
   $campo8 = "N_A";
  }
  $campo9=$_POST['comentariodb'];
      }else{
        $campo5=$_POST['bancoe'];
      $campo6=$_POST['cantidade'];
      if (is_uploaded_file($_FILES['evide']['tmp_name'])) {
      $campo8 = $campo1.$_FILES['evide']['name'];
      move_uploaded_file($_FILES['evide']['tmp_name'], "archivos/". $campo8);
  } else {
    $error=true;
    $errormsg = "Error al cargar imagen: " . $_FILES['evide']['name'];
  }
  if($error){
   $campo8 = "N_A";
  }

  $campo9=$_POST['comentariode'];
      }
      
      $campo7=$_SESSION['id_user'];
      $campo10=$_SESSION['id_user'];
      
      $campo11=$_POST['proveedor'];
      
      //echo "INSERT INTO ingresosyegresos(id_mudanza,referencia,fecha,tipo,banco,cantidad,usuario) VALUES (".$campo1.",".$campo2.",'".$campo3."','".$campo4."','".$campo5."','".$campo6."','".$campo7."')<br>";  
      $csql = "INSERT INTO ingresosyegresos(id_mudanza,referencia,fecha,tipo,banco,cantidad,usuario,archivo,comentario,proveedor) VALUES (".$campo1.",".$campo2.",'".$campo3."','".$campo4."','".$campo5."','".$campo6."','".$campo7."','".$campo8."','".$campo9."','".$campo10."',".$campo11.")";  
       
     $link->query($csql);
       ?>
<script language="JavaScript" type="text/javascript">
location.href="tareas.php?conta=1&c=<? echo $_GET['c']; ?>";
</script>
<?
     }


     if(isset($_POST['guardarmov2'])){
      
     
      $campo1=$_POST['id_general'];
      $campo2=$_POST['referencia'];
      $campo3=substr($_POST['fsalida'],6,4).'-'.substr($_POST['fsalida'],3,2).'-'.substr($_POST['fsalida'],0,2);
      $campo4=$_POST['tipo'];
        if($campo4=='BANCO'){
        $campo5=$_POST['bancob'];
      $campo6=$_POST['cantidadb'];
      if (is_uploaded_file($_FILES['evidb']['tmp_name'])) {
      $campo8 = $campo1.$_FILES['evidb']['name'];
      move_uploaded_file($_FILES['evidb']['tmp_name'], "archivos/". $campo8);
  } else {
    $error=true;
    $errormsg = "Error al cargar imagen: " . $_FILES['evidb']['name'];
  }
  if($error){
   $campo8 = "N_A";
  }
  $campo9=$_POST['comentariodb'];
      }else{
        $campo5=$_POST['bancoe'];
      $campo6=$_POST['cantidade'];
      if (is_uploaded_file($_FILES['evide']['tmp_name'])) {
      $campo8 = $campo1.$_FILES['evide']['name'];
      move_uploaded_file($_FILES['evide']['tmp_name'], "archivos/". $campo8);
  } else {
    $error=true;
    $errormsg = "Error al cargar imagen: " . $_FILES['evide']['name'];
  }
  if($error){
   $campo8 = "N_A";
  }

  $campo9=$_POST['comentariode'];

      }
      
$campo10=$_POST['proveedor'];  
      $campo7=$_SESSION['id_user']; 
      $csql = "INSERT INTO ingresosyegresos(id_mudanza,referencia,fecha,tipo,banco,cantidad,usuario,archivo,comentario,proveedor) VALUES (".$campo1.",".$campo2.",'".$campo3."','".$campo4."','".$campo5."','".$campo6."','".$campo7."','".$campo8."','".$campo9."',".$campo10.")";  
       
     $link->query($csql);
       ?>
<script language="JavaScript" type="text/javascript">
location.href="tareas.php?conta=1&c=<? echo $_GET['c']; ?>";
</script>
<?
     }
     ?>


<? 

	$query = "SELECT * from servicio where clave='".$_GET['c']."'";
 $result = $link->query($query);
	$row=mysqli_fetch_row($result);
       ?>
         <fieldset>
<h2>Mudanza</h2>
         </fieldset>

  <form method="POST" action="tareas.php?conta22=1&c=<? echo $_GET['c']; ?>" enctype="multipart/form-data">
    <input type="hidden" name="id_movi" id="id_movi" value="<? echo $row[0]; ?>"/>
    <input type="hidden" name="clave_serv" id="clave_serv" value="<? echo $row[9]; ?>"/>




<div class="row  col-lg-12">
  <div class="col-lg-4">
    
<table>
<tr>
  <td></td>
  <td>
    <table border="1">
      <tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">ORIGEN / DESTINO</td>
<td style=" padding: 1px;">
  <table style="margin: 0px; width: 100%;" border="1">
    <tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px; width: 50%;"><? echo $row[2]; ?></td>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px; width: 50%;"><? echo $row[3]; ?></td>
    </tr>
  </table>

</td>
      </tr>


      <tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">CLIENTE</td>
<td style=" padding: 1px;">&nbsp;&nbsp;<? echo $row[1]; ?></td>
      </tr>
 <tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">TIPO DE SERVICIO</td>
<td style=" padding: 1px;">&nbsp;&nbsp;<? echo $row[4];   ?>
</td>
      </tr>

      <tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">PROVEEDORES</td>
<td style=" padding: 1px;">&nbsp;&nbsp;<? 
  $query = "SELECT * from proveedores where id=".$row[40];
  $resultp = $link->query($query);
  $rowp=mysqli_fetch_row($resultp);
     echo $rowp[1]; ?>
</td>
      </tr>

      <tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">FOLIO APP LA UNION</td>
<td style=" padding: 1px;">&nbsp;&nbsp;<? echo $row[0];   ?>
</td>
</tr>
 
<tr>
<td style="background-color: #1ea521; color: #fff; text-align: center; padding: 1px;">COSTOS</td>
<td style="padding: 1px;"></td>
      </tr>


      <tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">MONTO ASEGURADO</td>
<td style=" padding: 1px;">&nbsp;&nbsp;$ <input type="text" name="seguro_sp" class="form-control" onkeypress="return valida(event)" value="<? echo $row[19]; ?>" style="width: 90%; float: right; padding: 0px; margin: 0px; height: 22px;" >
</td>
      </tr>
       
    
      <tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">COSTO SEGURO PROV</td>
<td style=" padding: 1px;">&nbsp;&nbsp;$ &nbsp;<?php if($row[82]>=1){ echo number_format($row[82], 2);

}else{ echo '0.00'; } ?></td>
      </tr>
    
      <tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">COSTO SEGURO CLIENTE</td>
<td style=" padding: 1px;">&nbsp;&nbsp;$ &nbsp;<?php if($row[100]>=1){ echo number_format($row[100], 2);

}else{ echo '0.00'; } ?></td>
      </tr>
 

   <tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">GANANCIA SEGURO</td>
<td style=" padding: 1px;">&nbsp;&nbsp;$ &nbsp;<?php $gcseg=$row[100]-$row[82]; if($gcseg>=1){ echo number_format($gcseg, 2);
}else{ 
  echo '0.00';
   } ?></td>
      </tr>
 

      <tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">COSTO FLETE PROVEEDOR</td>
<td style=" padding: 1px;">&nbsp;&nbsp;$ <? echo number_format($row[43],2); ?></td>
      </tr>

    <tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">CASETAS</td>
<td style=" padding: 1px;">&nbsp;&nbsp;$ <? echo number_format($row[139],2); ?></td>
      </tr>
      <tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">COMBUSTIBLE</td>
<td style=" padding: 1px;">&nbsp;&nbsp;$ <? echo number_format($row[140],2); ?></td>
      </tr>
      <tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">CUOTA</td>
<td style=" padding: 1px;">&nbsp;&nbsp;$ <? echo number_format($row[141],2); ?></td>
      </tr>
      <tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">CASETAS</td>
<td style=" padding: 1px;">&nbsp;&nbsp;$ <? echo number_format($row[142],2); ?></td>
      </tr>
      <tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">PLAYO</td>
<td style=" padding: 1px;">&nbsp;&nbsp;$ <? echo number_format($row[143],2); ?></td>
      </tr>
      <tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">COMISION M3</td>
<td style=" padding: 1px;">&nbsp;&nbsp;$ <? echo number_format($row[144],2); ?></td>
      </tr>
<?php $otros_gastos=($row[139]+$row[140]+$row[141]+$row[142]+$row[143]+$row[144]+$row[43]+$row[146])-$row[146]; ?>

<tr>
  <tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">EXTRAS PROVEEDOR</td>
<td style=" padding: 1px;">&nbsp;&nbsp;$ <?php if($row[146]!=''){ echo number_format($row[146],2); }else{ echo '0.00' ; } ?></td>
  </tr>
  <tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">DESCUENTOS PROVEEDOR</td>
<td style=" padding: 1px;">&nbsp;&nbsp;$ <?php if($row[147]!=''){ echo number_format($row[147],2); }else{ echo '0.00' ; } ?></td>
  </tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">COSTO REAL PROV</td>
<td style=" padding: 1px;">&nbsp;&nbsp;$ <? echo number_format($otros_gastos,2); ?></td>
      </tr>

      <tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">EXTRAS CLIENTE</td>
<td style=" padding: 1px;">&nbsp;&nbsp;$ <?php if($row[21]!=''){ echo number_format($row[21],2); }else{ echo '0.00' ; } ?></td>
      </tr>
     <tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">DESCUENTOS CLIENTE</td>
<td style=" padding: 1px;">&nbsp;&nbsp;$ <?php if($row[145]!=''){ echo number_format($row[145],2); }else{ echo '0.00' ; } ?></td>
  </tr>

<?php if($row[92]=='SI'){ ?>

<?php if($row[136]==2){ ?>
<tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">SUBTOTAL</td>
<td style=" padding: 1px;">&nbsp;&nbsp;$ <? 
$subt=($row[42] + $row[21] + $row[146]) - $row[145]; echo number_format($subt,2); ?>
</td>
      </tr>

<?php }else{ ?>
<tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">SUBTOTAL</td>
<td style=" padding: 1px;">&nbsp;&nbsp;$ <? 
$subt=(($row[42] + $row[21] + $row[146])  - $row[145]) + ($row[100] - $row[82]); echo number_format($subt,2); ?>
</td>
      </tr>

<?php } ?>
     

   <tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">COSTO FLETE LA UNION</td>
<td style=" padding: 1px;">&nbsp;&nbsp;$ 
<? 
$iva=$subt * .16; echo number_format($iva,2); ?>
</td>
      </tr>


   <tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">COSTO FLETE LA UNION</td>
<td style=" padding: 1px;">&nbsp;&nbsp;$ 
<? 
$toti=$subt + $iva; echo number_format($toti,2); ?>
</td>
      </tr>



<?php }else{ ?>



<?php if($row[137]==2){ ?>
  <tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">COSTO FLETE LA UNION</td>
<td style=" padding: 1px;">&nbsp;&nbsp;$ 
<? 
$toti=($row[42] + $row[21] + $row[146]) - $row[145]; echo number_format($toti,2); ?>
</td>
      </tr>

  <?php }else{ ?>
  <tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">COSTO FLETE LA UNION</td>
<td style=" padding: 1px;">&nbsp;&nbsp;$ <? 
$toti=(($row[42] + $row[21] + $row[146]) - $row[145]) + ($row[100] - $row[82]); echo number_format($toti,2); ?>
</td>
      </tr>
  <?php } ?>

 


<?php } ?>



   

      <tr>
<td style="background-color: #1ea521; color: #fff; text-align: center; padding: 1px;">COMISIONES</td>
<td style=" padding: 1px;">
  
</td>
</tr>
    
     
     


      <tr>
<td style="background-color: #1ea521; color: #fff; text-align: center; padding: 1px;">GANANCIA PURA</td>
<td style=" padding: 1px;">$ <? 
$ganse=$row[100]-$row[82];
$ganclien=(($row[42] + $row[21] + $row[146]) - $row[145])-$row[43];
echo number_format($ganse+$ganclien); ?>
  <input name="totip" value="<?php echo number_format($ganse+$ganclien); ?>" type="hidden" >
</td>
      </tr>

     
      
<!--
<tr>
<td></td>
<td><button type="submit" value="Guardar" name="guardarcambios" id="guardarcambios" class="btn bg-blue" >Guardar</button></td>
</tr> -->
    </table>

  </td>
  </tr>
</table>

</div>

<div class="col-lg-8">
  <?php $querych = "SELECT * from checklist where cve_servicio='".$_GET['c']."'";
$resultch = $link->query($querych);
$rowch=mysqli_fetch_row($resultch); ?>

      <div class="form-group col-md-2" style="text-align: center; background-color: #ddebf7; height: 80px; vertical-align: bottom;">
        <label style="height: 40px;">
          LISTA DE MUEBLES
          </label><br>
          <input type="checkbox" class="minimal" name="check1" style="-moz-transform: scale(2); width:15px; height:15px;" <?php if($rowch[2]=='on'){ ?> checked <?php } ?> >
        
      </div>
      <div class="form-group col-md-2" style="text-align: center; background-color: #ddebf7; height: 80px;">
        <label style="height: 40px;">
          COTIZACION</label><br>
          <input type="checkbox" class="minimal" name="check2" style="-moz-transform: scale(2); width:15px; height:15px;" <?php if($rowch[3]=='on'){ ?> checked <?php } ?> >
       
      </div>
      <div class="form-group col-md-2" style="text-align: center; background-color: #ddebf7; height: 80px;">
         <label style="height: 40px;">
          CONTRATO A FIRMA Y DESLINDE
          </label><br>
          <input type="checkbox" class="minimal" name="check3" style="-moz-transform: scale(2); width:15px; height:15px;" <?php if($rowch[4]=='on'){ ?> checked <?php } ?> >
        
      </div>
      <div class="form-group col-md-2" style="text-align: center; background-color: #ddebf7; height: 80px;">
        <label style="height: 40px;">
          DOCTO FORMA DE PAGO
          </label><br>
          <input type="checkbox" class="minimal" name="check4" style="-moz-transform: scale(2); width:15px; height:15px;" <?php if($rowch[5]=='on'){ ?> checked <?php } ?> >
       
      </div>
      <div class="form-group col-md-2" style="text-align: center; background-color: #ddebf7; height: 80px;">
         <label style="height: 40px;">
          CONTRATO FIRMADO // CONF CORREO
          </label><br>
          <input type="checkbox" class="minimal" name="check5" style="-moz-transform: scale(2); width:15px; height:15px;" <?php if($rowch[6]=='on'){ ?> checked <?php } ?> >
       
      </div>
      <div class="form-group col-md-2" style="text-align: center;  height: 80px;">
        
      </div>
      <div class="form-group col-md-2" style="text-align: center; background-color: #fce4d6; height: 110px;">
         <label style="height: 60px;">
          EVIDENCIA CARGA
          </label><br>
          <input type="checkbox" class="minimal" name="check6" style="-moz-transform: scale(2); width:15px; height:15px;" <?php if($rowch[7]=='on'){ ?> checked <?php } ?> >
        
      </div>
      <div class="form-group col-md-2" style="text-align: center; background-color: #fce4d6; height: 110px;">
        <label style="height: 60px;">
          VERIFICAR PRIMER Y SEGUNDO PAGO
          </label><br>
          <input type="checkbox" class="minimal" name="check7" style="-moz-transform: scale(2); width:15px; height:15px;" <?php if($rowch[8]=='on'){ ?> checked <?php } ?> >
        
      </div>
      <div class="form-group col-md-2" style="text-align: center; background-color: #fce4d6; height: 110px;">
        <label style="height: 60px;">
          EVIDENCIA DESCARGAS
          </label><br>
          <input type="checkbox" class="minimal" name="check8" style="-moz-transform: scale(2); width:15px; height:15px;" <?php if($rowch[9]=='on'){ ?> checked <?php } ?> >
        
      </div>
      <div class="form-group col-md-2" style="text-align: center; background-color: #fce4d6; height: 110px;">
        <label style="height: 60px;">
         INFOGRAFIA NARANJA, AMARILLA, ULTIMO PAGO
         </label><br>
          <input type="checkbox" class="minimal" name="check9" style="-moz-transform: scale(2); width:15px; height:15px;" <?php if($rowch[10]=='on'){ ?> checked <?php } ?> >
        
      </div>
      <div class="form-group col-md-2" style="text-align: center; background-color: #fce4d6; height: 110px;">
        <label style="height: 60px;">
         CONFORMIDAD DEL CLIENTE
         </label><br>
          <input type="checkbox" class="minimal" name="check10" style="-moz-transform: scale(2); width:15px; height:15px;" <?php if($rowch[11]=='on'){ ?> checked <?php } ?> >
        
      </div>


<div class="row col-lg-12">
  <div class="col-xs-12">
<h3>Tabla de Pagos</h3>
</div>

<?php $querytp = "SELECT * from tabla_pagos where cve_servicio='".$_GET['c']."'";
$resulttp = $link->query($querytp);
$rowtp=mysqli_fetch_row($resulttp);
//echo $ganse.'-'.$ganclien;
 ?>
  <div class="form-group col-md-4" >
    <label>% Anticipo</label>
    <input type="text" id="p_ant" name="p_ant" class="form-control" onkeypress="return valida(event)" value="<? echo $rowtp[2]; ?>" onChange="porcenAnticipo(<?php echo ($toti); ?>)"  >
  </div>
  <div class="form-group col-md-4" >
    <label>% A la Carga</label>
    <input type="text" id="p_car" name="p_car" class="form-control" onkeypress="return valida(event)" value="<? echo $rowtp[3]; ?>" onChange="porcenCarga(<?php echo ($toti); ?>)"  >
  </div>
  <div class="form-group col-md-4" >
    <label>% Llegada Descarga</label>
    <input type="text" id="p_des" name="p_des" class="form-control" onkeypress="return valida(event)" value="<? echo $rowtp[4]; ?>" onChange="porcenDescarga(<?php echo ($toti); ?>)"  >
  </div>



<div class="form-group col-md-4" >
    <label>Anticipo</label>
    <input type="text" id="ant" name="ant" class="form-control" onkeypress="return valida(event)" value="<? echo $rowtp[5]; ?>"  >
  </div>
  <div class="form-group col-md-4" >
    <label>A la Carga</label>
    <input type="text" id="car" name="car" class="form-control" onkeypress="return valida(event)" value="<? echo $rowtp[6]; ?>"  >
  </div>
  <div class="form-group col-md-4" >
    <label>Llegada Descarga</label>
    <input type="text" id="des" name="des" class="form-control" onkeypress="return valida(event)" value="<? echo $rowtp[7]; ?>"  >
  </div>


</div>


<script type="text/javascript">
  
function porcenAnticipo(v){
var val = document.getElementById('p_ant').value;
var por = v * (val / 100);
document.getElementById('ant').value=Math.round(por*100)/100;
}

function porcenCarga(v){
var val = document.getElementById('p_car').value;
var por = v * (val / 100);
document.getElementById('car').value=Math.round(por*100)/100;
}

function porcenDescarga(v){
var val = document.getElementById('p_des').value;
var por = v * (val / 100);
document.getElementById('des').value=Math.round(por*100)/100;
}

</script>


</div>


</div>


<div class="row col-lg-12">

<div class="row col-lg-6">


 <table class="table table-hover">
                <tr>
                     <th>ESTATUS</th>
                     <th>COMENTARIO</th>
                     <th>FECHA</th>
                     <th>USUARIO</th>
                     <th></th>
                </tr>

<?php $queryes = "SELECT * from estatus_s where cve_servicio='".$row[9]."' order by fecha desc";
  $resultes = $link->query($queryes);
  while($rowes=mysqli_fetch_row($resultes)){
    ?>
                <tr>
                  <td><?php switch($rowes[2]){
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
                  <td><?php echo $rowes[3]; ?></td>
                  <td><?php echo substr($rowes[4],8,2).'-'.substr($rowes[4],5,2).'-'.substr($rowes[4],0,4).'<br>'.substr($rowes[4],11,8); ?></td>
                  <td><?php 
  $queryus = "SELECT * from usuarios where id=".$rowes[5];
  $resultus = $link->query($queryus);
  $rowus=mysqli_fetch_row($resultus);

                  echo $rowus[3]; ?></td>
                   <?php  if($_SESSION['tipo_usuario']!='visor'){ ?><td><a class="btn btn-danger" onClick="eliminarComentario('<?php echo $rowes[0]; ?>','<?php echo $_GET['c']; ?>')"><i class="fa fa-fw fa-trash"></i></a></td><?php } ?>
                </tr>
                <?php } ?>

              </table>




</div>

  <div class="row col-lg-6">

 <div class="form-group col-lg-4">
                <label>ESTATUS</label>
                <select class="form-control select2" style="width: 100%;" name="estatus_s">
                  <option <?php if($row[99]==1){ ?> selected <?php } ?> value="1">Activo</option>
                  <option <?php if($row[99]==2){ ?> selected <?php } ?> value="2">Por Recolectar</option>
                  <option <?php if($row[99]==3){ ?> selected <?php } ?> value="3">Embodegamiento</option>
                  <option <?php if($row[99]==4){ ?> selected <?php } ?> value="4">En Aclaración</option>
                </select>
              </div>

              <?php  if($_SESSION['tipo_usuario']!='visor'){ ?>
<div class="form-group col-lg-8" >
               <label>COMENTARIO DE ESTATUS</label>
               <textarea name="comentarios_es" id="comentarios_es" autocomplete="off" style="text-transform: uppercase;" rows="5"  class="form-control"></textarea>
              </div>

</div>
<?php } ?>

</div>




<div class="row col-lg-12" style="text-align:right;">
<br>
<?php  if($_SESSION['tipo_usuario']!='visor'){ ?>
<button type="submit" value="Guardar" name="guardarcambios" id="guardarcambios" class="btn bg-blue" >Guardar</button>
<?php } ?>

<hr>
</div>


</form>



<hr>

<div class="row">
        <div class="col-xs-12">
          <div class="box">

 <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <h3>Otros Cargos Extras</h3>


<form method="POST" action="tareas.php?conta22=1&c=<? echo $_GET['c']; ?>" enctype="multipart/form-data">
<?php  if($_SESSION['tipo_usuario']!='visor'){ ?>

  <div class="form-group col-md-3" >
             <label>Concepto</label>
              <input name="concepto" id="concepto"  class="form-control" type="text"   >
    </div>
      <div class="form-group col-md-3" >
             <label>Cantidad</label>
              <input name="cantidad" id="cantidad" onKeyPress="return valida(event)" class="form-control" type="text"   >
    </div>

        <div class="form-group col-md-3">
           <label>Para</label>
           <select name="para"  class="form-control select2" >
           <option value="--">--</option>
           <option value="Proveedor">Proveedor</option>
           <option value="Cliente">Cliente</option>
           
          </select>
      </div>

    <div class="form-group col-md-3" >
             <label>&nbsp;</label>
               <button type="submit" class="form-control btn btn-primary"  name="guardarcargos">Guardar Cargo</button>
    </div>


<?php } ?>
              <table class="table table-hover">
                <tr>
                     <th>CONCEPTO</th>
                     <th>CANTIDAD</th>
                     <th>PARA</th>
                </tr>

<?php $queryce = "SELECT * from cargos_extra where cve_servicio='".$row[9]."'";
  $resultce = $link->query($queryce);
  $total_otros=0.0;
  while($rowce=mysqli_fetch_row($resultce)){ 
$total_otros=$total_otros+$rowce[3];
    ?>
                <tr>
                  <td><?php echo $rowce[2]; ?></td>
                  <td>$ <?php echo number_format($rowce[3],2); ?></td>
                  <td><?php echo $rowce[4]; ?></td>
                 <?php  if($_SESSION['tipo_usuario']!='visor'){ ?> <td><a class="btn btn-danger" onClick="eliminarCargo('<?php echo $rowce[0]; ?>','<?php echo $_GET['c']; ?>')"><i class="fa fa-fw fa-trash"></i></a></td>
                  </td>
                <?php } ?>
                
                </tr>
                <?php } ?>
<tr>
                  <td></td>
                  <td><strong>$ <?php echo number_format($total_otros,2); ?></strong></td>
                  <td></td>
                  <td></td>
                  </th>
                </tr>
              </table>

              



</form>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

<!--   /////////////////////////////////////////////////////////////////  -->


<div class="row">
        <div class="col-xs-12">
          <div class="box">

 <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <h3>Dscuentos</h3>


<form method="POST" action="tareas.php?conta22=1&c=<? echo $_GET['c']; ?>" enctype="multipart/form-data">
<?php  if($_SESSION['tipo_usuario']!='visor'){ ?>

  <div class="form-group col-md-3" >
             <label>Concepto</label>
              <input name="concepto" id="concepto"  class="form-control" type="text"   >
    </div>
      <div class="form-group col-md-3" >
             <label>Cantidad</label>
              <input name="cantidad" id="cantidad" onKeyPress="return valida(event)" class="form-control" type="text"   >
    </div>

<div class="form-group col-md-3">
           <label>Para</label>
           <select name="para"  class="form-control select2">
           <option value="--">--</option>
           <option value="Proveedor">Proveedor</option>
           <option value="Cliente">Cliente</option>
           
          </select>
      </div>

    <div class="form-group col-md-3" >
             <label>&nbsp;</label>
               <button type="submit" class="form-control btn btn-primary"  name="guardardescuento">Guardar Descuento</button>
    </div>


<?php } ?>
              <table class="table table-hover">
                <tr>
                     <th>CONCEPTO</th>
                     <th>CANTIDAD</th>
                     <th>PARA</th>
                </tr>

<?php $queryce = "SELECT * from descuentos where cve_servicio='".$row[9]."'";
  $resultce = $link->query($queryce);
  $total_otros=0.0;
  while($rowce=mysqli_fetch_row($resultce)){ 
$total_otros=$total_otros+$rowce[3];
    ?>
                <tr>
                  <td><?php echo $rowce[2]; ?></td>
                  <td>$ <?php echo number_format($rowce[3],2); ?></td>
                  <td><?php echo $rowce[4]; ?></td>
                 <?php  if($_SESSION['tipo_usuario']!='visor'){ ?> <td><a class="btn btn-danger" onClick="eliminarDescuento('<?php echo $rowce[0]; ?>','<?php echo $_GET['c']; ?>')"><i class="fa fa-fw fa-trash"></i></a></td>
                  </td>
                <?php } ?>
                
                </tr>
                <?php } ?>
<tr>
                  <td></td>
                  <td><strong>$ <?php echo number_format($total_otros,2); ?></strong></td>
                  <td></td>
                  <td></td>
                  </th>
                </tr>
              </table>

              



</form>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

<!--   /////////////////////////////////////////////////////////////////  -->


<div class="row">
        <div class="col-xs-12">
          <div class="box">

 <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <h3>Evidencias</h3>


<form method="POST" action="tareas.php?conta22=1&c=<? echo $_GET['c']; ?>" enctype="multipart/form-data">

<?php  if($_SESSION['tipo_usuario']!='visor'){ ?>
  <div class="form-group col-md-3" >
             <label>Concepto</label>
              <input name="concepto" id="concepto"  class="form-control" type="text"   >
    </div>
      <div class="form-group col-md-3" >
             <label>Archivo</label>
              <input name="archivo" id="archivo"  class="form-control" type="file"   >
    </div>

    <div class="form-group col-md-3" >
             <label>&nbsp;</label>
               <button type="submit" class="form-control btn btn-primary"  name="guardarevidencias">Guardar Evidencia</button>
    </div>
<?php } ?>


              <table class="table table-hover">
                <tr>
                     <th>CONCEPTO</th>
                     <th>ARCHIVO</th>
                </tr>

<?php $queryce = "SELECT * from evidencias where clave_servicio='".$row[9]."'";
  $resultce = $link->query($queryce);
  //echo $queryce.'<br>';
  while($rowce=mysqli_fetch_row($resultce)){ 

    ?>
                <tr>
                  <td><?php echo $rowce[5]; ?></td>
                  <td><a class="btn btn-success" href="archivos/<?php echo $rowce[3]; ?>" target="_blank">Ver Archivo</a></td>
                  <?php  if($_SESSION['tipo_usuario']!='visor'){ ?><td><a class="btn btn-danger" onClick="eliminarEvidencia('<?php echo $rowce[0]; ?>','<?php echo $_GET['c']; ?>')"><i class="fa fa-fw fa-trash"></i></a></td><?php } ?>
                </tr>
<?php } ?>

              </table>

              



</form>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>



<!--   /////////////////////////////////////////////////////////////////  -->



<hr>

<? 
  $querym = "SELECT * from ingresosyegresos where id_mudanza=".$row[0];
  $ingresos=0;
  $egresos=0;
  $resultm = $link->query($querym);
  while($rowm=mysqli_fetch_row($resultm)){ 
  if($rowm[2]==1){
    $ingresos=(float)$ingresos+(float)$rowm[6];
  }else{
    $egresos=(float)$egresos+(float)$rowm[6];
  }
  
  }
  
  ?>

<table style="width: 100%" cellspacing="0" cellpadding="0">
<tr>
<td style="background-color: #ab5408; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;">COSTOS <td>
<td style="background-color: #ab5408; color: #fff; padding: 1px; text-align: center; width: 75%; margin: 0px;">PAGOS DE CLIENTE<td>
</tr>
<tr>
<td style=" padding: 1px;"> 
<table style="margin: 0px; width: 100%;" border="1">
<tr>
<td style="background-color: #27635f; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;"><strong>COSTO CLIENTE</strong></td>
</tr>
<?php
if($row[92]=='SI'){
$sub=$row[42]+$row[21];
$iva=$sub *.16;
$ccli=$sub + $iva;
}else{
  $ccli=$row[42]+$row[21];
}
?>
<tr>
<td style=" padding: 1px; text-align: center; width: 25%; margin: 0px;"><?  echo money_format('%(#10n',$ccli); $cc=$ccli; ?></td>
</tr>
</table>
<td>
<td style=" padding: 1px;">

<table  style="margin: 0px; width: 100%;" border="1">
       <tr>
     
        <td style="background-color: #27635f; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;"><strong>Fecha de pago</strong></td>
        
        <td style="background-color: #27635f; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;"><strong>Forma de Pago</strong></td>
        <td style="background-color: #27635f; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;"><strong>Cantidad</strong></td>
        <td style="background-color: #27635f; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;"><strong>Restante</strong></td>
        <td style="background-color: #27635f; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;"><strong></strong></td>
        <td style="background-color: #27635f; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;"><strong>Comentario</strong></td>
        <td style="background-color: #27635f; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;">&nbsp;</td>
        </tr>
       <?
    
  $querym = "SELECT * from ingresosyegresos where referencia=1 and  id_mudanza=".$row[0];
$sum2=0.0;
  $cn=1;
  $resultm = $link->query($querym);
  while($rowm=mysqli_fetch_row($resultm)){
    if($rowm[2]==1){
      $refe="De Cliente"; 
      $c='#c8c8c6';
    }else{
      $refe="De Proveedor";
      $c='#dbdbdb';
    }
    $cc=$cc-$rowm[6];

    ?>
    <tr style="background:<? echo $c; ?>; height: 42px; vertical-align:middle; border:#5A5959 solid 1px; ">
        
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><? echo substr($rowm[3], 8, 2).'-'.substr($rowm[3], 5, 2).'-'.substr($rowm[3], 0, 4); ?></td>
  
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><? echo $rowm[4] . ' - '.$rowm[5]; ?></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><? $sum2=$sum2+$rowm[6]; echo money_format('%(#10n',$rowm[6]); ?></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><?  echo money_format('%(#10n',$cc); ?><? //echo $rowm[4]; ?></td>
      
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><a href="archivos/<? echo $rowm[8]; ?>" class="btn bg-blue" target="_blank" ><i class="fa fa-fw fa-file-text-o"></i></a></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><? echo $rowm[9]; ?></td>
        <?php  if($_SESSION['tipo_usuario']!='visor'){ ?>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><a href="tareas.php?conta=1&c=<? echo $_GET['c']; ?>&idmov=<? echo $rowm[0]; ?>#modmonto" class="btn bg-green"><i class="fa fa-fw fa-edit"></i></a></td>
         <td style="vertical-align:middle; padding: 1px; text-align: center; "><a href="tareas.php?conta=1&c=<? echo $_GET['c']; ?>&id=<? echo $rowm[0]; ?>&elimov=1" class="btn bg-red" ><i class="fa fa-fw fa-trash"></i></a></td>
       <?php } ?>
        </tr>
        <?
  }
     ?>
     <tr style="background:<? echo $c; ?>; height: 42px; vertical-align:middle; border:#5A5959 solid 1px; ">
        
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><strong>Total</strong></td>
  
        <td style="vertical-align:middle; padding: 1px; text-align: center; "></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><strong><? echo money_format('%(#10n',$sum2); ?></strong></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><strong><?php $totr=$ccli-$sum2; echo money_format('%(#10n',$totr); ?></strong></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "></td>
        </tr>
     </table> 


 <td>

</table>




<table style="width: 100%" cellspacing="0" cellpadding="0">
<tr>
<td style="background-color: #ab5408; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;">COSTOS <td>
<td style="background-color: #ab5408; color: #fff; padding: 1px; text-align: center; width: 75%; margin: 0px;">PAGOS PROVEEDOR<td>
</tr>
<tr>
<td style=" padding: 1px;"> 
<table style="margin: 0px; width: 100%;" border="1">
<tr>
<td style="background-color: #27635f; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;"><strong>COSTO PROVEEDOR</strong></td>
</tr>
<tr>
<td style=" padding: 1px; text-align: center; width: 25%; margin: 0px;"><? $cprov=$otros_gastos; echo money_format('%(#10n',$cprov); $cc=$cprov; ?></td>
</tr>
</table>
<td>
<td style=" padding: 1px;">

<table  style="margin: 0px; width: 100%;" border="1">
       <tr>
     
        <td style="background-color: #27635f; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;"><strong>Fecha de pago</strong></td>
        
        <td style="background-color: #27635f; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;"><strong>Forma de Pago</strong></td>
        <td style="background-color: #27635f; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;"><strong>Cantidad</strong></td>
        <td style="background-color: #27635f; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;"><strong>Restante</strong></td>
        <td style="background-color: #27635f; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;"><strong></strong></td>
        <td style="background-color: #27635f; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;"><strong>Comentario</strong></td>
        <td style="background-color: #27635f; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;">&nbsp;</td>
        </tr>
       <?
   
  $querym = "SELECT * from ingresosyegresos where referencia=2 and  id_mudanza=".$row[0];

  $cn=1;
  $sum2=0.0;
  $sum22=0.0;
   $resultm = $link->query($querym);
  while($rowm=mysqli_fetch_row($resultm)){
    if($rowm[2]==1){
      $refe="De Cliente"; 
      $c='#c8c8c6';
    }else{
      $refe="De Proveedor";
      $c='#dbdbdb';
    }
    $cc=$cc-$rowm[6];

    ?>
    <tr style="background:<? echo $c; ?>; height: 42px; vertical-align:middle; border:#5A5959 solid 1px; ">
        
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><? echo substr($rowm[3], 8, 2).'-'.substr($rowm[3], 5, 2).'-'.substr($rowm[3], 0, 4); ?></td>
  
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><? echo $rowm[4] . ' - '.$rowm[5]; ?></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><?  $sum2=$sum2+$rowm[6]; echo money_format('%(#10n',$rowm[6]); ?></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><?  $sum22=$sum22+$cc;  echo money_format('%(#10n',$cc); ?><? //echo $rowm[4]; ?></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><a href="archivos/<? echo $rowm[8]; ?>" class="btn bg-blue" target="_blank" ><i class="fa fa-fw fa-file-text-o"></i></a></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><? echo $rowm[9]; ?></td>
        <?php  if($_SESSION['tipo_usuario']!='visor'){ ?>
       <td style="vertical-align:middle; padding: 1px; text-align: center; "><a href="tareas.php?conta=1&c=<? echo $_GET['c']; ?>&idmov=<? echo $rowm[0]; ?>#modmonto" class="btn bg-green"><i class="fa fa-fw fa-edit"></i></a></td>
         <td style="vertical-align:middle; padding: 1px; text-align: center; "><a href="tareas.php?conta=1&c=<? echo $_GET['c']; ?>&id=<? echo $rowm[0]; ?>&elimov=1" class="btn bg-red" ><i class="fa fa-fw fa-trash"></i></a></td>
       <?php } ?>
        </tr>
        <?
  }
     ?>
     <tr style="background:<? echo $c; ?>; height: 42px; vertical-align:middle; border:#5A5959 solid 1px; ">
        
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><strong>Total</strong></td>
  
        <td style="vertical-align:middle; padding: 1px; text-align: center; "></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><strong><? echo money_format('%(#10n',$sum2); ?></strong></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><strong><?php $totr=$cprov-$sum2; echo money_format('%(#10n',$totr); ?></strong></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "></td>
        </tr>
     </table> 


 <td>

</table>


<table style="width: 100%" cellspacing="0" cellpadding="0">
<tr>
<td style="background-color: #ab5408; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;">COSTOS <td>
<td style="background-color: #ab5408; color: #fff; padding: 1px; text-align: center; width: 75%; margin: 0px;">PAGOS DE CLIENTE<td>
</tr>
<tr>
<td style=" padding: 1px;"> 
<table style="margin: 0px; width: 100%;" border="1">
<tr>
<td style="background-color: #27635f; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;"><strong>SEGURO CLIENTE</strong></td>
</tr>
<tr>
<td style=" padding: 1px; text-align: center; width: 25%; margin: 0px;"><? $sccli=$row[100]; echo money_format('%(#10n',$sccli); $scc=$sccli; ?></td>
</tr>
</table>
<td>
<td style=" padding: 1px;">

<table  style="margin: 0px; width: 100%;" border="1">
       <tr>
     
        <td style="background-color: #27635f; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;"><strong>Fecha de pago</strong></td>
        
        <td style="background-color: #27635f; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;"><strong>Forma de Pago</strong></td>
        <td style="background-color: #27635f; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;"><strong>Cantidad</strong></td>
        <td style="background-color: #27635f; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;"><strong>Restante</strong></td>
        <td style="background-color: #27635f; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;"><strong></strong></td>
        <td style="background-color: #27635f; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;"><strong>Comentario</strong></td>
        <td style="background-color: #27635f; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;">&nbsp;</td>
        </tr>
       <?
    
  $querym = "SELECT * from ingresosyegresos where referencia=3 and  id_mudanza=".$row[0];

  $cn=1;
  $sum2=0.0;
  $sum22=0.0;
 $resultm = $link->query($querym);
  while($rowm=mysqli_fetch_row($resultm)){
    if($rowm[2]==1){
      $refe="De Cliente"; 
      $c='#c8c8c6';
    }else{
      $refe="De Proveedor";
      $c='#dbdbdb';
    }
    $scc=$scc-$rowm[6];

    ?>
    <tr style="background:<? echo $c; ?>; height: 42px; vertical-align:middle; border:#5A5959 solid 1px; ">
        
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><? echo substr($rowm[3], 8, 2).'-'.substr($rowm[3], 5, 2).'-'.substr($rowm[3], 0, 4); ?></td>
  
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><? echo $rowm[4] . ' - '.$rowm[5]; ?></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><? $sum2=$sum2+$rowm[6]; echo money_format('%(#10n',$rowm[6]); ?></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><? $sum22=$sum22+$scc; echo money_format('%(#10n',$scc); ?><? //echo $rowm[4]; ?></td>
        
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><a href="archivos/<? echo $rowm[8]; ?>" class="btn bg-blue" target="_blank" ><i class="fa fa-fw fa-file-text-o"></i></a></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><? echo $rowm[9]; ?></td>
        <?php  if($_SESSION['tipo_usuario']!='visor'){ ?>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><a href="tareas.php?conta=1&c=<? echo $_GET['c']; ?>&idmov=<? echo $rowm[0]; ?>#modmonto" class="btn bg-green"><i class="fa fa-fw fa-edit"></i></a></td>
         <td style="vertical-align:middle; padding: 1px; text-align: center; "><a href="tareas.php?conta=1&c=<? echo $_GET['c']; ?>&id=<? echo $rowm[0]; ?>&elimov=1" class="btn bg-red" ><i class="fa fa-fw fa-trash"></i></a></td>
       <?php } ?>
        </tr>
        <?
  }
     ?>
     <tr style="background:<? echo $c; ?>; height: 42px; vertical-align:middle; border:#5A5959 solid 1px; ">
        
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><strong>Total</strong></td>
  
        <td style="vertical-align:middle; padding: 1px; text-align: center; "></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><strong><? echo money_format('%(#10n',$sum2); ?></strong></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><strong><?php $totr=$sccli-$sum2; echo money_format('%(#10n',$totr); ?></strong></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "></td>
        </tr>
     </table> 


 <td>

</table>







<table style="width: 100%" cellspacing="0" cellpadding="0">
<tr>
<td style="background-color: #ab5408; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;">COSTOS <td>
<td style="background-color: #ab5408; color: #fff; padding: 1px; text-align: center; width: 75%; margin: 0px;">PAGOS PROVEEDOR<td>
</tr>
<tr>
<td style=" padding: 1px;"> 
<table style="margin: 0px; width: 100%;" border="1">
<tr>
<td style="background-color: #27635f; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;"><strong>COSTO SEGURO PROVEEDOR</strong></td>
</tr>
<tr>
<td style=" padding: 1px; text-align: center; width: 25%; margin: 0px;"><? $cprov=$row[82]; echo money_format('%(#10n',$cprov); $spcc=$cprov; ?></td>
</tr>
</table>
<td>
<td style=" padding: 1px;">

<table  style="margin: 0px; width: 100%;" border="1">
       <tr>
     
        <td style="background-color: #27635f; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;"><strong>Fecha de pago</strong></td>
        
        <td style="background-color: #27635f; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;"><strong>Forma de Pago</strong></td>
        <td style="background-color: #27635f; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;"><strong>Cantidad</strong></td>
        <td style="background-color: #27635f; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;"><strong>Restante</strong></td>
        <td style="background-color: #27635f; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;"><strong></strong></td>
        <td style="background-color: #27635f; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;"><strong>Comentario</strong></td>
        <td style="background-color: #27635f; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;">&nbsp;</td>
        </tr>
       <?
   
  $querym = "SELECT * from ingresosyegresos where referencia=4 and  id_mudanza=".$row[0];

  $cn=1;
   $resultm = $link->query($querym);
   $sum2=0.0;
  $sum22=0.0;
  while($rowm=mysqli_fetch_row($resultm)){
    if($rowm[2]==1){
      $refe="De Cliente"; 
      $c='#c8c8c6';
    }else{
      $refe="De Proveedor";
      $c='#dbdbdb';
    }
    $spcc=$spcc-$rowm[6];

    ?>
    <tr style="background:<? echo $c; ?>; height: 42px; vertical-align:middle; border:#5A5959 solid 1px; ">
        
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><? echo substr($rowm[3], 8, 2).'-'.substr($rowm[3], 5, 2).'-'.substr($rowm[3], 0, 4); ?></td>
  
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><? echo $rowm[4] . ' - '.$rowm[5]; ?></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><?  $sum2=$sum2+$rowm[6]; echo money_format('%(#10n',$rowm[6]); ?></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><? $sum22=$sum22+$spcc; echo money_format('%(#10n',$spcc); ?><? //echo $rowm[4]; ?></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><a href="archivos/<? echo $rowm[8]; ?>" class="btn bg-blue" target="_blank" ><i class="fa fa-fw fa-file-text-o"></i></a></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><? echo $rowm[9]; ?></td>
        <?php  if($_SESSION['tipo_usuario']!='visor'){ ?>
       <td style="vertical-align:middle; padding: 1px; text-align: center; "><a href="tareas.php?conta=1&c=<? echo $_GET['c']; ?>&idmov=<? echo $rowm[0]; ?>#modmonto" class="btn bg-green"><i class="fa fa-fw fa-edit"></i></a></td>
         <td style="vertical-align:middle; padding: 1px; text-align: center; "><a href="tareas.php?conta=1&c=<? echo $_GET['c']; ?>&id=<? echo $rowm[0]; ?>&elimov=1" class="btn bg-red" ><i class="fa fa-fw fa-trash"></i></a></td>
       <?php } ?>
        </tr>
        <?
  }
     ?>
      <tr style="background:<? echo $c; ?>; height: 42px; vertical-align:middle; border:#5A5959 solid 1px; ">
        
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><strong>Total</strong></td>
  
        <td style="vertical-align:middle; padding: 1px; text-align: center; "></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><strong><? echo money_format('%(#10n',$sum2); ?></strong></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><strong><?php $totr=$cprov-$sum2; echo money_format('%(#10n',$totr); ?></strong></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "></td>
        </tr>
     </table> 


 <td>

</table>

       <hr>
<?php  if($_SESSION['tipo_usuario']!='visor'){ ?>

       <? if(isset($_GET['idmov'])){
		  ?> <h3 id="modmonto">Modificar Pago</h3><? 
	   }else{
		  ?> <h3>Agregar Pago</h3><? 
	   }?>
      
	        <form method="POST" action="tareas.php?conta=1&c=<? echo $_GET['c']; ?>" enctype="multipart/form-data">
            <? if(isset($_GET['idmov'])){
				
			
			$querym = "SELECT * from ingresosyegresos where id=".$_GET['idmov'];
      $resultmm = $link->query($querym);
			$rowmm=mysqli_fetch_row($resultmm);
			?><input type="hidden" name="id_movi" id="id_movi" value="<? echo $rowmm[0]; ?>"/><?
			
			}
			?>
              <input type="hidden" name="id_general" id="id_general" value="<? echo $row[0]; ?>"/>
                      <fieldset>
                      

                  <div class="form-group col-lg-3">
                      <label>Referencia</label>
                     <select class="form-control select2"  id="referencia" name="referencia" >
                     <option value="--">--</option>
                     <option <? if(isset($_GET['idmov'])){ if($rowmm[2]==1){ ?> selected <? } } ?>value="1">De Cliente</option>
                     <option <? if(isset($_GET['idmov'])){ if($rowmm[2]==2){ ?> selected <? } } ?>value="2">A Proveedor</option>
                     <option <? if(isset($_GET['idmov'])){ if($rowmm[2]==3){ ?> selected <? } } ?>value="3">Seguro Cliente</option>
                     <option <? if(isset($_GET['idmov'])){ if($rowmm[2]==4){ ?> selected <? } } ?>value="4">Seguro Proveedor</option>
                    </select>
                  </div>
                    

<div class="form-group col-lg-3">
               <label>PROVEEDOR</label>
               <select class="form-control select2" id="proveedor" name="proveedor" >
                  <option value="0">--</option>
                  <?php
  $queryp = "select * FROM proveedores where id in(".$row[40].','.$row[87].','.$row[88].")";
  $resultp = $link->query($queryp);
while ($rowp = mysqli_fetch_row($resultp)){
  ?>

<option  <? if(isset($_GET['idmov'])){ if($rowmm[10]==$rwop[0]){ ?> selected <? } } ?>value="<? echo $rowp[0]; ?>"><? echo htmlentities($rowp[1]).' '.htmlentities($rowp[2]).' - '.$rowp[6] ; ?></option>
<? } ?>

                </select>
              </div>


                   <div class="form-group col-lg-3">
                      <label>Fecha de Pago</label>

<div class="input-group">
               
                  <input class="form-control" autocomplete="off"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask maxlength="10" type="text" name="fsalida" id="fsalida" <? if(isset($regre)){ ?> value="<? echo $_POST['fsalida']; ?>" <? } ?><? if(isset($_GET['idmov'])){ ?> value="<? echo substr($rowmm[3], 8, 2).'-'.substr($rowmm[3], 5, 2).'-'.substr($rowmm[3], 0, 4); ?>" <? } ?>>
                </div>

                  </div>
                  

                      
                   <div class="form-group col-lg-3">
                    <label>Tipo</label>
                    <select class="form-control select2"  id="tipo" name="tipo" onchange="javascript:cambiartipo(this)">
                     <option value="--">--</option>
                     <option <? if(isset($_GET['idmov'])){ if($rowmm[4]=='BANCO'){ ?> selected <? } } ?> value="BANCO">BANCO</option>
                     <option <? if(isset($_GET['idmov'])){ if($rowmm[4]=='EFECTIVO'){ ?> selected <? } } ?> value="EFECTIVO">EFECTIVO</option>
                     <option <? if(isset($_GET['idmov'])){ if($rowmm[4]=='SALDO A FAVOR'){ ?> selected <? } } ?> value="SALDO A FAVOR">SALDO A FAVOR</option>
                    </select>
                  </div>
              

                    
                    
                     <div id="bancodiv" <? if(isset($_GET['idmov'])){ if($rowmm[4]=='EFECTIVO'){ ?> style="display:none" <? }}else{ ?> style="display:none" <? }  ?>>
                    

                   <div class="form-group col-lg-3">
                         <label>Banco</label>
                         <select  class="form-control select2"   name="bancob" style="width: 200px;" >
                         <option value="--">--</option>
                         <option <? if(isset($_GET['idmov'])){ if($rowmm[5]=='TC'){ ?> selected <? } } ?> value="TC">TC</option>
                         <option <? if(isset($_GET['idmov'])){ if($rowmm[5]=='BBVA'){ ?> selected <? } } ?> value="BBVA">BBVA</option>
                         <option <? if(isset($_GET['idmov'])){ if($rowmm[5]=='BANAMEX'){ ?> selected <? } } ?> value="BANAMEX">BANAMEX</option>
                         <option <? if(isset($_GET['idmov'])){ if($rowmm[5]=='INBURSA'){ ?> selected <? } } ?> value="INBURSA">INBURSA</option>
                         <option <? if(isset($_GET['idmov'])){ if($rowmm[5]=='BAN BAJIO'){ ?> selected <? } } ?> value="BAN BAJIO">BAN BAJIO</option>
                         <option <? if(isset($_GET['idmov'])){ if($rowmm[5]=='OTRO'){ ?> selected <? } } ?> value="OTRO">OTRO</option>
                         <option <? if(isset($_GET['idmov'])){ if($rowmm[5]=='PAGO A CUENTA PROVEEDOR'){ ?> selected <? } } ?> value="PAGO A CUENTA PROVEEDOR">PAGO A CUENTA PROVEEDOR</option>
                        </select>
                      </div>
                        
                            
                  <div class="form-group col-lg-3">
                    <label>Cantidad</label>
                    <input type="text" name="cantidadb" id="cantidadb" class="form-control" onkeypress="return valida(event)"   <? if(isset($_GET['idmov'])){ ?> value="<? echo $rowmm[6]; ?>" <? } ?>/>
                  </div>
                   
<div class="form-group col-lg-3">
                    <label>Evidencia</label>
                   <input type="file" id="evidb" name="evidb">
                  </div>
<div class="form-group col-lg-3">
                    <label>Comentario</label>
                    <input type="text" name="comentariodb" id="comentariodb" class="form-control" <? if(isset($_GET['idmov'])){ ?> value="<? echo $rowmm[9]; ?>" <? } ?>/>
                  </div>
                      
              <div class="form-group col-lg-3">
                   <? if(isset($_GET['idmov'])){
						?><button type="submit" value="Actualizar" name="actualizarmov" id="actualizarmov" class="btn bg-blue" >Actualizar</button><?
					}else{
						?><button type="submit" value="Guardar" name="guardarmov" id="guardarmov" class="btn bg-blue" >Guardar</button><?
					}
					?>
                </div>
                   

                    </div>
                    <div id="efectivodiv" <? if(isset($_GET['idmov'])){  if($rowmm[4]=='BANCO'){ ?> style="display:none" <? } }else{ ?> style="display:none" <? } ?>>
                 <div class="form-group col-lg-3">

                         <label>Efectivo</label>
                         <select name="bancoe"  class="form-control select2" style="width: 200px;" >
                         <option value="--">--</option>
                         <option <? if(isset($_GET['idmov'])){ if($rowmm[5]=='EFECTIVO CHOFER'){ ?> selected <? } } ?> value="EFECTIVO CHOFER">EFECTIVO CHOFER</option>
                         <option <? if(isset($_GET['idmov'])){ if($rowmm[5]=='EFECTIVO SUCURSAL'){ ?> selected <? } } ?> value="EFECTIVO SUCURSAL">EFECTIVO SUCURSAL</option>
                         <option <? if(isset($_GET['idmov'])){ if($rowmm[5]=='CAJA CHICA'){ ?> selected <? } } ?> value="CAJA CHICA">CAJA CHICA</option>
                         <option <? if(isset($_GET['idmov'])){ if($rowmm[5]=='OTRO'){ ?> selected <? } } ?> value="OTRO">OTRO</option>
                        </select>
                         </div>
<div class="form-group col-lg-3">
                    <label>Cantidad</label>
                    <input type="text" name="cantidade" id="cantidade" class="form-control" onkeypress="return valida(event)"  <? if(isset($_GET['idmov'])){ ?> value="<? echo $rowmm[6]; ?>" <? } ?>/>
                  </div>

                <div class="form-group col-lg-3">
                    <label>Evidencia</label>
                   <input type="file" id="evide" name="evide">
                  </div>

                 <div class="form-group col-lg-3">
                    <label>Comentario</label>
                    <input type="text" name="comentariode" id="comentariode" class="form-control" <? if(isset($_GET['idmov'])){ ?> value="<? echo $rowmm[9]; ?>" <? } ?>/>
                  </div>
                    
                 <div class="form-group col-lg-3">
                    <? if(isset($_GET['idmov'])){
						?>
            <button type="submit" value="Actualizar" name="actualizarmov" id="actualizarmov" class="btn bg-blue" >Actualizar</button>
            <?
					}else{
						?>
            <button type="submit" value="Guardar" name="guardarmov2" id="guardarmov2" class="btn bg-blue" >Guardar</button>
            <?
					}
					?>
                       
                </div>
                    

                    </div>
      </fieldset>
</form>
     
<?php } ?>

   </div>
 </div>


 <script>
function eliminarCargo(d,c){
//tareas.php?bu=20&eli=1
var opcion = confirm("¿Seguro que quieres eliminar este Cargo?");
    if (opcion == true) {
      location.href='tareas.php?conta22&eli=1&id='+d+'&c='+c;
  } 

}

function eliminarDescuento(d,c){
//tareas.php?bu=20&eli=1
var opcion = confirm("¿Seguro que quieres eliminar este Descuento?");
    if (opcion == true) {
      location.href='tareas.php?conta22&elides=1&id='+d+'&c='+c;
  } 

}


function eliminarComentario(d,c){
//tareas.php?bu=20&eli=1
var opcion = confirm("¿Seguro que quieres eliminar este Cargo?");
    if (opcion == true) {
      location.href='tareas.php?conta22&elicom=1&id='+d+'&c='+c;
  } 

}

function eliminarEvidencia(d,c){
//tareas.php?bu=20&eli=1
var opcion = confirm("¿Seguro que quieres eliminar esta Evidencia?");
    if (opcion == true) {
      location.href='tareas.php?conta22&elievi=1&id='+d+'&c='+c;
  } 

}

</script>