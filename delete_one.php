<?php
header('Content-Type: application/json');

require("lib/utils.php");
 
$json = file_get_contents('php://input');
$input = json_decode($json,true);


$deviceid=$input['deviceid'];
$uuid=$input['uuid']; 


$query = "delete from memo where uuid='%s' and deviceid = '%s'";
$ret =  exec_sql($query,array($uuid,$deviceid));
 

echo json_encode(
    array(
        'code' => 0,
        'ret'  => $ret?1:0
    )
);
?>