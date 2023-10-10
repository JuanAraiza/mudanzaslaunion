<?php ob_start();
date_default_timezone_set('America/Mexico_City');
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
	text-transform: uppercase;
}
</style>

<page>
<?
 include('config.php');

	$query = "SELECT * from servicio where clave='".$_GET['c']."'";
	$result = $link->query($query);
	$row=mysqli_fetch_row($result);
?>
<div style="width:740px; background-color:#002060; padding:10px;  font-size: 6px; ">
<div style="background-color:#fff;">
<br>
<table style="width:740px; ">
<tr><td >
	<?php if($_GET['emp']=='cruz'){ ?>
		<img src="images/logolacruz.png" style="width:380px;" />
<?php }else{ ?>
	<img src="imgpdfs/logo.jpg" style="width:380px;" />
<?php } ?>

</td><td style="padding-left:30px; ">
<div style="width:300px; font-size:18px;  padding:5px; text-align:center; ">
<h1><strong>ORDEN DE SERVICIO<br>FOLIO: <?php echo $row[0]; ?></strong></h1>
</div>
</td></tr>
</table>
<div style="width:760px; background-color:#002060; color:#fff;  padding:2px; text-align:center; ">
&nbsp;
</div>

<table style="width:740px;  border:#000000 solid 1px; " cellpadding="0" cellspacing="0">
<tr>
<td style="background-color:#ccc; padding:3px; border:#000000 solid 1px; width:138px;"><strong>NOMBRE DEL CLIENTE: </strong></td>
<td style="border:#000000 solid 1px; padding:3px; text-transform: uppercase; width:320px;"><strong><? echo $row[1]; ?></strong></td>
<td style="background-color:#ccc; padding:3px; border:#000000 solid 1px; width:138px;"><strong>FECHA: <?php echo date('d-m-Y'); ?></strong></td>
</tr>
<tr>
<td style="background-color:#ccc; padding:3px; border:#000000 solid 1px; width:138px;"><strong>ORIGEN: </strong></td>
<td style="border:#000000 solid 1px; padding:3px; text-transform: uppercase; width:320px;"><strong><? echo $row[2]; ?></strong></td>
</tr>
<tr>
<td style="background-color:#ccc; padding:3px;"><strong>DESTINO: </strong></td>
<td style="border:#000000 solid 1px; padding:3px; text-transform: uppercase;"><strong><? echo $row[3]; ?></strong></td>

</tr>

</table>
<br>&nbsp;
<div style="width:760px; background-color:#ccc;  padding:2px; text-align:center; ">
Caracteristicas del Vehículo</div>

<table style="width:740px;  border:#000000 solid 1px; " cellpadding="0" cellspacing="0">
<tr>
<td style="background-color:#ccc; padding:3px; border:#000000 solid 1px; width:80px;"><strong>MARCA: </strong></td>
<td style="border:#000000 solid 1px; padding:3px; text-transform: uppercase; width:120px;"><strong><? echo $row[57]; ?></strong></td>
<td style="background-color:#ccc; padding:3px; border:#000000 solid 1px; width:80px;"><strong>MODELO: </strong></td>
<td style="border:#000000 solid 1px; padding:3px; text-transform: uppercase; width120px;"><strong><? echo $row[59]; ?></strong></td>
<td style="background-color:#ccc; padding:3px; border:#000000 solid 1px; width:160px;"><strong>TARJETA DE CIRCULACION: </strong></td>
<td style="border:#000000 solid 1px; padding:3px; text-transform: uppercase; width:100px;"><strong><? //echo $row[1]; ?></strong></td>
</tr>
<tr>
<td style="background-color:#ccc; padding:3px; border:#000000 solid 1px; width:80px;"><strong>PLACAS: </strong></td>
<td style="border:#000000 solid 1px; padding:3px; text-transform: uppercase; width120px;"><strong><? echo $row[59]; ?></strong></td>
<td style="background-color:#ccc; padding:3px; border:#000000 solid 1px; width:80px;"><strong>COLOR: </strong></td>
<td style="border:#000000 solid 1px; padding:3px; text-transform: uppercase; width: 120px;"><strong><? echo $row[60]; ?></strong></td>
<td style="background-color:#ccc; padding:3px; border:#000000 solid 1px; width:160px;"><strong>PÓLIZA DE SEGURO: </strong></td>
<td style="border:#000000 solid 1px; padding:3px; text-transform: uppercase; width:100px;"><strong><? //echo $row[2]; ?></strong></td>
</tr>


</table>


