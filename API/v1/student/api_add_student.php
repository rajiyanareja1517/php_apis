<?php

    include '../../../config/config.php';

    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json");

    if($_SERVER['REQUEST_METHOD']=='POST'){

        $name = $_POST['name'];
        $age = $_POST['age'];
        $course = $_POST['course'];

        $config =  new Config();
        $res = $config->addStudent($name,$age,$course);

        if($res){
            $arr['data'] = "Student Inserted Successfully...";
            http_response_code(201);
        }
        else{
            $arr['data'] = "Student insertion failed...";
        }
    }
    else{
        $arr['error'] = "Only POST http request method in allowed...";
    }
    echo json_encode($arr);
?>