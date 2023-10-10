<?php
if(isset($_POST['guardarcotizacion2'])){

  $c1=$_POST['costo3'];
		   $c2=$_POST['costo4'];
       $c3=$_POST['proveedor1'];
       $c4=$_POST['proveedor2'];
       $c5=$_POST['proveedor3'];
       $c6=$_POST['clave'];
       
 
           $csql = "update cotizacion2 set costo='".$c1."',costo2='".$c1."',costoproveedor='".$c2."',proveedor1='".$c3."',proveedor2='".$c4."',proveedor3='".$c5."',estatus=2 where clave='".$c6."'";  
            
         $link->query($csql);
     
            ?>
     <script language="JavaScript" type="text/javascript">
     location.href='tareas.php?cs=1&c=<?php echo $c6; ?>"&abrir=2';
     </script>
     <?php		   

}


  $query="SELECT * from cotizacion2 where clave='".$_GET['c']."'";
$result = $link->query($query);
  $row=mysqli_fetch_row($result);
  ?>
<div class="row">
    <div class="col-md-12">
<form id="formn" name="formn" action="tareas.php?bu=11" method="post" >



<div class="col-md-6" style="width: 100%; overflow: hidden;">
<div class="form-group" >
            <label>No. Cotización</label>
               <p><?php echo $row[0]; ?></p>
              </div>
<div class="form-group" >
            <label>Cliente</label>
               <p><?php echo $row[1]; ?></p>
              </div>

              <div class="form-group" >
            <label>Origen</label>
            <p><?php echo $row[1]; ?></p>
              </div>

              <div class="form-group">
            <label>Destino</label>
            <p><?php echo $row[3]; ?></p>
              </div>

              <div class="form-group" >
            <label>TELEFONO</label>
            <p><?php echo $row[24]; ?></p>
              </div>


            <div class="form-group" style="height: 92px;" >
            <label>Tipo Mudanza</label>
            <p><?php echo $row[4]; ?></p>
              </div>
         
<div id="divve" style="display: none;">

<div class="form-group" >

            <label>Marca</label>
            <p><?php echo $row[28]; ?></p>
              </div>
              <div class="form-group" >

            <label>Modelo</label>
            <p><?php echo $row[29]; ?></p>
              </div>
              <div class="form-group" >

            <label>Tipo de Auto/Moto</label>
            <p><?php echo $row[30]; ?></p>
              </div>
            
</div> 



                 

                <div class="form-group" style="height: 92px;" >
            <label>Ruta</label>
            <p><?php echo $row[47]; ?></p>
              </div>

<div class="form-group" >
<label>Metodo de Pago</label>
<p><?php echo $row[48]; ?></p>
  </div>

  <div class="form-group" style="height: 92px;" >
            <label>Medio por el que se entero</label>
            <p><?php echo $row[49]; ?></p>
              </div>

      <div class="form-group" style="height: 92px;" >
            <label>Requiere Factura?</label>
            <p><?php echo $row[50]; ?></p>
              </div>



  <div class="form-group" >
<label>Presupuesto Maximo</label>
<p><?php echo $row[51]; ?></p>
  </div>

  <div class="form-group" >
<label>Niveles de la Casa</label>
<p><?php echo $row[52]; ?></p>
  </div>



  <div class="form-group" style="height: 92px;" >
            <label>Puede descargar a pie de casa?</label>
            <p><?php echo $row[53]; ?></p>
  </div>     

  <div class="form-group" >
<label>Articulo de Valos</label>
<p><?php echo $row[54]; ?></p>
  </div>

  <div class="form-group" >
<label>Complejidad de Maniobra</label>
<p><?php echo $row[55]; ?></p>
  </div>
             


  <div class="form-group">
                  <label>FECHA DEL SERVICIO</label>
                        
                        <p><?php echo $row[8]; ?></p>
                    
                </div>


              <div class="form-group" id="lista_muebles">
                  <label>Lista de muebles</label>
                  <p><?php echo $row[7]; ?></p>
                </div>

                <div class="form-group" id="lista_muebles">
                  <label>Comentarios</label>
                  <p><?php echo $row[56]; ?></p>
                </div>


</div>
<div class="col-md-6" style="width: 100%; overflow: hidden;">

<div class="box-body table-responsive no-padding" style="width:100%;">
<table class="table table-hover">
    <tr>
    <td align="center"><strong>Mercancia</strong></td>
    <td align="center"><strong>Alto</strong></td>
    <td align="center"><strong>Ancho</strong></td>
    <td align="center"><strong>Profundidad</strong></td>
    <td align="center"><strong>Peso</strong></td>
    <td align="center"><strong>Cantidad</strong></td>
  </tr>
