<?php /*<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php if($_GET['edi']){
                echo 'Editar';
            }else{
                echo 'Nueva';
            } ?>
               Cotización <?php switch($_GET['tipoc']){
              case '1':
                echo 'Flete';
              break;
              case '2':
                echo 'Auto';
              break;
              case '3':
                echo 'Mudanza';
              break;

            } ?></h1>
          </div>
        
        </div>
      </div><!-- /.container-fluid -->
    </section>  */ ?>

<?php
if(isset($_POST['guardarcotizacion'])){

$corr=0;
$cade="";
if($_POST['m3']==''){
$corr=1;
$cade=$cade."Falta M3 \\n";
}

$c1=$_POST['tipoc'];
$c2=$_POST['origen'];
$c3=$_POST['destino'];
$c4=$_POST['coordenadas'];
$c5=$_POST['coordenadas2'];
$c6=$_POST['cliente'];
$c7=$_POST['telefono'];
$c8=$_POST['ruta'];
$c9=$_POST['ruta_m'];
$c10=nl2br($_POST['muebles']);

$c11=$_POST['m3'];
$c12=$_POST['costo_m3'];
$c13=$_POST['aduana'];
$c14=$_POST['referido'];
$c15=$_POST['comision'];
$c16=$_POST['playo'];
$c17=$_POST['cuota'];
$c18=$_POST['ganancia'];
$c19=$_POST['unidad'];
$c20=$_POST['kms'];

$c21=$_POST['combustible'];
$c22=$_POST['casetas'];
$c23=$_POST['d_unidad'];
$c24=$_POST['maniobras'];
$c25=$_POST['otro'];
$c26=$_POST['kms2'];
$c27=$_POST['pre_costo'];
$c28=$_POST['pisos'];
$c29=$_POST['empaque'];
$c30=$_POST['desarmados'];

$c31=$_POST['permisos'];
$c32=$_POST['embodegamiento'];
$c33=$_POST['otro_ex'];
$c34=$_POST['subtotal'];
$c35=$_POST['seguro'];
$c36=$_POST['costo_proveedor'];
$c37=$_POST['servicio'];
$c38=$_POST['seguro2'];
$c39=$_POST['extras'];
$c40=$_POST['total_cliente'];

$c41=md5(date('Y-m-d H:i:s').$c1.$c2.$c3);
$c42=$_POST['gruas'];
$c43=$_POST['m32'];
$c44=1;
$c45=substr($_POST['fecha'],6,4).'-'.substr($_POST['fecha'],3,2).'-'.substr($_POST['fecha'],0,2);;


 
 
if($corr!=1){

  $csql1 = "INSERT INTO cotizador(tipo,origen,destino,cororigen,cordestino,cliente,telefono,ruta,ruta_mapa,muebles,m3,costo_m3,aduana,referido,comision,playo,cuota,ganancia,unidad,kms,combustible,casetas,desgaste_u,maniobras,otro,kms_r,pre_costo,pisos,empaque,desarmados,permisos,embodegamiento,otro_ex,subtotal,seguro,costo_prov,servicio,seguro2,extras,total_cliente,clave,gruas,m32,estatus,fecha) VALUES ('".$c1."','".$c2."','".$c3."','".$c4."','".$c5."','".$c6."','".$c7."','".$c8."','".$c9."','".$c10."','".$c11."','".$c12."','".$c13."','".$c14."','".$c15."','".$c16."','".$c17."','".$c18."','".$c19."','".$c20."','".$c21."','".$c22."','".$c23."','".$c24."','".$c25."','".$c26."','".$c27."','".$c28."','".$c29."','".$c30."','".$c31."','".$c32."','".$c33."','".$c34."','".$c35."','".$c36."','".$c37."','".$c38."','".$c39."','".$c40."','".$c41."','".$c42."','".$c43."','".$c44."','".$c45."')";  
  $link->query($csql1);
  //echo $csql1;

?>
<script language="JavaScript" type="text/javascript">
location.href='tareas.php?cotizaciones2023=1';
</script>
<?php

}else{
  ?>
<script type="text/javascript">alert('<?php echo $cade; ?>');</script>
<?php
}


}

 //https://www.google.com.mx/maps/dir/20.905515406320898,-100.74963400118332/20.906819586033397,-100.74530602832655/@20.9101485,-100.7210702,15z/data=!3m1!4b1!4m2!4m1!3e0
 //https://www.google.com.mx/maps/dir/20.9055154,-100.749634/20.9068196,-100.745306/@20.9057204,-100.7497559,17z/data=!3m1!4b1!4m2!4m1!3e0


 if(isset($_POST['guardarcambiosc'])){

  $corr=0;
  $cade="";
  if($_POST['m3']==''){
  $corr=1;
  $cade=$cade."Falta M3 \\n";
  }
  
  $c1=$_POST['tipoc'];
  $c2=$_POST['origen'];
  $c3=$_POST['destino'];
  $c4=$_POST['coordenadas'];
  $c5=$_POST['coordenadas2'];
  $c6=$_POST['cliente'];
  $c7=$_POST['telefono'];
  $c8=$_POST['ruta'];
  $c9=$_POST['ruta_m'];
  $c10=nl2br($_POST['muebles']);
  
  $c11=$_POST['m3'];
  $c12=$_POST['costo_m3'];
  $c13=$_POST['aduana'];
  $c14=$_POST['referido'];
  $c15=$_POST['comision'];
  $c16=$_POST['playo'];
  $c17=$_POST['cuota'];
  $c18=$_POST['ganancia'];
  $c19=$_POST['unidad'];
  $c20=$_POST['kms'];
  
  $c21=$_POST['combustible'];
  $c22=$_POST['casetas'];
  $c23=$_POST['d_unidad'];
  $c24=$_POST['maniobras'];
  $c25=$_POST['otro'];
  $c26=$_POST['kms2'];
  $c27=$_POST['pre_costo'];
  $c28=$_POST['pisos'];
  $c29=$_POST['empaque'];
  $c30=$_POST['desarmados'];
  
  $c31=$_POST['permisos'];
  $c32=$_POST['embodegamiento'];
  $c33=$_POST['otro_ex'];
  $c34=$_POST['subtotal'];
  $c35=$_POST['seguro'];
  $c36=$_POST['costo_proveedor'];
  $c37=$_POST['servicio'];
  $c38=$_POST['seguro2'];
  $c39=$_POST['extras'];
  $c40=$_POST['total_cliente'];
  
  $c41=$_POST['clavec'];
  $c42=$_POST['gruas'];
  $c43=$_POST['m32'];

  $c45=substr($_POST['fecha'],6,4).'-'.substr($_POST['fecha'],3,2).'-'.substr($_POST['fecha'],0,2);;
  
  
   
   
  if($corr!=1){
  
    $csql1 = "update cotizador set origen='".$c2."',destino='".$c3."',cororigen='".$c4."',cordestino='".$c5."',cliente='".$c6."',telefono='".$c7."',ruta='".$c8."',ruta_mapa='".$c9."',muebles='".$c10."',m3='".$c11."',costo_m3='".$c12."',aduana='".$c13."',referido='".$c14."',comision='".$c15."',playo='".$c16."',cuota='".$c17."',ganancia='".$c18."',unidad='".$c19."',kms='".$c20."',combustible='".$c21."',casetas='".$c22."',desgaste_u='".$c23."',maniobras='".$c24."',otro='".$c25."',kms_r='".$c26."',pre_costo='".$c27."',pisos='".$c28."',empaque='".$c29."',desarmados='".$c30."',permisos='".$c31."',embodegamiento='".$c32."',otro_ex='".$c33."',subtotal='".$c34."',seguro='".$c35."',costo_prov='".$c36."',servicio='".$c37."',seguro2='".$c38."',extras='".$c39."',total_cliente='".$c40."',gruas='".$c42."',m32='".$c43."',fecha='".$c45."' where clave='".$c41."' and tipo=".$c1;  
    $link->query($csql1);
    //echo $csql1;
  
  ?>
  <script language="JavaScript" type="text/javascript">
  location.href='tareas.php?cotizaciones2023=1';
  </script>
  <?php
  
  }else{
    ?>
  <script type="text/javascript">alert('<?php echo $cade; ?>');</script>
  <?php
  }

 }
