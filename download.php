<?php
$filename=$_GET['filename'];
$filepath = 'upload/'.$filename;
$filesize = filesize($filepath);
$path_parts = pathinfo($filepath);
$title = $path_parts['basename']; 
$extension = $path_parts['extension']; 
 
header('Pragma: public');
header('Expires: 0');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . $title . '"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . $filesize);
 
ob_clean();
flush();
readfile($filepath);
?>