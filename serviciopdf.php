<?php ob_start();
?>
<style type="text/css">
body {
	font-size: 9px;
}
p {
	font-size: 9px;
}
</style>

<page>
<?
 include('config.php');
$link=mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
	mysql_select_db($bbdd,$link) or die("resultado=".urlencode(mysql_error()));
	$result=mysql_query("SELECT * from servicios where clave='".$_GET['c']."'", $link);
	$row=mysql_fetch_row($result);

	$resultp=mysql_query("SELECT * from proveedores where id=".$row[6], $link);
	$rowp=mysql_fetch_row($resultp);

?>
<div style="width:740px; background-color:#44546a; padding:10px;  font-size: 9px;">
<div style="background-color:#fff;">
	<img src="images/top2.jpg" style="width:766px;" />
<br>
<table><tr><td>
<a style="text-decoration: underline; font-size:11px; color:#333">ORDEN DEL SERVICIO DE FLETE</a><br>
PROVEEDOR: <? echo $rowp[1].' '.$rowp[2].' '.$rowp[3]; ?><br>
EMPRESA: <? echo $rowp[7]; ?><br>
FECHA DEL SERVICIO: <? echo  substr($row[15],8,2).'-'.substr($row[15],5,2).'-'.substr($row[15],0,4); ?><br>
</td><td style="padding-left:220px;">SAN MIGUEL DE ALLENDE, GTO.<br><? echo date('d/m/Y'); ?><br>
	FOLIO: <? echo $row[20]; ?>
</td></tr>
</table>

<br>
<table style="border:#000000 solid 1px; width:740px;" border="1" cellspacing="0">
<tr style="background-color:#44546a; color:#fff;">
<td style="padding:5px; vertical-align:middle;">ORIGEN</td>
<td style="padding:5px; vertical-align:middle;">DESTINO</td>
<td style="padding:5px; vertical-align:middle;">TIPO DE MUDANZA</td>
<td style="padding:5px; vertical-align:middle;">SERVICIO</td>
<td style="padding:5px; vertical-align:middle;">INCLUYE</td>
<td style="padding:5px; vertical-align:middle;">NO INCLUYE</td>
<td style="padding:5px; vertical-align:middle;">TIEMPO ENTREGA</td>
</tr>
<tr>
<td style="padding:5px;"><? echo $row[1]; ?></td>
<td style="padding:5px;"><? echo $row[2]; ?></td>
<td style="padding:5px;"><? echo $row[3]; ?></td>
<td style="padding:5px;"><? echo $row[4]; ?></td>
<td style="padding:5px;"><? echo $row[23]; ?></td>
<td style="padding:5px;"><? echo $row[24]; ?></td>
<td style="padding:5px;"><? echo $row[5]; ?></td>
</tr>
</table>
<div style=" padding: 3px 3px 3px 30px; font-size: 7px;">
EN SERVICIO EXCLUSIVO LA ENTREGA DEPENDE DE LA DISTANCIA DE UNA CIUDAD A OTRA Y ESTA SUJETO A CUESTIONES DE TRAFICO Y SEGURIDAD DE LA RUTA.<br><br>
EN SERVICIO COMPARTIDO LA CARGA Y DESCARGA ESTA SUJETA A DISPONIBILIDAD DE RUTA. LOS DIAS QUE SE MENCIONAN SON APROXIMADOS Y HABILES.
</div>
<div style="background-color:#FF0004; padding: 3px 30px 3px 30px; width:100%; color:#fff;">LISTA DE MUEBLES PROPORCIONADA POR EL CLIENTE:</div>
<div style="padding: 3px 3px 3px 30px;"><? echo $row[12]; ?></div><br>
<div style="padding: 3px 3px 3px 30px; color:#FF0004; width:100%; text-align: center;">"NO TRASLADAMOS ANIMALES O PERSONAS AJENAS A LA EMPRESA DENTRO DE NUESTRAS UNIDADES"</div>

<div style="width:100%;">
<table style="width:800px;">
<td style="width:70%;"><table  style="width:100%;">
	<tr>
