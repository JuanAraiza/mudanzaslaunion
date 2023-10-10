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

<? include('config.php'); 

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

      $c1=$_POST['id_movi'];
      $ce1=$_POST['clave_serv'];
$ce2=date('Y-m-d H-i-s');
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
      
      $csql = "update servicio set seguro='".$campo1."',seguro_prov='".$campo2."',costoproveedor='".$campo3."',costocliente='".$campo4."',material_e ='".$campo5."',emplaye_tt='".$campo6."',empaque_t='".$campo7."',desempaque_t='".$campo8."',supervision='".$campo9."',factura_prov='".$campo10."',factura_cliente='".$campo11."',persona_fc='".$campo12."',fecha_s='".$campo13."',hora_s='".$campo14."',evidencia_carga='".$campo15."',evidencia_descarga='".$campo16."',firma_conformidad='".$campo17."',factura_a_p='".$campo18."',factura_a_c='".$campo19."',razon_s_c='".$campo20."' where id=".$_POST['id_movi'];  
   // echo $csql.'<br>';
     $link->query($csql);
       ?>
<script language="JavaScript" type="text/javascript">
location.href="tareas.php?conta=1&c=<? echo $_GET['c']; ?>";
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
      
      $csql = "update ingresosyegresos set referencia=".$campo2.",fecha='".$campo3."',tipo='".$campo4."',banco='".$campo5."',cantidad='".$campo6."',usuario='".$campo7."' where id=".$campo1;  
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

      
      //echo "INSERT INTO ingresosyegresos(id_mudanza,referencia,fecha,tipo,banco,cantidad,usuario) VALUES (".$campo1.",".$campo2.",'".$campo3."','".$campo4."','".$campo5."','".$campo6."','".$campo7."')<br>";  
      $csql = "INSERT INTO ingresosyegresos(id_mudanza,referencia,fecha,tipo,banco,cantidad,usuario,archivo,comentario) VALUES (".$campo1.",".$campo2.",'".$campo3."','".$campo4."','".$campo5."','".$campo6."','".$campo7."','".$campo8."','".$campo9."')";  
       
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
      
      $campo7=$_SESSION['id_user'];
      //echo "INSERT INTO ingresosyegresos(id_mudanza,referencia,fecha,tipo,banco,cantidad,usuario) VALUES (".$campo1.",".$campo2.",'".$campo3."','".$campo4."','".$campo5."','".$campo6."','".$campo7."')<br>";  
      $csql = "INSERT INTO ingresosyegresos(id_mudanza,referencia,fecha,tipo,banco,cantidad,usuario,archivo,comentario) VALUES (".$campo1.",".$campo2.",'".$campo3."','".$campo4."','".$campo5."','".$campo6."','".$campo7."','".$campo8."','".$campo9."')";  
       
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

  <form method="POST" action="tareas.php?conta=1&c=<? echo $_GET['c']; ?>" enctype="multipart/form-data">
    <input type="hidden" name="id_movi" id="id_movi" value="<? echo $row[0]; ?>"/>
    <input type="hidden" name="clave_serv" id="clave_serv" value="<? echo $row[9]; ?>"/>





    
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
<td style=" padding: 1px;"><? echo $row[1]; ?></td>
      </tr>
 <tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">TIPO DE SERVICIO</td>
<td style=" padding: 1px;"><table style="margin: 0px; width: 100%;" border="1">
    <tr>
<td style="text-align: center; padding: 1px; width: 50%;"><? echo $row[4];   ?></td>
<td style="text-align: center; padding: 1px; width: 50%;"></td>
    </tr>
  </table></td>
      </tr>

      <tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">PROVEEDORES</td>
<td style=" padding: 1px;"><table style="margin: 0px; width: 100%;" border="1">
    <tr>
<td style="text-align: center; padding: 1px; width: 50%;"><? 
  $query = "SELECT * from proveedores where id=".$row[40];
  $resultp = $link->query($query);
  $rowp=mysqli_fetch_row($resultp);
     
     echo $rowp[1]; ?></td>
