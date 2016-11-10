<?php

// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=record_status.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('SO ID', 'HEI', 'Program','Number of Students','Effectivity','Date Received by Records Officer','Status'));

// fetch the data
$date1 = $_POST['date1'];
$date2 = $_POST['date2'];

mysql_connect('localhost', 'root', '');
mysql_select_db('library');
$rows = mysql_query("select * from so_application left join heimasterlist on so_application.InstCode = heimasterlist.Instcode left join programs on so_application.prog_id = programs.ProgID where date_received between '$date1' AND '$date2'");

// loop over the rows, outputting them
while ($row = mysql_fetch_assoc($rows)) fputcsv($output, array($row['so_id'],$row['Institution Name'],$row['ProgName'],$row['number_of_students'],$row['acad_year'],$row['date_received'],$row['status']));

?>