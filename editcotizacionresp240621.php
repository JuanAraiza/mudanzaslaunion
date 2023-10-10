
<div class="row">
    <div class="col-md-12">
<form id="formn" name="formn" action="tareas.php?edit=1&nc=1&c=<? echo $_GET['c']; ?>" method="post" >

<input id="cuenta" name="cuenta" type="hidden" value="0">
	<input id="cuenta2" name="cuenta2" type="hidden" value="1">
	<input id="cuenta3" name="cuenta3" type="hidden" value="1">
  <input name="total_v" id="total_v" type="hidden"/> 
<input id="agregados" name="agregados" type="hidden">

<?
$link=mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
	mysql_select_db($bbdd,$link) or die("resultado=".urlencode(mysql_error()));
	$result=mysql_query("SELECT * from cotizacion2 where clave='".$_GET['c']."'", $link);
	$row=mysql_fetch_row($result);
?>
<input type="hidden" name="cla" id="cla" value="<? echo $_GET['c']; ?>">

<div class="col-md-6" style="width: 100%; overflow: hidden;">
<div class="form-group" >
            <label>Origen</label>
               <input  name="origen" id="origen"  style="text-transform: uppercase;" class="form-control" type="text"  autocomplete="off" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['origen']; ?>"  <?  }else{ ?>  value="<? echo $row[2]; ?>" <? } ?> >
              </div>

              <div class="form-group">
            <label>Destino</label>
               <input name="destino" id="destino" style="text-transform: uppercase;" class="form-control" type="text" autocomplete="off" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['destino']; ?>"  <?  }else{ ?>  value="<? echo $row[3]; ?>"  <? } ?> onChange="javascript: buscarkm();"  >
              </div>
<div class="form-group" >
            <label>Cliente</label>
               <input name="cliente" id="cliente" autocomplete="off"  style="text-transform: uppercase;" class="form-control" type="text" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['cliente']; ?>"  <?  }else{ ?>  value="<? echo $row[1]; ?>" <? } ?>>
              </div>
              <div class="form-group" style="height: 92px;">
                  <label>TELEFONO:</label>
                   <input name="telefono" id="telefono" placeholder=""  style="text-transform: uppercase;" class="form-control" type="text"  <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['telefono']; ?>"  <?  }else{ ?>  value="<? echo $row[24]; ?>" <? } ?>  >
                </div>

                <div class="form-group" style="height: 92px;">
                  <label>WHATSAPP:</label>
                   <input name="whatsapp" id="whatsapp" placeholder=""  style="text-transform: uppercase;" class="form-control" type="text"  <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['whatsapp']; ?>"  <?  }else{ ?>  value="<? echo $row[60]; ?>" <? } ?>  >
                </div>
              
              <? /*
<div class="form-group" style="width: 100px;">
            <label>KM</label>
               <input name="km" id="km"  style="text-transform: uppercase;" class="form-control" type="text" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['km']; ?>"  <?  }else{ ?>  value="<? echo $row[10]; ?>" <? } ?>onkeypress="return valida(event)" >
              </div>
*/ ?>
              <div class="form-group" style="width: 100px;">
            <label>M3</label>
               <input name="m3" id="m3"  style="text-transform: uppercase;" class="form-control" type="text" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['m3']; ?>"  <?  }else{ ?>  value="<? echo $row[11]; ?>" <? } ?> onkeypress="return valida(event)" >
              </div>

             
<? /*

              <div class="form-group">
                  <label>Tiempo Estimado:</label>
                   <input name="testimado" id="testimado"  style="text-transform: uppercase;" class="form-control" type="text"  <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['testimado']; ?>"  <?  }else{ ?>  value="<? echo $row[22]; ?>" <? } ?>  >
                </div>
                <div class="form-group">
                  <label>CORREO ELECTRONICO:</label>
                   <input name="email" id="email"  style="text-transform: uppercase;" class="form-control" type="text"  <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['email']; ?>"  <?  }else{ ?>  value="<? echo $row[23]; ?>" <? } ?>  >
                </div> */ ?>
                

                  <div class="form-group" style=" height: 92px;">
            <label>Tipo Mudanza</label>
              <select class="form-control select2" style="width: 100%; text-transform: uppercase;"  name="tipo_mudanza" id="tipo_mudanza"  onChange="changeTipoServ(this.value)">
                  <option value="--">--</option>
                  <option <? if($_POST['tipo_mudanza']=='Mudanza Nacional'){ ?> selected <? } ?> <? if($row[4]=='Mudanza Nacional'){ ?> selected <? } ?> value="Mudanza Nacional">Mudanza Nacional</option>
                  <option <? if($_POST['tipo_mudanza']=='Mudanza Local'){ ?> selected <? } ?> <? if($row[4]=='Mudanza Local'){ ?> selected <? } ?> value="Mudanza Local">Mudanza Local</option>
         <option <? if($_POST['tipo_mudanza']=='Mudanza Internacional'){ ?> selected <? } ?> <? if($row[4]=='Mudanza Internacional'){ ?> selected <? } ?> value="Mudanza Internacional">Mudanza Internacional</option>
         <option <? if($_POST['tipo_mudanza']=='Mudanza de oficina'){ ?> selected <? } ?> <? if($row[4]=='Mudanza de oficina'){ ?> selected <? } ?> value="Mudanza de oficina">Mudanza de oficina</option>
         <option <? if($_POST['tipo_mudanza']=='Flete'){ ?> selected <? } ?> <? if($row[4]=='Flete'){ ?> selected <? } ?> value="Flete">Flete</option>
         <option <? if($_POST['tipo_mudanza']=='Traslado de auto/motocicleta'){ ?> selected <? } ?> <? if($row[4]=='Traslado de auto/motocicleta'){ ?> selected <? } ?> value="Traslado de auto/motocicleta">Traslado de auto/motocicleta</option>
                    <option <? if($_POST['tipo_mudanza']=='Mudanza+traslado de auto/moto'){ ?> selected <? } ?> <? if($row[4]=='Mudanza+traslado de auto/moto'){ ?> selected <? } ?> value="Mudanza+traslado de auto/moto">Mudanza+traslado de auto/moto</option>

