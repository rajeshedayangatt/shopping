<?php

include('../classes/DatabaseQueries.php');

$db = new DatabaseQueries();

$p_id = $_POST['product_id'];
$p_qty = $_POST['product_qnty'];
$p_price = $_POST['product_price'];


//check already non payed order there

$sql = "SELECT order_id FROM tbl_order WHERE customer_id = '2' AND order_status = 'NOT PAYED'";

$query = $db->fetch_data($sql);

//if no data present 

if($query == null) {
        $sql = "INSERT INTO tbl_order (customer_id) VALUES ('2')";

        $query = $db->insert_data($sql);

        if($query) {

            $id =  $query;

            $sql = "INSERT INTO tbl_order_item (order_id,product_id,product_quantity,product_total) VALUES ('$id','$p_id','$p_qty','$p_price') ";

            $query = $db->insert_data($sql);

            if($query){
                echo "Added to cart";
            }else{
                echo "error";
            }
        }




}

// if order already  present 
else {


foreach($query as $q){
    $id = $q['order_id'];
    $sql = "INSERT INTO tbl_order_item (order_id,product_id,product_quantity,product_total) VALUES ('$id','$p_id','$p_qty','$total') ";

            $query = $db->insert_data($sql);

            if($query){
                echo "Added to cart";
            }else{
                echo "error";
            }
}





}

