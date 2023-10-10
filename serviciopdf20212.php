<?php ob_start();
?>
<style type="text/css">
@font-face {
  font-family: myFirstFont;
  src: url(calibril.ttf);
}

body {
	font-family: myFirstFont;
	font-size: 7px;
	text-transform: uppercase;
}
p {
	font-size: 7px;
}
</style>

<page>
<?
 include('config.php');

	$query = "SELECT * from servicio where clave='".$_GET['c']."'";
$result = $link->query($query);
	$row=mysqli_fetch_row($result);
?>
<div style="width:740px; background-color:#002060; padding:10px;  font-size: 8px; ">
<div style="background-color:#fff;">
<br>
<table style="width:740px; ">
<tr><td >
<img src="imgpdfs/logo.jpg" style="width:380px;" />
</td><td style="padding-left:30px;">
<div style="width:300px; font-size:22px;  padding:5px; text-align:center; ">
<h1><strong>ORDEN DE SERVICIO<br>FOLIO: <?php echo $row[0]; ?></strong></h1>
</div>
<br>



</td></tr>
</table>

<br>
<div style="width:760px; background-color:#002060; color:#fff;  padding:3px; text-align:center; ">
&nbsp;
</div>
<br>
<table style="width:740px; ">
<tr><td >
<div style="width:290px; font-size:22px;  padding:5px; text-align:center; ">
<strong>GENERALES DEL<br> SERVICIO</strong>
</div>
</td><td style="padding-left:30px;">

<table style="width:300px; font-size:15px; border:#000000 solid 1px; " cellpadding="0" cellspacing="0">
<tr>
<td style="background-color:#ccc; padding:5px; border:#000000 solid 1px;"><strong>FECHA: </strong></td>
<td style="border:#000000 solid 1px; text-transform: uppercase;"><strong><?php echo date('d-m-Y'); ?></strong></td>
</tr>
<tr>
<td style="background-color:#ccc; padding:5px;"><strong>NOMBRE DEL CLIENTE: </strong></td>
<td style="border:#000000 solid 1px; text-transform: uppercase;"><strong><? echo $row[1]; ?></strong></td>
</tr>
</table>


</td>
</tr>
</table>
<br>

<table style="width:740px;  font-size:15px; border:#000000 solid 1px; " cellpadding="0" cellspacing="0">

<tr>
<td style="background-color:#ccc; padding:5px; border:#000000 solid 1px; width:138px;"><strong>ORIGEN: </strong></td>
<td style="border:#000000 solid 1px; text-transform: uppercase; width:340px;"><strong><? echo $row[2]; ?></strong></td>
<td style="background-color:#ccc; padding:5px; border:#000000 solid 1px; width:80px;"><strong>SEGURO: </strong></td>
<td style="background-color:#ccc; padding:5px; border:#000000 solid 1px; width:120px;"><strong>MONTO ASEGURADO: </strong></td>
</tr>
<tr>
<td style="background-color:#ccc; padding:5px;"><strong>DESTINO: </strong></td>
<td style="border:#000000 solid 1px; text-transform: uppercase;"><strong><? echo $row[3]; ?></strong></td>
<td style="border:#000000 solid 1px; text-transform: uppercase;"><strong><? if($row[19]>=1){ echo "SI"; }else{ echo "NO"; } ?></strong></td>
<td style="border:#000000 solid 1px; text-transform: uppercase;"><strong>$ <? echo number_format($row[19], 2); ?></strong></td>

</tr>
</table>


