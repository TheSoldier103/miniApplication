<?php
$filename = 'users.csv';
$export_data = unserialize($_POST['export_data']);

// Create File
$file = fopen($filename, "w");

foreach ($export_data as $line)
{
    fputcsv($file, $line);
}

fclose($file);

// Parameters to encode file while downloading
header('Content-Encoding: UTF-8');
header('Content-Type: text/csv; charset=utf-8');
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=" . $filename);
header("Content-Type: application/csv; ");

readfile($filename);

//Delete temporary file
unlink($filename);
exit();

