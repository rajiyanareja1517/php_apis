<?php

include "../../config/config.php";

header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json");

if($_SERVER['REQUEST_METHOD'] == "GET") {

    $config = new Config();

    $res = $config->fetchAllPosts();
    $allPosts = [];

    while($data = mysqli_fetch_assoc($res)) {
        array_push($allPosts, $data);
    }

    echo json_encode($allPosts);

} else {
    $arr['error'] = "Onlt GET http request are allowed...";
    echo json_encode($arr);
}

?>