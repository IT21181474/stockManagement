<?php
    require_once('storeclass.php');
    $store->login();


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
                <h1>Login</h1>
                <div class="form-input">
                    <label>Username</label>
                    <br><input type="email" name="email" id="email" placeholder="email" autocomplete="off">
                    <br><br>
                </div><br>
                <div class="form-input">
                    <label>Password</label>
                    <br><input type="password" name="password" placeholder="password" id="password">
                </div>
                
                   <button type="submit" name="submit" class="btn">Login</button>
                
            </form>
        </div>
    </div>
</body>
</html>