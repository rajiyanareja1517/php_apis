<?php
    include "../../../config/config.php";
    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json");


    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $config = new Config();

        $email = $_POST['email'];
        $pass = $_POST['password'];

        $res = $config->signInUser($email,$pass);

        if($res) {
            $arr['data'] = "Log-in succesfull...";
        } else {
            $arr['data'] = "Log-in failed...";
        }

    } else {
        $arr['error'] = "Only post http request allowed..";
    }

    echo json_encode($arr);

?>