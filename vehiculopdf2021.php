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
<img src="imgpdfs/logo.jpg" style="width:270px;" /><br>

</td><td style="width:200px; ">

<!--<img src="imgpdfs/pagos.jpg" style="width:300px;" />-->
</td><td style="padding-left:30px; text-transform: uppercase;">
<div style="width:200px; background-color:#002060; color:#fff;  padding:5px; text-align:center; text-transform: uppercase; ">
FECHA: <?php echo date('d-m-Y'); ?>
</div>
<br>
CLIENTE: <? echo $row[1]; ?><br>
ORIGEN: <? echo $row[2]; ?><br>
DESTINO: <? echo $row[3]; ?><br>


</td></tr>
</table>

<br>
<div style="width:760px; background-color:#CCC; color:#000;  padding:3px; text-align:center; ">
CARACTERÍSTICAS DEL VEHICULO A TRASLADAR
</div>

<table style="border:#000000 solid 1px; text-align:center; width:780px; font-size: 8px;" border="1" cellspacing="0" >
<tr style="background-color:#ddd; color:#000;">
<td style="padding:5px; vertical-align:middle; width:200px;">DESCRIPCIÓN</td>
<td style="padding:5px; vertical-align:middle; width:150px;">DESCRIPCIÓN</td>
<td style="padding:5px; vertical-align:middle; width:200px;">DESCRIPCIÓN</td>
<td style="padding:5px; vertical-align:middle; width:17px;">SI</td>
<td style="padding:5px; vertical-align:middle; width:17px;">NO</td>
</tr>
<tr>
<td style="padding:0px; text-transform: uppercase;">

<table style="text-align:center; width:200px; font-size: 8px;" border="1" cellspacing="0" >
<tr>
<td style="padding:5px; vertical-align:middle; width:50px;">Marca:</td>
<td style="padding:5px; text-transform: uppercase; width:130px;"><? echo $row[57]; ?></td>
</tr>
<tr>
<td style="padding:5px; vertical-align:middle; width:50px;">Placas:</td>
<td style="padding:5px; text-transform: uppercase; width:130px;"><? echo $row[59]; ?></td>
</tr>
</table>

</td>
<td style="padding:0px; text-transform: uppercase;">

<table style="text-align:center; width:150px; font-size: 8px;" border="1" cellspacing="0" >
<tr>
<td style="padding:5px; vertical-align:middle; width:50px;">Modelo:</td>
<td style="padding:5px; text-transform: uppercase; width:100px;"><? echo $row[58]; ?></td>
</tr>
<tr>
<td style="padding:5px; vertical-align:middle; width:50px;">Color:</td>
<td style="padding:5px; text-transform: uppercase; width:100px;"><? echo $row[60]; ?></td>
</tr>
</table>

</td>
<td style="padding:0px; text-transform: uppercase;">

<table style="text-align:center; width:200px; font-size: 8px;" border="1" cellspacing="0" >
<tr>
<td style="padding:5px; vertical-align:middle; width:100px;">Tarjeta de cirulacón:</td>
<td style="padding:5px; text-transform: uppercase; width:100px;"></td>
</tr>
<tr>
<td style="padding:5px; vertical-align:middle; width:100px;">Póliza de seguros:</td>
<td style="padding:5px; text-transform: uppercase; width:100px;"><? echo $row[119]; ?></td>
</tr>
</table>

</td>
<td style="padding:5px;"></td>
<td style="padding:5px;"></td>
</tr>

<tr>
<td style="padding:5px; vertical-align:middle;">Fecha de Salida:</td>
<td style="padding:5px; vertical-align:middle;"><?php echo substr($row[22],8,2).'-'.substr($row[22],5,2).'-'.substr($row[22],0,4); ?></td>
<td style="padding:5px; vertical-align:middle;">Fecha Aproximada de llegada:</td>
<td style="padding:5px; vertical-align:middle;"><?php echo substr($row[122],8,2).'-'.substr($row[122],5,2).'-'.substr($row[122],4); ?></td>
<td style="padding:5px; vertical-align:middle;"></td>
</tr>

