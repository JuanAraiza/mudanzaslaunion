dsfsd
<form id="formn" name="formn" action="tareas.php?verserv=1&c=<? echo $_GET['c']; ?>" method="post" enctype="multipart/form-data" >
<div class="row">
    <div class="col-md-6">

           
 <?
$link=mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
  mysql_select_db($bbdd,$link) or die("resultado=".urlencode(mysql_error()));
  $result=mysql_query("SELECT * from servicio where clave='".$_GET['c']."'", $link);
  $row=mysql_fetch_row($result);
?>
<input type="hidden" name="cla" id="cla" value="<? echo $_GET['c']; ?>">

   <div class="form-group" >
            <label>Cliente</label>
               <? echo $row[1]; ?>
              </div>

              <div class="form-group" >
            <label>Origen</label>
               <? echo $row[2]; ?>
              </div>

              <div class="form-group">
            <label>Destino</label>
               <? echo $row[3]; ?>
              </div>
<div class="form-group" style="width: 100px;">
            <label>KM</label>
               <? echo $row[10]; ?>
              </div>

              <div class="form-group" style="width: 100px;">
            <label>M3</label>
            <input type="text" name="m3"  class="form-control" value="<? echo $row[11]; ?>">
               <? //echo $row[11]; ?>
              </div>

               <div class="form-group">
            <label>Tipo Mudanza</label>
            <select class="form-control select2" style="width: 100%;" id="tiposs" name="tiposs">
                  <option value="--">--</option>
                   <option <? if($row[4]=='Exclusivo'){ ?> selected <? } ?> value="Exclusivo">Exclusivo</option>
                    <option <? if($row[4]=='Compartido'){ ?> selected <? } ?>  value="Compartido">Compartido</option>
                    <option <? if($row[4]=='Flete'){ ?> selected <? } ?>  value="Flete">Flete</option>
                  
                </select>
              <? // echo $row[4]; ?>
              </div>

 <div class="form-group" style="width: 25%">
                  <label>Lista de muebles:</label>
                  <textarea name="lista_m" ><? echo str_replace('<br />','',$row[7]); ?></textarea>
                  <? // echo str_replace('<br />','',$row[7]); ?>
                </div>
          
 <div class="form-group" style="width: 50%; margin-right: auto; margin-left: auto; align-content: center;">
  <label style="margin-right: auto; margin-left: auto;" >Extras</label>
<table style="width: 300px; margin-right: auto; margin-left: auto;" align="center">
  <? if($row[12]>=1){ ?>
<tr>
  <td style="padding: 1px;"><label style="margin-bottom: 0px;">KM Extra</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px;"><? echo $row[12]; ?></td>
</tr>
<? } ?>
<? if($row[13]>=1){ ?>
<tr>
  <td style="padding: 1px;"><label style="margin-bottom: 0px;">Empaque Cajas</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px;"><? echo $row[13]; ?></td>
</tr>
<? } ?>
<? if($row[14]>=1){ ?>
<tr>
  <td style="padding: 1px;"><label style="margin-bottom: 0px;">Emplaye Total</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px;"><? echo $row[14]; ?></td>
</tr>
<? } ?>
<? if($row[15]>=1){ ?>
<tr>
  <td style="padding: 1px;"><label style="margin-bottom: 0px;">Caja Closet Venta</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px;"><? echo $row[15]; ?></td>
</tr>
<? } ?>
<? if($row[16]>=1){ ?>
<tr>
  <td style="padding: 1px;"><label style="margin-bottom: 0px;">Caja Closet Renta</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px;"><? echo $row[16]; ?></td>
</tr>
<? } ?>
<? if($row[17]>=1){ ?>
<tr>
  <td style="padding: 1px;"><label style="margin-bottom: 0px;">Desempaque a Granel</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px;"><? echo $row[17]; ?></td>
</tr>
<? } ?>
<? if($row[18]>=1){ ?>
<tr>
  <td style="padding: 1px;"><label style="margin-bottom: 0px;">Empaque de Muebles</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px;"><? echo $row[18]; ?></td>
</tr>
<? } ?>
<? if($row[19]>=1){ ?>
<tr>
  <td style="padding: 1px;"><label style="margin-bottom: 0px;">Seguro</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px;"><? echo $row[19]; ?></td>
</tr>
<? } ?>
<? if($row[20]>=1){ ?>
<tr>
  <td style="padding: 1px;"><label style="margin-bottom: 0px;">Otros</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px;"><? echo $row[20]; ?></td>
</tr>
<? } ?>
<tr>
  <td style="padding: 1px;"><label style="margin-bottom: 0px;">Costo Extras</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px; text-align: right;" align="right"><? //echo round($row[21],2); ?>
    <input type="text" name="costote"  class="form-control" value="<? echo round($row[21],2); ?>">
  </td>
