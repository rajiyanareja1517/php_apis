<?php

    include '../../../config/config.php';

    header("Access-Control-Allow-Methods: PUT, PATCH");
    header("Content-Type:application/json");

    if($_SERVER['REQUEST_METHOD']=='PUT' || $_SERVER['REQUEST_METHOD']=='patch'){

        $config =  new Config();

        $input = file_get_contents("php://input");

        parse_str($input,$_UPDATE);

        $id=$_UPDATE['id'];
        $name=$_UPDATE['name'];
        $age=$_UPDATE['age'];
        $course=$_UPDATE['course'];

        $res = $config->updateStudent($name,$age,$course,$id);

        if($res==1){
            $arr['data']="Student updated Successfully...";
        }
        else{
            $arr['data']="Student updation failed...";
        }
    }
    else{
        $arr['error'] = "Only put and patch http request methods are allowed...";
    }
    echo json_encode($arr);
?>