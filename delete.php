<?php
header('Content-Type: application/json');

require("lib/utils.php");
 
$id=$_GET['id'];
 


$query = "delete from memo where id = '%s'";
$ret =  exec_sql($query,array($id));
 

echo json_encode(
    array(
        'code' => 0,
        'ret'  => $ret?1:0
    )
);
?>