</tr>
<tr>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px; text-align: right;" align="right"><? 
if($row[4]=='Exclusivo'){
$cos=$row[5];
?><input type="hidden" name="costot1"  class="form-control" value="<? echo $cos; ?>"><?
}else{
$cos=$row[6];
?><input type="hidden" name="costot2"  class="form-control" value="<? echo $cos; ?>"><?
}
  //echo round($cos,2); ?></td>

</tr>
<tr>
  <td style="padding: 1px;"><label style="margin-bottom: 0px;">Costo Proveedor</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px; text-align: right;" align="right"><? $tot = $cos + $row[21]; //echo $tot
if($row[43]>=1){
$cost1=$row[43];
}else{
$cost1=$tot;
}
   ?>
    <input type="text" name="costoproveedor"  class="form-control" value="<? echo round($cost1, 2); ?>">
  </td>
</tr>
<tr>
  <td style="padding: 1px;"><label style="margin-bottom: 0px;">Costo Client</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px; text-align: right;" align="right"><? //echo $tot;
if($row[42]>=1){
$cost2=$row[42];
}else{
$cost2=$tot+($tot*.25);
}
   ?>
    <input type="text" name="costocliente"  class="form-control" value="<? echo round($cost2, 2); ?>">
  </td>
</tr>
</table>
 </div>
<div >

 <div class="form-group" style="width: 25%;">
                  <label>FECHA DEL SERVICIO</label>
                        <div class="input-group">
                          
                          <input  class="form-control" autocomplete="off"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask maxlength="10" type="text" name="fecha_s" id="datepicker" value="<? echo substr($row[22],8,2).'/'.substr($row[22],5,2).'/'.substr($row[22],0,4); ?>">
                    </div>
                </div>


                 <div class="form-group" style="width: 25%;">
                  <label>HORA DEL SERVICIO</label>
                  <input type="text" name="hora_s"  class="form-control" value="<? echo $row[23]; ?>">
                </div>
                 <div class="form-group" style="width: 25%;">
                  <label>TIEMPO DE ENTREGA APROXIMADO</label>
                  <input type="text" name="tiempo_e" class="form-control" value="<? echo $row[38]; ?>" >
                </div>
                <div class="form-group" style="width: 25%;">
               <label>PROVEEDOR</label>
               
               <select class="form-control select2" id="proveedor" name="proveedor">
                  <option value="--">--</option>
                   
                  <?
  $resultp = mysql_query("select * FROM proveedores", $link);
while ($rowp = mysql_fetch_row($resultp)){
  ?>

<option <? if($rowp[0]==$row[40]){ ?> selected <? } ?> value="<? echo $rowp[0]; ?>"><? echo htmlentities($rowp[1]).' '.htmlentities($rowp[2]).' - '.$rowp[6] ; ?></option>
<? } ?>

                </select>
              </div>
                

 </div>

