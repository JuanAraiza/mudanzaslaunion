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

$objPHPExcel->setCellValue('A1', 'ID')
            ->setCellValue('B1', 'CLIENTE')
            ->setCellValue('c1', 'ORIGEN')
            ->setCellValue('D1', 'DESTINO')
            ->setCellValue('E1', 'TIPO MUDANZA')
            ->setCellValue('F1', 'FECHA SALIDA')
            ->setCellValue('G1', 'PROVEEDOR')
            ->setCellValue('H1', 'PROVEEDOR 1')
            ->setCellValue('I1', 'PROVEEDOR 2')
            ->setCellValue('J1', 'MONTO ASEGURADO')
            ->setCellValue('K1', 'COSTO SEGURO CLIENTE')
            ->setCellValue('L1', 'COSTO SEGURO PROVEEDOR')
            ->setCellValue('M1', 'UTILIDAD SEGURO')
            ->setCellValue('N1', 'COSTO CLIENTE')
            ->setCellValue('O1', 'COSTO PROVEEDOR')
            ->setCellValue('P1', 'UTILIDAD')
            ->setCellValue('Q1', 'QUIEN VENDIO')
            ->setCellValue('R1', 'AHORRO')
            ->setCellValue('S1', 'FONDO')

            ;

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
            $objPHPExcel->getColumnDimension('Q')->setWidth(15);
            $objPHPExcel->getColumnDimension('R')->setWidth(15);
            $objPHPExcel->getColumnDimension('S')->setWidth(15);
            $objPHPExcel->getColumnDimension('T')->setWidth(15);

            $objPHPExcel->getColumnDimension('U')->setWidth(15);
            $objPHPExcel->getColumnDimension('V')->setWidth(15);
            $objPHPExcel->getColumnDimension('W')->setWidth(15);
            $objPHPExcel->getColumnDimension('X')->setWidth(15);
            $objPHPExcel->getColumnDimension('Y')->setWidth(15);
            $objPHPExcel->getColumnDimension('Z')->setWidth(15);
            $objPHPExcel->getColumnDimension('AA')->setWidth(15);
            $objPHPExcel->getColumnDimension('AB')->setWidth(15);
            $objPHPExcel->getColumnDimension('AC')->setWidth(15);
            $objPHPExcel->getColumnDimension('AD')->setWidth(15);

            $objPHPExcel->getColumnDimension('AE')->setWidth(15);
            $objPHPExcel->getColumnDimension('AF')->setWidth(15);
            $objPHPExcel->getColumnDimension('AG')->setWidth(15);
            $objPHPExcel->getColumnDimension('AH')->setWidth(15);
            $objPHPExcel->getColumnDimension('AI')->setWidth(15);
            $objPHPExcel->getColumnDimension('AJ')->setWidth(15);
            $objPHPExcel->getColumnDimension('AK')->setWidth(15);
            $objPHPExcel->getColumnDimension('AL')->setWidth(15);

$resren=1;
$resren2=1;
$maxren2=13;
$maxren=13;
$maxren3=0;
	$query =$_SESSION['query'];
  
