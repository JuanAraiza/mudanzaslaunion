<div class="row">
    <div class="col-md-12">
<?php 
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
			document.getElementById('efectivodiv').style.display = 'none';
			document.getElementById('bancodiv').style.display = 'none';
		}	
	}
}

</script>

<?php include('config.php'); 



if(isset($_POST['actualizarmov'])){
   $d=$_POST['id_ck'];

      $campo1=$_POST['id_movi'.$d];
      $campo2=$_POST['referencia'.$d];
      $campo3=substr($_POST['fsalida'.$d],6,4).'-'.substr($_POST['fsalida'.$d],3,2).'-'.substr($_POST['fsalida'.$d],0,2);
      $campo4=$_POST['tipo'.$d];
      if($campo4=='BANCO'){
        $campo5=$_POST['bancob'.$d];
      $campo6=$_POST['cantidadb'.$d];
      }else{
        $campo5=$_POST['bancoe'.$d];
      $campo6=$_POST['cantidade'.$d];
      }
      
      $campo7=$_SESSION['id_user'];
      
      $csql = "update ingresosyegresos set referencia=".$campo2.",fecha='".$campo3."',tipo='".$campo4."',banco='".$campo5."',cantidad='".$campo6."',usuario='".$campo7."' where id=".$campo1;  
     $link->query($csql);
       ?>
<script language="JavaScript" type="text/javascript">
location.href="tareas.php?ckm=1";
</script>
<?
}

if(isset($_POST['guardarmov'])){
      $d=$_POST['id_ck'];
  
      $campo1=$_POST['id_general'.$d];
      $campo2=$_POST['referencia'.$d];
      $campo3=substr($_POST['fsalida'.$d],6,4).'-'.substr($_POST['fsalida'.$d],3,2).'-'.substr($_POST['fsalida'.$d],0,2);
      $campo4=$_POST['tipo'.$d];
      if($campo4=='BANCO'){
        $campo5=$_POST['bancob'.$d];
      $campo6=$_POST['cantidadb'.$d];
      if (is_uploaded_file($_FILES['evidb'.$d]['tmp_name'])) {
      $campo8 = $campo1.$_FILES['evidb'.$d]['name'];
      move_uploaded_file($_FILES['evidb'.$d]['tmp_name'], "archivos/". $campo8);
  } else {
    $error=true;
    $errormsg = "Error al cargar imagen: " . $_FILES['evidb'.$d]['name'];
  }
  if($error){
   $campo8 = "N_A";
  }
  $campo9=$_POST['comentariodb'.$d];
      }else{
        $campo5=$_POST['bancoe'.$d];
      $campo6=$_POST['cantidade'.$d];
      if (is_uploaded_file($_FILES['evide'.$d]['tmp_name'])) {
      $campo8 = $campo1.$_FILES['evide'.$d]['name'];
      move_uploaded_file($_FILES['evide'.$d]['tmp_name'], "archivos/". $campo8);
  } else {
    $error=true;
    $errormsg = "Error al cargar imagen: " . $_FILES['evide'.$d]['name'];
  }
  if($error){
   $campo8 = "N_A";
  }

  $campo9=$_POST['comentariode'.$d];
      }
      
      $campo7=$_SESSION['id_user'];

      
      //echo "INSERT INTO ingresosyegresos(id_mudanza,referencia,fecha,tipo,banco,cantidad,usuario) VALUES (".$campo1.",".$campo2.",'".$campo3."','".$campo4."','".$campo5."','".$campo6."','".$campo7."')<br>";  
      $csql = "INSERT INTO ingresosyegresos(id_mudanza,referencia,fecha,tipo,banco,cantidad,usuario,archivo,comentario) VALUES (".$campo1.",".$campo2.",'".$campo3."','".$campo4."','".$campo5."','".$campo6."','".$campo7."','".$campo8."','".$campo9."')";  
       
     $link->query($csql);
       ?>
<script language="JavaScript" type="text/javascript">
location.href="tareas.php?ckm=1";
</script>
<?
     }


     if(isset($_POST['guardarmov2'])){
      $d=$_POST['id_ck'];
 
      $campo1=$_POST['id_general'.$d];
      $campo2=$_POST['referencia'.$d];
      $campo3=substr($_POST['fsalida'.$d],6,4).'-'.substr($_POST['fsalida'.$d],3,2).'-'.substr($_POST['fsalida'.$d],0,2);
      $campo4=$_POST['tipo'.$d];
        if($campo4=='BANCO'){
        $campo5=$_POST['bancob'.$d];
      $campo6=$_POST['cantidadb'.$d];
      if (is_uploaded_file($_FILES['evidb'.$d]['tmp_name'])) {
      $campo8 = $campo1.$_FILES['evidb'.$d]['name'];
      move_uploaded_file($_FILES['evidb'.$d]['tmp_name'], "archivos/". $campo8);
  } else {
    $error=true;
    $errormsg = "Error al cargar imagen: " . $_FILES['evidb'.$d]['name'];
  }
  if($error){
   $campo8 = "N_A";
  }
  $campo9=$_POST['comentariodb'.$d];
      }else{
        $campo5=$_POST['bancoe'.$d];
      $campo6=$_POST['cantidade'.$d];
      if (is_uploaded_file($_FILES['evide'.$d]['tmp_name'])) {
      $campo8 = $campo1.$_FILES['evide'.$d]['name'];
      move_uploaded_file($_FILES['evide'.$d]['tmp_name'], "archivos/". $campo8);
  } else {
    $error=true;
    $errormsg = "Error al cargar imagen: " . $_FILES['evide'.$d]['name'];
  }
  if($error){
   $campo8 = "N_A";
  }

  $campo9=$_POST['comentariode'.$d];
      }
      
      $campo7=$_SESSION['id_user'];
      //echo "INSERT INTO ingresosyegresos(id_mudanza,referencia,fecha,tipo,banco,cantidad,usuario) VALUES (".$campo1.",".$campo2.",'".$campo3."','".$campo4."','".$campo5."','".$campo6."','".$campo7."')<br>";  
      $csql = "INSERT INTO ingresosyegresos(id_mudanza,referencia,fecha,tipo,banco,cantidad,usuario,archivo,comentario) VALUES (".$campo1.",".$campo2.",'".$campo3."','".$campo4."','".$campo5."','".$campo6."','".$campo7."','".$campo8."','".$campo9."')";  
       
      $link->query($csql);
       ?>
<script language="JavaScript" type="text/javascript">
location.href="tareas.php?ckm=1";
</script>
<?
     }
     ?>











    <?php 