<div class="box-footer" style="width: 100%; overflow: hidden;">
<p style="font-size:18px;">DIRECIÓN DE CARGA</p>
 <div class="form-group" style="width: 20%;">
                  <label>CALLE Y NO.</label>
                  <input type="text" name="calle_no_c" class="form-control" value="<? echo $row[24]; ?>" >
                </div>
                 <div class="form-group" style="width: 20%;">
                  <label>COLONIA</label>
                  <input type="text" name="colonia_c" class="form-control" value="<? echo $row[25]; ?>" >
                </div>
                 <div class="form-group" style="width: 20%;">
                  <label>REFERENCIA PARA LLEGAR</label>
                  <input type="text" name="referencia_c" class="form-control" value="<? echo $row[26]; ?>" >
                </div>
                 <div class="form-group" style="width: 20%;">
                  <label>NOM. DE QUIEN ENTREGA</label>
                  <input type="text" name="nom_c" class="form-control" value="<? echo $row[27]; ?>" >
                </div>
                <div class="form-group" style="width: 20%;">
                  <label>TEL. DE QUIEN ENTREGA</label>
                  <input type="text" name="tel_c" class="form-control" value="<? echo $row[28]; ?>" >
                </div>

 </div>

 
 <div class="box-footer">
<p style="font-size:18px;">DIRECIÓN DE DESCARGA</p>
 <div class="form-group" style="width: 20%;">
                  <label>CALLE Y NO.</label>
                  <input type="text" name="calle_no_d" class="form-control" value="<? echo $row[29]; ?>" >
                </div>
                 <div class="form-group" style="width: 20%;">
                  <label>COLONIA</label>
                  <input type="text" name="colonia_d" class="form-control" value="<? echo $row[30]; ?>" >
                </div>
                 <div class="form-group" style="width: 20%;">
                  <label>REFERENCIA PARA LLEGAR</label>
                  <input type="text" name="referencia_d" class="form-control" value="<? echo $row[31]; ?>" >
                </div>
                 <div class="form-group" style="width: 20%;">
                  <label>NOM. DE QUIEN RECIBE</label>
                  <input type="text" name="nom_d" class="form-control" value="<? echo $row[32]; ?>" >
                </div>
                <div class="form-group" style="width: 20%;">
                  <label>TEL. DE QUIEN RECIBE</label>
                  <input type="text" name="tel_d" class="form-control" value="<? echo $row[33]; ?>" >
                </div>

 </div>

  <div class="box-footer">
<p style="font-size:18px;">PAGOS</p>
 <div class="form-group" style="width: 25%;">
                  <label>ANTICIPO</label>
                  <input type="text" name="anticipo" class="form-control" onkeypress="return valida(event)" value="<? echo $row[34]; ?>" >
                </div>
                 <div class="form-group" style="width: 25%;">
                  <label>A LA CARGA</label>
                  <input type="text" name="a_la_carga" class="form-control" onkeypress="return valida(event)" value="<? echo $row[35]; ?>" >
                </div>
                 <div class="form-group" style="width: 25%;">
                  <label>ANTES DE LA CARGA</label>
                  <input type="text" name="antes_de_carga" class="form-control" onkeypress="return valida(event)" value="<? echo $row[36]; ?>" >
                </div>
                 <div class="form-group" style="width: 25%;">
                  <label>FORMA DE PAGO</label>
                  <input type="text" name="forma_p" class="form-control" value="<? echo $row[37]; ?>" >
                </div>
                
<div class="form-group" style="width: 50%;">
                  <label>OBSERVACIONES</label>
                  <textarea name="observaciones"  ><? echo str_replace('<br />','',$row[39]); ?></textarea>
                </div>

                <div class="form-group" style="width: 50%;">
                  <label>PARA PROVEEDOR FAVOR DE LLEVAR</label>
                  <textarea name="favor_llevar" ><? echo str_replace('<br />','',$row[41]); ?></textarea>
                </div>

<div style="width:100%; align-content: right; text-align: right;">
  <button type="submit" class="btn btn-primary"  name="guardarcambios" id="guardarcambios">Guardar</button>
</div>

 </div>

       
        <div class="box-footer" >

