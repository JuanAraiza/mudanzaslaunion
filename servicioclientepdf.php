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
$link=mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
	mysql_select_db($bbdd,$link) or die("resultado=".urlencode(mysql_error()));
	$result=mysql_query("SELECT * from servicio where clave='".$_GET['c']."'", $link);
	$row=mysql_fetch_row($result);
?>
<div style="width:730px;   font-size: 9px;">
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
    <td style=" background-color: #44536a; color: #fff;text-transform: uppercase; width:115px; padding:2px;" align="center">TIPO DE SERVICIO</td>
</tr>
<tr>
	<td style="text-transform: uppercase;  border:#44536a solid 1px; padding:2px; width:115px; height:auto;" align="center"><? echo $row[2]; ?></td>
    <td style="text-transform: uppercase;  border:#44536a solid 1px; padding:2px; width:117px; height:auto;" align="center" ><? echo $row[3]; ?></td>
	<td style="text-transform: uppercase;  border:#44536a solid 1px; padding:2px; width:110px; height:auto;" align="center"><? echo $row[4]; ?></td>
</tr>
</table>
<div style=" background-color: #44536a;  padding-top: 5px; padding-bottom: 5px;  width:377px;   font-size: 9px; color:#fff; text-align: center;">USTED CONTRATO: SERVICIO BASICO, QUE INCLUYE</div>
<div style=" border:#44536a solid 1px;   padding-top: 5px; padding-bottom: 5px;  width:375px;   font-size: 9px;">
1.- EMPLAYE DE LOS MUEBLES NECESARIOS, NO EMPLAYE TOTAL, NO EMPAQUE A GRANEL<br>	
2.- MANIOBRAS DE PLANTA BAJA (SALA, COMEDOR Y COCINA) PRIMER PISO (RECAMARAS)	<br>	
3.- EN LA DESCARGA, ACOMODO DE LOS MUEBLES Y CAJAS EN LAS HABITACIONES CORRESPONDIENTES, NO DESEMPAQUE		
</div>
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
    <a style="text-decoration:underline; ">*LA UNION MUDANZAS</a> SOMOS UNA RED DE TRASPORTE CON COBERTURA NACIONAL, POR LO QUE LA UNIDAD QUE LE RECOLECTA NO SERA SIEMPRE LA QUE LE ESTARA ENTREGANDO. LA RUTA CONTRATADA NO SIEMPRE ES DIRECTA, A VECES, HACEMOS TRASBORDOS DE MERCANCIAS; PARA PODER LLEGAR A DESTINO.
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
	<td style="background-color: #44536a; width:177px; color: #fff; text-transform: uppercase;  border:#44536a solid 1px; padding:2px;" align="center">JEFE DE OPERACIONES 1:</td>
    <td style="text-transform: uppercase; width:177px;  border:#44536a solid 1px; padding:2px;" align="center"><? 
	$resultp = mysql_query("select * FROM proveedores where id=".$row[40], $link);
$rowp = mysql_fetch_row($resultp);
	echo $rowp[1].' '.$rowp[2].' '.$rowp[3]; ?></td>
</tr>
<tr>
	<td style="background-color: #44536a; width:177px; color: #fff; text-transform: uppercase;  border:#44536a solid 1px; padding:2px;" align="center">JEFE DE OPERACIONES 2:</td>
    <td style="text-transform: uppercase; width:177px;  border:#44536a solid 1px; padding:2px;" align="center"><? 
	$resultp = mysql_query("select * FROM proveedores where id=".$row[87], $link);
$rowp = mysql_fetch_row($resultp);
	echo $rowp[1].' '.$rowp[2].' '.$rowp[3]; ?></td>
