<?php
header('Content-Type: application/json');

require("lib/utils.php");
 
$json = file_get_contents('php://input');
$input = json_decode($json,true);

$uuid=$input['uuid'];
$title=$input['title'];
$content=$input['content'];
$done=$input['done'];

$query = "replace into memo (uuid,title, content,done) values ('%s','%s','%s','%s')";
$ret =  exec_sql($query,array($uuid,$title,$content,$done));
 

echo json_encode(
    array(
        'code' => 0,
        'ret'  => $ret
    )
);
?>