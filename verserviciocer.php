
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
            <p><?php echo $row[104]; ?></p>
              </div>

   <div class="form-group col-lg-3"  >
            <label>Cliente</label>
               <p><?php echo $row[1]; ?></p>
              </div>

 
              <div class="form-group col-lg-3"  >
            <label>Origen</label>
               <p><?php echo $row[2]; ?></p>
              </div>

              <div class="form-group col-lg-3" >
            <label>Destino</label>
               <p><?php echo $row[3]; ?></p>
              </div>
              <div class="form-group col-lg-3"  >
            <label>M3</label>
               <p><?php echo $row[11]; ?></p>
              </div>
              <div class="form-group col-lg-3">
            <label>TELEFONO</label>
               <p><?php echo $row[50]; ?></p>
              </div>
              <div class="form-group col-lg-3">
            <label>CORREO ELECTRONICO</label>
               <p><?php echo $row[49]; ?></p>
              </div>




  <div class="form-group col-lg-3"  >
            <label>Servicio</label>
              <p><?php echo $row[135]; ?></p>
              </div>




                <div class="form-group col-lg-12" id="lista_muebles">
                  <label>Comentarios</label>
                  <p><?php echo $row[98]; ?></p>
                </div>

</div>
<div class="box-footer" style="width: 100%; overflow: hidden;">
<? if($row[4]!='Vehiculo'){ ?>

<? }else{ ?>
<div class="form-group col-lg-3" >
            <label>Gruas</label>
               <p><?php echo $row[86]; ?></p>
              </div>
<? } ?>

            
              

    <div class="form-group col-lg-3"  >
      <label>Monto Seguro del Cliente</label>
      <p><? echo round($row[19],2); ?></p>
      </div>

           
              <div class="form-group col-lg-2"  >
            <label>Seguro Cliente</label>
            <?php 
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
            <p>$ <?php echo number_format($segclie,2); ?></p>
               <input name="seguro_clie" type="hidden"   value="<?php if(isset($_POST['seguro_clie'])){ echo $_POST['seguro_clie']; }else{ echo $segclie; } ?>"  >
              </div>

              <div class="form-group col-lg-2"  >
            <label>Seguro Proveedor</label>
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
            
                   <p><? if($_POST['incluir_s']=='1'){ echo 'Si'; }  if($_POST['incluir_s']=='2'){ echo 'No'; } ?></p>
                  
              
              </div>


</div>

<div class="box-footer" style="width: 100%; overflow: hidden;">

 <div class="form-group col-lg-3">
               <label>PROVEEDOR 1</label>                 
                  <?
                   if($row[40]!='--'){
  $queryp = "select * FROM proveedores where id=".$row[40];
  $resultp = $link->query($queryp);
  $rowp = mysqli_fetch_row($resultp);
  ?>
<p><? echo htmlentities($rowp[1]).' '.htmlentities($rowp[2]); ?></p>
<?php } ?>
              </div>

               <div class="form-group col-lg-3" >
               <label>PROVEEDOR 2</label>
                  <?
                   if($row[87]!='--'){
  $queryp = "select * FROM proveedores where id=".$row[87];
  $resultp = $link->query($queryp);
$rowp = mysqli_fetch_row($resultp); ?>
<p><? echo htmlentities($rowp[1]).' '.htmlentities($rowp[2]); ?></p>
<?php } ?>
              </div>
              
              <div class="form-group col-lg-3" >
               <label>PROVEEDOR 3</label>
                  <?
                  if($row[88]!='--'){
   $queryp = "select * FROM proveedores where id=".$row[88];
  $resultp = $link->query($queryp);
$rowp = mysqli_fetch_row($resultp); ?>
<p><? echo htmlentities($rowp[1]).' '.htmlentities($rowp[2]); ?></p>
<?php } ?>
              </div>

 <div class="form-group col-lg-3" >
            <label>Tipo Mudanza</label>
            <p><?php echo $row[4]; ?></p>
              </div>



<div class="form-group col-lg-3" >
               <label>COSTO PROVEEDOR 1</label>
    <p>$ <?php echo round($row[129],2); ?></p>
              </div>
              <div class="form-group col-lg-3" >
               <label>COSTO PROVEEDOR 2</label>
    <p>$ <?php echo round($row[130],2); ?></p>
              </div>
              <div class="form-group col-lg-3" >
               <label>COSTO PROVEEDOR 3</label>
    <p>$ <?php echo round($row[131],2); ?></p>
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
    <p>$ <?php echo $cost2; ?></p>
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
            <p><?php echo $row[138]; ?></p>
      </div>


 <div class="form-group col-lg-3"  >
      <label>Desgaste</label>
      <p>$ <?php echo round($row[139],2); ?></p>
      </div>

       <div class="form-group col-lg-3"  >
      <label>Combustible</label>
      <p>$ <?php echo round($row[140],2); ?></p>
      </div>


<div class="form-group col-lg-3"  >
      <label>Cuota</label>
      <p>$ <?php echo round($row[141],2); ?></p>
      </div>





</div>

