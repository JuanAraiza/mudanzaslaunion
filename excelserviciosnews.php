<?php session_start();
//Exportar datos de php a Excel
$da=date('YmdHis');


/**
 * PHPExcel
 *
 * Copyright (c) 2006 - 2015 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2015 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 * @version    ##VERSION##, ##DATE##
 */

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('America/Mexico_City');

if (PHP_SAPI == 'cli')
    die('This example should only be run from a Web Browser');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


// Create new PHPExcel object
$spreadsheet  = new Spreadsheet();
$objPHPExcel = $spreadsheet->getActiveSheet();
           

include('config.php');
//if(isset($_POST['imprimir'])){

$ar[0]='A'; $ar[1]='B'; $ar[2]='C'; $ar[3]='D';
$ar[4]='E'; $ar[5]='F'; $ar[6]='G'; $ar[7]='H';
$ar[8]='I'; $ar[9]='J'; $ar[10]='K'; $ar[11]='L';
$ar[12]='M'; $ar[13]='N'; $ar[14]='O'; $ar[15]='P';
$ar[16]='Q'; $ar[17]='R'; $ar[18]='S'; $ar[19]='T';
$ar[20]='U'; $ar[21]='V'; $ar[22]='W'; $ar[23]='X';
$ar[24]='Y'; $ar[25]='Z';

$ar[26]='AA'; $ar[27]='AB'; $ar[28]='AC'; $ar[29]='AD';
$ar[30]='AE'; $ar[31]='AF'; $ar[32]='AG'; $ar[33]='AH';
$ar[34]='AI'; $ar[35]='AJ'; $ar[36]='AK'; $ar[37]='AL';
$ar[38]='AM'; $ar[39]='AN'; $ar[40]='AO'; $ar[41]='AP';
$ar[42]='AQ'; $ar[43]='AR'; $ar[44]='AS'; $ar[45]='AT';
$ar[46]='AU'; $ar[47]='AV'; $ar[48]='AW'; $ar[49]='AX';
$ar[50]='AY'; $ar[51]='AZ';

$ar[52]='BA'; $ar[53]='BB'; $ar[54]='BC'; $ar[55]='BD';
$ar[56]='BE'; $ar[57]='BF'; $ar[58]='BG'; $ar[59]='BH';
$ar[60]='BI'; $ar[61]='BJ'; $ar[62]='BK'; $ar[63]='BL';
$ar[64]='BM'; $ar[65]='BN'; $ar[66]='BO'; $ar[67]='BP';
$ar[68]='BQ'; $ar[69]='BR'; $ar[70]='BS'; $ar[71]='BT';
$ar[72]='BU'; $ar[73]='BV'; $ar[74]='BW'; $ar[75]='BX';
$ar[76]='BY'; $ar[77]='BZ';

$ar[78]='CA'; $ar[79]='CB'; $ar[80]='CC'; $ar[81]='CD';
$ar[82]='CE'; $ar[83]='CF'; $ar[84]='CG'; $ar[85]='CH';
$ar[86]='CI'; $ar[87]='CJ'; $ar[88]='CK'; $ar[89]='CL';
$ar[90]='CM'; $ar[91]='CN'; $ar[92]='CO'; $ar[93]='CP';
$ar[94]='CQ'; $ar[95]='CR'; $ar[96]='CS'; $ar[97]='CT';
$ar[98]='CU'; $ar[99]='CV'; $ar[100]='CW'; $ar[101]='CX';
$ar[102]='CY'; $ar[103]='CZ';



$objPHPExcel->setCellValue('A1', 'ID')
            ->setCellValue('B1', 'CLIENTE')
            ->setCellValue('c1', 'ORIGEN')
            ->setCellValue('D1', 'DESTINO')
            ->setCellValue('E1', 'FECHA_SALIDA')
            ->setCellValue('F1', 'PROVEEDOR')
            ->setCellValue('G1', 'MONTO ASEGURADO')
            ->setCellValue('H1', 'COSTO SEGURO CLIENTE')
            ->setCellValue('I1', 'COSTO SEGURO PROVEEDOR')
            ->setCellValue('J1', 'UTILIDAD SEGURO')
            ->setCellValue('K1', 'SEGURO INLUIDO')
            ->setCellValue('L1', 'COSTO CLIENTE')
            ->setCellValue('M1', 'COSTO PROVEEDOR')
            ->setCellValue('N1', 'UTILIDAD')
            ->setCellValue('O1', 'QUIEN VENDIO')
            ->setCellValue('P1', 'EMPRESA');

            $objPHPExcel->getColumnDimension('A')->setWidth(10);
            $objPHPExcel->getColumnDimension('B')->setWidth(15);
            $objPHPExcel->getColumnDimension('C')->setWidth(15);
            $objPHPExcel->getColumnDimension('D')->setWidth(15);
            $objPHPExcel->getColumnDimension('E')->setWidth(15);
            $objPHPExcel->getColumnDimension('F')->setWidth(15);
            $objPHPExcel->getColumnDimension('G')->setWidth(15);
            $objPHPExcel->getColumnDimension('H')->setWidth(15);
            $objPHPExcel->getColumnDimension('I')->setWidth(15);
            $objPHPExcel->getColumnDimension('J')->setWidth(15);

            $objPHPExcel->getColumnDimension('K')->setWidth(15);
            $objPHPExcel->getColumnDimension('L')->setWidth(15);
            $objPHPExcel->getColumnDimension('M')->setWidth(15);
            $objPHPExcel->getColumnDimension('N')->setWidth(15);
            $objPHPExcel->getColumnDimension('O')->setWidth(15);
            $objPHPExcel->getColumnDimension('P')->setWidth(15);


	$query =$_SESSION['query'];
  
