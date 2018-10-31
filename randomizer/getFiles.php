<?php
$directory = "/creatures/";
$txtfiles = glob($directory . "*.txt");

$files = array();

foreach($txtfiles as $txtfile)
{
   $files[] = "<a href=$txtfile>".basename($pdffile)."</a>";
}

echo json_encode($files);
?>