<?php /*
                  <option <? if($_POST['tipo_mudanza']=='Vehiculo'){ ?> selected <? } ?> <? if($row[4]=='Vehiculo'){ ?> selected <? } ?> value="Vehiculo">Vehiculo</option>
                  <option <? if($_POST['tipo_mudanza']=='Moto'){ ?> selected <? } ?> <? if($row[4]=='Moto'){ ?> selected <? } ?> value="Moto">Moto</option>
                  <option <? if($_POST['tipo_mudanza']=='Auto con Mudanza'){ ?> selected <? } ?> <? if($row[4]=='Auto con Mudanza'){ ?> selected <? } ?> value="Auto con Mudanza">Auto con Mudanza</option>
                  <option <? if($_POST['tipo_mudanza']=='Compartido'){ ?> selected <? } ?> <? if($row[4]=='Compartido'){ ?> selected <? } ?> value="Compartido">Compartido</option>
        <option <? if($_POST['tipo_mudanza']=='Exclusivo'){ ?> selected <? } ?> <? if($row[4]=='Exclusivo'){ ?> selected <? } ?> value="Exclusivo">Exclusivo</option>
        <option <? if($_POST['tipo_mudanza']=='Flete'){ ?> selected <? } ?> <? if($row[4]=='Flete'){ ?> selected <? } ?> value="Flete">Flete</option>
        <option <? if($_POST['tipo_mudanza']=='Paqueteria'){ ?> selected <? } ?> <? if($row[4]=='Paqueteria'){ ?> selected <? } ?> value="Paqueteria">Paqueteria</option>
        <option <? if($_POST['tipo_mudanza']=='Exclusivo y Compartido'){ ?> selected <? } ?> <? if($row[4]=='Exclusivo y Compartido'){ ?> selected <? } ?> value="Exclusivo y Compartido">Exclusivo y Compartido</option>

        */ ?>
        </select>
              </div>

              <div class="form-group" style=" height: 92px;">
            <label>Modalidad</label>
              <select class="form-control select2" style="width: 100%; text-transform: uppercase;"  name="modalidad" id="modalidad" >
                  <option value="--">--</option>
                  <option <? if($_POST['modalidad']=='Mudanza'){ ?> selected <? } ?> <? if($row[102]=='Mudanza'){ ?> selected <? } ?> value="Mudanza">Mudanza</option>
                  <option <? if($_POST['modalidad']=='Auto'){ ?> selected <? } ?> <? if($row[102]=='Auto'){ ?> selected <? } ?> value="Auto">Auto</option>
                  <option <? if($_POST['modalidad']=='Flete'){ ?> selected <? } ?> <? if($row[102]=='Flete'){ ?> selected <? } ?> value="Flete">Flete</option>
                </select>
              </div>


<div id="divve" <? if($row[4]!='Vehiculo'){ ?> style="display: none;" <? } ?>>
            
            <div class="form-group" style="height: 92px;" >

            <label>Marca</label>
               <input name="marca" id="marca"  style="text-transform: uppercase;" class="form-control" type="text" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['marca']; ?>"  <?  }else{ ?>  value="<? echo $row[28]; ?>" <? } ?> >
              </div>
              <div class="form-group" style="height: 92px;" >

            <label>Modelo</label>
               <input name="modelo" id="modelo"  style="text-transform: uppercase;" class="form-control" type="text" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['modelo']; ?>"  <?  }else{ ?>  value="<? echo $row[29]; ?>" <? } ?> >
              </div>
              <div class="form-group"  style="height: 92px;">

            <label>Tipo de Auto</label>
               <input name="tipo" id="tipo"  style="text-transform: uppercase;" class="form-control" type="text" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['tipo']; ?>"  <?  }else{ ?>  value="<? echo $row[30]; ?>" <? } ?> >
              </div>
            




</div>

<div class="form-group" style="height: 92px;">
                  <label>FECHA DEL SERVICIO</label>
                        <div class="input-group">
                          <input  class="form-control" autocomplete="off"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask maxlength="10" type="text" name="fecha_s" id="datepicker" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['fecha_s']; ?>"  <?  }else{ ?>  value="<? echo substr($row[45],8,2).'/'.substr($row[45],5,2).'/'.substr($row[45],0,4); ?>" <? } ?>>
                    </div>
                </div>


                 <div class="form-group" style="height: 92px;">
                  <label>HORA DEL SERVICIO</label>
                  <input type="text" name="hora_s"  class="form-control" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['hora_s']; ?>"  <?  }else{ ?>  value="<? echo $row[46]; ?>" <? } ?>>
                </div>


                
                 <div class="form-group" style="height: 92px;">
                  <label>Costo Cliente:</label>
                   <input name="costo" id="costo"  style="text-transform: uppercase;" class="form-control" type="text" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['costo']; ?>"  <?  }else{ ?>  value="<? echo $row[5]; ?>" <? } ?>  >
                </div>
                <div class="form-group" style="height: 92px;">
                  <label>Costo Proveedor:</label>
                   <input name="costo2" id="costo2"  style="text-transform: uppercase;" class="form-control" type="text" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['costo2']; ?>"  <?  }else{ ?>  value="<? echo $row[26]; ?>" <? } ?>  >
                </div>


<div class="form-group" style="height: 92px;">
               <label>PROVEEDOR 1</label>
               
               <select class="form-control select2" id="proveedor1" name="proveedor1">
                  <option value="--">--</option>
                   
                  <?
  $resultp = mysql_query("select * FROM proveedores", $link);
while ($rowp = mysql_fetch_row($resultp)){
  ?>

<option <? if($rowp[0]==$row[42]){ ?> selected <? } ?> value="<? echo $rowp[0]; ?>"><? echo htmlentities($rowp[1]).' '.htmlentities($rowp[2]).' - '.$rowp[6] ; ?></option>
<? } ?>

                </select>
              </div>
              <div class="form-group" style="height: 92px;">
               <label>PROVEEDOR 2</label>
               
               <select class="form-control select2" id="proveedor2" name="proveedor2">
                  <option value="--">--</option>
                   
                  <?
  $resultp = mysql_query("select * FROM proveedores", $link);
while ($rowp = mysql_fetch_row($resultp)){
  ?>

<option <? if($rowp[0]==$row[43]){ ?> selected <? } ?> value="<? echo $rowp[0]; ?>"><? echo htmlentities($rowp[1]).' '.htmlentities($rowp[2]).' - '.$rowp[6] ; ?></option>
<? } ?>

                </select>
              </div>
              <div class="form-group" style="height: 92px;">
               <label>PROVEEDOR 3</label>
               
               <select class="form-control select2" id="proveedor3" name="proveedor3">
                  <option value="--">--</option>
                   
                  <?
  $resultp = mysql_query("select * FROM proveedores", $link);
while ($rowp = mysql_fetch_row($resultp)){
  ?>

<option <? if($rowp[0]==$row[44]){ ?> selected <? } ?> value="<? echo $rowp[0]; ?>"><? echo htmlentities($rowp[1]).' '.htmlentities($rowp[2]).' - '.$rowp[6] ; ?></option>
<? } ?>

                </select>
              </div>


