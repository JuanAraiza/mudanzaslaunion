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
$link=mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
	mysql_select_db($bbdd,$link) or die("resultado=".urlencode(mysql_error()));
	$result=mysql_query("SELECT * from servicio where clave='".$_GET['c']."'", $link);
	$row=mysql_fetch_row($result);
?>
<div style="width:740px; background-color:#002060; padding:10px;  font-size: 8px; ">
<div style="background-color:#fff;">
<br>
<table style="width:70px; ">
<tr><td >
<img src="imgpdfs/logo.jpg" style="width:270px;" /><br>

</td><td style="width:200px; ">

<!--<img src="imgpdfs/pagos.jpg" style="width:300px;" />-->
</td><td style="padding-left:30px; text-transform: uppercase;">
<div style="width:200px; background-color:#002060; color:#fff;  padding:5px; text-align:center; text-transform: uppercase; ">
ORDEN DE SERVICIO NUM: <?php echo $row[0]; ?>
</div>
<br>
NOMBRE CLIENTE: <? echo $row[1]; ?><br>
TEL: <? echo $row[50]; ?><br>


</td></tr>
</table>

<br>
<div style="width:160px; background-color:#002060; color:#fff;  padding:5px; text-align:center; ">
GENERALES DEL SERVICIO
</div>

<table style="border:#000000 solid 1px; text-align:center; width:740px; font-size: 8px;" border="1" cellspacing="0" >
<tr style="background-color:#002060; color:#fff;">
<td style="padding:5px; vertical-align:middle; width:75px;">ORIGEN</td>
<td style="padding:5px; vertical-align:middle; width:75px;">DESTINO</td>
<td style="padding:5px; vertical-align:middle; width:80px;">TIPO DE SERVICIO</td>
<td style="padding:5px; vertical-align:middle; width:80px;">MODALIDAD</td>
<td style="padding:5px; vertical-align:middle; width:80px;">INCLUYE</td>
<td style="padding:5px; vertical-align:middle;">TIEMPO ESTIMADO DE ENTREGA</td>
<td style="padding:5px; vertical-align:middle;">SEGURO INCLUIDO</td>

<!--<td style="padding:5px; vertical-align:middle;">INCLUYE</td>
<td style="padding:5px; vertical-align:middle;">VALOR DECLARADO</td>
<td style="padding:5px; vertical-align:middle;">SEGURO</td>
<td style="padding:5px; vertical-align:middle;">TOTAL NETO,<br>SI REQUIERE<br>FACTURA<br>ES MAS IVA.</td>-->
</tr>
<tr>
<td style="padding:5px; text-transform: uppercase;"><? echo $row[2]; ?></td>
<td style="padding:5px; text-transform: uppercase;"><? echo $row[3]; ?></td>
<td style="padding:5px; text-transform: uppercase;"><? echo $row[4]; ?></td>
<td style="padding:5px; text-transform: uppercase;"><? echo $row[102]; ?></td>
<td style="padding:5px;">MANIOBRA PLANTA BAJA</td>
<td style="padding:5px; text-transform: uppercase;"><? echo $row[38]; ?></td>
<td style="padding:5px;">$ <? echo number_format($row[19],2); ?></td>



</tr>
</table>

<br>
<table style="border:#000000 solid 1px; width:740px; font-size: 8px;" border="1" cellspacing="0" >
<tr >
<td style="padding:5px; vertical-align:middle; text-align:center; width:150px; background-color:#002060; color:#fff;">DIRECCION DE RECOLECCIÓN</td>
<td style="padding:5px; vertical-align:middle; text-align:center; width:357px;"><? echo $row[24].' ' .$row[25]; ?></td>
<td style="padding:5px; vertical-align:middle; text-align:center; width:100px; background-color:#002060; color:#fff;">FECHA DE<br>RECOLECCIÓN</td>
<td style="padding:5px; vertical-align:middle; text-align:center; width:50px;"><? echo substr($row[22],8,2).'/'.substr($row[22],5,2).'/'.substr($row[22],0,4); ?></td>