?>



<link rel="stylesheet" href="leaflet/leaflet.css">
<script src="leaflet/leaflet.js"></script>  

<div class="box box-danger">
           
            <div class="box-body">


                            <div class="row">
                              <?php /*tareas.php?ncoti_flete=1&tr=<?php echo $_GET['tr']; ?>&tipoc=<?php echo $_GET['tipoc']; ?>  */ ?>
<form id="formn" name="formn" action="tareas.php?ncoti_flete=1&tr=<?php echo $_GET['tr']; ?>&tipoc=<?php echo $_GET['tipoc']; ?>" method="post" enctype="multipart/form-data">
<?php

if(isset($_GET['edi'])){
  
  $querye = "select  * FROM cotizador where clave='".$_GET['c']."' and tipo='".$_GET['tipoc']."'";
  $resulte = $link->query($querye);
  $rowe = mysqli_fetch_row($resulte);
?><input name="clavec" id="clavec" type="hidden" value="<?php echo $rowe[41]; ?>" ><?php
}

?>


<div class="col-12 row">
<div class="form-group col-md-3" ></div>
<input name="tipoc" id="tipoc" type="hidden" value="<?php echo $_GET['tipoc']; ?>" >

              <div class="form-group col-md-3" >
            <label>NOMBRE DEL CLIENTE</label>
            <input name="cliente" id="cliente" style="text-transform: uppercase;" class="form-control" type="text" autocomplete="off" value="<?php if($_GET['edi']==1){ echo $rowe[6]; }else{ echo $_POST['cliente']; } ?>" >
              </div>

              <div class="form-group col-md-3">
            <label>TELÉFONO</label>
            <input name="telefono" id="telefono" style="text-transform: uppercase;" class="form-control" onkeypress="return valida(event)" type="text" autocomplete="off" value="<?php if($_GET['edi']==1){ echo $rowe[7]; }else{ echo $_POST['telefono']; } ?>" >
              </div>

