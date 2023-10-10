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
}
p {
	font-size: 7px;
}
</style>

<page>
<?
 include('config.php');

	$query = "SELECT * from cotizacion2 where clave='".$_GET['c']."'";
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
<div style="width:260px;  ">
<img src="imgpdfs/cotiza-formal.jpg" style="width:200px; margin-left:auto; margin-right:auto;" />
</div>
<br>
CLIENTE: <? echo strtoupper($row[1]); ?><br>
EMPRESA: <? echo strtoupper($row[2]); ?><br>
SAN MIGUEL DE ALLENDE <BR>
<? echo date('d/m/Y'); ?>

</td></tr>
</table>


<table style="border:#000000 solid 1px; width:740px; font-size: 8px;" border="1" cellspacing="0" >
<tr style="background-color:#002060; color:#fff;">
<td style="padding:5px; vertical-align:middle;">ORIGEN</td>
<td style="padding:5px; vertical-align:middle;">DESTINO</td>
<td style="padding:5px; vertical-align:middle;">TIPO DE SERVICIO</td>
<td style="padding:5px; vertical-align:middle;">MODALIDAD</td>
<td style="padding:5px; vertical-align:middle;">INCLUYE</td>
<td style="padding:5px; vertical-align:middle;">TIEMPO DE ENTREGA</td>
<td style="padding:5px; vertical-align:middle;">SEGURO INCLUIDO</td>
<td style="padding:5px; vertical-align:middle;">COSTO CLIENTE</td>
<!--<td style="padding:5px; vertical-align:middle;">INCLUYE</td>
<td style="padding:5px; vertical-align:middle;">VALOR DECLARADO</td>
<td style="padding:5px; vertical-align:middle;">SEGURO</td>
<td style="padding:5px; vertical-align:middle;">TOTAL NETO,<br>SI REQUIERE<br>FACTURA<br>ES MAS IVA.</td>-->
</tr>
<tr>
<td style="padding:5px;"><? echo strtoupper($row[2]); ?></td>
<td style="padding:5px;"><? echo strtoupper($row[3]); ?></td>
<td style="padding:5px;"><? echo strtoupper($row[4]); ?></td>
<td style="padding:5px;"><? echo strtoupper($row[58]); ?></td>
<td style="padding:5px;">MANIOBRA PLANTA BAJA</td>
<td style="padding:5px;"><? echo strtoupper($row[59]); ?></td>
<td style="padding:5px;">A SOLICITUD DEL CLIENTE</td>

<td style="padding:5px;"><? echo number_format($row[5],2); ?></td>

</tr>
</table>



<table style="border:#000000 solid 1px; width:740px; font-size: 8px;" border="1" cellspacing="0" >
<tr style="background-color:#002060; color:#fff;">
<td style="padding:5px; vertical-align:middle;">&nbsp;</td>
<td style="padding:5px; vertical-align:middle;">INCLUYE</td>
<td style="padding:5px; vertical-align:middle;">&nbsp;</td>
<td style="padding:5px; vertical-align:middle;">&nbsp;</td>
<td style="padding:5px; vertical-align:middle;">&nbsp;</td>
<td style="padding:5px; vertical-align:middle;">NO INCLUYE</td>
<td style="padding:5px; vertical-align:middle;">&nbsp;</td>
</tr>
<tr>
<td style="padding:5px;"><? echo strtoupper($row[62]); ?></td>
<td style="padding:5px;"><? echo strtoupper($row[63]); ?></td>
<td style="padding:5px;"><? echo strtoupper($row[64]); ?></td>
<td style="padding:5px;">&nbsp;</td>
<td style="padding:5px;"><? echo strtoupper($row[65]); ?></td>
<td style="padding:5px;"><? echo strtoupper($row[66]); ?></td>
<td style="padding:5px;"><? echo strtoupper($row[67]); ?></td>

</tr>
</table>

<br>
<div style="width:760px; text-align:center; color:#fff; background-color:#002060; padding: 5px; font-size: 10px;  ">
CONDICIONES BASICAS DEL SERVICIO
</div>

