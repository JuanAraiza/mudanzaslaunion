<?php
function mes($m){
switch($m){
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
	return 'Septimbre';
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
 ob_start();

?>
<style type="text/css">
body {
	text-transform: uppercase;
	font-size: 9px;
}
p {
	font-size:8px;
}
</style>

<page>
<?
 include('config.php');

	$query = "SELECT * from servicio where clave='".$_GET['c']."'";
	$result = $link->query($query);
	$row=mysqli_fetch_row($result);
?>
<div style="width:730px; font-size: 9px;">
<div style="background-color:#fff;">
<br>
<table style="width:755px;">
	<tr>
<td>
<div style=" background-color: #44536a; padding-top: 5px; padding-bottom: 5px;  width:100%;  font-size: 9px; color:#fff; text-align: center;text-transform: uppercase;">ORDEN DE SERVICIO LA UNION MUDANZAS</div><br>

</td>
</tr>
</table>
<br>

<table style="width:755px;">
<tr>
<td>
<table style="width:377px;" cellpadding="0" cellspacing="0">
	<tr>
	<td style=" background-color: #44536a; color: #fff;text-transform: uppercase; width:157px; padding:2px;" align="center">FOLIO SERVICIO:</td>
	<td style="text-transform: uppercase;  border:#44536a solid 1px; width:200px; padding:2px;"><? echo $row[0]; ?></td>
</tr>
<tr>
	<td style=" background-color: #44536a; color: #fff;text-transform: uppercase; width:157px; padding:2px;" align="center">CLIENTE:</td>
	<td style="text-transform: uppercase;  border:#44536a solid 1px; width:200px; padding:2px;"><? echo $row[1]; ?></td>
</tr>
</table>
<br>
<div style=" background-color: #ed2024;  padding-top: 5px; padding-bottom: 5px;  width:377px;   font-size: 9px; color:#fff; text-align: center;">GENERALES DEL SERVICIO</div>
<table style="width:372px;" cellpadding="0" cellspacing="0">
<tr>
	<td style=" background-color: #44536a; color: #fff;text-transform: uppercase; width:117px; padding:2px;" align="center">ORIGEN</td>
    <td style=" background-color: #44536a; color: #fff;text-transform: uppercase; width:118px; padding:2px;" align="center">DESTINO</td>
    <td style=" background-color: #44536a; color: #fff;text-transform: uppercase; width:118px; padding:2px;" align="center">TIPO DE SERVICIO</td>
</tr>
<tr>
	<td style="text-transform: uppercase;  border:#44536a solid 1px; padding:2px;" align="center"><? echo $row[2]; ?></td>
    <td style="text-transform: uppercase;  border:#44536a solid 1px; padding:2px;" align="center"><? echo $row[3]; ?></td>
	<td style="text-transform: uppercase;  border:#44536a solid 1px; padding:2px;" align="center"><? echo $row[4]; ?></td>
</tr>
</table>
<div style=" background-color: #44536a;  padding-top: 5px; padding-bottom: 5px;  width:377px;   font-size: 9px; color:#fff; text-align: center;">USTED CONTRATO: SERVICIO BASICO, QUE INCLUYE</div>
<div style=" border:#44536a solid 1px;   padding-top: 5px; padding-bottom: 5px;  width:375px;   font-size: 9px;">
1.-GRUAS PARA AUTO<br>	
2.- RECOLECCION Y ENTREGA A PIE DE CASA (SIEMPRE Y CUANDO LAS UNIDADES ENTREN)	
</div>
<?php if($row[4]=='Vehiculo'){ ?>
<div style=" background-color: #44536a;  padding-top: 5px; padding-bottom: 5px;  width:377px;   font-size: 9px; color:#fff; text-align: center;">VEHICULO</div>
<div style=" border:#44536a solid 1px;   padding-top: 5px; padding-bottom: 5px;  width:375px;   font-size: 9px;">
<? echo $row[7]; ?>
</div>
<?php } ?>
<div style=" background-color: #44536a;  padding-top: 5px; padding-bottom: 5px;  width:377px;   font-size: 9px; color:#fff; text-align: center;">LOS ACARREOS A PIE O CAMIONETA EN ZONA DE CARGA O DESCARGA, VOLADOS, PISOS EXTRAS, DESARMADO Y ARMADO DE MUEBLES, OTROS… SE COBRAN EN EL MOMENTO Y ESTAN SUJETOS A CONDICIONES DEL LUGAR</div>
<br>
<div style=" background-color: #ed2024;  padding-top: 5px; padding-bottom: 5px;  width:377px;   font-size: 9px; color:#fff; text-align: center;">TIEMPOS DEL SERVICIO</div>
<table style="width:372px;" cellpadding="0" cellspacing="0">
<tr>
	<td style=" background-color: #44536a; color: #fff;text-transform: uppercase; width:117px; padding:2px;" align="center">
    <table cellpadding="0" cellspacing="0">
    <tr>
	<td style="text-transform: uppercase; color: #fff; padding:2px;" align="center">FECHA DE RECOLECCION:</td></tr>
    <tr><td style="text-transform: uppercase; color: #fff; padding:2px;" align="center">HORA DE RECOLECCION:</td></tr>
	<tr><td style="text-transform: uppercase; color: #fff; padding:2px;" align="center">TIEMPO DE ENTREGA</td>
</tr>
</table>
    </td>
    <td style=" text-transform: uppercase; width:118px; " align="center">
    <table cellpadding="0" cellspacing="0">
    <tr>
	<td style="text-transform: uppercase; border:#44536a solid 1px; width:116px;" align="center"><? echo substr($row[22],8,2).'/'.substr($row[22],5,2).'/'.substr($row[22],0,4); ?></td></tr>
    <tr><td style="text-transform: uppercase; border:#44536a solid 1px; padding:2px;" align="center"><? echo $row[23]; ?></td></tr>
	<tr><td style="text-transform: uppercase; border:#44536a solid 1px;padding:2px;" align="center"><? echo $row[38]; ?></td>
</tr>
</table>
    </td>
    <td style=" background-color: #44536a; color: #ffffff;text-transform: uppercase; width:118px; padding:2px;" align="center" valign="middle">EL TIEMPO DE ENTREGA ES APROX SUJETO A DEMORA</td>
</tr>

</table>


</td>
<td>
<table style="width:377px;" cellpadding="0" cellspacing="0">
<tr>
	<td style=" text-transform: uppercase; width:377px; color:#094c9f; padding:2px; font-size: 9px;"> 
    <a style="text-decoration:underline; ">*LA UNION MUDANZAS</a> SOMOS UNA RED DE TRANSPORTE CON COBERTURA NACIONAL, POR LO QUE LA UNIDAD QUE LE RECOLECTA NO SERA SIEMPRE LA QUE LE ESTARA ENTREGANDO. LA RUTA CONTRATADA NO SIEMPRE ES DIRECTA, A VECES,  HACEMOS TRANSBORDOS DE MERCANCIA; PARA PODER LLEGAR A DESTINO.
    </td>
	
</tr>
</table>

<div style=" background-color: #ed2024;  padding-top: 5px; padding-bottom: 5px;  width:377px;   font-size: 9px; color:#fff; text-align: center;">INFORMACION PARA CLIENTE</div>
<table style="width:372px;" cellpadding="0" cellspacing="0">
<tr>
	<td style=" background-color: #44536a; color: #fff;text-transform: uppercase; width:112px; padding:2px;" align="center">ATENCION A CLIENTES:</td>
    <td style=" text-transform: uppercase; width:117px; padding:2px; border:#44536a solid 1px;" align="center">AZUCENA PEÑA</td>
    <td style=" text-transform: uppercase; width:117px; padding:2px; border:#44536a solid 1px;" align="center">4421270514</td>
</tr>
</table>
<table style="width:372px;" cellpadding="0" cellspacing="0">
<tr>
	<td style="background-color: #44536a; width:177px; color: #fff; text-transform: uppercase;  border:#44536a solid 1px; padding:2px;" align="center">JEFE DE OPERACIONE:S</td>
    <td style="text-transform: uppercase; width:177px;  border:#44536a solid 1px; padding:2px;" align="center"><? 
	$resultp = mysql_query("select * FROM proveedores where id=".$row[40], $link);
$rowp = mysql_fetch_row($resultp);
	echo $rowp[1].' '.$rowp[2].' '.$rowp[3]; ?></td>
</tr>

<tr>
	<td style="background-color: #44536a; width:177px; color: #fff; text-transform: uppercase;  border:#44536a solid 1px; padding:2px;" align="center">EMPRESA QUE RECOLECTA:</td>
    <td style="text-transform: uppercase; width:177px;  border:#44536a solid 1px; padding:2px;" align="center">&nbsp;</td>
</tr>
<tr>
	<td style="background-color: #44536a; width:177px; color: #fff; text-transform: uppercase;  border:#44536a solid 1px; padding:2px;" align="center">EMPRESA QUE ENTREGA:</td>
    <td style="text-transform: uppercase; width:177px;  border:#44536a solid 1px; padding:2px;" align="center">&nbsp;</td>
</tr>
</table>
<br>
<table style="width:372px;" cellpadding="0" cellspacing="0">
<tr>
	
    <td style=" text-transform: uppercase; width:234px; border:#44536a solid 1px;" align="center">
    <table style="width:237px;" cellpadding="0" cellspacing="0">
<tr>
    <td style="width:234px; background-color: #ed2024; color:#fff; padding:5px;">SEGURO</td>
    </tr>
    </table>
    <table style="width:230px;" cellpadding="0" cellspacing="0">
    <tr>
    <td style=" text-transform: uppercase; width:115px; padding:2px; border:#44536a solid 1px;" align="center">SEGURO CONTRATADO</td>
    <td style=" text-transform: uppercase; width:115px; padding:2px; border:#44536a solid 1px;" align="center">$ <? echo money_format('%(#10n',$row[19]); ?></td>
    </tr>
    <tr>
    <td style=" text-transform: uppercase; width:115px; padding:2px; border:#44536a solid 1px;" align="center">SEGURO CORTESIA</td>
    <td style=" text-transform: uppercase; width:115px; padding:2px; border:#44536a solid 1px;" align="center">$ <? echo money_format('%(#10n',$row[52]); ?></td>
    </tr>
    </table>
    
    
    </td>
    
    <td style=" background-color: #44536a; color: #ffffff;text-transform: uppercase; width:112px; padding:2px;" align="center">SI CLIENTE NO CONTRATA SEGURO LA MERCANCIA CORRE POR CUENTA Y RIESGO DEL CLIENTE</td>
</tr>
</table>
<table style="width:377px;" cellpadding="0" cellspacing="0">
<tr>
	<td style=" background-color: #44536a; color: #ffffff; text-transform: uppercase; width:360px;  padding:5px; font-size: 9px;" align="center"> 
    EL SEGURO COMPRENDE:<br>
Riesgos ordinarios de tránsito, volcaduras, accidentes vehiculares, daños en las piezas durante el viaje por riesgos de tránsito, pérdida total: Sólo será válido si se cuenta con la documentación del siniestro correspondiente y el servicio esta liquidado.
NO CUBRE: MANIOBRAS DE CARGA NI DESCARGA, NI DAÑOS DE LAS PIEZAS ARRIBA DE LA UNIDAD

    </td>
	
</tr>
</table>



</td>

</tr>
</table>






<table style="width:755px;">
<tr>
<td style="border:#44536a solid 1px;">
<div style=" background-color: #ed2024;  padding-top: 5px; padding-bottom: 5px;  width:377px;   font-size: 9px; color:#fff; text-align: center;">DIRECCION DE CARGA</div>
<table style="width:377px;" cellpadding="0" cellspacing="0">
<tr>
	<td style=" background-color: #44536a; color: #fff;text-transform: uppercase; width:157px; padding:2px;" align="center">DIRECCION:</td>
	<td style="text-transform: uppercase;  border:#44536a solid 1px; width:200px; padding:2px;"><? echo $row[24].' ' .$row[25]; ?></td>
</tr>
<tr>
	<td style=" background-color: #44536a; color: #fff;text-transform: uppercase; width:157px; padding:2px;" align="center">REFERENCIAS:</td>
	<td style="text-transform: uppercase;  border:#44536a solid 1px; width:200px; padding:2px;"><? echo $row[26]; ?></td>
</tr>
<tr>
	<td style=" background-color: #44536a; color: #fff;text-transform: uppercase; width:157px; padding:2px;" align="center">NOMBRE Y TEL ENTREGA:</td>
	<td style="text-transform: uppercase;  border:#44536a solid 1px; width:200px; padding:2px;"><? echo $row[27].' ' .$row[28]; ?></td>
</tr>
</table>

<div style=" background-color: #ed2024;  padding-top: 5px; padding-bottom: 5px;  width:377px;   font-size: 9px; color:#fff; text-align: center;">DIRECCION DE DESCARGA</div>
<table style="width:377px;" cellpadding="0" cellspacing="0">
<tr>
	<td style=" background-color: #44536a; color: #fff;text-transform: uppercase; width:157px; padding:2px;" align="center">DIRECCION:</td>
	<td style="text-transform: uppercase;  border:#44536a solid 1px; width:200px; padding:2px;"><? echo $row[29].' ' .$row[30]; ?></td>
</tr>
<tr>
	<td style=" background-color: #44536a; color: #fff;text-transform: uppercase; width:157px; padding:2px;" align="center">REFERENCIAS:</td>
	<td style="text-transform: uppercase;  border:#44536a solid 1px; width:200px; padding:2px;"><? echo $row[31]; ?></td>
</tr>
<tr>
	<td style=" background-color: #44536a; color: #fff;text-transform: uppercase; width:157px; padding:2px;" align="center">NOMBRE Y TEL ENTREGA:</td>
	<td style="text-transform: uppercase;  border:#44536a solid 1px; width:200px; padding:2px;"><? echo $row[32].' ' .$row[33]; ?></td>
</tr>
</table>


<table style="width:377px;" cellpadding="0" cellspacing="0">
<tr>
	<td style=" text-transform: uppercase; width:350px; color:#094c9f; padding:6px; font-size: 9px; border:#44536a solid 1px;"> 
     CONFIRMO QUE VEHICULO QUE ESTOY ENTREGANDO  A LA MUDANZA  HA SIDO REVISADA POR MI Y EL PERSONAL DE LA MUDANZA, QUEDO CONFORME DE LA CANTIDAD DE  PIEZAS Y CONDICIONES EN LAS QUE SE HAN QUE SE HAN SUBIDO A LA UNIDAD
    </td>
	
</tr>
<tr>
	<td style=" text-transform: uppercase; width:350px; color:#094c9f; padding:6px; font-size: 9px; border:#44536a solid 1px;"> 
     NOMBRE Y FIRMA.
    </td>
	
</tr>
<tr>
	<td style=" text-transform: uppercase; width:350px; color:#094c9f; padding:6px; font-size: 9px; border:#44536a solid 1px;"> 
  CONFIRMO QUE EL VEHICULO QUE ESTOY RECIBIENDO HA SIDO REVISADA  POR MI Y EL PERSONAL DE LA MUDANZA, QUEDO CONFORME DE LA CANTIDAD DE  PIEZAS Y CONDICIONES EN LA QUE ME ENTREGAN.
    </td>
	
</tr>
<tr>
	<td style=" text-transform: uppercase; width:350px; color:#094c9f; padding:6px; font-size: 9px; border:#44536a solid 1px;"> 
     NOMBRE Y FIRMA
    </td>
	
</tr>
</table>

</td>
<td>

<table style="width:377px;" cellpadding="0" cellspacing="0">
<tr>
	<td style="  text-transform: uppercase; width:125px; padding:2px;" align="center"><img src="images/imgpdf.jpg" style="width:125px;"/></td>
	<td style=" background-color: #44536a; color: #ffffff; font-size: 9px; text-transform: uppercase;  border:#44536a solid 1px; width:200px; padding:10px; height:auto">AGRADECEMOS QUE NOS HAYA ELEGIDO COMO SU  MUDANZA, NOS COMPLACE ATENDERLO, PERO LE PEDIMOS  REVISE  TERMINOS Y CONDICIONES DEL SERVICIO EN ESTE ENLACE <br><a style="color:#aed0fa; font-size: 8px;">http://launionsanmiguel.com/mudanzas/#terminos</a><br> ES IMPORTANTE QUE REVISE SU COSAS JUNTO CON NUESTRO PERSONAL AL ENTREGAR Y RECIBIR LA MUDANZA, YA QUE DE NO HACERLO, NO ADMITIMOS RECLAMACIONES POSTERIORES.</td>
</tr>
</table>

<br><br>
<div style=" background-color: #44536a; padding-top: 5px; padding-bottom: 5px;  width:380px;  font-size: 9px; color: #ffffff; text-align: center;text-transform: uppercase;">“NO TRASLADAMOS ANIMALES O PERSONAS  AJENAS A LA EMPRESA DENTRO DE NUESTRAS UNIDADES”</div><br><br>
</td>
</tr>
</table>


<table style="width:735px;">
	<tr>
    <td style="width:120px;" valign="top" >&nbsp;</td>
<td style="width:500px;">

<br><br></td><td style="width:120px;" valign="top" >&nbsp;

</td>
</tr>
</table>
<div style="padding: 3px 3px 3px 30px; align-content:center; text-align:center;">
 Agradeciendo de antemano su preferencia, quedamos pendientes por cualquier duda o comentario.<br><br><br><br>
A T E N T A M E N T E<br>
LA UNION MUDANZAS
</div>

<div style="width:735px; ">
<table style="width:100%; ">
<td style="width:50%;">
<div style="  color:#333; float:left; font-size: 10px;"><br>
www.launionsanmiguel.com<br>
www.mudanzasforaneaslaunion.com<br>
La Union Packing & Shipping Services<br>
¡Empacamos y Enviamos a todo el Mundo!<br>
Whastapp : 4421270514<br>
</div>
</td>
<td style="width:50%;">
<div style=" color: #333; float: left; text-align: right; font-size: 10px;"><br>
Umaran 25, Centro<br>
Y ahora en nuestra nueva dirección<br>
Salida a Celaya # 83-B<br>
Ph./Tel 4151859200<br>
San Miguel Allende, Gto. 37700<br>
</div>
</td></table>
</div>

</div>


</div>
</page>
<?
$content=ob_get_clean();
    require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');

    $html2pdf = new HTML2PDF('P','letter','fr');
	//$html2pdf->Image('tutorial/logo.png',10,12,30,0,'','http://www.fpdf.org');
	$html2pdf->setDefaultFont('Arial');
    $html2pdf->WriteHTML($content);
    $html2pdf->Output('Cotizacion'.date('YmdHis').'.pdf');
  
?>