<?php
header('Content-Type: application/json');

require("lib/utils.php");
 
$json = file_get_contents('php://input');
$input = json_decode($json,true);


$id=$input['id'];
 


$query = "update memo set done=1 where id = '%s'";
$ret =  exec_sql($query,array($id));
 

echo json_encode(
    array(
        'code' => 0,
        'ret'  => $ret?1:0
    )
);
?>