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
$link=mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
	mysql_select_db($bbdd,$link) or die("resultado=".urlencode(mysql_error()));
	$result=mysql_query("SELECT * from servicio where clave='".$_GET['c']."'", $link);
	$row=mysql_fetch_row($result);
?>
<div style="width:730px; background-color:#002060; padding:10px;  font-size: 12px; ">
<div style="background-color:#fff;">
<br>

<table style="width:730px; ">
<tr>
<td >
<div style="width:319px; background-color:#123d68; color:#e0c639; font-size:20px;  padding:2px; text-align:center; ">
<strong>TABLA DE PAGOS</strong>   <img src="imgpdfs/pagos1.jpg" style="width:55px;" />
</div>


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
<td style="width:135px; border: 1px solid #fe0101; font-size:12px; text-align:center;"><strong>$ <? echo number_format(round($row[6], 2),2); ?></strong></td>
</tr>
<tr>
<td style="width:170px; border: 1px solid #fe0101; font-size:12px; text-align:center;"><strong>ANTICIPO <?php if($row[53]>=1){ echo $row[53];  }else{ echo '40'; } ?>%</strong></td>
<td style="width:135px; border: 1px solid #fe0101; font-size:12px; text-align:center;"><strong>$ <?php if($row[53]>=1){
  $p=$row[53]/100;
echo number_format(round(($cost2*$p), 2),2);
}else{
  echo number_format(round(($cost2*.40), 2),2);
}?></strong></td>
</tr>
<tr>
<td style="width:170px; border: 1px solid #fe0101; font-size:12px; text-align:center;"><strong>A LA CARGA <?php if($row[54]>=1){ echo $row[54];  }else{ echo '50'; } ?>%</strong></td>
<td style="width:135px; border: 1px solid #fe0101; font-size:12px; text-align:center;"><strong> $ <? 
if($row[54]>=1){
  $p=$row[54]/100;
echo number_format(round(($cost2*$p), 2),2);
}else{
  echo number_format(round(($cost2*.50), 2),2);
}
                   ?></strong></td>
</tr>
<tr>
<td style="width:170px; border: 1px solid #fe0101; font-size:12px; text-align:center;"><strong>AL LLEGAR A DESTINO <?php if($row[55]>=1){ echo $row[55];  }else{ echo '10'; } ?>% </strong></td>
<td style="width:135px; border: 1px solid #fe0101; font-size:12px; text-align:center;"><strong> $ <? 
if($row[55]>=1){
  $p=$row[55]/100;
echo number_format(round(($cost2*$p), 2),2);
}else{
  echo number_format(round(($cost2*.10), 2),2);
}
                  ?></strong></td>
</tr>

</table>
<div style="width:317px; background-color:#d9d9d9; font-size:11px;  border: 1px solid #fe0101; padding:2px; text-align:center; ">
EL PRECIO ESTA BASADO EN LA COTIZACION PREVIA QUE SE LE HA ENVIADO, SI HUBIERAN OTROS FACTORES QUE SE DIERAN DE IMPREVISTO, EL PRECIO PODRIA SUFRIR MODIFICACIONES, SOLICITE INFORMACION.
</div>


</td>
<td >
<img src="imgpdfs/pagos2.jpg" style="width:428px;" />
</td></tr>
</table>
 <!-- ////////////////////////////////////  -->

 <table style="width:730px; ">
<tr>
<td >
<img src="imgpdfs/pagos3.jpg" style="width:320px;" />
</td>
<td >
<img src="imgpdfs/pagos4.jpg" style="width:428px;" />
<table style="width:428px; border: 1px solid #fe0101;" cellspacing="0" cellpadding="0" >
<tr>
<td style="width:250px;">
<table style="width:250px; border: 1px solid #fe0101;" cellspacing="0" cellpadding="0" >
<tr>
<td style="width:125px; border: 1px solid #fe0101; font-size:12px; text-align:center;"><strong>VALOR DECLARADO</strong></td>
<td style="width:125px; border: 1px solid #fe0101; font-size:12px; text-align:center;"><strong>$ <? echo number_format(round($row[19], 2),2); ?></strong></td>
</tr>
<tr>
<td style="width:125px; border: 1px solid #fe0101; font-size:12px; text-align:center;"><strong>COSTO DEL SEGURO</strong></td>
<td style="width:125px; border: 1px solid #fe0101; font-size:12px; text-align:center;"><strong>$ &nbsp;<?php if($row[100]>=1){ echo number_format($row[100], 2);

}else{ echo '0.00'; } ?></strong></td>
</tr>
<tr>
<td style="width:125px; border: 1px solid #fe0101; font-size:12px; text-align:center;"><strong>TOTAL DE LA MUDANZA CON SEGURO</strong></td>
<td style="width:125px; border: 1px solid #fe0101; font-size:12px; text-align:center;"><strong>$ <? echo number_format(round($row[42], 2),2); ?></strong></td>
</tr>
</table>

</td>
<td style="width:163px; background-color:#d9d9d9; color:#002060; border: 1px solid #fe0101;"><div style="width:163px;  font-size:11px;   text-align:center; ">
NO CUBRE : MANIOBRAS DE CARGA NI DESCARGA   
</div>
<div style="width:163px;  font-size:11px; color:#ff0000; text-align:center; ">
SOBRE MERCANCIA EMPACADA POR EL CLIENTE PREVIAMENTE NO NOS HACEMOS RESPONSABLES
</div>
</td>
</tr>
</table>


</td></tr>
</table>




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