<div class="form-group"  style="height: 92px;" >
            <label>Empaque a Granel</label>
               <input name="empaque_g" id="empaque_g"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="No. Cajas" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['empaque_g']; ?>"  <?  }else{ ?>  value="<? echo $row[32]; ?>" <? } ?> >
              </div>
              
              <div class="form-group" style="height: 92px;" >
            <label>Empaque Profecional</label>
               <input name="empaque_p" id="empaque_p"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="$$$" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['empaque_p']; ?>"  <?  }else{ ?>  value="<? echo $row[33]; ?>" <? } ?> >
              </div>
              <div class="form-group" style="height: 92px;" >
            <label>Emplaye Total</label>
               <input name="emplaye_t" id="emplaye_t"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="No. Rollos" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['emplaye_t']; ?>"  <?  }else{ ?>  value="<? echo $row[34]; ?>" <? } ?> >
              </div>
              <div class="form-group" style="height: 92px;" >
            <label>Desempaque</label>
               <input name="desempaque" id="desempaque"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="No. Cajas" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['desempaque']; ?>"  <?  }else{ ?>  value="<? echo $row[35]; ?>" <? } ?> >
              </div>
              <div class="form-group" style="height: 92px;" >
            <label>Caja Closet</label>
               <input name="caja_closet" id="caja_closet"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="No. Cajas" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['caja_closet']; ?>"  <?  }else{ ?>  value="<? echo $row[36]; ?>" <? } ?> >
              </div>
              <div class="form-group" style="height: 92px;" >
            <label>Supervision Sencilla</label>
               <input name="supervision_s" id="supervision_s"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="M3" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['supervision_s']; ?>"  <?  }else{ ?>  value="<? echo $row[37]; ?>" <? } ?> >
              </div>
              
<div class="form-group" style="height: 92px;" >
            <label>Supervision por servicio</label>
               <input name="supervision_ps" id="supervision_ps"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['supervision_ps']; ?>"  <?  }else{ ?>  value="<? echo $row[38]; ?>" <? } ?> >
              </div>
              
            <div class="form-group" style="height: 92px;" >
            <label>Maniobras Carga</label>
               <input name="maniobras_c" id="maniobras_c"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['maniobras_c']; ?>"  <?  }else{ ?>  value="<? echo $row[39]; ?>" <? } ?> >
              </div>
              <div class="form-group" style="height: 92px;" >
            <label>Maniobras Descarga</label>
               <input name="maniobras_d" id="maniobras_d"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['maniobras_d']; ?>"  <?  }else{ ?>  value="<? echo $row[40]; ?>" <? } ?> >
              </div>
              
    <div class="form-group"  style="height: 92px;">
      <label>Seguro</label>
      <input name="sseguro" id="sseguro"  style="text-transform: uppercase;" placeholder="Valor Declarado"  class="form-control" type="text" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['sseguro']; ?>"  <?  }else{ ?>  value="<? echo $row[19]; ?>" <? } ?> >
      </div>

              <div class="form-group" style="height: 92px;" >
            <label>Porcentaje Seguro</label>
               <input name="pcseguro" id="pcseguro"  placeholder="0.0" style="text-transform: uppercase;" class="form-control" type="text" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['pcseguro']; ?>"  <?  }else{ ?>  value="<? echo $row[27]; ?>" <? } ?> >
              </div>

<div class="form-group" style="height: 92px;" >
            <label>Permiso de Transito</label>
               <input name="permiso_t" id="permiso_t"  style="text-transform: uppercase;" class="form-control" type="text" placeholder="$$$" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['permiso_t']; ?>"  <?  }else{ ?>  value="<? echo $row[41]; ?>" <? } ?> >
              </div>




              <div class="form-group" style="height: 92px;" >
            <label>Ruta</label>
              <select class="form-control select2" style=" text-transform: uppercase;"  name="ruta" id="ruta" >
         <option value="--">--</option>
                   <option <? if($row[47]=='México – Tijuana'){ ?> selected <? } ?> value="México – Tijuana">México – Tijuana</option>
                   <option <? if($row[47]=='México-Cancún'){ ?> selected <? } ?> value="México-Cancún">México-Cancún</option>
                   <option <? if($row[47]=='Cd Mx-GDL'){ ?> selected <? } ?> value="Cd Mx-GDL">Cd Mx-GDL</option>
                   <option <? if($row[47]=='México – Monterrey'){ ?> selected <? } ?> value="México – Monterrey">México – Monterrey</option>
                   <option <? if($row[47]=='GDL - TIJUANA'){ ?> selected <? } ?> value="GDL - TIJUANA">GDL - TIJUANA</option>
                  </select>
              </div>

<div class="form-group"  style="height: 92px;" >
<label>Metodo de Pago</label>
   <input name="metodo_p" id="metodo_p"  style="text-transform: uppercase;" class="form-control" type="text" value="<? echo $row[48]; ?>" >
  </div>

  <div class="form-group" style="height: 92px;" >
            <label>Medio por el que se entero</label>
              <select class="form-control select2" style=" text-transform: uppercase;"  name="medio" id="medio" onChange="cambioMedio(this.value)" >
         
         <option value="<?php echo $row[49]; ?>"><?php echo $row[49]; ?></option>
                   <option  value="FB">FB</option>
                   <option  value="Mudanzas Mx">Mudanzas Mx</option>
                   <option  value="Recomendación">Recomendación</option>
                   <option value="Otro">Otro</option>
                    </select>
              </div>

              <div class="form-group" style="height: 92px; display:none;" id="otro_medio" >
<label>Otro Medio</label>
   <input name="otro_m" id="otro_m"  style="text-transform: uppercase;" class="form-control" type="text"  >
  </div>

      <div class="form-group" style="height: 92px;" >
            <label>Requiere Factura?</label>
              <select class="form-control select2" style=" text-transform: uppercase;"  name="factura" id="factura" >
         <option value="--">--</option>
                   <option <? if($row[50]=='SI'){ ?> selected <? } ?> value="SI">SI</option>
                   <option <? if($row[50]=='NO'){ ?> selected <? } ?> value="NO">NO</option>
                   
                    </select>
              </div>

             

  <div class="form-group" style="height: 92px;" >
<label>Presupuesto Maximo</label>
   <input name="presupuesto" id="presupuesto"  style="text-transform: uppercase;" class="form-control" type="text" value="<? echo $row[51]; ?>" >
  </div>

  <div class="form-group" style="height: 92px;" >