<td style="text-align: center; padding: 1px; width: 50%;"></td>
    </tr>
  </table></td>
      </tr>
      <tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">FOLIO APP LA UNION</td>
<td style=" padding: 1px;"><table style="margin: 0px; width: 100%;" border="1">
    <tr>
<td style="text-align: center; padding: 1px; width: 50%;"><? echo $row[0];   ?></td>
<td style="text-align: center; padding: 1px; width: 50%;"></td>
    </tr>
  </table></td>
      </tr>
      <tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">TIEMPO DE ENTREGA</td>
<td style=" padding: 1px;"><table style="margin: 0px; width: 100%;" border="1">
    <tr>
<td style="text-align: center; padding: 1px; width: 50%;"><? echo $row[38]; ?></td>
<td style="text-align: center; padding: 1px; width: 50%;"></td>
    </tr>
  </table></td>
      </tr>

<tr>
<td style="background-color: #1ea521; color: #fff; text-align: center; padding: 1px;">COSTOS</td>
<td style="padding: 1px;">
  
</td>
      </tr>

      <tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">MONTO ASEGURADO</td>
<td style=" padding: 1px;"><table style="margin: 0px; width: 100%;" border="1">
    <tr>
<td style="text-align: center; padding: 1px; width: 50%;">$ <input type="text" name="seguro_sp" class="form-control" onkeypress="return valida(event)" value="<? echo $row[19]; ?>" style="width: 90%; float: right; padding: 0px; margin: 0px; height: 22px;" ></td>
<td style="text-align: center; padding: 1px; width: 50%;"></td>
    </tr>
  </table></td>
      </tr>
       
      <tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">COSTO SEGURO CLIENTE</td>
<td style=" padding: 1px;"><table style="margin: 0px; width: 100%;" border="1">
    <tr>
<td style=" padding: 1px; width: 50%;">&nbsp;&nbsp;$ &nbsp;<?php if($row[100]>=1){ echo number_format($row[100], 2);

}else{ echo '0.00'; } ?></td>
<td style="text-align: center; padding: 1px; width: 50%;"></td>
    </tr>
  </table></td>
      </tr>
      <tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">POLIZA REGURO</td>
<td style=" padding: 1px;"><table style="margin: 0px; width: 100%;" border="1">
    <tr>
    <td style="text-align: center; padding: 1px; width: 50%;">$ <input type="text" name="poliza_s" class="form-control" onkeypress="return valida(event)" value="<? echo $row[119]; ?>" style="width: 90%; float: right; padding: 0px; margin: 0px; height: 22px;" ></td>

<td style="text-align: center; padding: 1px; width: 50%;"></td>
    </tr>
  </table></td>
      </tr>
      <tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">COSTO SEGURO PROV</td>
<td style=" padding: 1px;"><table style="margin: 0px; width: 100%;" border="1">
    <tr>
<td style=" padding: 1px; width: 50%;">&nbsp;&nbsp;$ &nbsp;<?php if($row[82]>=1){ echo number_format($row[82], 2);

}else{ echo '0.00'; } ?></td>
<td style="text-align: center; padding: 1px; width: 50%;"></td>
    </tr>
  </table></td>
      </tr>
      <tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">COSTO FLETE PROVEEDOR</td>
<td style=" padding: 1px;"><table style="margin: 0px; width: 100%;" border="1">
    <tr>
<td style="text-align: center; padding: 1px; width: 50%;">$ <input type="text" name="costo_prov" class="form-control" onkeypress="return valida(event)" value="<? echo $row[43]; ?>" style="width: 90%; float: right; padding: 0px; margin: 0px; height: 22px;" ></td>
<td style="text-align: center; padding: 1px; width: 50%;"></td>
    </tr>
  </table></td>
      </tr>
      <tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">COSTO FLETE LA UNION</td>
<td style=" padding: 1px;"><table style="margin: 0px; width: 100%;" border="1">
    <tr>
