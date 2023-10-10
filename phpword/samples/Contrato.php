<?php  if(isset($_GET['dos'])){ ?><h2>GENERANDO CONTRATO</h2><?php } ?>
<?php
use PhpOffice\PhpWord\Element\Field;
use PhpOffice\PhpWord\Element\Table;
use PhpOffice\PhpWord\Element\TextRun;
use PhpOffice\PhpWord\SimpleType\TblWidth;

include_once 'Sample_Header2.php';

if(isset($_GET['dos'])){

  $lowc = array("á", "é", "í","ó","ú");
  $uppc = array("Á", "É", "Í","Ó","Ú");

$link = mysqli_connect('localhost', 'UserMUnion', 'LaUnion2020!', 'Mudanzasunion');

	$csql = "SELECT * from servicio where clave='".$_GET['c']."'";
  $result = $link->query($csql);
  $row=mysqli_fetch_row($result);

  function mes($m){
switch($m){
case '01':
return 'Enero';
break;
case '02':
return 'Febrero';
break;
case '03':
return 'Marzo';
break;
case '04':
return 'Abril';
break;
case '05':
return 'Mayo';
break;
case '06':
return 'Junio';
break;
case '07':
return 'Julio';
break;
case '08':
return 'Agosto';
break;
case '09':
return 'Septiembre';
break;
case '10':
return 'Octubre';
break;
case '11':
return 'Noviembre';
break;
case '12':
return 'Diciembre';
break;
}
  }


// Template processor instance creation
echo date('H:i:s'), ' Creando Contrato...', EOL;
if($_GET['emp']=='cruz'){
  $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('resources/Machote_de_contrato_202123cruz.docx');
}else{
  $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('resources/Machote_de_contrato_202123.docx');
 }


$no1 = new TextRun();
$dd=strtoupper($row[4]);
$no1->addText($dd, array('bold' => true, 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('tipo', $no1);

$no2 = new TextRun();
$dd=($row[4]);
$no2->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('tipo2', $no2);

$no3 = new TextRun();
$dd=($row[4]);
$no3->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('tipo3', $no3);


$no4 = new TextRun();
$dd=($row[1]);
$no4->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('nombre_c', $no4);

$no5 = new TextRun();
$dd=($row[104]);
$no5->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('sr', $no5);

$no6 = new TextRun();
$dd=($row[89]);
$no6->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('ruta', $no6);

$no7 = new TextRun();
$dd=substr($row[22],8,2).' de '.mes(substr($row[22],5,2)).' del '.substr($row[22],0,4);
$no7->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('fecha_ini', $no7);

$no8 = new TextRun();
$dd=($row[2]);
$no8->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('origen', $no8);

$no9 = new TextRun();
$dd=($row[3]);
$no9->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('destino', $no9);

$no10 = new TextRun();
$dd=($row[106]);
$no10->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('estado_o', $no10);

$no11 = new TextRun();
$dd=($row[108]);
$no11->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('estado_d', $no11);

//////////////////////////

$no12 = new TextRun();
$dd=($row[24]);
$no12->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('calle_r', $no12);

$no13 = new TextRun();
$dd=($row[25]);
$no13->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('colonia_r', $no13);

$no14 = new TextRun();
$dd=($row[105]);
$no14->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('cp_r', $no14);

$no15 = new TextRun();
$dd=($row[44]);
$no15->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('ciudad_r', $no15);

$no16 = new TextRun();
$dd=($row[106]);
$no16->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('estado_r', $no16);

//////////////////////////

$no17 = new TextRun();
$dd=($row[29]);
$no17->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('calle_e', $no17);

$no18 = new TextRun();
$dd=($row[30]);
$no18->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('colonia_e', $no18);

$no19 = new TextRun();
$dd=($row[107]);
$no19->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('cp_e', $no19);

$no20 = new TextRun();
$dd=($row[45]);
$no20->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('ciudad_e', $no20);

$no21 = new TextRun();
$dd=($row[108]);
$no21->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('estado_e', $no21);

/////////////////////////////////

$no22 = new TextRun();
$dd=($row[4]);
$no22->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('tipo4', $no22);

//////////////////////////////

$no23 = new TextRun();
$dd=str_replace('<br />','',$row[7]);
//$no23->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
//$templateProcessor->setComplexValue('lista_m', $no23);

$text = $dd;
$textlines = explode("\n", $text);


$no23->addText(array_shift($textlines), array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
foreach($textlines as $line) {
  $no23->addTextBreak();
    // maybe twice if you want to seperate the text
    // $textrun->addTextBreak(2);
    $no23->addText($line, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
}
$templateProcessor->setComplexValue('lista_m', $no23);



 $subt=$row[42] + $row[21]; 


$no24 = new TextRun();
$dd=number_format($subt,2);
$no24->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('costo', $no24);

$formatterES = new NumberFormatter("es-MX", NumberFormatter::SPELLOUT);
$n = $row[42];
$izquierda = intval(floor($n));
$derecha = intval(($n - floor($n)) * 100);
//echo $formatterES->format($izquierda) . " coma " . $formatterES->format($derecha);


$no25 = new TextRun();
//$dd=$formatterES->format($izquierda) . " con " . $formatterES->format($derecha);
$dd=strtoupper($formatterES->format($izquierda));

$no25->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('costo_l', $no25);

/////////////////////////
//if($row[136]!=2){
  if($row[19]!=''){
  $ss=$row[19];
  }else{
    $ss=0;
  }
//}else{
 // $ss=0;
//}

$no26 = new TextRun();
$dd=number_format($ss,2);
$no26->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('suma_ase', $no26);

$no27 = new TextRun();
$dd=number_format($row[100],2);
$no27->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('costo_seguro', $no27);

$montoss=$row[82]+$row[100];
$no28 = new TextRun();
$dd=number_format($montoss,2);
$no28->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('sub_total', $no28);

$suma_seg=$row[42]+$montoss;



$n = $suma_seg;
$izquierda = intval(floor($n));
$derecha = intval(($n - floor($n)) * 100);

if($row[92]=='SI'){
$iva=$suma_seg*.16;
}else{
$iva=0.0;
}



 if($row[92]=='SI'){ 
      if($row[136]==2){ 
        $subt=$row[42] + $row[21]; 
      }else{ 
        $subt=$row[42] + $row[21] + ($row[100] - $row[82]); 
      }  
  $iva=$subt * .16; 
  $toti=$subt + $iva; 
}else{ 
    if($row[136]==2){ 
        $toti=$row[42] + $row[21]; 
     }else{ 
        $toti=$row[42] + $row[21] + ($row[100] - $row[82]); 
     } 
} 

$no31 = new TextRun();
$dd=number_format($iva,2);
$no31->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('iva', $no31);

$suma_tot=$suma_seg+$iva;

$no32 = new TextRun();
$dd=number_format($toti,2);
$no32->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('suma_seguro', $no32);

$n = $toti;
$izquierda = intval(floor($n));
$derecha = intval(($n - floor($n)) * 100);

$no33 = new TextRun();
$dd=strtoupper($formatterES->format($izquierda));
$no33->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('suma_seguro_l', $no33);

$no34 = new TextRun();
$dd=number_format($row[19],2);
$no34->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('suma_seguro2', $no34);


$no35 = new TextRun();
$dd=$row[109];
$no35->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('ine', $no35);
$no36 = new TextRun();
$dd=$row[110];
$no36->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('calle', $no36);
$no37 = new TextRun();
$dd=$row[111];
$no37->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('colonia', $no37);
$no38 = new TextRun();
$dd=$row[112];
$no38->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('ciudad', $no38);
$no39 = new TextRun();
$dd=$row[113];
$no39->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('estado', $no39);
$no40 = new TextRun();
$dd=$row[114];
$no40->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('cp', $no40);
$no41 = new TextRun();
$dd=$row[50];
$no41->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('cel', $no41);
$no42 = new TextRun();
$dd=$row[49];
$no42->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('email', $no42);

$no43 = new TextRun();
$dd=$row[117];
$no43->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('fuente_i', $no43);


$no44 = new TextRun();
$dd=str_replace('<br />','',$row[117]);
$no44->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('adicionales', $no44);

$no45 = new TextRun();
if($row[61]!=''){
  $dd='EMPLAYE A GRANEL: '.$row[61];
  $no45->addTextBreak();
    $no45->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
}
if($row[62]!=''){
  $dd='EMPAQUE PROFESIONA: '.$row[62];
  $no45->addTextBreak();
    $no45->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
}
if($row[63]!=''){
  $dd='EMPLAYE TOTAL: '.$row[63];
  $no45->addTextBreak();
    $no45->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
}
if($row[64]!=''){
  $dd='DESEMPAQUE: '.$row[64];
  $no45->addTextBreak();
    $no45->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
}
if($row[65]!=''){
  $dd='CAJA CLOSET: '.$row[65];
  $no45->addTextBreak();
    $no45->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
}
if($row[66]!=''){
  $dd='SUPERVISION SENCILLA: '.$row[66];
  $no45->addTextBreak();
    $no45->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
}
if($row[67]!=''){
  $dd='SUPERVISION DE SERVICIO: '.$row[67];
  $no45->addTextBreak();
    $no45->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
}
if($row[68]!=''){
  $dd='MANIOBRAS CARGA: '.$row[68];
  $no45->addTextBreak();
    $no45->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
}
if($row[69]!=''){
  $dd='MANIOBRAS DESCARGA: '.$row[69];
  $no45->addTextBreak();
    $no45->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
}
if($row[70]!=''){
  $dd='GRUAS: '.$row[70];
  $no45->addTextBreak();
    $no45->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
}

$templateProcessor->setComplexValue('s_adicionales', $no45);

$no46 = new TextRun();
$dd=date('d').' de '.mes(date('m')).' del '.date('Y');
$dd=strtoupper($dd);
$no46->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('fecha_contrato', $no46);


$csqlp = "SELECT * from proveedor where id=".$row[40];
$resultp = $link->query($csqlp);
$rowp=mysqli_fetch_row($resultp);
$no47 = new TextRun();
  $dd=$rowp[1].' '.$rowp[2];
    $no47->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
    $templateProcessor->setComplexValue('proveedor', $no47);

    $no48 = new TextRun();
    $dd=$row[119];
    $no48->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
    $templateProcessor->setComplexValue('poliza_s', $no48);

    $no49 = new TextRun();
    $dd=$row[120];
    $no49->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
    $templateProcessor->setComplexValue('categoria_s', $no49);
    
    $no50 = new TextRun();
    $dd=str_replace('<br />','',$row[39]);
    $no50->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
    $templateProcessor->setComplexValue('condiciones_p', $no50);

      $no51 = new TextRun();
      $dd=number_format($ss,2);
      $no51->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
      $templateProcessor->setComplexValue('suma_asegurada', $no51);

      $no52 = new TextRun();
$dd=($row[1]);
$no52->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('nombre_c2', $no52);




$csqlpa = "SELECT * from tabla_pagos where cve_servicio='".$_GET['c']."'";
$resultpa = $link->query($csqlpa);
$rowpa=mysqli_fetch_row($resultpa);

$no53 = new TextRun();
$dd=($rowpa[2]);
$no53->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('p_ant', $no53);

$no54 = new TextRun();
$dd=($rowpa[3]);
$no54->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('p_car', $no54);

$no55 = new TextRun();
$dd=($rowpa[4]);
$no55->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('p_des', $no55);

$no56 = new TextRun();
$dd=number_format($rowpa[5],2);
$no56->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('ant', $no56);

$no57 = new TextRun();
$dd=number_format($rowpa[6],2);
$no57->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('car', $no57);

$no58 = new TextRun();
$dd=number_format($rowpa[7],2);
$no58->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('des', $no58);


/*
$no53 = new TextRun();
$dd=($row[1]);
$no53->addText($dd, array( 'size' => 11, 'color' => '000000', 'name' => 'Arial'));
$templateProcessor->setComplexValue('idtip_servicio', $no53);
/*
$no54 = new TextRun();
$source = 'http://mudanzaslaunion.com/aplicacion/ine-ejemplo.jpg';
$no55->addImage($source);
$templateProcessor->setComplexValue('idtip_servicio', $no55);
*/
/*$no53 = new TextRun();
$dd=($row[0]);
$no53->addText($dd, array( 'size' => 16, 'color' => '000000', 'name' => 'Calabri'));
$templateProcessor->setComplexValue('id_servicio', $no53);*/
$templateProcessor->setValue('idtip_servicio', $row[4]);
$templateProcessor->setValue('id_servicio', $row[0]); // On header

/////////////////////////////////////////////////////////////////////////////////////
/*
$table = new Table(array('borderSize' => 12, 'borderColor' => 'green', 'width' => 6000, 'unit' => TblWidth::TWIP));
$table->addRow();
$table->addCell(150)->addText('Cell A1');
$table->addCell(150)->addText('Cell A2');
$table->addCell(150)->addText('Cell A3');
$table->addRow();
$table->addCell(150)->addText('Cell B1');
$table->addCell(150)->addText('Cell B2');
$table->addCell(150)->addText('Cell B3');
$templateProcessor->setComplexBlock('texto', $table);
*/
//$field = new Field('DATE', array('dateformat' => 'dddd d MMMM yyyy H:mm:ss'), array('PreserveFormat'));
/*$field->addText('by a red italic text', array('italic' => true, 'color' => 'red'));
$templateProcessor->setComplexValue('field', $field);
*/
// $link = new Link('https://github.com/PHPOffice/PHPWord');
// $templateProcessor->setComplexValue('link', $link);

echo date('H:i:s'), ' Guardando Documento...', EOL;
//$da=date('dmY');
$da='';
$templateProcessor->saveAs('results/Contrato_'.$row[0].'.docx');
echo "<a href='https://applaunionmudanzas.com/phpword/samples/results/Contrato_".$row[0].".docx' class='btn btn-primary' target='_blank'>Descargar Archivo</a>";
//echo getEndingNotes(array('Word2007' => 'docx'), 'results/Convocatoria_Sesion.docx');

}else{
  echo "<a href='Contrato.php?dos=1&c=".$_GET['c']."&emp=".$_GET['emp']."' class='btn btn-primary' target='_self'>Generar Contrato</a>";
}
if (!CLI) {
    include_once 'Sample_Footer.php';
}
