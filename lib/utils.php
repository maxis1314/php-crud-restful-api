<?php
function get_db_config(){
    return array(
        'host' => 'localhost',
        'user' => 'root',
        'pass' => '',
        'db'   => 'memo'
    );
}


function exec_sql($query,$params = array()){
    $config = get_db_config();
    $conn = mysqli_connect($config["host"],$config['user'], $config["pass"], $config['db']);
 
    if(count($params)>0){
        foreach($params as &$one){
            $one = mysqli_real_escape_string($conn,$one);
        }
        $query = vsprintf($query,$params);
    }
 
    if(mysqli_query($conn, $query))
    {
         return true;;
    }
    else
    {
         return false;
    }

    mysqli_close($conn);
}

function read_sql($query,$params = array()){
    $config = get_db_config();
    $conn = mysqli_connect($config["host"],$config['user'], $config["pass"], $config['db']);
    
    if(count($params)>0){
        foreach($params as &$one){
            $one = mysqli_real_escape_string($conn,$one);
        }
        $query = vsprintf($query,$params);
    }
 
 
    $records = mysqli_query($conn,$query);
    $data = array();
    while($row = mysqli_fetch_assoc($records))
    {
        $data[] = $row; 
    }
    mysqli_close($conn);
    return $data;
}