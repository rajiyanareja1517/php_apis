<?php
    include "../../../config/config.php";

    header("Access-Control-Allow-Methods: DELTE");
    header("Content-Type: application/json");

    if($_SERVER['REQUEST_METHOD'] == 'DELETE') {
        $input = file_get_contents("php://input");
        parse_str($input, $_DELETE);

        $id = $_DELETE['id'];

        $config = new Config();

        $res = $config->deleteData($id);

        if($res) {
            $arr['data'] = "Data deleted succesfully...";
        } else {
            $arr['data'] = "Data deletion Failed...";
        }

    } else {
        $arr['error'] = "only delete http request allow...";
    }
    
        echo json_encode($arr);

?>