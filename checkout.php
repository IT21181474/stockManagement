<?php
include_once('storeclass.php');
$total = count($_POST['stock_id']);


for($i = 0; $i < $total; $i++){
  
    $store->insert_sales($_POST['stock_id'][$i], $_POST['qty'][$i], $_POST['price'][$i], $_POST['product_id']
    , $_POST['customer_name']);
    //echo $_POST['stock_id'][$i] . " " . $_POST['qty'][$i] ." ".$_POST['price'][$i] ."<br>";


}

header("Location: ".$_SERVER['HTTP_REFERER']);