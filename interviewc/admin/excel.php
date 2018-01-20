<?php
/*include_once("connection.php");
// load library
require 'php-excel.class.php';
 $from= $_POST['datepicker'];
 $to = $_POST['datepicker1'];
// create a simple 2-dimensional array
 $select = "SELECT * FROM contacts WHERE (register_on between '".$from."' AND '".$to."')";
$query = mysql_query($select) or die (mysql_error());

while($row = mysql_fetch_array($query))
{
	$data = $row;


//exit;
// generate file (constructor parameters are optional)
	$xls = new Excel_XML('UTF-8', false, 'My Test Sheet');
	$xls->addArray($data);
	$xls->generateXML('my-test');
}*/

include_once("connection.php");
//Admin Authenthication
//auth($_SESSION["admin_id"],encode(2));

 $from= $_POST['datepicker'];
 $to = $_POST['datepicker1'];
 
 echo $select = "SELECT * FROM contacts WHERE (register_on BETWEEN '".$from."' AND '".$to."')";

	/*$sql = "SELECT 
				id,
				DATE_FORMAT(submitted_datetime, '%m/%d/%Y %H:%i:%s'),
				name,
				email,
				phone,
				IF(tourism_australia = 1, 'Yes', 'No'),
				IF(united_travel = 1, 'Yes', 'No'),
				IF(fairfax_media = 1, 'Yes', 'No'),
				IF(qantas_red_email = 1, 'Yes', 'No')
			FROM
				person_info
			order by 
				submitted_datetime";*/
	$res= mysql_query($select);
	if(mysql_num_rows($res) > 0)
	{
		
		while($row = mysql_fetch_array($res))
		{
			for($i = 0; $i < mysql_num_fields($res); $i++)
			{
				//print_r($row);
				$subcriptionData[$row[0]][] = $row[$i];
			}
		}
	}
	//exit;
/** Error reporting */
//error_reporting(E_ALL);

/** PHPExcel */
include 'Classes/PHPExcel.php';
include 'Classes/PHPExcel/IOFactory.php';

//Includeing the formatting file with common function
include("formatting.php");

// Create new PHPExcel object
//echo date('H:i:s') . " Create new PHPExcel object\n";
$objPHPExcel = new PHPExcel();

$objPHPExcel->getProperties()->setCreator("Created By Fairfax")
							 ->setLastModifiedBy("b.Muthukumarawamy")
							 ->setTitle("Fairfax Subcription Report")
							 ->setSubject("Fairfax Subcription Report")
							 ->setDescription("Fairfax Subcription Report")
							 ->setKeywords("Fairfax Subcription Excel Report")
							 ->setCategory("EXCEL Report");


//Work Sheet 1
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setTitle('Fairfax Subcription');
$objPHPExcel->getActiveSheet()->getTabColor()->setARGB('FFFCD985');
$objPHPExcel->getActiveSheet()->setShowGridlines(true);
$objPHPExcel->getDefaultStyle()->getFont()->setName('sans-serif');
$objPHPExcel->getDefaultStyle()->getFont()->setSize(10);

$heading_part = array("ID", "Name", "Contact","Employer", "Designation", "Experience", "CTC", "Position", "Ad2pro Friends", "Already Attend Interview", "Created On", "Location");

$headWidth = array(10,25,25,25,25,20,30,15,15);

$startcol = 0;
$endcol = 0;
$row = 1;

foreach($heading_part as $kid => $val)
{
	$objPHPExcel->getActiveSheet()->getStyle(excel_column($endcol).$row)->applyFromArray($head_format);
	$objPHPExcel->getActiveSheet()->getColumnDimension(excel_column($endcol))->setWidth($headWidth[$kid]);
	$objPHPExcel->getActiveSheet()->getRowDimension($row)->setRowHeight(50);
	$objPHPExcel->getActiveSheet()->setCellValue(excel_column($endcol++).$row, $val);
}

$startcol = 0;
$endcol = 0;
$row++;


if(count($subcriptionData) > 0)
{
	foreach($subcriptionData as $sID => $sArray)
	{
		foreach($sArray as $sdID => $sdArray)
		{
			$objPHPExcel->getActiveSheet()->getStyle(excel_column($startcol).$row)->applyFromArray($data_format);
			$objPHPExcel->getActiveSheet()->getStyle(excel_column($startcol).$row)->getAlignment()->setWrapText(true);
			$objPHPExcel->getActiveSheet()->setCellValue(excel_column($startcol++).$row, $sdArray);
		}
		$startcol = 0;
		$endcol = 0;
		$row++;
		//$row++;
	}
}
else
{
	$objPHPExcel->getActiveSheet()->mergeCells(excel_column($startcol).$row.':'.excel_column(1).$row);
	$objPHPExcel->getActiveSheet()->getStyle(excel_column($startcol++).$row)->applyFromArray($data_format);
	$objPHPExcel->getActiveSheet()->getStyle(excel_column($startcol++).$row)->applyFromArray($data_format);
	$objPHPExcel->getActiveSheet()->getStyle(excel_column($endcol).$row)->applyFromArray($data_format);
	$objPHPExcel->getActiveSheet()->setCellValue(excel_column($endcol++).$row, "No Records Found!!");
}
$objPHPExcel->setActiveSheetIndex(0);

$filename = "Personal.xls";
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$filename.'"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

$objWriter->save('php://output');
?>
