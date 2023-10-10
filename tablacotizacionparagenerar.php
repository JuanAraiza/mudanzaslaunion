<div class="row">
<div class="col-md-12">
<div class="box-body table-responsive no-padding" style="width:100%;">
<table class="table table-hover">
    <tr>
    <td align="center"><strong>Cliente</strong></td>
    <td align="center"><strong>Origen</strong></td>
    <td align="center"><strong>Destino</strong></td>
    <td align="center"><strong>Fecha</strong></td>
    <td align="center"><strong>Tipo</strong></td>
    <td></td>
    <td></td>
     <td></td>
    </tr>
    <?
  include("config.php");

		$query = "SELECT * from cotizacion2 where estatus=1";
		$r=1;
    $result = $link->query($query);
	while($row=mysqli_fetch_row($result)){
		if($r==1){
			$r=2;
			$c='#c8c8c6';
		}else{
			$r=1;
			$c='#dbdbdb';
		}
		?>
         <tr style="background:<? echo $c; ?>; height: 48px; vertical-align:middle; border:#5A5959 solid 1px; ">
    <td style="vertical-align:middle;"><? echo $row[1]; ?></td>
    <td style="vertical-align:middle;"><? echo $row[2]; ?></td>
    <td style="vertical-align:middle;"><? echo $row[3]; ?></td>
    <td style="vertical-align:middle;"><? echo substr($row[8],8,2).'-'.substr($row[8],5,2).'-'.substr($row[8],0,4); ?></td>
    <td style="vertical-align:middle;"><? echo $row[4]; ?></td>
    
    
    
    <td style="vertical-align:middle;"><a class="btn bg-yellow" href="tareas.php?bu=11&c=<? echo $row[9]; ?>">Verificar</a></td>
    <td style="vertical-align:middle;"><a class="btn bg-red" href="tareas.php?c=<? echo $row[9]; ?>&elic=1" >Eliminar</a></td>
   
    </tr> <?
		}
  ?>
    
    </table>
  </div>
</div>
</div>