<?php
    include "../../../config/config.php";

    header("Acces-Control-Allow-Methods: PATCH,PUT");
    header("Content-Type: application/json");

    if($_SERVER['REQUEST_METHOD'] == 'PATCH' || $_SERVER['REQUEST_METHOD'] == 'PUT') {

        $input = file_get_contents("php://input");

        $config = new Config();

        parse_str($input,$_UPDATE);

        $id = @$_UPDATE['id'];
        $product_name = @$_UPDATE['product_name'];
        $product_price = @$_UPDATE['product_price'];
        $product_category = @$_UPDATE['product_category'];

        if(!empty($id) && !empty($product_name) && !empty($product_price) && !empty($product_category)) {
            $res = $config->updateProduct($id,$product_name,$product_price,$product_category);
            if($res == 1) {
                $arr['data'] = "Product Updated Succesfully...";
            } else {
                $arr['data'] = "Product Updation Failed...";
            }
        } else {
            $res['error'] = "Please Insert Fields First...";
        }

    } else {    
        $arr['error'] = "Only Put and Patch http request allowed...";
    }
    
    echo json_encode($arr);

?>