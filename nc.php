<?
if(isset($_POST['guardarcotizacion'])){

$corr=0;
$cade="";
if($_POST['cliente']==''){
$corr=1;
$cade=$cade."Falta CLiente \\n";
}
if($_POST['origen']==''){
$corr=1;
$cade=$cade."Falta Origen \\n";
}
if($_POST['m3']==''){
$corr=1;
$cade=$cade."Falta M3 \\n";
}

  $c1=$_POST['cliente'];
   $c2=$_POST['origen'];
   $c3=$_POST['destino'];
   $c4=$_POST['tipo_mudanza'];
   $c5=$_POST['costo'];
   $c6=$_POST['costo2'];
   $c7=nl2br($_POST['muebles']);
   $c7='';
   $c8=date('Y-m-d H:i:s');
   $c9=md5(date('Y-m-d H:i:s').$c1.$c2.$c3);
   $c10=$_POST['km'];
   $c11=$_POST['m3'];
   $c12='';
   $c13='';
   $c14='';
   $c15='';
   $c16='';
   $c17='';
   $c18='';
   $c19='';
   $c20='';
   $c21='';
   $c22='';
   $c23='';
   $c24=$_POST['email'];
   $c25=$_POST['telefono'];
   $c26=$_SESSION['id_user'];
  $c5='';
   $c6='';
   $c27='';
   $c28=$_POST['sseguro'];
   $c29=$_POST['pcseguro'];
   $c30=$_POST['marca'];
   $c31=$_POST['modelo'];
   $c32=$_POST['tipo'];
   $c33='';
   $c34=0;
   $c35=0;
   $c36=0;
   $c37='0000-00-00';
   $c38='';

   $c39='';
   $c40='';
    $c41='';
   $c42='--';
   $c43='';
   $c44='';
   $c45='';
   $c46='';
   $c47='';
   $c48='';
   $c49='';
   $c50='';

   $c51='';

  $c52='0000-00-00';
 
if($corr!=1){

  $csql1 = "INSERT INTO cotizacion2(cliente,origen,destino,tipo_mudanza,costo,costo2,muebles,fecha,clave,km,m3,kmextra,empaquec,emplayet,cajacv,cajacr,desempaqueg,empaquem,seguro,otros,extras,testimado,email,telefono,id_user,costoproveedor,pc_seguro,marca,modelo,placas,color,proveedor1,proveedor2,proveedor3,fecha_s,hora_s,ruta,metodo_p,medio,factura,presupuesto,niveles,pie_casa,articulo_v,complejidad,comentarios,estatus,modalidad,tiempo_estimado,whatsapp,fecha_aprox) VALUES ('".$c1."','".$c2."','".$c3."','".$c4."','".$c5."','".$c6."','".$c7."','".$c8."','".$c9."','".$c10."','".$c11."','".$c12."','".$c13."','".$c14."','".$c15."','".$c16."','".$c17."','".$c18."','".$c28."','".$c20."','".$c21."','".$c22."','".$c24."','".$c25."','".$c26."','".$c27."','".$c29."','".$c30."','".$c31."','".$c32."','".$c33."','".$c34."','".$c35."','".$c36."','".$c37."','".$c38."','".$c39."','".$c40."','".$c41."','".$c42."','".$c43."','".$c44."','".$c45."','".$c46."','".$c47."','".$c48."',2,'".$c49."','".$c50."','".$c51."','".$c52."')";  
 //echo $csql.'<br>';
  $link->query($csql1);


 $csql2 = "INSERT INTO servicio (cliente,origen,destino,tipo_mudanza,costo,costo2,muebles,fecha,clave,km,m3,kmextra,empaquec,emplayet,cajacv,cajacr,desempaqueg,empaquem,seguro,otros,extras,tiempo_entrega_aprox,email,telefono,id_user, costoproveedor,pc_seguro,marca,modelo,placas,color,empaque_g,empaque_p,emplaye_t,desempaque,caja_closet,supervision_s,supervision_ps,maniobras_c,maniobras_d,permiso_t,proveedor,proveedor2,proveedor3,fecha_s,hora_s,ruta,metodo_p,medio,factura,presupuesto,niveles,pie_casa,articulo_v,complejidad,comentarios,whatsapp,modalidad) select cliente,origen,destino,tipo_mudanza,costo,costo2,muebles,'".date('Y-m-d H:i:s')."',clave,km,m3,kmextra,empaquec,emplayet,cajacv,cajacr,desempaqueg,empaquem,seguro,otros,extras,testimado,email,telefono,".$_SESSION['id_user'].",costoproveedor,pc_seguro,marca,modelo,placas,color,empaque_g,empaque_p,emplaye_t,desempaque,caja_closet,supervision_s,supervision_ps,maniobras_c,maniobras_d,permiso_t,proveedor1,proveedor2,proveedor3,fecha_s,hora_s,ruta,metodo_p,medio,factura,presupuesto,niveles,pie_casa,articulo_v,complejidad,comentarios,whatsapp,modalidad from cotizacion2 where clave='".$c9."'";   
      
      $link->query($csql2);

       $csql3 = "update cotizacion2 set estatus=3 where clave='".$c9."'";    
      $link->query($csql3);


/*
if($c4=='Vehiculo'){
?>
<script language="JavaScript" type="text/javascript">
location.href='tareas.php?cs=1&c=<? echo $c9; ?>"&abrir=4';
</script>
<?
}else{
?>
<script language="JavaScript" type="text/javascript">
location.href='tareas.php?cs=1&c=<? echo $c9; ?>"&abrir=2';
</script>
<?
} */
  ?>
<script type="text/javascript">
location.href='tareas.php?verservicio=1&verserv=1&c=<? echo $c9; ?>';
</script>
    <? 

}else{
  ?>
<script type="text/javascript">alert('<?php echo $cade; ?>');</script>
<?php
}


   
 }
