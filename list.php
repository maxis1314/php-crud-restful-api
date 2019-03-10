<?php
header('Content-Type: application/json');

require("lib/utils.php");
 

$query = "select * from memo order by id desc limit 100";
$ret =  read_sql($query);
 

echo json_encode(
    array(
        'code' => 0,
        'ret'  => $ret
    )
);
?>