<label>Niveles de la Casa</label>
   <input name="niveles" id="niveles"  style="text-transform: uppercase;" class="form-control" type="text" value="<? echo $row[52]; ?>" >
  </div>



  <div class="form-group" style="height: 92px;" >
            <label>Puede descargar a pie de casa?</label>
              <select class="form-control select2" style=" text-transform: uppercase;"  name="pie_casa" id="pie_casa" >
         <option value="--">--</option>
                   <option <? if($row[53]=='SI'){ ?> selected <? } ?> value="SI">SI</option>
                   <option <? if($row[53]=='NO'){ ?> selected <? } ?> value="NO">NO</option>
                   
                    </select>
  </div>     

  <div class="form-group" style="height: 92px;" >
<label>Articulo de Valor</label>
   <input name="articulo_v" id="articulo_v"  style="text-transform: uppercase;" class="form-control" type="text" value="<? echo $row[54]; ?>" >
  </div>

  <div class="form-group" style="height: 92px;" >
<label>Complejidad de Maniobra</label>
   <input name="complejidad" id="complejidad"  style="text-transform: uppercase;" class="form-control" type="text" value="<? echo $row[55]; ?>" >
  </div>


  <div class="form-group" style="height: 92px;">
                  <label>FECHA DEL SERVICIO</label>
                        <div class="input-group">
                          <input  class="form-control" autocomplete="off"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask maxlength="10" type="text" name="fecha_s" id="datepicker" value="<? echo substr($row[45],8,2).'/'.substr($row[45],5,2).'/'.substr($row[45],0,4); ?>">
                    </div>
                </div>


                <div class="form-group" style="height: 92px;">
                  <label>FECHA APROXIMADA DEL SERVICIO</label>
                        <div class="input-group">
                          <input  class="form-control" autocomplete="off"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask maxlength="10" type="text" name="fecha_aprox" id="fecha_aprox" value="<? echo substr($row[61],8,2).'/'.substr($row[61],5,2).'/'.substr($row[61],0,4); ?>">
                    </div>
                </div>

             
  <div class="form-group" style="height: 92px;" >
<label>Tiempo estimado de entrega</label>
   <input name="tiempo_estimado" id="tiempo_estimado"  style="text-transform: uppercase;" class="form-control" type="text" value="<? echo $row[59]; ?>" >
  </div>

                

                <div   id="agregadodiv" style="height: auto; overflow: scroll; width: 100%; ">

</div>


              <div class="form-group" style="width: 35%; float: left; padding: 5px; height: 95px;">
            <label>Mercancia</label>
           
            <select name="mercancia" id="mercancia" class="form-control select2" style="margin-bottom: 1em;" onchange="this.form.submit()">
                <option value="--">--</option>
                <?php 
                  include('config.php');
                  $link=mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
                    mysql_select_db($bbdd,$link) or die("resultado=".urlencode(mysql_error()));
                    $resultm=mysql_query("SELECT * from medidas", $link);
                    while($rowm=mysql_fetch_row($resultm)){
                ?>
                <option <?php if(isset($_POST['mercancia'])){ if($_POST['mercancia']==utf8_encode($rowm[1])){ ?> selected <?php } } ?> value="<?php echo utf8_encode($rowm[1]); ?>"><?php echo utf8_encode($rowm[1]); ?></option>
                
                <?php } ?>
                <option  <?php if(isset($_POST['mercancia'])){ if($_POST['mercancia']==999999){ ?> selected <?php } } ?>  value="999999">Otro</option>
      </select>

      <?php if(isset($_POST['mercancia']) and $_POST['mercancia']==999999){ ?>
        <input name="mercancia2" id="mercancia2" class="form-control" type="text"   >
      <?php } ?>

    </div>

<?php if(isset($_POST['mercancia'])){
  //echo 'aqui merca';
  $resultmp=mysql_query("SELECT * from medidas where nombre='".$_POST['mercancia']."'", $link);
  $rowmp=mysql_fetch_row($resultmp);
  ?> 


    <div class="form-group" style="width: 10%; float: left; padding: 5px; height: 95px;">
             <label>Alto</label>
              <input name="alto" id="alto" onKeyPress="return valida(event)"  <?php if(isset($_POST['mercancia'])){ ?> value="<?php echo $rowmp[2]; ?>" <?php } ?> class="form-control" type="text"   >
    </div>
    <div class="form-group" style="width: 10%; float: left; padding: 5px; height: 95px;">
             <label>Ancho</label>
              <input name="ancho" id="ancho" onKeyPress="return valida(event)"  class="form-control" type="text"  <?php if(isset($_POST['mercancia'])){ ?> value="<?php echo $rowmp[3]; ?>" <?php } ?>  >
    </div>
    <div class="form-group" style="width: 10%; float: left; padding: 5px; height: 95px;">
             <label>Profundiad</label>
              <input name="profundidad" id="profundidad" onKeyPress="return valida(event)"  class="form-control" type="text"  <?php if(isset($_POST['mercancia'])){ ?> value="<?php echo $rowmp[4]; ?>" <?php } ?>  >
    </div>
    <div class="form-group" style="width: 10%; float: left; padding: 5px; height: 95px;">
             <label>Peso</label>
              <input name="peso" id="peso" onKeyPress="return valida(event)"  class="form-control" type="text" >
    </div>
    <div class="form-group" style="width: 10%; float: left; padding: 5px; height: 95px;">
             <label>Cantidad</label>
              <input name="cantidad" id="cantidad" onKeyPress="return valida(event)"  class="form-control" type="text"   >
    </div>
    
  
           


<div class="form-group" style="width:15%; float: left; padding: 5px;">
<label>&nbsp;</label>
<input type="button" name="agregar" id="agregar" class="form-control" value="Agregar" onClick="agregars();" type="text">
</div>

<?php } ?>

</div>

<div class="col-md-12" style=" overflow: hidden;">



<div class="form-group" id="lista_muebles" <? if($row[4]=='Vehiculo'){ ?> style="display: none;" <? } ?>>
                  <label>Lista de muebles:</label>
                  <textarea  id="muebles" name="muebles" class="form-control" rows="3" placeholder="muebles ..." style="text-transform: uppercase;" ><? if(isset($_POST['borrador'])){  echo str_replace('<br />','',$_POST['muebles']);  }else{  echo str_replace('<br />','',$row[7]); } ?></textarea>
                </div>

                <div class="form-group" id="lista_muebles">
                  <label>Comentarios</label>
                  <textarea  id="comentarios" name="comentarios" class="form-control" rows="3" placeholder="comentarios ..." style="text-transform: uppercase;" ><? echo str_replace('<br />','',$row[56]); ?></textarea>
                </div>


           <? /*     <div class="form-group">
                  <label>Otros:</label>
                  <textarea  id="otros" name="otros" class="form-control" rows="3" placeholder="..." style="text-transform: uppercase;" ><? if(isset($_POST['borrador'])){  echo str_replace('<br />','',$_POST['otros']);  }else{  echo str_replace('<br />','',$row[20]); } ?></textarea>
                </div>
    */ ?>



  </div>
 
