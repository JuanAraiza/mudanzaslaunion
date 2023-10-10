<?php ob_start();
date_default_timezone_set('America/Mexico_City');



function mes($m){
	switch ($m) {
		case '01':
			return 'Enero';
		break;
		case '02':
			return 'Febrero';
		break;
		case '03':
			return 'Marzo';
		break;
		case '04':
			return 'Abril';
		break;
		case '05':
			return 'Mayo';
		break;
		case '06':
			return 'Junio';
		break;
		case '07':
			return 'Julio';
		break;
		case '08':
			return 'Agosto';
		break;
		case '09':
			return 'Septiembre';
		break;
		case '10':
			return 'Octubre';
		break;
		case '11':
			return 'Noviembre';
		break;
		case '12':
			return 'Diciembre';
		break;
	}
}
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
	setlocale(LC_TIME, 'es_ES.UTF-8');
?>

<table style="width:740px; ">
<tr>
<td>
<?php if($row[150]=='cruz'){ ?>
	<img src="images/logocruzsolo.png" style="width:120px;" />
	<?php }else{ ?>
		<img src="images/logounion2.jpg" style="width:100px;" />
	<?php } ?>
		
</td>
<td style="text-align:center; font-size:12px; padding: 10px;">
<?php if($row[150]=='cruz'){ ?>
<strong style="font-size:19px;">MUDANZAS CRUZ</strong><br>
<strong>ELVIA CÁRDENAS CRUZ</strong><br>
RFC: CACE7502124V7  C.U.R.P.: CACE750212MZRRL08<br>
CALDERA MANZANA 2 LOTE 9 SIN NUMERO COL. EMILIANO ZAPATA C.P. 56490<br>
LA PAZ ESTADO DE MEXICO TEL: 5558560770 CEL: 5546063476<br>
email: mudanzascruzz@gmail.com<br>
<?php }else{ ?>
	<strong style="font-size:19px;">LA UNION MUDANZAS</strong><br>
<strong>AZUCENA MARIANA PEÑA CUETO</strong><br>
RFC: PECA790720MU3  C.U.R.P.: PECA790720MPLXTZ08<br>
Libramiento a Queretaro No. 24 B, Col. La Lejona, SAN MIGUEL ALLENDE GTO. CP 37765<br>
LA PAZ ESTADO DE MEXICO TEL: 4151527734 CEL: 4421270514<br>
email: clientes@launionmudanzas.com<br>
<?php } ?>
<strong>PERSONA FISICA CON ACTIVIDAD EMPRESARIAL REGIMEN INTERMEDIO</strong>
</td>
<td style="padding-right:10px; ">
<table border="1" cellspacing="0" cellpadding="0">
<tr>
	<td style="padding:10px; text-align: center; font-size: 18px; "><strong>FACTURA<br>CARTA-PORTE</strong></td>
</tr>
<tr>
	<td style="padding:10px; text-align: center; font-size: 18px; "><strong>Nº <?php echo $row[0]; ?></strong></td>
</tr>
</table>
</td>
</tr>
</table>
&nbsp;<br>
<table style="width:740px; " border="1" cellspacing="0" cellpadding="0">
<tr>
<td style="width:753px; ">LUGAR Y FECHA DE EXPEDICION. <b>Edo. Méx.,</b> <?php echo date("d").' de '.mes(date("m")).' de '.date("Y"); ?>
</td>
</tr>
</table>

&nbsp;<br>

<table style="width:740px; font-size: 11px; " border="1" cellspacing="0" cellpadding="0">
<tr>
<?php
$query2 = "SELECT * from servicio_cruz where clave_s='".$_GET['c']."'";
	$result2 = $link->query($query2);
	$row2=mysqli_fetch_row($result2);
?>
<td style="width:373px; ">
		ORIGE: <?php echo $row[2]; ?><br><br>
		REMITENTE:  <?php echo $row[27]; ?><br><br>
		REG. FED. DE CONT.::  <?php echo $row2[19]; ?><br><br>
		DOMICILIO: <?php echo $row[24]; ?><br><br>
</td>
<td style="width:373px; ">
DESTINO: <?PHP echo $row[3]; ?><br><br>
DESTINATARIO: <?php echo $row[32]; ?><br><br>
REG. FED. DE CON.::  <?php echo $row2[20]; ?><br><br>
DOMICILIO: <?php echo $row[29]; ?><br><br>
</td>
</tr>
</table>

<table style="width:740px; font-size: 11px; " border="1" cellspacing="0" cellpadding="0">
<tr>
<td style="width:209px; padding:10px; ">
		VALOR UNITARIO COUTA CONVENIDA POR TONELADA O CARGA FRACCIONADA
