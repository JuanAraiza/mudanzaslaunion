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
<page backcolor="#fff" >
<?
 include('config.php');

	$query = "SELECT * from servicio where clave='".$_GET['c']."'";
    $result = $link->query($query);
	$row=mysqli_fetch_row($result);
?>
<div style="width:490px; background-color:#00b050; padding:10px;  font-size: 12px; ">
<div>

<div style="width:490px; background-color:#fff;  font-size:16px;  padding:2px; text-align:center; ">
<?php if($_GET['emp']=='cruz'){ ?>
		<img src="images/logolacruz.png" style="width:420px;" />
<?php }else{ ?>
	<img src="imgpdfs/logo.jpg" style="width:450px;" />
<?php } ?><br><br>
</div>
<div style="width:490px; background-color:#eee; font-size:16px;  padding:2px; text-align:center; ">
<strong>HOJITA VERDE ANTES DE SERVICIO</strong>  
</div>
<div style="width:490px; background-color:#eee;  padding:2px; text-align:center; border: 1px solid #000; ">
<strong>Folio: <? echo $row[0]; ?></strong> | <strong><? echo $row[2]; ?></strong> - <strong><? echo $row[3]; ?></strong>
</div>

<table style="width:490px; " cellspacing="0" cellpadding="0" >
<tr>
<td style="width:240px; background-color:#eee; font-size:12px; text-align:center; border: 1px solid #000;"><strong>PROVEEDOR</strong></td>
<?
//echo "select * FROM proveedores where id=".$row[40];
$queryp = "select * FROM proveedores where id=".$row[40];
$resultp = $link->query($queryp);
$rowp = mysqli_fetch_row($resultp);
$prov = htmlentities($rowp[1]).' '.htmlentities($rowp[2]);
?>
<td style="width:240px; background-color:#fff; color:#000; font-size:12px; text-align:center; border: 1px solid #000;"><strong><? echo $prov; ?></strong></td>
</tr>
</table>
<div style="width:490px; background-color:#2f75b5; color:#fff;  padding:2px; text-align:center; border: 1px solid #000; ">
<strong><strong>CLIENTE</strong>: <strong><? echo $row[1]; ?></strong></strong>  
</div>



<table style="width:490px; " cellspacing="0" cellpadding="0" >
<tr>
<td style="width:240px; background-color:#eee; font-size:11px; text-align:center; border: 1px solid #000;"><strong>TIPO DE SERVICIO</strong></td>
<td style="width:240px; background-color:#fff; color:#000; font-size:11px; text-align:center; border: 1px solid #000;"><strong><? echo $row[4]; ?></strong></td>
</tr>
<tr>
<td style="width:240px; background-color:#eee; font-size:11px; text-align:center; border: 1px solid #000;"><strong>REQUIERE FACTURA</strong></td>
<td style="width:240px; background-color:#fff; color:#000; font-size:11px; text-align:center; border: 1px solid #000;"><strong><? if($row[92]=='--'){ echo 'NO'; }else{ echo $row[92]; } ?></strong></td>
</tr>
<tr>
<td style="width:240px; background-color:#eee; font-size:11px; text-align:center; border: 1px solid #000;"><strong>PEDIR A FACTURA</strong></td>
<td style="width:240px; background-color:#fff; color:#000; font-size:11px; text-align:center; border: 1px solid #000;"><strong><? echo $row[85];  ?></strong></td>
</tr>
<tr>
<td style="width:240px; background-color:#eee; font-size:11px; text-align:center; border: 1px solid #000;"><strong>RECOLECCION</strong></td>
<td style="width:240px; background-color:#fff; color:#000; font-size:11px; text-align:center; border: 1px solid #000;"><strong><? echo substr($row[22],8,2).'/'.substr($row[22],5,2).'/'.substr($row[22],0,4); ?></strong></td>
</tr>
<tr>
<td style="width:240px; background-color:#eee; font-size:11px; text-align:center; border: 1px solid #000;"><strong>HORARIO SOLICITADO</strong></td>
<td style="width:240px; background-color:#fff; color:#000; font-size:11px; text-align:center; border: 1px solid #000;"><strong><? echo $row[23]; ?></strong></td>
</tr>
<tr>
<td style="width:240px; background-color:#eee; font-size:11px; text-align:center; border: 1px solid #000;"><strong>TIEMPO ENTREGA</strong></td>
<td style="width:240px; background-color:#fff; color:#000; font-size:11px; text-align:center; border: 1px solid #000;"><strong><? echo $row[38]; ?></strong></td>
</tr>
<tr>
<td style="width:240px; background-color:#eee; font-size:11px; text-align:center; border: 1px solid #000;"><strong>M3</strong></td>
<td style="width:240px; background-color:#fff; color:#000; font-size:11px; text-align:center; border: 1px solid #000;"><strong><? echo $row[11]; ?></strong></td>
</tr>
</table>
 <!-- ////////////////////////////////////  -->
 <div style="width:490px; background-color:#00b050; color:#fff; padding:2px; text-align:center;  border: 1px solid #000;">