</tr>
<tr >
<td style="padding:5px; vertical-align:middle; text-align:center; width:110px; background-color:#002060; color:#fff;">DIRECCION DEESTINO</td>
<td style="padding:5px; vertical-align:middle; text-align:center; width:350px;"><? echo $row[29].' ' .$row[30]; ?></td>
<td style="padding:5px; vertical-align:middle; text-align:center; width:70px; background-color:#002060; color:#fff;">HORA</td>
<td style="padding:5px; vertical-align:middle; text-align:center; width:50px;"><? echo $row[23]; ?></td>

</tr>

</table>


<br>
<div style="width:200px; background-color:#002060; color:#fff;  padding:4px; text-align:center; ">
INSTRUCCIONES O DETALLES DEL SERVICIO
</div>
<div style="width:740px; color:#ed2024;  border: 1px #002060 solid;  text-align: center; padding: 7px; font-size: 8px;  ">
<?php echo utf8_decode($row[98]); ?>&nbsp;
</div>
<br>
<div style="width:750px; background-color:#002060; color:#fff;  padding:3px; text-align:center; ">
LISTADO DE MERCANCIA
</div>
<div style="width:743px; border: 1px #002060 solid; padding: 5px; font-size: 9px;  ">
<?
$list=utf8_decode($row[7]);
//echo str_replace('<br />',',',$list); 
$arraylist = explode ('<br />',$list);
//var_dump($arraylist);
?>

<table  border="0" cellspacing="0" >
<tr >
<td style="padding:2px; vertical-align:middle; width:140px;"><?php echo $arraylist[0]; ?></td>
<td style="padding:2px; vertical-align:middle; width:140px;"><?php echo $arraylist[6]; ?></td>
<td style="padding:2px; vertical-align:middle; width:140px;"><?php echo $arraylist[12]; ?></td>
<td style="padding:2px; vertical-align:middle; width:140px;"><?php echo $arraylist[18]; ?></td>
<td style="padding:2px; vertical-align:middle; width:140px;"><?php echo $arraylist[24]; ?></td>
</tr>
<tr >
<td style="padding:2px; vertical-align:middle; "><?php echo $arraylist[1]; ?></td>
<td style="padding:2px; vertical-align:middle; "><?php echo $arraylist[7]; ?></td>
<td style="padding:2px; vertical-align:middle; "><?php echo $arraylist[13]; ?></td>
<td style="padding:2px; vertical-align:middle; "><?php echo $arraylist[19]; ?></td>
<td style="padding:2px; vertical-align:middle;"><?php echo $arraylist[25]; ?></td>
</tr>
<tr >
<td style="padding:2px; vertical-align:middle; "><?php echo $arraylist[2]; ?></td>
<td style="padding:2px; vertical-align:middle; "><?php echo $arraylist[8]; ?></td>
<td style="padding:2px; vertical-align:middle; "><?php echo $arraylist[14]; ?></td>
<td style="padding:2px; vertical-align:middle; "><?php echo $arraylist[20]; ?></td>
<td style="padding:2px; vertical-align:middle; "><?php echo $arraylist[26]; ?></td>
</tr>
<tr >
<td style="padding:2px; vertical-align:middle; "><?php echo $arraylist[3]; ?></td>
<td style="padding:2px; vertical-align:middle; "><?php echo $arraylist[9]; ?></td>
<td style="padding:2px; vertical-align:middle; "><?php echo $arraylist[15]; ?></td>
<td style="padding:2px; vertical-align:middle; "><?php echo $arraylist[21]; ?></td>
<td style="padding:2px; vertical-align:middle; "><?php echo $arraylist[27]; ?></td>
</tr>
<tr >
<td style="padding:2px; vertical-align:middle; "><?php echo $arraylist[4]; ?></td>
<td style="padding:2px; vertical-align:middle; "><?php echo $arraylist[10]; ?></td>
<td style="padding:2px; vertical-align:middle; "><?php echo $arraylist[16]; ?></td>
<td style="padding:2px; vertical-align:middle; "><?php echo $arraylist[22]; ?></td>
<td style="padding:2px; vertical-align:middle; "><?php echo $arraylist[28]; ?></td>
</tr>
<tr >
<td style="padding:2px; vertical-align:middle; "><?php echo $arraylist[5]; ?></td>
<td style="padding:2px; vertical-align:middle; "><?php echo $arraylist[11]; ?></td>
<td style="padding:2px; vertical-align:middle; "><?php echo $arraylist[17]; ?></td>
<td style="padding:2px; vertical-align:middle; "><?php echo $arraylist[23]; ?></td>
<td style="padding:2px; vertical-align:middle; "><?php echo $arraylist[29]; ?></td>
</tr>

