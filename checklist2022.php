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

if(isset($_GET['eli'])){
   $query = "delete from cargos_extra where id=".$_GET['id'];
  $link->query($query);
?>
<script type="text/javascript">
  location.href="tareas.php?conta2022=1&c=<?php echo $_GET['c']; ?>";
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
  location.href="tareas.php?conta2022=1&c=<?php echo $_GET['c']; ?>";
</script>
<?php

  }


if(isset($_POST['guardarcprovs'])){

$c1=$_GET['c'];
$c2=$_POST['prov1'];
$c3=$_POST['costo_prov_rec1'];
$c4=$_POST['costo_prov_fle1'];
$c5=$_POST['costo_prov_ent1'];
$c14=$_POST['costo_prov_ajuste1'];

if(isset($_POST['prov2'])){
$c6=$_POST['prov2'];
$c7=$_POST['costo_prov_rec2'];
$c8=$_POST['costo_prov_fle2'];
$c9=$_POST['costo_prov_ent2'];
$c15=$_POST['costo_prov_ajuste2'];
}else{
$c6=0;
$c7=0;
$c8=0;
$c9=0;
$c15=0;  
}

if(isset($_POST['prov3'])){
$c10=$_POST['prov3'];
$c11=$_POST['costo_prov_rec3'];
$c12=$_POST['costo_prov_fle3'];
$c13=$_POST['costo_prov_ent3'];
$c16=$_POST['costo_prov_ajuste3'];
}else{
$c10=0;
$c11=0;
$c12=0;
$c13=0;
$c16=0;
}

$querycpg = "SELECT count(id) from cobro_prov where cve_servicio='".$_GET['c']."'";
 $resultcpg = $link->query($querycpg);
    $rowcpg=mysqli_fetch_row($resultcpg);

if($rowcpg[0]>=1){
    $querygp = "update cobro_prov set prov1=".$c2.",rprov1=".$c3.",fprov1=".$c4.",eprov1=".$c5.",prov2=".$c6.",rprov2=".$c7.",fprov2=".$c8.",eprov2=".$c9.",prov3=".$c10.",rprov3=".$c11.",fprov3=".$c12.",eprov3=".$c13.",ajuste1=".$c14.",ajuste2=".$c15.",ajuste3=".$c16." where cve_servicio='".$c1."'";
 $link->query($querygp);
}else{
   $querygp = "insert into cobro_prov(cve_servicio,prov1,rprov1,fprov1,eprov1,prov2,rprov2,fprov2,eprov2,prov3,rprov3,fprov3,eprov3,ajuste1,ajuste2,ajuste3) values('".$c1."',".$c2.",".$c3.",".$c4.",".$c5.",".$c6.",".$c7.",".$c8.",".$c9.",".$c10.",".$c11.",".$c12.",".$c13.",".$c14.",".$c15.",".$c16.")";
 $link->query($querygp); 
}


$querym = "SELECT sum(rprov1+fprov1+eprov1+rprov2+fprov2+eprov2+rprov3+fprov3+eprov3+ajuste1+ajuste2+ajuste3 ) from cobro_prov where cve_servicio='".$_GET['c']."'";
 $resultm = $link->query($querym);
    $rowm=mysqli_fetch_row($resultm);

 //echo $querygp .'<br>';

    $queryme = "update servicio set costoproveedor='".$rowm[0]."' where clave='".$_GET['c']."'";
 $link->query($queryme); 


?>
<script type="text/javascript">
//document.getElementById("btn_acuse").click();
 location.href="tareas.php?conta2022=1&c=<?php echo $_GET['c']; ?>";
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
$regre=0;

if($corr!=1){
$querygp = "insert into cargos_extra(cve_servicio,concepto,cargo) values('".$c1."','".$c2."',".$c3.")";
$link->query($querygp); 


$querym = "SELECT sum(cargo) from cargos_extra where cve_servicio='".$c1."'";
 $resultm = $link->query($querym);
    $rowm=mysqli_fetch_row($resultm);
$queryme = "update servicio set extras='".$rowm[0]."' where clave='".$_GET['c']."'";
 $link->query($queryme); 
 //echo $querygp .'<br>';
?>
<script type="text/javascript">
//document.getElementById("btn_acuse").click();
 location.href="tareas.php?conta2022=1&c=<?php echo $c1; ?>";
</script>
<?php
}else{
  $regre=1;
?>
<script type="text/javascript">alert('<?php echo $cade; ?>');</script>
<?php
}

}


