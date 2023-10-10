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

  $query = "select id,cliente,origen,destino,tipo_mudanza,costo,costo2,muebles,fecha,clave,km,m3,kmextra,empaquec,emplayet,cajacv,cajacr,desempaqueg,empaquem,seguro,otros,extras,fecha_s,hora_s,calle_no_c,colonia_c,referencia_c,nom_c,tel_c,calle_no_d,colonia_d,referencia_d,nom_d,tel_d,anticipo,a_la_carga,antes_de_la_carga,forma_de_pago,tiempo_entrega_aprox,observaciones,proveedor,favorllevar,costocliente,costoproveedor,cscliente,seguro_prov  from servicio where estatus='2' and cerrado!='SI' ";
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
    <td align="center" ><strong>PROVEEDOR</strong></td>

    <td align="center"><strong>MONTO ASEGURADO</strong></td>
    <td align="center"><strong>COSTO SEGURO CLIENTE</strong></td>
    <td align="center"><strong>COSTO SEGURO PROVEEDOR</strong></td>
    <td align="center"><strong>UTILIDAD SEGURO</strong></td>


   
   
    <td align="center" ><strong>COSTO CLIENTE</strong></td>
    <td align="center"><strong>COSTO PROVEEDOR</strong></td>
    <td align="center"><strong>UTILIDAD</strong></td>

    <td align="center"><strong>P. CLIENTE<br>BANAMEX</strong></td>
    <td align="center"><strong>P. CLIENTE<br>INBURSA</strong></td>
    <td align="center"><strong>P. CLIENTE<br>BBVA</strong></td>
    <td align="center"><strong>P. CLIENTE<br>CUENTA PROVEEDOR</strong></td>
    <td align="center"><strong>P. CLIENTE<br>EFECTIVO DE CHOFER</strong></td>
    <td align="center"><strong>P. CLIENTE<br>CAJA CHICA</strong></td>
    <td align="center"><strong>P. CLIENTE<br>TC</strong></td>
    <td align="center"><strong>P. CLIENTE<br>SALDO A FAVOR</strong></td>
    <td align="center"><strong>P. CLIENTE<br>OTRO</strong></td>
    <td align="center"><strong>P. CLIENTE<br>TOTAL</strong></td>
     

    <td align="center"><strong>P. PROVEEDOR<br>BANAMEX</strong></td>
    <td align="center"><strong>P. PROVEEDOR<br>INBURSA</strong></td>
    <td align="center"><strong>P. PROVEEDOR<br>BBVA</strong></td>
    <td align="center"><strong>P. PROVEEDOR<br>CUENTA PROVEEDRO</strong></td>
    <td align="center"><strong>P. PROVEEDOR<br>EFECTIVO DE CHOFER</strong></td>
    <td align="center"><strong>P. PROVEEDOR<br>CAJA CHICA</strong></td>
    <td align="center"><strong>P. PROVEEDOR<br>TC</strong></td>
    <td align="center"><strong>P. PROVEEDOR<br>SALDO A FAVOR</strong></td>
    <td align="center"><strong>P. PROVEEDOR<br>OTRO</strong></td>
    <td align="center"><strong>P. PROVEEDOR<br>TOTAL</strong></td>
  </tr>
  
<?php
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
    <?php
$queryp = "select * from proveedores where id=".$row[40];
$resultp = $link->query($queryp);
$rowp=mysqli_fetch_row($resultp);
?>
    <td align="center" ><strong><? echo utf8_decode($rowp[1]).' '.utf8_decode($rowp[2]); ?></strong></td>
    <td align="center" ><strong><? echo number_format($row[19],2); ?></strong></td>
    <td align="center" ><strong><? echo number_format($row[44],2); ?></strong></td>
    <td align="center" ><strong><? echo number_format($row[45],2); ?></strong></td>
    <td align="center" ><strong><? $utseg=$row[44]-$row[45]; echo number_format($utseg,2); ?></strong></td>



   
    <td align="center" ><strong>$ <? echo number_format($row[42],2); ?></strong></td>
    <td align="center" ><strong>$ <? echo number_format($row[43],2); ?></strong></td>
    <td align="center" ><strong>$ <? $ut=$row[42]-$row[43]; echo number_format($ut,2); ?></strong></td>
   
    
    <td align="center" >
<?php
$d=0;
$totalc=0.0;
$query1 = "SELECT * FROM ingresosyegresos where id_mudanza=".$row[0]." and banco='BANAMEX' and referencia=1";
$result1 = $link->query($query1);
while($row1=mysqli_fetch_row($result1)){
  $dc1=(float)$row1[6];
$d++;
if($d!=1){ ?><br><?php }
?>
 <strong>$ <?php $totalc= $totalc+$dc1; echo number_format($dc1,2); ?></strong>
 <?php } ?>
 </td>

 <td align="center" >
 <?php
 $d=0;
