<?php 
 if(isset($_GET['newsevicio'])){
	   	 
  $csql = "INSERT INTO servicio (cliente,origen,destino,tipo_mudanza,costo,costo2,muebles,fecha,clave,km,m3,kmextra,empaquec,emplayet,cajacv,cajacr,desempaqueg,empaquem,seguro,otros,extras,tiempo_entrega_aprox,email,telefono,id_user, costoproveedor,pc_seguro,marca,modelo,placas,color,empaque_g,empaque_p,emplaye_t,desempaque,caja_closet,supervision_s,supervision_ps,maniobras_c,maniobras_d,permiso_t,proveedor,proveedor2,proveedor3,fecha_s,hora_s,ruta,metodo_p,medio,factura,presupuesto,niveles,pie_casa,articulo_v,complejidad,comentarios,whatsapp,modalidad) select cliente,origen,destino,tipo_mudanza,costo,costo2,muebles,'".date('Y-m-d H:i:s')."',clave,km,m3,kmextra,empaquec,emplayet,cajacv,cajacr,desempaqueg,empaquem,seguro,otros,extras,testimado,email,telefono,".$_SESSION['id_user'].",costoproveedor,pc_seguro,marca,modelo,placas,color,empaque_g,empaque_p,emplaye_t,desempaque,caja_closet,supervision_s,supervision_ps,maniobras_c,maniobras_d,permiso_t,proveedor1,proveedor2,proveedor3,fecha_s,hora_s,ruta,metodo_p,medio,factura,presupuesto,niveles,pie_casa,articulo_v,complejidad,comentarios,whatsapp,modalidad from cotizacion2 where clave='".$_GET['c']."'";   
 
$link->query($csql);

 $csql = "update cotizacion2 set estatus=3 where clave='".$_GET['c']."'";    
$link->query($csql);
?>
<script type="text/javascript">
location.href='tareas.php?verservicio=1&tr=5=1&c=<? echo $_GET['c']; ?>';
</script>
<? 
}

if(isset($_GET['elic'])){
  $csql = "delete from cotizacion2 where clave='".$_GET['c']."'";   
  $link->query($csql);
   ?>
<script language="JavaScript" type="text/javascript">
location.href='tareas.php?cs=1';
</script>
<?php } ?>
<?php /* 
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cotizaciones</h1>
          </div>
        
        </div>
      </div><!-- /.container-fluid -->
    </section>
*/ ?>

<div class="box box-danger">
           
            <div class="box-body">
                            <div class="row">


    <div class="box-body table-responsive no-padding" style="width:100%;">
<table class="table table-hover">
    <tr>
    <td align="center"></td>
    <td align="center"><strong>Folio</strong></td>
    <td align="center"><strong>Cliente</strong></td>
    <td align="center"><strong>Origen</strong></td>
    <td align="center"><strong>Destino</strong></td>
    <td align="center"><strong>Fecha</strong></td>
    <td align="center"><strong>Tipo</strong></td>
    <td style="width:100px;"></td>
    <td style="width:80px;"></td>

    </tr>
    <?
  include("config.php");

$query = "SELECT * from cotizador where estatus=1 order by id desc";
		$r=1;
    $result = $link->query($query);
	while($row=mysqli_fetch_row($result)){
		?>
  <tr style="vertical-align:middle; border:#5A5959 solid 1px; ">
  
  
  <td style="text-align:center; vertical-align:middle; "><?php 
  switch($row[1]){
      case '1':
        echo '<i class="fa-solid fa-truck-ramp-box"></i>';
        break;
      case '2':
        echo '<i class="fa-solid fa-car"></i>';
        break;
      case '3':
        echo '<i class="fa-solid fa-truck-moving"></i>';
        break;
    }

     ?></td>
    
    <td style="vertical-align:middle;"><?php echo $row[0]; ?></td>
    <td style="vertical-align:middle;"><?php echo $row[6]; ?></td>
    <td style="vertical-align:middle;"><?php echo $row[2]; ?></td>
    <td style="vertical-align:middle;"><?php echo $row[3]; ?></td>
    <td style="vertical-align:middle;"><?php echo substr($row[45],8,2).'-'.substr($row[45],5,2).'-'.substr($row[45],0,4); ?></td>
  
    <td style="vertical-align:middle;"><?php 
      switch($row[1]){
        case '1':
          echo 'Flete';
          break;
        case '2':
          echo 'Auto';
          break;
        case '3':
          echo 'Mudanza';
          break;
      }
       ?></td>
    <?php if($row[4]=='Traslado de auto/motocicleta'){ ?>
        <td style="vertical-align:middle;"><a class="btn btn-primary" href="cotizacionpdfvehiculo.php?c=<? echo $row[41]; ?>" target="_blank">Cotizacion</a></td>
    <?php }else{ ?>
      <?php if($row[4]=='Flete'){ ?>
        <td style="vertical-align:middle;"><a class="btn btn-primary" href="cotizacionpdfflete.php?c=<? echo $row[41]; ?>" target="_blank">Cotizacion</a></td>
    <?php }else{ ?>
     <td style="vertical-align:middle;"><a class="btn btn-primary" href="cotizacionpdf2021.php?c=<? echo $row[41]; ?>" target="_blank">Cotizacion</a></td>
    <?php } ?>
    <?php } ?>
    <td style="vertical-align:middle;"><a class="btn bg-yellow" href="tareas.php?tr=1&c=<? echo $row[41]; ?>&tipoc=<? echo $row[1]; ?>&edi=1">Editar</a></td>
    <?php /*<td style="vertical-align:middle;"><a class="btn bg-red" href="tareas.php?tr=3&c=<? echo $row[41]; ?>&elic=1" >Eliminar</a></td>
    <td style="vertical-align:middle;"><a class="btn bg-green" href="tareas.php?tr=3&c=<? echo $row[41]; ?>&newsevicio=1">Generar Servicio</a></td> */ ?>

  </tr> 
    <?php	} ?>
    </table>
    </div>

    
            </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
