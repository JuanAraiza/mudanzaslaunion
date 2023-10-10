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

<strong>COTIZACION DE MUDANZA</strong></a><br>
<table>
<tr><td style=" padding:5px; text-decoration:none; color:#333; float:left;">FECHA:</td><td style="border:1px #333; padding:5px; text-decoration:none; color:#333; float:left;"><? echo date('d/m/Y'); ?>
</td></tr>
	<tr><td style=" padding:5px; text-decoration:none; color:#333; float:left;">CLIENTE:</td><td  style="border:1px #333; padding:5px; text-decoration:none; color:#333; float:left;"><? echo $row[1]; ?></td></tr>

<tr><td style=" padding:5px; text-decoration:none; color:#333; float:left;">FECHA SERVICIO:</td><td style="border:1px #333; padding:5px; text-decoration:none; color:#333; float:left;"><? echo substr($row[45],8,2).'/'.substr($row[45],5,2).'/'.substr($row[45],0,4); ?>
</td></tr>
<tr><td style=" padding:5px; text-decoration:none; color:#333; float:left;">HORA SERVICIO:</td><td style="border:1px #333; padding:5px; text-decoration:none; color:#333; float:left;"><? echo $row[46]; ?>
</td></tr>

</table>

</td><td>

	<table>
</table>

</td></tr>
</table>



<table style="width: 800px;" >
<tr>
	<? if($row[4]=='Exclusivo'){ ?>
<td align="center" bgcolor="#1844FF" style="color:#fff; padding:5px;">
<? echo $row[2]; ?> - <? echo $row[3]; ?>
</td>
<? } else{ ?>
<td align="center" bgcolor="#FF1B1F" style="color:#fff; padding:5px;">
<? echo $row[2]; ?> - <? echo $row[3]; ?>
</td>
<? } ?>
</tr>
<tr>
	<? if($row[4]=='Exclusivo'){ ?>
<td><br>
</td>
<? } else{ ?>
<td>
</td>
<? } ?>
</tr>
<tr>
<? if($row[4]=='Exclusivo'){ ?>
<td align="center" bgcolor="#1844FF" style="color:#fff; padding:5px;">
EXCLUSIVA
</td>
<? } else{ ?>
<td align="center" bgcolor="#FF1B1F" style="color:#fff; padding:5px;">
<? echo $row[4]; ?> 
</td>
<? } ?>
</tr>

<tr>
	<? if($row[4]=='Exclusivo'){ ?>
<td>
<? if($row[19]>=1 and $row[27]>=1){
	$d1=$row[19];
	$d2=$row[27];
	$d3=$d1*$d2;
	 ?>
   <!--  <table style="width: 800px;">
	<tr><td style="width: 70%; border: 1px #333 solid; padding:5px;">
SEGURO
</td><td style=" border: 1px #333 solid; padding:5px;">
<? echo '$'.money_format('%(#10n', $d3); ?>
</td></tr>
</table>-->
<? } ?>
<table style="width: 800px;"><tr><td style="width: 70%; padding:5px; border: 1px #333 solid;">
COSTO DEL SERVICIO
</td><td style=" border: 1px #333 solid; padding:5px;">
<? echo '$'.money_format('%(#10n', $row[5]+$d3); ?>
</td></tr></table>

</td>
<? } else{ ?>
<td>
<? if($row[19]>=1 and $row[27]>=1){
	$d1=$row[19];
	$d2=$row[27];
	$d3=$d1*($d2/100);
	 ?>
     <!--<table style="width: 800px;">
	<tr><td style="width: 70%; border: 1px #333 solid; padding:5px;">
SEGURO
</td><td style=" border: 1px #333 solid; padding:5px;">
<? echo '$'.money_format('%(#10n', $d3); ?>
</td></tr>
</table>-->
<? } ?>
<table style="width: 800px;">

<tr><td style="width: 70%; border: 1px #333 solid; padding:5px;">
COSTO DEL SERVICIO
</td><td style=" border: 1px #333 solid; padding:5px;">
<? echo '$'.money_format('%(#10n', $row[6]+$d3); ?>
</td></tr></table>


</td>
<? } ?>
</tr>


