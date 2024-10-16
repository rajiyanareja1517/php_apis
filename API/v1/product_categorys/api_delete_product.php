<?php
    include "../../../config/config.php";

    header("Access-Control-Allow-Methods: DELETE");
    header("Content-Type: application/json");

    if($_SERVER['REQUEST_METHOD'] == 'DELETE') {
         
        $input = file_get_contents("php://input");
        parse_str($input, $_DELETE);

        $id = $_DELETE['id'];

        $config = new Config();

        $res = $config->deleteProduct($id);

        if($res == 1) {
            $arr['data'] = "Product Deleted Succesfully...";
        } else {
            $arr['data'] = "Product Deletion Failed...";
        }

    } else {
        $arr['error'] = "Only Delete Http request allowed...";
    }

    echo json_encode($arr);

?>