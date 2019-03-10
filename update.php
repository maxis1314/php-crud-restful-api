<?php
header('Content-Type: application/json');

require("lib/utils.php");
 
$id=$_GET['uuid'];
$title=$_GET['title'];
$content=$_GET['content'];


$query = "update memo set title = '%s', content='%s' where uuid = '%s'";
$ret =  exec_sql($query,array($title,$content,$id));
 

echo json_encode(
    array(
        'code' => 0,
        'ret'  => $ret?1:0
    )
);
?>