<? /*
 <div class="form-group" style="width: 20%; margin-right: auto; margin-left: auto; align-content: center; text-align: center;">
  <label style="margin-right: auto; margin-left: auto; text-align: center;" >Extras</label>
<table style="width: 300px; margin-right: auto; margin-left: auto;" align="center">
<tr>
  <td style="padding: 1px;"> <label style="margin-bottom: 0px;">KM Extra</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px;"><input name="km_extra" id="km_extra"  placeholder="0"  style="text-transform: uppercase; width: 70px; height: 26px; margin-bottom: 0px;" class="form-control" type="text" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['km_extra']; ?>"  <?  }else{ ?>  value="<? echo $row[12]; ?>" <? } ?> onkeypress="return valida(event)"  ></td>
</tr>
<tr>
  <td style="padding: 1px;"><label style="margin-bottom: 0px;">Empaque Cajas</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px;"><input  name="empaquec" id="empaquec"  style="text-transform: uppercase; width: 70px; height: 26px; margin-bottom: 0px;" class="form-control" type="text"  autocomplete="off"<? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['empaquec']; ?>" <?  }else{ ?> value="<? echo $row[13]; ?>" <? } ?> onkeypress="return valida(event)"  placeholder="0"  ></td>
</tr>
<tr>
  <td style="padding: 1px;"><label style="margin-bottom: 0px;">Emplaye Total</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px;"><input  name="emplayet" id="emplayet"  style="text-transform: uppercase; width: 70px; height: 26px; margin-bottom: 0px;" class="form-control" type="text"  autocomplete="off"<? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['emplayet']; ?>" <?  }else{ ?> value="<? echo $row[14]; ?>"<? } ?> onkeypress="return valida(event)"  placeholder="0"  ></td>
</tr>
<tr>
  <td style="padding: 1px;"><label style="margin-bottom: 0px;">Caja Closet Venta</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px;"><input  name="cajacv" id="cajacv"  style="text-transform: uppercase; width: 70px; height: 26px; margin-bottom: 0px;" class="form-control" type="text"  autocomplete="off"<? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['cajacv']; ?>"  <?  }else{ ?> value="<? echo $row[15]; ?>"<? } ?> onkeypress="return valida(event)"   placeholder="0" ></td>
</tr>
<tr>
  <td style="padding: 1px;"><label style="margin-bottom: 0px;">Caja Closet Renta</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px;"> <input  name="cajacr" id="cajacr"  style="text-transform: uppercase; width: 70px; height: 26px; margin-bottom: 0px;" class="form-control" type="text"  autocomplete="off" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['cajacr']; ?>" <?  }else{ ?> value="<? echo $row[16]; ?>" <? } ?> onkeypress="return valida(event)"  placeholder="0"  ></td>
</tr>
<tr>
  <td style="padding: 1px;"><label style="margin-bottom: 0px;">Desempaque a Granel</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px;"><input  name="desempaqueg" id="desempaqueg"  style="text-transform: uppercase; width: 70px; height: 26px; margin-bottom: 0px;" class="form-control" type="text"  autocomplete="off"<? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['desempaqueg']; ?>"  <?  }else{ ?>  value="<? echo $row[17]; ?>"  <? } ?> onkeypress="return valida(event)"  placeholder="0"  ></td>
</tr>
<tr>
  <td style="padding: 1px;"><label style="margin-bottom: 0px;">Empaque de Muebles</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px;"><input  name="empaquem" id="empaquem"  style="text-transform: uppercase; width: 70px; height: 26px; margin-bottom: 0px;" class="form-control" type="text"  autocomplete="off"<? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['empaquem']; ?>"  <?  }else{ ?> value="<? echo $row[18]; ?>" <? } ?> onkeypress="return valida(event)"  placeholder="0"   ></td>
</tr>
<tr>
  <td style="padding: 1px;"><label style="margin-bottom: 0px;">Seguro</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px;"><input  name="seguro" id="seguro"  style="text-transform: uppercase; width: 70px; height: 26px; margin-bottom: 0px;" class="form-control" type="text"  autocomplete="off" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['seguro']; ?>"  <?  }else{ ?> value="<? echo $row[19]; ?>"  <? } ?> onkeypress="return valida(event)"  placeholder="0.0"   ></td>
</tr>
<tr>
  <td style="padding: 1px;"><label style="margin-bottom: 0px;">Otros</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px;"><input  name="otros" id="otros"  style="text-transform: uppercase; width: 70px; height: 26px; margin-bottom: 0px;" class="form-control" type="text"  autocomplete="off" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['otros']; ?>" <?  }else{ ?> value="<? echo $row[20]; ?>"  <? } ?> onkeypress="return valida(event)" placeholder="0" ></td>
</tr>
</table>


                </div>

*/ ?>
   <div class="box-footer">
   <button type="submit" class="btn btn-primary"  name="editarcotizacion" id="editarcotizacion">Guardar Cotización</button>
               <!-- <button type="submit" class="btn btn-primary"  name="borrador" id="borrador">Generar Borrador</button>-->
              </div>
   

    </div>
