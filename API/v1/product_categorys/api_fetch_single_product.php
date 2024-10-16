<?php

    include "../../../config/config.php";

    header("Access-Control-Allow-Methods: GET");

    header("Content-Type: application/json");

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if(!empty($_GET['id'])) {
            $id = (int) $_GET['id'];
            $config = new Config();
            $res = $config->fetchSingleProduct($id);

            $length = mysqli_num_rows($res);


            if($length != 0) {
                $response = mysqli_fetch_assoc($res);
                echo json_encode($response);
            } else {
                $arr['data'] = "Enter Valid Id & Try again later...";
                echo json_encode($arr);
            }
        } else {
            $arr['error'] = "Enter Id First & Try again later...";
            echo json_encode($arr);
        }
    } else {
        $arr['error'] = "Only Get http request allowed...";
        echo json_encode($arr);
    }
?>