<div class="form-group col-md-3" >&nbsp; </div>       

</div>




<!-- --------------------- -->
<div class="col-12 row">

<div class="form-group col-md-1"  >

</div>
<div class="form-group col-md-5"  >
            <label>Origen</label>
               <input  name="origen" id="origen"  style="text-transform: uppercase;" class="form-control" type="text"  autocomplete="off" value="<?php if($_GET['edi']==1){ echo $rowe[2]; }else{ echo $_POST['origen']; } ?>" >
              
               <div id="map3" class="map map-home" style="margin:12px 0 12px 0;height:400px;"></div> 
               <script>
var osmUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
  osmAttrib = '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors',
  osm = L.tileLayer(osmUrl, {maxZoom: 20, attribution: osmAttrib});
  <?php if($_GET['edi']==1){ $coor=$rowe[4]; }else{ $coor='20.91381,-100.7436'; } ?>
var map3 = L.map('map3').setView([<?php echo $coor; ?>], 14).addLayer(osm);

<?php if($_GET['edi']==1){ ?>
L.marker([<?php echo $coor; ?>])
    .addTo(map3)
    .bindPopup('Origen')
    .openPopup();
  <?php } ?>

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


               <input type="hidden" name="coordenadas" id="coordenadas" value="<?php if($_GET['edi']==1){ echo $rowe[4]; }else{ echo $_POST['coordenadas']; } ?>" >
               
             
              </div>

              <div class="form-group col-md-5"  >
            <label>Destino</label>
               <input name="destino" id="destino" style="text-transform: uppercase;" class="form-control" type="text" autocomplete="off" value="<?php if($_GET['edi']==1){ echo $rowe[3]; }else{ echo $_POST['destino']; } ?>" onChange="javascript: buscarkm();"  >
               <div id="map2" class="map map-home" style="margin:12px 0 12px 0;height:400px;"></div> 
               <script>
  var osmUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
    osmAttrib = '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    osm = L.tileLayer(osmUrl, {maxZoom: 20, attribution: osmAttrib});
    <?php if($_GET['edi']==1){ $coor2=$rowe[5]; }else{ $coor2='20.91381,-100.7436'; } ?>
  var map2 = L.map('map2').setView([<?php echo $coor2; ?>], 14).addLayer(osm);
  <?php if($_GET['edi']==1){ ?>
L.marker([<?php echo $coor2; ?>])
    .addTo(map2)
    .bindPopup('Destino')
    .openPopup();
  <?php } ?>
   
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
               <input type="hidden" name="coordenadas2" id="coordenadas2" value="<?php if($_GET['edi']==1){ echo $rowe[5]; }else{  echo $_POST['coordenadas2']; } ?>" >
              
