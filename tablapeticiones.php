<div class="row">
    <div class="col-md-6">
<table style="font-size:12px;">
    <tr>
    <td align="center"><strong>Nombre</strong></td>
    <td align="center"><strong>Correo</strong></td>
    <td align="center"><strong>Telefono</strong></td>
    <td align="center"><strong>Celular</strong></td>
    <td align="center"><strong>Origen</strong></td>
    <td align="center"><strong>Destino</strong></td>
    <td></td>
    <td></td>
   <!-- <td></td>
     <td></td>-->
    </tr>
    <?
  include("config.php");
  		$link=mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
		mysql_select_db($bbdd,$link) or die("resultado=".urlencode(mysql_error()));
		$result=mysql_query("SELECT * from viaweb where estatus='pendiente'", $link);
		$r=1;
	while($row=mysql_fetch_row($result)){
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
    <td style="vertical-align:middle;"><? echo $row[8]; ?></td>
    <td style="vertical-align:middle;"><? echo $row[3]; ?></td>
    <td style="vertical-align:middle;"><? echo $row[4]; ?></td>
    <td style="vertical-align:middle;"><? echo $row[5]; ?></td>
    <td style="vertical-align:middle;"><a class="btn bg-yellow" href="tareas.php?verservp=1&c=<? echo $row[0]; ?>">Ver</a></td>
    <td style="vertical-align:middle;"><a class="btn bg-red" href="tareas.php?verservp=1&eli=1&c=<? echo $row[0]; ?>">Eliminar</a></td>
    <!--<td style="vertical-align:middle;"><a class="btn bg-red" href="tareas.php?c=<? echo $row[9]; ?>&elic=1" >Eliminar</a></td>
    <td style="vertical-align:middle;"><a class="btn bg-green" href="tareas.php?c=<? echo $row[9]; ?>&newsevicio=1">Generar Servicio</a></td>-->
    </tr> <?
		}
  ?>
    
    </table>
</div>
</div>