$query7 ="SELECT * FROM ingresosyegresos where id_mudanza=".$row[0]." and banco='INBURSA' and referencia=1";
$result7 = $link->query($query7);
while($row7=mysqli_fetch_row($result7)){


  $dc7=(float)$row7[6];
  $d++;
if($d!=1){ ?><br><?php }
?>
 <strong>$ <?php $totalc= $totalc+$dc7; echo number_format($dc7,2); ?></strong>
 <?php
}
?>
 </td>

 <td align="center" >
 <?php
 $d=0;
$query7 = "SELECT * FROM ingresosyegresos where id_mudanza=".$row[0]." and banco='BBVA' and referencia=1";
$result7 = $link->query($query7);
while($row7=mysqli_fetch_row($result7)){


  $dc7=(float)$row7[6];
  $d++;
if($d!=1){ ?><br><?php }
?>
 <strong>$ <?php $totalc= $totalc+$dc7; echo number_format($dc7,2); ?></strong>
 <?php
}
?>
 </td>

 <td align="center" >
 <?php
 $d=0;
$query7 = "SELECT * FROM ingresosyegresos where id_mudanza=".$row[0]." and banco='PAGO A CUENTA PROVEEDOR' and referencia=1";
$result7 = $link->query($query7);
while($row7=mysqli_fetch_row($result7)){


  $dc7=(float)$row7[6];
  $d++;
if($d!=1){ ?><br><?php }
?>
 <strong>$ <?php $totalc= $totalc+$dc7; echo number_format($dc7,2); ?></strong>
 <?php
}
?>
 </td>

 <td align="center" >
 <?php
 $d=0;
$query2  = "SELECT * FROM ingresosyegresos where id_mudanza=".$row[0]." and banco='EFECTIVO CHOFER' and referencia=1";
$result2 = $link->query($query2);
while($row2=mysqli_fetch_row($result2)){


  $dc2=(float)$row2[6];
  $d++;
if($d!=1){ ?><br><?php }
?>
 <strong>$ <?php $totalc= $totalc+$dc2; echo number_format($dc2,2); ?></strong>
 <?php
}
?>
 </td>
 <td align="center" >
 <?php
 $d=0;
 
$query3="SELECT * FROM ingresosyegresos where id_mudanza=".$row[0]." and banco='CAJA CHICA' and referencia=1";
$result3 = $link->query($query3);
while($row3=mysqli_fetch_row($result3)){


$dc3=(float)$row3[6];

$d++;
if($d!=1){ ?><br><?php }
?>
 <strong>$ <?php $totalc= $totalc+$dc3; echo number_format($dc3,2); ?></strong>
 <?php
}
?>
 </td>
 <td align="center" >
 <?php
 $d=0;
$query4="SELECT * FROM ingresosyegresos where id_mudanza=".$row[0]." and banco='TC' and referencia=1";
$result4 = $link->query($query4);
while($row4=mysqli_fetch_row($result4)){
$dc4=(float)$row4[6];
$d++;
if($d!=1){ ?><br><?php }
?>
 <strong>$ <? $totalc= $totalc+$dc4; echo number_format($dc4,2); ?></strong>
 <?php
}
?>
 </td>
 <td align="center" >
 <?php
 $d=0;
$query5 = "SELECT * FROM ingresosyegresos where id_mudanza=".$row[0]." and banco='SALDO A FAVOR' and referencia=1";
$result5 = $link->query($query5);
while($row5=mysqli_fetch_row($result5)){
$dc5=(float)$row5[6];
$d++;
if($d!=1){ ?><br><?php }
?>
 <strong>$ <?php $totalc= $totalc+$dc5; echo number_format($dc5,2); ?></strong>
 <?php
}
?>
 </td>
 <td align="center" >
 <?php
 $d=0;
$query6="SELECT * FROM ingresosyegresos where id_mudanza=".$row[0]." and banco='OTRO' and referencia=1";
$result6 = $link->query($query6);
while($row6=mysqli_fetch_row($result6)){
$dc6=(float)$row6[6];
$d++;
if($d!=1){ ?><br><?php }
?>
 <strong>$ <?php  $totalc= $totalc+$dc6; echo number_format($dc6,2); ?></strong>
 <?php
}
?>
 </td>


<?php //$totalc=$dc1+$dc2+$dc3+$dc4+$dc5+$dc6; ?>
 <td align="center" ><strong>$ <? echo number_format($totalc,2); ?></strong></td>


 <td align="center" >
 <?php
 $totalp=0.0;
 $d=0;
$queryp1 ="SELECT * FROM ingresosyegresos where id_mudanza=".$row[0]." and banco='BANAMEX' and referencia=2";
$resultp1 = $link->query($queryp1);
while($rowp1=mysqli_fetch_row($resultp1)){
  $dcp1=(float)$rowp1[6];

  $d++;
  if($d!=1){ ?><br><?php }
  ?>
   <strong>$ <? $totalp=$totalp+$dcp1 ;echo number_format($dcp1,2); ?></strong>
   <?php
  }
  ?>
   </td>
   <td align="center" >
 <?php

 $d=0;