?>



<div class="row">
    <div class="col-md-12">
<form id="formn" name="formn" action="tareas.php?nc=1#mercancia" method="post" enctype="multipart/form-data">

<div class="col-md-12" style="width: 100%; overflow: hidden;">
<div class="form-group col-md-3"  >
            <label>Origen</label>
               <input  name="origen" id="origen"  style="text-transform: uppercase;" class="form-control" type="text"  autocomplete="off" value="<?php  echo $_POST['origen']; ?>" >
              </div>

              <div class="form-group col-md-3"  >
            <label>Destino</label>
               <input name="destino" id="destino" style="text-transform: uppercase;" class="form-control" type="text" autocomplete="off" value="<?php  echo $_POST['destino']; ?>" onChange="javascript: buscarkm();"  >
              </div>

              <div class="form-group col-md-3"  >
            <label>M3</label>
            <input name="m3" id="m3" style="text-transform: uppercase;" class="form-control" onkeypress="return valida(event)" type="text" autocomplete="off" value="<? echo $_POST['m3']; ?>" >
               <? //echo $row[11]; ?>
              </div>
<div class="form-group col-md-3"  >
            <label>Cliente</label>
               <input name="cliente" id="cliente" autocomplete="off"  style="text-transform: uppercase;" class="form-control" type="text" value="<?php  echo $_POST['cliente']; ?>">
              </div>
              <div class="form-group col-md-3"  >
            <label>TELEFONO</label>
               <input name="telefono" id="telefono"  style="text-transform: uppercase;" class="form-control" type="text" value="<?php  echo $_POST['telefono']; ?>" >
              </div>
           


            <div class="form-group col-md-3"  >
            <label>Tipo Mudanza</label>
              <select class="form-control select2" style=" text-transform: uppercase;"  name="tipo_mudanza" id="tipo_mudanza" onchange="this.form.submit()">
         <option value="--">--</option>
         <option <? if($_POST['tipo_mudanza']=='Vehiculo'){ ?> selected <? } ?> <? if($row[4]=='Vehiculo'){ ?> selected <? } ?> value="Vehiculo">Vehiculo</option>
                   <option <? if($_POST['tipo_mudanza']=='Local'){ ?> selected <? } ?> <? if($row[4]=='Local'){ ?> selected <? } ?> value="Local">Local</option>
                   <option <? if($_POST['tipo_mudanza']=='Moto'){ ?> selected <? } ?> <? if($row[4]=='Moto'){ ?> selected <? } ?> value="Moto">Moto</option>
                  <option <? if($_POST['tipo_mudanza']=='Auto con Mudanza'){ ?> selected <? } ?> <? if($row[4]=='Auto con Mudanza'){ ?> selected <? } ?> value="Auto con Mudanza">Auto con Mudanza</option>
                  <option <? if($_POST['tipo_mudanza']=='Compartido'){ ?> selected <? } ?> <? if($row[4]=='Compartido'){ ?> selected <? } ?> value="Compartido">Compartido</option>
        <option <? if($_POST['tipo_mudanza']=='Exclusivo'){ ?> selected <? } ?> <? if($row[4]=='Exclusivo'){ ?> selected <? } ?> value="Exclusivo">Exclusivo</option>
        <option <? if($_POST['tipo_mudanza']=='Maniobras'){ ?> selected <? } ?> <? if($row[4]=='Maniobras'){ ?> selected <? } ?> value="Maniobras">Maniobras</option>
        <option <? if($_POST['tipo_mudanza']=='Flete'){ ?> selected <? } ?> <? if($row[4]=='Flete'){ ?> selected <? } ?> value="Flete">Flete</option>
        <option <? if($_POST['tipo_mudanza']=='Paqueteria'){ ?> selected <? } ?> <? if($row[4]=='Paqueteria'){ ?> selected <? } ?> value="Paqueteria">Paqueteria</option>
                    <option <? if($_POST['tipo_mudanza']=='Exclusivo y Compartido'){ ?> selected <? } ?> <? if($row[4]=='Exclusivo y Compartido'){ ?> selected <? } ?> value="Exclusivo y Compartido">Exclusivo y Compartido</option>
          </select>
              </div>
         <!--
              <div class="form-group col-md-3"  >
            <label>Modalidad</label>
              <select class="form-control select2" style=" text-transform: uppercase;"  name="modalidad" id="modalidad" onchange="this.form.submit()">
         <option value="--">--</option>
         <option <? if($_POST['tipo_mudanza']=='Compartido'){ ?> selected <? } ?> <? if($row[4]=='Compartido'){ ?> selected <? } ?> value="Compartido">Compartido</option>
                   <option <?php  if($_POST['modalidad']=='Mudanza'){ ?> selected <?php  } ?> value="Mudanza">Mudanza</option>
                   <option <?php  if($_POST['modalidad']=='Auto'){ ?> selected <?php  } ?> value="Auto">Auto</option>
                   <option <?php  if($_POST['modalidad']=='Flete'){ ?> selected <?php  } ?> value="Flete">Flete</option>
                </select>
              </div>

