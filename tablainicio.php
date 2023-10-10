<table style="font-size:12px;">
<tr>
    	<td align="center"><strong>No.</strong></td>
        <td align="center"><strong>Fecha Mudanza</strong></td>
        <td align="center"><strong>Origen</strong></td>
        <td align="center"><strong>Destino</strong></td>
        <td align="center"><strong>Proveedor</strong></td>
        <td align="center"></td>
        <td align="center"></td>
        <td align="center"></td>
        <td align="center"></td>
    </tr>
<?
	$link=mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
	mysql_select_db($bbdd,$link) or die("resultado=".urlencode(mysql_error()));
	$result=mysql_query("SELECT * from servicios where estatus=''", $link);
	while($row=mysql_fetch_row($result)){
	?>
    <tr style="height:40px;">
   		<td><? echo $row[20]; ?></td>
    	<td><? echo $row[15]; ?></td>
        <td><? echo $row[1]; ?></td>
        <td><? echo $row[2]; ?></td>
        <td><? echo $row[6]; ?></td>
        <td style="vertical-align:middle;"><a href="serviciopdf.php?c=<? echo $row[22]; ?>" target="_blank" class="boton2">Ver</a></td>
        <td align="center"><a  href="tareas.php?id=<? echo $row[0]; ?>&m=1" class="boton3" onClick="javascript: movi(<? echo $row[0]; ?>)" data-lightbox-target="#form-overlaymovimientos" data-lightbox-fit-viewport="false">Movimientos</a></td>
        <td align="center"><a href="tareas.php?c=<? echo $row[22]; ?>&edit=1&n=1" class="boton" >Editar</a></td>
        <td align="center"><a href="tareas.php?id=<? echo $row[0]; ?>&elim=1" class="boton2" >Eliminar</a></td>
       
    </tr>
    <?	
	}
?>
</table>