<tr>
	<? if($row[4]=='Exclusivo'){ ?>
<td style=" padding:5px;">Este servicio es el día y la hora que deseen.<br>
	Tiempo de entrega es tiempo en ruta.<br>
	Servicio puerta a puerta
</td>
<? } else{ ?>
<td style=" padding:5px;">
	Este servicio esta sujero a disponibilidad de ruta.<br>
	Tiempo de entrega es de <? echo $row[22]; ?> días habilies<br>
	Servicio puerta a puerta
</td>
<? } ?>
</tr>
<tr>
	<? if($row[4]=='Exclusivo'){ ?>
<td align="center" bgcolor="#1844FF" style="color:#fff; padding:5px;">
SERVICIO BASICO CUALQUIER DIA DE LA SEMANA
</td>
<? } else{ ?>
<td align="center" bgcolor="#FF1B1F" style="color:#fff; padding:5px;">
	SERVICIO BASICO CUALQUIER DIA DE LA SEMANA
</td>
<? } ?>
</tr>
</table>



<br>

<div style=" padding: 3px 3px 3px 3px; text-align: center; ">
<a style="text-decoration: underline; color:#333;">**El Costo es aproximado y basado en la información previa, por parte del cliente**</a><br>
<a style="text-decoration: underline; color:#333;">Puede variar sin previo aviso, hasta no corroborar la información.</a><br>
Esta es una cotización informativa, en caso de requerir la formal, favor de solicitarlo.<br>
<a style="text-decoration: underline; color:#fc2626;">*NO LLEVAMOS MASCOTAS NI PERSONAS , EL SEGURO NO LOS CUBRE*</a>
</div>
<br><br>
<table style="width: 800px;">
<tr>
<td align="center" bgcolor="#1844FF" style="color:#fff; padding:5px; width:40%;">
INCLUYE
</td>
<td align="center" bgcolor="#1844FF" style="color:#fff; padding:5px; width:40%;">
NO INCLUYE
</td>
</tr>
<tr>

<td align="left" style=" padding:5px; width:40%; font-size:11px;">
Este servicio es el día y la hora que deseen.<br>
Maniobra carga y descarga planta baja:<br>
(sala,comedor,cocina, patio)<br>
Primer piso: (recamaras)<br>
*Emplaye de colchones y muebles necesarios (1 Rollo de playo)<br>	
*Acomodo de cajas en las habitaciones de casa destino (no desempaque)<br>	
Tiempo de entrega es tiempo en ruta.<br>
1 o mas clientes misma unidad 
</td>

<td align="left" style=" padding:5px; width:40%; font-size:11px;">
*Empaque de cosas a granel<br>
*Desempaque en casa desino<br>
*Des o instalación de  electrónicos, lámparas,muebles, estufas y/o lavadoras, etc<br>	
*Carga y/o descarga en pisos extras piso adicional por escalera o elevador	<br>
*Acarreos, volados, maniobras especiales, pisos extras <br>
*En caso fortuito multas de tránsito,<br>
* Permisos o algún otro cargo adicional ajeno al transportista<br>
<span style=" background-color:#FFFD86; padding:2px;">"SI EL CLIENTE NO ASEGURA SU MERCANCIA, ESTA CORRE POR CUENTA Y RIESGO DE EL", Mas info del seguro… solicítela!</span>
</td>

</tr>

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



<p style="color:#ed1818; font-size:11px;">
ACEPTAMOS<br>
Efectivo // Deposito OXXO<br>
TC o Debito<br>
Transferencia<br>
<br><br>
</p>


</div>
<div style="width:100%; ">
<table style="width:100%; ">
<td style="width:50%;">
<p style="  color:#FFFFFF; font-size: 11px; letter-spacing: 4px;"><br>


Esperemos se de su agrado nuestra cotización. quedamos pendientes de sus amables comentarios<br>
La Unión Dvisión Mudanzas<br>
Lic. Azucena Peña<br>
Whatsapp: 4421270514<br>
Visita-Go to: www.launionsanmiguel.com <br>
www.mudanzasforaneaslaunion.com<br>
Salida a Celaya # 83-B<br>
Ph./Tel 4151859200<br>
San Miguel Allende, Gto. 37700
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