</div>
<script> alert("aqui"); </script>
<? if(isset($_POST['borrador'])){
$km=$_POST['km'];
$m3=$_POST['m3'];

$n1=$_POST['monto_s'];
$n2=$_POST['pc_seguro'];
if($n1>=1 and $n2>=1){
$n3=$n1*($n2/100);
}else{
 $n3=0.0; 
}


if($km>1000){
  if($m3<=13){
    $cm3=($km*5)/1000;
  }else{
    if($m3<=23){
    $cm3=($km*7)/1000;
  }else{
    if($m3<=30){
    $cm3=($km*8)/1000;
   }else{
    $cm3=($km*10)/1000;
    }
   }
  }
} else{

if($km>500){
  if($m3<=13){
    $cm3=($km*9)/1000;
  }else{
    if($m3<=23){
    $cm3=($km*13)/1000;
  }else{
    if($m3<=30){
    $cm3=($km*16)/1000;
   }else{
    $cm3=($km*20)/1000;
    }
   }
  }
} else{

if($m3<=13){
    $cm3=5500/210;
  }else{
    if($m3<=23){
    $cm3=6500/210;
  }else{
    if($m3<=30){
    $cm3=7000/210;
   }else{
    $cm3=9000/210;
    }
   }
  }

}

$kmext=0;
if($_POST['km_extra']!=''){
if($m3<=13){
    $cm3ex=5500/210;
  }else{
    if($m3<=23){
    $cm3ex=6500/210;
  }else{
    if($m3<=30){
    $cm3ex=7000/210;
   }else{
    $cm3ex=9000/210;
    }
   }
  }

$kmext=$cm3ex*$_POST['km_extra'];

}

$costosin=($km*$cm3)+$kmext;
$costocon=($costosin*.4)+$costosin;
$comsin=$costosin-($costosin*.3);
$comcon=$comsin+($comsin*.3);

$costocon=round($costocon,2);

$comcon=round($comcon,2);
?>
<input name="costo" id="costo" type="hidden" value="<? echo $_POST['costo']; ?>" >

<input name="sseguro" id="sseguro" type="hidden" value="<? echo $_POST['monto_s']; ?>" >
<input name="pcseguro" id="pcseguro" type="hidden" value="<? echo $_POST['pc_seguro']; ?>" >
<!--<input name="costo" id="costo" type="hidden" value="<? echo $costocon; ?>" >
<input name="costo2" id="costo2" type="hidden" value="<? echo $comcon; ?>" >-->
<?
}

?>

<script type="text/javascript">
  //alert('<? echo $cm3; ?>');

</script>

  
 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Borrador
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
                <textarea class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><? setlocale(LC_MONETARY, 'en_US');  ?>Hola muy buenas tardes nos llego su solicitud por medio de MUDANZA.MX  y esta es su cotización.               
El Costo es aproximado y basado en la información previa, por parte del cliente.                
Puede variar sin previo aviso, hasta no corroborar la información.                
Esta es una cotización informativa, en caso de requerir la formal, favor de solicitarlo.                
                
<? echo $_POST['origen']; ?>-<? echo $_POST['destino']; ?>     
<? if($_POST['tipo_mudanza']=='Exclusivo'){  ?>
COSTO DEL SERVICIO     <? echo money_format('%(#10n', ($_POST['costo'])); ?>    PESOS         
Este servicio es el día y la hora que deseen.               
Tiempo de entrega es tiempo en ruta.                
Servicio Puerta a Puerta                
SERVICIO BASICO  CUALQUIER DIA DE LA SEMANA <? }else{ ?>
SERVICIO <? echo $_POST['tipo_mudanza']; ?>: <? echo money_format('%(#10n', ($_POST['costo'])); ?>      PESOS          
TIEMPO DE ENTREGA :DE <? echo $_POST['testimado']; ?>  DÍAS DEPENDIENDO RUTA               
2 o más clientes en la misma unidad                 
Servicio puerta a puerta.               
SERVICIO BÁSICO  CUALQUIER DÍA DE LA SEMANA   <? } ?>
                
*NO LLEVAMOS MASCOTAS NI PERSONAS , EL SEGURO NO LOS CUBRE*               
                
SERVICIO BASICO INCLUYE:                
*Emplaye de colchones y muebles necesarios (1 Rollo de playo)               
*Maniobra de carga y descarga de planta baja y primer piso                
*Acomodo de cajas en las habitaciones de casa destino (no desempaque)               
* Monitoreo de la unidad durante el trayecto.               
* Entrega mismo día o dependiendo el tiempo de traslado.                
                
NO INCLUYE                
*Empaque de cosas a granel                
*Desempaque en casa destino                
*Desinstalación de aparatos electrónicos, lámparas, estufas y/o lavadoras, etc                
*Volado de Muebles                
*Desarmado y Armado de Muebles                
*Carga y/o descarga en pisos extras $300 piso adicional por escalera o elevador               
*Acarreo en origen                
*En caso fortuito multas de tránsito, permisos o algún otro cargo adicional ajeno al transportista.     

Extras:
<? $extras=0; ?>
<? if($_POST['empaquec']!=0){  ?>* EMPAQUE CAJAS: <? $ext1=($_POST['empaquec']*160); $extras=$extras+$ext1; echo money_format('%(#10n', $ext1); ?>

<? } ?>
<? if($_POST['emplayet']!=0){ ?>* EMPLAYE TOTAL: <? $ext2=($_POST['emplayet']*400); $extras=$extras+$ext2;  echo money_format('%(#10n', $ext2); ?>

<? } ?>
<? if($_POST['cajacv']!=0){ ?>* CAJA CLOSET VENTA: <? $ext3=($_POST['cajacv']*300); $extras=$extras+$ext3; echo money_format('%(#10n', $ext3); ?>

<? } ?>
<? if($_POST['cajacr']!=0){ ?>* CAJA CLOSET RENTA: <? $ext4=($_POST['cajacr']*160); $extras=$extras+$ext4; echo money_format('%(#10n', $ext4); ?>

<? } ?>
<? if($_POST['desempaqueg']!=0){ ?>* DESEMPAQUE A GRANEL: <? $ext5=($_POST['desempaqueg']*80); $extras=$extras+$ext5; echo money_format('%(#10n', $ext5); ?>

<? } ?>
<? if($_POST['empaquem']!=0){ ?>* EMPAQUE DE MUEBLES: <? $ext6=($_POST['empaquem']*75); $extras=$extras+$ext6; echo money_format('%(#10n', $ext6); ?>

<? } 
$extras=0;
?>
<? /*if($_POST['seguro']!=0){ ?>* SEGURO DE MERCANCIA: <? $ext7=($_POST['seguro'] * 0.025); $extras=$extras+$ext7; echo money_format('%(#10n', ($ext7 * 0.025)); ?>

<? } ?>
<? if($_POST['otro']!=0){ ?>* OTROS: <? $ext8=($_POST['otros']*2500); $extras=$extras+$ext8; echo money_format('%(#10n', $ext8);  ?>

<? } ?>
<? if($extras!=0){ ?>TOTAL EXTRAS: <?  echo money_format('%(#10n', $extras);   ?>

<? } */


if($_POST['monto_s']>=1 and $_POST['pc_seguro']>=1){
?>* SEGURO DE MERCANCIA: <?  echo money_format('%(#10n', ($n3)); 
}

?>
<? if($extras>=1){ if($_POST['tipo_mudanza']=='Exclusivo'){  ?>
COSTO TOTAL: <?  echo money_format('%(#10n', ($_POST['costo']+$n3));  ?>
<? }else{ ?>
COSTO TOTAL: <?  echo money_format('%(#10n', ($_POST['costo']+$n3));  ?>
<? } } ?>


Nuestras unidades, son especiales para mudanza:               
 Cuentan con:               
-Cobijas                
-Colchonetas                
-Plástico stretch (playo)               
-Cuerdas para amarre                
-Personal de maniobras                
                
Si somos aceptados le pedimos por favor nos avise con antelación para poder programar su mudanza.                
                
ACEPTAMOS               
Efectivo // Deposito OXXO               
TC o Débito               
Transferencia               
                
Esperemos sea de su agrado nuestra cotización. Quedamos pendientes de sus amables comentarios.                
Saludos                 
                
La Unión División Mudanzas                
<? echo $_SESSION['nombre']; ?>              
Whatsapp: <? echo $_SESSION['telefono']; ?>               
                
Visita-Go to: www.launionsanmiguel.com                
www.mudanzasforaneaslaunion.com               
La Union Packing & Shipping Services                
¡Empacamos y Enviamos a todo el Mundo!                
Ph/Tel: Store/Tienda: 4151525694                
Umaran 25, Centro               
Salida a Celaya # 83-B                
Ph./Tel 4151859200                
San Miguel Allende, Gto. 37700                
México                

                          </textarea>



                           <div class="box-footer">
 
            <div class="form-group" style="width: 33%; align-content: center;">
                <button type="submit" class="btn btn-primary"  name="editarcotizacion" id="editarcotizacion">Guardar Cotización</button>
             </div>
            <!-- <div class="form-group" style="width: 33%; align-content: center;">
                <button type="submit" class="btn btn-primary"  name="guardarservicio" id="guardarservicio">Generar Servicio</button>
              </div>-->
              </div>

              <?

}?>
              </form>
            </div>
          </div>
        </div>

          </div>

          <?php /*
<script type="text/javascript">

  
  

function buscarkm(){



var d1=document.getElementById("origen").value;
var d2=document.getElementById("destino").value;


var kms = new Array(3);
kms[0] = new Array(300);
kms[1] = new Array(300);
kms[2] = new Array(300);
kms[3] = new Array(300);
var cuenta=0;

 <?

  $link = mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
  mysql_select_db($bbdd,$link) or die("resultado=".urlencode(mysql_error()));
  $result = mysql_query("SELECT origen, destino, km, kmextra FROM cotizacion2 group by origen, destino", $link);
  $r=0;
while($row = mysql_fetch_row($result)){

?>

kms[0][<? echo $r; ?>]="<? echo $row[0]; ?>";
kms[1][<? echo $r; ?>]="<? echo $row[1]; ?>";
kms[2][<? echo $r; ?>]="<? echo $row[2]; ?>";
kms[3][<? echo $r; ?>]="<? echo $row[3]; ?>";

cuenta=<? echo $r; ?>;

<? 
$r++;
} ?>


  

//alert('aqui '+d1+' '+d2+' '+cuenta);
for(var i=0; i<=cuenta; i++){

if(kms[0][i]==d1 && kms[1][i]==d2){

  document.getElementById("km").value=kms[2][i];
  document.getElementById("m3").value=kms[3][i];
}


}




}

</script>
*/ ?>
<script> alert("aqui"); </script>
<script type="text/javascript">



