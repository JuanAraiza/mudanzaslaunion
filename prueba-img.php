<?php 
$input = 'https://launionmudanzas.com/aplicacion/formatotc.php?c=c4f2442fb6ae7b3246c4287a98d0f5a2';
$output = 'test2.png';
			
$cmd = "$input $output";

echo $cmd.'<br>';

exec("convert $cmd");

?>