//echo "SELECT * from servicio where fecha between '".date('Y')."-".date('d')."-01 00:00:00' and '".date('Y')."-".date('d')."-31 00:00:00'";

	$query = "SELECT * from servicio where fecha between '".date('Y')."-".date('m')."-01 00:00:00' and '".date('Y')."-".date('m')."-31 00:00:00'";
  $result =$link->query($query);
	while($row=mysqli_fetch_row($result)){
       ?>
      <hr>

  <form method="POST" action="tareas.php?ckm=1&c=<?php echo $row[9]; ?>" enctype="multipart/form-data">
    <input type="hidden" name="id_movi" id="id_movi" value="<?php echo $row[0]; ?>"/>
    <input type="hidden" name="clave_serv" id="clave_serv" value="<?php echo $row[9]; ?>"/>
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
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px; width: 50%;"><?php echo $row[2]; ?></td>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px; width: 50%;"><?php echo $row[3]; ?></td>
    </tr>
  </table>

</td>
      </tr>
      <tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">CLIENTE</td>
<td style=" padding: 1px;"><?php echo $row[1]; ?></td>
      </tr>
 <tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">TIPO DE SERVICIO</td>
<td style=" padding: 1px;"><table style="margin: 0px; width: 100%;" border="1">
    <tr>
<td style="text-align: center; padding: 1px; width: 50%;"><?php echo $row[4];   ?></td>
<td style="text-align: center; padding: 1px; width: 50%;"></td>
    </tr>
  </table></td>
      </tr>

      <tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">PROVEEDORES</td>
<td style=" padding: 1px;"><table style="margin: 0px; width: 100%;" border="1">
    <tr>
<td style="text-align: center; padding: 1px; width: 50%;"><?php 
  $queryp = "SELECT * from proveedores where id=".$row[40];
   $resultp =$link->query($queryp);
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
<td style="text-align: center; padding: 1px; width: 50%;"><?php echo $row[0];   ?></td>
<td style="text-align: center; padding: 1px; width: 50%;"></td>
    </tr>
  </table></td>
      </tr>
      <tr>
<td style="background-color: #6d3705; color: #fff; text-align: center; padding: 1px;">TIEMPO DE ENTREGA</td>
<td style=" padding: 1px;"><table style="margin: 0px; width: 100%;" border="1">
    <tr>
<td style="text-align: center; padding: 1px; width: 50%;"><?php echo $row[38]; ?></td>
<td style="text-align: center; padding: 1px; width: 50%;"></td>
    </tr>
  </table></td>
      </tr>


    </table>

  </td>
  <td></td>
  <td></td>

</tr>
</table>


</form>

<?php  
  $querym = "SELECT * from ingresosyegresos where id_mudanza=".$row[0];
  $ingresos=0;
  $egresos=0;
   $resultm =$link->query($querym);
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
<td style=" padding: 1px; text-align: center; width: 25%; margin: 0px;"><?php $ccli=$row[42]+$row[19]; echo money_format('%(#10n',$ccli); $cc=$ccli; ?></td>
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
$dc=0;
  $cn=1;
   $resultm =$link->query($querym);
  while($rowm=mysqli_fetch_row($resultm)){
    $dc++;
    if($rowm[2]==1){
      $refe="De Cliente"; 
      $c='#c8c8c6';
    }else{
      $refe="De Proveedor";
      $c='#dbdbdb';
    }
    $cc=$cc-$rowm[6];

    ?>
    <tr style="background:<?php echo $c; ?>; height: 42px; vertical-align:middle; border:#5A5959 solid 1px; ">
        
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><?php echo substr($rowm[3], 8, 2).'-'.substr($rowm[3], 5, 2).'-'.substr($rowm[3], 0, 4); ?></td>
  
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><?php echo $rowm[4] . ' - '.$rowm[5]; ?></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><?php  echo money_format('%(#10n',$rowm[6]); ?></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><?php  echo money_format('%(#10n',$cc); ?><?php //echo $rowm[4]; ?></td>
        <!--<td style="vertical-align:middle; padding: 1px; text-align: center; "><a href="tareas.php?ckm=1&c=<?php echo $_GET['c']; ?>&idmov=<?php echo $rowm[0]; ?>" class="btn bg-green"><i class="fa fa-fw fa-edit"></i></a></td>-->
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><a href="archivos/<?php echo $rowm[8]; ?>" class="btn bg-blue" target="_blank" ><i class="fa fa-fw fa-file-text-o"></i></a></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><?php echo $rowm[9]; ?></td>
         <td style="vertical-align:middle; padding: 1px; text-align: center; "><a href="tareas.php?ckm=1&c=<?php echo $_GET['c']; ?>&id=<?php echo $rowm[0]; ?>&elimov=1" class="btn bg-red" ><i class="fa fa-fw fa-trash"></i></a></td>
        </tr>
        <?
  }
     ?>
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
<td style=" padding: 1px; text-align: center; width: 25%; margin: 0px;"><?php $cprov=$row[43]+$row[82]; echo money_format('%(#10n',$cprov); $cc=$cprov; ?></td>
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
 $resultm =$link->query($querym);
  $cn=1;
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
    <tr style="background:<?php echo $c; ?>; height: 42px; vertical-align:middle; border:#5A5959 solid 1px; ">
        
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><?php echo substr($rowm[3], 8, 2).'-'.substr($rowm[3], 5, 2).'-'.substr($rowm[3], 0, 4); ?></td>
  
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><?php echo $rowm[4] . ' - '.$rowm[5]; ?></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><?php  echo money_format('%(#10n',$rowm[6]); ?></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><?php  echo money_format('%(#10n',$cc); ?><?php //echo $rowm[4]; ?></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><a href="archivos/<?php echo $rowm[8]; ?>" class="btn bg-blue" target="_blank" ><i class="fa fa-fw fa-file-text-o"></i></a></td>
        <td style="vertical-align:middle; padding: 1px; text-align: center; "><?php echo $rowm[9]; ?></td>
       <!-- <td style="vertical-align:middle; padding: 1px; text-align: center; "><a href="tareas.php?ckm=1&c=<?php echo $_GET['c']; ?>&idmov=<?php echo $rowm[0]; ?>" class="btn bg-green"><i class="fa fa-fw fa-edit"></i></a></td>-->
         <td style="vertical-align:middle; padding: 1px; text-align: center; "><a href="tareas.php?ckm=1&c=<?php echo $_GET['c']; ?>&id=<?php echo $rowm[0]; ?>&elimov=1" class="btn bg-red" ><i class="fa fa-fw fa-trash"></i></a></td>
        </tr>
        <?
  }
     ?>
     </table> 


 <td>