if(isset($_POST['guardarcasegurada'])){

    $corr=0;
    $cade="";

    if($_POST['cacleinte']==''){
    $corr=1;
    $cade=$cade."Falta Cantidad Asegurada \\n";
    }

    $cas = $_POST['cacleinte'];
    $c1=$_GET['c'];

    if($cas>=1){
        if($cas>50000){
            $segclie=$cas * 0.025;
        }else{
            $segclie=1250;
        }
    }else{
        $segclie=0;
    }


     if($cas>=1){
        if($cas>50000){
            $segpro=$cas * 0.005;
        }else{
            $segpro=580;
        }
        }else{
        $segpro=0;
    }

    $ganacias=$segclie-$segpro;

    if($corr!=1){
$querygp = "update servicio set cscliente='".$segclie."',seguro_prov='".$segpro."',totalseguros='".$ganacias."' where clave='".$_GET['c']."'";
$link->query($querygp); 


?>
<script type="text/javascript">
 location.href="tareas.php?conta2022=1&c=<?php echo $c1; ?>";
</script>
<?php
}else{
  $regre=1;
?>
<script type="text/javascript">alert('<?php echo $cade; ?>');</script>
<?php
}


}


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
 location.href="tareas.php?conta2022=1&c=<?php echo $c1; ?>";
</script>
<?php
}else{
  $regre=1;
?>
<script type="text/javascript">alert('<?php echo $cade; ?>');</script>
<?php
}

}


	$query = "SELECT * from servicio where clave='".$_GET['c']."'";
 $result = $link->query($query);
	$row=mysqli_fetch_row($result);



    $queryu = "SELECT * from usuarios where id=".$row[51];
 $resultu = $link->query($queryu);
    $rowu=mysqli_fetch_row($resultu);
       ?>
         <fieldset>
<h2>Mudanza</h2>
         </fieldset>

 


<div class="row">
        <div class="col-xs-12">
          <div class="box">
        
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>FOLIO</th>
                  <td><h2><?php echo $row[0]; ?></h2></td>
                  <th>DESTINO / ORIGEN</th>
                  <td><?php echo $row[2].' / '.$row[3]; ?></td>
                </tr>
                <tr>
                  <th>VENDEDOR</th>
                  <td><?php echo $rowu[3]; ?></td>
                  <th>TIPO DE SERVICIO</th>
                  <td><?php echo $row[4]; ?></td>
                </tr>
                <tr>
                  <th>PROVEEDOR</th>
                  <td><?php $query = "SELECT * from proveedores where id=".$row[40];
  $resultp = $link->query($query);
  $rowp=mysqli_fetch_row($resultp);
     
     echo $rowp[1]; ?></td>
                  <th>TIPO SERVICIO</th>
                  <td><?php echo $row[135]; ?></td>
                </tr>
               
                <tr>
                  <th>CLIENTE</th>
                  <td><?php echo $row[1]; ?></td>
                  <th>TIEMPO DE ENTREGA</th>
                  <td><?php echo $row[38]; ?></td>
                </tr>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>




<div class="row">
        <div class="col-xs-12">
          <div class="box">

 <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <h3>Proveedores</h3>


<form method="POST" action="tareas.php?conta2022=1&c=<? echo $_GET['c']; ?>" enctype="multipart/form-data">

              <table class="table table-hover">
                <tr>
                    <th></th>
                     <th style="text-align:center;">RECOLECCION</th>
                     <th style="text-align:center;">FLETE</th>
                     <th style="text-align:center;">ENTREGA</th>
                     <th style="text-align:center;">AJUSTE</th>
                     <th style="text-align:center;">TOTAL</th>
                </tr>
<?php $querycp = "SELECT * from  cobro_prov where cve_servicio='".$row[9]."'";
  $resultcp = $link->query($querycp);
  $rowcp=mysqli_fetch_row($resultcp); ?>

<?php $query = "SELECT * from proveedores where id=".$row[40];
  $resultp = $link->query($query);
  while($rowp=mysqli_fetch_row($resultp)){ ?>
                <tr>
                  <th><input type="hidden" name="prov1" value="<? echo $row[40]; ?>"><?php echo $rowp[1]; ?></th>
                  <td><input type="text" name="costo_prov_rec1" class="form-control" onkeypress="return valida(event)" value="<?php if($rowcp[3]>=1){ echo $rowcp[3]; }else{ echo '0'; } ?>" style="width: 90%; float:right;"></td>
                  <td><input type="text" name="costo_prov_fle1" class="form-control" onkeypress="return valida(event)" value="<?php if($rowcp[4]>=1){ echo $rowcp[4]; }else{ echo '0'; } ?>" style="width: 90%; float:right;"></td>
                  <td><input type="text" name="costo_prov_ent1" class="form-control" onkeypress="return valida(event)" value="<?php if($rowcp[5]>=1){ echo $rowcp[5]; }else{ echo '0'; } ?>" style="width: 90%; float:right;"></td>
                  <td><input type="text" name="costo_prov_ajuste1" class="form-control" onkeypress="return valida(event)" value="<?php if($rowcp[14]>=1){ echo $rowcp[14]; }else{ echo '0'; } ?>" style="width: 90%; float:right;"></td>
                  <th>$ <?php $sumprov1=$rowcp[3]+$rowcp[4]+$rowcp[5]+$rowcp[14]; $totprov=$totprov+$sumprov1; echo number_format($sumprov1,2); ?>
                      <input type="hidden" name="costo_prov1" value="<? echo $sumprov1; ?>">
                  </th>
                </tr>
                <?php } ?>