function desagregar(v){

delete datos[v][1];
delete datos[v][2];
delete datos[v][3];
delete datos[v][4];
delete datos[v][5];
delete datos[v][6];
delete datos[v][7];



var c= document.getElementById("cuenta").value;
var cade="<table   class='table table-head-fixed text-nowrap'><tr><td style='padding:5px;'><strong>Mercancia</strong></td><td style='padding:5px;'><strong>Alto</strong></td><td style='padding:5px;'><strong>Ancho</strong></td><td style='padding:5px;'><strong>Profundidad</strong></td><td style='padding:5px;'><strong>Peso</strong></td><td style='padding:5px;'><strong>Cantidad</strong></td><td style='padding:5px;'></td></tr>";
for(var i=1; i<=c; i++){
if(datos[i][1]!= undefined){
    cade = cade +  "<tr><td style='padding:5px;'><strong>"+datos[i][1].replace("|", "")+"</strong></td><td style='padding:5px;'>"+datos[i][2].replace("|", "")+" cm</td><td style='padding:5px;'>"+datos[i][3].replace("|", "")+" cm</td><td style='padding:5px;'>"+datos[i][4].replace("|", "")+" cm</td><td style='padding:5px;'>"+datos[i][5].replace("|", "")+" kg</td><td style='padding:5px;'><strong>"+datos[i][6].replace("|", "")+"</strong></td><td style='padding:5px;'><a onClick='javascript:desagregar("+i+")' href='#agregadodiv'>Eliminar</a></td></tr>";
}
}
cade= cade + "</table>";
//c--;
document.getElementById("cuenta").value=c;
document.getElementById("agregados").value=datos.join("||");
document.getElementById("agregadodiv").innerHTML=cade;

}



function mostrarTabla(){

var c= document.getElementById("cuenta").value;


var cade="<table   class='table table-head-fixed text-nowrap'><tr><td style='padding:5px;'><strong>Mercancia</strong></td><td style='padding:5px;'><strong>Alto</strong></td><td style='padding:5px;'><strong>Ancho</strong></td><td style='padding:5px;'><strong>Profundidad</strong></td><td style='padding:5px;'><strong>Peso</strong></td><td style='padding:5px;'><strong>Cantidad</strong></td><td style='padding:5px;'></td></tr>";
for(var i=1; i<=c; i++){
if(datos[i][1]!= undefined){
    cade = cade +  "<tr><td style='padding:5px;'><strong>"+datos[i][1].replace("|", "")+"</strong></td><td style='padding:5px;'>"+datos[i][2].replace("|", "")+" cm</td><td style='padding:5px;'>"+datos[i][3].replace("|", "")+" cm</td><td style='padding:5px;'>"+datos[i][4].replace("|", "")+" cm</td><td style='padding:5px;'>"+datos[i][5].replace("|", "")+" kg</td><td style='padding:5px;'><strong>"+datos[i][6].replace("|", "")+"</strong></td><td style='padding:5px;'><a onClick='javascript:desagregar("+i+")' href='#agregadodiv'>Eliminar</a></td></tr>";
}
}
cade= cade + "</table>";
//c--;
document.getElementById("cuenta").value=c;
document.getElementById("agregados").value=datos.join("||");
document.getElementById("agregadodiv").innerHTML=cade;


}


