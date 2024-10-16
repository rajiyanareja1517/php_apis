<?php

    include "../../config/config.php";

    header("Access-Control-Allow-Methods: PUT,PATCH");

    header("Content-Type: application/json");

    if($_SERVER['REQUEST_METHOD'] == "PUT" ||$_SERVER['REQUEST_METHOD'] == "PATCH" ) {

        $input = file_get_contents("php://input");

        parse_str($input, $_UPDATE);

        $id = $_UPDATE['id'];
        $post = $_UPDATE['post'];
        $description = $_UPDATE['description'];

        $config = new Config();

        $res = $config->updatePost($id,$post,$description);

        if($res) {
            $arr['data'] = "Post Updated Succesfully...";
        } else {
            $arr['data'] = "Post Updation Failed...";
        }

    } else {
        $arr['error'] = "Onlt Put & Patch http request are allowed...";
    }

    echo json_encode($arr);

?>