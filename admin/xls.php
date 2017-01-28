<?php
// connection with the database
//require 'include/db_connection.php';
include_once("include/functions.php");	

$reportid = $_GET['reportid'];

if($reportid==1){
	$reportsql = "SELECT description,inventory_qty,unit from items where inventory_qty<=0";
	$headings = array('User Name', 'usertype');
	//echo "<th>Description</th><th>QTY</th><th>unit</th>";
}
if($reportid==2){
	$reportsql = "SELECT COUNT(*) AS noofequip, CONCAT(fname,' ',lname) AS fullname FROM equipments LEFT JOIN employee ON 
equipments.eid = employee.eid GROUP BY equipments.eid";
$headings = array('User Name', 'usertype');
	//echo "<th>Employee</th><th>QTY</th>";
}						
if($reportid==3){
	$reportsql = "SELECT CONCAT(employee.fname, ' ', employee.lname) AS cname, COUNT(*) AS requisition FROM requisition_details LEFT JOIN employee ON requisition_details.eid = employee.eid GROUP BY requisition_details.eid";
	$headings = array('User Name', 'usertype');
	//echo "<th>Employee</th><th>No. of Requisition</th>";
}
if($reportid==4){
	$reportsql = "SELECT SUM(qty) AS total, description FROM requisition_items LEFT JOIN items ON requisition_items.itemno = items.itemNo GROUP BY items.itemNo ORDER BY total desc";
	$headings = array('User Name', 'usertype');
	//echo "<th width='250'>Total Qty Requested</th><th>Item</th>";
}
if($reportid==5){
	$reportsql = "SELECT * from items";
	$headings = array('User Name', 'usertype');
	//echo "<th width='150' class='center'>Total Qty</th><th>Unit</th><th>Item</th>";
}

// require the PHPExcel file
require 'plugins/Classes/PHPExcel.php';

// simple query

//$query = "SELECT username,usertype FROM users ORDER by userID DESC";

//mysql_query($query);
//echo $query;

    // Create a new PHPExcel object
    $objPHPExcel = new PHPExcel();
    $objPHPExcel->getActiveSheet()->setTitle('List of Users');

    $rowNumber = 1;
    $col = 'A';
    foreach($headings as $heading) {
       $objPHPExcel->getActiveSheet()->setCellValue($col.$rowNumber,$heading);
       $col++;
    }

    // Loop through the result set
    $rowNumber = 2;
	$itemlist = selectListSQL($reportsql);
	//print_r($itemlist);
	//$objPHPExcel->getActiveSheet()->fromArray($itemlist,NULL,'A2'); 
	//$ctr = 0;
	foreach ($itemlist as $rows => $link) {
			
			$objPHPExcel->getActiveSheet()->fromArray($link,NULL,'A'.$rowNumber); 
			
			//print_r($link);
			//echo "<br>";
			$rowNumber++;
	}
	
	
	
	//$row = mysql_fetch_row($itemlist);
	//print_r($itemlist);
	/*foreach ($itemlist as $rows => $link) {
		$col = 'A';

		//$dbcolumn=0;
		//foreach($row as $link) {
		
          //$objPHPExcel->getActiveSheet()->setCellValue($col.$rowNumber,$link);
		  //print_r($link);
		 // echo "<br>";
         
		 
		//}
		echo $rowNumber;
		
		
		//$dbcolumn++;
		 
	}
//echo $col;
    /*while ($row = mysql_fetch_row($result)) {
       $col = 'A';
       foreach($row as $cell) {
          $objPHPExcel->getActiveSheet()->setCellValue($col.$rowNumber,$cell);
          $col++;
       }
       $rowNumber++;
    }*/

    // Freeze pane so that the heading line will not scroll
    $objPHPExcel->getActiveSheet()->freezePane('A2');

    // Save as an Excel BIFF (xls) file
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

   header('Content-Type: application/vnd.ms-excel');
   header('Content-Disposition: attachment;filename="userList.xls"');
   header('Cache-Control: max-age=0');

   $objWriter->save('php://output');
   exit();
//}
//echo 'a problem has occurred... no data retrieved from the database';

?>