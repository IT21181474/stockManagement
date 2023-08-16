<?php

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





    <div class="row">

        <div class="col-md-12">

            <div class="card">




                <div class="card-header">

                    <h4>Product View

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

                       

                       

                        <div class="mb-3">

                            <lable>Product Name</lable>

                            <p class="form-control">

                                <?= $product['product_name'];?>

                            </p>

                        </div>

   

                        <div class="mb-3">

                            <lable>Product Type</lable>

                            <p class="form-control">

                                <?= $product['product_type'];?>

                            </p>

                        </div>

   

                        <div class="mb-3">

                            <lable>Min Stock</lable>

                            <p class="form-control">

                                <?= $product['min_stock'];?>

                            </p>

                        </div>

   

                       
   

                       

                   

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




    <!-- Option 1: Bootstrap Bundle -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  </body>

</html>