<table style="width:740px;  font-size:13px; border:#000000 solid 1px; " cellpadding="0" cellspacing="0">
<tr>
<td style="background-color:#ccc; padding:5px; vertical-align:middle; border:#000000 solid 1px; text-align:center; width:65px;"><strong>TIPO DE SERVICIO: </strong></td>
<td style="border:#000000 solid 1px; text-align:center; vertical-align:middle; text-transform: uppercase; width:90px;"><strong><? echo $row[4]; ?></strong></td>
<td style="border:#000000 solid 1px; text-align:center; vertical-align:middle; text-transform: uppercase; width:85px;"><strong><? echo $row[102]; ?></strong></td>
<td style="border:#000000 solid 1px; text-align:center; vertical-align:middle; text-transform: uppercase; width:95px;"><strong>RECOLECCIÓN</strong></td>
<td style="border:#000000 solid 1px; text-align:center; vertical-align:middle; text-transform: uppercase; width:85px;"><strong>FLETE</strong></td>
<td style="border:#000000 solid 1px; text-align:center; vertical-align:middle; text-transform: uppercase; width:85px;"><strong>ENTREGA</strong></td>
<td style="border:#000000 solid 1px; text-align:center; vertical-align:middle; text-transform: uppercase; width:85px;"><strong>MUDANZA COMPLETA</strong></td>
<td style="border:#000000 solid 1px; text-align:center; vertical-align:middle; text-transform: uppercase; width:85px;"><strong>MANIOBRAS</strong></td>
</tr>

</table>
<div style="width:760px; background-color:#002060; color:#fff;  padding:3px; text-align:center; ">
&nbsp;
</div>
<br>
<div style="width:750px; padding:3px; font-size:13px; ">
<b>INVENTARIO:</b>
</div>
<div style="width:743px; font-size:13px; padding: 5px; font-size: 9px;  ">
<?
$list=utf8_decode($row[7]);
//echo str_replace('<br />',',',$list); 
$arraylist = explode ('<br />',$list);
//var_dump($arraylist);
?>

<table style="width:740px;  font-size:13px;  "  border="0" cellspacing="0" >
<tr >
<td style="padding:2px; vertical-align:middle; width:233px;"><?php echo $arraylist[0]; ?></td>
<td style="padding:2px; vertical-align:middle; width:233px;"><?php echo $arraylist[8]; ?></td>
<td style="padding:2px; vertical-align:middle; width:233px;"><?php echo $arraylist[17]; ?></td>
</tr>
<tr >
<td style="padding:2px; vertical-align:middle; width:233px;"><?php echo $arraylist[1]; ?></td>
<td style="padding:2px; vertical-align:middle; width:233px;"><?php echo $arraylist[9]; ?></td>
<td style="padding:2px; vertical-align:middle; width:233px;"><?php echo $arraylist[18]; ?></td>
</tr>
<tr >
<td style="padding:2px; vertical-align:middle; width:233px;"><?php echo $arraylist[2]; ?></td>
<td style="padding:2px; vertical-align:middle; width:233px;"><?php echo $arraylist[10]; ?></td>
<td style="padding:2px; vertical-align:middle; width:233px;"><?php echo $arraylist[19]; ?></td>
</tr>
<tr >
<td style="padding:2px; vertical-align:middle; width:233px;"><?php echo $arraylist[3]; ?></td>
<td style="padding:2px; vertical-align:middle; width:233px;"><?php echo $arraylist[11]; ?></td>
<td style="padding:2px; vertical-align:middle; width:233px;"><?php echo $arraylist[20]; ?></td>
</tr>
<tr >
<td style="padding:2px; vertical-align:middle; width:233px;"><?php echo $arraylist[4]; ?></td>
<td style="padding:2px; vertical-align:middle; width:233px;"><?php echo $arraylist[12]; ?></td>
<td style="padding:2px; vertical-align:middle; width:233px;"><?php echo $arraylist[21]; ?></td>
</tr>
<tr >
<td style="padding:2px; vertical-align:middle; width:233px;"><?php echo $arraylist[4]; ?></td>
<td style="padding:2px; vertical-align:middle; width:233px;"><?php echo $arraylist[13]; ?></td>
<td style="padding:2px; vertical-align:middle; width:233px;"><?php echo $arraylist[22]; ?></td>
</tr>
<tr >
<td style="padding:2px; vertical-align:middle; width:233px;"><?php echo $arraylist[5]; ?></td>
<td style="padding:2px; vertical-align:middle; width:233px;"><?php echo $arraylist[14]; ?></td>
<td style="padding:2px; vertical-align:middle; width:233px;"><?php echo $arraylist[23]; ?></td>
</tr>
<tr >
<td style="padding:2px; vertical-align:middle; width:233px;"><?php echo $arraylist[6]; ?></td>
<td style="padding:2px; vertical-align:middle; width:233px;"><?php echo $arraylist[15]; ?></td>
<td style="padding:2px; vertical-align:middle; width:233px;"><?php echo $arraylist[24]; ?></td>
</tr>
<tr >
<td style="padding:2px; vertical-align:middle; width:233px;"><?php echo $arraylist[7]; ?></td>
<td style="padding:2px; vertical-align:middle; width:233px;"><?php echo $arraylist[16]; ?></td>
<td style="padding:2px; vertical-align:middle; width:233px;"><?php echo $arraylist[25]; ?></td>
</tr>


