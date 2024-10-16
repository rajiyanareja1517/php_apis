<?php
    include "../../../config/config.php";


    header("Access-Control-Allow-Methods: GET");
    header("Content-Type: application/json");

    if($_SERVER['REQUEST_METHOD'] == "GET") {

        $config = new Config();
    
        $res = $config->fetchAllUsers();
        $_data = [];
    
        while( $op = mysqli_fetch_assoc($res) ) {
            array_push($_data, $op);
        }
    
        echo json_encode($_data);
    
    } else {
        $arr['error'] = "Only get http request allowed...";
        echo json_encode($arr);
    }


?>