<?php
require_once('storeclass.php');

//$store = new Store();
$products = $store->get_products();

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
 <div class="table-container">   
    
<ul>
        
        <h1><u>Products</u></h1>
        <table class="table2">
        <thead>
            <tr>
                <th>Products</th>
               
            </tr>
        </thead>
        <tbody>
            <tr><td>

        <?php foreach($products as $product){?>
            
            <li><a href="product_details.php?id=<?= $product['ID'];?>"><?= $product['product_name'];?> | <?= $product
            ['min_stock'];?></a></li><br>
            <?php } ?>
            </td></tr>
        </tbody>

    </table><br>
   
        </ul>    
   </div> 


</body>
</html>