<td style="text-align: center; padding: 1px; width: 50%;">$ <input type="text" name="costo_un" class="form-control" onkeypress="return valida(event)" value="<? echo $row[42]; ?>" style="width: 90%; float: right; padding: 0px; margin: 0px; height: 22px;" ></td>
<td style="text-align: center; padding: 1px; width: 50%;"></td>
    </tr>
  </table></td>
      </tr>
      <tr>
<td style="background-color: #1ea521; color: #fff; text-align: center; padding: 1px;">COMISIONES</td>
<td style=" padding: 1px;">
  
</td>
      </tr>
      <tr>
<td style="background-color: #d2aa97; color: #fff; text-align: center; padding: 1px;">MATERIAL DE EMPAQUE</td>
<td style=" padding: 1px;">
  <table style="margin: 0px; width: 100%;" border="1">
    <tr>
<td style="text-align: center; padding: 1px; width: 50%;">$ <input type="text" name="material_e" class="form-control" onkeypress="return valida(event)" value="<? echo $row[71]; ?>" style="width: 90%; float: right; padding: 0px; margin: 0px; height: 22px;" ></td>
<td style="text-align: center; padding: 1px; width: 50%;"></td>
    </tr>
  </table>
</td>
      </tr>
      <tr>
<td style="background-color: #d2aa97; color: #fff; text-align: center; padding: 1px;">EMPLAYE TOTAL</td>
<td style=" padding: 1px;"><table style="margin: 0px; width: 100%;" border="1">
    <tr>
<td style="text-align: center; padding: 1px; width: 50%;">$ <input type="text" name="emplaye_tt" class="form-control" onkeypress="return valida(event)" value="<? echo $row[72]; ?>" style="width: 90%; float: right; padding: 0px; margin: 0px; height: 22px;" ></td>
<td style="text-align: center; padding: 1px; width: 50%;"></td>
    </tr>
  </table></td>
      </tr>
      <tr>
<td style="background-color: #d2aa97; color: #fff; text-align: center; padding: 1px;">EMPAQUE</td>
<td style=" padding: 1px;"><table style="margin: 0px; width: 100%;" border="1">
    <tr>
<td style="text-align: center; padding: 1px; width: 50%;">$ <input type="text" name="empaque_t" class="form-control" onkeypress="return valida(event)" value="<? echo $row[73]; ?>" style="width: 90%; float: right; padding: 0px; margin: 0px; height: 22px;" ></td>
<td style="text-align: center; padding: 1px; width: 50%;"></td>
    </tr>
  </table></td>
      </tr>
      <tr>
<td style="background-color: #d2aa97; color: #fff; text-align: center; padding: 1px;">DESEMPAQUE</td>
<td style=" padding: 1px;"><table style="margin: 0px; width: 100%;" border="1">
    <tr>
<td style="text-align: center; padding: 1px; width: 50%;">$ <input type="text" name="desempaque_t" class="form-control" onkeypress="return valida(event)" value="<? echo $row[74]; ?>" style="width: 90%; float: right; padding: 0px; margin: 0px; height: 22px;" ></td>
<td style="text-align: center; padding: 1px; width: 50%;"></td>
    </tr>
  </table></td>
      </tr>
      <tr>
<td style="background-color: #d2aa97; color: #fff; text-align: center; padding: 1px;">SUPERVISION</td>
<td style=" padding: 1px;"><table style="margin: 0px; width: 100%;" border="1">
    <tr>
<td style="text-align: center; padding: 1px; width: 50%;">$ <input type="text" name="supervision" class="form-control" onkeypress="return valida(event)" value="<? echo $row[75]; ?>" style="width: 90%; float: right; padding: 0px; margin: 0px; height: 22px;" ></td>
<td style="text-align: center; padding: 1px; width: 50%;"></td>
    </tr>
  </table></td>
      </tr>
      <tr>
<td style="background-color: #1ea521; color: #fff; text-align: center; padding: 1px;">GANANCIA PURA</td>
<td style=" padding: 1px;">$ <? 
$ganse=$row[100]-$row[82];
$ganclien=$row[42]-$row[43];
echo number_format($ganse+$ganclien); ?></td>
      </tr>
      <!--<tr>
