<?php

include "../../../config/config.php";

header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");

if($_SERVER['REQUEST_METHOD'] == "POST") {

    $config = new Config();

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
        $arr['error'] = "Invalid email address";
        echo json_encode($arr);
        exit;
    }

    if (strlen($password) < 6) {
        $arr['error'] = "Password must be at least 6 characters";
        echo json_encode($arr);
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $res = $config->signUpUser ($email, $hashed_password);

    if ($res) {
        $arr['data'] = "Sign Up Successful...";
    } else {
        $arr['data'] = "Sign Up failed...";
    }

} else {
    $arr['error'] = "Only post http request are allowed...";
}

    echo json_encode($arr);

?>