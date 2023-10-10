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
<div style="width:740px; background-color:#002060; padding:10px;  font-size: 8px; ">
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
<table style="width:740px; ">
<tr><td >
<div style="width:200px; font-size:18px;  padding:5px; text-align:center; ">
<strong>GENERALES DEL<br> SERVICIO</strong>
</div>
</td><td style="padding-left:30px;">

<table style="width:390px; font-size:13px; border:#000000 solid 1px; " cellpadding="0" cellspacing="0">

<tr>
<td style="background-color:#ccc; padding:5px;"><strong>NOMBRE DEL CLIENTE: </strong></td>
<td style="border:#000000 solid 1px; text-transform: uppercase;"><strong><? echo $row[1]; ?></strong></td>
</tr>

</table>


</td>
</tr>
</table>
<table style="width:740px;  font-size:11px; border:#000000 solid 1px; " cellpadding="0" cellspacing="0">

<tr>
<td style="background-color:#ccc; padding:3px; border:#000000 solid 1px; width:138px;"><strong>ORIGEN: </strong></td>
<td style="border:#000000 solid 1px; padding:3px; text-transform: uppercase; width:320px;"><strong><? echo $row[2]; ?></strong></td>
<td style="background-color:#ccc; padding:3px; border:#000000 solid 1px; width:80px;"><strong>SEGURO: </strong></td>
<td style="background-color:#ccc; padding:3px; border:#000000 solid 1px; width:160px;"><strong>MONTO ASEGURADO: </strong></td>
</tr>
<tr>
<td style="background-color:#ccc; padding:3px;"><strong>DESTINO: </strong></td>
<td style="border:#000000 solid 1px; padding:3px; text-transform: uppercase;"><strong><? echo $row[3]; ?></strong></td>
<td style="border:#000000 solid 1px; padding:3px; text-transform: uppercase;"><strong><? if($row[19]>=1){ echo "SI"; }else{ echo "NO"; } ?></strong></td>
<td style="border:#000000 solid 1px; padding:3px; text-transform: uppercase;"><strong>$ <? echo number_format($row[19], 2); ?></strong></td>

</tr>

</table>

<table style="width:740px;  font-size:11px; border:#000000 solid 1px; " cellpadding="0" cellspacing="0">
<tr>
<td style="background-color:#ccc; padding:3px; border:#000000 solid 1px; width:110px;"><strong>QUIEN ENTREGA: </strong></td>
<td style="border:#000000 solid 1px; padding:3px; text-transform: uppercase; width:239px;"><strong><? echo $row[27]; ?></strong></td>
<td style="background-color:#ccc; padding:3px; border:#000000 solid 1px; width:104px;"><strong>QUIEN RECIBE: </strong></td>
<td style=" border:#000000 solid 1px; padding:3px; text-transform: uppercase; width:245px;"><strong><? echo $row[32]; ?></strong></td>
</tr>

</table>
<table style="width:740px;  font-size:11px; border:#000000 solid 1px; " cellpadding="0" cellspacing="0">
<tr>
<td style="background-color:#ccc; padding:3px; width:100px;"><strong>TEL. ENTREGA: </strong></td>
<td style="border:#000000 solid 1px; padding:3px; text-transform: uppercase; width:85px;"><strong><? echo $row[28]; ?></strong></td>
<td style="background-color:#ccc; padding:3px; width:88px;"><strong>TEL. RECIBE: </strong></td>
<td style="border:#000000 solid 1px; padding:3px; text-transform: uppercase; width:85px;"><strong><? echo $row[33]; ?></strong></td>
<td style="background-color:#ccc; padding:3px;"><strong>FECHA RECOLECCION: </strong></td>
<td style="border:#000000 solid 1px; padding:3px; text-transform: uppercase;  width:60px;"><strong><? echo substr($row[22],8,2).'/'.substr($row[22],5,2).'/'.substr($row[22],0,4); ?></strong></td>
<td style="background-color:#ccc; padding:3px;"><strong>HORA: </strong></td>
<td style="border:#000000 solid 1px; padding:3px; text-transform: uppercase;;  width:60px;"><strong><? echo $row[23]; ?></strong></td>
</tr>
</table>

<table style="border:#000000 solid 1px; width:740px; font-size: 11px;" border="1" cellspacing="0" >
<tr >
<td style=" vertical-align:middle; padding:3px; width:160px; background-color:#ccc;"><strong>DIR. DE RECOLECCIÓN</strong></td>
<td style=" vertical-align:middle; padding:3px; text-transform: uppercase;  width:570px;"><strong><? echo $row[24].' ' .$row[25]; ?></strong></td>

