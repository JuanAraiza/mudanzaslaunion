<?php  session_start();
//Exportar datos de php a Excel
header("Content-Type: application/vnd.ms-excel");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=Servicios".date('d-m-Y').".xls");
?>
<HTML LANG="es">
<TITLE>::. Exportacion de Datos .::</TITLE>
</head>
<body>                 
<?php 
include('config.php');
//if(isset($_POST['imprimir'])){

  $query= "select id,cliente,origen,destino,tipo_mudanza,costo,costo2,muebles,fecha,clave,km,m3,kmextra,empaquec,emplayet,cajacv,cajacr,desempaqueg,empaquem,seguro,otros,extras,fecha_s,hora_s,calle_no_c,colonia_c,referencia_c,nom_c,tel_c,calle_no_d,colonia_d,referencia_d,nom_d,tel_d,anticipo,a_la_carga,antes_de_la_carga,forma_de_pago,tiempo_entrega_aprox,observaciones,proveedor,favorllevar,costocliente,costoproveedor from servicio where cerrado='SI' and  fecha_s>='".date('Y')."-01-01'";
//  echo "select id,cliente,origen,destino,tipo_mudanza,costo,costo2,muebles,fecha,clave,km,m3,kmextra,empaquec,emplayet,cajacv,cajacr,desempaqueg,empaquem,seguro,otros,extras,fecha_s,hora_s,calle_no_c,colonia_c,referencia_c,nom_c,tel_c,calle_no_d,colonia_d,referencia_d,nom_d,tel_d,anticipo,a_la_carga,antes_de_la_carga,forma_de_pago,tiempo_entrega_aprox,observaciones,proveedor,favorllevar,costocliente,costoproveedor from servicio where cerrado='SI' and  fecha_s>='".date('Y')."-".date("m")-1."-01'";
	ob_start();
?>

<table  border="1" align="center" >
<tr>
    <td align="center" ><strong>ID</strong></td>
    <td align="center"><strong>CLIENTE</strong></td>
    <td align="center" ><strong>ORIGEN</strong></td>
    <td align="center"><strong>DESTINO</strong></td>
    <td align="center"><strong>TIPO MUDANZA</strong></td>
    <td align="center"><strong>COSTO</strong></td>
    <td align="center"><strong>COSTO2</strong></td>
    <td align="center"><strong>MUEBLES</strong></td>
    <td align="center"><strong>FECHA</strong></td>
    <!--<td align="center"><strong>CLAVE</strong></td>-->

  
    <td align="center"><strong>M3</strong></td>
   
    <td align="center"><strong>SEGURO</strong></td>


    <td align="center" ><strong>PROVEEDOR</strong></td>
   
    <td align="center" ><strong>COSTO CLIENTE</strong></td>
    <td align="center"><strong>COSTO PROVEEDOR</strong></td>
    <td align="center"><strong>UTILIDAD</strong></td>

    <td align="center"><strong>P. CLIENTE<br>BANAMEX</strong></td>
    <td align="center"><strong>P. CLIENTE<br>EFECTIVO DE CHOFER</strong></td>
    <td align="center"><strong>P. CLIENTE<br>CAJA CHICA</strong></td>
    <td align="center"><strong>P. CLIENTE<br>TC</strong></td>
    <td align="center"><strong>P. CLIENTE<br>SALDO A FAVOR</strong></td>
    <td align="center"><strong>P. CLIENTE<br>OTRO</strong></td>
    <td align="center"><strong>P. CLIENTE<br>TOTAL</strong></td>
     

    <td align="center"><strong>P. PROVEEDOR<br>BANAMEX</strong></td>
    <td align="center"><strong>P. PROVEEDOR<br>EFECTIVO DE CHOFER</strong></td>
    <td align="center"><strong>P. PROVEEDOR<br>CAJA CHICA</strong></td>
    <td align="center"><strong>P. PROVEEDOR<br>TC</strong></td>
    <td align="center"><strong>P. PROVEEDOR<br>SALDO A FAVOR</strong></td>
    <td align="center"><strong>P. PROVEEDOR<br>OTRO</strong></td>
    <td align="center"><strong>P. PROVEEDOR<br>TOTAL</strong></td>
  </tr>
  