</table>

      
      
       <?php if(isset($_GET['idmov'])){
		  ?> <h3>Modificar Pago</h3><?php 
	   }else{
		  ?> <h3>Agregar Pago</h3><?php 
	   }?>
      
	        <form method="POST" action="tareas.php?ckm=1&c=<?php echo $_GET['c']; ?>" enctype="multipart/form-data">
            <?php if(isset($_GET['idmov'])){
				
			
			$querymm = "SELECT * from ingresosyegresos where id=".$_GET['idmov'];
       $resultmm =$link->query($querymm);
			$rowmm=mysqli_fetch_row($resultmm);
			?>
      <input type="hidden" name="id_movi<?php echo $dc; ?>" id="id_movi<?php echo $dc; ?>" value="<?php echo $rowmm[0]; ?>"/><?
			
			}
			?>
      <input type="hidden" name="id_ck" id="id_ck" value="<?php echo $dc; ?>"/>
              <input type="hidden" name="id_general<?php echo $dc; ?>" id="id_general<?php echo $dc; ?>" value="<?php echo $row[0]; ?>"/>
                      <fieldset>
                      

                         <div class="form-group" style="width: 20%" >
                      <label>Referencia</label>
                     <select class="form-control select2"  id="referencia<?php echo $dc; ?>" name="referencia<?php echo $dc; ?>" >
                     <option value="--">--</option>
                     <option <?php if(isset($_GET['idmov'])){ if($rowmm[2]==1){ ?> selected <?php } } ?>value="1">De Cliente</option>
                     <option <?php if(isset($_GET['idmov'])){ if($rowmm[2]==2){ ?> selected <?php } } ?>value="2">A Porveedor</option>
                    </select>
                  </div>
                    

                      
                         <div class="form-group" style="width: 20%">
                      <label>Fecha de Pago</label>

