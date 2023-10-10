<?php

if(isset($_GET['elise'])){
  $query = "delete from inventario_cruz where id=".$_GET['id'];
 $link->query($query);
?>
<script type="text/javascript">
 window.locationf="tareas.php?formatocruz=1&c=<? echo $_GET['c']; ?>";
</script>
<?php

 }


if(isset($_POST['guardarcambios'])){

$corr=0;
$cade="";

$c0=$_POST['clave_s'];
$c1=$_POST['valor_d'];
$c2=$_POST['condiciones_p'];
$c3=$_POST['conductor'];
$c4=$_POST['placas'];
$c5=$_POST['no_economico'];
$c6=$_POST['metodo_pago'];

$c7=$_POST['flete'];
$c8=$_POST['cargo_seg'];
$c9=$_POST['maniobras'];
$c10=$_POST['autopistas'];
$c11=$_POST['libramientos'];
$c12=$_POST['trasbordadores'];
$c13=$_POST['otros'];



$subtotal=$c7+$c8+$c9+$c10+$c11+$c12+$c13+$c14;
$iva=$subtotal * .16;
$porceiva=$iva*.04;
$total=$subtotal+$iva;

$c14=$subtotal;
$c15=$iva;
$c16=$porceiva;
$c17=$total;

$c18=$_POST['regimen1'];
$c19=$_POST['regimen2'];

  if($corr!=1){
    $queryc = "SELECT count(id) from servicio_cruz where clave_s='".$_GET['c']."'";
    $resultc = $link->query($queryc);
    $rowc=mysqli_fetch_row($resultc);
    if($rowc[0]>=1){
      $csql = "update servicio_cruz set valor_d='".$c1."',condiciones_p='".$c2."',conductor='".$c3."',placas='".$c4."',no_economico='".$c5."',metodo_pago='".$c6."',flete='".$c7."',cargo_se='".$c8."',maniobras='".$c9."',autopistas='".$c10."',libramientos='".$c11."',transbordadores='".$c12."',otros='".$c13."',subtotal='".$c14."',iva='".$c15."',retencion_iva='".$c16."',total='".$c17."',regimen2='".$c18."',regimen2='".$c19."' where clave_s='".$c0."'";
    }else{
      $csql = "insert into servicio_cruz(clave_s,valor_d,condiciones_p,conductor,placas,no_economico,metodo_pago,flete,cargo_se,maniobras,autopistas,libramientos,transbordadores,otros,subtotal,iva,retencion_iva,total,regimen1,regimen2) values('".$c0."','".$c1."','".$c2."','".$c3."','".$c4."','".$c5."','".$c6."','".$c7."','".$c8."','".$c9."','".$c10."','".$c11."','".$c12."','".$c13."','".$c14."','".$c15."','".$c16."','".$c17."','".$c18."','".$c19."')";
    }
    //echo $csql.'<br>';
    $link->query($csql);
      ?>
      <script type="text/javascript">
      location.href="tareas.php?formatocruz=1&c=<? echo $c0; ?>"; </script>
    <?php
    }else{
      ?>
    <script type="text/javascript">alert('<?php echo $cade; ?>');</script>
    <?php
    }
}


if(isset($_POST['guardarinventario'])){

  $corr=0;
  $cade="";
  
  $c0=$_POST['clave_s'];
  $c1=$_POST['numero'];
  $c2=$_POST['embalaje'];
  $c3=$_POST['contiene'];
  $c4=$_POST['peso'];
  $c5=$_POST['mts'];
  $c6=$_POST['peso_e'];
  $c7=0;



  if($corr!=1){
        $csql = "insert into inventario_cruz(numero,embalaje,contiene,peso,mts,peso_e,importe,clave_s) values('".$c1."','".$c2."','".$c3."','".$c4."','".$c5."','".$c6."','".$c7."','".$c0."')";
      //echo $csql.'<br>';
      $link->query($csql);
        ?>
        <script type="text/javascript">
        location.href="tareas.php?formatocruz=1&c=<? echo $c0; ?>"; </script>
      <?php
      }else{
        ?>
      <script type="text/javascript">alert('<?php echo $cade; ?>');</script>
      <?php
      }
  }


  

  if(isset($_POST['editarinventario'])){

    $corr=0;
    $cade="";
    
    $c0=$_POST['clave_s'];
    $c1=$_POST['numero'];
    $c2=$_POST['embalaje'];
    $c3=$_POST['contiene'];
    $c4=$_POST['peso'];
    $c5=$_POST['mts'];
    $c6=$_POST['peso_e'];
    $c7=0;
  
  
  
    if($corr!=1){
          $csql = "update inventario_cruz set numero='".$c1."',embalaje='".$c2."',contiene='".$c3."',peso='".$c4."',mts='".$c5."',peso_e='".$c6."',importe='".$c7."' where id=".$_POST['idinv'];
        //echo $csql.'<br>';
        $link->query($csql);
          ?>
          <script type="text/javascript">
          location.href="tareas.php?formatocruz=1&c=<? echo $c0; ?>"; </script>
        <?php
        }else{
          ?>
        <script type="text/javascript">alert('<?php echo $cade; ?>');</script>
        <?php
        }
    }

