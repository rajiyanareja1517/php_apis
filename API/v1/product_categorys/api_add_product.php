<?php
    include "../../../config/config.php";

    header("Acces-Control-Allow-Methods: POST");
    header("Content-Type: application/json");


    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $config = new Config();

        if(!empty($_POST['product_name']) && !empty($_POST['product_price']) && !empty($_POST['product_category'])) {
            $product_name = $_POST['product_name'];
            $product_price = (int) $_POST['product_price'];
            $peoduct_category = (int) $_POST['product_category'];
            $res = $config->addProduct($product_name,$product_price,$peoduct_category);
            if($res==1) {
                $arr['data'] = "Product Inserted Succesfully...";
            } else {
                $arr['data'] = "Product Insertion Failed...";
            }
        } else {
            $arr['error'] = "Please Fill All Fields";
        }

    } else {
        $arr['error'] = "Only post http request allowed...";
    }

    echo json_encode($arr);


?>