</td>
<td style="width:210px; padding:10px; vertical-align: top; ">
		VALOR DECLARADO: <?php echo $row2[2]; ?>
</td>
<td style="width:210px; padding:10px; vertical-align: top; ">
CONDICIONES DE PAGO: <?php echo $row2[3]; ?>
</td>
</tr>
</table>

&nbsp;<br>
<table style="width:740px; font-size: 9px; " border="1" cellspacing="0" cellpadding="0">
<tr>
<td style="width:80px;  vertical-align: bottom; text-align:center; ">
		BULTOS<br>&nbsp;<br>
		<table style="width:80px; font-size: 9px; " border="1" cellspacing="0" cellpadding="0">
		<tr>
			<td style="width:20px; padding:10px; vertical-align: top; text-align:center; ">NUMERO</td>
			<td style="width:20px; padding:10px; vertical-align: top; text-align:center; ">EMBALAJE</td>
</tr>
</table>
</td>
<td style="width:170px; padding:10px; vertical-align: middle; text-align:center; ">
		QUE EL REMITENTE DICE CONTIENE
</td>
<td style="width:40px; padding:10px; vertical-align: middle; text-align:center; ">
PESO
</td>
<td style="width:80px; vertical-align: bottom; text-align:center; ">
VOLUMEN<br>&nbsp;<br>
<table style="width:80px; font-size: 9px; " border="1" cellspacing="0" cellpadding="0">
<tr>
	<td style="width:20px; padding:10px; vertical-align: top; text-align:center; ">MTS</td>
	<td style="width:46px; padding:3px; vertical-align: top; text-align:left; ">PESO ESTIMADO</td>
</tr>
</table>
</td>
<td style="width:85px; padding:7px; vertical-align: middle; text-align:center; ">
CONCEPTO
</td>
<td style="width:58px; padding:5px; vertical-align: middle; text-align:center; ">
IMPORTE
</td>
</tr>


<!-- Inicio contenido de la Tabla -->
<?php
$queryinv = "SELECT * from inventario_cruz where clave_s='".$_GET['c']."'";
	$resultinv = $link->query($queryinv);
	$ci=0;
	while($rowinv=mysqli_fetch_row($resultinv)){
$d1[$ci]=$rowinv[1];
$d2[$ci]=$rowinv[2];
$d3[$ci]=$rowinv[3];
$d4[$ci]=$rowinv[4];
$d5[$ci]=$rowinv[5];
$d6[$ci]=$rowinv[6];
$ci++;

}
?>

<tr>
<td style="vertical-align: top; text-align:center; ">
		<table style="width:80px; font-size: 9px; " cellspacing="0" cellpadding="0">
		<tr>
			<td style="width:44px; padding:5px; padding-top: 8px; vertical-align: top; text-align:center; border-right: 1px; font-size: 10px; height:100px; "><?php for($i=0; $i<=$ci; $i++){ echo $d1[$i].'<br>'; } ?></td>
			<td style="width:44px; padding:5px; padding-top: 8px; vertical-align: top; text-align:center; border-left: 1px; font-size: 10px; "><?php for($i=0; $i<=$ci; $i++){ echo $d2[$i].'<br>'; } ?></td>
</tr>
</table>
</td>
<td style="width:170px; padding:5px; padding-top: 8px;  vertical-align: top; text-align:left; font-size: 10px; ">
		<?php for($i=0; $i<=$ci; $i++){ echo $d3[$i].'<br>'; } ?>
</td>
<td style="padding:10px; vertical-align: top; text-align:center; font-size: 10px; ">
<?php for($i=0; $i<=$ci; $i++){ echo $d4[$i].'<br>'; } ?>
</td>
<td style="vertical-align: top; text-align:center; ">
<table style="width:80px; font-size: 9px; " cellspacing="0" cellpadding="0">
<tr>
	<td style="width:42px; padding:5px; padding-top: 8px; vertical-align: top; text-align:center; border-right: 1px; font-size: 10px; height:100px; "><?php for($i=0; $i<=$ci; $i++){ echo $d5[$i].' m<br>'; } ?></td>
	<td style="width:42px; padding:5px; padding-top: 8px; vertical-align: top; text-align:left; border-left: 1px; font-size: 10px; "><?php for($i=0; $i<=$ci; $i++){ echo $d6[$i].'<br>'; } ?></td>
