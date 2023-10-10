<div class="row">
        <div class="col-xs-12">
          <div class="box">
        
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
    <tr style="background-color: #ccc">
    <td align="center"><strong>Tarjeta</strong></td>
    <td align="center"><strong>Nombre</strong></td>
    <td align="center"><strong>Telefono</strong></td>
    <td align="center"><strong>Correo</strong></td>
    <td align="center"><strong>No. Cuenta</strong></td>
    <td align="center"><strong>Banco</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
	<?
	

	$query = "SELECT * from proveedores";
    $f=0;
    $resultpr = $link->query($query);
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
    <td><img src="archivos/<? echo $rowpr[10]; ?>" style="width: 250px;" /></td>
    <td><? echo $rowpr[1]; ?></td>
    <td><? echo $rowpr[4]; ?></td>
    <td><? echo $rowpr[5]; ?></td>
    <td><? echo $rowpr[8]; ?></td>
    <td><? echo $rowpr[9]; ?></td>
    <td><a href="tareas.php?p=1&edi=1&id=<? echo $rowpr[0]; ?>" class="btn btn-primary">Editar</a></td>
    <td><a href="tareas.php?p=1&eli=1&id=<? echo $rowpr[0]; ?>" class="btn bg-red">Eliminar</a></td>
    </tr> 
        <?
	}
	?></table>

    </div></div>
</div></div>