<?php
    session_start();
    require 'storeclass.php';
?>

<!doctype html>

<html lang="en">

  <head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Document</title>




    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  </head>

  <body>
    <div class="container mt-4">
    <?php

     if(isset($_SESSION['message'])) :

    ?>





    <div class="alert alert-warning alert-dismissible fade show" role="alert">

        <strong>Hey!</strong> <?= $_SESSION['message']; ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

    </div>




    <?php

        unset($_SESSION['message']);

        endif;




    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Products
                        <a href="addnewproduct.php" class="btn btn-primary float-end">Add Products</a>
                    </h4>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Product Type</th>
                                <th>Min Stock</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query ="SELECT * FROM products";
                                

                                $connection =mysqli_connect("localhost","root","","mystore");
                                $query_run = mysqli_query($connection,$query);

                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    foreach($query_run as $product)
                                    {
                                      
                                      ?>
                                        <tr>
                                            <td><?= $product['ID']; ?></td>
                                            <td><?= $product['product_name']; ?></td>
                                            <td><?= $product['product_type']; ?></td>
                                            <td><?= $product['min_stock']; ?></td>
                                            
                                            <td>
                                                <a href="productview.php?ID=<?= $product['ID']; ?>" class="btn btn-info btn-sm">View</a>
                                                <a href="product-edit.php?ID=<?= $product['ID']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                <form action="code.php" method="POST" class="d-inline">
                                                <button type="submit" name="delete_product" value="<?=$product['ID']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                                </form>
                                            </td>


                                        </tr>

                                        <?php
                                    }

                                }
                                else
                                {
                                    echo "<h5> No Record Founs</h5>";
                                }

                            ?>
                            
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
  </div>

</body>
</html>
    
  