</tr>
<tr>
	<td style="background-color: #44536a; width:177px; color: #fff; text-transform: uppercase;  border:#44536a solid 1px; padding:2px;" align="center">JEFE DE OPERACIONES 3:</td>
    <td style="text-transform: uppercase; width:177px;  border:#44536a solid 1px; padding:2px;" align="center"><? 
	$resultp = mysql_query("select * FROM proveedores where id=".$row[88], $link);
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
<td>
<div style=" background-color: #ed2024;  padding-top: 5px; padding-bottom: 5px;  width:377px;   font-size: 9px; color:#fff; text-align: center;">DIRECCION DE CARGA</div>
<table style="width:377px;" cellpadding="0" cellspacing="0">
<tr>
	<td style=" background-color: #44536a; color: #fff;text-transform: uppercase; width:157px; padding:2px;" align="center">DIRECCION:</td>
	<td style="text-transform: uppercase;  border:#44536a solid 1px; width:200px; padding:2px;"><? echo $row[24].', ' .$row[25].', ' .$row[44]; ?></td>
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

</td>
<td>
<div style=" background-color: #ed2024;  padding-top: 5px; padding-bottom: 5px;  width:377px;   font-size: 9px; color:#fff; text-align: center;">DIRECCION DE DESCARGA</div>
<table style="width:377px;" cellpadding="0" cellspacing="0">
<tr>
	<td style=" background-color: #44536a; color: #fff;text-transform: uppercase; width:157px; padding:2px;" align="center">DIRECCION:</td>
	<td style="text-transform: uppercase;  border:#44536a solid 1px; width:200px; padding:2px;"><? echo $row[29].', ' .$row[30].', ' .$row[45]; ?></td>
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
</td>
</tr>
</table>


<table style="width:755px;">
<tr>
<td style="border:#44536a solid 1px;  width:377px; height:auto;">
<div style=" background-color: #ed2024;  padding-top: 5px; padding-bottom: 5px;  width:377px;   font-size: 9px; color:#fff; text-align: center;">LISTA DE MUEBLES PROPORCIONADA POR EL CLIENTE</div>
<a style="padding:5px; text-decoration:none; color:#000;"><? echo utf8_decode($row[7]); ?></a>
<br><br>
<div style=" background-color: #44536a; padding-top: 5px; padding-bottom: 5px;  width:377px;  font-size: 9px; color:#fff; text-align: center;">OBSERVACIONES</div>
<br>
<div style="  padding-top: 5px; padding-bottom: 5px;   width:377px;  font-size: 9px; color:#ed2024; text-align: center;"><? echo utf8_decode($row[39]); ?></div>

</td>
<td>

<table style="width:377px;" cellpadding="0" cellspacing="0">
<tr>
	<td style="  text-transform: uppercase; width:125px; padding:2px;" align="center"><img src="images/imgpdf.jpg" style="width:125px;"/></td>
	<td style=" background-color: #44536a; color: #ffffff; font-size: 9px; text-transform: uppercase;  border:#44536a solid 1px; width:200px; padding:10px; height:auto">AGRADECEMOS QUE NOS HAYA ELEGIDO COMO SU  MUDANZA, NOS COMPLACE ATENDERLO, PERO LE PEDIMOS  REVISE  TERMINOS Y CONDICIONES DEL SERVICIO EN ESTE ENLACE <br><a style="color:#aed0fa; font-size: 8px;">http://launionsanmiguel.com/mudanzas/#terminos</a><br> ES IMPORTANTE QUE REVISE SU COSAS JUNTO CON NUESTRO PERSONAL AL ENTREGAR Y RECIBIR LA MUDANZA, YA QUE DE NO HACERLO, NO ADMITIMOS RECLAMACIONES POSTERIORES.</td>
</tr>
</table>

<table style="width:377px;" cellpadding="0" cellspacing="0">
<tr>
	<td style=" text-transform: uppercase; width:350px; color:#094c9f; padding:6px; font-size: 9px; border:#44536a solid 1px;"> 
     CONFIRMO QUE LA MERCANCIA QUE ESTOY ENTREGANDO A LA MUDANZA  HA SIDO REVISADA POR MI Y EL PERSONAL DE LA MUDANZA, QUEDO CONFORME DE LA CANTIDAD DE  PIEZAS Y CONDICIONES EN LAS QUE SE HAN QUE SE HAN SUBIDO A LA UNIDAD
    </td>
	
