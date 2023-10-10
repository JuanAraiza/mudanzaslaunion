<? 

if(isset($_POST['guardarchofer'])){

    $campo1=$_POST['nombre'];
    $campo2=$_POST['telefono'];
    $campo3=$_GET['id'];
    
  
      $csql = $link->query("insert into chofer(nombre,telefono,proveedor) values('".$campo1."','".$campo2."','".$campo3."')");  

       ?>
<script language="JavaScript" type="text/javascript">
location.href="tareas.php?p=1&edi=1&id=<? echo $_GET['id']; ?>";
</script>
<?
}


if(isset($_POST['guardarruta'])){

    $campo1=$_POST['ruta'];
    $campo2=$_GET['id'];

     
      $csql =  $link->query("insert into ruta(ruta,proveedor) values('".$campo1."','".$campo2."')");  
    
       ?>
<script language="JavaScript" type="text/javascript">
location.href="tareas.php?p=1&edi=1&id=<? echo $_GET['id']; ?>";
</script>
<?

}



	$resultpre= $link->query("SELECT * from proveedores where id=".$_GET['id']);
	$rowpre=mysqli_fetch_row($resultpre);
			?>
    <form id="form2" name="form2" action="tareas.php?p=1" method="post" >
        <h3>Editar Proveedor</h3>
<div class="form-group" >
            <label>Nombre</label>
            <input type="text"  class="form-control" name="nombre" id="nombre" value="<? echo $rowpre[1]; ?>">
        </div>
        <!--<div class="form-group" >
            <label>Paterno</label>
            <input type="text" class="form-control" name="paterno" id="paterno" value="<? echo $rowpre[2]; ?>">
        </div>
         <div class="form-group" >
            <label>Materno</label>
            <input type="text" class="form-control" name="materno" id="materno" value="<? echo $rowpre[3]; ?>">
        </div>-->
         <div class="form-group" >
            <label>Telefono</label>
            <input type="text" class="form-control" name="telefono" id="telefono" value="<? echo $rowpre[4]; ?>">
        </div>

         <div class="form-group" >
            <label>Correo</label>
            <input type="text" class="form-control" name="correo" id="correo" value="<? echo $rowpre[5]; ?>">
        </div>
        
        <div class="form-group" >
            <label>Direccion</label>
            <input type="text" class="form-control" name="direccion" id="direccion" value="<? echo $rowpre[11]; ?>">
        </div>
        <!--<div class="form-group" >
            <label>RFC</label>
            <input type="text" class="form-control" name="rfc" id="rfc" value="<? echo $rowpre[6]; ?>">
        </div>
        <div class="form-group" >
            <label>Empresa</label>
            <input type="text" class="form-control" name="empres" id="empresa" value="<? echo $rowpre[7]; ?>">
        </div>-->
       
        <div class="form-group" >
            <label>No. Cuenta</label>
            <input type="text" class="form-control" name="no_cuenta" id="no_cuenta" value="<? echo $rowpre[8]; ?>">
        </div>
        <div class="form-group" >
            <label>Banco</label>
            <input type="text" class="form-control" name="banco" id="banco" value="<? echo $rowpre[9]; ?>">
        </div>
        <div class="form-group" >
            <label>No. Cuenta 2</label>
            <input type="text" class="form-control" name="no_cuenta2" id="no_cuenta2" value="<? echo $rowpre[12]; ?>">
        </div>
        <div class="form-group" >
            <label>Banco 2</label>
            <input type="text" class="form-control" name="banco2" id="banco2" value="<? echo $rowpre[13]; ?>">
        </div>
        
        <div class="form-group col-md-3" >
            <label>Imagen de Tarjeta</label>
            <img src="archivos/<? echo $rowpre[10]; ?>">
            <input type="file" name="img_tarjeta" >
        </div>

         
<input type="hidden"  class="form-control" name="id" id="id" value="<? echo $rowpre[0]; ?>">



        <div class="box-footer">
  <div class="form-group" style="width: 33%; align-content: center;">
                <button type="submit" class="btn btn-primary"  id="editar" name="editar" >Guardar</button>
            </div>
        
              </div>
    </form>


    <form id="form2" name="form2" action="tareas.php?p=1&edi=1&id=<? echo $_GET['id']; ?>" method="post" >
        <h3>Chofer</h3>
<div class="form-group" >
            <label>Nombre</label>
            <input type="text"  class="form-control" name="nombre" id="nombre">
        </div>
         <div class="form-group" >
            <label>Telefono</label>
            <input type="text" class="form-control" name="telefono" id="telefono">
        </div>
         
        <div class="box-footer">
  <div class="form-group" style="width: 33%; align-content: center; margin-top: 23px;">

                <button type="submit" class="btn btn-primary"  id="guardarchofer" name="guardarchofer">Guardar Chofer</button>
            </div>
        
              </div>
    </form>

<div class="row">
    <div class="col-md-6"> 
<table style="width: 500px;">
    <tr style="background-color: #ccc;">
    <td align="center"><strong>Nombre</strong></td>
    <td align="center"><strong>Telefono</strong></td>

    <td>&nbsp;</td>
    </tr>
  <?
  
  
  $resultpr= $link->query("SELECT * from chofer where proveedor=".$_GET['id']);
  $f=0;
  while($rowpr=mysqli_fetch_row($resultpr)){
  if($f==0){

$f=1;
$c='#dadada;';
  }else{
$f=0;
$c='#ededeb;';
  }

  ?>
       <tr style="background-color: <? echo $c; ?>">
    <td><? echo $rowpr[1]; ?></td>
    <td><? echo $rowpr[2]; ?></td>

    <td><a href="tareas.php?p=1&edi=1&elich=1&id=<? echo $_GET['id']; ?>&idc=<? echo $rowpr[0]; ?>" class="btn bg-red" style="margin-top: -4px;">Eliminar</a></td>
    </tr> 
        <?
  }
  ?></table>

</div>
</div>

    <form id="form2" name="form2" action="tareas.php?p=1&edi=1&id=<? echo $_GET['id']; ?>" method="post" >
        <h3>Rutas</h3>
<div class="form-group" >
            <label>Ruta</label>
            <input type="text"  class="form-control" name="ruta" id="ruta">
        </div>

        <div class="box-footer">
  <div class="form-group" style="width: 33%; align-content: center; margin-top: 23px;">
                <button type="submit" class="btn btn-primary"  id="guardarruta" name="guardarruta" >Guardar Ruta</button>
            </div>
        
              </div>
    </form>

<div class="row">
    <div class="col-md-6"> 
<table style="width: 500px;">
    <tr style="background-color: #ccc;">
    <td align="center"><strong>Ruta</strong></td>
    <td>&nbsp;</td>
    </tr>
  <?
  

  $resultpr= $link->query("SELECT * from ruta where proveedor=".$_GET['id']);
  $f=0;
  while($rowpr=mysqli_fetch_row($resultpr)){
  if($f==0){

$f=1;
$c='#dadada;';
  }else{
$f=0;
$c='#ededeb;';
  }

  ?>
       <tr style="background-color: <? echo $c; ?>">
    <td><? echo $rowpr[1]; ?></td>
    <td><a href="tareas.php?p=1&edi=1&eliru=1&id=<? echo $_GET['id']; ?>&idc=<? echo $rowpr[0]; ?>" class="btn bg-red" style="margin-top: -4px;">Eliminar</a></td>
    </tr> 
        <?
  }
  ?></table>

</div>
</div>

<hr>
