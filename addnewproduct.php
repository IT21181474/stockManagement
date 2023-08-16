<?php
    session_start();
?>

<?php 
    $errors = array();
    if(isset($_POST['save_product']))
    {
        // checking required fields
        if(empty($_POST['product_name']))
        {
            $errors[] = 'Name is required'; 
        }

        else{
            $errors[] = 'Name field is correct'; 
        }

        if(empty($_POST['min_stock']))
        {
            $errors[] = 'Min Stock is required'; 
        }

        else{
            $errors[] = 'Min Stock field is correct'; 
        }

        
    }
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
                    <h4>Product Add
                        <a href="products.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>

                <?php
                    if (!empty($errors))
                    {
                        echo 'Error(s) on your form.';

                    } 
                
                
                   
                ?>

                <div class="card-body">
                    <form action="code.php" method="POST">
                        
                    <div class="mb-3">
                    <lable>Product Name</lable>
                    <input type="text" name="product_name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                    <lable>Min Stock</lable>
                    <input type="text" name="min_stock" class="form-control" required>
                    </div>

                    <div class="mb-3">
                    <lable>Type</lable>
                    <input type="text" name="product_type" class="form-control" required>
                    </div>

                   

                    <div class="mb-3">
                        <button type="submit" name="save_product" class="btn btn-primary">Save Product</button>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>

</body>
</html>