</div>

              <div class="form-group col-md-1"  ></div>

</div>

<!-- --------------------- -->

<div class="col-md-12 row">

<div class="col-md-4">
<div class="form-group col-md-12"  >
               <a src="#" class="btn btn-primary btn-lg" style="color:#fff;" onClick="javascript:verRuta();">Ver Ruta en Maps</a>
              </div>
        </div>


        <div class="col-md-4">
        <div class="form-group col-md-12">
<label>RUTA MUDANZAS:</label>    
<select name="ruta_m" id="ruta_m" class="form-control select2" style="margin-bottom: 1em;">
        <option value="--">--</option><?php
        $query = "SELECT * from rutas";
        $result = $link->query($query);
        while($row=mysqli_fetch_row($result)){  ?>
        <option <?php if(isset($_GET['edi'])){ if($rowe[9]==$row[0]){ ?> selected="selected" <?php } }else{ if(isset($_POST['ruta_m'])){ if($_POST['ruta_m']==$row[0]){ ?> selected="selected" <?php } } } ?> value="<?php echo $row[0]; ?>"><?php echo  ($row[1]); ?></option>
    <?php } ?>
    </select>
    </div>
        </div>


        <div class="col-md-4">
        <div class="form-group col-md-12"  >
                  <label>FECHA DEL SERVICIO</label>
                          <input  class="form-control" autocomplete="off"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask maxlength="10" type="text" name="fecha" id="fecha" value="<?php if($_GET['edi']==1){ echo substr($rowe[45],8,2).'/'.substr($rowe[45],5,2).'/'.substr($rowe[45],0,4); }else{ echo $_POST['fecha']; } ?>">
                   
                </div>
      </div>

        </div>