<table style="width:740px; border:#000000 solid 1px; " cellpadding="0" cellspacing="0">
<tr>
<td style="background-color:#ccc; padding:3px; border:#000000 solid 1px; width:120px;"><strong>FECHA DE SALIDA: </strong></td>
<td style="border:#000000 solid 1px; padding:3px; text-transform: uppercase; width:120px;"><strong><? echo substr($row[22],8,2).'/'.substr($row[22],5,2).'/'.substr($row[22],0,4); ?></strong></td>
<td style="background-color:#ccc; padding:3px; border:#000000 solid 1px; width:220px;"><strong>FECHA APROXIMADA DE ENTREGA: </strong></td>
<td style=" border:#000000 solid 1px; padding:3px; text-transform: uppercase; width:120px;"><strong><? echo substr($row[122],8,2).'/'.substr($row[122],5,2).'/'.substr($row[122],0,4); ?></strong></td>
</tr>

</table>


<br>&nbsp;
<div style="width:760px; background-color:#ccc;  padding:2px; text-align:center; ">
Accesorios y Herramientas</div>




<table style="width:740px;  border:#000000 solid 1px; " border="1" cellpadding="0" cellspacing="0">
<tr>
<td style="background-color:#ccc; padding:3px; width:165px; "><strong>DESCRIPCIÓN</strong></td>
<td style="background-color:#ccc; padding:3px; width:20px; "><strong>SI</strong></td>
<td style="background-color:#ccc; padding:3px; width:20px; "><strong>NO</strong></td>
<td style="background-color:#ccc; padding:3px; width:165px;"><strong>DESCRIPCIÓN </strong></td>
<td style="background-color:#ccc; padding:3px; width:20px; "><strong>SI</strong></td>
<td style="background-color:#ccc; padding:3px; width:20px; "><strong>NO</strong></td>
<td style="background-color:#ccc; padding:3px; width:165px; "><strong>DESCRIPCIÓN </strong></td>
<td style="background-color:#ccc; padding:3px; width:20px; "><strong>SI</strong></td>
<td style="background-color:#ccc; padding:3px; width:20px; "><strong>NO</strong></td>
</tr>

<tr>
<td style="padding:3px;  "><strong>Espejo lateral derecho</strong></td>
<td style="padding:3px;  "><strong> </strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px; "><strong>Parabrisas </strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px;  "><strong> </strong></td>
<td style="padding:3px;  "><strong>Bayoneta aceite </strong></td>
<td style="padding:3px;"><strong> </strong></td>
<td style="padding:3px;  "><strong> </strong></td>
</tr>
<tr>
<td style="padding:3px; "><strong>Espejo lateral izquierdo</strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px;"><strong>Medallón trasero </strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px;"><strong>Llave de cruz</strong></td>
<td style="padding:3px;"><strong> </strong></td>
<td style="padding:3px;"><strong> </strong></td>
</tr>
<tr>
<td style="padding:3px; "><strong>Espejo retrovisor</strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px; "><strong>Cristales de puertas (laterales)</strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px; "><strong>Gato</strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px; "><strong> </strong></td>
</tr>
<tr>
<td style="padding:3px; "><strong>Tapetes</strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px;"><strong> </strong></td>
<td style="padding:3px; "><strong>Encendedor</strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px;"><strong>Reflejantes de emergencia</strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px; "><strong> </strong></td>
</tr>
<tr>
<td style="padding:3px;"><strong>Limpiadores</strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px; "><strong>Faros y Luces</strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px; "><strong>(señalamientos)</strong></td>
<td style="padding:3px;"><strong> </strong></td>
<td style="padding:3px;"><strong> </strong></td>
</tr>
<tr>
<td style="padding:3px; "><strong>Antena</strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px; "><strong>Molduras</strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px;"><strong>Extinguidor</strong></td>
<td style="padding:3px;"><strong> </strong></td>
<td style="padding:3px;"><strong> </strong></td>
</tr>
<tr>
<td style="padding:3px; "><strong>Radio</strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px;"><strong> </strong></td>
<td style="padding:3px; "><strong>Calaveras</strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px; "><strong>Cable pasa corriente</strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px; "><strong> </strong></td>
</tr>
<tr>
<td style="padding:3px; "><strong>Radio/CD</strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px; "><strong>Defensas</strong></td>
<td style="padding:3px;"><strong> </strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px; "><strong>Caja de Herramientas</strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px; "><strong> </strong></td>
</tr>
<tr>
<td style="padding:3px; "><strong>Manijas</strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px;"><strong> </strong></td>
<td style="padding:3px; "><strong>Parrilla</strong></td>
<td style="padding:3px;"><strong> </strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px; "><strong>Porta llantas</strong></td>
<td style="padding:3px;"><strong> </strong></td>
<td style="padding:3px;"><strong> </strong></td>
</tr>
<tr>
<td style="padding:3px; "><strong>Tapón gasolina</strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px;"><strong>llanta de refacción</strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px; "><strong>Placa delantera</strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px; "><strong> </strong></td>
</tr>
<tr>
<td style="padding:3px; "><strong>Tapón de radiador</strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px;"><strong>Tapones de ruedas</strong></td>
<td style="padding:3px;"><strong> </strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px; "><strong>Placa Trasera</strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px;"><strong> </strong></td>
</tr>
<tr>
<td style="padding:3px;"><strong>Tapón de aceite</strong></td>
<td style="padding:3px;"><strong> </strong></td>
<td style="padding:3px;"><strong> </strong></td>
<td style="padding:3px;"><strong>OTROS</strong></td>
<td style="padding:3px;"><strong> </strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px; "><strong></strong></td>
<td style="padding:3px; "><strong> </strong></td>
<td style="padding:3px;"><strong> </strong></td>
</tr>

