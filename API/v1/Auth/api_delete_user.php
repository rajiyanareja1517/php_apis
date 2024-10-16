<?php
    include "../../../config/config.php";

    header("Access-Control-Allow-Methods: DELETE");
    header("Content-Type: application/json");

    if($_SERVER['REQUEST_METHOD'] == "DELETE") {

        $config = new Config();

        $input = file_get_contents("php://input");

        parse_str($input, $_DELETE);

        $id = (int) $_DELETE['id'];
    
        $res = $config->deleteUser($id);

        if($res) {
            $arr['data'] = "User Deleted Succesfully...";
        }
    
        echo json_encode($arr);
    
    } else {
        $arr['error'] = "Only DELETE http request allowed...";
        echo json_encode($arr);
    }

?>