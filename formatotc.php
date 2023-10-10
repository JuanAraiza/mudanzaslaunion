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

<div style="width:750px; padding: 5px;  ">
<table style="width:750px; ">
<td style="width:220px;">
<div style="  padding: 5px;  float:left; text-decoration: underline;font-size: 14px; ">
<b>FOLIO DEL CONTRATO:</b> <? echo strtoupper($row[0]); ?><br>
<b>FECHA:</b> <? echo substr($row[22],8,2).'/'.substr($row[22],5,2).'/'.substr($row[22],0,4); ?><br>
</div>
</td>
<td style="width: 500px;">
<div style="  padding: 5px; text-align:center; color:#002060;  font-size: 14px; float: left; text-align: right; text-decoration: underline; ">
<b>AUTORIZACIÓN DE CARGO A TARJETA DE CREDITO O DEBITO<br>
San miguel de Allende a <?php 
date_default_timezone_set('America/Mexico_City');
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 echo date("d").' de '.$meses[date('n')-1].' del '.date("Y");  ?></b>
</div>
</td>
</table>
</div>
<?php 
$formatterES = new NumberFormatter("es-MX", NumberFormatter::SPELLOUT);
$n = $row[42];
$izquierda = intval(floor($n));
$derecha = intval(($n - floor($n)) * 100);
$dd=ucfirst($formatterES->format($izquierda));

?>

<div style="width:710px; padding: 15px; text-align:justify;  font-size: 14px; line-height: 2.5;  "><br>
Autorizo a La Unión Mudanzas y/o María Eugenia Cueto Rosales, el cargo de mi servicio de origen <strong><? echo $row[2]; ?></strong> y destino <strong><? echo $row[3]; ?></strong> a mi tarjeta de crédito o débito.<br>
La cantidad total es de: <strong>$ <?php echo number_format(round($row[42], 2),2); ?></strong> <? echo $row[123]; ?> (<?php echo $dd ?> <? echo $row[123]; ?>)<br>
Entiendo que este monto cubre las condiciones del servicio estipulado en la orden de servicio y la cotización previa. <br>
Tarjeta#______________________________ Banco:______________________________ <br>
Titular:____________________________________________________________<br>
Fecha de expiración:__________________ Código de seguridad: ______
<br>
<table class="morpion" cellspacing="5px" style="width:710px;  font-size: 12px;  ">
        <tr>
		<td class="j3">REQUIERE FACTURA: </td>
            <td class="j1">SI</td>
            <td class="j1">NO</td>
			<td class="j4"> </td>
			<td class="j3">PAGOS: </td>
			<td class="j2">EN PARCIALIDADES</td>
			<td class="j2">EN UNA SOLA EXHIBICIÓN</td>
        </tr>
        
    </table>
<br>
<?php $cost2=$row[42]; ?>
<b>Parcialidades:</b>
<br>
<?php if($row[53]>=1){ echo $row[53];  }else{ echo '40'; } ?> %: $ <?php if($row[53]>=1){
  $p=$row[53]/100;
echo number_format(round(($cost2*$p), 2),2);
}else{
  echo number_format(round(($cost2*.40), 2),2);
}?> en fecha: _______________________________________<br>
<?php if($row[54]>=1){ echo $row[54];  }else{ echo '50'; } ?> %: $ <? 
if($row[54]>=1){
  $p=$row[54]/100;
echo number_format(round(($cost2*$p), 2),2);
}else{
  echo number_format(round(($cost2*.50), 2),2);
}
                   ?> en fecha: _______________________________________<br>
<?php if($row[55]>=1){ echo $row[55];  }else{ echo '10'; } ?> %: $ <? 
if($row[55]>=1){
  $p=$row[55]/100;
echo number_format(round(($cost2*$p), 2),2);
}else{
  echo number_format(round(($cost2*.10), 2),2);
}
                  ?> en fecha: _______________________________________<br>
Teléfono: _______________________Correo: _________________________________<br>
Firma: ______________________________________________________________________<br>
(favor de anexar copia de identificación con firma legible)											
<br>
</div>



<div style="width:730px; padding: 5px; color:#002060; text-align:center;   font-size: 16px; ">
<br>
<?php if($_GET['emp']=='cruz'){ ?>
    <b>Mudanzas La Cruz</b>
<?php }else{ ?>
    <b>La Union  Mudanzas</b>
<?php } ?>
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
<div style="  padding: 5px; color: #FFFFFF; float: left; text-align: right; "><?php if($_GET['emp']=='cruz'){ ?>
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
    $html2pdf->Output('FromatoTC'.date('YmdHis').'.pdf');
?>