<?php

if(isset($_GET['eli'])){
    $query = "update inventario_gral set deshabilitado=1 where id=".$_GET['id'];
   $link->query($query);
 ?>
 <script type="text/javascript">
      location.href="tareas.php?bu=17&tip=<?php echo $_GET['tip']; ?>";
 </script>
 <?php
 
   }
 


if(isset($_POST['btn_inventario_guardar'])){

    $corr=0;
    $cade="";
    if($_POST['nombre']==''){
    $corr=1;
    $cade=$cade."Falta Nombre \\n";
    }
    
    
    
    $c1=$_POST['tipo'];
    $c2=$_POST['nombre'];
    $c3=$_POST['area'];
    $c4=$_POST['estado'];
    $c5=$_POST['serie'];
    $c6=$_POST['piezas'];

    $uploadPath = "fotosinventario/"; 
    
   $c7 = $c1.date('YmdHis').$_FILES['archivo']['name'];
   $patch='fotosinventario';
   $max_ancho = 800;
   $max_alto = 800;
   if($_FILES['archivo']['type']=='image/png' || $_FILES['archivo']['type']=='image/jpeg' || $_FILES['archivo']['type']=='image/gif'){
   $medidasimagen= getimagesize($_FILES['archivo']['tmp_name']);
   $nombrearchivo=$_FILES['archivo']['name'];
   $rtOriginal=$_FILES['archivo']['tmp_name'];
   if($_FILES['archivo']['type']=='image/jpeg'){
   $original = imagecreatefromjpeg($rtOriginal);
   }else if($_FILES['archivo']['type']=='image/png'){
   $original = imagecreatefrompng($rtOriginal);
   }else if($_FILES['archivo']['type']=='image/gif'){
   $original = imagecreatefromgif($rtOriginal);
   }
   list($ancho,$alto)=getimagesize($rtOriginal);
   $x_ratio = $max_ancho / $ancho;
   $y_ratio = $max_alto / $alto;
   if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){
       $ancho_final = $ancho;
       $alto_final = $alto;
   }elseif (($x_ratio * $alto) < $max_alto){
       $alto_final = ceil($x_ratio * $alto);
       $ancho_final = $max_ancho;
   }else{
       $ancho_final = ceil($y_ratio * $ancho);
       $alto_final = $max_alto;
   }
   $lienzo=imagecreatetruecolor($ancho_final,$alto_final); 
   imagecopyresampled($lienzo,$original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
   
   if($_FILES['archivo']['type']=='image/jpeg'){
   imagejpeg($lienzo,$patch."/".$c7);
   }
   else if($_FILES['archivo']['type']=='image/png'){
   imagepng($lienzo,$patch."/".$c7);
   }
   else if($_FILES['archivo']['type']=='image/gif'){
   imagegif($lienzo,$patch."/".$c7);
   }    
   
   }else{
     $c7 = 'N_A';
   }

    $c8=md5($c1.$c2.date('YmdHis'));
    $c9=date('Y-m-d H:i:s');
    
    $regre=0;
    
    if($corr!=1){
    
      $query = "insert into inventario_gral(tipo,nombre,area,estado,serie,piezas,foto,clave,fecha) values('".$c1."','".$c2."','".$c3."','".$c4."','".$c5."','".$c6."','".$c7."','".$c8."','".$c9."')";
      // echo $query;
      $link->query($query);
    ?>
    <script type="text/javascript">
      location.href="tareas.php?bu=17&tip=<?php echo $_GET['tip']; ?>";
    </script>
    <?php
    }else{
      $regre=1;
    ?>
    <script type="text/javascript">alert('<?php echo $cade; ?>');</script>
    <?php
      }
    }



    if(isset($_POST['btn_inventario_editar'])){

        $corr=0;
        $cade="";
        if($_POST['nombre']==''){
        $corr=1;
        $cade=$cade."Falta Nombre \\n";
        }
        
        
        
        $c1=$_POST['tipo'];
        $c2=$_POST['nombre'];
        $c3=$_POST['area'];
        $c4=$_POST['estado'];
        $c5=$_POST['serie'];
        $c6=$_POST['piezas'];
    
        $uploadPath = "fotosinventario/"; 
        
       $c7 = $c1.date('YmdHis').$_FILES['archivo']['name'];
       $patch='fotosinventario';
       $max_ancho = 800;
       $max_alto = 800;
       if($_FILES['archivo']['type']=='image/png' || $_FILES['archivo']['type']=='image/jpeg' || $_FILES['archivo']['type']=='image/gif'){
       $medidasimagen= getimagesize($_FILES['archivo']['tmp_name']);
       $nombrearchivo=$_FILES['archivo']['name'];
       $rtOriginal=$_FILES['archivo']['tmp_name'];
       if($_FILES['archivo']['type']=='image/jpeg'){
       $original = imagecreatefromjpeg($rtOriginal);
       }else if($_FILES['archivo']['type']=='image/png'){
       $original = imagecreatefrompng($rtOriginal);
       }else if($_FILES['archivo']['type']=='image/gif'){
       $original = imagecreatefromgif($rtOriginal);
       }
       list($ancho,$alto)=getimagesize($rtOriginal);
       $x_ratio = $max_ancho / $ancho;
       $y_ratio = $max_alto / $alto;
       if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){
           $ancho_final = $ancho;
           $alto_final = $alto;
       }elseif (($x_ratio * $alto) < $max_alto){
           $alto_final = ceil($x_ratio * $alto);
           $ancho_final = $max_ancho;
       }else{
           $ancho_final = ceil($y_ratio * $ancho);
           $alto_final = $max_alto;
       }
       $lienzo=imagecreatetruecolor($ancho_final,$alto_final); 
       imagecopyresampled($lienzo,$original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
       
       if($_FILES['archivo']['type']=='image/jpeg'){
       imagejpeg($lienzo,$patch."/".$c7);
       }
       else if($_FILES['archivo']['type']=='image/png'){
       imagepng($lienzo,$patch."/".$c7);
       }
       else if($_FILES['archivo']['type']=='image/gif'){
       imagegif($lienzo,$patch."/".$c7);
       }    
       
       }else{
         $c7 = 'N_A';
       }
   
        $c8=md5($c1.$c2.date('YmdHis'));
        $c9=date('Y-m-d H:i:s');
        
        $regre=0;
        
        if($corr!=1){
        
            if($c7 != 'N_A'){

                $queryf = "select * FROM inventario_gral where id=".$_POST['id'];
                $resultf = $link->query($queryf);
                $rowf = mysqli_fetch_row($resultf);
                unlink('fotosinventario/'.$rowf[7]);
                $cade=",foto='".$c7."'";
            }else{
                $cade='';
            }


          $query = "update inventario_gral set nombre='".$c2."',area='".$c3."',estado='".$c4."',serie='".$c5."',piezas='".$c6."'".$cade." where id=".$_POST['id'];
         //  echo $query;
          $link->query($query);
        ?>
        <script type="text/javascript">
          location.href="tareas.php?bu=17&tip=<?php echo $_GET['tip']; ?>";
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
 
 <!-- Main content -->
 <div class="modal fade" id="modal-inspector">
  <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Nuevo Inventario Tipo <?php switch($_GET['tip']){
            case 1:
echo 'Mobiliario';
                break;
            case 2:
echo 'Papeleria';
                break;
            case 3:
echo 'Herramienta';
                break;
            case 4:
echo 'Equipo';
                break;
            case 5:
echo 'Limepieza';
                break;
            case 6:
echo 'Despensa';
                break;
        } ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form name="form" id="form" class="col-12" method="post" action="tareas.php?bu=17&tip=<?php echo $_GET['tip']; ?>" enctype="multipart/form-data">
          
          <div class="modal-body">
<div class=" col-md-12 row">
      <!-- SELECT2 EXAMPLE -->
         

<input name="tipo" id="tipo" value="<?php echo $_GET['tip']; ?>" type="hidden"/>
   

     <div class="form-group col-md-4">
             <label>Nombre</label>
                <input name="nombre" id="nombre" class="form-control" type="text" <?php if(isset($_POST['nombre'])){ ?> value="<?php echo $_POST['nombre']; ?>" <?php } ?>>
    </div>
    <div class="form-group col-md-4">
             <label>Area</label>
                <input name="area" id="area" class="form-control" type="text" <?php if(isset($_POST['area'])){ ?> value="<?php echo $_POST['area']; ?>" <?php } ?>>
    </div>
    <div class="form-group col-md-4">
             <label>Estado</label>
                <input name="estado" id="estado" class="form-control" type="text" <?php if(isset($_POST['estado'])){ ?> value="<?php echo $_POST['estado']; ?>" <?php } ?>>
    </div>
    <div class="form-group col-md-4">
             <label>Serie</label>
                <input name="serie" id="serie" class="form-control" type="text" <?php if(isset($_POST['serie'])){ ?> value="<?php echo $_POST['serie']; ?>" <?php } ?>>
    </div>
    <div class="form-group col-md-4">
             <label>Piezas</label>
                <input name="piezas" id="piezas" class="form-control" type="text" <?php if(isset($_POST['piezas'])){ ?> value="<?php echo $_POST['piezas']; ?>" <?php } ?>>
    </div>

    <div class="form-group col-md-4">
             <label>Foto</label>
                <input name="archivo" id="archivo" class="form-control" type="file">
    </div>

  
   

    </div>

        </div>
<div class="modal-footer justify-content-right">
  <input type="submit" class="btn btn-primary"  name="btn_inventario_guardar" value="Guardar">
</div>

</form>

</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->



<section class="content">

<!-- SELECT2 EXAMPLE -->
<div class="box box-default">
  <div class="box-header with-border">
    <div class="row">
  <div class="col-md-3">
    <h2 class="box-title">
        <?php switch($_GET['tip']){
            case 1:
echo 'Mobiliario';
                break;
            case 2:
echo 'Papeleria';
                break;
            case 3:
echo 'Herramienta';
                break;
            case 4:
echo 'Equipo';
                break;
            case 5:
echo 'Limepieza';
                break;
            case 6:
echo 'Despensa';
                break;
        } ?>
    </h2>
    </div>
    <div class="col-md-3">
        <a class="btn btn-info form-control" data-toggle="modal" data-target="#modal-inspector" ><i class="fa-solid fa-person-chalkboard"></i> &nbsp; Ingresar Inventario</a>
    </div>
    
</div>  

</div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="row">
      <div class="col-md-12">

      <table class="table">
  <tr>
 
    <td><strong>Foto</strong></td>
    <td><strong>Tipo</strong></td>
    <td><strong>Nombre</strong></td>
    <td><strong>Area</strong></td>
    <td><strong>Estado</strong></td>
    <td><strong>Serie</strong></td>
    <td><strong>Piezas</strong></td>
    <td></td>
    <td></td>
  </tr>
<?php
 $query = "select * FROM inventario_gral where tipo='".$_GET['tip']."' and deshabilitado=0 order by id";
 $result = $link->query($query);
 $r=0;
while ($row = mysqli_fetch_row($result)){
  if($r==1){
      $r=2;
      $c='#c8c8c6';
    }else{
      $r=1;
      $c='#dbdbdb';
    }
    ?>
  <tr>
  <td style="padding: 5px;"> <a class="btn btn-default" data-toggle="modal" data-target="#modal-imginv<?php echo $row[0]; ?>" ><img src="fotosinventario/<?php echo $row[7]; ?>" style="width:120px;"></a>


  <div class="modal fade" id="modal-imginv<?php echo $row[0]; ?>">
  <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-body">

<img src="fotosinventario/<?php echo $row[7]; ?>" >
 
</div>

</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

</td>
    <td style="padding: 5px;"><?php switch($row[1]){
            case 1:
echo 'Mobiliario';
                break;
            case 2:
echo 'Papeleria';
                break;
            case 3:
echo 'Herramienta';
                break;
            case 4:
echo 'Equipo';
                break;
            case 5:
echo 'Limepieza';
                break;
            case 6:
echo 'Despensa';
                break;
        } ?></td>
    <td style="padding: 5px;"><?php echo $row[2]; ?></td>
    <td style="padding: 5px;"><?php echo $row[3]; ?></td>
    <td style="padding: 5px;"><?php echo $row[4]; ?></td>
    <td style="padding: 5px;"><?php echo $row[5]; ?></td>
    <td style="padding: 5px;"><?php echo $row[6]; ?></td>
    <td><a class="btn btn-success" data-toggle="modal" data-target="#modal-router<?php echo $row[0]; ?>"><i class="fa fa-fw fa-edit"></i></a></td>
    <td><a class="btn btn-danger" onClick="eliminarUsuario('<?php echo $row[0]; ?>')"><i class="fa fa-fw fa-trash"></i></a></td>
  </tr>
<?php } ?>

</table>



<?php 
$consultavistas=$query;
$result = $link->query($consultavistas);
while ($row = mysqli_fetch_row($result)){
?>

<div class="modal fade" id="modal-router<?php echo $row[0]; ?>">
    <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Editar Inventario Tipo <?php switch($_GET['tip']){
            case 1:
echo 'Mobiliario';
                break;
            case 2:
echo 'Papeleria';
                break;
            case 3:
echo 'Herramienta';
                break;
            case 4:
echo 'Equipo';
                break;
            case 5:
echo 'Limepieza';
                break;
            case 6:
echo 'Despensa';
                break;
        } ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form name="form" id="form" class="col-12" method="post" action="tareas.php?bu=17&tip=<?php echo $_GET['tip']; ?>" enctype="multipart/form-data">
          
          <div class="modal-body">
<div class="row">

<input name="id" id="id" value="<?php echo $row[0]; ?>" type="hidden"/>

<input name="tipo" id="tipo" value="<?php echo $_GET['tip']; ?>" type="hidden"/>

<div class="form-group col-md-4">
               <label>Nombre</label>
                  <input name="nombre" id="nombre" class="form-control" type="text" value="<?php echo $row[2]; ?>">
      </div>
      <div class="form-group col-md-4">
             <label>Area</label>
                <input name="area" id="area" class="form-control" type="text" value="<?php echo $row[3]; ?>">
    </div>
    <div class="form-group col-md-4">
             <label>Estado</label>
                <input name="estado" id="estado" class="form-control" type="text"  value="<?php echo $row[4]; ?>">
    </div>
    <div class="form-group col-md-4">
             <label>Serie</label>
                <input name="serie" id="serie" class="form-control" type="text" value="<?php echo $row[5]; ?>">
    </div>
    <div class="form-group col-md-4">
             <label>Piezas</label>
                <input name="piezas" id="piezas" class="form-control" type="text" value="<?php echo $row[6]; ?>">
    </div>

    <div class="form-group col-md-4">
             <label>Foto</label>
             <img src="fotosinventario/<?php echo $row[7]; ?>" style="width:120px;">
                <input name="archivo" id="archivo" class="form-control" type="file">
    </div>

      </div>

</div>
<div class="modal-footer justify-content-right">
  <input type="submit" class="btn btn-primary"  name="btn_inventario_editar"  value="Guardar">
</div>



</form>

</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

<?php } ?>

</div>
</div>
</div>

</div>
</section>

<script>
function eliminarUsuario(d){
//tareas.php?bu=20&eli=1
var opcion = confirm("¿Seguro que quieres eliminar este Inventario?");
    if (opcion == true) {
      location.href='tareas.php?bu=17&tip=<?php echo $_GET['tip']; ?>&eli=1&id='+d;
  } 

}

</script>