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

	$query = "SELECT * from servicio where clave='".$_GET['c']."'";
	$result = $link->query($query);
	$row=mysqli_fetch_row($result);
?>
<div style="width:730px; background-color:#002060; padding:10px;  font-size: 12px; ">
<div style="background-color:#fff;">
<br>
<table style="width:730px; ">
<tr><td >
<?php if($_GET['emp']=='cruz'){ ?>
		<img src="images/logolacruz.png" style="width:420px;" />
<?php }else{ ?>
	<img src="imgpdfs/logo.jpg" style="width:420px;" />
<?php } ?>
</td></tr>
</table>

<br>

<br>
<div style="width:750px; padding: 5px;  ">
<table style="width:750px; ">
<td style="width:340px;">
<div style="  padding: 5px;  float:left;"><br>
<b>FOLIO DEL CONTRATO:</b> <? echo strtoupper($row[0]); ?><br>
<b>CLIENTE:</b> <? echo strtoupper($row[1]); ?><br>
<b>FECHA:</b> <? echo substr($row[22],8,2).'/'.substr($row[22],5,2).'/'.substr($row[22],0,4); ?><br>
</div>
</td>
<td style="width: 400px;0px;">
<div style="  padding: 5px; text-align:center; color:#002060;  font-size: 16px; float: left; text-align: center; "><br>
<br><b>CARTA DE DESLINDE DE RESPONSABILIDAD<br>
DE ARTÍCULOS DELICADOS</b>
</div>
</td>
</table>
<br></div>


<div style="width:710px; padding: 20px; text-align:justify;  font-size: 14px; line-height: 1.3;  ">

Agradecemos la confianza que nos brinda al momento de la contratación de su servicio <strong><?php echo $row[4]; ?></strong> el cual realizaremos con profesionalismo y el cuidado que nos caracteriza; sin embargo, es importante mencionar que <b>"No existe una póliza de seguro para maniobras"</b>, por lo que extendemos este documento para su conocimiento, así como  liberación de cualquier responsabilidad al personal de La Unión Mudanzas, y sus colaboradores.<br>					
Tomando la entera responsiva <strong><?php echo strtoupper($row[1]); ?></strong> debido a que si su mercancía es frágil por naturaleza, muchas veces el material de la misma o el empaque no resiste el traslado o movimiento. Además, desconocemos antigüedad, valor o fragilidad, sabiendo que el costo del servicio no alcanzaría a cubrir la reparación o reemplazo. Recordándole que hay objetos que son susceptibles a ese tipo de daños por su propia naturaleza.<br><br>
<?php
$querydl = "SELECT * from articulos_desl where cve_servicio='".$_GET['c']."'";
	$resultdl = $link->query($querydl);
	while($rowdl=mysqli_fetch_row($resultdl)){
		echo $rowdl[2].'<br>';
}
	?>"Movilizar todas estas piezas conlleva un riesgo" no nos hacemos responsables del funcionamiento de electrodomésticos y aparatos electrónicos.<br><br>
De nuestra parte haremos todo el trabajo con cuidado y disposición, siendo que hay circunstancias ajenas a nosotros<br><br>
Quedamos atentos a su comprensión, junto con el riesgo que conlleva.<br>
</div>

<div style="width:750px; padding: 5px; text-align:center;  font-size: 14px; line-height: 2.5;  ">
<br>
Atentamente 
															
<br>
</div>

<div style="width:750px; padding: 5px; color:#002060; text-align:center;   font-size: 16px; ">
<br>
<?php if($_GET['emp']=='cruz'){ ?>
    <b>Mudanzas La Cruz</b>
<?php }else{ ?>
    <b>La Union  Mudanzas</b>
<?php } ?>
<br>

</div>
<div style="width:750px; padding: 5px; font-size:11px; ">
ESTE ANEXO FORMA PARTE INTEGRA DEL CONTRATO
</div>
<div style="width:760px;background-color:#002060; ">
<table style="width:760px; ">
<td style="width:50%;">
<div style="  padding: 5px;  color:#FFFFFF; float:left;"><?php if($_GET['emp']=='cruz'){ ?>
	Tel. 554 606 3476<br>
<?php }else{ ?>
	www.launionmudanzas.com<br>
clientes@launionmudanzas.com<br>
Tel. 4151527734<br>
Whatsapp : 4421270514<br>
#LaUnionMudanzas<br>
<?php } ?>
</div>
</td>
<td style="width:50%;">
<div style="  padding: 5px; color: #FFFFFF; float: left; text-align: right; "><br>
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
    $html2pdf->Output('Deslinde'.date('YmdHis').'.pdf');
?>