?>
 <?php
  $query = "SELECT * from servicio where clave='".$_GET['c']."'";
  $result = $link->query($query);
  $row=mysqli_fetch_row($result);
?>


<div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Folio: <?php echo $row[0]; ?></h3>
            </div>
            <div class="box-body">
              
<form id="formn" name="formn" action="tareas.php?formatocruz=1&c=<? echo $_GET['c']; ?>" method="post" enctype="multipart/form-data" >
<input id="clave_s" name="clave_s" type="hidden" value="<? echo $_GET['c']; ?>">



   <div class="col-md-12">

   
   <div class="row col-lg-12">



   <div class="form-group col-lg-3"  >
            <label>Cliente</label>
               <p><?php echo $row[1];  ?></p>
              </div>

              <div class="form-group col-lg-3"  >
            <label>Origen</label>
            <p><?php echo $row[2];  ?></p>
              </div>

              <div class="form-group col-lg-3" >
            <label>Destino</label>
            <p><?php echo $row[3];  ?></p>
              </div>
           
              <div class="form-group col-lg-3">
            <label>Tipo Mudanza</label>
            <p><?php echo $row[4];  ?></p>
              </div>
                 
</div>

<?php
  $querydc1 = "SELECT * from servicio_cruz where clave_s='".$_GET['c']."'";
  $resultdc1 = $link->query($querydc1);
  $rowdc1=mysqli_fetch_row($resultdc1);
?>

<div class="row col-lg-12">

<div class="form-group col-lg-3" >
               <label>REGIMEN REMITENTE</label>
    <input type="text" name="regimen1"  class="form-control" value="<?php if(isset($_POST['regimen1'])){ echo $_POST['regimen1']; }else{ echo $rowdc1[19]; } ?>">
              </div>
              <div class="form-group col-lg-3" >
               <label>REGIMEN DESTINATARIO</label>
    <input type="text" name="regimen2"  class="form-control" value="<?php if(isset($_POST['regimen2'])){ echo $_POST['regimen2']; }else{ echo $rowdc1[20]; } ?>">
              </div>


