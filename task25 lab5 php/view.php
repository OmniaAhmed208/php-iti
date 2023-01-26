<?php
session_start();
include "connect.php";

if(isset($_POST['logout'])){
    session_destroy();
    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="home">

        <h1>
            <?php if(isset($_SESSION['userName'])){
            echo "Hi, ".$_SESSION['userName']." Welcome to our site";}?>
        </h1>

        <img src="./home.png" alt="">
        
        <form action="<?php $_PHP_SELF ?>" method="POST" style="width: 20%;">
            <input type="submit" name="logout" value="Sign Out Your Account">
        </form>
        
    </div>
</body>
</html>