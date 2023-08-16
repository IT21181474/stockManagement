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



   

  <div class="container mt-5">




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

                    <h4>Product Edit

                        <a href="products.php" class="btn btn-danger float-end">Back</a>

                    </h4>

                </div>




                <div class="card-body">




                    <?php

                    if(isset($_GET['ID']))

                    {
                        $connection =mysqli_connect("localhost","root","","mystore");


                        $product_id = mysqli_real_escape_string($connection, $_GET['ID']);

                        $query = "SELECT * FROM products WHERE ID='$product_id' ";

                        $query_run = mysqli_query($connection, $query);




                        if(mysqli_num_rows($query_run) > 0)

                        {

                            $product = mysqli_fetch_array($query_run);

                            ?>




                    <form action="products.php" method="POST">

                       

                        <input type="hidden" name="product_id" value="<?= $product['ID']; ?>">

                       

                        <div class="mb-3">

                        <lable>Product Name</lable>

                        <input type="text" name="product_name" value="<?= $product['product_name'];?>" class="form-control" required>

                        </div>

                        <div class="mb-3">

                        <lable>Type</lable>

                        <input type="text" name="product_type" value="<?= $product['product_type'];?>" class="form-control" required>

                        </div>

                        <div class="mb-3">

                        <lable>Min Stock</lable>

                        <input type="text" name="min_stock" value="<?= $product['min_stock'];?>" class="form-control" required>

                        </div>

                      

   

                       
                        <div class="mb-3">

                            <button type="submit" name="update_product" class="btn btn-primary" required>Update Product</button>




                                
                        </div>

                    </form>

                            <?php




                        }

                        else

                        {

                            echo "<h4>No Such Id Found</h4>";

                        }




                    }

                    ?>




                </div>

            </div>

        </div>

    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>