</table>


</div>
<br>
<div style="width:750px; padding:2px;  color:#ff0000; font-size: 15px; border: solid 1px #FF0000; ">
<div style="width:750px; color:#ff0000; font-size: 17px; text-align:center;  ">
<strong>¡ATENCION!</strong>
</div>
<table style="width:750px; font-size: 8px;" border="0" cellspacing="0" >
<tr >
<td style="padding:0px;  "><img src="imgpdfs/atencion1.jpg" style="width:50px;" />
</td>
<td style="padding:5px;  width:280px; ">
<div style=" color:#002060; width:280px; ">
NO TRASLADAMOS PERSONAS O MASCOTAS EN NUESTRAS UNIDADES<br><br>
LAS PANTALLAS Y ARTICULOS QUE POR SU NATURALEZA SEAN O SE CONVIERTAN EN FRAGILES CON EL TRASLADO, VIAJAN POR CUENTA Y RIESGO DEL CLIENTE<br><br>
<div style="color:#FF0000; width:270px; ">SI NO ASEGURA SU MIDANZA, NO PODEMOS HACERNOS RESPONSABLES EN ALGUN TIPO DE PERCANCE CARRETERO, MAS INFO EN SU GRUPO DE SERVICIO</div><br><br>
PARA MAS DETALLES REVISAR NUESTROS TERMINANOS Y CONDICIONES EN LA SIGUIENTE LIGA: https://launionmudanzas.com/#terminos<br>
</div>
</td>
<td style="padding:0px;  width:20px; "><img src="imgpdfs/atencion2.jpg" style="width:55px;" />
</td>
<td style="padding:5px;  width:300px; ">
<div style=" color:#002060; width:300px; ">
EN SERVICIOS COMPARTIDOS LOS TIEMPOR DE ENTREGA SON APROXIMADOS Y ESTAN SUJETOS A DEMORA<br><br>
SI LA UNIDAD NO ENTRA DIRECTAMENTE HASTA SU DOMICILIO Y SE REQUIERE ACARREO A PIE O CAMIONETA ESTE SERA CUBIERTO POR EL CLIENTE , PARA CONSIDERARLO<br><br>
RECUERDE QUE EL COSTO DE SU SERVICIO  ESTA BASADO EN EL LISTADO PREVIAMENTE COTIZADO Y EXPRESO EN ESTA ORDEN DE SERVICIO, SI LLEVA MAS VOLUMEN EL MONTO DEL AJUSTE DEBERA SER LIQUIDADO AL TERMINAR LA DESCARGA
<br><br>
</div>
</td></tr>
</table>
</div>
<br><br>