$result = $link->query($query);
$c=1;
$iprov=0;
$arrProv[$iprov]='';
$iprov++;
while($row=mysqli_fetch_row($result)){

set_time_limit(900);
    
//////////////////////////  Agregar proveedores al arreglo /////////////////////////////


//if($C==0){

    if($row[40]!=0){
            if(in_array($row[40], $arrProv)){
            }else{
                $arrProv[$iprov]=$row[40];
                $iprov++;
            }
    }
    if($row[87]!=0){
            if(in_array($row[87], $arrProv)){
            }else{
            $arrProv[$iprov]=$row[87];
            $iprov++;
            } 
    }
    if($row[88]!=0){
            if(in_array($row[88], $arrProv)){
            }else{
            $arrProv[$iprov]=$row[88];
            $iprov++;
            }
    }
    
//}


//////////////////////////  Fin  Agregar proveedores al arreglo /////////////////////////////

$resultp=$link->query("select * from proveedores where id=".$row[40]);
$rowp=mysqli_fetch_row($resultp);

$resultp2=$link->query("select * from proveedores where id=".$row[87]);
$rowp2=mysqli_fetch_row($resultp2);

$resultp3=$link->query("select * from proveedores where id=".$row[88]);
$rowp3=mysqli_fetch_row($resultp3);

$c++;
//echo $row[19].' -.- <br>';
if($row[19]!=''){
 if($row[19]>=1){
            if($row[19]>50000){
                $segclie=floatval($row[19]) * 0.025;
            }else{
                $segclie=1250;
            }
        }else{
            $segclie=0;
        }
}else{
     $segclie=0;
}
if($row[19]>=1){
            if($row[19]>50000){
                $segpro=floatval($row[19]) * 0.005;
            }else{
                $segpro=580;
            }
            }else{
            $segpro=0;
        }

        $ganacias=$segclie-$segpro;

        if($row[42]>=1){
            $cc=$row[42];
        }else{
            $cc=0;
        }

        if($row[43]>=1){
            $cp=$row[43];
        }else{
            $cp=0;
        }
$d1=floatval($row[42]);
$d2=floatval($row[21]);

if($row[92]=='SI'){
$sub=$d1+$d2;
$iva=$sub *.16;
$toti=$sub+$iva;
  $ganacias2=$sub-floatval($row[43]);
}else{
  $toti=$d1+$d2;
  
   $ganacias2=$toti-floatval($row[43]);
}

switch($row[150]){
    case 'launion':
    $empresa='La Union';
    break;
    case 'cruz':
        $empresa='Mudanzas Cruz';
    break;
    case 'compartido':
        $empresa='Compartido';
    break;
    case 'sedido':
        $empresa='Sedido a La Union';
    break;
    default:
    $empresa='La Union';
    
  }

    $objPHPExcel->setCellValue('A'.$c, ($row[0]))
                ->setCellValue('B'.$c, ($row[1]))
                ->setCellValue('C'.$c, ($row[2]))
                ->setCellValue('D'.$c, ($row[3]))
                ->setCellValue('E'.$c, ($row[22]))
                ->setCellValue('F'.$c, ($rowp[1]).' '.($rowp[2]))
                ->setCellValue('G'.$c, ($row[19]))
                ->setCellValue('H'.$c, $segclie)
                ->setCellValue('I'.$c, $segpro)


                ->setCellValue('J'.$c, '=H'.$c.'-I'.$c)
                ->setCellValue('K'.$c, ($row[43]))
                ->setCellValue('L'.$c, $toti)
                ->setCellValue('M'.$c, ($row[43]))
                ->setCellValue('N'.$c, $ganacias2)
                ->setCellValue('O'.$c, ($row[137]))
                ->setCellValue('P'.$c, $empresa);


                //$objPHPExcel->setCellValue('O'.$c, var_dump($arrProv));


$objPHPExcel->getStyle('H'.$c)->getNumberFormat()->setFormatCode('$ #,##0.00');
$objPHPExcel->getStyle('I'.$c)->getNumberFormat()->setFormatCode('$ #,##0.00');
$objPHPExcel->getStyle('J'.$c)->getNumberFormat()->setFormatCode('$ #,##0.00');
$objPHPExcel->getStyle('K'.$c)->getNumberFormat()->setFormatCode('$ #,##0.00');
$objPHPExcel->getStyle('L'.$c)->getNumberFormat()->setFormatCode('$ #,##0.00');

$objPHPExcel->getStyle('M'.$c)->getNumberFormat()->setFormatCode('$ #,##0.00');
$objPHPExcel->getStyle('N'.$c)->getNumberFormat()->setFormatCode('$ #,##0.00');



////////////////////////////////////////////////////////////


$queryie ="SELECT * from cargos_extra where cve_servicio='".$row[9]."'";
$resultie = $link->query($queryie);
$ren=13;
$ext=0;

while($rowie=mysqli_fetch_row($resultie)){
  $ext++;
            $ren++;
            $objPHPExcel->setCellValue($ar[$ren].'1', 'EXTRA '.$ext);
            $objPHPExcel->getColumnDimension($ar[$ren])->setWidth(20);
            $objPHPExcel->getStyle($ar[$ren].'1')->getAlignment()->setVertical(PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $objPHPExcel->getStyle($ar[$ren].'1')->getAlignment()->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getStyle($ar[$ren].'1')->getAlignment()->setWrapText(true);

            $objPHPExcel->setCellValue($ar[$ren].$c, $rowie[2]);

            $ren++;
            $objPHPExcel->setCellValue($ar[$ren].'1', 'MONTO '.$ext);
            $objPHPExcel->getColumnDimension($ar[$ren])->setWidth(20);
            $objPHPExcel->getStyle($ar[$ren].'1')->getAlignment()->setVertical(PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $objPHPExcel->getStyle($ar[$ren].'1')->getAlignment()->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getStyle($ar[$ren].'1')->getAlignment()->setWrapText(true);
            $objPHPExcel->setCellValue($ar[$ren].$c, $rowie[3]);
            $objPHPExcel->getStyle($ar[$ren].$c)->getNumberFormat()->setFormatCode('$ #,##0.00');



             /*$rest_prov=$rest_prov-floatval($rowie[6]);

           if($maxren2<$ren){
            $maxren2=$ren;
            }*/

}

/*
        $resren++;
        $arrrest2[$resren]=$rest_prov;
        $arrrest3[$resren]=$toti;
*/
///////////////////////////////////////////////////////////




}
  







//$objPHPExcel->setTitle("BUSQUEDA_".$_SESSION['servicios']);
$objPHPExcel->setTitle("BUSQUEDA_".$_SESSION['servicios']);

/////////////////////////////////////////////////////////

$myWorkSheet = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'SEGURO');
$spreadsheet->addSheet($myWorkSheet, 1);


$objPHPExcel = $spreadsheet->setActiveSheetIndex(1);
$objPHPExcel->setCellValue('A1', 'ID')
            ->setCellValue('B1', 'CLIENTE')
            ->setCellValue('c1', 'ORIGEN')
            ->setCellValue('D1', 'DESTINO')
            ->setCellValue('E1', 'FECHA_SALIDA')
            ->setCellValue('F1', 'PROVEEDOR')
            ->setCellValue('G1', 'PROVEEDOR 1')
            ->setCellValue('H1', 'MONTO ASEGURADO')
            ->setCellValue('I1', 'COSTO SEGURO CLIENTE')
            ->setCellValue('J1', 'COSTO SEGURO PROVEEDOR')
            ->setCellValue('K1', 'UTILIDAD SEGURO');


            $objPHPExcel->getStyle('A1:K1')->getAlignment()->setVertical(PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $objPHPExcel->getStyle('A1:K1')->getAlignment()->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            
            $objPHPExcel->getColumnDimension('A')->setWidth(6);
            $objPHPExcel->getColumnDimension('B')->setWidth(10);
            $objPHPExcel->getColumnDimension('C')->setWidth(10);
            $objPHPExcel->getColumnDimension('D')->setWidth(16);
            $objPHPExcel->getColumnDimension('E')->setWidth(16);
            $objPHPExcel->getColumnDimension('F')->setWidth(16);
            $objPHPExcel->getColumnDimension('G')->setWidth(16);
            $objPHPExcel->getColumnDimension('H')->setWidth(16);
            $objPHPExcel->getColumnDimension('I')->setWidth(16);
            $objPHPExcel->getColumnDimension('J')->setWidth(16);
            $objPHPExcel->getColumnDimension('K')->setWidth(16);

            $objPHPExcel->getStyle('A1')->getAlignment()->setWrapText(true);
            $objPHPExcel->getStyle('B1')->getAlignment()->setWrapText(true);
            $objPHPExcel->getStyle('C1')->getAlignment()->setWrapText(true);
            $objPHPExcel->getStyle('D1')->getAlignment()->setWrapText(true);
            $objPHPExcel->getStyle('E1')->getAlignment()->setWrapText(true);
            $objPHPExcel->getStyle('F1')->getAlignment()->setWrapText(true);
            $objPHPExcel->getStyle('G1')->getAlignment()->setWrapText(true);
            $objPHPExcel->getStyle('H1')->getAlignment()->setWrapText(true);
            $objPHPExcel->getStyle('I1')->getAlignment()->setWrapText(true);
            $objPHPExcel->getStyle('J1')->getAlignment()->setWrapText(true);
            $objPHPExcel->getStyle('K1')->getAlignment()->setWrapText(true);


$query ="SELECT * from servicio ".$_SESSION['cades']." and seguro not in('','0')";
// echo $query;
$result = $link->query($query);
$c=1;

while($row=mysqli_fetch_row($result)){


set_time_limit(900);
   
$resultp1=$link->query("select * from proveedores where id=".$row[40]);
$rowp1=mysqli_fetch_row($resultp1); 

$prov2='';

$c++;

 if($row[19]>=1){
            if($row[19]>50000){
                $segclie=floatval($row[19]) * 0.025;
            }else{
                $segclie=1250;
            }
        }else{
            $segclie=0;
        }
if($row[19]>=1){
            if($row[19]>50000){
                $segpro=floatval($row[19]) * 0.005;
            }else{
                $segpro=580;
            }
            }else{
            $segpro=0;
        }

        $ganacias=$segclie-$segpro;

        if($row[42]>=1){
            $cc=$row[42];
        }else{
            $cc=0;
        }

        if($row[43]>=1){
            $cp=$row[43];
        }else{
            $cp=0;
        }
$d1=floatval($row[42]);
$d2=floatval($row[21]);


if($row[92]=='SI'){
$sub=$d1+$d2;
$iva=$sub *.16;
$toti=$sub+$iva;
  $ganacias2=$sub-floatval($row[43]);
}else{
  $toti=$d1+$d2;
  
   $ganacias2=$toti-floatval($row[43]);
}


        


 $objPHPExcel->setCellValue('A'.$c, ($row[0]))
                ->setCellValue('B'.$c, ($row[1]))
                ->setCellValue('C'.$c, ($row[2]))
                ->setCellValue('D'.$c, ($row[3]))
                ->setCellValue('E'.$c, ($row[22]))
                ->setCellValue('F'.$c, ($rowp1[1]).' '.($rowp1[2]))
                ->setCellValue('G'.$c, $prov2)
                ->setCellValue('H'.$c, $row[19])
                ->setCellValue('I'.$c, $segclie)
                ->setCellValue('J'.$c, $segpro)
                ->setCellValue('K'.$c, $ganacias);

$objPHPExcel->getStyle('H'.$c)->getNumberFormat()->setFormatCode('$ #,##0.00');
$objPHPExcel->getStyle('I'.$c)->getNumberFormat()->setFormatCode('$ #,##0.00');
$objPHPExcel->getStyle('J'.$c)->getNumberFormat()->setFormatCode('$ #,##0.00');
$objPHPExcel->getStyle('K'.$c)->getNumberFormat()->setFormatCode('$ #,##0.00');


}



//////////////////////////////////////////////////////////////////

$myWorkSheet = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'SIN PROVEEDOR');
$spreadsheet->addSheet($myWorkSheet, 2);



$objPHPExcel = $spreadsheet->setActiveSheetIndex(2);
$objPHPExcel->setCellValue('A1', 'ID')
            ->setCellValue('B1', 'CLIENTE')
            ->setCellValue('c1', 'ORIGEN')
            ->setCellValue('D1', 'DESTINO')
            ->setCellValue('E1', 'FECHA_SALIDA')
            ->setCellValue('F1', 'PROVEEDOR')
            ->setCellValue('G1', 'MONTO ASEGURADO')
            ->setCellValue('H1', 'COSTO SEGURO CLIENTE')
            ->setCellValue('I1', 'COSTO SEGURO PROVEEDOR')
            ->setCellValue('J1', 'UTILIDAD SEGURO')
            ->setCellValue('K1', 'COSTO CLIENTE')
            ->setCellValue('L1', 'COSTO PROVEEDOR')
            ->setCellValue('M1', 'UTILIDAD');

            $objPHPExcel->getStyle('A1:M1')->getAlignment()->setVertical(PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $objPHPExcel->getStyle('A1:M1')->getAlignment()->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            
            $objPHPExcel->getColumnDimension('A')->setWidth(6);
            $objPHPExcel->getColumnDimension('B')->setWidth(10);
            $objPHPExcel->getColumnDimension('C')->setWidth(10);
            $objPHPExcel->getColumnDimension('D')->setWidth(16);
            $objPHPExcel->getColumnDimension('E')->setWidth(16);
            $objPHPExcel->getColumnDimension('F')->setWidth(16);
            $objPHPExcel->getColumnDimension('G')->setWidth(16);
            $objPHPExcel->getColumnDimension('H')->setWidth(16);
            $objPHPExcel->getColumnDimension('I')->setWidth(16);
            $objPHPExcel->getColumnDimension('J')->setWidth(16);
            $objPHPExcel->getColumnDimension('K')->setWidth(16);
            $objPHPExcel->getColumnDimension('L')->setWidth(16);
            $objPHPExcel->getColumnDimension('M')->setWidth(16);

            $objPHPExcel->getStyle('A1')->getAlignment()->setWrapText(true);
            $objPHPExcel->getStyle('B1')->getAlignment()->setWrapText(true);
            $objPHPExcel->getStyle('C1')->getAlignment()->setWrapText(true);
            $objPHPExcel->getStyle('D1')->getAlignment()->setWrapText(true);
            $objPHPExcel->getStyle('E1')->getAlignment()->setWrapText(true);
            $objPHPExcel->getStyle('F1')->getAlignment()->setWrapText(true);
            $objPHPExcel->getStyle('G1')->getAlignment()->setWrapText(true);
            $objPHPExcel->getStyle('H1')->getAlignment()->setWrapText(true);
            $objPHPExcel->getStyle('I1')->getAlignment()->setWrapText(true);
            $objPHPExcel->getStyle('J1')->getAlignment()->setWrapText(true);
            $objPHPExcel->getStyle('K1')->getAlignment()->setWrapText(true);
            $objPHPExcel->getStyle('L1')->getAlignment()->setWrapText(true);
            $objPHPExcel->getStyle('M1')->getAlignment()->setWrapText(true);


$query ="SELECT * from servicio ".$_SESSION['cades']." and proveedor in('','0')";
$result = $link->query($query);
$c=1;
while($row=mysqli_fetch_row($result)){
set_time_limit(900);
   
$resultp1=$link->query("select * from proveedores where id=".$row[40]);
$rowp1=mysqli_fetch_row($resultp1); 
$prov2='';
$c++;

 if($row[19]>=1){
            if($row[19]>50000){
                $segclie=floatval($row[19]) * 0.025;
            }else{
                $segclie=1250;
            }
        }else{
            $segclie=0;
        }
if($row[19]>=1){
            if($row[19]>50000){
                $segpro=floatval($row[19]) * 0.005;
            }else{
                $segpro=580;
            }
            }else{
            $segpro=0;
        }

        $ganacias=$segclie-$segpro;

        if($row[42]>=1){
            $cc=$row[42];
        }else{
            $cc=0;
        }

        if($row[43]>=1){
            $cp=$row[43];
        }else{
            $cp=0;
        }
$d1=floatval($row[42]);
$d2=floatval($row[21]);

if($row[92]=='SI'){
$sub=$d1+$d2;
$iva=$sub *.16;
$toti=$sub+$iva;
  $ganacias2=$sub-floatval($row[43]);
}else{
  $toti=$d1+$d2;
  
   $ganacias2=$toti-floatval($row[43]);
}

    $objPHPExcel->setCellValue('A'.$c, ($row[0]))
                ->setCellValue('B'.$c, ($row[1]))
                ->setCellValue('C'.$c, ($row[2]))
                ->setCellValue('D'.$c, ($row[3]))
                ->setCellValue('E'.$c, ($row[22]))
                ->setCellValue('F'.$c, ($rowp1[1]).' '.($rowp1[2]))
                ->setCellValue('G'.$c, $row[19])
                ->setCellValue('H'.$c, $segclie)
                ->setCellValue('I'.$c, $segpro)
                ->setCellValue('J'.$c, '=H'.$c.'-I'.$c)
                ->setCellValue('K'.$c, $toti)
                ->setCellValue('L'.$c, ($row[43]))
                ->setCellValue('M'.$c, $ganacias2);


$objPHPExcel->getStyle('G'.$c)->getNumberFormat()->setFormatCode('$ #,##0.00');
$objPHPExcel->getStyle('H'.$c)->getNumberFormat()->setFormatCode('$ #,##0.00');
$objPHPExcel->getStyle('I'.$c)->getNumberFormat()->setFormatCode('$ #,##0.00');
$objPHPExcel->getStyle('J'.$c)->getNumberFormat()->setFormatCode('$ #,##0.00');
$objPHPExcel->getStyle('K'.$c)->getNumberFormat()->setFormatCode('$ #,##0.00');
$objPHPExcel->getStyle('L'.$c)->getNumberFormat()->setFormatCode('$ #,##0.00');
$objPHPExcel->getStyle('M'.$c)->getNumberFormat()->setFormatCode('$ #,##0.00');

}


////////////////////////////////////////////////////////////////////

for($rr=1; $rr<$iprov; $rr++){

$prov=$arrProv[$rr];


$resultpro=$link->query("select * from proveedores where id=".$prov);
$rowpro=mysqli_fetch_row($resultpro);

$ho=$rr+2;

$myWorkSheet = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, $rowpro[1].' '.$rowpro[2]);
$spreadsheet->addSheet($myWorkSheet, $ho);


$objPHPExcel = $spreadsheet->setActiveSheetIndex($ho);


$objPHPExcel->setCellValue('A1', 'ID')
            ->setCellValue('B1', 'CLIENTE')
            ->setCellValue('c1', 'ORIGEN')
            ->setCellValue('D1', 'DESTINO')
            ->setCellValue('E1', 'FECHA SALIDA')
            ->setCellValue('F1', 'PROVEEDOR')
            ->setCellValue('G1', 'PROVEEDOR 1')
            ->setCellValue('H1', 'OBSERVACIONES')
            ->setCellValue('I1', 'STATUS')
            ->setCellValue('J1', 'MONTO ASEGURADO')
            ->setCellValue('K1', 'COSTO SEGURO CLIENTE')
            ->setCellValue('L1', 'COSTO SEGURO PROVEEDOR')
            ->setCellValue('M1', 'UTILIDAD SEGURO')
            ->setCellValue('N1', 'COSTO PROVEEDOR')
            ->setCellValue('O1', 'IMPORTE DE EXTRAS PARA PROVEEDOR')
            ->setCellValue('P1', 'COSTO TOTAL PROVEEDOR');



            $objPHPExcel->getStyle('A1:S1')->getAlignment()->setVertical(PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $objPHPExcel->getStyle('A1:S1')->getAlignment()->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            //$objPHPExcel->setCellValue('A2', $prov);

//$objPHPExcel->getRowDimension('1')->setRowHeight(20);

            
$objPHPExcel->getColumnDimension('A')->setWidth(6);
$objPHPExcel->getColumnDimension('B')->setWidth(10);
$objPHPExcel->getColumnDimension('C')->setWidth(10);
$objPHPExcel->getColumnDimension('D')->setWidth(16);
$objPHPExcel->getColumnDimension('E')->setWidth(16);
$objPHPExcel->getColumnDimension('F')->setWidth(16);
$objPHPExcel->getColumnDimension('G')->setWidth(16);
$objPHPExcel->getColumnDimension('H')->setWidth(16);
$objPHPExcel->getColumnDimension('I')->setWidth(16);
$objPHPExcel->getColumnDimension('J')->setWidth(16);
$objPHPExcel->getColumnDimension('K')->setWidth(16);
$objPHPExcel->getColumnDimension('L')->setWidth(16);
$objPHPExcel->getColumnDimension('M')->setWidth(16);
$objPHPExcel->getColumnDimension('N')->setWidth(16);
$objPHPExcel->getColumnDimension('O')->setWidth(16);
$objPHPExcel->getColumnDimension('P')->setWidth(16);
$objPHPExcel->getColumnDimension('Q')->setWidth(16);
$objPHPExcel->getColumnDimension('R')->setWidth(16);
$objPHPExcel->getColumnDimension('S')->setWidth(16);

$objPHPExcel->getStyle('A1')->getAlignment()->setWrapText(true);
$objPHPExcel->getStyle('B1')->getAlignment()->setWrapText(true);
$objPHPExcel->getStyle('C1')->getAlignment()->setWrapText(true);
$objPHPExcel->getStyle('D1')->getAlignment()->setWrapText(true);
$objPHPExcel->getStyle('E1')->getAlignment()->setWrapText(true);
$objPHPExcel->getStyle('F1')->getAlignment()->setWrapText(true);
$objPHPExcel->getStyle('G1')->getAlignment()->setWrapText(true);
$objPHPExcel->getStyle('H1')->getAlignment()->setWrapText(true);
$objPHPExcel->getStyle('I1')->getAlignment()->setWrapText(true);
$objPHPExcel->getStyle('J1')->getAlignment()->setWrapText(true);
$objPHPExcel->getStyle('K1')->getAlignment()->setWrapText(true);
$objPHPExcel->getStyle('L1')->getAlignment()->setWrapText(true);
$objPHPExcel->getStyle('M1')->getAlignment()->setWrapText(true);
$objPHPExcel->getStyle('N1')->getAlignment()->setWrapText(true);
$objPHPExcel->getStyle('O1')->getAlignment()->setWrapText(true);
$objPHPExcel->getStyle('P1')->getAlignment()->setWrapText(true);
$objPHPExcel->getStyle('Q1')->getAlignment()->setWrapText(true);
$objPHPExcel->getStyle('R1')->getAlignment()->setWrapText(true);
$objPHPExcel->getStyle('S1')->getAlignment()->setWrapText(true);


//////////////////////////////////

$resren=1;
$resren2=1;
$maxren2=15;
$maxren=15;
if($rowpro[0]!=''){

 $prov=$rowpro[0];
}else{
$prov=0;   
}
$query ='SELECT * from servicio '.$_SESSION['cades'].' and (proveedor='.$prov.' or proveedor2='.$prov.' or proveedor3='.$prov.')';
 // echo $query;
$result = $link->query($query);
$c=1;

while($row=mysqli_fetch_row($result)){

set_time_limit(900);
   
   $resultp1=$link->query("select * from proveedores where id=".$prov);
$rowp1=mysqli_fetch_row($resultp1); 

if($row[40]==$prov){
    $costprov=floatval($row[129]);
$prov2='';
}

if($row[87]==$prov){
    $costprov=floatval($row[130]);
    $resultp2=$link->query("select * from proveedores where id=".$row[40]);
$rowp2=mysqli_fetch_row($resultp2);
$prov2=($rowp2[1]).' '.($rowp2[2]);
}

if($row[88]==$prov){
    $costprov=floatval($row[131]);
  $resultp2=$link->query("select * from proveedores where id=".$row[40]);
$rowp2=mysqli_fetch_row($resultp2);  
$prov2=($rowp2[1]).' '.($rowp2[2]);
}
 //$costprov=floatval($row[43]);

$c++;

 if($row[19]>=1){
            if($row[19]>50000){
                $segclie=floatval($row[19]) * 0.025;
            }else{
                $segclie=1250;
            }
        }else{
            $segclie=0;
        }
if($row[19]>=1){
            if($row[19]>50000){
                $segpro=floatval($row[19]) * 0.005;
            }else{
                $segpro=580;
            }
            }else{
            $segpro=0;
        }

        $ganacias=$segclie-$segpro;


      
$d1=floatval($row[42]);
$d2=floatval($row[21]);

if($row[92]=='SI'){
$sub=$d1+$d2;
$iva=$sub *.16;
$toti=$sub+$iva;
  $ganacias2=$sub-floatval($row[43]);
}else{
  $toti=$d1+$d2;
  
   $ganacias2=$toti-floatval($row[43]);
}

    $objPHPExcel->setCellValue('A'.$c, ($row[0]))
                ->setCellValue('B'.$c, ($row[1]))
                ->setCellValue('C'.$c, ($row[2]))
                ->setCellValue('D'.$c, ($row[3]))
                ->setCellValue('E'.$c, ($row[22]))
                ->setCellValue('F'.$c, ($rowp1[1]).' '.($rowp1[2]))
                ->setCellValue('G'.$c, $prov2)
                ->setCellValue('H'.$c, ($row[98]));

                switch($row[99]){
                    case 1:
                    $est='Activo';
                    break;
                    case 2:
                    $est='Por Recolectar';
                    break;
                    case 3:
                    $est='Embodegamiento';
                    break;
                    case 4:
                    $est='En Acalaracion';
                    break;
                    default:
                    $est='';
                    break;
                }
                
        $objPHPExcel->setCellValue('I'.$c, $est)
                    ->setCellValue('J'.$c, $row[19])
                    ->setCellValue('K'.$c, $segclie)
                    ->setCellValue('L'.$c, $segpro)
                    ->setCellValue('M'.$c, '=K'.$c.'-L'.$c)
                    ->setCellValue('N'.$c, $costprov)
                    ->setCellValue('O'.$c, $d2)
                    ->setCellValue('P'.$c, '=N'.$c.'+O'.$c);

       

        $rest_prov=floatval($costprov + $d2);
        $rest_cliente=floatval($toti);

$objPHPExcel->getStyle('J'.$c)->getNumberFormat()->setFormatCode('$ #,##0.00');
$objPHPExcel->getStyle('K'.$c)->getNumberFormat()->setFormatCode('$ #,##0.00');
$objPHPExcel->getStyle('L'.$c)->getNumberFormat()->setFormatCode('$ #,##0.00');
$objPHPExcel->getStyle('M'.$c)->getNumberFormat()->setFormatCode('$ #,##0.00');
$objPHPExcel->getStyle('N'.$c)->getNumberFormat()->setFormatCode('$ #,##0.00');
$objPHPExcel->getStyle('O'.$c)->getNumberFormat()->setFormatCode('$ #,##0.00');
$objPHPExcel->getStyle('P'.$c)->getNumberFormat()->setFormatCode('$ #,##0.00');
$objPHPExcel->getStyle('S'.$c)->getNumberFormat()->setFormatCode('$ #,##0.00');




////////////////////////////////////////////////////////////


$queryie ="SELECT * from ingresosyegresos where id_mudanza=".$row[0]." and referencia=2";
$resultie = $link->query($queryie);
$ren=15;


while($rowie=mysqli_fetch_row($resultie)){
  
            $ren++;
            $objPHPExcel->setCellValue($ar[$ren].'1', 'FECHA PAGO A PROVEEDOR');
            $objPHPExcel->getColumnDimension($ar[$ren])->setWidth(16);
            $objPHPExcel->getStyle($ar[$ren].'1')->getAlignment()->setVertical(PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $objPHPExcel->getStyle($ar[$ren].'1')->getAlignment()->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getStyle($ar[$ren].'1')->getAlignment()->setWrapText(true);

            $objPHPExcel->setCellValue($ar[$ren].$c, substr($rowie[3],8,2).'/'.substr($rowie[3],5,2).'/'.substr($rowie[3],0,4));

            $ren++;
            $objPHPExcel->setCellValue($ar[$ren].'1', 'IMPORTE PAGO PROVEEDOR');
            $objPHPExcel->getColumnDimension($ar[$ren])->setWidth(16);
            $objPHPExcel->getStyle($ar[$ren].'1')->getAlignment()->setVertical(PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $objPHPExcel->getStyle($ar[$ren].'1')->getAlignment()->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getStyle($ar[$ren].'1')->getAlignment()->setWrapText(true);
            $objPHPExcel->setCellValue($ar[$ren].$c, $rowie[6]);
            $objPHPExcel->getStyle($ar[$ren].$c)->getNumberFormat()->setFormatCode('$ #,##0.00');

            $ren++;
            $objPHPExcel->setCellValue($ar[$ren].'1', 'BANCO DESTINO');
            $objPHPExcel->getColumnDimension($ar[$ren])->setWidth(16);
            $objPHPExcel->getStyle($ar[$ren].'1')->getAlignment()->setVertical(PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $objPHPExcel->getStyle($ar[$ren].'1')->getAlignment()->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getStyle($ar[$ren].'1')->getAlignment()->setWrapText(true);
            $objPHPExcel->setCellValue($ar[$ren].$c, $rowie[5]);


            $rest_prov=$rest_prov-floatval($rowie[6]);

            if($maxren2<$ren){
            $maxren2=$ren;
            }

}

$resren++;
$arrrest2[$resren]=$rest_prov;

    $arrrest3[$resren]=$toti;   
///////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////


$queryie ="SELECT * from ingresosyegresos where id_mudanza=".$row[0]." and referencia=1";
$resultie = $link->query($queryie);

while($rowie=mysqli_fetch_row($resultie)){
  
            $ren++;
            $objPHPExcel->setCellValue($ar[$ren].'1', 'FECHA PAGO CLIENTE');
            $objPHPExcel->getColumnDimension($ar[$ren])->setWidth(16);
            $objPHPExcel->getStyle($ar[$ren].'1')->getAlignment()->setVertical(PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $objPHPExcel->getStyle($ar[$ren].'1')->getAlignment()->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getStyle($ar[$ren].'1')->getAlignment()->setWrapText(true);

            $objPHPExcel->setCellValue($ar[$ren].$c, substr($rowie[3],8,2).'/'.substr($rowie[3],5,2).'/'.substr($rowie[3],0,4));

            $ren++;
            $objPHPExcel->setCellValue($ar[$ren].'1', 'IMPORTE PAGO CLIENTE');
            $objPHPExcel->getColumnDimension($ar[$ren])->setWidth(16);
            $objPHPExcel->getStyle($ar[$ren].'1')->getAlignment()->setVertical(PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $objPHPExcel->getStyle($ar[$ren].'1')->getAlignment()->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getStyle($ar[$ren].'1')->getAlignment()->setWrapText(true);
            $objPHPExcel->setCellValue($ar[$ren].$c, $rowie[6]);
            $objPHPExcel->getStyle($ar[$ren].$c)->getNumberFormat()->setFormatCode('$ #,##0.00');

            $ren++;
            $objPHPExcel->setCellValue($ar[$ren].'1', 'METODO DE PAGO');
            $objPHPExcel->getColumnDimension($ar[$ren])->setWidth(16);
            $objPHPExcel->getStyle($ar[$ren].'1')->getAlignment()->setVertical(PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $objPHPExcel->getStyle($ar[$ren].'1')->getAlignment()->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getStyle($ar[$ren].'1')->getAlignment()->setWrapText(true);
            $objPHPExcel->setCellValue($ar[$ren].$c, $rowie[4]);

            $ren++;
            $objPHPExcel->setCellValue($ar[$ren].'1', 'BANCO');
            $objPHPExcel->getColumnDimension($ar[$ren])->setWidth(16);
            $objPHPExcel->getStyle($ar[$ren].'1')->getAlignment()->setVertical(PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $objPHPExcel->getStyle($ar[$ren].'1')->getAlignment()->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getStyle($ar[$ren].'1')->getAlignment()->setWrapText(true);
            $objPHPExcel->setCellValue($ar[$ren].$c, $rowie[5]);


            $rest_cliente=$rest_cliente-floatval($rowie[6]);

            if($maxren<$ren){
            $maxren=$ren;
            }

}

$resren2++;
$arrrest[$resren2]=$rest_cliente;

            
///////////////////////////////////////////////////////////

}

//echo $resren.'<br>';
 
//echo $maxren.'<br>';

for($rejen=2; $rejen<=$resren; $rejen++){


$objPHPExcel->setCellValue($ar[$maxren2].'1', 'PENDIENTE PAGO A PROVEEDOR');
$objPHPExcel->getColumnDimension($ar[$maxren2])->setWidth(16);
$objPHPExcel->getStyle($ar[$maxren2].'1')->getAlignment()->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getStyle($ar[$maxren2])->getAlignment()->setWrapText(true);
$objPHPExcel->setCellValue($ar[$maxren2].$rejen,  $arrrest2[$rejen]);
$objPHPExcel->getStyle($ar[$maxren2].$rejen)->getNumberFormat()->setFormatCode('$ #,##0.00');




$objPHPExcel->setCellValue($ar[$maxren].'1', 'PENDIENTE PAGO CLIENTE');
$objPHPExcel->getColumnDimension($ar[$maxren])->setWidth(16);
$objPHPExcel->getStyle($ar[$maxren].'1')->getAlignment()->setVertical(PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$objPHPExcel->getStyle($ar[$maxren].'1')->getAlignment()->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getStyle($ar[$maxren].'1')->getAlignment()->setWrapText(true);
$objPHPExcel->setCellValue($ar[$maxren].$rejen, $arrrest[$rejen]);
$objPHPExcel->getStyle($ar[$maxren].$rejen)->getNumberFormat()->setFormatCode('$ #,##0.00');


}


$maxren2++;
for($rejen=2; $rejen<=$resren; $rejen++){

$objPHPExcel->setCellValue($ar[$maxren2].'1', 'COSTO CLIENTE');
$objPHPExcel->getColumnDimension($ar[$maxren2])->setWidth(16);
$objPHPExcel->getStyle($ar[$maxren2].'1')->getAlignment()->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getStyle($ar[$maxren2])->getAlignment()->setWrapText(true);
$objPHPExcel->setCellValue($ar[$maxren2].$rejen,  $arrrest3[$rejen]);
$objPHPExcel->getStyle($ar[$maxren2].$rejen)->getNumberFormat()->setFormatCode('$ #,##0.00');

}

///////////////////////////////////////

$ColumnCount=10;
$RowIndex=2;
$objPHPExcel->freezePaneByColumnAndRow($ColumnCount, $RowIndex);


}



//$objPHPExcel->setTitle('ACTIVOS');

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="SERVICIOS-'.$_SESSION['servicios'].'-'.$da.'.xlsx"');
        $writer->save('php://output');

    ?>