<div class="col-md-12 row">

        <div class="col-md-4">
        <div class="form-group  col-md-12" id="lista_muebles" >
                  <label>Tipo de Mercancia a Trasladar</label>
                  <textarea  id="muebles" name="muebles" class="form-control" rows="20" placeholder="mercancia ..." style="text-transform: uppercase;" ><?php if($_GET['edi']==1){ echo str_replace('<br />','',$rowe[10]); }else{ echo $_POST['muebles']; } ?></textarea>
        </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
              <div class="input-group">
              <div class="input-group-addon">M3</div>
              <input name="m3" id="m3" placeholder="0.0" style="text-transform: uppercase;" class="form-control" onkeypress="return valida(event)" type="text" autocomplete="off" value="<?php if($_GET['edi']==1){ echo $rowe[11]; }else{  echo $_POST['m3']; } ?>" >
        </div>
            
              <div class="input-group">
              <div class="input-group-addon">Costo M3</div>
            <input name="costo_m3" id="costo_m3" placeholder="0.0" style="text-transform: uppercase;" class="form-control" onkeypress="return valida(event)" type="text" autocomplete="off" value="<?php if($_GET['edi']==1){ echo $rowe[12]; }else{  echo $_POST['costo_m3']; } ?>" >
            </div>
    
            <input name="gruas" id="gruas" type="hidden" value="<?php if($_GET['edi']==1){ echo $rowe[42]; }else{ echo $_POST['gruas']; } ?>" >
         
              <div class="input-group">
              <div class="input-group-addon">Aduana</div>
            <input name="aduana" id="aduana" placeholder="0.0" style="text-transform: uppercase;" class="form-control" onkeypress="return valida(event)" type="text" autocomplete="off" value="<?php if($_GET['edi']==1){ echo $rowe[13]; }else{  echo $_POST['aduana']; } ?>" >
            </div>

              <div class="input-group">
              <div class="input-group-addon">Referido</div>
            <input name="referido" id="referido" placeholder="0.0" style="text-transform: uppercase;" class="form-control" onkeypress="return valida(event)" type="text" autocomplete="off" value="<?php if($_GET['edi']==1){ echo $rowe[14]; }else{ echo $_POST['referido']; } ?>" >
            </div>

              <div class="input-group">
              <div class="input-group-addon">Comisión</div>
            <input name="comision" id="comision" placeholder="0.0" style="text-transform: uppercase;" class="form-control" onkeypress="return valida(event)" type="text" autocomplete="off" value="<?php if($_GET['edi']==1){ echo $rowe[15]; }else{ echo $_POST['comision']; } ?>" >
            </div>

              <div class="input-group">
              <div class="input-group-addon">Playo</div>
            <input name="playo" id="playo" placeholder="0.0" style="text-transform: uppercase;" class="form-control" onkeypress="return valida(event)" type="text" autocomplete="off" value="<?php if($_GET['edi']==1){ echo $rowe[16]; }else{  echo $_POST['playo']; } ?>" >
            </div>

              <div class="input-group">
              <div class="input-group-addon">Cuota</div>
            <input name="cuota" id="cuota" placeholder="0.0" style="text-transform: uppercase;" class="form-control" onkeypress="return valida(event)" type="text" autocomplete="off" value="<?php if($_GET['edi']==1){ echo $rowe[17]; }else{ echo $_POST['cuota']; } ?>" >
            </div>

              <div class="input-group">
              <div class="input-group-addon">Ganancia</div>
            <input name="ganancia" id="ganancia" placeholder="0.0" style="text-transform: uppercase;" class="form-control" onkeypress="return valida(event)" type="text" autocomplete="off" value="<?php if($_GET['edi']==1){ echo $rowe[18]; }else{ echo $_POST['ganancia']; } ?>" >
            </div>
        

            <div class="input-group mb-12">
               &nbsp;<br>&nbsp;
            </div>
            

         
              <div class="input-group">
              <div class="input-group-addon">Unidad</div>
            <input name="unidad" id="unidad" style="text-transform: uppercase;" class="form-control" type="text" autocomplete="off" value="<?php if($_GET['edi']==1){ echo $rowe[19]; }else{ echo $_POST['unidad']; } ?>" >
            </div>

              <div class="input-group">
              <div class="input-group-addon">KMS</div>
            <input name="kms" id="kms" style="text-transform: uppercase;" class="form-control" onkeypress="return valida(event)" type="text" autocomplete="off" value="<?php if($_GET['edi']==1){ echo $rowe[20]; }else{ echo $_POST['kms']; } ?>" >
            </div>

              <div class="input-group">
              <div class="input-group-addon">Combustible</div>
            <input name="combustible" id="combustible" style="text-transform: uppercase;" class="form-control" onkeypress="return valida(event)" type="text" autocomplete="off" value="<?php if($_GET['edi']==1){ echo $rowe[21]; }else{ echo $_POST['combustible']; } ?>" >
            </div>

              <div class="input-group">
              <div class="input-group-addon">Casetas</div>
            <input name="casetas" id="casetas" style="text-transform: uppercase;" class="form-control"  type="text" autocomplete="off" value="<?php if($_GET['edi']==1){ echo $rowe[22]; }else{ echo $_POST['casetas']; } ?>" >
            </div>

              <div class="input-group">
              <div class="input-group-addon">Desgaste Unidad</div>
            <input name="d_unidad" id="d_unidad" style="text-transform: uppercase;" class="form-control" onkeypress="return valida(event)" type="text" autocomplete="off" value="<?php if($_GET['edi']==1){ echo $rowe[23]; }else{ echo $_POST['d_unidad']; } ?>" >
            </div>

              <div class="input-group">
              <div class="input-group-addon">Maniobras</div>
            <input name="maniobras" id="maniobras" style="text-transform: uppercase;" class="form-control"  type="text" autocomplete="off" value="<?php if($_GET['edi']==1){ echo $rowe[24]; }else{ echo $_POST['maniobras']; } ?>" >
            </div>

              <div class="input-group">
              <div class="input-group-addon">Otro</div>
            <input name="otro" id="otro" style="text-transform: uppercase;" class="form-control" type="text" autocomplete="off" value="<?php if($_GET['edi']==1){ echo $rowe[25]; }else{ echo $_POST['otro']; } ?>" >
            </div>
        </div>



           
           
            

        </div>
        <div class="col-md-4">

        <div class="form-group">
              <div class="input-group">
              <div class="input-group-addon">KMS</div>
              <input name="kms2" id="kms2" placeholder="Cantidad de KMS en Ruta" style="text-transform: uppercase;" class="form-control" onkeypress="return valida(event)" type="text" autocomplete="off" value="<?php if($_GET['edi']==1){ echo $rowe[26]; }else{ echo $_POST['kms2']; } ?>" >
            </div>
        

            <div class="input-group">
              <div class="input-group-addon">Pre-Costo</div>
              <input name="pre_costo" id="pre_costo" placeholder="0.0" style="text-transform: uppercase;" class="form-control" onkeypress="return valida(event)" type="text" autocomplete="off" value="<?php if($_GET['edi']==1){ echo $rowe[27]; }else{ echo $_POST['pre_costo']; } ?>" >
            </div>

            <div class="input-group">
              <div class="input-group-addon">Pisos</div>
              <input name="pisos" id="pisos" style="text-transform: uppercase;" class="form-control"  type="text" autocomplete="off" value="<?php if($_GET['edi']==1){ echo $rowe[28]; }else{ echo $_POST['pisos']; } ?>" >
            </div>

            <div class="input-group">
              <div class="input-group-addon">Empaque</div>
              <input name="empaque" id="empaque" style="text-transform: uppercase;" class="form-control"  type="text" autocomplete="off" value="<?php if($_GET['edi']==1){ echo $rowe[29]; }else{ echo $_POST['empaque']; } ?>" >
            </div>

            <div class="input-group">
              <div class="input-group-addon">Des/Armados</div>
              <input name="desarmados" id="desarmados" style="text-transform: uppercase;" class="form-control"  type="text" autocomplete="off" value="<?php if($_GET['edi']==1){ echo $rowe[30]; }else{ echo $_POST['desarmados']; } ?>" >
            </div>

            <input name="embodegamiento" id="embodegamiento" value="" type="hidden">
            
            <input name="m32" id="m32" value="" type="hidden">

            <div class="input-group">
              <div class="input-group-addon">Permisos</div>
              <input name="permisos" id="permisos" style="text-transform: uppercase;" class="form-control"  type="text" autocomplete="off" value="<?php if($_GET['edi']==1){ echo $rowe[31]; }else{ echo $_POST['permisos']; } ?>" >
            </div>

            <div class="input-group">
              <div class="input-group-addon">Otro / Especificar</div>
              <input name="otro_ex" id="otro_ex" style="text-transform: uppercase;" class="form-control"  type="text" autocomplete="off" value="<?php if($_GET['edi']==1){ echo $rowe[32]; }else{ echo $_POST['otro_ex']; } ?>" >
            </div>


            <div class="input-group mb-12">
            &nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;
            </div>

            <div class="input-group">
              <div class="input-group-addon">Subtotal</div>
              <input name="subtotal" id="subtotal" placeholder="0.0" style="text-transform: uppercase;" class="form-control" onkeypress="return valida(event)" type="text" autocomplete="off" value="<?php if($_GET['edi']==1){ echo $rowe[34]; }else{ echo $_POST['subtotal']; } ?>" >
            </div>

            <div class="input-group">
              <div class="input-group-addon">Seguro</div>
              <input name="seguro" id="seguro" placeholder="Seg + IVA" style="text-transform: uppercase;" class="form-control" onkeypress="return valida(event)" type="text" autocomplete="off" value="<?php if($_GET['edi']==1){ echo $rowe[35]; }else{ echo $_POST['seguro']; } ?>" >
            </div>

            <div class="input-group">
              <div class="input-group-addon">Costo Proveedor</div>
              <input name="costo_proveedor" id="costo_proveedor" placeholder="0.0" style="text-transform: uppercase;" class="form-control" onkeypress="return valida(event)" type="text" autocomplete="off" value="<?php if($_GET['edi']==1){ echo $rowe[36]; }else{ echo $_POST['costo_proveedor']; } ?>" >
            </div>

            <div class="input-group">
              <div class="input-group-addon">Servicio</div>
              <input name="servicio" id="servicio" placeholder="0.0" style="text-transform: uppercase;" class="form-control" onkeypress="return valida(event)" type="text" autocomplete="off" value="<?php if($_GET['edi']==1){ echo $rowe[37]; }else{ echo $_POST['servicio']; } ?>" >
            </div>

            <div class="input-group">
              <div class="input-group-addon">Seguro</div>
              <input name="seguro2" id="seguro2" placeholder="0.0" style="text-transform: uppercase;" class="form-control" onkeypress="return valida(event)" type="text" autocomplete="off" value="<?php if($_GET['edi']==1){ echo $rowe[38]; }else{ echo $_POST['seguro2']; } ?>" >
            </div>
            
            <div class="input-group">
              <div class="input-group-addon">Extras</div>
              <input name="extras" id="extras" placeholder="0.0" style="text-transform: uppercase;" class="form-control" onkeypress="return valida(event)" type="text" autocomplete="off" value="<?php if($_GET['edi']==1){ echo $rowe[39]; }else{ echo $_POST['extras']; } ?>" >
            </div>

            <div class="input-group">
              <div class="input-group-addon">Total Cliente</div>
              <input name="total_cliente" id="total_cliente" placeholder="0.0" style="text-transform: uppercase;" class="form-control" onkeypress="return valida(event)" type="text" autocomplete="off" value="<?php if($_GET['edi']==1){ echo $rowe[40]; }else{ echo $_POST['total_cliente']; } ?>" >
            </div>

        </div>

        </div>


</div>



<div class="col-md-12 row">
<hr>
<div class="form-group" style="text-align: right;">
                <button type="submit" class="btn btn-primary"  <?php if($_GET['edi']==1){ ?> name="guardarcambiosc" id="guardarcambiosc">Guardar Cambios <?php }else{ ?> name="guardarcotizacion" id="guardarcotizacion">Guardar <?php } ?> </button>
            </div>
        
</div>






              </form>
            


              </div>
          <!-- /.card-body -->
        </div>
   

        </div>




<script>

function verRuta(){

  let params = `scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,
width=1100,height=700,left=300,top=300`;

var cor1=document.getElementById('coordenadas').value;
var cor2=document.getElementById('coordenadas2').value;


open("https://www.google.com.mx/maps/dir/"+cor1+"/"+cor2+"/@"+cor1+"/data=!3m1!4b1!4m2!4m1!3e0", "test", params);
}

</script>
