<?php

if(isset($_GET['eli'])){
    $query = "delete from notas_i where id=".$_GET['id'];
    $link->query($query);
?>
<script type="text/javascript">
  window.locationf="tareas.php?not=1";
</script>
<?php

  }


if(isset($_POST['guardar'])){

$corr=0;
$cade="";
if($_POST['nota']==''){
$corr=1;
$cade=$cade."Falta Nota \\n";
}

if($_POST['fecha_s']==''){
$corr=1;
$cade=$cade."Falta Fecha \\n";
}


$c1=$_POST['nota'];
$c2=substr($_POST['fecha_s'],6,4).'-'.substr($_POST['fecha_s'],3,2).'-'.substr($_POST['fecha_s'],0,2);
$c3=$_SESSION['id_user'];
$c4=date('Y-m-d H:i:s');
$c5=$_SESSION['color_user'];

$regre=0;

if($corr!=1){

  $query = "insert into notas_i(nota,fecha,id_user,fecha2,color) values('".$c1."','".$c2."','".$c3."','".$c4."','".$c5."')";
  //echo $query;
$link->query($query);
?>
<script type="text/javascript">
 location.href="tareas.php?not=1";
</script>
<?php
}else{ 
  $regre=1;
?>
<script type="text/javascript">alert('<?php echo $cade; ?>');</script>
<?php
}
  } 




?>


<form name="form" id="form" method="post" action="tareas.php?not=1">
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Llenar los campos correctamente</h3>

         <!-- <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>-->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row col-lg-12">
         

  <div class="form-group col-lg-6">
                  <label>NOTA</label>
                  <textarea  id="nota" name="nota" class="form-control" rows="4" placeholder="nota ..." style="text-transform: uppercase;" ></textarea>
                </div>

 <div class="form-group col-lg-6" >
    <label>FECHA DE LA Nota</label>
                       
                          <input  class="form-control" autocomplete="off"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask maxlength="10" type="text" name="fecha_s" id="datepicker" >
                    </div>
</div>



          
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        <!-- <input type="button" name="guardar2" id="guardar2" class="btn btn-primary" onClick="javascript:validar();" value="Guardar">-->
          <input type="submit"   name="guardar" id="guardar"  class="btn btn-primary"  value="Guardar">
        </div>


      </div>
      <!-- /.box -->

    
      
</form>
      <!-- /.row -->


     
      

          <div style="width: 100%; ">

          <!-- TO DO List -->
          <div class="box box-default">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">Lista de Notas</h3>

             
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
              
<table style="width: 70%; border-radius: 8px;">
  <tr>
    <td><strong>Nota</strong></td>
    <td><strong>Fecha</strong></td>
    <td></td>
    <td></td>
  </tr>

<?php


  $query = "select * FROM notas_i order by fecha desc";


$result = $link->query($query);
$r=1;
while ($row = mysqli_fetch_row($result)){
  
    ?>
    <tr style="background:<?php echo $c; ?>;  border-radius: 8px; height: 40px;">
     <td style="padding: 5px;"><?php echo $row[1]; ?></td>
     <td style="padding: 5px;"><?php echo substr($row[2],8,2).'-'.substr($row[2],5,2).'-'.substr($row[2],0,4); ?></td>
    <td><a class="btn btn-danger" href="tareas.php?not=1&eli=1&id=<?php echo $row[0]; ?>"><i class="fa fa-fw fa-trash"></i></a></td>
  </tr>
<?php } ?>

</table>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>
        <!-- right col -->
   

 