</tr>
<tr >
<td style=" padding:3px; vertical-align:middle; background-color:#ccc;"><strong>DIR. DE DESTINO</strong></td>
<td style=" padding:3px; vertical-align:middle; text-transform: uppercase;  width:570px; "><strong><? echo $row[29].' ' .$row[30]; ?></strong></td>


</tr>
<tr >
<td style=" padding:3px; vertical-align:middle; background-color:#ccc;"><strong>TIPO DE SERVICIO</strong></td>
<td style=" padding:3px; vertical-align:middle; text-transform: uppercase;  width:570px; "><strong><? echo $row[4]; ?></strong></td>


</tr>

</table>
<!--
<table style="width:740px;  font-size:12px; border:#000000 solid 1px; " cellpadding="0" cellspacing="0">
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
-->
<div style="width:760px; background-color:#002060; color:#fff;  padding:2px; text-align:center; ">
&nbsp;
</div>
<div style="width:750px; padding:3px; font-size:13px; ">
<b>INVENTARIO:</b>
</div>
<div style="width:743px; font-size:12px; padding: 2px;  ">
<?

		
        $querym = "SELECT count(id) from muebles_s where cve_cotizacion='".$row[9]."'";
        $resultm = $link->query($querym);
    	$rowm=mysqli_fetch_row($resultm);
		if($rowm[0]>=1){

			$querymm = "SELECT * from muebles_s where cve_cotizacion='".$row[9]."'";
			$r=0;
			$resultmm = $link->query($querymm);
			while($rowmm=mysqli_fetch_row($resultmm)){
				$arraylist[$r]=$rowmm[8].' '.$rowmm[3];
				//echo $rowmm[8].' '.$rowmm[3].'<br>';
				$r++;
			}

		}else{

$list=$row[7];
//echo str_replace('<br />',',',$list); 
$arraylist = explode ('<br />',$list);
//var_dump($arraylist);
		}
?>

<table style="width:390px;  font-size:11px;  "  border="0" cellspacing="0" >
<tr >
<td style="padding:0px; vertical-align:middle; width:233px;"><?php echo $arraylist[0]; ?></td>
<td style="padding:0px; vertical-align:middle; width:233px;"><?php echo $arraylist[15]; ?></td>
<td style="padding:0px; vertical-align:middle; width:233px;"><?php echo $arraylist[30]; ?></td>
</tr>
<tr >
<td style="padding:0px; vertical-align:middle; width:233px;"><?php echo $arraylist[1]; ?></td>
<td style="padding:0px; vertical-align:middle; width:233px;"><?php echo $arraylist[16]; ?></td>
<td style="padding:0px; vertical-align:middle; width:233px;"><?php echo $arraylist[31]; ?></td>
</tr>
<tr >
<td style="padding:0px; vertical-align:middle; width:233px;"><?php echo $arraylist[2]; ?></td>
<td style="padding:0px; vertical-align:middle; width:233px;"><?php echo $arraylist[17]; ?></td>
<td style="padding:0px; vertical-align:middle; width:233px;"><?php echo $arraylist[32]; ?></td>
</tr>
<tr >
<td style="padding:0px; vertical-align:middle; width:233px;"><?php echo $arraylist[3]; ?></td>
<td style="padding:0px; vertical-align:middle; width:233px;"><?php echo $arraylist[18]; ?></td>
<td style="padding:0px; vertical-align:middle; width:233px;"><?php echo $arraylist[33]; ?></td>
</tr>
<tr >
<td style="padding:0px; vertical-align:middle; width:233px;"><?php echo $arraylist[4]; ?></td>
<td style="padding:0px; vertical-align:middle; width:233px;"><?php echo $arraylist[19]; ?></td>
<td style="padding:0px; vertical-align:middle; width:233px; "><?php echo $arraylist[34]; ?></td>
</tr>
<tr >
<td style="padding:0px; vertical-align:middle; width:233px; "><?php echo $arraylist[5]; ?></td>
<td style="padding:0px; vertical-align:middle; width:233px; "><?php echo $arraylist[20]; ?></td>
<td style="padding:0px; vertical-align:middle; width:233px;"><?php echo $arraylist[35]; ?></td>
</tr>
<tr >
<td style="padding:0px; vertical-align:middle; width:233px; "><?php echo $arraylist[6]; ?></td>
<td style="padding:0px; vertical-align:middle; width:233px; "><?php echo $arraylist[21]; ?></td>
<td style="padding:0px; vertical-align:middle; width:233px;"><?php echo $arraylist[36]; ?></td>
</tr>
<tr >
<td style="padding:0px; vertical-align:middle; width:233px; "><?php echo $arraylist[7]; ?></td>
<td style="padding:0px; vertical-align:middle; width:233px; "><?php echo $arraylist[22]; ?></td>
<td style="padding:0px; vertical-align:middle; width:233px;"><?php echo $arraylist[37]; ?></td>
</tr>
<tr >
<td style="padding:0px; vertical-align:middle; width:233px; "><?php echo $arraylist[8]; ?></td>
<td style="padding:0px; vertical-align:middle; width:233px; "><?php echo $arraylist[23]; ?></td>
<td style="padding:0px; vertical-align:middle; width:233px;"><?php echo $arraylist[38]; ?></td>
</tr>
<tr >
<td style="padding:0px; vertical-align:middle; width:233px; "><?php echo $arraylist[9]; ?></td>
<td style="padding:0px; vertical-align:middle; width:233px; "><?php echo $arraylist[24]; ?></td>
<td style="padding:0px; vertical-align:middle; width:233px;"><?php echo $arraylist[39]; ?></td>
</tr>