</tr>
<tr>
	<td style=" text-transform: uppercase; width:350px; color:#094c9f; padding:6px; font-size: 9px; border:#44536a solid 1px;"> 
     NOMBRE Y FIRMA.
    </td>
	
</tr>
<tr>
	<td style=" text-transform: uppercase; width:350px; color:#094c9f; padding:6px; font-size: 9px; border:#44536a solid 1px;"> 
  CONFIRMO QUE LA MERCANCIA QUE ESTOY RECIBIENDO HA SIDO REVISADA  POR MI Y EL PERSONAL DE LA MUDANZA, QUEDO CONFORME DE LA CANTIDAD DE  PIEZAS Y CONDICIONES EN LA QUE ME ENTREGAN.
    </td>
	
</tr>
<tr>
	<td style=" text-transform: uppercase; width:350px; color:#094c9f; padding:6px; font-size: 9px; border:#44536a solid 1px;"> 
     NOMBRE Y FIRMA
    </td>
	
</tr>
</table>

</td>
</tr>
</table>


<table style="width:735px;">
	<tr>
    <td style="width:120px;" valign="top" >&nbsp;</td>
<td style="width:500px;">
<div style=" background-color: #44536a; padding-top: 5px; padding-bottom: 5px;  width:500px;  font-size: 9px; color: #ffffff; text-align: center;text-transform: uppercase;">“NO TRASLADAMOS ANIMALES O PERSONAS  AJENAS A LA EMPRESA DENTRO DE NUESTRAS UNIDADES”</div><br><br>
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
<? /*
<page>

<div style="width:730px; background-color:#44546a; padding:10px;  font-size: 9px;">
<div style="background-color:#fff;">
<br>
<table style="width:377px;" cellpadding="0" cellspacing="0">
<tr>
	<td style="  text-transform: uppercase; width:130px; padding:2px;" align="center"><img src="images/imgpdf.jpg" style="width:130px;"/></td>
	<td style="  color: #ffffff; font-size: 9px; text-transform: uppercase;  width:200px; padding:10px; height:auto"></td>
</tr>
</table>
<br>
<table style="width:755px;">
	<tr>
<td>
<div style=" background-color: #ed2024; padding-top: 5px; padding-bottom: 5px;  width:100%;  font-size: 9px; color:#fff; text-align: center;text-transform: uppercase;">TERMINOS Y CONDICIONES DE LA MUDANZA</div>
<div style=" background-color: #44536a; padding-top: 5px; padding-bottom: 5px;  width:100%;  font-size: 9px; color:#ffffff;  line-height:9px; font-size:6px;">
<br>
Estamos complacidos de poder ser su proveedor de servicio, pero es IMPRESINDIBLE que sepa: <br>

LA UNION MUDANZAS PERTENECE A UN GRUPO DE TRANSPORTISTAS Y MUDANCEROS NACIONAL,  LOS CUALES LA APOYAN PARA LA REALIZACION DE  LOS SERVICIOS, LAS UNIDADES QUE BRINDAN EL SERVICIO AL CLIENTE, NO SON DE SU PROPIEDAD.<br>

Si su MUDANZA es: <br>
EXCLUSIVA: La unidad es solo para usted y está contemplado para que quepa lo mencionado en la lista de muebles previa. Si salen más cosas mientras quepa en la unidad el costo es el mismo. El tiempo de entrega es tiempo en ruta. <br>
DIRECTA: La unidad puede llevar más carga, pero el tiempo de entrega es tiempo en ruta. <br>
COMPARTIDA: La unidad lleva más carga de otros clientes y usted solo pago por el espacio contratado. El tiempo de entrega es aproximado y estamos sujetos a demora puesto que van otros clientes con usted compartiendo la unidad. <br>
Todos los servicios están sujetos a demora por cuestiones de tráfico, daños mecánicos inesperados, retenes u otros no mencionados. <br>
Se le está entregando una orden de servicio a usted y al chofer, por favor validar con el que la presente para poder firmar de conformidad, en caso que no sea así, favor de reportarlo. <br>
<br>
1.- SI EN EL MOMENTO DE LA CARGA SON MÁS COSAS DE LAS COTIZADAS Y ESCRITAS EN LA LISTA PREVIAMENTE, EL COSTO DE LA MUDANZA SUFRIRA MODIFICACIONES.<br> 
2.-LAS MANIOBRAS (CARGA Y DESCARGA) INCLUIDAS EN SU SERVICIO SON DE PLANTA BAJA (SALA, COMEDOR, COCINA) Y PRIMER PISO (RECAMARAS), pisos adicionales, se cobran por aparte, ya sea por escalera o elevador. <br>
3.-ACARREOS: Si la unidad no entra a domicilio por cuestiones, como cables bajos en la calle, arcos en los fraccionamientos, calles estrechas, etc… y tenemos que realizar un acarreo a pie o con camioneta, éste será cubierto por cliente, puesto que no está considerado en la cotización (a menos que se avise con antelación) y el costo será comentado en el momento, de acuerdo a las circunstancias del lugar. <br>
<br>
PAGOS: <br>
1.- ANTICIPO 30%, RESTANTE 50% A LA CARGA Y 20% AL ARRIBO DE LA CD DESTINO. <br>
EL CHOFER TIENE LA OBLIGACION DE LLAMAR PARA COORDINAR LA ENTREGA, Y EN ESE MOMENTO SE REALIZA EL PAGO FINAL PARA DAR PASO A LA DESCARGA. <br>
Las cantidades y forma de pago, están expresas en la orden de servicio previamente enviada a usted, si hay algún cambio favor de comunicarlo.<br> 
2.- “NO SE DESCARGA SINO ESTA LIQUIDADO EL SERVICIO, EN SU TOTALIDAD” <br>
3.- En caso que el cliente solicite descarga antes de pago final, se bajará solo la mitad de la mudanza y se requerirá la liquidación del servicio, teniendo confirmado el pago continuaremos con la descarga. <br>
4.- Usted acordó previamente su forma de pago así como las cantidades, favor de estar preparado para su servicio, y en caso de alguna modificación favor de avisarlo a oficina. <br>
NO SOMOS RESPONSABLES CON EL CLIENTE POR: <br>
1.- Daños y/o pérdidas en Mercancía previamente empacada POR CLIENTE y/o emplayada<br> 
2.- En pérdida de cosas no declaradas en el inventario. <br>
3.- Por muebles rotos, vencidos, manchados y/o mojados que contengan cosas dentro y que no hayan sido vaciados para su traslado.<br> 
4.- Si las plantas mueren y/o las macetas se rompen a causa de la humedad. <br>
5.- Si hay algún problema con la autoridad por traslado de mercancía ilícita. <br>
6.- LAS PANTALLAS DEBEN SER MOSTRADAS PRENDIDAS (para verificar su perfecto estado) AL PERSONAL DE LA MUDANZA A LA CARGA Y DESCARGA DE LA MISMA, de no ser así, no se admiten reclamaciones posteriores. <br>
“NO TRASLADAMOS ANIMALES, MERCANCIA EN CAJA DE HUEVO O PERSONAS AJENAS A LA EMPRESA DENTRO DE NUESTRAS UNIDADES” <br>
MERCANCIA ESPECIAL, DEBE SER ENTREGADA EN MANO AL CHOFER Y AVISAR PREVIAMENTE A OFICINA PARA MENCIONARLO EN LA ORDEN DE SERVICIO. <br>
POLITICA DE RECLAMACIONES <br>
Cliente DEBE REVISAR EL ESTADO DE SUS MUEBLES E INVENTARIO JUNTO CON PERSONAL DE LA MUDANZA TANTO A LA CARGA COMO LA DESCARGA. Si presenta algún detalle el mobiliario el personal de la mudanza debe avisar al cliente A LA CARGA, y a oficina para su conocimiento, de igual forma la descarga… DE NO HACERLO NO SE ACEPTAN RECLAMACIONES POSTERIORES. <br>
SI A LA DESCARGA, LA MERCANCIA PRESENTA ALGUN DAÑO, por causa del traslado o personal de maniobras, es necesario que cliente envíe fotografías de los daños a oficina para su conocimiento y resolución en el momento, SI CLIENTE DEJA IR A PERSONAL DE LA MUDANZA Y NO HAY RESOLUSION DEL DAÑO EN EL MOMENTO, NO SE ADMITEN RECLAMACIONES POSTERIORES. <br>
En caso que no haya un acuerdo inmediato y cliente desee reparación, tiene 72 horas para poder entregar a LA UNION MUDANZAS la cotización de algún negocio establecido donde venga el costo de reparación,  sino la envía pierde derecho a condonación del daño.<br>
<br>

En dado caso que el dueño de las cosas nos sea quien reciba la mudanza, es necesario que encargado este informado de todo lo anterior, YA QUE DESPUES DEL DIA DE LA DESCARGA NO SE ACEPTAN RECLAMACIONES. <br>
No se permite retener dinero por parte del cliente a transportista por concepto de daños, estos se deben de “negociar” con LA UNION MUDANZAS. <br>
SI CLIENTE NO SIGUE ESTE PROCEDIMIENTO NO SERA VALIDA NINGUNA RECLAMACION POSTERIOR<br>
Los autos pueden ser trasladados en vehículo madrina y/o unidad mudancera cerrada, favor de verificar cuál será su caso.<br>
En Traslado de autos cliente debe entregar a chofer copia de estos documentos:<br>
<br>
-factura<br>
-pedimento (si es auto importado)<br>
-tarjeta circulación<br>
-una carta de su puño y letra  donde especifique que nosotros solo le prestamos el servicio de traslado.<br>
-copia identificación<br>
-Registro público vehicular, que no cuente con reporte de robo (Policía Federal, Transito del Estado  o la procuraduría) <br>                                                                                                                                                                                                       <br>
-ES IMPRESINDIBLE QUE EL AUTO VAYA ASEGURADO, SINO ES POR MEDIO DE UN SEGURO EXTERNO como el que podemos ofrecer, POR FAVOR VERIFICAR CON ASGURADORA SI LA POLIZA CONTRATADA CUBRE ESTE TIPO DE TRASLADOS.<br>

Dependiendo del origen y destino de las mudanzas puede haber transbordos o cambios de unidad en   la ruta, se le informara previamente.<br>


Reiteramos nuestro agradecimiento en la contratación del servicio.
<br>
Saludos cordiales
<br>
La Unión Mudanzas. 


</div><br>
</td>
</tr>
</table>

<div style="padding: 3px 3px 3px 30px; align-content:center; text-align:center;">
 Agradeciendo de antemano su preferencia, quedamos pendientes por cualquier duda o comentario.<br><br><br><br>
A T E N T A M E N T E<br>
LA UNION MUDANZAS
</div>

</div>
<div style="width:100%; ">
<table style="width:100%; ">
<td style="width:50%;">
<div style="  color:#FFFFFF; float:left; font-size: 10px;"><br>
www.launionsanmiguel.com<br>
www.mudanzasforaneaslaunion.com<br>
La Union Packing & Shipping Services<br>
¡Empacamos y Enviamos a todo el Mundo!<br>
Whastapp : 4421270514<br>
</div>
</td>
<td style="width:50%;">
<div style=" color: #FFFFFF; float: left; text-align: right; font-size: 10px;"><br>
Zacateros 26-A, Centro<br>
Y ahora en nuestra nueva dirección<br>
Salida a Celaya # 83-B<br>
Ph./Tel 4151859200<br>
San Miguel Allende, Gto. 37700<br>
</div>
</td></table>
</div>

</div>
</page>
<? */

$content=ob_get_clean();
    require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');

    $html2pdf = new HTML2PDF('P','letter','fr');
	//$html2pdf->Image('tutorial/logo.png',10,12,30,0,'','http://www.fpdf.org');
	$html2pdf->setDefaultFont('Arial');
    $html2pdf->WriteHTML($content);
    $html2pdf->Output('Cotizacion'.date('YmdHis').'.pdf');
  
?>