<?
$result = $link->query($query);
	while($row=mysqli_fetch_row($result)){
    set_time_limit(900);
	?>
<tr>
    <td align="center" ><strong><? echo utf8_decode($row[0]); ?></strong></td>
    <td align="center" ><strong><? echo utf8_decode($row[1]); ?></strong></td>
    <td align="center" ><strong><? echo utf8_decode($row[2]); ?></strong></td>
    <td align="center" ><strong><? echo utf8_decode($row[3]); ?></strong></td>
    <td align="center" ><strong><? echo utf8_decode($row[4]); ?></strong></td>
    <td align="center" ><strong><? echo utf8_decode($row[5]); ?></strong></td>
    <td align="center" ><strong><? echo utf8_decode($row[6]); ?></strong></td>
    <td align="center" ><strong><? echo str_replace('<br />',' - ',utf8_decode($row[7])); ?></strong></td>
    <td align="center" ><strong><? echo utf8_decode($row[8]); ?></strong></td>
    <!--<td align="center" ><strong><? echo $row[9]; ?></strong></td>-->

    
    <td align="center" ><strong><? echo utf8_decode($row[11]); ?></strong></td>

    <td align="center" ><strong><? echo utf8_decode($row[19]); ?></strong></td>


<?
$resultp=mysql_query("select * from proveedores where id=".$row[40], $link);
$rowp=mysql_fetch_row($resultp);
?>
    <td align="center" ><strong><? echo utf8_decode($rowp[1]).' '.utf8_decode($rowp[2]); ?></strong></td>
   
    <td align="center" ><strong>$ <? echo number_format($row[42],2); ?></strong></td>
    <td align="center" ><strong>$ <? echo number_format($row[43],2); ?></strong></td>
    <td align="center" ><strong>$ <? $ut=$row[42]-$row[43]; echo number_format($ut,2); ?></strong></td>
   
    

<?
$query1 = "SELECT * FROM ingresosyegresos where id_mudanza=".$row[0]." and banco='BANAMEX' and referencia=1";
$result1 = $link->query($query1);
$row1=mysqli_fetch_row($result1);
  $dc1=(float)$row1[6];

?>
 <td align="center" ><strong>$ <? echo number_format($dc1,2); ?></strong></td>

 <?
$query2 = "SELECT * FROM ingresosyegresos where id_mudanza=".$row[0]." and banco='EFECTIVO CHOFER' and referencia=1";
$result2 = $link->query($query2);
$row2=mysqli_fetch_row($result2);
  $dc2=(float)$row2[6];

?>
 <td align="center" ><strong>$ <? echo number_format($dc2,2); ?></strong></td>

 <?
$query3 = "SELECT * FROM ingresosyegresos where id_mudanza=".$row[0]." and banco='CAJA CHICA' and referencia=1";
$result3 = $link->query($query3);
$row3=mysqli_fetch_row($result3);
$dc3=(float)$row3[6];
?>
 <td align="center" ><strong>$ <? echo number_format($dc3,2); ?></strong></td>

 <?
$query4 = "SELECT * FROM ingresosyegresos where id_mudanza=".$row[0]." and banco='TC' and referencia=1";
$result4 = $link->query($query4);
$row4=mysqli_fetch_row($result4);
$dc4=(float)$row4[6];
?>
 <td align="center" ><strong>$ <? echo number_format($dc4,2); ?></strong></td>

 <?
$qyery5 = "SELECT * FROM ingresosyegresos where id_mudanza=".$row[0]." and banco='SALDO A FAVOR' and referencia=1";
$result5 = $link->query($query5);
$row5=mysqli_fetch_row($result5);
$dc5=(float)$row5[6];
?>
 <td align="center" ><strong>$ <? echo number_format($dc5,2); ?></strong></td>

 <?
$query6 = "SELECT * FROM ingresosyegresos where id_mudanza=".$row[0]." and banco='OTRO' and referencia=1";
$result6 = $link->query($query6);
$row6=mysqli_fetch_row($result6);
$dc6=(float)$row6[6];
?>
 <td align="center" ><strong>$ <? echo number_format($dc6,2); ?></strong></td>

<?php $totalc=$dc1+$dc2+$dc3+$dc4+$dc5+$dc6; ?>
 <td align="center" ><strong>$ <? echo number_format($totalc,2); ?></strong></td>



 <?
$queryp1 = "SELECT * FROM ingresosyegresos where id_mudanza=".$row[0]." and banco='BANAMEX' and referencia=2";
$resultp1 = $link->query($queryp1);
$rowp1=mysqli_fetch_row($resultp1);
  $dcp1=(float)$rowp1[6];

?>
 <td align="center" ><strong>$ <? echo number_format($dcp1,2); ?></strong></td>

 <?
$queryp2 = "SELECT * FROM ingresosyegresos where id_mudanza=".$row[0]." and banco='EFECTIVO CHOFER' and referencia=2";
$resultp2 = $link->query($queryp2);
$rowp2=mysqli_fetch_row($resultp2);
  $dcp2=(float)$rowp2[6];

?>
 <td align="center" ><strong>$ <? echo number_format($dcp2,2); ?></strong></td>

 <?
$queryp3 = "SELECT * FROM ingresosyegresos where id_mudanza=".$row[0]." and banco='CAJA CHICA' and referencia=2";
$resultp3 = $link->query($queryp3);
$rowp3=mysqli_fetch_row($resultp3);
$dcp3=(float)$rowp3[6];
?>
 <td align="center" ><strong>$ <? echo number_format($dcp3,2); ?></strong></td>

 <?
$queryp4 = "SELECT * FROM ingresosyegresos where id_mudanza=".$row[0]." and banco='TC' and referencia=2";
$resultp4 = $link->query($queryp4);
$rowp4=mysqli_fetch_row($resultp4);
$dcp4=(float)$rowp4[6];
?>
 <td align="center" ><strong>$ <? echo number_format($dcp4,2); ?></strong></td>

 <?
$queryp5 = "SELECT * FROM ingresosyegresos where id_mudanza=".$row[0]." and banco='SALDO A FAVOR' and referencia=2";
$resultp5 = $link->query($queryp5);
$rowp5=mysqli_fetch_row($resultp5);
$dcp5=(float)$rowp5[6];
?>
 <td align="center" ><strong>$ <? echo number_format($dcp5,2); ?></strong></td>

 <?
$resultp6=mysql_query("SELECT * FROM ingresosyegresos where id_mudanza=".$row[0]." and banco='OTRO' and referencia=2", $link);
$rowp6=mysql_fetch_row($resultp6);
$dcp6=(float)$rowp6[6];
?>
 <td align="center" ><strong>$ <? echo number_format($dcp6,2); ?></strong></td>

<?php $totalp=$dcp1+$dcp2+$dcp3+$dcp4+$dcp5+$dcp6; ?>
 <td align="center" ><strong>$ <? echo number_format($totalp,2); ?></strong></td>


  </tr>
  
  <?	
	
}
  
?>
</table>


</body>
</html>