<tr >
<td style="padding:0px; vertical-align:middle; width:233px; "><?php echo $arraylist[10]; ?></td>
<td style="padding:0px; vertical-align:middle; width:233px; "><?php echo $arraylist[25]; ?></td>
<td style="padding:0px; vertical-align:middle; width:233px;"><?php echo $arraylist[40]; ?></td>
</tr>
<tr >
<td style="padding:0px; vertical-align:middle; width:233px; "><?php echo $arraylist[11]; ?></td>
<td style="padding:0px; vertical-align:middle; width:233px; "><?php echo $arraylist[26]; ?></td>
<td style="padding:0px; vertical-align:middle; width:233px;"><?php echo $arraylist[41]; ?></td>
</tr>
<tr >
<td style="padding:0px; vertical-align:middle; width:233px; "><?php echo $arraylist[12]; ?></td>
<td style="padding:0px; vertical-align:middle; width:233px; "><?php echo $arraylist[27]; ?></td>
<td style="padding:0px; vertical-align:middle; width:233px;"><?php echo $arraylist[42]; ?></td>
</tr>
<tr >
<td style="padding:0px; vertical-align:middle; width:233px; "><?php echo $arraylist[13]; ?></td>
<td style="padding:0px; vertical-align:middle; width:233px; "><?php echo $arraylist[28]; ?></td>
<td style="padding:0px; vertical-align:middle; width:233px;"><?php echo $arraylist[43]; ?></td>
</tr>
<tr >
<td style="padding:0px; vertical-align:middle; width:233px; "><?php echo $arraylist[14]; ?></td>
<td style="padding:0px; vertical-align:middle; width:233px; "><?php echo $arraylist[29]; ?></td>
<td style="padding:0px; vertical-align:middle; width:233px;"><?php echo $arraylist[44]; ?></td>
</tr>

</table>


</div>
<div style="width:760px; background-color:#002060; color:#fff;  padding:2px; text-align:center; ">
&nbsp;
</div>
<br>
<div style="width:750px; padding:2px; font-size:12px; ">
<b>OBSERVACIONES:</b>
</div>
<div style="width:740px; padding:2px; font-size:11px; text-transform: uppercase; ">
<?php echo utf8_decode($row[98]); ?>&nbsp;
</div>
<br>
<div style="width:760px; background-color:#002060; color:#fff;  padding:2px; text-align:center; ">
&nbsp;
</div>
<br>
<div style="width:750px; padding:2px; font-size:12px; text-align:center; text-transform: uppercase; ">
LA PRESENTE ORDEN DE SERVICIO FORMA PARTE INTEGRA DEL CONTRATO DE ADHESIÓN N° <?php echo $row[0]; ?>, SOBRE SERVICIO DE MUDANZA <? echo $row[4]; ?>
<br><br>
Acepto que he leído y comprendido Términos y Condiciones de estos documentos, así que  al utilizar el presente servicio, dejo constancia que los acepto de manera libre y consciente; autorizando a la Unión Mudanzas a realizarlo. Habiendo de mi parte revisado satisfactoriamente la información, la cual considero adecuada y suficiente.
<br><br>
<?php if($_GET['emp']=='cruz'){ ?>
	<b>Mudanzas La Cruz</b>
<?php }else{ ?>
	<b>https://launionmudanzas.com/#terminos</b>
<?php } ?>

</div>

<div style="width:760px;  color:#fff;  padding:2px; text-align:center; ">
&nbsp;
</div>
<div style="width:743px; font-size:12px; padding: 3px; font-size: 9px; text-align:center;  ">
<table style="width:740px;  font-size:12px;  "  border="0" cellspacing="0" >
<tr >
<td style="padding:2px; vertical-align:middle; width:370px; text-align:center"><b>FIRMA RESPONSABLE</b><br><br><br><br></td>
<td style="padding:2px; vertical-align:middle; width:370px; text-align:center"><b>FIRMA DEL CLIENTE</b><br><br><br><br></td>
</tr>
</table>
ESTE ANEXO FORMA PARTE INTEGRA DEL CONTRATO
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