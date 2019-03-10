<?php
header('Content-Type: application/json');

require("lib/utils.php");
 
 
$title=$_GET['title'];
$content=$_GET['content'];


$query = "insert into memo (title, content) values ('%s','%s')";
$ret =  exec_sql($query,array($title,$content));
 

echo json_encode(
    array(
        'code' => 0,
        'ret'  => $ret?1:0
    )
);
?>