<table>
  <?

  $resultar1 = mysql_query("select * FROM archivos where clave='".$_GET['c']."' order by id desc", $link);
  while($rowar1 = mysql_fetch_row($resultar1)){
  ?>
  
    <tr>
    <td><? echo $rowar1[4]; ?></td>
    <td><? echo substr($rowar1[3],8,2).'-'.substr($rowar1[3],5,2).'-'.substr($rowar1[3],0,4); ?></td>
    <td><a style="text-decoration: underline;" onClick="javascript:document.getElementById('archi2').src='archivos/<? echo $rowar1[2]; ?>'">Ver Archivo</a></td>
    <td><a style="text-decoration: underline;" href="tareas.php?ser=1&elia=1&id=<? echo $rowar1[0]; ?>&archivo=<? echo $rowar1[2]; ?>&c=<? echo $_GET['c']; ?>">Eliminar Archivo</a></td>
    </tr>
<? } ?>
</table>
<?

$resultar=mysql_query("SELECT * from archivos where clave='".$_GET['c']."'", $link);
  $rowar=mysql_fetch_row($resultar);
  if($rowar[0]>=1){
  ?>
<iframe id="archi2" style="width:100%; height:600px;"></iframe>
<? } ?>
<table style="width: 60%; margin-left: auto; margin-right: auto;">
<tr>
<td><input  name="tipoarchivo" id="tipoarchivo"  style="text-transform: uppercase; height: 26px; margin-bottom: 0px;" class="form-control" type="text"  autocomplete="off" ></td>
<td><input type="file" name="archivo" ></td>
<td><button type="submit" class="btn btn-primary"  name="subir" id="subir">Subir Archivo</button></td>
  </tr>
</table>


              </div>
  
           


<?

if(isset($_POST['guardarcambios'])){

$campo0=$_POST['cla'];
$campo1=substr($_POST['fecha_s'],6,4).'-'.substr($_POST['fecha_s'],3,2).'-'.substr($_POST['fecha_s'],0,2);
$campo2=$_POST['hora_s'];
$campo3=$_POST['tiempo_e'];
$campo4=str_replace("'","\'",$_POST['calle_no_c']);
$campo5=str_replace("'","\'",$_POST['colonia_c']);
$campo6=str_replace("'","\'",$_POST['referencia_c']);
$campo7=str_replace("'","\'",$_POST['nom_c']);
$campo8=str_replace("'","\'",$_POST['tel_c']);
$campo9=str_replace("'","\'",$_POST['calle_no_d']);
$campo10=str_replace("'","\'",$_POST['colonia_d']);
$campo11=str_replace("'","\'",$_POST['referencia_d']);
$campo12=str_replace("'","\'",$_POST['nom_d']);
$campo13=str_replace("'","\'",$_POST['tel_d']);
$campo14=str_replace("'","\'",$_POST['anticipo']);
$campo15=str_replace("'","\'",$_POST['a_la_carga']);
$campo16=str_replace("'","\'",$_POST['antes_de_carga']);
$campo17=str_replace("'","\'",$_POST['forma_p']);
$campo18=nl2br($_POST['observaciones']);
$campo19=str_replace("'","\'",$_POST['proveedor']);
$campo20=str_replace("'","\'",$_POST['favor_llevar']);
$campo21=str_replace("'","\'",$_POST['costot1']);
$campo22=str_replace("'","\'",$_POST['costot2']);
$campo23=str_replace("'","\'",$_POST['costote']);
$campo24=nl2br($_POST['lista_m']);
$campo25=str_replace("'","\'",$_POST['tiposs']);
$campo26=str_replace("'","\'",$_POST['costocliente']);
$campo27=str_replace("'","\'",$_POST['costoproveedor']);
$campo28=str_replace("'","\'",$_POST['m3']);

$conexio = mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
mysql_select_db($bbdd,$conexio) or die("resultado=".urlencode(mysql_error()));
$csql = "update servicio set fecha_s='".$campo1."',hora_s='".$campo2."',calle_no_c='".$campo4."',colonia_c='".$campo5."',referencia_c='".$campo6."',nom_c='".$campo7."',tel_c='".$campo8."',calle_no_d='".$campo9."',colonia_d='".$campo10."',referencia_d='".$campo11."',nom_d='".$campo12."',tel_d='".$campo13."',anticipo='".$campo14."',a_la_carga='".$campo15."',antes_de_la_carga='".$campo16."',forma_de_pago='".$campo17."',tiempo_entrega_aprox='".$campo3."',observaciones='".$campo18."',proveedor='".$campo19."',favorllevar='".$campo20."',costo='".$campo21."',costo2='".$campo22."',extras='".$campo23."',muebles='".$campo24."',tipo_mudanza='".$campo25."',costocliente='".$campo26."',costoproveedor='".$campo27."',m3='".$campo28."' where clave='".$campo0."'";
    mysql_query($csql)or die("resultado=".urlencode(mysql_error()));


?>
    <script type="text/javascript">
     location.href="tareas.php?verserv=1&c=<? echo $campo0; ?>"; </script>
<?

  }