<td style="background-color: #ab5408; color: #fff; text-align: center; padding: 1px;">FACTURA DEL SEVICIO PROV</td>
<td style=" padding: 1px;"><table style="margin: 0px; width: 100%;" border="1">
    <tr>
<td style="text-align: center; padding: 1px; width: 50%;">
<select class="form-control select2" style=" float: right; padding: 0px; margin: 0px; height: 22px; width: 50px;"  name="factura_prov" id="factura_prov">
                 <option <? if($row[76]=='NO'){ ?> selected <? } ?> value="NO">NO</option>
    <option <? if($row[76]=='SI'){ ?> selected <? } ?> value="SI">SI</option>
                </select>
              </div></td>
<td style="text-align: center; padding: 1px; width: 50%;">
  <input type="text" name="factura_a_p" class="form-control"  value="<? echo $row[84]; ?>" style="width: 100%; float: right; padding: 0px; margin: 0px; height: 22px;" placeholder="A Nombre de" >

</td>
    </tr>
  </table></td>
      </tr>
      <tr>
<td style="background-color: #ab5408; color: #fff; text-align: center; padding: 1px;">FACTURA DEL SERVI CLIENTE</td>
<td style=" padding: 1px;"><table style="margin: 0px; width: 100%;" border="1">
    <tr>
<td style="text-align: center; padding: 1px; width: 50%;">
<select class="form-control select2" style=" float: right; padding: 0px; margin: 0px; height: 22px; width: 50px;"  name="factura_cliente" id="factura_cliente">
                  <option <? if($row[77]=='NO'){ ?> selected <? } ?> value="NO">NO</option>
    <option <? if($row[77]=='SI'){ ?> selected <? } ?> value="SI">SI</option>
                </select>
              </div></td>
<td style="text-align: center; padding: 1px; width: 50%;">
  <input type="text" name="factura_a_c" class="form-control"  value="<? echo $row[83]; ?>" style="width: 100%; float: right; padding: 0px; margin: 0px; height: 22px;" placeholder="A Nombre de" >

</td>
    </tr>
  </table></td>
      </tr>
      <tr>
<td style="background-color: #ab5408; color: #fff; text-align: center; padding: 1px;">PERSONA FISCAL. CLIENTE</td>
<td style=" padding: 1px;"><table style="margin: 0px; width: 100%;" border="1">
    <tr>
<td style="text-align: center; padding: 1px; width: 50%;">
<select class="form-control select2" style=" float: right; padding: 0px; margin: 0px; height: 22px; width: 50px;"  name="persona_fc" id="persona_fc">
                  <option <? if($row[78]=='NO'){ ?> selected <? } ?> value="NO">NO</option>
    <option <? if($row[78]=='SI'){ ?> selected <? } ?> value="SI">SI</option>
    
                </select>
              </div></td>
<td style="text-align: center; padding: 1px; width: 50%;">
  <input type="text" name="razon_s_c" class="form-control"  value="<? echo $row[85]; ?>" style="width: 100%; float: right; padding: 0px; margin: 0px; height: 22px;" placeholder="Razon Social" >

</td>
    </tr>
  </table></td>
      </tr>
      <tr>
<td style="background-color: #ab5408; color: #fff; text-align: center; padding: 1px;">FECHA DEL SERVICIO</td>
<td style=" padding: 1px;"><table style="margin: 0px; width: 100%;" border="1">
    <tr>
<td style="text-align: center; padding: 1px; width: 50%;"> <input  class="form-control" autocomplete="off"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask maxlength="10" type="text" name="fecha_s" id="datepicker" style=" padding: 0px; margin: 0px; height: 22px;" value="<? echo substr($row[22],8,2).'/'.substr($row[22],5,2).'/'.substr($row[22],0,4); ?>"></td>
<td style="text-align: center; padding: 1px; width: 50%;"></td>
    </tr>
  </table></td>
      </tr>
      <tr>
<td style="background-color: #ab5408; color: #fff; text-align: center; padding: 1px;">HORA</td>
<td style=" padding: 1px;"><table style="margin: 0px; width: 100%;" border="1">
    <tr>
