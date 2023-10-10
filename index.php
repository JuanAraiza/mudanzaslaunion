<? session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Mudanzas - La Unión</title>
<style type="text/css">
body {
	font-family:"Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
	background-color: #000;
}

#bg {
	position: fixed;
	z-index: -1;
	top: 0;
	left: 0;
	width: 100%;
}

.div {
	background:url(images/fondito.png);
	width:300px;
	margin:20% auto;
	border-radius: 15px;
	padding: 10px;
	text-align:center;
	align-content:center;
}

.div h2{
	
	align-content:center;
	margin-left:auto;
	margin-right:auto;
	text-align:center;	
}

.boton{
	
	border: none;
 background: #3a7999;
 color: #f2f2f2;
 padding: 10px;
 font-size: 18px;
 border-radius: 5px;
 position: relative;
 box-sizing: border-box;
 transition: all 500ms ease;

		
}

.boton:hover {
 background: rgba(0,0,0,0);
 color: #3a7999;
 box-shadow: inset 0 0 0 3px #3a7999;
}



.titulo{
	font-size:18px;
	text-align:center;	
}

</style>
</head>
<? 

function getRealIP(){

        if (isset($_SERVER["HTTP_CLIENT_IP"])){

            return $_SERVER["HTTP_CLIENT_IP"];

        }elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){

            return $_SERVER["HTTP_X_FORWARDED_FOR"];

        }elseif (isset($_SERVER["HTTP_X_FORWARDED"])){

            return $_SERVER["HTTP_X_FORWARDED"];

        }elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])){

            return $_SERVER["HTTP_FORWARDED_FOR"];

        }elseif (isset($_SERVER["HTTP_FORWARDED"])){

            return $_SERVER["HTTP_FORWARDED"];

        }else{

            return $_SERVER["REMOTE_ADDR"];

        }
    }       


if(isset($_GET['cerrar'])){
  include('config.php');
  $accion='Salida';
  $linkk = '';
  $fecha= date('Y-m-d H:i:s');
  $usuario = $_SESSION['nombre_usuario'];
  $ip=getRealIP(); 

  $query3 = "insert into monitoreo(accion,link,fecha,usuario,ip) values('".$accion."','".$linkk."','".$fecha."','".$usuario."','".$ip."')";

$link->query($query3);
  session_destroy();
  ?>
  <script>location.href="index.php";</script>
  <?php
}

/*
if(isset($_GET['cerrar'])){
	session_destroy();
}*/
if(isset($_POST['entrar'])){
	$_SESSION['us']=0;

		if($_SESSION['us']==2){
		}else{
		include('config.php');

	
	//echo "SELECT count(id) from usuarios where  pwd='".md5($_POST['password'])."'";

	$query="SELECT count(id) from usuarios where  pwd='".md5($_POST['password'])."'";
$result = $link->query($query);
	$row=mysqli_fetch_row($result);
	if($row[0]==1){
		$_SESSION['us']=1;
	
		$query2 = "SELECT * from usuarios where  pwd='".md5($_POST['password'])."'";
		$result2 = $link->query($query2);
		$row2=mysqli_fetch_row($result2);
		$_SESSION['nombre_usuario']=$row2[3];
		$_SESSION['tipo_usuario']=$row2[4];
		$_SESSION['id_user']=$row2[0];
		$_SESSION['nombre']=utf8_encode($row2[3]);
		$_SESSION['puesto']=utf8_encode($row2[5]);
		$_SESSION['telefono']=$row2[6];
		$_SESSION['color_user']=$row2[7];
		

$accion='Entrada';
  $linkk = '';
  $fecha= date('Y-m-d H:i:s');
  $usuario = $_SESSION['nombre_usuario'];
  $ip=getRealIP(); 
      $query4 = "insert into monitoreo(accion,link,fecha,usuario,ip) values('".$accion."','".$linkk."','".$fecha."','".$usuario."','".$ip."')";

$link->query($query4);


		?>
	<script>location.href="tareas.php";</script>
	<?
		
	}
	}
	
}
?>
<body>
<img src="images/fondo2.jpg" alt="Fondo" id="bg">
<form id="form" name="form" action="" method="post">
<div class="div">


<strong>Password:</strong>&nbsp;<input type="password" name="password" id="password"/>
<br><br>
<input class="boton" type="submit" value="Entrar" id="entrar" name="entrar"/>
</div>
</form>
</body>
</html>