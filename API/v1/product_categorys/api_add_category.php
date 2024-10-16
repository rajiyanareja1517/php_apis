<?php
    include "../../../config/config.php";

    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json");

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        if(!empty($_POST['category_name'])) {
            $ctgryName = $_POST['category_name'];
            $config = new Config();
            $res = $config->addData($ctgryName);
            if($res) {
                $arr['data'] = "Data Inserted succesfully...";
            } else {
                $arr['data'] = "Data Insertion Failed...";
            }
        } else {
            $arr['error'] = "Category Name is required";
        }

    } else {
        $arr['error'] = "Only post http request is allowed...";
    }
    echo json_encode($arr);
?>