<?php $query = "SELECT * from proveedores where id=".$row[87];
  $resultp = $link->query($query);
  while($rowp=mysqli_fetch_row($resultp)){ ?>
                <tr>
                  <th><input type="hidden" name="prov1" value="<? echo $row[87]; ?>"><?php echo $rowp[1]; ?></th>
                  <td><input type="text" name="costo_prov_rec2" class="form-control" onkeypress="return valida(event)" value="<?php if($rowcp[7]>=1){ echo $rowcp[7]; }else{ echo '0'; } ?>" style="width: 90%; float:right;"></td>
                  <td><input type="text" name="costo_prov_fle2" class="form-control" onkeypress="return valida(event)" value="<?php if($rowcp[8]>=1){ echo $rowcp[8]; }else{ echo '0'; } ?>" style="width: 90%; float:right;"></td>
                  <td><input type="text" name="costo_prov_ent2" class="form-control" onkeypress="return valida(event)" value="<?php if($rowcp[9]>=1){ echo $rowcp[9]; }else{ echo '0'; } ?>" style="width: 90%; float:right;"></td>
                   <td><input type="text" name="costo_prov_ajuste2" class="form-control" onkeypress="return valida(event)" value="<?php if($rowcp[15]>=1){ echo $rowcp[15]; }else{ echo '0'; } ?>" style="width: 90%; float:right;"></td>
                   <th>$ <?php $sumprov2=$rowcp[7]+$rowcp[8]+$rowcp[9]+$rowcp[15]; $totprov=$totprov+$sumprov2; echo number_format($sumprov2,2); ?>
                      <input type="hidden" name="costo_prov2" value="<? echo $sumprov2; ?>">
                  </th>
                </tr>
                <?php } ?>


                <?php $query = "SELECT * from proveedores where id=".$row[88];
  $resultp = $link->query($query);
  while($rowp=mysqli_fetch_row($resultp)){ ?>
                <tr>
                  <th><input type="hidden" name="prov1" value="<? echo $row[88]; ?>"><?php echo $rowp[1]; ?></th>
                  <td><input type="text" name="costo_prov_rec3" class="form-control" onkeypress="return valida(event)" value="<?php if($rowcp[11]>=1){ echo $rowcp[11]; }else{ echo '0'; } ?>" style="width: 90%; float:right;"></td>
                  <td><input type="text" name="costo_prov_fle3" class="form-control" onkeypress="return valida(event)" value="<?php if($rowcp[12]>=1){ echo $rowcp[12]; }else{ echo '0'; } ?>" style="width: 90%; float:right;"></td>
                  <td><input type="text" name="costo_prov_ent3" class="form-control" onkeypress="return valida(event)" value="<?php if($rowcp[13]>=1){ echo $rowcp[13]; }else{ echo '0'; } ?>" style="width: 90%; float:right;"></td>
                   <td><input type="text" name="costo_prov_ajuste3" class="form-control" onkeypress="return valida(event)" value="<?php if($rowcp[16]>=1){ echo $rowcp[16]; }else{ echo '0'; } ?>" style="width: 90%; float:right;"></td>
                   <th>$ <?php $sumprov3=$rowcp[11]+$rowcp[12]+$rowcp[13]+$rowcp[16]; $totprov=$totprov+$sumprov3; echo number_format($sumprov3,2); ?>
                      <input type="hidden" name="costo_prov3" value="<? echo $sumprov3; ?>">
                  </th>
                </tr>
                <?php } ?>

<tr>
                  <th></th>
                  <td></td>
                  <td></td>
                  <td></td>
                   <td></td>
                   <th>$ <?php  echo number_format($totprov,2); ?>
                  </th>
                </tr>
              </table>

              <div class="col-xs-12">
                    <div style="width:100%; align-content: right; text-align: right;">
                      <button type="submit" class="btn btn-primary"  name="guardarcprovs">Guardar</button>
                      <br>&nbsp;<br>
                    </div>
              </div>



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
                <h3>Otros Cargos</h3>


