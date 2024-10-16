<?php

    include "../../../config/config.php";

    header("Access-Control-Allow-Methods: GET");
    header("Content-Type: application/json");

    if($_SERVER['REQUEST_METHOD'] == 'GET') {

        if(!empty($_GET['id'])) {     
            $id = $_GET['id'];
            $config = new Config();
            $res = $config->fetchSingleUser($id);
            $arr = mysqli_fetch_assoc($res);

        } else {
            $arr['data'] = "Please Enter id first...";
        }

    } else {
        $arr['error'] = "Only Get http request allowed...";
    }

    echo json_encode($arr);

?>