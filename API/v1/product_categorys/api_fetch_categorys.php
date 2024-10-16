<?php
    include "../../../../config/config.php";

    header("Access-Control-Allow-Methods: GET");
    header("Content-Type: application/json");

    if($_SERVER['REQUEST_METHOD'] == 'GET') { 
        $config = new Config();
        $res = $config->getAllData();
        $allRecords = [];

        while ($response = mysqli_fetch_assoc($res)) {
            array_push($allRecords, $response);
        }
        
        echo json_encode($allRecords);

    } else {
        $arr['error'] = "only get http request are allowed...";
        echo json_encode($arr);
    }

?>