</table>

<br>
<div style="width:760px; background-color:#CCC; color:#000;  padding:3px; text-align:center; ">
ACCESORIOS Y HERRAMIENTAS
</div>

<table style="text-align:center; width:740px; font-size: 8px;" cellspacing="0" >
<tr >
<td style="padding:5px; vertical-align:middle; width:350px;">


<table style="border:#000000 solid 1px;  width:350px; font-size: 8px;" border="1" cellspacing="0" >
<tr style="background-color:#ddd; color:#000;">
<td style="padding:2px; vertical-align:middle; width:100px;">DESCRIPCIÓN</td>
<td style="padding:2px; vertical-align:middle; width:20px;">SI</td>
<td style="padding:2px; vertical-align:middle; width:20px;">NO</td>
<td style="padding:2px; vertical-align:middle; width:100px;">DESCRIPCIÓN</td>
<td style="padding:2px; vertical-align:middle; width:20px;">SI</td>
<td style="padding:2px; vertical-align:middle; width:20px;">NO</td>

</tr>

<tr>
<td style="padding:2px;">Espejo lateral derecho</td>
<td style="padding:2px;"></td>
<td style="padding:2px;"></td>
<td style="padding:2px;">Parabrisas</td>
<td style="padding:2px;"></td>
<td style="padding:2px;"></td>

</tr>
<tr>
<td style="padding:2px;">Bayoneta aceite</td>
<td style="padding:2px;"></td>
<td style="padding:2px;"></td>
<td style="padding:2px;">Llave de cruz</td>
<td style="padding:2px;"></td>
<td style="padding:2px;"></td>
</tr>

<tr>
<td style="padding:2px;">Espejo lateral izquierdo</td>
<td style="padding:2px;"></td>
<td style="padding:2px;"></td>
<td style="padding:2px;">Medallón trasero</td>
<td style="padding:2px;"></td>
<td style="padding:2px;"></td>

</tr>

<tr>
<td style="padding:2px;">Espejo retrovisor</td>
<td style="padding:2px;"></td>
<td style="padding:2px;"></td>
<td style="padding:2px;">Cristales de puertas (laterales)</td>
<td style="padding:2px;"></td>
<td style="padding:2px;"></td>
</tr>

<tr>
<td style="padding:2px;">Gato</td>
<td style="padding:2px;"></td>
<td style="padding:2px;"></td>
<td style="padding:2px;">Reflejantes de emergencia</td>
<td style="padding:2px;"></td>
<td style="padding:2px;"></td>
</tr>

<tr>
<td style="padding:2px;">Tapetes</td>
<td style="padding:2px;"></td>
<td style="padding:2px;"></td>
<td style="padding:2px;">Encendedor</td>
<td style="padding:2px;"></td>
<td style="padding:2px;"></td>

</tr>

<tr>
<td style="padding:2px;">Limpiadores</td>
<td style="padding:2px;"></td>
<td style="padding:2px;"></td>
<td style="padding:2px;">Faros y Luces</td>
<td style="padding:2px;"></td>
<td style="padding:2px;"></td>

</tr>

<tr>

<td style="padding:2px;">(Señalamientos)</td>
<td style="padding:2px;"></td>
<td style="padding:2px;"></td>
<td style="padding:2px;">Extinguidor</td>
<td style="padding:2px;"></td>
<td style="padding:2px;"></td>
</tr>

<tr>
<td style="padding:2px;">Antena</td>
<td style="padding:2px;"></td>
<td style="padding:2px;"></td>
<td style="padding:2px;">Molduras</td>
<td style="padding:2px;"></td>
<td style="padding:2px;"></td>

</tr>

<tr>
<td style="padding:2px;">Radio</td>
<td style="padding:2px;"></td>
<td style="padding:2px;"></td>
<td style="padding:2px;">Calaveras</td>
<td style="padding:2px;"></td>
<td style="padding:2px;"></td>
</tr>

