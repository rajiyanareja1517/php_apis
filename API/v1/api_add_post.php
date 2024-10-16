<?php

    include "../../config/config.php";

    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json");

    if($_SERVER['REQUEST_METHOD'] == "POST") {

        $post = $_POST['post'];
        $description = $_POST['description'];
        $image = $_FILES['image'];

        $image_post = uniqid() . $image['name'];
        $temp_path = $image['tmp_name'];

        $destination_path = "../../uploads/" . "$image_post";

        $temp = move_uploaded_file($temp_path, $destination_path);

        if($temp) {
            $arr['file'] = "File Uploaded Successfully...";
        } else {
            $arr['file'] = "File Updation Failed...";
        }

        $config = new Config();

        $res = $config->addPost($post, $description, $image_post);

        if($res) {
            $arr['data'] = "Post Inserted Successfully...";
        } else {
            $arr['data'] = "Post Insertion Failed...";
        }

    } else {
        $arr['error'] = "Only POST HTTP request allowed...";
    }

    echo json_encode($arr);

?>