<td style="text-align: center; padding: 1px; width: 50%;"><input type="text" name="hora_s" class="form-control"  value="<? echo $row[23]; ?>" style=" padding: 0px; margin: 0px; height: 22px;" ></td>
<td style="text-align: center; padding: 1px; width: 50%;"></td>
    </tr>
  </table></td>
      </tr>-->
      <tr>
<td style="background-color: #ab5408; color: #fff; text-align: center; padding: 1px;">EVIDENCIA A LA CARGA</td>
<td style=" padding: 1px;"><table style="margin: 0px; width: 100%;" border="1">
    <tr>
<td style="text-align: center; padding: 1px; width: 50%;">
<select class="form-control select2" style=" float: right; padding: 0px; margin: 0px; height: 22px; width: 50px;"  name="evidencia_carga" id="evidencia_carga">
                  <option value="--">--</option>
    <option <? if($row[79]=='SI'){ ?> selected <? } ?> value="SI">SI</option>
    <option <? if($row[79]=='NO'){ ?> selected <? } ?> value="NO">NO</option>
                </select>
              </div></td>
<td style="text-align: center; padding: 1px; width: 50%;">
<? 

$queryv1 = "SELECT * from evidencias where clave_servicio='".$_GET['c']."' and tipo='1' order by id desc";

$resultev1 = $link->query($queryv1);
  while($rowev1=mysqli_fetch_row($resultev1)){ ?>
<a href="archivos/<? echo $rowev1[3]; ?>" target="_blank" class="btn bg-blue"><? echo $rowev1[5]; ?></a><br>
<? } ?><br>
  <input type="file" id="evi1" name="evi1"></td>
    </tr>
  </table></td>
      </tr>
      <tr>
<td style="background-color: #ab5408; color: #fff; text-align: center; padding: 1px;">EVIDENCIA A LA DESCARGA</td>
<td style=" padding: 1px;"><table style="margin: 0px; width: 100%;" border="1">
    <tr>
<td style="text-align: center; padding: 1px; width: 50%;">
<select class="form-control select2" style=" float: right; padding: 0px; margin: 0px; height: 22px; width: 50px;"  name="evidencia_descarga" id="evidencia_descarga">
                  <option value="--">--</option>
    <option <? if($row[80]=='SI'){ ?> selected <? } ?> value="SI">SI</option>
    <option <? if($row[80]=='NO'){ ?> selected <? } ?> value="NO">NO</option>
                </select>
              </div></td>
<td style="text-align: center; padding: 1px; width: 50%;">
<? $queryv1 = "SELECT * from evidencias where clave_servicio='".$_GET['c']."' and tipo='2' order by id desc";
$resultev1 = $link->query($queryv1);
  while($rowev2=mysqli_fetch_row($resultev1)){ ?>
<a href="archivos/<? echo $rowev2[3]; ?>" target="_blank" class="btn bg-blue"><? echo $rowev2[5]; ?></a><br>
<? } ?><br>
  <input type="file" id="evi2" name="evi2"></td>
    </tr>
  </table></td>
      </tr>
      <tr>
<td style="background-color: #ab5408; color: #fff; text-align: center; padding: 1px;">FIRMA DE CONFORMIDAD DEL CLIENTE</td>
<td style=" padding: 1px;"><table style="margin: 0px; width: 100%;" border="1">
    <tr>
<td style="text-align: center; padding: 1px; width: 50%;">
<select class="form-control select2" style=" float: right; padding: 0px; margin: 0px; height: 22px; width: 50px;"  name="firma_conformidad" id="firma_conformidad">
                  <option value="--">--</option>
    <option <? if($row[81]=='SI'){ ?> selected <? } ?> value="SI">SI</option>
    <option <? if($row[81]=='NO'){ ?> selected <? } ?> value="NO">NO</option>
                </select>
              </div></td>