<div class="form-group col-lg-3" >
               <label>VALOR DECLARADO</label>
    <input type="text" name="valor_d"  class="form-control" onkeypress="return valida(event)" value="<?php if(isset($_POST['valor_d'])){ echo $_POST['valor_d']; }else{ echo $rowdc1[2]; } ?>">
              </div>
              <div class="form-group col-lg-3" >
               <label>CONDICIONES DE PAGO</label>
    <input type="text" name="condiciones_p"  class="form-control" value="<?php if(isset($_POST['condiciones_p'])){ echo $_POST['condiciones_p']; }else{ echo $rowdc1[3]; } ?>">
              </div>
              <div class="form-group col-lg-3" >
               <label>CONDUCTOR</label>
    <input type="text" name="conductor"  class="form-control" value="<?php if(isset($_POST['conductor'])){ echo $_POST['conductor']; }else{ echo $rowdc1[4]; } ?>">
              </div>
            
              <div class="form-group col-lg-3" >
               <label>PLACAS</label>
    <input type="text" name="placas"  class="form-control" value="<?php if(isset($_POST['placas'])){ echo $_POST['placas']; }else{ echo $rowdc1[5]; } ?>">
              </div>

              <div class="form-group col-lg-3" >
               <label>NO. ECONOMICO</label>
    <input type="text" name="no_economico"  class="form-control" value="<?php if(isset($_POST['no_economico'])){ echo $_POST['no_economico']; }else{ echo $rowdc1[6]; } ?>">
              </div>

           

              <div class="form-group col-lg-3" >
                <label>FLETE</label>
                <input type="text" name="flete"  class="form-control" onkeypress="return valida(event)" value="<?php if(isset($_POST['flete'])){ echo $_POST['flete']; }else{ echo $rowdc1[8]; } ?>">
            </div>
            <div class="form-group col-lg-3" >
                <label>CARGO SEGURO</label>
                <input type="text" name="cargo_seg"  class="form-control" onkeypress="return valida(event)" value="<?php if(isset($_POST['cargo_seg'])){ echo $_POST['cargo_seg']; }else{ echo $rowdc1[9]; } ?>">
            </div>
            <div class="form-group col-lg-3" >
                <label>MANIOBRAS</label>
                <input type="text" name="maniobras"  class="form-control" onkeypress="return valida(event)" value="<?php if(isset($_POST['maniobras'])){ echo $_POST['maniobras']; }else{ echo $rowdc1[10]; } ?>">
            </div>
            <div class="form-group col-lg-3" >
                <label>AUTOPISTAS</label>
                <input type="text" name="autopistas"  class="form-control" onkeypress="return valida(event)" value="<?php if(isset($_POST['autopistas'])){ echo $_POST['autopistas']; }else{ echo $rowdc1[11]; } ?>">
            </div>
            <div class="form-group col-lg-3" >
                <label>LIBRAMIENTOS</label>
                <input type="text" name="libramientos"  class="form-control" onkeypress="return valida(event)" value="<?php if(isset($_POST['libramientos'])){ echo $_POST['libramientos']; }else{ echo $rowdc1[12]; } ?>">
            </div>
            <div class="form-group col-lg-3" >
                <label>TRASBORDADORES</label>
                <input type="text" name="trasbordadores"  class="form-control" onkeypress="return valida(event)" value="<?php if(isset($_POST['trasbordadores'])){ echo $_POST['trasbordadores']; }else{ echo $rowdc1[13]; } ?>">
            </div>
            <div class="form-group col-lg-3" >
                <label>OTROS</label>
                <input type="text" name="otros"  class="form-control" onkeypress="return valida(event)" value="<?php if(isset($_POST['otros'])){ echo $_POST['otros']; }else{ echo $rowdc1[14]; } ?>">
            </div>


  </div>
  <div class="row col-lg-12">
    
            <div class="form-group col-lg-3"  >
            <label>Subtotal</label>
               <p>$ <?php echo number_format($rowdc1[16],2);  ?></p>
              </div>
              <div class="form-group col-lg-3"  >
            <label>Iva</label>
               <p>$ <?php echo number_format($rowdc1[15],2);  ?></p>
              </div>
              <div class="form-group col-lg-3"  >
            <label>Retencion Iva</label>
               <p>$ <?php echo number_format($rowdc1[17],2);  ?></p>
              </div>
              <div class="form-group col-lg-3"  >
            <label>Total</label>
               <p>$ <?php echo number_format($rowdc1[18],2);  ?></p>
              </div>

</div>

<div class="box-footer" style="width: 100%; overflow: hidden;"> 

 <?php  if($_SESSION['tipo_usuario']!='visor'){ ?>
<div style="width:100%; align-content: right; text-align: right;">
  <button type="submit" class="btn btn-primary"  name="guardarcambios" id="guardarcambios">Guardar Datos</button>
</div>
<?php } ?>
 </div>
        </div>
   </form>                 

 </div></div>

<!--  -----------------   Inventario   --------------------- -->
<div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Inventario</h3>
            </div>
            <div class="box-body">
<form id="formn" name="formn" action="tareas.php?formatocruz=1&c=<? echo $_GET['c']; ?>" method="post" enctype="multipart/form-data" >
<input id="clave_s" name="clave_s" type="hidden" value="<? echo $_GET['c']; ?>">

   <div class="col-md-12">

<div class="row col-lg-12">