</table>


</div>
<div style="width:760px; background-color:#002060; color:#fff;  padding:3px; text-align:center; ">
&nbsp;
</div>
<br>
<div style="width:750px; padding:3px; font-size:13px; ">
<b>OBSERVACIONES:</b>
</div>
<div style="width:740px; padding:3px; font-size:13px; ">
<?php echo utf8_decode($row[98]); ?>&nbsp;
</div>
<br>
<div style="width:760px; background-color:#002060; color:#fff;  padding:3px; text-align:center; ">
&nbsp;
</div>
<br>
<div style="width:750px; padding:3px; font-size:13px; text-align:center; ">
<b>Aceptación informada, expresa y libre de los presentes Términos y Condiciones:</b><br><br>
Acepto que he leído y comprendido Términos y Condiciones de estos documentos, así que  al utilizar el presente servicio, dejo constancia que los acepto de manera libre y consciente; autorizando a la Unión Mudanzas a realizarlo. Habiendo de mi parte revisado satisfactoriamente la información, la cual considero adecuada y suficiente.
<br><br>
<b>https://launionmudanzas.com/#terminos</b>
</div>

<div style="width:760px; background-color:#002060; color:#fff;  padding:3px; text-align:center; ">
&nbsp;
</div>
<div style="width:743px; font-size:13px; padding: 5px; font-size: 9px;  ">
<table style="width:740px;  font-size:13px;  "  border="0" cellspacing="0" >
<tr >
<td style="padding:2px; vertical-align:middle; width:370px; text-align:center"><b>FIRMA RESPONSABLE</b><br><br><br><br></td>
<td style="padding:2px; vertical-align:middle; width:370px; text-align:center"><b>FIRMA DEL CLIENTE</b><br><br><br><br></td>
</tr>
</table>
</div>

<div style="width:760px; background-color:#002060; color:#fff;  padding:3px; text-align:center; ">
&nbsp;
</div>
<div style="width:743px; font-size:13px; padding: 5px; font-size: 9px;  ">
<table style="width:740px;  font-size:13px;  "  border="0" cellspacing="0" >
<tr >
<td style="padding:2px; vertical-align:middle; width:370px; text-align:left">www.launionmudanzas.com<br>
clientes@launionmudanzas.com<br>
Tel. 4151527734<br>
Whastapp : 4421270514<br>
#LaUnionMudanzas<br></td>
<td style="padding:2px; vertical-align:middle; width:370px; text-align:right">Andrea Brunel #52 Fracc San Javier<br>
FRACC SAN JAVIER<br>
SAN MIGUEL ALLENDE GTO<br>
CP 37759<br>
#AmoMiTrabajo<br></td>
</tr>
</table>
</div>




</div>
</div>
</page>

<?

$content=ob_get_clean();
    require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');

    $html2pdf = new HTML2PDF('P','Letter','fr');
	//$html2pdf->Image('tutorial/logo.png',10,12,30,0,'','http://www.fpdf.org');
	//$html2pdf->setDefaultFont('times');
    $html2pdf->WriteHTML($content);
    $html2pdf->Output('Cotizacion'.date('YmdHis').'.pdf');
?>