<div style="width:760px;  padding: 5px; ">

<table>
<tr>
<td><!--  izq lateral inicio -->
<div style="width:355px;  padding: 5px; ">

<div style="width:355px; text-align:center; padding: 5px; color:#fff; background-color:crimson; font-size: 8px; ">
INCLUYE
</div>
<div style="width:355px; padding: 5px; color:#002060;  font-size: 9px; ">
* Emplaye de muebles correspondientes con cobijas y colchonetas.<BR>
* Acomodo de cajas en las habitaciones de casa destino (no desempaque).<BR>
* Maniobras de carga y descarga planta baja y primer piso.<BR>
* Monitoreo de la unidad durante el trayecto.<BR>
* Entrega mismo dia o dependiendo el tiempo de traslado.<BR>

</div>


<div style="width:355px; text-align:center; padding: 5px; color:#fff; background-color:#002060;  font-size: 7px; border: 1px #002060 solid; ">
&nbsp;
</div>
<div style="width:355px; text-align:center; padding: 5px; color:#002060; background-color: #b4c6e7;  font-size: 7px; border: 1px #002060 solid; ">
La cotizacion esta basada en la informacion proporcionada previamente por el cliente, en dado caso que  este haya omitido datos importantes como: muebles adicionales,cajas extra, empaques especiales, desempaque,volados, acarreos, armado o desarmado de muebles,  desinstalacion de aparatos electronicos o de casa, quitar puertas ventas, etc., y se tenga que ocupar una unidad diferente o agregar cargos por maniobras adicionales  a lo acordada se realizara el ajuste correspondiente*** 
</div>
<div style="width:355px; text-align:center; padding: 5px;  ">
<img src="imgpdfs/familia.jpg" style="width:180px; margin-left:auto; margin-right:auto;" />
</div>
</div>

<!--  izq lateral fin --></td>
<td><!--  der lateral inicio -->
<div style="width:355px;  padding: 5px; ">

<div style="width:355px; text-align:center; padding: 5px; color:#fff; background-color:crimson; font-size: 8px; ">
NO INCLUYE
</div>
<div style="width:355px; padding: 5px; color:#002060;  font-size: 7px; ">
* Empaque o embalaje de cosas unitarias a granel.<br>
* Empaque con carton , bubuja, polifom, u algun otro material de empaque.<br>
* Desempaque a granel en casa destino<br>
* Des o Instalacion de aparatos electronicos, lamparas, estufas y/o lavadoras, etc<br>
* Volado de Muebles<br>
* Maniobras especiales de pianos y cajas fuertes<br>
* Desarmado y Armado de Muebles<br>
* Carga  y/o descarga en pisos extras<br>
* Acarreos mayores a 10mts, caminando y/o en unidad de carga<br>

			

</div>
<div style="width:355px; padding: 5px; color:crimson;  font-size: 7px; ">

*En caso fortuito multas de transito, permisos o algun otro cargo adicional ajeno al transportista.
			

</div>
<br>
<div style="width:355px; text-align:center; padding: 5px; color:#fff; background-color:#002060;  font-size: 9px; border: 1px #002060 solid; ">
&nbsp;
</div>
<div style="width:355px; text-align:center; padding: 5px; color:#002060; background-color: #b4c6e7; border: 1px #002060 solid;  font-size: 7px; ">
Este costo es considerando que la unidad pueda CARGAR Y DESCARGAR a pie de casa
</div>
<div style="width:355px; text-align:center; padding: 5px; color:#002060; background-color: #b4c6e7; border: 1px #002060 solid;  font-size: 7px; ">
En caso que no sea posible por causas  ajenas al transportista  y se tengan que realizar  acarreo,volados, maniobras especiales, etc.,habra un cargo adicional el cual se determinara en en el momento, COSTO SUJETO A CONDICIONES del lugar y dificultad de las maniobras 
</div>
<div style="width:355px; text-align:center; padding: 5px; color:#002060; background-color: #b4c6e7; border: 1px #002060 solid;  font-size: 7px; ">
En caso que el cliente requiera acomodo,armado de muebles,empaque o desempaque especial de sus cosas fuera de lo ofertados se tendra que cotizar previamente
</div>