<div class="box-footer"  class="form-group" style="width: 100%; ">
              
             
          


 <div class="form-group col-lg-12" style=" <? if($row[4]=='Vehiculo'){ ?> display:none; <? } ?>" id="lista_muebles">
                  <label>Lista de muebles:</label>
                  <p><?php echo $row[7]; ?></p>
     
                </div>


               
                <?php // } ?>

               


<div id="divve" <? if($row[4]!='Vehiculo'){ ?> style="display: none;" <? } ?>>
            
            <div class="form-group col-lg-3"  >

            <label>Marca</label>
              <p><?php echo $row[57]; ?></p>
              </div>
              <div class="form-group col-lg-3" >

            <label>Modelo</label>
               <p><?php echo $row[58]; ?></p>
              </div>
              <div class="form-group col-lg-3" >

            <label>Tipo de Auto</label>
               <p><?php echo $row[59]; ?></p>
              </div>
            




</div>

</div>




<div  class="box-footer">

 <div class="form-group col-lg-3" >
                  <label>FECHA DEL SERVICIO</label>
                        <div class="input-group">
                          <p><?php echo substr($row[22],8,2).'/'.substr($row[22],5,2).'/'.substr($row[22],0,4); ?></p>
                          
                    </div>
                </div>


                 <div class="form-group col-lg-3" >
                  <label>HORA DEL SERVICIO</label>
                  <p><?php echo $row[23]; ?></p>
                </div>
                 <div class="form-group col-lg-3" >
                  <label>TIEMPO DE ENTREGA APROXIMADO</label>
                  <p><?php echo $row[38]; ?></p>
                </div>
                 <div class="form-group col-lg-3" >
                  <label>QUIEN VENDIO EL SERVICIO</label>
                  <p><?php echo $row[137]; ?></p>
                </div>
           
 </div>

<div class="box-footer" style="width: 100%; overflow: hidden;">
<p style="font-size:18px;">DIRECCIÓN DE CARGA</p>
 <div class="form-group col-lg-3" >
                  <label>CALLE Y NO.</label>
                  <p><?php echo $row[24]; ?></p>
                </div>
             
<input type="hidden" name="ciudad_c" class="form-control" value="<? echo $row[44]; ?>" >
<input type="hidden" name="estado_c" class="form-control" value="<? echo $row[106]; ?>" >           
                 <div class="form-group col-lg-3">
                  <label>NOM. DE QUIEN ENTREGA</label>
                  <p><?php echo $row[27]; ?></p>
                </div>
                <div class="form-group col-lg-3" >
                  <label>TEL. DE QUIEN ENTREGA</label>
                  <p><?php echo $row[28]; ?></p>
                </div>

 </div>

 
 <div class="box-footer">
<p style="font-size:18px;">DIRECCIÓN DE DESCARGA</p>
 <div class="form-group col-lg-3">
                  <label>CALLE Y NO.</label>
                  <p><?php echo $row[29]; ?></p>
                </div>
              
<input type="hidden" name="ciudad_d" class="form-control" value="<? echo $row[45]; ?>" >
<input type="hidden" name="estado_d" class="form-control" value="<? echo $row[108]; ?>" >

                 <div class="form-group col-lg-3" >
                  <label>REFERENCIA PARA LLEGAR</label>
                  <p><?php echo $row[31]; ?></p>
                </div>
                 <div class="form-group col-lg-3" >
                  <label>NOM. DE QUIEN RECIBE</label>
                  <p><?php echo $row[32]; ?></p>
                </div>
                <div class="form-group col-lg-3" >
                  <label>TEL. DE QUIEN RECIBE</label>
                  <p><?php echo $row[33]; ?></p>
                </div>

 </div>

 <div class="box-footer" style="width: 100%; overflow: hidden;">


<p style="font-size:18px;">PAGOS</p>


<input type="hidden" name="p1" value="">
<input type="hidden" name="p2" value="">
<input type="hidden" name="p3" value="">


              
                 <div class="form-group col-lg-3" >
                  <label>FORMA DE PAGO</label>
                  <p><?php echo $row[37]; ?></p>
                </div>
                <div class="form-group col-lg-3" >
            <label>Factura?</label>
             <p><?php echo $row[92]; ?></p>
              </div>
              <div class="form-group col-lg-3">
                  <label>RFC</label>
                  <p><?php echo $row[132]; ?></p>
                </div>
                <div class="form-group col-lg-3">
                  <label>RAZON SOCIAL</label>
                  <p><?php echo $row[133]; ?></p>
                </div>
                <div class="form-group col-lg-3" id="emailfac" style="display:none;">
                  <label>EMAIL</label>
                  <p><?php echo $row[134]; ?></p>
                </div>
              
                </div>
                <div class="box-footer" style="width: 100%; overflow: hidden;"> 

                <div class="box-footer">
<p style="font-size:18px;">DATOS INE</p>
 <div class="form-group col-lg-3">
                  <label>INE</label>
                  <p><?php echo $row[109]; ?></p>
                </div>
              

                <div   id="agregadodiv" style="height: auto; overflow: scroll; width: 100%; ">

</div>


</div>

<div class="col-md-12" style=" overflow: hidden;">





               



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

