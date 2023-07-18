<?php
require_once('storeclass.php');
//$store = new MyStore(); // Create an instance of MyStore class
$id = $_GET['id'];
$product = $store->get_single_product($id);

$userdetails = $store->get_userdata();
$store->add_stock($_POST);

if(isset($userdetails)){
    if($userdetails['access'] != "administrator"){
        header("Location: login.php");
    }
}else{
    header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <form method="post">
        <label>Brand Name</label>
        <input type="text" name="brand_name" id="brand_name" require>
        <label>Qty</label>
        <input type="number" name="qty" id="qty" min="1" value="1">
        <label>Price</label>
        <input type="text" name="price" id="price">
        <label>Batch Number</label>
        <input type="text" name="batch_number" id="batch_number">
        <input type="hidden" name="product_id" value="<?= $product['ID']; ?>">
        <input type="hidden" name="added_by" value="<?= $userdetails['fullname']; ?>">
        <button type="submit" name="add_stock">Add stock</button>
    </form>
    
</body>
</html>