<?php  if(isset($_GET['eddt'])){
  
  $link=mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
                    mysql_select_db($bbdd,$link) or die("resultado=".urlencode(mysql_error()));
                    $resultm=mysql_query("SELECT * from muebles_s where cve_cotizacion='".$row[9]."'", $link);
                    $cc=0;
                    while($rowm=mysql_fetch_row($resultm)){
                      $cc++;
?>
datos[c][1]=<?php echo $rowm[3]; ?>+'|';
    datos[c][2]=<?php echo $rowm[4]; ?>+'|';
    datos[c][3]=<?php echo $rowm[5]; ?>+'|';
    datos[c][4]=<?php echo $rowm[6]; ?>+'|';
    datos[c][5]=<?php echo $rowm[7]; ?>+'|';
    datos[c][6]=<?php echo $rowm[8]; ?>+'|';
    datos[c][7]=<?php echo $rowm[3]; ?>+'|';
<?php
                    }

  ?>

var c= <?php echo $cc; ?>;


var cade="<table   class='table table-head-fixed text-nowrap'><tr><td style='padding:5px;'><strong>Mercancia</strong></td><td style='padding:5px;'><strong>Alto</strong></td><td style='padding:5px;'><strong>Ancho</strong></td><td style='padding:5px;'><strong>Profundidad</strong></td><td style='padding:5px;'><strong>Peso</strong></td><td style='padding:5px;'><strong>Cantidad</strong></td><td style='padding:5px;'></td></tr>";
for(var i=1; i<=c; i++){
if(datos[i][1]!= undefined){
    cade = cade +  "<tr><td style='padding:5px;'><strong>"+datos[i][1].replace("|", "")+"</strong></td><td style='padding:5px;'>"+datos[i][2].replace("|", "")+" cm</td><td style='padding:5px;'>"+datos[i][3].replace("|", "")+" cm</td><td style='padding:5px;'>"+datos[i][4].replace("|", "")+" cm</td><td style='padding:5px;'>"+datos[i][5].replace("|", "")+" kg</td><td style='padding:5px;'><strong>"+datos[i][6].replace("|", "")+"</strong></td><td style='padding:5px;'><a onClick='javascript:desagregar("+i+")' href='#agregadodiv'>Eliminar</a></td></tr>";
}
}
cade= cade + "</table>";

//alert(cade);
document.getElementById("cuenta").value=c;
document.getElementById("agregados").value=datos.join("||");
document.getElementById("agregadodiv").innerHTML=cade;

<?php } ?>

<?php  if(isset($regre) || isset($_POST['mercancia'])){
?>
//alert("aqui");
var c= "<?php echo $_POST['cuenta']; ?>";

//alert('cuenta '+c+' ' +datos[1][2]);
var cade="<table   class='table table-head-fixed text-nowrap'><tr><td style='padding:5px;'><strong>Mercancia</strong></td><td style='padding:5px;'><strong>Alto</strong></td><td style='padding:5px;'><strong>Ancho</strong></td><td style='padding:5px;'><strong>Profundidad</strong></td><td style='padding:5px;'><strong>Peso</strong></td><td style='padding:5px;'><strong>Cantidad</strong></td><td style='padding:5px;'></td></tr>";
for(var i=1; i<=c; i++){
if(datos[i][1]!= undefined){
    cade = cade +  "<tr><td style='padding:5px;'><strong>"+datos[i][1].replace("|", "")+"</strong></td><td style='padding:5px;'>"+datos[i][2].replace("|", "")+" cm</td><td style='padding:5px;'>"+datos[i][3].replace("|", "")+" cm</td><td style='padding:5px;'>"+datos[i][4].replace("|", "")+" cm</td><td style='padding:5px;'>"+datos[i][5].replace("|", "")+" kg</td><td style='padding:5px;'><strong>"+datos[i][6].replace("|", "")+"</strong></td><td style='padding:5px;'><a onClick='javascript:desagregar("+i+")' href='#agregadodiv'>Eliminar</a></td></tr>";
}
}
cade= cade + "</table>";
//c--;
//alert(cade);
document.getElementById("cuenta").value=c;
document.getElementById("agregados").value=datos.join("||");
document.getElementById("agregadodiv").innerHTML=cade;

<?php
} 
?>


function agregars(){


var c= document.getElementById("cuenta").value;
//alert(c);
var des=1;
var f=1;
var cad='';

if(document.getElementById("mercancia").value!='999999'){

     if(document.getElementById("mercancia").value=='--'){
      f=2;
    cad=cad + 'Mercancia \n';
    }
    if(document.getElementById("cantidad").value==''){
      f=2;
    cad=cad + 'Cantidad \n';
    }

}

    
if(f==1){
  c++;
  if(document.getElementById("mercancia").value=='999999'){
    datos[c][1]=document.getElementById("mercancia2").value+'|';
    datos[c][2]=document.getElementById("alto").value+'|';
    datos[c][3]=document.getElementById("ancho").value+'|';
    datos[c][4]=document.getElementById("profundidad").value+'|';
    datos[c][5]=document.getElementById("peso").value+'|';
    datos[c][6]=document.getElementById("cantidad").value+'|';
    datos[c][7]=document.getElementById("mercancia").value+'|';

  }else{
   
    datos[c][1]=document.getElementById("mercancia").value+'|';
    datos[c][2]=document.getElementById("alto").value+'|';
    datos[c][3]=document.getElementById("ancho").value+'|';
    datos[c][4]=document.getElementById("profundidad").value+'|';
    datos[c][5]=document.getElementById("peso").value+'|';
    datos[c][6]=document.getElementById("cantidad").value+'|';
    datos[c][7]=document.getElementById("mercancia").value+'|';
  
  }


}else{

alert(cad);
}

var cade="<table   class='table table-head-fixed text-nowrap'><tr><td style='padding:5px;'><strong>Mercancia</strong></td><td style='padding:5px;'><strong>Alto</strong></td><td style='padding:5px;'><strong>Ancho</strong></td><td style='padding:5px;'><strong>Profundidad</strong></td><td style='padding:5px;'><strong>Peso</strong></td><td style='padding:5px;'><strong>Cantidad</strong></td><td style='padding:5px;'></td></tr>";
for(var i=1; i<=c; i++){
if(datos[i][1]!= undefined){
    cade = cade +  "<tr><td style='padding:5px;'><strong>"+datos[i][1].replace("|", "")+"</strong></td><td style='padding:5px;'>"+datos[i][2].replace("|", "")+" cm</td><td style='padding:5px;'>"+datos[i][3].replace("|", "")+" cm</td><td style='padding:5px;'>"+datos[i][4].replace("|", "")+" cm</td><td style='padding:5px;'>"+datos[i][5].replace("|", "")+" kg</td><td style='padding:5px;'><strong>"+datos[i][6].replace("|", "")+"</strong></td><td style='padding:5px;'><a onClick='javascript:desagregar("+i+")' href='#agregadodiv'>Eliminar</a></td></tr>";
}
}
cade= cade + "</table>";

document.getElementById("cuenta").value=c;
//document.getElementById("total_v").value=sum;
document.getElementById("agregados").value=datos.join("||");
document.getElementById("agregadodiv").innerHTML=cade;

}




</script>


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