<form method="POST" action="tareas.php?conta2022=1&c=<? echo $_GET['c']; ?>" enctype="multipart/form-data">


  <div class="form-group col-md-3" >
             <label>Concepto</label>
              <input name="concepto" id="concepto"  class="form-control" type="text"   >
    </div>
      <div class="form-group col-md-3" >
             <label>Cantidad</label>
              <input name="cantidad" id="cantidad" onKeyPress="return valida(event)" class="form-control" type="text"   >
    </div>

    <div class="form-group col-md-3" >
             <label>&nbsp;</label>
               <button type="submit" class="form-control btn btn-primary"  name="guardarcargos">Guardar Cargo</button>
    </div>



              <table class="table table-hover">
                <tr>
                     <th>CONCEPTO</th>
                     <th>CANTIDAD</th>
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
                  <td><a class="btn btn-danger" onClick="eliminarCargo('<?php echo $rowce[0]; ?>','<?php echo $_GET['c']; ?>')"><i class="fa fa-fw fa-trash"></i></a></td>
                  </th>
                </tr>
                <?php } ?>
<tr>
                  <td></td>
                  <td><strong>$ <?php echo number_format($total_otros,2); ?></strong></td>
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


<form method="POST" action="tareas.php?conta2022=1&c=<? echo $_GET['c']; ?>" enctype="multipart/form-data">


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
                  <td><a class="btn btn-danger" onClick="eliminarEvidencia('<?php echo $rowce[0]; ?>','<?php echo $_GET['c']; ?>')"><i class="fa fa-fw fa-trash"></i></a></td>
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


<div class="row">
        <div class="col-xs-12">
          <div class="box">

 <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <h3>Seguro</h3>


<form method="POST" action="tareas.php?conta2022=1&c=<? echo $_GET['c']; ?>" enctype="multipart/form-data">


  <div class="form-group col-md-4" >
             <label>Cantidad Asegurdada por el Cliente</label>
              <input name="cacleinte"  class="form-control" type="text"  value="<?php echo $row[19]; ?>"   >
    </div>
      

    <div class="form-group col-md-3" >
             <label>&nbsp;</label>
               <button type="submit" class="form-control btn btn-primary" value="<?php echo $row[19]; ?>"  name="guardarcasegurada">Guardar Cantidad Asegurada</button>
    </div>



              <table class="table table-hover">
                <tr>
                     <th>SEGURO</th>
                     <th>SEGURO PROVEEDOR</th>
                     <th>GANANCIA</th>
                </tr>


                <tr>
                  <td><?php 
            if($row[19]>=1){
            if($row[19]>50000){
                $segclie=$row[19] * 0.025;
            }else{
                $segclie=1250;
            }
        }else{
            $segclie=0;
        }
            ?>
            <p>$ <?php echo number_format($segclie,2); ?></p></td>
                  <td>
                  <?php 
            if($row[19]>=1){
            if($row[19]>50000){
                $segpro=$row[19] * 0.005;
            }else{
                $segpro=580;
            }
            }else{
            $segpro=0;
        }
            ?>
            <p>$ <?php echo number_format($segpro,2); ?></p></td>
                  <td><?php 
            $ganacias=$segclie-$segpro;
            ?>
            <p>$ <?php echo number_format($ganacias,2); ?></p></td>
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

<h3>Pagos</h3>



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
<td style="background-color: #ab5408; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;">COSTOS </td>
<td style="background-color: #ab5408; color: #fff; padding: 1px; text-align: center; width: 75%; margin: 0px;">PAGOS DE CLIENTE</td>
</tr>
<tr>
<td style=" padding: 1px;"> 
        <table style="margin: 0px; width: 100%;" border="1">
        <tr>
        <td style="background-color: #27635f; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;"><strong>COSTO CLIENTE</strong></td>
        </tr>
        <tr>
        <td style=" padding: 1px; text-align: center; width: 25%; margin: 0px;"><? $ccli=($row[42]+$row[21]); echo money_format('%(#10n',$ccli); $cc=$ccli; ?></td>
        </tr>
        </table>
</td>
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
                    <td style="vertical-align:middle; padding: 1px; text-align: center; "><a href="tareas.php?conta2022=1&c=<? echo $_GET['c']; ?>&idmov=<? echo $rowm[0]; ?>#modmonto" class="btn bg-green"><i class="fa fa-fw fa-edit"></i></a></td>
                     <td style="vertical-align:middle; padding: 1px; text-align: center; "><a href="tareas.php?conta2022=1&c=<? echo $_GET['c']; ?>&id=<? echo $rowm[0]; ?>&elimov=1" class="btn bg-red" ><i class="fa fa-fw fa-trash"></i></a></td>
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
</td>
</tr>
</table>




