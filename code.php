<?php

session_start();

require('storeclass.php');
$connection =mysqli_connect("localhost","root","","mystore");



if(isset($_POST['delete_product']))

{
    

    $connection =mysqli_connect("localhost","root","","mystore");

    $product_id = mysqli_real_escape_string($connection, $_POST['delete_product']);

    $query ="DELETE FROM products WHERE ID='$product_id'";

    $query_run = mysqli_query($connection, $query);

    


    if($query_run)

    {

        $_SESSION['message'] = "Product Deleted Successfully";

        header("Location: products.php");

        exit(0);

 

    }

    else

    {

        $_SESSION['message'] = "Product Not Deleted";

        header("Location: products.php");

        exit(0);

    }

}





// if(isset($_POST['update_product']))

// {
    

//     $connection =mysqli_connect("localhost","root","","mystore");

//     $product_id = mysqli_real_escape_string($connection,$_POST['ID']);

//     $product_name = mysqli_real_escape_string($connection,$_POST['product_name']);

//     $product_type = mysqli_real_escape_string($connection,$_POST['product_type']);


//     $min_stock = mysqli_real_escape_string($connection,$_POST['min_stock']);

   




//     $query = "UPDATE products SET product_name='$product_name', product_type='$product_type', min_stock='$min_stock'

//         WHERE ID='$product_id'";




//     $query_run = mysqli_query($connection, $query);




//     if($query_run)

//     {

//         $_SESSION['message'] = "Product Updated Successfully";

//         header("Location: products.php");

//         exit(0);




//     }




    // else

    // {

    //     $_SESSION['message'] = "Product Not Updated";

    //     header("Location: products.php");

    //     exit(0);

       

    // }




//}




if(isset($_POST['save_product']))

{
    

    $connection =mysqli_connect("localhost","root","","mystore");

    $product_id = mysqli_real_escape_string($connection,$_POST['ID']);

    $product_name = mysqli_real_escape_string($connection,$_POST['product_name']);
    
    $product_type = mysqli_real_escape_string($connection,$_POST['product_type']);

    $min_stock = mysqli_real_escape_string($connection,$_POST['min_stock']);

   




    $query = "INSERT INTO products (ID, product_name, product_type, min_stock) VALUES

    ('$product_name', '$product_type', '$min_stock','$product_id')";




    $query_run = mysqli_query($connection, $query);

    if($query_run)

    {

        $_SESSION['message'] = "Product Created Successfully";

        header("Location: addnewproduct.php");

        exit(0);

    }

    else

    {

        $_SESSION['message'] = "Product Not Created";

        header("Location: addnewproduct.php");

        exit(0);

    }

}


if (isset($_POST['update_product'])) {
    $connection = mysqli_connect("localhost", "root", "", "mystore");

    // Check connection
    if (mysqli_connect_errno()) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Validate and sanitize the inputs (e.g., use trim() and appropriate validation functions)

    $product_id = mysqli_real_escape_string($connection, $_POST['product_id']);
    $product_name = mysqli_real_escape_string($connection, $_POST['product_name']);
    $product_type = mysqli_real_escape_string($connection, $_POST['product_type']);
    $min_stock = mysqli_real_escape_string($connection, $_POST['min_stock']);

    // Prepare the update statement
    $query = "UPDATE products SET product_name=?, product_type=?, min_stock=? WHERE ID=?";

    // Create a prepared statement
    $stmt = mysqli_prepare($connection, $query);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssii", $product_name, $product_type, $min_stock, $product_id);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        // Success
        $_SESSION['message'] = "Product Updated Successfully";
        header("Location: products.php");
        exit();
    } else {
        // Error
        $_SESSION['message'] = "Error updating product: " . mysqli_stmt_error($stmt);
        header("Location: products.php");
        exit();
    }

    // Close the statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($connection);
}





?>