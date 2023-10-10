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
<style type="text/css">

table.morpion
{
  /*  border:        dashed 1px #444444;*/
}

table.morpion td
{
    font-size:    14px;
    font-weight:  bold;
    border:       solid 1px #000000;
    padding:      1px;
    text-align:   center;
    /*;*/
}

table.morpion td.j1 {width: 25px;  color: #000; }
table.morpion td.j2 { color: #000; }

table.morpion td.j3 { border:none; color: #000; }
table.morpion td.j4 { border:none; color: #000;width: 25px;  }
</style>
<page backcolor="#002060" >
<?
 include('config.php');

	$query = "SELECT * from servicio where clave='".$_GET['c']."'";
  $result = $link->query($query);
	$row=mysqli_fetch_row($result);
?>
<div style="width:720px; background-color:#002060; padding:10px;  font-size: 12px; ">
<div style="background-color:#fff;">
<br>

<table style="width:720px; ">
<tr>
<td >
<div style="width:319px; background-color:#123d68; color:#e0c639; font-size:20px;  padding:2px; text-align:center; ">
<strong>TABLA DE PAGOS</strong>   <img src="imgpdfs/pagos1.jpg" style="width:55px;" />
</div>
<?php $cost2=$row[42]; ?>
<?php $querytp = "SELECT * from tabla_pagos where cve_servicio='".$_GET['c']."'";
$resulttp = $link->query($querytp);
$rowtp=mysqli_fetch_row($resulttp); ?>
<table style="width:320px; border: 1px solid #fe0101;" cellspacing="0" cellpadding="0" >
<tr>
<td style="width:170px; border: 1px solid #fe0101; font-size:12px; text-align:center;"><strong>NOMBRE DEL CLIENTE</strong></td>
<td style="width:135px; border: 1px solid #fe0101; font-size:12px; text-align:center;"><strong><? echo $row[1]; ?></strong></td>
</tr>
<tr>
<td style="width:170px; border: 1px solid #fe0101; background-color:#002060; color:#fff; font-size:12px; text-align:center;"><strong><? echo $row[2]; ?></strong></td>
<td style="width:135px; border: 1px solid #fe0101; background-color:#002060; color:#fff; font-size:12px; text-align:center;"><strong><? echo $row[3]; ?></strong></td>
</tr>
<tr>
<td style="width:170px; border: 1px solid #fe0101; font-size:12px; text-align:center;"><strong>COSTO MUDANZA</strong></td>
<td style="width:135px; border: 1px solid #fe0101; font-size:12px; text-align:center;"><strong>$ <? echo number_format(round($row[42], 2),2); ?></strong></td>
</tr>
<tr>
<td style="width:170px; border: 1px solid #fe0101; font-size:12px; text-align:center;"><strong>ANTICIPO <?php echo $rowtp[2]; ?>%</strong></td>
<td style="width:135px; border: 1px solid #fe0101; font-size:12px; text-align:center;"><strong>$ <?php  echo number_format($rowtp[5],2); ?></strong></td>
</tr>
<tr>
<td style="width:170px; border: 1px solid #fe0101; font-size:12px; text-align:center;"><strong>A LA CARGA <?php echo $rowtp[3]; ?>%</strong></td>
<td style="width:135px; border: 1px solid #fe0101; font-size:12px; text-align:center;"><strong> $ <?php echo number_format($rowtp[6],2); ?></strong></td>
</tr>
<tr>
<td style="width:170px; border: 1px solid #fe0101; font-size:12px; text-align:center;"><strong>AL LLEGAR A DESTINO <?php echo $rowtp[4];  ?>% </strong></td>
<td style="width:135px; border: 1px solid #fe0101; font-size:12px; text-align:center;"><strong> $ <?php  echo number_format($rowtp[7],2); ?></strong></td>
</tr>

</table>
<div style="width:317px; background-color:#d9d9d9; font-size:11px;  border: 1px solid #fe0101; padding:2px; text-align:center; ">
EL PRECIO ESTA BASADO EN LA COTIZACION PREVIA QUE SE LE HA ENVIADO, SI HUBIERAN OTROS FACTORES QUE SE DIERAN DE IMPREVISTO, EL PRECIO PODRIA SUFRIR MODIFICACIONES, SOLICITE INFORMACION.
</div>


</td>
<td >
<img src="imgpdfs/pagos2.jpg" style="width:408px;" />
</td></tr>
</table>
 <!-- ////////////////////////////////////  -->

 <table style="width:730px; ">
<tr>
<td >
<?php if($_GET['emp']=='cruz'){ ?>
	<img src="imgpdfs/pagos3emp.jpg" style="width:320px;" />
<?php }else{ ?>
	<img src="imgpdfs/pagos3.jpg" style="width:320px;" />
<?php } ?>

</td>
<td >
<img src="imgpdfs/pagos4.jpg" style="width:408px;" />
<table style="width:428px; border: 1px solid #fe0101;" cellspacing="0" cellpadding="0" >
<tr>
<td style="width:225px;">



<table style="width:220px; border: 1px solid #fe0101;" cellspacing="0" cellpadding="0" >
<tr>
<td style="width:155px; border: 1px solid #fe0101; font-size:10px; text-align:center;"><strong>VALOR DECLARADO</strong></td>
<td style="width:60px; border: 1px solid #fe0101; font-size:11px; text-align:center;"><strong>$ <? echo number_format(round($row[19], 2),2); ?></strong></td>
</tr>
<tr>
<td style="width:155px; border: 1px solid #fe0101; font-size:10px; text-align:center;"><strong>COSTO DEL SEGURO</strong></td>
<td style="width:60px; border: 1px solid #fe0101; font-size:11px; text-align:center;"><strong>$ &nbsp;<?php if($row[100]>=1){ echo number_format($row[100], 2);
}else{ echo '0.00'; } ?></strong></td>
</tr>
<tr>
<td style="width:155px; border: 1px solid #fe0101; font-size:10px; text-align:center;"><strong>TOTAL DE LA MUDANZA CON SEGURO</strong></td>

<?php 
//echo $row[136].'<br>';
if($row[136]!=2){ ?>


<td style="width:60px; border: 1px solid #fe0101; font-size:11px; text-align:center;"><strong>$ <? echo number_format(round(($row[42]+$row[100]), 2),2); ?></strong></td>
<?php }else{ ?>
  <td style="width:60px; border: 1px solid #fe0101; font-size:11px; text-align:center;"><strong>$ <? echo number_format(round(($row[42]), 2),2); ?></strong></td>
<?php } ?>

</tr>
</table>



</td>
<td style="width:163px; background-color:#d9d9d9; color:#002060; border: 1px solid #fe0101;"><div style="width:163px;  font-size:9px;   text-align:center; ">
NO CUBRE : MANIOBRAS DE CARGA NI DESCARGA   
</div>
<div style="width:163px;  font-size:9px; color:#ff0000; text-align:center; ">
SOBRE MERCANCIA EMPACADA POR EL CLIENTE PREVIAMENTE NO NOS HACEMOS RESPONSABLES
</div>
</td>
</tr>
</table>


</td></tr>
</table>

<div style="width:735px; font-size:12px; background-color:#002060; color:#fff; padding: 3px;  text-align:center; ">
ESTE ANEXO FORMA PARTE INTEGRA DEL CONTRATO

<table style="width:735px;  font-size:12px;  background-color:#002060; color:#fff;  "  border="0" cellspacing="0" >
<tr >
<td style="padding:2px; vertical-align:middle; width:358px; text-align:left"><?php if($_GET['emp']=='cruz'){ ?>
	Tel. 554 606 3476<br>
<?php }else{ ?>
	www.launionmudanzas.com<br>
clientes@launionmudanzas.com<br>
Tel. 4151527734<br>
Whatsapp : 4421270514<br>
#LaUnionMudanzas<br>
<?php } ?></td>
<td style="padding:2px; vertical-align:middle; width:358px; text-align:right"><?php if($_GET['emp']=='cruz'){ ?>
	Cda de la Caldera Mz 2 Lt 9,<br>
	Col. Emiliano Zapata, CP 56490,<br>
	La Paz, Mexico<br>
<?php }else{ ?>
	Libramiento a Queretaro No. 24 B, Col. La Lejona<br>
SAN MIGUEL ALLENDE GTO<br>
CP 37765<br>
#AmoMiTrabajo<br>
<?php } ?></td>
</tr>
</table>
</div>



</div>
</div>
</page>

<?

$content=ob_get_clean();
    require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
    $html2pdf = new HTML2PDF('L','A5', 'en');
   // $html2pdf = new HTML2PDF('L','A5','fr');
	//$html2pdf->Image('tutorial/logo.png',10,12,30,0,'','http://www.fpdf.org');
	//$html2pdf->setDefaultFont('times');
    $html2pdf->WriteHTML($content);
    $html2pdf->Output('FormatoPagos'.date('YmdHis').'.pdf');
?>