$query7="SELECT * FROM ingresosyegresos where id_mudanza=".$row[0]." and banco='INBURSA' and referencia=2";
$resultp7 = $link->query($query7);
while($rowp7=mysqli_fetch_row($resultp7)){
  $dcp7=(float)$rowp7[6];

  $d++;
  if($d!=1){ ?><br><?php }
  ?>
   <strong>$ <? $totalp=$totalp+$dcp7 ;echo number_format($dcp7,2); ?></strong>
   <?php
  }
  ?>
   </td>

   <td align="center" >
 <?php

 $d=0;
$query7 = "SELECT * FROM ingresosyegresos where id_mudanza=".$row[0]." and banco='PAGO A CUENTA PROVEEDOR' and referencia=2";
$resultp7 = $link->query($query7);
while($rowp7=mysqli_fetch_row($resultp7)){
  $dcp7=(float)$rowp7[6];

  $d++;
  if($d!=1){ ?><br><?php }
  ?>
   <strong>$ <? $totalp=$totalp+$dcp7 ;echo number_format($dcp7,2); ?></strong>
   <?php
  }
  ?>
   </td>


   <td align="center" >
 <?php

 $d=0;
$query7 = "SELECT * FROM ingresosyegresos where id_mudanza=".$row[0]." and banco='BBVA' and referencia=2";
$resultp7 = $link->query($query7);
while($rowp7=mysqli_fetch_row($resultp7)){
  $dcp7=(float)$rowp7[6];

  $d++;
  if($d!=1){ ?><br><?php }
  ?>
   <strong>$ <? $totalp=$totalp+$dcp7 ;echo number_format($dcp7,2); ?></strong>
   <?php
  }
  ?>
   </td>
   <td align="center" >
   <?php
   $d=0;
$query2 = "SELECT * FROM ingresosyegresos where id_mudanza=".$row[0]." and banco='EFECTIVO CHOFER' and referencia=2";
$resultp2 = $link->query($query2);
while($rowp2=mysqli_fetch_row($resultp2)){
  $dcp2=(float)$rowp2[6];

  $d++;
  if($d!=1){ ?><br><?php }
  ?>
   <strong>$ <? $totalp=$totalp+$dcp2; echo number_format($dcp2,2); ?></strong>
   <?php
  }
  ?>
   </td>
   <td align="center" >
   <?php
   $d=0;
$query3 = "SELECT * FROM ingresosyegresos where id_mudanza=".$row[0]." and banco='CAJA CHICA' and referencia=2";
$resultp3 = $link->query($query3);
while($rowp3=mysqli_fetch_row($resultp3)){
$dcp3=(float)$rowp3[6];
$d++;
  if($d!=1){ ?><br><?php }
  ?>
   <strong>$ <?php $totalp=$totalp+$dcp3; echo number_format($dcp3,2); ?></strong>
   <?php
  }
  ?>
   </td>
   <td align="center" >
   <?php
   $d=0;
$query4 = "SELECT * FROM ingresosyegresos where id_mudanza=".$row[0]." and banco='TC' and referencia=2";
$resultp4 = $link->query($query4);
while($rowp4=mysqli_fetch_row($resultp4)){
$dcp4=(float)$rowp4[6];
$d++;
  if($d!=1){ ?><br><?php }
  ?>
   <strong>$ <? $totalp=$totalp+$dcp4; echo number_format($dcp4,2); ?></strong>
   <?php
  }
  ?>
   </td>
   <td align="center" >
   <?php
   $d=0;
$query5 = "SELECT * FROM ingresosyegresos where id_mudanza=".$row[0]." and banco='SALDO A FAVOR' and referencia=2";
$resultp5 = $link->query($query5);
while($rowp5=mysqli_fetch_row($resultp5)){
$dcp5=(float)$rowp5[6];
$d++;
  if($d!=1){ ?><br><?php }
  ?>
   <strong>$ <?php $totalp=$totalp+$dcp5; echo number_format($dcp5,2); ?></strong>
   <?php
  }
  ?>
   </td>
   <td align="center" >
   <?php
   $d=0;
$query6 = "SELECT * FROM ingresosyegresos where id_mudanza=".$row[0]." and banco='OTRO' and referencia=2";
$resultp6 = $link->query($query6);
while($rowp6=mysqli_fetch_row($resultp6)){
$dcp6=(float)$rowp6[6];
$d++;
  if($d!=1){ ?><br><?php }
  ?>
   <strong>$ <? $totalp=$totalp+$dcp6; echo number_format($dcp6,2); ?></strong>
   <?php
  }
  ?>
   </td>
   

<?php  //$totalp=$dcp1+$dcp2+$dcp3+$dcp4+$dcp5+$dcp6; ?>
 <td align="center" ><strong>$ <?php echo number_format($totalp,2); ?></strong></td>


  </tr>
  
  <?php } ?>
</table>


</body>
</html>