if(isset($_POST['subir'])){

  $conexio = mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
  mysql_select_db($bbdd,$conexio) or die("resultado=".urlencode(mysql_error()));

    if (is_uploaded_file($_FILES['archivo']['tmp_name'])) {
    $ext = end((explode(".", $_FILES['archivo']['name']))); 
      $campo35 = time().".".$ext;
      move_uploaded_file($_FILES['archivo']['tmp_name'], "archivos/".$campo35);
    
  } else {
    $error=true;
    $errormsg = "Error al cargar imagen: " . $_FILES['archivo']['name'];
  }
  if($error){
  $campo35 = "N_A";
  }
  
  $cad=0;
$cade='';
  if($_POST['tipoarchivo']==''){
    $cad=1;
    $cade.='Falta llenar tipo del archvio \n';
  }
if($campo35 == "N_A"){
    $cad=1;
    $cade.='Falta seleccionar archivo \n';
  }

if($cad!=1){

  $campo1=$_POST['cla']; 
  $campo2 = $campo35;
  $campo3=date("Y-m-d H:i:s");
  $campo4 = $_POST['tipoarchivo'];
  
    
 $csql = "insert into archivos(clave,archivo,fecha,tipo) values('".$campo1."','".$campo2."','".$campo3."','".$campo4."')";
    mysql_query($csql)or die("resultado=".urlencode(mysql_error()));
  
  
  $conexio = mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
  mysql_select_db($bbdd,$conexio) or die("resultado=".urlencode(mysql_error()));

    
      ?>
<script type="text/javascript"> location.href="tareas.php?verserv=1&c=<? echo $_GET['c']; ?>"; </script>
<?
  }
  else{
?>
    <script type="text/javascript">
alert('<? echo $cade; ?>');
     location.href="tareas.php?verserv=1&c=<? echo $_GET['c']; ?>"; </script>
<?
  }


} 
?>

<? if(isset($_POST['borrador'])){
$km=$_POST['km'];
$m3=$_POST['m3'];



       $c13=$_POST['empaquec'];
       $c14=$_POST['emplayet'];
       $c15=$_POST['cajacv'];
       $c16=$_POST['cajacr'];
       $c17=$_POST['desempaqueg'];
       $c18=$_POST['empaquem'];
       $c19=$_POST['seguro'];
       $c20=$_POST['otros'];
       $c21=($c13*160)+($c14*400)+($c15*300)+($c16*160)+($c17*80)+($c18*75)+($c19 * .025)+($c20*2500);

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
<input name="costo" id="costo" type="hidden" value="<? echo $costocon; ?>" >
<input name="costo2" id="costo2" type="hidden" value="<? echo $comcon; ?>" >
<?
}


?>


<? 
} ?>


           
        </div>

          </div>
   </form>                 
  
        

<script type="text/javascript">

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

