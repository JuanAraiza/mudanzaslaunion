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
<tr><td style="width:430px;">
<img src="imgpdfs/logo.jpg" style="width:430px;" />
</td><td style="width:260px; padding-left:30px;">
<div style="width:260px;  ">
<img src="imgpdfs/cotiza-formal.jpg" style="width:250px; margin-left:auto; margin-right:auto;" />
</div>
<br>
CLIENTE: <? echo strtoupper($row[1]); ?><br>
EMPRESA: <? echo strtoupper($row[2]); ?><br>
SAN MIGUEL DE ALLENDE <BR>
<? echo date('d/m/Y'); ?>

</td></tr>
</table>

<br>
<table style="border:#000000 solid 1px; width:740px; font-size: 8px;" border="1" cellspacing="0" >
<tr style="background-color:#002060; color:#fff;">
<td style="padding:5px; vertical-align:middle;">ORIGEN</td>
<td style="padding:5px; vertical-align:middle;">DESTINO</td>
<td style="padding:5px; vertical-align:middle;">TIPO DE SERVICIO</td>
<td style="padding:5px; vertical-align:middle;">MODALIDAD</td>
<td style="padding:5px; vertical-align:middle;">INCLUYE</td>
<td style="padding:5px; vertical-align:middle;">TIEMPO ESTIMADO DE ENTREGA</td>
<td style="padding:5px; vertical-align:middle;">SEGURO INCLUIDO</td>
<td style="padding:5px; vertical-align:middle;">COSTO TOTAL</td>
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
<td style="padding:5px;"></td>
<td style="padding:5px;"><? echo strtoupper($row[59]); ?></td>
<td style="padding:5px;">A SOLICITUD DEL CLIENTE</td>

<td style="padding:5px;"><? echo number_format($row[5],2); ?></td>

</tr>
</table>
<br>

<div style="width:760px; text-align:center; color:#fff; background-color:crimson; padding: 3px; font-size: 7px;  ">
&nbsp;
</div>


<table>
<tr>
<td>
<div style="width:320px; text-align:center; ">
<img src="imgpdfs/atencion.jpg" style="width:200px;" />
</div>
<br>
<div style="width:320px; padding: 5px;   font-size: 9px; ">
*No siempre la unidad que recoge sera la que entrega, por cuestiones de ruta.
<br>
<div style="width:320px;  color:crimson; ">
*En caso fortuito multas de transito, permisos o algun otro cargo adicional  sera liquidado por el cliente, si es ajeno al transporte.			
</div>

*Si requiere maniobras favor de solicitarlo con antelacion
 para ir prevenidos con la gente o la herramienta necesaria.<br>
*Las maniobras tienen cargo extra<br>
*Las unidades solo cargan el peso permitido, no llevamos exceso por seguridad de todos

</div>
</td>
<td >
<div style="width:400px; text-align:center; padding: 5px; color:#002060; background-color: #b4c6e7;  font-size: 9px; border: 1px #002060 solid; ">
Esta considerando que la unidad pueda CARGAR Y DESCARGAR a pie de casa o en zona abierta
</div>
<div style="width:400px; text-align:center; padding: 5px; color:#002060; background-color: #b4c6e7;  font-size: 9px; border: 1px #002060 solid; ">
En caso que no sea posible por causas  ajenas al transportista  y se tengan que realizar  recorridos extras habra un cargo adicional el cual se determinara en en el momento, COSTO SUJETO A CONDICIONES del lugar y dificultad de las maniobras 
</div>
<div style="width:400px; text-align:center; ">
<img src="imgpdfs/vehiculo.jpg" style="width:200px;" />
</div>
</td>
</tr>
</table>

<br>
<div style="width:355px; text-align:center; padding: 5px; color:#fff; background-color:crimson; font-size: 10px; ">
CONDICIONES DE TRANSPORTE
</div>
<div style="width:760px; padding: 5px; color:#002060;  font-size: 9px; ">
*No nos hacemos responsables por retrasos, demoras o cambio de ruta.<br>
*El tiempo de transito es aproximado, ya que esto puede variar por cuestiones climatológicas, manifestaciones, accientes u otros ajenos a nosotros.<br>
*Solicitar el equipo por lo menos 24-48 horas de anticipación.<br>
*Tiempo  libre de maniobras de carga y descarga 2-4 hrs, despues de este tiempo podrian generarse demoras.<br>
*Llegando la unidad a Origen, sino es cargada por causas ajenas al transportista cobrara FLETE EN FALSO  por el VALOR DEL ANTICIPO  DEPOSITADO.<br>
*Llegada la unidad a Destino, sino es descargada por causas ajenas al transportista   se cobrara  REEXPEDICION, ASI COMO MANIOBRAS ADICIONALES.	<br>
*Llegando a destino si no somos descargados por causa del cloiente o del pago, sera la mercancia reembarcada a la nodegams cercana, generando cargos extras de embodegamiento, reexpedicion y maniobras.<br>
*Demoras por dia por unidad despues de 24 hrs de arribo en Origen y/o Destino, $3000.00 m.n.<br>
*Otros gastos en origen / destino si los hubiera y que no se encuentren mencionados en la presente cotización.<br>
*Cotizacion sujeta a cambios sin previo aviso<br>
*No trasladamos personas o animales dentro de nuestras unidades.<br>


<div style="width:355px; padding: 5px; color:crimson;  font-size: 9px; ">
*ESTA COTIZACION TIENE UNA VIGENCIA DE 30 DIAS NATURALES 
			
</div>

</div>
<div style="width:760px; text-align:center; color:#fff; background-color:crimson; padding: 3px; font-size: 7px;  ">
&nbsp;
</div>
<div style="width:760px; text-align:center; ">
<img src="imgpdfs/breve.jpg" style="width:530px;" />
</div>
<div style="width:760px; text-align:center; color:#fff; background-color:#002060; padding: 3px; font-size: 7px;  ">
&nbsp;
</div>

<div style="width:760px; padding: 5px; text-align:center;  font-size: 9px; ">
Agradeciendo de antemano su solicitud, y en espera de una respuesta favorable a la presente, quedamos pendientes para la informacion adicional de cualquier tipo que se juzgue pertinente.
<br><img src="imgpdfs/Firmaazuchica.png" style="width:150px;" /><br>
ATENTAMENTE
</div>
<div style="width:760px; padding: 5px; color:#002060; text-align:center;   font-size: 9px; ">
La Union  Mudanzas
</div>

<div style="width:775px;background-color:#002060; ">
<table style="width:775px; ">
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
<div style="  padding: 5px; color: #FFFFFF; float: left; text-align: right; font-size: 10x;"><br>
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