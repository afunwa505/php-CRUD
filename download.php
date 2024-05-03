<?php
include "connect.php";
if(!empty($_GET['file'])){
    $filename =  basename($_GET['file']);
    $filePath = "images/".$filename;
    if(!empty($filename)&& file_exists($filePath));
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$filename");
    header("Content-Type: application/octet-stream");
    header("Content-Transfer-Encoding: utf-8");
    readfile($filePath);
    exit;
}
else{
    echo "file not found";
}

?>