<td style="text-align: center; padding: 1px; width: 50%;">
<? $queryv1 = "SELECT * from evidencias where clave_servicio='".$_GET['c']."' and tipo='3' order by id desc";
$resultev3 = $link->query($queryv1);
  while($rowev3=mysqli_fetch_row($resultev3)){ ?>
<a href="archivos/<? echo $rowev3[3]; ?>" target="_blank" class="btn bg-blue"><? echo $rowev3[5]; ?></a><br>
<? } ?><br>
  <input type="file" id="evi3" name="evi3"></td>
    </tr>
  </table></td>
      </tr>

<tr>
<td></td>
<td><button type="submit" value="Guardar" name="guardarcambios" id="guardarcambios" class="btn bg-blue" >Guardar</button></td>
</tr>
    </table>

  </td>
  <td></td>
  <td></td>

</tr>
</table>


</form>

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
<tr>
<td style=" padding: 1px; text-align: center; width: 25%; margin: 0px;"><? $ccli=$row[42]; echo money_format('%(#10n',$ccli); $cc=$ccli; ?></td>
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
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><a href="tareas.php?conta=1&c=<? echo $_GET['c']; ?>&idmov=<? echo $rowm[0]; ?>#modmonto" class="btn bg-green"><i class="fa fa-fw fa-edit"></i></a></td>
         <td style="vertical-align:middle; padding: 1px; text-align: center; "><a href="tareas.php?conta=1&c=<? echo $_GET['c']; ?>&id=<? echo $rowm[0]; ?>&elimov=1" class="btn bg-red" ><i class="fa fa-fw fa-trash"></i></a></td>
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
<td style=" padding: 1px; text-align: center; width: 25%; margin: 0px;"><? $cprov=$row[43]; echo money_format('%(#10n',$cprov); $cc=$cprov; ?></td>
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
       <td style="vertical-align:middle; padding: 1px; text-align: center; "><a href="tareas.php?conta=1&c=<? echo $_GET['c']; ?>&idmov=<? echo $rowm[0]; ?>#modmonto" class="btn bg-green"><i class="fa fa-fw fa-edit"></i></a></td>
         <td style="vertical-align:middle; padding: 1px; text-align: center; "><a href="tareas.php?conta=1&c=<? echo $_GET['c']; ?>&id=<? echo $rowm[0]; ?>&elimov=1" class="btn bg-red" ><i class="fa fa-fw fa-trash"></i></a></td>
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
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><a href="tareas.php?conta=1&c=<? echo $_GET['c']; ?>&idmov=<? echo $rowm[0]; ?>#modmonto" class="btn bg-green"><i class="fa fa-fw fa-edit"></i></a></td>
         <td style="vertical-align:middle; padding: 1px; text-align: center; "><a href="tareas.php?conta=1&c=<? echo $_GET['c']; ?>&id=<? echo $rowm[0]; ?>&elimov=1" class="btn bg-red" ><i class="fa fa-fw fa-trash"></i></a></td>
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
       <td style="vertical-align:middle; padding: 1px; text-align: center; "><a href="tareas.php?conta=1&c=<? echo $_GET['c']; ?>&idmov=<? echo $rowm[0]; ?>#modmonto" class="btn bg-green"><i class="fa fa-fw fa-edit"></i></a></td>
         <td style="vertical-align:middle; padding: 1px; text-align: center; "><a href="tareas.php?conta=1&c=<? echo $_GET['c']; ?>&id=<? echo $rowm[0]; ?>&elimov=1" class="btn bg-red" ><i class="fa fa-fw fa-trash"></i></a></td>
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

<option value="<? echo $rowp[0]; ?>"><? echo htmlentities($rowp[1]).' '.htmlentities($rowp[2]).' - '.$rowp[6] ; ?></option>
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
						?><button type="submit" value="Actualizar" name="actualizarmov" id="actualizarmov" class="btn bg-blue" >Actualizar</button><?
					}else{
						?><button type="submit" value="Guardar" name="guardarmov2" id="guardarmov2" class="btn bg-blue" >Guardar</button><?
					}
					?>
                       
                </div>
                    

                    </div>
      </fieldset>
</form>
     
   </div>
 </div>