</div>

<!--  der lateral fin --></td>
</tr>
</table>

</div>


<div style="width:760px; text-align:center; color:#fff; background-color:#002060; padding: 5px; font-size: 10px;  ">
IMPORTANTE
</div>
<br>
<div style="width:355px; text-align:center; padding: 5px; color:#fff; background-color:crimson; font-size: 8px; ">
CONDICIONES DE TRANSPORTE
</div>
<div style="width:760px; padding: 5px; color:#002060;  font-size: 7px; ">
* No nos hacemos responsables por retrasos, demoras o cambio de ruta.<br>
* El tiempo de transito es aproximado, ya que esto puede variar por cuestiones climatológicas, manifestaciones, accientes u otros ajenos a nosotros.<br>
* Solicitar el equipo por lo menos 24-48 horas de anticipación.<br>
* Tiempo  libre de maniobras de carga y descarga 2-4 hrs, despues de este tiempo podrian generarse demoras.<br>
* Llegando la unidad a Origen, sino es cargada por causas ajenas al transportista cobrara FLETE EN FALSO  por el VALOR DEL ANTICIPO  DEPOSITADO.<br>
* Llegada la unidad a Destino, sino es descargada por causas ajenas al transportista   se cobrara  REEXPEDICION, ASI COMO MANIOBRAS ADICIONALES.<br>
* Llegando a destino si no somos descargados por causa del cloiente o del pago, sera la mercancia reembarcada a la nodegams cercana, generando cargos extras de embodegamiento, reexpedicion y maniobras.					


<table>
<tr>
<td>
*Demoras por dia por unidad despues de 24 hrs de arribo en Origen y/o Destino, $3000.00 m.n.<br>
*Otros gastos en origen / destino si los hubiera y que no se encuentren mencionados en la presente cotización.<br>
*Cotizacion sujeta a cambios sin previo aviso<br>
*No trasladamos personas o animales dentro de nuestras unidades.<br>
<div style="width:355px; padding: 5px; color:crimson;  font-size: 7px; ">

*ESTA COTIZACION TIENE UNA VIGENCIA DE 30 DIAS NATURALES 
			

</div>
</td>
<td align="right">
<div style="width:180px; text-align:right; ">
<img src="imgpdfs/atencion.jpg" style="width:120px;" />
</div>
</td>
</tr>
</table>
</div>
<div style="width:760px; text-align:center; color:#fff; background-color:crimson; padding: 2px; font-size: 7px;  ">
&nbsp;
</div>
<div style="width:760px; text-align:center; ">
<img src="imgpdfs/breve.jpg" style="width:430px;" />
</div>
<div style="width:760px; text-align:center; color:#fff; background-color:#002060; padding: 2px; font-size: 7px;  ">
&nbsp;
</div>

<div style="width:760px; padding: 5px; text-align:center;  font-size: 7px; ">
Agradeciendo de antemano su solicitud, y en espera de una respuesta favorable a la presente, quedamos pendientes para la informacion adicional de cualquier tipo que se juzgue pertinente. 
<br><br>
<br>
<br>
ATENTAMENTE
</div>
<div style="width:760px; padding: 5px; color:#002060; text-align:center;   font-size: 9px; ">
La Union  Mudanzas
</div>

<div style="width:775px;background-color:#002060; ">
<table style="width:775px; ">
<td style="width:50%;">
<div style="  padding: 5px;  color:#FFFFFF; float:left; font-size: 7px;"><br>
www.launionmudanzas.com<br>
clientes@launionmudanzas.com<br>
Tel. 4151527734<br>
Whastapp : 4421270514<br>
#LaUnionMudanzas<br>
</div>
</td>
<td style="width:50%;">
<div style="  padding: 5px; color: #FFFFFF; float: left; text-align: right; font-size: 7x;"><br>
Libramiento a Queretaro No. 24 B, Col. La Lejona<br>
SAN MIGUEL ALLENDE GTO<br>
CP 37765<br>
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