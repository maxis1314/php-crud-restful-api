<?php
header('Content-Type: application/json');

require("lib/utils.php");
 
$id=$_GET['id'];
$title=$_GET['title'];
$content=$_GET['content'];


$query = "update memo set title = '%s', content='%s' where id = '%s'";
$ret =  exec_sql($query,array($title,$content,$id));
 

echo json_encode(
    array(
        'code' => 0,
        'ret'  => $ret?1:0
    )
);
?>