-->

<?php if((isset($_POST['tipo_mudanza']) and $_POST['tipo_mudanza']=='Vehiculo') || (isset($_POST['tipo_mudanza']) and $_POST['tipo_mudanza']=='Auto con Mudanza')){ ?>
<div class="form-group col-md-3"  >

            <label>Marca</label>
               <input name="marca" id="marca"  style="text-transform: uppercase;" class="form-control" type="text" value="<?php  echo $_POST['marca']; ?>" >
              </div>
              <div class="form-group col-md-3"  >

            <label>Modelo</label>
               <input name="modelo" id="modelo"  style="text-transform: uppercase;" class="form-control" type="text" value="<?php  echo $_POST['modelo']; ?>" >
              </div>
              <div class="form-group col-md-3"  >

            <label>Tipo de Auto/Moto</label>
               <input name="tipo" id="tipo"  style="text-transform: uppercase;" class="form-control" type="text" value="<?php  echo $_POST['tipo']; ?>" >
              </div>
            <?php } ?>

</div>



 <div class="box-footer">
  <div class="form-group" style="width: 33%; align-content: center;">
               <?/* <button type="submit" class="btn btn-primary"  name="borrador" id="borrador">Generar Borrador</button> */?>
                <button type="submit" class="btn btn-primary"  name="guardarcotizacion" id="guardarcotizacion">Generar Servicio</button>
            </div>
        
              </div>

</div>
</div>




              </form>
            </div>
          </div>
        </div>

          </div>

<script type="text/javascript">

function changeTipoServ(v){
  //alert(v);
}

  function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;
  
    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
  if (tecla==46){
        return '.';
    }
  if (tecla==58){
        return ':';
    }
  
     if (tecla==0){
       
    }   
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
  


</script>
