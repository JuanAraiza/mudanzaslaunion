<?php ob_start();
?>
<style type="text/css">
body {
	font-size: 15px;
}
p {
	font-size: 15px;
}
</style>

<page>
<?

 include('config.php');
$link=mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
	mysql_select_db($bbdd,$link) or die("resultado=".urlencode(mysql_error()));
	$result=mysql_query("SELECT * from cotizacion2 where clave='".$_GET['c']."'", $link);
	$row=mysql_fetch_row($result);
	
?>
<div style="width:740px; background-color:#44546a; padding:10px;">
<div style="background-color:#fff;">
<br>
<img src="images/logowhats.jpg"><br>
<table style="width: 740px;"><tr><td>
<a style=" text-decoration:none; color:#333; font-size:16px;"> 

<strong>COTIZACION DE MUDANZA DE AUTOMOVIL</strong></a><br>


</td><td>

	

</td></tr>
</table>



<table style="width: 740px;" >


<tr>
<td>
	
    <table style="width: 740px;">
    <tr>
    <td style=" padding:5px; width:30%;">Cliente:</td>
    <td style=" padding:5px; width:30%;"><? echo $row[1]; ?></td>
    <td style=" padding:5px; width:30%;">Fecha: <? echo date('d/m/Y'); ?></td>
    </tr>
    <tr>
    <td style=" padding:5px;">Tipo de Auto</td>
    <td style=" padding:5px;"><? echo $row[30]; ?></td>
    <td align="center" bgcolor="#FF1B1F" style="color:#fff; padding:5px;"><? echo $row[2]; ?> - <? echo $row[3]; ?></td>
    </tr>
    <tr>
    <td style="padding:5px;">Marca y Modelo</td>
    <td style=" padding:5px;"><? echo $row[29].' - '. $row[29]; ?></td>
    <td style="padding:5px;">&nbsp;</td>
    </tr>
    </table>
    
    
</td>
</tr>

<tr>
<td>
	<table style="width: 740px;">
    <tr>
    <td style="width:30%;">
    <table>
    <tr>
    <td style="border: 1px #333 solid; padding:5px;">**Factura</td>
    </tr>
    <tr>
    <td style="border: 1px #333 solid; padding:5px;">**Pedimento (si es auto importado)</td>
    </tr>
    <tr>
    <td style="border: 1px #333 solid; padding:5px;">**Copia identificación</td>
    </tr>
    <tr>
    <td style="border: 1px #333 solid; padding:5px;">**Tarjeta de  Circulación</td>
    </tr>
    </table>
    
    </td>
    <td style="width:30%;">&nbsp;</td>
    <td style="width:30%;"><img src="images/cotive1.jpg"/></td>
    </tr>
    </table>
    
</td>
</tr>
<tr>
<td style="border: 1px #333 solid; padding:5px; width:95%;">
	**Una carta de su puño y letra  donde especifique que nosotros solo le prestamos el servicio de traslado.
</td>
</tr>
<tr>
<td style="border: 1px #333 solid; padding:5px; width:95%;">
	**Registro público vehicular REPUVE, que no cuente con reporte de robo (Policía Federal, Transito del Estado  o la procuraduría)  
</td>
</tr>
<tr>
<td style="color:#ff0000; background-color:#fffc06; padding:5px; width:95%;">
	ES IMPRESINDIBLE QUE EL AUTO VAYA ASEGURADO, SINO ES POR MEDIO DE UN SEGURO EXTERNO como el que podemos ofrecer, POR FAVOR VERIFICAR CON  SU ASGURADORA SI LA POLIZA CONTRATADA CUBRE ESTE TIPO DE TRASLADOS.
</td>
</tr>
<tr>
	
<td>
<? if($row[19]>=1 and $row[27]>=1){
	$d1=$row[19];
	$d2=$row[27];
	$d3=$d1*($d2/100);
	 ?>
    
<? echo '$'.money_format('%(#10n', $d3); ?>

<? } ?>

<table style="width: 800px;">

<tr><td style="width: 30%; border: 1px #333 solid; padding:5px; background-color:#FF0000; color:#fff;">
MUDANZA COMPARTIDA
</td><td style="width: 10%;  padding:5px;">
&nbsp;&nbsp;&nbsp;
</td><td style="width: 30%; border: 1px #333 solid; padding:5px;">
COSTO DEL SERVICIO
</td><td style=" border: 1px #333 solid; padding:5px;">
<? echo '$'.money_format('%(#10n', $row[6]+$d3); ?>
</td></tr>

</table>


</td>

</tr>


<tr>
<td style=" padding:5px;">
	EXTRAS CONSIDERADOS EN PRECIO:
</td>

</tr>
<tr>
	
<td bgcolor="#FF1B1F" style="color:#fff; padding:5px;">
	*Gruas
</td>

</tr>
</table>



<br>

<div style=" padding: 3px 3px 3px 3px; text-align: center; ">
<a style="text-decoration: underline; color:#333;">**El Costo es aproximado y basado en la información previa, por parte del cliente**</a><br>
<a style="text-decoration: underline; color:#333;">Puede variar sin previo aviso, hasta no corroborar la información.</a><br>
Esta es una cotización informativa, en caso de requerir la formal, favor de solicitarlo.
</div>
<br><br>
<table style="width: 800px;">
<tr>
<td align="center" bgcolor="#1844FF" style="color:#fff; padding-top:5px; padding-bottom:5px; width:40%;">
<img src="images/coti1.png" style="width:100%;">
</td>
<td align="center" bgcolor="#FF1B1F" style="color:#fff; padding-top:5px; padding-bottom:5px; width:40%;">
<img src="images/coti2.png" style="width:100%;">
</td>
</tr>
<tr>

<td align="left" style=" padding:5px; width:40%;  text-align:left; font-size:11px;">
<p style="font-size:11px;">

Nuestras unidades, son especiales para mudanzas<br>
Cuentan con:<br>
-Cobijas<br>
-Colchones<br>
-Plástico strech (playo)<br>
-Cuerdas para amarre<br>
-Persional de maniobras<br>
<br>
<i>Si somos aceptados, le pedimos por favor me avise con antelación par apoder programar su mudanza</i><br>
<br>
</p>
</td>

<td align="left" style=" padding:5px; width:40%; font-size:11px;">
<img src="images/coti3.png" style="width:70%;">
</td>

</tr>
</table>
<br><br>




</div>
<div style="width:100%; ">
<table style="width:100%; ">
<td style="width:50%;">
<p style="  color:#FFFFFF; font-size: 11px; letter-spacing: 4px;"><br>
La Unión Dvisión Mudanzas<br>
Lic. Azucena Peña<br>
Whatsapp: 4421270514<br>
San Miguel Allende, Gto. 37700
</p>
</td>
<td style="width:50%;">
<p style="  color:#FFFFFF; font-size: 11px; letter-spacing: 4px;"><br>


Visita-Go to: www.launionsanmiguel.com <br>
www.mudanzasforaneaslaunion.com<br>
Salida a Celaya # 83-B<br>
Ph./Tel 4151859200<br>
</p>
</td>
</table>
</div>

</div>
</page>

<?

$content=ob_get_clean();
    require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');

    $html2pdf = new HTML2PDF('P','Legal','fr');
	//$html2pdf->Image('tutorial/logo.png',10,12,30,0,'','http://www.fpdf.org');
	$html2pdf->setDefaultFont('Arial');
    $html2pdf->WriteHTML($content);
    $html2pdf->Output('Cotizacion'.date('YmdHis').'.pdf');
    
?>
