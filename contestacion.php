<?php 
$correo=$_POST['correo'];
$nombre=$_POST['nombre'];
$celular=$_POST['cel'];
$origen=$_POST['origen'];
$destino=$_POST['destino'];
$lista=$_POST['lista'];
$telefono=$_POST['tel'];
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$cabeceras .= 'From: www.mudanzaslaunion.com' . "\r\n"; //cuenta desde la cual se envian los correos
$cabeceras .= "Reply-To: $correo\r\n";
$destino="mudanzas@launionsanmiguel.com"; 
//$destino="mudanza@launionsanmiguel.com"; //aqui va la cuenta a la cual va a llegar la informacion
$titulo  =  "Ha recibido un mensaje"; //aqui van los campos del formulario
$mensaje     =  " <br>
Correo: $correo<br>
Nombre: $nombre<br>
Celular: $celular<br>
Origen: $origen<br>
Destino: $destino<br>
Lista: <br>".nl2br($_POST['lista'])."<br>";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	//$mensaje=htmlentities($mensaje);
$host = "localhost";
	$user = "applauni_mudause";	
	$pass = "Launion2017@";	
	$bbdd = "applauni_mudanzas";

	  $conexio = mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
			mysql_select_db($bbdd,$conexio) or die("resultado=".urlencode(mysql_error()));
		 	 $csql = "INSERT INTO viaweb(nombre,correo,celular,origen,destino,lista,fecha,telefono) values('".$nombre."','".$correo."','".$celular."','".$origen."','".$destino."','".$lista."','".date('Y-m-d H:i:s')."','".$telefono."')";   
		 	
			mysql_query($csql)or die("resultado=".urlencode(mysql_error()));

			 $csql = "delete  from cotizacion2 where clave='".$_GET['c']."'";    
			mysql_query($csql)or die("resultado=".urlencode(mysql_error()));

	if(mail($destino,$titulo,$mensaje,$cabeceras)){
  echo "Gracias por sus comentarios";
?>
<script type="text/javascript">
function redi(){
 location.href="index.php";
}
setTimeout('redi()',2000);
</script>
<?

     }else{
   echo "Lo sentimos no se pudo enviar su correo, favor de revisar sus datos <p>";
	 }
?>