<?php 
                  include('config.php');
                  
                    $querym ="SELECT * from muebles_s where cve_cotizacion='".$row[9]."'";
                    $m3=0.0;
                    $alcm=0.0;
                    $ancm=0.0;
                    $prcm=0.0;
                    $resultm = $link->query($querym);
                    while($rowm=mysqli_fetch_row($resultm)){
                ?>

<tr>
    <td align="center"><?php echo $rowm[3]; ?></td>
    <td align="center"><?php echo $rowm[4]; $alcm=$alcm+($rowm[4]); ?> cm</td>
    <td align="center"><?php echo $rowm[5]; $ancm=$ancm+($rowm[5]); ?> cm</td>
    <td align="center"><?php echo $rowm[6]; $prcm=$prcm+($rowm[6]); ?> cm</td>
    <td align="center"><?php echo $rowm[7]; ?> Kg</td>
    <td align="center"><?php echo $rowm[8]; ?></td>
  </tr>
                <?php 
              $alcm=$alcm/100;
              $ancm=$ancm/100;
              $prcm=$prcm/100;
              
              $m3=$m3+($alcm*$ancm*$prcm*$rowm[8]);
              
              } ?>
                <?php

                 ?>
               
</table>
</div>
</div>

<div class="col-md-6" style="width: 100%; overflow: hidden;">
<br>
<div class="form-group" id="lista_muebles">
                  <label>Metros Cubicos</label>
                  <p><?php echo number_format($m3,2); ?> M3</p>
                </div>

<?php 
                  include('config.php');
                  
                    $querym = "SELECT * from images_s where cve_cotizacion='".$row[9]."'";
                    $resultm = $link->query($querym);
                    while($rowm=mysqli_fetch_row($resultm)){
                ?>
<div class="col-md-6">

<img  src="archivos/<?php echo $rowm[3]; ?>" style="width:100%">
</div>
<?php } ?>

</div>

                <div class="col-md-6" style="width: 100%; overflow: hidden;">

                <div class="form-group" >

<label>Costo Cliente</label>
   <input name="costo3" id="costo3"  style="text-transform: uppercase;" class="form-control" type="text" onkeypress="return valida(event)" value="<?php echo $_POST['costo3']; ?>" >
  </div>

  <div class="form-group" >
<label>Costo Proveedor</label>
   <input name="costo4" id="costo4"  style="text-transform: uppercase;" class="form-control" type="text" onkeypress="return valida(event)" value="<?php echo $_POST['costo4']; ?>" >
  </div>
  <div class="form-group" style="height: 92px;">
   <label>PROVEEDOR 1</label>
   
   <select class="form-control select2" id="proveedor1" name="proveedor1">
      <option value="--">--</option>
       
      <?php

$queryp = "select * FROM proveedores";
$resultp = $link->query($queryp);
while ($rowp = mysqli_fetch_row($resultp)){
?>

<option <?php if($rowp[0]==$row[40]){ ?> selected <?php } ?> value="<?php echo $rowp[0]; ?>"><?php echo htmlentities($rowp[1]).' '.htmlentities($rowp[2]).' - '.$rowp[6] ; ?></option>
<?php } ?>

    </select>
  </div>
  <div class="form-group" style="height: 92px;">
   <label>PROVEEDOR 2</label>
   
   <select class="form-control select2" id="proveedor2" name="proveedor2">
      <option value="--">--</option>
       
      <?php
$queryp = "select * FROM proveedores";
$resultp = $link->query($queryp);
while ($rowp = mysqli_fetch_row($resultp)){
?>

<option <?php if($rowp[0]==$row[40]){ ?> selected <?php } ?> value="<?php echo $rowp[0]; ?>"><?php echo htmlentities($rowp[1]).' '.htmlentities($rowp[2]).' - '.$rowp[6] ; ?></option>
<?php } ?>

    </select>
  </div>
  <div class="form-group" style="height: 92px;">
   <label>PROVEEDOR 3</label>
   
   <select class="form-control select2" id="proveedor3" name="proveedor3">
      <option value="--">--</option>
       
      <?php
$queryp = "select * FROM proveedores";
$resultp = $link->query($queryp);
while ($rowp = mysqli_fetch_row($resultp)){
?>

<option <?php if($rowp[0]==$row[40]){ ?> selected <?php } ?> value="<?php echo $rowp[0]; ?>"><?php echo htmlentities($rowp[1]).' '.htmlentities($rowp[2]).' - '.$rowp[6] ; ?></option>
<?php } ?>

    </select>
  </div>

  <input type="hidden" name="clave" value="<?php echo $_GET['c']; ?>"/>



              </div>



 <div class="box-footer">
  <div class="form-group" style="width: 33%; align-content: center;">
               <?php  /* <button type="submit" class="btn btn-primary"  name="borrador" id="borrador">Generar Borrador</button> */?>
                <button type="submit" class="btn btn-primary"  name="guardarcotizacion2" id="guardarcotizacion2">Generar Cotización</button>
            </div>
        
              </div>

</div>
</div>

