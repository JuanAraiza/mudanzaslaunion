

<form id="formn" name="formn" action="tareas.php?ter=1" method="post" enctype="multipart/form-data" >
<div class="row">
    <div class="col-md-12">

           
 <?

  $query = "SELECT * from terminos";
  $result = $link->query($query);
  $row=mysqli_fetch_row($result);
?>

<div class="form-group" style="width: 100%;">
                  <label>EXCLUSIVO</label>
                  <textarea name="obsexclusivo" style="min-height: 12.25em; width: 100%;" ><? echo str_replace('<br />','',$row[1]); ?></textarea>
                </div>

                <div class="form-group" style="width: 100%;">
                  <label>COMPARTIDO</label>
                  <textarea name="obscompartido" style="min-height: 12.25em; width: 100%;" ><? echo str_replace('<br />','',$row[2]); ?></textarea>
                </div>

<div style="width:100%; align-content: right; text-align: right;">
  <button type="submit" class="btn btn-primary"  name="guardarcambios" id="guardarcambios">Guardar</button>
</div>

 </div>

       
        
              </div>
  
           


<?

if(isset($_POST['guardarcambios'])){

$campo1=nl2br($_POST['obsexclusivo']);
$campo2=nl2br($_POST['obscompartido']);


$csql = "update terminos set exclusivo='".$campo1."',compartido='".$campo2."'";
   $link->query($csql);

?>
    <script type="text/javascript">
     location.href="tareas.php?ter=1"; </script>
<? } ?>


