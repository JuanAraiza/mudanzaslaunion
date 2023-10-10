<?php ob_start();
?>

<page>
<?php
  include("config.php");
	$queryrut = "SELECT * from lista_rutas where folio='".$_GET['c']."'";
    $resultrut = $link->query($queryrut);
	$rowrut=mysqli_fetch_row($resultrut);
		?>
<div style="width:900px;  padding:10px;  font-size: 14px;">

<br>
<table><tr>
<td style="  text-align:center; width:150px;"><img src="images/logounion2.jpg" style="width: 150px;" />
</td>	
<td style="text-align:center; width:650px">
<a style="font-size:14px; text-decoration: none; color: #333; text-align:center;"><h2 style="font-size:18px;">Mudanzas Especializadas <span style="color:#003d6a;">LA UNION MUDANZAS</span></h2><br>
Libramiento a Queretaro No. 24-B, La Lejona C.P. 37765<br>
San Miguel de Allende, Gto.<br>
www.launionmx.com</a>
</td>
<td style=" text-align:center; width:200px;"><br><br>ORDEN DE SALIDA:<br><?php echo str_pad($rowrut[0], 3, "0", STR_PAD_LEFT); ?><br><br>
	FECHA: <? echo date('d/m/Y'); ?>
</td>
</tr>
</table>

<br>



<table>
<tr>
<td style="text-align:center; width:230px;">
CAMION: <a style="font-size:12px; text-decoration: underline; color: #333;">&nbsp;&nbsp;&nbsp;<?php echo $rowrut[2]; ?>&nbsp;&nbsp;&nbsp;</a>
</td>	
<td style="text-align:center; width:230px;">
OPERADOR: <a style="font-size:12px; text-decoration: underline; color: #333;">&nbsp;&nbsp;&nbsp;<?php echo $rowrut[3]; ?>&nbsp;&nbsp;&nbsp;</a>
</td>	
<td style="text-align:center; width:230px;">
MUDANZA: <a style="font-size:12px; text-decoration: underline; color: #333;">&nbsp;&nbsp;&nbsp;<?php echo $rowrut[4]; ?>&nbsp;&nbsp;&nbsp;</a>
</td>	
<td style="text-align:center; width:230px;">
RUTA: <a style="font-size:12px; text-decoration: underline; color: #333;">&nbsp;&nbsp;&nbsp;<?php echo $rowrut[5]; ?>&nbsp;&nbsp;&nbsp;</a>
</td>	
</tr>
</table>

<br><br>

<table class="table table-hover" border="1" cellpadding="0" cellspacing="0" >
    <tr style="background-color: #ddd; height: 80px;">
    <td align="center" style="width:40px; vertical-align: middle;"><strong>Folio</strong></td>
    <td align="center" style="width:80px; vertical-align: middle;"><strong>Tipo de Servicio</strong></td>
    <td align="center" style="width:80px; vertical-align: middle;"><strong>Origen</strong></td>
    <td align="center" style="width:90px; vertical-align: middle;"><strong>Nombre de Quien Entrega</strong></td>
    <td align="center" style="width:80px; vertical-align: middle;"><strong>Telefono</strong></td>
    <td align="center" style="width:80px; vertical-align: middle;"><strong>Destino</strong></td>
    <td align="center" style="width:90px; vertical-align: middle;"><strong>Nombre de Quien Recibe</strong></td>
    <td align="center" style="width:80px; vertical-align: middle;"><strong>Telefono</strong></td>
    <td align="center" style="width:80px; vertical-align: middle;"><strong>Por Cobrar</strong></td>
    <td align="center" style="width:100px; vertical-align: middle;"><strong>Observaciones</strong></td>
    </tr>
    <?php
	$queryfol = "SELECT * from servicio where cerrado in ('NO','AC') and folio2='".$_GET['c']."' and estatus=1 order by id desc";
    $resultfol = $link->query($queryfol);
	while($rowfol=mysqli_fetch_row($resultfol)){
		?>
 <tr>
    <td align="center" style="width:40px; vertical-align: middle;"><?php echo $rowfol[0]; ?></td>
    <td align="center" style="width:80px; vertical-align: middle;"><?php echo $rowfol[4]; ?></td>
    <td align="center" style="width:100px; vertical-align: middle;"><?php echo $rowfol[2]; ?></td>
    <td align="center" style="width:100px; vertical-align: middle;"><?php echo $rowfol[27]; ?></td>
    <td align="center" style="width:100px; vertical-align: middle;"><?php echo $rowfol[28]; ?></td>
    <td align="center" style="width:100px; vertical-align: middle;"><?php echo $rowfol[3]; ?></td>
    <td align="center" style="width:100px; vertical-align: middle;"><?php echo $rowfol[32]; ?></td>
    <td align="center" style="width:100px; vertical-align: middle;"><?php echo $rowfol[33]; ?></td>
    <td align="center" style="width:100px; vertical-align: middle;"><?php echo $rowfol[156]; ?></td>
    <td align="center" style="width:100px; vertical-align: middle;"><?php echo $rowfol[157]; ?></td>
    </tr>

<?php } ?>
  </table>
<br>
<br>
<table  border="1" cellpadding="0" cellspacing="0" >
<tr>
<td align="center" style=" vertical-align: middle; padding:10px;">
Para carga o descarga, hablar al cliente para confirmar horarios, minimo 2 hrs antes de su llegada al domicilio // Antes de cualquier descarga, corroborar con oficina que no se deba nada.
</td>	
</tr>
</table>

<br><br>

<table   cellpadding="0" cellspacing="0" >
<tr>
<td style="text-align:center; width:330px;" align="center">
Efectivo Recibidos
<br>
<table border="1" cellpadding="0" cellspacing="0" >
	<tr>
		<td style="width:100px; vertical-align: middle;">Folio</td>
		<td style="width:100px; vertical-align: middle;">Cantidad</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
</table>

	</td>	
	<td style="text-align:center; width:330px;" align="center">
	Nombre Ayudantes
<br>
<table border="1" cellpadding="0" cellspacing="0" >
	<tr>
		<td style="width:300px; vertical-align: middle;">&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		
	</tr>
	<tr>
		<td>&nbsp;</td>
		
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
</table>

	</td>
<td style="text-align:center; width:330px;">
<br><br><br><br>
<a style="font-size:12px; text-decoration: underline; color: #333;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowrut[3]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><br>
Nombre y firma de operador
</td>	
</tr>
</table>


</div>
</page>

<?php
$content=ob_get_clean();
    require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');

    $html2pdf = new HTML2PDF('L','Letter','fr');
	//$html2pdf->Image('tutorial/logo.png',10,12,30,0,'','http://www.fpdf.org');
	$html2pdf->setDefaultFont('Arial');
    $html2pdf->WriteHTML($content);
    $html2pdf->Output('Hoja-Ruta-'.date('YmdHis').'.pdf');
    
?>