<strong>LISTA DE MUEBLES</strong>  
</div>
<div style="width:490px; background-color:#fff; color:#000; padding:2px;  border: 1px solid #000;">

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

$list=utf8_decode($row[7]);
//echo str_replace('<br />',',',$list); 
$arraylist = explode ('<br />',$list);
//var_dump($arraylist);
}
?>

<table style="width:490px;  font-size:11px;  "  border="0" cellspacing="0" >

<tr><td style="padding:0px; width:240px;"><?php echo $arraylist[0]; ?></td><td style="padding:0px; width:240px;"><?php echo $arraylist[29]; ?></td></tr>
<tr><td style="padding:0px; width:240px;"><?php echo $arraylist[1]; ?></td><td style="padding:0px; width:240px;"><?php echo $arraylist[30]; ?></td></tr>
<tr><td style="padding:0px; width:240px;"><?php echo $arraylist[2]; ?></td><td style="padding:0px; width:240px;"><?php echo $arraylist[31]; ?></td></tr>
<tr><td style="padding:0px; width:240px;"><?php echo $arraylist[3]; ?></td><td style="padding:0px; width:240px;"><?php echo $arraylist[32]; ?></td></tr>
<tr><td style="padding:0px; width:240px;"><?php echo $arraylist[4]; ?></td><td style="padding:0px; width:240px;"><?php echo $arraylist[33]; ?></td></tr>
<tr><td style="padding:0px; width:240px;"><?php echo $arraylist[5]; ?></td><td style="padding:0px; width:240px;"><?php echo $arraylist[34]; ?></td></tr>
<tr><td style="padding:0px; width:240px;"><?php echo $arraylist[6]; ?></td><td style="padding:0px; width:240px;"><?php echo $arraylist[35]; ?></td></tr>
<tr><td style="padding:0px; width:240px;"><?php echo $arraylist[7]; ?></td><td style="padding:0px; width:240px;"><?php echo $arraylist[36]; ?></td></tr>
<tr><td style="padding:0px; width:240px;"><?php echo $arraylist[8]; ?></td><td style="padding:0px; width:240px;"><?php echo $arraylist[37]; ?></td></tr>
<tr><td style="padding:0px; width:240px;"><?php echo $arraylist[9]; ?></td><td style="padding:0px; width:240px;"><?php echo $arraylist[38]; ?></td></tr>
<tr><td style="padding:0px; width:240px;"><?php echo $arraylist[10]; ?></td><td style="padding:0px; width:240px;"><?php echo $arraylist[39]; ?></td></tr>
<tr><td style="padding:0px; width:240px;"><?php echo $arraylist[11]; ?></td><td style="padding:0px; width:240px;"><?php echo $arraylist[40]; ?></td></tr>
<tr><td style="padding:0px; width:240px;"><?php echo $arraylist[12]; ?></td><td style="padding:0px; width:240px;"><?php echo $arraylist[41]; ?></td></tr>
<tr><td style="padding:0px; width:240px;"><?php echo $arraylist[13]; ?></td><td style="padding:0px; width:240px;"><?php echo $arraylist[42]; ?></td></tr>
<tr><td style="padding:0px; width:240px;"><?php echo $arraylist[14]; ?></td><td style="padding:0px; width:240px;"><?php echo $arraylist[43]; ?></td></tr>
<tr><td style="padding:0px; width:240px;"><?php echo $arraylist[15]; ?></td><td style="padding:0px; width:240px;"><?php echo $arraylist[44]; ?></td></tr>
<tr><td style="padding:0px; width:240px;"><?php echo $arraylist[16]; ?></td><td style="padding:0px; width:240px;"><?php echo $arraylist[45]; ?></td></tr>
<tr><td style="padding:0px; width:240px;"><?php echo $arraylist[17]; ?></td><td style="padding:0px; width:240px;"><?php echo $arraylist[46]; ?></td></tr>
<tr><td style="padding:0px; width:240px;"><?php echo $arraylist[18]; ?></td><td style="padding:0px; width:240px;"><?php echo $arraylist[47]; ?></td></tr>
<tr><td style="padding:0px; width:240px;"><?php echo $arraylist[19]; ?></td><td style="padding:0px; width:240px;"><?php echo $arraylist[48]; ?></td></tr>
<tr><td style="padding:0px; width:240px;"><?php echo $arraylist[20]; ?></td><td style="padding:0px; width:240px;"><?php echo $arraylist[49]; ?></td></tr>
<tr><td style="padding:0px; width:240px;"><?php echo $arraylist[21]; ?></td><td style="padding:0px; width:240px;"><?php echo $arraylist[50]; ?></td></tr>
<tr><td style="padding:0px; width:240px;"><?php echo $arraylist[22]; ?></td><td style="padding:0px; width:240px;"><?php echo $arraylist[51]; ?></td></tr>
<tr><td style="padding:0px; width:240px;"><?php echo $arraylist[23]; ?></td><td style="padding:0px; width:240px;"><?php echo $arraylist[51]; ?></td></tr>
<tr><td style="padding:0px; width:240px;"><?php echo $arraylist[24]; ?></td><td style="padding:0px; width:240px;"><?php echo $arraylist[52]; ?></td></tr>
<tr><td style="padding:0px; width:240px;"><?php echo $arraylist[25]; ?></td><td style="padding:0px; width:240px;"><?php echo $arraylist[53]; ?></td></tr>
<tr><td style="padding:0px; width:240px;"><?php echo $arraylist[26]; ?></td><td style="padding:0px; width:240px;"><?php echo $arraylist[54]; ?></td></tr>
<tr><td style="padding:0px; width:240px;"><?php echo $arraylist[27]; ?></td><td style="padding:0px; width:240px;"><?php echo $arraylist[55]; ?></td></tr>
<tr><td style="padding:0px; width:240px;"><?php echo $arraylist[28]; ?></td><td style="padding:0px; width:240px;"><?php echo $arraylist[56]; ?></td></tr>




</table>
</div>


<table style="width:490px; " cellspacing="0" cellpadding="0" >
<tr>
<td style="width:240px; background-color:#eee;font-size:12px; text-align:center; border: 1px solid #000;"><strong>COSTO SERVICIO</strong></td>
<td style="width:240px; background-color:#2f75b5; color:#fff;  font-size:12px; text-align:center; border: 1px solid #000;"><strong>$ <? echo number_format(round($row[43], 2),2); ?></strong></td>
</tr>
</table>
</div>
</div>
</page>

<?

$content=ob_get_clean();
    require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
    $html2pdf = new HTML2PDF('P','A5', 'en');
   // $html2pdf = new HTML2PDF('L','A5','fr');
	//$html2pdf->Image('tutorial/logo.png',10,12,30,0,'','http://www.fpdf.org');
	//$html2pdf->setDefaultFont('times');
    $html2pdf->WriteHTML($content);
    $html2pdf->Output('HojaVerde'.date('YmdHis').'.pdf');
?>