<tr>
<td style="padding:2px;">Caja de herramientas</td>
<td style="padding:2px;"></td>
<td style="padding:2px;"></td>
<td style="padding:2px;">Cable para corriente</td>
<td style="padding:2px;"></td>
<td style="padding:2px;"></td>
</tr>

<tr>
<td style="padding:2px;">Radio/CD</td>
<td style="padding:2px;"></td>
<td style="padding:2px;"></td>
<td style="padding:2px;">Defensas</td>
<td style="padding:2px;"></td>
<td style="padding:2px;"></td>

</tr>

<tr>
<td style="padding:2px;">Manijas</td>
<td style="padding:2px;"></td>
<td style="padding:2px;"></td>
<td style="padding:2px;">Parrilla</td>
<td style="padding:2px;"></td>
<td style="padding:2px;"></td>

</tr>

<tr>
<td style="padding:2px;">Placa delantera</td>
<td style="padding:2px;"></td>
<td style="padding:2px;"></td>
<td style="padding:2px;">Porta llantas</td>
<td style="padding:2px;"></td>
<td style="padding:2px;"></td>
</tr>

<tr>
<td style="padding:2px;">Tapón gasolina</td>
<td style="padding:2px;"></td>
<td style="padding:2px;"></td>
<td style="padding:2px;">Llanta de refacción</td>
<td style="padding:2px;"></td>
<td style="padding:2px;"></td>

</tr>

<tr>
<td style="padding:2px;">Tapón de radiador</td>
<td style="padding:2px;"></td>
<td style="padding:2px;"></td>
<td style="padding:2px;">Tapones de rueda</td>
<td style="padding:2px;"></td>
<td style="padding:2px;"></td>

</tr>

<tr>
<td style="padding:2px;">Tapón de aceite</td>
<td style="padding:2px;"></td>
<td style="padding:2px;"></td>
<td style="padding:2px;">Placa trasera</td>
<td style="padding:2px;"></td>
<td style="padding:2px;"></td>
</tr>

<tr>

<td style="padding:2px;">Otros</td>
<td style="padding:2px;"></td>
<td style="padding:2px;"></td>
<td style="padding:2px;"></td>
<td style="padding:2px;"></td>
<td style="padding:2px;"></td>
</tr>

</table>


<br>







</td>
<td style="padding:5px; vertical-align:middle; width:300px;">


<table style="border:#000000 solid 1px; text-align:center; width:300px; font-size: 8px;" border="1" cellspacing="0" >
<tr style="background-color:#ddd; color:#000;">
<td style="padding:5px; vertical-align:middle; width:162px;">TANQUE GASOLINA SALIDA</td>
<td style="padding:5px; vertical-align:middle; width:162px;">TANQUE GASOLINA LLEGADA</td>
</tr>
<tr>
<td style="padding:5px; vertical-align:middle;"><img src="imgpdfs/veh1.jpg" style="width:120px;" /></td>
<td style="padding:5px; vertical-align:middle;"><img src="imgpdfs/veh2.jpg" style="width:112px;" /></td>
</tr>
</table>

<table style="border:#000000 solid 1px; text-align:center; width:350px; font-size: 8px;" border="1" cellspacing="0" >
<tr style="background-color:#ddd; color:#000;">
<td style="padding:5px; vertical-align:middle; width:350;">OBSERVACIONES</td>
</tr>
<tr>
<td style="padding:5px; vertical-align:middle; height:80px;"></td>

</tr>
</table>

<!--<img src="imgpdfs/obsveh.jpg" style="width:400px;" />-->

</td>
</tr>

</table>
<div style="width:740px;  color:#002060; font-size: 13px;  padding:3px; text-align:center; ">
<img src="imgpdfs/vehiculos.jpg" style="width:550px;" />
</div>
<br>
<div style="width:740px;  color:#002060; font-size: 13px;  padding:3px; text-align:center; ">
<strong>CONFIRMO QUE HE LEIDO TODA LA INFORMACION, ESTOY DE ACUERDO Y AUTORIZO A LA UNION MUDANZAS A REALIZAR EL TRASLADO DE MIS PERTENENCIAS</strong>
</div>
<br>
<div style="width:740px; padding:8px;  color:#ff0000; font-size: 13px; border: solid 1px #002060; text-align:center;  ">
<strong>AHORA USTED, ESTA INFORMADO</strong>
<br><br>
</div>

