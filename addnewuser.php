<?php
    require_once('storeclass.php');
    $store->add_user();
    $userdetails = $store->get_userdata();

    if(isset($userdetails)){
        if($userdetails['access'] != "administrator"){
            header("Location: login.php");

        }
    }else{
        header("Location: addnewuser.php");
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
    <div class="container">
        <div class="form-container">
            <form action="" method="post">
            <h1>Add New Customer/User</h1>

                <div class="form-input">
                    <label>Email</label><br>
                    <input type="email" name="email" id="email" autocomplete="off" placeholder="email">
                </div>

                <div class="form-input">
                    <label>Password</label><br>
                    <input type="password" name="password" id="password" placeholder="password">
                </div>

                <div class="form-input">
                    <label>First Name</label><br>
                    <input type="text" name="fname" id="fname" placeholder="fname">
                </div>

                <div class="form-input">
                    <label>Last Name</label><br>
                    <input type="text" name="lname" id="lname" placeholder="lname">
                </div>


                <button type="submit" name="add" class="btn">Add User</button>
            </form>
        </div>
    </div>
</body>
</html>