$result = $link->query($query);
$c=1;
    while($row=mysqli_fetch_row($result)){
    set_time_limit(900);
    
$resultp=$link->query("select * from proveedores where id=".$row[40]);
$rowp=mysqli_fetch_row($resultp);

$resultp2=$link->query("select * from proveedores where id=".$row[87]);
$rowp2=mysqli_fetch_row($resultp2);

$resultp3=$link->query("select * from proveedores where id=".$row[88]);
$rowp3=mysqli_fetch_row($resultp3);

$c++;

 if($row[19]>=1){
            if($row[19]>50000){
                $segclie=$row[19] * 0.025;
            }else{
                $segclie=1250;
            }
        }else{
            $segclie=0;
        }
if($row[19]>=1){
            if($row[19]>50000){
                $segpro=$row[19] * 0.005;
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

   // $ganacias2=$cc-$cp;
         $ganacias2='';

    $objPHPExcel->setCellValue('A'.$c, ($row[0]))
                ->setCellValue('B'.$c, ($row[1]))
                ->setCellValue('C'.$c, ($row[2]))
                ->setCellValue('D'.$c, ($row[3]))
                ->setCellValue('E'.$c, ($row[4]))
                ->setCellValue('F'.$c, ($row[22]))
                ->setCellValue('G'.$c, ($rowp[1]).' '.($rowp[2]))
                ->setCellValue('H'.$c, ($rowp2[1]).' '.($rowp2[2]))
                ->setCellValue('I'.$c, ($rowp3[1]).' '.($rowp3[2]))
                ->setCellValue('J'.$c, ($row[19]))
                ->setCellValue('K'.$c, $segclie)
                ->setCellValue('L'.$c, $segpro)
                ->setCellValue('M'.$c, $ganacias)
                ->setCellValue('N'.$c, ($row[42]));
                /*->setCellValue('O'.$c, ($row[43]))
                ->setCellValue('P'.$c, $ganacias2)
                ->setCellValue('Q'.$c, ($row[137]))*/;



$objPHPExcel->getStyle('J'.$c)->getNumberFormat()->setFormatCode('$ #,##0.00');
$objPHPExcel->getStyle('K'.$c)->getNumberFormat()->setFormatCode('$ #,##0.00');
$objPHPExcel->getStyle('L'.$c)->getNumberFormat()->setFormatCode('$ #,##0.00');
$objPHPExcel->getStyle('M'.$c)->getNumberFormat()->setFormatCode('$ #,##0.00');
$objPHPExcel->getStyle('N'.$c)->getNumberFormat()->setFormatCode('$ #,##0.00');
/*
$objPHPExcel->getStyle('AE'.$c)->getNumberFormat()->setFormatCode('$ #,##0.00');
$objPHPExcel->getStyle('AF'.$c)->getNumberFormat()->setFormatCode('$ #,##0.00');
$objPHPExcel->getStyle('AG'.$c)->getNumberFormat()->setFormatCode('$ #,##0.00');
$objPHPExcel->getStyle('AH'.$c)->getNumberFormat()->setFormatCode('$ #,##0.00');
$objPHPExcel->getStyle('AI'.$c)->getNumberFormat()->setFormatCode('$ #,##0.00');
$objPHPExcel->getStyle('AJ'.$c)->getNumberFormat()->setFormatCode('$ #,##0.00');
$objPHPExcel->getStyle('AK'.$c)->getNumberFormat()->setFormatCode('$ #,##0.00');
*/
$costo_cliente=floatval($row[42]);

////////////////////////////////////////////////////////////
////////////////////// Cargos Extra Cliente //////////////////

$queryie ="SELECT * from cargos_extra where  para='Cliente' and cve_servicio='".$row[9]."'";
$resultie = $link->query($queryie);
$ren=13;
$ext=0;

while($rowie=mysqli_fetch_row($resultie)){
            $ext++;
            $ren++;
            $objPHPExcel->setCellValue($ar[$ren].'1', 'EXTRA '.$ext.' CLIE');
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

            $costo_cliente=$costo_cliente+floatval($rowie[3]);
             /*$rest_prov=$rest_prov-floatval($rowie[6]); */

               if($maxren<$ren){
                $maxren=$ren;
                $maxren2=$ren;
                }

}



$queryie ="SELECT * from descuentos where  para='Cliente' and cve_servicio='".$row[9]."'";
$resultie = $link->query($queryie);
$ren=$maxren;
$ext=0;

while($rowie=mysqli_fetch_row($resultie)){
            $ext++;
            $ren++;
            $objPHPExcel->setCellValue($ar[$ren].'1', 'DESCUENTO '.$ext.' CLIE');
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

            $costo_cliente=$costo_cliente-floatval($rowie[3]);
             /*$rest_prov=$rest_prov-floatval($rowie[6]); */

               if($maxren<$ren){
                $maxren=$ren;
                $maxren2=$ren;
                }

}

/*
        $resren++;
        $arrrest2[$resren]=$rest_prov;
        $arrrest3[$resren]=$toti;
*/

////////////////////// Fin Extra Cliente //////////////////
///////////////////////////////////////////////////////////


$resren++;
$arrrest2[$resren]=$costo_cliente;
           
$cost_proveedor[$resren]=floatval($row[43]);

$casetas[$resren]=floatval($row[142]);
$combustible[$resren]=floatval($row[140]);
$desgaste[$resren]=floatval($row[139]);
$cuota[$resren]=floatval($row[141]);
$playo[$resren]=floatval($row[143]);
$comision_m3[$resren]=floatval($row[144]);

$costo_seg_prov[$resren]=floatval($segpro);

$quien_vendio[$resren]=$row[137];
$fondo[$resren]=$row[148];
$ahorro[$resren]=$row[149];
$seguro_i[$resren]=$row[151];
$clave_s[$resren]=$row[9];
$empre[$resren]=$row[150];


$ren++;
$ren++;
  

////////////////////// Cargos Extra Proveedor //////////////////
$cargosprov_mas=0.0;

$ren=$maxren+2;
$queryie2c ="SELECT count(id) from cargos_extra where para='Proveedor' and cve_servicio='".$row[9]."'";
$resultie2c = $link->query($queryie2c);
$rowie2c=mysqli_fetch_row($resultie2c);

if($rowie2c[0]>=1){
        $queryie2 ="SELECT * from cargos_extra where  para='Proveedor' and cve_servicio='".$row[9]."'";
        $resultie2 = $link->query($queryie2);
        
        $ext2=0;
        while($rowie2=mysqli_fetch_row($resultie2)){
          $ext2++;
                    $ren++;
                    $objPHPExcel->setCellValue($ar[$ren].'1', 'EXTRA '.$ext2.' PROV');
                    $objPHPExcel->getColumnDimension($ar[$ren])->setWidth(20);
                    $objPHPExcel->getStyle($ar[$ren].'1')->getAlignment()->setVertical(PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                    $objPHPExcel->getStyle($ar[$ren].'1')->getAlignment()->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                    $objPHPExcel->getStyle($ar[$ren].'1')->getAlignment()->setWrapText(true);

                    $objPHPExcel->setCellValue($ar[$ren].$c, $rowie2[2]);

                    $ren++;
                    $objPHPExcel->setCellValue($ar[$ren].'1', 'MONTO '.$ext2);
                    $objPHPExcel->getColumnDimension($ar[$ren])->setWidth(20);
                    $objPHPExcel->getStyle($ar[$ren].'1')->getAlignment()->setVertical(PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                    $objPHPExcel->getStyle($ar[$ren].'1')->getAlignment()->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                    $objPHPExcel->getStyle($ar[$ren].'1')->getAlignment()->setWrapText(true);
                    $objPHPExcel->setCellValue($ar[$ren].$c, $rowie2[3]);
                    $objPHPExcel->getStyle($ar[$ren].$c)->getNumberFormat()->setFormatCode('$ #,##0.00');


                    $cargosprov_mas=$cargosprov_mas+floatval($rowie2[3]);
                 
                   if($maxren3<$ren){
                    $maxren3=$ren;
                   //echo $maxren3.'  j <br>';
                    }
        }
}

////////////////////// Fin Cargos Extra Proveedor //////////////////

//echo $maxren3.'  2 <br>';

////////////////////// Descuentos Proveedor //////////////////




$costo_real_p[$resren]=$cost_proveedor[$resren]+$casetas[$resren]+$combustible[$resren]+$desgaste[$resren]+$cuota[$resren]+$playo[$resren]+$comision_m3[$resren]+$cargosprov_mas;



}

$ren=$maxren3;
  for($rejen=2; $rejen<=$resren; $rejen++){
$descuentosprov_mas=0.0;



        $queryie21 ="SELECT * from descuentos where  para='Proveedor' and cve_servicio='".$clave_s[$rejen]."'";
        $resultie21 = $link->query($queryie21);
        
        $ext2=0;
        while($rowie21=mysqli_fetch_row($resultie21)){
          $ext2++;
                    $ren++;
                    //echo $ren.'  2 <br>';
                    $objPHPExcel->setCellValue($ar[$ren].'1', 'DESCUENTO '.$ext2.' PROV');
                    $objPHPExcel->getColumnDimension($ar[$ren])->setWidth(20);
                    $objPHPExcel->getStyle($ar[$ren].'1')->getAlignment()->setVertical(PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                    $objPHPExcel->getStyle($ar[$ren].'1')->getAlignment()->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                    $objPHPExcel->getStyle($ar[$ren].'1')->getAlignment()->setWrapText(true);
                    $objPHPExcel->setCellValue($ar[$ren].$rejen, $rowie21[2]);

                    $ren++;
                    $objPHPExcel->setCellValue($ar[$ren].'1', 'MONTO '.$ext2);
                    $objPHPExcel->getColumnDimension($ar[$ren])->setWidth(20);
                    $objPHPExcel->getStyle($ar[$ren].'1')->getAlignment()->setVertical(PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                    $objPHPExcel->getStyle($ar[$ren].'1')->getAlignment()->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                    $objPHPExcel->getStyle($ar[$ren].'1')->getAlignment()->setWrapText(true);
                    $objPHPExcel->setCellValue($ar[$ren].$rejen, $rowie21[3]);
                    $objPHPExcel->getStyle($ar[$ren].$rejen)->getNumberFormat()->setFormatCode('$ #,##0.00');


                    $descuentosprov_mas=$descuentosprov_mas+floatval($rowie21[3]);
                 
                   if($maxren2<$ren){
                    $maxren2=$ren;
                    }
        }

$costo_real_p[$rejen]=$costo_real_p[$rejen]-$descuentosprov_mas;
}
////////////////////// Fin Descuentos Proveedor //////////////////

$maxren2=$maxren2+2;
  $maxren++;



for($rejen=2; $rejen<=$resren; $rejen++){

$objPHPExcel->setCellValue($ar[$maxren].'1', 'COSTO REAL CLIENTE');
$objPHPExcel->getColumnDimension($ar[$maxren])->setWidth(16);
$objPHPExcel->getStyle($ar[$maxren].'1')->getAlignment()->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getStyle($ar[$maxren])->getAlignment()->setWrapText(true);
$objPHPExcel->setCellValue($ar[$maxren].$rejen,  $arrrest2[$rejen]);
$objPHPExcel->getStyle($ar[$maxren].$rejen)->getNumberFormat()->setFormatCode('$ #,##0.00');

$col=$maxren;
$col++;
$objPHPExcel->setCellValue($ar[$col].'1', 'COSTO PROVEEDOR');
$objPHPExcel->getColumnDimension($ar[$col])->setWidth(16);
$objPHPExcel->getStyle($ar[$col].'1')->getAlignment()->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getStyle($ar[$col])->getAlignment()->setWrapText(true);
$objPHPExcel->setCellValue($ar[$col].$rejen,  $cost_proveedor[$rejen]);
$objPHPExcel->getStyle($ar[$col].$rejen)->getNumberFormat()->setFormatCode('$ #,##0.00');


//$maxren2=$col+2;
}
//  $maxren++;

for($rejen=2; $rejen<=$resren; $rejen++){
    $restan=0;
$col=$maxren2;
$col++;
$objPHPExcel->setCellValue($ar[$col].'1', 'CASETAS');
$objPHPExcel->getColumnDimension($ar[$col])->setWidth(16);
$objPHPExcel->getStyle($ar[$col].'1')->getAlignment()->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getStyle($ar[$col])->getAlignment()->setWrapText(true);
$objPHPExcel->setCellValue($ar[$col].$rejen,  $casetas[$rejen]);
$objPHPExcel->getStyle($ar[$col].$rejen)->getNumberFormat()->setFormatCode('$ #,##0.00');
$restan=$restan + $casetas[$rejen];

$col++;
$objPHPExcel->setCellValue($ar[$col].'1', 'COMBUSTIBLE');
$objPHPExcel->getColumnDimension($ar[$col])->setWidth(16);
$objPHPExcel->getStyle($ar[$col].'1')->getAlignment()->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getStyle($ar[$col])->getAlignment()->setWrapText(true);
$objPHPExcel->setCellValue($ar[$col].$rejen,  $combustible[$rejen]);
$objPHPExcel->getStyle($ar[$col].$rejen)->getNumberFormat()->setFormatCode('$ #,##0.00');
$restan=$restan + $combustible[$rejen];

$col++;
$objPHPExcel->setCellValue($ar[$col].'1', 'DESGASTE');
$objPHPExcel->getColumnDimension($ar[$col])->setWidth(16);
$objPHPExcel->getStyle($ar[$col].'1')->getAlignment()->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getStyle($ar[$col])->getAlignment()->setWrapText(true);
$objPHPExcel->setCellValue($ar[$col].$rejen,  $desgaste[$rejen]);
$objPHPExcel->getStyle($ar[$col].$rejen)->getNumberFormat()->setFormatCode('$ #,##0.00');
$restan=$restan + $desgaste[$rejen];

$col++;
$objPHPExcel->setCellValue($ar[$col].'1', 'CUOTA');
$objPHPExcel->getColumnDimension($ar[$col])->setWidth(16);
$objPHPExcel->getStyle($ar[$col].'1')->getAlignment()->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getStyle($ar[$col])->getAlignment()->setWrapText(true);
$objPHPExcel->setCellValue($ar[$col].$rejen,  $cuota[$rejen]);
$objPHPExcel->getStyle($ar[$col].$rejen)->getNumberFormat()->setFormatCode('$ #,##0.00');
$restan=$restan + $cuota[$rejen];

$col++;
$objPHPExcel->setCellValue($ar[$col].'1', 'PLAYO');
$objPHPExcel->getColumnDimension($ar[$col])->setWidth(16);
$objPHPExcel->getStyle($ar[$col].'1')->getAlignment()->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getStyle($ar[$col])->getAlignment()->setWrapText(true);
$objPHPExcel->setCellValue($ar[$col].$rejen,  $playo[$rejen]);
$objPHPExcel->getStyle($ar[$col].$rejen)->getNumberFormat()->setFormatCode('$ #,##0.00');
$restan=$restan + $playo[$rejen];

$col++;
$objPHPExcel->setCellValue($ar[$col].'1', 'COMISION M3');
$objPHPExcel->getColumnDimension($ar[$col])->setWidth(16);
$objPHPExcel->getStyle($ar[$col].'1')->getAlignment()->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getStyle($ar[$col])->getAlignment()->setWrapText(true);
$objPHPExcel->setCellValue($ar[$col].$rejen,  $comision_m3[$rejen]);
$objPHPExcel->getStyle($ar[$col].$rejen)->getNumberFormat()->setFormatCode('$ #,##0.00');
$restan=$restan + $comision_m3[$rejen];

$col++;
$objPHPExcel->setCellValue($ar[$col].'1', 'COSTO REAL PROVEEDOR');
$objPHPExcel->getColumnDimension($ar[$col])->setWidth(16);
$objPHPExcel->getStyle($ar[$col].'1')->getAlignment()->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getStyle($ar[$col])->getAlignment()->setWrapText(true);
$objPHPExcel->setCellValue($ar[$col].$rejen,  $costo_real_p[$rejen]);
$objPHPExcel->getStyle($ar[$col].$rejen)->getNumberFormat()->setFormatCode('$ #,##0.00');

$col++;
$objPHPExcel->setCellValue($ar[$col].'1', 'FONDO');
$objPHPExcel->getColumnDimension($ar[$col])->setWidth(16);
$objPHPExcel->getStyle($ar[$col].'1')->getAlignment()->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getStyle($ar[$col])->getAlignment()->setWrapText(true);
$objPHPExcel->setCellValue($ar[$col].$rejen,  $fondo[$rejen]);
$objPHPExcel->getStyle($ar[$col].$rejen)->getNumberFormat()->setFormatCode('$ #,##0.00');

$col++;
$objPHPExcel->setCellValue($ar[$col].'1', 'AHORRO');
$objPHPExcel->getColumnDimension($ar[$col])->setWidth(16);
$objPHPExcel->getStyle($ar[$col].'1')->getAlignment()->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getStyle($ar[$col])->getAlignment()->setWrapText(true);
$objPHPExcel->setCellValue($ar[$col].$rejen,  $ahorro[$rejen]);
$objPHPExcel->getStyle($ar[$col].$rejen)->getNumberFormat()->setFormatCode('$ #,##0.00');

$col++;
$objPHPExcel->setCellValue($ar[$col].'1', 'SEGURO INCLUIDO');
$objPHPExcel->getColumnDimension($ar[$col])->setWidth(16);
$objPHPExcel->getStyle($ar[$col].'1')->getAlignment()->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getStyle($ar[$col])->getAlignment()->setWrapText(true);
$objPHPExcel->setCellValue($ar[$col].$rejen,  $seguro_i[$rejen]);
$objPHPExcel->getStyle($ar[$col].$rejen)->getNumberFormat()->setFormatCode('$ #,##0.00');


$col++;
$objPHPExcel->setCellValue($ar[$col].'1', 'UILIDAD');
$objPHPExcel->getColumnDimension($ar[$col])->setWidth(16);
$objPHPExcel->getStyle($ar[$col].'1')->getAlignment()->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getStyle($ar[$col])->getAlignment()->setWrapText(true);
$restan=$restan + $costo_seg_prov[$rejen];
//$utilidad=($arrrest2[$rejen]-$costo_real_p[$rejen]) - $restan;
//$utilidad=$arrrest2[$rejen] - ($restan + $cost_proveedor[$rejen]+ $ahorro[$rejen]+$fondo[$rejen]);
$utilidad=$arrrest2[$rejen]-($costo_real_p[$rejen] + $ahorro[$rejen]+$fondo[$rejen]+$seguro_i[$rejen]); 
$objPHPExcel->setCellValue($ar[$col].$rejen, $utilidad);
//$objPHPExcel->setCellValue($ar[$col].$rejen, $arrrest2[$rejen] . ' - '.$restan.' - '.$cost_proveedor[$rejen].' - '.$ahorro[$rejen].' - '.$fondo[$rejen].' - ');
$objPHPExcel->getStyle($ar[$col].$rejen)->getNumberFormat()->setFormatCode('$ #,##0.00');




$col++;
$objPHPExcel->setCellValue($ar[$col].'1', 'QUIEN VENDIO');
$objPHPExcel->getColumnDimension($ar[$col])->setWidth(16);
$objPHPExcel->getStyle($ar[$col].'1')->getAlignment()->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getStyle($ar[$col])->getAlignment()->setWrapText(true);
$objPHPExcel->setCellValue($ar[$col].$rejen,  $quien_vendio[$rejen]);

switch($empre[$rejen]){
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

  $col++;
  $objPHPExcel->setCellValue($ar[$col].'1', 'EMPRESA');
  $objPHPExcel->getColumnDimension($ar[$col])->setWidth(16);
  $objPHPExcel->getStyle($ar[$col].'1')->getAlignment()->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
  $objPHPExcel->getStyle($ar[$col])->getAlignment()->setWrapText(true);
  $objPHPExcel->setCellValue($ar[$col].$rejen,  $empresa);


}



$objPHPExcel->setTitle("BUSQUEDA_".$_SESSION['servicios']);



$writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="SERVICIOS-'.$_SESSION['servicios'].'-'.$da.'.xlsx"');
        $writer->save('php://output');

    ?>
