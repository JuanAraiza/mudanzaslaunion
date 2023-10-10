<?
if(isset($_POST['guardarcotizacion'])){

$corr=0;
$cade="";
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
   //$c7='';
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
   $c37=substr($_POST['fecha_s'],6,4).'-'.substr($_POST['fecha_s'],3,2).'-'.substr($_POST['fecha_s'],0,2);
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
  $link->query($csql1);

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
} 

}else{
  ?>
<script type="text/javascript">alert('<?php echo $cade; ?>');</script>
<?php
}


   
 }

 //https://www.google.com.mx/maps/dir/20.905515406320898,-100.74963400118332/20.906819586033397,-100.74530602832655/@20.9101485,-100.7210702,15z/data=!3m1!4b1!4m2!4m1!3e0
 //https://www.google.com.mx/maps/dir/20.9055154,-100.749634/20.9068196,-100.745306/@20.9057204,-100.7497559,17z/data=!3m1!4b1!4m2!4m1!3e0
?>



<div class="row">
    <div class="col-md-12">
    <link rel="stylesheet" href="leaflet/leaflet.css">
<script src="leaflet/leaflet.js"></script>  
    



<form id="formn" name="formn" action="tareas.php?ncotizacion=1" method="post" enctype="multipart/form-data">

<div class="col-md-12" style="width: 100%; overflow: hidden;">


              <div class="form-group col-md-3"  >
            <label>NOMBRE DEL CLIENTE</label>
            <input name="cliente" id="cliente" style="text-transform: uppercase;" class="form-control" type="text" autocomplete="off" value="<? echo $_POST['cliente']; ?>" >
              </div>

              <div class="form-group col-md-3"  >
            <label>TELÉFONO</label>
            <input name="telefono" id="telefono" style="text-transform: uppercase;" class="form-control" onkeypress="return valida(event)" type="text" autocomplete="off" value="<? echo $_POST['telefono']; ?>" >
              </div>

</div>



<div class="col-md-12" style="width: 100%; overflow: hidden;">

<div class="form-group col-md-2"  >
&nbsp;
</div>
<div class="form-group col-md-4"  >
            <label>Origen</label>
               <input  name="origen" id="origen"  style="text-transform: uppercase;" class="form-control" type="text"  autocomplete="off" value="<?php  echo $_POST['origen']; ?>" >
              
               <div id="map3" class="map map-home" style="margin:12px 0 12px 0;height:400px;"></div> 
               <script>
var osmUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
  osmAttrib = '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors',
  osm = L.tileLayer(osmUrl, {maxZoom: 20, attribution: osmAttrib});
var map3 = L.map('map3').setView([20.91381,-100.7436], 14).addLayer(osm);

var popup3 = L.popup();

function onMapClick3(e) {
    popup3
        .setLatLng(e.latlng)
        .setContent("El Lugar se ubica aquí: " + e.latlng.toString())
        .openOn(map3);
        document.getElementById("coordenadas").value=e.latlng.lat+","+e.latlng.lng;
}

map3.on('click', onMapClick3);
</script>


               <input type="hidden" name="coordenadas" id="coordenadas" <?php if(isset($_POST['coordenadas'])){ ?> value="<?php echo $_POST['coordenadas'] ?>" <?php } ?> >
               <div class="form-group col-md-12"  >
               <a src="#" class="btn btn-primary btn-lg" onClick="javascript:verRuta();">Ver Ruta en Maps</a>
              </div>
             
              </div>

              <div class="form-group col-md-4"  >
            <label>Destino</label>
               <input name="destino" id="destino" style="text-transform: uppercase;" class="form-control" type="text" autocomplete="off" value="<?php  echo $_POST['destino']; ?>" onChange="javascript: buscarkm();"  >
               <div id="map2" class="map map-home" style="margin:12px 0 12px 0;height:400px;"></div> 
               <script>
  var osmUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
    osmAttrib = '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    osm = L.tileLayer(osmUrl, {maxZoom: 20, attribution: osmAttrib});
  var map2 = L.map('map2').setView([20.91381,-100.7436], 14).addLayer(osm);

   
var popup2 = L.popup();

function onMapClick2(e) {
    popup2
        .setLatLng(e.latlng)
        .setContent("El Lugar se ubica aquí: " + e.latlng.toString())
        .openOn(map2);
        document.getElementById("coordenadas2").value=e.latlng.lat+","+e.latlng.lng;
}

map2.on('click', onMapClick2);
</script>
               <input type="hidden" name="coordenadas2" id="coordenadas2" <?php if(isset($_POST['coordenadas2'])){ ?> value="<?php echo $_POST['coordenadas2'] ?>" <?php } ?> >
              
<div class="form-group col-lg-12">
<label>RUTA MUDANZAS:</label>    
<select name="ruta_m" id="ruta_m" class="form-control select2" style="margin-bottom: 1em;">
        <option value="--">--</option><?php
        $query = "SELECT * from rutas";
        $result = $link->query($query);
        while($row=mysqli_fetch_row($result)){  ?>
        <option <?php if(isset($_POST['ruta_m'])){ if($_POST['ruta_m']==$row[0]){    ?> selected="selected" <?php } }?> value="<?php echo $row[0]; ?>"><?php echo  ($row[1]); ?></option>
    <?php } ?>
    </select>

</div>

              </div>

              <div class="form-group col-md-2"  >
&nbsp;
</div>



              

</div>

<div class="col-md-12" style="width: 100%; overflow: hidden;">


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
                  <label>FECHA DEL SERVICIO</label>
                          <input  class="form-control" autocomplete="off"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask maxlength="10" type="text" name="fecha_s" id="datepicker" value="<?php  echo $_POST['fecha_s']; ?>">
                   
                </div>

              <div class="form-group col-md-3"  >
            <label>TELEFONO</label>
               <input name="telefono" id="telefono"  style="text-transform: uppercase;" class="form-control" type="text" value="<?php  echo $_POST['telefono']; ?>" >
              </div>
           


            


<div class="form-group  col-md-12" id="lista_muebles" >
                  <label>Lista de muebles</label>
                  <textarea  id="muebles" name="muebles" class="form-control" rows="3" placeholder="muebles ..." style="text-transform: uppercase;" ><?php  echo $_POST['muebles']; ?></textarea>
                </div>



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
                <button type="submit" class="btn btn-primary"  name="guardarcotizacion" id="guardarcotizacion">Generar Cotización</button>
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


<script>


function verRuta(){

  let params = `scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,
width=1100,height=700,left=300,top=300`;

var cor1=document.getElementById('coordenadas').value;
var cor2=document.getElementById('coordenadas2').value;


open("https://www.google.com.mx/maps/dir/"+cor1+"/"+cor2+"/@"+cor1+"/data=!3m1!4b1!4m2!4m1!3e0", "test", params);
}

</script>
