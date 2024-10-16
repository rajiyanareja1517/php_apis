<?php

    include "../../config/config.php";

    header("Access-Control-Allow-Methods: GET");
    header("Content-Type: application/json");

    if($_SERVER['REQUEST_METHOD'] == "GET") {

        $config = new Config();
        
        if(!empty($_GET['id'])) {
            
            $id = $_GET['id'];
            $res = $config->fetchSinglePost($id);

            $count = mysqli_num_rows($res);
            if($count == 1) {

                $arr = mysqli_fetch_assoc($res);

            } else {
                $arr['data'] = "Post Not Found...";
            }
        } else {
            $arr['warning'] = "Please Enter Id & Continue...";
        }
    } else {
        $arr['error'] = "Onlt GET http request are allowed...";
    }
    
    echo json_encode($arr);

?>