<td style="width:50%">
<div style="background-color:#FF0004; padding: 3px 3px 3px 3px; width:100%; color:#fff; font-size: 9px;">DIRECCION DE RECOLECCION:</div>
<? echo $row[7]; ?>
</td>
<td style="width:50%">
	<br>
<div style="background-color:#FF0004; padding: 3px 3px 3px 3px; width:80%; color:#fff;">RECIBE:</div>
<? echo $row[8]; ?>
</td>
</tr>
</table>
<br>
<table style="width:100%;">
	<tr>
<td style="width:50%">
<div style="background-color:#FF0004; padding: 3px 3px 3px 3px; width:100%; color:#fff; font-size: 9px;">DIRECCION DE ENTREGA</div>
<? echo $row[9]; ?>
</td>
<td style="width:50%">
	<br>
<div style="background-color:#FF0004; padding: 3px 3px 3px 3px; width:80%; color:#fff;">RECIBE:</div>
<? echo $row[10]; ?>
</td>
</tr>
</table>
<br>
<table>
<tr>
	<td><div style="background-color:#FF0004; padding: 3px 3px 3px 3px; width:100%; color:#fff; font-size: 9px;">HORARIO APROX DE CARGA:</div></td>
	<td><? echo $row[11]; ?></td>
</tr>
</table>
<br>
<div style="background-color:#FF0004; padding: 3px 3px 3px 3px; width:60%; color:#fff; font-size: 9px;">INDICACIONES PARA PROVEEDOR:</div>
<? echo nl2br($row[13]); ?>
</td><td style="width:30%;">

<img src="http://applaunion.com/mudanzas/images/envios.jpg" style="width:65%;"/>
</td></table>
</div><br>
<div style="background-color:#44546a; padding: 3px 30px 3px 30px; width:100%; color:#fff;  align-content: center; text-align: center;">ZONA DEL CLLIENTE</div>

<div style="width:100%;  ">
<table style="width:100%;">
<tr><td style="width:50%; padding-left: 20px;">
<div style="border: #333 1px solid; padding: 10px; width:90%; text-align:center; font-size: 8px;">CONFIRMO QUE LA MERCANCIA QUE ESTOY ENTREGANDO HA SIDO<br>
REVISADA PREVIAMENTE POR MI Y QUE ESTOY CONFORME DE LAS<br>
PIEZAS QUE SE HAN SUBIDO A LA UNIDAD</div>
<br><br>
<a style="text-decoration: underline; color: #333;">NOMBRE:<br>
FIRMA:<br>
FECHA:
</a>
</td>
<td  style="width:50%; padding-left: 20px;">
<div style="border: #333 1px solid; padding: 10px; width:90%;  text-align:center; font-size: 8px;">CONFIRMO QUE LA MERCANCIA QUE ESTOY RECIBIENDO HA<br>
SIDO REVISADA PREVIAMENTE POR MI, QUEDANDO DE<br>
CONFORMIDAD CON SU ESTADO Y CANTIDAD DE PIEZAS</div>
<br><br>
<a style="text-decoration: underline; color: #333;">NOMBRE:<br>
FIRMA:<br>
FECHA:
</a>

</td></tr></table>
</div>



<div style="padding: 3px 3px 3px 30px; text-align:center ">Agradeciendo de antemano su preferencia, quedamos pendientes por cualquier duda o comentario.<br><br><br><br>
A T E N T A M E N T E<br>
Lic. Azucena Peña Cueto<br>
La Union Division Mudanzas
</div>

</div>
<div style="width:100%; ">
<table style="width:100%; ">
<td style="width:50%;">
<div style="  color:#FFFFFF; float:left; font-size: 10px;"><br>
www.launionsanmiguel.com<br>
www.mudanzasforaneaslaunion.com<br>
La Union Packing & Shipping Services<br>
¡Empacamos y Enviamos a todo el Mundo!<br>
Whastapp : 4421270514<br>
</div>
</td>
<td style="width:50%;">
<div style=" color: #FFFFFF; float: left; text-align: right; font-size: 10px;"><br>
Zacateros 26-A, Centro<br>
Y ahora en nuestra nueva dirección<br>
Salida a Celaya # 83-B<br>
Ph./Tel 4151859200<br>
San Miguel Allende, Gto. 37700<br>
</div>
</td></table>
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