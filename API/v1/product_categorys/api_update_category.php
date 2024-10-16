<?php
    include "../../../config/config.php";


    header("Access-Control-Allow-Methods: PUT, PATCH");
    header("Content-Type: application/json");


    if($_SERVER['REQUEST_METHOD'] == 'PUT' || $_SERVER['REQUEST_METHOD'] == 'PATCH') {

        $input = file_get_contents("php://input");
        parse_str($input, $_DELETE);

        $id = $_DELETE['id'];
        $categoryName = $_DELETE['category_name'];

        $config = new Config(); 

        $res = $config->updateData($id,$categoryName);

        if($res == 1) {
            $arr['data'] = "Data updated succesfully...";
        } else {
            $arr['data'] = "Data updation Failed...";
        }

    } else {
        $arr['error'] = "Only put & patch http request allowed...";
    }

    echo json_encode($arr);

?>