<div class="box-body table-responsive no-padding" style="width:100%;">
<table class="table table-hover" >
    <tr>
      <td align="center"><strong>Numero</strong></td>
      <td align="center"><strong>Embalaje</strong></td>
      <td align="center"><strong>Contiene</strong></td>
      <td align="center"><strong>Peso</strong></td>
      <td align="center"><strong>Mts</strong></td>
      <td align="center"><strong>Peso Estimado</strong></td>
      <td></td>
      <td></td>
    </tr>

  <?php
  $queryinv = "SELECT * from inventario_cruz where clave_s='".$_GET['c']."' order by id";
  $resultinv = $link->query($queryinv);
  while($rowinv=mysqli_fetch_row($resultinv)){
  ?>
   <tr>
      <td align="center"><?php echo $rowinv[1]; ?></td>
      <td align="center"><?php echo $rowinv[2]; ?></td>
      <td align="center"><?php echo $rowinv[3]; ?></td>
      <td align="center"><?php echo $rowinv[4]; ?></td>
      <td align="center"><?php echo $rowinv[5]; ?></td>
      <td align="center"><?php echo $rowinv[6]; ?></td>
      <td><a class="btn bg-orange" style="font-size: 11px;" href="tareas.php?formatocruz=1&c=<? echo $row[9]; ?>&id=<? echo $rowinv[0]; ?>&edise=1#numero" ><i class="fa-solid fa-pen-to-square"></i></a></td>
      <td><a class="btn bg-red" style="font-size: 11px;"  onClick="eliminarArticulo('<?php echo $rowinv[0]; ?>')" ><i class="fa fa-fw fa-trash "></i></a></td>
    </tr>
   <?php  } ?>


 </table>
 </div>
              
</div>


<div class="row col-lg-12">
<?php if(isset($_GET['edise'])){
    $queryinve = "SELECT * from inventario_cruz where id=".$_GET['id'];
    $resultinve = $link->query($queryinve);
    $rowinve=mysqli_fetch_row($resultinve);
?><input name="idinv" type="hidden" value="<?php echo $rowinve[0]; ?>"/>
<?php } ?>

<div class="form-group col-lg-2" >
               <label>NUMERO</label>
    <input type="text" name="numero" id="numero" class="form-control" onkeypress="return valida(event)" <?php if(isset($_GET['edise'])){ ?>value="<?php echo $rowinve[1]; ?>"<?php } ?>  >
              </div>
    <div class="form-group col-lg-1" >
          <label>EMBALAJE</label>
          <input type="text" name="embalaje" class="form-control" <?php if(isset($_GET['edise'])){ ?>value="<?php echo $rowinve[2]; ?>"<?php } ?>  >
     </div>
     <div class="form-group col-lg-2" >
          <label>CONTINENE</label>
          <input type="text" name="contiene" class="form-control" <?php if(isset($_GET['edise'])){ ?>value="<?php echo $rowinve[3]; ?>"<?php } ?>   >
     </div>
     <div class="form-group col-lg-2" >
          <label>PESO</label>
          <input type="text" name="peso" class="form-control" <?php if(isset($_GET['edise'])){ ?>value="<?php echo $rowinve[4]; ?>"<?php } ?>   >
     </div>
     <div class="form-group col-lg-2" >
          <label>MTS</label>
          <input type="text" name="mts" class="form-control" <?php if(isset($_GET['edise'])){ ?>value="<?php echo $rowinve[5]; ?>"<?php } ?>   >
     </div>
     <div class="form-group col-lg-1" >
          <label>PESO EST.</label>
          <input type="text" name="peso_e" class="form-control" <?php if(isset($_GET['edise'])){ ?>value="<?php echo $rowinve[6]; ?>"<?php } ?>   >
     </div>
   


</div>

<div class="box-footer" style="width: 100%; overflow: hidden;"> 

 <?php  if($_SESSION['tipo_usuario']!='visor'){ ?>
<div style="width:100%; align-content: right; text-align: right;">
<?php if(isset($_GET['edise'])){ ?>
  <button type="submit" class="btn btn-primary"  name="editarinventario" id="editarinventario">Guardar Cambios Inventario</button>
  <?php }else{ ?>
    <button type="submit" class="btn btn-primary"  name="guardarinventario" id="guardarinventario">Guardar Inventario</button>
  <?php } ?>

</div>
<?php } ?>
 </div>
        </div>
   </form>                 


 </div></div>





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
  
</script>

<script>
function eliminarArticulo(d){

var opcion = confirm("¿Desea borrar este Articulo?");
    if (opcion == true) {
      location.href='tareas.php?formatocruz=1&c=<? echo $row[9]; ?>&id='+d+'&elise=1';
  } 


}

</script>