</table>


<div style="width:760px; padding:2px; text-align:center; ">
&nbsp;
</div>



<div style="width:760px; padding:2px; text-align:center; ">
<img src="images/mediovehiculo.jpg" style="width:730px;" />
</div>
<br>
<div style="width:750px; padding:2px; font-size:11px; text-align:center; text-transform: uppercase; ">

CONFIRMO QUE HE LEIDO TODA LA INFORMACION , ESTOY DE ACUERDO Y AUTORIZO A LA UNION MUDANZAS A REALIZAR
EL TRASLADO DE MIS PERTENENCIAS
</div>

<div style="width:760px;  color:#fff;  padding:2px; text-align:center; ">
&nbsp;
</div>
<div style="width:743px; font-size:11px; padding: 3px; text-align:center;  ">
<table style="width:740px;  font-size:12px;  "  border="0" cellspacing="0" >
<tr >
<td style="padding:2px; vertical-align:middle; width:370px; text-align:center"><b>FIRMA RESPONSABLE</b><br><br><br><br></td>
<td style="padding:2px; vertical-align:middle; width:370px; text-align:center"><b>FIRMA DEL CLIENTE</b><br><br><br><br></td>
</tr>
</table>
LA UNION MUDANZAS SOLO PRESTA EL SERVICIO DE TRANSPORTE DEL VEHICULO ARRIBA MENCIONADO, EN CASO QUE HAYA FALLAS POR CAUSAS MECANICAS O ELECTRICAS
NOSOTROS NO NOS HACEMOS RESPONSABLES
<br><br>
<strong style="font-size: 15px;">AHORA USTED, ESTA INFORMADO</strong>
<br><br>
SI LE HA GUSTADO NUESTRO SERVCIO LE PEDIMOS NOS REGALE UN COMENTARIO EN https://www.mudanza.mx/mudanceros/la-union/opiniones, O NOS ENVIE UN VIDEO
CORTO DE AGRADECIMIENTO, Y RECIBA UN DESCUENTO PARA USTED O ALGUIEN QUE NOS RECOMIENDE EN SU PROXIMO FLETE O MUDANZA.
ESTA ORDEN DE SERVICIO CORRESPONDE AL NUM DE CONTRATO XXXXX
SIENDO UN DOCUMENTO VINCULADO, DE VALIDEZ OFICIAL Y CONFIDENCIAL
</div>




<div style="width:760px; background-color:#002060; color:#fff;  padding:2px; text-align:center; ">
&nbsp;
</div>
<div style="width:743px; font-size:12px; padding: 3px;  ">
<table style="width:740px;  font-size:12px;  "  border="0" cellspacing="0" >
<tr >
<td style="padding:2px; vertical-align:middle; width:370px; text-align:left"><?php if($_GET['emp']=='cruz'){ ?>
	Tel. 554 606 3476<br>
<?php }else{ ?>
	www.launionmudanzas.com<br>
clientes@launionmudanzas.com<br>
Tel. 4151527734<br>
Whatsapp : 4421270514<br>
#LaUnionMudanzas<br>
<?php } ?>
</td>
<td style="padding:2px; vertical-align:middle; width:370px; text-align:right">
<?php if($_GET['emp']=='cruz'){ ?>
	Cda de la Caldera Mz 2 Lt 9,<br>
	Col. Emiliano Zapata, CP 56490,<br>
	La Paz, Mexico<br>
<?php }else{ ?>
	Libramiento a Queretaro No. 24 B, Col. La Lejona<br>
SAN MIGUEL ALLENDE GTO<br>
CP 37765<br>
#AmoMiTrabajo<br>
<?php } ?>
</td>
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
    $html2pdf->Output('Servicio'.date('YmdHis').'.pdf');
?>