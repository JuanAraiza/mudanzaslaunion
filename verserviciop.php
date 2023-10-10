



<form id="formn" name="formn" action="tareas.php?verservp=1&c=<? echo $_GET['c']; ?>" method="post" enctype="multipart/form-data" >
<div class="row">
    <div class="col-md-6">

           
 <?
$link=mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
  mysql_select_db($bbdd,$link) or die("resultado=".urlencode(mysql_error()));
  $result=mysql_query("SELECT * from viaweb where id=".$_GET['c'], $link);
  $row=mysql_fetch_row($result);


if(isset($_POST['enviarcontestacion'])){

$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$cabeceras .= 'From: mudanzas@launionsanmiguel.com' . "\r\n"; //cuenta desde la cual se envian los correos
$cabeceras .= "Reply-To: mudanzas@launionsanmiguel.com\r\n";
$destino=$row[2]; 
//$destino="mudanza@launionsanmiguel.com"; //aqui va la cuenta a la cual va a llegar la informacion
$titulo  =  "Ha recibido un mensaje"; //aqui van los campos del formulario
$mensaje     =  " <br>
Correo: $row[2]<br>
Nombre: $row[1]<br>
Celular: $row[3]<br>
Origen: $row[4]<br>
Destino: $row[5]<br>
Lista: <br>".nl2br($row[6])."<br>";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  //$mensaje=htmlentities($mensaje);


    $conexio = mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
      mysql_select_db($bbdd,$conexio) or die("resultado=".urlencode(mysql_error()));
       $csql = "INSERT INTO contestacion(id_p,contestacion,fecha) values('".$_GET['c']."','".$_POST['comentarios']."','".date('Y-m-d H:i:s')."')";   
      
      mysql_query($csql)or die("resultado=".urlencode(mysql_error()));

       $csql = "delete  from cotizacion2 where clave='".$_GET['c']."'";    
      mysql_query($csql)or die("resultado=".urlencode(mysql_error()));

  if(mail($destino,$titulo,$mensaje,$cabeceras)){
  ?>
<script type="text/javascript">

 location.href="tareas.php?verservp=1&c=<? echo $_GET['c']; ?>";

</script>
<?
     }else{
  // echo "Lo sentimos no se pudo enviar su correo, favor de revisar sus datos <p>";
   }

}



?>



<input type="hidden" name="id" id="id" value="<? echo $row[0]; ?>">

   <div class="form-group" >
            <label>Nombre</label>
               <? echo $row[1]; ?>
              </div>

              <div class="form-group" >
            <label>Correo</label>
               <? echo $row[2]; ?>
              </div>

              <div class="form-group">
            <label>Celular</label>
               <? echo $row[3]; ?>
              </div>
<div class="form-group" style="width: 100px;">
            <label>Telefono</label>
               <? echo $row[8]; ?>
              </div>

              <div class="form-group" style="width: 100px;">
            <label>Origen</label>
               <? echo $row[4]; ?>
              </div>

               <div class="form-group">
            <label>Destino</label>
              <? echo $row[5]; ?>
              </div>

 <div class="form-group" style="width: 25%">
                  <label>Lista de muebles:</label>
                  <? echo $row[6]; ?>
                </div>

                 <div class="form-group" style="width: 100%">
<? 
$resultp=mysql_query("SELECT * from contestacion where id_p=".$_GET['c']." order by id desc", $link);
  while($rowp=mysql_fetch_row($resultp)){ 
    echo '<br><br>';
echo substr($rowp[3],8,2).'-'.substr($rowp[3],5,2).'-'.substr($rowp[3],0,4);
echo '<br>';
echo $rowp[2];
echo '<br>';
   }
  ?>
      </div>   

 <div class="form-group" style="width: 75%">
                  <label>Comentarios:</label>
                  <textarea  id="comentarios" name="comentarios" class="form-control" rows="3" placeholder="Comentario ..." style="text-transform: uppercase;" ></textarea>
                </div>

                <div class="box-footer">
 
            <div class="form-group" style="width: 33%; align-content: center;">
                <button type="submit" class="btn btn-primary"  name="enviarcontestacion" id="enviarcontestacion">Enviar</button>
             </div>
            <!-- <div class="form-group" style="width: 33%; align-content: center;">
                <button type="submit" class="btn btn-primary"  name="guardarservicio" id="guardarservicio">Generar Servicio</button>
              </div>-->
              </div>

</div>

 </div>
</form>