<div class="input-group">
               
                  <input class="form-control" autocomplete="off"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask maxlength="10" type="text" name="fsalida<?php echo $dc; ?>" id="fsalida<?php echo $dc; ?>" <?php if(isset($regre)){ ?> value="<?php echo $_POST['fsalida']; ?>" <?php } ?>>
                </div>

                  </div>
                  

                      
                         <div class="form-group" style="width: 20%">
                    <label>Tipo</label>
                    <select class="form-control select2"  id="tipo<?php echo $dc; ?>" name="tipo<?php echo $dc; ?>" onchange="javascript:cambiartipo(this)">
                     <option value="--">--</option>
                     <option <?php if(isset($_GET['idmov'])){ if($rowmm[4]=='BANCO'){ ?> selected <?php } } ?> value="BANCO">BANCO</option>
                     <option <?php if(isset($_GET['idmov'])){ if($rowmm[4]=='EFECTIVO'){ ?> selected <?php } } ?> value="EFECTIVO">EFECTIVO</option>
                    </select>
                  </div>
              

                    
                    
                     <div id="bancodiv" <?php if(isset($_GET['idmov'])){ if($rowmm[4]=='EFECTIVO'){ ?> style="display:none" <?php }}else{ ?> style="display:none" <?php }  ?>>
                    

                        
                         <div class="form-group" style="width: 20%">
                         <label>Banco</label>
                         <select  class="form-control select2"   name="bancob<?php echo $dc; ?>" style="width: 200px;" >
                         <option value="--">--</option>
                         <option <?php if(isset($_GET['idmov'])){ if($rowmm[5]=='TC'){ ?> selected <?php } } ?> value="TC">TC</option>
                         <option <?php if(isset($_GET['idmov'])){ if($rowmm[5]=='BANAMEX'){ ?> selected <?php } } ?> value="BANAMEX">BANAMEX</option>
                         <option <?php if(isset($_GET['idmov'])){ if($rowmm[5]=='INBURSA'){ ?> selected <?php } } ?> value="INBURSA">INBURSA</option>
                         <option <?php if(isset($_GET['idmov'])){ if($rowmm[5]=='BAN BAJIO'){ ?> selected <?php } } ?> value="BAN BAJIO">BAN BAJIO</option>
                         <option <?php if(isset($_GET['idmov'])){ if($rowmm[5]=='OTRO'){ ?> selected <?php } } ?> value="OTRO">OTRO</option>
                        </select>
                      </div>
                        
                            
                         <div class="form-group" style="width: 20%">
                    <label>Cantidad</label>
                    <input type="text" name="cantidadb<?php echo $dc; ?>" id="cantidadb<?php echo $dc; ?>" class="form-control" onkeypress="return valida(event)"   <?php if(isset($_GET['idmov'])){ ?> value="<?php echo $rowmm[6]; ?>" <?php } ?>/>
                  </div>
                   
  <div class="form-group" style="width: 20%">
                    <label>Evidencia</label>
                   <input type="file" id="evidb<?php echo $dc; ?>" name="evidb<?php echo $dc; ?>">
                  </div>
