<?php
header('Content-Type: application/json');

require("lib/utils.php");
 
$json = file_get_contents('php://input');
$input = json_decode($json,true);

$id=$input['uuid'];


$query = "select * from memo where uuid = '%s'";
$ret =  read_sql($query,array($id));
 

echo json_encode(
    array(
        'code' => 0,
        'ret'  => $ret
    )
);
?>