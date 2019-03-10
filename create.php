<?php
header('Content-Type: application/json');

require("lib/utils.php");
 
$json = file_get_contents('php://input');
$input = json_decode($json,true);


$title=$input['title'];
$content=$input['content'];


$query = "insert into memo (title, content) values ('%s','%s')";
$ret =  exec_sql($query,array($title,$content));
 

echo json_encode(
    array(
        'code' => 0,
        'ret'  => $ret
    )
);
?>