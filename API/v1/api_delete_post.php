<?php

    include "../../config/config.php";

    header("Acces-Control-Allow-Methods: DELETE");
    header("Content-Type: application/json");

    if($_SERVER['REQUEST_METHOD'] == "DELETE") {
        
        $config = new Config();
        $input = file_get_contents("php://input");
        
            parse_str($input,$_DELETE);

            $id = $_DELETE['id'];

            $res = $config->deletePost($id);

            if($res) {
                $arr['data'] = "Post Deleted Sucesfully...";
            } else {
                $arr['data'] = "Post Deletion Failed...";
            }

    } else {
        $arr['error'] = "Only DELETE http request allowed...";
    }

    echo json_encode($arr);

?>