<table style="text-align:center; width:740px; font-size: 8px;" cellspacing="0" >
<tr >
<td style="padding:5px;  width:430px;">


<br>
<div style="width:400px; font-size: 11px;  padding:3px; text-align:center; ">
<strong>LA UNION MUDANZAS SOLO PRESTA EL SERVICIO DE TRANSPORTE DEL VEHICULO ARRIBA MENCIONADO, EN CASO QUE HAYA FALLAS POR CAUSAS MECANICAS O ELECTRICAS NOSOTROS NO NOS HACEMOS RESPONSABLES</strong>
</div>
<br>
<div style="width:400px;  color:#002060; font-size: 11px;  padding:3px; text-align:center; ">
<strong>SI LE HA GUSTADO NUESTRO SERVICIO LE PEDIMOS NOS REGALE UN COMENTARIO EN https://www.mudanza.mx/mudanceros/la-union/opiniones , O NOS ENVIE UN VIDEO CORTO DE AGRADECIMIENTO, Y RECIBA UN DESCUENTO PARA USTED O ALGUIEN QUE NOS RECOMIENDE EN SU PROXIMO FLETE O MUDANZA.</strong>
</div>


<div style="width:400px;  color:#002060; font-size: 10px;  padding:3px; text-align:center; ">
<table style="width:400px; font-size: 10px;" border="0" cellspacing="0" >
<tr >
<td style="padding:10px; vertical-align:middle; text-align:center; width:80px; "><img src="imgpdfs/gracias.jpg" style="width:80px;" /></td>
<td style="padding:10px; vertical-align:middle; text-align:center; width:250px; ">
<strong>ESTA ORDEN DE SERVICIO CORRESPONDE AL NUM. DE CONTRATO: <?php echo $row[0]; ?>,
SIENDO UN DOCUMENTO VINCULADO, DE VALIDEZ OFICIAL Y CONFIDENCIAL</strong>
</td></tr>
</table>
</div>


</td>
<td style="padding:5px; vertical-align:middle; width:300px;">
<img src="imgpdfs/obsveh.jpg" style="width:280px;" />
</td>
</tr>
</table>
<br>

<!--
<img src="imgpdfs/medioservicio.jpg" style="width:750px;" /><br>
<img src="imgpdfs/abajoservicio.jpg" style="width:700px;" /><br>-->



<div style="width:775px;background-color:#002060; ">
<table style="width:775px; ">
<td style="width:50%;">
<div style="  padding: 5px;  color:#FFFFFF; float:left; font-size: 11px;"><br>
www.launionmudanzas.com<br>
clientes@launionmudanzas.com<br>
Tel. 4151527734<br>
Whastapp : 4421270514<br>
#LaUnionMudanzas<br>
</div>
</td>
<td style="width:50%;">
<div style="  padding: 5px; color: #FFFFFF; float: left; text-align: right; font-size: 11px;"><br>
Andrea Brunel #52 Fracc San Javier<br>
FRACC SAN JAVIER<br>
SAN MIGUEL ALLENDE GTO<br>
CP 37759<br>
#AmoMiTrabajo<br>
</div>
</td>
</table>
</div>


</div>
</div>
</page>

<?

$content=ob_get_clean();
    require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');

    $html2pdf = new HTML2PDF('P','Legal','fr');
	//$html2pdf->Image('tutorial/logo.png',10,12,30,0,'','http://www.fpdf.org');
	//$html2pdf->setDefaultFont('times');
    $html2pdf->WriteHTML($content);
    $html2pdf->Output('Cotizacion'.date('YmdHis').'.pdf');
?>