<div style="width:750px; background-color:#002060; color:#fff; font-size: 10px;  padding:3px; text-align:center; ">
CONDICIONES DEL TRANSPORTE
</div>
<div style="width:750px;  padding:2px; text-align:justify; font-size: 9px; color:#002060; ">
1.- No nos hacemos responsables por retrasos, demoras o cambio de ruta, POR CAUSAS AJENAS AL TRAYECTO<br>
2.- El tiempo de transito es aproximado , ya que esto puede variar por cuestiones climatológicas, de otros servicios, maniobras siendo ajenas a nosotros.<br>
3.- Tiempo libre de carga y descarga 2-6 hrs dependiendo del tipo de servicio.<br>
4.- La unidad de Origen, sino es cargada por causas del cliente, se COBRARA FLETE EN FALSO por el VALOR DEL ANTICIPO PREVIAMENTE DEPOSITADO.<br>
5.- La unidad de Destino, sino es descargada por cobro o retrasos del cliente, se cobrara TIEMPO DE DEMORAS, ASI COMO MANIOBRAS ADICIONALES.<br>
6.- Si llegamos a destino y no podemos ser descargados por causas ajenas al transporte, sera reenciada la mercancia a la bodega mas cercana, generando esto gastos de embodegamiento y reexpedición.
</div>
<div style="width:750px;  color:#ff0000; font-size: 13px;  padding:3px; text-align:center; ">
<strong>Servicio no LIQUIDADO en su totalidad, NO sera descargado hasta confirmar pago en su grupo de servicio.</strong>
</div>
<div style="width:750px;  color:#002060; font-size: 13px;  padding:3px; text-align:center; ">
<strong>CONFIRMO QUE HE LEIDO TODA LA INFORMACION, ESTOY DE ACUERDO Y AUTORIZO A LA UNION MUDANZAS A REALIZAR EL TRASLADO DE MIS PERTENENCIAS</strong>
</div>
<br>
<div style="width:750px; padding:8px;  color:#ff0000; font-size: 13px; border: solid 1px #002060;  padding:3px; text-align:center; heigth:300px; ">
<strong>AHORA USTED, ESTA INFORMADO</strong>
<br><br><br><br>
</div>

<div style="width:750px;  color:#002060; font-size: 11px;  padding:3px; text-align:center; ">
<strong>SI LE HA GUSTADO NUESTRO SERVICIO LE PEDIMOS NOS REGALE UN COMENTARIO EN<BR>
https://www.mudanza.mx/mudanceros/la-union/opiniones , O NOS ENVIE UN VIDEO CORTO DE AGRADECIMIENTO,<BR>
Y RECIBA UN DESCUENTO PARA USTED O ALGUIEN QUE NOS RECOMIENDE EN SU PROXIMO FLETE O MUDANZA.</strong>
</div>
<div style="width:750px;  color:#002060; font-size: 9px;  padding:3px; text-align:center; ">
<table style="width:750px; font-size: 9px;" border="0" cellspacing="0" >
<tr >
<td style="padding:10px; vertical-align:middle; text-align:center; width:180px; "><img src="imgpdfs/gracias.jpg" style="width:100;" /></td>
<td style="padding:10px; vertical-align:middle; text-align:center; width:480px; ">
<strong>ESTA ORDEN DE SERVICIO CORRESPONDE AL NUM. DE CONTRATO: <?php echo $row[0]; ?><br>
SIENDO UN DOCUMENTO VINCULADO, DE VALIDEZ OFICIAL Y CONFIDENCIAL</strong>
</td></tr>
</table>
</div>
<!--
<img src="imgpdfs/medioservicio.jpg" style="width:750px;" /><br>
<img src="imgpdfs/abajoservicio.jpg" style="width:700px;" /><br>-->



<div style="width:760px;background-color:#002060; ">
<table style="width:760px; ">
<td style="width:50%;">
<div style="  padding: 5px;  color:#FFFFFF; float:left; font-size: 10px;"><br>
www.launionmudanzas.com<br>
clientes@launionmudanzas.com<br>
Tel. 4151527734<br>
Whastapp : 4421270514<br>
#LaUnionMudanzas<br>
</div>
</td>
<td style="width:50%;">
<div style="  padding: 5px; color: #FFFFFF; float: left; text-align: right; font-size: 10px;"><br>
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

    $html2pdf = new HTML2PDF('P','Letter','fr');
	//$html2pdf->Image('tutorial/logo.png',10,12,30,0,'','http://www.fpdf.org');
	//$html2pdf->setDefaultFont('times');
    $html2pdf->WriteHTML($content);
    $html2pdf->Output('Cotizacion'.date('YmdHis').'.pdf');
?>