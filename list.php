<?php
header('Content-Type: application/json');

require("lib/utils.php");
 
$json = file_get_contents('php://input');
$input = json_decode($json,true);

$deviceid = $input['deviceid'];

$query = "select * from memo where deviceid='%s' order by id desc limit 100";
$ret =  read_sql($query,array($deviceid ));
 

echo json_encode(
    array(
        'code' => 0,
        'ret'  => $ret
    )
);
?>