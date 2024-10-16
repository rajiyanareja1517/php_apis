<?php

    include "../../../config/config.php";

    header("Access-Control-Allow-Methods: GET");
    header("Content-Type: application/json");

    if($_SERVER['REQUEST_METHOD'] == "GET") {

        
        if(!empty($_GET['id'])) {
            $config = new Config();

            $id = $_GET['id'];
            $res = $config->fetchSingleCatefory($id);

            $length = mysqli_num_rows($res);

            if($length!=0) {
                $data = mysqli_fetch_assoc($res);
                echo json_encode($data);
            } else {
                $arr['data'] = "Enter Valid Id & Try again later...";
            }

        } else {
            $arr['error'] = "Please Add id and try again later...";
            echo json_encode($arr);
        }

    }else {
        $arr['error'] = "Only Get Http request are allowed...";
        echo json_encode($arr);
    }

?>