</tr>
</table>
</td>
<td style="width:78px; padding:5px; vertical-align: top; text-align:left; font-size: 11px; ">
FLETE<br>
CARGO POR<br>SEGURO<br>
MANIOBRAS<br>
AUTOPISTAS<br>
LIBRAMIENTOS<br>
TRSBORDADORES<br>
OTROS
</td>
<td style="width:58px; padding:5px; vertical-align: top; text-align:right; font-size: 11px; ">
$ <?php echo number_format($row2[8],2); ?><br><br>
$ <?php echo number_format($row2[9],2); ?><br>
$ <?php echo number_format($row2[10],2); ?><br>
$ <?php echo number_format($row2[11],2); ?><br>
$ <?php echo number_format($row2[12],2); ?><br>
$ <?php echo number_format($row2[13],2); ?><br>
$ <?php echo number_format($row2[14],2); ?>
</td>
</tr>

<!-- Fin contenido de la Tabla -->

</table>



<table style="width:740px; font-size: 9px;" border="1"  cellspacing="0" cellpadding="0">
<tr>
<td style="width:558px;  vertical-align: TOP; text-align:center; ">
<!-- //////////// Otras datos ////////// -->

<table style="width:550px; font-size: 9px; border: 1px; " cellspacing="0" cellpadding="0">
<tr>
<td style="width:245px; text-align:left; border: 1px; padding: 5px 2px 5px 2px ;">CONDUCTOR: <?php echo $row2[4]; ?>
</td>
<td style="width:130px; text-align:left; border: 1px; padding: 5px 2px 5px 2px ;">PLACAS: <?php echo $row2[5]; ?>
</td>
<td style="width:150px; text-align:left; border: 1px; padding: 5px 2px 5px 2px ;">Nº ECONOMICO: <?php echo $row2[6]; ?>
</td>
</tr>
</table>

<!--    -->

<table style="width:550px; font-size: 9px; border: 1px; " cellspacing="0" cellpadding="0">
<tr>
<td style="width:345px; text-align:left; border: 1px; padding: 5px 2px 5px 2px ;">OBSERVACIONES: <?php echo $row[39]; ?>
</td>
<td style="width:192px; text-align:left; border: 1px; padding: 5px 2px 5px 2px ;">METODO DE PAGO: <?php echo $row[37]; ?>
</td>
</tr>
</table>

<!--   -->

<table style="width:550px; font-size: 9px; border: 1px; " cellspacing="0" cellpadding="0">
<tr>
<td style="width:140px; text-align:center; font-size: 13px; border: 1px; padding: 5px 2px 5px 2px ; line-height:20px;"><strong>ESTE DOCUMENTO<br>
	NO ES<br>
	COMPROBANTE<br>
	FISCAL</strong></td>
<td style="width:390px; text-align:left; vertical-align: bottom; border: 1px; padding: 0px;">


<table style="width:390px; font-size: 9px;" cellspacing="0" cellpadding="0">
<tr>
<td style="width:387px; text-align:left; font-size: 11px; padding: 5px 5px 15px 5px ; line-height:20px;">
TOTAL CON LETRA: <?php 
$formatterES = new NumberFormatter("es-MX", NumberFormatter::SPELLOUT);
$n = round($row2[18],2);
$izquierda = intval(floor($n));
$derecha = intval(($n - floor($n)) * 100);
$dd=strtoupper($formatterES->format($izquierda));
echo '<strong>'.$dd .' CON '.$derecha.' CENTAVOS % MN</strong>';
?>
</td>
</tr>
<tr>
	<td>

<table style="width:390px; font-size: 9px;" cellspacing="0" cellpadding="0">
<tr>
<td style="width:178px; text-align:center; border:1; font-size: 11px; padding: 5px 5px 15px 5px ; line-height:20px;">
DOCUMENTO
</td>
<td style="width:179px; text-align:center; border:1; font-size: 11px; padding: 5px 5px 15px 5px ; line-height:20px;">
	RECIBÍ DE CONFORMIDAD
</td>
</tr>
</table>


	</td>
</tr>
</table>


</td>
</tr>
</table>

<!-- //////////// Fin Otras datos ////////// -->
</td>
<td style="width:85px; padding:7px; vertical-align: middle; text-align:center; ">
IMPORTE<br><br>
+ 16% IVA<br><br>
SUBTOTAL<br><br>
-4% RETENCIÓN IVA<br><br>
TOTAL
</td>
<td style="width:58px; padding:5px; vertical-align: middle; text-align:right; ">
&nbsp;<br>
<?php
$masiva=$row2[15]+$row2[16];

?>
$ <?php echo number_format($row2[15],2); ?><br><br>
$ <?php echo number_format($masiva,2); ?><br><br>
$ <?php echo number_format($row2[17],2); ?><br><br>
<strong>$ <?php echo number_format($row2[18],2); ?></strong>
</td>
</tr>
</table>


&nbsp;<br>
&nbsp;

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