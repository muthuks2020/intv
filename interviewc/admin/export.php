<?php
$link = @mysql_connect('localhost', 'root', 'ad@pro123');
if (!$link) {die('Could not connect: ' . mysql_error());}
mysql_select_db("personal",$link);
include 'Classes/PHPExcel.php';
include 'Classes/PHPExcel/IOFactory.php';
include("formatting.php");
if(isset($_POST['datepicker'])&&isset($_POST['datepicker1']))
{	
//echo "SELECT * FROM `contacts`  WHERE DATE(`register_on`)> DATE('".$_POST["datepicker"]."') and DATE(`register_on`)< DATE('".$_POST["datepicker1"]."')";
//exit;
//echo "SELECT * FROM `contacts` INNER JOIN `empfrnd` ON  contacts.name = empfrnd.cand_name WHERE DATE(`register_on`)>= DATE('".$_POST["datepicker"]."') and DATE(`register_on`)<= DATE('".$_POST["datepicker1"]."') GROUP BY contacts.id";

$sql=mysql_query("SELECT * FROM `contacts` WHERE DATE(`register_on`)>= DATE('".$_POST["datepicker"]."') and DATE(`register_on`)<= DATE('".$_POST["datepicker1"]."') GROUP BY contacts.id");

//$sql=mysql_query("SELECT * FROM `contacts`  WHERE DATE(`register_on`)>= DATE('".$_POST["datepicker"]."') and DATE(`register_on`)<= DATE('".$_POST["datepicker1"]."') ");
$sArray = mysql_fetch_array(@$sql);
//echo "<pre>";
//print_r($sArray );
//exit;

if(PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');
$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Created By 2adpro")
	 ->setLastModifiedBy("mks")
	 ->setTitle("2adpro")
	 ->setSubject("2adpro")
	 ->setDescription("2adpro")
	 ->setKeywords("2adpro")
	 ->setCategory("EXCEL Report");
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setTitle('2adpro');
$objPHPExcel->getActiveSheet()->getTabColor()->setARGB('FFFCD985');
$objPHPExcel->getActiveSheet()->setShowGridlines(true);
$objPHPExcel->getDefaultStyle()->getFont()->setName('sans-serif');
$objPHPExcel->getDefaultStyle()->getFont()->setSize(10);
$heading_part = array("S.No","Resigtered","Candidate Name","Mobile No","Email id","Fresh/Experienced","Previous/Current Employer", "Designation","Experience (in Years)","CTC (Per Annum)","Position Applied","Do you have any friends working in 2adpro","Source","Have you been interviewed by 2adpro before","Interview Date","Location","Referred Employee ID","Referred Employee Name","Referred Employee Location","First name","Contact number","company name","Designation");

//$heading_part = array("S.No","Candidate Name","Mobile No","Email id","Fresh/Experienced","Previous/Current Employer", "Designation","Experience (in Years)","CTC (Per Annum)","Position Applied","Do you have any friends working in 2adpro","Source","Have you been interviewed by 2adpro before","Interview Date","Location");
$headWidth = array(5,20,20,30,20,35,30,20,20,20,40,20,45,20,30,30,30,30,30,30,30,30,30,30);
$startcol = 0;
$endcol = 0;
$row = 1;
foreach($heading_part as $kid => $val)
{
	$objPHPExcel->getActiveSheet()->getStyle(excel_column($endcol).$row)->applyFromArray($head_format);
	$objPHPExcel->getActiveSheet()->getColumnDimension(excel_column($endcol))->setWidth($headWidth[$kid]);
	$objPHPExcel->getActiveSheet()->getRowDimension($row)->setRowHeight(20);
	$objPHPExcel->getActiveSheet()->setCellValue(excel_column($endcol++).$row, $val);
}
$startcol = 0;
$endcol = 0;
$row++;

if(mysql_num_rows(@$sql) > 0)
	{	
	$sno = 1;
while($sArray = mysql_fetch_array(@$sql))
{	
$objPHPExcel->getActiveSheet()->setCellValue(excel_column($startcol++).$row, $sno++);
$objPHPExcel->getActiveSheet()->setCellValue(excel_column($startcol++).$row, $sArray[15]);
$objPHPExcel->getActiveSheet()->setCellValue(excel_column($startcol++).$row, $sArray[1]);
$objPHPExcel->getActiveSheet()->setCellValue(excel_column($startcol++).$row, $sArray[2]);
$objPHPExcel->getActiveSheet()->setCellValue(excel_column($startcol++).$row, $sArray[3]);
$objPHPExcel->getActiveSheet()->setCellValue(excel_column($startcol++).$row, $sArray[4]);
$objPHPExcel->getActiveSheet()->setCellValue(excel_column($startcol++).$row, $sArray[5]);
$objPHPExcel->getActiveSheet()->setCellValue(excel_column($startcol++).$row, $sArray[6]);
$objPHPExcel->getActiveSheet()->setCellValue(excel_column($startcol++).$row, $sArray[7]);
$objPHPExcel->getActiveSheet()->setCellValue(excel_column($startcol++).$row, $sArray[8]);
$objPHPExcel->getActiveSheet()->setCellValue(excel_column($startcol++).$row, $sArray[10]);
$objPHPExcel->getActiveSheet()->setCellValue(excel_column($startcol++).$row, $sArray[11]);
$objPHPExcel->getActiveSheet()->setCellValue(excel_column($startcol++).$row, $sArray[12]);
$objPHPExcel->getActiveSheet()->setCellValue(excel_column($startcol++).$row, $sArray[13]);
$objPHPExcel->getActiveSheet()->setCellValue(excel_column($startcol++).$row, $sArray[14]);
$objPHPExcel->getActiveSheet()->setCellValue(excel_column($startcol++).$row, $sArray[16]);
$objPHPExcel->getActiveSheet()->setCellValue(excel_column($startcol++).$row, $sArray[58]);
$objPHPExcel->getActiveSheet()->setCellValue(excel_column($startcol++).$row, $sArray[59]);
$objPHPExcel->getActiveSheet()->setCellValue(excel_column($startcol++).$row, $sArray[60]);
$objPHPExcel->getActiveSheet()->setCellValue(excel_column($startcol++).$row, $sArray[63]);
$objPHPExcel->getActiveSheet()->setCellValue(excel_column($startcol++).$row, $sArray[64]);
$objPHPExcel->getActiveSheet()->setCellValue(excel_column($startcol++).$row, $sArray[65]);
$objPHPExcel->getActiveSheet()->setCellValue(excel_column($startcol++).$row, $sArray[66]);
$startcol = 0;
$endcol = 0;
$row++;	
//echo '<pre>';
//print_r($sArray);
//exit();
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

$filename = "Personalinfo.xls";
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$filename.'"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

$objWriter->save('php://output');
}
?>