<div class="form-group" style="width: 20%">
                    <label>Comentario</label>
                    <input type="text" name="comentariodb<?php echo $dc; ?>" id="comentariodb<?php echo $dc; ?>" class="form-control" <?php if(isset($_GET['idmov'])){ ?> value="<?php echo $rowmm[9]; ?>" <?php } ?>/>
                  </div>
                      
                     <div class="form-group" style="width: 20%">
                   <?php if(isset($_GET['idmov'])){
						?><button type="submit" value="Actualizar" name="actualizarmov" id="actualizarmov" class="btn bg-blue" >Actualizar</button><?
					}else{
						?><button type="submit" value="Guardar" name="guardarmov" id="guardarmov" class="btn bg-blue" >Guardar</button><?
					}
					?>
                </div>
                   

                    </div>
                    <div id="efectivodiv" <?php if(isset($_GET['idmov'])){  if($rowmm[4]=='BANCO'){ ?> style="display:none" <?php } }else{ ?> style="display:none" <?php } ?>>
                   <div class="form-group" style="width: 20%">

                         <label>Efectivo</label>
                         <select name="bancoe<?php echo $dc; ?>"  class="form-control select2" style="width: 200px;" >
                         <option value="--">--</option>
                         <option <?php if(isset($_GET['idmov'])){ if($rowmm[5]=='EFECTIVO CHOFER'){ ?> selected <?php } } ?> value="EFECTIVO CHOFER">EFECTIVO CHOFER</option>
                         <option <?php if(isset($_GET['idmov'])){ if($rowmm[5]=='EFECTIVO SUCURSAL'){ ?> selected <?php } } ?> value="EFECTIVO SUCURSAL">EFECTIVO SUCURSAL</option>
                         <option <?php if(isset($_GET['idmov'])){ if($rowmm[5]=='CAJA CHICA'){ ?> selected <?php } } ?> value="CAJA CHICA">CAJA CHICA</option>
                         <option <?php if(isset($_GET['idmov'])){ if($rowmm[5]=='OTRO'){ ?> selected <?php } } ?> value="OTRO">OTRO</option>
                        </select>
                         </div>
<div class="form-group" style="width: 20%">
                    <label>Cantidad</label>
                    <input type="text" name="cantidade<?php echo $dc; ?>" id="cantidade<?php echo $dc; ?>" class="form-control" onkeypress="return valida(event)"  <?php if(isset($_GET['idmov'])){ ?> value="<?php echo $rowmm[6]; ?>" <?php } ?>/>
                  </div>

                   <div class="form-group" style="width: 20%">
                    <label>Evidencia</label>
                   <input type="file" id="evide<?php echo $dc; ?>" name="evide<?php echo $dc; ?>">
                  </div>

                  <div class="form-group" style="width: 20%">
                    <label>Comentario</label>
                    <input type="text" name="comentariode<?php echo $dc; ?>" id="comentariode<?php echo $dc; ?>" class="form-control" <?php if(isset($_GET['idmov'])){ ?> value="<?php echo $rowmm[9]; ?>" <?php } ?>/>
                  </div>
                    
                    <div class="form-group" style="width: 20%">
                    <?php if(isset($_GET['idmov'])){
						?><button type="submit" value="Actualizar" name="actualizarmov" id="actualizarmov" class="btn bg-blue" >Actualizar</button><?
					}else{
						?><button type="submit" value="Guardar" name="guardarmov2" id="guardarmov2" class="btn bg-blue" >Guardar</button><?
					}
					?>
                       
                </div>
                    

                    </div>
      </fieldset>
</form>
       <?php } ?>
   </div>
 </div>