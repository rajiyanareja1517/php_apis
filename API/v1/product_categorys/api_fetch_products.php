<?php
    include "../../../config/config.php";

    header("Acces-Control-Allow-Methods: GET");
    header("Content-Type: application/json");

    if($_SERVER['REQUEST_METHOD'] == 'GET')  {
        $config = new Config();
        $res = $config->fetchAllProducts();
        $records = [];
        while($data = mysqli_fetch_assoc($res)) {
            array_push($records,$data);
        }
        echo json_encode($records);
        exit;
    } else {
        $arr['error'] = "Only get http request allowed...";
        echo json_encode($arr);
        exit;
    }

?>