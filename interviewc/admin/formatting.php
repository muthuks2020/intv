<?php
//Writing to the Excel
function excel_column($col_number)
{
	$xls_columns=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P',
	'Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ',
	'AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ',
	'BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP',
	'BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ','CA','CB','CC','CD','CE','CF',
	'CG','CH','CI','CJ','CK','CL','CM','CN','CO','CP','CQ','CR','CS','CT','CU','CV',
	'CW','CX','CY','CZ','DA','DB','DC','DD','DE','DF','DG','DH','DI','DJ','DK','DL',
	'DM','DN','DO','DP','DQ','DR','DS','DT','DU','DV','DW','DX','DY','DZ','EA','EB',
	'EC','ED','EE','EF','EG','EH','EI','EJ','EK','EL','EM','EN','EO','EP','EQ','ER',
	'ES','ET','EU','EV','EW','EX','EY','EZ','FA','FB','FC','FD','FE','FF','FG','FH','FI','FJ',
	'FK','FL','FM','FN','FO','FP','FQ','FR','FS','FT','FU','FV','FW','FX','FY','FZ',
	'GA','GB','GC','GD','GE','GF','GG','GH','GI','GJ',
	'GK','GL','GM','GN','GO','GP','GQ','GR','GS','GT','GU','GV','GW','GX','GY','GZ',
	'HA','HB','HC','HD','HE','HF','HG','HH','HI','HJ',
	'HK','HL','HM','HN','HO','HP','HQ','HR','HS','HT','HU','HV','HW','HX','HY','HZ',
	'IA','IB','IC','ID','IE','IF','IG','IH','II','IJ',
	'IK','IL','IM','IN','IO','IP','IQ','IR','IS','IT','IU','IV','IW','IX','IY','IZ',
	'KA','KB','KC','KD','KE','KF','KG','KH','KI','KJ',
	'KK','KL','KM','KN','KO','KP','KQ','KR','KS','KT','KU','KV','KW','KX','KY','KZ',
	'LA','LB','LC','LD','LE','LF','LG','LH','LI','LJ',
	'LK','LL','LM','LN','LO','LP','LQ','LR','LS','LT','LU','LV','LW','LX','LY','LZ',
	'MA','MB','MC','MD','ME','MF','MG','MH','MI','MJ',
	'MK','ML','MM','MN','MO','MP','MQ','MR','MS','MT','MU','MV','MW','MX','MY','MZ',
	'NA','NB','NC','ND','NE','NF','NG','NH','NI','NJ',
	'NK','NL','NM','NN','NO','NP','NQ','NR','NS','NT','NU','NV','NW','NX','NY','NZ');
	return $xls_columns[$col_number];
}



//Formatting Declaration
$head_format = array(
			'font'    => array(
				'color' => array('argb' => 'FFFFFFFF'),
				'bold'      => true,
			),
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
			),
			'fill' => array(
	 			'type'       => PHPExcel_Style_Fill::FILL_SOLID,
	  			'rotation'   => 90,
	 			'startcolor' => array('rgb' => '009900')
	 		),
			'borders' => array(
				'outline' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN,
					'color' => array('argb' => '00000000'),
				)
			)
		);
$data_format = array(
			'font'    => array(
				'color' => array('argb' => '00000000')
			),
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
			),
			'fill' => array(
	 			'type'       => PHPExcel_Style_Fill::FILL_SOLID,
	  			'rotation'   => 90,
	 			'startcolor' => array('rgb' => 'FFFFFF')
	 		),
			'borders' => array(
				'outline' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN,
					'color' => array('argb' => '00000000'),
				)
			)
		);