<table style="width: 100%" cellspacing="0" cellpadding="0">
<tr>
<td style="background-color: #ab5408; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;">COSTOS </td>
<td style="background-color: #ab5408; color: #fff; padding: 1px; text-align: center; width: 75%; margin: 0px;">PAGOS PROVEEDOR</td>
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
</td>
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
                       <td style="vertical-align:middle; padding: 1px; text-align: center; "><a href="tareas.php?conta2022=1&c=<? echo $_GET['c']; ?>&idmov=<? echo $rowm[0]; ?>#modmonto" class="btn bg-green"><i class="fa fa-fw fa-edit"></i></a></td>
                         <td style="vertical-align:middle; padding: 1px; text-align: center; "><a href="tareas.php?conta2022=1&c=<? echo $_GET['c']; ?>&id=<? echo $rowm[0]; ?>&elimov=1" class="btn bg-red" ><i class="fa fa-fw fa-trash"></i></a></td>
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


     </td>
 </tr>
</table>


<table style="width: 100%" cellspacing="0" cellpadding="0">
<tr>
<td style="background-color: #ab5408; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;">COSTOS </td>
<td style="background-color: #ab5408; color: #fff; padding: 1px; text-align: center; width: 75%; margin: 0px;">PAGOS DE CLIENTE</td>
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
</td>
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
                <td style="vertical-align:middle; padding: 1px; text-align: center; "><a href="tareas.php?conta2022=1&c=<? echo $_GET['c']; ?>&idmov=<? echo $rowm[0]; ?>#modmonto" class="btn bg-green"><i class="fa fa-fw fa-edit"></i></a></td>
                 <td style="vertical-align:middle; padding: 1px; text-align: center; "><a href="tareas.php?conta2022=1&c=<? echo $_GET['c']; ?>&id=<? echo $rowm[0]; ?>&elimov=1" class="btn bg-red" ><i class="fa fa-fw fa-trash"></i></a></td>
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


 </td>
</tr>
</table>







<table style="width: 100%" cellspacing="0" cellpadding="0">
<tr>
<td style="background-color: #ab5408; color: #fff; padding: 1px; text-align: center; width: 25%; margin: 0px;">COSTOS </td>
<td style="background-color: #ab5408; color: #fff; padding: 1px; text-align: center; width: 75%; margin: 0px;">PAGOS PROVEEDOR</td>
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
</td>
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
               <td style="vertical-align:middle; padding: 1px; text-align: center; "><a href="tareas.php?conta2022=1&c=<? echo $_GET['c']; ?>&idmov=<? echo $rowm[0]; ?>#modmonto" class="btn bg-green"><i class="fa fa-fw fa-edit"></i></a></td>
                 <td style="vertical-align:middle; padding: 1px; text-align: center; "><a href="tareas.php?conta2022=1&c=<? echo $_GET['c']; ?>&id=<? echo $rowm[0]; ?>&elimov=1" class="btn bg-red" ><i class="fa fa-fw fa-trash"></i></a></td>
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


</td>
</tr>
</table>

       <hr>
       <? if(isset($_GET['idmov'])){
          ?> <h3 id="modmonto">Modificar Pago</h3><? 
       }else{
          ?> <h3>Agregar Pago</h3><? 
       }?>
      
            <form method="POST" action="tareas.php?conta2022=1&c=<? echo $_GET['c']; ?>" enctype="multipart/form-data">
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

<option value="<? echo $rowp[0]; ?>"><? echo htmlentities($rowp[1]).' '.htmlentities($rowp[2]); ?></option>
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
                         <select  class="form-control select2"   name="bancob"  style="width: 100%;" >
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
</div>
 
      
	 
   </div>
 </div>

 <script>
function eliminarCargo(d,c){
//tareas.php?bu=20&eli=1
var opcion = confirm("¿Seguro que quieres eliminar este Cargo?");
    if (opcion == true) {
      location.href='tareas.php?conta2022&eli=1&id='+d+'&c='+c;
  } 

}

function eliminarEvidencia(d,c){
//tareas.php?bu=20&eli=1
var opcion = confirm("¿Seguro que quieres eliminar esta Evidencia?");
    if (opcion == true) {
      location.href='tareas.php?conta2022&elievi=1&id='+d+'&c='+c;
  } 

}

</script>